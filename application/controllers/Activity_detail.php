<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/30
 * Time: 1:44
 */
class Activity_detail extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Activity_model");
        $this->load->model("User_model");
        $this->load->model("Friends_model");
        $this->load->model("Concern_model");
        $this->load->model("Message_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        if (isset($_SESSION['id'])) {
            $data['index'] = 2;

            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Activity_detail.php',$data);
        } else {
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }
    
    public function getIntro(){
        $id = $_POST['data'];
//        $name=$this->input->get("name");
        $result = $this->Activity_model->findInfo($id);
        $initiator = $result->userid;
        $username = $this->User_model->getName($initiator);
        $isJoined = $this->Activity_model->isJoined($id,$_SESSION['id']);
//        $isInitiator = ($_SESSION['id']==$initiator);
        $query = $this->Activity_model->findParticipant($id);
        $num = $query->num_rows();
        
        $par = array();
        foreach($query->result() as $row){
            $rt = $this->User_model->getUserinfoById($row->participantid);
            $element = array(
                'id' => $rt->id,
                'nickname' => $rt->nickname,
                'portrait' => $rt->portrait
            );
            $par[] = $element;
        }

        $postername = $result->poster;
        if(substr($postername,0,1)=='"'){
            $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
        }
        
        $data=array(
            'id' => $id,
            'name' => $result->name,
            'num' => $num,
            'participants' => $par,
            'username' => $username,
            'postername' => $postername,
            'starttime'  => substr($result->starttime,0,16),
            'endtime'  => substr($result->endtime,0,16),
            'description' => $result->description,
            'isJoined' => $isJoined,
            'auth' => $_SESSION['auth']
        );
        echo json_encode($data);
    }

    public function getParticipant(){
        $userid = $_SESSION['id'];
        $id = $_POST['data'];
        $query = $this->Activity_model->findParticipant($id);
        $data = array();

        foreach ($query->result() as $row){
            $a = $this->User_model->getUserinfoById($row->participantid);
            
            $birthday = $a->birthday;
            $year=explode("-",$birthday)[0];
            $age=date("Y")-$year;

            $portrait = $a->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $isFriend = $this->Friends_model->isFriend($userid,$id);
            $isConcerned = $this->Concern_model->isConcerned($userid,$id);
            
            $element = array(
                'id' => $a->id,
                'name' => $a->nickname,
                'sex'  => $a->sex,
                'age'  => $age,
                'portrait' => $portrait,
                'isFriend' => $isFriend,
                'isConcerned' => $isConcerned
            );
            $data[] = $element;
        }
        echo json_encode($data);
    }

    public function showParlist(){

        if(isset($_SESSION['id'])){
//            $id=$this->input->get("id");
            $id = $_SESSION['id'];

            $data['type'] = 2;

            if($_SESSION['auth']==1)
                $this->load->view('Navigation.php');
            $this->load->view('Info_list.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function cancel(){
        $id = $this->input->get("id");
        $this->Activity_model->delete($id);
        redirect("http://localhost/Sportsweb/index.php/Activity");
    }

    public function quit(){
        $id = $this->input->get("id");
        $this->Activity_model->quit($id,$_SESSION['id']);
        redirect("http://localhost/Sportsweb/index.php/Activity");
    }

    public function join(){
        $id = $this->input->get("id");
        $this->Activity_model->addParticipant($id,$_SESSION['id']);
        redirect("http://localhost/Sportsweb/index.php/Activity");
    }

    public function modify(){
        $this->form_validation->set_rules('stime','Time','callback_time_check');
        $this->form_validation->set_rules('name','Name','callback_name_check');

        if ($this->form_validation->run() == TRUE){
            $id = $this->input->get("id");
            $name = $this->input->post('name');
            $stime = $this->input->post('stime');
            $etime = $this->input->post('etime');
            $description = $this->input->post('description');

//            $data = array(
//                'name' => $name,
//                'starttime'  => $stime,
//                'endtime'  => $etime,
//                'description' => $description
//            );

            $this->Activity_model->modify($id,$name,$stime,$etime,$description);
            redirect("http://localhost/Sportsweb/index.php/Activity");
        }else{
            $this->goTomodify();
        }
    }
    
    public function goTomodify(){
        $id=$this->input->get("id");
        $result = $this->Activity_model->findInfo($id);
        $query = $this->Activity_model->findParticipant($id);
        $num = $query->num_rows();
        
        $par = array();
        $i = 0;
        foreach ($query->result() as $row){
            $info = $this->User_model->getUserinfoById($row->participantid);
            $portrait = $info->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }
            
            $element = array(
                'userid' => $info->id,
                'nickname' => $info->nickname,
                'portrait' => $portrait
            );
            $par[$i] = $element;
            $i++;
        }

        $userid = $_SESSION['id'];
        $userportrait = $this->User_model->getPortrait($userid);
        $postername = $result->poster;
        if(substr($postername,0,1)=='"'){
            $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
        }

        $data=array(
            'id' => $id,
            'name' => $result->name,
            'postername' => $postername,
            'num' => $num,
            'participants' => $par,
            'starttime'  => substr($result->starttime,0,16),
            'endtime'  => substr($result->endtime,0,16),
            'description' => $result->description,
            'userportrait' => $userportrait,
            'index' => 2
        );
        
        $this->load->view('Navigation.php');
        $this->load->view('Activity_modify.php',$data);
    }

    public function upload_file(){
        $config['upload_path']      = 'img/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 0;
        $config['max_width']        = 0;
        $config['max_height']       = 0;

        $this->load->library('upload', $config);

        if ( $this->upload->do_upload('poster')){
            $a['upload_data']=$this->upload->data();  //文件的一些信息
            $filename=$a['upload_data']['file_name'];           //取得文件名
            $id=$this->input->get("id");
            $this->Activity_model->modifyPortrait($id,$filename);
            redirect("http://localhost/Sportsweb/index.php/Activity_detail/goTomodify?id=".$id);
        }else{
            echo $this->upload->display_errors();
        }
    }

    function time_check($stime){
//        $stime=$this->input->post('stime');
        $etime=$this->input->post('etime');
        if(strtotime($stime)<strtotime($etime)){
            return true;
        }else{
            $this->form_validation->set_message('time_check', '开始时间晚于结束时间');
            return false;
        }
    }

    function name_check($name){
        $isok = $this->Activity_model->isNameOK($name,$this->input->get("id"));

        if($isok){
            return true;
        }else{
            $this->form_validation->set_message('name_check', '该活动已存在');
            return false;
        }
    }
}