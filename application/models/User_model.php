<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class User_model extends CI_Model {

    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    public $createdAt;
    public $ip;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function testLogin($email,$password){
        return $this->db->select('*')
            ->where('email',$email)
            ->where('password',md5($password))
            ->get('users')->row();
    }

    public function findByEmail($email){
        return $this->db->select('firstName,lastName,email')
            ->where('email',$email)
            ->get('users')->row();
    }

    public function setPasswordByEmail($email,$password){
        $this->db->set('password', md5($password));
        $this->db->where('email', $email);
        $this->db->update('users');
    }

}