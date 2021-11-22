<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

class User_Actions extends Database
{
    protected $id;
    protected $name;
    protected $email;
    protected $photo;
    protected $password;
    protected $date;
    protected $row;

    public function __construct()
     {
        session_start();
        if(isset($_SESSION['User_ID']))
        {
            $this->id = $_SESSION['User_ID'];
            $this->row = SESSION();
        }
    }

    public function login($email, $password)
     {
        if($ROW = $this->row("SELECT*FROM account WHERE Email = '$email'"))
        {
            $hash = $ROW['Password'];
            if(password_verify($password, $hash))
            {
                $this->row = $ROW;
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function PassRecovery($username, $email)
     {
        if($ROW = $this->row("SELECT*FROM account WHERE Email = '$email'"))
        {
            $ID = $ROW['ID'];
            $UserName = $ROW['UserName'];
            if($UserName == $username)
            {
                $ValCode = substr(str_shuffle("ZAQXSWCDEVFRBGTNHYMJUKILOP0123456789"), 0, 5);
                session_start();
                $_SESSION['ID'] = $ID;
                $_SESSION['ValCode'] = $ValCode;
                echo "<script>alert('Sending validation code is simulation! Use this code: " . $ValCode . "');</script>";
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function validation($input)
     {
        session_start();
        if($_SESSION['ValCode'] == $input)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        unset($_SESSION['ValCode']);
    }

    public function PassRestory($input)
     {
        $pass = password_hash($input, PASSWORD_DEFAULT);
        $set=
        [
            'ID' => $_SESSION['ID'],
            'Password' => $pass
        ];
        if($this->run("UPDATE account SET Password=:Password WHERE ID=:ID", $set))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        unset($_SESSION['ID']);
    }

    public function registration($photo, $photoTMP, $username, $email, $pass)
     {
        $Password = password_hash($pass,PASSWORD_DEFAULT);
        $new = X::NEW_IMG_PATH($photo);
        $set=
        [
            'UserName'=>$username,
            'Email'=>$email,
            'Photo'=> URLROOT.'/public/'. $new,
            'Password'=>$Password
        ];
        if($this->row("SELECT*FROM account WHERE Email='$email'"))
        {
            return FALSE;
        }
        else
        {
            if($this->run("INSERT INTO account (UserName,Email,Photo,Password) VALUES(:UserName,:Email,:Photo,:Password)",$set))
            {
                move_uploaded_file($photoTMP, $new);
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function updateInfo($photo, $photo_tmp, $username, $email, $pass)
     {
        if($pass and $ROW = $this->row("SELECT*FROM account WHERE ID='$this->id'"))
        {
                $hash = $ROW['Password'];
                $oldPhoto = end(explode('/',$ROW['Photo']));
                $new = X::NEW_IMG_PATH($photo);
                if(password_verify($pass, $hash))
                {
                    $set = [];
                    $lbl = [];
                    if($photo and $photo_tmp)
                    {
                        $set += ['Photo' => URLROOT.'/public/'. $new];
                        array_push($lbl,'Photo=:Photo');
                    }
                    if($username and $email)
                    {
                        $set += ['UserName' => $username, 'Email' => $email];
                        array_push($lbl,'UserName=:UserName');
                        array_push($lbl,'Email=:Email');
                    }
                    if($photo and $photo_tmp)
                    {
                        if($this->run("UPDATE account SET ". implode(',',$lbl) ." WHERE ID='$this->id'",$set) and unlink('resources/user/' . $oldPhoto))
                        {
                            move_uploaded_file($photo_tmp, $new);
                            return $set;
                        }
                        else
                        {
                            return FALSE;
                        }
                    }
                    else
                    {
                        if($this->run("UPDATE account SET ". implode(',',$lbl) ." WHERE ID='$this->id'", $set))
                        {
                            return $set;
                        }
                        else
                        {
                            return FALSE;
                        }
                    }
                }
                else
                {
                    return FALSE;
                }
        }
    }

    public function updatePass($old, $new1, $new2)
     {
        if($ROW = $this->row("SELECT*FROM account WHERE ID = '$this->id'"))
        {
            $hash = $ROW['Password'];
            if(password_verify($old, $hash))
            {
                $pass = password_hash($new1, PASSWORD_DEFAULT);
                $set=
                [
                    'ID' => $this->id,
                    'Password' => $pass
                ];
                if($this->run("UPDATE account SET Password=:Password WHERE ID=:ID", $set))
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    public function setUser()
     {
        $this->id = $this->row['ID'];
        $this->name = $this->row['UserName'];
        $this->email = $this->row['Email'];
        $this->photo = $this->row['Photo'];
        $this->password = $this->row['password'];
        $this->date = $this->row['date'];
        $UserData=
        [
            'UserName' => $this->name,
            'Email' => $this->email,
            'Photo' => $this->photo
        ];
        // $time = COOKIE_TIME * 60;
        // setcookie('UserData', json_encode($UserData), time()+$time, '/');
        session_start();
        $_SESSION['User_ID'] = $this->id;
        $_SESSION['UserData'] = json_encode($UserData);
    }

    public function update($key, $input)
     {
        if($key == 'info')
        {
            $this->row = X::REPLACE($this->row, $input);
            $_SESSION['UserData'] = json_encode($this->row);
        }
    }

    public function logOut()
     {
        unset($this->id);
        unset($this->name);
        unset($this->email);
        unset($this->photo);
        unset($this->password);
        unset($this->date);
        unset($_SESSION['User_ID']);
        unset($_SESSION['UserData']);
        session_unset();
        session_destroy();
    }

    public function deleteaccount($pass)
     {
        if($ROW = $this->row("SELECT*FROM account WHERE ID = '$this->id'"))
        {
            $hash = $ROW['Password'];
            $Photo = end(explode('/',$ROW['Photo']));
            if(password_verify($pass, $hash))
            {
                $data=
                [
                    'id' => $this->id
                ];

                if($this->run('DELETE FROM account WHERE ID =:id',$data) && unlink('resources/user/' . $Photo))
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
    }
}