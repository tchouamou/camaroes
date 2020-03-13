<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * page_footer.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























page_footer.php,Ver 3.0  2011-Sep-Wed 12:32:30  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// Number of anchors in this document:
if(!($cmr->get_session("user_email"))) $cmr->session["user_email"] = "guest@localhost";
if(!($cmr->get_session("connect_from"))) $cmr->session["connect_from"] = "0.0.0.0";
if(!($cmr->get_user("auth_user_path"))) $cmr->user["auth_user_path"] = "home/users/guest/";
if(!($cmr->get_user("auth_group_path"))) $cmr->user["auth_group_path"] = "home/groups/guest/";
$division->prints["match_cmr_images_path"] = $cmr->get_path("www");

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_your_ip"] = $cmr->translate("Your IP");
$division->prints["match_remote_addr"] = "";
$division->prints["match_remote_port"] = "";
$division->prints["match_browser"] = $cmr->translate("Browser");
$division->prints["match_user_agent"] = "";
$division->prints["match_server"] = $cmr->translate("Server");
$division->prints["match_software"] = "";
$division->prints["match_protocol"] = "";
$division->prints["match_port"] = "";
$division->prints["match_label_from"]  = $cmr->translate("from");

$division->prints["match_current_user"] = $cmr->translate("Current user");
$division->prints["match_user_email"] = "";
$division->prints["match_connect_from"] = "";
$division->prints["match_connect_from"] = $cmr->get_session("connect_from");
  
//   $division->prints["match_last_connection"]  = $cmr->translate("Last connection") ;
//   $division->prints["match_connected_user"]  = $cmr->translate("Connected user") ;
// $division->prints["match_user_agent"] = cmr_search_replace("[\\\/]", "", $_SERVER["HTTP_USER_AGENT"]);
$division->prints["match_user_agent"] =  $_SERVER["HTTP_USER_AGENT"];
$division->prints["match_remote_addr"] = $_SERVER['REMOTE_ADDR'];
$division->prints["match_remote_port"] = $_SERVER["REMOTE_PORT"];
$division->prints["match_user_email"] = $cmr->get_session("user_email");
$division->prints["match_connect_from"] = $cmr->get_session("connect_from");

if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_user_type"))){
$division->prints["match_software"] = $_SERVER["SERVER_SOFTWARE"];
$division->prints["match_protocol"] = $_SERVER["SERVER_PROTOCOL"];
$division->prints["match_port"] = $_SERVER["SERVER_PORT"];
};


$division->prints["match_company_name"] = $cmr->get_conf("cmr_company_name");
$division->prints["match_all_rights"] = $cmr->translate("All rights reserved");
$division->prints["match_company_address"] = $cmr->get_conf("cmr_company_address");
$division->prints["match_company_website"]  = $cmr->get_conf("cmr_company_website");
$division->prints["match_www_path"]  = $cmr->get_path("www");

       

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_page_footer" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_page_footer" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_page_footer" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

  
$division->print_template("template");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
