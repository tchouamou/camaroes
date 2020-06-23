<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * control_login.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






control_login.php, Ver 3.03
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/../../control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $_SESSION = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->db["db_user"] = get_post("db_user");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->put_session(array(), "db");
$db_connect = NULL;
if(!empty($cmr->config["cmr_allow_db_login"]))
if(!empty($cmr->db["db_user"])){
	get_post("db_name") ? $cmr->db["db_name"] = get_post("db_name") : $cmr->db["db_name"] = $cmr->get_conf("db_name");
	get_post("db_type") ? $cmr->db["db_type"] = get_post("db_type") : $cmr->db["db_type"] = $cmr->get_conf("db_type");
	get_post("db_port") ? $cmr->db["db_port"] = get_post("db_port") : $cmr->db["db_port"] = $cmr->get_conf("db_port");
	get_post("db_host") ? $cmr->db["db_host"] = get_post("db_host") : $cmr->db["db_host"] = $cmr->get_conf("db_host");
	get_post("db_pw") ? $cmr->db["db_pw"] = get_post("db_pw") : $cmr->db["db_pw"] = $cmr->get_conf("db_pw");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//$db_connect = NewADOConnection($cmr->db["db_type"]);
	//$db_connect->mysqli($cmr->db["db_host"], $cmr->db["db_user"], $cmr->db["db_pw"], $cmr->db["db_name"]);
	$db_connect = $cmr->connect();
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->put_session($cmr->db, "db");// 	cmr_put_session($cmr->config, $cmr->db, "db");

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($db_connect)) $cmr->db_connection = $db_connect;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// ======================================================================


		// ======================================================================
    if((($cmr->get_conf("cmr_apache_auth")))){ // ---- APACHE METHOD --------
        $cmr->user["auth_user_send"] = $_SERVER["PHP_AUTH_USER"];
        $cmr->user["auth_pw_send"] = $_SERVER["PHP_AUTH_PW"];
        // die("Apache authentification good");
        // ======================authentificazione first=======================

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s') AND pw='%s');",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape(pw_encode($cmr->get_user("auth_pw_send"))));

        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
// ======================================================================
// ======================================================================
// ======================================================================
        if(!($user_object)){
	    $cmr->event["id"] = "18";
	    $cmr->event["name"] = "wrong_apache_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    $cmr->run_event();
//             $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User Not Find in Database");
//             cmr_header("Location: " . $cmr->get_path("index") . "index.php?cmr_mode=login");
// 		 	die("User $auth_uid Not Find in Database!, click <a href=\"http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?cmr_mode=login\" > Here </a>  to login before continue ");
        }
    }
// ======================================================================
// ======================================================================
// ======================================================================
    elseif((($cmr->get_conf("cmr_radius_auth")))){ // ---- RADIUS METHOD ----------
        $cmr->user["auth_user_send"] = cmr_remote_user();
        $cmr->user["auth_pw_send"] = "";
    }
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
    elseif((($cmr->get_conf("cmr_other_auth")))){ // ---- RADIUS METHOD ----------
        $cmr->user["auth_user_send"] = cmr_remote_user();
        $cmr->user["auth_pw_send"] = "";
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
    } elseif((($cmr->get_conf("cmr_url_auth")))){ // ---- URL METHOD ----------
        $cmr->user["auth_user_send"] = get_post("auth_user_send", "get");
        $cmr->user["auth_pw_send"] = get_post("auth_pw_send", "get");

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s') AND pw='%s');",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape(pw_encode($cmr->get_user("auth_pw_send"))));

//         $auth_uid = $cmr->get_user("auth_user_send");
//         $auth_pw=pw_encode($cmr->get_user("auth_pw_send"));
//      $cmr->query["login"] = "SELECT * from " . $cmr->get_conf("cmr_table_prefix") . "user where (uid='$auth_uid');"; //and (pw='$auth_pw')
        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
        if(!($user_object)) $cmr->user = cmr_load_session("user", $cmr->config);
        // ======================================================================
        if(!($user_object)){
	    $cmr->event["id"] = "17";
	    $cmr->event["name"] = "wrong_url_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes&auth_user_send=guest&auth_pw_send=guest";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    $cmr->run_event();
//             $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User $auth_uid  Not Find in Database");
// //             cmr_header("Location: " . $cmr->get_path("index") . "logout.php");
// 		 	die("User $auth_uid Not Find in Database!, click <a href=\"http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?cmr_mode=login\" > Here </a>  to login before continue ");
        }
        // ======================================================================
    }
// ======================================================================
// ======================================================================
    elseif((($cmr->get_conf("cmr_no_auth") || $cmr->get_conf("cmr_guest_mode") ))){ // ---- NOBODY METHOD ----------
        $cmr->user["auth_user_send"] = "guest";
        $cmr->user["auth_pw_send"] = "guest";

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")));

        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
//         // ======================================================================
        if(!($user_object)){
	    $cmr->event["id"] = "16";
	    $cmr->event["name"] = "wrong_guest_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    $cmr->run_event();
//       $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User $auth_uid  Not Find in Database");
// //             cmr_header("Location: " . $cmr->get_path("index") . "logout.php");
//       die("User $auth_uid Not Find in Database!, click <a href=\"http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?cmr_mode=login\" > Here </a>  to login before continue ");
        }
        // ======================================================================
    }
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
    elseif((($cmr->get_conf("cmr_ip_auth")))){ // ---- ip METHOD ----------
        $cmr->user["auth_user_send"] = $cmr->get_conf("cmr_auth_user");
        $cmr->user["auth_pw_send"] = "";

//         $auth_uid = $cmr->get_user("auth_user_send");
//         $auth_pw=pw_encode($cmr->get_user("auth_pw_send"));

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")));

        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
        // ======================================================================
        if(!($user_object)){
	    $cmr->event["id"] = "15";
	    $cmr->event["name"] = "wrong_ip_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    $cmr->run_event();
//       $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User $auth_uid Find in Database");
//       cmr_header("Location: " . $cmr->get_path("index") . "logout.php");
//       die("User $auth_uid Not Find in Database!, click <a href=\"http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?cmr_mode=login\" > Here </a>  to login before continue ");
        }
        // ======================================================================
    }
    // ======================================================================
    // ======================================================================
    // ======================================================================
    elseif((($cmr->get_conf("cmr_cookie_auth")))){ // ---- Cookie METHOD ----------
        $cmr->user["auth_user_send"] = $_COOKIE["auth_user_send"];
        $cmr->user["auth_pw_send"] = $_COOKIE["auth_pw_send"];

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s') AND pw='%s');",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape(pw_encode($cmr->get_user("auth_pw_send"))));

//         $auth_uid = $cmr->get_user("auth_user_send");
//         $auth_pw = pw_encode($cmr->get_user("auth_pw_send"));
//         $cmr->query["login"] = "SELECT * from " . $cmr->get_conf("cmr_table_prefix") . "user where (uid='$auth_uid') and (pw='$auth_pw');"; //and (pw='$auth_pw')
        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
        // ======================================================================
        if(!($user_object)){
	    $cmr->event["id"] = "14";
	    $cmr->event["name"] = "wrong_cookie_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    $cmr->run_event();
//             $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User $auth_uid Find in Database");
//             cmr_header("Location: " . $cmr->get_path("index") . "logout.php");
// 		 	   die("User $auth_uid Not Find in Database!, click <a href=\"http://" . $_SERVER["HTTP_HOST"] . $_SERVER["PHP_SELF"] . "?cmr_mode=login\" > Here </a>  to login before continue ");
        }
        // ======================================================================
    }
    // ======================================================================
    // ======================================================================
    else {
//         if((($cmr->get_conf("cmr_normal_auth")))&&($cmr->get_conf("cmr_normal_auth")))//-- HTML METHOD ---
        $cmr->user["auth_user_send"] = get_post("auth_user");
        $cmr->user["auth_pw_send"] = get_post("auth_pw");
        $cmr->user["auth_code_send"] = get_post("auth_code");
        $cmr->session["cmr_code"] = get_post("cmr_code");
        // ======================authentificazione first=======================
		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' OR email='%s') AND pw='%s');",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape(pw_encode($cmr->get_user("auth_pw_send"))));
        // ======================================================================

        // ======================================================================
        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
        if(!($user_object)) $cmr->user = cmr_load_session("user", $cmr->config);
        // ======================================================================
		if(empty($cmr->user["auth_user_send"]) && empty($cmr->user["auth_pw_send"]))
        if(($db_connect))
        if(!($user_object)){
	        $cmr->user["auth_user_send"] = "operator";
	        $cmr->user["auth_pw_send"] = "operator";

			$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
			cmr_escape($cmr->get_user("auth_user_send")),
			cmr_escape($cmr->get_user("auth_user_send")));

	        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
	        if($result_user) $user_object = $result_user->fetch_object();
		}
        // ======================================================================
      if((!($user_object)) || ((($cmr->get_conf("cmr_login_code")))&&($cmr->session["cmr_code"] =! pw_encode($cmr->get_user("auth_code_send")))))  {
	    $cmr->event["id"] = "13";
	    $cmr->event["name"] = "wrong_account";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes&login=1";
	    $cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
	    //$cmr->run_event();
        }
        // ======================================================================
    }

// ======================================================================
// ======================================================================
// ======================================================================

// ======================================================================
// ======================================================================
// ======================================================================
if(!($cmr->get_user("auth_user_send"))){
	    $cmr->event["id"] = "20";
	    $cmr->event["name"] = "empty_user";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes&login=1";
	    $cmr->event["comment"] = "Empty User Send";
	    $cmr->run_event();
//     $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User Not Send");
//     cmr_header("Location: " . $cmr->get_path("index") . "index.php?cmr_mode=login");
//     die("User Not Send");
};
// ======================authentificazione first=======================
// ======================authentificazione first=========================
// ======================authentificazione first=========================

$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
cmr_escape($cmr->get_user("auth_user_send")),
cmr_escape($cmr->get_user("auth_user_send")));

//and (pw='$auth_pw')
if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
if($result_user) $user_object = $result_user->fetch_object();
// ======================================================================
// ======================================================================
// =====================GOOD OR BAD AUTHENTIFICATION=====================
// ======================================================================
// ======================================================================
if(!($user_object)){
    if(((($cmr->get_conf("cmr_radius_auth")))) || (($cmr->get_conf("cmr_other_auth")))){
        // ---- RADIUS and OTHER METHOD ----------
	    $cmr->event["id"] = "21";
	    $cmr->event["name"] = "user_not_found";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = "User  [" . $cmr->get_user("auth_user_send") . "] Not Find in Database, using now [guest] account";
	    $cmr->run_event();
//         $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "User  [" . $cmr->get_user("auth_user_send") . "] Not Find in Database, using now [guest] account");

        $cmr->user["auth_user_send"] = "guest";
        $cmr->user["auth_pw_send"] = "guest";

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")));

        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
    }else {
	    $cmr->event["id"] = "22";
	    $cmr->event["name"] = "user_not_found";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes&login=1";
	    $cmr->event["comment"] = "User [" . $cmr->get_user("auth_user_send") . "] not found in Database";
	    $cmr->run_event();
    }
}else {
// ====================================================================


// ====================================================================
		if(((($user_object->state) != "enable") && (($user_object->state) != "active")) || !($user_object->email)){
		    $cmr->event["id"] = "23";
		    $cmr->event["name"] = "not_authorized";
		    $cmr->event["line"] = __LINE__;
		    $cmr->event["script"] = __FILE__;
		    $cmr->event["data"] = "?cmr_mode=login&force_login=yes&login=1";
		    $cmr->event["comment"] = "User [" . $user_object->email . "] find but Not Authorized";
		    $cmr->run_event();
		}

// ======================================================================
// ========================== GOOD LOGIN, CAN CONTINUE===================
// ======================================================================
	    $cmr->event["id"] = "24";
	    $cmr->event["name"] = "good_login";
	    $cmr->event["line"] = __LINE__;
	    $cmr->event["script"] = __FILE__;
	    $cmr->event["data"] = "";
	    $cmr->event["comment"] = "Good login, User [" . $cmr->get_user("auth_user_send") . "] found";
	    $cmr->run_event();
// ======================================================================
 }

 // ======================================================================
 // ======================================================================
$cmr->user["auth_mode"] = get_post("auth_mode");
// ======================================================================
switch($cmr->get_user("auth_mode")){

	case "read_only":
        $cmr->session["type"] = "read_only";
	break;

	case "demo":
	case "cmr_guest_mode":
        $cmr->user["auth_user_send"] = "demo";
        $cmr->user["auth_pw_send"] = "demo";

		$cmr->query["login"] = sprintf("SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE ((uid='%s' or email='%s'));",
		cmr_escape($cmr->get_user("auth_user_send")),
		cmr_escape($cmr->get_user("auth_user_send")));

        if($cmr->db_connection) $result_user = $cmr->db_connection->query($cmr->query["login"]);
        if($result_user) $user_object = $result_user->fetch_object();
	break;

	case "cert":
	break;

	case "normal":
	default:
	break;
	}
	// ======================================================================
	// ======================================================================

// print("no authentification, no load_user_data, session : $session_id");
// ---Not state of login --------
// *************************session *****************************
// ======================================================================
// ======================================================================
// if(((authorised) == ($cmr->get_user("authorised"))) and
// ((auth_email) == ($cmr->get_user("auth_email"))) and
// ((auth_group) == ($cmr->get_user("auth_group"))) and
// ((auth_list_group) == ($cmr->get_user("auth_list_group"))) and
// ((auth_path) == ($cmr->get_user("auth_path"))) and
// ((authorisation) == ($cmr->get_user("authorisation"))) and
// ((auth_state) == ($cmr->get_user("auth_state"))) and
// ((auth_group_type) == ($cmr->get_user("auth_group_type"))) and
// ((cmr_sid) == ($cmr->get_user("cmr_sid")))){
// }
// else{
// $cmr->event_log("Script=".__FILE__."  Line=".__LINE__." : "." trying to change session var !!!!, restoring normal var.  id=$session_id");
// };
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ---------- save password ----------
	$cookie_action = (get_post("save_cookies"));
	save_cookie_status($cmr->config, "save_cookies", $cookie_action);
	save_cookie_status($cmr->config, "auth_user", $cookie_action);
	save_cookie_status($cmr->config, "auth_pw", $cookie_action);
	save_cookie_status($cmr->config, "db_port", $cookie_action);
	save_cookie_status($cmr->config, "db_host", $cookie_action);
	save_cookie_status($cmr->config, "db_user", $cookie_action);
	save_cookie_status($cmr->config, "db_name", $cookie_action);
	save_cookie_status($cmr->config, "db_pw", $cookie_action);
	save_cookie_status($cmr->config, "cmr_lang", $cookie_action);
	save_cookie_status($cmr->config, "cmr_theme", $cookie_action);
	save_cookie_status($cmr->config, "login_to", $cookie_action);

// 	setcookie("auth_user", get_post("auth_user"), time()+intval($cookie_action));
// 	setcookie("auth_pw", get_post("auth_pw"), time()+intval($cookie_action));
// 	setcookie("db_port", get_post("db_port"), time()+intval($cookie_action));
// 	setcookie("db_host", get_post("db_host"), time()+intval($cookie_action));
// 	setcookie("db_user", get_post("db_user"), time()+intval($cookie_action));
// 	setcookie("db_name", get_post("db_name"), time()+intval($cookie_action));
// 	setcookie("db_pw", get_post("db_pw"), time()+intval($cookie_action));
// 	setcookie("cmr_lang", get_post("cmr_lang"), time()+intval($cookie_action));
// 	setcookie("cmr_theme", get_post("cmr_theme"), time()+intval($cookie_action));
// 	setcookie("login_to", get_post("login_to"), time()+intval($cookie_action));
// 	setcookie("save_cookies", get_post("save_cookies"), time()+intval($cookie_action));

// =======================================================================

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
