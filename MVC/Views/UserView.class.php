<?php
namespace MVC\Views;

class UserView
{
  public function showUsers($result)
  {
    require_once(getcwd()."/templates/showUsers.tmpl.php");
  }
  public function showUser($result)
  {
    require_once(getcwd()."/templates/showUser.tmpl.php");
  }

}

?>
