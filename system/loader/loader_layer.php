<?php
defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader_layer.php
 * --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























loader_layer.php,  2011-Oct
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

$cmr->page["count1"] = 1;
$cmr->page["count2"] = 1;
while ((isset($cmr->page[$cmr->page["layer"] . $cmr->page["count1"]])) && ($cmr->page["count1"] <= count($cmr->page))){
	if($cmr->page[$cmr->page["layer"] . $cmr->page["count1"]]){
		$cmr->page[$cmr->page["layer"] . $cmr->page["count2"]] = $cmr->page[$cmr->page["layer"] . $cmr->page["count1"]];
		if($cmr->page["count2"] != $cmr->page["count1"]) unset($cmr->page[$cmr->page["layer"] . $cmr->page["count1"]]); // --ordinare----
		$cmr->page["module"] = $cmr->page[$cmr->page["layer"] . $cmr->page["count2"]];
		$cmr->page["position"] = $cmr->page["layer"] . $cmr->page["count2"];
		$cmr->page["count3"] = $cmr->page["count1"];
		$cmr->page["count4"] = $cmr->page["count2"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		include($cmr->get_path("index") ."system/loader/loader_module.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->page["count2"]++;
	}
	$cmr->page["count1"]++;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
