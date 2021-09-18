<?php
class UserController extends Controller{
    
    private $user_model ;

    public function __construct()
    {
     $this->user_model = $this->model('User');   
    }

    public function login(){
        //filter data array $_POST
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        $data = [
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //check if request Method is Post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['btn_login'])){
                $data['username'] = $this->Filter_input($_POST['username']);
                $data['password'] = $this->Filter_input($_POST['password']);
            }

            //validate username
            if(empty($data['username'])){
                $data['usernameError'] = 'username is required';
            } 

            //validate password

            if(empty($data['password'])){
                $data['passwordError'] = 'password is required';
            }

            //check if exists errors in data with test empty value 
            if(empty($data['usernameError']) && empty($data['passwordError'])){
               //check login
               $user = $this->user_model->login($data['username'],$data['password']);
               if($user){
                die('login is success');
               }
               else{
                   session::Set('faild','username or password incorrect');
                $this->view('Auth/login',$data); 
               }
            }
            else{
                $this->view('Auth/login',$data);
            }
        }
        else{
            $this->view('Auth/login',$data);
        }
    }

    public function register(){
        
    }


    private function Filter_input($value){
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = stripslashes($value);
        return $value;
    }



    // function compare condition to value tow(2) array (array data original and array data find)
    public function FindArrayElementInArray($array,$array_find,$options = ''){
      foreach ($array_find as $item) {
          # code...
            foreach ($array as $key2 => $value2) {
                # code...
                if($item == $key2){
                    if($value2 == $options){
                        //return true if options search exist in array 
                        return true;
                    }
                }
            }
      }
      //return false if options search not exist in array 
      return false;
    }

    public function createSessionUser($user){
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
    }

}
