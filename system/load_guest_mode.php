<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * load_guest_mode.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























load_guest_mode.php,  2011-Oct
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->user["authorisation"] ="z"; //--importante per diritti utenti--
$cmr->user["auth_uid"] = "guest";
$cmr->user["auth_id"] = "-1";
$cmr->user["auth_group_comment"] = "No Database Mode";
$cmr->user["auth_user_comment"] = "No Database Mode";
$cmr->user["auth_comment"] = "No Database Mode";
$cmr->user["auth_group_sign"] = "";
$cmr->user["auth_user_sign"] = "";
$cmr->user["auth_sign"] = "";
$cmr->user["auth_tel"] = "";
$cmr->user["auth_theme"] = "";
$cmr->user["auth_cel"] = "";
$cmr->user["auth_user_name"] = "guest";
$cmr->user["auth_user_type"] ="z";
$cmr->user["auth_lang"] = "default";
$cmr->user["authorised"] = 1;
$cmr->user["auth_email"] = "guest@localhost";
$cmr->user["auth_group"] = "guest";
$cmr->user["auth_list_group"] = "guest";
$cmr->user["auth_state"] = "enable";
$cmr->user["auth_group_type"] = "normal";
$cmr->user["auth_group_script"] = "";// ===============database login group script================
$cmr->user["auth_user_script"] = "";// ===============database login user script=================

$cmr->group["auth_type"] = 7;
$cmr->group["name"] = "guest";
$cmr->group["login_script"] = "";
$cmr->group["type"] = "default";
$cmr->group["comment"] = "";
$cmr->group["email_sign"] = "";

$cmr->page["language"] = "default";
$cmr->page["auth_theme"] = "default";

$cmr->session["state"] = "enable";
$cmr->session["user_groups"] = "guest";
$cmr->session["user_email"] = "guest@localhost";
$cmr->session["status"] = "connect";
$cmr->session["authorised"] = 1;

$cmr->page["auth_theme"] = "default";
$cmr->page["language"] = "default";

$cmr->config["cmr_on_db_error"] = "exit";
$cmr->config["cmr_secure_mode"] = "0";
$cmr->config["cmr_code_url"] = "0";
$cmr->config["cmr_show_event"] = "0";
$cmr->config["cmr_show_message"] = "0";
$cmr->config["cmr_debug_mode"] = "0";
$cmr->config["error_reporting"] = "0";


$cmr->config["cmr_head_see_action"] = "0";
$cmr->config["cmr_head_see_tab"] = "0";

$cmr->session["id"] = session_id();
$cmr->session["cmr_sid"] = session_id();
$cmr->session["connect_from"] = date("Y-m-d H:i:s");
$cmr->session["temp"] = getenv("TEMP");//getenv("TMP");// putenv();
$cmr->session["os"] = getenv("OS");
$cmr->session["path"] = getenv("Path");
$cmr->session["computername"] = getenv("COMPUTERNAME");
$cmr->session["comspec"] = getenv("ComSpec");
$cmr->session["processor_architecture"] = getenv("PROCESSOR_ARCHITECTURE");
$cmr->session["processor_identifier"] = getenv("PROCESSOR_IDENTIFIER");
$cmr->session["processor_level"] = getenv("PROCESSOR_LEVEL");
$cmr->session["processor_revision"] = getenv("PROCESSOR_REVISION");
$cmr->session["systemdrive"] = getenv("SystemDrive");


$cmr->user["cmr_sid"] = session_id();


$adress = $_SERVER['REMOTE_ADDR'];
$cmr->user["host_adress"] = $_SERVER['REMOTE_ADDR'];

$cmr->user["auth_path"] = $cmr->get_path("home") . "home/" . $cmr->get_user("auth_group") . "/";
$cmr->group["home"] = $cmr->get_path("home") . "home/" . $cmr->get_user("auth_group") . "/";


$cmr->session["time_out"] = $cmr->get_conf("cmr_session_time_out");
$cmr->session["host_name"] = $_SESSION['host_name'];

$cmr->session["ip"] = $_SERVER['REMOTE_ADDR'];

$cmr->user["host_name"] = $cmr->get_session("host_name");
$cmr->config["user_email"] = $cmr->get_session("user_email");


$cmr->config["authorisation"] = $cmr->get_user("authorisation");
$cmr->config["host_adress"] = $_SERVER['REMOTE_ADDR'];
$cmr->config["host_name"] = $cmr->get_session("host_name");


$cmr->user["auth_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
$cmr->user["auth_user_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
$cmr->user["auth_group_path"] = $cmr->get_path("home") . "home/groups/" . $cmr->get_user("auth_group") . "/";// =========== file group  ==================


$cmr->config["cmr_begin_pager_file"] = $cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename");
// ======================================================================
// ======================================================================
include_once(($cmr->get_user("auth_group_path")."login_rc.php"));// ===============file group login script================
include_once(($cmr->get_user("auth_user_path")."login_rc.php"));// ===============file login user script=================
$cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
$cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");

$cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
$cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
$cmr->themes = $cmr->include_conf($cmr->get_path("theme") . $cmr->get_page("cmr_themes"), $cmr->themes, "var");
$cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/" . $cmr->get_user("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
$cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/" . $cmr->get_page("language"). "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
// ======================================================================
// ======================================================================
   ?>
