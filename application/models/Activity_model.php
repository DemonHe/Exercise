<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/3
 * Time: 23:44
 */
class Activity_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllActivities(){
        $now = date("Y-m-d H:i:s");
//        $this->db->distinct();
//        $this->db->select('id, name, poster, userid,starttime, endtime');
//        $query = $this->db->get('activity');
        $query = $this->db->query('select distinct id,userid,name,poster,starttime,endtime from activity where endtime>="'.$now.'"');
        return $query;
    }

    public function getJoinedActivities($userid){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;
        
        $this->db->where('participantid',$userid);
        $this->db->select('activityid');
        $res = $this->db->get('activity_participant');
        $now = date("Y-m-d H:i:s");

        $data = array();

        if($res!=null){
            foreach ($res->result() as $row){
                $id = $row->activityid;
                $query = $this->db->query('select * from activity where id='.$id.' and endtime>="'.$now.'"')->row();

                if($query!=null){
                    $postername = $query->poster;
                    if(substr($postername,0,1)=='"'){
                        $postername = substr($postername,1,mb_strlen($postername,'UTF8')-2);
                    }

                    $element=array(
                        'name' => $query->name,
                        'id' => $query->id,
                        'postername' => $postername,
                        'starttime'  => substr($query->starttime,0,16),
                        'endtime'  => substr($query->endtime,0,16)
                    );
                    $data[] = $element;
                }
            }

//            $this->db->where('id',$id);
//            $this->db->select('*');
//            $query = $this->db->get('activity');

//            return $query;
        }
//        else{
//            return array();
//        }

        return $data;

    }

    public function getCreateActivities($userid){
//        $this->db->where('email',$email);
//        $this->db->select('id');
//        $query = $this->db->get('user');
//        $userid = $query ->row()->id;

//        $this->db->where('userid',$userid);
//        $this->db->distinct();
//        $this->db->select('id, name, poster, starttime, endtime');
//        $query = $this->db->get('activity');
        $now = date("Y-m-d H:i:s");
        $query = $this->db->query('select distinct id,name,userid,poster,starttime,endtime from activity where userid='.$userid.' and endtime>="'.$now.'"');

        return $query;
    }

    public function isExist($name){
        $this->db->where('name',$name);
        $this->db->select('*');
        $query = $this->db->get('activity');
        return ($query->num_rows()>0);
    }

    public function isNameOK($name,$id){
        $this->db->where('name',$name);
        $this->db->select('id');
        $query = $this->db->get('activity');
        foreach ($query->result() as $row){
            if($row->id!=$id){
                return false;
            }
        }
        return true;
    }

    public function getActByName($name){
        $this->db->where('name',$name);
        $this->db->select('*');
        $query = $this->db->get('activity');
        
        return $query;
    }
    
    public function findInfo($id){
        $this->db->where('id',$id);
        $this->db->select('*');
        $query = $this->db->get('activity');
        return $query->row();
    }

    public function findParticipant($id){
        $this->db->where('activityid',$id);
        $this->db->select('participantid');
        $query = $this->db->get('activity_participant');
        return $query;
    }
    
    public function isJoined($acid,$userid){
        $this->db->where('activityid',$acid);
        $this->db->where('participantid',$userid);
        $this->db->select('*');
        $query = $this->db->get('activity_participant');
        if($query->num_rows()>0)
            return true;
        return false;
    }

    public function add($data){
        $this->db->insert('activity', $data);
    }

    public function delete($id){
        $this->db->where('activityid',$id);
        $this->db->select('participantid');
        $query = $this->db->get('activity_participant');

        $this->db->where('activityid',$id);
        $this->db->delete('activity_participant');

        $this->db->where('id',$id);
        $this->db->delete('activity');
    }

    public function modify($id,$name,$stime,$etime,$description){
        $this->db->where('id', $id);
        $this->db->set('name', $name);
        $this->db->set('starttime', $stime);
        $this->db->set('endtime', $etime);
        $this->db->set('description', $description);
        $this->db->update('activity');
    }

    public function modifyPortrait($id,$filename){
        $this->db->set('poster',$filename);
        $this->db->where('id',$id);
        $this->db->update('activity');
    }

    public function addParticipant($id,$userid){
        $data = array(
            'id' => null,
            'activityid' => $id,
            'participantid' => $userid
        );
        $this->db->insert('activity_participant', $data);
    }

    public function quit($id,$userid){
        $this->db->where('activityid',$id);
        $this->db->where('participantid',$userid);
        $this->db->delete('activity_participant');
    }

    public function getPnum($userid){

        $stime = date("Y-m-d").' 00:00:00';
        $etime = date("Y-m-d").' 23:59:59';
        $query = $this->db->query('select * from activity where userid='.$userid.' and createAt>="'.$stime.'" and createAt<="'.$etime.'"');
        return $query->num_rows();
    }
}