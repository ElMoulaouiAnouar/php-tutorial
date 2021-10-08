
<?php
class user{
    public $id_user;
    public $name;
    public $username;
    public $pass;



    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    // public function __construct($id,$name,$username,$pass)
    // {
    //     $this->__set('id_user',$id);
    //     $this->__set('name',$name);
    //     $this->__set('username',$username);
    //     $this->__set('pass',$pass);
    // }

    public function __toString()
    {
        return $this->id_user.' | '.$this->name.' | '.$this->username.' | '.$this->pass.'</br>';
    }


}