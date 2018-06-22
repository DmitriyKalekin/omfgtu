<?php
namespace View;

class FormIntent
{
    public function show(array $params)
    {
        ob_start();
        echo "<form method=\"post\">";
        echo "<b>name</b><br />";
        echo "<input type=text name=\"intent_name\" value=\"".htmlspecialchars(@$params["intent_name"])."\" /><br /><br />";
        echo "<b>pid</b><br />";
        echo "<input type=text name=\"pid\" value=\"".htmlspecialchars(@$params["pid"])."\" /><br /><br />";
        echo "<input type=hidden name=\"action\" value=\"create_intent\" />";
        echo "<button type=submit>Create Intent</button>";
        echo "</form>";
        return ob_get_clean();
    }




}




?>
