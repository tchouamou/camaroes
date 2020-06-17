<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * modules_map.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























modules_map.php,  2011-Oct
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
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// open_box($cmr->config, $cmr->language, $mod->name, $mod->rown_position, $mod->col_position, " Application Bar");
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Application Bar";
// $division->module["text"] = "";


















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/desktop.php?conf_name=conf.d/modules/conf_desktop.ini", 1);;;
$lk->add_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini", 1);;;
$lk->add_link("modules/guest/site_map.php?conf_name=conf.d/modules/conf_site_map.ini", 1);;;
print($lk->open_module_tab(2));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_tree_auto.php?conf_name=conf.d/modules/conf_tree_auto.ini", 1);;;
$lk->add_link("modules/menu_tree_left.php?conf_name=conf.d/modules/conf_tree_left.ini", 1);;;
print($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="module_map_div">
<?php
$cols = "0";
$alpha = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "-", "_", "@", ".");
if(($cmr->get_conf("cmr_alphabel"))) $alpha = explode(",", $cmr->get_conf("cmr_alphabel"));

$im=0;
$array_modules = array();
$num_modules=0;
// ====================================================
    $dir = opendir($cmr->get_path("module") . "modules/");
    while ($file = readdir($dir)){
        if(($file != ".")  && ($file != "..") && is_file($cmr->get_path("module") . "modules/".$file)){
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
        if(($file != ".")  && ($file != "..") && is_file($cmr->get_path("module") . "modules/auto/" . $file)){
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
// ====================================================

foreach($alpha as $chr){
    echo "<hr /><b style=\"text-align:left;\">" . $chr . "</b><hr /><ul style=\"text-align:left;\" >";
    $cols++;

    foreach ($array_modules["path"] as $key => $value){
		if(accept_mod($cmr->config, $cmr->user, $array_modules["name"][$key]))
            if(strtolower(substr($array_modules["label"][$key], 0, 1)) == trim($chr)){
                print("<li>");
		   		print($cmr->module_icon($array_modules["path"][$key], "16") . $cmr->module_link($array_modules["path"][$key] . "?module_file = " . $array_modules["path"][$key], "", "", "", "", $mod->position));
                print("</li>");
            }
        };
    
    
    
    // print("</td><td>");
    print("</ul>");
}
// </td></tr>
// </table>
?>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>

