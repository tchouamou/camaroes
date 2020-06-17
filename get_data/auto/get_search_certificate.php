<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_certificate.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_certificate.php, Ver 3.0, 2010-Sep-Mon 10:59:38
*/

/**
 * Information about
 * $cmr->post_var["sql_certificate"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "certificate";
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
$post = new certificate_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_certificate.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_certificate.php]

	$array_func['serial']= get_post('func_serial', 'post'); //Getting variable [$array_func['serial']] sended by form search_certificate.php]

	$array_func['user_email']= get_post('func_user_email', 'post'); //Getting variable [$array_func['user_email']] sended by form search_certificate.php]

	$array_func['version']= get_post('func_version', 'post'); //Getting variable [$array_func['version']] sended by form search_certificate.php]

	$array_func['to_cn']= get_post('func_to_cn', 'post'); //Getting variable [$array_func['to_cn']] sended by form search_certificate.php]

	$array_func['to_o']= get_post('func_to_o', 'post'); //Getting variable [$array_func['to_o']] sended by form search_certificate.php]

	$array_func['to_ou']= get_post('func_to_ou', 'post'); //Getting variable [$array_func['to_ou']] sended by form search_certificate.php]

	$array_func['from_cn']= get_post('func_from_cn', 'post'); //Getting variable [$array_func['from_cn']] sended by form search_certificate.php]

	$array_func['from_o']= get_post('func_from_o', 'post'); //Getting variable [$array_func['from_o']] sended by form search_certificate.php]

	$array_func['from_ou']= get_post('func_from_ou', 'post'); //Getting variable [$array_func['from_ou']] sended by form search_certificate.php]

	$array_func['valid_from']= get_post('func_valid_from', 'post'); //Getting variable [$array_func['valid_from']] sended by form search_certificate.php]

	$array_func['valid_to']= get_post('func_valid_to', 'post'); //Getting variable [$array_func['valid_to']] sended by form search_certificate.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_certificate.php]

	$array_func['cert_pkcs']= get_post('func_cert_pkcs', 'post'); //Getting variable [$array_func['cert_pkcs']] sended by form search_certificate.php]

	$array_func['pub_key_pkcs']= get_post('func_pub_key_pkcs', 'post'); //Getting variable [$array_func['pub_key_pkcs']] sended by form search_certificate.php]

	$array_func['status']= get_post('func_status', 'post'); //Getting variable [$array_func['status']] sended by form search_certificate.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_certificate.php]

	$array_func['login_script']= get_post('func_login_script', 'post'); //Getting variable [$array_func['login_script']] sended by form search_certificate.php]

	$array_func['public_key']= get_post('func_public_key', 'post'); //Getting variable [$array_func['public_key']] sended by form search_certificate.php]

	$array_func['private_key']= get_post('func_private_key', 'post'); //Getting variable [$array_func['private_key']] sended by form search_certificate.php]

	$array_func['pass_phrase']= get_post('func_pass_phrase', 'post'); //Getting variable [$array_func['pass_phrase']] sended by form search_certificate.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_certificate.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_certificate.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
