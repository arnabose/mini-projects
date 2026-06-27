<?php
    include '../connection/connection.php';
?>
<div class="position">
    <div class="box">
        <h3 style="color: #192a56; font-weight: bolder;">Add Place</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3 col-md-12">
                <label class="form-label">Place name:</label>
                    <input type="text" name="place_name" class="form-control" placeholder="Name of the place" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Description:</label>
                    <textarea  name="description" rows="3" cols="30" class="form-control" placeholder="Description or details of the place"></textarea>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Price:</label>
                    <input type="number" name="price" min="0" class="form-control" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Duration:</label>
                <input type="number" name="duration" min="0" class="form-control" required>
            </div>
            <div class="mb-3 col-md-12">
                <label class="form-label">Select image:</span></label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="d-grid gap-2">    
                <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
            </div>
        </form>

    </div>
</div>

<!-------sending data to database ------>
<?php
    if(isset($_POST['submit'])){
        $place_name = $_POST['place_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $duration = $_POST['duration'];
        $file = $_FILES['image'];

        // print_r($file);
        $file_name = $file['name'];
        $temp_file_path = $file['tmp_name'];
        $destination_path = '../image/uploads/'.$file_name;
        move_uploaded_file($temp_file_path, $destination_path);

        $insert_query = "insert into place(place, description, price, duration, image) values('$place_name','$description','$price','$duration','$destination_path')";

        $query = mysqli_query($con, $insert_query);

        if($query){
            $_SESSION['i-status'] = "success";
            $_SESSION['i-message'] = "Place added successfully";
            ?>
            <script>
                window.location.href= "dashboard.php?places";
            </script>
            <?php
        }
        else{
            $_SESSION['i-status'] = "danger";
            $_SESSION['i-message'] = "Failed to add place details";
            ?>
            <script>
                window.location.href= "dashboard.php?places";
            </script>
            <?php
        }
    }
?>