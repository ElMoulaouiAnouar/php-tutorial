<?php
use Vtiful\Kernel\Format;
//configuration autoload function

require_once '../app/Config/Config.php';

spl_autoload_register(function($className){
    $path_pages = [
        '../app/Controllers/',
        '../app/Helpers/',
        '../app/librareis/',
        '../app/Models/'
    ];

    //loop to array path_pages and check if file exists and include file
    foreach ($path_pages as $page) {
        # code...
        $file_name = $page.$className.'.php';
        if(file_exists($file_name)){
            include $file_name;
        }
    }

});