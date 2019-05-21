<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 24/03/2018
 * Time: 23:25
 */

class Article_model extends CI_Model {

    public $id;
    public $associated_category_id;
    public $url_tag;
    public $title;
    public $small_description;
    public $full_description;
    public $createdAt;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function getArticlesByTagNames($tag_names){
        if(!is_array($tag_names)){
            $tag_names = Array($tag_names);
        }

        return $this->db->select('*')
            ->from('article_tags')
            ->join('article_associated_tags','article_associated_tags.tag_id = article_tags.id')
            ->join('article','article.id = article_associated_tags.article_id')
            ->where_in('article_tags.name',$tag_names)
            ->get()->result();
    }


    public function getById($id){
        return $this->db->select('*')
            ->where('id',$id)
            ->get('article')->row();
    }

    public function getByUrlTag($article_url_tag){
        return $this->db->select('*')
            ->where('url_tag',$article_url_tag)
            ->get('article')->row();
    }

}