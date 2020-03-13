<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_asset.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_asset.php, Ver 3.0, 2010-Sep-Mon 10:59:14
*/

/**
 * Information about
 * $cmr->post_var["sql_asset"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "asset";
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
$post = new asset_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_asset.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_asset.php]

	$array_func['serial']= get_post('func_serial', 'post'); //Getting variable [$array_func['serial']] sended by form search_asset.php]

	$array_func['mac_adress']= get_post('func_mac_adress', 'post'); //Getting variable [$array_func['mac_adress']] sended by form search_asset.php]

	$array_func['name']= get_post('func_name', 'post'); //Getting variable [$array_func['name']] sended by form search_asset.php]

	$array_func['location']= get_post('func_location', 'post'); //Getting variable [$array_func['location']] sended by form search_asset.php]

	$array_func['ip']= get_post('func_ip', 'post'); //Getting variable [$array_func['ip']] sended by form search_asset.php]

	$array_func['nat_ip']= get_post('func_nat_ip', 'post'); //Getting variable [$array_func['nat_ip']] sended by form search_asset.php]

	$array_func['mask']= get_post('func_mask', 'post'); //Getting variable [$array_func['mask']] sended by form search_asset.php]

	$array_func['gateway']= get_post('func_gateway', 'post'); //Getting variable [$array_func['gateway']] sended by form search_asset.php]

	$array_func['dns1']= get_post('func_dns1', 'post'); //Getting variable [$array_func['dns1']] sended by form search_asset.php]

	$array_func['dns2']= get_post('func_dns2', 'post'); //Getting variable [$array_func['dns2']] sended by form search_asset.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_asset.php]

	$array_func['os']= get_post('func_os', 'post'); //Getting variable [$array_func['os']] sended by form search_asset.php]

	$array_func['state']= get_post('func_state', 'post'); //Getting variable [$array_func['state']] sended by form search_asset.php]

	$array_func['login_id']= get_post('func_login_id', 'post'); //Getting variable [$array_func['login_id']] sended by form search_asset.php]

	$array_func['login_pw']= get_post('func_login_pw', 'post'); //Getting variable [$array_func['login_pw']] sended by form search_asset.php]

	$array_func['check_command']= get_post('func_check_command', 'post'); //Getting variable [$array_func['check_command']] sended by form search_asset.php]

	$array_func['certificate']= get_post('func_certificate', 'post'); //Getting variable [$array_func['certificate']] sended by form search_asset.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_asset.php]

	$array_func['my_software']= get_post('func_my_software', 'post'); //Getting variable [$array_func['my_software']] sended by form search_asset.php]

	$array_func['my_service']= get_post('func_my_service', 'post'); //Getting variable [$array_func['my_service']] sended by form search_asset.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_asset.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>