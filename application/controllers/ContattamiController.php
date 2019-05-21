<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContattamiController extends CI_Controller {


	public function index() //home
	{
        $data = Array(
            'show_map' => true,
            'navbar' => true,
            'contact_box' => true,
            'show_map' => true,
            'caller_controller' => $this,

        );

        $data['data'] = $data;

        renderPage($this,'contattami',$data);
        return;
	}

    public function send_message() //home
    {
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

        $from = $this->input->post('from');
        $phone = $this->input->post('phone');
        $msg = $this->input->post('message');

        $message = <<<HTML
<h3>Hai un nuovo messaggio</h3>
<table>
    <tbody>
        <tr>
            <th>Messaggio di:</th> <td>{$from}</td>
        </tr>
        <tr>
            <th>Telefono:</th> <td>{$phone}</td>
        </tr>
        <tr>
            <th colspan="2">Messaggio:</th>
        </tr>
        <tr>
            <td colspan="2">
                {$msg}
            </td>    
        </tr>
    </tbody>
</table>

<style type="text/css">
    
    table tr th {
        text-align: right;
    }
    
    table tr th[colspan] {
        text-align: left;
    }
    
    table tr td {
        text-align: left;
    }
    
</style>
HTML;

        // prepare email
        $this->email
            ->from('contattami@light-life.it', 'Light-Life Hemp Shop')
            ->to('lightlife.italia@gmail.com')
            ->cc('michediga90@outlook.com')
            ->bcc('pablo.dev.acc@gmail.com')
            ->bcc('pablocamara@softwaredesign.solutions')
            ->subject('Light-Life.it - Nuovo messaggio di ' . $from)
            ->message($message);

// send email
        $email = (!empty($from) && !empty($email) && !empty($message) && !empty($phone)) ? $this->email->send() : false;

        return redirect(site_url('/contattami/inviato/' . ($email ? 'true' : 'false') . '#mandaci'));
    }

    public function inviato($sent){
        $data = Array(
            'show_map' => true,
            'navbar' => true,
            'contact_box' => true,
            'show_map' => true,
            'caller_controller' => $this,
            'message_sent' => $sent === 'true' ? true : false
        );

        $data['data'] = $data;

        renderPage($this,'contattami',$data);
        return;
    }
}
