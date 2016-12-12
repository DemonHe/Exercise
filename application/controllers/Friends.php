<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
//
//// This can be removed if you use __autoload() in config.php OR use Modular Extensions
//require 'Observer.php';
//require 'Message_sub.php';
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:55
 */
class Friends extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Friends_model");
        $this->load->model("Concern_model");
        $this->load->model("User_model");
        $this->load->model("Activity_model");
        $this->load->model("Message_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        
        if(isset($_SESSION['id'])){

            $data['index'] = -1;
            $this->load->view('Navigation.php');
            $this->load->view('Friends_view.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function getAllF(){
        $id = $_SESSION['id'];
//        $email = $_POST['data'];
        $query = $this->Friends_model->getAllFriends($id);
        $data=array();


        foreach ($query->result() as $row)
        {
            $a=$this->User_model->getUserinfoById($row->friendid);
            $birthday = $a->birthday;
            if($birthday!=""){
                $year=explode("-",$birthday)[0];
                $age=date("Y")-$year;
            }else{
                $age=0;
            }

            $portrait = $a->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'id' => $a->id,
                'name' => ($a->nickname==null)?$a->email:$a->nickname,
                'sex'  => $a->sex,
                'age'  => $age.'岁',
                'location' => $a->location,
                'portrait' => $portrait
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function getAllC(){
        $id = $_SESSION['id'];
        if($_POST['data']!=0)
            $id = $_POST['data'];
//        $id=$this->input->get("id");
//        echo $id;
//        $email = $_POST['data'];
        $query = $this->Concern_model->getAllConcerns($id);
        $data=array();

        foreach ($query->result() as $row)
        {
            $a=$this->User_model->getUserinfoById($row->concernid);
            $birthday = $a->birthday;
            if($birthday!=""){
                $year=explode("-",$birthday)[0];
                $age=date("Y")-$year;
            }else{
                $age=0;
            }

            $portrait = $a->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }
            
            $element=array(
                'id' => $a->id,
                'name' => ($a->nickname==null)?$a->email:$a->nickname,
                'sex'  => $a->sex,
                'age'  => $age.'岁',
                'location' => $a->location,
                'portrait' => $portrait
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }
    
    public function otherUser(){
        if(isset($_SESSION['id'])){

            $userid = $_SESSION['id'];

            if($_SESSION['auth']==1)
                 $this->load->view('Navigation.php');
            
            $id=$this->input->get("id");
            $info = $this->User_model->getUserinfoById($id);
            $isFriend = $this->Friends_model->isFriend($userid,$id);
            $isConcerned = $this->Concern_model->isConcerned($userid,$id);
            
            $otherportrait = $info->portrait;
            if(substr($otherportrait,0,1)=='"'){
                $otherportrait = substr($otherportrait,1,mb_strlen($otherportrait,'UTF8')-2);
            }

//        $birthday = $info->birthday;
//        $year=explode("-",$birthday)[0];
//        $age=date("Y")-$year;
//            $ok = false;
//            if(isset($_GET['ok'])){
//                $ok = true;
//            }
            
            $data = array(
                'id' => $info->id,
                'nickname' => ($info->nickname==null)?$info->email:$info->nickname,
                'otherportrait' => $otherportrait,
                'sex'  => $info->sex,
                'birthday'  => $info->birthday,
                'location' => $info->location,
                'introduction' => $info->introduction,
                'isFriend' => $isFriend,
                'isConcerned' => $isConcerned
            );
            
            $this->load->view('Otheruser.php',$data);
            
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function searchUser(){
        $username = $this->input->post("username");
        $this->form_validation->set_rules('username','Username','callback_username_check');

        if ($this->form_validation->run() == TRUE){
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');

            $data['type'] = 3;
            $data['username'] = $username;
            $data['content'] = '昵称为'.$username.'的用户：';
            
            $this->load->view('Info_list.php',$data);

        }else{
            if($_SESSION['auth']==1){
                $this->load->view('Navigation.php');
                $this->load->view('Friends_view.php');
            }else{
                $this->load->view('Manager_view.php');
            }
        }
    }
    
    public function getUserInfo(){
        $username = $_POST['data'];
        $query = $this->User_model->getUsers($username);
      
        $b = array();

        foreach ($query->result() as $row)
        {
            $birthday = $row->birthday;
            if($birthday!=""){
                $year=explode("-",$birthday)[0];
                $age=date("Y")-$year;
            }else{
                $age=0;
            }

            $portrait = $row->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'id' => $row->id,
                'name' => ($row->nickname==null)?$row->email:$row->nickname,
                'sex'  => $row->sex,
                'age'  => $age.'岁',
                'location' => $row->location,
                'portrait' => $portrait
            );
            $b[] = $element;
        }
        echo json_encode($b);
    }
    
    public function username_check($username){
        $query = $this->User_model->getUsers($username);

        if($query->num_rows()>0){
            return true;
        }else{
            $this->form_validation->set_message('username_check', '用户不存在');
            return FALSE;
        }
    }

    public function makeFriend(){
        $recipientid=$this->input->get("id");
        $senderid = $_SESSION['id'];

        $data = array(
            'recipientid' => $recipientid,
            'senderid' => $senderid,
            'sendtime' => date('Y-m-d H:i:s',strtotime("+7 hour")),
            'content' => '申请加你为好友',
            'status' => '未处理'
        );
        $this->Message_model->add($data);
        redirect('http://localhost/Sportsweb/index.php/Friends/otherUser?id='.$recipientid);
    }

    public function breakFriend(){
        $id=$this->input->get("id");
        $this->Friends_model->deleteFriend($_SESSION['id'],$id);
        if(isset($_GET['type'])){
            redirect('http://localhost/Sportsweb/index.php/Friends');
        }else{
            redirect('http://localhost/Sportsweb/index.php/Friends/otherUser?id='.$id);
        }
    }

    public function createConcern(){
        $id=$this->input->get("id");
        $this->Concern_model->addConcern($_SESSION['id'],$id);
        redirect('http://localhost/Sportsweb/index.php/Friends/otherUser?id='.$id);
    }

    public function cancelConcern(){
        $id=$this->input->get("id");
        $this->Concern_model->deleteConcern($_SESSION['id'],$id);
        if(isset($_GET['type'])){
            redirect('http://localhost/Sportsweb/index.php/Friends');
        }else{
            redirect('http://localhost/Sportsweb/index.php/Friends/otherUser?id='.$id);
        }
    }
    
    public function showActlist(){
        
        if(isset($_SESSION['id'])){
//            $id=$this->input->get("id");
            $id = $_SESSION['id'];
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }

            $username = $this->User_model->getName($id);
            if($username==''){
                $username = $this->User_model->getEmail($id);
            }
            
            $data['type'] = 0;
            $data['content'] = $username.'参加的活动：';
            
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Info_list.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function showConlist(){

        if(isset($_SESSION['id'])){
//            $id=$this->input->get("id");
            $id = $_SESSION['id'];
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            
            $username = $this->User_model->getName($id);
            if($username==''){
                $username = $this->User_model->getEmail($id);
            }

            $data['type'] = 1;
            $data['content'] = $username.'关注的用户：';
            
            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Info_list.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }
}