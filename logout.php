<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * template_logout.php
 *  ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.












template_logout.php,  2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$sessionid = session_id();
@session_regenerate_id();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_module_message"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
	include_once($cmr->get_path("func") . "function/func_database.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ========================Cleaning=======================
if(($cmr->get_conf("cmr_cleaning_at_logout"))) 
if($cmr->db_connection = $cmr->connect()){
$cmr->db_connection->Execute("delete from " . $cmr->get_conf("cmr_table_prefix") . "history where ((user_email='".$user_email."') and (type <> 'ticket_close') (date_sub(CURRENT_TIMESTAMP,interval ". $cmr->get_conf("db_interval_log_rotate").") >= date_time));", $cmr->db_connection);
$cmr->db_connection->Execute("delete from " . $cmr->get_conf("cmr_table_prefix") . "session where ((user_email='".$user_email."') and (date_sub(CURRENT_TIMESTAMP,interval ". $cmr->get_conf("db_interval_log_rotate").") >= date_time));", $cmr->db_connection);
// ========================Cleaning=======================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$status = "disconnect";
$state = "disable";
$sessionip = $_SERVER['REMOTE_ADDR'];
$time_out = $cmr->get_conf("cmr_session_time_out");

$sql_session = "update " . $cmr->get_conf("cmr_table_prefix") . "session set ";
$sql_session .= "status  =  '$status',  state  =  '$state' ,  session_end  =  NOW() ";
$sql_session .= "where (((status =  'connect') and (sessionid =  '".$sessionid."') and (sessionip  =  '".$sessionip."')) ";
$sql_session .= " or ((status =  'connect')   and  (date_sub(curdate(),interval " . $time_out . ") >  date_time ))) ;";
// $cmr->prints[""] .=$sql_session ;
$result_session = &$cmr->db_connection->Execute($sql_session)  or print($cmr->db_connection->ErrorMsg());
}
// ========================Cleaning=======================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 ($cmr->get_user("auth_email")) ? $user_email = $cmr->get_user("auth_email") : $user_email = "guest";
	    $cmr->event["id"] = "10";
	    $cmr->event["name"] = "logout";
	    $cmr->event["line"]=__LINE__;
	    $cmr->event["script"]=__FILE__;
	    $cmr->event["data"] = "";
	    $cmr->event["comment"] = "". $cmr->translate("Logout for user") . ":".$user_email." ". $cmr->translate("clean") . " [ticket_read, message_read and cmr_session] session=".session_id();
	    $cmr->run_event();
// $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "Logout cleaning table ticket_read, message_read and cmr_session id=$sessionid");
// ========================Cleaning=======================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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

$cmr->prints["match_legend_link"] = "";
$cmr->prints["match_clock_engine"] = ";";
if(($cmr->get_conf("cmr_clock_engine"))) 
$cmr->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";

$cmr->prints["match_ajax_engine"] = ";";
if(($cmr->get_conf("cmr_ajax_engine"))) $cmr->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";

$cmr->prints["match_onload"] = ";";
$cmr->prints["match_noscript"] = $cmr->translate("!!! Need java script to run well !!!");
$cmr->prints["match_sound"] = 0;
if($cmr->get_conf('cmr_exec_sound')) $cmr->prints["match_sound"] = "";
// // print("<embed src=\"". $cmr->get_conf("cmr_audio_sound") ."\" hidden=\"true\" height=\"60\" width=\"135\" autostart=\"true\" loop=\"false\" playcount=\"1\" volume=\"10\" starttime=\"00:11\" endtime=\"00:16\"/>");
// // print("<noembed>";style=\"visibility :hidden); display:none\"
// print("<bgsound src=\"". $cmr->get_conf("cmr_audio_sound") ."\"  loop=\"1\" />");
// // print("</noembed>");
$cmr->page["middle1"] = "logout";
if(($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)){
	$cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
	}else{
	$cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->config["template_logout"];
$file_list[] = $cmr->get_path("template") . "templates/template_logout" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_logout" . $cmr->get_ext("template"); 
$template_logout_file = cmr_good_file($file_list);
$template_logout = file_get_contents($template_logout_file);  
$cmr->print_template("template1", $template_logout);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "";
$mod->rown_position = "head";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_logout, "match_include1")) include_once($cmr->get_path("module") . "modules/guest/page_header.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_template($cmr->themes);
// $division->themes["win_type"] = "default";
$division->module["name"]= "Logout";
$division->module["title"] = " Logout";

$division->themes["module_positionx"]= "head";
$division->themes["module_positiony"]= "2";



















$cmr->prints["match_open_windows"] = $division->show_noclose();


$cmr->prints["match_thanks_for_using"] = $cmr->translate("thanks for have used this portal");
$cmr->prints["match_label_init"] = $cmr->translate("Init");



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login&force_login=yes\" ><big>" . $cmr->translate("Login") . "</big></a>";
$cmr->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\" ><big>" . $cmr->translate("logout") . "</big></a>";

if(($cmr->get_conf("cmr_allow_forget_account")))
$cmr->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\" ><big>" . $cmr->translate("Forget Account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_inscription")))
$cmr->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\" ><big>" . $cmr->translate("New account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_validation")))
$cmr->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" ><big>" . $cmr->translate("Account Validation") . "</big></a>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template2", $template_logout);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_logout, "match_include2")) include($cmr->get_path("module") . "modules/guest/page_footer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template3", $template_logout);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr = NULL;
$_SESSION = array();
@ session_destroy()
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
