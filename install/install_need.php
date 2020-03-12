<?php
/**
 * template_install_need.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























template_install_need.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
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
$cmr->page["middle1"] = "install_need";
if(($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)){
	$cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
	}else{
	$cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("template") . "templates/template_install_need" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_install_need" . $cmr->get_ext("template"); 
$template_install_need_file = cmr_good_file($file_list);
$template_install_need = file_get_contents($template_install_need_file);  
print(cmr_print_template($template_install_need, "template1", $cmr->prints));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// --------------
$mod->name = 'Install need';
$mod->rown_position = 'head';
$mod->col_position = "1";
// ===============================================
// ===============================================
// ===============================================
include_once($cmr->get_path("module") . "modules/guest/page_header.php");
// ===============================================
// ===============================================
// ===============================================
// ===============================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->themes["win_type"] = "default";
// $division->load_template($cmr->themes);

$division->themes["path"] = "install/install_need.php";
$division->module["name"] = "install_need.php";
$division->themes["module_positionx"] = "middle";
$division->themes["module_positiony"] = "1";

$division->module["title"] = $cmr->translate("Install need");
// $division->module["text"] = $str;




$division->themes["background"] = "";
$division->bgcolor = "#E0E0E0";



$division->themes["header_tools_right"] = 0;
$cmr->prints["match_open_windows"] = $division->show_noclose();
$cmr->prints["match_value_conf"] = "";
$cmr->prints["match_legend_link"] = "";

$cmr->prints["match_title_install_need"] = $cmr->translate("Database is not configurated Correctly");
$cmr->prints["match_label_install_need"] = $cmr->translate("Follow the next procedure");
$cmr->prints["match_legend_config"] = $cmr->translate("Config");
$cmr->prints["match_label_path"] = $cmr->translate("The Username or the password for the connection to the database is wrong in the file: ");
$cmr->prints["match_legend_db"] = $cmr->translate("The Username or the password for the connection to the database is wrong in the file: ") ;
$cmr->prints["match_label_db_start"] = $cmr->translate("Database server is not started");
$cmr->prints["match_label_db_exist"] = $cmr->translate("The database does not exist");
$cmr->prints["match_link_click_here"] = $cmr->translate("Click here");
$cmr->prints["match_label_click_here"] = $cmr->translate(" To begin a new instalation");
$cmr->prints["match_label_db_source"] = $cmr->translate("If you use Mysql database, copy the sql file from the next link and run them with phpmyadmin or other instrument");
$cmr->prints["match_legend_scheme"] = $cmr->translate("Source");
$cmr->prints["match_link_db_scheme"] = $cmr->translate("Click here Complete database scheme");
$cmr->prints["match_link_db_scheme1"] = $cmr->translate("Click here Database scheme stucture");
$cmr->prints["match_link_db_scheme2"] = $cmr->translate("Click here Database inizial insertion");;

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

$cmr->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(cmr_print_template($template_install_need, "template2", $cmr->prints));
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_install_need, "match_include1")) include($cmr->get_path("module") . "modules/guest/page_footer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(cmr_print_template($template_install_need, "template3", $cmr->prints));
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
