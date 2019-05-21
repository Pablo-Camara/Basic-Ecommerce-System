<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserActivity_model');
    }

    public function add() //home
	{
        if(!isset($_SESSION['cart_products'])){
            $_SESSION['cart_products'] = Array();
        }

        foreach($_SESSION['cart_products'] as $key => $product){
            if(isset($product['id']) && $product['id'] == $_GET['prod_id']){
                $_SESSION['cart_products'][$key]['count']++;
                echo 'true';
                return;
            }
        }

        $new_prod = Array(
            'id' => $_GET['prod_id'],
            'name' => $_GET['prod_name'],
            'count' => 1
        );

        $_SESSION['cart_products'][] = $new_prod;

        echo 'true';


	}

    public function remove() //home
    {


        if(!isset($_SESSION['cart_products']) || count($_SESSION['cart_products']) == 0){
            return;
        }

        foreach($_SESSION['cart_products'] as $key => $product){
            if(isset($product['id']) && $product['id'] == $_GET['prod_id']){
                $_SESSION['cart_products'][$key]['count']--;

                if($_SESSION['cart_products'][$key]['count'] <= 0){
                    unset($_SESSION['cart_products'][$key]);
                    echo 'true';
                }
                return;
            }
        }
    }

    public function items_li(){
        if(isset($_SESSION['cart_products'])) {
            foreach($_SESSION['cart_products'] as $product){
                echo '<li data-product-id="' . $product['id'] . '"><div style="display: inline;" class="data_product_name">' . $product['name'] . '</div> <span>(' . $product['count'] . ')</span> <span class="add_to_cart_link">+</span><span class="remove_from_cart_link">-</span></li>';
            }

            if(count($_SESSION['cart_products']) > 0)
                echo '<li class="check_out_button">ordine</li>';
        }



    }

    public function checkout(){
            $this->load->model('Checkouts_model');

            $data = $_GET;
            $data['ip'] = $_SERVER['REMOTE_ADDR'];
            $data['url'] = $_SERVER['HTTP_REFERER'];

            foreach($data as $key => $value){
                $_SESSION[$key] = $value;
            }

            if($this->Checkouts_model->checkout($data,$_SESSION['cart_products'])){
                $_SESSION['cart_products'] = Array();
                echo 'true';

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
                    ->to('pablo.com.pt@gmail.com')
//                    ->to('lightlife.italia@gmail.com')
//                    ->cc('michediga90@outlook.com')
//                    ->bcc('pablo.dev.acc@gmail.com')
//                    ->bcc('pablocamara@softwaredesign.solutions')
                    ->subject('Light-Life.it - Nuovo messaggio di ' . $from)
                    ->message($message);

// send email
                $email = (!empty($from) && !empty($email) && !empty($message) && !empty($phone)) ? $this->email->send() : false;

                return;
            };

            echo 'false';
    }

}
