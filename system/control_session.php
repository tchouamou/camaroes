<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * control_session.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























control_session.php,  2011-Oct
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!          /*==================*/
// control current session
// if(empty($cmr->user)||empty($cmr->session))
if(empty($cmr->user)){
// 	print_r($cmr);
	    $cmr->event["id"] = "11";
	    $cmr->event["name"] = "wrong_account_object";
	    $cmr->event["line"]=__LINE__;
	    $cmr->event["script"]=__FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = "Wrong Account object, the session  or the user object is empty !!? (control session.cache_limiter, session.cache_expire) ";
	    $cmr->run_event();
	
	}
        // ------------------------------------------

        // ------------------------------------------
$session_id = session_id();
if((($cmr->get_session("id"))) && (($cmr->get_session("id")) != (session_id()))){
	    $cmr->event["id"] = "11";
	    $cmr->event["name"] = "wrong_sessionid";
	    $cmr->event["line"]=__LINE__;
	    $cmr->event["script"]=__FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = "Wrong session id:".$cmr->get_session("id").", The good one is:".session_id();
	    $cmr->run_event();
// (($cmr->session["cmr_id"] .=session_id())
//     $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "1", "No session, Login before");
// 	die("No session, bad session id, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
}
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
    $sessionid = session_id();
    $user_email = $cmr->get_user("auth_email");
    $status = "connect";
    $state = "enable";
    $sessionip = $_SERVER['REMOTE_ADDR'];
    $time_out = $cmr->get_conf("cmr_session_time_out");
        // ------------------------------------------
	    // ------------ Control if valid session---------
        // ------------------------------------------
    $sql_session = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "session WHERE ((sessionid =  '" . session_id() . "') ";
    $sql_session .= " AND ( sessionip  =  '" . $sessionip . "') AND ( user_email  =  '" . $cmr->get_user("auth_email") . "') ";
    $sql_session .= " AND ( status  =  '" . $status . "') AND ( state  =  '" . $state . "') ";
//     $sql_session .= " and ((curdate() <= session_end) or (session_end <= '2000-01-01 01:01:01'))";
    $sql_session .= ") ";
   // $sql_session .= " LIMIT 1;";
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
    $result_session = &$cmr->db_connection->Execute($sql_session) /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
    if($result_session) $obj_session = $result_session->FetchNextObject(false);
    
	if($obj_session)
    if(!(((isset($obj_session)) && ($obj_session->sessionid)) || (get_post('cmr_sid', 'get')==session_id()))){
	    $cmr->event["id"] = "12";
	    $cmr->event["name"] = "not_allow_session";
	    $cmr->event["line"]=__LINE__;
	    $cmr->event["script"]=__FILE__;
	    $cmr->event["data"] = "?cmr_mode=login&force_login=yes";
	    $cmr->event["comment"] = "No allow session[" . session_id() . "] find for User [". $cmr->get_user("auth_email")."]";
	    $cmr->run_event();
//         $cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "No active session find id=$session_id" . "->" . $obj_session->sessionid);
//         cmr_header("Location: " . $cmr->get_path("index") . "index.php?cmr_mode=login");
//         die("No active session find id=$session_id" . "->" . $obj_session->sessionid."  click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
    }else{
		$cmr->session["cmr_id"] = session_id();
//     // *************************
//     $sql_session = "update " . $cmr->get_conf("cmr_table_prefix") . "session  set  , status='connect' , state='enable',   time_out='$time_out' ,  session_end=NOW()
//     $sql_session .= " WHERE    sessionid= '$sessionid' and  sessionip= '$sessionip' and   user_email= '$user_email';";
//     &$cmr->db_connection->Execute($sql_session) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//     // *************************
 	    }
// ======================================================================
// $cmr->debug_print();exit;
// ======================================================================
// ======================================================================
?>
