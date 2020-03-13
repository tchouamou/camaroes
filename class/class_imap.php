<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_imap.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









class_imap.php,  2011-Oct
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
/*$need_type= $this->config["cmr_guest_type"];*/
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!


if(!(class_exists("class_imap")))
if(function_exists("imap_open")){
class class_imap
{
var $imap_server = "localhost";
var $imap_port = "143";
var $imap_user_name = "root";
var $imap_password = "";
var $imap_default_folder = "INBOX";

var $pop3_server = "localhost";
var $pop3_port = "110";
var $pop3_user_name = "root";
var $pop3_password = "";
var $pop3_default_folder = "INBOX";

var $nntp_server = "localhost";
var $nntp_port = "119";
var $nntp_user_name = "root";
var $nntp_password = "";
// var $nntp_user_name="";
// var $nntp_password="";
var $nntp_group = "comp.test";
var $nntp_default_folder = "";

var $imap_ssl_server = "localhost";
var $imap_ssl_port = "995";
var $imap_ssl_user_name = "root";
var $imap_ssl_password = "";
var $imap_ssl_default_folder = "INBOX";

var $imap_ssl_cert_server = "localhost";
var $imap_ssl_cert_port = "995";
var $imap_ssl_cert_user_name = "root";
var $imap_ssl_cert_password = "";
// var $imap_ssl_cert_file = "/pop3/ssl/novalidate-cert";
var $imap_ssl_cert_default_folder = "INBOX";

var $imap_certificate = "";

var $imap_list_folder = "*";

var $imap_service = "imap";//imap,pop3,imap_ssl,imap_ssl_cert,nntp


var $mailbox = "{localhost:143/imap/notls}";
var $imap_checks;
var $email = "";









var $mbox = "";
var $imap_headers_list = "";
var $imap_folder_list = "";


var $imap_current_status = "";
var $imap_current_error = "";
var $current_alerts = "";
var $info = "";

var $imap_current_body = "";

var $imap_current_uid = 0;
var $imap_current_num = 1;

//00000000000000000000000000 
function __construct() // --constructor--
{
   return $this->class_imap;
}
//00000000000000000000000000 

function class_imap(){
	return  $this->mbox;
	}
	
	
function get_mailbox($mailbox=""){
	switch ($this->imap_service){
	    
	    case "imap":
			// empty($mailbox) ? $this->mailbox = "{" . $this->imap_server . ":" . $this->imap_port . "/imap/tls/novalidate-cert}" . $this->imap_default_folder : $this->mailbox=$mailbox;
	        // $this->mailbox="{".$this->imap_server"].":".$this->imap_port"]."}";
	        // $this->mailbox="{".$this->pop3_server.":".$this->pop3_port."/pop3}INBOX";
	        empty($mailbox) ? $this->mailbox = "{" . $this->imap_server . ":" . $this->imap_port . "/imap/notls}" . $this->imap_default_folder : $this->mailbox=$mailbox;
	        break;
	    case "pop3":
	        empty($mailbox) ? $this->mailbox = "{" . $this->pop3_server . ":" . $this->pop3_port . "/pop3/notls}" . $this->pop3_default_folder : $this->mailbox=$mailbox;
	        break;
	    case "imap_ssl":
	        empty($mailbox) ? $this->mailbox = "{" . $this->imap_ssl_server . ":" . $this->imap_ssl_port . "/imap/ssl}" . $this->imap_ssl_default_folder : $this->mailbox=$mailbox;
	        break;
	    case "imap_ssl_cert":
	        empty($mailbox) ? $this->mailbox = "{" . $this->imap_ssl_cert_server . ":" . $this->imap_ssl_cert_port . "/ssl/novalidate-cert}" . $this->imap_ssl_cert_default_folder : $this->mailbox=$mailbox;
	        break;
	    case "nntp":
	        empty($mailbox) ? $this->mailbox = "{" . $this->nntp_server . ":" . $this->nntp_port . "/nntp}" . $this->nntp_default_folder : $this->mailbox=$mailbox;
	        break;
	    default :
	    	empty($mailbox) ? $this->mailbox = "{" . $this->imap_server . ":" . $this->imap_port . "/imap/notls}" . $this->imap_default_folder : $this->mailbox=$mailbox;
	    break; // imap
	}
	return  $this->mailbox;
	}
	
	
function connect($mailbox=""){
	
	$this->mailbox = $this->get_mailbox($mailbox);
	
	switch ($this->imap_service){
	    case "imap" : $this->mbox = imap_open($this->mailbox, $this->imap_user_name, $this->imap_password) or print("can't connect: " . imap_last_error());break;
	    case "pop3" : $this->mbox = imap_open($this->mailbox, $this->pop3_user_name, $this->pop3_password) or print("can't connect: " . imap_last_error());break;
	    case "imap_ssl" : $this->mbox = imap_open($this->mailbox, $this->imap_ssl_user_name, $this->imap_ssl_password) or print("can't connect: " . imap_last_error());break;
	    case "imap_ssl_cert" : $this->mbox = imap_open($this->mailbox, $this->imap_ssl_cert_user_name, $this->imap_ssl_cert_password) or print("can't connect: " . imap_last_error());break;
	    case "nntp" : $this->mbox = imap_open($this->mailbox, $this->nntp_user_name, $this->nntp_password) or print("can't connect: " . imap_last_error());break;
	    default : $this->mbox = imap_open($this->mailbox, $this->imap_user_name, $this->imap_password) or print("can't connect: " . imap_last_error());break;// imap
	}
	

// 	$this->info = $this->get_mailboxmsginfo();
// 	$this->current_status = $this->get_status();
// 	$this->current_alerts = $this->get_alerts();
// 	$this->current_error = $this->get_last_error();
// 	$this->imap_checks = $this->get_check();	
// 	$this->get_check();
// 	$this->get_num_recent();
// 	
	
// 	$this->imap_headers_list = $this->get_headerinfos();
// 	$this->imap_current_uid = $this->get_uid(0);
// 	$this->imap_current_message = $this->get_message(0);
// 	$this->imap_current_header = $this->get_headerinfo(0)
// 	$this->imap_current_body = $this->get_body(0);

	
	return  $this->mbox;

}





function get_headerinfos(){
	if(!empty($this->mbox)){
	$this->imap_headers_list = imap_headers($this->mbox);
	return  $this->imap_headers_list;
	}else{
	return 	array();
	}
	}


function get_headerinfo($num=0, $len_from=1000, $len_subject=1000){
	if(empty($num)) $num = $this->imap_current_num;
	if(!empty($this->mbox)){
	$this->imap_current_header = imap_headerinfo($this->mbox, $num, $len_from, $len_subject);
	return  $this->imap_current_header;
	}else{
	return 	array();
	}
	}


function get_fetchheader($uid = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
	return imap_fetchheader($this->mbox, $uid, FT_UID);
	}else{
	return 	array();
	}
	}


function get_fetch_overview($interval="1:20"){
	if(empty($interval)) $interval = $this->imap_current_num . ":" . ($this->imap_current_num + 20);
	if(!empty($this->mbox)){
	return imap_fetch_overview($this->mbox, $interval);
	}else{
	return 	array();
	}
	}

function get_sort($orderbox="SORTARRIVAL", $searchbox="ALL", $reverse="0"){
	if(!empty($this->mbox)){
	return 	imap_sort($this->mbox  , constant($orderbox), $reverse, SE_NOPREFETCH | SE_UID, $searchbox);
	}else{
	return 	array();
	}
	}



	
function get_body($uid = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
	$this->imap_current_body = imap_body($this->mbox, $uid, FT_UID);
	return  $this->imap_current_body;
	}else{
	return 	"";
	}
	}

function get_fetchstructure($uid = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
	$this->imap_current_message = imap_fetchstructure($this->mbox, $uid, FT_UID);
	return  $this->imap_current_message;
	}else{
	return 	array();
	}
	}

function get_bodystruct($num=1, $part_number = 0){
	
	if(empty($num)) $num = $this->imap_current_num;
	if(!empty($this->mbox)){
	$this->imap_current_body = imap_bodystruct($this->mbox, $num, $part_number);
	return  $this->imap_current_body;
	}else{
	return 	array();
	}
	}
	
function get_fetchbody($uid = 1, $part_number = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
	$this->imap_current_body = imap_fetchbody($this->mbox, $uid, $part_number, FT_UID);
	return  $this->imap_current_body;
	}else{
	return  $this->imap_current_body;
	}
	}


function get_download_link_default($uid = 1, $part_number = 1){
	$to_return = "";
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
		
	    if($this->imap_current_body->ifsubtype) $to_return .= "<br />" . cmr_translate('subtype') . ": " . $this->imap_current_body->subtype;
	    if($this->imap_current_body->ifdescription) $to_return .= "<br />" . cmr_translate('description') . ": " . $this->imap_current_body->description;
	    if($this->imap_current_body->ifid)  $to_return .= "<br />" . cmr_translate('id') . ": " . $this->imap_current_body->id;
	    if($this->imap_current_body->ifdisposition)  $to_return .= "<br />" . cmr_translate('disposition') . ": " . $this->imap_current_body->disposition;
		
	    
	    cmr_set_post_var("current_file", "email_attachment" . $part_number);
		cmr_set_post_var("current_file", $this->imap_current_body->parameters[0]->value);
		cmr_set_post_var("current_file", $this->get_fetchbody($uid, $part_number));
	    
		
		$to_return .= "<br />" . "<a class=\"cmr_link\" href=\"index.php?conf=com_attachment&current_file=" . cmr_get_post_var("current_file") . "\" >" . $this->imap_current_body->parameters[0]->value . "</a>";
	
	
	return  $to_return;
	
	}else{
	return  $to_return;
	}
	}




function get_uid($num=1){
	if(empty($num)) $num = $this->imap_current_num;
	if(!empty($this->mbox)){
	$this->imap_current_uid = imap_uid($this->mbox, $num);
	if(empty($this->imap_current_uid)) $this->imap_current_uid=1;
	return  $this->imap_current_uid;
	}else{
	return  $this->imap_current_uid;
	}
	}
	

function get_msgno($uid = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	if(!empty($this->mbox)){
	$this->imap_current_num = imap_msgno($this->mbox, $uid);
	if(empty($this->imap_current_num)) $this->imap_current_num=1;
	return  $this->imap_current_num;
	}else{
	return  $this->imap_current_num;
	}
	}
	

function get_all_uid($num=1){
	$this->imap_current_uid = get_uid($num);
	return  $this->imap_current_uid;
	}
	

function get_all_num($uid = 0){
	$this->imap_current_num = get_msgno($uid);
	return  $this->imap_current_num;
	}
	

function send_email(){
	if(function_exists("imap_mail")){
	return  imap_mail($this->email["headersto"], $this->email["subject"], $this->email["body"], $this->email["headerscc"], $this->email["headers"]);
	}else{
	return 	"";
	}
	}
	


function get_message($uid = 0){
	if(empty($uid)) $uid = $this->imap_current_uid;
	return  $this->get_fetchheader($uid) . "\n\n" . $this->get_body($uid);
	}



function get_check(){
	if(!empty($this->mbox)){
	$check = imap_check($this->mbox);
	return  $check->Nmsgs;
	}else{
	return  $check->Nmsgs;
	}
	}

function get_num_recent(){
	if(!empty($this->mbox)){
	return  imap_num_recent($this->mbox);
	}else{
	return 	"0";
	}
	}

	
function get_getmailboxes($folder=""){
	if(empty($folder)) $folder = $this->imap_list_folder;
	if(!empty($this->mbox)){
    $this->imap_folder_list = imap_getmailboxes($this->mbox, $this->mailbox, $folder);
	return  $this->imap_folder_list;
	}else{
	return 	array();
	}
	}

	
function get_status(){
	if(!empty($this->mbox)){
	$this->current_status = imap_status($this->mbox, $this->mailbox, SA_ALL);
	return  $this->current_status;
	}else{
	return 	array();
	}
	}

function get_mailboxmsginfo(){
	if(!empty($this->mbox)){
	$this->info = imap_mailboxmsginfo($this->mbox);
	return  $this->info;
	}else{
	return 	array();
	}
	}



function get_last_error(){
	if(function_exists("imap_mail")){
	$this->current_error = imap_last_error();
	return  $this->current_error;
	}else{
	return 	"";
	}
	}


function get_alerts(){
	if(function_exists("imap_mail")){
	$this->current_alerts = imap_alerts();
	return  $this->current_error;
	}else{
	return 	"";
	}
	}

	
	
function make_deletemailbox($mailbox=""){
	if(empty($mailbox)) $mailbox = $this->mailbox;
	if(!empty($this->mbox)){
    return  imap_deletemailbox($this->mbox, $mailbox);
	}else{
	return 	"";
	}
	}

function make_renamemailbox($mailbox=""){
	if(empty($mailbox)) $mailbox = $this->mailbox;
	if(!empty($this->mbox)){
    return  imap_renamemailbox($this->mbox, $this->mailbox, $mailbox);
	}else{
	return 	"";
	}
	}

function make_createmailbox($mailbox=""){
	if(empty($mailbox)) $mailbox = $this->mailbox;
	if(!empty($this->mbox)){
    return  imap_createmailbox($this->mbox, $mailbox);
	}else{
	return 	"";
	}
	}

	
	
function close(){
	if(!empty($this->mbox)){
	return  imap_close($this->mbox);
	}else{
	return 	"";
	}
	}
	
 }
}
?>
