<?php

require __DIR__ ."/./Questionskeleton.php";
require __DIR__ ."/../utils/utils.php";

class Question extends QuestionSkeleton
{
    function insert($mysqli)
    {
        $query = $mysqli->prepare("INSERT INTO questions(`question`, `answer`, `userId`) VALUES (?, ?, ?)");
        $query->bind_param("ssi",  $this->question, $this->answer, $this->userId);
        if ($query->execute()) {

            return json_response("inserted", "");
        } else {
            return json_response($query->error, "", false);
        }
    }
    function select($mysqli, $search)
    {
        $search = "%{$search}%";
        $query = $mysqli->prepare("SELECT * FROM Questions WHERE question LIKE ? or answer LIKE ?");
        $query->bind_param("ss", $search, $search);

        if ($query->execute()) {
            $result = $query->get_result();
            $array = [];
            while ($question = $result->fetch_assoc()) {
                $array[] = $question;
            }
            return json_response("questions fetched", $array);
        }
        return json_response("error in question fetching", "", false);
    }
}
