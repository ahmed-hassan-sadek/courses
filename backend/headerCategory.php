<?php
include ("connect.php");

class Header
{
    /**
     * get data from table categories 
     * return value
    */
    public static function getCategory()
    {
        global $cont;
        $categories = $cont->prepare("SELECT * FROM categories");
        $categories->execute();

        return $categories;
    }
}
?>