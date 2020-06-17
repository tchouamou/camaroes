<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        menu_delete.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_delete,Ver 3.0  @_date_time_@
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




$division->module["title"]=cmr_search_replace("_", " ", $cmr->translate($mod->base_name));
$division->module["title"] = "Menu General";
//$division->module["text"] = "";




















print($division->show_noclose());

// print("<b>");
// print(ucfirst($cmr->language['" . $mod->base_name . "_title']));
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
print("</p>");
?>


<div id="menu_delete_div">
<ul class="cmr_menu">



 <li>
  <a href="index.php?conf=init"><?php print($cmr->translate(" |home| "));?></a>
 </li>


<?php
$im=0;
$array_modules = array();
$num_modules=0;
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/");
    while ($file = readdir($dir)){
        if(($file != ".") && cmr_search("^delete_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
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
        if(($file != ".") && cmr_search("^delete_", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/auto/" . $file)){
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

		if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key])){
		print("<li>");
    print($cmr->module_icon($value, "16") . $cmr->module_link($value . "?conf_name=conf.d/modules/conf_" . $array_modules["label"][$key]. ".ini"));
		print("</li>");

    };
    };
// ====================================================
// ====================================================
// ====================================================
// ====================================================
// ====================================================


		print("<li>");
		   print($cmr->module_icon("modules/menu_list.php", "16") . $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini"));
		print("</li>");

?>


 <li>
  <a href="index.php?cmr_mode=logout" ><?php print($cmr->translate("|exit|"));?></a>
 </li>



</ul>
</div>
<?php print($division->close()); ?>
