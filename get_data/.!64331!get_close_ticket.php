<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_close_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_close_ticket.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "close_ticket":
// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_ticket" . $cmr->get_ext("conf"));
$cmr->help = $cmr->load_help_need("ticket" . $cmr->get_ext("help"));
			
$cmr->action["module_name"] = "ticket.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------            

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
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [close_ticket.php]
// -----------------------------------------------------




$id_ticket = get_post("id_ticket"); //Getting variable [$id_ticket] sended by form [ticket]
$model_id = get_post("model_id"); //Getting variable [$model_id] sended by form [ticket]
$post->state_now = get_post("state"); //Getting variable [$post->state_now] sended by form [ticket]
$action = get_post("action"); //Getting variable [$action] sended by form [ticket]
// $intervale = get_post("intervale"); //Getting variable [$intervale] sended by form [ticket]
// $intervale_type = get_post("intervale_type"); //Getting variable [$intervale_type] sended by form [ticket]
$alt_text = get_post("alt_text"); //Getting variable [$intervale_type] sended by form [ticket]




// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id_ticket; // for close ticket
// -----------------------------------------------------

if(get_post("text")){
    @ $post->text = get_post("text");
}else{
    @ $post->text = get_post("alt_text");
}







// $intervale = $intervale . " " . $intervale_type;
// $post->sla = $intervale . " " . $intervale_type;
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




