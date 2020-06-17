<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_sla.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_sla.php, Ver 3.0, 2010-Sep-Mon 11:09:29  
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
$table_name = "sla";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['user_email']['name'] = 'user_email';
$array_column['user_email']['type'] = 'varchar';
$array_column['user_email']['foreign'] = '1';

$array_column['group_name']['name'] = 'group_name';
$array_column['group_name']['type'] = 'varchar';
$array_column['group_name']['foreign'] = '1';

$array_column['asset_ip']['name'] = 'asset_ip';
$array_column['asset_ip']['type'] = 'varchar';
$array_column['asset_ip']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['call_method']['name'] = 'call_method';
$array_column['call_method']['type'] = 'set';
$array_column['call_method']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['severity']['name'] = 'severity';
$array_column['severity']['type'] = 'enum';
$array_column['severity']['foreign'] = '0';

$array_column['assign_to']['name'] = 'assign_to';
$array_column['assign_to']['type'] = 'varchar';
$array_column['assign_to']['foreign'] = '0';

$array_column['num_user_impact']['name'] = 'num_user_impact';
$array_column['num_user_impact']['type'] = 'bigint';
$array_column['num_user_impact']['foreign'] = '0';

$array_column['num_group_impact']['name'] = 'num_group_impact';
$array_column['num_group_impact']['type'] = 'bigint';
$array_column['num_group_impact']['foreign'] = '0';

$array_column['num_asset_impact']['name'] = 'num_asset_impact';
$array_column['num_asset_impact']['type'] = 'bigint';
$array_column['num_asset_impact']['foreign'] = '0';

$array_column['sla']['name'] = 'sla';
$array_column['sla']['type'] = 'varchar';
$array_column['sla']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
