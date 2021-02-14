<?php

include("connect.php");

class Auther
{
    /**
     * get data from form and encrept password by use SHA1()
     * get value of role 
     * check if email or password found
    */
    public static function login()
    {
        global $cont;
        $email = $_POST['email'];
        $password = SHA1($_POST['password']);


        $admin =  $cont->prepare("SELECT `role` FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1");
        $admin->execute([$email , $password]);
        $adminData = $admin->fetchObject();
        session_start();
        if(empty($adminData))
        {
            $_SESSION['error'] = "Email or Password is Invaliad";
            header("location:../admin/login.php");
        }
        else
        {
            $_SESSION['role'] = $adminData->role; 
            
            header("location:../admin/index.php");
        }
        
    }


    /**
     * get data from form and encrept password by use SHA1()
     * insert data into users table
     * session with message
     * header location
    */

    public static function signUp()
    {
        global $cont;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = SHA1($_POST['password']);

        $signup = $cont->prepare("INSERT INTO users(`name`, `email`, `password` , `role`) VALUES (? , ? , ? , ?) ");
        $signup->execute([$name , $email , $password , 0]);

        session_start();
        $_SESSION['message'] = "Data entering correctly";
        header("location:../login.php");
    }

    /**
     * get data from form and encrept password by use SHA1()
     * get value of email 
     * check if email or password found
    */
    public static function checkLogin()
    {
        global $cont;
        $email = $_POST['email'];
        $password = SHA1($_POST['password']);
        $user = $cont->prepare("SELECT `email` FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1"); 
        $user->execute([$email , $password]);
        $adminData = $user->fetchObject();

        session_start();
        if(empty($adminData))
        {
            $_SESSION['error'] = "Email or Password is Invaliad";
            header("location:../login.php");
        }
        else
        {
            $_SESSION['email'] = $adminData->email; 
            header("location:../index.php");
        }
    }
}


/**
 * check if press to button or not
 * go to function login at class Auther
*/
if(isset($_POST['submit']))
{
    Auther::login();
}

/**
 * check if press to button or not
 * go to function checkLogin at class Auther
*/

if(isset($_POST['submit']))
{
    Auther::checkLogin();
}

/**
 * check if press to button or not
 * go to function signUp at class Auther
*/
if (isset($_POST['sign-submit']))
{
    Auther::signUp();
}