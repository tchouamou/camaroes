<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_notify.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

new_notify.php, Ver 3.0, 2010-Sep-Mon 11:07:00
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module layer
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "notify";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'int';
$array_column['id']['foreign'] = '0';

$array_column['source']['name'] = 'source';
$array_column['source']['type'] = 'varchar';
$array_column['source']['foreign'] = '0';

$array_column['destination']['name'] = 'destination';
$array_column['destination']['type'] = 'set';
$array_column['destination']['foreign'] = '0';

$array_column['action']['name'] = 'action';
$array_column['action']['type'] = 'set';
$array_column['action']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'set';
$array_column['state']['foreign'] = '0';

$array_column['language']['name'] = 'language';
$array_column['language']['type'] = 'varchar';
$array_column['language']['foreign'] = '0';

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

$array_column['title']['name'] = 'title';
$array_column['title']['type'] = 'varchar';
$array_column['title']['foreign'] = '0';

$array_column['text']['name'] = 'text';
$array_column['text']['type'] = 'text';
$array_column['text']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/new_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
