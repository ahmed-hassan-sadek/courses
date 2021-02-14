<?php

include ("connect.php");
include("imageTrait.php");

class Sliders
{
    use imageTrait; 

    /**
     * get data from table sliders
     * return value at variable slider
    */

    public static function getSliders()
    {
        global $cont;
        $slider = $cont->prepare("SELECT * FROM sliders");
        $slider->execute();

        return $slider;
    }


    /**
     * get data for image 
     * use triat to chek if image found or not
     * get location of image
     * save image at new name by use trait 
     * move image to new location is slider
     * insert data at table slider 
     * session with message
     * header location
    */

    public static function addSliders()
    {
        global $cont;
        $imageName = $_FILES['image']['name'];
        $imageType = $_FILES['image']['type'];
        $imageTmp = $_FILES['image']['tmp_name'];


        $imageExt = Sliders::checkImageExt($imageType);  

        if($imageExt == 0 )
        {
            session_start();
            $_SESSION['error'] = "U Must Upload Correct File";
            header("location:../admin/pages/forms/add-slider.php");
            die();
        }

        
        $imageLink = dirname(__FILE__) . "/../admin/pages/upload/slider/";

        $avatarName = Sliders::chekImageExist(time() . "_" . $imageName);

        move_uploaded_file($imageTmp , $imageLink.$avatarName);


        $sliders = $cont->prepare("INSERT INTO sliders(`image`) VALUES (?)");
        $sliders->execute([$avatarName]);
        session_start();
        $_SESSION['message'] = "course was created";
        header("location:../admin/pages/tables/Sliders.php");
        
    }


    /**
     * get data from form 
     * check if the user is script or not
     * delete data from table slider
     * session with message
     * header location
    */

    public static function deleteSlider()
    {
        global $cont;
        $script = $_POST['script'];
        if(!empty($script))
        {
            session_start();
            $_SESSION['message'] = "Not Allowed";
            header("location:../admin/pages/tables/Sliders.php");
        }
        else
        {
            $sliderId = $_POST['delete_id'];
            $sliders = $cont->prepare("DELETE FROM sliders WHERE id = ?");
            $sliders->execute([$sliderId]);
            session_start();
            $_SESSION['message'] = "slider was deleted";
            header("location:../admin/pages/tables/Sliders.php");
        }
        
    }

    /**
     * get id from url
     * get image from table sliders
     * return value as object
    */
    public static function getSliderData($id)
    {
        global $cont;
        $sliderData =$cont->prepare("SELECT `image` FROM sliders WHERE id = ? LIMIT 1 ");
        $sliderData->execute([$id]);
        return $sliderData->fetchObject();
    }

    /**
     * get sliderId from form
     * check if name of image is found or not
     * get data of image
     * check if image is found or not
     * get location of image
     * save image at new name by use trait 
     * move image to new location is slider
     * update new value at table sliders
     * session with message
     * header location
    */

    public static function updateSlider()
    {
        global $cont;
        $sliderId = $_POST['slider_id'];
        if(!empty($_FILES['image']['name']))
        {
            $imageName = $_FILES['image']['name'];
            $imageType = $_FILES['image']['type'];
            $imageTmp = $_FILES['image']['tmp_name'];

            $imageExt = Sliders::checkImageExt($imageType);   

            if($imageExt == 0 )
            {
                session_start();
                $_SESSION['error'] = "U Must Upload Correct File";
                header("location:../admin/pages/forms/update-slider.php?id=".$sliderId);
                die();
            }
            $avatarName = Sliders::chekImageExist(time() . "_" . $imageName);
            $imageLink = dirname(__FILE__) . "/../admin/pages/upload/slider/";
            move_uploaded_file($imageTmp , $imageLink.$avatarName);
        }
        else
        {
            $avatarName = $_POST['old-image'];
        }

        $sliders = $cont->prepare("UPDATE sliders SET `image` = ? WHERE id = ?");
        $sliders->execute([$avatarName , $sliderId]);
        session_start();
        $_SESSION['message'] = "Slider Was Updated";
        header("location:../admin/pages/tables/Sliders.php");


    }

}



/**
 * check if user press at submit for add
 * go to function addSlider at class Sliders
*/

if(isset($_POST['add-submit']))
{
    Sliders::addSliders();
}

/**
 * check if user press at submit for delete
 * go to function deleteSlider at class Sliders
*/

if (isset($_POST['delete-submit']))
{
    Sliders::deleteSlider();
}

/**
 * check if user press at submit for update
 * go to function updateSlider at class Sliders
*/

if(isset($_POST['update-submit']))
{
    Sliders::updateSlider();
}