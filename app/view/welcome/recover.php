<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action='<?php echo URLROOT;?>/user/recover' method='POST'>
    <p class='form_lbl'>Recover</p>
    <input class='input' id='recover_name' type='text' name='recover_name' placeholder='User Name ...' require>
    <input class='input' id='recover_email' type='text' name='recover_email' placeholder='Email ...' require>
    <button class='submit' id='recover_submit' type='submit' name='recover_submit'>Send Code</button>
    <a href='<?php echo URLROOT; ?>/page/login' class='login_register'>Back to Log In</a>
</form>