<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:00
 */
class HomeController extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Exercise_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
//        $email=$this->input->get("email");
//        $email = $_SESSION['email'];
//        echo $_SESSION['email'];
//        echo get_cookie('email');
        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $this->load->view('Navigation.php');
            
            $array=$this->User_model->getUserinfoById($id);
            $array->index = 0;
            $b = $this->Exercise_model->findSum($id);
            $array->distance = ($b['d']==null)?0:$b['d'];
            $array->time = ($b['t']==null)?0:$b['t'];
            $array->calorie = ($b['c']==null)?0:$b['c'];
            $array->grade = $this->User_model->getGrade($id);
            $this->load->view('Home.php',$array);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
        
    }

}