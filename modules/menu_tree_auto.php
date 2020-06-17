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




$division->module["title"] = "(" . $cmr->get_conf("cmr_portal_short_name") . ") " . $cmr->get_conf("cmr_portal_name") . " ver. " . cmr_version . " &copy;2005 " . $cmr->get_conf("cmr_company_name") . " " . $cmr->get_conf("cmr_company_address") . " Tel:" . $cmr->get_conf("cmr_company_tel") . " ";
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
<div id="menu_horiz_div">
<table width="100%">
<tr><td valign="top">

<?php
// open_box($cmr->config, $cmr->language, $module_name, $module_positionx, $module_positiony,"<img alt=\"=> \" src=\"".$cmr->get_path("image") ."images/pallino_blue.gif\">"." about");
/* TO USE RELATIVE PATHS: */
$myDirPath = "phplayersmenu/";
$myWwwPath = "phplayersmenu/";
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;
if(!file_exists($myDirPath . "lib/template.inc.php")) return;
if(!file_exists($myDirPath . "libjs/layersmenu-browser_detection.js")) return;

/* TO USE ABSOLUTE PATHS: */
//$myDirPath = "/home/pratesi/public_html/phplayersmenu/";
//$myWwwPath = "/~pratesi/phplayersmenu/";

// ====================================================
$menustring ="";
// ====================================================
$alpha = array("config", "delete", "export", "import", "menu", "new", "preview", "report", "search", "update", "view");
$array_modules = array();
$num_modules=0;
// ====================================================
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
reset($array_modules["label"]);
reset($array_modules["name"]);
reset($array_modules["path"]);
reset($array_modules["auto"]);
// ====================================================
$menustring .=".|" . $cmr->translate("Home") . "|index.php?conf=init|" . $cmr->translate("Home ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Desktop") . "|index.php?module_name=desktop.php|" . $cmr->translate("Desktop ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("menu_list") . "|index.php?module_name=menu_list.php|" . $cmr->translate("Menu General ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Tree Menu") . "|index.php?module_name=menu_tree.php|" . $cmr->translate("Tree Menu ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Sites Map") . "|index.php?module_name=site_map.php|" . $cmr->translate("Site Map ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Account") . "|index.php?module_name=account.php|" . $cmr->translate("Account ")  .  "|gnome-starthere-mini.png|\n";
// ====================================================
$menustring .=".|" . $cmr->translate("Services") . "|index.php?module_name=services.php|" . $cmr->translate("For Services") . "|gnome-starthere-mini.png|\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("service",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
            }
    };
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Report") . "|index.php?module_name=report.php|" . $cmr->translate("For Report") . "|gnome-starthere-mini.png|\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("report",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
            }
    };
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Ticket") . "|index.php?module_name=new_ticket.php|" . $cmr->translate("For Ticket") . "|gnome-starthere-mini.png|\n";
// ====================================================
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("Ticket",  $array_modules["name"][$key])&& !cmr_searchi("ticket_read",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
            }
    };
// ====================================================
$menustring .=".|" . $cmr->translate("User") . "|index.php?module_name=menu_user.php|" . $cmr->translate("For User") . "|gnome-starthere-mini.png|\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("user",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
            }
    };
// ====================================================
// ====================================================
$menustring .=".|" . $cmr->translate("Group") . "|index.php?module_name=menu_groups.php|" . $cmr->translate("For Groups") . "|gnome-starthere-mini.png|\n";
    foreach ($array_modules["path"] as $key => $value){
            if(cmr_searchi("groups",  $array_modules["name"][$key])){
				if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])) $menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
            }
    };
// ====================================================
// // ====================================================
// $menustring .=".|" . $cmr->translate("Message") . "|index.php?module_name=menu_message.php|" . $cmr->translate("For Message") . "|gnome-starthere-mini.png|\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if(cmr_searchi("Message",  $array_modules["name"][$key])&& !cmr_searchi("Message_read",  $array_modules["name"][$key])){
// 				$menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
//             }
//     };
// // ====================================================
// // ====================================================
// $menustring .=".|" . $cmr->translate("Imap") . "|index.php?module_name=imap.php|" . $cmr->translate("For Imap") . "|gnome-starthere-mini.png|\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if(cmr_searchi("Imap",  $array_modules["name"][$key])){
// 				$menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
//             }
//     };
// // ====================================================
// ====================================================
// ====================================================
// ====================================================
// foreach($alpha as $chr){
// $menustring .=".|" . $cmr->translate($chr) . "|index.php?module_name=menu_" . $chr . ".php|" . $cmr->translate("Begin Witch") . $chr .  "|gnome-starthere-mini.png|\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if(cmr_searchi("^" . $chr,  $array_modules["name"][$key])){
// 				$menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
//             }
//     };
// }
// ====================================================
$menustring .=".|" . $cmr->translate("Admin") . "|index.php?module_name=administrate.php|" . $cmr->translate("Admistrate ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Admin") . "|index.php?module_name=administrate.php|" . $cmr->translate("Admistrate ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("My Acount") . "|index.php?module_name=my_account.php|" . $cmr->translate("Account ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Generator") . "|index.php?module_name=form_generator.php|" . $cmr->translate("Generator ")  .  "|gnome-starthere-mini.png|\n";
// $menustring .="..|" . $cmr->translate("Explorator") . "|index.php?module_name=modules/admin/explore.php|" . $cmr->translate("Explorator ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Databases") . "|index.php?module_name=modules/menu_db.php|" . $cmr->translate("Explorator ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "|gnome-starthere-mini.png|\n";
// ====================================================
// ====================================================
// // ====================================================
// $menustring .=".|" . $cmr->translate("Others") . "|index.php?module_name=menu_tree.php|" . $cmr->translate("Begin Witch Othors")  .  "|gnome-starthere-mini.png|\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if((empty($array_modules["auto"][$key])) && (!cmr_searchi("^config|^delete|^export|^import|^menu|^new|^preview|^report|^search|^update|^view|user|ticket|group|message|imap",  $array_modules["name"][$key]))){
// 				$menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
//             }
//     };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
// $menustring .=".|" . $cmr->translate("Auto") . "|index.php?module_name=menu_list.php|" . $cmr->translate("Au Modules ")  .  "|gnome-starthere-mini.png|\n";
//     foreach ($array_modules["path"] as $key => $value){
//             if((!empty($array_modules["auto"][$key])) && file_exists($cmr->get_path("module") . "modules/" . $array_modules["name"][$key])){
// 				$menustring .="..|" .  $array_modules["label"][$key] . "|index.php?module_name=" . $array_modules["path"][$key] . "|Module " . $array_modules["label"][$key]  . "|gnome-starthere-mini.png|\n";
//             }
//     };
// // ====================================================
$menustring .=".|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("logout") . "|index.php?cmr_mode=logout|" . $cmr->translate("Logout ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("login") . "|index.php?cmr_mode=login|" . $cmr->translate("Login ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("inscription") . "|index.php?cmr_mode=inscription|" . $cmr->translate("Inscription ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("validation") . "|index.php?cmr_mode=validation|" . $cmr->translate("Activation ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("forget_account") . "|index.php?cmr_mode=forget_account|" . $cmr->translate("Forget Account ")  .  "|gnome-starthere-mini.png|\n";
$menustring .="..|" . $cmr->translate("Exit") . "|index.php?conf=exit|" . $cmr->translate("Exit ")  .  "|gnome-starthere-mini.png|\n";
// ====================================================
// ====================================================
    
$menustring = preg_replace("/index\.php\?module_name=([^\|]+)\|/seU", "menu_tree_link('\\1')", $menustring);
$menustring = preg_replace("/\.\|([^\|]+)\|/seU", "cmr_translate('.|\\1|')", $menustring);
// print(nl2br($menustring));
if(empty($menustring)) $menustring = "menu_tree=.|Home |index.php?conf=init|Home |gnome-starthere-mini.png|\n";

?>
<?php include_once ($myDirPath . "libjs/layersmenu-browser_detection.js"); ?>
<?php
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

$mid->printHeader();
/* alternatively:
$header = $mid->makeHeader();
print $header;
*/
?>

<?php
$mid->printMenu("hormenu1");
/* alternatively:
$hormenu1 = $mid->getMenu("hormenu1");
print $hormenu1;
*/
?>
<?php
$mid->printFooter();
/* alternatively:
$footer = $mid->makeFooter();
print $footer;
*/
?>
</td>
<td valign="top">
<form  action="index.php" method="post">
<input type="hidden" value="commands" name="class_module" />


<select name="language" id="language">
<option value="cmr">Cmr</option>
<option value="search"><?php print($cmr->translate("search"));?></option>
<option value="google">Google</option>
<option value="yahoo">Yahoo</option>
<option value="html">Html</option>

<?php
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){

    ?>
<option value="url">Url</option>
<option value="jscrip">JS</option>
<option value="php">Php</option>
<option value="ebay">Ebay</option>
<option value="sql">Sql</option>
<option value="linux">Cmd</option>
<!--option value="linux"><?php print($cmr->translate("run linux"));?></option>
<option value="uxix"><?php print($cmr->translate("run unix"));?></option>
<option value="windows"><?php print($cmr->translate("run windows"));?></option>
<option value="solaris"><?php print($cmr->translate("run solaris"));?></option>
<option value="model"><?php print($cmr->translate("run a model"));?></option-->
print($cmr->translate("run a model"));?></option-->
<?php
}

?>
</select>


<input type="text" name="com_text" />



<input class="submit" type="submit" value="!" />
</form>
</td></tr>
</table>
</div>
<?php  print($division->close());
?>
