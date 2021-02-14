<?php

include ("connect.php");

class Requests
{

    /**
     * get data from form
     * insert data into table request
     * session with message
     * header location
    */
    public static function addRequest()
    {
        global $cont;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $courseID = $_POST['course_id'];

        $request = $cont->prepare("INSERT INTO requests(`name` , `email` , `phone` , `status` , course_id) VALUES(? , ? ,? , ? , ?)");
        $request->execute([$name , $email , $phone , 0 , $courseID]);
        session_start();
        $_SESSION['message'] = "Request was Send";
        header("location:../course-details.php?course_id=" . $courseID);
    }


    /**
     * get data from table requests
     * return value
    */

    public static function getRequest()
    {
        global $cont;
        $request = $cont->prepare("SELECT requests.id , requests.name AS `name` , requests.email AS email , requests.phone AS phone , requests.status AS `status` , courses.title AS title FROM requests INNER JOIN courses ON requests.course_id = courses.id ");

        $request->execute();

        return $request;
    }
    /**
     * select number of id from request table
     * return value
    */
    public static function countRequest()
    {
        global $cont;
        $count = $cont->prepare("SELECT count(id) FROM requests ");
        $count->execute();
        return $count->fetchColumn();
    }

    /**
     * check if the user is script or not
     * get id of column
     * delete column from table requests
     * session with message
     * header location
    */
    public static function deleteRequest()
    {
        global $cont;
        $script = $_POST['script'];
        if(!empty($script))
        {
            
            session_start();
            $_SESSION['message'] = "Not Allowed";
            header("location:../admin/pages/tables/Requests.php");
        }
        else
        {
            $requestId = $_POST['delete_id'];
            $request = $cont->prepare("DELETE FROM requests WHERE id = ?");
            $request->execute([$requestId]);
            
            session_start();
            $_SESSION['message'] = "about was deleted";
            header("location:../admin/pages/tables/Requests.php");
        }
    }

    /**
     * get id of colum to update
     * update at table request
     * change value of status to 1
    */
    public static function updateRequest()
    {
        global $cont;
        $id = $_POST['id'];
        $request = $cont->prepare("UPDATE requests SET status = ? WHERE id=?");
        $request->execute([1 , $id]);
    }

}

/**
 * check if user press to add-submit
 * go to function addRequest at class Requests
*/
if(isset($_POST['add-submit']))
{
    Requests::addRequest();
}

/**
 * check if user press at submit to delete
 * go to function deleteRequest at class Requests 
*/
if(isset($_POST['delete-submit']))
{
    Requests::deleteRequest();
}

/**
 * check if id is found or not
 * go to function updateRequest at class Requests
*/

if(isset($_POST['id']))
{
    Requests::updateRequest();
}