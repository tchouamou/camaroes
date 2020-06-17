<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_message.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_message.php, Ver 3.0, 2010-Sep-Mon 11:06:20  
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
$table_name = "message";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['sender']['name'] = 'sender';
$array_column['sender']['type'] = 'varchar';
$array_column['sender']['foreign'] = '0';

$array_column['title']['name'] = 'title';
$array_column['title']['type'] = 'varchar';
$array_column['title']['foreign'] = '0';

$array_column['attach']['name'] = 'attach';
$array_column['attach']['type'] = 'varchar';
$array_column['attach']['foreign'] = '0';

$array_column['text']['name'] = 'text';
$array_column['text']['type'] = 'text';
$array_column['text']['foreign'] = '0';

$array_column['groups_dest']['name'] = 'groups_dest';
$array_column['groups_dest']['type'] = 'varchar';
$array_column['groups_dest']['foreign'] = '0';

$array_column['users_dest']['name'] = 'users_dest';
$array_column['users_dest']['type'] = 'varchar';
$array_column['users_dest']['foreign'] = '0';

$array_column['modules_dest']['name'] = 'modules_dest';
$array_column['modules_dest']['type'] = 'varchar';
$array_column['modules_dest']['foreign'] = '0';

$array_column['mail_to']['name'] = 'mail_to';
$array_column['mail_to']['type'] = 'varchar';
$array_column['mail_to']['foreign'] = '0';

$array_column['mail_cc']['name'] = 'mail_cc';
$array_column['mail_cc']['type'] = 'varchar';
$array_column['mail_cc']['foreign'] = '0';

$array_column['mail_bcc']['name'] = 'mail_bcc';
$array_column['mail_bcc']['type'] = 'varchar';
$array_column['mail_bcc']['foreign'] = '0';

$array_column['begin_time']['name'] = 'begin_time';
$array_column['begin_time']['type'] = 'timestamp';
$array_column['begin_time']['foreign'] = '0';

$array_column['end_time']['name'] = 'end_time';
$array_column['end_time']['type'] = 'timestamp';
$array_column['end_time']['foreign'] = '0';

$array_column['intervale']['name'] = 'intervale';
$array_column['intervale']['type'] = 'varchar';
$array_column['intervale']['foreign'] = '0';

$array_column['priority']['name'] = 'priority';
$array_column['priority']['type'] = 'bigint';
$array_column['priority']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

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
