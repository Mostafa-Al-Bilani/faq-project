<?php

require_once __DIR__ . '/./Userskeleton.php';
require_once __DIR__ ."/../utils/utils.php";

class User extends UserSkeleton
{

    function login($mysqli)
    {
        require_once __DIR__ . '/../auth/generate-jwt.php';

        $query = $mysqli->prepare("SELECT * FROM USERS WHERE `email` = ?");
        $query->bind_param("s", $this->email);
        $query->execute();
        $result = $query->get_result();
        $user = $result->fetch_assoc();
        if ($user && password_verify($this->password, $user['password'])) {
            $token = generateAuthToken($user['id']);

            return json_response("Login successful", $token);
        }
        return json_response("invalid credentials", "", false);
    }

    function insert($mysqli)
    {
        $passwordInput = $this->password;
        $this->hash_password($this->password);
        $query = $mysqli->prepare("INSERT INTO users(`fullname`, `email`, `password`) VALUES (?, ?, ?)");
        $query->bind_param("sss",  $this->fullname, $this->email, $this->password);
        if ($query->execute()) {
            $this->password = $passwordInput;
            return $this->login($mysqli);
        } else {
            return json_response($query->error, "", false);
        }
    }
    function select($mysqli, $id)
    {
        $query = $mysqli->prepare("SELECT id, fullname, email FROM Users WHERE id = ?");
        $query->bind_param("i", $id);

        if ($query->execute()) {
            $result = $query->get_result();
            $user = $result->fetch_assoc();
            return json_response("user fetched", $user);
        }
        return json_response("error in user fetching", "", false);
    }
}
