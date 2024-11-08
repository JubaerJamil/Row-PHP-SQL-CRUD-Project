<?php
session_start();
include 'config/connection.php';

if (isset($_POST['savebtn'])) {
    $productName = mysqli_real_escape_string($connection, $_POST['name']);
    $productTitle = mysqli_real_escape_string($connection, $_POST['title']);
    $productDes = mysqli_real_escape_string($connection, $_POST['description']);
    $productPrice = $_POST['regular_price'];
    $productOffer = $_POST['offer_price'];
    $productImage = $_FILES['image']['name'];
    $extensin = pathinfo($productImage, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $productImage), 0, 20) . '.' . $extensin;
    // $productStatus = isset($_POST['status']) != null ? (int) $_POST['status'] : '';
    $productStatus = $_POST['statuss'];

    if ($productName == null) {
        echo "<script type='text/javascript'>alert('Please fill up product name field');</script>";

    } elseif ($productTitle == null) {
        echo "<script type='text/javascript'>alert('Please fill up product title field');</script>";

    } elseif ($productPrice == null) {
        echo "<script type='text/javascript'>alert('Please fill up product price field');</script>";

    } elseif ($productOffer == null) {
        echo "<script type='text/javascript'>alert('Please fill up product offer price field');</script>";

    } elseif ($productDes == null) {
        echo "<script type='text/javascript'>alert('Please fill up product description field');</script>";

    } elseif ($productImage == null) {
        echo "<script type='text/javascript'>alert('Please fill up product image field');</script>";

    } elseif ($productStatus == null) {
        echo "<script type='text/javascript'>alert('Please fill up product status field');</script>";

    } else {
        $insertQuery = "INSERT INTO products (name, image, title, description, price, offer_price, status) 
        VALUES ('$productName', '$ImageName', '$productTitle', '$productDes', '$productPrice', '$productOffer', '$productStatus')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $ImageName);
            $_SESSION['status'] = "Product inserted successfully done";
            header('location: index.php');

        } else {
            $_SESSION['status'] = "Product inserted failed";
            header('location: create.php');
        }
    }
} else {
    echo "Request Failed";
}


if (isset($_POST['updateBtn'])) {

    $id = $_POST['id'];
    $productName = mysqli_real_escape_string($connection, $_POST['name']);

    $productTitle = mysqli_real_escape_string($connection, $_POST['title']);

    $productDes = mysqli_real_escape_string($connection, $_POST['description']);

    $productPrice = $_POST['regular_price'];

    $productOffer = $_POST['offer_price'];


    $productImage = $_FILES['image']['name'];
    $oldImage = $_POST['old_image'];

    $extensin = pathinfo($productImage, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $productImage), 0, 20) . '.' . $extensin;
    $productStatus = isset($_POST['status']) ? (int) $_POST['status'] : null;


    if ($productImage != null) {
        $updateImage = $productImage;
    } else {
        $updateImage = $oldImage;
    }

    $updateQuery = "UPDATE products SET  name='$productName', image='$updateImage', title='$productTitle', description= '$productDes', price= '$productPrice', offer_price='$productOffer', status='$productStatus' WHERE id=$id";


    $updateQuery_run = mysqli_query($connection, $updateQuery);

    if ($updateQuery_run) {

        if ($productImage != null) {
            move_uploaded_file($_FILES['image']['tmp_name'], "upload/" . $updateImage);
            unlink('upload/' . $oldImage);
        }

        $_SESSION['status'] = "Product update successfully done";
        header('location: index.php');

    } else {
        $_SESSION['status'] = "Product update failed";
        header('location: edit.php');
    }

} else {
    echo "Request Failed";
}


if (isset($_POST['deleteBtn'])) {
    $id = $_POST['id'];
    $image = $_POST['image'];

    $delete_query = "DELETE FROM products WHERE id=$id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        unlink('upload/' . $image);
        $_SESSION['status'] = "Product item delete successfully done!";
        header('location: index.php');
    } else {
        $_SESSION['status'] = "Request Failed";
        header('location: index.php');
    }
}