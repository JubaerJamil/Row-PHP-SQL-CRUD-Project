<?php
session_start();
?>

<?php include 'layout/header.php' ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($__SESSION['missing']) && $__SESSION != '') {}; ?>

            <?php
                if(isset($_SESSION['missing'])){
            ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['missing']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else {
                }
            ?>
            <?php unset($_SESSION['missing']) ?>
            <div class="card">
                <div class="card-body">
                    <h3>Create Product</h3>
                    <h1>
                        <a href="index.php" class="btn btn-primary">Product List</a>
                    </h1>
                </div>
                <div class="card-header">

                    <form action="core.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Title</label>
                            <input type="text" class="form-control" name="title" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Regural Price</label>
                            <input type="number" class="form-control" name="regular_price" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Offer Price</label>
                            <input type="number" class="form-control" name="offer_price" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product description</label>
                            <input type="text" class="form-control" name="description" value="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" name="image" oninput="img.src=window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="img" class="thum-image mt-3" width="150px" height="auto" style="outline: none; border: none; background: transparent;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statuss" id="active" value="1">
                                <label class="form-check-label" for="active">Active</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="statuss" id="inactive" value="0">
                                <label class="form-check-label" for="inactive">Inactive </label>
                            </div>
                        </div>

                        <button type="submit" name="savebtn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>