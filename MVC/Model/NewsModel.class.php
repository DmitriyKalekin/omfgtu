<?php
namespace MVC\Model;

// use

class NewsModel extends \MVC\Model\Model
{
    public function getTree($params = array())
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

            if (isset($params["author_id"]))
            {
                $where_section .= " AND author_id LIKE '".$mysqli->escape_string($params["author_id"])."_%' ";
            }
						if (isset($params["title"]))
            {
                $where_section .= " AND title LIKE '".$mysqli->escape_string($params["title"])."_%' ";
            }
						if (isset($params["text"]))
            {
                $where_section .= " AND text LIKE '".$mysqli->escape_string($params["text"])."_%' ";
            }
        }



        $query = "SELECT * FROM news WHERE {$where_section} LIMIT 0,10;";


        // !!!! MYSQLI_USE_RESULT
        if ($res = $mysqli->query($query))
        {
            if ($res->num_rows != 0)
            {

                // if ($ret = $res->fetch_all())
                // if ($row = $res->fetch_row(MYSQLI_ASSOC))
                while ($row = $res->fetch_assoc())
                {
                    $ret[] = $row;

                    // $mysqli->query("UPDATE ")
                }


            }

            $res->close();

        }

        return $ret;



    }


}


?>