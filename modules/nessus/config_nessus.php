<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        config_nessus.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 2.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/ 

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (C) 2011, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


config_nessus.php,v 1.5  @_date_time_@  
*/





/**
* Information about
*
* Is used for keeping
*
* windowss (design for the layer usefull when running a module)  
*
* @$division object istance of the class windowss

*/

 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["cmr_get_data"] = get_post("cmr_get_data");
if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $cmr->module["base_name"] . ".php")
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$file_name = realpath($cmr->get_path("index") . "conf.d/modules/conf_nessus" . $cmr->get_ext("conf"));



$win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
/*$win->win_type="default"()*/
// $win->load_themes($cmr->themes);
$win->themes["module_name"] = $cmr->module["name"]; 
/*$cmr->module["base_name"]=strtolower(substr($cmr->module["name"],0,strrpos($cmr->module["name"], ".")));*/
$win->themes["module_positionx"] = $cmr->module["rown_position"];
$win->themes["module_positiony"] = $cmr->module["col_position"];

$win->module["title"] = $cmr->translate($cmr->module["base_name"]); 
$win->module["title"] = "Configure [".$file_name."]"; 
//$win->module["text"] = "";

// $win->themes["text_align"] = "left";
// $win->themes["bgcolor"] = "#FFFFFF";
// $win->themes["border"] = "0";
// $win->themes["bordercolor"] = "";
// $win->themes["background"]= "";
// // $win->themes["bgcolor"] = "#E0E0E0";
// $win->themes["width"] = "100%";
// $win->themes["header_visible"] = 1;
// $win->themes["header_tools_left"] = 1;
// $win->themes["header_tools_right"] = 1;
// $win->themes["header_bgcolor"] = "#DDDDDD";
// $win->themes["header_color"] = "#000000";
// $win->themes["header_align"] = "left";
// $win->themes["header_border"] = "2";
// $win->themes["header_bgimage_left"] = "";
// $win->themes["header_bgimage_middle"] = "";
// $win->themes["header_bgimage_right"] = "";
// $win->themes["header_mouse_effect"] = "";

print($win->show_noclose());

print($cmr->module_link("modules/report_periodic_nessus.php?refresh=", 1));
print($cmr->module_link("modules/config_nessus.php?refresh=", 1));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($cmr->module["base_name"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="config_default_conf"> 
 

<form  action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"config_default_conf\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"".$file_name."\" name=\"file_name\" />"));?>
<?php include($cmr->get_path("index") ."system/loader/load_config.php");?>
<input class="submit" type="submit" value="<?php print($cmr->translate("save"));?>" />
</form>  

</div>
<?php  print($win->close()); ?>
