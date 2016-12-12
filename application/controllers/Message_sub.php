<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require 'Subject.php';
/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/2
 * Time: 8:13
 */
class Message implements Subject
{
    private $observers = array();
    private static $instance = null;
    
    private function _construct(){
//        $this->observers = array();
    }

    public static function getInstance(){
        if(!(self::$instance instanceof self)){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public function attach(Observer $ob)
    {
        return array_push($this->observers,$ob);
    }

    public function detach(Observer $ob)
    {
        $index = array_search($ob,$this->observers);
        
        if($index==FALSE||!array_key_exists($index,$this->observers)){
            return FALSE;
        }
        
        unset($this->observers[$index]);
        return TRUE;
    }

    public function notify()
    {
        if(!is_array($this->observers)){
            return FALSE;
        }
        
        foreach ($this->observers as $observer){
            $observer->update();
        }
        return TRUE;
    }
}