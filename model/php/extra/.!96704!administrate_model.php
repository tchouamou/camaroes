<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * administrate.php
 *         ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 2.0 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*
Copyright (C) 2011, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.


administrate.php,v 1.5  @_date_time_@
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
include_once($cmr->get_conf("cmr_path") . "camaroes_class.php");
include_once($cmr->get_conf("cmr_path") . "common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->post_var["class_module"] = get_post("class_module");
		$cmr->post_var["cmr_get_data"] = get_post("cmr_get_data");
		if((!empty($cmr->post_var["class_module"]))||(!empty($cmr->post_var["cmr_get_data"]))){
         include_once($cmr->get_conf("cmr_path") . "system/loader/loader_get.php");
		}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
/*$win->win_type="default"()*/


$win->themes["module_name"]= $cmr->get_module("name");
$win->themes["module_positionx"]= $cmr->get_module("rown_position");
$win->themes["module_positiony"]= $cmr->get_module("col_position");

$win->module["title"]= $cmr->translate($cmr->module["base_name"]); 
// $win->module["text"] = "";
// $win->themes["text_align"] = "left";
// $win->themes["bgcolor"] = "#FFFFFF";
// $win->themes["border"] = "0";
// $win->themes["bordercolor"] = "";
// $win->themes["background"]= "";
// $win->themes["bgcolor"] = "#E0E0E0";
// $win->themes["width"] = "100%";
// $win->themes["header_visible"] = 1;
// $win->themes["header_tools_left"] = 1;
// $win->themes["header_tools_right"] = 1;
// $win->themes["header_bgcolor"] = "#DDDDDD";
// $win->themes["header_color"] = "#000000";
// $win->themes["header_align"] = "left";
// $win->themes["header_border"] = "2";
// $win->themes["header_bgimage_left"] = "";
// $win->themes["header_bgimage_middle"] = "";
// $win->themes["header_bgimage_right"] = "";
// $win->themes["header_mouse_effect"] = "";
$win->prints["match_open_windows"] = $win->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$win->prints["match_administrate_title1"] = $cmr->language[$cmr->module["base_name"]];
$win->prints["match_administrate_title2"] = ucfirst($cmr->language['".$cmr->module["base_name"]."_title']);


$win->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/administrate.php?conf_name=conf.d/modules/conf_administrate.ini", 1);;
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);;
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);;
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);;

$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", 1);;
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=lib&middle2=", 1);;

$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);;
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);;
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);;
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);;

$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);;
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);;
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);;
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);;
$lk->add_link("modules/menu_db.php?conf_name=conf.d/modules/conf_db.ini", 1);;
$win->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$win->prints["match_www_path"] = $cmr->config["cmr_www_path"];
$win->prints["match_form_param"] = "";
$win->prints["match_form_id"] = "admin_form";

$win->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_administrate.php\" name=\"cmr_get_data\" />");
$win->prints["match_input_hidden_get"] = "";
$win->prints["match_input_hidden_conf"] = "";

// 
$win->prints["match_legend_administrate"] = $cmr->translate("administrate");
;



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$win->prints["match_legend_action"] = $cmr->translate("action");;
$win->prints["match_action_view"] = $cmr->translate("view");;
$win->prints["match_action_search"] = $cmr->translate("search");
$win->prints["match_action_report"] = $cmr->translate("report");;
$win->prints["match_action_new"] = $cmr->translate("new");
$win->prints["match_action_update"] = $cmr->translate("update");
$win->prints["match_action_delete"] = $cmr->translate("delete");

$win->prints["match_select_dest"] = $cmr->translate('select_dest');
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

