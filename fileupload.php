<?php

require_once("dbConnection.php");

if(isset($_POST["submit"]))
{
   // print_r($_FILES);die;
    $title=$_POST["title"];
    $pname=$_FILES["file"]["name"];
    $tname=$_FILES["file"]["tmp_name"];
    $uploads_dir='./images/';
    move_uploaded_file($tname,$uploads_dir.$pname);
    $sql="INSERT into users(title,image) VALUES('$title','$pname')";

    if(mysqli_query($conn,$sql)){
        echo"file successfully uploaded";
    }
    else{
        echo"error";
    }
}
?>-