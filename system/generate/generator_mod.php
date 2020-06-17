<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"{cmr_wwwpath}index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * generator_mod.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























generator_mod.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
         
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
	if(empty($cmr->post_var["current_database"])) $cmr->post_var["current_database"] = $cmr->get_conf("db_name");
	if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = $cmr->get_conf("cmr_table_prefix") . substr($mod->name, strrpos($mod->name, "_"), strrpos($mod->name, ".") - 1);
	
	$module_file = 	$cmr->get_path("module") . "database/" . substr($mod->name, 0, strrpos($mod->name, "_")) . "table.php";

if(is_file($module_file)){
	 include($module_file);
}else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->output[1] = $cmr->translate("!!! call off an not existing data module in ") . " (generate_mod.php) " . $cmr->translate("by user ") ." ". $cmr->get_user("auth_email") . ", host:" . $cmr->get_user("host_adress");
	$cmr->output[1] .= " The module (" . basename($mod->name) . ") " . $cmr->translate("was call but do not exist")."  \n";
	$cmr->event_log("Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . $cmr->output[1]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
}
?>
