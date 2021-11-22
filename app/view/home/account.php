<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<?php
    $UserData = SESSION();
?>
<form action="<?php echo URLROOT;?>/user/logout" method="POST">
    <p class='form_lbl'><?php echo $UserData['UserName'];?></p>
    <p class='account_email'><?php echo $UserData['Email'];?></p>
    <div class='account_photo'>
        <img class='account_photo_img' src="<?php echo $UserData['Photo'];?>" alt="User Photo">
    </div>
    <a href="<?php echo URLROOT; ?>/page/updateinfo" class='account_update_info'>Update Info</a>
    <a href="<?php echo URLROOT; ?>/page/updatepass" class='account_update_pass'>Update Password</a>
    <a href="<?php echo URLROOT; ?>/page/deleteaccount" class='account_delete_account'>Delete Account</a>
    <button id='account_logOut' type='submit' name='account_logOut'>Log Out</button>
</form>