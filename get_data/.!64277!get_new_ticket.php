<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



get_new_ticket.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "new_ticket"://When Working in data send by form [Ticket]
// -----------------------------------------------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_ticket" . $cmr->get_ext("conf"));
			
// -----------------------------------------------------
$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");

// -----------------------------------------------------
$post = new ticket_class();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
////$post->set_cmr_email($cmr->get_user("auth_email"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);

// -----------------------------------------------------

// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [new_ticket.php]
// -----------------------------------------------------



// -----------------------------------------------------
	$model_id = get_post("model_id"); //Getting variable [$model_id] sended by form [ticket]
	$post->state_now = get_post("state"); //Getting variable [$post->state_now] sended by form [ticket]
	$action = get_post("action"); //Getting variable [$action] sended by form [ticket]
// 	$intervale = get_post("intervale"); //Getting variable [$intervale] sended by form [ticket]
// 	$intervale_type = get_post("intervale_type"); //Getting variable [$intervale_type] sended by form [ticket]
	$alt_text = get_post("alt_text"); //Getting variable [$intervale_type] sended by form [ticket]
// -----------------------------------------------------

	$post->work_by = $cmr->get_user("auth_email");
	
	if(get_post("text")){
	    @ $post->text = get_post("text");
	}else{
	    @ $post->text = get_post("alt_text");
	}
	
// 	$intervale = $intervale . " " . $intervale_type;
// 	$post->sla = $intervale . " " . $intervale_type;
// *************************
// *************************
	if(!empty($post->call_log_user)){
	$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $post->call_log_user);
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($user_uid) . "/attach/";
	}
	
	if(!empty($post->call_log_group))
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower(get_post("call_log_group")) . "/attach/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
	if(!empty($cmr->post_files["attachment"])) $post->attach = $cmr->post_files["attachment"];
// *************************
// *************************
// $action= get_post("action");


// =============================================
	$cmr_hostname = $cmr->get_conf("db_host");
	$cmr_database = $cmr->get_conf("db_name");
	$cmr_username = $cmr->get_conf("db_user");
	$cmr_password = $cmr->get_conf("db_pw");
	$cmr_user = $cmr->get_user("auth_email");
	$cmr_group = $cmr->get_user("auth_group");
	$cmr_prefix = $cmr->get_conf("cmr_table_prefix");
// =============================================



// -----------------------------------------------------
if(($action != "new_model") && ($action != "update_model")){
    $post->title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->title);

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if(empty($post->mail_title)) $post->mail_title .= "[{{ticket_number}}] {{ticket_title}}";
	if(empty($post->mail_text)) $post->mail_text .= "\n-------------[{{date_time}}]-------------\n  {{ticket_text}} \n {{groups_email_sign}} \n";
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $post->mail_title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_title);
    $post->mail_title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_title);

    $post->comment = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->comment);
    $post->text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->text);

    $post->mail_text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_text);
    $post->mail_text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_text);
// echo "\$post->title : $post->title<hr />";
// echo "\$post->mail_title : $post->mail_title<hr />";
// echo "\$post->comment : $post->comment<hr />";
// echo "\$post->text : $post->text<hr />";
// echo "\$post->mail_text : $post->mail_text<hr />";
// exit;
    if($post->mail_text == "") $post->mail_text = $post->text; // to do not send email empty ticket
    if($post->mail_title == "") $post->mail_title = $post->title; // to do not send email title empty
    // ----calcolo del numero ticket--------
