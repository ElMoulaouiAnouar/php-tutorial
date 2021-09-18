<?php
class User{
    private $db ;

    public function __construct()
    {
        $this->db = new Database();
       
    }

    public function GetAll(){
        $this->db->query("select * from users");
       return $this->db->DataResult();
    }

    public function findUser($username){
        $this->db->query('select * from users where username=:username');
        $this->db->Bind(":username",$username);
        return $this->db->Single();
    }

  public function login($username,$password){
      $this->db->query('select * from users where username=:username and password=:password');
      $this->db->Bind(":username",$username);
      $this->db->Bind(":password",$password);
      $this->db->Execute();
      if($this->db->RowCount() > 0 ){
        return true;
      }
      else{
          return false;
      }
  }
}