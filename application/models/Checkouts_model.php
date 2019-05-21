<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class Checkouts_model extends CI_Model {

    public $id;
    public $firstName;
    public $lastName;
    public $address;
    public $email;
    public $checkout_time;
    public $ip;
    public $url;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function checkout($data,$items){

        foreach($data as $key => $value){
            $this->$key = $value;
        }

        $this->checkout_time     = date('Y-m-d H:i:s');

        $checkout_result = $this->db->insert('checkouts', $this);
        $checkout_id = $this->db->insert_id();

        if($checkout_result){

            $c_p = Array();

            foreach($items as $item){
                $c_p[] = Array(
                    'product_id' => $item['id'],
                    'checkout_id' => $checkout_id
                );
            }

            $this->db->insert_batch('checkout_products', $c_p);
        }

        return $checkout_result;
    }


}