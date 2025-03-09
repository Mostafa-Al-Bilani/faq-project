<?php
class QuestionSkeleton
{

    public $id;
    public $question;
    public $answer;
    public $userId;


    function __construct($question = "", $answer = "", $userId = null)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->userId = $userId;
    }
    function set_question($question)
    {
        $this->question = $question;
    }
    function get_question()
    {
        return $this->question;
    }
    function set_answer($answer)
    {
        $this->answer = $answer;
    }
    function get_answer()
    {
        return $this->answer;
    }
    function set_userId($userId)
    {
        $this->userId = $userId;
    }
    function get_userId()
    {
        return $this->userId;
    }
}
