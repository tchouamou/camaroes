<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_login_db.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.













get_login_db.php,  2011-Oct
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
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "login_db"://----can delete or call another function for work ----



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
include_once($cmr->get_path("module") . "modules/database/class/class_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr_code = get_post('cmr_code');
// $db_code = get_post('db_code');
	
	

$cmr_code = isset($_POST['db_code']) ? $_POST['db_code'] : $_GET['db_code'];
$cmr->session["cmr_code"] = isset($_POST['cmr_code']) ? $_POST['cmr_code'] : $_GET['cmr_code'];

if(((($cmr->get_conf("cmr_login_code")))&&($cmr->session["cmr_code"] =! pw_encode($db_code))))  {
// 	$cmr->event["id"] = "13";
// 	$cmr->event["name"] = "wrong_account";
// 	$cmr->event["line"]=__LINE__;
// 	$cmr->event["script"]=__FILE__;
// 	$cmr->event["data"] = "?cmr_mode=login&force_login=yes";
// 	$cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
// 	$cmr->run_event();
}else{
// =======================================================================
	get_post("db_type") ? $cmr->db["db_type"] = get_post("db_type") : $cmr->db["db_type"] = $cmr->get_conf("db_type");
	get_post("db_name") ? $cmr->db["db_name"] = get_post("db_name") : $cmr->db["db_name"] = $cmr->get_conf("db_name");
	get_post("db_host") ? $cmr->db["db_host"] = get_post("db_host") : $cmr->db["db_host"] = $cmr->get_conf("db_host");
	get_post("db_port") ? $cmr->db["db_port"] = get_post("db_port") : $cmr->db["db_port"] = $cmr->get_conf("db_port");
	get_post("db_user") ? $cmr->db["db_user"] = get_post("db_user") : $cmr->db["db_user"] = $cmr->get_conf("db_user");
	get_post("db_pw") ? $cmr->db["db_pw"] = get_post("db_pw") : $cmr->db["db_pw"] = $cmr->get_conf("db_pw");
	$cmr->db["db_port"] = "";
// =======================================================================
}


// -------------
$cmr->save_session(); 
// -------------


// =======================================================================
// =======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// =======================================================================
// =======================================================================

// =======================================================================
// ----salva passord ----------
	$cookie_action = (get_post("save_cookies"));
	save_cookie_status($cmr->config, "save_cookies", $cookie_action);
	save_cookie_status($cmr->config, "db_type", $cookie_action);
	save_cookie_status($cmr->config, "db_name", $cookie_action);
	save_cookie_status($cmr->config, "db_host", $cookie_action);
	save_cookie_status($cmr->config, "db_user", $cookie_action);
	save_cookie_status($cmr->config, "imap_pw", $cookie_action);
	save_cookie_status($cmr->config, "db_pw", $cookie_action);
	
// =======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->get_session("id") . "', 'logim_db'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["left1"] = "";
$cmr->page["left2"] = "";
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/database/databases.php";
$cmr->page["middle2"] = "";
$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
