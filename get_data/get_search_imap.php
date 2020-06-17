<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_search_imap.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_search_imap.php,Ver 3.0  2011 05:49:24
*/

/**
 * Information about
 * $cmr->post_var["sql_imap"] and $cmr->post_var["sql"] Is used for keeping
 * the query string you will be run in the module view_search.php
 *
 * $cmr->post_var["search_text"] Is used for keeping
 * the string value off the text to search
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "search_imap"://When Working in data send by  form [search_imap.php]



$ON = get_post('ON', 'post', $cmr->session['pre_match']); //Getting variable [$ON] sended by form search_imap.php]
$SINCE = get_post('SINCE', 'post', $cmr->session['pre_match']); //Getting variable [$SINCE] sended by form search_imap.php]
$BEFORE = get_post('BEFORE', 'post', $cmr->session['pre_match']); //Getting variable [$BEFORE] sended by form search_imap.php]

$FROM = get_post('FROM', 'post', $cmr->session['pre_match']); //Getting variable [$FROM] sended by form search_imap.php]
$CC = get_post('CC', 'post', $cmr->session['pre_match']); //Getting variable [$CC] sended by form search_imap.php]
$BCC = get_post('BCC', 'post', $cmr->session['pre_match']); //Getting variable [$BCC] sended by form search_imap.php]
$TO = get_post('TO', 'post', $cmr->session['pre_match']); //Getting variable [$TO] sended by form search_imap.php]
$SUBJECT = get_post('SUBJECT', 'post', $cmr->session['pre_match']); //Getting variable [$SUBJECT] sended by form search_imap.php]
$KEYWORD = get_post('KEYWORD', 'post', $cmr->session['pre_match']); //Getting variable [$KEYWORD] sended by form search_imap.php]
$BEFORE = get_post('BEFORE', 'post', $cmr->session['pre_match']); //Getting variable [$BEFORE] sended by form search_imap.php]
$BODY = get_post('BODY', 'post', $cmr->session['pre_match']); //Getting variable [$BODY] sended by form search_imap.php]
$TEXT = get_post('TEXT', 'post', $cmr->session['pre_match']); //Getting variable [$TEXT] sended by form search_imap.php]

$ANSWERED = get_post('ANSWERED', 'post', $cmr->session['pre_match']); //Getting variable [$ANSWERED] sended by form search_imap.php]
$DELETED = get_post('DELETED', 'post', $cmr->session['pre_match']); //Getting variable [$DELETED] sended by form search_imap.php]
$FLAGGED = get_post('FLAGGED', 'post', $cmr->session['pre_match']); //Getting variable [$FLAGGED] sended by form search_imap.php]
$NEW = get_post('NEW', 'post', $cmr->session['pre_match']); //Getting variable [$NEW] sended by form search_imap.php]
$OLD = get_post('OLD', 'post', $cmr->session['pre_match']); //Getting variable [$OLD] sended by form search_imap.php]
$RECENT = get_post('RECENT', 'post', $cmr->session['pre_match']); //Getting variable [$RECENT] sended by form search_imap.php]
$SEEN = get_post('SEEN', 'post', $cmr->session['pre_match']); //Getting variable [$SEEN] sended by form search_imap.php]
$UNANSWERED = get_post('UNANSWERED', 'post', $cmr->session['pre_match']); //Getting variable [$UNANSWERED] sended by form search_imap.php]
$UNDELETED = get_post('UNDELETED', 'post', $cmr->session['pre_match']); //Getting variable [$UNDELETED] sended by form search_imap.php]
$UNFLAGGED = get_post('UNFLAGGED', 'post', $cmr->session['pre_match']); //Getting variable [$UNFLAGGED] sended by form search_imap.php]
$UNKEYWORD = get_post('UNKEYWORD', 'post', $cmr->session['pre_match']); //Getting variable [$UNKEYWORD] sended by form search_imap.php]
$UNSEEN = get_post('UNSEEN', 'post', $cmr->session['pre_match']); //Getting variable [$UNSEEN] sended by form search_imap.php]


/**
*Creating the appropriate SQL string for  searching in imap
**/
$cmr->post_var["searchbox"] = "";
$cmr->post_var["searchbox1"] = "";

if(!empty($ON)) $cmr->post_var["searchbox"] .=" ON " . $ON;
if(!empty($SINCE)) $cmr->post_var["searchbox"] .=" SINCE " . $SINCE;
if(!empty($BEFORE)) $cmr->post_var["searchbox"] .=" BEFORE " . $BEFORE;


if(!empty($FROM)) $cmr->post_var["searchbox"] .=" FROM " . $FROM;
if(!empty($CC)) $cmr->post_var["searchbox"] .=" CC " . $CC;
if(!empty($BCC)) $cmr->post_var["searchbox"] .=" BCC " . $BCC;
if(!empty($TO)) $cmr->post_var["searchbox"] .=" TO " . $TO;
if(!empty($SUBJECT)) $cmr->post_var["searchbox"] .=" SUBJECT " . $SUBJECT;
if(!empty($KEYWORD)) $cmr->post_var["searchbox"] .=" KEYWORD " . $KEYWORD;
if(!empty($BODY)) $cmr->post_var["searchbox"] .=" BODY " . $BODY;
if(!empty($TEXT)) $cmr->post_var["searchbox"] .=" TEXT " . $TEXT;

if(!empty($ANSWERED)) $cmr->post_var["searchbox"] .=" " . $ANSWERED . " ";
if(!empty($DELETED)) $cmr->post_var["searchbox"] .=" " . $DELETED . " ";
if(!empty($FLAGGED)) $cmr->post_var["searchbox"] .=" " . $FLAGGED . " ";
if(!empty($NEW)) $cmr->post_var["searchbox"] .=" " . $NEW . " ";
if(!empty($OLD)) $cmr->post_var["searchbox"] .=" " . $OLD . " ";
if(!empty($RECENT)) $cmr->post_var["searchbox"] .=" " . $RECENT . " ";
if(!empty($SEEN)) $cmr->post_var["searchbox"] .=" " . $SEEN . " ";
if(!empty($UNANSWERED)) $cmr->post_var["searchbox"] .=" " . $UNANSWERED . " ";
if(!empty($UNDELETED)) $cmr->post_var["searchbox"] .=" " . $UNDELETED . " ";
if(!empty($UNFLAGGED)) $cmr->post_var["searchbox"] .=" " . $UNFLAGGED . " ";
if(!empty($UNKEYWORD)) $cmr->post_var["searchbox"] .=" " . $UNKEYWORD . " ";
if(!empty($UNSEEN)) $cmr->post_var["searchbox"] .=" " . $UNSEEN . " ";


/*
Select next module to be run
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . $cmr->get_session("id") . "' ,'search'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["layer"] = "3";

$cmr->page["left1"] = $cmr->get_path("module") . "modules/menu_imap.php";
$cmr->page["left2"] = "";

$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";
$cmr->page["middle2"] = $cmr->get_path("module") . "modules/view_imap.php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
