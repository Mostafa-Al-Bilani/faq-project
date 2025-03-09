<?php
class UserSkeleton
{

  public $id;
  public $fullname;
  public $email;
  public $password;

  function __construct($fullname = "", $email = "", $password = "")
  {
    $this->fullname = $fullname;
    $this->email = $email;
    $this->password = $password;
  }
  function set_name($name)
  {
    $this->fullname = $name;
  }
  function get_name()
  {
    return $this->fullname;
  }
  function set_email($name)
  {
    $this->email = $name;
  }
  function get_email()
  {
    return $this->email;
  }

  function hash_password($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  function verify_password($password)
  {
    return password_verify($password, $this->password);
  }

  function get_password()
  {
    return $this->password;
  }
}
