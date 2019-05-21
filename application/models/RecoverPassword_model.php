<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 27/05/2018
 * Time: 09:32
 */

class RecoverPassword_model extends CI_Model {

    public $email;
    public $ip;
    public $createdAt;
    public $active;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function add($email,$ip){

        $alreadyAdded = $this->db->select('id')
            ->where('email',$email)
            ->where('active',1)
            ->get('recover_password')->row();

        if(!$alreadyAdded){
            $this->email    = $email; // please read the below note
            $this->ip    = $ip;
            $this->createdAt     = date('Y-m-d H:i:s');
            $this->active     = 1;

            $this->db->insert('recover_password', $this);

            return $this->db->insert_id();
        }

        return $alreadyAdded->id;

    }

    public function canRecover($id){
        return $this->db->select('email')
            ->where('id',$id)
            ->where('active',1)
            ->get('recover_password')->row();
    }


    public function canRecoverCheck($id,$email){
        return $this->db->select('email')
            ->where('id',$id)
            ->where('email',$email)
            ->where('active',1)
            ->get('recover_password')->row();
    }

    public function disableToken($token_id){
        $this->db->set('active', 0);
        $this->db->where('id', $token_id);
        $this->db->update('recover_password');
    }



}