<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/1
 * Time: 16:10
 */
class Exerciseapi extends REST_Controller
{
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Exercise_model');
        $this->load->library('format');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['exercisedis_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['exercisedis_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['exercisedis_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['exercisetim_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['exercisetim_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['exercisetim_delete']['limit'] = 50; // 50 requests per hour per user/key

        $this->methods['exercisecal_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['exercisecal_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['exercisecal_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function exercisedis_post(){
        $id = $_SESSION['id'];
        if($_POST['data']!=0)
            $id = $_POST['data'];
//        $id = $this->get('id');
        $data = $this->Exercise_model->findAlldis($id);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function exercisetim_post(){
        $id = $_SESSION['id'];
        if($_POST['data']!=0)
            $id = $_POST['data'];
//        $id = $this->get('id');
        $data = $this->Exercise_model->findAlltim($id);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }

    public function exercisecal_post(){
        $id = $_SESSION['id'];
        if($_POST['data']!=0)
            $id = $_POST['data'];
//        $id = $this->get('id');
        $data = $this->Exercise_model->findAllcal($id);
        $this->set_response($data, REST_Controller::HTTP_OK);
    }
}