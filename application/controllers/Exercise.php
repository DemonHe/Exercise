<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
//
//// This can be removed if you use __autoload() in config.php OR use Modular Extensions
//require 'Observer.php';
//require 'Message_sub.php';
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/4
 * Time: 0:21
 */
class Exercise extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("Exercise_model");
        $this->load->model("User_model");
    }

    public function index(){
        if(isset($_SESSION['id'])){
            $this->load();
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function load(){
        $id = $_SESSION['id'];
//        $data['mpicture'] = $pname;
        $this->load->view('Navigation.php');

        $row = $this->Exercise_model->findGoal($id)->row();
        if($row!=null){
            $data['distance'] = ($row->distance==null)?0:$row->distance;
            $data['time'] = ($row->time==null)?0:$row->time;
            $data['heat'] = ($row->heat==null)?0:$row->heat;
        }else{
            $data['distance'] = 0;
            $data['time'] = 0;
            $data['heat'] = 0;
        }


        $a = $this->Exercise_model->findTotalInfo($id);

        $data['index']=1;
        $b = $this->Exercise_model->findSum($id);

        if($b!=null){
            $a['ad'] = ($b['d']==null)?0:$b['d'];
            $a['at'] = ($b['t']==null)?0:$b['t'];
            $a['ac'] = ($b['c']==null)?0:$b['c'];
        }else{
            $a['ad'] = 0;
            $a['at'] = 0;
            $a['ac'] = 0;
        }

        $data['total']=$a;
        
        $this->load->view('Exercise_view.php',$data);
    }

    public function modifyGoal(){
        $type=$this->input->post('goaltype');
        $goal=$this->input->post('goal');
        $this->Exercise_model->setGoal($_SESSION['id'],$type,$goal);
        redirect('http://localhost/Sportsweb/index.php/Exercise');
    }
    
    public function getRank(){
        $id = $_SESSION['id'];
        $query = $this->Exercise_model->getAllSum($id);
        $data = array();
        
        foreach ($query->result() as $row)
        {
            $userid = $row->userid;
            $temp = $this->User_model->getUserinfoById($userid);

            $birthday = $temp->birthday;
            if($birthday!=""){
                $year=explode("-",$birthday)[0];
                $age=date("Y")-$year;
            }else{
                $age=0;
            }

            $portrait = $temp->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'id' => $temp->id,
                'name' => $temp->nickname,
                'sex'  => $temp->sex,
                'age'  => $age.'岁',
                'portrait' => $portrait,
                'distance' => $row->d
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }
    
    public function test(){
        $d = date("Y-m-d");
        $d = date("Y-m-d",strtotime("$d   -401   day"));

        for($i=0;$i<200;$i++){
            $r1 = rand(0,24);
            $r2 = rand(0,60);
            $d = date("Y-m-d H:i:s",strtotime("$d   +1   day +$r1 hour + $r2 minute"));
            $data = array(
                'userid' => 15,
                'timeAt' => $d,
                'distance'  => rand(0,100),
                'timelength'  => rand(0,24),
                'calorie' => rand(0,5000)
            );
            $this->Exercise_model->insert($data);
        }
    }

}