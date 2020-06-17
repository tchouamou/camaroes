<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * load_user_data.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.







load_user_data.php,  2011-Oct
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
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("get_data") . "get_data/guest/get_login.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ======================================================================
if(empty($cmr_config["cmr_ip_auth"])) $cmr_config["cmr_ip_auth"] = "2"; //---- cmr_ip_auth > 1 => Not new login --------
// ======================================================================

// ======================================================================
if($cmr->exist_mess("load_user_data.php"))
print($cmr->module_mess("load_user_data.php"));
// ======================================================================

// ======================================================================
$cmr->user["auth_group_sign"] = "";
$cmr->user["auth_tel"] = "";
$cmr->user["auth_cel"] = "";
$cmr->user["auth_user_name"] = "";
$cmr->user["auth_user_type"] = "";
$cmr->user["auth_lang"] = "";
$cmr->user["auth_theme"] = "";
$cmr->user["type"] = "";
$cmr->user["auth_state"] = "";
$cmr->user["auth_group_home"] = "";
$cmr->group["type"] = "";
$cmr->group["home"] = "";
$cmr->session["type"] = "";
// =======================================================================
// =======================================================================
// ============SAVING USER DATA===========================================
// =======================================================================
// =======================================================================

$cmr->user["authorisation"] = get_user_type($user_object);


$cmr->user["auth_user_name"] = $user_object->name;
$cmr->user["auth_uid"] = $user_object->uid;
$cmr->user["auth_id"] = $user_object->id;
$cmr->user["auth_email"] = $user_object->email;
$cmr->user["auth_tel"] = $user_object->tel;
$cmr->user["auth_cel"] = $user_object->cel;
$cmr->user["auth_state"] = $user_object->state;
$cmr->user["auth_user_script"] = $user_object->login_script;
$cmr->user["auth_user_type"] = $user_object->type;
$cmr->user["auth_lang"] = $user_object->lang;
$cmr->user["auth_user_sign"] = $user_object->email_sign;
$cmr->user["auth_user_comment"] = "";

$cmr->user["auth_list_group"] = "";
$cmr->user["auth_theme"] = $user_object->style;
$cmr->user["auth_group"] = $cmr->get_conf("cmr_default_group");
// $auth_pw = $user_object->pw;
// $auth_public_key = $user_object->public_key;
// $auth_private_key = $user_object->private_key;
// $auth_pass_phrase = $user_object->pass_phrase;
// ======================================================================
// ======================================================================
$cmr->user["authorised"] = (((($user_object->state) == 'enable') || (($user_object->state == 'enable') || ($user_object->state == 'active'))) && ($cmr->user["auth_email"]));
    // *************************session *****************************
// ======================================================================
// ======================================================================




// =======================================================================
// =======================================================================
$cmr->user["cmr_sid"] = session_id();
// *************************
// $sql_session = "DELETE FROM " . $cmr->get_conf("cmr_table_prefix") . "session where (sessionid='" . $sessionid . "') and  (sessionip='" . $sessionip . "') and (user_email= '" . $user_email . "') ;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
// -----------
$qr->email = $user_object->email;
$sql_session = $qr->get_query("delete_session");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$result_sql = &$cmr->db_connection->Execute($sql_session) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// *************************
// *************************
// $sql_session = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "session ( id, sessionid, sessionip, user_email, status, state,  time_out,  session_end, date_time ) ";
// $sql_session .= " VALUES ('', '" . $sessionid . "', '" . $sessionip . "', '" . $user_email . "', '" . $status . "', '" . $state . "', '" . $time_out . "', NOW(), NOW());";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$sql_session = $qr->get_query("insert_session");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$result_sql = &$cmr->db_connection->Execute($sql_session) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
    // *************************
// ======================================================================
// ======================================================================




// =======================================================================
// =======================================================================
// ==============ATIVE USER==============================================
// ===============Registrate control=====================================
// ============authorisation type and list group of the user ===
// -----------
// $sql_group = " SELECT " . $cmr->get_conf("cmr_table_prefix") . "user_groups.*,  ";
// $sql_group .= " " . $cmr->get_conf("cmr_table_prefix") . "groups.*";
// $sql_group .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// $sql_group .= " WHERE (user_email='" . $cmr->user["auth_email"] . "') and (group_name=name)";
// $sql_group .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable') and (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable')";
// $sql_group .= " ORDER BY " . $cmr->get_conf("cmr_table_prefix") . "groups.type;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$sql_group = $qr->get_query("user_list_group");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$result_group = &$cmr->db_connection->Execute($sql_group) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// ---- Default value for all user authentificated --------
$cmr->group["name"] = $cmr->user["auth_group"];
$auth_list_group = "'" . $cmr->user["auth_group"] . "'";
$cmr->user["auth_group_type"] = "0";
$cmr->group["type"] = $cmr->user["auth_group_type"];
$cmr->group["login_script"] = "";
$cmr->group["comment"] = "";
$cmr->group["email_sign"] = "";
$cmr->group["home"] = "";

$cmr->user["auth_group"] = $cmr->user["auth_group"];
$cmr->user["auth_group_script"] = "";
$cmr->user["auth_group_comment"] = "";
$cmr->user["auth_group_sign"] = "";
// ======================================================================
// ======================================================================




// =======================================================================
$max_group_type = 0;
$auth_group = NULL;
// =======================================================================
if(!empty($result_group))
while ($my_group = $result_group->FetchNextObject(false)){
    // ------------
  if((!(cmr_search("'" . $my_group->group_name . "'", $auth_list_group))) && (($my_group->state == 'enable') || ($my_group->state == 'active'))){
    $auth_list_group .= ", '" . $my_group->group_name . "'";
	$my_group_type = get_user_type($my_group);

	if($my_group_type >= $max_group_type){
		$auth_group = $my_group;
		$max_group_type = $my_group_type;
		}

 }
};
// ======================================================================
// ======================================================================
if($max_group_type > $cmr->user["authorisation"])
$cmr->user["authorisation"] = $my_group_type;
// ======================================================================
// ======================================================================
if($auth_group){
    $cmr->group["name"] = $auth_group->group_name;
    $cmr->group["type"] = $auth_group->type;
    $cmr->group["login_script"] = $auth_group->login_script;
//     $cmr->group["comment"] = $auth_group->comment;
    $cmr->group["email_sign"] = $auth_group->email_sign;
    $cmr->group["home"] = $auth_group->home;

    $cmr->user["auth_group"] = $auth_group->group_name;
    $cmr->user["auth_group_script"] = $auth_group->login_script;
//     $cmr->user["auth_group_comment"] = $auth_group->comment;
    $cmr->user["auth_group_sign"] = $auth_group->email_sign;

// ======================================================================
	if($cmr->user["auth_group_type"] > $cmr->user["authorisation"])
    $cmr->user["authorisation"] = $cmr->user["auth_group_type"];
// ======================================================================
};


// =======================================================================
if(($cmr->get_user("auth_group"))) $auth_list_group .= ", " . $cmr->get_user("auth_group");
$auth_list_group = $cmr->tree_group($auth_list_group);
// =======================================================================

// ----complete the list off authrised group taked in th database ---
// ----with the default one take in the config..php file           --
$list_grp = $auth_list_group . ", '" . $cmr->get_conf("cmr_default_group") . "'";
// print($cmr->get_user("auth_list_group");exit);
$array_list_group = array_unique(explode(", ", $list_grp));
$list_group = implode(", ", $array_list_group);
$list_group = cmr_searchi_replace(",.$", "", $list_group);
$list_group = cmr_searchi_replace("^., ", "", $list_group);
// ----and save it -------
$cmr->user["auth_list_group"] = $list_group;
// $cmr->user["auth_list_group"] = $list_group;
// =======================================================================
// =======================================================================




// =======================================================================
// =======================================================================
$cmr->log_to_db("'" . $cmr->user["auth_email"] . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->user["cmr_sid"] . "' ,'login'");
// =======================================================================
// =======================================================================




// =======================================================================
// =======================================================================
$cmr->user["auth_uid"] = $user_object->uid;
$cmr->user["auth_id"] = $user_object->id;
$cmr->user["host_adress"] = $_SERVER['REMOTE_ADDR'];


if(($cmr->get_user("auth_group_comment"))){
    $cmr->user["auth_comment"] = $cmr->get_user("auth_group_comment");
}else{
    $cmr->user["auth_comment"] = $cmr->get_user("auth_user_comment");
}


if(($cmr->get_user("auth_group_sign"))){
    $cmr->user["auth_sign"] = $cmr->get_user("auth_group_sign");
}else{
    $cmr->user["auth_sign"] = $cmr->get_user("auth_user_sign");
}

$cmr->user["auth_tel"] = $user_object->tel;
$cmr->user["auth_cel"] = $user_object->cel;
$cmr->user["auth_user_name"] = $user_object->uid;
$cmr->user["auth_user_type"] = $user_object->type;

$cmr->page["language"] = $user_object->lang;
$cmr->page["auth_theme"] = $user_object->style;

$cmr->user["auth_type"] = $user_object->type;
$cmr->user["type"] = $user_object->type;
$cmr->user["auth_groups"] = $cmr->user["auth_group"];
$cmr->user["auth_list_group"] = $auth_list_group;
$cmr->user["auth_path"] = $cmr->get_path("home") . "home/" . $cmr->user["auth_group"] . "/";

if($cmr->user["auth_user_type"] > $cmr->user["authorisation"])
$cmr->user["authorisation"] = $cmr->user["auth_user_type"];

$cmr->user["auth_type"] = $cmr->user["auth_user_type"];
// =======================================================================
// =======================================================================




// =======================================================================
// =======================================================================
if(empty($_SESSION['host_name'])) $_SESSION['host_name'] = $_SERVER['REMOTE_ADDR'];
$cmr->session["host_name"] = $_SESSION['host_name'];
$GLOBALS["host_name"] = $cmr->get_session("host_name");
// =======================================================================
// =======================================================================




// =======================================================================
// =======================================================================
$cmr->session["id"] = $cmr->user["cmr_sid"];
$cmr->session["cmr_sid"] = $cmr->user["cmr_sid"];
$cmr->session["connect_from"] = date("Y-m-d H:i:s");
$cmr->session["user_email"] = $cmr->user["auth_email"];
$cmr->session["status"] = "connect";
$cmr->session["state"] = "enable";
$cmr->session["time_out"] = $cmr->get_conf("cmr_session_time_out");
$cmr->session["time_out"] = $cmr->get_conf("cmr_session_time_out");
$cmr->session["user_groups"] = $cmr->user["auth_group"];
$cmr->session["temp"] = getenv("TMP");//getenv("TMP");// putenv();
$cmr->session["authorised"] = $cmr->user["authorised"];
$cmr->session["ip"] = $_SERVER['REMOTE_ADDR'];
$cmr->session["type"] = $cmr->user["authorisation"];
if((substr($cmr->user["auth_type"], -9) == "read_only") || (substr($cmr->group["type"], -9) == "read_only")||(substr($cmr->user["auth_mode"], -9)) == "read_only") $cmr->session["type"] = "read_only";

$cmr->session["os"] = getenv("OS");
$cmr->session["path"] = getenv("Path");
$cmr->session["computername"] = getenv("COMPUTERNAME");
$cmr->session["comspec"] = getenv("ComSpec");
$cmr->session["processor_architecture"] = getenv("PROCESSOR_ARCHITECTURE");
$cmr->session["processor_identifier"] = getenv("PROCESSOR_IDENTIFIER");
$cmr->session["processor_level"] = getenv("PROCESSOR_LEVEL");
$cmr->session["processor_revision"] = getenv("PROCESSOR_REVISION");
$cmr->session["systemdrive"] = getenv("SystemDrive");
// =======================================================================
// =======================================================================




// =======================================================================
// =======================================================================
$cmr->user["auth_state"] = $user_object->state;
$cmr->user["host_name"] = $cmr->get_session("host_name");
// =======================================================================
// =======================================================================
$cmr->user["value_num_message"] = "";
$cmr->user["value_num_ticket"] = "";
$cmr->user["value_num_email"] = "";
// =======================================================================
// =======================================================================



// ======================================================================
// ======================================================================
$cmr->config["authorisation"] = $cmr->get_user("authorisation");
$cmr->config["host_adress"] = $_SERVER['REMOTE_ADDR'];
$cmr->config["host_name"] = $cmr->get_session("host_name");
$cmr->config["user_email"] = $cmr->user["auth_email"];
// ======================================================================
// ======================================================================





// ======================================================================
// ======================================================================
$cmr->user["auth_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
$cmr->user["auth_user_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
$cmr->user["auth_group_path"] = $cmr->get_path("home") . "home/groups/" . $cmr->get_user("auth_group") . "/";// =========== file group  ==================

$cmr->user["auth_home"] = $cmr->user["auth_path"] . "/";// =========== file user  ==================
$cmr->user["auth_user_home"] = $cmr->get_path("home") . $user_object->home . "/";// =========== file user  ==================
$cmr->user["auth_group_home"] = $cmr->get_path("home") . $cmr->group["home"] . "/";// =========== file group  ==================

// $cmr->user["auth_group_script"] = $auth_group_script;// ===============database login group script================
// ===============database login user script=================
// ======================================================================
// ======================================================================


// =======================================================================
// =======================================================================
if((get_post("cmr_lang"))){
$cmr->post_var["current_lang"] = get_post("cmr_lang");
$cmr->user["auth_lang"] = get_post("cmr_lang");
$cmr->page["language"] = get_post("cmr_lang");
$cmr->config["cmr_begin_lang_file"] = $cmr->get_path("lang") . "languages/" . get_post("cmr_lang") . "/" . $cmr->get_conf("cmr_lang_filename");
}
// ======================================================================
// ======================================================================
if((get_post("cmr_theme"))){
$cmr->post_var["current_themes"] = get_post("cmr_theme");
$cmr->user["auth_theme"] = get_post("cmr_theme");
$cmr->page["auth_theme"] = get_post("cmr_theme");
$cmr->config["cmr_begin_theme_file"] = $cmr->get_path("theme") . "themes/" . get_post("cmr_theme") . "/" . $cmr->get_conf("cmr_theme_filename");
}
// ======================================================================
// ======================================================================

// ============================================
// ===================login_to=================
// ============================================
// ============================================
$cmr->page["auth_tab"] = get_post("login_to");
$cmr->session["login_to"] = $cmr->page["auth_tab"];
if(($cmr->page["auth_tab"])){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	switch(trim($cmr->page["auth_tab"])){
		case "report":
		case "email":
		case "message":
		case "ticket":
			$cmr->page["tab_mode"] = 0;
		break;

		case "file_explorator":
		case "database":
		case "replace":
		case "script_generator":
		case "button_generator":
		case "admin":
			$cmr->page["tab_mode"] = 1;
		break;
		default:
// 			$cmr->page["tab_mode"] = 1;
		break;
		}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// ============================================
	$tab_toload = trim($cmr->page["auth_tab"]);
	if(file_exists($cmr->get_path("tab") . "tab/" . $tab_toload . "/page" . $cmr->get_ext("page")))
	$cmr->post_var["next_tab"] = $tab_toload;
	// ============================================
	$cmr->page["current_tab"] = "tab/" . $tab_toload;
	$cmr->post_var["current_tab"] = "tab/" . $tab_toload;
// 	$cmr->config["cmr_begin_pager_file"] = $cmr->get_path("tab") . "page/" . get_post("cmr_lang") . "/" . $cmr->get_conf("cmr_page_filename");
	// ============================================
}



// ======================================================================
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower($cmr->get_user("auth_group")) . "/attach/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// ======================================================================


// =======================================================================
// =======================================================================
	if(empty($cmr->db["db_type"])) $cmr->db["db_type"] = $cmr->get_conf("db_type");
	if(empty($cmr->db["db_name"])) $cmr->db["db_name"] = $cmr->get_conf("db_name");
	if(empty($cmr->db["db_host"])) $cmr->db["db_host"] = $cmr->get_conf("db_host");
	if(empty($cmr->db["db_port"])) $cmr->db["db_port"] = $cmr->get_conf("db_port");
	if(empty($cmr->db["db_user"])) $cmr->db["db_user"] = $cmr->get_conf("db_user");
	if(empty($cmr->db["db_pw"])) $cmr->db["db_pw"] = $cmr->get_conf("db_pw");
// =======================================================================
// =======================================================================
	if(!file_exists($cmr->get_path("index") . "home/"))
	mkdir($cmr->get_path("index") . "home/");

	if(!file_exists($cmr->get_path("index") . "home/groups/"))
	mkdir($cmr->get_path("index") . "home/groups/");

	if(!file_exists($cmr->get_path("index") . "home/groups/" . trim($cmr->get_user("auth_group"))))
	mkdir($cmr->get_path("index") . "home/groups/" . trim($cmr->get_user("auth_group")));

	if(!file_exists($cmr->get_path("index") . "home/users/" . trim($cmr->get_user("auth_uid"))))
	mkdir($cmr->get_path("index") . "home/users/" . trim($cmr->get_user("auth_uid")));
// ======================================================================
// ======================================================================


// =======================================================================
// =======================================================================
	$cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User [" . $cmr->user["auth_email"] . " ] find and Authorized, New Session id=" . $cmr->user["cmr_sid"]);
	$cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " connect succefull ! Group=" . $cmr->user["auth_group"]);
// =======================================================================



// =======================================================================
$cmr->post_var["next_tab"] = "";
// =======================================================================
    if(file_exists($cmr->get_user("auth_group_path")."login_rc.php"))
    include_once($cmr->get_user("auth_group_path")."login_rc.php");// ===============file group login script================
    if(file_exists($cmr->get_user("auth_user_path")."login_rc.php"))
    include_once(($cmr->get_user("auth_user_path")."login_rc.php"));// ===============file login user script=================
    @ eval($cmr->get_user("auth_group_script"));// ===============database login group script================
    @ eval($cmr->get_user("auth_user_script"));// ===============database login user script=================

    $cmr->config = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
    $cmr->config = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_home_config"), $cmr->config, "var");
    if($cmr->get_conf("cmr_page_filename"))
    $cmr->page = $cmr->include_conf($cmr->get_user("auth_group_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
    if($cmr->get_conf("cmr_page_filename"))
    $cmr->page = $cmr->include_conf($cmr->get_user("auth_user_path") . $cmr->get_conf("cmr_page_filename"), $cmr->page, "var");
    if($cmr->get_conf("cmr_theme_filename"))
    $cmr->themes = $cmr->include_conf($cmr->get_path("theme") . "themes/" . $cmr->get_user("auth_theme") . "/" . $cmr->get_conf("cmr_theme_filename"), $cmr->themes, "var");
    if($cmr->get_conf("cmr_lang_filename"))
    $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/" . $cmr->get_page("language") . "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
    if($cmr->get_conf("cmr_lang_filename"))
    $cmr->language = $cmr->include_conf($cmr->get_path("lang") . "languages/" . $cmr->get_user("auth_lang") . "/" . $cmr->get_conf("cmr_lang_filename"), $cmr->language, "var");
	if(($cmr->get_session("login_to"))) $cmr->page = cmr_include_conf($cmr->config, $cmr->get_path("tab") . "tab/" . $cmr->post_var["next_tab"] . "/page" . $cmr->get_ext("page"), $cmr->page, "var");
// include(dirname(__FILE__) . "/system/loader/login_to.php");
// ======================================================================
//cmr_save_session($cmr->config, $cmr->themes, $cmr->page, $cmr->language, $cmr->db, $cmr->imap, $cmr->user, $cmr->group, $cmr->post_var, $cmr->session);
// ======================================================================
	$cmr->update_mess(); //Update ripetitive Message
// ======================================================================

?>
