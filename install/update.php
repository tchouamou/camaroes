<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update.php
 *  ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










update.php,  2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$update_win->prints["match_encoding"] = $cmr->get_language("cmr_charset");
$update_win->prints["match_language"] = $cmr->get_language("cmr_language");
$update_win->prints["match_www_path"] = "";
// $update_win->prints["match_html_header_lang"] = $cmr->get_conf("html_header_lang");
$update_win->prints["match_content_type"] = $cmr->get_conf("html_meta_content_type");
$update_win->prints["match_keyword"] = $cmr->get_conf("html_meta_keyword");
$update_win->prints["match_description"] = $cmr->get_conf("html_meta_description");
$update_win->prints["match_author"] = $cmr->get_conf("html_meta_author");
$update_win->prints["match_date"] = $cmr->get_conf("html_meta_date");
$update_win->prints["match_refresh"] = $cmr->get_page("refresh");
$update_win->prints["match_bgcolor"] = $cmr->get_theme("bgcolor");
$update_win->prints["match_background"] = $cmr->get_theme("background");
$update_win->prints["match_no_java"] = $cmr->translate("no_java");
$update_win->prints["match_logo_icon"] = $cmr->get_conf("cmr_logo_icon");

$update_win->prints["match_style"] = $cmr->get_path("www") . $cmr->get_theme("cmr_style");
$update_win->prints["match_javascript"] = $cmr->get_path("www") . $cmr->get_page("cmr_jscrip");

$update_win->prints["match_clock_engine"] = ";";
if(($cmr->get_conf("cmr_clock_engine"))) 
$update_win->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";

$update_win->prints["match_ajax_engine"] = ";";
if(($cmr->get_conf("cmr_ajax_engine"))) $update_win->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";

$update_win->prints["match_onload"] = ";";
$update_win->prints["match_noscript"] = $cmr->translate("!!! Need java script to run well !!!");
$update_win->prints["match_sound"] = 0;
if($cmr->get_conf('cmr_exec_sound')) $update_win->prints["match_sound"] = "";

$cmr->page["middle1"] = "update";
if(($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)){
	$update_win->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
	}else{
	$update_win->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("template") . "templates/template_update" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_update" . $cmr->get_ext("template"); 
$template_update_file = cmr_good_file($file_list);
$template_update = file_get_contents($template_update_file);  
print(cmr_print_template($template_update, "template1", $update_win->prints));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "";
$mod->rown_position = "head";
$mod->col_position = 1;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_update, "match_include1")) include_once($cmr->get_path("module") . "modules/guest/page_header.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$update_win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $update_win->load_template($cmr->themes);
// $update_win->themes["win_type"] = "default";
$update_win->module["name"]= "update";
$update_win->module["title"] = " update";

$update_win->themes["module_positionx"]= "head";
$update_win->themes["module_positiony"]= "2";












// match_open_windows
// match_value_path_font
// match_install
// match_value_realpath
// match_value_path_temp
// 






$update_win->prints["match_open_windows"] = $update_win->show_noclose();
$update_win->prints["match_legend_link"] = "";


echo "<br />" . $cmr->translate("Beginning update of apllication") . " ......<br />";
include($cmr->get_conf("cmr_update_file"));
echo "<br />.......<br />" . $cmr->translate("End update of apllication") . ".<br />";



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$update_win->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login&force_login=yes\" ><big>" . $cmr->translate("Login") . "</big></a>";
$update_win->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\" ><big>" . $cmr->translate("logout") . "</big></a>";

if(($cmr->get_conf("cmr_allow_forget_account")))
$update_win->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\" ><big>" . $cmr->translate("Forget Account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_inscription")))
$update_win->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\" ><big>" . $cmr->translate("New account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_validation")))
$update_win->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" ><big>" . $cmr->translate("Account Validation") . "</big></a>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$update_win->prints["match_close_windows"] = $update_win->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(cmr_print_template($template_update, "template2", $update_win->prints));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1;1;1;1;1;1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_update, "match_include2")) include($cmr->get_path("module") . "modules/guest/page_footer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(cmr_print_template($template_update, "template3", $update_win->prints));
$update_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
