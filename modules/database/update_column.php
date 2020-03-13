<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update_column.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











update_column.php, Ver 3.03 
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr_data = cmr_db_init_data($cmr->db_connection, $cmr->config, $cmr->post_var, $cmr->db, $result_type)
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$cmr->action["table_name"] = $cmr->post_var["current_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_template($cmr->themes);
// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/update_column.php?current_column=" . $cmr->post_var["current_column"], "", $cmr->post_var["current_column"]);
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_link"] = $cmr->translate("link");
$division->prints["match_table_title1"] = $cmr->translate("Column for ") . "[" . $table_name . "]";
$division->prints["match_table_title2"] = "";
$division->prints["match_www_path"] = "";
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "";

$division->prints["db_name"] = "";
$division->prints["table_name"] = "";
// db_name
// table_name
$division->prints["match_label_field"] = $cmr->translate("field");
$division->prints["match_table_name"] = "";
$division->prints["match_label_type"] = $cmr->translate("type");
$division->prints["match_default_column_type"] = "";
$division->prints["match_options_column_type"] = print_collation($cmr->config["column_type"]);
$division->prints["match_label_length"] = $cmr->translate("length");
$division->prints["match_label_default"] = $cmr->translate("default");
$division->prints["match_label_none"] = $cmr->translate("none");
$division->prints["match_label_default"] = $cmr->translate("default");
$division->prints["match_label_collation"] = $cmr->translate("collation");
$division->prints["match_default_collation"] = "";
$division->prints["match_options_db_collation"] = print_collation($cmr->config["collation"], $cmr->config["collation_title"]);
$division->prints["match_label_attrib"] = $cmr->translate("attrib");
$division->prints["match_label_auto_increment"] = $cmr->translate("auto_increment");
$division->prints["match_label_comment"] = $cmr->translate("comment");
$division->prints["match_reset_form"] = "";
$division->prints["match_submit"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["match_value_save"] = "save";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_open_tab"] = "";
 // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_list_link"] = ($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_column_title"] = $cmr->post_var["current_column"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title"] = $cmr->get_title($mod->base_name);
$division->prints["match_table_title4"] = $cmr->translate("change table:") . " (" . $cmr->post_var["current_table"] . ")";
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
// $authorisation = (($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type"));
// $cmr->post_var["sql"] = "SHOW FULL COLUMNS FROM " . $cmr->post_var["current_table"] . " FROM " .$cmr->post_var["current_database"] . " LIKE '%" . $cmr->post_var["current_column"] . "%';";
// $cmr->db["affected_rows0"] = cmr_preview_sql($database_conn, $cmr->post_var["sql"], "normal", $authorisation);
// // $cmr->db["affected_rows0"] = cmr_preview_sql($database_conn, $cmr->post_var["sql"], "xml", $authorisation);
// 
// // $cmr->post_var["sql"] = "SELECT " . $cmr->post_var["current_column"] . " FROM " . $cmr->post_var["current_database"] . "." . $cmr->post_var["current_table"] . " WHERE 1";
// // $cmr->db["affected_rows0"] = cmr_preview_sql($database_conn, $cmr->post_var["sql"], "normal", $authorisation);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$list_option = . "<option value = \"ALTER TABLE " . $db . $table . " MODIFY " . $field . " " . $new_field . " " . $new_type . ";" . ";\">change_field_type</option>";
// 	$list_option = . "<option value = \"ALTER TABLE " . $db . $table . " ALTER " . $field . " " . $new_field . " " . $new_type . ";" . ";\">new_default</option>";
// 	$list_option = . "<option value = \"ALTER TABLE " . $db . $table . " ALTER " . $field . " " . $new_field . " " . $new_type . ";" . ";\">change_default</option>";
// 	$list_option = . "<option value = \"SELECT FROM " . $db . $table . $field . " ALTER " . $field . " " . $new_field . " " . $new_type . " WHERE " . $where . ";" . ";\">alter_select</option>";
//         ALTER+TABLE+%60cmr_asset%60+ADD+UNIQUE%28%60id
//         ALTER+TABLE+%60cmr_asset%60+DROP+%60id
//         ALTER+TABLE+%60cmr_asset%60+DROP+PRIMARY+KEY%2C+ADD+PRIMARY+KEY%28%60id
//         ALTER+TABLE+%60cmr_asset%60+ADD+INDEX%28%60id
// 			ALTER TABLE cmr_asset ORDER BY id    
// ===============================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = $cmr->get_path("module") . "modules/database/templates/template_update_column" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template("template1");

$division->prints["match_value_default_type"] = "NONE";
$division->prints["match_value_length"] = "";
$division->prints["match_value_type"] = "TEXT";
$division->prints["match_value_collation"] = "";
$division->prints["match_value_attrib"] = "";
$division->prints["match_value_null"] = "NULL";
$division->prints["match_value_extra"] = "AUTO_INCREMENT";
$division->prints["match_value_comments"] = "";


$count = get_post("num_fields");
if(empty($count)) $count = 1;// $num_fields = $count;


// $val_co = get_all_columns($database_conn, "", $table_name, $cmr->post_var["current_column"]);
$val_co = get_table_columns($database, $table_name, $cmr->post_var["current_column"], $database_conn);
$val_column = $val_co[1][$cmr->post_var["current_column"]];
// cmr_print_r($val_column);


if(!empty($cmr->post_var["current_column"])){
$division->prints["match_name_name"] = $val_column["Field"];
$division->prints["match_column_title"] = $val_column["Field"];
$division->prints["match_value_name"] = $val_column["Field"];

$division->prints["match_value_type"] = $val_column["Type"];

$division->prints["match_value_null"] = $val_column["Null"];
$division->prints["match_value_extra"] = $val_column["Extra"];


if($val_column["Default"] == "NONE"){
	$division->prints["match_value_default_type"] = "NONE";
	$division->prints["match_value_default_value"] = "";
}elseif($val_column["Default"] == "USER_DEFINED"){
	$division->prints["match_value_default_type"] = "USER_DEFINED";
	$division->prints["match_value_default_value"] = $val_column["Default"];
}elseif($val_column["Default"] == "CURRENT_TIMESTAMP"){
	$division->prints["match_value_default_type"] = "CURRENT_TIMESTAMP";
	$division->prints["match_value_default_value"] = $val_column["Default"];
}else{
	$division->prints["match_value_default_type"] = "USER_DEFINED";
	$division->prints["match_value_default_value"] = $val_column["Default"];
}


$division->prints["match_check_null"] = "";
$division->prints["match_check_extra"] = "";
if(!empty($val_column["Null"]))
$division->prints["match_check_null"] = "checked";
if(!empty($val_column["Extra"]))
$division->prints["match_check_extra"] = "checked";
 


if(!empty($val_column["length"]))
$division->prints["match_value_length"] = $val_column["length"];
if(!empty($val_column["collation"]))
$division->prints["match_value_collation"] = $val_column["collation"];
if(!empty($val_column["comments"]))
$division->prints["match_value_comments"] = $val_column["comments"];
if(!empty($val_column["Attrib"]))
$division->prints["match_value_attrib"] = $val_column["Attrib"];
}






while($count > 0){
if(empty($val_column["Field"]))
$division->prints["match_column_title"] = "COLUMN" . $count;

$division->prints["match_name_name"] = "column" . $count;
$division->prints["match_name_type"] = "type[]";
$division->prints["match_name_length"] = "length[]";
$division->prints["match_name_default_type"] = "default_type[]";
$division->prints["match_name_default_value"] = "default_value[]";
$division->prints["match_name_collation"] = "collation[]";
$division->prints["match_name_attribute"] = "attribute[]";
$division->prints["match_name_null"] = "name_null[]";
$division->prints["match_name_extra"] = "extra[]";
$division->prints["match_name_comments"] = "comments[]";
	
$division->print_template("template2");
$count--;
}

$division->print_template("template3");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
