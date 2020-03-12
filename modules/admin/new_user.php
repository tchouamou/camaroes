<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_user.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























new_user.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 *$division object istance of the class windowss
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

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


//$division->load_themes($cmr->themes);

$division->module["name"] = $mod->name;




$division->module["title"] = cmr_search_replace("_", " ",$cmr->translate("" . $mod->base_name)); //$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/new.gif\">"." New User";
//$division->module["text"] = "";





//












$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$division->prints["match_link_legend"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!isset($cmr->post_var["id_user"])) $cmr->post_var["id_user"] = $cmr->get_user("auth_id");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/delete_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/report_user.php?id_user=" . $cmr->post_var["id_user"] . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);

$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_email.php?conf_name=conf.d/modules/conf_change_email.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;

$lk->add_link("modules/view_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/admin/change_user.php?conf_name=conf.d/modules/conf_change_user.ini&id_user=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/menu_user.php?conf_name=conf.d/conf_user.ini&id_user=".$cmr->post_var["id_user"]."", 1);



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!isset($cmr->post_var["id_groups"])){
	$cmr->post_var["id_groups"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $cmr->post_var["id_groups"] . "&refresh=", 1);;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_list"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


//$user_email = return_key($cmr->db_connection,$cmr->get_conf("cmr_table_prefix") . "user", "id", "email",$cmr->post_var["id_user"]);
$list_group = $cmr->get_user("auth_list_group");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = " SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE " . $cmr->action["where"];
$cmr->query[$cmr->action["table_name"]] .= " ORDER BY name;";
$cmr->query["title1"] = $cmr->query[$cmr->action["table_name"]];
// -----------
// -----------
// $cmr->post_var["id_groups"] = return_key($cmr->db_connection,$cmr->get_conf("cmr_table_prefix") . "groups", "id", "name",$cmr->user["auth_group"]);







// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_user_title1"] = $cmr->translate($mod->base_name);
// $division->prints["match_user_title2"] = ucfirst($cmr->language['" . $mod->base_name . "_title']);
$division->prints["match_user_title2"] = $cmr->translate("new user or new contact");



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_user";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_new_user.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
$division->prints["match_input_hidden_id"] = "";

$division->prints["match_label_user"] = "";
$division->prints["match_options_type"] = "";
$division->prints["match_label_passphrase"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_options_type"] = "<option value=\"0\">" . $cmr->translate("guest") . "</option>";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
$division->prints["match_options_type"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
};

$division->prints["match_default_type"] = "guest";
$division->prints["match_default_type"] = "default";
$division->prints["match_default_sexe"] = "";
$division->prints["match_default_lang"] = $cmr->translate("default");;
$division->prints["match_default_style"] = $cmr->translate("default");
$division->prints["match_default_state"] = "active";

// <option value=\"" . $val_user->type . "\">" . $val_user->type . "</option>";
// <option value=\"" . $val_user->sexe . "\">" . $val_user->sexe . "</option>";

$division->prints["match_label_important"] = $cmr->translate("important");
$division->prints["match_label_link"] = $cmr->translate("links");
$division->prints["match_label_email"] = $cmr->translate("email");
$division->prints["match_label_state"] = $cmr->translate("state");
$division->prints["match_label_type"] = $cmr->translate("privilege");
$division->prints["match_label_guest"] = $cmr->translate("guest");
$division->prints["match_label_lastname"] = $cmr->translate("lastname");
$division->prints["match_label_name"] = $cmr->translate("name");
$division->prints["match_label_uid"] = $cmr->translate("uid");
$division->prints["match_label_pw"] = $cmr->translate("pw");
$division->prints["match_label_tel"] = $cmr->translate("tel");
$division->prints["match_label_cel"] = $cmr->translate("cel");
$division->prints["match_label_adress"] = $cmr->translate("adress");
$division->prints["match_label_function"] = $cmr->translate("function");
$division->prints["match_label_location"] = $cmr->translate("location");
$division->prints["match_label_sexe"] = $cmr->translate("sexe");
$division->prints["match_label_public_key"] = $cmr->translate("public_key");
$division->prints["match_label_private_key"] = $cmr->translate("private_key");
$division->prints["match_label_pass phrase"] = $cmr->translate("pass phrase:");
$division->prints["match_label_lang"] = $cmr->translate("language");
$division->prints["match_label_style"] = $cmr->translate("style");
$division->prints["match_label_default"] = $cmr->translate("default");
$division->prints["match_label_email_sign"] = $cmr->translate("email_sign");
$division->prints["match_label_comment"] = $cmr->translate("comment");
$division->prints["match_label_login script"] = $cmr->translate("login script");
$division->prints["match_label_group"] = $cmr->translate("group");
$division->prints["match_label_login_script"] = $cmr->translate("login script"); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_needed"] = $cmr->translate("needed");
$division->prints["match_legend_usefull"] = $cmr->translate("usefull");
$division->prints["match_legend_optional"] = $cmr->translate("optional");
$division->prints["match_legend_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_update"] = $cmr->translate("update");
$division->prints["match_label_change"] = $cmr->translate("change");

$division->prints["match_pw_disabled"] = "";

$division->prints["match_val_email"] = "";
$division->prints["match_val_guest"] = "";
$division->prints["match_val_lastname"] = "";
$division->prints["match_val_name"] = "";
$division->prints["match_val_uid"] = "";
$division->prints["match_val_pw"] = "";
$division->prints["match_val_tel"] = "";
$division->prints["match_val_cel"] = "";
$division->prints["match_val_adress"] = "";
$division->prints["match_val_function"] = "";
$division->prints["match_val_location"] = "";
$division->prints["match_val_public_key"] = "";
$division->prints["match_val_private_key"] = "";
$division->prints["match_val_pass_phrase"] = "";

$division->prints["match_val_last_name"] = "";
$division->prints["match_value_pw"] = "";
$division->prints["match_val_role"] = "";
$division->prints["match_val_email_sign"] = "";
$division->prints["match_val_comment"] = "";
$division->prints["match_val_login_script"] = "";
$division->prints["match_table_login_script"] = "";

$division->prints["match_link_state"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=state", "", "->");
$division->prints["match_link_type"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=type", "", "->");
$division->prints["match_link_type"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=type", "", "->");
$division->prints["match_link_sexe"] = $cmr->module_link( "modules/admin/change_type.php?table_name=user&column_name=sexe", "", "->");


$division->prints["match_options_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
$division->prints["match_options_sexe"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "sexe", "type");
$division->prints["match_options_state"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "state", "type");

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
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



$division->label["div"] = "choose_group";
$division->label["name"] = "group_list";
$division->label["name1"] = "group_name1";
$division->label["name2"] = "group_name2";
$division->label["name3"] = "";
$division->label["title1"] = $cmr->translate("Groups Available");
$division->label["title2"] = $cmr->translate("Groups of user");
$division->label["title3"] = "";
$division->label["comment"] = $cmr->translate("!! If no javascript, edit to add elements");
$division->label["column_name1"] = "name";
$division->label["column_name2"] = "";
$division->label["column_name3"] = "";
$cmr->query["title1"] = $cmr->query["title1"];
$cmr->query["title2"] = "";
$cmr->query["title3"] = "";
//--------------- create select list usefull for choose ---
$division->prints["match_list_choose"] = list_choose($cmr->query, $division->label, $cmr->db_connection);
//---------------------------------------------------------

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("Create user");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to create this user");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_new_user" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
