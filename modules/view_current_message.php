<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_all_message.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























view_all_message.php,Ver 3.0  2011-Aug-Wed 06:24:27  
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
$cmr->action["table_name"] = "message";
if(empty($cmr->action[$cmr->action["table_name"] . "_tab"])) $cmr->action[$cmr->action["table_name"] . "_tab"]= ".";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Current " . $cmr->action["table_name"]);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List current " . $cmr->action["table_name"]);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action[$cmr->action["table_name"] . "_module"] = __FILE__;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query[$cmr->action["table_name"]] = $qr->get_query("current_message");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->query[$cmr->action["table_name"]] = "SELECT *  FROM  " . $cmr->get_conf("cmr_table_prefix") . "message";
// $cmr->query[$cmr->action["table_name"]] .= " WHERE (";
// $cmr->query[$cmr->action["table_name"]] .= "(((begin_time + 0 <= CURRENT_TIMESTAMP + 0) AND (end_time  + 0 >= CURRENT_TIMESTAMP + 0)) OR (end_time  + 0 <= begin_time + 0)) ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (state <> 'disable') ";

// $cmr->query[$cmr->action["table_name"]] .= " AND ((users_dest='' ";
// $cmr->query[$cmr->action["table_name"]] .= " AND groups_dest='' AND modules_dest LIKE ('%%')) OR ";

// $cmr->query[$cmr->action["table_name"]] .= " (users_dest LIKE ('%" . $email . "%') ";
// $cmr->query[$cmr->action["table_name"]] .= " AND groups_dest='' and modules_dest LIKE ('%%')) OR ";

// $cmr->query[$cmr->action["table_name"]] .= " (users_dest='' ";
// $cmr->query[$cmr->action["table_name"]] .= " AND groups_dest IN (" . $list_group . ")  AND modules_dest LIKE ('%%')) OR ";

// $cmr->query[$cmr->action["table_name"]] .= " (users_dest LIKE ('%" . $email . "%') ";
// $cmr->query[$cmr->action["table_name"]] .= " OR groups_dest IN (" . $list_group . ")  AND modules_dest LIKE ('%%')) ";
// $cmr->query[$cmr->action["table_name"]] .= ")) AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))
$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";

if(empty($cmr->post_var[$mod->base_name . "_limit"]))
$cmr->post_var[$mod->base_name . "_limit"] = 100;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_message.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_message.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
