<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_forget_account.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_forget_account.php,Ver 3.0  2011-Sep 17:42:03  
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
// case "forget_account"://When Working in data send by  form [forget_account.php]
    // -----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
        $cmr->db_connection = $cmr->connect();//or $cmr->config["cmr_guest_mode"] = 0; //-----database connection------
        $cmr->db_connection = $cmr->db_connection;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // -----------
    $email1 = get_post("email1"); 
    $email2 = get_post("email2"); 
    // -----------
    if($email1 != $email2){
        $cmr->prints["match_title2"] .= "<hr />" . $cmr->translate("Insert the same email") . "!!" . $cmr->translate("o contattare ") . " " . $cmr->get_conf("cmr_company_name");
        $cmr->prints["match_title2"] .= " ". $cmr->translate("to receive a valid email") . " ";
        $cmr->prints["match_title2"] .= "<br /><br />";
        $cmr->prints["match_title2"] .= "<br /><hr />";
    }
    // -----------
    // -----------
    $sql_f = "SELECT uid , pw FROM " . $cmr->get_conf("cmr_table_prefix") . "user WHERE email = '" . cmr_escape($email1) . "'  ;";
    $result_f = &$cmr->db_connection->query($sql_f, $cmr->db_connection) or print($cmr->db_connection->ErrorMsg());
    // -----------
    if(!($vf = $result_f->FetchRow())){
        $cmr->prints["match_title2"] .= "<hr />" . $cmr->translate("Email unknown contact") . " " . $cmr->get_conf("cmr_company_name");
        $cmr->prints["match_title2"] .= " " . $cmr->translate("to receive a valid") . "";
        $cmr->prints["match_title2"] .= "<br />   <br />";
        $cmr->prints["match_title2"] .= "" . $cmr->translate("or to request an demo account") . "";
        $cmr->prints["match_title2"] .= "<br /><hr />";
    }else{	
        // -----------
        $cmr->connect();
        $new_pw = substr(md5(strval(rand()) . date('h-i-s, j-m-y, it is w Day z ')), 2, 6);
        $tmp_pw = pw_encode($new_pw);
        // -----------
        $query = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "user ";
        $query .= " SET " . $cmr->get_conf("cmr_table_prefix") . "user.pw='" . $tmp_pw . "' ";
        $query .= " WHERE (" . $cmr->get_conf("cmr_table_prefix") . "user.email='" . cmr_escape($email1) . "') ";

                // -----------
        $sql_tmp = &$cmr->db_connection->query($query, $cmr->db_connection) or print($cmr->db_connection->ErrorMsg());
        // -----------
        $cmr->email["recipient"] = $email1;
        $cmr->email["subject"] = "" . $cmr->translate("user information sended") . "";
        
        $cmr->email["message"] = "" . $cmr->translate("") . "Su . \n\r" . $cmr->translate("It will be possible to change it after the login") . ".\n\r\n\r ";
        $cmr->email["message"] .= "User id :" . ($vf[0]) . ";\n\r";
        $cmr->email["message"] .= "password :" . $new_pw . ";\n\r";
        $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        // ----------------------------
        $cmr->email["message"] .= $cmr->get_conf("cmr_company_name") . "\r\n"; // dlimiteur de signature
        $cmr->email["headersbcc"] = "MIME-Version: 1.0\r\n";
        $cmr->email["headersbcc"] .= "Content-type: text/plain; charset=utf-8\r\n";
        /* intestazioni addizionali */
        $cmr->email["headersbcc"] .= "from: " . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
        // ================================================
// 			$file_list = array();
// 			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_forget_account" . $cmr->get_ext("notify");
// 			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_forget_account" . $cmr->get_ext("notify"); 
// 			$file_list[] = $cmr->get_path("notify")  ."templates/notify/notify_forget_account" . $cmr->get_ext("notify");
// 			$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_forget_account" . $cmr->get_ext("notify");
// 			$templates_notify=cmr_good_file($file_list);
// 			$cmr->notify = $cmr->load_notify($templates_notify);
// 			if(($cmr->get_conf("log_to_page_forget_account"))) $cmr->output[0] = $cmr->notify["to_page"];
// 			if(($cmr->get_conf("log_to_log_forget_account"))) $cmr->output[1] = $cmr->notify["to_log"];
// 			if(($cmr->get_conf("log_to_email_forget_account"))) $cmr->email = $cmr->notify["to_email"];
// 			if(($cmr->get_conf("log_to_db_forget_account")));
// 			// if(($cmr->get_conf("log_to_sms_forget_account")));
// 			// if(($cmr->get_conf("log_to_flux_forget_account")));
// 			// if(($cmr->get_conf("log_to_rss_forget_account")));
// 			// if(($cmr->get_conf("log_to_other_forget_account")));
        // ======================================================
        $cmr->email["headers_from"] = "";
        $cmr->email["headers_to"] = "";
        $cmr->email["headers_cc"] = "";
        $cmr->email["headers_bcc"] = "";
        $cmr->post_files["files_path"] = "";
        include($cmr->get_path("index") . "email.php");
        // ======================================================
        // ======================================================
//         @mail($cmr->email["recipient"], $cmr->email["subject"], $cmr->email["message"], $cmr->email["headersbcc"]);
        //  @mail ("tchouamou@gmail.com", $cmr->email["subject"], $cmr->email["message"], "tchouamou@gmail.com");
        // ======================================================
        // ======================================================
        // --------define next layout ----------
        // $cmr->page["middle1"] = "run_result.php";
        // ======================================================
        $cmr->prints["match_title2"] .= "<hr />" . $cmr->translate("your uid and password was sended to you like requested") . "<br /><hr />";
        // ----------------------------
        $cmr->email["recipient"] = "" . $cmr->config["cmr_from_email"] . "";
        $cmr->email["subject"] = "" . $cmr->translate("uid and password sended to you") . "";
        
        $cmr->email["message"] = "" . $cmr->translate("Like requested uid and new password  was sended to user ") . " :\n\nemail  : $email1 \n";
        $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        $cmr->email["message"] .= $cmr->get_conf("cmr_company_name") . "\r\n"; // dlimiteur de signature
        // ----------------------------
        $cmr->email["headersbcc"] = "MIME-Version: 1.0\r\n";
        $cmr->email["headersbcc"] .= "Content-type: text/plain; charset=utf-8\r\n";
        /* intestazioni addizionali */
        $cmr->email["headersbcc"] .= "To: Noc <" . $cmr->config["cmr_from_email"] . ">, " . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
        $cmr->email["headersbcc"] .= "from: " . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//         $cmr->email["headersbcc"] .= "Cc: " . $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
//         $cmr->email["headersbcc"] .= "Bcc:  " . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
        // ================================================
// 			$file_list = array();
// 			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_forget_account" . $cmr->get_ext("notify");
// 			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_forget_account" . $cmr->get_ext("notify"); 
// 			$file_list[] = $cmr->get_path("notify")  ."templates/notify/notify_forget_account" . $cmr->get_ext("notify");
// 			$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_forget_account" . $cmr->get_ext("notify");
// 			$templates_notify=cmr_good_file($file_list);
// 			$cmr->notify = $cmr->load_notify($templates_notify);
// 			if(($cmr->get_conf("log_to_page_forget_account"))) $cmr->output[0] = $cmr->notify["to_page"];
// 			if(($cmr->get_conf("log_to_log_forget_account"))) $cmr->output[1] = $cmr->notify["to_log"];
// 			if(($cmr->get_conf("log_to_email_forget_account"))) $cmr->email = $cmr->notify["to_email"];
// 			if(($cmr->get_conf("log_to_db_forget_account")));
// 			// if(($cmr->get_conf("log_to_sms_forget_account")));
// 			// if(($cmr->get_conf("log_to_flux_forget_account")));
// 			// if(($cmr->get_conf("log_to_rss_forget_account")));
// 			// if(($cmr->get_conf("log_to_other_forget_account")));
        // ======================================================
        // ======================================================
        include($cmr->get_path("index") . "email.php");
        // ======================================================
        // ======================================================
//     		$cmr->prints["match_title2"] .= "<pre>" . html_control(wordwrap(substr($cmr->output[0], 0, 10000), 100, "<br />\n")) . "</pre>";
// 	        $cmr->event_log("Script=" . __FILE__ . " :  " . substr($cmr->output[1], 0, 80));
        // ======================================================
//         @mail($cmr->email["recipient"], $cmr->email["subject"], $cmr->email["message"], $cmr->email["headersbcc"]) ;
    }
    // ================================================
    // ================================================;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $email1 . "' ,'forget_account'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
