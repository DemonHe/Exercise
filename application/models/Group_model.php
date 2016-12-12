<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:47
 */
class Group_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllGroups(){

        $this->db->distinct();
        $this->db->select('id, name, poster');
        $query = $this->db->get('group');
        return $query;
    }

    public function getJoinedGroups($userid){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;

        $this->db->where('participantid',$userid);
        $this->db->select('*');
        $query = $this->db->get('group');
        return $query;
    }

    public function getCreateGroups($userid){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;

        $this->db->where('userid',$userid);
        $this->db->distinct();
        $this->db->select('id, name, poster');
        $query = $this->db->get('group');
        return $query;
    }

    public function find(){

    }

    public function add(){

    }

    public function delete(){

    }

    public function removefrom(){

    }

}