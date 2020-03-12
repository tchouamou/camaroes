<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * databases.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.







databases.php, Ver 3.03   
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr_data = cmr_db_init_data($cmr->db_connection, $cmr->config, $cmr->post_var, $cmr->db, $result_type)
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["_database_"] = $database;
$val_table["_table_"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_template($cmr->themes);
// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/login_db.php", "", $cmr->translate("DBMS"));
$division->module["title"] .= " => " . $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
// $division->module["text"] = "";
// $division->themes["text_align"] = "center";






$division->themes["header_visible"] = 1;
$division->themes["header_tools_left"] = 0;
$division->themes["header_tools_right"] = 0;
$division->themes["header_bgcolor"] = "#000000";
$division->themes["header_color"] = "#FFFFFF";
$division->themes["header_align"] = "left";
$division->themes["header_border"] = "1";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "1";
$division->prints["match_open_windows"] = ($division->show_noclose());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = "";
$division->prints["match_submit"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["match_label_collation"] = $cmr->translate("collation");
$division->prints["match_default_collation"] = "";
$division->prints["match_default_collation"] = "";
$division->prints["match_options_db_collation"] = print_collation($cmr->config["collation"], $cmr->config["collation_title"]);
$division->prints["match_submit"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["match_www_path"] = "";
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "";
$division->prints["match_label_new_database"] = $cmr->translate("new_database");
$division->prints["match_default_collation"] = "";
$division->prints["match_default_collation"] = "";
$division->prints["match_submit_create"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["match_legend_link"] = "-";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_db_same_priv"] = $cmr->translate("db_same_priv");
$division->prints["match_label_copy_database"] = $cmr->translate("copy database");
$division->prints["match_label_rename_database"] = $cmr->translate("rename database");
$division->prints["match_label_db_name"] = $cmr->translate("db_name");
$division->prints["match_label_database"] = $cmr->translate("database");


$division->prints["match_label_all_priv_at"] = $cmr->translate("all_priv_at");
$division->prints["match_legend_db_user"] = $cmr->translate("database user");
$division->prints["match_label_username"] = $cmr->translate("username");
$division->prints["match_label_any_user"] = $cmr->translate("any_user");
$division->prints["match_label_use_text"] = $cmr->translate("use_text");
$division->prints["match_label_host"] = $cmr->translate("host");
$division->prints["match_label_local"] = $cmr->translate("local");
$division->prints["match_label_table_host"] = $cmr->translate("table_host");
$division->prints["match_label_text"] = $cmr->translate("text");
$division->prints["match_label_no_pw"] = $cmr->translate("no_pw");
$division->prints["match_label_pw"] = $cmr->translate("password");

$division->prints["match_label_use_text"] = $cmr->translate("use_text");
$division->prints["match_label_db_user"] = $cmr->translate("db_user");
$division->prints["match_label_none"] = $cmr->translate("none");
$division->prints["match_legend_global"] = $cmr->translate("global");
$division->prints["match_legend_data"] = $cmr->translate("data");
$division->prints["match_label_struct"] = $cmr->translate("struct");
$division->prints["match_label_limit"] = $cmr->translate("limit");
$division->prints["match_label_no_limit"] = $cmr->translate("no_limit");
$division->prints["match_label_administate"] = $cmr->translate("administate");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_value_empty"] = "empty";
$division->prints["match_value_delete"] = "delete";
$division->prints["match_label_after_select"] = $cmr->translate("after_select");

$division->prints["match_label_print"] = $cmr->translate("print");

$division->prints["match_value_run"] = "run";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if(empty($cmr->post_var["current_column"])) $cmr->post_var["current_column"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$division->prints["match_menu_db"] = (cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$division->prints["match_open_tab"] = ($lk->open_module_tab(1));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_list_link"] = ($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title"] = ($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title3"] = $cmr->translate("List database of [") . $cmr->post_var["current_dbms"] . "]";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle1", __FILE__, "hidden");
$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", "modules/database/get_data/get_databases.php", "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_table" . $cmr->get_ext("conf"), "hidden");
$division->prints["match_input_hidden_dbms"] = cmr_input_hidden("current_dbms", $cmr->post_var["current_dbms"], "hidden");
$division->prints["match_input_hidden_database"] = cmr_input_hidden("current_database", $cmr->post_var["current_database"], "hidden");
$division->prints["match_input_hidden_table"] = cmr_input_hidden("current_table", $cmr->post_var["current_table"], "hidden");
$division->prints["match_input_hidden_column"] = cmr_input_hidden("current_column", $cmr->post_var["current_column"], "hidden");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = $cmr->get_path("module") . "modules/database/templates/template_databases" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template("template1");
// -----------
// $cmr->page["middle1"] = "detail_database.php";
// -----------
$data_object = (sql_run("show_databases", $database_conn));
// {SET CHARACTER SET charset_name;}
// {DROP DATABASE `tstm_db2_13_08_2011`;}
if(!empty($data_object[0]))
foreach($data_object[0] as $key => $val){
  $division->prints["match_table_key"] = $key;
  $division->prints["match_table_link"] = $cmr->module_link("modules/database/tables.php?current_database=" . $val . "&current_table=&current_column=", "", "[" . $val . "]");
  $division->prints["match_action_links"] = $cmr->module_link($mod->path . "?view_mode=link_tab", $cmr->get_path("www") . "images/icon/delete_icon.png", $cmr->translate("Table view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("Table")) . " alt=\"" . ($cmr->translate("Table")) . "\"");
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW CREATE DATABASE " . $val . ";&sql_xml=1\" label=\"" . $cmr->translate("SOURCE DATABASE") . "\">" . $cmr->translate("[V]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW TABLE STATUS FROM " . $database . ";&sql_xml=1\" label=\"" . $cmr->translate("DATABASE STATUS") . "\">" . $cmr->translate("[S]") . "</a>";
//     $str .= $cmr->module_link($mod->path . "?view_mode=link", $cmr->get_path("www") . "images/icon/font_icon.png", $cmr->translate("List view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("links ")) . " alt=\"" . ($cmr->translate("links ")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_detail", $cmr->get_path("www") . "images/icon/justify_icon.png", $cmr->translate("Detail view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("Details")) . " alt=\"" . ($cmr->translate("Details")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_update", $cmr->get_path("www") . "images/icon/text_icon.png", $cmr->translate("Update view"), 20, 20, "middle1", "", " title=\"" . ($cmr->translate("Update")) . " alt=\"" . ($cmr->translate("Update")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_print", $cmr->get_path("www") . "images/icon/print_icon.png", $cmr->translate("Print view"), 20, 20, "middle1", "", " title=\"" . ($cmr->translate("Print")) . " alt=\"" . ($cmr->translate("Print")) . "\"");
	$division->print_template("template2");
};

$division->prints["match_options_list_db"] = select_order(array(), $data_object[0], $data_object[0]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
