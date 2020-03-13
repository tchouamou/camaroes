<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_delete_@_table_@.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_delete_@_table_@.php,Ver 3.0  @_date_time_@
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "delete_@_table_@"://When Working in data send by  form [delete_@_table_@.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $cmr->load_lang_need("@_table_@" . $cmr->get_ext("lang"));
$cmr->config = $cmr->load_conf_need("conf_delete_@_table_@" . $cmr->get_ext("conf"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_@_table_@.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$c = new @_table_@_class($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post('id_@_table_@', 'post', $cmr->session['pre_match'])){
    $c->id_@_table_@ = get_post('id_@_table_@');
    $c->set_id_@_table_@(get_post('id_@_table_@', 'post', $cmr->session['pre_match']));
/**
*Creating the appropriate SQL string for  delete_@_table_@
*$cmr->query[0] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "@_table_@  where  @_column_id_@ = '$c->id_@_table_@';";
**/
$cmr->query[0]  = $c->query_delete(get_post('id_@_table_@'));
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
cmr_log_to_db($cmr->db_connection, $cmr->get_conf("cmr_table_prefix"), "'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "@_table_@', '" . cmr_escape($c->id_@_table_@) . "' ,'delete'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$selected = $cmr->tranlete("No object selected")
if($c->id_@_table_@){
$object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "@_table_@", "@_column1_@,@_column2_@,@_column3_@", "@_column_id_@", $c->id_@_table_@);
if(empty($object)) $object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "@_table_@", "*", "@_column_id_@", $c->id_@_table_@);
$object_explode = implode($object , "|");
$selected = substr($object_explode, 0, 50);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*
Creating the appropriate Message to be send to the administrator
*/

/* intestazioni addizionali per l'email*/

/*
Creating the appropriate notification Message to be send to the administrator group
*/
file_exists($cmr->config["notify_delete_@_table_@"]) ? $templates_notify = $cmr->config["notify_delete_@_table_@"] : $templates_notify = $cmr->good_file("notify", "@_table_@");
$cmr->notify = $cmr->load_notify($templates_notify, "@_table_@", "action_delete");

$cmr->output[0] = $cmr->translate("Delete !!!!: =>" . $selected) . $cmr->notify["to_page"];
$cmr->output[1] = $cmr->notify["to_log"];
$cmr->email = $cmr->notify["to_email"];

/*
Select next module who will trait these var
*/
// $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
// break;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->page["middle2"] = $cmr->get_module("path");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>