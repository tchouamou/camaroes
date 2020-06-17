<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        get_email_ticket.php
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

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


get_email_ticket.php,Ver 3.0  2011-Nov-Thu 00:26:50  
*/


/**
* Information about
*$cmr->db["sql_query1"] Is used for keeping
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
 // case "email_ticket":
$id = get_post("id_ticket"); //Getting variable [$id] sended by form [ticket]
$mail_from = get_post("mail_from"); //Getting variable [$mail_from] sended by form [ticket]
$mail_to = get_post("mail_to"); //Getting variable [$mail_to] sended by form [ticket]
$mail_cc = get_post("mail_cc"); //Getting variable [$mail_cc] sended by form [ticket]
$mail_bcc = get_post("mail_bcc"); //Getting variable [$mail_bcc] sended by form [ticket]
// $cmr->post_files["attachment"]= get_post("attach");//Getting variable [$cmr->post_files["attachment"]] sended by form [ticket]
$mail_text = get_post("mail_text"); //Getting variable [$mail_text] sended by form [ticket]
$mail_title = get_post("mail_title"); //Getting variable [$mail_text] sended by form [ticket]
$email_text = get_post("email_text");
// -----------------------------------------------------
$cmr->post_var["id_ticket"] = $id; // for email ticket
// -----------------------------------------------------

