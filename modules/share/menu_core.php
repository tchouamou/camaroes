<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_core.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


menu_core.php, Ver 3.03, 2011-08-22 18:00:00
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
// !!!!!!!!!!!!!!!!!!!  INPUT  !!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $table_name = "@_table_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"] = $mod->name;
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
 

$division->prints["match_home"] = $cmr->translate(" |Home| ");

$division->prints["match_link_new_" . $table_name] = $cmr->module_icon("new_" . $table_name . ".php", "16") . $cmr->module_link("modules/new_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_update_" . $table_name] = $cmr->module_icon("update_" . $table_name . ".php", "16") . $cmr->module_link("modules/update_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_view_" . $table_name] = $cmr->module_icon("view_" . $table_name . ".php", "16") . $cmr->module_link("modules/view_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_search_" . $table_name] = $cmr->module_icon("search_" . $table_name . ".php", "16") . $cmr->module_link("modules/search_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_delete_" . $table_name] = $cmr->module_icon("view_" . $table_name . ".php", "16") . $cmr->module_link("modules/view_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_report_" . $table_name] = $cmr->module_icon("report_" . $table_name . ".php", "16") . $cmr->module_link("modules/report_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");
$division->prints["match_link_preview_" . $table_name] = $cmr->module_icon("preview_" . $table_name . ".php", "16") . $cmr->module_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/modules/conf_" . $table_name . ".ini");

$division->prints["match_link_menu_list"] = $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini", "", "", "", "", $mod->position);
$division->prints["match_exit"] = $cmr->translate("|Exit|");


$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_link_menu_general"] = $division->prints["match_link_menu_list"];



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "menu_" . $table_name);

// $templates_file = $cmr->good_file("template", "menu_" . $table_name);
$division->template = $division->load_template($templates_file);
  
$division->print_template("template");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>