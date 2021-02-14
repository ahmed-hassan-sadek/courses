<?php 

/**
 * page to destory data and login again
 * header location  
*/


session_start();
session_destroy();


header("location:../login.php");

?>