<?php
require './user.php';
class cnx{
    protected $provider = null;
    protected $statement = null;


    public function __construct()
    {   
        try{
            $this->provider = new PDO("mysql:host=localhost;dbname=pdo_tutorial;charset=utf8;",'root','',array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_LOWER,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ));
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }
    public function Insert($name,$username,$pass){
        $this->statement = $this->provider->prepare("insert into user(name,username,pass) values(:name,:username,:pass)");
        $this->statement->execute([
            'name' => $name,
            'username' => $username,
            'pass' => $pass
        ]);
    }
    function getData(){
        $this->statement = $this->provider->query("select * from user");
        foreach ($this->statement as $user) {
            print_r($user);
        }  
    }

    function  showAll(){
        $this->statement = $this->provider->prepare("select * from user");
        if($this->statement->execute()){
            foreach ($this->statement->fetchAll(PDO::FETCH_CLASS,'user') as $user) {
                # code...
                //call to string function to show user
                echo $user;
            }
        }
    }


    public function FetchColumn(){
        $this->statement = $this->provider->prepare("select * from user");
        if($this->statement->execute()){
          echo $this->statement->fetchColumn(1); // <=> value column name of the user table
        }
    }

    public function FetchOb(){
        var_dump(new user());
        $this->statement = $this->provider->prepare("select * from user");
        if($this->statement->execute()){
           echo '<pre>' .print_r($this->statement->fetchObject('user'),true).'</pre>';
           var_dump(new user());
        }
    }
    
    
    
}