<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * application_bar.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























application_bar.php,Ver 3.0  2011-Sep-Wed 12:32:30  
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
// open_finestra($cmr->config, $cmr->language, $cmr->module["name"], $cmr->module["rown_position"], $cmr->module["col_position"], " Application Bar");
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $cmr->get_module("name");




$division->module["title"] = $cmr->translate($cmr->module["base_name"]); //$division->module["title"] = " Application Bar";
// $division->module["text"] = "";


















print($division->show_noclose());

?>
<br /><b>
<?php
print($cmr->language[$cmr->module["base_name"]]);
?>
</b>
<br />
<p class="normal_text">
<?php
print(ucfirst($cmr->language['".$cmr->module["base_name"]."_title']));
?>
</p>
<br />
<div id="cmr_portal_bar_div">
 <p align="left" class="small_list">

 <?php
$dir = opendir($cmr->get_path("module") . "modules/");
while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && ($file)){
   				print($cmr->module_link($file."?refresh=", 1));
//         print("<a index.php?cod=1&keys=" . base64_encode_url($cmr->config, $cmr->language, "layer::middle1") . "&vals=" . base64_encode_url($cmr->config, $cmr->language, "3 : $file") . ">" . $file . "</a>, ");
    };
};

$dir = opendir($cmr->get_path("module") . "modules/auto/");
while ($file = readdir($dir)){
    if(($file != ".") && ($file != "..") && ($file)){
   				print($cmr->module_link($file."?refresh=", 1));
//         print("<a index.php?cod=1&keys=" . base64_encode_url($cmr->config, $cmr->language, "layer::middle1") . "&vals=" . base64_encode_url($cmr->config, $cmr->language, "3 : $file") . ">" . $file . "</a>, ");
    };
};

?>

</p>
</div>
<?php  print($division->close());
?>