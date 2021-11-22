<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

// Check if user is using https.
function SSL(){

    $mode = 'off'; // Change this value to 'on' after installing ssl Certificate.
    
    if($mode == 'on')
    {
        if($_SERVER['https'] == 1){
            return TRUE;
        } elseif ($_SERVER['https'] == 'on'){
            return TRUE;
        } elseif ($_SERVER['SERVER_PORT'] == 443){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    elseif ($mode == 'off')
    {
        return TRUE;
    }
}

// Check if user is logged in.
function USERID()
 {
    if(session_start() and isset($_SESSION['User_ID']))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

// Check if Session is open.
function SESSION()
 {
    if(isset($_SESSION['UserData']))
    {
        return json_decode($_SESSION['UserData'],true);
    }
    else
    {
        return false;
    }
}

// Checksubmit method.
function METHOD($name)
 {
    if($_SERVER['REQUEST_METHOD'] == $name)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}