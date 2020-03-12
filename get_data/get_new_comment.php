<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_comment.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_new_comment.php, Ver 3.03, 2011-Aug-Tue 14:19:39
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "comment" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_comment" . $cmr->get_ext("conf"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_comment.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$post = new comment_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [newcomment.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
Creating the appropriate SQL string for  new_in comment
$cmr->query[0] = "insert into " . $cmr->get_conf("cmr_table_prefix") . "comment  (  id,  sender,  title,  text,  state,  table_name,  line_id,  encoding,  language,  date_time) values (  '$post->id',   '$post->sender',   '$post->title',   '$post->text',   '$post->state',   '$post->table_name',   '$post->line_id',   '$post->encoding',   '$post->language',   '$post->date_time');";
*/
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($cmr->get_user("auth_uid")) . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query = array();
if(cmr_search(",", $post->line_id)){
	$array_id = explode(",", $post->line_id);
	foreach($array_id as $key => $value){
		$value = trim(str_replace("'", "", $value));
		if($value){
			$post->line_id = $value;
			$cmr->query[] = $post->query_insert();
		}
	}
}else{
	$cmr->query[0] = $post->query_insert();
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "comment', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
file_exists($cmr->config["notify_new_comment"]) ? $templates_notify = $cmr->config["notify_new_comment"] : $templates_notify = $cmr->good_file("notify",  "comment");
$cmr->notify = $cmr->load_notify($templates_notify, "comment", "action_new");
/*
Creating the appropriate Message to be view for confirmation 
*/
$cmr->output[0] = "<p><b>" . $cmr->translate("comment") . "  " . $cmr->translate("update_success") . "</b>";
$cmr->output[0] .= str_replace(":", "</b>:", str_replace("\\\n", "<br /><b>", $post->print_value()));
$cmr->output[0] .= $cmr->translate("thanks") . "  --<br /></p>";
// $cmr->output[0] = $cmr->notify["to_page"];
$cmr->output[1] = $cmr->notify["to_log"];


/*
Creating the appropriate notification Message to be send to the administrator group
*/
// $cmr->email = $cmr->notify["to_email"];
$cmr->email["subject"] = $cmr->get_conf("cmr_company_name3") . ":  ".$cmr->translate("new") . $cmr->translate("  comment");
$cmr->email["message"] = $cmr->translate("was create") . $cmr->translate("  comment by : ") . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= $cmr->translate("comment ") . "  " . $cmr->translate("update_success") . "";
$cmr->email["message"] .= $post->print_value();
$cmr->email["message"] .= $cmr->translate("thanks") . '  --</p>';

// $mod->sql_run($cmr->query, $cmr->output, $cmr->session, $cmr->db_connection);
// $mod->run_message($cmr->query, $cmr->db, $cmr->session, $cmr->output, $cmr->db_connection);
// $mod->output_text($cmr->output);
// $mod->action_run($cmr->output);
// $mod->action_include($cmr->query, $cmr->action);
// // $mod->send_email($cmr->email, $cmr->post_files);
// if((isset($cmr->email["subject"])) && (isset($cmr->email["message"]) && ($cmr->get_conf("cmr_use_email"))))
// include($cmr->get_path("index") . "system/generate/email.php");
// $mod->sincronise($cmr->query, $cmr->db, $cmr->db_connection);

$post->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
Select next module to be run
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>