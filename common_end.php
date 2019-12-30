<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * common_end.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*=================================================================*/
// vim
// set expandtab
// set shiftwidth=4
// set softtabstop=4
// set tabstop=4
// 80 char / line
// * @package cmr
// * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
// * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
// * This version may have been modified pursuant
// * to the GNU General Public License, and as distributed it includes or
// * is derivative of works licensed under the GNU General Public License or
// * other free or open source software licenses.
// */
	#the first configuration file is ./config.inc.php
	#the general dynamic configuration files are ./conf.d/conf.ini, ./config.inc.php
	#the group configuration file is ./home/groups/{group_name}/config.ini
	#the user configuration file is ./home/groups/{user_name}/config.ini
	
	
	#to configure the interface (module windows position) for all user, see ./page/page.ini or ./themes/themes.ini or ./css/camaroes.css
	#to configure the interface (module windows position) for a group, see ./home/{group_name}/page.ini or ./home/{user_name}/page.ini
	
	#the language file is ./languages/language.ini or ./language/lang_to_use/language.ini
	#the default windows themes configuration file ./themes/themes.ini or ./themes/{themes_folder}/themes.ini

	#the database connection configuation can_be ./conf.d/conf.ini or ./config.inc.php or ./conf.d/conf.ini or ./home/{group_name}/login_rc.php  or ./home/{group_name}/config.ini  or ./home/{user_name}/config.ini (the default one is in ./conf.d/conf.ini )

	# the database connection configuation is in ./home/{group}/connect.php (the default one is in config.inc.php, ./conf.d/conf.ini )
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->debug_print();exit;
        /*==================*/
             
             
        /*==================*/
if($cmr->exist_mess("common_end.php")) print($cmr->module_mess("common_end.php"));
        /*==================*/
             
        /*==================*/
(!($cmr->get_conf("cmr_output_buffering"))) ? $cmr->buffer[0] = ob_get_contents() : $cmr->buffer[0] = ""; // get buffer contents
        /*==================*/
             
        /*==================*/
if(($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type"))) $cmr->buffer[0] = cmr_search_replace("<!--[^<]+-->", "", $cmr->buffer[0]);// --delete comments------        
!($cmr->get_conf("cmr_output_buffering")) or  ob_end_clean(); // clean  buffer content
        /*==================*/
             
        /*==================*/
print($cmr->buffer[0]);
        /*==================*/
             
             
        /*==================*/
!($cmr->get_conf("cmr_debug_mode")) or  $cmr->debug_print();
        /*==================*/
             
        /*==================*/
$cmr->close(); 
        /*==================*/
?>