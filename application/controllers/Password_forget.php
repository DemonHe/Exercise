<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/1
 * Time: 14:48
 */
class Password_forget extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    public function index(){
        $this->load->view('Password_forget.php');
    }

}