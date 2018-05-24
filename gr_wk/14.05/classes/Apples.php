<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 14.05.18
 * Time: 20:43
 */

namespace Classes;


class Apples implements Product
{
    protected $price;
    protected $Quantity;
    protected $form;

    public function __construct($price, $quanttity, $form)
    {
        $this->form = $form;
        $this->price = $price;
        $this->Quantity = $quanttity;

    }

    public function getPrice()
    {
        return $this->price;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }
    public function getForm()
    {
        return $this->form;
    }

}