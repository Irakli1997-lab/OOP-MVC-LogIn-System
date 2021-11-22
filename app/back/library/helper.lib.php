<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

class X
{
    public static function CLEAN($input)
     {
        if (preg_match("/[\/'^£$%&*()}{@#~.,?><,|=!_:;+¬-]/", $input))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public static function LENGTH($input, $min, $max)
     {
       $len = strlen($input);
   
       if($min <= $len and $len <= $max)
       {
           return TRUE;
       }
       else
       {
           return FALSE;
       }
    }

    public static function EMAIL($input)
     {
         if(filter_var($input, FILTER_VALIDATE_EMAIL))
         {
            return TRUE;
         }
         else
         {
            return FALSE;
        }
    }

    public static function IMAGE(string $path)
     {
    
        if (!is_readable($path)) {
            return false;
        }
        $supported = [IMAGETYPE_JPEG, IMAGETYPE_PNG];
        $type = exif_imagetype($path);
        if (!in_array($type, $supported)) {
            return false;
        }
        $image = false;
        switch ($type) {
            case IMAGETYPE_GIF:
                $image = @imagecreatefromgif($path);
                break;
            case IMAGETYPE_PNG:
                $image = @imagecreatefrompng($path);
                break;
            case IMAGETYPE_JPEG:
                $image = @imagecreatefromjpeg($path);
                break;
        }
        return (!!$image);
    }

    public static function REPLACE($array, $values)
     {
      forEach($values as $value => $name)
      {
         if($key = array_key_exists($value, $array))
         {
            $array[$value] = $values[$value];
         }
      }
      return $array;
    }

    public static function NEW_IMG_PATH($img)
     {
        $IMG = strtolower(end(explode('.',$img)));
        $IMG = uniqid('',true).'.'.$IMG;
        return 'resources/user/'.$IMG;
    }

    public static function JS($function,$params=[])
     {
        static $collect = array();
        foreach($params as $value)
        {
            if($value)
            {
                array_push($collect,"'".$value."'");
            }
        }
        echo "<script>".$function."(".implode(',',$collect).");</script>";
    }

    public static function DATA($data)
     {
        foreach($data as $input=>$value)
        {
            if($input && $value)
            {
                if($input != "ERROR")
                {
                    if($GOT = explode("|",$input))
                    {
                        $type = $GOT[0];
                        $id = $GOT[1];
                        switch ($type)
                        {
                            case "HTML":
                                  echo "<script>$('#".$id."').html('".$value."');</script>";
                              break;
                            case "VAL":
                                  echo "<script>$('#".$id."').val('".$value."');</script>";
                                break;
                            default:
                                echo "<script>$('#".$input."').val('".$value."');</script>";
                        }
                    }
                }
            }
        }
    }
}