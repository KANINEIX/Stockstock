<?php

  session_start();
  include('config.php');
  
  if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset( $_SESSION['phone'] );
    header("Location: login.php");
  }

  $id = $_GET['editid'];
  $query = "SELECT * FROM `Ingredient` WHERE ingID = $id";
  $res = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($res);
  $name = $row['ingName'];
  $qty = $row['ingQuantity'];
  $dpd = $row['ingDate'];
  $ded = $row['ingExp'];
  $cat = $row['catID'];
  $loc = $row['locID'];

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

    <div>
        <!--Edit-->
        <div>
            <h2 align="center"><u>Edit</u></h2>
            <form method="post" align="left">
                <table class="table-responsive-sm" style="width: 50%; margin: auto;">
                    <thead>
                        <tr>
                            <td colspan="2">
                                <label for="name">Ingredient Name:</label>
                                <input type="text" name="ename" id="ename" class="edit" required autofocus
                                    value="<?php echo $name; ?>"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="name">Quantity(kg):</label>
                                <input type="text" name="eqty" id="eqty" class="edit" required
                                    value="<?php echo $qty; ?>"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="name">Production Date:</label>
                                <input type="date" id="edpd" name="edpd" class="edit" required
                                    value="<?php echo $dpd; ?>"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <label for="name">Expired Date:</label>
                                <input type="date" id="eded" name="eded" class="edit" required
                                    value="<?php echo $ded; ?>"><br><br>
                            </td>
                        <tr>
                            <td>
                                <label>Categories : <br></label>
                                <select id="categories" name="categories" class="edit" value="<?php echo $cat; ?>">
                                    <option value="312000001" <?=$cat == 312000001 ? ' selected="selected"' : '';?>>Meat
                                    </option>
                                    <option value="312000002" <?=$cat == 312000002 ? ' selected="selected"' : '';?>>
                                        Vegetable</option>
                                    <option value="312000003" <?=$cat == 312000003 ? ' selected="selected"' : '';?>>
                                        Fruit</option>
                                    <option value="312000004" <?=$cat == 312000004 ? ' selected="selected"' : '';?>>
                                        Drink</option>
                                    <option value="312000005" <?=$cat == 312000005 ? ' selected="selected"' : '';?>>
                                        Condiment</option>
                                </select><br><br>
                                <label>Location : <br></label>
                                <select id="location" name="location" class="edit">
                                    <option value="121503001" <?=$loc == 121503001 ? ' selected="selected"' : '';?>>
                                        Kitchen</option>
                                    <option value="121503002" <?=$loc == 121503002 ? ' selected="selected"' : '';?>>
                                        Fridge</option>
                                </select><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>
                                    <button type="submit" name="submit"
                                        onclick="return confirm('Is this information really correct?')"
                                        class="done-btn">Update</button>
                                </center><br><br>
                            </td>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
    </div>

<?php 

  if(isset($_POST['submit'])){
    // echo "<script> alert('Item has been updated!'); location.href='index.php';</script>";
    $id = $_GET['editid'];
    $cusID = $_SESSION['cusid'];
    $name = $_POST['ename'];
    $qty = $_POST['eqty'];
    $dpd = $_POST['edpd'];
    $ded = $_POST['eded'];
    $cat = $_POST['categories'];
    $loc = $_POST['location'];
    // echo "<script> alert('Item has been updated!'); location.href='index.php';</script>";
    $sql = "UPDATE Ingredient 
    SET ingName = '$name', catID = '$cat', ingDate = '$dpd', ingExp = '$ded',
    ingQuantity = '$qty',
    locID = '$loc',
    ingEat = DATEDIFF(CURRENT_DATE(), '$ded'),
    ingStatus = CASE 
                    WHEN DATEDIFF(CURRENT_DATE(), '$ded') > 7 THEN 'Eatable'
                    WHEN DATEDIFF(CURRENT_DATE(), '$ded') <= 7 AND DATEDIFF(CURRENT_DATE(), '$ded') >= 0 THEN 'Best Before End'
                    WHEN DATEDIFF(CURRENT_DATE(), '$ded') < 0 THEN 'Expired'
                END
    WHERE ingID = '$id';
    ";
    $result = mysqli_query( $conn , $sql );
    
    echo "<script> alert('Item has been updated!'); location.href='index.php';</script>";
  }
    
?>

    <?php include('footer.php'); ?>
</body>

</html>