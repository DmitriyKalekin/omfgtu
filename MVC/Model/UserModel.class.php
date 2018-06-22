<?php
namespace MVC\Model;

// use

class UserModel extends \MVC\Model\Model
{
	public function getUsers($params = array())
	{
		$ret = array();
		$mysqli = \core\Db::getInstance();

		$where_section = "1";

		if (!empty($params))
		{
			if (isset($params["id"]))
			{
				$where_section .= " AND id = '".$mysqli->escape_string($params["id"])."' ";
			}
			if (isset($params["name"]))
			{
				$where_section .= " AND name LIKE '".$mysqli->escape_string($params["name"])."_%' ";
			}
		}	
		$query = "SELECT * FROM user WHERE {$where_section}";
			// !!!! MYSQLI_USE_RESULT
		if ($res = $mysqli->query($query))
		{
			if ($res->num_rows != 0)
			{
				while ($row = $res->fetch_assoc())
				{
					$ret[] = $row;
				}
			}
			$res->close();
		}
		return $ret;
	}

	public function getUser($rowNumber)
	{
		$ret = array();
		$mysqli = \core\Db::getInstance();
		
		$query = "SELECT name, surname FROM user WHERE id = {$rowNumber}";
		
		if ($res = $mysqli->query($query))
		{
			if ($res->num_rows != 0)
			{
				while ($row = $res->fetch_assoc())
				{
					$ret[] = $row;
				}
			}
			$res->close();
		}
		return $ret;
		
	}

	public function createUser($params = array())
	{
		$ret = array();
		$mysqli = \core\Db::getInstance();
		$where_section = "";
		if (!empty($params))
		{
			if (isset($params["name"]) && isset($params["surname"]))
			{
				$where_section .= "'".$mysqli->escape_string($params["name"])."'".","."'".$mysqli->escape_string($params["surname"])."'";
			}
		}
		$query = "INSERT INTO user (`name`, `surname`) VALUES ({$where_section})";
		$mysqli->query($query);
	}

	public function deleteUser($params = array())
	{
		//vd($params);
		$ret = array();
		$mysqli = \core\Db::getInstance();
		
		$where_section .= $mysqli->escape_string($params["id"]);
		$query = "DELETE FROM user WHERE id = {$where_section}";
		$mysqli->query($query);
	}
}
?>
