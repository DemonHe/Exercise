<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/6
 * Time: 10:40
 */
class Message_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function findAll($userid){
        $this->db->where('recipientid',$userid);
        $this->db->select('*');
        $this->db->order_by('sendtime', 'ASC');
        $query = $this->db->get('message');

        return $query;
    }

    public function add($data){
        $this->db->insert('message',$data);
    }

    public function changeStatus($id,$status){
        $this->db->where('id',$id);
        $this->db->set('status',$status);
        $this->db->update('message');
    }
    
    public function getRecipient($id){
        $this->db->where('id',$id);
        $this->db->select('senderid');
        $query = $this->db->get('message');

        return $query->row()->senderid;
    }

    public function getNum($userid){
        $query = $this->db->query("select count(*) as num from message where recipientid=".$userid." and status like '未%'");
        return $query->row()->num;
    }

}