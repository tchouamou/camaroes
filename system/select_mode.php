<?php
defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 *              select_mode.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









select_mode.php,  2011-Oct
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
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			
switch(get_post("cmr_mode")){
	case "image":
	include_once($cmr->get_path("index") . "system/generate/image.php");
	exit;
	break;
	
	case "ajax":
	break;
	
	
	case "pdf":
	include_once($cmr->get_path("index") . "system/generate/pdf.php");
	exit;
	break;
	
	
	case "tips":
	include_once($cmr->get_path("index") . "system/generate/tips.php");
	exit;
	break;
	
	
	case "graph":
	include_once($cmr->get_path("index") . "system/generate/graph.php");
	exit;
	break;
	
	case "login":
	include_once($cmr->get_path("index") . "login.php");
	exit;
	break;
	
	case "logout":
	include_once($cmr->get_path("index") . "logout.php");
	exit;
	break;
	
	case "forget_account":
	case "forget_account":
	if(($cmr->get_conf("cmr_allow_forget_account"))){
	include_once($cmr->get_path("index") . "forget_account.php");
	exit;
	}
 	die("<br />forget id not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
	break;
	
	case "inscription":
	if(($cmr->get_conf("cmr_allow_inscription"))){
	include_once($cmr->get_path("index") . "inscription.php");
	exit;
	}
 	die("<br />Inscription not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
	break;
	
	case "validation":
	if(($cmr->get_conf("cmr_allow_validation"))){
	include_once($cmr->get_path("index") . "validation.php");
	exit;
	}
 	die("<br />Validation not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
	break;
	
	
	case "install_db":
	case "install_need":
	include_once($cmr->get_path("index") . "install/install_need.php");
	exit;
	break;
	
	case "update":
	if(($cmr->get_conf("cmr_allow_update"))){
	include_once($cmr->get_path("index") . "install/update.php");
	exit;
	}
 	die("<br />Update not allow !!, change the configuration file  or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
	break;
	
	case "install":
	case "install_all":
	if(($cmr->get_conf("cmr_allow_install"))){
	include_once($cmr->get_path("index") . "install/install.php");
	exit;
	}
 	die("<br />Install not allow !!, change the configuration file or click <a href=\"" .  $_SERVER['PHP_SELF'] . "?cmr_mode=login&force_login=yes\" > Here </a>  to login before continue ");
	break;
	
	case "download":
	exit;
	break;
	
	
	case "barcode":
	exit;
	break;
	
	case "explore":
	include_once($cmr->get_path("module") . "modules/admin/explore.php");
	exit;
	break;
	
	case "normal":;
	default:;
	break;
}
?>