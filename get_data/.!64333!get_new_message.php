<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_message.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_new_message.php,Ver 3.0  2011-Aug-Mon 12:39:21
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
// case "@_form_@"://When Working in data send by  form [new_message.php]
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "message" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_message" . $cmr->get_ext("conf"));
			
$cmr->action["module_name"] = "message.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$post = new message_class();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
////$post->set_cmr_email($cmr->get_user("auth_email"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);

// -----------------------------------------------------

// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_@_table_@.php]
// -----------------------------------------------------


$post->sender = $cmr->get_user("auth_email");
$post->intervale = get_post("intervale"); //Getting variable [$post->intervale] sended by form [message]
$intervale_type = get_post("intervale_type"); //Getting variable [$intervale_type] sended by form [message]
$action = get_post("action"); //Getting variable [$action] sended by form [message]
$id_message = get_post("id_message"); //Getting variable [$model_id] sended by form [message]
$model_id = get_post("model_id"); //Getting variable [$model_id] sended by form [message]
$alt_text = get_post("alt_text"); //Getting variable [$intervale_type] sended by form [message]
$post->comment = get_post("comment");

if(get_post("text")){
    @ $post->text = get_post("text");
}else{
    @ $post->text = get_post("alt_text");
}

$post->intervale = $post->intervale . " " . $intervale_type;
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if(!empty($post->sender)){
	$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $post->sender);
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($user_uid) . "/attach/";
	}else{
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower($cmr->get_user("auth_group")) . "/attach/";
	}
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
	if(!empty($cmr->post_files["attachment"])) $post->attach = $cmr->post_files["attachment"];
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// =============================================
$cmr_hostname = $cmr->get_conf("db_host");
$cmr_database = $cmr->get_conf("db_name");
$cmr_username = $cmr->get_conf("db_user");
$cmr_password = $cmr->get_conf("db_pw");
$cmr_user = $cmr->get_user("auth_email");
$cmr_group = $cmr->get_user("auth_group");
$cmr_prefix = $cmr->get_conf("cmr_table_prefix");
// =============================================






if(($action != "new_model") && ($action != "update_model")){
    $post->title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->title);


    $post->comment = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->comment);
    $post->text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->text);


    
    
