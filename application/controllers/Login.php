<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/1
 * Time: 11:50
 */
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Message_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
        $this->load->library('email');
    }

    public function index(){
        if (!session_id()) session_start();
        if(isset($_SESSION['id'])){
            $id=$_SESSION['id'];
            $auth=$this->User_model->getAuth($id);
            if($auth==1){
                redirect('http://localhost/Sportsweb/index.php/HomeController');
            }else if($auth==0){
                redirect('http://localhost/Sportsweb/index.php/Manager');
            }
        }else{
            $this->load->view('Login_view.php');
        }
    }

    public function checkinfo(){

        $this->form_validation->set_rules('email','Email','callback_email_check');
        $this->form_validation->set_rules('password','Password','callback_password_check');

        if ($this->form_validation->run() == TRUE){
            $email=$this->input->post('email');
            $id=$this->User_model->getUserinfo($email)->id;
            $this->session->set_userdata('id',$id);
           
//            $_SESSION['email'] = $this->input->post('email');
//            $email=$this->input->post('email');
//            $_SESSION['email']=$email;
//            echo $_SESSION['email'];
//            $this->input->set_cookie('email',$this->input->post('email'),86500);
//            echo get_cookie('email');
            $auth=$this->User_model->getAuth($id);
            $portrait=$this->User_model->getPortrait($id);
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }
            
            $mnum = $this->Message_model->getNum($id);
            $this->session->set_userdata('auth',$auth);
            $this->session->set_userdata('portrait',$portrait);
            $this->session->set_userdata('mnum',$mnum);
            
            if($auth==1){
                redirect('http://localhost/Sportsweb/index.php/HomeController');
            }else if($auth==0){
                redirect('http://localhost/Sportsweb/index.php/Manager');
            }

        }else{
            $this->load->view('Login_view.php');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        session_destroy();
        redirect('http://localhost/Sportsweb/index.php/Login');
    }

    public function forgetPassword(){

    }

    function password_check($password){
        $email = $this->input->post('email');
        if($this->User_model->checkPassword($email,$password)){
            return true;
        }else{
            $this->form_validation->set_message('password_check', '密码错误');
            return FALSE;
        }
    }

    function email_check($email){
        if($this->User_model->checkEmail($email)){
            return true;
        }else{
            if($email=="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"){
                $this->form_validation->set_message('email_check', '该邮箱未注册');
                return FALSE;
            }else{
                $this->form_validation->set_message('email_check', '邮箱格式不正确');
                return FALSE;
            }
        }
    }

}