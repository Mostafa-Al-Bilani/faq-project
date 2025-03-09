<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Read raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["fullname"]) && isset($data["email"]) && isset($data["password"])) {
    require("../../models/User.php");
    require("../../connection/connection.php");

    $fullname = $data["fullname"];
    $email = $data["email"];
    $password = $data["password"];
    $user = new User($fullname, $email, $password);
    $response = $user->insert($mysqli);

    echo $response;
} else {
    echo json_response("invalid request", "", false);
}
?>
