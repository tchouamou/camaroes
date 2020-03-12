<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_config.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_config.php,Ver 3.0  2011-Aug-Mon 05:51:33  
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["text"] = "";


















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

<div id="left_config_div"> 
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
        if(($file != ".") && cmr_search("^config", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/" . $file;
				$array_modules["auto"][] = 0;
				$array_modules["name"][] = $file;
				$array_modules["label"][] = $cmr->translate(substr($file, 0, strrpos($file, ".")));
$num_modules++;
        };
    };
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/admin/");
    while ($file = readdir($dir)){
        if(($file != ".") && cmr_search("^config", $file) && ($file != "..") && is_file($cmr->get_path("module") . "modules/admin/" . $file)){
	            $array_modules["path"][] = $cmr->get_path("module") . "modules/admin/" . $file;
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
		   print($cmr->module_icon($array_modules["path"][$key], "16") . $cmr->module_link($array_modules["path"][$key] . "?conf_name=conf.d/modules/conf_" . $array_modules["label"] . ".ini"));
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
  <a href="index.php?cmr_mode=logout" >
  <?php print($cmr->translate("|exit|"));?>
  </a>
 </li>



</ul>
</div>
<?php
print($division->close());

?>