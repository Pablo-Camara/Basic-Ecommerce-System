<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopController extends CI_Controller {


	public function index() //home
	{
        $categories = $this->Category_model->getAll();


        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');


        $data = Array(
            'page-title' => 'Shop',
            'navbar' => true,
            'categories' => $categories,
            'disclaimer_articles' => $disclaimer_articles,
            'caller_controller' => $this,
            'contact_box' => true,
            'data' => null,
            'body_classes' => 'shop',
            'show_map' => true,
            'use_parallax' => true,
            'parallax_title' => 'Shop',
            'parallax_description' => 'Scopri di più sui nostri prodotti disponibili.',
            'parallax_image' => '/resources/img/slider1.jpg',
            'hide_head_categories' => true,
            'featured_products' => $this->Product_model->getFeatured()
        );

        $data['data'] = $data;

        renderPage($this,'generic_shop',$data);
	}


    public  function category($url_tag){
        $all_cat = $this->Category_model->getAllActiveCategories();

	    $category = $this->Category_model->getByUrlTag($url_tag);
        $article = null;
        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');
        $products = $this->Product_model->getByCategoryId($category->id);

	    if($category){
            if( ! is_null($category->associated_article_id) ){
                $article = $this->Article_model->getById($category->associated_article_id);
            }

            $subcategories = $this->Category_model->getSubcategories($category->id);

            if(count($subcategories) > 0){

                $data = array(
                    'navbar' => true,
                    'caller_controller' => $this,
                    'all_cat' => $all_cat,
                    'category' => $category,
                    'show_article' => true,
                    'article_title' => $category->title,
                    'article_description' => $category->small_description,
                    'categories' => $subcategories,
                    'contact_box' => true,
                    'products' => $products,
                    'disclaimer_articles' => $disclaimer_articles,
                    'body_classes' => 'shop categories article'
                );

                $data['data'] = $data;

                renderPage($this,'shop_categories',$data);
                return;
            }
        }






	    $data = Array(
            'navbar_size' => $article ? false : true,
	        'navbar' => true,
            'caller_controller' => $this,
            'all_cat' => $all_cat,
            'article' => $article,
            'category' => $category,
            'products' => $products,
            'featured_products' => $this->Product_model->getFeatured(),
            'contact_box' => true,
            'disclaimer_articles' => $disclaimer_articles,
            'body_classes' => 'shop category article'
        );

	    $data['data'] = $data;

        renderPage($this,'shop_category',$data);
        return;
    }

    public  function categories($url_tags){

        $categories = $this->Category_model->getByUrlTags($url_tags);
        $disclaimer_articles = $this->Article_model->getArticlesByTagNames('disclaimer');

//        $products = Array();
//
//        foreach($categories as $category){
//            $products_cat = $this->Product_model->getByCategoryId($category->id);
//            foreach($products_cat as $product_cat){
//                $products[] = $product_cat;
//            }
//        }

        $data = Array(
            'navbar' => true,
            'navbar_size' => true,
            'caller_controller' => $this,
            'categories' => $categories,
            'contact_box' => true,
            'disclaimer_articles' => $disclaimer_articles,
            'body_classes' => 'shop category'
        );

        $data['data'] = $data;

        renderPage($this,'shop_categories',$data);
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
