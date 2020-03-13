<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_asset.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_asset.php, Ver 3.0, 2010-Sep-Mon 10:59:11  
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
$table_name = "asset";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['serial']['name'] = 'serial';
$array_column['serial']['type'] = 'varchar';
$array_column['serial']['foreign'] = '0';

$array_column['mac_adress']['name'] = 'mac_adress';
$array_column['mac_adress']['type'] = 'varchar';
$array_column['mac_adress']['foreign'] = '0';

$array_column['name']['name'] = 'name';
$array_column['name']['type'] = 'varchar';
$array_column['name']['foreign'] = '0';

$array_column['location']['name'] = 'location';
$array_column['location']['type'] = 'varchar';
$array_column['location']['foreign'] = '0';

$array_column['ip']['name'] = 'ip';
$array_column['ip']['type'] = 'varchar';
$array_column['ip']['foreign'] = '0';

$array_column['nat_ip']['name'] = 'nat_ip';
$array_column['nat_ip']['type'] = 'varchar';
$array_column['nat_ip']['foreign'] = '0';

$array_column['mask']['name'] = 'mask';
$array_column['mask']['type'] = 'varchar';
$array_column['mask']['foreign'] = '0';

$array_column['gateway']['name'] = 'gateway';
$array_column['gateway']['type'] = 'varchar';
$array_column['gateway']['foreign'] = '0';

$array_column['dns1']['name'] = 'dns1';
$array_column['dns1']['type'] = 'varchar';
$array_column['dns1']['foreign'] = '0';

$array_column['dns2']['name'] = 'dns2';
$array_column['dns2']['type'] = 'varchar';
$array_column['dns2']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['os']['name'] = 'os';
$array_column['os']['type'] = 'varchar';
$array_column['os']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['login_id']['name'] = 'login_id';
$array_column['login_id']['type'] = 'varchar';
$array_column['login_id']['foreign'] = '0';

$array_column['login_pw']['name'] = 'login_pw';
$array_column['login_pw']['type'] = 'varchar';
$array_column['login_pw']['foreign'] = '0';

$array_column['check_command']['name'] = 'check_command';
$array_column['check_command']['type'] = 'varchar';
$array_column['check_command']['foreign'] = '1';

$array_column['certificate']['name'] = 'certificate';
$array_column['certificate']['type'] = 'varchar';
$array_column['certificate']['foreign'] = '1';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '1';

$array_column['my_software']['name'] = 'my_software';
$array_column['my_software']['type'] = 'varchar';
$array_column['my_software']['foreign'] = '1';

$array_column['my_service']['name'] = 'my_service';
$array_column['my_service']['type'] = 'varchar';
$array_column['my_service']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>