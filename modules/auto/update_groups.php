<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_groups.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_groups.php, Ver 3.0, 2010-Sep-Mon 11:05:31  
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
$table_name = "groups";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['name']['name'] = 'name';
$array_column['name']['type'] = 'varchar';
$array_column['name']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['location']['name'] = 'location';
$array_column['location']['type'] = 'varchar';
$array_column['location']['foreign'] = '0';

$array_column['sla']['name'] = 'sla';
$array_column['sla']['type'] = 'timestamp';
$array_column['sla']['foreign'] = '0';

$array_column['public_key']['name'] = 'public_key';
$array_column['public_key']['type'] = 'text';
$array_column['public_key']['foreign'] = '0';

$array_column['private_key']['name'] = 'private_key';
$array_column['private_key']['type'] = 'text';
$array_column['private_key']['foreign'] = '0';

$array_column['pass_phrase']['name'] = 'pass_phrase';
$array_column['pass_phrase']['type'] = 'varchar';
$array_column['pass_phrase']['foreign'] = '0';

$array_column['email_sign']['name'] = 'email_sign';
$array_column['email_sign']['type'] = 'text';
$array_column['email_sign']['foreign'] = '0';

$array_column['group_email']['name'] = 'group_email';
$array_column['group_email']['type'] = 'varchar';
$array_column['group_email']['foreign'] = '1';

$array_column['admin_email']['name'] = 'admin_email';
$array_column['admin_email']['type'] = 'varchar';
$array_column['admin_email']['foreign'] = '1';

$array_column['home']['name'] = 'home';
$array_column['home']['type'] = 'varchar';
$array_column['home']['foreign'] = '0';

$array_column['notify']['name'] = 'notify';
$array_column['notify']['type'] = 'enum';
$array_column['notify']['foreign'] = '0';

$array_column['web_site']['name'] = 'web_site';
$array_column['web_site']['type'] = 'varchar';
$array_column['web_site']['foreign'] = '0';

$array_column['login_script']['name'] = 'login_script';
$array_column['login_script']['type'] = 'text';
$array_column['login_script']['foreign'] = '0';

$array_column['adress']['name'] = 'adress';
$array_column['adress']['type'] = 'varchar';
$array_column['adress']['foreign'] = '0';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
