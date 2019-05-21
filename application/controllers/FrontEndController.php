<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FrontEndController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Article_model');
        $this->load->model('Category_model');
        $this->load->model('Product_model');
        

    }

    /**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() //home
	{

        $slide_articles = $this->Article_model->get_slide_articles(2);


        $categories = 'cannabis_light_eliquid_vaporizzatori_cbd_cristalli_oli_aliementi';
        $categories = $this->Category_model->find_categories($categories);



        $data = [];
	    $data['page_title'] = 'Home';
	    $data['slide_articles'] = $slide_articles;
	    $data['categories'] = $categories;

        static::renderPage('home',$data);
	}


	public function shop_view_category_products($category_url_tag){ // strings separated by _


	    $category = $this->Category_model->find_by_url_tag($category_url_tag);
	    $products = $this->Product_model->find_by_category_url_tag($category_url_tag);
	    $article = $this->Article_model->find_article_by_url_tag($category_url_tag);


        $data = [];
        $data['page_title'] = 'Shop - ' . $category[0]->title;
        $data['body_classes'] = 'products';

        $data['products'] = $products;
        $data['category'] = $category;

        if(!$article || 0 === count($article)){
            $data['header_type'] = 'none';
            $data['page_heading'] = $category[0]->title;
            $data['page_small_description'] = $category[0]->small_description;
            $data['navbar_size'] = true;
        } else {
            $data['body_classes'] .= ' article';
            $data['header_type'] = 'article';
            $data['article'] = $article;

            $data['page_heading'] = 'Controlla i nostri prodotti';

        }



        static::renderPage('shop',$data);

    }

    public  function shop_categories_and_article($categories,$article){

        $article = $this->Article_model->find_article($article);

        $categories = $this->Category_model->find_categories($categories);


        $data = [];
        $data['page_title'] = 'Shop';
        $data['body_classes'] = 'article';
        $data['header_type'] = 'article';
        $data['article'] = $article;
        $data['categories'] = $categories;


        $products = [];
        foreach ($categories as $category){
            $category_products = $this->Product_model->find_by_category_id($category->id);
            foreach ($category_products as $product){
                $products[] = $product;
            }
        }

        $data['featured_products'] = $products;

        static::renderPage('shop',$data);

    }


    public function shop_view_product($url_tag){
	    $product = $this->Product_model->find_by_url_tag($url_tag);

        $product = $product[0];

	    $featured_products = [];

        $category_products = $this->Product_model->find_by_category_id($product->category_id);
        foreach ($category_products as $c_product){
            $featured_products[] = $c_product;
        }

        $data['product'] = $product;
        $data['featured_products'] = $featured_products;
        $data['body_classes'] = 'product article';


        static::renderPage('product',$data);
    }

	public function doveSiamo(){
        $data = [];
        $data['page_title'] = 'Dove Siamo';
        $data['body_classes'] = 'dovesiamo';
        static::renderPage('dovesiamo',$data);
    }

    public function contattami($sent = NULL){
        $data = [];
        $data['page_title'] = 'Contattami';
        $data['body_classes'] = 'contattami';
        $data['message_sent'] = $sent;
        static::renderPage('contattami',$data);
    }

    public function contattami_post(){
        $this->load->library('email');

        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_host'] = 'mail.light-life.it';
        $config['smtp_user'] = 'contattami@light-life.it';
        $config['smtp_pass'] = 'developer@light-life.it';
        $config['smtp_port'] = 290;

        $this->email->initialize($config);


        $message = <<<HTML
<h3>Hai un nuovo messaggio</h3>
<b>Messaggio di:</b> {$_POST['from']}<br>
<b>Telefono:</b> {$_POST['phone']}<br>
<b>Messaggio:</b><br><br>

{$_POST['messaggio']}
HTML;

        // prepare email
        $this->email
            ->from('contattami@light-life.it', $_POST['name'])
            //->to('lightlife.italia@gmail.com')
            //->cc('michediga90@outlook.com')
            ->to('pablo.dev.acc@gmail.com')
            ->subject('Light-Life.it - Nuovo messaggio')
            ->message($message);

// send email
        $email = $this->email->send();

        return redirect(site_url('/contattami/inviato/' . ($email ? 'true' : 'false') . '#mandaci'));
    }

	public function renderPage($page,$data = null){

	    // Load head/header
        $this->load->view('template/head', $data);

        // Load body
        $this->load->view('pages/' . $page, $data); //  <----

        // Load footer
        $this->load->view('template/footer', $data);

    }
}
