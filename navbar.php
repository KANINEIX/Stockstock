<?php 
  session_start();
  include('config.php');

  $phone = $_SESSION['phone'];
  $sql = "SELECT * FROM customers WHERE cusPhone = $phone";
  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($query);
  
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/main.js"></script>
</head>

<body>
    <header>
        <!--Bar-->
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
            <div class="container-fluid">
                <!--Bar-->
                <a class="navbar-brand" href="/php/index.php">
                    <!--In left on bar All good-->
                    <button type="button" class="btn btn-primary position-relative">
                        <img src="/image/logo.png" alt="" width="125" height="50" class="pict" />
                    </button>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation" onclick="">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li>
                            <a class="navbar-item" href="/php/kitchen.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/kichen.png" alt="" width="25" height="25" />&nbsp;Kitchen
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="/php/fridge.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/fridge.png" alt="" width="25" height="25" />&nbsp;Fridge
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="/php/eatable.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/eatable.png" alt="" width="25" height="25" />&nbsp;Eatable
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="/php/bbe.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/bbe.png" alt="" width="25" height="25" />&nbsp;Best Before End
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="/php/exp.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/exp.png" alt="" width="25" height="25" />&nbsp;Expired
                                </button>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end">
                        <!--In right on bar All good-->
                        <li>
                            <a class="navbar-item" href="bot.php">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/chat.png" alt="" width="25" height="25" />
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="#" onclick="openPopup('basket')">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/basket.png" alt="" width="25" height="25" />
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="updateUser.php?updid=<?php  echo $result['cusID'] ?>">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/user.png" alt="" width="25" height="25" />
                                </button>
                            </a>
                        </li>
                        <li>
                            <a class="navbar-item" href="#" onclick="openPopup('notification')">
                                <button type="button" class="btn btn-primary position-relative">
                                    <img src="/image/notification.png" alt="" width="25" height="25" />
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav><br>

        <div class="dropdownmenu open">
            <li>
                <a class="navbar-item" href="/php/kitchen.php">
                    <img src="/image/kichen.png" alt="" width="25" height="25" />&nbsp;Kitchen
                </a>
            </li>
            <li>
                <a class="navbar-item" href="/php/fridge.php">
                    <img src="/image/fridge.png" alt="" width="25" height="25" />&nbsp;Fridge
                </a>
            </li>
            <li>
                <a class="navbar-item" href="/php/eatable.php">
                    <img src="/image/eatable.png" alt="" width="25" height="25" />&nbsp;Eatable
                </a>
            </li>
            <li>
                <a class="navbar-item" href="/php/bbe.php">
                    <img src="/image/bbe.png" alt="" width="25" height="25" />&nbsp;Best Before End
                </a>
            </li>
            <li>
                <a class="navbar-item" href="/php/exp.php">
                    <img src="/image/exp.png" alt="" width="25" height="25" />&nbsp;Expired
                </a>
            </li>
            <li>
                <a class="navbar-item" href="bot.php">
                    <img src="/image/chat.png" alt="" width="25" height="25" />&nbsp;Chat Bot
                </a>
            </li>
            <li>
                <a class="navbar-item" href="#" onclick="openPopup('basket')">
                    <img src="/image/basket.png" alt="" width="25" height="25" />&nbsp;Basket
                </a>
            </li>
            <li>
                <a class="navbar-item" href="updateUser.php?updid=<?php  echo $result['cusID'] ?>">
                    <img src="/image/user.png" alt="" width="25" height="25" />&nbsp;Account
                </a>
            </li>
            <li>
                <a class="navbar-item" href="#" onclick="openPopup('notification')">
                    <img src="/image/notification.png" alt="" width="25" height="25" />&nbsp;Notification
                </a>
            </li>
        </div>
    </header>

    <!-- Clear!! -->
    <div class="overlay" id="basket">
        <!--basket-->
        <div class="popup-form">
            <h2 align="left">
                Choose the platform you want to use.
                <label class="pull-right">
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="closePopupDone('basket')"></button>
                </label>
            </h2>
            <hr />
            <div style="display: flex; justify-content: space-around;">From Brand Service:
                <button type="button" class="btn btn-outline-success"
                    onclick="openWeb('https:/\/www.lotuss.com/th?utm_source=google-sem_o2o-mkt&utm_medium=ad-text&utm_campaign=branded-lotus-all_branded-eng-new-mar24&gad_source=1')">
                    Lotus</button>
                <button type="button" class="btn btn-outline-secondary"
                    onclick="openWeb('https:/\/www.bigc.co.th/?utm_source=google&utm_medium=sem&utm_campaign=aiqthailand_ecom_bigc_gg_sem_brands_conv&utm_content=awo&gad_source=1&gclid=EAIaIQobChMI7bLbg77lhAMVlqlmAh30iwbvEAAYASAAEgLHP_D_BwE')">
                    BigC</button>
                <button type="button" class="btn btn-outline-warning"
                    onclick="openWeb('https:/\/www.allonline.7eleven.co.th/')">
                    7-Eleven</button>
                <button type="button" class="btn btn-outline-danger"
                    onclick="openWeb('https:/\/www.makro.pro/?clickid=xlCmoUFoAU7UWuIBtOzhk8JfbI79kOg7uiUyyPgJzLZNZtBh&gad_source=1&gclid=EAIaIQobChMIpru6s7_lhAMVttI8Ah1hxg8uEAAYASAAEgKxR_D_BwE')">
                    Makro</button>
            </div><br>
            <div style="display: flex; justify-content: space-around;">From Delivery Service:
                <button type="button" class="btn btn-success"
                    onclick="openWeb('https:/\/mart.grab.com/th/th?utm_source=grab.com&utm_medium=referral&utm_campaign=hero-cta-mart-product&pid=Grab.com&c=hero-cta')">
                    Grab</button>
                <button type="button" class="btn btn-secondary" onclick="openWeb('https:/\/lineman.line.me/mart/')">
                    Line Man</button>
                <button type="button" class="btn btn-danger"
                    onclick="openWeb('https:/\/www.foodpanda.co.th/th/restaurants/new?lng=100.5153066455078&lat=13.826748237556655&vertical=shop&expedition=delivery')">
                    Food Panda</button>
            </div>
        </div>
    </div>

    <!-- Clear!! -->
    <div class="overlay" id="notification">
        <!--basket-->
        <div class="popup-form">
            <h2 align="left">
                Notification
                <label class="pull-right">
                    <button type="button" class="btn-close" aria-label="Close"
                        onclick="closePopupDone('notification')"></button>
                </label>
            </h2>
            <hr />
            <div style="display: flex; justify-content: space-around;">
                <h5>We've nothing to show you...</h5>
            </div>
        </div>
    </div>

    <script>
    const btnToggle = document.querySelector('.navbar-toggler');
    const dropdown = document.querySelector('.dropdownmenu');

    btnToggle.onclick = function() {
        dropdown.classList.toggle("open")
    }
    </script>
</body>

</html>