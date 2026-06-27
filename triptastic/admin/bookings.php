<?php
    include '../connection/connection.php';
?>
<div class="container">
    <div class="d-flex justify-content-between">
        <div class="p-2"><h2>View Bookings<h2></div>
    </div>
</div>
<div class="tbl-content">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Customer name</th>
                <th scope="col">Place</th>
                <th scope="col">date of travel</th>
                <th scope="col">persons</th>
                <th scope="col">no. of days</th>
                <th scope="col">Total amount</th>
                <th scope="col">payment method</th>
                <th scope="col">Status</th>
                <th scope="col">email address</th>
                <th scope="col">contact number</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include '../connection/connection.php';
            $select_query = "SELECT * from bookings";
            $query = mysqli_query($con, $select_query);
            while($data = mysqli_fetch_assoc($query)){
                $user_id = $data['user_id'];
                $place_id = $data['place_id'];

                $select_query_user = "SELECT * from user where user_id= $user_id";
                $query_user= mysqli_query($con,$select_query_user);
                $data_user = mysqli_fetch_assoc($query_user);

                $select_query_place = "SELECT * from place where place_id= $place_id";
                $query_place= mysqli_query($con,$select_query_place);
                $data_place = mysqli_fetch_assoc($query_place);
                ?>
                <tr>
                    <td><?php echo $data_user['fname']." ".$data_user['lname'];?></td>
                    <td><?php echo $data_place['place'];?></td>
                    <td><?php echo $data['date'];?></td>
                    <td><?php echo $data['persons'];?></td>
                    <td><?php echo $data_place['duration'];?></td>
                    <td>Rs. <?php echo $data['total_amount'];?></td>
                    <td><?php echo $data['payment_method'];?></td>
                    <td><?php echo $data['status'];?></td>
                    <td><?php echo $data_user['email'];?></td>
                    <td><?php echo $data_user['mobile'];?></td>
                </tr>
                <?php
            }
        ?>
        </tbody>
    </table>
</div>
