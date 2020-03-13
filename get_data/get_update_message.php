<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        get_update_message.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 **************************************************************************/ 
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 

 


get_update_message.php,Ver 3.0  2011-Nov-Wed 22:18:54  
*/





/**
* Information about
*$cmr->query[0] Is used for keeping
*the query string you will be run in the module run_result.php
*
*$cmr->output[0] Is used for keeping
*the string value you will be see after running run_result.php
*
*$cmr->email["subject"] Is used for keeping
*the title off the message you will be send after running run_result.php
*
*$cmr->email["message"] Is used for keeping
*the text value off the message you will be send after running run_result.php
*/

 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 /*$need_type= $cmr->get_conf("cmr_guest_type");*/ 
 include_once($cmr->get_path("index") . "control.php");    //to control access in the module
 /*cmr->session["pre_match"].="";*/  
 //!!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
 //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "message" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_message" . $cmr->get_ext("conf"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "class_message.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// -----------------------------------------------------
$post = new message_class($cmr->config, $cmr->user);
// -----------------------------------------------------
$post->id_message = html_control(control_magic_quote(get_post('id_message'), 254));

// -----------------------------------------------------
$post->get_form_datas("post", $cmr->get_session("pre_match"));//Getting variables sended by form [search_message.php]
// -----------------------------------------------------
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$post->sender = $cmr->get_user("auth_email");
$post->intervale = get_post("intervale"); //Getting variable [$post->intervale] sended by form [message]
$intervale_type = get_post("intervale_type"); //Getting variable [$intervale_type] sended by form [message]
$action = get_post("action"); //Getting variable [$action] sended by form [message]
$id_message = get_post("id_message"); //Getting variable [$model_id] sended by form [message]
$model_id = get_post("model_id"); //Getting variable [$model_id] sended by form [message]
$alt_text = get_post("alt_text"); //Getting variable [$intervale_type] sended by form [message]

$id_message=html_control(control_magic_quote(get_post('id_message'),254));
if(get_post('id')){
$id= get_post('id');//Getting variable [$id] sended by form [update_message.php]
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(get_post("text")){
    @ $post->text = get_post("text");
}else{
    @ $post->text = get_post("alt_text");
}

$post->intervale = $post->intervale . " " . $intervale_type;
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if(!empty($post->sender)){
	$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "email", $post->sender);
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . strtolower($user_uid) . "/attach/";
	}else{
	$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower($cmr->get_user("auth_group")) . "/attach/";
	}
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
	if(!empty($cmr->post_files["attachment"])) $post->attach = $cmr->post_files["attachment"];
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	$cmr_hostname = $cmr->get_conf("db_host");
	$cmr_database = $cmr->get_conf("db_name");
	$cmr_username = $cmr->get_conf("db_user");
	$cmr_password = $cmr->get_conf("db_pw");
	$cmr_user = $cmr->get_user("auth_email");
	$cmr_group = $cmr->get_user("auth_group");
	$cmr_prefix = $cmr->get_conf("cmr_table_prefix");
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(($action != "new_model") && ($action != "update_model")){
    $post->title = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->title);


    $post->comment = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->comment);
    $post->text = preg_replace("/(\{\{)([^}{]*)(\}\})/e", "run_code('{{\\2}}', 0, '$cmr_hostname', '$cmr_username', '$cmr_password', '$cmr_database', '$cmr_prefix', '$cmr_user', '$cmr_group')", $post->text);
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $post->mail_to = string_unique($post->mail_to, "[,;:]");
    $post->mail_cc = string_unique($post->mail_cc, "[,;:]");
    $post->mail_bcc = string_unique($post->mail_bcc, "[,;:]");
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $post->mail_to = cmr_search_replace("^[,][ ]", "", $post->mail_to); //--rimossione vigola all'inizio--
    $post->mail_cc = cmr_search_replace(",, ", ", ", $post->mail_cc); //--rimossione vigole doppie--
    $post->mail_cc = cmr_search_replace("^[,][ ]", "", $post->mail_cc); //--rimossione vigola all'inizio--
    $post->mail_bcc = cmr_search_replace("^[,][ ]", "", $post->mail_bcc); //--rimossione vigola all'inizio--
    // -- uload file in load_form_data.php --
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    $post->text = stripslashes($post->text); //remove slashes from text
    $post->title = stripslashes($post->title); //remove slashes from title

    $post->comment = stripslashes($post->comment); //remove slashes from comment

//     $model_title = stripslashes($model_title); //remove slashes from model_title
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    if($action != "only_db"){
        $cmr->email["recipient"] = "";
//         $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
        $cmr->email["subject"] = $post->title;
        $cmr->email["message"] = $post->text . "  \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        /* intestazioni addizionali */
        $cmr->email["headers_severity"] = $post->priority;
        $cmr->email["headers_to"] = $post->mail_to . "\r\n";

        if(($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type"))){
            $cmr->email["headers_from"] = $cmr->get_user("auth_user_name") . "   $post->sender \r\n";
        }else{
            $cmr->email["headers_from"] = $post->sender . "\r\n";
        }

        $cmr->email["headers_cc"] = $post->mail_cc . "\r\n";
        $cmr->email["headers_bcc"] = $post->mail_bcc . "\r\n";
        $cmr->output[0] = "<b> " . $cmr->translate(" Email message sended is  ")  . "  " . $cmr->translate("created with success") . " </b><br /><br />" . $post->title . "<br /><pre>" . wordwrap($post->text, 80) . "</pre> <br />";
    } 
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@


}


// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// " . cmr_escape($cmr->post_var["name"]) . "
    $cmr->post_var["sender"] = $post->sender;
    $cmr->post_var["title"] = $post->title;
    $cmr->post_var["text"] = $post->text;
    $cmr->post_var["comment"] = $post->comment;
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(($cmr->get_conf("message_save_email")) && ($cmr->conf["message_save_email"] .="none")){
$cmr->query[2] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "email (
id, encoding, lang, header, mail_title, mail_from, mail_to, mail_cc, mail_bcc, attach, text, my_master, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '', '" . cmr_escape($post->type) . "', '', '" . cmr_escape($post->title) . "', '" . cmr_escape($post->sender) . "', '" . cmr_escape($post->mail_to) . "', '" . cmr_escape($post->mail_cc) . "', '" . cmr_escape($post->mail_bcc) . "', '" . $cmr->post_files["attachment"] . "', '" . cmr_escape($post->text) . "', '" . cmr_escape($post->my_master) . "', '" . cmr_escape($post->allow_type) . "', '" . cmr_escape($post->allow_email) . "', '" . cmr_escape($post->allow_groups) . "', '" . cmr_escape($post->comment) . "',  NOW() 
)"; 
}
// ----------------------------
// ----------------------------
$post->attach= get_post("attach1");

if(($cmr->get_conf("message_save_attachment")) && strlen($post->attach) > 6){
$cmr->query[3] = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "download (
id, url, path, file_name, file_type, file_size, state, allow_type, allow_email, allow_groups, comment, date_time
) VALUES (
'', '" . cmr_escape($post->id) . "', '" . cmr_escape($post->id) . "," . $cmr->post_files["attachment"] . "', '" . $cmr->post_files["attachment"] . "', '?', '?', 'active', '" . cmr_escape($post->allow_type) . "', '" . cmr_escape($post->allow_email) . "', '" . cmr_escape($post->allow_groups) . "', '" . cmr_escape($post->comment) . "',  NOW() 
)";
 }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

 if($action != "only_email"){
    $cmr->output[0] = "<b>message  " . $cmr->translate("Created with Success") . " </b><br /><br />" . $post->title . "<br /><pre>" . wordwrap($post->text, 80) . "</pre> <br />";

    if(($action != "new_model") && ($action != "update_model")){
        // -------------------
        $cmr->query[0] = "update " . $cmr->get_conf("cmr_table_prefix") . "message set state = 'reply'   where id ='" . cmr_escape($post->id) . "';";
        // -------------------
        // *************** important **********
        if($post->my_master == "cmr_model") $post->my_master = "";
        // ************************************
    }else{
        // *************** important **********
        $post->my_master = "cmr_model";
        // ************************************
        if($action == "new_model") $cmr->email["subject"] = $cmr->translate("New model of message")  . ":[" . $post->title . "]";
        if($action == "update_model") $cmr->email["subject"] = $cmr->translate("Updated model of message")  . ":[" . $post->title . "]";
        $cmr->email["message"] = $cmr->translate("The model is")  . ": \n";
        $cmr->email["message"] = $cmr->translate("Mail sended to")  . ": $post->mail_to \n";
        $cmr->email["message"] .= $cmr->translate("Text email")  . ": \n $post->text \n";
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
		$cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";
		/* intestazioni addizionali */
		$cmr->email["headers_severity"] = 3;
		$cmr->email["headers_to"] = "" ;. $cmr->config["cmr_bcc_name"] . " <" . $cmr->config["cmr_bcc_email"] . ">\r\n";
		$cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		$cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
		$cmr->email["headers_bcc"] = "";
    }
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // Creating the appropriate SQL string for new_message
$cmr->query[0]  = $post->query_update($id_message);
    // Creating the appropriate Message to be send to the administrator
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if($action == "new_model"){
    // -------------------
    $cmr->query[0] = $cmr->query[1];
    $cmr->query[1] = "";
    // -------------------
    // -------------------
} elseif($action == "update_model"){
    // -------------------
    $cmr->query[1] = "";
    $cmr->query[0]  = $post->query_update($id_message);
}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
    
    
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "message', '" . $post->id . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    
 
/*
Creating the appropriate SQL string for  update in_message
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "message', '" . cmr_escape($post->id_message) . "' ,'update'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



 
/*
Creating the appropriate Message to be view for confirmation 
*/
$cmr->output[0] = "<p><b>message  ".$cmr->translate("update_success") . "</b>";
$cmr->output[0] .= str_replace(":", "</b>:", str_replace("\n", "<br /><b>", $post->print_value()));
$cmr->output[0] .= $cmr->translate("thanks")."  --<br /></p>";
 
 
/*
Creating the appropriate notification Message to be send to the administrator group
*/
// $templates_notify=$cmr->good_file("notify",  "update_message");
// $cmr->notify=$cmr->load_notify($templates_notify, "update_message");

// $cmr->output[0] = $cmr->notify["to_page"];
// $cmr->output[1] = $cmr->notify["to_log"];
// $cmr->email = $cmr->notify["to_email"];


 
 
 
/*
Select next module to be run
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>