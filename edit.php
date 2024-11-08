<?php
session_start();
include 'config/connection.php';
?>

<?php include 'layout/header.php' ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-body">
                    <h3>Product Item Edit</h3>
                    <h1>
                        <a href="index.php" class="btn btn-primary">Return List</a>
                    </h1>
                </div>
                <div class="card-header">

                <?php 
                    $id = $_GET['id'];
                    $editQuery = "SELECT * FROM products WHERE id= $id";
                    $editQuery_run = mysqli_query($connection, $editQuery);

                    if(mysqli_num_rows($editQuery_run) > 0){

                            foreach($editQuery_run as $data) 
                            {
                            ?>
                                <form action="core.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $data['id']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $data['name']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Title</label>
                                        <input type="text" class="form-control" name="title" value="<?php echo $data['title']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Regural Price</label>
                                        <input type="number" class="form-control" name="regular_price" value="<?php echo $data['price']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Offer Price</label>
                                        <input type="number" class="form-control" name="offer_price" value="<?php echo $data['offer_price']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product description</label>
                                        <input type="text" class="form-control" name="description" value="<?php echo $data['description']?>">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Image</label>
                                        <input type="file" class="form-control" name="image" oninput="img.src=window.URL.createObjectURL(this.files[0])">
                                        <input type="hidden" class="form-control" name="old_image" value="<?php echo $data['image']?>">
                                        <img src="<?php echo 'upload/'.$data['image']?>" alt="" id="img" class="thum-image mt-3" width="150px" height="auto" style="outline: none; border: none; background: transparent;">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="active" value="1" <?php echo $data['status'] == 1 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="active">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="inactive" value="0" <?php echo $data['status'] == 0 ? 'checked' : '' ?>>
                                            <label class="form-check-label" for="inactive">Inactive </label>
                                        </div>
                                    </div>

                                    <button type="submit" name="updateBtn" class="btn btn-primary">Update</button>
                                </form>
                            <?php
                            }
                        
                        
                        
                    }
                    else{
                        echo "Data not found";
                    }
                ?>


                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>