<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update_groups.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























update_groups.php,Ver 3.0  2011-Oct-Tue 15:13:38
*/

/**
 * Information about
 * $cmr->db["sql_query1"] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->action["form_action_message"] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
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


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_giallo.gif\">"." Update Group";
// $division->module["text"] = "";





//












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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$id_groups = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
if(empty($cmr->post_var["id_groups"])){
	$cmr->post_var["id_groups"] = $id_groups;
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
$lk->add_link("modules/admin/change_groups.php?conf_name=conf.d/modules/conf_change_groups.ini&id_groups=" . $id_groups . "&refresh=", 1);;
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$list_group = $cmr->get_user("auth_list_group");
// $sql_group = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups WHERE (id='" . $cmr->post_var["id_groups"] . "')";
// $result_group = &$cmr->db_connection->query($sql_group) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// $val_group = $result_group->FetchNextObject(false);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$val_group = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "*", "id", $cmr->post_var["id_groups"]);
$_SESSION["__update__"] = array();
foreach($val_group as $key => $value)
$_SESSION["__update__"][$key] = $val_group[$key];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE group_name='" . $val_group["name"] . "' AND ";
$cmr->query[$cmr->action["table_name"]] .= "" . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY user_email;";
$cmr->query["title2"] = $cmr->query[$cmr->action["table_name"]];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "father_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "father_groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE group_child='" . $val_group["name"] . "' AND ";
$cmr->query[$cmr->action["table_name"]] .= "" . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY group_father;";
$cmr->query["title02"] = $cmr->query[$cmr->action["table_name"]];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "father_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "father_groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE group_father='" . $val_group["name"] . "' AND ";
$cmr->query[$cmr->action["table_name"]] .= "" . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY group_child;";
$cmr->query["title03"] = $cmr->query[$cmr->action["table_name"]];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$list_group = $cmr->get_user("auth_list_group");
$cmr->post_var["id_groups"] = $cmr->get_user("auth_id");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$_SESSION["__update__"]["user_email1"] = list_input($cmr->db_connection, $cmr->query["title2"], "user_email");
$_SESSION["__update__"]["group_father1"] = list_input($cmr->db_connection, $cmr->query["title02"], "group_father");
$_SESSION["__update__"]["group_child1"] = list_input($cmr->db_connection, $cmr->query["title03"], "group_child");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "update_groups";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_update_groups.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_id"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["id_groups"] . "\" name=\"id_groups\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_links"] = $cmr->translate("links");

$division->prints["match_label_guest"] = $cmr->translate("guest");
$division->prints["match_label_users"] = $cmr->translate("users");
$division->prints["match_label_fathers_groups"] = $cmr->translate("fathers and childs groups");

$division->prints["match_label_name"] = $cmr->translate("name");
$division->prints["match_label_comment"] = $cmr->translate("comment");
$division->prints["match_label_state"] = $cmr->translate("state");
$division->prints["match_label_email_sign"] = $cmr->translate("email_sign");
$division->prints["match_label_login_script"] = $cmr->translate("login script");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_needed"] = $cmr->translate("needed");
$division->prints["match_legend_usefull"] = $cmr->translate("usefull");
$division->prints["match_legend_optional"] = $cmr->translate("optional");
$division->prints["match_legend_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_link_state"] = $cmr->module_link("modules/admin/change_type.php?table_name=groups&column_name=state", "", "->");
$division->prints["match_link_type"] = $cmr->module_link("modules/admin/change_type.php?table_name=groups&column_name=type", "", "->");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_default_state"] = ($val_group["state"]);
$division->prints["match_default_type"] = get_user_type($val_group);

$division->prints["match_link_type"] = $cmr->module_link("modules/admin/change_type.php?table_name=groups&column_name=type", "", "->");
$division->prints["match_label_type"] = $cmr->translate("privilege");

$division->prints["match_val_name"] = htmlentities($val_group["name"]);
$division->prints["match_val_comment"] = "";
// $division->prints["match_val_comment"] = htmlentities($val_group["comment"]);
$division->prints["match_val_email_sign"] = htmlentities($val_group["email_sign"]);
$division->prints["match_val_login_script"] = $val_group["login_script"];

$division->prints["match_options_state"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "state", "type");
$division->prints["match_options_type"] = "<option value=\"" . $val_group["type"] . "\">" . $val_group["type"] . "</option>";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
$division->prints["match_options_type"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "type", "type");
};
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->label["div"] = "choose_user";
$division->label["name"] = "user_list";
$division->label["name1"] = "email1";
$division->label["name2"] = "user_email1";
$division->label["name3"] = "";
$division->label["title1"] = $cmr->translate("Users Available");
$division->label["title2"] = $cmr->translate("Users in group [") . $val_group["name"] . "]";
$division->label["title3"] = "";
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements");
$division->label["column_name1"] = "email";
$division->label["column_name2"] = "user_email";
$division->label["column_name3"] = "";
$cmr->query["title1"] = $cmr->query["title1"];
$cmr->query["title2"] = $cmr->query["title2"];
$cmr->query["title3"] = "";
//--------------- create select list usefull for choose ---
$division->prints["match_list_choose1"] = list_choose($cmr->query, $division->label, $cmr->db_connection);
//---------------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_fathers"] = $cmr->translate("fathers and childs groups");

$division->label["div"] = "choose_group";
$division->label["name"] = "group_list";
$division->label["name1"] = "group_father1";
$division->label["name2"] = "group_name1";
$division->label["name3"] = "group_child1";
$division->label["title1"] = $cmr->translate("Father group of [") . $val_group["name"] . "]";
$division->label["title2"] = $cmr->translate("Groups Available");
$division->label["title3"] = $cmr->translate("child group of [") . $val_group["name"] . "]";
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements for child group");
$division->label["column_name1"] = "group_father";
$division->label["column_name2"] = "name";
$division->label["column_name3"] = "group_child";
$cmr->query["title1"] = $cmr->query["title02"];
$cmr->query["title2"] = $cmr->query["title01"];
$cmr->query["title3"] = $cmr->query["title03"];
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
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_update_groups" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);


$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
