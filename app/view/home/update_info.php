<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<?php
    $UserData = SESSION();
?>

<form action="<?php echo URLROOT;?>/user/updateinfo" method="POST" enctype="multipart/form-data">
    <p class='form_lbl'>Update Info</p>
    <div class='register_photo'>
        <img id='register_photo_img' src="<?php echo $UserData['Photo'];?>" alt="Photo">
    </div>
    <input id="update_info_img" name="update_info_img" accept="image/*"  type="file">
    <label for="update_info_img">
        <p id='update_info_img_btn'>Change Photo</p>
    </label>
    <input class='input' id='update_info_name' type="text" name="update_info_name" placeholder='User Name ...' value="<?php echo $UserData['UserName'];?>" require>
    <input class='input' id='update_info_email' type="text" name="update_info_email" placeholder='Email ...' value="<?php echo $UserData['Email'];?>" require>
    <input class='input' id='update_info_pass' type="password" name="update_info_pass" placeholder='Confirm with Password ...' require>
    <button class='submit' id='update_info_submit' type='submit' name='update_info_submit'>Update</button>
    <a href="<?php echo URLROOT; ?>/page/account" class='login_register'>Back to Account</a>
</form>