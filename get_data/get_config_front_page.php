<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_front_page.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









get_front_page.php,  2011-Oct
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
// case "@_form_@"://When Working in data send by form [front_page.php]
//----------------------
$cmr->output[0] = "";
$dest_user = trim(get_post("dest_user"));
$dest_group = trim(get_post("dest_group"));
//----------------------

//----------------------
$page_file = realpath($cmr->get_conf("cmr_begin_pager_file"));
if(!empty($dest_user)) $page_file = realpath($cmr->get_path("home") . "home/users/" . $dest_user . "/" . $cmr->get_conf("cmr_page_filename"));
if(!empty($dest_user)) $page_file = realpath($cmr->get_path("home") . "home/groups/" . $dest_group . "/" . $cmr->get_conf("cmr_page_filename"));
//----------------------

//----------------------
if(file_exists($page_file)) $new_page = file_get_contents($page_file);
//----------------------
if(empty($new_page)){
	@ touch($page_file);
	$new_page = "";
	$new_page .= "\n\head1=\n\n";
	$new_page .= "\n\left1=\n\n";
	$new_page .= "\n\middle1=\n\n";
	$new_page .= "\n\right1=\n\n";
	$new_page .= "\n\foot1=\n\n";
}

//----------------------
$count = 1;
$continu = (file_exists($page_file)) && ((get_post("head" . $count))||(get_post("left" . $count))||(get_post("middle" . $count))||(get_post("right" . $count))||(get_post("foot" . $count))||(0));
//----------------------

//----------------------
while($count && $continu){
	
	if(strpos($new_page, "head" . $count)) $new_page = cmr_searchi_replace("head" . $count . "[ \t]*=[^\n]*[\n]", "head" . $count . "=\n", $new_page);
	if(get_post("head" . $count))
	if(strpos($new_page, "head" . $count)){
	$new_page = cmr_searchi_replace("head" . $count . "[ \t]*=[^\n]*[\n]", "head" . $count . "=" . get_post("head" . $count) . "\n", $new_page);
	}else{
		$new_page .= "\nhead" . $count . "=" . get_post("head" . $count) . "\n"; 
		}
	
	if(strpos($new_page, "left" . $count)) $new_page = cmr_searchi_replace("left" . $count . "[ \t]*=[^\n]*[\n]", "left" . $count . "=\n", $new_page);
	if(get_post("left" . $count))
	if(strpos($new_page, "left" . $count)){
	$new_page = cmr_searchi_replace("left" . $count . "[ \t]*=[^\n]*[\n]", "left" . $count . "=" . get_post("left" . $count) . "\n", $new_page);
	}else{
		$new_page .= "\nleft" . $count . "=" . get_post("left" . $count) . "\n"; 
		}
	
	if(strpos($new_page, "middle" . $count)) $new_page = cmr_searchi_replace("middle" . $count . "[ \t]*=[^\n]*[\n]", "middle" . $count . "=\n", $new_page);
	if(get_post("middle" . $count))
	if(strpos($new_page, "middle" . $count)){
	$new_page = cmr_searchi_replace("middle" . $count . "[ \t]*=[^\n]*[\n]", "middle" . $count . "=" . get_post("middle" . $count) . "\n", $new_page);
	}else{
		$new_page .= "\nmiddle" . $count . "=" . get_post("middle" . $count) . "\n"; 
		}
	
	if(strpos($new_page, "right" . $count)) $new_page = cmr_searchi_replace("right" . $count . "[ \t]*=[^\n]*[\n]", "right" . $count . "=\n", $new_page);
	if(get_post("right" . $count))
	if(strpos($new_page, "right" . $count)){
	$new_page = cmr_searchi_replace("right" . $count . "[ \t]*=[^\n]*[\n]", "right" . $count . "=" . get_post("right" . $count) . "\n", $new_page);
	}else{
		$new_page .= "\nright" . $count . "=" . get_post("right" . $count) . "\n"; 
		}
	
	if(strpos($new_page, "foot" . $count)) $new_page = cmr_searchi_replace("foot" . $count . "[ \t]*=[^\n]*[\n]", "foot" . $count . "=\n", $new_page);
	if(get_post("foot" . $count))
	if(strpos($new_page, "foot" . $count)){ 
	$new_page = cmr_searchi_replace("foot" . $count . "[ \t]*=[^\n]*[\n]", "foot" . $count . "=" . get_post("foot" . $count) . "\n", $new_page);
	}else{
		$new_page .= "\nfoot" . $count . "=" . get_post("foot" . $count) . "\n"; 
		}
		
	$count++;
	$continu = ((get_post("head" . $count))||(get_post("left" . $count))||(get_post("middle" . $count))||(get_post("right" . $count))||(get_post("foot" . $count))||(0));
}
//----------------------
//----------------------
//----------------------
// 		$new_page .= "\nleft" . $count . "=\n"; 
// 		$new_page .= "\nhead" . $count . "=\n"; 
// 		$new_page .= "\nmiddle" . $count . "=\n"; 
// 		$new_page .= "\nright" . $count . "=\n"; 
// 		$new_page .= "\nfoot" . $count . "=\n"; 
//----------------------
//----------------------
//----------------------

/*=================================================================*/
$good_config = false;
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
if(is_writable($page_file)){ 
if(file_exists($page_file)) $good_config = rename($page_file, $page_filedate . date("_y_m_d_h_i_") . ".bak");
chmod($page_file, 0775);
$fich =  fopen($page_file, "w+");
$good_config = $good_config && fwrite($fich,  stripslashes(html_entity_decode($new_page)));
fclose($fich);
}
/*=================================================================*/

/*=================================================================*/
/*
Creating the appropriate Message to be view for confirmation
*/
if($good_config){
	$cmr->output[0] .="<br /><b>" .  $cmr->translate("File") . "  [" . $page_file . "] " .  $cmr->translate("successfully created"). "</b>.......<br />";
}else{
	$cmr->output[0] .="<br /> " .  $cmr->translate("File") . "  [" . $page_file . "] " .  $cmr->translate("not created ??!!!!"). "<br />";
	$cmr->output[0] .="<hr /><h2>" .  $cmr->translate("Use the next text to manualy change the file") . " [" . $page_file . "] </h2><hr />";
}
//----------------------
	$cmr->output[0] .= "<p><b>  " . $cmr->translate("config") . "  </b><br />";
	$cmr->output[0] .= "<pre>" . htmlentities($new_page) . "</pre>";
	$cmr->output[0] .= "<br /> " . $cmr->translate("thanks") . "  --<br /></p>";

/*=================================================================*/

//----------------------
/*=================================================================*/
/*
Creating the appropriate Message to be send to the administrator
*/
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_log_name")." <". $cmr->get_conf("cmr_log_email").">\r\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name")." <".$cmr->config["cmr_from_email"].">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\r\n";
$cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("config") . " ";
$cmr->email["message"] = " " . $cmr->translate("config") . "    " . $cmr->translate("by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
$cmr->email["message"] .= "\n  " . $cmr->translate("config") . " \n";
$cmr->email["message"] .= $new_page;
$cmr->email["message"] .= " \n " . $cmr->translate("thanks") . " --\n";
$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

$new_page = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', "'front_page', '" . $cmr->get_session("id") . "' ,'config'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
