<?php
class Database{

    //declare configuration database
    private $db_host = DB_HOST;
    private $db_name = DB_NAME;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASSWORD;
    private $db_charset = DB_CHARSET; 

    private $db_handler;
    private $db_error;
    private $statement;



    public function __construct()
    {
        try{
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->db_handler = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset",$this->db_username,$this->db_password,$options);    
        }
        catch(PDOException $ex){
            $db_error = $ex->getMessage();
            die($db_error);
        }
    }

    //function write query

    public function query($query){
        $this->statement = $this->db_handler->prepare($query);
        return $this->statement;
    }

    // function bind parameter

    public function Bind($parameter,$value,$type = null)
    {
        switch(is_null($type)){
            case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
            case is_string($value) : 
                $type = PDO::PARAM_STR;
                break;
            case is_bool($value) :
                $type = PDO::PARAM_BOOL;
                break;
        }
        $this->statement->bindValue($parameter,$value,$type);
    }
    //function execute

    public function Execute(){
       return  $this->statement->Execute();
    }

    //function return data 

    public function DataResult(){
        $this->Execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //return single row

    public function Single(){
        $this->Execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //function get Count row

    public function RowCount(){
        return $this->statement->rowCount();
    }


}