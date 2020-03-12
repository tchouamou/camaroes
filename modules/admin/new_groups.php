<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
 
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























new_groups.php,Ver 3.0  2011-Oct-Tue 15:13:38  mbretter Exp$
*/

/**
 * Information about
 *$cmr->db["sql_query1"] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 *$cmr->action["form_action_message"] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 *$cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 *$cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
//$division->load_themes($cmr->themes);
$division->module["name"] = $mod->name;




$division->module["title"] = cmr_search_replace("_", " ",$cmr->translate("" . $mod->base_name)); 
//$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/new.gif\">"." News Group";
//$division->module["text"] = "";







$id = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!isset($cmr->post_var["id_groups"])){
	$cmr->post_var["id_groups"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/search_groups.php?conf_name=conf.d/modules/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/delete_groups.php?conf_name=conf.d/modules/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/preview_groups.php?conf_name=conf.d/modules/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/report_groups.php?id_groups=" . $cmr->post_var["id_groups"] . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_groups.php?conf_name=conf.d/modules/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);
$lk->add_link("modules/admin/change_groups.php?conf_name=conf.d/modules/conf_change_groups.ini&id_groups=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/menu_groups.php?conf_name=conf.d/conf_groups.ini&id_groups=" . $cmr->post_var["id_groups"], 1);


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!isset($cmr->post_var["id_user"])){
    $cmr->post_var["id_user"] = $cmr->get_user("auth_id");
} 
$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_email.php?conf_name=conf.d/modules/conf_change_email.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$list_group =$cmr->user["auth_list_group"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE " . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY email;";
$cmr->query["title1"] = $cmr->query[$cmr->action["table_name"]];
// -----------
// -----------

$list_group =$cmr->user["auth_list_group"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE " . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY name;";
$cmr->query["title01"] = $cmr->query[$cmr->action["table_name"]];
// -----------
// -----------

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["cmr_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_groups";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_new_groups.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
$division->prints["match_input_hidden_id"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_groups_title1"] = $cmr->translate($mod->base_name);
// $division->prints["match_groups_title2"] = ucfirst($cmr->language['" . $mod->base_name . "_title']);
$division->prints["match_groups_title2"] = $cmr->translate("new group or new client");

$division->prints["match_label_links"] = $cmr->translate("links");
$division->prints["match_label_important"] = $cmr->translate("important");


$division->prints["match_table_login_script"] = "";
$division->prints["match_label_guest"] = $cmr->translate("guest");
$division->prints["match_label_users"] = $cmr->translate("users");
$division->prints["match_label_fathers_groups"] = $cmr->translate("fathers and childs groups");

$division->prints["match_label_name"] = $cmr->translate("name");
$division->prints["match_label_comment"] = $cmr->translate("comment");
$division->prints["match_label_state"] = $cmr->translate("state");
$division->prints["match_label_email_sign"] = $cmr->translate("email_sign");
$division->prints["match_label_login_script"] = $cmr->translate("login script"); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_needed"] = $cmr->translate("needed");
$division->prints["match_legend_usefull"] = $cmr->translate("usefull");
$division->prints["match_legend_optional"] = $cmr->translate("optional");
$division->prints["match_legend_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_default_state"] = "active";
$division->prints["match_default_type"] = "0";

$division->prints["match_val_name"] = "";
$division->prints["match_val_comment"] = "";
$division->prints["match_val_email_sign"] = "";
$division->prints["match_val_login_script"] = "";

$division->prints["match_link_type"] = $cmr->module_link("modules/admin/change_type.php?table_name=groups&column_name=type", "", "->");
$division->prints["match_label_type"] = $cmr->translate("privilege");
$division->prints["match_default_type"] = "";
$division->prints["match_options_type"] = "";


$division->prints["match_link_type"] = $cmr->module_link( "modules/admin/change_type.php?table_name=groups&column_name=type", "", "->");
$division->prints["match_link_state"] = $cmr->module_link( "modules/admin/change_type.php?table_name=groups&column_name=state", "", "->");

$division->prints["match_options_state"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "state", "type");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
$division->prints["match_options_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "type", "type");
};
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->label["div"] = "choose_user";
$division->label["name"] = "user_list";
$division->label["name1"] = "email1";
$division->label["name2"] = "user_email1";
$division->label["name3"] = "";
$division->label["title1"] = $cmr->translate("Users Available");
$division->label["title2"] = $cmr->translate("Users in group ");
$division->label["title3"] = "";
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements");
$division->label["column_name1"] = "email";
$division->label["column_name2"] = "user_email";
$division->label["column_name3"] = "";
$cmr->query["title1"] = $cmr->query["title1"];
$cmr->query["title2"] = "";
$cmr->query["title3"] = "";
//--------------- create select list usefull for choose ---
$division->prints["match_list_choose1"] = list_choose($cmr->query, $division->label, $cmr->db_connection);
//---------------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->label["div"] = "choose_group";
$division->label["name"] = "group_list";
$division->label["name1"] = "group_father1";
$division->label["name2"] = "group_name1";
$division->label["name3"] = "group_child1";
$division->label["title1"] = $cmr->translate("Father group ");
$division->label["title2"] = $cmr->translate("Groups Available");
$division->label["title3"] = $cmr->translate("child group ");
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements for child group");
$division->label["column_name1"] = "group_father";
$division->label["column_name2"] = "name";
$division->label["column_name3"] = "group_child";
$cmr->query["title1"] = "developer|admin|noc|root|soc|tecnician|first_level|second_level|last_level";
$cmr->query["title2"] = $cmr->query["title01"];
$cmr->query["title3"] = "";
//--------------- create select list usefull for choose ---
$division->prints["match_list_choose2"] = list_choose($cmr->query, $division->label, $cmr->db_connection);
//---------------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("update group");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to update this group");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_groups" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_new_groups" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

 
$division->print_template();
$division->prints = array();
?>
