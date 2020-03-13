<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * loader_class.php
 *          ----------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


loader_class.php,  2011-Oct
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

 case "preload_class":
  $cmr->action["module_name"] = $cmr->get_conf("cmr_preload_class");
	//   include other class needed, from conf.php
 break;
 
 case "load_class_need":
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
 $array_class = array($cmr->get_action("module_name"));
 if(cmr_search("[,;]", $cmr->action["module_name"])) $array_class = cmr_split("[,;]", $cmr->action["module_name"]);
	if(!empty($array_class)){
	    foreach($array_class as $the_class){
 			$root_name = cmr_pure_name($cmr->config, trim($the_class));
	        if(trim($the_class)){
		    // --------------
			   $the_class_name = "";
			   $file_list = array();
			   $file_list[] = trim($the_class);
			   $file_list[] = $cmr->get_path("index") . trim($the_class);
			   $file_list[] = $cmr->get_path("class") . "class/" . trim($the_class);
			   $file_list[] = $cmr->get_path("class") . "class/class_" . $root_name;
			   $file_list[] = $cmr->get_path("class") . "class/auto/" . trim($the_class);
			   $file_list[] = $cmr->get_path("class") . "class/auto/class_" . $root_name;
			   $file_list[] = $cmr->get_path("index") . "class/" . trim($the_class);
			   $file_list[] = $cmr->get_path("index") . "class/class_" . $root_name;
			   $file_list[] = $cmr->get_path("index") . "class/auto/" . trim($the_class);
			   $file_list[] = $cmr->get_path("index") . "class/auto/class_" . $root_name;
			   
			   
			   $the_class_name = cmr_good_file($file_list, "file");
		    // -------
		       if(is_file($the_class_name)) include_once($the_class_name);
		    // -------
	       		
	       		
	        }
	    }
	}
/*=================================================================*/
/*=================================================================*/
