<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * config_all.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */


/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























config_all.php, Ver 3.03 
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("conf") . "conf.d/modules/conf_all.ini", $cmr->config, "var");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_config.php")
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"] =  $cmr->translate($mod->base_name);
// $division->module["text"] = "";








// $division->themes["header_tools_left"] = 0;
// $division->themes["header_tools_right"] = 0;



// $division->themes["header_border"] = "1";



// $division->themes["header_mouse_effect"] = "1";
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "config_form";

$division->prints["match_config_all_title1"] = ""; 
$division->prints["match_config_all_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_config_all_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_config_all_title2"] = $cmr->translate($mod->base_name . "_title");
 

 



$division->prints["match_legend_link"] = $cmr->translate("Links");
$division->prints["match_legend_select"] = $cmr->translate("select");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);
$lk->add_link("modules/admin/configure_tab.php?conf_name=conf.d/modules/conf_configure_tab.ini", 1);
$lk->add_link("modules/admin/config_all.php?conf_name=conf.d/modules/conf_all.ini", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(5);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_front_page.php?conf_name=conf.d/modules/conf_front_page.ini", 1);
$lk->add_link("modules/admin/config_menu.php?conf_name=conf.d/modules/conf_menu.ini", 1);

$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", "", $cmr->translate("Policy tab"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", "", $cmr->translate("Policy query"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", "", $cmr->translate("Policy module"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=get&middle2=", "", $cmr->translate("Policy get"));

$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);



$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_id"] = "config_form";
$division->prints["match_form_param"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$dir_list[] = ($cmr->get_path("conf") . "conf.d/");
$dir_list[] = ($cmr->get_path("conf") . "conf.d/modules/");
$dir_list[] = ($cmr->get_path("conf") . "conf.d/modules/auto/");
$dir_list[] = ($cmr->get_path("conf") . "modules/database/conf.d/");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$dir_list[] = ($cmr->get_path("lang") . "languages/");
$current_dir = opendir($cmr->get_path("lang") . "languages/");
while ($file = readdir($current_dir))
if(($file != ".") && ($file != "..")  && ($file != "auto") && (is_dir($cmr->get_path("lang") . "languages/" . $file))){
	$dir_list[] = $cmr->get_path("lang") . "languages/" . $file;
	$dir_list[] = $cmr->get_path("lang") . "languages/" . $file . "/auto/";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$current_dir = opendir($cmr->get_path("index") . "home/groups/");
while ($file = readdir($current_dir))
if(($file != ".") && ($file != "..") && (is_dir($cmr->get_path("index") . "home/groups/" . $file)))
$dir_list[] = $cmr->get_path("index") . "home/groups/" . $file;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$current_dir = opendir($cmr->get_path("index") . "home/users/");
while ($file = readdir($current_dir))
if(($file != ".") && ($file != "..") && (is_dir($cmr->get_path("index") . "home/users/" . $file)))
$dir_list[] = $cmr->get_path("index") . "home/users/" . $file;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$dir_list[] = ($cmr->get_path("theme") . "themes/");
$current_dir = opendir($cmr->get_path("theme") . "themes/");
while ($file = readdir($current_dir))
if(($file != ".") && ($file != "..") && (is_dir($cmr->get_path("theme") . "themes/" . $file)))
$dir_list[] = $cmr->get_path("theme") . "themes/" . $file;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$dir_list[] = ($cmr->get_path("tab") . "page/");
$current_dir = opendir($cmr->get_path("tab") . "page/");
while ($file = readdir($current_dir))
if(($file != ".") && ($file != "..") && (is_dir($cmr->get_path("tab") . "page/" . $file)))
$dir_list[] = $cmr->get_path("tab") . "page/" . $file;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$the_select = "";
foreach($dir_list as $key => $value){
	$the_select .= "<optgroup label=\"" . $value . "\">";
	if(file_exists($value))	$current_dir = opendir($value);
	if($current_dir)
	while ($file = readdir($current_dir)){
	    $file_name = realpath($value . "/" . $file);
	    $file_parts = pathinfo($file_name);
	    if(empty($file_parts["extension"])) $file_parts["extension"] = "";
// 		echo $file_parts['dirname'], "\n";
// 		echo $file_parts['basename'], "\n";
// 		echo $file_parts['extension'], "\n";

	    if(!empty($file_name))
	    if(is_file($file_name))
	    if($file != ".")
	    if($file != "..")
	    if($file != ".htaccess")
	    if($file != "index.html")
	    if(
			     ("." . $file_parts["extension"] ==  $cmr->get_ext("conf"))
			     || ("." . $file_parts["extension"] ==  $cmr->get_ext("theme"))
			     || ("." . $file_parts["extension"] ==  $cmr->get_ext("lang"))
			     || ("." . $file_parts["extension"] ==  $cmr->get_ext("page"))
			     || ("." . $file_parts["extension"] ==  $cmr->get_ext("tab"))
		     )
		$the_select .= "<option value=\"" . $file_name . "\">" . $file_parts["basename"] . "</option>";
	}
	$the_select .= "</optgroup>";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["file_name"])) $cmr->post_var["file_name"] = realpath($cmr->get_conf("cmr_main_config"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!





$division->prints["match_file_name_conf"] = $cmr->post_var["file_name"];
$division->prints["match_label_list_file"] = $cmr->translate("list file");
$division->prints["match_value_list_file"] = $cmr->post_var["file_name"];
$division->prints["match_options_list_file"] = $the_select;
$division->prints["match_submit1"] = $cmr->translate("select");

$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_config.php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_file_name"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["file_name"] . "\" name=\"file_name\" / >");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
$division->prints["match_input_hidden_conf"] = "";


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_config_all" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_config_all" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("module") . "templates/modules/template_config_all" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_config_all" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_match_include($division->template, "match_include1")) include($cmr->get_path("index") . "system/loader/load_config.php"); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
$division->prints["match_submit"] = $cmr->translate(" Save");
$division->prints["match_submit_java"] = $cmr->translate("confirm that you want save");

$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
