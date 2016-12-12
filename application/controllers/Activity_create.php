<?php
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/29
 * Time: 20:08
 */
class Activity_create extends CI_Controller
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
            $id = $_SESSION['id'];
            $pnum = $this->Activity_model->getPnum($id);
            $grade = $this->User_model->getGrade($id);

            if($pnum>=(($grade+1)*2)){
                redirect('http://localhost/Sportsweb/index.php/Activity?over=true');
            }else{
                $data['index'] = 2;
                $this->load->view('Navigation.php');
                $this->load->view('Activity_publish.php',$data);
            }

        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function publish(){

        $this->form_validation->set_rules('stime','Time','callback_time_check');
        $this->form_validation->set_rules('name','Name','callback_name_check');

        if ($this->form_validation->run() == TRUE){
            $name=$this->input->post('name');
            $stime=$this->input->post('stime');
            $etime=$this->input->post('etime');
            $description=$this->input->post('description');

            $config['upload_path']      = 'img/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config['max_size']     = 0;
            $config['max_width']        = 0;
            $config['max_height']       = 0;

            $this->load->library('upload', $config);
            $this->upload->do_upload('poster');
            $a['upload_data']=$this->upload->data();  //文件的一些信息
            $filename=$a['upload_data']['file_name'];           //取得文件名
            if($filename==null){
                $filename = "bg.jpg";
            }

            $data = array(
                'id' => null,
                'userid' => $_SESSION['id'],
                'name' => $name,
                'poster' => $filename,
                'starttime' => $stime,
                'endtime' => $etime,
                'description' => $description,
                'createAt' => date("Y-m-d H:i:s")
            );
//              echo $filename;
            $this->Activity_model->add($data);
            redirect("http://localhost/Sportsweb/index.php/Activity");
        }else{
            $data['index'] = 2;
            $data['description'] = $this->input->post('description');
            $this->load->view('Navigation.php');
            $this->load->view('Activity_publish.php',$data);
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
        $exist = $this->Activity_model->isExist($name);
        
        if($exist){
            $this->form_validation->set_message('name_check', '该活动已存在');
            return false;
        }else{
            return true;
        }
    }
}