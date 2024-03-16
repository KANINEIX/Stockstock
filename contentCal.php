<div class="content">
    <table align="center" class="table table-striped text-center">
        <tread class="tread-dark">
            <tr class="table-active">
                <th>Orders</th>
                <th>Name</th>
                <th>Quantity (kg)</th>
                <th>Categories</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </tread>
        <tbody>
            <tr>
                <?php 
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                <td id='id'><?php echo $row['ingID']; ?></td>
                <td id='id'><?php echo $row['ingName']; ?></td>
                <td id='id'><?php echo $row['ingQuantity']; ?></td>
                <td id='id'><?php echo $row['catName']; ?></td>
                <td id='id'><?php echo $row['locName']; ?></td>
                <td id='id'><?php echo $row['ingStatus']; ?></td>
            </tr>
            <?php 
                  }
                ?>
        </tbody>
    </table>
</div>