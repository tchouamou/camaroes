<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * front_page.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








front_page.php,  2011-Oct
*/

$cmr->prints["match_encoding"] = $cmr->get_language("cmr_charset");
$cmr->prints["match_language"] = $cmr->get_language("cmr_language");
$cmr->prints["match_www_path"] = "";
// $cmr->prints["match_html_header_lang"] = $cmr->get_conf("html_header_lang");
$cmr->prints["match_content_type"] = $cmr->get_conf("html_meta_content_type");
$cmr->prints["match_keyword"] = $cmr->get_conf("html_meta_keyword");
$cmr->prints["match_description"] = $cmr->get_conf("html_meta_description");
$cmr->prints["match_author"] = $cmr->get_conf("html_meta_author");
$cmr->prints["match_date"] = $cmr->get_conf("html_meta_date");
$cmr->prints["match_refresh"] = $cmr->get_page("refresh");
$cmr->prints["match_bgcolor"] = $cmr->get_theme("bgcolor");
$cmr->prints["match_background"] = $cmr->get_theme("background");
$cmr->prints["match_no_java"] = $cmr->translate("no_java");
$cmr->prints["match_logo_icon"] = $cmr->get_conf("cmr_logo_icon");

$cmr->prints["match_style"] = $cmr->get_path("www") . $cmr->get_theme("cmr_style");
$cmr->prints["match_javascript"] = $cmr->get_path("www") . $cmr->get_page("cmr_jscrip");
$cmr->prints["match_clock_engine"] = ";";
if(($cmr->get_conf("cmr_clock_engine")))
$cmr->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";

$cmr->prints["match_ajax_engine"] = ";";
if(($cmr->get_conf("cmr_ajax_engine"))) $cmr->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";

$cmr->prints["match_sound"] = "";
$cmr->prints["match_onload"] = ";";
$cmr->prints["match_noscript"] = "";//$cmr->translate("!!! Need java script to run well !!!");
if(!($cmr->get_conf("cmr_exec_sound"))) $cmr->prints["match_sound"] = "";
if(!($cmr->get_page("tab_mode")))  $cmr->page["tab_mode"] = "";

//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if($cmr->page["middle1"]) $title = parse_module($cmr->page["middle1"]);// parse_url()
if($cmr->post_var["middle1"]) $title = parse_module($cmr->post_var["middle1"]);// parse_url()
if(get_post("page_title")) $title["title"] = get_post("page_title");
if(empty($title["title"])) $title["title"] = $cmr->page["page_title"];

if($title["title"]){
	$cmr->prints["match_title"] = ucfirst($cmr->translate($title["title"])) . " (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
}else{
	$cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst($cmr->translate($title["title"])) . " - Ver. " . $cmr->get_conf("cmr_version");
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// // print("<embed src=\"". $cmr->get_conf("cmr_audio_sound") ."\" hidden=\"true\" height=\"60\" width=\"135\" autostart=\"true\" loop=\"false\" playcount=\"1\" volume=\"10\" starttime=\"00:11\" endtime=\"00:16\"/>");
// // print("<noembed>";style=\"visibility :hidden); display:none\"
// print("<bgsound src=\"". $cmr->get_conf("cmr_audio_sound") ."\"  loop=\"1\" />");
// // print("</noembed>");
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// begin page -->
// begin head page -->
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->config["template_front_page"];
$file_list[] = $cmr->get_path("template") . "templates/template_front_page" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_front_page" . $cmr->get_ext("template");
$template_front_page_file = cmr_good_file($file_list);
$template_front_page = file_get_contents($template_front_page_file);
$cmr->print_template("template1", $template_front_page);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   $cmr->page["layer"] = "head";
   if(cmr_match_include($template_front_page, "match_include1")) include($cmr->get_path("index") . "system/loader/loader_layer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// end head page -->
// begin main page -->
$cmr->prints["match_open_tab"] = "";
if(($cmr->get_page("tab_mode")))
$cmr->prints["match_open_tab"] = open_tab($cmr->config, $cmr->page, $cmr->user["authorisation"]);
// begin left page -->

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template2", $template_front_page);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   $cmr->page["layer"] = "left";
   if(cmr_match_include($template_front_page, "match_include2")) include($cmr->get_path("index") . "system/loader/loader_layer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// end left page -->
// begin middle page -->
 // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template3", $template_front_page);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!! show all messages !!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_conf("cmr_show_event"))){
      if(cmr_match_include($template_front_page, "match_include3")) include($cmr->get_path("module") . "modules/" . "view_event.php");
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   $cmr->page["layer"] = "middle";
   if(cmr_match_include($template_front_page, "match_include4")) include($cmr->get_path("index") . "system/loader/loader_layer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// end middle page -->
// begin right page -->
 // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template4", $template_front_page);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   $cmr->page["layer"] = "right";
   if(cmr_match_include($template_front_page, "match_include5")) include($cmr->get_path("index") . "system/loader/loader_layer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_close_tab"] = "";
if(($cmr->get_page("tab_mode")))
$cmr->prints["match_close_tab"] = close_tab();
 // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template5", $template_front_page);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints = array();
$cmr->page["layer"] = "foot";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_page("task"))){
$cmr->page[$cmr->page["layer"] . $cmr->page["count2"]] = $cmr->get_path("module") . "modules/" . "task_bar.php";
$cmr->page["path"] = $cmr->page[$cmr->page["layer"] . $cmr->page["count2"]];
$cmr->page["count3"] = $cmr->page["count1"];
$cmr->page["count4"] = $cmr->page["count2"];

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_front_page, "match_include6")) include($cmr->get_path("index") ."system/loader/loader_module.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page[$cmr->page["layer"] . $cmr->page["count2"]] = "";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints = array();
$cmr->page["layer"] = "foot";
if(cmr_match_include($template_front_page, "match_include7")) include($cmr->get_path("index") . "system/loader/loader_layer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints = array();

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->prints["match_www_path"] = $cmr->get_path("www");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$cmr->prints["match_label_home"] = $cmr->translate(" Go Home");
	$cmr->prints["match_label_mode_expert"] = $cmr->translate("Mode Expert");
	$cmr->prints["match_label_forget_account"] = $cmr->translate(" Forget Account");
	$cmr->prints["match_label_login_again"] = $cmr->translate(" Login Again");
	$cmr->prints["match_label_logout"] = $cmr->translate(" Logout");
	$cmr->prints["match_windows_close"] = $cmr->translate("Close Windows");
	$cmr->prints["match_label_sure_save"] = $cmr->translate("Sure to save actual user front page to user");
	$cmr->prints["match_save_conf_user"] = $cmr->translate("Save config for user");
	$cmr->prints["match_save_conf_group_sure"] = $cmr->translate("Sure to save actual user front page to group");
	$cmr->prints["match_save_conf_group"] = $cmr->translate("Save config for group");
	$cmr->prints["match_save_to_user_sure"] = $cmr->translate("Sure to save actual user front page to default");
	$cmr->prints["match_save_to_user"] = $cmr->translate("Save config for default");
	$cmr->prints["match_load_user_sure"] = $cmr->translate("Sure to Load actual user front page");
	$cmr->prints["match_load_user"] = $cmr->translate("Load config for user");
	$cmr->prints["match_load_group_sure"] = $cmr->translate("Sure to Load actual group front page");
	$cmr->prints["match_load_group"] = $cmr->translate("Load config for group");
	$cmr->prints["match_load_default_sure"] = $cmr->translate("Sure to Load actual default front page");
	$cmr->prints["match_load_default"] = $cmr->translate("Load config for default");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template6", $template_front_page);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
