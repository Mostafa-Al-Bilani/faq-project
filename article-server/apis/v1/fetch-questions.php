<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true"); 
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

    include("../../models/Question.php");
    include("../../connection/connection.php");
    include("../../auth/check-auth-token.php");
    
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    checkAuthToken();
    $question = new Question();



    $response = $question->select($mysqli, $search);
    echo $response;

?>