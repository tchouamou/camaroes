<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_imap.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_new_imap.php,Ver 3.0  2011 05:49:23
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
// case "@_form_@"://When Working in data send by  form [new_imap.php]


// -----------------------------------------------------

if(get_post('id')){
    $id=(get_post('id', 'post', $cmr->session['pre_match'])); //Getting variable [$post->id] sended by form [new_imap.php]
}

if(get_post('encoding')){
    $encoding=(get_post('encoding', 'post', $cmr->session['pre_match'])); //Getting variable [$post->encoding] sended by form [new_imap.php]
}

if(get_post('lang')){
    $lang=(get_post('lang', 'post', $cmr->session['pre_match'])); //Getting variable [$post->lang] sended by form [new_imap.php]
}

if(get_post('header')){
    $mail_pop_header=(get_post('header', 'post', $cmr->session['pre_match'])); //Getting variable [$post->header] sended by form [new_imap.php]
}

if(get_post('mail_title')){
    $mail_pop_title=(get_post('mail_title', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_title] sended by form [new_imap.php]
}

if(get_post('mail_from')){
    $mail_pop_from=(get_post('mail_from', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_from] sended by form [new_imap.php]
}

if(get_post('mail_to')){
    $mail_pop_to=(get_post('mail_to', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_to] sended by form [new_imap.php]
}

if(get_post('mail_cc')){
    $mail_pop_cc=(get_post('mail_cc', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_cc] sended by form [new_imap.php]
}

if(get_post('mail_bcc')){
    $mail_pop_bcc=(get_post('mail_bcc', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_bcc] sended by form [new_imap.php]
}

if(get_post('attach')){
    $attach=(get_post('attach', 'post', $cmr->session['pre_match'])); //Getting variable [$post->attach] sended by form [new_imap.php]
}

if(get_post('text')){
    $mail_pop_text=(get_post('text', 'post', $cmr->session['pre_match'])); //Getting variable [$post->text] sended by form [new_imap.php]
}



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(get_post("mail_text")){
$mail_pop_text = get_post("mail_text");
}else{
@ $mail_pop_text = get_post("alt_text");
}
// *************************
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . $cmr->get_user("auth_user") . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// *************************
$mail_pop_to = cmr_search_replace("^[,][ ]", "", $mail_pop_to); //--rimossione vigola all'inizio--
$mail_pop_cc = cmr_search_replace(",, ", ", ", $mail_pop_cc); //--rimossione vigole doppie--
$mail_pop_cc = cmr_search_replace("^[,][ ]", "", $mail_pop_cc); //--rimossione vigola all'inizio--
$mail_pop_bcc = cmr_search_replace("^[,][ ]", "", $mail_pop_bcc); //--rimossione vigola all'inizio--

$mail_pop_text = stripslashes($mail_pop_text); //remove slashes from email_text
$mail_pop_title = stripslashes($mail_pop_title); //remove slashes from email_title
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




$envelope["from"]= $mail_pop_from;
$envelope["to"]  = $mail_pop_to;
$envelope["cc"]  = $mail_pop_cc;
// $envelope["bcc"]  = $mail_pop_bcc;

$mime_part1["type"] = TYPEMULTIPART;
$mime_part1["subtype"] = "mixed";

// $filename = $cmr->post_files["attachment_location"];
// if(file_exists($filename)){
// $fp = fopen($filename, "r");
// $contents = fread($fp, filesize($filename));
// fclose($fp);

//snip
if(count($_FILES) > 0){
    $mime_part1["type"] = TYPEMULTIPART;
    $mime_part1["subtype"] = "mixed";
}
$mime_body[] = $mime_part1;
//snip
$uploaddir = ini_get("upload_tmp_dir"); //Get tmp upload dir from PHP.ini
foreach ($_FILES as $fieldName => $file){
    for ($i=0;$i < count($file['tmp_name']);$i++){
        if(is_uploaded_file($file['tmp_name'][$i])){
            $file_handle = fopen($file["tmp_name"][$i], "rb");
            $file_name = $file["name"][$i];
            $file_size = filesize($file["tmp_name"][$i]);
           
            $mime_part2["type"] = TYPEAPPLICATION;
            $mime_part2["encoding"] = ENCBASE64;
            $mime_part2["subtype"] = "octet-stream";
            $mime_part2["description"] = $file_name;
            $mime_part2['disposition.type'] = 'attachment';
            $mime_part2['disposition'] = array ('filename' => $file_name);
            $mime_part2['dparameters.filename'] = $file_name;
            $mime_part2['parameters.name'] = $file_name;
            $mime_part2["contents.data"] = base64_encode(fread($file_handle,$file_size));
           
            $mime_body[] = $mime_part2;
            unlink($file["tmp_name"][$i]);
        }
    }
}
//snip




// $mime_part2["type"] = TYPEAPPLICATION;
// $mime_part2["encoding"] = ENCBINARY;
// $mime_part2["subtype"] = "octet-stream";
// $mime_part2["description"] = basename($filename);
// $mime_part2["contents.data"] = $contents;
// }

$mime_part3["type"] = TYPETEXT;
$mime_part3["subtype"] = "plain";
$mime_part3["description"] = "Body";
$mime_part3["contents.data"] = $mail_pop_text . "\n\n\n\t";

$mime_body[] = $mime_part3;

/*
Creating the appropriate SQL string for  new_in imap
*/

// echo nl2br(mail_mail_compose($envelope, $mime_body));
if(function_exists("mail_mail")){
	$temp_env=unserialize(serialize($envelope));
	$sendmail = mail_mail_compose($temp_env, $mime_body);
	mail_mail($mail_pop_to, $mail_pop_title, $sendmail, $mail_pop_header, $mail_pop_cc, $mail_pop_bcc, $mail_pop_from);
}else{
	$temp_env=unserialize(serialize($envelope));
	$sendmail = mail_mail_compose($temp_env, $mime_body);
	mail($mail_pop_to, $mail_pop_title, $sendmail, $mail_pop_header);
}
/*
Creating the appropriate notification Message to be send to the administrator group
*/
$templates_notify=cmr_look_file("notify_delete_imap.xml", $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/, ". $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/auto/, ". $cmr->get_path("notify")."templates/notify/auto/");
$cmr->notify = $cmr->load_notify($templates_notify);
if(($cmr->get_conf("log_to_page_delete_imap"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_delete_imap"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_mail_delete_imap"))) $cmr->email = $cmr->notify["to_imap"];
if(($cmr->get_conf("log_to_db_delete_imap")));
// if(($cmr->get_conf("log_to_sms_delete_imap")));
// if(($cmr->get_conf("log_to_flux_delete_imap")));
// if(($cmr->get_conf("log_to_rss_delete_imap")));
// if(($cmr->get_conf("log_to_other_delete_imap")));


/*
Select next module to be run
*/
$cmr->page["layer"] = "3";

$cmr->page["left1"] = "modules/menu_imap.php";
$cmr->page["left2"] = "";
$cmr->page["middle1"] = "run_result.php";
$cmr->page["middle2"] = "modules/view_imap.php";
$cmr->page["middle3"] = "";

$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";

$cmr->output[0]="<i>".$cmr->translate("Email sended: <br />".$mail_pop_to. "<br /> " . $mail_pop_title ." Texte:")."<br />".$mail_pop_text."</i><br />";

$cmr->post_var["output0"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $mod->path;
include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// echo "<h1>" . $cmr->translate(" INBOX") . "</h1>\n";
// // $folders = mail_list($mbox, $mailbox, $cmr->get_conf("mail_list_folder"));
// $folders = mail_getmailboxes($mbox, $mailbox, $cmr->get_conf("mail_list_folder"));

// if(is_array($folders)){
// reset($folders);
// if($folders == false){
