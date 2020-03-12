<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        view_new_ticket.php
 *       ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 **************************************************************************/ 
 
 
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 
 
 


 


view_new_ticket.php,Ver 3.0  2011-Sep-Wed 12:32:30  
*/





/**
* Information about
*
* Is used for keeping
*
* windowss (design for the layer usefull when running a module)  
*
* @$t object istance of the class windowss

*/

 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
 
 
$GLOBALS["ticket_read"] = $cmr->readed_line("ticket");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
if(empty($cmr->action[$cmr->action["table_name"] . "_tab"])) $cmr->action[$cmr->action["table_name"] . "_tab"]= ".";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("New " . $cmr->action["table_name"]);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List new " . $cmr->action["table_name"]);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action[$cmr->action["table_name"] . "_module"] = __FILE__;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query[$cmr->action["table_name"]] = $qr->get_query("new_ticket");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$cmr->action["table_name"]] = " SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "ticket.*, ";
// $cmr->query[$cmr->action["table_name"]] .= " DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
// $cmr->query[$cmr->action["table_name"]] .= " FROM ". $cmr->get_conf("cmr_table_prefix") ."ticket ";
// $cmr->query[$cmr->action["table_name"]] .= "WHERE ((state_now=state) and (state='open')  ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (my_master != 'cmr_model') ";
// $cmr->query[$cmr->action["table_name"]] .= " AND ((call_log_group in (" . $cmr->get_user("auth_list_group") . ")) or (assign_to in (" . $cmr->get_user("auth_list_group") . ")) ";
// $cmr->query[$cmr->action["table_name"]] .= " OR (assign_to='" . $cmr->get_user("auth_email") . "')  OR (call_log_user='" . $cmr->get_user("auth_email") . "')  OR (work_by='" . $cmr->get_user("auth_email") . "')) ";
// $cmr->query[$cmr->action["table_name"]] .= ") ";
// $cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))
$cmr->post_var[$mod->base_name . "_mode"] = "link";

if(empty($cmr->post_var[$mod->base_name . "_limit"]))
$cmr->post_var[$mod->base_name . "_limit"] = 100;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_ticket.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_ticket.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
?>
