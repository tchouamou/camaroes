<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_move_ticket.php
 *        --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.













get_move_ticket.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "move_ticket"://all var send by link------------
$id = get_post("id_ticket");
$number = get_post("number");
$assign_to = get_post("assign_to");
// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id; // for move ticket
// -----------------------------------------------------

$email = $cmr->get_user("auth_email");
$comment .= $cmr->translate("assign_to") . " " . $assign_to . ") " . $cmr->translate("by") . " " . $cmr->get_user("auth_email") . ", " . date("y-m-d h:i:s");

$cmr->query[0] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "ticket SET assign_to = '" . cmr_escape($assign_to) . "', comment = '" . cmr_escape($comment) . "'    WHERE id ='" . cmr_escape($id) . "';";


// ----------------------------
if(($cmr->get_conf("cmr_save_escalation"))){
$cmr->query[1] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "escalation ( 
id , ticket_number , action , id_ticket , allow_type , allow_email , allow_groups , comment , date_time )
VALUES (
'' , '" . cmr_escape($number) . "' , '" . $cmr->translate("Ticket escalete to") ."[" . cmr_escape($assign_to) . "] " . $cmr->translate("by") . " (". $cmr->get_user("auth_email") . ")' , '" . cmr_escape($id) . "' , '' , '' , '' , '" . cmr_escape($comment) . "' ,  NOW()  )
);";
}
// ----------------------------





$cmr->output[0] = "<b>Ticket [$number] " . $cmr->translate("assign_to") . " [$assign_to]  " . $cmr->translate("with success") . " </b><br />";
    
		/* intestazioni addizionali */
// 		$cmr->email["headers_severity"] = 3;
// 		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_to"] = "" . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "" . $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
// 		$cmr->email["headers_bcc"] = "";


$cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("assign_to") . " Ticket";
$cmr->email["message"] = "Ticket [" . cmr_unescape($number) . "] " . $cmr->translate("assign_to") . " [" . cmr_unescape($assign_to) . "] " . $cmr->translate("by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . cmr_escape($id) . "' ,'move'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
