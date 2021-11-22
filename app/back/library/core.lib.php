<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

require_once "../app/back/library/database.lib.php";
require_once "../app/back/library/loader.lib.php";
require_once "../app/back/library/helper.lib.php";

class Core 
 {
    protected $Controller = 'Page';
    protected $Method = 'login';
    protected $Param = [];

    public function __construct()
     {
        if(USERID())
         {
            $this->Method = 'account';
        }

        $url = $this->getUrl();
        if(file_exists('../app/controller/' . ucwords($url[0]). '.cont.php'))
         {
            $this->Controller = ucwords($url[0]);
            unset($url[0]);
        }

        require_once '../app/controller/'. $this->Controller . '.cont.php';
        $this->Controller = new $this->Controller;

        if(isset($url[1]))
         {
            if(method_exists($this->Controller, $url[1]))
            {
                $this->Method = $url[1];
                unset($url[1]);
            }
        }

        $this->Param = $url ? array_values($url) : [];
        call_user_func_array([$this->Controller, $this->Method], $this->Param);
    }

    public function getUrl()
     {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}