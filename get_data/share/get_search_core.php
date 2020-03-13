<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_core.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_search_core.php, Ver 3.03, 2011-08-22 18:00:00
*/

/**
 * Information about
 * $cmr->post_var["sql_@_table_@"] and $cmr->post_var["sql"] Is used for keeping
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
// $table_name = "@_table_@";

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $table_name . $cmr->get_ext("lang"));
// $cmr->config = $mod->load_conf("conf_" . $table_name . $cmr->get_ext("conf"));
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->action["to_load"] = "class_" . $table_name . ".php";
// include($cmr->get_path("index") . "system/loader/loader_class.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $post = new @_table_@_class($cmr->config, $cmr->user);
// $post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_core.php]
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// £_foreach_column_£
// 	$array_func['@_column_@']= get_post('func_@_column_@', 'post'); //Getting variable [$array_func['@_column_@']] sended by form search_core.php]
// ££_foreach_column_££

$cmr->post_var["sql_table"] = $table_name;
$cmr->post_var["search_text"] = "";

/**
*Creating the appropriate SQL string for  searching in @_table_@
**/
$cmr->post_var["sql_" . $table_name] = "";
$cmr->query[0] = (get_post("search_text")) ? $post->query_search($array_func, "OR"):$cmr->query[0]  = $post->query_search($array_func, "AND");


// $cmr->post_var["sql_" . $table_name] = $str_search;
$cmr->post_var["sql_" . $table_name] = $cmr->query[0];

$cmr->post_var["search_text"] .= $post->print_value();
// $cmr->post_var['search_text'] .= '<b>@_column_@</b>=' . $post->@_column_@ . '; ';
// £_foreach_column_
// ££_foreach_column_

$cmr->post_var["sql"] = $cmr->post_var["sql_" . $table_name];

/**
*Creating the appropriate notification Message to be send to the administrator group
**/
// $templates_notify = $cmr->good_file("notify",  $table_name);
// $cmr->notify = $cmr->load_notify($templates_notify, $table_name, "search");
// $cmr->notify = db_load_notify($cmr->config, $cmr->user, $cmr->db_connection, $cmr->config["cmr_table_prefix"] . $table_name, "search", $cmr->page["language"]);

$cmr->output[0] = str_replace("\\n", "", $post->print_value());
// $cmr->output[0] = $cmr->notify["to_page"];
$cmr->output[1] = $cmr->notify["to_log"];
$cmr->email = $cmr->notify["to_email"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "', 'searh', '" . $cmr->notify["to_log"] . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


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
/*
Select next module to be run
*/
// $cmr->page["middle1"] = "modules/view_search.php";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/view_search.php";
$cmr->page["middle2"] = $mod->path;
// include_once($cmr->get_path("index") . "modules/view_search.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>