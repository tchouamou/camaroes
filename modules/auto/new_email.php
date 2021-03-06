<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_email.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

new_email.php, Ver 3.0, 2010-Sep-Mon 11:03:31
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
$table_name = "email";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['encoding']['name'] = 'encoding';
$array_column['encoding']['type'] = 'varchar';
$array_column['encoding']['foreign'] = '0';

$array_column['lang']['name'] = 'lang';
$array_column['lang']['type'] = 'varchar';
$array_column['lang']['foreign'] = '0';

$array_column['header']['name'] = 'header';
$array_column['header']['type'] = 'text';
$array_column['header']['foreign'] = '0';

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
$array_column['attach']['type'] = 'enum';
$array_column['attach']['foreign'] = '0';

$array_column['text']['name'] = 'text';
$array_column['text']['type'] = 'text';
$array_column['text']['foreign'] = '0';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/new_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
