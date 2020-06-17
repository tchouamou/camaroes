<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_account.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
search_account.php, Ver 3.0, 2010-Sep-Mon 10:58:42  
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
$table_name = "account";
$array_column = array();
$cmr->config["cmr_default_table"] = "account";
$cmr->page["default_search"] = "account";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['url']['name'] = 'url';
$array_column['url']['type'] = 'varchar';
$array_column['url']['foreign'] = '0';

$array_column['user_email']['name'] = 'user_email';
$array_column['user_email']['type'] = 'varchar';
$array_column['user_email']['foreign'] = '0';

$array_column['uid']['name'] = 'uid';
$array_column['uid']['type'] = 'varchar';
$array_column['uid']['foreign'] = '0';

$array_column['pw']['name'] = 'pw';
$array_column['pw']['type'] = 'varchar';
$array_column['pw']['foreign'] = '0';

$array_column['server']['name'] = 'server';
$array_column['server']['type'] = 'varchar';
$array_column['server']['foreign'] = '0';

$array_column['service']['name'] = 'service';
$array_column['service']['type'] = 'varchar';
$array_column['service']['foreign'] = '1';

$array_column['port']['name'] = 'port';
$array_column['port']['type'] = 'bigint';
$array_column['port']['foreign'] = '0';

$array_column['protocol']['name'] = 'protocol';
$array_column['protocol']['type'] = 'varchar';
$array_column['protocol']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
