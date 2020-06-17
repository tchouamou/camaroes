<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * page_header.php
 *        ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.03 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes//
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


















page_header.php,Ver 3.0  2011-July 10:36:59
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 *$division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

if(!($cmr->get_user("auth_user_path"))) $cmr->user["auth_user_path"] = "home/users/guest/";
if(!($cmr->get_user("auth_group_path"))) $cmr->user["auth_group_path"] = "home/groups/guest/";
if(($cmr->get_user("auth_email"))){
 $division->load_themes($cmr->themes);
}else{
$cmr->page["auth_theme"] = "default";
 $division->load_themes($cmr->themes);
}
$division->module["name"] = $cmr->module["name"];



$str_title = "";
if(($cmr->get_user("authorisation"))){
	//$str_title .= "<input type=\"button\" value=\"+\" id=\"two2\" onclick=\"show('extend2');show('one2');hide('two2');\" />";
	//$str_title .= "<input style=\"visibility:hidden; display:none\" type=\"button\" value=\"-\" id=\"one2\" onclick=\"hide('extend2');show('two2');hide('one2');\" />";
	//$str_title .= "<div id=\"extend2\" style=\"visibility:hidden;display:none;\" >";
    if((($cmr->get_page("cmr_see_lang")) && ($cmr->get_page("cmr_see_lang")))){
	$str_title .= "<select name=\"com_lang\" id=\"com_lang\" onchange=\"link_conf('com_lang','current_lang');\" >";
    $str_title .= "<option value=\"" . $cmr->get_page("language") . "\" >" . $cmr->translate("language") . "(" . $cmr->translate($cmr->get_page("language")) . ")</option>";

    $array_value = get_languages_list($cmr->config);
    $str_title .= select_order($cmr->language, $array_value[1], $array_value[2], "1");
    $str_title .= "</select>&nbsp;&nbsp;";


    }
    // =========================================
    if((($cmr->get_page("cmr_see_theme")))){
    $str_title .= "<select name=\"com_themes\" id=\"com_themes\" onchange=\"link_conf('com_themes','current_themes');\" >";
    $str_title .= "<option value=\"default\" >" . $cmr->translate("themes") . "(" . $cmr->translate($cmr->get_page("auth_theme")) . ")</option>";

    $array_value = get_themes_list($cmr->config);
    $str_title .= select_order($cmr->language, $array_value[1], $array_value[2]);
    $str_title .= "</select>&nbsp;&nbsp;";
    }
    // =========================================


    // =========================================
    if((($cmr->get_page("cmr_see_refresh")) && ($cmr->get_page("cmr_see_refresh")))){
    $str_title .= "<select name=\"com_refresh\" id=\"com_refresh\" onchange=\"link_conf('com_refresh','current_refresh');\" >";
    $str_title .= "<option value=\"1800\" >" . $cmr->translate("refresh") . "(" . $cmr->get_page("refresh") . ")</option>";
    $str_title .= "<option value=\"1\" >" . $cmr->translate("1 Second") . "</option>";
    $str_title .= "<option value=\"5\" >" . $cmr->translate("5 Second") . "</option>";
    $str_title .= "<option value=\"15\" >" . $cmr->translate("15 Second") . "</option>";
    $str_title .= "<option value=\"30\" >" . $cmr->translate("30 Second") . "</option>";
    $str_title .= "<option value=\"60\" >" . $cmr->translate("1 Minute") . "</option>";
    $str_title .= "<option value=\"300\" >" . $cmr->translate("5 Minute") . "</option>";
    $str_title .= "<option value=\"900\" >" . $cmr->translate("15 Minute") . "</option>";
    $str_title .= "<option value=\"1800\" >" . $cmr->translate("30 Minute") . "</option>";
    $str_title .= "<option value=\"3600\" >" . $cmr->translate("1 Hours") . "</option>";
    $str_title .= "<option value=\"43200\" >" . $cmr->translate("12 Hours") . "</option>";
    $str_title .= "<option value=\"86400\" >" . $cmr->translate("24 Hours(1 Day)") . "</option>";
    $str_title .= "<option value=\"infinite\" >" . $cmr->translate("infinite") . "</option>";
    $str_title .= "</select>&nbsp;&nbsp;";
        // =========================================
    }
    //$str_title.=$cmr->translate("layer").":";
    //$str_title .= "<select name=\"com_layer\" id=\"com_layer\" onchange=\"link_conf('com_layer','current_layer');\" >";
    //$str_title .= "<option value=\"default\" >".$cmr->get_page("refresh")."</option>";
    //$str_title .= "<option value=\"1\" >" . $cmr->translate("1 Layer") . "</option>";
    //$str_title .= "<option value=\"2\" >" . $cmr->translate("2 Layer") . "</option>";
    //$str_title .= "<option value=\"3\" >" . $cmr->translate("3 Layer") . "</option>";
    //$str_title .= "</select>&nbsp;&nbsp;";
    // =========================================
    if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))){
        if((($cmr->get_page("cmr_see_tab")))){
        $str_title .= "<select name=\"com_tab\" id=\"com_tab\" onchange=\"link_conf('com_tab','current_tab');\" >";
        $str_title .= "<option value=\"default\" >" . $cmr->translate("tab") . "(" . $cmr->get_page("current_tab") . ")</option>";

    	$array_value = get_page_list($cmr->config);
	    $str_title .= select_order($cmr->language, $array_value[1], $array_value[2], "1");
        $str_title .= "</select>&nbsp;&nbsp;";
        }

        if((($cmr->get_page("cmr_see_action")))){
        $str_title .= "<select name=\"com_action\" id=\"com_action\" onchange=\"link_conf('com_action','current_action');\" >";
        $str_title .= "<optgroup label=\"" . $cmr->translate("action") . "\">";
        $str_title .= "<option value=\"\">" . $cmr->translate("action") . "</option>";
        $str_title .= "<option value=\"site_map\">" . $cmr->translate("Site Map") . "</option>";
        $str_title .= "<option value=\"command_bar\">" . $cmr->translate("Command Bar") . "</option>";

        $str_title .= "<option value=\"\">--</option>";

        $str_title .= "<option value=\"tab_mode\">" . $cmr->translate("View Tab") . "</option>";
        $str_title .= "<option value=\"view_task\">" . $cmr->translate("View Task Bar") . "</option>";
        $str_title .= "<option value=\"\">--</option>";

        $str_title .= "<option value=\"expert\">" . $cmr->translate("Mode Extend") . "</option>";
        $str_title .= "<option value=\"normal\">" . $cmr->translate("Mode Normal") . "</option>";
        $str_title .= "<option value=\"minim\">" . $cmr->translate("Mode Minim") . "</option>";

        $str_title .= "<option value=\"\">--</option>";

        $str_title .= "<option value=\"debug\">" . $cmr->translate("Mode debug") . "</option>";
        $str_title .= "<option value=\"no_debug\">" . $cmr->translate("Mode no debug") . "</option>";

        $str_title .= "<option value=\"\">--</option>";

        $str_title .= "<option value=\"read_only\">" . $cmr->translate("Mode read only") . "</option>";
        $str_title .= "<option value=\"read_write\">" . $cmr->translate("Mode read write") . "</option>";

        $str_title .= "<option value=\"\">--</option>";

        $str_title .= "<option value=\"login\">" . $cmr->translate("Login") . "</option>";
        $str_title .= "<option value=\"init\">" . $cmr->translate("Init") . "</option>";
        $str_title .= "<option value=\"exit\">" . $cmr->translate("Exit") . "</option>";

//         $str_title .= "<option value=\"left_menu\">" . $cmr->translate("Left Menu") . "</option>";
//         $str_title .= "<option value=\"\">--</option>";
//
//         $str_title .= "<option value=\"save_u\">" . $cmr->translate("Save front page for User") . "</option>";
//         $str_title .= "<option value=\"save_g\">" . $cmr->translate("Save front page for Group") . "</option>";
//
//         $str_title .= "<option value=\"\">--</option>";
//
//         $str_title .= "<option value=\"load_u\">" . $cmr->translate("Load Group front page") . "</option>";
//         $str_title .= "<option value=\"load_g\">" . $cmr->translate("Load Default front page") . "</option>";
//
//         $str_title .= "<option value=\"\">--</option>";
//
//         $str_title .= "<option value=\"layer_1\">" . $cmr->translate("1 Layer") . "</option>";
//         $str_title .= "<option value=\"layer_2\">" . $cmr->translate("2 Layer ") . "</option>";
//         $str_title .= "<option value=\"layer_3\">" . $cmr->translate("3 Layer ") . "</option>";
//         $str_title .= "<option value=\"layer_3\">" . $cmr->translate("Layer Normal") . "</option>";
//         $str_title .= "</optgroup>";

        $str_title .= "</select>";
        }
        //$str_title .= "</div>";
    }



	$str_title .= "<noscript><input type=\"submit\" value=\">\" /></noscript>";
	}



$division->prints["match_portal_short_name"] = $cmr->config["cmr_company_name3"];
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_head_image_left1"] = $cmr->get_conf("cmr_image_1");
$division->prints["match_company_name"] = $cmr->get_conf("cmr_company_name");
// $division->prints["match_head_image_left2"] = $cmr->get_conf("cmr_image_2");
$division->prints["match_portal_name_bis"] = $cmr->config["cmr_company_name2"];
$division->prints["match_head_image_right1"] = $cmr->get_conf("cmr_image_3");
$division->prints["match_head_image_right2"] = $cmr->get_conf("cmr_image_3");


$division->prints["match_head_see_time"] = "";
if(($cmr->get_page("cmr_see_time"))){
$division->prints["match_head_see_time"] = " <input type=\"text\" onMouseMove=\"runclock();ajax_event('". $cmr->get_page("cmr_ajax_engine")."?event=');\" id=\"time\" class=\"no_border\" size=\"12\" readonly /><br />";
}




if(($cmr->get_user("authorisation"))){
$division->module["title"] = " (" .  $cmr->get_user("auth_email") . ")&nbsp;&nbsp;" . $str_title;
}else{
$division->module["title"] = substr($cmr->get_conf("cmr_company_name3") . " ver. " . $cmr->get_conf("cmr_version") . " &copy; ", 0, 120) . "&nbsp;&nbsp;&nbsp;&nbsp;" . $str_title;
	}

$division->prints["match_open_windows"] = $division->show_noclose();


$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_page_header" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_page_header" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_page_header" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_page_header" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);


$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// if(empty($cmr->post_var["com_action"])) $cmr->post_var["com_action"] = "";
// if(empty($cmr->post_var["last_id"])) $cmr->post_var["last_id"] = "";
// if(empty($cmr->post_var["last_uid"])) $cmr->post_var["last_uid"] = "";
// if(empty($cmr->post_var["last_email"])) $cmr->post_var["last_email"] = "";
// if(empty($cmr->post_var["last_group"])) $cmr->post_var["last_group"] = "";
// if(empty($cmr->post_var["last_level"])) $cmr->post_var["last_level"] = "";
// if(empty($cmr->post_var["last_authorization"])) $cmr->post_var["last_authorization"] = "";
// if(empty($cmr->post_var["last_list_group"])) $cmr->post_var["last_list_group"] = "";


// switch($cmr->post_var["com_action"]){
//  case "site_map":
//  case "command_bar":
//  case "left_menu":
//  case "tab_mode":
//  case "view_task":
//  case "login":
//  case "init":
//  case "exit":
//  case "expert":
//  case "normal":
//  case "minim":
//  case "debug":
//  case "no_debug":
//  case "save_u":
//  case "save_g":
//  case "load_u":
//  case "load_g":
//  case "layer_1":
//  case "layer_2":
//  case "layer_3":
//  case "layer_3":
//  break;
//
//  case "":
//  if(!empty($cmr->post_var["last_id"])) $cmr->user["auth_id"] = $cmr->post_var["last_id"];
//  if(!empty($cmr->post_var["last_uid"])) $cmr->user["auth_uid"] = $cmr->post_var["last_uid"];
//  if(!empty($cmr->post_var["last_email"])) $cmr->user["auth_email"] = $cmr->post_var["last_email"];
//  if(!empty($cmr->post_var["last_group"])) $cmr->user["auth_group"] = $cmr->post_var["last_group"];
//  if(!empty($cmr->post_var["last_level"])) $cmr->user["auth_type"] = $cmr->post_var["last_level"];
//  if(!empty($cmr->post_var["last_authorization"])) $cmr->user["authorization"] = $cmr->post_var["last_authorization"];
//  if(!empty($cmr->post_var["last_list_group"])) $cmr->user["auth_list_group"] = $cmr->post_var["last_list_group"];
//  break;
//
//  default:
// //  $cmr->post_var["last_id"] = $cmr->get_user("auth_id");
// //  $cmr->post_var["last_uid"] = $cmr->get_user("auth_uid");
//  $cmr->post_var["last_email"] = $cmr->get_user("auth_email");
//  $cmr->post_var["last_group"] = $cmr->get_user("auth_group");
//  $cmr->post_var["last_level"] = $cmr->get_user("auth_type");
// //  $cmr->post_var["last_authorization"] = $cmr->get_user("authorization");
// //  $cmr->post_var["last_list_group"] = $cmr->get_user("auth_list_group");
//
//  if(strpos("@", $cmr->post_var["com_action"])){
// // 	 $cmr->user["auth_id"] = $cmr->post_var["last_id"];
// // 	 $cmr->user["auth_uid"] = $cmr->post_var["last_uid"];
// 	 $cmr->user["auth_email"] = trim($cmr->post_var["com_action"]);
// // 	 $cmr->user["auth_group"] = $cmr->post_var["last_group"];
// // 	 $cmr->user["auth_type"] = $cmr->post_var["last_level"];
// // 	 $cmr->user["authorization"] = $cmr->post_var["last_authorization"];
// // 	 $cmr->user["auth_list_group"] = $cmr->post_var["last_list_group"];
//  }elseif(intval($cmr->post_var["com_action"]) > 0){
// 	 $cmr->user["auth_type"] = trim($cmr->post_var["com_action"]);
// // 	 $cmr->user["authorization"] = $cmr->post_var["last_authorization"];
// // 	 $cmr->user["auth_list_group"] = $cmr->post_var["last_list_group"];
//  }else{
// 	 $cmr->user["auth_group"] = trim($cmr->post_var["com_action"]);
// // 	 $cmr->user["auth_type"] = $cmr->post_var["last_level"];
// // 	 $cmr->user["authorization"] = $cmr->post_var["last_authorization"];
// // 	 $cmr->user["auth_list_group"] = $cmr->post_var["last_list_group"];
//  }
//
//  break;
//
// }
?>
