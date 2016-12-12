<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/4
 * Time: 0:01
 */
class Friends_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function addFriend($uid,$fid){
        if(!$this->isFriend($uid,$fid)){
            $data = array(
                'userid' => $uid,
                'friendid' => $fid
            );

            $this->db->insert('friend',$data);

            $data = array(
                'userid' => $fid,
                'friendid' => $uid
            );

            $this->db->insert('friend',$data);
        }
    }

    public function deleteFriend($uid,$fid){
        $this->db->where('userid', $uid);
        $this->db->where('friendid', $fid);
        $this->db->delete('friend');

        $this->db->where('userid', $fid);
        $this->db->where('friendid', $uid);
        $this->db->delete('friend');
    }

    public function getAllFriends($id){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;

        $this->db->where('userid',$id);
        $this->db->select('friendid');
        $query = $this->db->get('friend');
        return $query;
    }

    public function isFriend($id,$userid){

        $query = $this->db->query('select count(*) as c from friend where userid='.$id.' and friendid='.$userid);
        if($query->row()->c>0){
            return true;
        }else{
            
            $query2 = $this->db->query('select count(*) as c from friend where userid='.$userid.' and friendid='.$id);
            if($query2->row()->c>0){
                return true;
            }else{
                return false;
            }
        }
    }
}