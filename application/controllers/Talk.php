<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/3
 * Time: 1:47
 */
class Talk extends CI_Controller
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
        if(isset($_SESSION['id'])){
//            $id = $_SESSION['id'];
            $uid = $this->input->get('id');
            $row = $this->User_model->getUserinfoById($uid);

            $data['username']=$row->nickname;
            $data['userpor']=$row->portrait;
            $data['userid'] = $uid;
            $this->load->view('Navigation.php');
            $this->load->view('Talk_view.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function send(){
        $userid=$this->input->get('userid');
        
        $content = '发送消息：'.$this->input->post("mcontent");

        $data = array(
            'recipientid' => $userid,
            'senderid' => $_SESSION['id'],
            'sendtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
            'content' => $content,
            'status' => '未查看'
        );
        $this->Message_model->add($data);
        redirect('http://localhost/Sportsweb/index.php/Message');
    }

}