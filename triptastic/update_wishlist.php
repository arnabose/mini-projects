<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }
    include 'connection/connection.php';
    $place_id = $_GET['save'];
    $user_id = $_SESSION['user_id'];
    $persons = $_GET['persons'];
    $date = $_GET['date'];

    if(isset($_GET['save'])){
        $update_wishlist = "UPDATE `wishlist` SET `user_id`='$user_id',`place_id`='$place_id',`persons`='$persons',`date`='$date' WHERE place_id = $place_id and user_id = $user_id";

        $uqery_update = mysqli_query($con, $update_wishlist);
        if($uqery_update){
            ?>
            <script>
                window.location.href="user_dashboard.php?my_trips";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                window.location.href="user_dashboard.php?my_trips";
                alert('failed to update details');
            </script>
            <?php
        }
    }
?>