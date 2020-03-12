<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");

// bool imap_mail_copy ( resource imap_stream, string msglist, string mbox [, int options] )


// imap_mail_copy() copie les messages email spécifiés par msglist dans la boîte aux lettres nommée mbox. Cette fonction retourne TRUE en cas de succès, FALSE en cas d'échec. 

// msglist est un intervalle, et pas seulement une liste de numéros de message (comme décrit dans la RFC2060). 

// options est un masque, qui peut contenir une ou plusieurs des valeurs suivantes : 


// CP_UID - la séquence de nombre contient des UIDS 

// CP_MOVE - Efface les messages après copie. 



// bool imap_undelete ( resource imap_stream, int msg_number [, int flags] )
// bool imap_clearflag_full ( resource stream, string sequence, string flag [, string options] )

// bool imap_setflag_full ( resource stream, string sequence, string flag [, string options] )
// // $status = imap_setflag_full($mbox, "2,5", "\\Seen \\Flagged");


// imap_clearflag_full() efface le flag flag dans les messages de la séquence sequence, du flux imap stream. Les flags flag que vous pouvez effacer sont "\\Seen", "\\Answered", "\\Flagged", "\\Deleted" et "\\Draft" (tels que définis dans la RFC2060). Cette fonction retourne TRUE en cas de succès, FALSE en cas d'échec.. 

// options est un masque de bit, qui accepte uniquement la valeur suivante : 


// ST_UID - la séquence contient des UID au lieu de numéros de séquence


/**
 * get_view_imap.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

get_view_imap.php,Ver 3.0  2011 05:49:25  
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
case "view_imap"://When Working in data send by  form [view_imap.php]
*/

// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "imap.php");
$cmr->config = $mod->load_conf("conf_imap.ini");
$cmr->help = $mod->load_help("imap.php");

$cmr->action["module_name"] = "imap.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_conf("cmr_path") . "system/loader/loader_class_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_conf("cmr_path") . "system/loader/loader_class_function.php");
// ----------------            
// =======================================================================
include_once($cmr->get_conf("cmr_class_path") . "class/class_imap.php");

$m = new class_imap();
$m->imap_service="imap";
$m->imap_server = $cmr->email["imap_server"];
$m->imap_port = $cmr->email["imap_port"];
$m->imap_user_name = $cmr->email["imap_user_name"];
$m->imap_password = $cmr->email["imap_password"];
$m->imap_default_folder = $cmr->email["imap_default_folder"];
        
$cmr->email["imap_default_folder"] = $m->imap_default_folder;
if($m->connect()){
}
// =======================================================================

// -----------------------------------------------------
$post = new class_imap();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
$post->set_class_imap($cmr->get_user("auth_imap"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);
// -----------------------------------------------------

$flagbox = $cmr->post_var["flagbox"];

// -----------------------------------------------------

$check_action = get_post("check_action");
$array_check = array();
$list_check = "''";
// -----------------------------------------------------
foreach($_POST as $key_check => $val_check){
    if((cmr_search("^imap_check_", $key_check)) && ($val_check)){
        $check_id = cmr_search_replace("^imap_check_", "", $key_check);
  		$list_check .= ", '" . cmr_escape($check_id) . "'";
  		$array_check[] = cmr_escape($check_id);
    }
}

foreach($_GET as $key_check => $val_check){
    if((cmr_search("^imap_check_", $key_check)) && ($val_check)){
        $check_id = cmr_search_replace("^imap_check_", "", $key_check);
  		$list_check.=", '" . cmr_escape($check_id) . "'";
  		$array_check[] = cmr_escape($check_id);
    }
}
// -----------------------------------------------------

/*
Creating the appropriate SQL string for  imap
*/
switch ($check_action){
    case "delete";
		// ----------------            
		$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "imap.php");
		$cmr->config = $mod->load_conf("conf_imap.ini");
		$cmr->help = $mod->load_help("imap.php");
		
		$cmr->action["module_name"] = "imap.php";
		$cmr->action["to_load"] = "load_func_need";
		include($cmr->get_path("index") . "system/loader/loader_function.php");
		$cmr->action["to_load"] = "load_class_need";
		include($cmr->get_path("index") . "system/loader/loader_class.php");
		// ----------------            
		
		
		// =======================================================================
		include_once($cmr->get_path("class") . "class/class_imap.php");
		
		$m = new class_imap();
		$m->imap_service="imap";
		$m->imap_server = $cmr->email["imap_server"];
		$m->imap_port = $cmr->email["imap_port"];
		$m->imap_user_name = $cmr->email["imap_user_name"];
		$m->imap_password = $cmr->email["imap_password"];
		$m->imap_default_folder = $cmr->email["imap_default_folder"];
		        
		$cmr->email["imap_default_folder"] = $m->imap_default_folder;
		if($m->connect()){
		}
		// =======================================================================
		
		// -----------------------------------------------------
		$post = new class_imap();
		
		////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
		////$post->set_cmr_imap($cmr->get_user("auth_imap"));
		////$post->set_cmr_group($cmr->get_user("auth_group"));
		////$post->set_cmr_type($cmr->get_user("auth_type"));
		////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));
		
		////$post->set_cmr_config($cmr->config);
		////$post->set_cmr_user($cmr->user);
		
		// -----------------------------------------------------
		if(get_post('id_imap', 'post', $cmr->session['pre_match'])){
		    $post->id = get_post('id_imap');
		    $post->set_id_imap(get_post('id_imap', 'post', $cmr->session['pre_match']));
		/**
		*Creating the appropriate SQL string for  delete_imap
		*$cmr->query[0] = "delete from  " . $cmr->get_conf("cmr_table_prefix") . "imap  where  id = '$post->id';";
		**/
		$cmr->query[0]  = $post->query_delete(get_post('id_imap'));
		}
		
		
		/*
		Creating the appropriate Message to be send to the administrator
		*/
		
		/* intestazioni addizionali per l'imap*/
		
		/*
		Creating the appropriate notification Message to be send to the administrator group
		*/
		$templates_notify=cmr_look_file("notify_delete_imap.xml", $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/, ". $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/auto/, ". $cmr->get_path("notify")."templates/notify/auto/");
		$cmr->notify = $cmr->load_notify($templates_notify);
		if(($cmr->get_conf("log_to_page_delete_imap"))) $cmr->output[0] = $cmr->notify["to_page"];
		if(($cmr->get_conf("log_to_log_delete_imap"))) $cmr->output[1] = $cmr->notify["to_log"];
		if(($cmr->get_conf("log_to_imap_delete_imap"))) $cmr->imap=$cmr->notify["to_imap"];
		if(($cmr->get_conf("log_to_db_delete_imap")));
		// if(($cmr->get_conf("log_to_sms_delete_imap")));
		// if(($cmr->get_conf("log_to_flux_delete_imap")));
		// if(($cmr->get_conf("log_to_rss_delete_imap")));
		// if(($cmr->get_conf("log_to_other_delete_imap")));
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . cmr_escape($id) . "' ,'delete'");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		/*
		Select next module to be run
		*/
		// $cmr->page["middle1"] = "run_result.php";
		
		// -----------------------------------------------------
		// $post->close();
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
		$cmr->page["middle2"] = $mod->path;
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        break;
        
    case "select":
    default:		
    break;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . $cmr->get_session("id") . "' ,'view_imap'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

/*
Creating the appropriate notification Message to be send to the administrator group
*/
$templates_notify=cmr_look_file("notify_view_imap.xml", $cmr->get_conf("cmr_notify_path") ."templates/notify/" . $cmr->get_page("language") . "/, ". $cmr->get_conf("cmr_notify_path")."templates/notify/" . $cmr->get_page("language") . "/auto/, ". $cmr->get_conf("cmr_notify_path")."templates/notify/auto/");
$cmr->notify = $cmr->load_notify($templates_notify);

if(($cmr->get_conf("log_to_page_view_imap"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_view_imap"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_imap_view_imap"))) $cmr->email = $cmr->notify["to_imap"];
if(($cmr->get_conf("log_to_db_view_imap")));
// if(($cmr->get_conf("log_to_sms_view_imap")));
// if(($cmr->get_conf("log_to_flux_view_imap")));
// if(($cmr->get_conf("log_to_rss_view_imap")));
// if(($cmr->get_conf("log_to_other_view_imap")));


/*
Select next module to be run
*/
// $cmr->page["middle1"] = "run_result.php";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
