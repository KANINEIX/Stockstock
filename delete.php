<?php
// Include your database connection file
include('config.php');

if(isset($_GET['delid'])){
    $id = $_GET['delid'];

    $sql = "DELETE FROM `Ingredient` WHERE ingID = $id";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
