<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action='<?php echo URLROOT;?>/user/restory' method='POST'>
    <input class='input' id='recovery_newPass' type='password' name='recovery_newPass' placeholder='New Password ...' require>
    <input class='input' id='recovery_newPass_Repeate' type='password' name='recovery_newPass_Repeate' placeholder='Repeate New Password ...' require>
    <p class='form_lbl'>Recover</p>
    <a href='" . URLROOT . "/page/login' class='recover_back'>Back to Log In</a>
    <button class='submit' id='recover_restory_submit' type='submit' name='recover_restory_submit'>Restory Password</button>
</form>";