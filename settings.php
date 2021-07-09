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

$currentuserid = basename($_GET["_idMember"]);
$configpath = $currentuserid;

if (file_exists($configpath)) {
    $configstream = fopen ($configpath, "r");
    $selection = fread($configstream, 9999);
    fclose($configstream);
} else {
    $selection = "hl2";
}

$configpath = $currentuserid;

if (file_exists($configpath .= "_p_saved_hover")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_hover = fread($configstream, 9999);
    fclose($configstream);
} else {
    $p_saved_hover = "";
}

$configpath = $currentuserid;

if (file_exists($configpath .= "_p_saved_click")) {
    $configstream = fopen ($configpath, "r");
    $p_saved_click = fread($configstream, 9999);
    fclose($configstream);
} else {
    $p_saved_click = "";
}

$selection = str_replace("<", "&lt;", $selection);
$selection = str_replace(">", "&gt;", $selection);
$selection = str_replace("\"", "&quot;", $selection);

$p_saved_hover = str_replace("<", "&lt;", $p_saved_hover);
$p_saved_hover = str_replace(">", "&gt;", $p_saved_hover);
$p_saved_hover = str_replace("\"", "&quot;", $p_saved_hover);

$p_saved_click = str_replace("<", "&lt;", $p_saved_click);
$p_saved_click = str_replace(">", "&gt;", $p_saved_click);
$p_saved_click = str_replace("\"", "&quot;", $p_saved_click);

$r_hl2_ch = "";
$r_quake_ch = "";
$r_kss_ch = "";
$r_sa1_ch = "";
$r_ps2_ch = "";
$r_custom_ch = "";

if ($selection == "hl2") {
    $r_hl2_ch = " checked";
} else if ($selection == "quake") {
    $r_quake_ch = " checked";
} else if ($selection == "kss") {
    $r_kss_ch = " checked";
} else if ($selection == "sa1") {
    $r_sa1_ch = " checked";
} else if ($selection == "ps2") {
    $r_ps2_ch = " checked";
} else if ($selection == "custom") {
    $r_custom_ch = " checked";
}
?>

<head>
    <style>
        @font-face {
            font-family:abel;
            src:url(https://files.gamebanana.com/bitpit/abel-regular.ttf);
        }

        p, h1, h2, h3, h4 {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            
            font-family:abel;
            color:white;
        }

        input[type="text"], button {
            min-width: 200px;
            max-width: 800px;
            width: 100%;
            background: rgba(0,0,70,0.2);
            backdrop-filter: blur(1px);
            color: white;
            border-radius: 10px;
            border: 1px solid rgb(95, 95, 190);
            font-family: abel;
            transition-duration: 0.2s;
        }

        input:hover, button:hover {
            background: rgba(95, 95, 190,0.8);
            backdrop-filter: blur(3px);
            color: white;
            border-radius: 17px;
            border: 1px solid rgb(125, 125, 250);
        }

        input:focus, button:active {
            background:rgba(130,130,200,0.5);
            backdrop-filter:blur(1px);
            color:white;
            border-radius:10px;
            border:3px solid rgb(75, 75, 255);
        }

        input[type="text"] {
            padding:5px 5px 5px 5px;
            height:30px;
        }

        button {
            height:50px;
            font-size:36px;
        }
        
        .bmTextFieldGroup {
            width:100%;
            margin-top:-12px;
            min-width: 200px;
            max-width: 800px;
        }
        
        .noMax {max-width:100%;}
        
        .radiolabel1 {max-width:125px;width:100%;display:inline-block;}
        
        a.pagelink {color:#00ff00;text-shadow:0px 0.25px 0px #009900, 0px 0.5px 0px #009900, 0px 0.5px 0px #009900;}
        a.pagelink:hover {color:#55ff55;text-shadow:0px 0.25px 0px #77ff77, 0px 0.75px 0px #77ff77, 0px 0.75px 0px #77ff77;}
        a.pagelink:active {color:#ffff55;text-shadow:0px 0.25px 0px #ffffff, 0px 0.75px 0px #ffffff, 0px 0.75px 0px #ffffff;}
    </style>
    <script>
        function hl2_click() {
            new Audio('https://bonkmaykr.xyz/gbhs/assets/hl2_click.mp3').play();
        }
        function quake_click() {
            new Audio('https://bonkmaykr.xyz/gbhs/assets/quake_click.mp3').play();
        }
        function kss_click() {
            new Audio('https://bonkmaykr.xyz/gbhs/assets/kss_click.mp3').play();
        }
        function sa1_click() {
            new Audio('https://bonkmaykr.xyz/gbhs/assets/sa1_click.wav').play();
        }
        function ps2_click() {
            new Audio('https://bonkmaykr.xyz/gbhs/assets/ps2_click.mp3').play();
        }
        
        function c_hover() {
            new Audio(document.getElementById("hover").value).play();
        }
        function c_click() {
            new Audio(document.getElementById("click").value).play();
        }
    </script>
</head>
<body id="body" style="background:url(https://files.gamebanana.com/bitpit/3iqw2l.gif);color:white;background-size:380px;font-family:abel;"> <!--#000046-->
    
<div class="Content bmAudioSettings">
    <h1 style="font-size:32px;text-shadow:0px 1px 0px #009900, 0px 0.5px 0px #009900, 0px 0.25px 0px #009900, 0px 0.75px 0px #009900, 0px 1px 3px black, 0px 1px 3px black;color:#00ff00;">bonkmaykr's Link Sounds</h1>
    <br><p style="margin-bottom:-5px;margin-top:-40px;">Please read <a class="pagelink" target="_blank" href="https://gamebanana.com/tuts/14192">this guide</a> before using custom sound effects.</p>
    
    <noscript>THIS PAGE REQUIRES JAVASCRIPT TO WORK CORRECTLY! THE APP REQUIRES JAVASCRIPT TO WORK AT ALL! Please turn it on.</noscript>
    
    <form method="POST" action="submit.php" style="margin-top:-36px;">
    <input type="text" name="UserID" value="<?php echo $currentuserid;?>" height="0px" width="0px" style="pointer-events:none;opacity:0;color:transparent;">
        
        <label for="mp3Input"><h3>Sound Selection</h3></label>
        <div class="bmTextFieldGroup">
        <span onMouseDown="hl2_click();"><input type="radio" id="t_hl2" name="type" width="100%" value="hl2"<?php echo $r_hl2_ch;?>><label class="radiolabel1" for="t_hl2">GMod / Half-Life 2</label></span>
        <span onMouseDown="quake_click();"><input type="radio" id="t_quake" name="type" width="100%" value="quake"<?php echo $r_quake_ch;?>><label class="radiolabel1" for="t_quake">Quake 3: Arena</label></span><br>
        <span onMouseDown="kss_click();"><input type="radio" id="t_kss" name="type" width="100%" value="kss"<?php echo $r_kss_ch;?>><label class="radiolabel1" for="t_kss">Kirby Super Star</label></span>
        <span onMouseDown="sa1_click();"><input type="radio" id="t_sa1" name="type" width="100%" value="sa1"<?php echo $r_sa1_ch;?>><label class="radiolabel1" for="t_sa1">Sonic Adventure</label></span><br>
        <span onMouseDown="ps2_click();"><input type="radio" id="t_ps2" name="type" width="100%" value="ps2"<?php echo $r_ps2_ch;?>><label class="radiolabel1" for="t_ps2">Playstation 2</label></span>
        
        <!--<br><br>-->
        <span onMouseDown="c_click();"><input type="radio" id="t_custom" name="type" width="100%" style="background:#888800;border-color:#ffff00;" value="custom"<?php echo $r_custom_ch;?>><label for="t_custom" style="color:#ffff00;">Custom</label></span><br>
        </div>
        
        <h3>Custom Sounds</h3>
        
        <div class="bmTextFieldGroup">
        <label for="hover"><b>Hover URL</b></label>
        <input type="text" name="hover" id="hover" placeholder="'Tsh!'" width="100%" class="noMax" value="<?php echo $p_saved_hover;?>"><br>
        
        <label for="click"><b>Click URL</b></label>
        <input type="text" name="click" id="click" placeholder="'Boom!'" width="100%" class="noMax" value="<?php echo $p_saved_click;?>"><br>
        </div>
        
        <button type="submit" class="button" value="Submit" style="margin-top:20px;">Submit</button>
    </form>
        
        <button class="button" style="margin-top:-5px;height:60px;font-size:16px;background:#880000;border-color:#ff0000;border-radius:0px;transition-duration:0.0s;" onMouseEnter="c_hover();" onClick="c_click();">Hover and Click this area to test your custom sounds. If it doesn't work, your link must be invalid!</button>
</div>

</body>
