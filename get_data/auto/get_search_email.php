<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_email.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_email.php, Ver 3.0, 2010-Sep-Mon 11:03:37
*/

/**
 * Information about
 * $cmr->post_var["sql_email"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "email";
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
$post = new email_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_email.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_email.php]

	$array_func['encoding']= get_post('func_encoding', 'post'); //Getting variable [$array_func['encoding']] sended by form search_email.php]

	$array_func['lang']= get_post('func_lang', 'post'); //Getting variable [$array_func['lang']] sended by form search_email.php]

	$array_func['header']= get_post('func_header', 'post'); //Getting variable [$array_func['header']] sended by form search_email.php]

	$array_func['mail_title']= get_post('func_mail_title', 'post'); //Getting variable [$array_func['mail_title']] sended by form search_email.php]

	$array_func['mail_from']= get_post('func_mail_from', 'post'); //Getting variable [$array_func['mail_from']] sended by form search_email.php]

	$array_func['mail_to']= get_post('func_mail_to', 'post'); //Getting variable [$array_func['mail_to']] sended by form search_email.php]

	$array_func['mail_cc']= get_post('func_mail_cc', 'post'); //Getting variable [$array_func['mail_cc']] sended by form search_email.php]

	$array_func['mail_bcc']= get_post('func_mail_bcc', 'post'); //Getting variable [$array_func['mail_bcc']] sended by form search_email.php]

	$array_func['attach']= get_post('func_attach', 'post'); //Getting variable [$array_func['attach']] sended by form search_email.php]

	$array_func['text']= get_post('func_text', 'post'); //Getting variable [$array_func['text']] sended by form search_email.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_email.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_email.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
