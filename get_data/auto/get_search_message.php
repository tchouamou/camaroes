<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_message.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_message.php, Ver 3.0, 2010-Sep-Mon 11:06:22
*/

/**
 * Information about
 * $cmr->post_var["sql_message"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "message";
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
$post = new message_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_message.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_message.php]

	$array_func['sender']= get_post('func_sender', 'post'); //Getting variable [$array_func['sender']] sended by form search_message.php]

	$array_func['title']= get_post('func_title', 'post'); //Getting variable [$array_func['title']] sended by form search_message.php]

	$array_func['attach']= get_post('func_attach', 'post'); //Getting variable [$array_func['attach']] sended by form search_message.php]

	$array_func['text']= get_post('func_text', 'post'); //Getting variable [$array_func['text']] sended by form search_message.php]

	$array_func['groups_dest']= get_post('func_groups_dest', 'post'); //Getting variable [$array_func['groups_dest']] sended by form search_message.php]

	$array_func['users_dest']= get_post('func_users_dest', 'post'); //Getting variable [$array_func['users_dest']] sended by form search_message.php]

	$array_func['modules_dest']= get_post('func_modules_dest', 'post'); //Getting variable [$array_func['modules_dest']] sended by form search_message.php]

	$array_func['mail_to']= get_post('func_mail_to', 'post'); //Getting variable [$array_func['mail_to']] sended by form search_message.php]

	$array_func['mail_cc']= get_post('func_mail_cc', 'post'); //Getting variable [$array_func['mail_cc']] sended by form search_message.php]

	$array_func['mail_bcc']= get_post('func_mail_bcc', 'post'); //Getting variable [$array_func['mail_bcc']] sended by form search_message.php]

	$array_func['begin_time']= get_post('func_begin_time', 'post'); //Getting variable [$array_func['begin_time']] sended by form search_message.php]

	$array_func['end_time']= get_post('func_end_time', 'post'); //Getting variable [$array_func['end_time']] sended by form search_message.php]

	$array_func['intervale']= get_post('func_intervale', 'post'); //Getting variable [$array_func['intervale']] sended by form search_message.php]

	$array_func['priority']= get_post('func_priority', 'post'); //Getting variable [$array_func['priority']] sended by form search_message.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_message.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_message.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_message.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_message.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
