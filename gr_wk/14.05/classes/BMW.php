<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.18
 * Time: 21:08
 */

namespace Classes;


class BMW extends Auto
{
    protected $price;
    protected $model;
    protected $color;
    protected $country;


    protected function getModel()
    {
        return $this->price // TODO: Implement getModel() method.
    }

    protected function getPrice()
    {
        return $this->price // TODO: Implement getPrice() method.
    }
    
    protected function getColor()
    {
        return $this->price // TODO: Implement getColor() method.
    }
}