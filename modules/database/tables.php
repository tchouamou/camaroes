<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * tables.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






tables.php, Ver 3.03
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
$division->module["title"] .= " => " . $cmr->module_link("modules/database/tables.php?current_database=" . $cmr->post_var["current_database"], "", $cmr->post_var["current_database"]);
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
$division->prints["match_table_name"] = "";
$division->prints["match_database"] = "";
$division->prints["match_submit"] = "";
$division->prints["match_submit_java"] = "";
$division->prints["match_reset_form"] = "";

// $division->prints["db_name;

$division->prints["match_label_new_table"] = $cmr->translate("new_table");
$division->prints["match_label_table_name"] = $cmr->translate("table name");
$division->prints["match_label_db_name"] = $cmr->translate("database name");
$division->prints["match_label_after_select"] = $cmr->translate("after_select");
$division->prints["match_value_empty"] = "empty";
$division->prints["match_value_delete"] = "delete";
$division->prints["match_label_print"] = $cmr->translate("print");
$division->prints["match_label_check_table"] = $cmr->translate("check_table");
$division->prints["match_label_analyze_table"] = $cmr->translate("analyze_table");
$division->prints["match_label_repair_table"] = $cmr->translate("repair_table");
$division->prints["match_label_optimize_table"] = $cmr->translate("optimize_table");
$division->prints["match_value_run"] = "run";
$division->prints["match_label_name"] = $cmr->translate("name");
$division->prints["match_label_num_fields"] = $cmr->translate("num_fields");
$division->prints["match_label_rename_to"] = $cmr->translate("rename_to");
$division->prints["match_label_insert_into"] = $cmr->translate("insert_into");
$division->prints["match_label_copy_to"] = $cmr->translate("copy_to");
$division->prints["match_label_struct_only"] = $cmr->translate("struct_only");
$division->prints["match_label_struct_data"] = $cmr->translate("struct_data");
$division->prints["match_label_data_only"] = $cmr->translate("data_only");
$division->prints["match_label_create_then_copy"] = $cmr->translate("create_then_copy");
$division->prints["match_label_with_drop"] = $cmr->translate("with_drop");
$division->prints["match_label_with_auto_increment"] = $cmr->translate("with_auto_increment");
$division->prints["match_label_with_constraints"] = $cmr->translate("with_constraints");
$division->prints["match_label_goto_database"] = $cmr->translate("goto_database");
$division->prints["match_label_collation"] = $cmr->translate("collation");
$division->prints["match_default_collation"] = "";
$division->prints["match_default_collation"] = "";
$division->prints["match_options_db_collation"] = print_collation($cmr->config["collation"], $cmr->config["collation_title"]);

$division->prints["match_legend_link"] = "-";
$division->prints["match_table_title1"] = $database;
$division->prints["match_table_title2"] = "";
$division->prints["match_www_path"] = "";
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "";
$division->prints["match_value_db_name"] = $database;
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
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$division->prints["match_open_tab"] = ($lk->open_module_tab(2));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/export_table.php?current_table=" . $cmr->post_var["current_table"] , 1, $cmr->translate("export"));
$lk->add_link("modules/database/import_table.php?current_table=" . $cmr->post_var["current_table"] , 1, $cmr->translate("import"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_list_link"] = ($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title"] = $cmr->get_title($mod->base_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_title3"] = $cmr->translate("List table of [") . $cmr->post_var["current_database"] . "]";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
$file_list = $cmr->get_path("module") . "modules/database/templates/template_tables" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$data_object = sql_run("array", $database_conn, $action = "show_tables", "", $cmr->post_var["current_database"]);
// foreach($data_object as $key => $val){
// print("[$key]:");
if(!empty($data_object[0]))
foreach($data_object[0] as $key => $val){
	$correct_table = $database . "." . $val;
  $division->prints["match_table_key"] = $key;
  $division->prints["match_table_link"] = $cmr->module_icon("columns.php", "16") . $cmr->module_link("modules/database/columns.php?current_table=" . $val . "&current_column=", "", $val);
  $division->prints["match_action_links"] = $cmr->module_link($mod->path . "?view_mode=link_tab", $cmr->get_path("www") . "images/icon/delete_icon.png", $cmr->translate("Table view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("Table")) . " alt=\"" . ($cmr->translate("Table")) . "\"");
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW FULL COLUMNS FROM " . $correct_table . ";&sql_xml=0\" label=\"" . $cmr->translate("FULL COLUMNS") . "\">" . $cmr->translate("[F]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW INDEX FROM " . $correct_table . ";&sql_xml=0\" label=\"" . $cmr->translate("TABLE INDEX") . "\">" . $cmr->translate("[I]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW CREATE TABLE " . $correct_table . ";&sql_xml=1\" label=\"" . $cmr->translate("SOURCE TABLE") . "\">" . $cmr->translate("[V]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=CHECK TABLE " . $correct_table . ";&sql_xml=0\" label=\"" . $cmr->translate("CHECK TABLE ") . "\">" . $cmr->translate("[C]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW TABLE STATUS FROM " . $database . " LIKE '" . $val . "';&sql_xml=0\" label=\"" . $cmr->translate("TABLE STATUS") . "\">" . $cmr->translate("[S]") . "</a>";
  $division->prints["match_action_links"] .= "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SELECT * FROM " . $correct_table . " PROCEDURE ANALYSE();&sql_xml=0\" label=\"" . $cmr->translate("ANALYSE TABLE ") . "\">" . $cmr->translate("[A]") . "</a>";
//     $str .= $cmr->module_link($mod->path . "?view_mode=link", $cmr->get_path("www") . "images/icon/font_icon.png", $cmr->translate("List view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("links ")) . " alt=\"" . ($cmr->translate("links ")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_detail", $cmr->get_path("www") . "images/icon/justify_icon.png", $cmr->translate("Detail view"), 15, 20, "middle1", "", " title=\"" . ($cmr->translate("Details")) . " alt=\"" . ($cmr->translate("Details")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_update", $cmr->get_path("www") . "images/icon/text_icon.png", $cmr->translate("Update view"), 20, 20, "middle1", "", " title=\"" . ($cmr->translate("Update")) . " alt=\"" . ($cmr->translate("Update")) . "\"");
//     $str .= $cmr->module_link($mod->path . "?view_mode=link_print", $cmr->get_path("www") . "images/icon/print_icon.png", $cmr->translate("Print view"), 20, 20, "middle1", "", " title=\"" . ($cmr->translate("Print")) . " alt=\"" . ($cmr->translate("Print")) . "\"");
	$division->print_template("template2");
};
// };
$division->prints["match_options_list_table"] = select_order(array(), $data_object[0], $data_object[0]);
$data_object1 = (sql_run("show_databases", $database_conn));
$division->prints["match_options_list_db"] = select_order(array(), $data_object1[0], $data_object1[0]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// coment Table  	
// engine 	ARCHIVEBLACKHOLECSVFEDERATEDInnoDBMyISAMMEMORYMRG_MYISAM
// collation 	armscii8_binarmscii8_general_ciascii_binascii_general_cibig5_binbig5_chinese_cibinarycp1250_bincp1250_croatian_cicp1250_czech_cscp1250_general_cicp1251_bincp1251_bulgarian_cicp1251_general_cicp1251_general_cscp1251_ukrainian_cicp1256_bincp1256_general_cicp1257_bincp1257_general_cicp1257_lithuanian_cicp850_bincp850_general_cicp852_bincp852_general_cicp866_bincp866_general_cicp932_bincp932_japanese_cidec8_bindec8_swedish_cieucjpms_bineucjpms_japanese_cieuckr_bineuckr_korean_cigb2312_bingb2312_chinese_cigbk_bingbk_chinese_cigeostd8_bingeostd8_general_cigreek_bingreek_general_cihebrew_binhebrew_general_cihp8_binhp8_english_cikeybcs2_binkeybcs2_general_cikoi8r_binkoi8r_general_cikoi8u_binkoi8u_general_cilatin1_binlatin1_danish_cilatin1_general_cilatin1_general_cslatin1_german1_cilatin1_german2_cilatin1_spanish_cilatin2_binlatin2_croatian_cilatin2_czech_cslatin2_general_cilatin2_hungarian_cilatin5_binlatin5_turkish_cilatin7_binlatin7_estonian_cslatin7_general_cilatin7_general_csmacce_binmacce_general_cimacroman_binmacroman_general_cisjis_binsjis_japanese_ciswe7_binswe7_swedish_citis620_bintis620_thai_ciucs2_binucs2_czech_ciucs2_danish_ciucs2_esperanto_ciucs2_estonian_ciucs2_general_ciucs2_hungarian_ciucs2_icelandic_ciucs2_latvian_ciucs2_lithuanian_ciucs2_persian_ciucs2_polish_ciucs2_roman_ciucs2_romanian_ciucs2_slovak_ciucs2_slovenian_ciucs2_spanish2_ciucs2_spanish_ciucs2_swedish_ciucs2_turkish_ciucs2_unicode_ciujis_binujis_japanese_ciutf8_binutf8_czech_ciutf8_danish_ciutf8_esperanto_ciutf8_estonian_ciutf8_general_ciutf8_hungarian_ciutf8_icelandic_ciutf8_latvian_ciutf8_lithuanian_ciutf8_persian_ciutf8_polish_ciutf8_roman_ciutf8_romanian_ciutf8_slovak_ciutf8_slovenian_ciutf8_spanish2_ciutf8_spanish_ciutf8_swedish_ciutf8_turkish_ciutf8_unicode_ciarmscii8_binarmscii8_general_ciascii_binascii_general_cibig5_binbig5_chinese_cibinarycp1250_bincp1250_croatian_cicp1250_czech_cscp1250_general_cicp1251_bincp1251_bulgarian_cicp1251_general_cicp1251_general_cscp1251_ukrainian_cicp1256_bincp1256_general_cicp1257_bincp1257_general_cicp1257_lithuanian_cicp850_bincp850_general_cicp852_bincp852_general_cicp866_bincp866_general_cicp932_bincp932_japanese_cidec8_bindec8_swedish_cieucjpms_bineucjpms_japanese_cieuckr_bineuckr_korean_cigb2312_bingb2312_chinese_cigbk_bingbk_chinese_cigeostd8_bingeostd8_general_cigreek_bingreek_general_cihebrew_binhebrew_general_cihp8_binhp8_english_cikeybcs2_binkeybcs2_general_cikoi8r_binkoi8r_general_cikoi8u_binkoi8u_general_cilatin1_binlatin1_danish_cilatin1_general_cilatin1_general_cslatin1_german1_cilatin1_german2_cilatin1_spanish_cilatin2_binlatin2_croatian_cilatin2_czech_cslatin2_general_cilatin2_hungarian_cilatin5_binlatin5_turkish_cilatin7_binlatin7_estonian_cslatin7_general_cilatin7_general_csmacce_binmacce_general_cimacroman_binmacroman_general_cisjis_binsjis_japanese_ciswe7_binswe7_swedish_citis620_bintis620_thai_ciucs2_binucs2_czech_ciucs2_danish_ciucs2_esperanto_ciucs2_estonian_ciucs2_general_ciucs2_hungarian_ciucs2_icelandic_ciucs2_latvian_ciucs2_lithuanian_ciucs2_persian_ciucs2_polish_ciucs2_roman_ciucs2_romanian_ciucs2_slovak_ciucs2_slovenian_ciucs2_spanish2_ciucs2_spanish_ciucs2_swedish_ciucs2_turkish_ciucs2_unicode_ciujis_binujis_japanese_ciutf8_binutf8_czech_ciutf8_danish_ciutf8_esperanto_ciutf8_estonian_ciutf8_general_ciutf8_hungarian_ciutf8_icelandic_ciutf8_latvian_ciutf8_lithuanian_ciutf8_persian_ciutf8_polish_ciutf8_roman_ciutf8_romanian_ciutf8_slovak_ciutf8_slovenian_ciutf8_spanish2_ciutf8_spanish_ciutf8_swedish_ciutf8_turkish_ciutf8_unicode_ci
// pack keys 	
// checksum 	
// delay key Write 	
// auto increment 	
// Row format 

// CREATE TABLE `camaroes_db`.`table` (
// `Campo1` INT( 16 ) UNSIGNED ZEROFILL NULL DEFAULT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Commenti1',
// `Campo2` INT( 16 ) UNSIGNED NULL DEFAULT NULL COMMENT 'Commenti2',
// `Campo3` INT( 16 ) BINARY NOT NULL DEFAULT NULL COMMENT 'Commenti3',
// INDEX ( `Campo3` ) ,
// UNIQUE (
// `Campo2`
// )
// ) ENGINE = CSV CHARACTER SET cp1251 COLLATE cp1251_bin COMMENT = 'Commenti ';






// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
