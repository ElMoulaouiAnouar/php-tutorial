<?php 
/*

Example 2: MyTime Class 

description exmple to image phpMyTimeClass


*/

class MyTime{
    //attribute
    private $hour ;
    private $minute ;
    private $second ;

    #constructor
    public function __construct($hour,$minute,$second)
    {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function __destruct()
    {
        echo PHP_EOL.'destructor of class '.__CLASS__.PHP_EOL;
    }

    public function getHour(){
        return $this->hour;
    }
    
    public function getMinute(){
        return $this->minute;
    }
    
    public function getSecond(){
        return $this->second;
    }

    private function checkOfValueBetween0and60($value){
        if($value >=0 || $value < 60){
            return true;
        }
        else{
            return false;
        }
    } 

    public function setHour($value){
        if($this->checkOfValueBetween0and60($value)){
            $this->hour= $value;
        }
        else{
            throw new InvalidArgumentException('hour inccorrect');
        }
    }
    public function setMinute($value){
        if($this->checkOfValueBetween0and60($value)){
            $this->minute= $value;
        }
        else{
            throw new InvalidArgumentException('minute inccorrect');
        }
    }
    public function setSecond($value){
        if($this->checkOfValueBetween0and60($value)){
            $this->second= $value;
        }
        else{
            throw new InvalidArgumentException('second inccorrect');
        }
    }
    

    public function setTime($hour,$minute,$second){
        $this = new MyTime($hour,$minute,$second);
       // $this::__construct($hour,$minute,$second);
    }

    public function __toString()
    {
        return $this->hour.':'.$this->minute.':'.$this->second;
    }

    public function nextSecond(){
        $this->second +=1;
        return $this->__toString();
    }

}

?>
