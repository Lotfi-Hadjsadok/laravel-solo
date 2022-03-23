<?php 
namespace App\Controllers;
class BlogController{
    public function show($path,$id,$name){
        echo 'post ID :'.$id .' name: '.$name;
    }
}