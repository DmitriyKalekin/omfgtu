<?php

namespace MVC\Models;

class TreeModel extends \MVC\Models\AModel
{
    public function getTree($params = array())
    {

      $ret = arrat();
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (!empty($params))
      {
        if (isset($params["id"]))
        {
          $where_section .= "AND id = '".$mysqli->escape_string({$params["id"]})."' "
        }

        if (isset($params["name"]))
        {
          $where_section .= "AND name LIKE = '".$mysqli->escape_string({$params["name"]})."_%' "
        }
      }


      $query = "SELECT * FROM intents WHERE {$where_section} LIMIT 0,10;";
      //    !!! MYSQLI_USE_RESULT
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
