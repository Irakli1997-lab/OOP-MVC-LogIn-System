<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action='<?php echo URLROOT;?>/user/deleteaccount' method='POST'>
    <p class='form_lbl'>Delete Account</p>
    <p class='recover_lbl'>Confirm with your password</p>
    <input class='input' id='delete_acc_pass' type='password' name='delete_account_password' placeholder='Password ...' require>
    <a href='<?php echo URLROOT;?>/page/login' class='recover_back'>Back to Log In</a>
    <button class='submit' id='recover_validate_submit' type='submit' name='delete_account_submit'>Delete</button>
</form>