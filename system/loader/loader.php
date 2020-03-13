<?php
defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader.php
 * --------
 * begin    : July 2004 - July 2009
 * copyright   : Camaroes Ver 2.0.3 (C) 2005-2009 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/* vim: set expandtab tabstop=4 shiftwidth=4: */
/*
Copyright (c) 2009, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























loader.php,  2009-Feb-Tue 0:12:13
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module windows
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$mod->count1 = 1;
$mod->count2 = 1;
while ((isset($cmr->page[$mod->layer . $mod->count1])) && ($mod->count1 <= count($cmr->page))){
	if($cmr->page[$mod->layer . $mod->count1]){
		$cmr->page[$mod->layer . $mod->count2] = $cmr->page[$mod->layer . $mod->count1];
		if($mod->count2 != $mod->count1) unset($cmr->page[$mod->layer . $mod->count1]); // --ordinare----
		$mod->path = $cmr->page[$mod->layer . $mod->count2];
		$mod->position = $mod->layer . $mod->count2;
		$mod->count3 = $mod->count1;
		$mod->count4 = $mod->count2;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		include($cmr->get_path("index") ."system/loader/loader_module.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$mod->count2++;
	}
	$mod->count1++;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>