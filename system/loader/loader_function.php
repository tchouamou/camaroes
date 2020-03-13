<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader_function.php
 *          ----------------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


loader_function.php,  2011-Feb-Tue 0:12:13
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*=================================================================*/
/*=================================================================*/
/*=================================================================*/
switch($cmr->get_action("to_load")){
 case "web_include":
    // include($file);
 break;

 case "preload_function":
  $cmr->action["module_name"] = $cmr->get_conf("cmr_preload_func");
	//   include other function needed, from conf.php
 break;
 
 case "load_func_need":
 break;
 
 default:
 $cmr->action["module_name"] = "";
 break;
/*=================================================================*/
/*=================================================================*/
}





if(!($cmr->get_action("module_name"))) $cmr->action["module_name"] = $cmr->action["to_load"];
/*=================================================================*/
/*=================================================================*/
 $array_func = array($cmr->get_action("to_load"));
 if(cmr_search("[,;]", $cmr->action["module_name"])) $array_func = cmr_split("[,;]", $cmr->action["module_name"]);
	if(!empty($array_func)){
	    foreach($array_func as $func){
 			$root_name = cmr_pure_name($cmr->config, trim($func));
	        if(trim($func)){
		    // --------------
			   $class_name = "";
			   $file_list = array();
			   $file_list[] = trim($func);
			   $file_list[] = $cmr->get_path("index") . trim($func);
			   $file_list[] = $cmr->get_path("func") . "function/" . trim($func);
			   $file_list[] = $cmr->get_path("func") . "function/func_" . $root_name;
// 			   $file_list[] = $cmr->get_path("func") . "function/auto/" . trim($func);
// 			   $file_list[] = $cmr->get_path("func") . "function/auto/func_" . $root_name;
			   $file_list[] = $cmr->get_path("index") . "function/" . trim($func);
			   $file_list[] = $cmr->get_path("index") . "function/func_" . $root_name;
// 			   $file_list[] = $cmr->get_path("index") . "function/auto/" . trim($func);
// 			   $file_list[] = $cmr->get_path("index") . "function/auto/func_" . $root_name;
			   
			   
			   $func_name = cmr_good_file($file_list, "file");
		    // -------
		       if(is_file($func_name)) include_once($func_name);
		    // -------
	       		
	       		
	        }
	    }
	}
/*=================================================================*/
/*=================================================================*/
