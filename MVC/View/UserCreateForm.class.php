<?php
namespace MVC\View;
class UserCreateForm
{
    public function show(array $params)
    {
        echo "<form method=\"post\">";
        echo "<b>name</b><br />";
        echo "<input type=text name=\"name\" value=\"".htmlspecialchars(@$params["name"])."\" /><br /><br />";
        echo "<b>surname</b><br />";
        echo "<input type=text name=\"surname\" value=\"".htmlspecialchars(@$params["surname"])."\" /><br /><br />";
        echo "<input type=hidden name=\"action\" value=\"createUser\" />";
        echo "<button type=submit>Create User</button>";
        echo "</form>";
    }
}
?>