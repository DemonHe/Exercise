<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/2
 * Time: 14:20
 */
class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){

        if(isset($_SESSION['id'])){
            $id = $_SESSION['id'];
            $data['portrait']=$this->User_model->getPortrait($id);
            $this->load->view('Manager_view.php',$data);
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }
    
    public function getAlluser(){
        
        $query = $this->User_model->getAll();
        $data=array();

        foreach ($query->result() as $row)
        {
            $birthday = $row->birthday;
            $year=explode("-",$birthday)[0];
            $age=date("Y")-$year;

            $portrait = $row->portrait;
            if(substr($portrait,0,1)=='"'){
                $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
            }

            $element=array(
                'id' => $row->id,
                'name' => $row->nickname,
                'sex'  => $row->sex,
                'age'  => $age,
                'portrait' => $portrait
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }
    
    public function deleteUser(){
        $id=$this->input->get("id");
        $this->User_model->delete($id);
        redirect('http://localhost/Sportsweb/index.php/Manager');
    }
}