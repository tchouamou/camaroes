<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_inscription.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_inscription.php,Ver 3.0  2011-Sep 17:42:03  
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
// case "inscription"://When Working in data send by  form [inscription.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "user.php");
			$cmr->config = $mod->load_conf("conf_inscription.php");
			$cmr->help = $mod->load_help("user.php");
			
			$cmr->action["module_name"] = "user.php";
			$cmr->action["to_load"] = "load_func_need";
			include($cmr->get_path("index") . "system/loader/loader_function.php");
			$cmr->action["to_load"] = "load_class_need";
			include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        include_once($cmr->get_path("index") . "adodb/adodb.inc.php");
        $cmr->db_connection = $cmr->connect();//or $cmr->config["cmr_guest_mode"] = 0; //-----database connection------
        $cmr->db_connection = $cmr->db_connection;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			
			$cmr->user["auth_email"] = "guest";
			$cmr->user["auth_group"] = "guest";
			$cmr->user["auth_type"] = "1";
			$cmr->user["auth_list_group"] = "guest";
			$cmr->user["authorisation"] = "1";
			// -----------------------------------------------------
			$post = new user_class();
			
			
			////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
			////$post->set_cmr_email($cmr->get_user("auth_email"));
			////$post->set_cmr_group($cmr->get_user("auth_group"));
			////$post->set_cmr_type($cmr->get_user("auth_type"));
			////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));
			
			////$post->set_cmr_config($cmr->config);
			////$post->set_cmr_user($cmr->user);
			// -----------------------------------------------------
			
    //######################################################
	// ----------------------------
	$post->type = "0_guest";
	$post->email = trim($post->email);
	$post->uid = trim($post->uid);
	if(((strlen($post->email)) < 3)) $post->email = $post->uid . "_mail@localhost";
	if(((strlen($post->uid)) < 1)) $post->uid = substr($post->email, 0, strpos($post->email, "@"));
	if(((strlen($post->name)) < 1)) $post->name = $post->uid;
	$post->comment = stripslashes($post->comment);
	$post->comment = addslashes($post->comment);
	// ----------------------------
	// -----------------------------------------------------
	$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [inscription.php]
    $post->home=create_account_folder($cmr->config, "user", $post->uid);
    //######################################################
		
		// -----------------------------------------------------
		$post->set_state("locked"); //Getting variable [$post->state] sended by form [inscription.php]
		$pw=md5(get_post("pw", "post"));
		$post->set_pw($pw); //Getting variable [$post->pw] sended by form [inscription.php]
		$code = md5("cmr_".$pw);
		// -----------------------------------------------------
		
		// -----------------------------------------------------
		/*
		Creating the appropriate SQL string for  new_in user
		*/
		// -----------------------------------------------------
		
		// -----------------------------------------------------
		$cmr->query[0] = $post->query_insert();
		$cmr->db["result"][0] = &$cmr->db_connection->Execute($cmr->query[0]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg()); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
		$cmr->prints["title2"] .=$cmr->translate("End inscription ");
        // ================================================
        $cmr->email["headers_from"] =  $cmr->config["cmr_from_email"];
        $cmr->email["headers_to"] = $post->email;
        $cmr->email["headers_cc"] = "";
        $cmr->email["headers_bcc"] = "";
        $cmr->post_files["files_path"] = "";
        // ----------------------------
        $cmr->email["recipient"] = "" . $cmr->config["cmr_from_email"] . "";
        $cmr->email["subject"] = "" . $cmr->translate("uid and password sended to you") . "";
        
        $cmr->email["message"] = "" . $cmr->translate("Like requested uid and new password  was sended to user ") . " :\n\nemail :" . $post->email . " \n";
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
			
			/*
			Creating the appropriate notification Message to be send to the administrator group
			*/
			$file_list = array();
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_inscription1" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_inscription1" . $cmr->get_ext("notify"); 
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/notify_inscription1" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_inscription1" . $cmr->get_ext("notify");
			$templates_notify=cmr_good_file($file_list);
			if(($cmr->get_conf("log_to_page_inscription"))) $cmr->output[0] = $cmr->notify["to_page"];
			if(($cmr->get_conf("log_to_log_inscription"))) $cmr->output[1] = $cmr->notify["to_log"];
			if(($cmr->get_conf("log_to_email_inscription"))) $cmr->email = $cmr->notify["to_email"];
			if(($cmr->get_conf("log_to_db_inscription")));
			// if(($cmr->get_conf("log_to_sms_inscription")));
			// if(($cmr->get_conf("log_to_flux_inscription")));
			// if(($cmr->get_conf("log_to_rss_inscription")));
			// if(($cmr->get_conf("log_to_other_inscription")));
			// -----------------------------------------------------
			
			// -----------------------------------------------------
  			// -----------------------------------------------------
        include($cmr->get_path("index") . "email.php");
			// -----------------------------------------------------
			
			// -----------------------------------------------------
			$file_list = array();
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_inscription2" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_inscription2" . $cmr->get_ext("notify"); 
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/notify_inscription2" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_inscription2" . $cmr->get_ext("notify");
			$templates_notify=cmr_good_file($file_list);
			$cmr->notify = $cmr->load_notify($templates_notify);
			if(($cmr->get_conf("log_to_page_inscription"))) $cmr->output[0] = $cmr->notify["to_page"];
			if(($cmr->get_conf("log_to_log_inscription"))) $cmr->output[1] = $cmr->notify["to_log"];
			if(($cmr->get_conf("log_to_email_inscription"))) $cmr->email = $cmr->notify["to_email"];
			if(($cmr->get_conf("log_to_db_inscription")));
			// if(($cmr->get_conf("log_to_sms_inscription")));
			// if(($cmr->get_conf("log_to_flux_inscription")));
			// if(($cmr->get_conf("log_to_rss_inscription")));
			// if(($cmr->get_conf("log_to_other_inscription")));
			// -----------------------------------------------------
			
			// -----------------------------------------------------
        include($cmr->get_path("index") . "email.php");
			// -----------------------------------------------------
			
			// -----------------------------------------------------
    		$cmr->prints["title2"] .="<pre>" . html_control(wordwrap(substr($cmr->output[0], 0, 10000), 100, "<br />\n")) . "</pre>";
			// -----------------------------------------------------
			
			// -----------------------------------------------------
	        $cmr->event_log("Script=" . __FILE__ . " :  " . substr($cmr->output[1], 0, 80));
			// -----------------------------------------------------
			
			// -----------------------------------------------------

			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $post->email . "' ,'inscription'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>