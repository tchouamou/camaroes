<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report.php
 *          --------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























report.php,  2011-Feb-Tue 0:12:13
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
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //" Download";
// $division->module["text"] = "";


















print($division->show_noclose());


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/report.php?conf_name=conf.d/modules/conf_report.ini&refresh=", 1);;
$lk->add_link("modules/report_periodic.php?conf_name=conf.d/modules/conf_periodic.ini&refresh=", 1);;
$lk->add_link("modules/report_compare.php?conf_name=conf.d/modules/conf_compare.ini&refresh=", 1);;
print($lk->open_module_tab(0));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="report_div">

<?php 

	$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "download.php");
	$cmr->config = $mod->load_conf("download.php");
	$cmr->help=$cmr->load_help_need("download.php");
	
	$cmr->action["module_name"] = "download.php";
	$cmr->action["to_load"] = "load_func_need";
	include($cmr->get_path("index") . "system/loader/loader_function.php");
	$cmr->action["to_load"] = "load_class_need";
	include($cmr->get_path("index") . "system/loader/loader_class.php");
// --------
$file_path = $cmr->get_path("home") . "home/groups/" . $cmr->get_user("auth_group") . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
// --------
$file_path = $cmr->get_path("home") . "home/groups/" . $cmr->get_user("auth_group") . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
// --------
$file_path = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
// --------
$file_path = $cmr->get_path("home") . "home/users/" . $cmr->get_user("auth_uid") . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
?>
</div>
<?php
print($lk->close_module_tab());
print($division->close());
?>
