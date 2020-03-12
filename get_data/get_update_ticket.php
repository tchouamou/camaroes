<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_update_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








get_update_ticket.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "update_ticket"://When Working in data send by form [Ticket]
// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_ticket" . $cmr->get_ext("conf"));
			
$cmr->action["module_name"] = "ticket.php";
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------            

// -----------------------------------------------------
$post = new ticket_class();

////$post->set_cmr_prefix($cmr->get_conf("cmr_table_prefix"));
////$post->set_cmr_email($cmr->get_user("auth_email"));
////$post->set_cmr_group($cmr->get_user("auth_group"));
////$post->set_cmr_type($cmr->get_user("auth_type"));
////$post->set_cmr_list_group($cmr->get_user("auth_list_group"));

////$post->set_cmr_config($cmr->config);
////$post->set_cmr_user($cmr->user);

// -----------------------------------------------------

// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [update_ticket.php]
// -----------------------------------------------------



$id_ticket = get_post("id_ticket"); //Getting variable [$id_ticket] sended by form [ticket]
$model_id = get_post("model_id"); //Getting variable [$model_id] sended by form [ticket]
$action = get_post("action"); //Getting variable [$action] sended by form [ticket]
// $intervale = get_post("intervale"); //Getting variable [$intervale] sended by form [ticket]
// $intervale_type = get_post("intervale_type"); //Getting variable [$intervale_type] sended by form [ticket]
$alt_text = get_post("alt_text"); //Getting variable [$intervale_type] sended by form [ticket]

// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id_ticket; // for update ticket
// -----------------------------------------------------
$post->work_by = $cmr->get_user("auth_email");
if(get_post("text")){
    @ $post->text = get_post("text");
}else{
    @ $post->text = get_post("alt_text");
}
// $intervale = $intervale . " " . $intervale_type;
// $post->sla = $intervale . " " . $intervale_type;

// *************************
// *************************
	if(!empty($post->call_log_user)){
	$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $post->call_log_user);
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($user_uid) . "/attach/";
	}
	
	if(!empty($post->call_log_group))
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower(get_post("call_log_group")) . "/attach/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
	if(!empty($cmr->post_files["attachment"])) $post->attach = $cmr->post_files["attachment"];
// *************************
// *************************




    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
    
    // -------inserimento in bcc del messaggio a assign_to-----
    if(!empty($post->assign_to)){
//     if(cmr_search("@", $post->assign_to)){
//     $post->mail_bcc.=", ".$post->assign_to;
//     }else{
//     $sql_q_assign_to = "SELECT user_email FROM ". $cmr->get_conf("cmr_table_prefix") ."user_groups,  ". $cmr->get_conf("cmr_table_prefix") ."groups  WHERE ";
//     $sql_q_assign_to .= "(". $cmr->get_conf("cmr_table_prefix") ."user_groups.group_name='" . cmr_escape($post->assign_to) . "') ";
//     $sql_q_assign_to .= "AND (". $cmr->get_conf("cmr_table_prefix") ."user_groups.group_name=". $cmr->get_conf("cmr_table_prefix") ."groups.name)";
//     $sql_q_assign_to .= "AND (". $cmr->get_conf("cmr_table_prefix") ."user_groups.state='enable')";
//     $sql_q_assign_to .= "AND (". $cmr->get_conf("cmr_table_prefix") ."groups.state='enable')";
//     $sql_q_assign_to .= "AND (". $cmr->get_conf("cmr_table_prefix") ."groups.type > '". $cmr->get_conf("cmr_user_type") ."')";
//     $sql_q_assign_to .= "AND (user_email NOT LIKE '%localhost')";
//     // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
//     $resulte_assign_to = &$cmr->db_connection->Execute($sql_q_assign_to) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//     // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
//     if($val_bcc = $resulte_assign_to->FetchRow()){
//     $post->mail_bcc.=", ".$val_bcc[0];
// 	}
//     }
    }
    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
    $post->mail_to = string_unique($post->mail_to, "[,;:]");
    $post->mail_cc = string_unique($post->mail_cc, "[,;:]");
    $post->mail_bcc = string_unique($post->mail_bcc, "[,;:]");
    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
    $post->mail_to = cmr_search_replace(",, ", ", ", $post->mail_to); //--rimossione vigole doppie--
    $post->mail_to = cmr_search_replace("^[,][ ]", "", $post->mail_to); //--rimossione vigola all'inizio--
    $post->mail_cc = cmr_search_replace(",, ", ", ", $post->mail_cc); //--rimossione vigole doppie--
    $post->mail_cc = cmr_search_replace("^[,][ ]", "", $post->mail_cc); //--rimossione vigola all'inizio--
    $post->mail_bcc = cmr_search_replace(",, ", ", ", $post->mail_bcc); //--rimossione vigole doppie--
    $post->mail_bcc = cmr_search_replace("^[,][ ]", "", $post->mail_bcc); //--rimossione vigola all'inizio--
    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§








// =============================================
$cmr_hostname = $cmr->get_conf("db_host");
$cmr_database = $cmr->get_conf("db_name");
$cmr_username = $cmr->get_conf("db_user");
$cmr_password = $cmr->get_conf("db_pw");
$cmr_user = $cmr->get_user("auth_email");
$cmr_group = $cmr->get_user("auth_group");
$cmr_prefix = $cmr->get_conf("cmr_table_prefix");
// =============================================



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


if(($action != "new_model") && ($action != "update_model")){
    $post->title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->title);

	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if(empty($post->mail_title)) $post->mail_title = "[{{ticket_number}}] {{ticket_title}}";
	if(empty($post->mail_text)) $post->mail_text = "\n-------------[{{date_time}}]-------------\n  {{ticket_text}} \n {{groups_email_sign}} \n";
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $post->mail_title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_title);
    $post->mail_title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_title);

    $post->comment = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->comment);
    $post->text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->text);
    $post->mail_text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_text);
    $post->mail_text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', '', '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->mail_text);

    if($post->mail_text == "") $post->mail_text = $post->text; // to do not send email empty ticket
    if($post->mail_title == "") $post->mail_title = $post->title; // to do not send email title empty
        
    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
    // -- uload file in load_form_data.php --
    // §§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§§
//     $post->text = stripslashes($post->text); //remove slashes from text
//     $post->title = stripslashes($post->title); //remove slashes from title

//     $post->mail_text = stripslashes($post->mail_text); //remove slashes from email_text
//     $post->mail_title = stripslashes($post->mail_title); //remove slashes from email_title
//     $post->comment = stripslashes($post->comment); //remove slashes from comment
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    if($action != "only_db"){
        $cmr->email["recipient"] = "";
//         $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
        $cmr->email["subject"] = cmr_unescape($post->mail_title);
        $cmr->email["message"] = cmr_unescape($post->mail_text) . " \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        /* intestazioni addizionali */
        $cmr->email["headers_severity"] = ($post->severity);
        $cmr->email["headers_to"] = ($post->mail_to) . "\r\n";
        $cmr->email["headers_from"] = ($post->mail_from) . "\r\n";
        $cmr->email["headers_cc"] = ($post->mail_cc) . "\r\n";
        $cmr->email["headers_bcc"] = ($post->mail_bcc) . "\r\n";
        
        $cmr->output[0] = "<b>Email Ticket  " . $cmr->translate("updated") . "  " . $cmr->translate(" Sended with success ")  . " </b><br /><br />" . (cmr_unescape($post->mail_title)) . "<br /><pre>" . wordwrap((cmr_unescape($post->text)), 80) . "</pre> <br />";
    }
    // @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
}


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//     $post->text = addslashes($post->text); //add slashes from text
//     $post->title = addslashes($post->title); //add slashes from title
//     $post->mail_title = addslashes($post->mail_title); //add slashes from email_title
//     $post->mail_text = addslashes($post->mail_text); //add slashes from email_text
// ----------------------------
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// " . cmr_escape($cmr->post_var["name"]) . "
    $cmr->post_var["work_by"] = $post->work_by;
    $cmr->post_var["title"] = $post->title;
    $cmr->post_var["text"] = $post->text;
    $cmr->post_var["mail_title"] = $post->mail_title;
    $cmr->post_var["mail_text"] = $post->mail_text;
    $cmr->post_var["comment"] = $post->comment;
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$post->id = $id_ticket;
if($action != "only_email")
if(($action == "new_model") || ($action == "update_model")){
	$post->mail_to = "" . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
	$post->mail_from = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
	$post->mail_cc = "" . $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
	$post->mail_bcc = "";
}
$cmr->query[2] = cmr_query_log($cmr->config, $post, "email");
$cmr->query[3] = cmr_query_log($cmr->config, $post, "escalation");
$cmr->query[4] = cmr_query_log($cmr->config, $post, "attachment");
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// $post->text = addslashes($post->text); //add slashes from text
// $post->title = addslashes($post->title); //add slashes from title
// $post->mail_title = addslashes($post->mail_title); //add slashes from email_title
// $post->mail_text = addslashes($post->mail_text); //add slashes from email_text
// // $model_title = addslashes($model_title); //add slashes from model_title
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if($action != "only_email"){
    $cmr->output[0] = "<b>Ticket  " . $cmr->translate("updated") . "  " . $cmr->translate(" With success ")  . " </b><br /><br />" . wordwrap((cmr_unescape($post->mail_title))) . "<br /><pre>" . wordwrap(cmr_unescape($post->text), 80) . "</pre> <br />";

    if(($action != "new_model") && ($action != "update_model")){
        $cmr->query[0] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "ticket SET    state_now = 'updated' WHERE number ='" . cmr_escape($post->number) . "';";
        // *************** important **********
        if($post->my_master == "cmr_model") $post->my_master = "";
        // ************************************
    }else{
        // *************** important **********
        $post->my_master = "cmr_model";
        // ************************************
        if($action == "new_model") $cmr->email["subject"] = $cmr->translate("New model of Ticket")  . ":[" . cmr_unescape($post->title) . "]";
        if($action == "update_model") $cmr->email["subject"] = $cmr->translate("Updated model of Ticket")  . ":[" . cmr_unescape($post->title) . "]";
        $cmr->email["message"] = $cmr->translate("The model is")  . ": \n";
        $cmr->email["message"] = $cmr->translate("Model by")  . ": " . $cmr->get_user("auth_email") . " \n";
        $cmr->email["message"] .= $cmr->translate("Text email")  . ": \n " . cmr_unescape($post->mail_text) . " \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
		$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
		/* intestazioni addizionali */
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" . $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "<" . $cmr->get_user("auth_email") . ">\r\n";
		$cmr->email["headers_bcc"] = "";
    }
        // ************************************
//     if(($cmr->get_conf("cmr_save_email")) && (($cmr->conf["cmr_save_email"] =="extern") || ($cmr->conf["cmr_save_email"] =="none"))) $post->mail_text="";
        // ************************************
/*
Creating the appropriate SQL string for  new_in ticket
*/

$post->state_now = "update";
$post->state = "update";
$cmr->query[1]  = $post->query_insert();

};
if($action == "new_model"){
    // -------------------
    $cmr->query[0] = $cmr->query[1];
    $cmr->query[1] = "";
    // -------------------
    // -------------------
} elseif($action == "update_model"){
    // -------------------
    $cmr->query[1] = "";
    $cmr->query[0]  = $post->query_update($model_id);
    // -------------------
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $id_ticket . "' ,'update'");
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $id_ticket . "' ,'readed'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>