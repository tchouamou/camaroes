<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_change_uid.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








get_change_uid.php,Ver 3.0  2011-Sep 22:32:32  
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
// case "change_uid":
$id = get_post("id_user");
$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id);
$old_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $id);

// $old_uid = get_post("old_uid");
$new_uid1 = get_post("new_uid1");
$new_uid2 = get_post("new_uid2");

$test_exist = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $old_uid);

if(($new_uid1 == $new_uid2) && (empty($test_exist))){
    // ===========
    // ----------------------------
    // ===============================
    // if(($user_email!=($cmr->get_user("auth_email")))&&(($cmr->user["auth_group"] .="noc"))
