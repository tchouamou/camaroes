<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader_module.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























loader_module.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//$cmr->show();exit;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod = new class_module($cmr->config, $cmr->user);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->path = $cmr->page["module"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->page[$cmr->page["layer"] . $cmr->page["count3"]])) $cmr->page[$cmr->page["layer"] . $cmr->page["count3"]] = "";
$cmr->page[$cmr->page["layer"] . $cmr->page["count4"]] = $cmr->page[$cmr->page["layer"] . $cmr->page["count3"]];
if($cmr->page["count4"] != $cmr->page["count3"])  unset($cmr->page[$cmr->page["layer"] . $cmr->page["count3"]]);
// --order----
// unset($cmr->page[$cmr->page["layer"] . $cmr->page["count3"]]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// @ list($mod->url, $mod->conf_file, $other) = explode("|", $mod->path);
// @ list($mod->script, $dim_width, $dim_height, $other) = explode("?", $mod->url);
// @ list($mod->name, $mod->param) = explode("&", $mod->script);
// // $mod->path = $mod->script;
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->url = $mod->path;
$mod->position = $cmr->page["layer"] . $cmr->page["count4"];
$mod->conf_file = "";
$mod->param = "";
$mod->header_icon = "";
$mod->need_type = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["position"] = $mod->position;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(strpos($mod->path, "|")){
	$mod->url = substr($mod->path, 0, strpos($mod->path, "|"));
	$mod->conf_file = substr($mod->path, strpos($mod->path, "|") + 1);
}

$mod->script = $mod->url;
if(strpos($mod->url, "?")){
	$mod->script = substr($mod->url, 0, strpos($mod->url, "?"));
	$mod->param = substr($mod->url, strpos($mod->url, "?") + 1);
}else{
	if(strpos($mod->url, "&")) $mod->param = substr($mod->url, strpos($mod->url, "&") + 1);
}

$mod->name = $mod->script;
if(strpos($mod->script, "&")) $mod->name = substr($mod->script, 0, strpos($mod->script, "&"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($cmr->post_var["conf_name"])) $mod->conf_file = trim($cmr->post_var["conf_name"]);
// $cmr->post_var["conf_name"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var = cmr_load_param($cmr->config, $cmr->post_var, $mod->param);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->name = basename($mod->name);
$mod->path = trim($mod->path);
$mod->url = trim($mod->url);
$mod->conf_file = trim($mod->conf_file);
$mod->script = trim($mod->script);
$mod->param = trim($mod->param);
$mod->need_type = "0";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$mod->base_name = cmr_basename($mod->name);
$mod->pure_name = cmr_pure_name($cmr->config, $mod->name);
$mod->rown_position = $cmr->page["count4"];
// $cmr->page["position"] = $mod->position;
$mod->col_position = $cmr->page["layer"] . ';' . $cmr->get_page("head_num_mod"). ';' . $cmr->get_page("left_num_mod"). ';' . $cmr->get_page("middle_num_mod"). ';' . $cmr->get_page("right_num_mod") . ';' . $cmr->get_page("foot_num_mod");

if(!empty($mod->conf_file)) $cmr->config = $mod->load_conf($mod->conf_file);
if((!empty($cmr->config["path_" . $mod->base_name]))&&(cmr_searchi($mod->name, $cmr->config["path_" . $mod->base_name]))){
$cmr->config = $mod->load_conf($mod->name);
}

if(isset($cmr->config["image_" . $mod->pure_name]))
$mod->header_icon = $cmr->config["image_" . $mod->pure_name];
if(isset($cmr->config["match_" . $mod->base_name]))
$cmr->session["pre_match"] .= $mod->base_name . ":" . $cmr->config["match_" . $mod->base_name] . ";";
if(isset($cmr->config["type_" . $mod->base_name]))
$mod->need_type = intval($cmr->config["type_" . $mod->base_name]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->module["name"] = $mod->name;
$cmr->module["position"] = $mod->position;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->config["version_" . $mod->pure_name] = 1
// $cmr->config["language_" . $mod->pure_name] = languages/{cmr_language}/lang_$mod->pure_name.ini
// $cmr->config["func_" . $mod->pure_name] =
// $cmr->config["class_" . $mod->pure_name] = class/class_$mod->pure_name.php
// $cmr->config["path_" . $mod->base_name] = modules/$mod->base_name.php
// $cmr->config["help_" . $mod->base_name] = help/help_$mod->pure_name.html
// $cmr->config["image_" . $mod->base_name] = images/icon/32x32/modules/$mod->base_name.png
// $cmr->config["small_image_" . $mod->base_name] = images/icon/16x16/modules/$mod->pure_name.png
// $cmr->config["button_image_" . $mod->base_name] = images/button/auto/$mod->base_name.png
// $cmr->config["template_" . $mod->base_name] = templates/modules/template_$mod->base_name.html
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->exist_mess( $cmr->page["layer"]. ".php"))
print($cmr->module_mess($cmr->page["layer"]. ".php"));


$alert_message = true;
if(accept_mod($cmr->config, $cmr->user, $mod->name)){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$alert_message = false;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $mod->name);
$cmr->help = $cmr->load_help_need($mod->name);

// $cmr->action["to_load"] = $mod->name;
// include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = $mod->name;
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		   if(!cmr_search("://", $mod->path)){
			   $file_list = array();
			   $file_list[] = $mod->path;
			   $file_list[] = $cmr->get_path("index") . $mod->path;
			   $file_list[] = $cmr->get_path("module") . "modules/guest/" . $mod->name;
			   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("module") ."modules/". $mod->name;
			   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("module") . "modules/auto/" . $mod->name;
			   if($cmr->get_user("authorisation") >= $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("module") . "modules/admin/" . $mod->name;
			   if($cmr->get_user("authorisation") >= $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("module") . "modules/database/" . $mod->name;
			   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("index") . "system/generate/generator_mod.php";

			   $module_file = cmr_good_file($file_list);
			   if((0)
			      || ((dirname($module_file) == dirname($cmr->get_path("module") . "modules/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_client_type")))
			      || ((dirname($module_file) == dirname($cmr->get_path("module") . "modules/auto/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_client_type")))
			      || ((dirname($module_file) == dirname($cmr->get_path("module") . "modules/admin/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")))
			      || ((dirname($module_file) == dirname($cmr->get_path("module") . "modules/database/.")) && ($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")))
			   )
			   $alert_message = true;

			   $mod->script = $module_file;
			   if($alert_message != true) if(is_file($module_file)) include($module_file);
		    }else{
			    $alert_message = false;
		    	include($cmr->get_path("index") . "system/loader/iframe.php");
		    }
    // ------------------------------------------


}

if($alert_message == true){
	$cmr->post_var["module_message"] = $cmr->translate($mod->base_name);
	include($cmr->get_path("module") . "modules/guest/security.php");
//     print($cmr->translate("Admin privilege needed for module") . " [" . $cmr->translate($mod->base_name) . "], " . $cmr->translate("user type:" . $cmr->get_user("authorisation") . "; type needed: " . $mod->need_type. ". contact administrator") . "\n\r");
//     cmr_error_log($cmr->config, "Script=".__FILE__."  Line=".__LINE__." : "."1", "Cannot Use this Module [$mod->name]", $mod->need_type);
$mod->close();
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
