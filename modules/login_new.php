<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_login.php
 *  ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























new_login.php,  2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["login_to"] = get_post("login_to");
$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $user_email=$cmr->user["auth_email"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);

$division->module["name"]= "login";
$division->themes["module_positionx"]= "middle";
$division->themes["module_positiony"]= "1;1;1;1;1;1";

$division->module["title"] = $cmr->translate("login");
if(isset($cmr->post_var["login_to"])) $division->module["title"] = $cmr->translate("login to")." : " . $cmr->post_var["login_to"];
// $division->module["text"] = $str;









$division->header_tools_right = 0;








$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_new.php",1);
$lk->add_link("modules/database/login_db.php",1);
$lk->add_link("modules/database/login_imap.php",1);
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_login_new_title1"] = ""; 
$division->prints["match_login_new_title2"] = ""; 
if(isset($cmr->language[$mod->base_name])) 
$division->prints["match_login_new_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_login_new_title2"] = $cmr->translate($mod->base_name . "_title");

$division->prints["match_module_message"] = "";
if(exist_message($cmr->config,  "new_login.php")) $division->prints["match_module_message"] = module_message($cmr->config,  $cmr->db_connection, "new_login.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_login_failled"] = "";
if(get_post("force_login") == "yes"){
    $division->prints["match_login_failled"] = $cmr->translate("login failled");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_title"] = "";

$division->prints["cmr_wwwpath"] = "";
$division->prints["match_option_login_to"] = "";
$division->prints["match_option_db_type"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_encoding"] = $cmr->get_language("cmr_charset");
$division->prints["match_language"] = $cmr->get_language("cmr_language");
// $division->prints["match_html_header_lang"] = $cmr->get_conf("html_header_lang");
$division->prints["match_content_type"] = $cmr->get_conf("html_meta_content_type");
$division->prints["match_keyword"] = $cmr->get_conf("html_meta_keyword");
$division->prints["match_description"] = $cmr->get_conf("html_meta_description");
$division->prints["match_author"] = $cmr->get_conf("html_meta_author");
$division->prints["match_date"] = $cmr->get_conf("html_meta_date");
$division->prints["match_refresh"] = $cmr->get_page("refresh");
$division->prints["match_bgcolor"] = $cmr->get_theme("bgcolor");
$division->prints["match_background"] = $cmr->get_theme("background");
$division->prints["match_no_java"] = $cmr->translate("no_java");
$division->prints["match_logo_icon"] = $cmr->get_conf("cmr_logo_icon");

$division->prints["match_style"] = $cmr->get_path("www") . $cmr->get_theme("cmr_style");
$division->prints["match_javascript"] = $cmr->get_path("www") . $cmr->get_page("cmr_jscrip");
$division->prints["match_clock_engine"] = ";";
if(($cmr->get_conf("cmr_clock_engine"))) 
$division->prints["match_clock_engine"] = $cmr->get_page("cmr_clock_engine")."; ";

$division->prints["match_ajax_engine"] = ";";
if(($cmr->get_conf("cmr_ajax_engine"))) $division->prints["match_ajax_engine"] = "ajax_event('". $cmr->get_page("cmr_ajax_engine")."')";

$division->prints["match_onload"] = ";";
$division->prints["match_noscript"] = $cmr->translate("!!! Need java script to run well !!!");
$division->prints["match_sound"] = 0;
if($cmr->get_conf('cmr_exec_sound')) $division->prints["match_sound"] = "";
$cmr->page["page_title"] = "login";
// $division->prints["match_form_id"] = "login";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_login_new" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_login_new" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_login_new" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template("template1");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_label_switch"] = $cmr->translate("switch to");
$division->prints["match_label_view_mode"] = $cmr->translate("view mode ");
$division->prints["match_label_normal"] = $cmr->translate("Normal");
$division->prints["match_label_user"] = $cmr->translate("user ");
$division->prints["match_option_users"] = $cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'email,state', 'column', $cmr->config['db_name'], 'email', $cmr->config['cmr_max_view'], 'email', '35');
$division->prints["match_label_group"] = $cmr->translate("group ");
$division->prints["match_option_groups"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->config["db_name"], "name", $cmr->config["cmr_max_view"], "name", "35");
$division->prints["match_label_type"] = $cmr->translate("type ");
$division->prints["match_option_login_type"] = $cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'type', 'type', $cmr->config['db_name'], 'type', $cmr->config['cmr_max_view'], 'type', '35');




$division->prints["match_cmr_images_path"] = $cmr->get_path("www");
$division->prints["match_label_Login"] = $cmr->translate("Login");

$division->prints["match_label_login_to"] = $cmr->translate("login to");
$division->prints["match_all"] = $cmr->translate("all");

$division->prints["match_option_login_to"] = "";


$division->prints["match_options_login_to"] = "";
$array_value = get_page_list($cmr->config);
$division->prints["match_options_login_to"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");

$division->prints["match_login"] = $cmr->translate("login");


if(!empty($cmr->post_var["login_to"])){
$division->prints["match_options_login_to"] .= "<option selected value=\"" .$cmr->post_var["login_to"]."\">".$cmr->post_var["login_to"]."</option>";
}
$division->print_template("template2");

if(($cmr->get_conf("cmr_allow_select_login")))
{
$division->print_template("template3");
}

        
$division->prints["match_label_normal"] = $cmr->translate("normal");
$division->prints["match_label_cert"] = $cmr->translate("cert");
$division->prints["match_label_demo"] = $cmr->translate("demo");
$division->prints["match_label_read_only"] = $cmr->translate("read only");
$division->prints["match_label_certificate"] = $cmr->translate("certificate");
$division->prints["match_legend_link"] = $cmr->translate("link");
 
@ $division->prints["match_cookie_auth_cert"] = $_COOKIE["auth_cert"];
if(($cmr->get_conf("cmr_allow_certificate_login")))
{
$division->print_template("template4");
}

$division->prints["match_user_name"] = $cmr->translate("insert user name and password");
$division->prints["match_label_uid"] = $cmr->translate("id user:");
$division->prints["match_label_password"] = $cmr->translate("password:");

@ $division->prints["match_cookie_auth_user"] = $_COOKIE["auth_user"];
@ $division->prints["match_cookie_auth_pw"] = $_COOKIE["auth_pw"];
 $division->prints["match_save_cookies"] = "";
@ $division->prints["match_save_cookies"] = $_COOKIE["save_cookies"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_value_image_code"] = pw_encode($cmr->get_session("cmr_img_code"));
$division->prints["match_image_code"] = $cmr->get_session("cmr_img_code");
$division->prints["match_alt_code"] = "[code]";
if(($cmr->get_session("cmr_img_code"))){
}
$division->prints["match_label_image_code"] = $cmr->translate("image code:");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_login"] = $cmr->translate("login");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
// $division->prints["match_submit"] = $cmr->translate("login");
// $division->prints["match_submit_java"] = $cmr->translate("confirm login");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_label_info"] = $cmr->translate("info");
$division->prints["match_label_save_cookies"] = $cmr->translate(" Save to (cookies)");

$division->prints["match_link_login"] ="<a href=\"index.php?cmr_mode=login\" ><big>" . $cmr->translate("Login") . "</big></a>";
$division->prints["match_link_logout"] ="<a href=\"index.php?cmr_mode=logout\" ><big>" . $cmr->translate("logout") . "</big></a>";

if(($cmr->get_conf("cmr_allow_forget_account")))
$division->prints["match_link_forget_account"] = "<a href=\"index.php?cmr_mode=forget_account\" ><big>" . $cmr->translate("Forget Account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_inscription")))
$division->prints["match_link_inscription"] = "<a href=\"index.php?cmr_mode=inscription\" ><big>" . $cmr->translate("New account") . "</big></a>";

if(($cmr->get_conf("cmr_allow_validation")))
$division->prints["match_link_validation"] = "<a href=\"index.php?cmr_mode=validation\" ><big>" . $cmr->translate("Account Validation") . "</big></a>";


$division->prints["match_label_admin_user"] = $cmr->translate("default admin user:");
$division->prints["match_label_admin_pw"] = $cmr->translate("default admin pw:");
$division->prints["match_label_operator_user"] = $cmr->translate("default operator user:");
$division->prints["match_label_operator_pw"] = $cmr->translate("default operator pw:");
$division->prints["match_label_guest_user"] = $cmr->translate("default guest user:");
$division->prints["match_label_guest_pw"] = $cmr->translate("default guest pw:");

$division->print_template("template5");
if(($cmr->get_conf("cmr_allow_default_pw")))
{
$division->print_template("template6");
}




$cmr->prints["match_option_db_type"] = "";
$array_driver = get_db_drivers($cmr->config);
$division->prints["match_option_db_type"] .= select_order($cmr->language, $array_driver,  $array_driver, "");



$division->prints["match_label_database"] = $cmr->translate("database");
$division->prints["match_label_db_type"] = $cmr->translate("database type");
$division->prints["match_label_db_host"] = $cmr->translate("database host");
$division->prints["match_label_db_name"] = $cmr->translate("database name");
$division->prints["match_label_db_user"] = $cmr->translate("database user");
$division->prints["match_label_db_pw"] = $cmr->translate("database password");

 $division->prints["match_cookie_db_type"] = "";
 $division->prints["match_cookie_db_host"] = "";
 $division->prints["match_cookie_db_name"] = "";
 $division->prints["match_cookie_db_user"] = "";
 $division->prints["match_cookie_db_pw"] = "";

@ $division->prints["match_cookie_db_pw"] = $_COOKIE["db_pw"];
@ $division->prints["match_cookie_db_user"] = $_COOKIE["db_user"];
@ $division->prints["match_cookie_db_name"] = $_COOKIE["db_name"];
@ $division->prints["match_cookie_db_host"] = $_COOKIE["db_host"];
@ $division->prints["match_cookie_db_type"] = $_COOKIE["db_type"];

if(($cmr->get_conf("cmr_allow_db_login")))
{
$division->print_template("template7");
}

$division->prints["match_cookie_cmr_lang"] = "";
$division->prints["match_cookie_cmr_theme"] = "";
$division->prints["match_options_cmr_lang"] = "";
$division->prints["match_options_cmr_theme"] = "";

$division->prints["match_label_other"] = $cmr->translate("other");
$division->prints["match_label_cmr_lang"] = $cmr->translate("cmr_lang");
@ $division->prints["match_cookie_cmr_lang"] = $_COOKIE["lang"];
$division->prints["match_cmr_default_lang"] = $cmr->get_conf("cmr_default_lang");
// $division->prints["match_label_default"] = $cmr->translate("default");

$array_value = get_languages_list($cmr->config);
$division->prints["match_options_cmr_lang"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");


$division->prints["match_label_themes"] = $cmr->translate("themes");
@ $division->prints["match_cookie_cmr_theme"] = $_COOKIE["theme"];
$division->prints["match_cmr_default_theme"] = $cmr->get_conf("cmr_default_theme");
// $division->prints["match_label_default"] = $cmr->translate("default");

$array_value = get_themes_list($cmr->config);
$division->prints["match_options_cmr_theme"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");


if(($cmr->get_conf("cmr_allow_theme_login")))
{
$division->print_template("template8");
}

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_label_Login"] = $cmr->translate("Login");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template9");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
