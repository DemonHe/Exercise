<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/11/4
 * Time: 0:20
 */
class Exercise_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function setGoal($id,$type,$goal){
        $date = date("Y-m-d");
        $w = date("w")-1;
        if($w==-1){
            $w=6;
        }
        $sd =  date("Y-m-d H:i:s",strtotime("$date   -$w   day"));
        $ed =  date("Y-m-d H:i:s",strtotime("$sd   +6   day +23 hour +59 minute +59 seconds"));

        $ch = 'heat';
        if($type==0){
            $ch = 'distance';
        }
        if($type==1){
            $ch = 'time';
        }

        $query = $this->db->query('select * from goal where userid ='.$id.' and settime>="'.$sd.'" and settime<="'.$ed.'"');

        if($query->num_rows()>0){
            $row = $query->row();
            $this->db->where('id',$row->id);
            $this->db->set('settime',date("Y-m-d"));
            $this->db->set($ch,$goal);
            $this->db->update("goal");echo "##";
        }else{
            $this->db->insert("goal",array(
                'userid' => $id,
                'settime' => date("Y-m-d"),
                $ch => $goal
            ));
        }
    }
    
    public function findGoal($id){
        $date = date("Y-m-d");
        $w = date("w")-1;
        if($w==-1){
            $w=6;
        }
        $sd =  date("Y-m-d H:i:s",strtotime("$date   -$w   day"));
        $ed =  date("Y-m-d H:i:s",strtotime("$sd   +6   day +23 hour +59 minute +59 seconds"));

        $query = $this->db->query('select * from goal where userid ='.$id.' and settime>="'.$sd.'" and settime<="'.$ed.'"');
        return $query;
    }
    
    public function findTotalInfo($id){
        $date = date("Y-m-d");
        $w = date("w")-1;
        if($w==-1){
            $w=6;
        }
        $sd1 =  date("Y-m-d H:i:s",strtotime("$date   -$w   day"));
        $ed1 =  date("Y-m-d H:i:s",strtotime("$sd1   +6   day +23 hour +59 minute +59 seconds"));

        $query1 = $this->db->query('select sum(distance) as d,sum(timelength) as t,sum(calorie) as c from exercise where userid='
        .$id.' and timeAt>="'.$sd1.'" and timeAt<="'.$ed1.'"');

        $m = date("d")-1;
        $sd2 =  date("Y-m-d H:i:s",strtotime("$date   -$m   day"));
        $ed2 =  date("Y-m-d H:i:s",strtotime("$sd2   +1   month"));

        $query2 = $this->db->query('select sum(distance) as d,sum(timelength) as t,sum(calorie) as c from exercise where userid='
        .$id.' and timeAt>="'.$sd2.'" and timeAt<="'.$ed2.'"');
        
//        $m = date("Y");
        $sd3 =  date("Y-m-d H:i:s",strtotime(substr($date,0,4).'-01-01'));
        $ed3 =  date("Y-m-d H:i:s",strtotime("$sd3   +1   year"));

        $query3 = $this->db->query('select sum(distance) as d,sum(timelength) as t,sum(calorie) as c from exercise where userid='
        .$id.' and timeAt>="'.$sd3.'" and timeAt<="'.$ed3.'"');
        
        $data = array(
            'wd' => $query1->row()->d,
            'wt' => $query1->row()->t,
            'wc' => $query1->row()->c,
            'md' => $query2->row()->d,
            'mt' => $query2->row()->t,
            'mc' => $query2->row()->c,
            'yd' => $query3->row()->d,
            'yt' => $query3->row()->t,
            'yc' => $query3->row()->c
        );
        
        return $data;
    }

    public function findSum($id){
        $query = $this->db->query('select sum(distance) as d,sum(timelength) as t,sum(calorie) as c from exercise where userid='.$id);

        $data = array(
            'd' => $query->row()->d,
            't' => $query->row()->t,
            'c' => $query->row()->c
        );

        return $data;
    }

    public function getAllSum($id){
//        $query = $this->db->query('select * from friend where ');
        $query = $this->db->query('select exercise.userid as userid,sum(distance) as d from exercise where exercise.userid='.$id.
            ' or exercise.userid in (select friend.friendid from friend where userid='.$id.
            ') group by exercise.userid order by d DESC');
        
        return $query;
    }

    public function findAlldis($id){
        $this->db->where('userid',$id);
        $this->db->select('timeAt,distance');
        $this->db->order_by('timeAt', 'ASC');
        $query = $this->db->get('exercise');
        $data=array();
        
        foreach ($query->result() as $row)
        {
            $element=array(
                'time' => $row->timeAt,
                'distance' =>  $row->distance
            );
            $data[] = $element;
        }
        return $data;
    }

    public function findAlltim($id){
        $this->db->where('userid',$id);
        $this->db->select('timeAt,timelength');
        $this->db->order_by('timeAt', 'ASC');
        $query = $this->db->get('exercise');
        $data=array();

        foreach ($query->result() as $row)
        {
            $element=array(
                'time' => $row->timeAt,
                'timelength' =>  $row->timelength
            );
            $data[] = $element;
        }
        return $data;
    }
    
    public function findAllcal($id){
        $this->db->where('userid',$id);
        $this->db->select('timeAt,calorie');
        $this->db->order_by('timeAt', 'ASC');
        $query = $this->db->get('exercise');
        $data=array();

        foreach ($query->result() as $row)
        {
            $element=array(
                'time' => $row->timeAt,
                'calorie' =>  $row->calorie
            );
            $data[] = $element;
        }
        return $data;
    }

    public function insert($data){
        $this->db->insert("exercise",$data);
//        $this->db->where("userid",1);
//        $this->db->where("id",$id);
//        $this->db->set("timeAt",$data);
//        $this->db->update("exercise");
    }
}