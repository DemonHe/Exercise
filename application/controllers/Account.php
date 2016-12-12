<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:15
 */
class Account extends CI_Controller
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
            $id = $_SESSION['id'];
            $data=$this->User_model->getUserinfoById($id);
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Account_view.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function upload_file(){
        $config['upload_path']      = 'img/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 0;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('portrait')){
            $a['upload_data']=$this->upload->data();  //文件的一些信息
            $filename=$a['upload_data']['file_name'];           //取得文件名
            $id = $_SESSION['id'];
//            $data=$this->User_model->getUserinfoById($id);
//            $data->portrait = $filename;
            $this->User_model->modifyPortrait($id,$filename);
            $_SESSION['portrait'] = $filename;
            if($_SESSION['auth']==1)
            redirect('http://localhost/Sportsweb/index.php/Account');
            if($_SESSION['auth']==0)
                redirect("http://localhost/Sportsweb/index.php/Manager");
        }else{
            echo $this->upload->display_errors();
//           $error =  $this->upload->display_errors();
//            $id = $_SESSION['id'];
//            $data=$this->User_model->getUserinfoById($id);
//            if($_SESSION['auth']==1)
//                $this->load->view('Navigation.php');
//            $this->load->view('Account_view.php',$data);
        }
    }

    public function modifyInfo(){
        $nickname=$this->input->post('nickname');
        $location=$this->input->post('location');
        $introduction=$this->input->post('description');
        $sex=$this->input->post('sex');
        $year=$this->input->post('year');
        $month=$this->input->post('month');
        $day=$this->input->post('day');
        $birthdaystr=$year.'-'.$month.'-'.$day;
        $birthday= date("Y-m-d",strtotime($birthdaystr));
//        echo $_SESSION['email'];
        $id = $_SESSION['id'];
//        $email=$_SESSION['email'];
//        $this->User_model->updateUser($email,$nickname,$sex,$location,$birthday,$introduction);
        $this->User_model->updateUser($id,$nickname,$sex,$location,$birthday,$introduction);
        redirect('http://localhost/Sportsweb/index.php/Account');
    }

}