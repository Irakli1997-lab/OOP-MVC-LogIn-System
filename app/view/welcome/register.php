<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action='<?php echo URLROOT;?>/user/register' method='POST' enctype="multipart/form-data">
    <p class='form_lbl'>Register</p>
    <div class='register_photo'>
        <img id='register_photo_img' src='#' alt=''>
    </div>
    <input id='register_img' name='register_img' accept='image/*'  type='FILE'>
    <label for='register_img'>
        <p id='register_img_btn'>Add Photo</p>
    </label>
    <input class='input' id='register_name' type='text' name='register_name' placeholder='User Name ...' require>
    <input class='input' id='register_email' type='text' name='register_email' placeholder='Email ...' require>
    <input class='input' id='register_password' type='password' name='register_password' placeholder='Password ...' require>
    <input class='input' id='register_repeate_password' type='password' name='register_repeate_password' placeholder='Repeate Password ...' require>
    <button class='submit' id='register_submit' type='submit' name='register_submit'>Create Account</button>
    <a href='<?php echo URLROOT; ?>/page/login' class='login_register'>Back to Log In</a>
</form>