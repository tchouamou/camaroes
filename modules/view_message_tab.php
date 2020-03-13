<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_message_tab.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











view_message_tab.php,Ver 3.0  2011-Sep 22:32:40  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($cmr->post_var["id_message"])) $cmr->post_var["id_message"] = "";

$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$qr->language = $cmr->get_page("language");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_message_tab.php?event_action=all&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("all") . "(" . $qr->get_query_count("all_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=my&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("my") . "(" . $qr->get_query_count("my_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=received&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("received") . "(" . $qr->get_query_count("received_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=unread&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("unread") . "(" . $qr->get_query_count("unread_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=sended&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("sended") . "(" . $qr->get_query_count("sended_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=current&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("current") . "(" . $qr->get_query_count("current_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=date.ini&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("date") . "(" . $qr->get_query_count("date_message", "message", "select") . ")");
$lk->add_link("modules/view_message_tab.php?event_action=model&id_message=".$cmr->post_var["id_message"], "", $cmr->translate("model") . "(" . $qr->get_query_count("model_message", "message", "select") . ")");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))
$cmr->post_var[$mod->base_name . "_mode"] = "link_detail";

if(empty($cmr->post_var[$mod->base_name . "_limit"]))
$cmr->post_var[$mod->base_name . "_limit"] = 30;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("event_action")) $cmr->post_var["event_action"] = get_post("event_action");
if(empty($cmr->post_var["event_action"])) $cmr->post_var["event_action"] = "all";

switch($cmr->post_var["event_action"]){
	case "my":
	$file_path = $cmr->get_path("module") . "modules/view_my_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(1);
	break;
	
	case "received":
	$file_path = $cmr->get_path("module") . "modules/view_received_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(2);
	break;
	
	case "unread":
	$file_path = $cmr->get_path("module") . "modules/view_unread_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(3);
	break;
	
	case "sended":
	$file_path = $cmr->get_path("module") . "modules/view_sended_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(4);
	break;
	
	case "current":
	$file_path = $cmr->get_path("module") . "modules/view_current_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(5);
	break;
	
	case "date":
	$file_path = $cmr->get_path("module") . "modules/view_date_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(6);
	break;
	
	case "model":
	$file_path = $cmr->get_path("module") . "modules/view_model_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(7);
	break;
	
	case "all":
	default:
	$file_path = $cmr->get_path("module") . "modules/view_all_message.php";
	$cmr->action["message_tab"] = $lk->open_module_tab(0);
	break;
	}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["message_tab"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
