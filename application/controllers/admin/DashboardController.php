<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        $this->load->model('UserActivity_model');
    }

    public function index() //home
	{

        $data = Array(
            'post' => $_POST
        );

        if($this->session->logged_in !== TRUE){
            renderDashboardView($this,'login',$data);
            return;
        }
        renderDashboardView($this,'dashboard',$data);
	}

    public function logout(){
        if(!empty($_POST['logout']) && $_POST['logout'] === 'now'){
            session_destroy();
            redirect('/dashboard/login', 'refresh');
        }
    }

	public function login(){

        $data = Array(
            'post' => $_POST
//                'feedback_message' => '',
//                'feedback_type' => '',
        );

        if($this->session->logged_in !== TRUE){

            if(!empty($_POST['email']) && !empty($_POST['password'])){
                $user = $this->User_model->testLogin($_POST['email'],$_POST['password']);

                if(!empty($user)){
                    $this->session->logged_in = TRUE;
                    $this->session->user = $user;
                    redirect('/dashboard/login', 'refresh');
                    return;

                } else {
                    $data['feedback_message'] = 'Email o password non sono corretti';
                    $data['feedback_type'] = 'error';
                }

            }

            renderDashboardView($this,'login',$data);
            return;
        }

        renderDashboardView($this,'dashboard',$data);
    }

    public function login_forgot(){

        if(empty($_POST['email'])){
            renderDashboardView($this,'forgot');
            return;
        }

        $user2recover = $this->User_model->findByEmail($this->input->post('email'));



        if($user2recover){
            $this->load->model('RecoverPassword_model');

            $token_id = $this->RecoverPassword_model->add($this->input->post('email'),$_SERVER['REMOTE_ADDR']);


            $this->load->library('email');

            $config['protocol'] = 'sendmail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['smtp_host'] = 'mail.light-life.it';
            $config['smtp_user'] = 'contattami@light-life.it';
            $config['smtp_pass'] = 'developer@light-life.it';
            $config['smtp_port'] = 290;

            $this->email->initialize($config);

            $from = 'contattami@light-life.it';

            $change_pwd_url = site_url('/dashboard/login/recover/' . $token_id);

            $message = <<<HTML
<h3>Recupera la password</h3>
<a href="{$change_pwd_url}">Clicca qui</a> per definire una nuova password.
HTML;

            // prepare email
            $this->email
                ->from('contattami@light-life.it', 'Light-Life Hemp Shop')
                ->to($this->input->post('email'))
                ->subject('Recupera la password')
                ->message($message);

            // send email
            $this->email->send();
        }


        $data = Array(
            'feedback_message' => 'Se l\'e-mail inserita è presente nel nostro database, riceverai presto una email per aiutarti.'
        );

        renderDashboardView($this,'forgot',$data);
    }


    public function login_recover($token_id){
        $this->load->model('RecoverPassword_model');

        if(!$this->RecoverPassword_model->canRecover($token_id)){
            renderDashboardView($this,'forgot');
            return;
        }

        renderDashboardView($this,'recover',Array('token_id' => $token_id));
    }

    public function login_setpassword(){
        $data = Array(
            'post' => $_POST,
            'token_id' => $this->input->post('token_id')
        );

        if(empty($_POST['email']) || empty($_POST['password'])){
            $data['feedback_message'] = 'Compila tutti i campi.';
            $data['feedback_type'] = 'error';
            renderDashboardView($this,'recover',$data);
            return;
        }

        if(strlen($_POST['password']) < 5){
            $data['feedback_message'] = 'Password troppo piccola.';
            $data['feedback_type'] = 'error';
            renderDashboardView($this,'recover',$data);
            return;
        }

        if($_POST['password'] !== $_POST['password_confirmation']){
            $data['feedback_message'] = 'Le password non corrispondono.';
            $data['feedback_type'] = 'error';
            renderDashboardView($this,'recover',$data);
            return;
        }

        $this->load->model('RecoverPassword_model');
        $this->load->model('User_model');

        if($this->RecoverPassword_model->canRecoverCheck($data['token_id'],$_POST['email'])){
            $this->User_model->setPasswordByEmail($_POST['email'],$_POST['password']);
            $this->RecoverPassword_model->disableToken($data['token_id']);

            $data['feedback_message'] = 'Password cambiata con successo.';
            $data['feedback_type'] = 'success';
            renderDashboardView($this,'recover',$data);
            return;

        }

        $data['feedback_message'] = 'Link non più valido.';
        $data['feedback_type'] = 'error';
        renderDashboardView($this,'recover',$data);
        return;
    }


    public function statistics(){

        $stats = $this->UserActivity_model->getViewsStats(!empty($_GET['start']) ? $_GET['start'] : null,!empty($_GET['end']) ? $_GET['end'] : null);

        $data = Array(
            'stats' => $stats
        );

        renderDashboardView($this,'statistics',$data);
    }

    public function shop(){
        $_SESSION['manage_site'] = TRUE;
        redirect('/shop');
    }

}
