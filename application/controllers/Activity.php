<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:12
 */
class Activity extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Activity_model");
        $this->load->model("User_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['id'])){
            
//            $id = $_SESSION['id'];
            $data['index'] = 2;
            $this->load->view('Navigation.php');
            $this->load->view('Activity_view.php',$data);

            if(isset($_GET['over'])){
                echo '<script>alert("您发布的任务已达上限");</script>';
            }
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function getAll(){
        $query = $this->Activity_model->getAllActivities();
        $data=array();

        foreach ($query->result() as $row)
        {
            $initiator = $row->userid;
            $isInitiator = ($_SESSION['id']==$initiator);
            $postername = $row->poster;
            if(substr($postername,0,1)=='"'){
                $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
            }

            $element=array(
                'name' => $row->name,
                'id' => $row->id,
                'postername' => $postername,
                'starttime'  => substr($row->starttime,0,16),
                'endtime'  => substr($row->endtime,0,16),
                'isInitiator' => $isInitiator
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function getJoin(){
        $id = $_SESSION['id'];
        if(isset($_POST['data'])&&$_POST['data']!=0)
            $id = $_POST['data'];
//        $email = $_POST['data'];
        $data = $this->Activity_model->getJoinedActivities($id);
//        $data=array();
//
//        if($query!=array()){
//            foreach ($query->result() as $row)
//            {
//                $postername = $row->poster;
//                if(substr($postername,0,1)=='"'){
//                    $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
//                }
//                
//                $element=array(
//                    'name' => $row->name,
//                    'id' => $row->id,
//                    'postername' => $postername,
//                    'starttime'  => substr($row->starttime,0,16),
//                    'endtime'  => substr($row->endtime,0,16)
//                );
//                $data[] = $element;
//            }
//        }

        echo json_encode($data);
    }

    public function getCreate(){
        $id = $_SESSION['id'];
//        $email = $_POST['data'];
        $query = $this->Activity_model->getCreateActivities($id);
        $data=array();

        foreach ($query->result() as $row)
        {
            $postername = $row->poster;
            if(substr($postername,0,1)=='"'){
                $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
            }
            
            $element=array(
                'name' => $row->name,
                'id' => $row->id,
                'postername' => $postername,
                'starttime'  => substr($row->starttime,0,16),
                'endtime'  => substr($row->endtime,0,16)
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function searchAct()
    {
        $id = $_SESSION['id'];
        $actname = $this->input->post("actname");
        $this->form_validation->set_rules('actname', 'Actname', 'callback_actname_check');

        if ($this->form_validation->run() == TRUE) {
            $query = $this->Activity_model->getActByName($actname);
            $row = $query->row();

            if($id==$row->userid){
                redirect("http://localhost/Sportsweb/index.php/Activity_detail/goTomodify?id=".$row->id);
            }else{
                redirect("http://localhost/Sportsweb/index.php/Activity_detail?id=".$row->id);
            }

        } else {

            $data['index'] = 2;
            $this->load->view('Navigation.php');
            $this->load->view('Activity_view.php', $data);
        }
    }

    public function actname_check($actname){
        $query = $this->Activity_model->getActByName($actname);

        if($query->num_rows()>0){
            return true;
        }else{
            $this->form_validation->set_message('actname_check', '活动不存在');
            return FALSE;
        }
    }
}