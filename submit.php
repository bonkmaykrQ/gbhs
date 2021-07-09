<!--
    This file is part of GBHS/LinkSounds.

    GBHS/LinkSounds is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    GBHS/LinkSounds is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GBHS/LinkSounds.  If not, see <https://www.gnu.org/licenses/>.
-->

<?php
error_reporting(E_ERROR); 

   function endFunc($str, $lastString) {
      $count = strlen($lastString);
      if ($count == 0) {
         return true;
      }
      return (substr($str, -$count) === $lastString);
   }
   
$currentuserid = $_POST["UserID"]; // Causes a security vulnerability.
$configpath = $currentuserid;

$type = $_POST["type"];
$p_saved_hover = $_POST["hover"];
$p_saved_click = $_POST["click"];

echo '<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }
    </style>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;font-size:18px;">
    <div style="display:flex;justify-content:center;align-items:center;height:100%;">
        <div style="background:rgba(0,255,0,0.5);color:#00ff00;border:2px solid #00ff00;backdrop-filter:blur(1px);font-size:24px;text-align:center;border-radius:10px;padding-top:10px;padding-bottom:10px;padding-left:6px;padding-right:6px;">
    <b>Settings saved <font color=" yellow" style="text-shadow:0px 0.25px 0px #999900, 0px 0.5px 0px #999900, 0px 0.75px 0px #999900, 0px 1px 0px #999900, 0px 0px 5px yellow, 0px 0px 4px yellow;">';
    echo'</font> to user number ';
    echo $currentuserid;
    echo'.</b>
    <br><br>
    <font style="font-size:11px;text-shadow:none;color:#00ff00;">You may now return to your profile.</font>
    </div>
    </div>
</body>';

$configstream = fopen ($configpath, "w");
fwrite($configstream, $type);
fclose($configstream);

/*$p_saved_hover = str_replace("<style>", "<script type=\"text/plain\"><i>&lt;style&gt;</i></script>", $p_saved_hover);*/
$p_saved_hover = str_replace("<", "&lt;", $p_saved_hover);
$p_saved_hover = str_replace(">", "&gt;", $p_saved_hover);
$p_saved_hover = str_replace("'", "&quot;", $p_saved_hover);
$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_p_saved_hover", "w");
fwrite($configstream, $p_saved_hover);
fclose($configstream);

/*$p_saved_click = str_replace("<style>", "<script type=\"text/plain\"><i>&lt;style&gt;</i></script>", $p_saved_click);*/
$p_saved_click = str_replace("<", "&lt;", $p_saved_click);
$p_saved_click = str_replace(">", "&gt;", $p_saved_click);
$p_saved_click = str_replace("'", "&quot;", $p_saved_click);
$configpath = $currentuserid;
$configstream = fopen ($configpath .= "_p_saved_click", "w");
fwrite($configstream, $p_saved_click);
fclose($configstream);
?>

