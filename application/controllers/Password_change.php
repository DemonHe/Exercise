<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/1
 * Time: 14:05
 */
class Password_change extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model("User_model");
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['id'])){
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Password_change.php');
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function changePassword(){
        $this->form_validation->set_rules('email','Email','callback_email_check');
        $this->form_validation->set_rules('oldpassword','OldPassword','callback_password_check');
        $this->form_validation->set_rules('newpassword','Newpassword','callback_newpassword_check');
        $id = $_SESSION['id'];
        
        if ($this->form_validation->run() == TRUE){
            $newpassword = $this->input->post('newpassword');
            $this->User_model->updatePassword($id,$newpassword);
            if($_SESSION['auth']==1)
                redirect("http://localhost/Sportsweb/index.php/HomeController");
            if($_SESSION['auth']==0)
                redirect("http://localhost/Sportsweb/index.php/Manager");
        }else{
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Password_change.php');
        }
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
        $id = $_SESSION['id'];
        if($this->User_model->getEmail($id)==$email){
            return true;
        }else{
            $this->form_validation->set_message('email_check', '邮箱错误');
            return FALSE;
        }
    }

    function newpassword_check($password){
//        if($password=="^[a-zA-Z]\w{5,17}$"){
        if(preg_match("/^[a-zA-Z]\w{5,17}$/",$password)){
            return true;
        }else{
            $this->form_validation->set_message('newpassword_check', '密码格式不正确（只能为数字和字母的组合并且以字母开头）');
            return FALSE;
        }
    }
}