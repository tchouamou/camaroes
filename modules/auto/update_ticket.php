<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_ticket.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_ticket.php, Ver 3.0, 2010-Sep-Mon 11:11:10  
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
$table_name = "ticket";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['number']['name'] = 'number';
$array_column['number']['type'] = 'varchar';
$array_column['number']['foreign'] = '0';

$array_column['lang']['name'] = 'lang';
$array_column['lang']['type'] = 'varchar';
$array_column['lang']['foreign'] = '0';

$array_column['title']['name'] = 'title';
$array_column['title']['type'] = 'varchar';
$array_column['title']['foreign'] = '0';

$array_column['work_by']['name'] = 'work_by';
$array_column['work_by']['type'] = 'varchar';
$array_column['work_by']['foreign'] = '1';

$array_column['call_log_user']['name'] = 'call_log_user';
$array_column['call_log_user']['type'] = 'varchar';
$array_column['call_log_user']['foreign'] = '1';

$array_column['call_log_group']['name'] = 'call_log_group';
$array_column['call_log_group']['type'] = 'varchar';
$array_column['call_log_group']['foreign'] = '1';

$array_column['call_method']['name'] = 'call_method';
$array_column['call_method']['type'] = 'set';
$array_column['call_method']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['state_now']['name'] = 'state_now';
$array_column['state_now']['type'] = 'enum';
$array_column['state_now']['foreign'] = '0';

$array_column['assign_to']['name'] = 'assign_to';
$array_column['assign_to']['type'] = 'varchar';
$array_column['assign_to']['foreign'] = '0';

$array_column['list_user_impact']['name'] = 'list_user_impact';
$array_column['list_user_impact']['type'] = 'varchar';
$array_column['list_user_impact']['foreign'] = '0';

$array_column['list_group_impact']['name'] = 'list_group_impact';
$array_column['list_group_impact']['type'] = 'varchar';
$array_column['list_group_impact']['foreign'] = '0';

$array_column['list_asset_impact']['name'] = 'list_asset_impact';
$array_column['list_asset_impact']['type'] = 'varchar';
$array_column['list_asset_impact']['foreign'] = '0';

$array_column['severity']['name'] = 'severity';
$array_column['severity']['type'] = 'enum';
$array_column['severity']['foreign'] = '0';

$array_column['sla']['name'] = 'sla';
$array_column['sla']['type'] = 'varchar';
$array_column['sla']['foreign'] = '0';

$array_column['mail_title']['name'] = 'mail_title';
$array_column['mail_title']['type'] = 'varchar';
$array_column['mail_title']['foreign'] = '0';

$array_column['mail_from']['name'] = 'mail_from';
$array_column['mail_from']['type'] = 'varchar';
$array_column['mail_from']['foreign'] = '0';

$array_column['mail_to']['name'] = 'mail_to';
$array_column['mail_to']['type'] = 'varchar';
$array_column['mail_to']['foreign'] = '0';

$array_column['mail_cc']['name'] = 'mail_cc';
$array_column['mail_cc']['type'] = 'varchar';
$array_column['mail_cc']['foreign'] = '0';

$array_column['mail_bcc']['name'] = 'mail_bcc';
$array_column['mail_bcc']['type'] = 'varchar';
$array_column['mail_bcc']['foreign'] = '0';

$array_column['attach']['name'] = 'attach';
$array_column['attach']['type'] = 'varchar';
$array_column['attach']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['text']['name'] = 'text';
$array_column['text']['type'] = 'text';
$array_column['text']['foreign'] = '0';

$array_column['mail_text']['name'] = 'mail_text';
$array_column['mail_text']['type'] = 'text';
$array_column['mail_text']['foreign'] = '0';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '0';

$array_column['comment']['name'] = 'comment';
$array_column['comment']['type'] = 'text';
$array_column['comment']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>