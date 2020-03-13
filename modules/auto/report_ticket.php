<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_ticket.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

report_ticket.php, Ver 3.0, 2010-Sep-Mon 11:11:06
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "ticket";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id'] = 'id';

$array_column['number'] = 'number';

$array_column['lang'] = 'lang';

$array_column['title'] = 'title';

$array_column['work_by'] = 'work_by';

$array_column['call_log_user'] = 'call_log_user';

$array_column['call_log_group'] = 'call_log_group';

$array_column['call_method'] = 'call_method';

$array_column['state'] = 'state';

$array_column['state_now'] = 'state_now';

$array_column['assign_to'] = 'assign_to';

$array_column['list_user_impact'] = 'list_user_impact';

$array_column['list_group_impact'] = 'list_group_impact';

$array_column['list_asset_impact'] = 'list_asset_impact';

$array_column['severity'] = 'severity';

$array_column['sla'] = 'sla';

$array_column['mail_title'] = 'mail_title';

$array_column['mail_from'] = 'mail_from';

$array_column['mail_to'] = 'mail_to';

$array_column['mail_cc'] = 'mail_cc';

$array_column['mail_bcc'] = 'mail_bcc';

$array_column['attach'] = 'attach';

$array_column['type'] = 'type';

$array_column['text'] = 'text';

$array_column['mail_text'] = 'mail_text';

$array_column['my_master'] = 'my_master';

$array_column['comment'] = 'comment';

$array_column['date_time'] = 'date_time';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/report_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>