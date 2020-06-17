<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_imap.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























config_imap.php,Ver 3.0  2011-May-Thu 03:42:05
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_config.php")
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->action["to_load"] = "imap.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);

// $division->module["text"] = "";





// 












print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/confimap.ini", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini", 1);
$lk->add_link("modules/search_imap.php?conf_name=conf.d/modules/conf_imap.ini", 1);

$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini", 1);
$lk->add_link("modules/export_imap.php?conf_name=conf.d/modules/conf_export_imap.ini", 1);
$lk->add_link("modules/import_imap.php?conf_name=conf.d/modules/conf_import_imap.ini", 1);
$lk->add_link("modules/update_imap.php?conf_name=conf.d/modules/conf_imap.ini&id=$id", 1);
print($lk->list_link());

$file_name1 = $cmr->get_path("index") . "conf/conf_imap" . $cmr->get_ext("conf");
$cmr->post_var["file_name2"] = $cmr->get_path("index") . "languages/" . $cmr->get_page("language") . "/lang_imap" . $cmr->get_ext("lang");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="config_imap_div">


<form  action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_config.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $file_name1 . ", " . $cmr->post_var["file_name"] . "\" name=\"file_name\" />"));?>

<?php

$file_name = $file_name1;
include($cmr->get_path("index") . "system/loader/load_config.php");

print("<br /><hr /><br />");

$file_name = $cmr->post_var["file_name2"];
include($cmr->get_path("index") . "system/loader/load_config.php");

?>
<input class="submit" type="submit" value="<?php print( $cmr->translate("save"));
?>" />
</form>

</div>

<?php print($division->close());
?>
