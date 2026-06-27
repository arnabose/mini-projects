<!-----------------bookings section starts here ----------------------->
<h1 style="margin-top:7rem; padding:4rem;" class="heading"> My Booking Details</h1>
    <div class="container">
        <div class="tbl-content" style="text-align: center;">
            <table class="table table-bordered table-hover">
                <thead class="table-primary" style="font-size:1.5rem;">
                    <tr>
                        <th scope="col">Place</th>
                        <th scope="col">image</th>
                        <th scope="col">Price</th>
                        <th scope="col">persons</th>
                        <th scope="col">Total amount</th>
                        <th scope="col">Date of travel</th>
                        <th scope="col">No. of days</th>
                        <th scope="col">payment method</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody style="font-size:1.5rem;">
                    <?php
                        include 'connection/connection.php';

                        $select_query = "SELECT * from bookings where user_id= $user_id";
                        $query = mysqli_query($con, $select_query);
                        while($data = mysqli_fetch_assoc($query)){
                            $place_id= $data['place_id'];

                            $select_query_place = "SELECT * from place where place_id= $place_id";
                            $query_place = mysqli_query($con, $select_query_place);
                            $data_place = mysqli_fetch_assoc($query_place);
                            ?>
                            <tr>
                                <td><?php echo $data_place['place'];?></td>
                                <td><img  width="261.71px" height="111.39px" src="<?php echo str_replace("../image","image",$data_place['image']);?>"></td>
                                <td>Rs. <?php echo $data_place['price'];?> /person</td>
                                <td><?php echo $data['persons'];?></td>
                                <td><?php echo $data['total_amount'];?></td>
                                <td><?php echo $data['date'];?></td>
                                <td><?php echo $data_place['duration'];?></td>
                                <td><?php echo $data['payment_method'];?></td>
                                <td><?php echo $data['status'];?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>