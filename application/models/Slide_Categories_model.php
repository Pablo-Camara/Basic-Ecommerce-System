<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class Slide_Categories_model extends CI_Model {

    public $id;
    public $name;
    public $description;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function findByName($name){
        return $this->db
            ->select('*')
            ->where('name',$name)
            ->get('slide_categories')->result();
    }

}