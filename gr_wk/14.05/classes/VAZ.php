<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.18
 * Time: 21:02
 */

namespace Classes;


class VAZ extends Auto
{
    protected $price;
    protected $model;
    protected $color;
    protected $country;

    protected function getCountry()
    {
        return $this->country;

    protected function getPrice()
    {
        return $this->price; // TODO: Implement getPrice() method.
    }

    protected function getModel()
    {
        return $this->model; // TODO: Implement getModel() method.
    }

    protected function getColor()
    {
        return $this->color; // TODO: Implement getType() method.
    }
}