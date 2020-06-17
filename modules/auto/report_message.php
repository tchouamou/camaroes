<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_message.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

report_message.php, Ver 3.0, 2010-Sep-Mon 11:06:16
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
$table_name = "message";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id'] = 'id';

$array_column['sender'] = 'sender';

$array_column['title'] = 'title';

$array_column['attach'] = 'attach';

$array_column['text'] = 'text';

$array_column['groups_dest'] = 'groups_dest';

$array_column['users_dest'] = 'users_dest';

$array_column['modules_dest'] = 'modules_dest';

$array_column['mail_to'] = 'mail_to';

$array_column['mail_cc'] = 'mail_cc';

$array_column['mail_bcc'] = 'mail_bcc';

$array_column['begin_time'] = 'begin_time';

$array_column['end_time'] = 'end_time';

$array_column['intervale'] = 'intervale';

$array_column['priority'] = 'priority';

$array_column['type'] = 'type';

$array_column['state'] = 'state';

$array_column['my_master'] = 'my_master';

$array_column['date_time'] = 'date_time';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/report_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
