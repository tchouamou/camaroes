<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * desktop.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























desktop.php, Ver 3.03
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
$division->module["title"] = date("Y-m-d");
$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/desktop.php?conf_name=conf.d/modules/conf_desktop.ini", 1);;;
$lk->add_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini", 1);;;
$lk->add_link("modules/guest/site_map.php?conf_name=conf.d/modules/conf_site_map.ini", 1);;;
$division->prints["match_open_tab"] = $lk->open_module_tab(0);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$im=0;
$array_modules = array();
$num_modules=0;
// ====================================================
$division->prints["match_desktop_links"] = "";
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/");
    if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")))
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && cmr_search("^menu_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(cmr_search_replace("menu_|\.php", "", substr(basename($file), 0, 30)));
// 				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/auto/");
    if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")))
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && cmr_search("^menu_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/auto/" . $file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/auto/" . $file;
				$array_modules["auto"][] = 1;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(cmr_search_replace("menu_|\.php", "", substr(basename($file), 0, 30)));
// 				$cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")))
array_multisort(
	$array_modules["auto"], SORT_ASC, SORT_STRING,
	$array_modules["label"], SORT_ASC, SORT_STRING,
	$array_modules["path"], SORT_ASC, SORT_STRING,
	$array_modules["name"], SORT_ASC, SORT_STRING
    );
// ====================================================
// ====================================================
// ====================================================
$desktop_modules = explode("|\n", trim($cmr->get_page("desktop")));
$count = 0;
foreach($desktop_modules as $key => $value){
		// ====================================================
        @list($label, $link_modules, $image) = explode("|", trim($value));
		$label = trim($label);
		$image = trim($image);
		$link_modules = trim($link_modules);

        @list($mod_name, $param) = explode("&", $link_modules);
		$mod_name = trim($mod_name);

		if(empty($mod_name)) $mod_name = $label;
    	if(file_exists($image)) $cmr->config["image" . cmr_basename($mod_name)] = trim($image);
		$link_modules = $mod_name . "?" . $param;
		// ====================================================
    if(file_exists($cmr->get_path("module") . $mod_name) && (!empty($mod_name)) ){
		// ====================================================
        (empty($cmr->config["image" . cmr_basename($mod_name)])) ? $image = $cmr->get_path("www") . "images/32x32.png" : $image = $cmr->get_path("www") . $cmr->config["image" . cmr_basename($mod_name)];
		$image = trim($image);
        if(!file_exists($image)) $image = dirname($image) . "/auto/" . basename($image);
        if((($count) % 4) == 0) $division->prints["match_desktop_links"] .= ("</tr><tr>");
		// ====================================================
		// ====================================================
        $division->prints["match_desktop_links"] .= (" <td align=\"center\"  height=\"20\" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\">");
        $division->prints["match_desktop_links"] .= ($cmr->module_link($link_modules, $image, $mod_name, "32", "32", "middle1"));
        $division->prints["match_desktop_links"] .= ("<br />" . $cmr->translate(cmr_search_replace("menu_|\.php", "", substr(basename($mod_name), 0, 30))) . "<br /><br />");
		// ====================================================
        $division->prints["match_desktop_links"] .= (" </td>");
        $count ++;
    };
};
$division->prints["match_desktop_links"] .= ("</tr>");

// ====================================================
// ====================================================
// ====================================================
$division->prints["match_desktop_links"] .= ("<tr>");
$count = 0;
    if(($cmr->get_user("authorisation")) && ($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")))
    foreach ($array_modules["path"] as $key => $mod_name){
		// ====================================================
        (empty($cmr->config["image" . cmr_basename($mod_name)])) ? $image = $cmr->get_path("www") . "images/32x32.png" : $image = $cmr->get_path("www") . $cmr->config["image" . cmr_basename($mod_name)];
		$image = trim($image);
        if(!file_exists($image)) $image = dirname($image) . "/auto/" . basename($image);
        if((($count) % 4) == 0) $division->prints["match_desktop_links"] .= ("</tr><tr>");
		// ====================================================
        $division->prints["match_desktop_links"] .= (" <td align=\"center\"  height=\"20\" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\">");
        $division->prints["match_desktop_links"] .= ($cmr->module_link($mod_name, $image, "", "32", "32", "middle1"));
        $division->prints["match_desktop_links"] .= ("<br />" . $array_modules["label"][$key] . "<br /><br />");
		// ====================================================
        $division->prints["match_desktop_links"] .= (" </td>");
        $count ++;
    };
// class="rown1" class="rown1"
// ====================================================
// ====================================================
// ====================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_desktop" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_desktop" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_desktop" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
