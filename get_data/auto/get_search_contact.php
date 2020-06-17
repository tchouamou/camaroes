<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_contact.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_contact.php, Ver 3.0, 2010-Sep-Mon 11:01:38
*/

/**
 * Information about
 * $cmr->post_var["sql_contact"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "contact";
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
$post = new contact_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_contact.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_contact.php]

	$array_func['uid']= get_post('func_uid', 'post'); //Getting variable [$array_func['uid']] sended by form search_contact.php]

	$array_func['name']= get_post('func_name', 'post'); //Getting variable [$array_func['name']] sended by form search_contact.php]

	$array_func['last_name']= get_post('func_last_name', 'post'); //Getting variable [$array_func['last_name']] sended by form search_contact.php]

	$array_func['sexe']= get_post('func_sexe', 'post'); //Getting variable [$array_func['sexe']] sended by form search_contact.php]

	$array_func['functio']= get_post('func_functio', 'post'); //Getting variable [$array_func['functio']] sended by form search_contact.php]

	$array_func['email']= get_post('func_email', 'post'); //Getting variable [$array_func['email']] sended by form search_contact.php]

	$array_func['email_sign']= get_post('func_email_sign', 'post'); //Getting variable [$array_func['email_sign']] sended by form search_contact.php]

	$array_func['tel']= get_post('func_tel', 'post'); //Getting variable [$array_func['tel']] sended by form search_contact.php]

	$array_func['cel']= get_post('func_cel', 'post'); //Getting variable [$array_func['cel']] sended by form search_contact.php]

	$array_func['adress']= get_post('func_adress', 'post'); //Getting variable [$array_func['adress']] sended by form search_contact.php]

	$array_func['location']= get_post('func_location', 'post'); //Getting variable [$array_func['location']] sended by form search_contact.php]

	$array_func['country']= get_post('func_country', 'post'); //Getting variable [$array_func['country']] sended by form search_contact.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_contact.php]

	$array_func['status']= get_post('func_status', 'post'); //Getting variable [$array_func['status']] sended by form search_contact.php]

	$array_func['lang']= get_post('func_lang', 'post'); //Getting variable [$array_func['lang']] sended by form search_contact.php]

	$array_func['style']= get_post('func_style', 'post'); //Getting variable [$array_func['style']] sended by form search_contact.php]

	$array_func['public_key']= get_post('func_public_key', 'post'); //Getting variable [$array_func['public_key']] sended by form search_contact.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_contact.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
