<?php
class Core{
    protected $currentController = 'pages';
    protected $currentMethod = 'index';
    protected $params = [];


    public function getUrl(){
        if(isset($_GET['url'])){
            $url  = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            return explode('/',$url);
        }
    }

    public function  __construct(){
       $url = $this->getUrl();
       //check Controller if exist to folder Controller
       if(file_exists('../app/Controllers/'.ucwords($url[0]).'Controller.php')){
            $this->currentController = ucwords($url[0]).'Controller';
            unset($url[0]);
       }

       //require Controller
       require_once '../app/Controllers/'.$this->currentController.'.php';
       $this->currentController = new $this->currentController;

        //check Method if Exists to Controller(file) 

       if(isset($url[1])){
            if(method_exists($this->currentController,$url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            } 
       }
       //calback function from Controller 
       //call_user_func(array($this->currentController, $this->currentMethod));


       //Get params from array url
       $this->params = $url ? array_values($url) : [] ; // array_values is function return array contien all values from array 

       //callback function from Controller and pass paramertres

       call_user_func_array(array($this->currentController,$this->currentMethod),$this->params);
       

    }


    
}