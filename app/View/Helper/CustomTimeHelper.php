<?php

App::uses('AppHelper', 'View/Helper');
App::uses('TimeHelper', 'View/Helper');

class CustomTimeHelper extends TimeHelper
{
    public $helpers = array('Html', 'Time');

    public function tag($date, $attributes = array())
    {
        if(!is_numeric($date))
        {
            $date = strtotime($date);
        }

        $attributes = array_merge(
            array('datetime' => date(DateTime::W3C, $date)),
            $attributes
        );

        $attr_str = "";
        foreach($attributes as $attribute => $value)
        {
            $attr_str.= $attribute.'="'.$value.'" ';
        }

        return '<time '.$attr_str.'>'.$this->niceShort($date).'</time>';
    }
}
