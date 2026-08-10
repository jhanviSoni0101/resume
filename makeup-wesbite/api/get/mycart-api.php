<?php
include('../../components/connection.php');
$sql = "SELECT cart.id,
               cart.qty,
               makeup.productid,
               makeup.productname,
               makeup.price,
               makeup.image
        FROM cart
        INNER JOIN makeup
        ON cart.productid = makeup.productid"; 
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
