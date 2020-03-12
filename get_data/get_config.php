<?php
/**
 * get_config.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_config.php,Ver 3.0  2011-Aug-Wed 21:53:14  
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
$new_page = "";
$i_con = 0;
$cmr_sufix = array("con_", "lan_", "the_", "pag_", "templ_", "notify_");
$i_con_max = count($cmr->post_var);
$cmr->post_var["file_name"] = realpath($cmr->post_var["file_name"]);
// $prefix = substr(basename($cmr->post_var["file_name"]), 0, 3);
while ($i_con < $i_con_max){
	
//     if((get_post($prefix . "_key_" . $i_con)) || (get_post($prefix . "_val_" . $i_con))){
//         $new_page .= get_post($prefix . "_key_" . $i_con) . get_post($prefix . "_val_" . $i_con) . "\n";
//         $cmr->post_var[$prefix . "_key_" . $i_con] = null;
//         $cmr->post_var[$prefix . "_val_" . $i_con] = null;
//     }
	foreach ($cmr_sufix as $key => $value){
	    if(get_post($value . "key_" . $i_con)) $new_page .= get_post($value . "key_" . $i_con);
	    if(get_post($value . "val_" . $i_con)) $new_page .= get_post($value . "val_" . $i_con);
	    if((get_post($value . "key_" . $i_con)) || (get_post($value . "val_" . $i_con))){
			$new_page .= "\n";
		    $cmr->post_var[$value . "key_" . $i_con] = "";
		    $cmr->post_var[$value . "val_" . $i_con] = "";
    	}
	}
    $i_con++;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
if(is_writable($cmr->post_var["file_name"])){
if(file_exists($cmr->post_var["file_name"])) $good_config = rename($cmr->post_var["file_name"], $cmr->post_var["file_name"] . date("_y_m_d_h_i_") . ".bak");
// -------------

chmod($cmr->post_var["file_name"], 0775);

$fich = fopen($cmr->post_var["file_name"], "w+");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
if(fwrite($fich,  stripslashes(html_entity_decode($new_page)))){
    $new_page = "<br /> " . $cmr->translate("File") . " " . $cmr->post_var["file_name"] . " " . $cmr->translate("change_success") . "<br /> " . $new_page;
}else{
    $new_page = "<br /> " . $cmr->translate("File") . " " . $cmr->post_var["file_name"] . "<br /><b>" . $cmr->translate("Not change") . "</b><br />";
};
fclose($fich);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
Creating the appropriate Message to be send to the administrator
*/
		/* intestazioni addizionali */
// // 		$cmr->email["headers_severity"] = 3;
// // 		$cmr->email["headers_to"] = "" ;//. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
// // 		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// // 		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
// // 		$cmr->email["headers_bcc"] = "";
// $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("config") . " ";
// $cmr->email["message"] = " " . $cmr->translate("config") . "    " . $cmr->translate("by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
// $cmr->email["message"] .= "\n  " . $cmr->translate("config") . " \n";
// $cmr->email["message"] .= $new_page;
// $cmr->email["message"] .= " \n " . $cmr->translate("thanks") . "  --\n";
// $cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

/*
Creating the appropriate Message to be view for confirmation
*/
$cmr->output[0] = "<p><b>  " . $cmr->translate("config") . "  </b><br />";
$cmr->output[0] .= "<pre>" . htmlentities($new_page) . "</pre>";
$cmr->output[0] .= "<br /> " . $cmr->translate("thanks") . "  --<br /></p>";
/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

$new_page = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'table', '" . $cmr->get_session("id") . "' ,'config'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>