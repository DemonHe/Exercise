<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:36
 */
class Group extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("Group_model");
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
        if(isset($_SESSION['id'])){
//            $id = $_SESSION['id'];
//            $data=$this->User_model->getUserinfoById($id);
            $this->load->view('Group_view.php');
        }else{
            redirect('http://localhost/Sportsweb/index.php/Login');
        }
    }

    public function getAll(){
        $query = $this->Group_model->getAllGroups();
        $data=array();

        foreach ($query->result() as $row)
        {
            $element=array(
                'name' => $row->name
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function getJoin(){
        $id = $_SESSION['id'];
//        $email = $_POST['data'];
        $query = $this->Group_model->getJoinedGroups($id);
        $data=array();

        foreach ($query->result() as $row)
        {
            $element=array(
                'name' => $row->name
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function getCreate(){
        $id = $_SESSION['id'];
//        $email = $_POST['data'];
        $query = $this->Group_model->getCreateGroups($id);
        $data=array();

        foreach ($query->result() as $row)
        {
            $element=array(
                'name' => $row->name
            );
            $data[] = $element;
        }

        echo json_encode($data);
    }

    public function create(){

    }

    public function dismiss(){

    }

    public function search(){

    }

    public function quit(){
        
    }
}