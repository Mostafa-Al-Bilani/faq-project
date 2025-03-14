<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Read raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["email"]) && isset($data["password"])) {
    include("../../models/user.php");
    include("../../connection/connection.php");


    $email = $data["email"];
    $password = $data["password"];
    $user = new User("", $email, $password);

    $response = $user->login($mysqli);
    echo $response;
} else {
    echo json_response("invalid request", "", false);
}
