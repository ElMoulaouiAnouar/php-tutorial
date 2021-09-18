<?php
class Controller{

    public function __construct()
    {
        
    }

    //load model and view

    public function model($model){
        $model_file_name = '../app/Models/'.ucwords($model).'.php';
        //require model
        require_once $model_file_name;
        //instance object from model
        return new $model();
    }

    public function view($view,$data = []){
        $view_file_name = '../app/Views/'.$view.'.php';
        if(file_exists($view_file_name)){
            require_once $view_file_name;
        }
        else
            die('views not exists');
    }
}