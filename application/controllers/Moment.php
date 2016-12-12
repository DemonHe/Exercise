<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/30
 * Time: 22:55
 */
class Moment extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->model("Moments_model");
        $this->load->model("Message_model");
        $this->load->model("Concern_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['id'])){
//            $id = $_SESSION['id'];
            $data['index'] = 3;
            $this->load->view('Navigation.php');
            $this->load->view('Moment_view.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }
    
    public function getAll(){
        $query = $this->Moments_model->findAll();
        $data=array();

        foreach ($query->result() as $row)
        {
            $userid = $row->userid;
            $uinfo =$this->User_model->getUserinfoById($userid);
            $portrait = $uinfo->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'nickname' => $uinfo->nickname,
                'portrait' => $portrait,
                'publishtime' => substr($row->publishtime,0,19),
                'content'  => $row->content
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function getMine(){

        $userid = $_SESSION['id'];
        $query = $this->Moments_model->findMine($_SESSION['id']);
        $data=array();

        foreach ($query->result() as $row)
        {
//            $userid = $row->userid;
            $uinfo =$this->User_model->getUserinfoById($userid);
            $portrait = $uinfo->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'nickname' => $uinfo->nickname,
                'portrait' => $portrait,
                'publishtime' => substr($row->publishtime,0,19),
                'content'  => $row->content
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function publish(){
        $content = $this->input->post("mcontent");
        $id = $_SESSION['id'];

        $data = array(
            'userid' => $id,
            'publishtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
            'content' => $content
        );
        $this->Moments_model->add($data);

        $query = $this->Concern_model->getFans($id);
        foreach ($query->result() as $row)
        {
            $recipientid = $row->userid;
            $data = array(
                'recipientid' => $recipientid,
                'senderid' => $id,
                'sendtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
                'content' => '发布动态：'.$content,
                'status' => '未阅'
            );
            $this->Message_model->add($data);
        }
        redirect('http://localhost/Sportsweb/index.php/Moment');
    }
}