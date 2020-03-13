<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_tree_left.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_tree_left.php,Ver 3.0  2011-Sep 22:32:40  
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
    include($cmr->get_path("module") . "modules/menu_left.php");
    return 0;
	}
// ====================================================



$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

// $division->module["name"] = $mod->name; 




$division->module["title"] = $cmr->translate("Menu");
// $division->module["text"] = "";
$division->themes["text_align"] = "left";

















print($division->show_noclose());
?>
<br /><b>
<?php
if(($cmr->translate($mod->base_name)))
print($cmr->translate($mod->base_name));
?>
</b>
<br />
<p class="normal_text">
<?php
if(isset($cmr->language[$mod->base_name."_title"]))
print($cmr->translate($mod->base_name."_title"));
?>
</p>
<br />
<?php
if(isset($cmr->language[$mod->base_name."_title"]))
print($cmr->translate($mod->base_name."_title"));
?>
<div id="menu_tree_left_div">
<?php 
$myDirPath = "phplayersmenu/";
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
if(!file_exists($myDirPath . "lib/template.inc.php")) return;
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;



include_once ($myDirPath . "libjs/layersmenu-browser_detection.js"); 
?>
<?php
include_once ($myDirPath . "lib/template.inc.php");	// taken from PHPLib
include_once ($myDirPath . "lib/layersmenu.inc.php");
include_once ($myDirPath . "lib/layersmenu-noscript.inc.php");

//$mid = new LayersMenu(140, 20, 20);
$mid = new XLayersMenu();


/* TO USE RELATIVE PATHS: */
$mid->setDirroot("./");
$mid->setLibdir($myDirPath . "lib/");
$mid->setLibjsdir($myDirPath . "libjs/");
$mid->setLibjswww($myDirPath . "/libjs/");
$mid->setImgdir($myDirPath . "images/");
$mid->setImgwww($myDirPath . "images/");
$mid->setTpldir($myDirPath . "templates/");



$mid->setDownArrowImg("down-nautilus.png");
$mid->setForwardArrowImg("forward-nautilus.png");
$mid->setForwardArrow(" --&gt;");

// ====================================================
$menustring ="";
// ====================================================
// ====================================================
$menustring = preg_replace("/index\.php\?module_name=([^\|]+)\|/seU", "menu_tree_link('\\1')", $cmr->get_page("menu_tree"));
if(!($cmr->get_page("menu_tree"))) $menustring .=".|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "|gnome-starthere-mini.png|\n";
$menustring = preg_replace("/\.\|([^\|]+)\|/seU", "cmr_translate('.|\\1|')", $menustring);
// print(nl2br($menustring));
// ====================================================


$mid->setMenuStructureString($menustring);
$mid->parseStructureForMenu("vermenu1");
$mid->newTreeMenu("vermenu1");
$mid->printTreeMenu("vermenu1"); 
?>
</div>
<?php  print($division->close());
?>

