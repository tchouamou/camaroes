<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_change_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_change_user.php,Ver 3.0  2011-Sep 22:32:32
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "change_user":
$old_email = $cmr->get_user("auth_email");
$new_email = get_post("user_email");
$id_user = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "id", "email", $new_email);

if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){

$cmr->query["user"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ( email='%s');",
cmr_escape($new_email));

$result = $cmr->db_connection->query($cmr->query["user"]);
$user_object = $result->fetch_object();
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->email["headers_severity"] = 3;
$cmr->email["headers_to"] = "" . " <" . $cmr->get_user("auth_email") . ">\r\n";
$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
$cmr->email["headers_bcc"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
	$cmr->session["type"] = "";
	$cmr->group["type"] = "";
	$cmr->group["home"] = "";
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
	// $cmr->user["auth_user_comment"] = $user_object->comment;

	$cmr->user["auth_list_group"] = "";
	$cmr->user["auth_theme"] = $user_object->style;
	// $auth_pw = $user_object->pw;
	// $auth_public_key = $user_object->public_key;
	// $auth_private_key = $user_object->private_key;
	// $auth_pass_phrase = $user_object->pass_phrase;
	// ======================================================================
	// ======================================================================
	$cmr->user["authorised"] = ((($user_object->state) == 'active') && ($cmr->user["auth_email"]));
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
	$result_sql = $cmr->db_connection->query($sql_session) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->error);
	// *************************
	// *************************
	// $sql_session = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "session ( id, sessionid, sessionip, user_email, status, state,  time_out,  session_end, date_time ) ";
	// $sql_session .= " VALUES ('', '" . $sessionid . "', '" . $sessionip . "', '" . $user_email . "', '" . $status . "', '" . $state . "', '" . $time_out . "', NOW(), NOW());";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$sql_session = $qr->get_query("insert_session");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$result_sql = $cmr->db_connection->query($sql_session) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->error);
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

	$result_group = $cmr->db_connection->query($sql_group) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->error);
	// ---- Default value for all user authentificated --------
	$cmr->user["auth_group"] = $cmr->get_conf("cmr_default_group");
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
	  if((!(cmr_search("'" . $my_group->group_name . "'", $auth_list_group))) && (($my_group->state) == 'active')){
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
	if($max_group_type > $cmr->user["authorisation"]) $cmr->user["authorisation"] = $my_group_type;
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
	$auth_list_group = calcul_tree_group($cmr->config,  $auth_list_group, $cmr->db_connection);
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
	$cmr->log_to_db("'" . $cmr->user["auth_email"] . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->user["cmr_sid"] . "' ,'change_user'");
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
	// =======================================================================
	// =======================================================================




	// =======================================================================
	// =======================================================================
	$cmr->session["id"] = $cmr->user["cmr_sid"];
	$cmr->session["cmr_sid"] = $cmr->user["cmr_sid"];
	$cmr->session["connect_from"] = date("Y-m-d H:i:s");
	$cmr->session["user_email"] = $cmr->user["auth_email"];
	$cmr->session["status"] = "connect";
	$cmr->session["state"] = "active";
	$cmr->session["time_out"] = $cmr->get_conf("cmr_session_time_out");
	$cmr->session["time_out"] = $cmr->get_conf("cmr_session_time_out");
	$cmr->session["user_groups"] = $cmr->user["auth_group"];
	$cmr->session["authorised"] = $cmr->user["authorised"];

	if((substr($cmr->user["auth_type"], -9)  =="read_only") || (substr($cmr->group["type"], -9) =="read_only")||(substr($cmr->user["auth_mode"], -9))=="read_only") $cmr->session["type"] ="read_only";

	// =======================================================================
	// =======================================================================




	// =======================================================================
	// =======================================================================
	$cmr->user["auth_state"] = $user_object->state;
	$cmr->user["host_name"] = $cmr->get_session("host_name");
	// ======================================================================
	// =======================================================================
	$cmr->user["value_num_message"] = "";
	$cmr->user["value_num_ticket"] = "";
	$cmr->user["value_num_email"] = "";
	// ======================================================================
	// =======================================================================



	// ======================================================================
	// ======================================================================
	$cmr->config["authorisation"] = $cmr->get_user("authorisation");
	$cmr->config["user_email"] = $cmr->user["auth_email"];
	// ======================================================================
	// ======================================================================





	// ======================================================================
	// ======================================================================
	$cmr->user["auth_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
	$cmr->user["auth_user_path"] = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/";// =========== file user  ==================
	$cmr->user["auth_group_path"] = $cmr->get_path("home") . "home/groups/" . $cmr->get_user("auth_group") . "/";// =========== file group  ==================

	$cmr->user["auth_home"] = $cmr->get_path("home") . $user_object->home . "/";// =========== file user  ==================
	$cmr->user["auth_user_home"] = $cmr->get_path("home") . $user_object->home . "/";// =========== file user  ==================
	$cmr->user["auth_group_home"] = $cmr->get_path("home") . $cmr->group["home"] . "/";// =========== file group  ==================

	// ======================================================================
	// =======================================================================
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
	$cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User [" . $cmr->user["auth_email"] . " ] find and Authorized, New Session id=" . $cmr->user["cmr_sid"]);
	$cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . " connect succefull ! Group=" . $cmr->user["auth_group"]);
// =======================================================================



// =======================================================================
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
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// --------define next layout------
//    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->output[0] = "<p><b> " . $cmr->translate("change_user_success") . " </b><br /><br /><br />";
$cmr->output[0] .= "<b>" . $cmr->translate("old user: ") . "</b>" . $old_email . ";<br />";
$cmr->output[0] .= "<b>" . $cmr->translate("new user: ") . "</b>" . $new_email . ";<br />";
$cmr->output[0] .= "<br /> " . $cmr->translate("thanks") . "  --<br /></p>";
// ------------------------
// ------------------------
$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ":  " . $cmr->translate("change user") . " ";
$cmr->email["message"] = "user " . $cmr->translate("was changed by user") . "  : " . $old_email . "\n\n\n";
$cmr->email["message"] .= $cmr->translate("old user") . ":" . $old_email . "; \n";
$cmr->email["message"] .= $cmr->translate("new user") . ":" . $new_email . "; \n";
$cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

/* intestazioni addizionali */
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name") ." <".$cmr->config["cmr_from_email"] .">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"] ." <".$cmr->config["cmr_cc_email"] .">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $old_email . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . cmr_escape($id_user) . "' ,'change_user'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
