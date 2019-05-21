<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class Slide_model extends CI_Model {

    public $id;
    public $title;
    public $slide_order;
    public $slide_category_id;
    public $featured;
    public $image;
    public $small_description;
    public $cta_text;
    public $cta_link;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function getFeatured(){
        return $this->db
            ->select('*')
            ->where('featured',true)
            ->get('slides')->result();
    }

}