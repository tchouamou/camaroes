<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_software.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_software.php, Ver 3.0, 2010-Sep-Mon 11:09:54
*/

/**
 * Information about
 * $cmr->post_var["sql_software"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "software";
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
$post = new software_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_software.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_software.php]

	$array_func['name']= get_post('func_name', 'post'); //Getting variable [$array_func['name']] sended by form search_software.php]

	$array_func['type']= get_post('func_type', 'post'); //Getting variable [$array_func['type']] sended by form search_software.php]

	$array_func['copyright']= get_post('func_copyright', 'post'); //Getting variable [$array_func['copyright']] sended by form search_software.php]

	$array_func['certificate']= get_post('func_certificate', 'post'); //Getting variable [$array_func['certificate']] sended by form search_software.php]

	$array_func['my_master']= get_post('func_my_master', 'post'); //Getting variable [$array_func['my_master']] sended by form search_software.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_software.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
