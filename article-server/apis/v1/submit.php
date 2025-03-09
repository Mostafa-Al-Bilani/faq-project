<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Read raw JSON input
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data["question"]) && isset($data["answer"])) {
    include("../../auth/check-auth-token.php");
    include("../../models/question.php");
    include("../../connection/connection.php");
    $auth_array = checkAuthToken();
    $userid = $auth_array["user_id"];


    $question = $data["question"];
    $answer= $data["answer"];
    $question = new Question($question, $answer, $userid);

    $response = $question->insert($mysqli);
    echo $response;
} else {
    echo json_response("invalid", "", false);
}
