<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_validation.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_validation.php,Ver 3.0  2011-Sep 17:42:03  
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
// case "validation"://When Working in data send by  form [validation.php]
			// -----------------------------------------------------
			$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "user.php");
			$cmr->config = $mod->load_conf("conf_validation.php");
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
			$cmr->user["auth_email"] = "guest@localhost";
			$cmr->user["auth_group"] = "guest";
			$cmr->user["auth_list_group"] = "guest";
			$cmr->user["auth_type"] = "1_guest";
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
			
			// -----------------------------------------------------
			if(get_post("uid")){
				$user_data= get_post("uid");
				$post->set_uid(get_post("uid")); //Getting variable [$post->uid] sended by form [validation.php]
				$code = get_post("code1"); //Getting variable [$post->name] sended by form [validation.php]
				$id = return_key($cmr->db_connection, $cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", get_post("uid"));
				$pw = return_key($cmr->db_connection, $cmr->get_conf("cmr_table_prefix") . "user", "uid", "pw", get_post("uid"));
				
				
				
				
			}elseif(get_post("email")){
				$user_data= get_post("email");
				$code = get_post('code2'); //Getting variable [$post->name] sended by form [validation.php]
				$id = return_key($cmr->db_connection, $cmr->get_conf("cmr_table_prefix") . "user", "email", "id", get_post("email"));
				$pw = return_key($cmr->db_connection, $cmr->get_conf("cmr_table_prefix") . "user", "email", "pw", get_post("email"));
				$post->set_email(get_post("email", "post")); //Getting variable [$post->email] sended by form [validation.php]
			}
			// -----------------------------------------------------
			
			// -----------------------------------------------------
			if(($code==md5("cmr_".$pw))&&(!empty($id))){
			    $post->set_state('active'); //Getting variable [$post->state] sended by form [validation.php]
				$post->set_id($id); //Getting variable [$post->id] sended by form [validation.php]
				$cmr->query[0]  = $post->query_update();
	    		$cmr->db["result"][0] = &$cmr->db_connection->Execute($cmr->query[0]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg()); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
			 $cmr->prints["match_title1"] .=$cmr->translate("Account activated for (") . $user_data . ")";
			}else{
			 $cmr->prints["match_title1"] .=$cmr->translate("Account not activated for (") . $user_data . ")";
			}
			// -----------------------------------------------------
			
			// -----------------------------------------------------
			/*
			Creating the appropriate notification Message to be send to the administrator group
			*/
			$cmr->email = array();
			$cmr->output[0]="";
			$cmr->output[1]="";
			
			$file_list = array();
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/notify_validation" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify") . "templates/notify/" . $cmr->get_page("language") . "/auto/notify_validation" . $cmr->get_ext("notify"); 
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/notify_validation" . $cmr->get_ext("notify");
			$file_list[] = $cmr->get_path("notify")  ."templates/notify/auto/notify_validation" . $cmr->get_ext("notify");
			$templates_notify=cmr_good_file($file_list);
			$cmr->notify = $cmr->load_notify($templates_notify);
			if(($cmr->get_conf("log_to_page_validation"))) $cmr->output[0] = $cmr->notify["to_page"];
			if(($cmr->get_conf("log_to_log_validation"))) $cmr->output[1] = $cmr->notify["to_log"];
			if(($cmr->get_conf("log_to_email_validation"))) $cmr->email = $cmr->notify["to_email"];
			if(($cmr->get_conf("log_to_db_validation")));
			// if(($cmr->get_conf("log_to_sms_validation")));
			// if(($cmr->get_conf("log_to_flux_validation")));
			// if(($cmr->get_conf("log_to_rss_validation")));
			// if(($cmr->get_conf("log_to_other_validation")));
			// -----------------------------------------------------
			
			// -----------------------------------------------------
        include($cmr->get_path("index") . "email.php");
			// -----------------------------------------------------
			
			// -----------------------------------------------------
    		$cmr->prints["match_title2"] .="<pre>" . html_control(wordwrap(substr($cmr->output[0], 0, 10000), 100, "<br />\n")) . "</pre>";
	        $cmr->event_log("Script=" . __FILE__ . " :  " . substr($cmr->output[1], 0, 80));
			// -----------------------------------------------------
			

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $user_data . "' ,'validation'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
