<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_ticket_tab.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











view_ticket_tab.php,Ver 3.0  2011-Sep 22:32:40  
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_message"])) $cmr->post_var["id_ticket"] = "";

$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$qr->language = $cmr->get_page("language");

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_ticket_tab.php?event_action=all&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("all") . "(" . $qr->get_query_count("all_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=new&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("new") . "(" . $qr->get_query_count("new_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=pending&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("pending") . "(" . $qr->get_query_count("pending_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=close&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("close") . "(" . $qr->get_query_count("closed_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=my&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("my") . "(" . $qr->get_query_count("my_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=unread&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("unread") . "(" . $qr->get_query_count("unread_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=expired&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("expired") . "(" . $qr->get_query_count("expired_ticket", "ticket", "select") . ")");
$lk->add_link("modules/view_ticket_tab.php?event_action=model&id_ticket=" . $cmr->post_var["id_ticket"], "", $cmr->translate("model") . "(" . $qr->get_query_count("model_ticket", "ticket", "select") . ")");
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
	case "new":
	$file_path = $cmr->get_path("module") . "modules/view_new_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(1);
	break;
	
	case "pending":
	$file_path = $cmr->get_path("module") . "modules/view_pending_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(2);
	break;
	
	case "close":
	$file_path = $cmr->get_path("module") . "modules/view_closed_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(3);
	break;
	
	case "my":
	$file_path = $cmr->get_path("module") . "modules/view_my_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(4);
	break;
	
	case "unread":
	$file_path = $cmr->get_path("module") . "modules/view_unread_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(5);
	break;
	
	case "expired":
	$file_path = $cmr->get_path("module") . "modules/view_expired_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(6);
	break;
	
	case "model":
	$file_path = $cmr->get_path("module") . "modules/view_model_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(7);
	break;
	
	case "all":
	default:
	$file_path = $cmr->get_path("module") . "modules/view_all_ticket.php";
	$cmr->action["ticket_tab"] = $lk->open_module_tab(0);
	break;
	}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["ticket_tab"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
