<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_monitor.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
search_monitor.php, Ver 3.0, 2010-Sep-Mon 11:06:40  
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
$table_name = "monitor";
$array_column = array();
$cmr->config["cmr_default_table"] = "monitor";
$cmr->page["default_search"] = "monitor";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['group_name']['name'] = 'group_name';
$array_column['group_name']['type'] = 'varchar';
$array_column['group_name']['foreign'] = '1';

$array_column['monitor_group']['name'] = 'monitor_group';
$array_column['monitor_group']['type'] = 'varchar';
$array_column['monitor_group']['foreign'] = '0';

$array_column['config']['name'] = 'config';
$array_column['config']['type'] = 'text';
$array_column['config']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'timestamp';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
