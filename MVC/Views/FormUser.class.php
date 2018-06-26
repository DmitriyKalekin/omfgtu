<?php
namespace MVC\Views;
class FormUser
{
    public function showCreate(array $params)
    {
        ob_start();
        echo "Create User";
        echo "<form method=\"post\">";
        echo "<b>name</b><br />";
        echo "<input type=text name=\"user_name\" value=\"".htmlspecialchars(@$params["user_name"])."\" /><br /><br />";
        echo "<b>surname</b><br />";
        echo "<input type=text name=\"user_surname\" value=\"".htmlspecialchars(@$params["user_surname"])."\" /><br /><br />";
        echo "<input type=hidden name=\"action\" value=\"create_user\" />";
        echo "<button type=submit>Create User</button>";
        echo "</form>";
        return ob_get_clean();
    }

    public function showUpdate(array $params, $curRow)
    {
        ob_start();
        vd($params);
        echo "Update User";
        echo "<form method=\"post\">";
        echo "<input type=hidden name=\"id\" value=\"".$curRow."\" />";
        echo "<b>name</b><br />";
        echo "<input type=text name=\"user_name\" value=\"".htmlspecialchars(@$params[0]["Name"])."\" /><br /><br />";
        echo "<b>surname</b><br />";
        echo "<input type=text name=\"user_surname\" value=\"".htmlspecialchars(@$params[0]["Surname"])."\" /><br /><br />";
        echo "<input type=hidden name=\"action\" value=\"update_user\" />";
        echo "<button type=submit>Update User</button>";
        echo "</form>";
        return ob_get_clean();
    }

}
