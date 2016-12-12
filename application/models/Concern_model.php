<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/6
 * Time: 10:41
 */
class Concern_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addConcern($uid,$fid){
        if(!$this->isConcerned($uid,$fid)){
            $data = array(
                'userid' => $uid,
                'concernid' => $fid
            );

            $this->db->insert('concern',$data);
        }
    }

    public function deleteConcern($uid,$fid){
        $this->db->where('userid', $uid);
        $this->db->where('concernid', $fid);
        $this->db->delete('concern');
    }
    
    public function getAllConcerns($id){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;

        $this->db->where('userid',$id);
        $this->db->select('concernid');
        $query = $this->db->get('concern');
        return $query;
        
    }

    public function isConcerned($id,$userid){
        $this->db->where('userid',$id);
        $this->db->where('concernid',$userid);
        $this->db->select('*');
        $query = $this->db->get('concern');
        if($query->num_rows()>0){
            return true;
        }else{
            return false;
        }
    }

    public function getFans($id){
        $query = $this->db->query('select * from concern where concernid='.$id);
        return $query;
    }
}