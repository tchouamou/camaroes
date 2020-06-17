<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_groups.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_groups.php, Ver 3.0, 2010-Sep-Mon 11:05:33
*/

/**
 * Information about
 * $cmr->post_var["sql_groups"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "groups";
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
$post = new groups_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_groups.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_groups.php]

	$array_func['name']= get_post('func_name', 'post'); //Getting variable [$array_func['name']] sended by form search_groups.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_groups.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_groups.php]

	$array_func['location']= get_post('func_location', 'post'); //Getting variable [$array_func['location']] sended by form search_groups.php]

	$array_func['sla']= get_post('func_sla', 'post'); //Getting variable [$array_func['sla']] sended by form search_groups.php]

	$array_func['public_key']= get_post('func_public_key', 'post'); //Getting variable [$array_func['public_key']] sended by form search_groups.php]

	$array_func['private_key']= get_post('func_private_key', 'post'); //Getting variable [$array_func['private_key']] sended by form search_groups.php]

	$array_func['pass_phrase']= get_post('func_pass_phrase', 'post'); //Getting variable [$array_func['pass_phrase']] sended by form search_groups.php]

	$array_func['email_sign']= get_post('func_email_sign', 'post'); //Getting variable [$array_func['email_sign']] sended by form search_groups.php]

	$array_func['group_email']= get_post('func_group_email', 'post'); //Getting variable [$array_func['group_email']] sended by form search_groups.php]

	$array_func['admin_email']= get_post('func_admin_email', 'post'); //Getting variable [$array_func['admin_email']] sended by form search_groups.php]

	$array_func['home']= get_post('func_home', 'post'); //Getting variable [$array_func['home']] sended by form search_groups.php]

	$array_func['notify']= get_post('func_notify', 'post'); //Getting variable [$array_func['notify']] sended by form search_groups.php]

	$array_func['web_site']= get_post('func_web_site', 'post'); //Getting variable [$array_func['web_site']] sended by form search_groups.php]

	$array_func['login_script']= get_post('func_login_script', 'post'); //Getting variable [$array_func['login_script']] sended by form search_groups.php]

	$array_func['adress']= get_post('func_adress', 'post'); //Getting variable [$array_func['adress']] sended by form search_groups.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_groups.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_groups.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
