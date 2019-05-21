<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class Product_model extends CI_Model {

    public $id;
    public $url_tag;
    public $name;
    public $small_description;
    public $big_description;
    public $image_small;
    public $category_id;
    public $featured;
    public $extra_info;
    public $list_order;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function add($data){

        $new_prod = new Product_model;
        foreach($data as $key => $value){
            $new_prod->$key = $value;
        }
        $this->db->insert('product',$new_prod);

        return $this->db->insert_id() ;

    }

    public function delete($product_id){

        $this->db->set('active',0);
        $this->db->where('id', $product_id);
        return $this->db->update('product');
    }

    public function getFeatured(){
        return $this->db
            ->select('*')
            ->where('featured',1)
            ->get('product')->result();
    }


    public function getByCategoryId($category_id)
    {
        return $this->db->select('*')
            ->where('category_id',$category_id)
            ->where('active','1')
            ->order_by("list_order", "asc")
            ->get('product')->result();
    }


    public function getByUrlTag($url_tag)
    {
        return $this->db->select('*')
            ->where('url_tag',$url_tag)
            ->get('product')->row();
    }

    public function find_by_category_url_tag($category_url_tag)
    {
        return $this->db->select('product.*')
            ->join('category','category.id = product.category_id','left')
            ->where('category.url_tag',$category_url_tag)
            ->get('product')->result();
    }


    public function edit($data){
        $cat_id = $data['id'];
        unset($data['id']);

        $this->db->set($data);
        $this->db->where('id', $cat_id);
        return $this->db->update('product');
    }


    public function setImage($prod_id,$targetFile){

        $this->db->set('image_small',$targetFile);
        $this->db->where('id', $prod_id);
        return $this->db->update('product');
    }
}