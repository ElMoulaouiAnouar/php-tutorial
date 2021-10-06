<?php 
class stagiaire{
    private $name ;
    private $age ;
    private $sexe;


    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        if($name == 'age'){
            if(preg_match('/^\d+$/i',$value)){
                $this->$name = $value;
            }
            else{
                $this->$name = 0;
            }
            return;
        }
        else if($name == 'name'){
            if(preg_match('/^([a-zA-Z]\s?)+$/i',$value)){
                $this->$name = $value;
            }
            else{
                $this->$name = 'name';
            }
            return;
        }
        $this->$name = $value;
    }

    public function __construct()
    {
        
    }

    function __toString()
    {
        return $this->name.' '.$this->age.' '.$this->sexe;
    }

   public function Print($name = ['name','sexe','age']){
       $data = '';
        foreach ($name as $value) {
            # code...
            $data .= $this->$value.' ';
        }
        echo $data;
   }
   
}

$st = new stagiaire();
$st->__set('name','moulaoui anouar');
$st->__set('age','an');
$st->__set('sexe','male');
//$st->Print();

echo $st;


