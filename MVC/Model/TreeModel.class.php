<?php
namespace MVC\Model;

// use

class TreeModel extends \MVC\Model\Model
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
                // $where_section .= " AND id = '{$id}' ";
                // $where_section .= " AND id = '".int($id)."' ";
                // $where_section .= " AND id = '".intval($id)."' ";
                $where_section .= " AND id = '".$mysqli->escape_string($params["id"])."' ";
            }

            if (isset($params["name"]))
            {
                // $where_section .= " AND id = '{$id}' ";
                // $where_section .= " AND id = '".int($id)."' ";
                // $where_section .= " AND id = '".intval($id)."' ";
                $where_section .= " AND name LIKE '".$mysqli->escape_string($params["name"])."_%' ";
            }

        }



        $query = "SELECT * FROM intents WHERE {$where_section} LIMIT 0,10;";


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

    public function create_intent(array $params = array()) : bool
    {
        $mysqli = \core\Db::getInstance();
        // PHPUnit assertEq
        //
        assert("!empty(\$params['intent_name']);");

        // 0.
        /*$query = "INSERT [IGNORE] INTO intents (id, pid, uid, name) VALUES
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello'),
        (1, 2, 'v12', 'hello');";


        // 1.
        $query = "INSERT IGNORE INTO intents SET
            id = '',
            pid = '',
            uid = '',
            name='".$mysqli->escape_string($params["name"])."'
            ;";
        // 2.
        $query = "INSERT INTO intents SET name='".$mysqli->escape_string($params["name"])."', cnt=1 ON DUPLICATE KEY UPDATE cnt=cnt+1";
        */

        $query = "INSERT IGNORE INTO intents SET
            id = '',
            pid = '',
            uid = '',
            name='".$mysqli->escape_string($params["intent_name"])."'
            ;";

        return true;
    }

    public function update_intent()
    {
        $query = "UPDATE intents SET
            id = '',
            pid = '',
            name='".$mysqli->escape_string($params["intent_name"])."'
            WHERE uid = 'v6'
            ;";

    }


}


?>
