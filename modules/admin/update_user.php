<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























update_user.php,Ver 3.0  2011-Sep-Fri 21:50:35
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
$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_giallo.gif\">"." Update User";
// $division->module["text"] = "";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




$division->prints["match_link_legend"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_user"])){
	$id_user = $cmr->get_user("auth_id");
	$cmr->post_var["id_user"] = $cmr->get_user("auth_id");
}
$id_user = $cmr->post_var["id_user"];

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);

$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);
$lk->add_link("modules/report_user.php?id_user=" . $id_user . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);

$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_email.php?conf_name=conf.d/modules/conf_change_email.ini&id_user=" . $id_user . "&refresh=", 1);;

$lk->add_link("modules/view_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);
$lk->add_link("modules/admin/change_user.php?conf_name=conf.d/modules/conf_change_user.ini&id_user=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/menu_user.php?conf_name=conf.d/conf_user.ini&id_user=".$id_user."", 1);



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_groups"]))
$cmr->post_var["id_groups"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_list"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_user"] = "";
$division->prints["match_label_passphrase"] = $cmr->translate("pass phrase");

// -----------
// $sql_user = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user ";
// $sql_user .= " WHERE id='" . $id_user . "'";
// $result_user = &$cmr->db_connection->query($sql_user) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// $val_user = $result_user->FetchNextObject(false);
// -----------
// -----------
// -----------
$val_user = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "*", "id", $id_user);
$_SESSION["__update__"] = array();
foreach($val_user as $key => $value)
$_SESSION["__update__"][$key] = $val_user[$key];
// -----------
// -----------
// -----------
$sql_ugroup = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups ";
$sql_ugroup .= " WHERE user_email='" . $val_user["email"] . "'";

$result_ugroup = &$cmr->db_connection->query($sql_ugroup) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
$val_user_group = $result_ugroup->fetch_object();
// -----------
// -----------
$list_group = $cmr->get_user("auth_list_group");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE " . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY name;";
$cmr->query["title1"] = $cmr->query[$cmr->action["table_name"]];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user_groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE user_email='" . $val_user["email"] . "' AND ";
$cmr->query[$cmr->action["table_name"]] .= $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY group_name;";
$cmr->query["title2"] = $cmr->query["user_groups"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$_SESSION["__update__"]["group_name2"] = list_input($cmr->db_connection, $cmr->query["title2"], "group_name");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_user_title1"] = $cmr->translate("update user (") . $val_user["email"] . ")";
$division->prints["match_user_title2"] = $cmr->translate(" To update user or change password");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "update_form";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_update_user.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
$division->prints["match_input_hidden_id"] = input_hidden("<input type=\"hidden\" value=\"" . $id_user . "\" name=\"id_user\" />");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_table_login_script"] = "";
$division->prints["match_label_email"] = $cmr->translate("email");
$division->prints["match_label_state"] = $cmr->translate("state");
$division->prints["match_label_public_key"] = $cmr->translate("public_key");
$division->prints["match_label_private_key"] = $cmr->translate("private_key");
$division->prints["match_label_lang"] = $cmr->translate("language");
$division->prints["match_label_tel"] = $cmr->translate("tel");
$division->prints["match_label_guest"] = $cmr->translate("guest");
$division->prints["match_label_lastname"] = $cmr->translate("lastname");
$division->prints["match_label_name"] = $cmr->translate("name");
$division->prints["match_label_uid"] = $cmr->translate("uid");
$division->prints["match_label_pw"] = $cmr->translate("pw");
$division->prints["match_label_cel"] = $cmr->translate("cel");
$division->prints["match_label_adress"] = $cmr->translate("adress");
$division->prints["match_label_function"] = $cmr->translate("function");
$division->prints["match_label_location"] = $cmr->translate("location");
$division->prints["match_label_sexe"] = $cmr->translate("sexe");
$division->prints["match_label_style"] = $cmr->translate("style");
$division->prints["match_label_group"] = $cmr->translate("group");
$division->prints["match_label_email_sign"] = $cmr->translate("email_sign");
$division->prints["match_label_comment"] = $cmr->translate("comment");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_needed"] = $cmr->translate("needed");
$division->prints["match_legend_usefull"] = $cmr->translate("usefull");
$division->prints["match_legend_optional"] = $cmr->translate("optional");
$division->prints["match_legend_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_update"] = $cmr->translate("update");
$division->prints["match_label_change"] = $cmr->translate("change");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_state"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=state", "", "->");
$division->prints["match_link_type"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=type", "", "->");
$division->prints["match_link_type"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=type", "", "->");
$division->prints["match_link_sexe"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=sexe", "", "->");

$division->prints["match_pw_disabled"] = " disabled readonly ";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_val_public_key"] = "";
$division->prints["match_val_private_key"] = "";
$division->prints["match_val_pass_phrase"] = "";
$division->prints["match_label_lang"] = $cmr->translate("langage");
$division->prints["match_label_type"] = $cmr->translate("privilege");
$division->prints["match_label_login_script"] = $cmr->translate("login script");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_val_lang"] = htmlentities($val_user["lang"]);
$division->prints["match_val_style"] = htmlentities($val_user["style"]);
$division->prints["match_default_sexe"] = ($val_user["sexe"]);
$division->prints["match_val_type"] = "";//$val_user_group->type;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_value_pw"] = "*******";
$division->prints["match_val_email"] = htmlentities($val_user["email"]);
$division->prints["match_val_name"] = htmlentities($val_user["name"]);
$division->prints["match_val_last_name"] = htmlentities($val_user["last_name"]);
$division->prints["match_val_uid"] = htmlentities($val_user["uid"]);
$division->prints["match_val_tel"] = htmlentities($val_user["tel"]);
$division->prints["match_val_cel"] = htmlentities($val_user["cel"]);
$division->prints["match_val_role"] = htmlentities($val_user["role"]);
$division->prints["match_val_adress"] = htmlentities($val_user["adress"]);
$division->prints["match_val_location"] = htmlentities($val_user["location"]);
// $division->prints["match_val_public_key"] = htmlentities($val_user["public_key"]);
// $division->prints["match_val_private_key"] = htmlentities($val_user["private_key"]);
// $division->prints["match_val_pass_phrase"] = htmlentities($val_user["pass_phrase"]);
$division->prints["match_val_email_sign"] = $val_user["email_sign"];
$division->prints["match_val_login_script"] = $val_user["login_script"];
$division->prints["match_val_comment"] = "";
// $division->prints["match_val_comment"] = $val_user["comment"];
$division->prints["match_val_config"] = "";

if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_val_config"] .= "<tr>";
  $division->prints["match_val_config"] .= "<td>" . $cmr->translate("config") . ":</td><td colspan=\"3\"><textarea rows=\"3\" cols=\"60\" name=\"login_script\" >" . $val_user["login_script"] . "</textarea></td>";
  $division->prints["match_val_config"] .= "</tr>";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_default_style"] = $val_user["style"];
$division->prints["match_default_type"] = get_user_type($val_user);
$division->prints["match_default_sexe"] = $val_user["sexe"];
$division->prints["match_default_lang"] = $val_user["lang"];
$division->prints["match_default_state"] = ($val_user["state"]);

$division->prints["match_options_sexe"] = $cmr->print_select( $cmr->get_conf("cmr_table_prefix") . "user", "sexe", "type");
$division->prints["match_options_type"] = "<option value=\"" . $val_user["type"] . "\">" . $val_user["type"] . "</option>";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
$division->prints["match_options_type"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
};


$division->prints["match_options_state"] =  $cmr->print_select( $cmr->get_conf("cmr_table_prefix") . "user", "state", "type");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_options_lang"] = "";
$array_value = get_languages_list($cmr->config);
$division->prints["match_options_lang"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_options_style"] = "";
$array_value = get_themes_list($cmr->config);
$division->prints["match_options_style"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->label["div"] = "choose_group";
$division->label["name"] = "group_list";
$division->label["name1"] = "group_name1";
$division->label["name2"] = "group_name2";
$division->label["name3"] = "";
$division->label["title1"] = $cmr->translate("Groups Available");
$division->label["title2"] = $cmr->translate("Groups of user [") . $val_user["email"] . "]";
$division->label["title3"] = "";
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements");
$division->label["column_name1"] = "name";
$division->label["column_name2"] = "group_name";
$division->label["column_name3"] = "";
$cmr->query["title1"] = $cmr->query["title1"];
$cmr->query["title2"] = $cmr->query["title2"];
$cmr->query["title3"] = "";
//--------------- create select list usefull for choose ---
$division->prints["match_list_choose"] = list_choose($cmr->query, $division->label, $cmr->db_connection);
//---------------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("update user");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to update this user");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_update_user" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
