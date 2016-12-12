<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/1
 * Time: 15:39
 */
class Activityapi extends REST_Controller
{
    function __construct() {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Activity_model');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['activities_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['activities_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['activities_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    public function getAll()
    {
        $query = $this->Activity_model->getAllActivities();
        $data = array();

        foreach ($query->result() as $row) {
            $initiator = $row->userid;
            $isInitiator = ($_SESSION['id'] == $initiator);
            $postername = $row->poster;
            if (substr($postername, 0, 1) == '"') {
                $postername = substr($postername, 1, mb_strlen($postername, 'UTF8') - 2);
            }

            $element = array(
                'name' => $row->name,
                'id' => $row->id,
                'postername' => $postername,
                'starttime' => substr($row->starttime, 0, 16),
                'endtime' => substr($row->endtime, 0, 16),
                'isInitiator' => $isInitiator
            );
            $data[] = $element;
        }
        $this->response($data, REST_Controller::HTTP_OK);
    }

}