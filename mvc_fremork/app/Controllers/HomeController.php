<?php
class HomeController extends Controller{
    
   private $user_model ;

   public function __construct()
   {
       $this->user_model = $this->model('User');
       var_dump($this->user_model->GetAll());
   }

    public function index(){
        $data = [
            'name' => 'anouar',
            'age' => '23'
        ];
       $this->view('pages/index',$data);
    }

    public function about(){
        $this->view('pages/about');
    }

}