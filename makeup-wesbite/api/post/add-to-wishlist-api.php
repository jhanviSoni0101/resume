<?php
include('../../components/connection.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    header('Content-Type: application/json');
    $productid = $_POST['productid'];
    $page=$_POST['page'];
    $range=$_POST['range'];
    $check_sql = "select * from wishlist where productid=$productid";
    $check_result = mysqli_query($conn, $check_sql);
    $check_row = mysqli_num_rows($check_result);
    if ($check_row > 0) {
        $delete_sql = "delete from wishlist where productid=$productid";
        mysqli_query($conn, $delete_sql);
    } else {
        $insert_sql = "Insert into wishlist(productid) values($productid)";
        mysqli_query($conn, $insert_sql);
    }
    header("Location:/makeup-wesbite/makeupshoppage.php?page=$page&range=$range");
}
