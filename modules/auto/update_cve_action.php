<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_cve_action.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_cve_action.php, Ver 3.0, 2010-Sep-Mon 11:02:48  
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module windows
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "cve_action";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['cve_number']['name'] = 'cve_number';
$array_column['cve_number']['type'] = 'varchar';
$array_column['cve_number']['foreign'] = '1';

$array_column['group_name']['name'] = 'group_name';
$array_column['group_name']['type'] = 'varchar';
$array_column['group_name']['foreign'] = '1';

$array_column['user_email']['name'] = 'user_email';
$array_column['user_email']['type'] = 'varchar';
$array_column['user_email']['foreign'] = '1';

$array_column['asset_ip']['name'] = 'asset_ip';
$array_column['asset_ip']['type'] = 'varchar';
$array_column['asset_ip']['foreign'] = '1';

$array_column['service_name']['name'] = 'service_name';
$array_column['service_name']['type'] = 'varchar';
$array_column['service_name']['foreign'] = '1';

$array_column['action']['name'] = 'action';
$array_column['action']['type'] = 'varchar';
$array_column['action']['foreign'] = '0';

$array_column['ticket_number']['name'] = 'ticket_number';
$array_column['ticket_number']['type'] = 'varchar';
$array_column['ticket_number']['foreign'] = '1';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'timestamp';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
