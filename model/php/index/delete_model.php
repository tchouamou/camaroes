<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * delete_@_table_@.php
 * ------------------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

delete_@_table_@.php,Ver 3.0  @_date_time_@
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module windows
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_@_table_@.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["cmr_get_data"] = get_post("cmr_get_data");
if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $cmr->module["base_name"] . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $division->module["name"]= $cmr->get_module("name");
// $division->module["text"] = "";
$division = new open_window($cmr->page, $cmr->module, $cmr->themes);
$division->module["title"]= $cmr->translate($cmr->module["base_name"]); 
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_@_table_@_title1"] = ""; 
$division->prints["match_@_table_@_title2"] = ""; 
if(isset($cmr->language[$cmr->module["base_name"]])) 
$division->prints["match_@_table_@_title1"] = $cmr->translate($cmr->module["base_name"]);
if(isset($cmr->language[$cmr->module["base_name"]."_title"])) 
$division->prints["match_@_table_@_title2"] = $cmr->translate($cmr->module["base_name"] . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_@_table_@"])) $cmr->post_var["id_@_table_@"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_@_table_@.php?conf_name=conf.d/conf_new_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "new");
	$lk->add_link("modules/update_@_table_@.php?conf_name=conf.d/conf_update_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "upadte");
	$lk->add_link("modules/search_@_table_@.php?conf_name=conf.d/conf_search_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "search");
	$lk->add_link("modules/delete_@_table_@.php?conf_name=conf.d/conf_delete_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "delete");
	$lk->add_link("modules/view_@_table_@.php?conf_name=conf.d/conf_view_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "view");
	$lk->add_link("modules/report_@_table_@.php?conf_name=conf.d/conf_report_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "report");
	$lk->add_link("modules/preview_@_table_@.php?conf_name=conf.d/conf_preview_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1, "preview");
$division->prints["match_open_tab"] = $lk->open_module_tab(3);

$lk = new module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_@_table_@.php?conf_name=conf.d/conf_menu_@_table_@" . $cmr->get_ext("conf") . "&id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 1);
$division->prints["match_list_link"] = $lk->list_link();
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "delete_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_delete_@_table_@.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = input_hidden("<input type=\"hidden\" value=\"conf.d/modules/conf_delete_@_table_@" . $cmr->get_ext("conf") . "\" name=\"cmr_conf\" />");

$division->prints["match_legend_@_table_@"] = $cmr->translate("@_table_@");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints['match_class_strong'] = $cmr->translate("delete @_table_@");
  $division->prints['match_label_delete'] = "@_table_@";
  $division->prints['match_@_table_@_@_column_unique1_@'] = $cmr->translate("@_column_unique1_@") . ":";
  $division->prints['match_class_select'] = "select";
  $division->prints['match_select_option'] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->post_var["id_@_table_@"]){
   $object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "@_table_@", "@_column1_@,@_column2_@,@_column3_@", "@_column_id_@", $cmr->post_var["id_@_table_@"]);
   if(empty($object)) $object = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "@_table_@", "*", "@_column_id_@", $cmr->post_var["id_@_table_@"]);

   $object_explode = implode($object , "|");
   $selected = substr($object_explode, 0, 50);
   $division->prints['match_select_option'] .= "<option value=\"" . $cmr->post_var["id_@_table_@"] . "\" selected>" . $selected . "</option>";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints['match_select_option'] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "@_table_@", "@_column1_@,@_column2_@,@_column3_@", "column", "", "@_column_id_@", $cmr->get_conf("cmr_max_view"), "@_column_id_@");
$division->prints["match_select_link"] = $cmr->module_link("modules/view_@_table_@.php?id_@_table_@=" . $cmr->post_var["id_@_table_@"] . "", 0, "+");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("delete_@_table_@");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to delete this @_table_@");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file=$cmr->good_file("template", "delete_@_table_@");
$division->template = $division->load_template($templates_file);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
