<?php

function json_response($message, $data, $status = true)
{
    if ($status)
        $status = "success";
    else
        $status = "error";
    return json_encode([
        "status" => "$status",
        "message" => "$message",
        "data" => $data
    ]);
}
