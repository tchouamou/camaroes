<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_unread_email.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























view_unread_email.php,Ver 3.0  2011-Sep-Wed 12:32:30  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "email";
if(empty($cmr->action[$cmr->action["table_name"] . "_tab"])) $cmr->action[$cmr->action["table_name"] . "_tab"]= ".";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Unread " . $cmr->action["table_name"]);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List unread " . $cmr->action["table_name"]);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action[$cmr->action["table_name"] . "_module"] = __FILE__;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$list_group = $cmr->get_user("auth_list_group");
$email = $cmr->get_user("auth_email");
$group = $cmr->get_user("auth_group");


$cmr->query[$cmr->action["table_name"]] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "email.* ";
$cmr->query[$cmr->action["table_name"]] .= " FROM  " . $cmr->get_conf("cmr_table_prefix") . "email ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE ( ";

$cmr->query[$cmr->action["table_name"]] .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";

$cmr->query[$cmr->action["table_name"]] .= " AND (state <> 'disable') ";

$cmr->query[$cmr->action["table_name"]] .= " AND (( users_dest like ('%" . $email . "%')) ";
$cmr->query[$cmr->action["table_name"]] .= " OR (sender like ('%" . $email . "%')) or (groups_dest like ('%" . $group . "%'))) ";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$email_readed = cmr_readed_line($cmr->config, $cmr->user, $cmr->db_connection, "email");
$list_id_email=implode($email_readed, "','");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] .= " AND id NOT IN ('" . $list_id_email ."')";
// $cmr->query[$cmr->action["table_name"]] .= " AND id NOT IN ";
// $cmr->query[$cmr->action["table_name"]] .= " (SELECT line_id FROM " . $cmr->get_conf("cmr_table_prefix") . "history ";
// $cmr->query[$cmr->action["table_name"]] .= " WHERE (action = 'read') AND (user_email = '" . $email . "' ) ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (table_name='" . $cmr->get_conf("cmr_table_prefix") . "email')) ";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))
$cmr->post_var[$mod->base_name . "_mode"] = "link_detail";

if(empty($cmr->post_var[$mod->base_name . "_limit"]))
$cmr->post_var[$mod->base_name . "_limit"] = 100;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") ."templates/modules/view_email.php";
$file_list[] = $cmr->get_path("module") . "templates/modules/auto/view_email.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>