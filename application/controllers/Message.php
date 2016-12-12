<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/2
 * Time: 21:49
 */
class Message extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Message_model");
        $this->load->model("Friends_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['id'])){
            $this->load->view('Navigation.php');
            $this->load->view('Message_view.php');
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function getAll(){
        $id = $_SESSION['id'];
        $query = $this->Message_model->findAll($id);
        $data=array();

        foreach ($query->result() as $row)
        {
            $userid = $row->senderid;
            $uinfo =$this->User_model->getUserinfoById($userid);
            $portrait = $uinfo->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'id' => $row->id,
                'senderid' => $userid,
                'nickname' => $uinfo->nickname,
                'portrait' => $portrait,
                'sendtime' => substr($row->sendtime,0,19),
                'content'  => $row->content,
                'status' => $row->status
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }
    
    public function reject(){
        $id = $this->input->get("id");
        $this->Message_model->changeStatus($id,"已拒绝");

        $recipientid = $this->Message_model->getRecipient($id);
        $senderid = $_SESSION['id'];

        $data = array(
            'recipientid' => $recipientid,
            'senderid' => $senderid,
            'sendtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
            'content' => '拒绝了你的好友申请',
            'status' => '未阅'
        );
        $this->Message_model->add($data);
        $mnum = $this->Message_model->getNum($_SESSION['id']);
        $this->session->set_userdata('mnum',$mnum);
        redirect('http://localhost/Sportsweb/index.php/Message');
    }

    public function accept(){
        $id = $this->input->get("id");
        $this->Message_model->changeStatus($id,"已同意");

        $recipientid = $this->Message_model->getRecipient($id);
        $senderid = $_SESSION['id'];

        $data = array(
            'recipientid' => $recipientid,
            'senderid' => $senderid,
            'sendtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
            'content' => '同意了你的好友申请',
            'status' => '未阅'
        );
        $this->Message_model->add($data);
        $this->Friends_model->addFriend($senderid,$recipientid);
        $mnum = $this->Message_model->getNum($_SESSION['id']);
        $this->session->set_userdata('mnum',$mnum);
        redirect('http://localhost/Sportsweb/index.php/Message');
    }

    public function check(){
        $id = $this->input->get("id");
        $this->Message_model->changeStatus($id,"已查看");
        $recipientid = $this->Message_model->getRecipient($id);
        $mnum = $this->Message_model->getNum($_SESSION['id']);
        $this->session->set_userdata('mnum',$mnum);
        redirect('http://localhost/Sportsweb/index.php/Talk?id='.$recipientid);
    }

    public function read(){
        $id = $this->input->get("id");
        $this->Message_model->changeStatus($id,"已阅");
        $mnum = $this->Message_model->getNum($_SESSION['id']);
        $this->session->set_userdata('mnum',$mnum);
        redirect('http://localhost/Sportsweb/index.php/Message');
    }

}