<?php
namespace MVC\View;

class UserDetailsView
{
	public function showUserInfo($result)
	{
		require_once(getcwd()."/templates/user_info.tpl.php");
	}

}
?>
