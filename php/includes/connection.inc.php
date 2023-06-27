<?php

$connect=mysqli_connect("localhost", "root", "", "noIdea");
if(!$connect){
    die('Could not connect to database:'.mysqli_error($connect));
}

?>