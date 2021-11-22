<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

class Page extends Loader
 {
    public function login()
     {
        if(!USERID())
        {
            $this->View('welcome/logIn');
        }
        else
        {
            $this->View('home/account');
        }
    }

    public function recover()
     {
        if(!USERID())
        {
            $this->View('welcome/recover');
        }
        else
        {
            $this->View('home/account');
        }
    }

    public function register()
     {
        if(!USERID())
        {
            $this->View('welcome/register');
        }
        else
        {
            $this->View('home/account');
        }
    }

    public function account()
     {
        if(USERID())
        {
            if(!SESSION())
            {
                $this->Model('User_Actions')->logOut();
                header("location:". URLROOT . '/page/login');
            }
            else
            {
                $this->View('home/account');
            }
        }
        else
        {
            header("location:".URLROOT."/page");
        }
    }
    
    public function updateinfo()
     {
        if(USERID())
        {
            if(!SESSION())
            {
                $this->Model('User_Actions')->logOut();
                header("location:". URLROOT . '/page/login');
            }
            else
            {
                $this->View('home/update_info');
            }
        }
        else
        {
            header("location:".URLROOT);
        }
    }

    public function updatepass()
     {
        if(USERID())
        {
            if(!SESSION())
            {
                $this->Model('User_Actions')->logOut();
                header("location:". URLROOT . '/page/login');
            }
            else
            {
                $this->View('home/update_pass');
            }
        }
        else
        {
            header("location:".URLROOT);
        }
    }

    public function deleteaccount()
     {
        if(USERID())
        {
            if(!SESSION())
            {
                $this->Model('User_Actions')->logOut();
                header("location:". URLROOT . '/page/login');
            }
            else
            {
                $this->View('home/delete_account');
            }
        }
        else
        {
            header("location:".URLROOT);
        }
    }
}