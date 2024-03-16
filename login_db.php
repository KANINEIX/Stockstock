<?php // Clear!!

    session_start();
    include('config.php');

    if(isset($_POST['loginUser'])){
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $pass = md5($password);
        $query = "SELECT * FROM customers WHERE cusPhone = '$phone' AND cusPassword = '$pass'";
        $result = mysqli_query($conn, $query) or die("Error in querying database");
        $row = mysqli_fetch_assoc( $result );

        if(mysqli_num_rows($result) == 1){
            $_SESSION['cusid'] = $row['cusID'];
            $_SESSION['phone'] = $phone;
            $_SESSION['isLoggedIn'] = true;
            
            header("Location: index.php");
        } else {
            echo "<script>alert('Invalid Phone Number or Password')</script>";
            header('Refresh:0; url=login.php');
        }
    }

?>