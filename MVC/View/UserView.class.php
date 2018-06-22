<?php
namespace MVC\View;

class UserView
{
	public function showUsersInfo($result)
	{
		require_once(getcwd()."/templates/users_info.tpl.php");
	}

}
?>


