<?php

class cnx{
    protected $provider = null;
    protected $statement = null;


    public function __construct()
    {   
        try{
            $this->provider = new PDO("mysql:host=localhost;dbname=pdo_tutorial;charset=utf8;",'root','',array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_UPPER
            ));
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    
}