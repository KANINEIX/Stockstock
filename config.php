<?php // Clear!!

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ingredients";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if($conn){
        //echo "Connected to the database successfully.";
    } else {
        die("Failed to connect: ");
    }

?>