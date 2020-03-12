<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








search.php,  2011-Oct
*/


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$search_view = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $search_view->load_themes($cmr->themes);

// $search_view->module["name"]= $mod->name;




$search_view->module["title"] = $cmr->translate($mod->base_name); 
//$search_view->module["title"] = " Search";
// $search_view->module["text"] = "";


$search_view->prints["match_open_windows"] = $search_view->show_noclose();

// $search_view->prints["match_@_table_@_title1"] = $cmr->translate($mod->base_name);
// $search_view->prints["match_@_table_@_title2"] = ucfirst($cmr->language['" . $mod->base_name . "_title']);
$search_view->prints["match_hidden_inputs"] = "";
$search_view->prints["match_select_table"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_noc_type"))
if(($cmr->db_connection)){
    $tables = sql_run("array", $cmr->db_connection, "show_tables", "", $cmr->get_conf("db_name"));
    if($tables)
    foreach($tables[0] as $table){
        ${$table} = sql_run("array", $cmr->db_connection, "show_columns", "", $cmr->get_conf("db_name"), $table);
        $columns = implode(${$table}[0], ", ");
        $columns = "all, " . $columns;
        $search_view->prints["match_hidden_inputs"] .= "<input type=\"hidden\" name=\"" . $table . "\" value=\"" . $columns . "\"  />";
    $search_view->prints["match_select_table"] .= "<option value=\"" . $table . "\">" . ucfirst($cmr->translate("" . cmr_search_replace($cmr->get_conf("cmr_table_prefix"), "", $table))) . "</option>";
    }
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$search_view->prints["cmr_www_path"] = $cmr->get_path("www");
$search_view->prints["match_form_param"] = "";
$search_view->prints["match_form_id"] = "search";

$search_view->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$search_view->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_search.php\" name=\"cmr_get_data\" />");
$search_view->prints["match_input_hidden_conf"] = "";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$search_view->prints["match_label_text"] = $cmr->translate("text");

$search_view->prints["match_extend_inputs"] = "";
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_noc_type")){
    // mostra();nascondi();
    $search_view->prints["match_extend_inputs"] .= "<input type=\"button\" value=\"+\" id=\"two_search\" onclick=\"show('table_search');show('one_search');hide('two_search');\">";
    $search_view->prints["match_extend_inputs"] .= "<input style=\"visibility:hidden; display:none\" type=\"button\" value=\"-\" id=\"one_search\" onclick=\"hide('table_search');show('two_search');hide('one_search');\" >";
    // echo "<input type=\"checkbox\" ondblclick=\"hide('table');hide('column');\">";
}

$search_view->prints["match_label_options"] = $cmr->translate("options");;
$search_view->prints["match_label_like"] = $cmr->translate('like');
$search_view->prints["match_label_any"] = $cmr->translate('any');
$search_view->prints["match_label_all"] = $cmr->translate('all');
$search_view->prints["match_label_regexp"] = $cmr->translate('regexp');


if(($cmr->get_page("default_search"))) $cmr->config["cmr_default_table"] = $cmr->get_page("default_search");
$search_view->prints["match_value_default_table"] = $cmr->get_conf("cmr_table_prefix") . $cmr->get_conf("cmr_default_table");
if(is_database($cmr->post_var, "table")) 
$search_view->prints["match_value_default_table"] = $cmr->post_var["current_database"] . "." . $cmr->post_var["current_table"];


$search_view->prints["match_label_all"] = $cmr->translate("All");

$search_view->prints["match_val_user"] = $cmr->get_conf("cmr_table_prefix") . "user";
$search_view->prints["match_label_user"] = $cmr->translate("User");;

$search_view->prints["match_val_groups"] = $cmr->get_conf("cmr_table_prefix") . "groups";
$search_view->prints["match_label_groups"] = $cmr->translate("Group");

$search_view->prints["match_val_user_groups"] = $cmr->get_conf("cmr_table_prefix") . "user_groups";
$search_view->prints["match_label_user_groups"] = $cmr->translate("User/Group");

$search_view->prints["match_val_father_groups"] = $cmr->get_conf("cmr_table_prefix") . "father_groups";
$search_view->prints["match_label_father_groups"] = $cmr->translate("Father Group");


$search_view->prints["match_label_comment"] = $cmr->translate("Comment");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$search_view->prints["match_reset_form"] = $cmr->translate("reset ?");
$search_view->prints["match_submit"] = $cmr->translate("search");
$search_view->prints["match_submit_java"] = $cmr->translate("search ?");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$search_view->prints["match_close_windows"] = $search_view->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_search" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_search" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_search" . $cmr->get_ext("template");
$search_view->template = $search_view->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$search_view->print_template("template");
$search_view->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
