<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DoveSiamoController extends CI_Controller {


	public function index() //home
	{
        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');
        $data = Array(
            'show_map' => true,
            'navbar' => true,
            'contact_box' => true,
            'show_map' => true,
            'map_first' => true,
            'caller_controller' => $this,
            'body_classes' => 'dovesiamo',
            'disclaimer_articles' => $disclaimer_articles
        );

        $data['data'] = $data;

        renderPage($this,'dovesiamo',$data);
        return;
	}



}
