<?php // Clear!!

    session_start();
    include('config.php');
    $errors = array();

    if (isset($_POST['signUser'])) {
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = strtolower(mysqli_real_escape_string($conn,$_POST['email']));
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cfpassword = mysqli_real_escape_string($conn, $_POST['cfpassword']);
    }

    if(empty($fname)) {
        array_push($errors, 'Please enter your first name');
    }
    if(empty($lname)) {
        array_push($errors, 'Please enter your last name');
    }
    if(empty($phone)) {
        $_SESSION['error'] = 'Please enter your phone number';
    }
    if(empty($email)) {
        array_push($errors, "Email is required");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, 'Please enter a valid email address');
    }
    if(empty($password)) {
        array_push($errors, "Password is required");
    }
    if($password != $cfpassword) {
        array_push($errors, 'The two passwords do not match');
    } else {
        
        $userCheck = "SELECT * FROM customers WHERE cusPhone = '$phone' OR cusEmail = '$email'";
        $query = mysqli_query($conn,  $userCheck);
        $result = mysqli_fetch_assoc( $query );

        if($result){
            if( $result['cusPhone'] == $phone ) {
                array_push($errors, "Phone already exists!");
                echo 'Error';
            }
            if(  $result['cusEmail'] == $email ){
                array_push($errors, "Email already exists!");
                echo 'Error';
            }
        }
        $hashedPW =  md5($password); //encrypt password before storing in database
            
        $sql = "INSERT INTO `customers` (`cusID`, `cusFName`, `cusLName`, `cusEmail`, `cusPhone`, `cusPassword`) 
        VALUES (NULL, '$fname', '$lname', '$email', '$phone', '$hashedPW')";
        mysqli_query( $conn ,$sql);

        $query = "SELECT * FROM customer WHERE cusPhone = $phone";
        $results = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($results);

        $_SESSION['cusid'] = $row['cusID'];
        $_SESSION['phone'] = $phone;
        $_SESSION['success'] = "1";
        header('Location: index.php');
    }

?>