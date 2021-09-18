<?php 
class Connecter extends PDO{
    
    private $db_host = 'localhost';
    private $db_name = 'api';
    private $db_charset = 'utf8';
    private $db_username = 'root';
    private $db_password = '';

    public function __construct()
    {
        parent::__construct("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset;",$this->db_username,$this->db_password);
        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

}