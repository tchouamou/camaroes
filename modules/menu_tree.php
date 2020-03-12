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
    include($cmr->get_path("module") . "modules/menu_admin.php");
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
</p>
<br />
<div id="menu_tree_div">
<?php 
$myDirPath = "phplayersmenu/";
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
if(!file_exists($myDirPath . "lib/template.inc.php")) return;
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;


include_once ($myDirPath . "libjs/layersmenu-browser_detection.js"); 


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
$alpha = array("config", "delete", "export", "import", "menu", "new", "preview", "report", "search", "update", "view");
$array_modules = array();
$num_modules=0;
// ====================================================
// ====================================================
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/guest/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && is_file($cmr->get_path("module") . "modules/guest/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/guest/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
// ====================================================
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/database/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && is_file($cmr->get_path("module") . "modules/database/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/database/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/admin/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && is_file($cmr->get_path("module") . "modules/admin/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/admin/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
}
// ====================================================
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
    
    $dir = opendir($cmr->get_path("module") . "modules/auto/");
    while ($file = readdir($dir)){
        if(($file != ".") && ($file != "..") && is_file($cmr->get_path("module") . "modules/auto/" . $file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/auto/" . $file;
				$array_modules["auto"][] = 1;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
array_multisort(
	$array_modules["auto"], SORT_ASC, SORT_STRING,
	$array_modules["label"], SORT_ASC, SORT_STRING,
	$array_modules["path"], SORT_ASC, SORT_STRING,
	$array_modules["name"], SORT_ASC, SORT_STRING
    );
// ====================================================
$menustring .=".|" . $cmr->translate("Ticket") . "|index.php?module_name=menu_ticket.php|" . $cmr->translate("For User") . "||Camareos\n";
reset($array_modules["label"]);
reset($array_modules["name"]);
reset($array_modules["path"]);
reset($array_modules["auto"]);
		
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("Ticket",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
$menustring .=".|" . $cmr->translate("User") . "|index.php?module_name=menu_user.php|" . $cmr->translate("For User") . "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("user",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Message") . "|index.php?module_name=menu_message.php|" . $cmr->translate("For Message") . "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("message",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Imap") . "|index.php?module_name=menu_imap.php|" . $cmr->translate("For Imap") . "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("Imap",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
// ====================================================
// $menustring .=".|" . $cmr->translate("Database") . "|index.php?module_name=menu_db.php|" . $cmr->translate("For Database") . "||Camareos\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if(cmr_searchi("modules/database/",  $array_modules["path"][$key])){
// 				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
//             }
//     };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
foreach($alpha as $chr){
$menustring .=".|" . $cmr->translate($chr) . "|index.php?module_name=menu_" . $chr . ".php|" . $cmr->translate("Begin Witch") . $chr .  "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("^" . $chr,  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
}
// ====================================================
// ====================================================
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Others") . "|index.php?module_name=menu_tree.php|" . $cmr->translate("Begin Witch Othors")  .  "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if((empty($array_modules["auto"][$key])) && (!cmr_searchi("^config|^delete|^export|^import|^menu|^new|^preview|^report|^search|^update|^view|user|ticket|group|message|imap",  $array_modules["name"][$key]))){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Auto") . "|index.php?module_name=menu_list.php|" . $cmr->translate("Au Modules ")  .  "||Camareos\n";
    foreach ($array_modules["path"] as $key => $value){
            if((!empty($array_modules["auto"][$key])) && file_exists($cmr->get_path("module") . "modules/" . $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "||Camareos\n";
            }
    };
// ====================================================
// $menustring .=".|" . $cmr->translate("Admin") . "|index.php?module_name=administrate.php|" . $cmr->translate("Admistrate ")  .  "||Camareos\n";
// $menustring .=".|" . $cmr->translate("Generator") . "|index.php?module_name=form_generator.php|" . $cmr->translate("Generator ")  .  "||Camareos\n";
// $menustring .=".|" . $cmr->translate("Explorator") . "|index.php?module_name=modules/admin/explore.php|" . $cmr->translate("Explorator ")  .  "||Camareos\n";
$menustring .=".|" . $cmr->translate("Home") . "|index.php?conf=init|" . $cmr->translate("Home ")  .  "||Camareos\n";
$menustring .=".|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "||Camareos\n";
// ====================================================
    
    
// ====================================================
// ====================================================
    
$menustring = preg_replace("/index\.php\?module_name=([^\|]+)\|/seU", "menu_tree_link('\\1')", $menustring);
$menustring = preg_replace("/\.\|([^\|]+)\|/seU", "cmr_translate('.|\\1|')", $menustring);
// print(nl2br($menustring));
if(empty($menustring)) $menustring = "menu_tree=.|Home |index.php?conf=init|Home |gnome-starthere-mini.png|\n";
$mid->setMenuStructureString($menustring);
$mid->parseStructureForMenu("vermenu1");
$mid->newTreeMenu("vermenu1");
$mid->printTreeMenu("vermenu1"); 
?>
</div>
<?php  print($division->close());
?>

