<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.18
 * Time: 20:57
 */

namespace Classes;


abstract class Auto
{

    protected $price;
    protected $model;
    protected $color;

    abstract protected function getModel();
    abstract protected function getPrice();
    abstract protected function getColor();

    public function setAuto()
    {
        
    }
}