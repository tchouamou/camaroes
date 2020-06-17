<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_tree.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_tree.php,Ver 3.0  2011-Sep 22:32:40  
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

// ====================================================
if(!(fopen("PEAR.php", "r", TRUE) && fopen("DB.php", "r", TRUE))){
    include($cmr->get_path("module") . "modules/menu_head.php");
    return 0;
	}
// ====================================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

// $division->module["name"] = $mod->name; 




$division->module["title"] = $cmr->translate("Menu");
// $division->module["text"] = "";
$division->themes["text_align"] = "left";

















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_legend_link"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// open_box($cmr->config, $cmr->language, $module_name, $module_positionx, $module_positiony,"<img alt=\"=> \" src=\"".$cmr->get_path("www") ."images/pallino_blue.gif\">"." about");
/* TO USE RELATIVE PATHS: */
$myDirPath = "phplayersmenu/";
$myWwwPath = "phplayersmenu/";

if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
if(!file_exists($myDirPath . "lib/template.inc.php")) return;
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
/* TO USE ABSOLUTE PATHS: */
//$myDirPath = "/home/pratesi/public_html/phplayersmenu/";
//$myWwwPath = "/~pratesi/phplayersmenu/";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$menustring ="";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$menustring = preg_replace("/index\.php\?module_name=([^\|]+)\|/seU", "menu_tree_link('\\1')", $cmr->get_page("menu_tree"));
if(!($cmr->get_page("menu_tree"))) $menustring .=".|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "|gnome-starthere-mini.png|\n";
$menustring = preg_replace("/\.\|([^\|]+)\|/seU", "cmr_translate('.|\\1|')", $menustring);
// print(nl2br($menustring));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

include_once ($myDirPath . "libjs/layersmenu-browser_detection.js"); 
 
 
include_once ($myDirPath . "lib/template.inc.php");	// taken from PHPLib
include_once ($myDirPath . "lib/layersmenu.inc.php");

//$mid = new LayersMenu(140, 20, 20);
$mid = new LayersMenu();

/* TO USE RELATIVE PATHS: */
$mid->setDirroot("./");
$mid->setLibdir($myDirPath . "lib/");
$mid->setLibjsdir($myDirPath . "libjs/");
$mid->setLibjswww($myDirPath . "/libjs/");
$mid->setImgdir($myDirPath . "images/");
$mid->setImgwww($myDirPath . "images/");
$mid->setTpldir($myDirPath . "templates/");
//$mid->setDirroot(".");
//$mid->setLibdir("lib/");
//$mid->setLibjsdir("libjs/");
//$mid->setLibjswww("libjs/");
//$mid->setImgdir("images/");
//$mid->setImgwww("images/");
/* either: */
//$mid->setTpldir("templates/");
// $mid->setHorizontalMenuTpl("layersmenu-horizontal_menu.ihtml");
//$mid->setSubMenuTpl("layersmenu-sub_menu.ihtml");
/* or: (disregarding the tpldir) */
//$mid->setHorizontalMenuTpl("templates/layersmenu-horizontal_menu.ihtml");
//$mid->setSubMenuTpl("templates/layersmenu-sub_menu.ihtml");





/* TO USE ABSOLUTE PATHS: */
// $mid->setDirroot($myDirPath);
// $mid->setLibdir($myDirPath . "lib/");
// $mid->setLibjsdir($myDirPath . "libjs/");
// $mid->setLibjswww($myWwwPath . "libjs/");
// $mid->setImgdir($myDirPath . "images/");
// $mid->setImgwww($myWwwPath . "images/");
// $mid->setTpldir($myDirPath . "templates/");
$mid->setHorizontalMenuTpl("layersmenu-horizontal_menu.ihtml");
$mid->setSubMenuTpl("layersmenu-sub_menu.ihtml");

$mid->setDownArrowImg("down-nautilus.png");
$mid->setForwardArrowImg("forward-nautilus.png");
$mid->setMenuStructureString($menustring);
// $mid->setMenuStructureFile($myDirPath . "layersmenu-horizontal-1.txt");
$mid->parseStructureForMenu("hormenu1");
//$mid->newHorizontalMenu("hormenu1", 12);
$mid->newHorizontalMenu("hormenu1");



$division->prints["match_menu_tree"] = $mid->makeHeader();
/* alternatively:
// $mid->printHeader();
*/

$division->prints["match_menu_tree"] .= $mid->getMenu("hormenu1");
/* alternatively:
$mid->printMenu("hormenu1");
*/


$division->prints["match_menu_tree"] .= $mid->makeFooter();
/* alternatively:
$mid->printFooter();
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";
$division->prints["match_form_id"] = "commands";

$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"commands\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_get"] = 
$division->prints["match_input_hidden_conf"] = "";



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_label_search"] = $cmr->translate("search");


$division->prints["match_option_com_action"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){
$division->prints["match_option_com_action"] .= "<option value=\"system\">" . $cmr->translate("run unix") . "</option>";
$division->prints["match_option_com_action"] .= "<option value=\"system\">" . $cmr->translate("run windows") . "</option>";
$division->prints["match_option_com_action"] .= "<option value=\"system\">" . $cmr->translate("run solaris") . "</option>";
$division->prints["match_option_com_action"] .= "<option value=\"sql\">" . $cmr->translate("run a sql") . "</option>";
$division->prints["match_option_com_action"] .= "<option value=\"email\">" . $cmr->translate("send email") . "</option>";
$division->prints["match_option_com_action"] .= "<option value=\"url\">" . $cmr->translate("open url") . "</option>";
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_submit"] = ">";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_menu_tree_head" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_menu_tree_head" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_menu_tree_head" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_menu_tree_head" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
