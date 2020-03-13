<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * task_bar.php
 *    ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.0 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.












task_bar.php,Ver 3.0  2011-July 10:36:59
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ------------------------

// ------------------------
$task = "";
if(($cmr->page["task"])){
$cmr->page["task"] = array_unique($cmr->page["task"]);
foreach($cmr->page["task"] as $key => $val){
	
	
	$title = parse_module($val);// parse_url()
	if(empty($title["title"])) $title["title"] = $key;
	

    
    $task .= "<a name=\"task_show" . $key . "\" href=\"index.php?win_task=" . $key . "&task_action=show\" >" ;
    $task .= "<img width=\"10\" src=\"" . $cmr->get_path("image") . "images/icon/fullscreen_icon.png\" alt=\"0\"  border=\"0\" />" ;
    $task .= "<input type=\"button\" name=\"task_b\" onclick=\"javascript:document.anchor.task_show" . $key . ";\" value=\"" . $title["title"] . "\" >" ;
    $task .= "</a>" ;
    $task .= "<a href=\"index.php?win_task=" . $key . "&task_action=close\">" ;
    $task .= "<img width=\"10\" src=\"" . $cmr->get_path("image") . "images/icon/stop_icon.png\" alt=\"x\" border=\"0\" />" ;
    $task .= "</a> ";
} 
}
// ------------------------
$title = array();
// ------------------------
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"]= $cmr->get_module("name");
$division->module["title"] = $task;
$division->module["text"] = "";


// $division->load_themes($cmr->themes);
// $division->themes["win_type"] = "default";
$division->themes["header_visible"] = 1;
$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 1;



$division->themes["text_align"] = "left";
$division->themes["bgcolor"] = "#FFFFFF";
$division->themes["border"] = "0";
$division->themes["bordercolor"] = "";

$division->themes["width"] = "100%";
$division->themes["header_bgcolor"] = "#DDDDDD";
$division->themes["header_color"] = "#000000";
$division->themes["header_align"] = "left";
$division->themes["header_border"] = "2";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "";

print($division->show());
// ------------------------
// ------------------------
?>