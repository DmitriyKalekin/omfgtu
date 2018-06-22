<?php

namespace MVC\Models;

class NewsModel extends \MVC\Models\AModel
{
    public function getNews($params = array())
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

        if (isset($params["title"]))
        {
          $where_section .= " AND title LIKE = '".$mysqli->escape_string($params["title"])."_%' ";
        }

        if (isset($params["description"]))
        {
          $where_section .= " AND description LIKE = '".$mysqli->escape_string($params["description"])."_%' ";
        }

        if (isset($params["tag"]))
        {
          $where_section .= " AND tag LIKE = '".$mysqli->escape_string($params["tag"])."_%' ";
        }
      }


      $query = "SELECT * FROM news WHERE {$where_section} LIMIT 0,10;";
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

    public function removeNews($id)
    {
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      {
        if (isset($id))
        {
          $where_section .= " AND id = '".$mysqli->escape_string($id)."'";
        }
      }
      $query = "DELETE FROM news WHERE {$where_section};";
      if (!($mysqli->query($query)))
      {
        printf("SQL DELETE query ERROR\n");
      }
      else
      {
        printf("SQL DELETE query SUCCESS\n");
      }

    }

    public function createNews($params = array())
    {
      vd($params);
      $mysqli = \core\Db::getInstance();

      $values_section = "";

      if (!empty($params))
      {
          $values_section .= "'{$mysqli->escape_string($params["title"])}', ";
          $values_section .= "'{$mysqli->escape_string($params["description"])}', ";
          $values_section .= "'{$mysqli->escape_string($params["tag"])}'";
      }

      $query = "INSERT INTO news (id, title, description, tag) VALUES (NULL, {$values_section});";
      if (!($mysqli->query($query)))
      {
        printf("SQL INSERT query ERROR\n");
      }
      else
      {
        printf("SQL INSERT query SUCCESS\n");
      }
    }

    public function editNews($params = array())
    {
      vd($params);
      $mysqli = \core\Db::getInstance();

      if (!empty($params))
      {
        vd($params);
          $title = "'{$mysqli->escape_string($params["title"])}'";
          $description = "'{$mysqli->escape_string($params["description"])}'";
          $tag = "'{$mysqli->escape_string($params["tag"])}'";
          $where_section = "id = {$mysqli->escape_string($params["id"])}";
          $query = "UPDATE news SET title = {$title}, description = {$description}, tag = {$tag} WHERE {$where_section};";
          if (!($mysqli->query($query)))
          {
            printf("SQL UPDATE query ERROR\n");
          }
          else
          {
            printf("SQL UPDATE query SUCCESS\n");
          }
      }
      else
      {
        printf("SQL UPDATE query ERROR\n");
      }
    }

    public function aboutNews($id)
    {
      $ret = array();
      $mysqli = \core\Db::getInstance();

      $where_section = "1";

      if (!empty($id) && isset($id))
      {
          $where_section .= " AND id = '".$mysqli->escape_string($id)."'";
      }

      $query = "SELECT * FROM news WHERE {$where_section};";
      if ($res = $mysqli->query($query))
      {
        if ($res->num_rows != 0)
        {

            while ($row = $res->fetch_assoc())
            {
              return $row;
            }

        }
        $res->close();

      } else {
        printf("SQL SELECT query ERROR (DETAILS)\n");
      }

      return $ret;
    }

}

 ?>
