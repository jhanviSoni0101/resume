<?php
include('../../components/connection.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header('Content-Type: application/json');
    $productid = $_POST['productid'];
    $insert_sql = "Insert into cart(productid) values($productid)";
    $result = mysqli_query($conn, $insert_sql);
    if ($result) {
        header("Location:/makeup-wesbite/makeupshoppage.php");
    }
}
