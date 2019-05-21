<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        if($this->session->logged_in !== TRUE){
            die();
        }

        $this->load->model('Product_model');
    }

    public function edit() //home
	{
	    if($this->Product_model->edit($_POST)){
	        echo 'true';
	        die();
        };

	    echo 'something went wrong';
	}


    public function change_image() //home
    {
        $target_dir = "resources/img/widgets/products/";
        $target_file = $target_dir . '_' . time() . '_' . basename($_FILES["w_file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["w_file"]["tmp_name"]);
            if($check == false) {
                header('Location: ' . $_POST['return_url']);
            }
        }


        if (file_exists($target_file)) {
            header('Location: ' . $_POST['return_url']);
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "ico" ) {
            header('Location: ' . $_POST['return_url']);
        }

        if (move_uploaded_file($_FILES["w_file"]["tmp_name"], $target_file)) {

            $this->Product_model->setImage($_POST['prod_id'],$target_file);
            header('Location: ' . $_POST['return_url']);
            die();
        }

        header('Location: ' . $_POST['return_url']);
    }



    public function add(){

        $category_id = $_POST['category_id'];

        if(empty($category_id)){
            header('Location: ' . $_POST['return_url']);
            die();
        }

        $product_title = $_POST['name'];

        if(empty($product_title)){
            header('Location: ' . $_POST['return_url'] . '?msg=Il titolo del prodotto non può essere vuoto');
            die();
        }

        $url_tag = preg_replace('/[^\\pL0-9]+/u', '-', $product_title);
        $url_tag = trim($url_tag, "-");
        $url_tag = iconv("utf-8", "us-ascii//TRANSLIT", $url_tag);
        $url_tag = preg_replace('/[^-a-z0-9]+/i', '', $url_tag);
        $url_tag = strtolower($url_tag);



        $product_id = $this->Product_model->add(Array(
            'name' => $_POST['name'],
            'small_description' => $_POST['small_description'],
            'url_tag' => $url_tag,
            'active' => 1,
            'product_page' => 0,
            'featured' => 1,
            'category_id' => $category_id
        ));

        if(!$product_id){
            header('Location: ' . $_POST['return_url'] . '?msg=Impossibile aggiungere prodotto');
            die();
        }

        $target_dir = "resources/img/widgets/products/";
        $target_file = $target_dir . '_' . time() . '_' . basename($_FILES["w_file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["w_file"]["tmp_name"]);
            if($check == false) {
                header('Location: ' . $_POST['return_url'] . '?msg=Immagine non valida, Prodotto aggiunto');
            }
        }


        if (file_exists($target_file)) {
            header('Location: ' . $_POST['return_url'] . '?msg=il file immagine esiste già, Prodotto aggiunto');
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "ico" ) {
            header('Location: ' . $_POST['return_url'] . '?msg=Formato di file non valido, Prodotto aggiunto');
        }

        if (move_uploaded_file($_FILES["w_file"]["tmp_name"], $target_file)) {

            $this->Product_model->setImage($product_id,'/' . $target_file);
            header('Location: ' . $_POST['return_url'] . '?msg=Prodotto aggiunto');
            die();
        }

        header('Location: ' . $_POST['return_url']  . '?msg=Impossibile aggiungere immagine, Prodotto aggiunto');



    }


    public function delete(){
        $product_id = $_POST['id'];

        if(!$product_id){
            die('false');
        }

        if($this->Product_model->delete($product_id)){
            echo 'true';
            return;
        }

        die('false');
    }


    public function change_category(){
        if($this->Product_model->edit(Array(
            'id' => $_POST['product_id'],
            'category_id' => $_POST['new_cat_id']
        ))){
            echo 'true';
            die();
        };

        echo 'something went wrong';
    }

    public function change_order(){
        if($this->Product_model->edit(Array(
            'id' => $_POST['product_id'],
            'list_order' => $_POST['next_list_order']
        ))
        &&
            $this->Product_model->edit(Array(
                'id' => $_POST['swap_with'],
                'list_order' => $_POST['current_list_order']
            ))){
            echo 'true';
            die();
        };

        echo 'something went wrong';
    }

}
