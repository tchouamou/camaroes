<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * replace.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.







replace,Ver 3.0  @_date_time_@  
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));

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
// $division->module["title"] = "Desktop";
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/form_generator.php?conf_name=conf.d/modules/conf_form_generator.ini", 1);;;
$lk->add_link("modules/admin/replace.php?conf_name=conf.d/modules/conf_replace.ini", 1);;;
$division->prints["match_open_tab"] = $lk->open_module_tab(1);



$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_list.php?left1=&middle2=", 1);
$lk->add_link("modules/desktop.php?left1=&middle2=", 1);
$division->prints["match_link_list"] = $lk->list_link();

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_legend"] = $cmr->translate("Links");
$division->prints["match_user_title1"] = $cmr->language[$mod->base_name];
$division->prints["match_user_title2"] = $cmr->translate("Replace");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_input_hidden_id"] = "";

$division->prints["match_label_match"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "new_groups";

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_replace.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division->prints["match_label_replace"] = $cmr->translate("replace");
$division->prints["match_label_sensitive"] = $cmr->translate("case sensitive");
$division->prints["match_label_regular_expression"] = $cmr->translate("regular expression");
$division->prints["match_label_recursive"] = $cmr->translate("recursive");
$division->prints["match_label_find_only"] = $cmr->translate("find_only");
$division->prints["match_label_code"] = $cmr->translate("code");
$division->prints["match_label_alphanumeric"] = $cmr->translate("alphanumeric characters");
$division->prints["match_label_alphabetic"] = $cmr->translate("alphabetic characters");
$division->prints["match_label_space_tab"] = $cmr->translate("space or tab characters only");
$division->prints["match_label_control"] = $cmr->translate("control characters");
$division->prints["match_label_numeric"] = $cmr->translate("numeric characters");
$division->prints["match_label_printable"] = $cmr->translate("printable and visible characters");
$division->prints["match_label_lower_case"] = $cmr->translate("lower-case alphabetic characters");
$division->prints["match_label_printable_control"] = $cmr->translate("printable (non-control) characters");
$division->prints["match_label_punctuation"] = $cmr->translate("punctuation characters");
$division->prints["match_label_all_whitespace"] = $cmr->translate("all whitespace chars");
$division->prints["match_label_upper_case"] = $cmr->translate("upper-case alphabetic characters");
$division->prints["match_label_hexadecimal"] = $cmr->translate("hexadecimal digit characters");
$division->prints["match_label_match "] = $cmr->translate("match ");
$division->prints["match_label_replace "] = $cmr->translate("replace ");
$division->prints["match_label_php_code"] = $cmr->translate("php code");
$division->prints["match_label_backup"] = $cmr->translate("backup");
$division->prints["match_label_input"] = $cmr->translate("input");
$division->prints["match_label_local_file"] = $cmr->translate("local_file");
$division->prints["match_label_local_zip"] = $cmr->translate("local_zip");
$division->prints["match_label_remote_file"] = $cmr->translate("remote_file");
$division->prints["match_label_remote_zip"] = $cmr->translate("remote_zip");
$division->prints["match_label_remote_folder"] = $cmr->translate("remote_folder");
$division->prints["match_label_output"] = $cmr->translate("output");

$division->prints["match_label_download"] = $cmr->translate("download");
$division->prints["match_label_remote_folder"] = $cmr->translate("remote_folder");
$division->prints["match_label_remote_zip"] = $cmr->translate("remote_zip");
$division->prints["match_label_print"] = $cmr->translate("print");
$division->prints["match_label_match_text"] = $cmr->translate("match text:");
$division->prints["match_label_replace_text"] = $cmr->translate("replace text:");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate("Search/Replace");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want to Run");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_replace" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_replace" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_replace" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_replace" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

  
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>