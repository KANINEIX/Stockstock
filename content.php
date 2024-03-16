<!--All Clear-->
<div class="content">
    <table align="center" class="table table-striped text-center">
        <tread class="tread-light">
            <tr class="table-active">
                <th>Orders</th>
                <th>Name</th>
                <th>Quantity (kg)</th>
                <th>Categories</th>
                <th>Location</th>
                <th>Status</th>
                <th colspan="2">Action</th>
            </tr>
        </tread>
        <tbody>
            <tr method="post">
                <?php 
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                <td><?php echo $row['ingID']; ?></td>
                <td><?php echo $row['ingName']; ?></td>
                <td><?php echo $row['ingQuantity']; ?></td>
                <td><?php echo $row['catName']; ?></td>
                <td><?php echo $row['locName']; ?></td>
                <td><?php echo $row['ingStatus']; ?></td>
                <td><a href="edit.php?editid=<?php echo $row['ingID']; ?>" name="btnedit" class="btn btn-primary">Edit</a></td>
                <td>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you really want to delete this information?')">
                        <a href="delete.php?delid=<?php echo $row['ingID']; ?>" class="text-light link-underline link-underline-opacity-0">Delete</a>
                    </button>
                </td>
            </tr>
            <?php 
                  }
                ?>
        </tbody>
    </table>

    <a style="float: right;" class="navbar-brand" href="#" onclick="openPopup('add')">
        <button type="button" class="btn btn-success">
            Add
        </button>
    </a>
</div>

<div class="overlay" id="add">
    <!--Add-->
    <div class="popup-form">
        <h2 align="left">
            &nbsp;Add
            <label class="pull-right">
                <button type="button" class="btn-close" aria-label="Close" onclick="closePopupDone('add')"></button>
            </label>
        </h2>
        <hr />
        <form method="post" align="left">
            <label for="name">Ingredient Name:</label>
            <input type="text" name="aname" id="aname" class="registation" required autofocus><br><br>
            <label for="name">Quantity(kg):</label>
            <input type="text" name="aqty" id="aqty" class="registation" required autofocus><br><br>
            <label for="name">Production Date:</label>
            <input type="date" id="adpd" name="adpd" class="registation" required><br><br>
            <label for="name">Expired Date:</label>
            <input type="date" id="aded" name="aded" class="registation" required><br><br>
            <label>Categories : <br><input type="radio" id="categoriesM" name="categories" value="312000001"
                    checked>&nbsp;&nbsp;Meat&nbsp;&nbsp;</label><br>
            <label><input type="radio" id="categoriesV" name="categories"
                    value="312000002">&nbsp;&nbsp;Vegetable&nbsp;&nbsp;</label><br>
            <label><input type="radio" id="categoriesF" name="categories"
                    value="312000003">&nbsp;&nbsp;Friut&nbsp;&nbsp;</label><br>
            <label><input type="radio" id="categoriesD" name="categories"
                    value="312000004">&nbsp;&nbsp;Drink&nbsp;&nbsp;</label><br>
            <label><input type="radio" id="categoriesC" name="categories"
                    value="312000005">&nbsp;&nbsp;Condiment&nbsp;&nbsp;</label><br><br>
            <label>Location : &nbsp;&nbsp;<input type="radio" id="locationK" name="location" value="121503001"
                    checked>&nbsp;&nbsp;Kitchen&nbsp;&nbsp;</label>
            <label><input type="radio" id="locationF" name="location"
                    value="121503002">&nbsp;&nbsp;Fridge&nbsp;&nbsp;</label><br><br>
            <center>
                <button type="submit" name="submitAdd" class="add-btn">Add</button>
            </center><br>
        </form>
    </div>
</div>

<?php
 
	include("connfig.php");
    if(isset($_POST['submitAdd'])){

        $cusID = $_SESSION['cusid'];
        $name = $_POST['aname'];
        $quantity = $_POST['aqty'];
        $dpd = $_POST['adpd'];
        $ded = $_POST['aded'];
        $cat = $_POST['categories'];
        $loc = $_POST['location'];

        $sql = "INSERT INTO `Ingredient` (`ingID`, `cusID`, `ingName`, `catID`, `ingDate`, `ingExp`, `ingQuantity`, `locID`, `ingEat`, `ingStatus`) 
        VALUES (NULL, '$cusID', '$name', '$cat', '$dpd', '$ded', '$quantity', '$loc', DATEDIFF('$ded', CURRENT_DATE()), 
        CASE WHEN DATEDIFF('$ded', CURRENT_DATE()) > 7 THEN 'Eatable' 
        WHEN DATEDIFF('$ded', CURRENT_DATE()) <= 7 AND DATEDIFF('$ded', CURRENT_DATE()) >= 0 THEN 'Best Before End'
        WHEN DATEDIFF('$ded', CURRENT_DATE()) <= 0 THEN 'Expired' END)";
        $result = mysqli_query( $conn , $sql );
        header("Refresh:0 Location: index.php");
    }
?>