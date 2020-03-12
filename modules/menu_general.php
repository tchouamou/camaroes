<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        menu_general.php
 *       ---------
 * begin    : July 2004 - October 2010
 * copyright   : Camaroes Ver 3.03 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/ 

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


menu_general.php, Ver 3.03   
*/





/**
* Information about
*
* Is used for keeping
*
* windowss (design for the layer usefull when running a module)  
*
* @$division object istance of the class windowss

*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
$division->module["name"] = $mod->name; 




$division->module["title"] = $cmr->translate("Menu General "); 
//$division->module["text"] = "";




















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/desktop.php?conf_name=conf.d/modules/conf_desktop.ini", 1);;;
$lk->add_link("modules/menu_general.php?conf_name=conf.d/modules/conf_general.ini", 1);;;
$lk->add_link("modules/guest/site_map.php?conf_name=conf.d/modules/conf_site_map.ini", 1);;;
print($lk->open_module_tab(1));



// print("<b>");
// print(ucfirst($cmr->language['" . $mod->base_name . "_title']));
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
print("</p>");
?>


<div id="menu_general_div"> 
<ul class="cmr_menu">



 <li class="menu_row1" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <a href="index.php?conf=init"><?php print($cmr->translate(" |home| "));?></a>
 </li>


<?php 
$im=0;
$array_modules = array();
$num_modules=0;
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/");
    while ($file = readdir($dir)){
        if(($file != ".") && cmr_search("^menu_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/auto/");
    while ($file = readdir($dir)){
        if(($file != ".") && cmr_search("^menu_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/auto/" . $file)){
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
// ====================================================
// ====================================================
// ====================================================
    foreach ($array_modules["path"] as $key => $value){
		
		print("<li class=\"menu_row".($key % 2)."\" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\">");
		   print($cmr->module_icon($array_modules["path"][$key], "16") . $cmr->module_link($array_modules["path"][$key] . "?conf_name=conf.d/modules/conf_" . $array_modules["label"] . ".ini"));
		print("</li>");
		
    };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
// ====================================================

		if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])){
		print("<li class=\"menu_row".($key % 2)."\" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\">");
		   print($cmr->module_icon("modules/menu_general.php", "16") . $cmr->module_link("modules/menu_general.php?conf_name=conf.d/modules/conf_general.ini"));
		print("</li>");
		};
		


?>


 <li class="menu_row1" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <a href="index.php?cmr_mode=logout" ><?php print($cmr->translate("|exit|"));?></a>
 </li>



</ul>
</div>
<?php 
print($lk->close_module_tab());
print($division->close()); 
?>