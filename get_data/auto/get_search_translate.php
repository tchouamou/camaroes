<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_translate.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_translate.php, Ver 3.0, 2010-Sep-Mon 11:11:37
*/

/**
 * Information about
 * $cmr->post_var["sql_translate"] and $cmr->post_var["sql"] Is used for keeping
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
$table_name = "translate";
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
$post = new translate_class($cmr->config, $cmr->user);
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_translate.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$array_func['id']= get_post('func_id', 'post'); //Getting variable [$array_func['id']] sended by form search_translate.php]

	$array_func['code']= get_post('func_code', 'post'); //Getting variable [$array_func['code']] sended by form search_translate.php]

	$array_func['language']= get_post('func_language', 'post'); //Getting variable [$array_func['language']] sended by form search_translate.php]

	$array_func['text']= get_post('func_text', 'post'); //Getting variable [$array_func['text']] sended by form search_translate.php]

	$array_func['translate_language']= get_post('func_translate_language', 'post'); //Getting variable [$array_func['translate_language']] sended by form search_translate.php]

	$array_func['translate_text']= get_post('func_translate_text', 'post'); //Getting variable [$array_func['translate_text']] sended by form search_translate.php]

	$array_func['date_time']= get_post('func_date_time', 'post'); //Getting variable [$array_func['date_time']] sended by form search_translate.php]

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("get_data") . "get_data/share/get_search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
