<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_export_imap.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.











get_importclass_imap.php,Ver 3.0  2011 05:49:23
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->imap["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->imap["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 **/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "@_form_@"://When Working in data send by  form [export_imap.php]
// ----------------

// ----------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "imap.php");
$cmr->config = $mod->load_conf("conf_export_imap.ini");
$cmr->help = $mod->load_help("imap.php");

$cmr->action["module_name"] = "imap.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------

// ----------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "generators.php");
$cmr->config = $mod->load_conf("conf_generators.ini");
$cmr->help = $mod->load_help("generators.php");

$cmr->action["module_name"] = "form_generator.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
// ----------------

// ----------------
include($cmr->get_path("func") . "function/func_zip.php");
// ----------------

// ----------------
$post = new class_imap();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
$post->set_class_imap($cmr->get_user("auth_imap"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);
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
$export_type = get_post("export_type", "post", $cmr->session["pre_match"]);
$export_limit = get_post("export_limit", "post", $cmr->session["pre_match"]);
$export_where = get_post("export_where", "post", $cmr->session["pre_match"]);
$into_outfile = get_post("into_outfile", "post", $cmr->session["pre_match"]);
$fields_terminated_by = get_post("fields_terminated_by", "post", $cmr->session["pre_match"]);
$optionally_enclosed_by = get_post("optionally_enclosed_by", "post", $cmr->session["pre_match"]);
$lines_terminated_by = get_post("lines_terminated_by", "post", $cmr->session["pre_match"]);
// -----------------------------------------------------

// =======================================================================
if(get_post("id", "post", $cmr->session["pre_match"])){
    $post->set_id(get_post("id")); //Getting variable [$post->id] sended by form [export_imap.php]
	$array_list_column[get_post("id")] = "id";
    }

if(get_post("encoding", "post", $cmr->session["pre_match"])){
    $post->set_encoding(get_post("encoding")); //Getting variable [$post->encoding] sended by form [export_imap.php]
	$array_list_column[get_post("encoding")] = "encoding";
    }

if(get_post("lang", "post", $cmr->session["pre_match"])){
    $post->set_lang(get_post("lang")); //Getting variable [$post->lang] sended by form [export_imap.php]
	$array_list_column[get_post("lang")] = "lang";
    }

if(get_post("header", "post", $cmr->session["pre_match"])){
    $post->set_header(get_post("header")); //Getting variable [$post->header] sended by form [export_imap.php]
	$array_list_column[get_post("header")] = "header";
    }

if(get_post("mail_title", "post", $cmr->session["pre_match"])){
    $post->set_mail_title(get_post("mail_title")); //Getting variable [$post->mail_title] sended by form [export_imap.php]
	$array_list_column[get_post("mail_title")] = "mail_title";
    }

if(get_post("mail_from", "post", $cmr->session["pre_match"])){
    $post->set_mail_from(get_post("mail_from")); //Getting variable [$post->mail_from] sended by form [export_imap.php]
	$array_list_column[get_post("mail_from")] = "mail_from";
    }

if(get_post("mail_to", "post", $cmr->session["pre_match"])){
    $post->set_mail_to(get_post("mail_to")); //Getting variable [$post->mail_to] sended by form [export_imap.php]
	$array_list_column[get_post("mail_to")] = "mail_to";
    }

if(get_post("mail_cc", "post", $cmr->session["pre_match"])){
    $post->set_mail_cc(get_post("mail_cc")); //Getting variable [$post->mail_cc] sended by form [export_imap.php]
	$array_list_column[get_post("mail_cc")] = "mail_cc";
    }

if(get_post("mail_bcc", "post", $cmr->session["pre_match"])){
    $post->set_mail_bcc(get_post("mail_bcc")); //Getting variable [$post->mail_bcc] sended by form [export_imap.php]
	$array_list_column[get_post("mail_bcc")] = "mail_bcc";
    }

if(get_post("attach", "post", $cmr->session["pre_match"])){
    $post->set_attach(get_post("attach")); //Getting variable [$post->attach] sended by form [export_imap.php]
	$array_list_column[get_post("attach")] = "attach";
    }

if(get_post("text", "post", $cmr->session["pre_match"])){
    $post->set_text(get_post("text")); //Getting variable [$post->text] sended by form [export_imap.php]
	$array_list_column[get_post("text")] = "text";
    }

if(get_post("my_master", "post", $cmr->session["pre_match"])){
    $post->set_my_master(get_post("my_master")); //Getting variable [$post->my_master] sended by form [export_imap.php]
	$array_list_column[get_post("my_master")] = "my_master";
    }

if(get_post("allow_type", "post", $cmr->session["pre_match"])){
    $post->set_allow_type(get_post("allow_type")); //Getting variable [$post->allow_type] sended by form [export_imap.php]
	$array_list_column[get_post("allow_type")] = "allow_type";
    }

if(get_post("allow_imap", "post", $cmr->session["pre_match"])){
    $post->set_allow_imap(get_post("allow_imap")); //Getting variable [$post->allow_imap] sended by form [export_imap.php]
	$array_list_column[get_post("allow_imap")] = "allow_imap";
    }

if(get_post("allow_groups", "post", $cmr->session["pre_match"])){
    $post->set_allow_groups(get_post("allow_groups")); //Getting variable [$post->allow_groups] sended by form [export_imap.php]
	$array_list_column[get_post("allow_groups")] = "allow_groups";
    }

if(get_post("comment", "post", $cmr->session["pre_match"])){
    $post->set_comment(get_post("comment")); //Getting variable [$post->comment] sended by form [export_imap.php]
	$array_list_column[get_post("comment")] = "comment";
    }

if(get_post("date_time", "post", $cmr->session["pre_match"])){
    $post->set_date_time(get_post("date_time")); //Getting variable [$post->date_time] sended by form [export_imap.php]
	$array_list_column[get_post("date_time")] = "date_time";
    }

// -----------------------------------------------------


// -----------------------------------------------------
asort($array_list_column);
$list_column = implode($array_list_column, ", ");
// -----------------------------------------------------


// -----------------------------------------------------
switch($export_type){
	case "xml":
	$model=cmr_look_file("export.xml", $cmr->get_path("index") . "export_model/xml/, " . $cmr->get_path("model") . "model/xml/");
	break;

	case "tex":
	$model=cmr_look_file("export.tex", $cmr->get_path("index") . "export_model/tex/, " . $cmr->get_path("model") . "model/tex/");
	break;

	case "html":
	$model=cmr_look_file("export.html", $cmr->get_path("index") . "export_model/html/, " . $cmr->get_path("model") . "model/html/");
	break;

	case "word":
	case "doc":
	$model=cmr_look_file("export.doc", $cmr->get_path("index") . "export_model/doc/, " . $cmr->get_path("model") . "model/doc/");
	break;

	case "pdf":
	$model=cmr_look_file("export.pdf", $cmr->get_path("index") . "export_model/pdf/, " . $cmr->get_path("model") . "model/pdf/");
	break;

	case "xls":
	$model=cmr_look_file("export.xls", $cmr->get_path("index") . "export_model/xls/, " . $cmr->get_path("model") . "model/xls/");
	break;

	case "text":
	case "txt":
	$model=cmr_look_file("export.txt", $cmr->get_path("index") . "export_model/txt/, " . $cmr->get_path("model") . "model/txt/");
	break;

	case "cvs":
	$model=cmr_look_file("export.cvs", $cmr->get_path("index") . "export_model/cvs/, " . $cmr->get_path("model") . "model/cvs/");
	break;

	case "sql":
	$model=cmr_look_file("export.sql", $cmr->get_path("index") . "export_model/sql/, " . $cmr->get_path("model") . "model/sql/");
// -----------------------------------------------------
//  $cmr->query[0] = "select *  " . $cmr->get_conf("cmr_table_prefix") . "ticket ;";
//  $cmr->query[0]  = $post->query_export();
// -----------------------------------------------------
	break;

	default:
		$cmr->query[0]  = "SELECT * INTO OUTFILE '" . cmr_escape($into_outfile) . "'";
		$cmr->query[0] .= "FIELDS TERMINATED BY '" . cmr_escape($fields_terminated_by) . "' OPTIONALLY ENCLOSED BY '" . $optionally_enclosed_by . "'";
		$cmr->query[0] .= "LINES TERMINATED BY '" . cmr_escape($lines_terminated_by) . "'";
		$cmr->query[0] .= "FROM " . $cmr->get_conf("cmr_table_prefix") . "imap ;";
	break;

}
// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower(get_post("call_log_group")) . "/attach/";
// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
// -----------------------------------------------------
switch($export_type){
	case "xml":
	case "html":
	case "word":
	case "doc":
	case "tex":
	case "pdf":
	case "sql":
	case "xls":
	case "text":
	case "txt":
	case "cvs":
	$export_data = generate(file_get_contents($model), $cmr->get_conf("db_name"), "export_" . "imap", "imap", $cmr->get_conf("cmr_table_prefix"), $list_column, $export_where,  $export_limit);
	break;
	default:
	// ------------
    $cmr->db["result"][0] = $cmr->db_connection->query($cmr->query[0]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->error); // or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	$export_data = file_get_contents($into_outfile);
	// ------------
	break;

}
// 	print_r($export_data);
// -----------------------------------------------------
	$tmpfname = tempnam ($cmr->post_files["attachment_location"], "import_upload_" . date(Y_m_d_h_i_s)) . ".$export_type";
	if($fich = fopen($tmpfname, "w")){
		fputs($fich, $export_data);
		fclose($fich);
		export($cmr->config, "", $export_type, $tmpfname, "1");
	}else{
		export($cmr->config, $export_data, $export_type, $tmpfname, "");
	}
	print("<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($tmpfname) . "</h2> - " . $cmr->translate(" to download the result") . "</p>");
// -----------------------------------------------------
//  $array_files_dirs_to_zip=cmr_getdir_all($cmr->config, array($tmpfname), "");
// 	$zip_data=cmr_zipfiles(array($tmpfname), dirname($tmpfname), "UTF-8");
// 	$tmpfname4 = tempnam ($cmr->post_files["attachment_location"], "import_upload_" . date(Y_m_d_h_i_s)) . ".zip";
// 	$fich = fopen($tmpfname4, "w");
// 	fputs($fich, $zip_data);
// 	fclose($fich);
// 	export($cmr->config, "", $export_type, $tmpfname4, "1");
// -----------------------------------------------------


/**
*
*Creating the appropriate SQL string for  export_imap
*
**/

/**
*
*Creating the appropriate Message to be send to the administrator
*
**/

/**
*
*Creating the appropriate notification Message to be send to the administrator group
*
**/
$templates_notify=cmr_look_file("notify_export_imap.xml", $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/, ". $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/auto/, ". $cmr->get_path("notify")."templates/notify/auto/");
$cmr->notify = $cmr->load_notify($templates_notify);
if(($cmr->get_conf("log_to_page_export_imap"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_export_imap"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_imap_export_imap"))) $cmr->imap = $cmr->notify["to_imap"];
if(($cmr->get_conf("log_to_db_export_imap")));
// if(($cmr->get_conf("log_to_sms_export_imap")));
// if(($cmr->get_conf("log_to_flux_export_imap")));
// if(($cmr->get_conf("log_to_rss_export_imap")));
// if(($cmr->get_conf("log_to_other_export_imap")));


/**
*
*Select next module to be run
*
**/
// $cmr->page["middle1"] = "run_result.php";

// -----------------------------------------------------
// $post->close();
// -----------------------------------------------------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . $cmr->get_session("id") . "' ,'export'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
