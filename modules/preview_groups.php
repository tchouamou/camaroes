<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_groups.php,Ver 3.0  2011-Sep 22:32:40  
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
$cmr->action["module_name"] = "groups.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "user" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("user" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("user.php");

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
include($cmr->get_path("index") . "system/loader/loader_function.php");
// -----------

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "asset" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("asset" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("asset.php");

$cmr->action["module_name"] = "asset.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");

// -----------

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "download" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("download" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("download.php");

$cmr->action["module_name"] = "download.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
// -----------


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_comment.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_groups")){
		$cmr->post_var["id_groups"] = get_post("id_groups");
		$cmr->post_var["group_name"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "name", "id", $cmr->post_var["id_groups"]);
}else{
	if(get_post("group_name")){
		$cmr->post_var["group_name"] = trim(get_post("group_name"));
		$cmr->post_var["id_groups"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->post_var["group_name"]);
	}elseif(empty($cmr->post_var["id_groups"])){
		$cmr->post_var["id_groups"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->post_var["group_name"]);
	}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["group_name"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "name", "id", $cmr->post_var["id_groups"]);


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->module["name"]= $mod->name;
$division->module["title"]= $cmr->translate($mod->base_name . " (" . $cmr->post_var["group_name"] . ")"); 
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_groups_title1"] = ""; 
$division->prints["match_groups_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_groups_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_groups_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/search_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/preview_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/report_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"] . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(3);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/admin/change_groups.php?conf_name=conf.d/modules/conf_change_groups.ini&id_groups=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/menu_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);

$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");


$division->prints["match_legend_groups"] = $cmr->translate("groups");
;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "groups  ";
// $cmr->query["preview"] .=" WHERE (id = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_groups"]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];

// // -----------
// $cmr->db["result"]["preview"] = &$cmr->db_connection->query($cmr->query["preview"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_groups_id"] = $cmr->post_var["id_groups"];
//----------
$pdf_data_text = "";
//----------
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "*", "id", $cmr->post_var["id_groups"]);

if(!empty($result_value)){
if($result_value["id"]) $cmr->post_var["id_groups"] = $result_value["id"];
//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_legend_allow"] = $cmr->translate("allow");

  $division->prints['match_label_id'] = $cmr->translate('id');
  $division->prints['match_value_id'] = show_column_value('id', $result_value["id"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('id') . ':' . $result_value["id"] . '\n';
  

  $division->prints['match_label_name'] = $cmr->translate('name');
  $division->prints['match_value_name'] = show_column_value('name', $result_value["name"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('name') . ':' . $result_value["name"] . '\n';
  

  $division->prints['match_label_state'] = $cmr->translate('state');
  $division->prints['match_value_state'] = show_column_value('state', $result_value["state"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('state') . ':' . $result_value["state"] . '\n';
  


  $division->prints['match_label_location'] = $cmr->translate('location');
  $division->prints['match_value_location'] = show_column_value('location', $result_value["location"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('location') . ':' . $result_value["location"] . '\n';
  

  $division->prints['match_label_type'] = $cmr->translate('type');
  $division->prints['match_value_type'] = show_column_value('type', get_user_type($result_value), $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('type') . ':' . get_user_type($result_value) . '\n';
  

  $division->prints['match_label_sla'] = $cmr->translate('sla');
  $division->prints['match_value_sla'] = show_column_value('sla', $result_value["sla"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('sla') . ':' . $result_value["sla"] . '\n';
  

  $division->prints['match_label_public_key'] = $cmr->translate('public_key');
  $division->prints['match_value_public_key'] = show_column_value('public_key', $result_value["public_key"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('public_key') . ':' . $result_value["public_key"] . '\n';
  

  $division->prints['match_label_private_key'] = $cmr->translate('private_key');
  $division->prints['match_value_private_key'] = show_column_value('private_key', $result_value["private_key"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('private_key') . ':' . $result_value["private_key"] . '\n';
  

  $division->prints['match_label_pass_phrase'] = $cmr->translate('pass_phrase');
  $division->prints['match_value_pass_phrase'] = show_column_value('pass_phrase', $result_value["pass_phrase"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('pass_phrase') . ':' . $result_value["pass_phrase"] . '\n';
  

  $division->prints['match_label_email_sign'] = $cmr->translate('email_sign');
  $division->prints['match_value_email_sign'] = show_column_value('email_sign', $result_value["email_sign"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('email_sign') . ':' . $result_value["email_sign"] . '\n';
  

  $division->prints['match_label_group_email'] = $cmr->translate('group_email');
  $division->prints['match_value_group_email'] = show_column_value('group_email', $result_value["group_email"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('group_email') . ':' . $result_value["group_email"] . '\n';
  

  $division->prints['match_label_admin_email'] = $cmr->translate('admin_email');
  $division->prints['match_value_admin_email'] = show_column_value('admin_email', $result_value["admin_email"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('admin_email') . ':' . $result_value["admin_email"] . '\n';
  

  $division->prints['match_label_home'] = $cmr->translate('home');
  $division->prints['match_value_home'] = show_column_value('home', $result_value["home"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('home') . ':' . $result_value["home"] . '\n';
  

  $division->prints['match_label_notify'] = $cmr->translate('notify');
  $division->prints['match_value_notify'] = show_column_value('notify', $result_value["notify"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('notify') . ':' . $result_value["notify"] . '\n';
  

  $division->prints['match_label_web_site'] = $cmr->translate('web_site');
  $division->prints['match_value_web_site'] = show_column_value('web_site', $result_value["web_site"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('web_site') . ':' . $result_value["web_site"] . '\n';
  

  $division->prints['match_label_login_script'] = $cmr->translate('login_script');
  $division->prints['match_value_login_script'] = show_column_value('login_script', $result_value["login_script"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('login_script') . ':' . $result_value["login_script"] . '\n';
  

  $division->prints['match_label_adress'] = $cmr->translate('adress');
  $division->prints['match_value_adress'] = show_column_value('adress', $result_value["adress"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('adress') . ':' . $result_value["adress"] . '\n';
  

  $division->prints['match_label_my_master'] = $cmr->translate('my_master');
  $division->prints['match_value_my_master'] = show_column_value('my_master', $result_value["my_master"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('my_master') . ':' . $result_value["my_master"] . '\n';
  

//   $division->prints['match_label_allow_type'] = $cmr->translate('allow_type');
//   $division->prints['match_value_allow_type'] = show_column_value('allow_type', $result_value["allow_type"], $cmr->post_var["id_groups"]);
//   $pdf_data_text .= $cmr->translate('allow_type') . ':' . $result_value["allow_type"] . '\n';
//   
// 
//   $division->prints['match_label_allow_email'] = $cmr->translate('allow_email');
//   $division->prints['match_value_allow_email'] = show_column_value('allow_email', $result_value["allow_email"], $cmr->post_var["id_groups"]);
//   $pdf_data_text .= $cmr->translate('allow_email') . ':' . $result_value["allow_email"] . '\n';
//   
// 
//   $division->prints['match_label_allow_groups'] = $cmr->translate('allow_groups');
//   $division->prints['match_value_allow_groups'] = show_column_value('allow_groups', $result_value["allow_groups"], $cmr->post_var["id_groups"]);
//   $pdf_data_text .= $cmr->translate('allow_groups') . ':' . $result_value["allow_groups"] . '\n';
  
// 
//   $division->prints['match_label_comment'] = $cmr->translate('comment');
//   $division->prints['match_value_comment'] = show_column_value('comment', $result_value["comment"], $cmr->post_var["id_groups"]);
//   $pdf_data_text .= $cmr->translate('comment') . ':' . $result_value["comment"] . '\n';
  

  $division->prints['match_label_date_time'] = $cmr->translate('date_time');
  $division->prints['match_value_date_time'] = show_column_value('date_time', $result_value["date_time"], $cmr->post_var["id_groups"]);
  $pdf_data_text .= $cmr->translate('date_time') . ':' . $result_value["date_time"] . '\n';
  

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_groups_id"] = $cmr->post_var["id_groups"];
if(empty($GLOBALS["groups_read"])) $GLOBALS["groups_read"] = array();
	
if(!in_array ($cmr->post_var["id_groups"], $GLOBALS["groups_read"])){
    $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "groups', '" . $cmr->post_var["id_groups"] . "' ,'read'");
    $cmr->post_var["current_groups_id"] = $cmr->post_var["id_groups"];
    array_push ($GLOBALS["groups_read"], $cmr->post_var["id_groups"]);
}
// --------------------
$pdf_data_text .= "\n===========================\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_pdf_title"] = "groups";
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
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_preview_groups" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
$division->print_template("template1");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!









// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("User of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("User of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "user.*, group_name, user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user,  " . $cmr->get_conf("cmr_table_prefix") . "user_groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE ((group_name='" . $cmr->post_var["group_name"] . "') and (email=user_email)";
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
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include2")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Child group of [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Child group of [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "groups.*, group_father, group_child FROM " . $cmr->get_conf("cmr_table_prefix") . "father_groups, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE ((group_father='" . $cmr->post_var["group_name"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (name=group_child) ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];
// print($cmr->query[$cmr->action["table_name"]]);
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
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include3")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "asset";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Asset of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Asset of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT * ";
$cmr->query[$cmr->action["table_name"]] .= "FROM " . $cmr->get_conf("cmr_table_prefix") . "asset, " . $cmr->get_conf("cmr_table_prefix") . "policy ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (1";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.table_name='asset'";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.line_id=" . $cmr->get_conf("cmr_table_prefix") . "asset.id";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.state='enable'";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.allow_groups='" . $cmr->post_var["group_name"] . "'";
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
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include4"))  include($file_path);
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
$cmr->action["table_name"] = "ticket";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Ticket  of [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Ticket  of [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = " SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "ticket.*, ";
$cmr->query[$cmr->action["table_name"]] .= " DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket  ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND (my_master not LIKE ('cmr_model'))";
$cmr->query[$cmr->action["table_name"]] .= " AND ((call_log_group='" . $cmr->post_var["group_name"] . "') or (assign_to like('%" . $cmr->post_var["group_name"] . "%')) ";
$cmr->query[$cmr->action["table_name"]] .= ")";
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
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include7")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Last Message of group[") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Last Message of group[") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$cmr->query[$cmr->action["table_name"]] = "SELECT  * ";
$cmr->query[$cmr->action["table_name"]] .= " from ". $cmr->get_conf("cmr_table_prefix") ."message  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (groups_dest like('%" . $cmr->post_var["group_name"] . "%')";
// //$cmr->query[$cmr->action["table_name"]] .= " AND (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
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
$file_list[] = $cmr->get_path("module") . "modules/view_message.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_message.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include8")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Comment of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment of group [") . $cmr->post_var["group_name"] . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (";
$cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_groups"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . "groups') ";
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;


$division->module["title"] = $cmr->translate("Download of group[") . $cmr->post_var["group_name"] . "]";
print($division->show_noclose());
?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("links:"));?></legend>
<?php  
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/download.php?conf_name=conf.d/modules/conf_download.ini&refresh=", 1);;
$lk->add_link("modules/upload.php?conf_name=conf.d/modules/conf_upload.ini&refresh=", 1);;
print($lk->list_link());
?>
</fieldset>
<br />
<?php

// --------
$file_path = $cmr->get_path("home") . "home/groups/" . $cmr->post_var["group_name"] . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
// --------
$file_path = $cmr->get_path("home") . "home/groups/" . $cmr->post_var["group_name"] . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------

print($division->close());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
