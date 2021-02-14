<?php

include ("connect.php");

class Categories
{

    /**
     * get category name 
     * insert name at table categgries
     * session message
     * header location 
    */
    
    public static function addCategory()
    {
        global $cont;
        $name = $_POST['name'];
        $category = $cont->prepare("INSERT INTO categories(`name`) VALUES(?)");
        $category->execute([$name]);
        session_start();
        $_SESSION['message'] = "category was created";
        header("location:../admin/pages/tables/Categories.php");
    }


    /**
     * get categories
     * return categories
    */
    
    public static function getCategory()
    {
        global $cont;
        $categories = $cont->prepare("SELECT * FROM categories");
        $categories->execute();

        return $categories;
    }

    /**
     * get category id
     * get script value
     * check if the user is real user or script
     * delete category
     * session with message
     * header location
    */

    public static function deleteCategory()
    {
        global $cont;
        $script = $_POST['script'];
        if(!empty($script))
        {
            session_start();
            $_SESSION['error'] = "Not Allowed";
            header("location:../admin/pages/tables/categories.php");
            die();
        }
        
        
        $categoryId = $_POST['delete_id'];
        $categories = $cont->prepare("DELETE FROM `categories` WHERE id = ?");
        $categories->execute([$categoryId]);
        session_start();
        $_SESSION['message'] = "category was deleted";
        header("location:../admin/pages/tables/categories.php");
        
        
    }

    /**
     * get name from tabel category
     * return categorydata as object
    */
    public static function getCategoryData($id)
    {
        global $cont;
        $categoryData =$cont->prepare("SELECT id , `name` FROM categories WHERE id = ? LIMIT 1 ");
        $categoryData->execute([$id]);
        return $categoryData->fetchObject();
    }

    /**
     * get category id
     * get category data 
     * update category
     * session with message
     * header location
    */

    public static function updateCategory()
    {
        global $cont;
        $catId = $_POST['cat_id'];
        $catName = $_POST['cat_name'];
        $categories = $cont->prepare("UPDATE categories SET `name` = ?  WHERE id = ?");
        $categories->execute([$catName , $catId]);
        session_start();
        $_SESSION['message'] = "category was updated";
        header("location:../admin/pages/tables/Categories.php");

        
    }

    /**
     * select number of id from categories table
     * return value
    */
    public static function countCategory()
    {
        global $cont;
        $count = $cont->prepare("SELECT count(id) FROM categories ");
        $count->execute();
        return $count->fetchColumn();
    }

     /**
     * get categories
     * return categories
    */
    
    public static function showCategory($id)
    {
        global $cont;
        $categories = $cont->prepare("SELECT `name` FROM categories WHERE id = ?");
        $categories->execute([$id]);
        

        return $categories;
    }
}


/**
 * check if user press at submit to add
 * go to function addCategory at class Categories 
*/

if(isset($_POST['add-submit']))
{
    Categories::addCategory();
}

/**
 * check if user press at submit to delete
 * go to function deleteCategory at class Categories 
*/

if (isset($_POST['delete-submit']))
{
    Categories::deleteCategory();
}

/**
 * check if user press at submit to update
 * go to function updateCategory at class Categories 
*/

if (isset($_POST['update-submit']))
{
    Categories::updateCategory();
}




?>