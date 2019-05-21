<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        if($this->session->logged_in !== TRUE){
            die();
        }

        $this->load->model('Category_model');
    }

    public function edit() //home
	{
	    if($this->Category_model->edit($_POST)){
	        echo 'true';
	        die();
        };

	    echo 'something went wrong';
	}

    public function change_image() //home
    {
        $target_dir = "resources/img/widgets/categories/";
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

            $this->Category_model->setImage($_POST['cat_id'],$target_file);
            header('Location: ' . $_POST['return_url']);
            die();
        }

        header('Location: ' . $_POST['return_url']);
    }


    public function add(){

        $category_title = $_POST['title'];

        if(empty($category_title)){
            header('Location: ' . $_POST['return_url'] . '?msg=Il titolo della categoria non può essere vuoto');
            die();
        }

        $url_tag = preg_replace('/[^\\pL0-9]+/u', '-', $category_title);
        $url_tag = trim($url_tag, "-");
        $url_tag = iconv("utf-8", "us-ascii//TRANSLIT", $url_tag);
        $url_tag = preg_replace('/[^-a-z0-9]+/i', '', $url_tag);
        $url_tag = strtolower($url_tag);



        $category_id = $this->Category_model->add(Array(
           'title' => $_POST['title'],
           'small_description' => $_POST['small_description'],
           'url_tag' => $url_tag,
           'active' => 1
        ));

        if(!$category_id){
            header('Location: ' . $_POST['return_url'] . '?msg=Impossibile aggiungere categoria');
            die();
        }

        $target_dir = "resources/img/widgets/categories/";
        $target_file = $target_dir . '_' . time() . '_' . basename($_FILES["w_file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["w_file"]["tmp_name"]);
            if($check == false) {
                header('Location: ' . $_POST['return_url'] . '?msg=Immagine non valida, Categoria aggiunta');
            }
        }


        if (file_exists($target_file)) {
            header('Location: ' . $_POST['return_url'] . '?msg=il file immagine esiste già, Categoria aggiunta');
        }

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" && $imageFileType != "ico" ) {
            header('Location: ' . $_POST['return_url'] . '?msg=Formato di file non valido, Categoria aggiunta');
        }

        if (move_uploaded_file($_FILES["w_file"]["tmp_name"], $target_file)) {

            $this->Category_model->setImage($category_id,'/' . $target_file);
            header('Location: ' . $_POST['return_url'] . '?msg=Categoria aggiunta');
            die();
        }

        header('Location: ' . $_POST['return_url']  . '?msg=Impossibile aggiungere immagine, Categoria aggiunta');



    }



    public function delete(){
        $category_id = $_POST['id'];

        if(!$category_id){
            die('false');
        }

        if($this->Category_model->delete($category_id)){
            echo 'true';
            return;
        }

        die('false');
    }

}
