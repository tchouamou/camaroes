<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_login_imap.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_login_imap.php,  2011-Oct
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
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "login_imap"://----can delete or call another function for work ----




// $cmr_code = get_post('cmr_code');
// $imap_code = get_post('imap_code');
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr_code = isset($_POST['imap_code']) ? $_POST['imap_code'] : $_GET['imap_code'];
$cmr->session["cmr_code"] = isset($_POST['cmr_code']) ? $_POST['cmr_code'] : $_GET['cmr_code'];

if(((($cmr->get_conf("cmr_login_code")))&&($cmr->session["cmr_code"] =! pw_encode($imap_code))))  {

// 	$cmr->event["id"] = "13";
// 	$cmr->event["name"] = "wrong_account";
// 	$cmr->event["line"]=__LINE__;
// 	$cmr->event["script"]=__FILE__;
// 	$cmr->event["data"] = "?cmr_mode=login&force_login=yes";
// 	$cmr->event["comment"] = " User Cannot be Find, Wrong Username or Password or no database";
// 	$cmr->run_event();

}else{
	
	$auth_imap = get_post('auth_imap');
	$imap_cert = get_post('imap_cert');
	$imap_host = get_post('imap_host');
	$imap_user = get_post('imap_user');
	$imap_pw = get_post('imap_pw');
	
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("class") . "class/class_imap.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$m = new class_imap();
$m->imap_service=$auth_imap;

switch ($auth_imap){
	case "pop3" :
        $m->pop3_server = $imap_host;
        (strpos($m->pop3_server, ":")) ? $m->pop3_port = "" : $m->pop3_port = "110";
        $m->pop3_user_name = $imap_user;
        $m->pop3_password = $imap_pw;
        $m->pop3_default_folder = "INBOX";
	break;
	case "nntp" :
        $m->nntp_server = $imap_host;
        (strpos($m->nntp_server, ":")) ? $m->nntp_port = "" : $m->nntp_port = "119";
        $m->nntp_user_name = $imap_user;
        $m->nntp_password = $imap_pw;
        $m->nntp_group = "comp.test";
        $m->nntp_default_folder = "";
	break;
	case "imap_ssl" :
        $m->imap_ssl_server = $imap_host;
        (strpos($m->imap_ssl_server, ":")) ? $m->imap_ssl_port = "" : $m->imap_ssl_port = "995";
        $m->imap_ssl_user_name = $imap_user;
        $m->imap_ssl_password = $imap_pw;
        $m->imap_ssl_default_folder = "INBOX";
		
	break;
	
	case "imap_ssl_cert" :
        $m->imap_ssl_cert_server = $imap_host;
        (strpos($m->imap_ssl_cert_server, ":")) ? $m->imap_ssl_cert_port = "" : $m->imap_ssl_cert_port = "995";
        $m->imap_ssl_cert_user_name = $imap_user;
        $m->imap_ssl_cert_password = $imap_pw;
        $m->imap_ssl_cert_default_folder = "INBOX";
        $m->imap_certificate = $imap_cert;
	break;
	case "imap" :
	default:
        $m->imap_server = $imap_host;
        (strpos($m->imap_server, ":")) ? $m->imap_port = "" : $m->imap_port = "143";
        $m->imap_user_name = $imap_user;
        $m->imap_password = $imap_pw;
        $m->imap_default_folder = "INBOX";
	break;
	
	}
	
		
	
$m->mailbox=$m->get_mailbox();        
if($m->connect()){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->imap["imap_server"] = $m->imap_server;
$cmr->imap["imap_port"] = $m->imap_port;
$cmr->imap["imap_user_name"] = $m->imap_user_name;
$cmr->imap["imap_password"] = $m->imap_password;
$cmr->imap["imap_default_folder"] = $m->imap_default_folder;

$cmr->imap["pop3_server"] = $m->pop3_server;
$cmr->imap["pop3_port"] = $m->pop3_port;
$cmr->imap["pop3_user_name"] = $m->pop3_user_name;
$cmr->imap["pop3_password"] = $m->pop3_password;
$cmr->imap["pop3_default_folder"] = $m->pop3_default_folder;

$cmr->imap["nntp_server"] = $m->nntp_server;
$cmr->imap["nntp_port"] = $m->nntp_port;
$cmr->imap["nntp_user_name"] = $m->nntp_user_name;
$cmr->imap["nntp_password"] = $m->nntp_password;

$cmr->imap["nntp_group"] = $m->nntp_group;
$cmr->imap["nntp_default_folder"] = $m->nntp_default_folder;

$cmr->imap["imap_ssl_server"] = $m->imap_ssl_server;
$cmr->imap["imap_ssl_port"] = $m->imap_ssl_port;
$cmr->imap["imap_ssl_user_name"] = $m->imap_ssl_user_name;
$cmr->imap["imap_ssl_password"] = $m->imap_ssl_password;
$cmr->imap["imap_ssl_default_folder"] = $m->imap_ssl_default_folder;

$cmr->imap["imap_ssl_cert_server"] = $m->imap_ssl_cert_server;
$cmr->imap["imap_ssl_cert_port"] = $m->imap_ssl_cert_port;
$cmr->imap["imap_ssl_cert_user_name"] = $m->imap_ssl_cert_user_name;
$cmr->imap["imap_ssl_cert_password"] = $m->imap_ssl_cert_password;
$cmr->imap["imap_ssl_cert_default_folder"] = $m->imap_ssl_cert_default_folder;

$cmr->imap["imap_certificate"] = $m->imap_certificate;

$cmr->imap["imap_list_folder"] = $m->imap_list_folder;

$cmr->imap["imap_service"] = $m->imap_service;//imap,pop3,imap_ssl,imap_ssl_cert,nntp
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["mailbox"] = $m->mailbox;
$cmr->post_var["email"] = $m->email;

$cmr->post_var["imap_server"] = $m->imap_server;
$cmr->post_var["imap_port"] = $m->imap_port;
$cmr->post_var["imap_user_name"] = $m->imap_user_name;
$cmr->post_var["imap_password"] = $m->imap_password;
$cmr->post_var["imap_default_folder"] = $m->imap_default_folder;

$cmr->post_var["pop3_server"] = $m->pop3_server;
$cmr->post_var["pop3_port"] = $m->pop3_port;
$cmr->post_var["pop3_user_name"] = $m->pop3_user_name;
$cmr->post_var["pop3_password"] = $m->pop3_password;
$cmr->post_var["pop3_default_folder"] = $m->pop3_default_folder;

$cmr->post_var["nntp_server"] = $m->nntp_server;
$cmr->post_var["nntp_port"] = $m->nntp_port;
$cmr->post_var["nntp_user_name"] = $m->nntp_user_name;
$cmr->post_var["nntp_password"] = $m->nntp_password;

$cmr->post_var["nntp_group"] = $m->nntp_group;
$cmr->post_var["nntp_default_folder"] = $m->nntp_default_folder;

$cmr->post_var["imap_ssl_server"] = $m->imap_ssl_server;
$cmr->post_var["imap_ssl_port"] = $m->imap_ssl_port;
$cmr->post_var["imap_ssl_user_name"] = $m->imap_ssl_user_name;
$cmr->post_var["imap_ssl_password"] = $m->imap_ssl_password;
$cmr->post_var["imap_ssl_default_folder"] = $m->imap_ssl_default_folder;

$cmr->post_var["imap_ssl_cert_server"] = $m->imap_ssl_cert_server;
$cmr->post_var["imap_ssl_cert_port"] = $m->imap_ssl_cert_port;
$cmr->post_var["imap_ssl_cert_user_name"] = $m->imap_ssl_cert_user_name;
$cmr->post_var["imap_ssl_cert_password"] = $m->imap_ssl_cert_password;
$cmr->post_var["imap_ssl_cert_default_folder"] = $m->imap_ssl_cert_default_folder;

$cmr->post_var["imap_certificate"] = $m->imap_certificate;

$cmr->post_var["imap_list_folder"] = $m->imap_list_folder;

$cmr->post_var["imap_service"] = $m->imap_service;//imap,pop3,imap_ssl,imap_ssl_cert,nntp
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ----salva passord ----------
	$cookie_action = (get_post("save_cookies"));
	save_cookie_status($cmr->config, "save_cookies", $cookie_action);
	save_cookie_status($cmr->config, "auth_imap", $cookie_action);
	save_cookie_status($cmr->config, "imap_cert", $cookie_action);
	save_cookie_status($cmr->config, "imap_host", $cookie_action);
	save_cookie_status($cmr->config, "imap_user", $cookie_action);
	save_cookie_status($cmr->config, "imap_pw", $cookie_action);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["layer"] = "3";

$cmr->page["left1"] = "menu_tree_imap.php";
$cmr->page["left2"] = "";
$cmr->page["middle1"] = "view_all_imap.php";
$cmr->page["middle2"] = "";

$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->get_session("id") . "' ,'login_imap'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["layer"] = "3";

$cmr->page["left1"] = $cmr->get_path("module") . "modules/menu_tree_imap.php";
$cmr->page["left2"] = "";
$cmr->page["middle1"] = $cmr->get_path("module") . "modules/view_all_imap.php";
$cmr->page["middle2"] = "";

$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>