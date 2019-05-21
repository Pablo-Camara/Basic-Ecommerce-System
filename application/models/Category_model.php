<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 24/03/2018
 * Time: 23:25
 */

class Category_model extends CI_Model {

    public $id;
    public $url_tag;
    public $title;
    public $small_description;
    public $big_description;
    public $image_small;
    public $active;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function add($data){

        $new_cat = new Category_model;
        foreach($data as $key => $value){
            $new_cat->$key = $value;
        }
        $this->db->insert('category',$new_cat);

        return $this->db->insert_id() ;

    }

    public function delete($category_id){

        $this->db->set('active',0);
        $this->db->where('id', $category_id);
        return $this->db->update('category');
    }


    public function getAll(){
        return $this->db->order_by('id','ASC')
            ->select('*')
            ->join('subcategories','subcategories.subcategory_id = category.id','left')
            ->where('active','1')
            ->where('subcategories.subcategory_id',null)
            ->get('category')->result();
    }

    public function getAllActiveCategories(){
        return $this->db->order_by('id','ASC')
            ->select('*')
            ->where('active','1')
            ->get('category')->result();
    }

    public function getByUrlTag($url_tag){
        return $this->db
            ->select('*')
            ->where('url_tag',$url_tag)
            ->get('category',1)
            ->row();
    }

    public function getById($id){
        return $this->db
            ->select('*')
            ->where('id',$id)
            ->get('category',1)
            ->row();
    }

    public function getSubcategories($category_id){
        return $this->db
            ->select('category.*')
            ->from('subcategories')
            ->join('category','category.id = subcategories.subcategory_id')
            ->where('subcategories.category_id',$category_id)
            ->get()
            ->result();
    }
    public function getByUrlTags($url_tags)
    {
        $category_url_tags = explode('_',$url_tags);

        $where = Array();

        foreach($category_url_tags as $category_url_tag){
            $where[] = "url_tag LIKE '%" . $category_url_tag . "%'";
        }


        $db = $this->db->select('*');

        if(count($where) > 0){
            $first = true;
            $db->where($where[0]);
            foreach ($where as $sqlWhere){
                if($first){
                    $first = false;
                    continue;
                }
                $db->or_where($sqlWhere);
            }
            $db->order_by('id','ASC');
        }


        return $db->get('category')->result();
    }


    public function edit($data){
        $cat_id = $data['id'];
        unset($data['id']);

        $this->db->set($data);
        $this->db->where('id', $cat_id);
        return $this->db->update('category');
    }


    public function setImage($cat_id,$targetFile){

        $this->db->set('image_small',$targetFile);
        $this->db->where('id', $cat_id);
        return $this->db->update('category');
    }

}