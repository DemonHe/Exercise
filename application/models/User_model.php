<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/2
 * Time: 18:08
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function checkPassword($email,$password){

        $this->db->where('email',$email);
        $this->db->select('password');
        $query = $this->db->get('user');
        $row = $query->row();
        if (isset($row))
        {
            return ($row->password==$password);
        }else
            return false;
    }

    public function checkEmail($email){
        $this->db->where('email',$email);
        $this->db->select('*');
        $query = $this->db->get('user');
        $rows = $query->num_rows();
        if ($rows>0)
        {
            return true;
        }else{
            return false;
        }
    }

    public function addUser($email,$password,$nickname){
        $data = array(
            'id' => null,
            'email' => $email,
            'password' => $password,
            'nickname' => $nickname,
            'createAt' => date("Y-m-d H:i:s")
        );

        $this->db->insert('user', $data);
    }
    
    public function updateUser($id,$nickname,$sex,$location,$birthday,$introduction){
        
        $data = array(
            'nickname' => $nickname,
            'sex' => $sex,
            'location'=>$location,
            'birthday'=>$birthday,
            'introduction'=>$introduction
        );
        $this->db->where('id',$id);
        $this->db->update('user', $data);
    }

    public function getUserinfo($email){
        $this->db->where('email',$email);
        $this->db->select('*');
        $query = $this->db->get('user');
        $row = $query ->row();
        return $row;
    }

    public function getUserinfoById($id){
        $this->db->where('id',$id);
        $this->db->select('*');
        $query = $this->db->get('user');
        $row = $query ->row();
        return $row;
    }

    public function getUsers($name){
        $this->db->where('nickname',$name);
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query;
    }

    public function getName($id){
        $this->db->where('id',$id);
        $this->db->select('nickname');
        $query = $this->db->get('user');
        $row = $query ->row();
        return $row->nickname;
    }

    public function getEmail($id){
        $this->db->where('id',$id);
        $this->db->select('email');
        $query = $this->db->get('user');
        $row = $query ->row();
        return $row->email;
    }
    
    public function getPortrait($id){
        $this->db->where('id',$id);
        $this->db->select('portrait');
        $query = $this->db->get('user');
        $row = $query ->row();
        $portrait = $row->portrait;
        if(substr($portrait,0,1)=='"'){
            $portrait = substr($portrait,1,mb_strlen($portrait,'UTF8')-2);
        }
        return $portrait;
    }

    public function modifyPortrait($userid,$filename){
        $this->db->set('portrait',$filename);
        $this->db->where('id',$userid);
        $this->db->update('user');
    }

    public function updatePassword($id,$password){
        $this->db->set('password',$password);
        $this->db->where('id',$id);
        $this->db->update('user');
    }

    public function getAll(){
//        $this->db->select('*');
        $query = $this->db->query('select * from user where authority==1');
        return $query;
    }

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('user');
        $this->db->query('delete from friend where userid='.$id.' or friendid='.$id);
        $this->db->query('delete from concern where userid='.$id.' or concernid='.$id);
        $this->db->query('delete from exercise where userid='.$id);
        $this->db->query('delete from message where senderid='.$id.' or recipientid='.$id);
        $this->db->query('delete from moments where userid='.$id);
    }
    
    public function getAuth($id){
        $this->db->where('id',$id);
        $this->db->select('authority');
        $query = $this->db->get('user');
        return $query->row()->authority;
    }

    public function getGrade($id){
        $this->db->where('id',$id);
        $this->db->select('createAt');
        $query = $this->db->get('user');
        $createAt = $query->row()->createAt;
        $now =  date("Y-m-d H:i:s");
        $grade = floor((strtotime($now )-strtotime($createAt))/(60*60*24*20));
        return $grade;
    }

}