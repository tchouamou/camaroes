<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_upload.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */



/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_upload.php, Ver 3.03   
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

// case "upload":
$destination = get_post("destination");

// *************************
	if(strpos($destination, "@")){
	$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $destination);
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($user_uid) . "/uploaded/";
	}
	
	if(!empty($post->call_log_group))
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower($destination) . "/uploaded/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// *************************
    $cmr->output[0] = $cmr->post_files["attachment"];

    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->output[0] .= "\n .... Ending ..... \n";
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
    $cmr->email["subject"] = "" .  $cmr->translate("upload Run");
    $cmr->email["message"] =  $cmr->user["auth_email"] . "\n\n\n  ".$cmr->translate[" run the next action"] . "  \n\n" . $cmr->output[0] . "\n";
    $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
    $cmr->email["message"] .= "--\r\n"; // separator
    /* intestazioni addizionali */
//     $cmr->email["headers_severity"] = 3;
//     $cmr->email["headers_to"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//     $cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//     $cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
    // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'text', '" . $cmr->get_session("id") . "' ,'upload'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
