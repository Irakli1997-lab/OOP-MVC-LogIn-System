// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

$(document).ready(()=>{


// Log In Page Inputs.
LENGTH('login_email',50,()=>{
    $('#login_password').focus();
});
LENGTH('login_password',10,()=>{
    $('#login_submit').click();
});

// Password Recovery Page Inputs.
LENGTH('recover_name',30,()=>{
  $('#recover_email').focus();
});
LENGTH('recover_name',30,()=>{
  $('#recover_email').focus();
});
LENGTH('recover_email',50,()=>{
  $('#recover_submit').click();
});

LENGTH('recover_code',5,()=>{
  $('#recover_validate_submit').click();
});

LENGTH('recovery_newPass',10,()=>{
  $('#recovery_newPass_Repeate').focus();
});
LENGTH('recovery_newPass_Repeate',10,()=>{
  $('#recover_restory_submit').click();
});

// Registration Page Inputs.
SET_IMG('register_img','register_photo_img');
LENGTH('register_name',30,()=>{
  $('#register_email').focus();
});
LENGTH('register_email',50,()=>{
  $('#register_password').focus();
});
LENGTH('register_password',10,()=>{
  $('#register_repeate_password').focus();
});
LENGTH('register_repeate_password',10,()=>{
  $('#register_submit').click();
});

// Update Information Page Inputs.
SET_IMG('update_info_img','register_photo_img');
LENGTH('update_info_name',30,()=>{
  $('#update_info_email').focus();
});
LENGTH('update_info_email',50,()=>{
  $('#update_info_pass').focus();
});
LENGTH('update_info_pass',10,()=>{
  $('#update_info_submit').click();
});

// Update Password Page Inputs.
LENGTH('update_pass_old',10,()=>{
  $('#update_pass_new').focus();
});
LENGTH('update_pass_new',10,()=>{
  $('#update_pass_new_repeate').focus();
});
LENGTH('update_pass_new_repeate',10,()=>{
  $('#update_pass_submit').click();
});

// Delete Account Page Input
LENGTH('delete_acc_pass',10,()=>{
  $('#recover_validate_submit').click();
});


});