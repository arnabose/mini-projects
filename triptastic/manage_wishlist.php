<?php
    include 'connection/connection.php';
    session_start();
    if(!isset($_SESSION['user_name'])){
        header('location: index.php');
    }

    // logic for adding items to cart
    $place_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    
    $select_query_wishlist = "select * from wishlist where place_id= $place_id and user_id= $user_id";
    $query_wishlist = mysqli_query($con, $select_query_wishlist);
    $count=mysqli_num_rows($query_wishlist);

    if(empty($data = mysqli_fetch_assoc($query_wishlist))){
        $insert_query_wishlist = "insert into wishlist(user_id,place_id,persons,date) values ('$user_id','$place_id',1,now())";
        $query_wishlist_insert = mysqli_query($con,$insert_query_wishlist);
        if($query_wishlist_insert){
            ?>
            <script>
                alert('Place added your wishlist');
                window.location.href="user_dashboard.php?home";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert('Failed to add place in your wishlist');
                window.location.href="user_dashboard.php?home";
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            alert('Place is already added to my trips');
            window.location.href="user_dashboard.php?home";
        </script>
        <?php
    }
?>
