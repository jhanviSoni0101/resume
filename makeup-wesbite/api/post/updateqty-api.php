<?php
include('../../components/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);
    $id = $data['id'];
    $qty = $data['qty'];
    $sql = "update cart set qty='$qty' where id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {

        echo json_encode([
            "status" => "success",
            "message" => "Quantity Updated"
        ]);
    } else {

        echo json_encode([
            "status" => "error",
            "message" => "Something went wrong"
        ]);
    }
}
?>
