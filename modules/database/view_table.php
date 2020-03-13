<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_table.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























view_table.php, Ver 3.03   
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr_data = cmr_db_init_data($cmr->db_connection, $cmr->config, $cmr->post_var, $cmr->db, $result_type)
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_table = array();
if(empty($cmr->post_var["id_table"])) $cmr->post_var["id_table"] = "";
if(empty($cmr->post_var["current_dbms"])) $cmr->post_var["current_dbms"] = $cmr->get_conf("db_type");
if(empty($cmr->post_var["current_database"])) $cmr->post_var["current_database"] = "";
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if(empty($cmr->post_var["current_column"])) $cmr->post_var["current_column"] = "";
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["__database__"] = $database;
$val_table["__table__"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * loading configurations files, fonctions and languages file need by this module
 */
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], $table_name . $cmr->get_ext("lang"));
// $cmr->config = $mod->load_conf("conf_" . $table_name . $cmr->get_ext("conf"));
// $cmr->help = $cmr->load_help_need($table_name . $cmr->get_ext("help"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


	
	
	
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_view_" . $table_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
//$all_columns = get_table_columns($database, $table_name, $database_conn);

$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
if($the_columns)
foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
$all_columns[1] = $the_columns;
// cmr_print_r($all_columns);exit;

$array_columns = $all_columns[0];
$column_id = column_id($all_columns[1]);
$_date_time1 = column_date_time($all_columns[1]);
$_date_time_base1 = $_date_time1 . "_" . $base_name;
$val_table["__column_id__"] = $column_id;
$val_table["_date_time1"] = $_date_time1;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$tab_mode = array("link_tab", "link_update", "link_print");
$pdf_data_text = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS[$table_name . "_read"] = cmr_readed_line($cmr->config, $cmr->user, $database_conn, $table_name);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * email, and list of all group in with authentificated user have rigth
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


/**
 * getting values usefull to determinate number of line
 * getting var use to inver fiter condition (like)
 * getting the page number in with to jump
 * getting the mode to show rows
 * getting the value usefull to order in descendend or ascendent
 * getting the column usefull to order the table
 */
$cmr->post_var = cmr_view_post_var($cmr->post_var, $table_name, $base_name, $column_id, $_date_time_base1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_table"] = $table_name;
$view_win->prints["match_column_id"] = $column_id;
$view_win->prints["match_date_time"] = $_date_time1;


$view_win->module["name"]= $mod->name;
$view_win->themes["module_positionx"]= $mod->rown_position;
$view_win->themes["module_positiony"]= $mod->col_position;

$view_win->module["title"] = $cmr->module_link("modules/database/detail_dbms.php?current_dbms=" . $cmr->post_var["current_dbms"], "", $cmr->post_var["current_dbms"]);
$view_win->module["title"] .= " => " . $cmr->module_link("modules/database/detail_database.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
$view_win->module["title"] .= " => " . $cmr->module_link("modules/database/detail_table.php?current_table=" . $cmr->post_var["current_table"], "", $cmr->post_var["current_table"]);
// $view_win->text = "";




// $view_win->themes["background"]= "";


$view_win->themes["header_visible"] = 1;
$view_win->themes["header_tools_left"] = 0;
$view_win->themes["header_tools_right"] = 0;
$view_win->themes["header_bgcolor"] = "#000000";
$view_win->themes["header_color"] = "#FFFFFF";
$view_win->themes["header_align"] = "left";
$view_win->themes["header_border"] = "1";
$division->themes["header_bgimage_left"] = "@";
$division->themes["header_bgimage_middle"] = "@";
$division->themes["header_bgimage_right"] = "@";
$division->themes["header_mouse_effect"] = "1";
$view_win->prints["match_open_windows"] = $view_win->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_table_title1"] = ""; 
$view_win->prints["match_table_title2"] = ""; 
if(isset($cmr->language[$base_name])) 
$view_win->prints["match_table_title1"] = $cmr->translate($base_name);
if(isset($cmr->language[$base_name."_title"])) 
$view_win->prints["match_table_title2"] = $cmr->translate($base_name . "_title");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_menu_db"] = ""; 
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
$view_win->prints["match_menu_db"] = cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
$view_win->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/new_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/search_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/view_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/report_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"] . "&layer=2", 1);
$lk->add_link("modules/database/export_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/import_table.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$view_win->prints["match_open_tab"] = $lk->open_module_tab(2);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=" . $cmr->post_var["current_table"], 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=" . $cmr->post_var["current_table"], 1);

$view_win->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_close_windows"] = $view_win->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!









// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_www_path"] = $cmr->get_path("www");
$view_win->prints["match_table_link_all"] = "";
$view_win->prints["match_form_param"] = "";
$view_win->prints["match_form_id"] = "view_form";
$view_win->prints["match_input_hidden_module"] = "";
$view_win->prints["match_input_hidden_get"] = "";
$view_win->prints["match_input_hidden_conf"] = "";
$view_win->prints["match_input_hidden_search"] = "";

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
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_hidden_page"] = "";
$view_win->prints["match_table_page"] = "";
$view_win->prints["match_page_0"] = "";
$view_win->prints["match_option_page"] = "";
$view_win->prints["match_label_limit"] = "";
$view_win->prints["match_value_limit"] = "";
$view_win->prints["match_table_link_input"] = "";
$view_win->prints["match_date_style1"] = "";
$view_win->prints["match_date_style2"] = "";
$view_win->prints["match_date_value1"] = "";
$view_win->prints["match_date_value2"] = "";
$view_win->prints["match_view_order"] = "";
$view_win->prints["match_table_link_titles"] = "";
$view_win->prints["match_view_date_time"] = "";
$view_win->prints["match_view_link"] = "";
$view_win->prints["match_last_line"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_value_columns"] = "";
$view_win->prints["match_options_action"] = "";
$view_win->prints["match_submit_action"] = "";
$view_win->prints["match_close_tab"] = "";

$view_win->prints["match_lang_action"] = $cmr->translate("View");
$view_win->prints["match_value_action"] = "view";
$view_win->prints["match_value_search"] = "";

$view_win->prints["match_label_search"] = $cmr->translate("Search");
$view_win->prints["match_lang_view"] = $cmr->translate("View");
$view_win->prints["match_lang_update"] = $cmr->translate("Update");
$view_win->prints["match_lang_delete"] = $cmr->translate("Delete");
$view_win->prints["match_lang_policy"] = $cmr->translate("Policy");
$view_win->prints["match_lang_comment"] = $cmr->translate("Comment");

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_fieldset_legend"] = $cmr->translate($table_name);
$view_win->prints["match_class_div"] =  $base_name;
$view_win->prints["match_base_name"] = $base_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * getting the value use to determinate number of line to show
 * getting var use to inver the fiter condition (like)
 * getting the page number in with to jump
 * getting the mode use to determinate the mode to show rows
 * getting the value use to order in descendend or ascendent
 * getting the column use to order the table
 */

if(empty($table_name)) $table_name = "";
if(empty($cmr->post_var["search_text"])) $cmr->post_var["search_text"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$_date_time_base1 . "1"])) $cmr->post_var[$_date_time_base1 . "1"] = "";
if(empty($cmr->post_var[$_date_time_base1 . "2"])) $cmr->post_var[$_date_time_base1 . "2"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action[$table_name]["mode"] = $cmr->post_var[$base_name . "_mode"];
$cmr->action[$table_name]["limit"] = $cmr->post_var[$base_name . "_limit"];
$cmr->action[$table_name]["order"] = $cmr->post_var[$base_name . "_order"];
$cmr->action[$table_name]["desc"] = $cmr->post_var[$base_name . "_desc"];
$cmr->action[$table_name]["page"] = $cmr->post_var[$base_name . "_page"];
$cmr->action[$table_name]["check"] = $cmr->post_var[$base_name . "_check"];
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->action[$table_name]["mode"])) $cmr->action[$table_name]["mode"] = "link_tab";
if(intval($cmr->action[$table_name]["limit"]) < 2) $cmr->action[$table_name]["limit"] = 50;
if(empty($cmr->action[$table_name]["order"])) $cmr->action[$table_name]["order"] = $column_id;
if(intval($cmr->action[$table_name]["page"] < 1)) $cmr->action[$table_name]["page"] = 0;
if(empty($cmr->action[$table_name]["check"])) $cmr->action[$table_name]["check"] = "DESC";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * default sql string value
 */
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->query[$table_name])){
// $table_name=$table_name;
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $database_conn);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$table_name] = "SELECT *  FROM  " . $database . "." . $table_name . "";
$cmr->query[$table_name] .= " WHERE " . $cmr->action["where"];
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!












//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * complex mode to loat in the sql string filter condition
 * using constant taked in the configuration file
 */
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($array_columns)
foreach($array_columns as $key => $value){
if($key <= intval($cmr->post_var[$base_name . "_columns"])){
    $module_column = $value . "_" . $base_name;
	$cmr->action[$module_column] = "";
    
	(empty($cmr->post_var[$module_column])) ? $value = "" : $value = $cmr->post_var[$module_column];
	 $cmr->action[$table_name][$value] = $value;
    if(strlen($value) > 0){
	    $cmr->action[$module_column] = " [v]";
	    $cmr->query[$table_name] .= " AND " . $cmr->post_var[$base_name . "_check"] . " (" . $database . "." . $table_name . "." . $value . " LIKE '%" . $value . "%') ";
    }
}
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action[$_date_time_base1] = "";
/**
 * complete filter in the sql string with the date_time column
 */
if(strlen($cmr->post_var[$_date_time_base1 . "1"]) > 0){
$cmr->action[$_date_time_base1] = " [v]";
$cmr->post_var[$_date_time_base1 . "1"] = conv_unix_timestamp($cmr->post_var[$_date_time_base1 . "1"]);
// $cmr->post_var[$_date_time_base1 . "1"] = substr($cmr->post_var[$_date_time_base1 . "1"] . "00000000000000", 0, 14);
$cmr->query[$table_name] .= " AND " . $cmr->post_var[$base_name . "_check"] . " (" . $database . "." . $table_name . "." . $_date_time1 . " + 0 <= DATE_ADD('" . $cmr->post_var[$_date_time_base1 . "1"] . "', INTERVAL 0 DAY) + 0) ";
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(strlen($cmr->post_var[$_date_time_base1 . "2"]) > 0){
$cmr->action[$_date_time_base1] = " [v]";
$cmr->post_var[$_date_time_base1 . "2"] = conv_unix_timestamp($cmr->post_var[$_date_time_base1 . "2"]);
// $cmr->post_var[$_date_time_base1 . "2"] = substr($cmr->post_var[$_date_time_base1 . "2"] . "00000000000000", 0, 14);
$cmr->query[$table_name] .= " AND " . $cmr->post_var[$base_name . "_check"] . " (" . $database . "." . $table_name . "." . $_date_time1 . " + 0 >= DATE_ADD('" . $cmr->post_var[$_date_time_base1 . "2"] . "', INTERVAL 0 DAY) + 0) ";
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * complete  the sql string with the order condition
 */
$cmr->query[$table_name] .= " ORDER BY " . $database . "." . $table_name . "." . $cmr->action[$table_name]["order"] . " " . $cmr->action[$table_name]["desc"];
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * execute  the sql query and count the total
 */
$total = 0;
$result_query = &$database_conn->Execute($cmr->query[$table_name]) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
if($result_query) $total = $result_query->RecordCount();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * complete  the sql string with the limit condition
 */
// $cmr->query[$table_name] .= " LIMIT " . intval($cmr->action[$table_name]["limit"]) . ";";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!






//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$num_row = 0;
$num_view = 0;
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($total)){
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * num row to be show
 */
// $result_table_name = &$database_conn->Execute($cmr->query[$table_name]) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
$result_table_name = &$database_conn->SelectLimit($cmr->query[$table_name], intval($cmr->action[$table_name]["limit"]), intval($cmr->action[$table_name]["page"]));
$num_row = $result_table_name->RecordCount();

/**
 * calculate number off page
 */
(intval($num_row))?($num_page = $total / intval($cmr->action[$table_name]["limit"])):($num_page = 0);
/**
 * jumping  by current page
 */
// if((intval($cmr->action[$table_name]["limit"]) * intval($cmr->action[$table_name]["page"])) < intval($total)) 
// $database_conn->SelectLimit($result_table_name, intval($cmr->post_var[$base_name . "_limit"]), intval($cmr->post_var[$base_name . "_page"]));
// cmrdb_data_seek($result_query, intval($cmr->action[$table_name]["limit"]) * intval($cmr->action[$table_name]["page"]));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_input_hidden_search"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->post_var["search_text"]."\" name=\"search_text\" />");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * form need for table mode view to send
 */
if($cmr->action[$table_name]["mode"] == "link_tab"){
	$view_win->prints["match_input_hidden_page"] = input_hidden("<input type=\"hidden\" value=\"".$mod->position."\" name=\"".$mod->path."\" />");
	
	$view_win->prints["match_table_page"] = $cmr->action[$table_name]["page"];
	$view_win->prints["match_page_0"] = $cmr->translate("Page 0");
    for($ip = 1; $ip < $num_page; $ip++){
		$view_win->prints["match_option_page"] .= "<option value=\"" . $ip . "\">" . $cmr->translate("Page") . " " . $ip . "</option>";
    }

}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->action[$table_name]["mode"] == "link_tab"){
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_table_link_input"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($array_columns)
foreach($array_columns as $key => $value){
if($key <= intval($cmr->post_var[$base_name . "_columns"])){
    	$module_column = $value . "_" . $base_name;
	    empty($cmr->post_var[$module_column]) ? $value = "" : $value = $cmr->post_var[$module_column];
		$view_win->prints["match_table_link_input"] .= "<td onclick=\"show('" . $module_column . "')\" class=\"rown2\" align=\"center\">";
		$view_win->prints["match_table_link_input"] .= "<input ";
		if(strlen($value) == 0)  $view_win->prints["match_table_link_input"] .= "class=\"hidded\" ";
		$view_win->prints["match_table_link_input"] .= " type=\"text\" size=\"8\" ";
		$view_win->prints["match_table_link_input"] .= " name=\"" . $module_column . "\" ";
		$view_win->prints["match_table_link_input"] .= " id=\"" . $module_column . "\" ";
		$view_win->prints["match_table_link_input"] .= " value=\"" . $value . "\" ";
		$view_win->prints["match_table_link_input"] .= " /></td>";
    }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	empty($cmr->post_var[$_date_time_base1 . "1"]) ? $value1 = "" : $value1 = $cmr->post_var[$_date_time_base1 . "1"];
	$view_win->prints["match_date_value1"] = $value1;
	if(strlen($value1) == 0) $view_win->prints["match_date_style1"] = "class=\"hidded\" ";
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	empty($cmr->post_var[$_date_time_base1 . "2"]) ? $value2 = "" : $value2 = $cmr->post_var[$_date_time_base1 . "2"];
	$view_win->prints["match_date_value2"] = $value2;
	if(strlen($value2) == 0) $view_win->prints["match_date_style2"] = "class=\"hidded\" ";
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_view_order"] = $cmr->module_link($mod->name . "?" . $base_name . "_order=id&" . $base_name . "_desc=" . $cmr->action[$table_name]["desc"], "", $val_table["__column_id__"], "", "", $mod->position, "  class=\"header\" ");
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_table_link_titles"] = "";
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($array_columns)
foreach($array_columns as $key => $value){
if($key <= intval($cmr->post_var[$base_name . "_columns"])){
      $module_column = $value . "_" . $base_name;
	  $view_win->prints["match_table_link_titles"] .= "<td class=\"rown3\"><b>";
	  $view_win->prints["match_table_link_titles"] .= $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $value . "&" . $base_name . "_desc=" . $cmr->action[$table_name]["desc"], "", ucfirst($cmr->translate("" . $value)), "", "", $mod->position, "  class=\"header\" ");
	  $view_win->prints["match_table_link_titles"] .= $cmr->action[$module_column];
	  $view_win->prints["match_table_link_titles"] .= "</b></td>";
	 }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_view_date_time"] = $cmr->module_link($mod->name . "?" . $base_name . "_order=" . $_date_time1 . "&" . $base_name . "_desc=" . $cmr->action[$table_name]["desc"], "", ucfirst($cmr->translate("date_time")), "", "", $mod->position, "  class=\"header\" ");
	$view_win->prints["match_view_date_time"] .= $cmr->action[$_date_time_base1];
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_view_link"] = $cmr->translate("Link");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
// $view_win->prints["match_fieldset_legend"] = $cmr->translate($table_name);
}


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$last_id = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$num_view=1;
while (($val_table = $result_query->FetchRow()) && ($num_view < $cmr->action[$table_name]["limit"])){
	$num_view++;
	$val_table["__column_id__"] = $column_id;
	$val_table["_date_time1"] = $_date_time1;
	if(empty($val_table[$_date_time1])) $val_table[$_date_time1] = "";
	$pdf_data_text .= "\nDATE:" . $val_table[$_date_time1] . "\n" . $cmr->translate("Text") . ":\n" . implode("\n", $val_table) .  "\n===========================\n";
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->page["__columns__"]= intval($cmr->post_var[$base_name . "_columns"]);
	$cmr->page["__column_id__"] = $column_id;
	$cmr->page["__date_time1__"] = $_date_time1;
	$cmr->page["_date_time1"] = $_date_time1;
	$cmr->page["__table__"] = "table";
	$cmr->page["_table_"] = $table_name;
	$cmr->page["__database__"] = $database;
	$cmr->page["__number__"] = $num_view;
	$cmr->page["__mode__"] = $cmr->post_var[$base_name . "_mode"];
	//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * calling the function to show link to the row rispect to the current mode
     */
    $view_win->prints["match_table_link_all"] .= $cmr->link_default($val_table);
    $last_id = $val_table["__column_id__"];
//     $result_query->MoveNext();
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_num_view"] = $num_view;
if($cmr->action[$table_name]["mode"] == "link_tab") $view_win->prints["match_last_line"] = ($key + 3);

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
/**
 * return if zero rown found
 */
$view_win->prints["match_num_row_link"] =  $cmr->module_link($mod->name . "?left1=&middle2=&middle3=", "", $cmr->translate("Zero") . " " . $cmr->translate("finded") . " (" . $total . ") <b>" . $table_name . " </b>");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}




if(empty($total)) $total = 0;


	$view_win->prints["match_label_limit"] = $cmr->translate("Limit");
	$view_win->prints["match_value_limit"] = $cmr->action[$table_name]["limit"];
// $view_win->prints["match_name_limit"] = $base_name . "_limit";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$view_win->prints["match_num_row_link"] = $cmr->module_link($mod->name . "?left1=&middle2=&middle3=", "", "(" . $num_row . ")/(" . $total . ")  <b>".$cmr->translate($table_name)."</b>");
	$view_win->prints["match_class_div"] = "update_form";
	$view_win->prints["match_class_p"] = "p";
	$view_win->prints["match_base_name"] = $base_name;
/**
 * declaration off the form need to contain all checkbox
 */
$view_win->prints["match_input_hidden_module"] =  input_hidden("<input type=\"hidden\" value=\"modules/view_" . $table_name . ".php\" name=\"cmr_get_data\" />");
$view_win->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_view_" . $table_name . ".php\" name=\"cmr_get_data\" />");
$view_win->prints["match_input_hidden_conf"] = input_hidden("<input type=\"hidden\" value=\"modules/database/conf.d/conf_table" . $cmr->get_ext("conf") . "\" name=\"cmr_conf\" />");
$view_win->prints["match_button_assign_del"] = $cmr->view_assign_del($base_name . "_mode");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["search_text"])) $cmr->post_var["search_text"] = "";

if(!empty($last_id)) 
$view_win->prints["match_show_next_preview_bar"] = show_next_preview_bar($cmr->config, $cmr->language, $cmr->page, $mod->name, $cmr->action[$table_name]["page"], $num_page, $mod->position, "&search_text=" . $cmr->post_var["search_text"] . "");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$view_win->prints["match_pdf_title"] = $table_name;
$view_win->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$view_win->prints["match_pdf_file"] = "";
$view_win->prints["match_pdf_links"] = "";
$view_win->prints["match_pdf_data_type"] = "text";
$view_win->prints["match_pdf_dim_col"] = "0";
$view_win->prints["match_pdf_header"] = "";
$view_win->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$view_win->prints["match_pdf_confirm"] = $cmr->translate("confirm ?");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/**
 * free memory and reset some var
 */



$last_id = "";
$cmr->action[$table_name]["order"] = "";
$cmr->post_var["id_table"] = "";
$cmr->query[$table_name] = "";
$cmr->post_var[$base_name . "_check"] = "";
if($result_query) $result_query->Close();
// if($result_table_name) $result_table_name->Close();

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/template_view_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/template_view_table" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_view_table" . $cmr->get_ext("template");
$view_win->template = $view_win->load_template($file_list);  
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->action[$table_name]["mode"] == "link_tab")&&($total)){
	$view_win->print_template("template1");
}else{
	$view_win->print_template("template2");
	}
$view_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
