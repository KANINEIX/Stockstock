<?php 
  session_start();
  include('config.php');

  if (!isset($_SESSION['phone'])) {
    header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset( $_SESSION['phone'] );
    unset( $_SESSION['cusid'] );
    unset( $_SESSION['fname'] );
    unset( $_SESSION['lname'] );
    unset( $_SESSION['email'] );
    header("Location: login.php");
  }

  $id = $_GET['updid'];
  $sql = "SELECT * FROM `Customers` WHERE cusID = $id";
  $res = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($res);
  $fname = $row['cusFName'];
  $lname = $row['cusLName'];
  $phone = $row['cusPhone'];
  $email = $row['cusEmail'];
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
        <!--Account Edit-->
        <div>
            <h2 align="center"><u>Account Information</u></h2>
            <form method="post" align="left">
                <table class="table-responsive-sm" style="width: 50%; margin: auto;">
                    <thead>
                        <tr>
                            <td>
                                <label for="name">First Name:</label>
                                <input type="text" name="fname" id="fname" class="edit" required autofocus
                                    value="<?php echo $fname; ?>"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="lname">Last Name:</label>
                                <input type="text" id="lname" name="lname" class="edit"
                                    value="<?php echo $lname; ?>"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="phoneNumber">Mobile Phone:</label>
                                <input type="tel" id="phoneEdit" name="phone" pattern="\d{3}\d{3}\d{4}" class="edit"
                                    value="<?php echo $phone; ?>" /><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">Email:</label>
                                <input type="text" id="emailEdit" name="email" class="edit"
                                    value="<?php echo $email; ?>"><br><br>
                            </td>
                        <tr>
                            <td>
                                <center>
                                    <a href="index.php"><button type="button" class="btn btn-outline-primary">Back</button></a>
                                    <button type="submit" name="submit"
                                        onclick="return confirm('Is this information really correct?')"
                                        class="done-btn">Update</button>
                                    <a href="index.php?logout='1'"><button type="button"
                                            class="btn btn-outline-danger">Log
                                            Out</button></a>
                                </center><br><br>
                            </td>
                        </tr>
                    </thead>
                </table>
            </form>
        </div>
    </div>
    <?php 

    if(isset($_POST['submit'])) {
        // echo "<script>alert('Account updating'); window.location.href='index.php';</script>";
        $id = $_GET['updid'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
    
        $sql = "UPDATE Customers SET cusFName = '$fname', cusLName = '$lname', cusEmail = '$email', cusPhone = '$phone' WHERE cusID = $id;";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            echo "<script>alert('Account has been updated!'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    }

    ?>
    <?php include('footer.php'); ?>

</body>

</html>