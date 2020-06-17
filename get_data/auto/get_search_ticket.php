<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_ticket.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_ticket.php, Ver 3.0, 2010-Sep-Mon 11:11:12
*/

/**
 * Information about
 * $cmr->post_var["sql_ticket"] and $cmr->post_var["sql"] Is used for keeping
 * the query string you will be run in the module view_search.php
 *
 * $cmr->post_var["search_text"] Is used for keeping
 * the string value off the text to search
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "ticket";
$array_func = array();

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $table_name . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_" . $table_name . $cmr->get_ext("conf"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_" . $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$post = new ticket_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_ticket.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_ticket.php]

	$array_func['number']= get_post('func_number', 'post'); //Getting variable [$array_func['number']] sended by form search_ticket.php]

	$array_func['lang']= get_post('func_lang', 'post'); //Getting variable [$array_func['lang']] sended by form search_ticket.php]

	$array_func['title']= get_post('func_title', 'post'); //Getting variable [$array_func['title']] sended by form search_ticket.php]

	$array_func['work_by']= get_post('func_work_by', 'post'); //Getting variable [$array_func['work_by']] sended by form search_ticket.php]

	$array_func['call_log_user']= get_post('func_call_log_user', 'post'); //Getting variable [$array_func['call_log_user']] sended by form search_ticket.php]

	$array_func['call_log_group']= get_post('func_call_log_group', 'post'); //Getting variable [$array_func['call_log_group']] sended by form search_ticket.php]

	$array_func['call_method']= get_post('func_call_method', 'post'); //Getting variable [$array_func['call_method']] sended by form search_ticket.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_ticket.php]

	$array_func['state_now']= get_post('func_state_now', 'post'); //Getting variable [$array_func['state_now']] sended by form search_ticket.php]

	$array_func['assign_to']= get_post('func_assign_to', 'post'); //Getting variable [$array_func['assign_to']] sended by form search_ticket.php]

	$array_func['list_user_impact']= get_post('func_list_user_impact', 'post'); //Getting variable [$array_func['list_user_impact']] sended by form search_ticket.php]

	$array_func['list_group_impact']= get_post('func_list_group_impact', 'post'); //Getting variable [$array_func['list_group_impact']] sended by form search_ticket.php]

	$array_func['list_asset_impact']= get_post('func_list_asset_impact', 'post'); //Getting variable [$array_func['list_asset_impact']] sended by form search_ticket.php]

	$array_func['severity']= get_post('func_severity', 'post'); //Getting variable [$array_func['severity']] sended by form search_ticket.php]

	$array_func['sla']= get_post('func_sla', 'post'); //Getting variable [$array_func['sla']] sended by form search_ticket.php]

	$array_func['mail_title']= get_post('func_mail_title', 'post'); //Getting variable [$array_func['mail_title']] sended by form search_ticket.php]

	$array_func['mail_from']= get_post('func_mail_from', 'post'); //Getting variable [$array_func['mail_from']] sended by form search_ticket.php]

	$array_func['mail_to']= get_post('func_mail_to', 'post'); //Getting variable [$array_func['mail_to']] sended by form search_ticket.php]

	$array_func['mail_cc']= get_post('func_mail_cc', 'post'); //Getting variable [$array_func['mail_cc']] sended by form search_ticket.php]

	$array_func['mail_bcc']= get_post('func_mail_bcc', 'post'); //Getting variable [$array_func['mail_bcc']] sended by form search_ticket.php]

	$array_func['attach']= get_post('func_attach', 'post'); //Getting variable [$array_func['attach']] sended by form search_ticket.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_ticket.php]

	$array_func['text']= get_post('func_text', 'post'); //Getting variable [$array_func['text']] sended by form search_ticket.php]

	$array_func['mail_text']= get_post('func_mail_text', 'post'); //Getting variable [$array_func['mail_text']] sended by form search_ticket.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_ticket.php]

	$array_func['comment']= get_post('func_comment', 'post'); //Getting variable [$array_func['comment']] sended by form search_ticket.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_ticket.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
