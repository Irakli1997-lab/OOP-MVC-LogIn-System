<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021
require_once "helper.lib.php";

class Loader
{
    public function Model($model)
     {
        if(SSL() and file_exists('../app/model/' . $model . '.mod.php'))
        {
            require_once '../app/model/' . $model . '.mod.php';
            return new $model;
        }
    }
    
    public function View($view, $data=[])
     {
        if(SSL() and file_exists('../app/view/' . $view . '.php'))
        {
            require_once '../app/view/' . $view . '.php';
            if($data['ERROR'])
            {
                X::JS('ERROR',[$data['ERROR']]);
            }
            elseif($data['DONE'])
            {
                X::JS('DONE',[$data['DONE']]);
            }
            X::DATA($data);
        }
        else
        {
            die("View does not exists");
        }
    }
}