<?php

trait imageTrait
{
    /**
     * check image exetention
     * return true or false 
    */
    public static function checkImageExt($imageType)
    {
        $allowedExtentions = ['image/jpg' , 'image/jpeg' , 'image/png' , 'image/gif'];

        if(in_array($imageType , $allowedExtentions))
        {
            return 1;
        }
        return 0;
    }

    /**
     * get image from table courses
     * check if found or not
     * return new image with random name
    */
    public static function chekImageExist($imageName)
    {
        global $cont;
        $chekImageExist = $cont->prepare("SELECT image FROM courses WHERE image = ? LIMIT 1");
        $chekImageExist->execute([$avatarName]);
        if(empty($chekImageExist))
        {
            return $imageName;
        }
        $imageName = rand(00000,99999) . "_" . $imageName;
        return $imageName;
    }


}