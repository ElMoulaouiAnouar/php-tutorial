<?php 
/*
1.  Getting started by Examples
Let's get started with examples on:

Defining a class with private member variables, constructor, destructor, public getters/setters and public methods;
Allocating instances instances of the class;
Accessing instance's variable/functions.
1.1  Example: MyCircle Class
We shall begin with a class called MyCircle, which models a circle with a specific radius, as shown in the following class diagram.
Example Diagram to line : https://personal.ntu.edu.sg/ehchua/programming/webprogramming/php5_OOP.html 
*/

class MyCircle{
    private $radius;

    public function getRadius(){
        return $this->radius;
    }

    public function setRadius($value){
       if(preg_match('/^\d+$/i',$value)){
            $this->radius = $value;
            return;
       }
       throw new Exception("can not add value radius not number");
    }

    public function __construct($radius = 1)
    {
        $this->radius = $radius;
    }

    public function __destruct()
    {
        echo PHP_EOL.'destruct of this class '.__CLASS__;
    }

    public function getArea(){
        return round($this->radius*$this->radius * pi(),3);
    }
    public function __toString()
    {
        return $this->getRadius();
    }
}

$cl = new MyCircle(1.1);
echo $cl->getArea();