<?php
namespace MVC\Models;
// use
class UsersModel extends \MVC\Models\Model
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
        $query = "SELECT * FROM users WHERE {$where_section} LIMIT 0,10;";
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

    public function create_user(array $params = array()) : bool
    {
      $mysqli = \core\Db::getInstance();
      assert("!empty(\$params['user_name']);");
      $query = "INSERT IGNORE INTO users (name, surname) VALUES ('".$params['user_name']."','".$params['user_surname']."')";
      if ($res = $mysqli->query($query))
      {
          if ($mysqli->affected_rows == 0)
          {
              return false;
          }
          $mysqli->close();
      }
      return true;

    }

    public function update_user($params)
    {
      $mysqli = \core\Db::getInstance();
      vd($params);
      $query = "UPDATE users SET name=\"".htmlspecialchars(@$params["user_name"])."\", surname=\"".htmlspecialchars(@$params["user_surname"])."\" where id=".$mysqli->escape_string(@$params["id"]).";";
      vd($query);
      if ($res = $mysqli->query($query))
      {
          if ($mysqli->affected_rows == 0)
          {
              return false;
          }
          $mysqli->close();
      }
      return true;
    }

    public function deleteUser($curRow, $params) : bool
    {
      $mysqli = \core\Db::getInstance();
      $query = "DELETE FROM users WHERE id=".$mysqli->escape_string($curRow).";";
      $res = $mysqli->query($query);

      if ($mysqli->affected_rows == 0)
      {
        return false;
      }
      return true;
    }

    public function getUser($curRow)
    {
      $ret = array();
      $mysqli = \core\Db::getInstance();
      $query = "SELECT * FROM users WHERE id=".$mysqli->escape_string($curRow).";";
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
}
?>
