<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader_get.php
 *          ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









loader_get.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->action["form_action_message"] = "";

        // ------------------------------------------

        // ------------------------------------------
/* intestazioni addizionali per l'email*/
/* intestazioni addizionali */
$cmr->email["headers_severity"] = 3;
$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
$cmr->email["recipient"] = "" . $cmr->get_user("auth_email");
$cmr->email["headers_to"] = "" . $cmr->get_user("auth_email");
$cmr->email["headers_bcc"] = "";
// $cmr->email["headers_bcc"] = "" . $cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\r\n";
        // ------------------------------------------

        // ------------------------------------------
// $VAR = isset($_POST['class_module']) ? "_POST":"_GET";
// 
// $cmr->post_var["cmr_conf"] = get_post("cmr_conf");
// $cmr->post_var["class_module"] = get_post("class_module");

if(empty($cmr->post_var["cmr_get_data"])) 
if(empty($cmr->post_var["class_module"])) $cmr->post_var["class_module"] = get_post("class_module");
if(empty($cmr->post_var["cmr_conf"])) $cmr->post_var["cmr_conf"] = get_post("cmr_conf");

if(empty($cmr->post_var["cmr_get_data"])) $cmr->post_var["cmr_get_data"] = $cmr->post_var["class_module"];
if(empty($cmr->post_var["class_module"])) $cmr->post_var["class_module"] = $cmr->post_var["cmr_get_data"];
if(empty($cmr->post_var["cmr_conf"])) $cmr->post_var["cmr_conf"] = "";


empty($cmr->post_var["cmr_get_data"]) ? $mod->url = $cmr->post_var["class_module"] : $mod->url = $cmr->post_var["cmr_get_data"];
$mod->name = basename($mod->url);
$mod->base_name = cmr_basename($mod->name);
$mod->pure_name = cmr_pure_name($cmr->config, $mod->base_name);

// ------------------------------------------


empty($cmr->post_var["cmr_conf"]) ? $mod->conf_name = "conf_" . $mod->pure_name . ".php" : $mod->conf_name = $cmr->post_var["cmr_conf"];
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
// $mod->name = str_replace(dirname($cmr->post_var["cmr_get_data"]) . "get_", "", $cmr->post_var["cmr_get_data"]);
// // $cmr->all = $cmr->load_module_need($mod->name);
// if(!empty($mod->conf_file)){
// 	$cmr->config = $mod->load_conf( $mod->conf_file);
// }
// if((empty($cmr->config["path_" . $mod->pure_name]))||(cmr_searchi($mod->name,$cmr->config["path_" . $mod->pure_name]))){
// if((empty($cmr->config["load_config_" . $mod->pure_name])) &&  (empty($mod->conf_file))){
// 	$cmr->config = $mod->load_conf($mod->pure_name . ".php");
// }else{
// 	$list_conf = $cmr->config["other_conf_" . $mod->pure_name];	
// 	$cmr->config = $cmr->load_other_config($list_conf);
// 	}
// }
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
        // ------------------------------------------
// $cmr->config["version_" . $mod->pure_name . ""] = 1

// $cmr->config["other_conf_" . $mod->pure_name . ""] = 
// $cmr->config["language_" . $mod->pure_name . ""] = languages/{cmr_language}/lang_" . $mod->pure_name . ".ini 

// $cmr->config["func_" . $mod->pure_name . ""] = 
// $cmr->config["class_" . $mod->pure_name . ""] = class/class_" . $mod->pure_name . ".php

// $cmr->config["pre_load_get_" . $mod->pure_name . ""] = class/class_" . $mod->pure_name . ".php
// $cmr->config["get_" . $mod->base_name . ""] = get_data/get_" . $mod->base_name . ".php 
// $cmr->config["post_load_get_" . $mod->pure_name . ""] = 

// $cmr->config["notify_" . $mod->base_name . ""] = templates/notify/notify_" . $mod->base_name . ".xml 
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
// ------------------------------------------
	$cmr->config = $mod->load_conf($mod->conf_name);
// ------------------------------------------

// ------------------------------------------
    if(isset($cmr->config["match_" . $mod->pure_name])) $cmr->session["pre_match"] .= $mod->name . ":" . $cmr->config["match_" . $mod->pure_name] . ";";
//     if(isset($cmr->config["type_" . $mod->pure_name])) $need_type = $cmr->config["type_" . $mod->pure_name];

$alert_message = true;
if(accept_mod($cmr->config, $cmr->user, $mod->name)){
//     if($cmr->user["authorisation"] >= $need_type) 
// ------------------------------------------
	$alert_message = false;
// ------------------------------------------
            
	$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $mod->pure_name . ".php");
// 	$cmr->help = $cmr->load_help_need($mod->pure_name . ".php");

//  $cmr->action["to_load"] = $mod->pure_name . ".php";
// 	include($cmr->get_path("index") . "system/loader/loader_function.php");
    $cmr->action["to_load"] = "class_" . $mod->pure_name . ".php";
	include($cmr->get_path("index") . "system/loader/loader_class.php");
// ------------------------------------------
// ------------------------------------------
// 	include($cmr->get_path("index") . "system/loader/preloader_get.php");
// ------------------------------------------
	$file_list = array();
	$file_list[] = $cmr->post_var["cmr_get_data"];
	$file_list[] = $cmr->post_var["class_module"];
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("index") . $cmr->post_var["cmr_get_data"];
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("index") . $cmr->post_var["class_module"];
	   
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/" . $mod->name;
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/" . $mod->name;
	if($cmr->get_user("authorisation") >= $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/admin/" . $mod->name;
	
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/get_" . $mod->name;
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/get_" . $mod->name;
	
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/" . $mod->base_name . ".php";
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/" . $mod->base_name . ".php";
	
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/get_" . $mod->base_name . ".php";
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/get_" . $mod->base_name . ".php";
	
	// if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/" . $mod->name;
	// if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/" . $mod->name;
	// $file_list[] = $cmr->get_path("get_data") . "get_data/get_" . $mod->name . ".php";
	// if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("get_data") . "get_data/auto/get_" . $mod->name . ".php";
	// $file_list[] = $cmr->get_path("index") . "system/generate/generator_get.php";
			   
			   
   $get_file = cmr_good_file($file_list, "file");
   $mod->path = $get_file;
   $mod->script = $get_file;
   if($alert_message != true) if(is_file($get_file)) include($get_file);
// ------------------------------------------
    
// ------------------------------------------
// 	include($cmr->get_path("index") . "system/loader/postloader_get.php");
// ------------------------------------------
   if($get_file) 
   if((0) 
      || ((dirname($get_file) == dirname($cmr->get_path("get_data") . "get_data/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_client_type")))
      || ((dirname($get_file) == dirname($cmr->get_path("get_data") . "get_data/auto/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_client_type")))
      || ((dirname($get_file) == dirname($cmr->get_path("get_data") . "get_data/admin/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")))
   ) 
   $alert_message = true;
// ------------------------------------------
 }
    
	if($alert_message == true){
	// Creating the appropriate Message to be view
    $cmr->action["form_action_message"] = " " . $cmr->translate("no_right") . " " . $cmr->translate("to_empty") . " Command. " . $cmr->translate("to_contact") . " " . $cmr->get_conf("cmr_company_name") . " " . $cmr->translate("to_solve") . " " . " ";
	$cmr->post_var["module_message"] = $cmr->translate($mod->name);
	$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
	$cmr->page["middle2"] = $cmr->get_path("module") . "modules/guest/security.php";
    } 
// ------------------------------------------

// ------------------------------------------
?>