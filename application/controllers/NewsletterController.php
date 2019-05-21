<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewsletterController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('NewsletterSubscribers_model');
    }

    public function subscribe() //home
	{
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'invalid-email';
            die();
        }

        if($this->NewsletterSubscribers_model->subscribe_email($email,$_SERVER['REMOTE_ADDR'])){
            echo 'true';
            $_SESSION['subscribed'] = $email;
            $_SESSION['email'] = $email;
        }
	}


}
