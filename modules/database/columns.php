<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * columns.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






columns.php, Ver 3.03   
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
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_template($cmr->themes);
// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/login_db.php", "", $cmr->translate("DBMS"));
$division->module["title"] .= " => " . $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $division->module["title"] .= " => " . $cmr->module_link("modules/database/update_column.php?current_column=" . $cmr->post_var["current_column"], "", $cmr->post_var["current_column"]);
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
$division->prints["match_legend_link"] = $cmr->translate("link");

$division->prints["match_table_title1"] = "";
$division->prints["match_table_title2"] = "";
$division->prints["match_www_path"] = "";
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "";
$division->prints["match_input_hidden_module"] = "";
$division->prints["match_input_hidden_get"] = "";
$division->prints["match_input_hidden_conf"] = "";
$division->prints["match_reset_form"] = "";
$division->prints["match_submit"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["list_all_column"] = "";
$division->prints["match_options_column"] = "";
$division->prints["match_options_all_column"] = "";
$division->prints["match_value_run"] = "run";
$division->prints["list_all_database"] = "";
$division->prints["match_default_collation"] = "";
$division->prints["match_options_list_db"] = "";

$division->prints["match_label_add_column"] = $cmr->translate("add_column");
$division->prints["match_label_column"] = $cmr->translate("column");
$division->prints["match_label_at_end"] = $cmr->translate("at_end");
$division->prints["match_label_at_begin"] = $cmr->translate("at_begin");
$division->prints["match_label_after"] = $cmr->translate("after");
$division->prints["match_legend_table"] = $cmr->translate("table");
// list_all_column
$division->prints["match_label_order"] = $cmr->translate("order");
$division->prints["match_label_asc"] = $cmr->translate("asc");
$division->prints["match_label_desc"] = $cmr->translate("desc");
$division->prints["match_legend_move_table"] = $cmr->translate("move_table");
// list_all_database
$division->prints["match_label_auto_increment"] = $cmr->translate("auto_increment");
$division->prints["match_legend_table_option"] = $cmr->translate("table_option");
$division->prints["match_label_rename_table"] = $cmr->translate("rename_table");
$division->prints["match_label_coment_table"] = $cmr->translate("coment_table");
$division->prints["match_value_update"] = "update";
// $division->prints["match_value_comment1"] = "comment1";
$division->prints["match_label_engine"] = $cmr->translate("engine");
$division->prints["match_options_engine"] = print_collation($cmr->config["engine"]);
$division->prints["match_label_collation"] = $cmr->translate("collation");
$division->prints["match_options_db_collation"] = print_collation($cmr->config["collation"], $cmr->config["collation_title"]);
$division->prints["match_label_pack_keys"] = $cmr->translate("pack_keys");
$division->prints["match_label_checksum"] = $cmr->translate("checksum");
$division->prints["match_label_delay_key_write"] = $cmr->translate("delay_key_write");
$division->prints["match_label_auto_increment"] = $cmr->translate("auto_increment");
$division->prints["match_label_row_format"] = $cmr->translate("row_format");
$division->prints["match_legend_copy_table_to_db"] = $cmr->translate("copy_table_to_db");
$division->prints["match_label_struct_only"] = $cmr->translate("struct_only");
$division->prints["match_label_struct_and_data"] = $cmr->translate("struct_and_data");
$division->prints["match_label_data_only"] = $cmr->translate("data_only");
$division->prints["match_label_with_drop"] = $cmr->translate("with_drop");
$division->prints["match_label_auto_increment"] = $cmr->translate("auto_increment");
$division->prints["match_label_go_to_table"] = $cmr->translate("go_to_table");
$division->prints["match_legend_admin_table"] = $cmr->translate("admin_table");
$division->prints["match_label_check_table"] = $cmr->translate("check_table");
$division->prints["match_table_name"] = $table_name;
$division->prints["match_label_analyze_table"] = $cmr->translate("analyze_table");
$division->prints["match_label_repair_table"] = $cmr->translate("repair_table");
$division->prints["match_label_optimize_table"] = $cmr->translate("optimize_table");
$division->prints["match_label_flush_table"] = $cmr->translate("flush_table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_dbms"] = "";

$division->prints["match_input_hidden_database"] = "";

$division->prints["match_input_hidden_table"] = "";
$division->prints["match_label_after_select"] = $cmr->translate("after_select");

$division->prints["match_value_empty"] = "empty";
$division->prints["match_value_delete"] = "delete";

$division->prints["match_label_print"] = $cmr->translate("print");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$division->prints["match_menu_db"] = (cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/tables.php?current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/query_db.php?current_table=" . $cmr->post_var["current_table"], 1);
$division->prints["match_open_tab"] = ($lk->open_module_tab(3));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/new_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("insert"));
$lk->add_link("modules/database/search_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("search"));
$lk->add_link("modules/database/view_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("view elements"));
$lk->add_link("modules/database/export_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("export"));
$lk->add_link("modules/database/import_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("import"));
$lk->add_link("modules/database/report_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "&layer=2", "", $cmr->translate("report"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_list_link"] = ($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title"] = ($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title3"] = $cmr->translate("List Column of [") . $cmr->post_var["current_table"] . "]";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$sql_data = array();
$sql_data["from"] = " FROM ";
$sql_data["like"] = " LIKE '" . $cmr->post_var["current_table"] . "'";
$data_table = sql_run("array_assoc", $database_conn, "show_tables_status", "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], "", $sql_data);
    
//     * Name=cmr_download;
//     * Engine=MyISAM;
//     * Version=10;
//     * Row_format=Dynamic;
//     * Rows=0;
//     * Avg_row_length=0;
//     * Data_length=0;
//     * Max_data_length=281474976710655;
//     * Index_length=1024;
//     * Data_free=0;
//     * Auto_increment=1;
//     * Create_time=2010-12-12 02:41:01;
//     * Update_time=2010-12-12 03:41:01;
//     * [Check_time:
//       (
//           o
//     o
//       )];
//     * Collation=latin1_swedish_ci;
//     * [Checksum:
//       (
//           o
//     o
//       )];
//     * Create_options=;
//     * Comment=Table of file to download;
$division->prints["match_value_pack_keys"] = "";
$division->prints["match_check_delay_key_write"] = "";
$division->prints["match_check_checksum"] = "";

$division->prints["match_value_engine"] = $data_table[0]["Engine"];
$division->prints["match_value_comment"] = $data_table[0]["Comment"];;
$division->prints["match_value_collation"] = $data_table[0]["Collation"];;
if(!empty($data_table[0]["Checksum"]))
$division->prints["match_check_checksum"] = "checked";
$division->prints["match_value_auto_increment"] = $data_table[0]["Auto_increment"];;
$division->prints["match_value_row_format"] = $data_table[0]["Row_format"];;

// $division->prints["match_value_pack_keys"] = $data_table["pack_keys"];;
// $division->prints["match_check_delay_key_write"] = $data_table["delay_key_write"];;

// $data_object = sql_run("array", $database_conn, $action = "show_tables", "", $cmr->post_var["current_database"]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = $cmr->get_path("module") . "modules/database/templates/template_columns" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_module1"] = cmr_input_hidden("middle1","modules/database/update_column.php", "hidden");
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
$data_object = sql_run("array", $database_conn, $action = "show_columns", "", $cmr->post_var["current_database"], $cmr->post_var["current_table"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  ALTER TABLE `cmr_asset` ADD `Campo1` VARCHAR( 25 ) UNSIGNED CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL AUTO_INCREMENT COMMENT 'Commenti1' AFTER `login_id` ,
// ADD `Campo2` YEAR( 4 ) UNSIGNED ZEROFILL NOT NULL DEFAULT '2000' COMMENT 'Commenti2' AFTER `Campo1` ,
// ADD PRIMARY KEY (`Campo2` ) ,
// ADD UNIQUE (
// `Campo1`
// ) 
// 
// ALTER TABLE `cmr_asset` CHANGE `login_id` `login_id` VARCHAR( 254 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Commenti1'
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($data_object[0]))
foreach($data_object[0] as $key => $val){
  $division->prints["match_table_key"] = $key;
  $division->prints["match_table_link"] = $cmr->module_icon($val, "16") . $cmr->module_link("modules/database/update_column.php?current_column=" . $val, "", $val);
  $division->prints["match_action_links"] = $cmr->module_link("modules/database/result_sql.php&sql=ALTER TABLE " . $cmr->post_var["current_table"] . " DROP (`" . $val . "`);", $cmr->get_path("www") . "images/icon/delete_icon.png", $val, 15, 15);
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW FULL COLUMNS FROM  " . $database . "." . $table_name . " LIKE '" . $val . "';&sql_xml=0\" label=\"" . $cmr->translate("FULL COLUMNS") . "\">" . $cmr->translate("[F]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=ALTER TABLE " . $cmr->post_var["current_table"] . " DROP PRIMARY KEY, ADD PRIMARY KEY (`" . $val . "`);\" label=\"" . $cmr->translate("PRIMARY KEY") . "\" onclick=\"return confirm(' !!!!!!!!! ALTER TABLE PRIMARY KEY!!!!!!! ???????')\" >" . $cmr->translate("[K]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=ALTER TABLE " . $cmr->post_var["current_table"] . " ADD UNIQUE (`" . $val . "`);\" label=\"" . $cmr->translate("UNIQUE") . "\" onclick=\"return confirm(' !!!!!!!!! ALTER TABLE IN UNIQUE!!!!!!! ???????')\" >" . $cmr->translate("[U]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=ALTER TABLE " . $cmr->post_var["current_table"] . " ADD INDEX (`" . $val . "`);\" label=\"" . $cmr->translate("INDEX") . "\" onclick=\"return confirm(' !!!!!!!!! ALTER TABLE IN INDEX!!!!!!! ???????')\" >" . $cmr->translate("[I]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=ALTER TABLE " . $cmr->post_var["current_table"] . " ADD FULLTEXT (`" . $val . "`);\" label=\"" . $cmr->translate("FULLTEXT") . "\" onclick=\"return confirm(' !!!!!!!!! ALTER TABLE IN FULLTEXT!!!!!!! ???????')\" >" . $cmr->translate("[T]") . "</a>";
	$division->print_template("template2");
};  
$division->prints["match_options_list_column"] = select_order(array(), $data_object[0], $data_object[0]);
$data_object1 = (sql_run("show_databases", $database_conn));
$division->prints["match_options_list_db"] = select_order(array(), $data_object1[0], $data_object1[0]);
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
