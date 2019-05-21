<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArticleController extends CI_Controller {


	public function index() //home
	{

	}


    public  function article($url_tag){

        $article = $this->Article_model->getByUrlTag($url_tag);
        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');
	    $data = Array(
	        'navbar' => true,
            'caller_controller' => $this,
            'article_title' => $article->title,
            'article_description' => $article->full_description,
            'featured_products' => $this->Product_model->getFeatured(),
            'contact_box' => true,
            'body_classes' => 'article',
            'show_article' => true,
            'disclaimer_articles' => $disclaimer_articles
        );

	    $data['data'] = $data;

        renderPage($this,'article',$data);
        return;
    }


    public function product($url_tag){
        $product = $this->Product_model->getByUrlTag($url_tag);

        $category = null;
        $related_products = null;
        if($product){
            $related_products = $this->Product_model->getByCategoryId($product->category_id);

            $category = $this->Category_model->getById($product->category_id);
        }

        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');

        $data = Array(
            'navbar' => true,
            'category' => $category,
            'product' => $product,
            'related_products' => $related_products,
            'contact_box' => true,
            'disclaimer_articles' => $disclaimer_articles,
            'caller_controller' => $this,
            'body_classes' => 'article product'
        );

        $data['data'] = $data;
        renderPage($this,'shop_product',$data);
        return;
    }

}
