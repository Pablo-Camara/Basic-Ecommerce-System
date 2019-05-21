<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index() //home
	{

        $featured_slides = $this->Slide_model->getFeatured();
        $categories = $this->Category_model->getAll();
        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');


        $data = Array(
            'page-title' => 'Home',
            'navbar' => true,
            'featured_slides' => $featured_slides,
            'categories' => $categories,
            'disclaimer_articles' => $disclaimer_articles,
            'caller_controller' => $this,
            'contact_box' => true,
            'data' => null,
            'body_classes' => 'home',
            'show_map' => true
        );

        $data['data'] = $data;

        renderPage($this,'home',$data);
	}



}
