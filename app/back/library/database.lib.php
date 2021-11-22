<?php
// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

class Database
{
    public function connect()
     {
        try
        {
            $dbh = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
            return $dbh;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function row($sql)
     {
        if($query = $this->connect()->query($sql))
        {
            return $query->fetchAll(PDO::FETCH_ASSOC)[0];
        }
        else
        {
            return FALSE;
        }
    }

    public function run($sql, $data)
     {
        if($this->connect()->prepare($sql)->execute($data))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
}