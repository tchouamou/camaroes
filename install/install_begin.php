<?php
/**
 * template_install_begin.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























template_install_begin.php,  2011-Oct
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
include_once(dirname(__FILE__) . "/../control.php"); //to control access
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
$cmr->page["middle1"] = "install_begin";
if(($cmr->get_page("page_title"))&&(strlen($cmr->page["page_title"])>2)){
	$cmr->prints["match_title"] = ucfirst(cmr_search_replace("_", " ", $cmr->get_page("page_title")))." (" . $cmr->config["cmr_company_name3"] . ") " . $cmr->get_conf("cmr_version");
	}else{
	$cmr->prints["match_title"] = "(" . $cmr->config["cmr_company_name3"] . ") " . ucfirst(cmr_search_replace("_", " ", substr($cmr->get_page("middle1"), 0, strrpos($cmr->get_page("middle1"), ".")))) . " - Ver. " . $cmr->get_conf("cmr_version");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("template") . "templates/template_install_begin" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/origin/template_install_begin" . $cmr->get_ext("template");
$template_install_begin_file = cmr_good_file($file_list);
$template_install_begin = file_get_contents($template_install_begin_file);
$cmr->print_template("template1", $template_install_begin);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// --------------
$mod->name = 'Install';
$mod->rown_position = 'head';
$mod->col_position = "1";
// ===============================================
// ===============================================
// ===============================================
include_once(dirname(__FILE__) . "/../modules/guest/page_header.php");
// ===============================================
// ===============================================
// ===============================================
// ===============================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->themes["win_type"] = "default";
// $division->load_template($cmr->themes);

$division->themes["path"] = "install/install.php";
$division->module["name"] = "install.php";
$division->themes["module_positionx"] = "middle";
$division->themes["module_positiony"] = "1";




$division->module["title"] = $cmr->translate("Install");
// $division->module["text"] = $str;




$division->themes["background"]= "";
$division->bgcolor = "#E0E0E0";



$division->themes["header_tools_right"] = 0;








$cmr->prints["match_open_windows"] = $division->show_noclose();

$cmr->prints["match_legend_install"] = $cmr->translate("Camaroes Intallation:");
$cmr->prints["match_legend_writable"] = $cmr->translate("control this before:");

!is_writable("../camaroes/config.inc.php") ? $cmr->prints["match_class_config_inc"] = "alert" : $cmr->prints["match_class_config_inc"] = "normal_text";
!is_writable("../camaroes/conf.d/conf.ini") ? $cmr->prints["match_class_conf_ini"] = "alert" : $cmr->prints["match_class_conf_ini"] = "normal_text";
!is_writable("../camaroes/page/page.ini<") ? $cmr->prints["match_class_page_ini"] = "alert" : $cmr->prints["match_class_page_ini"] = "normal_text";
!is_writable("../camaroes/themes/themes.ini") ? $cmr->prints["match_class_themes_ini"] = "alert" : $cmr->prints["match_class_themes_ini"] = "normal_text";

!is_writable("../camaroes/home/") ? $cmr->prints["match_class_home"] = "alert" : $cmr->prints["match_class_home"] = "normal_text";
!is_writable("../camaroes/page/") ? $cmr->prints["match_class_page"] = "alert" : $cmr->prints["match_class_page"] = "normal_text";
!is_writable("../camaroes/languages/") ? $cmr->prints["match_class_languages"] = "alert" : $cmr->prints["match_class_languages"] = "normal_text";
!is_writable("../camaroes/conf.d/") ? $cmr->prints["match_class_conf_d"] = "alert" : $cmr->prints["match_class_conf_d"] = "normal_text";
!is_writable("../camaroes/themes/") ? $cmr->prints["match_class_themes"] = "alert" : $cmr->prints["match_class_themes"] = "normal_text";
!is_writable("../camaroes/log/") ? $cmr->prints["match_class_log"] = "alert" : $cmr->prints["match_class_log"] = "normal_text";
!is_writable("../camaroes/temp/") ? $cmr->prints["match_class_temp"] = "alert" : $cmr->prints["match_class_temp"] = "normal_text";

$cmr->prints["match_value_realpath"] =  "";
$cmr->prints["match_value_path_font"] =  "";
$cmr->prints["match_value_path_temp"] =  "";
$cmr->prints["match_legend_link"] =  "";

$cmr->prints["match_legend_cgi"] = $cmr->translate("Or run ");
$cmr->prints["match_link_cgi"] = $cmr->translate("this cli script");
$cmr->prints["match_label_cgi"] = $cmr->translate(" at command line");

$cmr->prints["match_legend_db"] = $cmr->translate("Insert (Database name), (Database user) and (Database password)");
$cmr->prints["match_label_db"] = $cmr->translate("Database already exist?:");
$cmr->prints["match_label_db_name"] = $cmr->translate("Database Name:");
$cmr->prints["match_label_db_user"] = $cmr->translate("Database User:");
$cmr->prints["match_label_db_pw"] = $cmr->translate("Database Password:");
$cmr->prints["match_label_submit"] = $cmr->translate("Install");
$cmr->prints["match_label_db_soket"] = $cmr->translate("Database Socket:");
$cmr->prints["match_label_db_type"] = $cmr->translate("Database type: ");
$cmr->prints["match_label_mysql"] = $cmr->translate("mysql");
$cmr->prints["match_option_list_db"] = "";

// $dir = @opendir("install/database/");
// while ($file = readdir($dir)){
//     if(($file != ".") && ($file != "..")){
//         $cmr->prints["match_option_list_db"] .= "<option>" . cmr_search_replace("\\.php", "", $file) . "</option>";
//     }
// }

$cmr->prints["match_label_db_host"] = $cmr->translate("Database Host(IP or name): ");
$cmr->prints["match_label_db_port"] = $cmr->translate("Database port: ");
$cmr->prints["match_label_db_prefix"] = $cmr->translate("Database table prefix: ");
$cmr->prints["match_label_default_table"] = $cmr->translate("Default Database Table: ");

$cmr->prints["match_legend_source"] = $cmr->translate("Or run ");
$cmr->prints["match_link_source"] = $cmr->translate("this sql text");
$cmr->prints["match_label_source"] = $cmr->translate(" with phpmyadmin or another sql tool");
$cmr->prints["match_label_how_to"] = $cmr->translate("how to install tstm");

$cmr->prints["match_legend_smtp"] = $cmr->translate("SMTP Config (use default)");
$cmr->prints["match_label_smtp_server"] = $cmr->translate("SMTP server: ");
$cmr->prints["match_label_smtp_port"] = $cmr->translate("SMTP port: ");
$cmr->prints["match_label_smtp_user"] = $cmr->translate("SMTP Username: ");
$cmr->prints["match_label_smtp_pw"] = $cmr->translate("SMTP Password: ");

$cmr->prints["match_legend_user_account"] = $cmr->translate("To your next login, insert password to use for default application users (to be change [Security]!!)");
$cmr->prints["match_label_pw_user"] = $cmr->translate("Password to use for user :");
$cmr->prints["match_legend_contact"] = $cmr->translate("Contact Config (change to your contact)");
$cmr->prints["match_label_group"] = $cmr->translate("Operator group: ");
$cmr->prints["match_label_email"] = $cmr->translate("Email: ");
$cmr->prints["match_label_user1"] = $cmr->translate("Operator User1: ");
$cmr->prints["match_label_user2"] = $cmr->translate("Operator User2: ");
$cmr->prints["match_label_user3"] = $cmr->translate("Operator User3: ");
$cmr->prints["match_label_user4"] = $cmr->translate("Operator User4: ");
$cmr->prints["match_label_log_user1"] = $cmr->translate("Log User1: ");
$cmr->prints["match_label_log_user2"] = $cmr->translate("Log User2: ");

$cmr->prints["match_legend_company"] = $cmr->translate("Company Config (change to your company)");
$cmr->prints["match_label_project_name"] = $cmr->translate("Company Project Name: ");
$cmr->prints["match_label_portal_name"] = $cmr->translate("Company Portal Name: ");
$cmr->prints["match_label_portal_title"] = $cmr->translate("Company Portal Title: ");
$cmr->prints["match_label_short_name"] = $cmr->translate("Company Short Name: ");
$cmr->prints["match_label_adress"] = $cmr->translate("Company adress: ");
$cmr->prints["match_label_tel"] = $cmr->translate("Company tel: ");
$cmr->prints["match_label_fax"] = $cmr->translate("Company fax: ");
$cmr->prints["match_label_cell"] = $cmr->translate("Company cell: ");
$cmr->prints["match_label_website"] = $cmr->translate("Company website: ");

$cmr->prints["match_legend_path"] = $cmr->translate("Path Config (use default)");
$cmr->prints["match_label_path"] = $cmr->translate("Do not use [\\]!! (for windows use:[/])");
$cmr->prints["match_label_application_url"] = $cmr->translate("Application Url: ");

$cmr->prints["match_label_path_main"] = $cmr->translate("Application Main path: ");
$cmr->prints["match_label_path_home"] = $cmr->translate("Home path: ");
$cmr->prints["match_label_path_mod"] = $cmr->translate("Modules Files path: ");
$cmr->prints["match_label_path_templ"] = $cmr->translate("Templates Files path: ");
$cmr->prints["match_label_path_func"] = $cmr->translate("Functions path: ");
$cmr->prints["match_label_path_class"] = $cmr->translate("Class path: ");
$cmr->prints["match_label_path_conf"] = $cmr->translate("Configuration files path: ");
$cmr->prints["match_label_path_lang"] = $cmr->translate("Language Files path: ");
$cmr->prints["match_label_path_img"] = $cmr->translate("Images path: ");
$cmr->prints["match_label_path_db"] = $cmr->translate("Internal Database Files path: ");
$cmr->prints["match_label_path_lib"] = $cmr->translate("Get data Files path: ");
$cmr->prints["match_label_path_not"] = $cmr->translate("Notify path: ");
$cmr->prints["match_label_path_log"] = $cmr->translate("Logs path: ");
$cmr->prints["match_label_path_model"] = $cmr->translate("Models Files path: ");
$cmr->prints["match_label_path_help"] = $cmr->translate("Helps Files path: ");
$cmr->prints["match_label_path_theme"] = $cmr->translate("Themes Files path: ");
$cmr->prints["match_label_path_tab"] = $cmr->translate("Tab path: ");

$cmr->prints["match_label_path_tmp"] = $cmr->translate("Font path: ");
$cmr->prints["match_label_path_font"] = $cmr->translate("gd font path: ");
$cmr->prints["match_label_path_temp"] = $cmr->translate("Temp path: ");
$cmr->prints["match_label_path_sess"] = $cmr->translate("Session path: ");

$cmr->prints["match_legend_other_config"] = $cmr->translate("Other Config (use default)");
$cmr->prints["match_label_language"] = $cmr->translate("Language:");
$cmr->prints["match_label_default"] = $cmr->translate("default");
$cmr->prints["match_label_theme"] =  $cmr->translate("theme");



$cmr->prints["match_options_language"] = "";
$array_value = get_languages_list($cmr->config);
$cmr->prints["match_options_language"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "1");


$cmr->prints["match_options_theme"] = "";
$array_value = get_themes_list($cmr->config);
$cmr->prints["match_options_theme"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");






$cmr->prints["match_label_config_file"] = $cmr->translate("Config Files:");
$cmr->prints["match_value_config_file"] = $cmr->config["cmr_main_config"];

$cmr->prints["match_label_config_database"] = $cmr->translate("Config database:");
$cmr->prints["match_value_config_database"] = $cmr->config["cmr_database_config"];

$cmr->prints["match_label_config_smtp"] = $cmr->translate("Config smtp:");
$cmr->prints["match_value_config_smtp"] = $cmr->config["cmr_smtp_config"];

$cmr->prints["match_label_config_compagny"] = $cmr->translate("Config compagny:");
$cmr->prints["match_value_config_compagny"] = $cmr->config["cmr_compagny_config"];



$cmr->prints["match_label_needed"] = $cmr->translate(": Needed");
$cmr->prints["match_label_install"] = $cmr->translate("Install");






// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login&force_login=yes\"  class=\"CmrButton\" >" . $cmr->translate("Login") . "</a>";
$cmr->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\"  class=\"CmrButton\" >" . $cmr->translate("logout") . "</a>";

if(($cmr->get_conf("cmr_allow_forget_account")))
$cmr->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\"  class=\"CmrButton\" >" . $cmr->translate("Forget Account") . "</a>";

if(($cmr->get_conf("cmr_allow_inscription")))
$cmr->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\"  class=\"CmrButton\" >" . $cmr->translate("New account") . "</a>";

if(($cmr->get_conf("cmr_allow_validation")))
$cmr->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" class=\"CmrButton\" >" . $cmr->translate("Account Validation") . "</a>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




$cmr->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template2", $template_install_begin);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = "footer";
$mod->rown_position = "foot";
$mod->col_position = "1";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($template_install_begin, "match_include1")) include($cmr->get_path("module") . "modules/guest/page_footer.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->print_template("template3", $template_install_begin);
$cmr->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
