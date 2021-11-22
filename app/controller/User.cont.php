<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

class User extends Loader
{
    protected $MODEL;

    public function __construct()
     {
        $this->MODEL = $this->Model('User_Actions');
    }

    public function login()
     {
        if(SSL() && METHOD('POST') && isset($_POST['login_submit']))
         {
            $email = $_POST['login_email'];
            $pass = $_POST['login_password'];

            $data=
            [
                'login_email' => $email,
                'login_password' => $pass,
                'ERROR' => ''
            ];

            if(empty($email) or !X::EMAIL($email) or !X::LENGTH($email,1,50))
             {
                $data['ERROR'] = 'Invalid email address! ';
            }
            
            if(empty($pass) or !X::CLEAN($pass) or !X::LENGTH($pass,5,10))
             {
                $data['ERROR'] = 'Invalid password syntax!';
            }
            
            if(empty($data['ERROR']))
            {
                if($this->MODEL->login($email, $pass))
                {
                    $this->MODEL->setUser();
                    return $this->View('home/account');
                }
                else
                {
                    $data['ERROR'] = 'Invalid email or password!';
                }
            }

            return $this->View('welcome/LogIn', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function logout()
     {
        if(SSL() && METHOD('POST') && isset($_POST['account_logOut']))
         {
            $this->MODEL->logOut();
            return $this->View('welcome/LogIn');
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function recover()
     {
        if(SSL() && METHOD('POST') && isset($_POST['recover_submit']))
        {
                $username = $_POST['recover_name'];
                $email = $_POST['recover_email'];

                $data=
                [
                    'recover_name' => $username,
                    'recover_email' => $email,
                    'ERROR' => ''
                ];

                if(empty($username) || !X::CLEAN($username) || !X::LENGTH($username,5,30))
                 {
                    $data['ERROR'] = 'Invalid username!';
                }

                if(empty($email) || !X::EMAIL($email) || !X::LENGTH($email,1,50))
                 {
                    $data['ERROR'] = 'Invalid email!';
                }

                if(empty($data['ERROR']))
                 {
                    if($this->MODEL->PassRecovery($username, $email))
                    {
                        return $this->View('welcome/hidden/recover_recover');
                    }
                    else
                    {
                        $data['ERROR'] = 'Invalid username or email!';
                    }
                }

                return $this->View('welcome/recover', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function validate()
     {
        if(SSL() && METHOD('POST') && isset($_POST['recover_validate_submit']))
        {
                $code = $_POST['recover_code'];

                $data=
                [
                    'recover_code' => $code,
                    'ERROR' => ''
                ];

                if(empty($code) || !X::CLEAN($code) || !X::LENGTH($code,5,5))
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }
                
                if(empty($data['ERROR']))
                {
                    if($this->MODEL->validation($code))
                    {
                        return $this->View('welcome/hidden/recover_validate');
                    }
                    else
                    {
                        $data['ERROR'] = 'Invalid validation code!';
                    }
                }

                return $this->View('welcome/hidden/recover_recover', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function restory()
     {
        if(SSL() && METHOD('POST') && isset($_POST['recover_restory_submit']))
        {
            $pass = $_POST['recovery_newPass'];
            $pass_R = $_POST['recovery_newPass_Repeate'];

            $data=
            [
                'recovery_newPass' => $pass,
                'recovery_newPass_Repeate' => $pass_R,
                'ERROR' => ''
            ];
            
            if(empty($pass) || !X::CLEAN($pass) || !X::LENGTH($pass,5,10))
             {
                $data['ERROR'] = 'Invalid syntax!';
            }

            if(empty($pass_R) || !X::CLEAN($pass_R) || !X::LENGTH($pass_R,5,10))
             {
                $data['ERROR'] = 'Invalid syntax!';
            }

            if($pass != $pass_R)
             {
                $data['ERROR'] = 'Invalid syntax!';
            }

            if(empty($data['ERROR']))
            {
                if($this->MODEL->PassRestory($pass))
                {
                    return $this->View('welcome/LogIn');
                }
            }

            return $this->View('welcome/hidden/recover_validate', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function register()
     {
        if(SSL() && METHOD('POST') && isset($_POST['register_submit']))
        {       
                $photo = $_FILES['register_img']['name'];
                $photo_tmp = $_FILES['register_img']['tmp_name'];
                $photo_type = $_FILES['register_img']['type'];
                $photo_size = $_FILES['register_img']['size'];
                
                $username = $_POST['register_name'];
                $email = $_POST['register_email'];
                $pass = $_POST['register_password'];
                $pass_R = $_POST['register_repeate_password'];
                
                $data=
                [
                    'register_name' => $username,
                    'register_email' => $email,
                    'register_password' => $pass,
                    'register_repeate_password' => $pass_R,
                    // 'IMG|register_photo_img' => $photo_tmp,
                    'ERROR' => ''
                ];

                if(!$photo || $photo_size > MAX_IMG_SIZE*1048576 || !X::IMAGE($photo_tmp))
                 {
                    $data['ERROR'] = 'Invalid photo!';
                }

                if(empty($username) || !X::CLEAN($username) || !X::LENGTH($username,5,30))
                 {
                    $data['ERROR'] = 'Invalid username!';
                }

                if(empty($email) || !X::EMAIL($email) || !X::LENGTH($email,1,50))
                 {
                    $data['ERROR'] = 'Invalid email!';
                }

                if(empty($pass) || !X::CLEAN($pass) || !X::LENGTH($pass,5,10))
                 {
                    $data['ERROR'] = 'Invalid password!';
                }

                if(empty($pass_R) || !X::CLEAN($pass_R) || !X::LENGTH($pass_R,5,10))
                 {
                    $data['ERROR'] = 'Invalid password!';
                }
                
                if($pass != $pass_R)
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }

                if(empty($data['ERROR']))
                {
                    if($this->MODEL->registration($photo, $photo_tmp, $username, $email, $pass))
                    {
                        $data=
                        [
                            'DONE' => 'Your account has created'
                        ];
                        return $this->View('welcome/login',$data);
                    }
                    else
                    {
                        $data['ERROR'] = 'Invalid email or password! ';
                    }
                }

                $data['ERROR'] = 'Invalid syntax! ';
                return $this->View('welcome/register', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function updateinfo()
     {
        if(SSL() && METHOD('POST') && isset($_POST['update_info_submit']))
        {
                $photo = $_FILES['update_info_img']['name'];
                $photo_tmp = $_FILES['update_info_img']['tmp_name'];
                $photo_type = $_FILES['update_info_img']['type'];
                $photo_size = $_FILES['update_info_img']['size'];
                
                $username = $_POST['update_info_name'];
                $email = $_POST['update_info_email'];
                $pass = $_POST['update_info_pass'];

                $data=
                [
                    'update_info_name' => $username,
                    'update_info_email' => $email,
                    'update_info_pass' => $pass,
                    // 'IMG|register_photo_img' => $photo_tmp,
                    'ERROR' => ''
                ];

                if($photo)
                 {
                    if($photo_size > MAX_IMG_SIZE*1048576 || !X::IMAGE($photo_tmp))
                     {
                        $data['ERROR'] = 'Invalid photo!';
                    }
                }

                if(empty($username) || !X::CLEAN($username) || !X::LENGTH($username,5,30))
                 {
                    $data['ERROR'] = 'Invalid username!';
                }

                if(empty($email) || !X::EMAIL($email) || !X::LENGTH($email,1,50))
                 {
                    $data['ERROR'] = 'Invalid email!';
                }

                if(empty($pass) || !X::CLEAN($pass) || !X::LENGTH($pass,5,10))
                 {
                    $data['ERROR'] = 'Invalid password!';
                }

                if(empty($data['ERROR']))
                {
                    if($set = $this->MODEL->updateInfo($photo, $photo_tmp, $username, $email, $pass))
                    {
                        $this->MODEL->update('info',$set);
                        return $this->View('home/account');
                    }
                    else
                    {
                        $data['ERROR'] = 'Invalid syntax or password! ';
                    }
                }
                
                return $this->View('home/update_info', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function updatepass()
     {
        if(SSL() && METHOD('POST') && isset($_POST['update_pass_submit']))
        {
                $old = $_POST['update_pass_old'];
                $new1 = $_POST['update_pass_new'];
                $new2 = $_POST['update_pass_new_repeate'];

                $data=
                [
                    'update_pass_old' => $old,
                    'update_pass_new' => $new1,
                    'update_pass_new_repeate' => $new2,
                    'ERROR' => ''
                ];

                if(empty($old) || !X::CLEAN($old) || !X::LENGTH($old,5,10))
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }

                if(empty($new1) || !X::CLEAN($new1) || !X::LENGTH($new1,5,10))
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }

                if(empty($new2) || !X::CLEAN($new2) || !X::LENGTH($new2,5,10))
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }
                
                if($new1 != $new2)
                 {
                    $data['ERROR'] = 'Invalid syntax!';
                }

                if(empty($data['ERROR']))
                 {
                    if($this->MODEL->updatePass($old, $new1, $new2))
                     {
                        return $this->View('home/account');
                     }
                     else
                     {
                        $data['ERROR'] = 'Invalid old password!';
                    }
                }
                
                return $this->View('home/update_pass', $data);
        }
        else
        {
            echo "Invalid Request";
        }
    }

    public function deleteaccount()
     {
        if(SSL() && METHOD('POST') && isset($_POST['delete_account_submit']))
         {
            $pass = $_POST['delete_account_password'];

            $data=
             [
                'delete_acc_pass' => $pass,
                'ERROR' => '',
                'DONE' => ''
            ];

            if(empty($pass) || !X::CLEAN($pass) || !X::LENGTH($pass,5,10))
             {
                $data['ERROR'] = 'Invalid syntax!';
            }

            if(empty($data['ERROR']))
             {
                if($this->MODEL->deleteaccount($pass))
                 {
                    $this->MODEL->logOut();
                    $data['DONE'] = 'Your account has deleted';
                    return $this->View('welcome/LogIn',$data);
                }
                else
                 {
                    $data['ERROR'] = 'Invalid password!';
                }
            }
            return $this->View('home/delete_account', $data);
        }
    }
}