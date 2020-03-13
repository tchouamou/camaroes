<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * template_login_db.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























template_login_db.php,  2011-Oct
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
if(empty($cmr->post_var["current_database"])) $cmr->post_var["current_database"] = "";
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
$database = $cmr->post_var["current_database"];
$table_name = $cmr->post_var["current_table"];
$base_name = $mod->base_name;
$val_table["_database_"] = $database;
$val_table["_table_"] = $table_name;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!





unset($cmr->page["left1"]);
unset($cmr->page["right1"]);







// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_template($cmr->themes);
// $division->module["name"]= $mod->name;
$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_giallo.gif\">"." Change Password";
// $division->module["text"] = "";
// $division->themes["text_align"] = "center";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/menu_tree_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/menu_db_all.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/admin/config_all.php?file_name=modules/database/conf.d/conf_table.ini", 1);
$division->prints["match_list_link"] = $lk->list_link();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_new.php",1);
$lk->add_link("modules/database/login_db.php",1);
$lk->add_link("modules/database/login_imap.php",1);
$division->prints["match_open_tab"] = $lk->open_module_tab(1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = ""; 
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
if(empty($cmr->post_var["current_column"])) $cmr->post_var["current_column"] = "";
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_menu_db"] = cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_link"] = ""; 
$division->prints["match_save_cookies"] = ""; 
$division->prints["match_login_db_title1"] = ""; 
$division->prints["match_login_db_title1"] = $cmr->translate($mod->base_name);
$division->prints["match_login_db_title2"] = $cmr->translate($mod->base_name . "_title");
$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "login";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_login_db.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_option_db_type"] = "";
$array_driver = get_db_drivers($cmr->config);
$division->prints["match_option_db_type"] .= select_order($cmr->language, $array_driver,  $array_driver, "");


$division->prints["match_images_path"] = $cmr->get_path("www");

$division->prints["match_label_db_login"] = $cmr->translate("db login");
$division->prints["match_label_db_type"] = $cmr->translate("db_type");
$division->prints["match_label_db_host"] = $cmr->translate("db_host");
$division->prints["match_label_db_name"] = $cmr->translate("db_name");
$division->prints["match_label_inser_uid"] = $cmr->translate("inser user name and password");
$division->prints["match_label_uid"] = $cmr->translate("uid");
$division->prints["match_label_pw"] = $cmr->translate("pw");
$division->prints["match_user_name"] = $cmr->translate("user name");

$division->prints["match_label_save_cookies"] = $cmr->translate(" Save to (COOKIES)");
$division->prints["match_label_pw_encode"] = pw_encode($cmr->get_session("cmr_img_code"));
$division->prints["match_label_img_code"] = $cmr->get_session("cmr_img_code");
$division->prints["match_label_image_code"] = $cmr->translate("image_code");
$division->prints["match_value_image_code"] = pw_encode($cmr->get_session("cmr_img_code"));
$division->prints["match_image_code"] = $cmr->get_session("cmr_img_code");
$division->prints["match_alt_code"] = "[code]";

$division->prints["match_cookie_db_type"] = "";
$division->prints["match_cookie_db_host"] = "";
$division->prints["match_cookie_db_name"] = "";
$division->prints["match_cookie_db_user"] = "";
$division->prints["match_cookie_db_pw"] = "";

@ $division->prints["match_cookie_db_type"] =  $_COOKIE["db_type"];
@ $division->prints["match_cookie_db_host"] =  $_COOKIE["db_host"];
@ $division->prints["match_cookie_db_name"] =  $_COOKIE["db_name"];
@ $division->prints["match_cookie_db_user"] =  $_COOKIE["db_user"];
@ $division->prints["match_cookie_db_pw"] =  $_COOKIE["db_pw"];

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("login");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to login");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_login_db" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_login_db" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "modules/database/templates/template_login_db" . $cmr->get_ext("template");
// $file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_login_db" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>