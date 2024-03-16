<?php include('config.php'); ?> <!--Clear!!-->

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
    <script src="/js/main.js"></script>
</head>

<body class="bdy">
    <div>
        <form action="login_db.php" method="post">
            <div class="color-bar" align="center"><br />
                <img src="/image/logo.png" alt="" width="250" height="100" />
            </div><br /><br />
            <center>
                <table class="tbl">
                    <thead>
                        <tr align="center">
                            <br /><br />
                            <input type="number" id="phone" name="phone" placeholder="&nbsp;Phone number" pattern="[0]{1}\d{9}"
                                maxlength="10" class="login" required autofocus />
                            <br /><br />
                            <input type="password" id="password" name="password" placeholder="&nbsp;Password" class="login" required
                                autofocus />
                            <br /><br />
                            <input type="submit" name="loginUser" onclick="Login()"><br /><br />
                            <input type="button" value="Create new account" onclick="openPopup('overlay')">
                            <br /><br /><br /><br />
                        </tr>
                    </thead>
                </table>
            </center>
        </form>
    </div>

    <div class="overlay" id="overlay">
        <!--Registation-->
        <div class="popup-form">
            <h2 align="left">&nbsp;Sign Up</h2>
            <hr />
            <!-- Your form content goes here -->
            <form method="POST" action="signIn.php">
                <input type="text" id="fname" name="fname" placeholder="&nbsp;First name" class="name" required
                    autofocus autocomplete="off">
                <input type="text" id="lname" name="lname" placeholder="&nbsp;Last name" required autocomplete="off">
                <br><br>
                <input type="tel" id="phone" name="phone" placeholder="&nbsp;Mobile number" pattern="\d{3}\d{3}\d{4}"
                    maxlength="10" class="registation" required autocomplete="off"/><br><br>
                <input type="text" id="email" name="email" placeholder="&nbsp;Email" class="registation"
                    required autocomplete="off"><br><br>
                <input type="password" id="pass" name="password" placeholder="&nbsp;Password" class="registation"
                    required><br><br>
                <input type="password" id="cfpass" name="cfpassword" placeholder="&nbsp;Confirm Password"
                    class="registation" required><br><br>
                <button type="submit" name="signUser" class="close-btn">Sign In</button>
                <button type="button" class="btn-close" aria-label="Close" onclick="closePopupDone('overlay')"></button>
            </form>
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>