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
error_reporting(E_ALL ^ E_WARNING); 
$currentuserid = basename($_GET["_idProfile"]);
$visitoruserid = basename($_GET["_idMember"]);
$configpath = $currentuserid;
$globalconfigpath = $visitoruserid;

$attributesOutput = "";
$classesOutput = "";

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $type = fread($configstream, 9999);
    fclose($configstream);
} else {
    $type = "hl2";
}

$p_saved_hover = "";

$configpath = $currentuserid;
if (file_exists($configpath .= "_p_saved_hover")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "") {
        /*$p_saved_hover .= "Placeholder Pickle";*/
        $p_saved_hover .= $read_processingthis;
    } else {
        $p_saved_hover .= $read_processingthis;
    }
}

$p_saved_click = "";

$configpath = $currentuserid;
if (file_exists($configpath .= "_p_saved_click")) {
    $configstream = fopen ($configpath, "r");
    $read_processingthis = fread($configstream, 9999);
    fclose($configstream);

    if ($read_processingthis == "") {
        /*$p_saved_click .= "pickle is lonely :(";*/
        $p_saved_click .= $read_processingthis;
    } else {
        $p_saved_click .= $read_processingthis;
    }
}

$fh = "'";
$fc = "'";

if ($type == "hl2") {
	$fh .= "https://bonkmaykr.xyz/gbhs/assets/hl2_hover.mp3";
	$fh .= "'";
	$fc .= "https://bonkmaykr.xyz/gbhs/assets/hl2_click.mp3";
	$fc .= "'";
}else if ($type == "quake") {
	$fh .= "https://bonkmaykr.xyz/gbhs/assets/quake_hover.mp3";
	$fh .= "'";
	$fc .= "https://bonkmaykr.xyz/gbhs/assets/quake_click.mp3";
	$fc .= "'";
}else if ($type == "custom") {
	$fh .= $p_saved_hover;
	$fh .= "'";
	$fc .= $p_saved_click;
	$fc .= "'";
}

?>

<div><script>/*window.console.info("[GBHS] GBHoverSounds by bonkmaykr\n\nwaiting on pagemodules to finish loading"); window.addEventListener('load', function () {*/ window.console.info("[GBHS] loaded successfully, dropping payload now!"); function iterate(){     Current = 0;      if (classOrNah == 0) {         Size = document.getElementsByTagName(find).length;         while(Current < Size) {         	if (document.getElementsByTagName(find)[Current].classList.contains("gbhsUsed") == false) {         		document.getElementsByTagName(find)[Current].addEventListener("click", playClick);         		document.getElementsByTagName(find)[Current].addEventListener("mouseenter", playHover);         		document.getElementsByTagName(find)[Current].classList.add("gbhsUsed");          	}          		Current++;         }     } else {         Size = document.getElementsByClassName(find).length;         while(Current < Size) {         	if (document.getElementsByClassName(find)[Current].classList.contains("gbhsUsed") == false) {         	    document.getElementsByClassName(find)[Current].addEventListener("click", playClick);         	    document.getElementsByClassName(find)[Current].addEventListener("mouseenter", playHover);         	    document.getElementsByClassName(find)[Current].classList.add("gbhsUsed");         	}         	    Current++;         }     } }  window.setInterval(gbhsMainLoop, 1000);  function gbhsMainLoop() { 	find = "a"; 	classOrNah = 0; 	iterate(); 	 	find = "button"; 	classOrNah = 0; 	iterate(); 	 	find = "ButtonLike"; 	classOrNah = 1; 	iterate(); }  function playClick() {   var audio = new Audio(<?php echo $fc;?>);     audio.play(); }  function playHover() {   var audio = new Audio(<?php echo $fh;?>);     audio.play(); }/*});*/</script></div>
