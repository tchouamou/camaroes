<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_asset.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_asset.php,Ver 3.0  2011-Sep 22:32:40  
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
$cmr->action["module_name"] = "user.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("ticket" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("ticket.php");

$cmr->action["module_name"] = "ticket.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "asset" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("asset" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("asset.php");

$cmr->action["module_name"] = "asset.php";
$cmr->action["to_load"] = "load_class_need";
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($cmr->post_var["id_asset"])){
	if(empty($cmr->post_var["asset_name"])){
		$cmr->post_var["id_asset"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "asset", "id", "name", $cmr->post_var["asset_name"]);
		$cmr->post_var["asset_name"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "asset", "name", "id", $cmr->post_var["id_asset"]);
	}else{
		$cmr->post_var["id_asset"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "asset", "id", "name", $cmr->post_var["asset_name"]);
	}

}else{
	$cmr->post_var["asset_name"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "asset", "name", "id", $cmr->post_var["id_asset"]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_asset"])){
	print($cmr->translate("No asset selected! clic here => "));
	print($cmr->module_link("modules/view_asset.php?conf_name=conf_asset.ini&id_asset=" . $cmr->post_var["id_asset"] . "", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// -----------$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"]= $cmr->translate($mod->base_name); 
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_asset_title1"] = ""; 
$division->prints["match_asset_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_asset_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_asset_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);
$lk->add_link("modules/update_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);
$lk->add_link("modules/search_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);
$lk->add_link("modules/preview_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);
$lk->add_link("modules/report_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(3);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);
$lk->add_link("modules/menu_asset.php?conf_name=conf.d/conf_asset.ini&id_asset=".$cmr->post_var["id_asset"]."", 1);

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");


$division->prints["match_legend_asset"] = $cmr->translate("asset");
;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "asset";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "asset  ";
// $cmr->query["preview"] .=" WHERE (id = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_asset"]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];

// // -----------
// $result = &$cmr->db_connection->SelectLimit($cmr->query["preview"], 1) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "asset", "*", "id", $cmr->post_var["id_asset"]);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_asset_id"] = $cmr->post_var["id_asset"];
//----------
$pdf_data_text = "";
//----------

if(!empty($result_value)){
// if($result_value["id"]) $cmr->post_var["id_asset"] = $result_value["id"];
//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_legend_allow"] = $cmr->translate("allow");
  $division->prints['match_label_id'] = $cmr->translate('id');
  $division->prints['match_value_id'] = show_column_value('id', $result_value["id"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('id') . ':' . $result_value["id"] . '\n';
  

  $division->prints['match_label_serial'] = $cmr->translate('serial');
  $division->prints['match_value_serial'] = show_column_value('serial', $result_value["serial"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('serial') . ':' . $result_value["serial"] . '\n';
  

  $division->prints['match_label_mac_adress'] = $cmr->translate('mac_adress');
  $division->prints['match_value_mac_adress'] = show_column_value('mac_adress', $result_value["mac_adress"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('mac_adress') . ':' . $result_value["mac_adress"] . '\n';
  

  $division->prints['match_label_name'] = $cmr->translate('name');
  $division->prints['match_value_name'] = show_column_value('name', $result_value["name"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('name') . ':' . $result_value["name"] . '\n';
  

  $division->prints['match_label_location'] = $cmr->translate('location');
  $division->prints['match_value_location'] = show_column_value('location', $result_value["location"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('location') . ':' . $result_value["location"] . '\n';
  

  $division->prints['match_label_ip'] = $cmr->translate('ip');
  $division->prints['match_value_ip'] = show_column_value('ip', $result_value["ip"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('ip') . ':' . $result_value["ip"] . '\n';
  

  $division->prints['match_label_nat_ip'] = $cmr->translate('nat_ip');
  $division->prints['match_value_nat_ip'] = show_column_value('nat_ip', $result_value["nat_ip"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('nat_ip') . ':' . $result_value["nat_ip"] . '\n';
  

  $division->prints['match_label_mask'] = $cmr->translate('mask');
  $division->prints['match_value_mask'] = show_column_value('mask', $result_value["mask"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('mask') . ':' . $result_value["mask"] . '\n';
  

  $division->prints['match_label_gateway'] = $cmr->translate('gateway');
  $division->prints['match_value_gateway'] = show_column_value('gateway', $result_value["gateway"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('gateway') . ':' . $result_value["gateway"] . '\n';
  

  $division->prints['match_label_dns1'] = $cmr->translate('dns1');
  $division->prints['match_value_dns1'] = show_column_value('dns1', $result_value["dns1"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('dns1') . ':' . $result_value["dns1"] . '\n';
  

  $division->prints['match_label_dns2'] = $cmr->translate('dns2');
  $division->prints['match_value_dns2'] = show_column_value('dns2', $result_value["dns2"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('dns2') . ':' . $result_value["dns2"] . '\n';
  

  $division->prints['match_label_type'] = $cmr->translate('type');
  $division->prints['match_value_type'] = show_column_value('type', $result_value["type"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('type') . ':' . $result_value["type"] . '\n';
  

  $division->prints['match_label_os'] = $cmr->translate('os');
  $division->prints['match_value_os'] = show_column_value('os', $result_value["os"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('os') . ':' . $result_value["os"] . '\n';
  

  $division->prints['match_label_state'] = $cmr->translate('state');
  $division->prints['match_value_state'] = show_column_value('state', $result_value["state"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('state') . ':' . $result_value["state"] . '\n';
  

  $division->prints['match_label_login_id'] = $cmr->translate('login_id');
  $division->prints['match_value_login_id'] = show_column_value('login_id', $result_value["login_id"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('login_id') . ':' . $result_value["login_id"] . '\n';
  

  $division->prints['match_label_login_pw'] = $cmr->translate('login_pw');
  $division->prints['match_value_login_pw'] = show_column_value('login_pw', $result_value["login_pw"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('login_pw') . ':' . $result_value["login_pw"] . '\n';
  

  $division->prints['match_label_check_command'] = $cmr->translate('check_command');
  $division->prints['match_value_check_command'] = show_column_value('check_command', $result_value["check_command"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('check_command') . ':' . $result_value["check_command"] . '\n';
  

  $division->prints['match_label_certificate'] = $cmr->translate('certificate');
  $division->prints['match_value_certificate'] = show_column_value('certificate', $result_value["certificate"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('certificate') . ':' . $result_value["certificate"] . '\n';
  

  $division->prints['match_label_my_master'] = $cmr->translate('my_master');
  $division->prints['match_value_my_master'] = show_column_value('my_master', $result_value["my_master"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('my_master') . ':' . $result_value["my_master"] . '\n';
  

//   $division->prints['match_label_allow_type'] = $cmr->translate('allow_type');
//   $division->prints['match_value_allow_type'] = show_column_value('allow_type', $result_value["allow_type"], $cmr->post_var["id_asset"]);
//   $pdf_data_text .= $cmr->translate('allow_type') . ':' . $result_value["allow_type"] . '\n';
//   

//   $division->prints['match_label_allow_email'] = $cmr->translate('allow_email');
//   $division->prints['match_value_allow_email'] = show_column_value('allow_email', $result_value["allow_email"], $cmr->post_var["id_asset"]);
//   $pdf_data_text .= $cmr->translate('allow_email') . ':' . $result_value["allow_email"] . '\n';
//   

//   $division->prints['match_label_allow_groups'] = $cmr->translate('allow_groups');
//   $division->prints['match_value_allow_groups'] = show_column_value('allow_groups', $result_value["allow_groups"], $cmr->post_var["id_asset"]);
//   $pdf_data_text .= $cmr->translate('allow_groups') . ':' . $result_value["allow_groups"] . '\n';
  

  $division->prints['match_label_my_software'] = $cmr->translate('my_software');
  $division->prints['match_value_my_software'] = show_column_value('my_software', $result_value["my_software"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('my_software') . ':' . $result_value["my_software"] . '\n';
  

  $division->prints['match_label_my_service'] = $cmr->translate('my_service');
  $division->prints['match_value_my_service'] = show_column_value('my_service', $result_value["my_service"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('my_service') . ':' . $result_value["my_service"] . '\n';
  

  $division->prints['match_label_comment'] = $cmr->translate('comment');
  $division->prints['match_value_comment'] = show_column_value('comment', $result_value["comment"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('comment') . ':' . $result_value["comment"] . '\n';
  

  $division->prints['match_label_date_time'] = $cmr->translate('date_time');
  $division->prints['match_value_date_time'] = show_column_value('date_time', $result_value["date_time"], $cmr->post_var["id_asset"]);
  $pdf_data_text .= $cmr->translate('date_time') . ':' . $result_value["date_time"] . '\n';
  

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_asset_id"] = $cmr->post_var["id_asset"];
if(empty($GLOBALS["asset_read"])) $GLOBALS["asset_read"] = array();
	
if(!in_array ($cmr->post_var["id_asset"], $GLOBALS["asset_read"])){
    $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "asset', '" . $cmr->post_var["id_asset"] . "' ,'read'");
    $cmr->post_var["current_asset_id"] = $cmr->post_var["id_asset"];
    array_push ($GLOBALS["asset_read"], $cmr->post_var["id_asset"]);
}
// --------------------
$pdf_data_text .= "\n===========================\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_pdf_title"] = "asset";
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "";

$division->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_asset" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_asset" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_asset" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_preview_asset" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
$division->print_template("template1");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// $cmr->post_var["asset_name"]= get_post('asset_name');

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "asset";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Asset dipend of [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Asset dipend of [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "asset ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (my_master LIKE ('%" . $cmr->post_var["asset_name"] . "%')  ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];


if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_asset.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_asset.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include2")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate(" User of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate(" User of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "user.*, " . $cmr->get_conf("cmr_table_prefix") . "asset.allow_email, " . $cmr->get_conf("cmr_table_prefix") . "asset.name ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "asset, " . $cmr->get_conf("cmr_table_prefix") . "user ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 " . $cmr->get_conf("cmr_table_prefix") . "asset.name='" . $cmr->post_var["asset_name"] . "' ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];


if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_user.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_user.php";

$file_path = cmr_good_file($file_list);
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include3")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Group of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Group of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "groups.* ";
$cmr->query[$cmr->action["table_name"]] .= ", " . $cmr->get_conf("cmr_table_prefix") . "asset.name ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "asset, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " or (" . $cmr->get_conf("cmr_table_prefix") . "groups.name in (" . $cmr->get_user("auth_list_group") . ")) ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "asset.name='" . $cmr->post_var["asset_name"] . "' ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];


if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_groups.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_groups.php";

$file_path = cmr_good_file($file_list);
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include4")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Ticket open of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Ticket open of asset [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = " SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "ticket.*, ";
$cmr->query[$cmr->action["table_name"]] .= " DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND (my_master not LIKE ('cmr_model'))  ";
$cmr->query[$cmr->action["table_name"]] .= " AND (list_asset_impact LIKE ('%" . $cmr->post_var["asset_name"] . "%')) ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_ticket.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_ticket.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include5")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Comment of [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment of [") . $cmr->post_var["asset_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (";
$cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_asset"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . "asset') ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 50;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_comment.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

$view_comment_file = cmr_good_file($file_list);
if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
