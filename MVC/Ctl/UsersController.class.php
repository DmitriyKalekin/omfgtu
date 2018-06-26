<?php
namespace MVC\Ctl;

class UsersController extends \MVC\Ctl\Controller
{

	public function index()
	{
		$user_model = new \MVC\Models\UsersModel();
		$result = $user_model->getUsers();
		$user_view = new \MVC\Views\UserView();
		$user_view->showUsers($result);
	}

	public function create(array $params)
  {
    $user_model = new \MVC\Models\UsersModel();
    //$result = $user_model->getUsers(); // array("id"=>1)
    $view = new \MVC\Views\FormUser();
    $html = $view->showCreate($params);
    echo $html;
  }

	public function post_create_user($params)
	{
		if (empty($params["user_name"]))
            return false;
        if (!isset($params["user_surname"]) || $params["user_surname"]=="")
            return false;
				$users_model = new \MVC\Models\UsersModel();
        $users_model->create_user($params);
        header("location: /users/index");
        return true;
  }

	public function update($curRow, $params)
	{
		$user_model = new \MVC\Models\UsersModel();
		$result = $user_model->getUser($curRow); // get User for update
		$view = new \MVC\Views\FormUser();
		$html = $view->showUpdate($result, $curRow); // form for Update
		echo $html;
	}

	public function post_update_user($params)
	{
		$users_model = new \MVC\Models\UsersModel();
    $users_model->update_user($params);
    header("location: /users/index");
    return true;
  }


	public function details($curRow, $params)
	{
			$user_model = new \MVC\Models\UsersModel();
			$result = $user_model->getUser($curRow);
			$view = new \MVC\Views\UserView();
			$view->showUser($result);
	}

	public function delete($curRow, $params)
	{
		$user_model = new \MVC\Models\UsersModel();
		//$result = $user_model->getUser($curRow);
		$delUser = $user_model->deleteUser($curRow, $params);
		if($delUser)
		{
			header("location: /users/index");
			return true;
		} else
		{
			header("location: /users/index");
			return false;
		}
	}
}

?>
