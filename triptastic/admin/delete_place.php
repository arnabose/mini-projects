<?php
    session_start();
    include '../connection/connection.php';

    $id= $_GET['id'];
    // fetching place image name from database to delete the physical image in unlink section
    $select_query = "SELECT * from place where place_id = $id";
    $query = mysqli_query($con, $select_query);
    $data = mysqli_fetch_assoc($query);
    $image = $data['image'];

    // for deleting the selected place
    $delete_query = "delete from place where place_id= $id ";
    $query = mysqli_query($con, $delete_query);

    if($query){
        $_SESSION['i-status'] = "success";
        $_SESSION['i-message'] = "place details deleted successfully";
        ?>
        <script>
            window.location.href= "dashboard.php?places";
        </script>
        <?php
        unlink($image);
    }
    else{
        $_SESSION['i-status'] = "danger";
        $_SESSION['i-message'] = "Failed to delete place";
        ?>
        <script>
            window.location.href= "dashboard.php?places";
        </script>
        <?php
    }
?>