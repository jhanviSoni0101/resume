<?php
include('../../components/connection.php');
$sql = "SELECT makeup.*
        FROM wishlist
        INNER JOIN makeup
        ON wishlist.productid = makeup.productid";
$result = mysqli_query($conn, $sql);
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data); 