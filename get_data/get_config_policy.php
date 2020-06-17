<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_config_policy.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */


/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_config_policy.php,Ver 3.0  2011-Jun-Sun 04:40:37
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
// case "@_form_@"://When Working in data send by form [config_policy.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!! working config and lang file !!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//----------------------
$cmr->output[0] = "";
$policy["dest_user"] = trim(get_post("dest_user"));
$policy["dest_group"] = trim(get_post("dest_group"));
$policy["cmr_policy"] = trim(get_post("cmr_policy"));
//----------------------
//----------------------
$policy["default0"] = get_post("default0");
$policy["default1"] = get_post("default1");
$policy["default2"] = get_post("default2");
$policy["default3"] = get_post("default3");
$policy["default4"] = get_post("default4");
$policy["default5"] = get_post("default5");
$policy["default6"] = get_post("default6");
$policy["default7"] = get_post("default7");
//----------------------
//----------------------
	$count = 0;
	$policy[$count] = get_post("policy_" . strval($count)); 
	$type[$count] = get_post("type_" . strval($count)); 
	while(!empty($policy[$count])){
		$count++;
		$policy[$count] = get_post("policy_" . strval($count)); 
		$type[$count] = get_post("type_" . strval($count)); 
	}
//----------------------
//----------------------

//----------------------
//----------------------
//----------------------
//----------------------
$text_key = "cmr_" . $policy["cmr_policy"] . "_type_";
//----------------------

//----------------------
$page_file = realpath($cmr->get_conf("cmr_main_config"));
if(!empty($policy["dest_user"])) $page_file = realpath($cmr->get_path("home") . "home/users/" . $policy["dest_user"] . "/" . $cmr->get_conf("cmr_home_config"));
if(!empty($policy["dest_user"])) $page_file = realpath($cmr->get_path("home") . "home/groups/" . $policy["dest_group"] . "/" . $cmr->get_conf("cmr_home_config"));
//----------------------

//----------------------
if(file_exists($page_file)) $new_page = file_get_contents($page_file);
//----------------------

//----------------------
	if(empty($new_page)) $new_page = "";
	if(!strpos($new_page, $text_key . "0")) $new_page .= "\n" . $text_key . "0=";
	if(!strpos($new_page, $text_key . "1")) $new_page .= "\n" . $text_key . "1=";
	if(!strpos($new_page, $text_key . "2")) $new_page .= "\n" . $text_key . "2=";
	if(!strpos($new_page, $text_key . "3")) $new_page .= "\n" . $text_key . "3=";
	if(!strpos($new_page, $text_key . "4")) $new_page .= "\n" . $text_key . "4=";
	if(!strpos($new_page, $text_key . "5")) $new_page .= "\n" . $text_key . "5=";
	if(!strpos($new_page, $text_key . "6")) $new_page .= "\n" . $text_key . "6=";
	if(!strpos($new_page, $text_key . "7")) $new_page .= "\n" . $text_key . "7=\n";
//----------------------


//----------------------
($policy["default0"] == "-all") ? $action0 = "+" : $action0 = "-";
($policy["default1"] == "-all") ? $action1 = "+" : $action1 = "-";
($policy["default2"] == "-all") ? $action2 = "+" : $action2 = "-";
($policy["default3"] == "-all") ? $action3 = "+" : $action3 = "-";
($policy["default4"] == "-all") ? $action4 = "+" : $action4 = "-";
($policy["default5"] == "-all") ? $action5 = "+" : $action5 = "-";
($policy["default6"] == "-all") ? $action6 = "+" : $action6 = "-";
($policy["default7"] == "-all") ? $action7 = "+" : $action7 = "-";
//----------------------


//----------------------
//----------------------
$type_0 = array();
$type_1 = array();
$type_2 = array();
$type_3 = array();
$type_4 = array();
$type_5 = array();
$type_6 = array();
$type_7 = array();
//----------------------
	$count = 0;
	while(!empty($policy[$count])){
			if($type[$count] >= "7"){
				$type_7[] = $policy[$count];
			}elseif(($type[$count] >= "6")){
				$type_6[] = $policy[$count];
			}elseif(($type[$count] >= "5")){
				$type_5[] = $policy[$count];
			}elseif(($type[$count] >= "4")){
				$type_4[] = $policy[$count];
			}elseif(($type[$count] >= "3")){
				$type_3[] = $policy[$count];
			}elseif(($type[$count] >= "2")){
				$type_2[] = $policy[$count];
			}elseif(($type[$count] >= "1")){
				$type_1[] = $policy[$count];
			}elseif(($type[$count] < "1")){
//----------------------
				if((strlen($type[$count]) > 0)) $type_0[] = $policy[$count];
//----------------------
			}
		$count++;
	}
//----------------------

//----------------------
	$new_page = cmr_searchi_replace($text_key . "0[ \t]*=[^\n]*[\n]", "\n\n" . $text_key . "0=" . $policy["default0"] . "," . implode("," . $action0, $type_0) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "1[ \t]*=[^\n]*[\n]", "\n" . $text_key . "1=" . $policy["default1"] . "," . implode("," . $action1, $type_1) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "2[ \t]*=[^\n]*[\n]", "\n" . $text_key . "2=" . $policy["default2"] . "," . implode("," . $action2, $type_2) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "3[ \t]*=[^\n]*[\n]", "\n" . $text_key . "3=" . $policy["default3"] . "," . implode("," . $action3, $type_3) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "4[ \t]*=[^\n]*[\n]", "\n" . $text_key . "4=" . $policy["default4"] . "," . implode("," . $action4, $type_4) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "5[ \t]*=[^\n]*[\n]", "\n" . $text_key . "5=" . $policy["default5"] . "," . implode("," . $action5, $type_5) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "6[ \t]*=[^\n]*[\n]", "\n" . $text_key . "6=" . $policy["default6"] . "," . implode("," . $action6, $type_6) . "\n", $new_page);
	$new_page = cmr_searchi_replace($text_key . "7[ \t]*=[^\n]*[\n]", "\n" . $text_key . "7=" . $policy["default7"] . "," . implode("," . $action7, $type_7) . "\n", $new_page);
	$new_page = cmr_searchi_replace("[\n][\n][\n]*", "\n\n", $new_page);
//----------------------

//----------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
Creating the appropriate Message to be send to the administrator
*/

/*=================================================================*/
$good_config = false;
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
if(is_writable($page_file)){ 
if(file_exists($page_file)) $good_config = rename($page_file, $page_filedate . date("_y_m_d_h_i_") . ".bak");
chmod($page_file, 0775);
$fich = fopen($page_file, "w+");
$good_config = $good_config && fwrite($fich,  stripslashes(html_entity_decode($new_page)));
fclose($fich);
}
/*=================================================================*/

/*=================================================================*/
/*
Creating the appropriate Message to be view for confirmation
*/
if($good_config){
	echo "<br /><b>" .  $cmr->translate("File") . "  [" . $page_file . "] " .  $cmr->translate("successfully created"). "</b>.......<br />";
}else{
	echo "<br /> " .  $cmr->translate("File") . "  [" . $page_file . "] " .  $cmr->translate("not created ??!!!!"). "<br />";
	echo "<hr /><h2>" .  $cmr->translate("Use the next text to manualy change the file") . " [" . $page_file . "] </h2><hr />";
}
//----------------------
	echo  "<p><b>  " . $cmr->translate("config") . "  </b><br />";
	echo  "<pre>" . htmlentities($new_page) . "</pre>";
	echo  "<br /> " . $cmr->translate("thanks") . "  --<br /></p>";

/*=================================================================*/

/*=================================================================*/
/*
Creating the appropriate Message to be send to the administrator
*/
// // $cmr->email["headers_severity"]=3;
// // $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_log_name")." <". $cmr->get_conf("cmr_log_email").">\r\n";
// // $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name")." <".$cmr->config["cmr_from_email"].">\r\n";
// // $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\r\n";
// // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\r\n";
// // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\r\n";
// $cmr->email["subject"] = "" . $cmr->config["cmr_company_name3"] . ": " . $cmr->translate("config") . " ";
// $cmr->email["message"] = " " . $cmr->translate("config") . "    " . $cmr->translate("by") . " : " . $cmr->get_user("auth_email") . "\n\n\n";
// $cmr->email["message"] .= "\n  " . $cmr->translate("config") . " \n";
// $cmr->email["message"] .= $new_page;
// $cmr->email["message"] .= " \n " . $cmr->translate("thanks") . "  --\n";
// $cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";


/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

$new_page = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'front_page', '" . $cmr->get_session("id") . "' ,'config'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
