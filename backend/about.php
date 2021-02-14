<?php

include ("connect.php");

class About
{
    /**
     * get data from table about
     * return value
    */
    public static function getAbout()
    {
        global $cont;
        $about = $cont->prepare("SELECT * FROM about");
        $about->execute();

        return $about;
    }


    /**
     * get data from form by _POST
     * insert data at about table
     * session with message
     * header location
    */
    public static function addAbout()
    {
        global $cont;
        $location = $_POST['location'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $about = $cont->prepare("INSERT INTO about(`location` , `phone` , `email`) VALUES(? , ? , ?)");
        $about->execute([$location , $phone , $email]);
        session_start();
        $_SESSION['message'] = "About was created";
        header("location:../admin/pages/tables/About_us.php");
    }

    /**
     * check if the user is script or not
     * get id of column
     * delete column from table about
     * session with message
     * header location
    */
    public static function deleteAbout()
    {
        global $cont;
        $script = $_POST['script'];
        if(!empty($script))
        {
            session_start();
            $_SESSION['message'] = "Not Allowed";
            header("location:../admin/pages/tables/About_us.php");
        }
        else
        {
            $aboutId = $_POST['delete_id'];
            $about = $cont->prepare("DELETE FROM about WHERE id = ?");
            $about->execute([$aboutId]);
            session_start();
            $_SESSION['message'] = "about was deleted";
            header("location:../admin/pages/tables/About_us.php");
        }
    }

    /**
     * get name from tabel category
     * return categorydata as object
    */

    public static function getAboutData($id)
    {
        global $cont;
        $aboutData =$cont->prepare("SELECT `id`, `location` , `phone` , `email` FROM about WHERE id = ? LIMIT 1 ");
        $aboutData->execute([$id]);
        return $aboutData->fetchObject();
    }


    /**
     * get data from form 
     * upate data at table about
     * session with message 
     * header location
    */
    public static function updateAbout()
    {
        global $cont;
        $aboutId = $_POST['about_id'];
        $location = $_POST['location'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $about = $cont->prepare("UPDATE about SET `location` = ? , `phone` = ? , `email` = ?   WHERE id = ?");
        $about->execute([$location , $phone , $email, $aboutId]);
        session_start();
        $_SESSION['message'] = "about was updated";
        header("location:../admin/pages/tables/About_us.php");
    }
}



/**
 * check if user press at submit to add
 * go to function addAbout at class About 
*/

if(isset($_POST['add-submit']))
{
    About::addAbout();
}

/**
 * check if user press at submit to delete
 * go to function deleteAbout at class About 
*/

if(isset($_POST['delete-submit']))
{
    About::deleteAbout();
}


/**
 * check if user press at submit to update
 * go to function updateAbout at class About 
*/

if (isset($_POST['update-submit']))
{
    About::updateAbout();
}
