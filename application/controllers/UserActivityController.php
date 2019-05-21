<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserActivityController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserActivity_model');
    }

    public function registerView() //home
	{
        $this->UserActivity_model->registerView($_SERVER['REMOTE_ADDR'],$_SERVER["HTTP_REFERER"],$_POST['email']);
	}


}
