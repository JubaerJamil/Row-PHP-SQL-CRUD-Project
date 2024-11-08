<?php

session_start();
include 'config/connection.php';

$query = "SELECT * FROM products ORDER BY id DESC";
$results = mysqli_query($connection, $query);
$allProducts = mysqli_fetch_all($results, MYSQLI_ASSOC);
?>


<?php include 'layout/header.php' ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <?php
      if (isset($_SESSION['status']) && $_SESSION != '') {}?>
            <?php
                if(isset($_SESSION['status'])){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else {
                }
            ?>

      <?php unset($_SESSION['status']);?>

      <?php
      if (isset($_SESSION['status']) && $_SESSION != '') {}?>
            <?php
                if(isset($_SESSION['status'])){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else {
                }
            ?>

      <?php unset($_SESSION['status']);?>

      <?php
      if (isset($_SESSION['status']) && $_SESSION != '') {}?>
            <?php
                if(isset($_SESSION['status'])){
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
                }else {
                }
            ?>

      <?php unset($_SESSION['status']);?>

      <div class="card">
        <div class="card-body">
          <h3>Product List</h3>
          <h1>
            <a href="create.php" class="btn btn-primary">Create Product</a>
          </h1>
        </div>
        <div class="card-header">
          <table class="table">
            <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
                <th>Regular Price</th>
                <th>Offer Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allProducts as $index => $product): ?>
                <tr>
                  <th scope="row"><?php echo $index + 1 ?></th>
                  <td><?php echo $product['name'] ?></td>
                  <td><?php echo $product['title'] ?></td>
                  <td><?php echo $product['description'] ?></td>
                  <td><?php echo $product['price'] ?></td>
                  <td><?php echo $product['offer_price'] ?></td>
                  <td><img src="<?php echo "upload/" . $product['image'] ?>" alt="<?php echo $product['name'] ?>"
                      width="100px" height="80px"></td>
                  <td class="<?php echo $product['status'] == 1 ? 'success' : 'danger' ?>">
                    <?php echo $product['status'] == 1 ? 'Active' : 'Inactive' ?>
                  </td>
                  <td>
                      <div class="d-flex">
                            <a href="edit.php?id=<?php echo $product['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <form action="core.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $product['id']?>">
                            <input type="hidden" name="image" value="<?php echo $product['image']?>">
                          <button type="submit" class="btn btn-danger btn-sm ms-2" onclick="return confirm('Are you sure! Delete this item')" name="deleteBtn">Delete</button>
                        </form>
                      </div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'layout/footer.php' ?>