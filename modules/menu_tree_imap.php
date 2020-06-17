<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_imap.php
 *    ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.0 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */


/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_imap.php,Ver 3.0  2011-July 10:36:59
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

// ====================================================
if(!(fopen("PEAR.php", "r", TRUE) && fopen("DB.php", "r", TRUE))){
    include($cmr->get_path("module") . "modules/menu_imap.php");
    return 0;
	}
// ====================================================

// =======================================================================
include_once($cmr->get_path("class") . "class/class_imap.php");
// =======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!class_exists("class_imap")){
	print($cmr->translate("load class_imap before !?"));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$m = new class_imap();
// =======================================================================
empty($cmr->post_var["imap_service"]) ? $cmr->post_var["imap_service"] = $m->imap_service : $m->imap_service = $cmr->post_var["imap_service"];
empty($cmr->post_var["imap_server"]) ? $cmr->post_var["imap_server"] = $m->imap_server : $m->imap_server = $cmr->post_var["imap_server"];
empty($cmr->post_var["imap_port"]) ? $cmr->post_var["imap_port"] = $m->imap_port : $m->imap_port = $cmr->post_var["imap_port"];
empty($cmr->post_var["imap_user_name"]) ? $cmr->post_var["imap_user_name"] = $m->imap_user_name : $m->imap_user_name = $cmr->post_var["imap_user_name"];
empty($cmr->post_var["imap_password"]) ? $cmr->post_var["imap_password"] = $m->imap_password : $m->imap_password = $cmr->post_var["imap_password"];
empty($cmr->post_var["imap_default_folder"]) ? $cmr->post_var["imap_default_folder"] = $m->imap_default_folder : $m->imap_default_folder = $cmr->post_var["imap_default_folder"];
empty($cmr->post_var["mailbox"]) ? $cmr->post_var["mailbox"] = $m->mailbox : $m->mailbox = $cmr->post_var["mailbox"];
// =======================================================================
$m->imap_service="imap";
$m->imap_server = $cmr->post_var["imap_server"];
$m->imap_port = $cmr->post_var["imap_port"];
$m->imap_user_name = $cmr->post_var["imap_user_name"];
$m->imap_password = $cmr->post_var["imap_password"];
// $m->imap_default_folder = $cmr->post_var["imap_default_folder"];
        
$m->mailbox=$m->get_mailbox();        
// =======================================================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->post_var["imap_server"];
// $division->module["text"] = "";
$division->themes["text_align"] = "left";

















?>
<div id="menu_imap_div">
<?php 
// =======================================================================
print($division->show_noclose());
// =======================================================================
?>
<br /><b>
<?php
if(isset($cmr->language[$mod->base_name]))
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
empty($cmr->post_var["searchbox"]) ? $searchbox = "ALL" : $searchbox = $cmr->post_var["searchbox"];
empty($cmr->post_var["searchbox1"]) ? $searchbox1 = "" : $searchbox = $searchbox . " " . $cmr->post_var["searchbox1"];
empty($cmr->post_var["orderbox"]) ? $orderbox = "SORTARRIVAL" : $orderbox = $cmr->post_var["orderbox"];
$mailbox = $m->mailbox;
$inboxmailbox= substr($mailbox, 0, strpos($mailbox, "}")) . "}INBOX";
// =======================================================================

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

  $menustring .= ".|login |index.php?module_name=modules/login_imap.php" . "|login |gnome-starthere-mini.png|\n";
  $menustring .= ".|new_imap |index.php?module_name=modules/new_imap.php" . "|new_imap |gnome-starthere-mini.png|\n";
//   $menustring .= ".|DATA |index.php?module_name=modules/view_imap.php" . "|NOW() |gnome-starthere-mini.png|\n";

// =======================================================================
$menustring .= ".|ALL |index.php?module_name=modules/menu_imap.php?orderbox=" . $orderbox . "&searchbox=ALL&mailbox=" . $mailbox . "|NOW() |gnome-starthere-mini.png|\n";
// =======================================================================
if(!($m->connect())){
// =======================================================================
print( $cmr->translate("<br />connection failled...<br />"));
// =======================================================================
}else{
$info_new=$m->get_mailboxmsginfo();
$num_new = "";
if(!empty($info_new->Unread)) $num_new = "(" . $info_new->Unread . ")";


  $menustring .= ".|search |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=ALL&mailbox=" . $mailbox . "|" . $cmr->translate("ALL") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|DELETED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=DELETED&mailbox=" . $mailbox . "|" . $cmr->translate("DELETED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|ANSWERED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=ANSWERED&mailbox=" . $mailbox . "|" . $cmr->translate("ANSWERED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|FLAGGED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=FLAGGED&mailbox=" . $mailbox . "|" . $cmr->translate("FLAGGED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|UNSEEN |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=UNSEEN&mailbox=" . $mailbox . "|" . $cmr->translate("UNSEEN") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|UNANSWERED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=UNANSWERED&mailbox=" . $mailbox . "|" . $cmr->translate("UNANSWERED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|UNDELETED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=UNDELETED&mailbox=" . $mailbox . "|" . $cmr->translate("UNDELETED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|UNFLAGGED |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=UNFLAGGED&mailbox=" . $mailbox . "|" . $cmr->translate("UNFLAGGED") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|NEW |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=NEW&mailbox=" . $mailbox . "|" . $cmr->translate("NEW") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|OLD |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=OLD&mailbox=" . $mailbox . "|" . $cmr->translate("OLD") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|RECENT |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=RECENT&mailbox=" . $mailbox . "|" . $cmr->translate("RECENT") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SEEN |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=SEEN&mailbox=" . $mailbox . "|" . $cmr->translate("SEEN") . " |gnome-starthere-mini.png|\n";
  $menustring .= ".|SORT |index.php?module_name=modules/view_imap.php?orderbox=SORTDATE&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTDATE") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTDATE |index.php?module_name=modules/view_imap.php?orderbox=SORTDATE&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTDATE") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTARRIVAL |index.php?module_name=modules/view_imap.php?orderbox=SORTARRIVAL&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTARRIVAL") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTFROM |index.php?module_name=modules/view_imap.php?orderbox=SORTFROM&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTFROM") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTSUBJECT |index.php?module_name=modules/view_imap.php?orderbox=SORTSUBJECT&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTSUBJECT") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTTO |index.php?module_name=modules/view_imap.php?orderbox=SORTTO&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTTO") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTCC |index.php?module_name=modules/view_imap.php?orderbox=SORTCC&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTCC") . " |gnome-starthere-mini.png|\n";
  $menustring .= "..|SORTSIZE |index.php?module_name=modules/view_imap.php?orderbox=SORTSIZE&searchbox=" . $searchbox . "&mailbox=" .  $mailbox . "|" . $cmr->translate("SORTSIZE") . " |gnome-starthere-mini.png|\n";
// =======================================================================

  $menustring .= ".|folder |index.php?module_name=modules/view_imap.php?orderbox=SORTARRIVAL&searchbox=ALL&mailbox=" . $inboxmailbox . $cmr->translate("INBOX") . $num_new  . "|view_imap |gnome-starthere-mini.png|\n";
// =======================================================================
$m->imap_folder_list=$m->get_getmailboxes();
foreach($m->imap_folder_list as $key => $val){
// 	print( "<hr />name");
// 	echo  "; attributes" . $value->attributes . "; delimiter" . $value->delimiter . "<hr />";
$imap_folder_list[] = $val->name;
}
sort($imap_folder_list);



foreach($imap_folder_list as $key => $value){
// $name = strtoupper(str_replace($m->mailbox, "", $value));
$name = substr($value, strpos($value, "}") + 1);
$num_new = "";
if(!empty($cmr->post_var["Unread" . $name])) $num_new = "(" . $cmr->post_var["Unread" . $name] . ")";

$menustring .= "..|$name |index.php?module_name=modules/view_imap.php?orderbox=" . $orderbox . "&searchbox=" . $searchbox . "&mailbox=" . ($value) . $name . $num_new  . "|$name |gnome-starthere-mini.png|\n";
}

}
$menustring .= ".|menu_imap |index.php?module_name=modules/menu_imap.php?orderbox=" . $orderbox . "&searchbox=ALL&mailbox=" . $mailbox . "|menu_imap |gnome-starthere-mini.png|\n";
$menustring .= ".|menu_list |index.php?module_name=modules/menu_list.php" . "|menu_list |gnome-starthere-mini.png|\n";


$mid->setMenuStructureString($menustring);
$mid->parseStructureForMenu("vermenu1");
$mid->newTreeMenu("vermenu1");
$mid->printTreeMenu("vermenu1"); 
?>
</div>
<?php  print($division->close());
?>
