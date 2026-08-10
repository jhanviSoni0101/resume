<?php
include('../../components/connection.php');
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    header('Content-Type: application/json');
    $raw_Data = file_get_contents('php://input');
    $data = json_decode($raw_Data, true);
    $id = $data['id'];
    $sql = "DELETE FROM cart WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {

        echo json_encode(["status" => "success", "message" => "Item deleted"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }
}
?>