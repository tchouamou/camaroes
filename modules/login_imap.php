<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * template_login_imap.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























template_login_imap.php,  2011-Oct
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// //$division->load_themes($cmr->themes);

$division->module["name"] = $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = "<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_giallo.gif\">"." Change Password";
//$division->module["text"] = "";





//












$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_new.php",1);
$lk->add_link("modules/database/login_db.php",1);
$lk->add_link("modules/database/login_imap.php",1);
$division->prints["match_open_tab"] = $lk->open_module_tab(2);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_login_imap_title1"] = ""; 
$division->prints["match_login_imap_title2"] = ""; 
if(isset($cmr->language[$mod->base_name])) 
$division->prints["match_login_imap_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_login_imap_title2"] = $cmr->translate($mod->base_name . "_title");

$cmr->session["cmr_img_code"] = $cmr->gener_code("Camaroes");


$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "login";

;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/guest/get_login_imap.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_images_path"] = $cmr->get_path("www");
$division->prints["match_login_imap_title1"] = ""; 
$division->prints["match_login_imap_title2"] = ""; 

$division->prints["match_link_menu_imap"] = $cmr->module_link( "modules/menu_imap.php?orderbox=SORTARRIVAL&searchbox=ALL&mailbox=", "1", "", "", "", "left1");
if(isset($cmr->post_var["mailbox"])) 
$division->prints["match_link_menu_imap"] = $cmr->module_link( "modules/menu_imap.php?orderbox=SORTARRIVAL&searchbox=ALL&mailbox=" . $cmr->post_var["mailbox"], "1", "", "", "", "left1");

$division->prints["match_label_imap_login"] = $cmr->translate("imap login");
$division->prints["match_label_pop3"] = $cmr->translate("pop3");
$division->prints["match_label_imap"] = $cmr->translate("imap");
$division->prints["match_label_imap_ssl"] = $cmr->translate("imap_ssl");
$division->prints["match_label_nntp"] = $cmr->translate("nntp");
$division->prints["match_label_certificate"] = $cmr->translate("certificate:");
$division->prints["match_label_imap_host"] = $cmr->translate("imap_host:");
$division->prints["match_label_inser_uid"] = $cmr->translate("inser user name and password");
$division->prints["match_label_uid"] = $cmr->translate("uid");
$division->prints["match_label_pw"] = $cmr->translate("pw");

$division->prints["match_alt_code"] = $cmr->translate("code");
$division->prints["match_label_image_code"] = $cmr->translate("image_code");
$division->prints["match_image_code"] = pw_encode($cmr->get_session("cmr_img_code"));
$division->prints["match_value_image_code"] = $cmr->get_session("cmr_img_code");


$division->prints["match_label_save_cookies"] = $cmr->translate(" Save to (COOKIES)");
$division->prints["match_user_name"] = $cmr->translate("user name");

$division->prints["match_cookie_imap_cert"] = "";
$division->prints["match_cookie_imap_host"] = "";
$division->prints["match_cookie_imap_user"] = "";
$division->prints["match_cookie_imap_pw"] = "";
$division->prints["match_save_cookies"] = "";

 @ $division->prints["match_cookie_imap_cert"] = $_COOKIE["imap_cert"];
 @ $division->prints["match_cookie_imap_host"] = $_COOKIE["imap_host"];
 @ $division->prints["match_cookie_imap_user"] = $_COOKIE["imap_user"];
 @ $division->prints["match_cookie_imap_pw"] = $_COOKIE["imap_pw"];
 @ $division->prints["match_save_cookies"] = $_COOKIE["save_cookies"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("login");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to login");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_login_imap" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_login_imap" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_login_imap" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
