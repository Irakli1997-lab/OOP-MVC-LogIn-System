<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<form action="<?php echo URLROOT;?>/user/updatepass" method='POST'>
    <p class='form_lbl' style='font-size:58px;'>Update Password</p>
    <input class='input' id='update_pass_old' type='password' name='update_pass_old' placeholder='Old Password ...' require>
    <input class='input' id='update_pass_new' type='password' name='update_pass_new' placeholder='New Password ...' require>
    <input class='input' id='update_pass_new_repeate' type='password' name='update_pass_new_repeate' placeholder='Repeate New Password ...' require>
    <button class='submit' id='update_pass_submit' type='submit' name='update_pass_submit'>Update</button>
    <a href='<?php echo URLROOT; ?>/page/account' class='login_register'>Back to Account</a>
</form>