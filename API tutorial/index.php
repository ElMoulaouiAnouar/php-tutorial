<?php
require_once './config.php';
class api{
    private $db = null;
    function Select(){
        $this->db = new Connecter();
        $data =  $this->db->prepare("select * from users");
        if($data->execute()){
            $users = [];
            while($OneRowFromData = $data->fetch(PDO::FETCH_ASSOC)){
                $users[] = [
                    'id' => $OneRowFromData['id_users'],
                    'name' => $OneRowFromData['name'],
                    'age' => $OneRowFromData['age']
                ];
            }  
            return json_encode($users);
        }
        else{
            return json_encode(['aucan data']);
        }
    }

    function Insert($name,$age){
        $stmt = $this->db->prepare("insert into users(name,age) values(?,?)");
        if($stmt->execute([$name,$age])){
            return json_encode(['true']);
        }
        else{
            return (['false']);
        }
    }
}

 $api = new api();
 header("Content-type: application/json");
 echo $api->Select();