<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_core.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
view_core.php, Ver 3.03, 2011-08-22 18:00:00
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
// $column_id = "@_column_id_@";
// $date_time1 = "@_column_date_time1_@";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$pdf_data_text = "";
$matrix = array();
$base_name = $mod->base_name;
$tab_mode = array("link_tab", "link_update", "link_print");
$date_time_base1 = $date_time1 . "_" . $base_name;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * loading configurations files, fonctions and languages file need by this module
 */
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $table_name . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_" . $table_name . $cmr->get_ext("conf"));
$cmr->help = $mod->load_help($table_name . $cmr->get_ext("help"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $GLOBALS[$table_name . "_read"] = $cmr->readed_line($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * getting values usefull to determinate number of line
 * getting var use to inver fiter condition (like)
 * getting the page number in with to jump
 * getting the mode to show rows
 * getting the value usefull to order in descendend or ascendent
 * getting the column usefull to order the table
 */
$cmr->post_var = cmr_view_post_var($cmr->post_var, $table_name, $base_name, $column_id, $date_time_base1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * default sql string value
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $table_name;
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
if(empty($cmr->query[$table_name])) $cmr->query[$table_name] = "";
$cmr->query[$table_name] = $cmr->sql_view($cmr->query[$table_name], $cmr->config["cmr_table_prefix"] . $table_name, $base_name, $date_time1);
//print($table_name . "=". $cmr->query[$table_name]);
/**
 * complete  the sql string with the limit condition
 */
//$cmr->query[$table_name] .= " LIMIT " . intval($cmr->post_var[$base_name . "_limit"]) . ";";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$matrix = cmr_view_matrix($cmr->db_connection, $cmr->query[$table_name], intval($cmr->post_var[$base_name . "_limit"]), intval($cmr->post_var[$base_name . "_page"]));
//print_r($matrix);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($matrix["num_view"])) $matrix["num_view"] = 0;
if(empty($matrix["total"])) $matrix["total"] = 0;
if(empty($matrix["num_page"])) $matrix["num_page"] = 0;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_legend_link"] = "+";
$view_win->prints["match_table_link_all"] = "";
$view_win->prints["match_form_id"] = "view_form";
$view_win->prints["match_input_hidden_module"] = "";
$view_win->prints["match_input_hidden_get"] = "";
$view_win->prints["match_input_hidden_conf"] = "";
$view_win->prints["match_input_hidden_search"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_button_assign_del"] = "";
$view_win->prints["match_message_link_all"] = "";
$view_win->prints["match_show_next_preview_bar"] = "";
$view_win->prints["match_num_view"] = "";
$view_win->prints["match_pdf_title"] = "";
$view_win->prints["match_pdf_author"] = "";
$view_win->prints["match_pdf_file"] = "";
$view_win->prints["match_pdf_links"] = "";
$view_win->prints["match_pdf_data_type"] = "";
$view_win->prints["match_pdf_dim_col"] = "";
$view_win->prints["match_pdf_header"] = "";
$view_win->prints["match_pdf_data"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_hidden_page"] = "";
$view_win->prints["match_table_page"] = "";
$view_win->prints["match_page_0"] = "";
$view_win->prints["match_option_page"] = "";
$view_win->prints["match_label_limit"] = "";
$view_win->prints["match_value_limit"] = "";
$view_win->prints["match_value_columns"] = "";
$view_win->prints["match_table_link_input"] = "";
$view_win->prints["match_date_style1"] = "";
$view_win->prints["match_date_style2"] = "";
$view_win->prints["match_date_value1"] = "";
$view_win->prints["match_date_value2"] = "";
$view_win->prints["match_view_order"] = "";
$view_win->prints["match_table_link_titles"] = "";
$view_win->prints["match_view_date_time"] = "";
$view_win->prints["match_view_link"] = "";
$view_win->prints["match_list_link"] = "";
$view_win->prints["match_last_line"] = "";
$view_win->prints["match_checked"] = "";
$view_win->prints["match_value_search"] = "";
$view_win->prints["match_options_action"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_text"] = "text";
$view_win->prints["match_input_submit"] = "submit";
$view_win->prints["match_input_select"] = "";

$view_win->prints["match_submit_action"] = ">";
$view_win->prints["match_value_action"] = "view";
$view_win->prints["match_lang_action"] = $cmr->translate("View");
$view_win->prints["match_lang_view"] = $cmr->translate("View");
$view_win->prints["match_lang_update"] = $cmr->translate("Update");
$view_win->prints["match_lang_delete"] = $cmr->translate("Delete");
$view_win->prints["match_lang_policy"] = $cmr->translate("Policy");
$view_win->prints["match_lang_comment"] = $cmr->translate("Comment");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_www_path"] = $cmr->get_path("www");
$view_win->prints["match_form_param"] = "cmr_get_data=get_data/get_view_" . $table_name . ".php";
$view_win->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_open_tab"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $view_win->prints["match_options_action"] .= "<option value=\"print\">" . $cmr->translate("print") . "</option>";
// $view_win->prints["match_options_action"] .= "<option value=\"filter\">" . $cmr->translate("filter") . "</option>";
// $view_win->prints["match_options_action"] .= "<option value=\"sum\">" . $cmr->translate("sum") . "</option>";
// $view_win->prints["match_options_action"] .= "<option value=\"max\">" . $cmr->translate("max") . "</option>";
// $view_win->prints["match_options_action"] .= "<option value=\"min\">" . $cmr->translate("min") . "</option>";
// $view_win->prints["match_options_action"] .= "<option value=\"min\">" . $cmr->translate("min") . "</option>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($cmr->post_var[$base_name . "_not"])) $view_win->prints["match_checked"] = "checked";
$view_win->prints["match_value_columns"] = $cmr->post_var[$base_name . "_columns"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $view_win->themes["win_type"] = "default";
// $view_win->module["name"] = $mod->name;
// $view_win->module["title"] = $cmr->translate($base_name);
$view_win->module["title"] = $cmr->translate($base_name) . " (" . $matrix["total"] . ")";

if(!empty($cmr->action[$table_name . "_title"])) $view_win->module["title"] = $cmr->action[$table_name . "_title"];
// $view_win->text = "";
$view_win->prints["match_open_windows"] = $view_win->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_" . $table_name . "_title1"] = "";
$view_win->prints["match_" . $table_name . "_title2"] = "";
if(isset($cmr->language[$base_name])) $view_win->prints["match_" . $table_name . "_title1"] = $cmr->translate($base_name);
if(isset($cmr->language[$base_name."_title"])) $view_win->prints["match_" . $table_name . "_title2"] = $cmr->translate($base_name . "_title");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->action[$date_time_base1])) $cmr->action[$date_time_base1] = "";
if(empty($cmr->action[$table_name . "_module"])) $cmr->action[$table_name . "_module"] = __FILE__;
if(!empty($cmr->action[$table_name . "_title1"])) $view_win->prints["match_" . $table_name . "_title1"] = $cmr->action[$table_name . "_title1"];
if(!empty($cmr->action[$table_name . "_title2"])) $view_win->prints["match_" . $table_name . "_title1"] = $cmr->action[$table_name . "_title2"];
if(empty($cmr->action[$table_name . "_module"])) $view_win->prints["match_" . $table_name . "_module"] = $cmr->action[$table_name . "_module"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["__columns__"] = intval($cmr->post_var[$base_name . "_columns"]);
$cmr->page["__table__"] = $table_name;
$cmr->page["__mode__"] = $cmr->post_var[$base_name . "_mode"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!List page!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_table_page"] = $cmr->post_var[$base_name . "_page"];
$view_win->prints["match_page_0"] = $cmr->translate("Page 0");
for($ip = 1; $ip < $matrix["num_page"]; $ip++)
$view_win->prints["match_option_page"] .= "<option value=\"" . $ip . "\">" . $cmr->translate("Page") . " " . $ip . "</option>";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_hidden_page"] = input_hidden("<input type=\"hidden\" value=\"" . $mod->path . "\" name=\"" . $mod->position . "\" />");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$array_column = cmr_get_view_columns($cmr->config, $cmr->page["__columns__"], $table_name);
$cmr->page["__array_column__"] = $array_column;
//print_r($array_column);
$i_col = count($array_column) + 1;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(in_array($cmr->page["__mode__"], $tab_mode)){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->page["__mode__"] == "link_update") {
	$view_win->prints["match_value_action"] = "update";
	$view_win->prints["match_" . $table_name . "_title1"] = $cmr->translate("Select and change after click [Update ...]");
	$matrix["table"][] = array();
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!Table header!!!!!!!!!!!!!!!!!!!!
foreach($array_column as $key => $one_column){
	$module_column = $one_column . "_" . $base_name;
	if(empty($cmr->action[$module_column])) $cmr->action[$module_column] = "";
    empty($cmr->post_var[$module_column]) ? $get_column = "" : $get_column = $cmr->post_var[$module_column];

	$module_link = ucfirst($cmr->translate("" . $one_column));
	$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $one_column . "&" . $base_name . "_desc=ASC", "", chr(94), "", "", $mod->position, " class=\"header\" ");
	$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $one_column . "&" . $base_name . "_desc=DESC", "", "v", "", "", $mod->position, " class=\"header\" ");
	$view_win->prints["match_table_link_input"] .= cmr_view_header($get_column, $module_column, $cmr->page["__mode__"]);
	$view_win->prints["match_table_link_titles"] .= cmr_view_header_links($module_link, $cmr->action[$module_column]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $view_win->prints = cmr_get_view_header($cmr->post_var, $cmr->action, $view_win->prints, $array_column, $get_column, $module_column, $module_link, $cmr->page["__mode__"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!Data time Hearder!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints = cmr_get_view_date_time($cmr->post_var, $view_win->prints, $date_time_base1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$module_link = ucfirst($column_id);
$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $column_id . "&" . $base_name . "_desc=ASC", "", chr(94), "", "", $mod->position, " class=\"header\" ");
$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $column_id . "&" . $base_name . "_desc=DESC", "", "v", "", "", $mod->position, " class=\"header\" ");
$view_win->prints["match_view_order"] = $module_link;
// $cmr->module_link($mod->name . "?" . $base_name . "_order=id&" . $base_name . "_desc=" . $cmr->post_var[$base_name . "_desc"], "", $cmr->config["column_id_" . $table_name], "", "", $mod->position, "  class=\"header\" ");

$module_link = ucfirst($cmr->translate("date_time"));
$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $date_time1 . "&" . $base_name . "_desc=ASC", "", chr(94), "", "", $mod->position, " class=\"header\" ");
$module_link .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $date_time1 . "&" . $base_name . "_desc=DESC", "", "v", "", "", $mod->position, " class=\"header\" ");
$view_win->prints["match_view_date_time"] = $module_link . $cmr->action[$date_time_base1];
$view_win->prints["match_view_link"] = $cmr->translate("Link");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_fieldset_legend"] = $cmr->translate($table_name);
$view_win->prints["match_num_row_link"] =  $cmr->module_link($mod->name . "?left1=&middle2=&middle3=", "", $cmr->translate("Zero") . " " . $cmr->translate("finded") . " (" . $matrix["total"] . ") <b>" . $table_name . " </b>");
$view_win->module["title"] = $cmr->translate($base_name) . " (" . $matrix["total"] . ")";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["__table__"] = $table_name;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/**
 * calling the function to show link to the row rispect to the current mode
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
foreach($matrix["table"] as $key => $value){
if(!empty($value)){
	$cmr->page["__number__"] = $key ;
    $last_id = $value[$cmr->config["column_id_" . $table_name]];
	$pdf_data_text .= "\nDATE:" . $value[$date_time1] . "\n" . $cmr->translate("Text") . ":\n" . implode("\n", $value) .  "\n===========================\n";
    $view_win->prints["match_table_link_all"] .= $cmr->link_default($value);
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_num_view"] = $key ;
$view_win->prints["match_last_line"] = ($i_col + 3);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_label_search"] = $cmr->translate("Search");
$view_win->prints["match_label_limit"] = $cmr->translate("Limit");
$view_win->prints["match_value_limit"] = $cmr->post_var[$base_name . "_limit"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("search_text")) {
	$cmr->post_var["search_text"] = get_post("search_text");
	$view_win->prints["match_value_search"] = $cmr->post_var["search_text"];
	$post_var[$base_name . "_search"] = $cmr->post_var["search_text"];
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_value_search"] = $cmr->post_var[$base_name . "_search"];
if(empty($cmr->post_var["search_text"])) $cmr->post_var["search_text"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_hidden_search"] = cmr_input_hidden("search_text", $cmr->post_var["search_text"], "hidden");
$view_win->prints["match_num_row_link"] = $cmr->module_link($mod->name . "?left1=&middle2=&middle3=", "", "(" . $matrix["num_view"] . ")/(" . $matrix["total"] . ")");
$view_win->prints["match_num_row_link"] .= $cmr->module_link("modules/menu_" . $table_name . ".php?left1=&middle2=&middle3=", "", $cmr->translate($table_name));
$view_win->prints["match_base_name"] = $base_name;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * declaration
 */
file_exists($cmr->config["get_view_" . $table_name]) ? $get_file = $cmr->config["get_view_" . $table_name] : $get_file = $cmr->get_path("get_data") . "get_data/get_view_" . $table_name . ".php";
// file_exists($cmr->config["path_view_" . $table_name]) ? $path_file = $cmr->config["path_view_" . $table_name] :
$path_file = $cmr->action[$table_name . "_module"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_module"] = cmr_input_hidden("class_module", $path_file, "hidden");
$view_win->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", $get_file, "hidden");
$view_win->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_" . $table_name . $cmr->get_ext("conf"), "hidden");
$view_win->prints["match_button_assign_del"] = $cmr->view_assign_del($base_name . "_mode");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($last_id))
$view_win->prints["match_show_next_preview_bar"] = $cmr->next_preview_bar($base_name, $matrix["num_page"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_pdf_title"] = $table_name;
$view_win->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$view_win->prints["match_pdf_file"] = "";
$view_win->prints["match_pdf_links"] = "";
$view_win->prints["match_pdf_data_type"] = "text";
$view_win->prints["match_pdf_dim_col"] = "0";
$view_win->prints["match_pdf_header"] = "";
$view_win->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$view_win->prints["match_pdf_confirm"] = $cmr->translate("confirm ?");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1);
$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->action[$table_name . "_tab"])){
	$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "new");
	$lk->add_link("modules/update_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "upadte");
	$lk->add_link("modules/search_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "search");
	$lk->add_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "preview");
	$lk->add_link("modules/report_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "report");
	$lk->add_link("modules/view_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "view");
  $division->prints["match_open_tab"] = $lk->open_module_tab(3);
	$view_win->prints["match_close_tab"] = close_module_tab();
}elseif($cmr->action[$table_name . "_tab"] == "."){
	$view_win->prints["match_open_tab"] = "";
	$view_win->prints["match_close_tab"] = "";
}else{
	$view_win->prints["match_open_tab"] = $cmr->action[$table_name . "_tab"];
	$view_win->prints["match_close_tab"] = close_module_tab();
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_close_windows"] = $view_win->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "view_" . $table_name);
$view_win->template = $view_win->load_template($templates_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(in_array($cmr->page["__mode__"], $tab_mode)){
	$view_win->print_template("template1");
}else{
	$view_win->print_template("template2");
	}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * free memory and reset some var
 */
$last_id = "";
$cmr->query[$table_name] = "";
$value = array();
$view_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
