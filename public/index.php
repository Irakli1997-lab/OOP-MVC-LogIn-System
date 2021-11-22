<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

require_once "../app/back/library/GZIRO.lib.php";

if(SSL())
{

    require_once "../app/back/config/config.conf.php";
    require_once "../app/view/frame/header.php";
    require_once "../app/back/library/core.lib.php";
    $Core = new Core();
    require_once "../app/view/frame/footer.php";
}
else
{
    echo '<h1>Access Allowed Only With https://</h1><br><h1>წვდომა ნებადართულია მხოლოდ https:// -ით</h1>';
}