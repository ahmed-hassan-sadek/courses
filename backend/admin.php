<?php

include("connect.php");

class Admin
{
    /**
     * get data from table users that role = 0
     * return value
    */
    public static function getAdminData()
    {
        global $cont;
        $adminData = $cont->prepare("SELECT `id` ,`name` FROM `users` WHERE `role` = ?");
        $adminData->execute([0]);
        return $adminData;
    }
}

?>