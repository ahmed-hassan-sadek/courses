<?php

include("connect.php");
include("imageTrait.php");

class Courses
{
    use imageTrait;
        
    /**
     * get data value
     * check if the user is script or not
     * get image value
     * use image triat
     * check if the image is found or not
     * save image and upload it at file courses
     * insert data into courses
     * session with message 
     * header location
    */

    public static function addCourse()
    {
        global $cont;
        if(!empty($_POST['script']))
        {
            session_start();
            $_SESSION['message'] = "you are script";
            header("location:../admin/pages/forms/add-course.php");
            die();
        }
        $title = $_POST['title'];
        $price = $_POST['price'];
        $body = $_POST['body'];
        $categoryId = $_POST['cat_id'];
       
        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTmp = $_FILES['image']['tmp_name'];
        

        $imageExt = Courses::checkImageExt($imageType);   

        if($imageExt == 0 )
        {
            session_start();
            $_SESSION['error'] = "U Must Upload Correct File";
            header("location:../admin/pages/forms/add-course.php");
            die();
        }

        
        $imageLink = dirname(__FILE__) . "/../admin/pages/upload/courses/";

        $avatarName = Courses::chekImageExist(time() . "_" . $imageName);

        move_uploaded_file($imageTmp , $imageLink.$avatarName);


        $courses = $cont->prepare("INSERT INTO courses(title , price , `image` , body , catagory_id) VALUES (? , ? , ? , ? , ?) ");
        $courses->execute([$title , $price , $avatarName , $body , $categoryId]);
        session_start();
        $_SESSION['message'] = "course was created";
        header("location:../admin/pages/tables/Courses.php");
        
    }

    /**
     * get courses  
     * return courses
    */

    public static function getCourses()
    {
        global $cont;
        $courses = $cont->prepare("SELECT courses.id AS courseId , courses.title AS title , courses.price AS price , courses.body AS body , courses.image AS `image` , categories.name AS catName FROM courses INNER JOIN categories ON courses.catagory_id = categories.id");
        $courses->execute();
        return $courses;
    }


    /**
     * get course id
     * get script value
     * get course_id value 
     * check if request is empty or not
     * check if the user is real user or script
     * delete course
     * session with message
     * header location
    */

    public static function deleteCourse()
    {
        global $cont;
        $script = $_POST['script'];
        $courseId = $_POST['delete_id'];
        $request = $cont->prepare("SELECT FROM requests WHERE courses_id = ?");
        $request->execute([$courseId]);
        if(!empty($request->fetchColumn()))
        {
            session_start();
            $_SESSION['error'] = "Not Allowed";
            header("location:../admin/pages/tables/Courses.php");
            die(); 
        }
        if(!empty($script))
        {
            session_start();
            $_SESSION['error'] = "Not Allowed";
            header("location:../admin/pages/tables/Courses.php");
            die();
        }
        $courses = $cont->prepare("DELETE FROM courses WHERE id = ?");
        $courses->execute([$courseId]);
        session_start();
        $_SESSION['message'] = "course was deleted";
        header("location:../admin/pages/tables/Courses.php");
            
        
        
    }


    /**
     * get data by using inner join from table course and category
     * return coursedata as object
    */

    public static function getCourseData($id)
    {
        global $cont;
        $courseData =$cont->prepare("SELECT courses.id AS courseId , courses.title AS title , courses.price AS price , courses.catagory_id AS catId , courses.body AS body , courses.image AS `image` , categories.name AS catName FROM courses INNER JOIN categories ON courses.catagory_id = categories.id WHERE courses.id = ? LIMIT 1 ");
        $courseData->execute([$id]);
        return $courseData->fetchObject();
    }

    /**
     * get data from form
     * check if old image found or not
     * check if the file is image or not
     * save image and upload it at file courses
     * update data
     * session message
     * header location
    */

    public static function updateCourse()
    {
        global $cont;
        $title = $_POST['title'];
        $price = $_POST['price'];
        $body = $_POST['body'];
        $categoryId = $_POST['cat_id'];
        $courseId = $_POST['course_id'];
       
        if(!empty($_FILES['image']['name']))
        {
            $imageName = $_FILES['image']['name'];
            $imageType = $_FILES['image']['type'];
            $imageTmp = $_FILES['image']['tmp_name'];

            $imageExt = Courses::checkImageExt($imageType);   

            if($imageExt == 0 )
            {
                session_start();
                $_SESSION['error'] = "U Must Upload Correct File";
                header("location:../admin/pages/forms/update-course.php?id=".$courseId);
                die();
            }
            
            $avatarName = Courses::chekImageExist(time() . "_" . $imageName);

            $imageLink = dirname(__FILE__) . "/../admin/pages/upload/courses/";
            move_uploaded_file($imageTmp , $imageLink.$avatarName);
        }
        else
        {
            $avatarName = $_POST['old-image'];
        }


        $courses = $cont->prepare("UPDATE courses SET title = ? , price = ? , image = ? , body = ? , catagory_id = ? WHERE id = ?");
       
        if ( $courses->execute([$title , $price , $avatarName , $body , $categoryId , $courseId]))
        {
            session_start();
            $_SESSION['message'] = "Course Was Updated";
            header("location:../admin/pages/tables/Courses.php");
        }
        else
        {
            echo"ddc";
        }
        
    }

    /**
     * select number of id from courses table
     * return value
    */
    public static function countCourse()
    {
        global $cont;
        $count = $cont->prepare("SELECT count(id) FROM courses ");
        $count->execute();
        return $count->fetchColumn();
    }

    /**
     * get courses  
     * return courses
    */

    public static function showCourses($id)
    {
        global $cont;
        $courses = $cont->prepare("SELECT courses.id AS courseId , courses.title AS title , courses.price AS price , courses.body AS body , courses.image AS `image` , categories.name AS catName FROM courses INNER JOIN categories ON courses.catagory_id = categories.id WHERE categories.id = ?");
        $courses->execute([$id]);
        return $courses->fetchAll();
    }

    /**
     * get 3 course
     * return courses
    */

    public static function getCoursesLimit()
    {
        global $cont;
        $courses = $cont->prepare("SELECT courses.id AS courseId , courses.title AS title , courses.price AS price , courses.body AS body , courses.image AS `image` , categories.name AS catName FROM courses INNER JOIN categories ON courses.catagory_id = categories.id LIMIT 3 ");
        $courses->execute();
        return $courses;
    }



}


/**
 * check if user press at submit for add
 * go to function addCourse at class Courses
*/

if(isset($_POST['add-submit']))
{
    Courses::addCourse();   
}

/**
 * check if user press at submit for delete
 * go to function deleteCourse at class Courses
*/

if(isset($_POST['delete-submit']))
{
    Courses::deleteCourse();
}

/**
 * check if user press at submit for update
 * go to function updateCourse at class Courses
*/

if(isset($_POST['update-submit']))
{
    Courses::updateCourse();
}


?>