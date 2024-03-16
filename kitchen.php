<?php

  session_start();
  
  if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset( $_SESSION['phone'] );
    header("Location: login.php");
  }
  include('config.php');

  $phone = $_SESSION['phone'];
  $sql = "SELECT Ingredient.ingID, Ingredient.ingName, Ingredient.ingQuantity, Categories.catName, Locations.locName, Ingredient.ingStatus 
          FROM `Ingredient` 
          INNER JOIN Customers ON Ingredient.cusID = Customers.cusID 
          INNER JOIN Categories ON Ingredient.catID = Categories.catID 
          INNER JOIN Locations ON Ingredient.locID = Locations.locID
          WHERE Customers.cusPhone = '$phone' AND Locations.locName = 'Kitchen'";
  $result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Stockstock</title>
    <meta name="viewport" content="width=device-width, initial-scale" />
    <link href="/css/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script scr="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/main.js"></script>

</head>

<body class="bdy" onload="loadNavbar()">
    <div id="navbar"></div>

    <main>
        <section id="content">
            <h3 align="center"><b><u>Ingredients in Kitchen</u></b></h3><br>
            <?php include('content.php'); ?>
            <div id="target" style="float: left;">
                <i class="fas fa-cube">
            </div>
        </section>
    </main>
    
    <?php include('footer.php'); ?>
</body>

</html>