<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 21:51
 */
class Register extends CI_Controller
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
    }

    public function index(){
        $this->load->view('Register_view.php');
    }

    public function confirm_register(){
        $this->form_validation->set_rules('email','Email','callback_email_check');
        $this->form_validation->set_rules('password','Password','callback_password_check');

        if ($this->form_validation->run() == TRUE){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nickname = $this->input->post('nickname');
            $this->User_model->addUser($email,$password,$nickname);
            
            $id=$this->User_model->getUserinfo($email)->id;
            $this->session->set_userdata('id',$id);

            $portrait=$this->User_model->getPortrait($id);
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $mnum = $this->Message_model->getNum($id);
            $this->session->set_userdata('auth',1);
            $this->session->set_userdata('portrait',$portrait);
            $this->session->set_userdata('mnum',$mnum);
            redirect('http://localhost/Sportsweb/index.php/HomeController');
        }else{
            $this->load->view('Register_view.php');
        }
    }

    function email_check($email){
        if(!$this->User_model->checkEmail($email)){
//            if($email=="^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$"){
            if(preg_match("/[a-za-z0-9]+@[a-za-z0-9]+.[a-z]{2,4}/",$email)){
                return true;
            }
            $this->form_validation->set_message('email_check', '邮箱格式不正确');
            return FALSE;
        }else{
            $this->form_validation->set_message('email_check', '该邮箱已注册');
            return FALSE;
        }
    }

    function password_check($password){
//        if($password=="^[a-zA-Z]\w{5,17}$"){
        if(preg_match("/^[a-zA-Z]\w{5,17}$/",$password)){
            return true;
        }else{
            $this->form_validation->set_message('password_check', '密码格式不正确（只能为数字和字母的组合并且以字母开头）');
            return FALSE;
        }
    }
}