<?php
class Human
{
	static $hands = '2';
	static $legs = '2';

	public $age;

	public $name;
     
    public function getName() { 
         return $this->name; 
     } 
    public function setName($name) { 
         $this->name = $name; 
     }

    public function getAge() { 
         return $this->age; 
     } 
    public function setName($age) { 
         $this->name = $age; 
     }

    public function WhoIAm()
    {
    	return null;
    }
}