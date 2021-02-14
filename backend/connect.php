

<?php

/**
 * page to connect database with Dashboard and view
*/

$user = "root";
$password = "";

$dsn = "mysql:host=localhost;dbname=eraasoftcourses";

try
{
    $cont = new PDO($dsn , $user , $password);
}
catch(PDOException $e)
{
    echo "Error : . $e";
}

?>