<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_core.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

preview_core.php, Ver 3.03, 2011-08-22 18:00:00
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
// £_foreach_column_£
// $array_column['@_column_@'] = '@_column_@';
// ££_foreach_column_££
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_" . $table_name . ".php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_comment.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
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


$division->prints["match_" . $table_name . "_title1"] = ""; 
$division->prints["match_" . $table_name . "_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_" . $table_name . "_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_" . $table_name . "_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_" . $table_name)) $cmr->post_var["id_" . $table_name] = get_post("id_" . $table_name);
if(empty($cmr->post_var["id_" . $table_name])) $cmr->post_var["id_" . $table_name] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, $column_id);
if(empty($cmr->post_var["id_" . $table_name])){
	print($cmr->translate("No " . $table_name . " selected! clic here => "));
	print($cmr->module_link("modules/view_" . $table_name . ".php?conf_name=conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "new");
	$lk->add_link("modules/update_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "upadte");
	$lk->add_link("modules/search_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "search");
	$lk->add_link("modules/preview_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "preview");
	$lk->add_link("modules/report_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "report");
	$lk->add_link("modules/view_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1, "view");
$division->prints["match_open_tab"] = $lk->open_module_tab(3);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_" . $table_name . ".php?conf_name=conf.d/conf_" . $table_name . $cmr->get_ext("conf") . "&id_" . $table_name . "=" . $cmr->post_var["id_" . $table_name], 1);
$division->prints["match_list_link"] = $lk->list_link();
    

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_table_name"] = cmr_input_hidden("table_name", $cmr->get_conf("cmr_table_prefix") . $table_name, "hidden");
$division->prints["match_input_hidden_line_id"] = cmr_input_hidden("line_id", $cmr->post_var["id_" . $table_name], "hidden");



$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_legend_" . $table_name] = $cmr->translate($table_name);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $table_name;
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . $table_name . "  ";
// $cmr->query["preview"] .=" WHERE (" . $column_id . " = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_" . $table_name]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];
// $cmr->query["preview"] .= " ;";
// -----------
// $result = &$cmr->db_connection->Execute($cmr->query["preview"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$values = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . $table_name, "*", $column_id, $cmr->post_var["id_" . $table_name]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_" . $table_name . "_id"] = $cmr->post_var["id_" . $table_name];
//----------
$pdf_data_text = "";
//----------

if(!empty($values)){
// if($values[" " . $column_id ]) $cmr->post_var["id_" . $table_name] = $values[" " . $column_id ];
//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
foreach($array_column as $key => $value ){
  $division->prints["match_label_" . $key] = $cmr->translate($key);
  $division->prints["match_value_" . $key] = show_column_value($key, $values[$key], $cmr->post_var["id_" . $table_name]);
  $pdf_data_text .= $cmr->translate($key) . ":" . $values[$key] . "\n";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_" . $table_name . "_id"] = $cmr->post_var["id_" . $table_name];
if(empty($GLOBALS[$table_name . "_read"])) $GLOBALS[$table_name . "_read"] = array();
	
if(!in_array ($cmr->post_var["id_" . $table_name], $GLOBALS[$table_name . "_read"])){
    $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "', '" . $cmr->post_var["id_" . $table_name] . "' ,'read'");
    $cmr->post_var["current_" . $table_name . "_id"] = $cmr->post_var["id_" . $table_name];
    array_push ($GLOBALS[$table_name . "_read"], $cmr->post_var["id_" . $table_name]);
}
// --------------------
$pdf_data_text .= "\n===========================\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_pdf_title"] = $table_name;
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "";
// 
$division->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_lang_action"] = $cmr->translate("View");
$division->prints["match_value_action"] = "view";

$division->prints["match_input_hidden_module"] = cmr_input_hidden("class_module", __FILE__, "hidden");
$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", __FILE__, "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_" . $table_name . $cmr->get_ext("conf"), "hidden");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_submit_action"] = ">";
$division->prints["match_value_action"] = "view";
$division->prints["match_lang_action"] = $cmr->translate("View");
$division->prints["match_lang_view"] = $cmr->translate("View");
$division->prints["match_lang_update"] = $cmr->translate("Update");
$division->prints["match_lang_delete"] = $cmr->translate("Delete");
$division->prints["match_lang_policy"] = $cmr->translate("Policy");
$division->prints["match_lang_comment"] = $cmr->translate("Comment");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$templates_file = $mod->good_file($cmr->user, $cmr->page["language"], "template", "preview_" . $table_name);

// $templates_file = $cmr->good_file("template", "preview_" . $table_name);
$division->template = $division->load_template($templates_file);

$division->print_template("template1");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!











$preview_id = $cmr->post_var["id_" . $table_name];
$preview_table = $table_name;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Comment of " . $preview_table);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment of " . $preview_table);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
// $cmr->query[$cmr->action["table_name"]] .= "WHERE (";
// $cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_" . $table_name] . "') ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "') ";
// $cmr->query[$cmr->action["table_name"]] .= ") ";
// $cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$qr->table = $cmr->get_conf("cmr_table_prefix") . $preview_table;
$qr->sql_data["line_id"] = $preview_id;
$cmr->query[$cmr->action["table_name"]] = $qr->get_query("preview_comment");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($cmr->post_var[$mod->base_name . "_mode"])) 
$cmr->post_var[$mod->base_name . "_mode"] = "link_detail";

if(empty($cmr->post_var[$mod->base_name . "_limit"])) 
$cmr->post_var[$mod->base_name . "_limit"] = 50;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_comment.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

$view_comment_file = cmr_good_file($file_list);
if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!










// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "policy";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("policy of " . $preview_table);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List policy of " . $preview_table);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "policy ";
// $cmr->query[$cmr->action["table_name"]] .= "WHERE (";
// $cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $preview_id . "') ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . $table_name . "') ";
// $cmr->query[$cmr->action["table_name"]] .= ") ";
// $cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$qr->table = $cmr->get_conf("cmr_table_prefix") . $preview_table;
$qr->sql_data["line_id"] = $preview_id;
$cmr->query[$cmr->action["table_name"]] = $qr->get_query("preview_policy");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($cmr->post_var[$mod->base_name . "_mode"])) 
$cmr->post_var[$mod->base_name . "_mode"] = "link_print";

if(empty($cmr->post_var[$mod->base_name . "_limit"])) 
$cmr->post_var[$mod->base_name . "_limit"] = 50;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_policy.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_policy.php";

$view_policy_file = cmr_good_file($file_list);

if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_soc_type"))
if(file_exists($view_policy_file))
if(cmr_match_include($division->template, "match_include2")) include($view_policy_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
