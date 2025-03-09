<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Read raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["question"]) && isset($data["answer"])) {
    include("../../models/user.php");
    include("../../connection/connection.php");


    $question = $data["question"];
    $answer= $data["answer"];
    $question = new Question($question, $answer);

    $response = $question->insert($mysqli);
    echo $response;
} else {
    echo json_response("invalid", "", false);
}
