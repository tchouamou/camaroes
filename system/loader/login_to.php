<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * login_to.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























login_to.php,  2011-Oct
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
$cmr->post_var["login_to"] = get_post("login_to");
$cmr->session["login_to"] = $cmr->post_var["login_to"];

if (($cmr->get_session("login_to"))) {
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	switch(trim($cmr->post_var["login_to"])){
		case "report":
		case "email":
		case "message":
		case "ticket":
			$cmr->page["tab_mode"] = 0;
		break;
		
		case "file_explorator":
		case "database":
		case "replace":
		case "script_generator":
		case "button_generator":
		case "admin":
			$cmr->page["tab_mode"] = 1;
		break;
		default:
// 			$cmr->page["tab_mode"] = 1;
		break;
		
		}
		
		
		
	$tab_toload=trim($cmr->get_session("login_to"));
// 	switch(trim($cmr->get_session("login_to"))){
// 		case "Files Explorator":
// 		$tab_toload="file_explorator";
// 		break;
// 		
// 		case "Script Generator":
// 		$tab_toload="script_generator";
// 		break;
// 		
// 		case "Button Generator":
// 		$tab_toload="button_generator";
// 		break;
// 		
// 		case "TSTM ticketing":
// 		$tab_toload="ticket";
// 		break;
// 		
// 		case "DB manager":
// 		$tab_toload="database";
// 		break;
// 		
// 		case " Email":
// 		$tab_toload="email";
// 		break;
// 		
// 		case " Messenger":
// 		$tab_toload="message";
// 		break;
// 		
// 		case " Forum":
// 		$tab_toload="forum";
// 		break;
// 		
// 		case " Chat":
// 		$tab_toload="chat";
// 		break;
// 		
// 		case " Report":
// 		$tab_toload="report";
// 		break;
// 		
// 		case " Develop":
// 		$tab_toload="develop";
// 		break;
// 		
// 		case "Fomo Admin Master":
// 		$tab_toload="admin";
// 		break;
// 		
// 		case " CMS":
// 		$tab_toload="cms";
// 		break;
// 		
// 		default:
// 		$tab_toload=trim($cmr->get_session("login_to"));
// 		break;
// 		}
// print("\$cmr->session["login_to"] = $cmr->get_session("login_to");\$tab_toload= $tab_toload;";exit);		
		if(file_exists($cmr->get_path("tab") . "tab/" . $tab_toload."/page" . $cmr->get_ext("page"))){
			$cmr->page = cmr_include_conf($cmr->config, $cmr->get_path("tab") . "tab/" . $tab_toload . "/page" . $cmr->get_ext("page"), $cmr->page, "var");
// 		$cmr->debug_print();exit;
		}

}
    // ===============================================================
?>