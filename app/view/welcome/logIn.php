<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action="<?php echo URLROOT;?>/user/login" method="POST">
    <p class='form_lbl'>Log In</p>
    <input  class='input' id='login_email' type="text" name="login_email" placeholder='Email ...' require>
    <input  class='input' id='login_password' type="password" name="login_password" placeholder='Password ...' require>
    <button class='submit' id='login_submit' type='submit' name='login_submit'>Log In</button>
    <a href="<?php echo URLROOT; ?>/page/recover" class='login_recover'>Forgot Password?</a>
    <a href="<?php echo URLROOT; ?>/page/register" class='login_register'>Register</a>
</form>