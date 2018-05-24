<?php
class W extends Humen
{
	public $sex = 'Женщина';
	public $food = 'Мороженное'

	public  function getSex() { 
        return $this->sex; 
    }

   	public  function getFood() { 
        return $this->food; 
    }

    public function WhoIAm()
    {
    	return this->sex;
    }
}