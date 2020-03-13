<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_table.php
 * ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























new_table.php,Ver 3.0  @_date_time_@
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if ($cmr->post_var["cmr_get_data"] == "modules/database/get_data/get_new_table.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table=array();
if (empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["_database_"] = $database;
$val_table["_table_"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NewADOConnection($cmr->db["db_type"]);
if(!empty($cmr->db["db_name"])) $database_conn->Connect($cmr->db["db_host"], $cmr->db["db_user"], $cmr->db["db_pw"], $cmr->db["db_name"]) or db_die($database_conn->ErrorMsg());
if(empty($database_conn)) $database_conn = $cmr->db_connection;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
if($the_columns)
foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
$all_columns[1] = $the_columns;

$array_columns = $all_columns[0];
$column_id = column_id($all_columns[1]);
$_date_time1 = column_date_time($all_columns[1]);
$val_table["_column_id_"] = $column_id;
$val_table["_date_time1"] = $_date_time1;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->module_link("modules/database/databases.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$division->module["title"] .= " => " . $cmr->module_link("modules/database/colunms.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $division->module["text"] = "";







$division->themes["header_visible"]=1;
$division->themes["header_tools_left"]=0;
$division->themes["header_tools_right"]=0;
$division->themes["header_bgcolor"]="#000000";
$division->themes["header_color"]="#FFFFFF";
$division->themes["header_align"]="left";
$division->themes["header_border"]="1";
$division->themes["header_bgimage_left"]="@";
$division->themes["header_bgimage_middle"]="@";
$division->themes["header_bgimage_right"]="@";
$division->themes["header_mouse_effect"]="1";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// match_legend_link

// match_table_title1

// match_table_title2

// match_www_path

// match_form_param

// match_form_id

// match_reset_form

// match_submit

// match_submit_java

// match_lable_after_select

// match_value_empty

// match_value_delete

// match_label_print

// match_table_name

// match_label_check_table

// match_table_name

// match_label_analyze_table

// match_table_name

// match_label_repair_table

// match_table_name

// match_label_optimize_table

// match_value_run

// match_lable_new_table

// db_name

// db_name

// db_name

// db_name

// match_lable_name

// match_lable_num_fields

// match_value_run

// match_database

// match_lable_rename_to

// match_lable_insert_into

// match_value_run

// match_database

// match_lable_copy_to

// match_label_struct_only

// match_label_struct_data

// match_label_data_only

// match_label_create_then_copy

// match_label_with_drop

// match_label_with_auto_increment

// match_label_with_constraints

// match_label_goto_database

// match_value_run

// match_label_collation

// match_default_collation

// match_default_collation

// match_options_db_collation

// match_value_run
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_table_title1"] = $cmr->translate($mod->base_name . " " . $table_name); 
$division->prints["match_table_title2"] = ""; 
 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = ""; 
if ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")) {
$division->prints["match_menu_db"] = cmr_menu_db($database_conn, "");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

 



$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (empty($cmr->post_var["id_table"])) {
    $cmr->post_var["id_table"] = "";
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/new_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/update_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/search_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/delete_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/view_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/report_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "&layer=2", 1);
$lk->add_link("modules/database/preview_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/export_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/import_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/colunms.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/detail_dbms.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/detail_database.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/detail_table.php?current_table=" . $cmr->post_var["current_table"] . "",1);
$lk->add_link("modules/database/detail_column.php?current_table=" . $cmr->post_var["current_table"] . "",1);

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_new_table.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

$division->prints["match_legend_table"] = $cmr->translate("table");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_input_column"] = "";
 
foreach($array_columns as $key=>$value){
  $division->prints["match_input_column"] .= "<tr><td class=\"normal_text\" align=\"rigth\"> ";
  $division->prints["match_input_column"] .= "<label><b>" . ucfirst($cmr->translate($value)) . ":</b></label>";
  $division->prints["match_input_column"] .= "</td><td class=\"normal_text\" align=\"rigth\">";
  $division->prints["match_input_column"] .= cmr_print_select($cmr->get_conf("cmr_new_function"), "func_$value", "");
  $division->prints["match_input_column"] .= "</td><td class=\"normal_text\" align=\"left\">";
  $division->prints["match_input_column"] .= print_column($all_columns[1][$value], $value, "", $table_name);
//   $division->prints["match_input_column"] .= "<input size=\"20\" type=\"text\" value=\"\"  id=\"" . $value . "\" name=\"" . $value . "\" onclick=\"large_id('" . $mod->base_name . "," . $value . "')\">";
  
  $division->prints["match_input_column"] .= "</td></tr>";
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_script_calendar"] = ""; // "@_script_calendar_@";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate(" Save");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want create this $table_name");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_new_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_new_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_new_table" . $cmr->get_ext("template");
// $file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_new_table" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
