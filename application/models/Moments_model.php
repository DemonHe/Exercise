<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/6
 * Time: 10:40
 */
class Moments_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function findAll(){
        $this->db->select('*');
        $this->db->order_by('publishtime', 'ASC');
        $query = $this->db->get('moments');

        return $query;
    }

    public function findMine($userid){
        $this->db->where('userid',$userid);
        $this->db->select('*');
        $this->db->order_by('publishtime', 'ASC');
        $query = $this->db->get('moments');

        return $query;
    }
    
    public function add($data){
        $this->db->insert('moments',$data);
    }
}