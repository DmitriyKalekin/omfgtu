<?php
namespace MVC\View;
class UserUpdateForm
{
    public function show(array $params, $rowNumber)
    {
        //$params->rowNumber = $rowNumber;
        $params[0] += ['rowNumber'=>$rowNumber];
        
        echo "<form method=\"post\">";
        echo "<b>name</b><br />";
        echo "<input type=text name=\"name\" value=\"".htmlspecialchars(@$params[0]["name"])."\" /><br /><br />";
        echo "<b>surname</b><br />";
        echo "<input type=text name=\"surname\" value=\"".htmlspecialchars(@$params[0]["surname"])."\" /><br /><br />";
        echo "<input type=hidden name=\"id\" value=\"".htmlspecialchars(@$params[0]["rowNumber"])."\" /><br /><br />";
        echo "<input type=hidden name=\"action\" value=\"updateUser\" />";
        echo "<button type=submit>Update User</button>";
        echo "</form>";
        return $params[0];
        
        //return $params;
    }
}
?>