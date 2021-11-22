<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action='<?php echo URLROOT;?>/user/validate' method='POST'>
    <p class='form_lbl'>Recover</p>
    <p class='recover_lbl'>Check Your Email Address</p>
    <input class='input' id='recover_code' type='text' name='recover_code' placeholder='Validation Code ...' require>
    <a href='<?php echo URLROOT;?>/page/login' class='recover_back'>Back to Log In</a>
    <button class='submit' id='recover_validate_submit' type='submit' name='recover_validate_submit'>Validate</button>
</form>