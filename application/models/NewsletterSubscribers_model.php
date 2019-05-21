<?php
/**
 * Created by PhpStorm.
 * User: pablocamara
 * Date: 25/03/2018
 * Time: 17:33
 */

class NewsletterSubscribers_model extends CI_Model {

    public $id;
    public $email;
    public $subscribe_ip;
    public $subscribed_at;
    public $confirmed_email_at;
    public $confirmation_ip;
    public $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function subscribe_email($email,$subcribe_ip){
        $this->email    = $email; // please read the below note
        $this->subscribe_ip  = $subcribe_ip;
        $this->subscribed_at     = date('Y-m-d H:i:s');

        $this->db->insert('newsletter_subscribers', $this);
        return true;
    }


}