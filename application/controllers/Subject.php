<?php

/**
 * Created by PhpStorm.
 * User: demon
 * Date: 2016/12/2
 * Time: 8:16
 */
interface Subject
{
    public function attach(Observer $ob);
    public function detach(Observer $ob);
    public function notify();
}