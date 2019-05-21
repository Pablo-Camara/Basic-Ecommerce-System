<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('renderPage'))
{
     function renderPage($caller_controller,$page,$data = null){

        // Load head/header
         $caller_controller->load->view('template/head', $data);

        // Load body
         $caller_controller->load->view('pages/' . $page, $data); //  <----

        // Load footer
         $caller_controller->load->view('template/footer', $data);

    }
}


if ( ! function_exists('renderDashboardView'))
{
    function renderDashboardView($caller_controller,$page,$data = null){

        // Load head/header
        $caller_controller->load->view('admin/template/head', $data);

        // Load body
        $caller_controller->load->view('admin/' . $page, $data); //  <----

        // Load footer
        $caller_controller->load->view('admin/template/foot', $data);

    }
}