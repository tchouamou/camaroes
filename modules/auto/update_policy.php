<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_policy.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_policy.php, Ver 3.0, 2010-Sep-Mon 11:07:28  
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
$table_name = "policy";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['source']['name'] = 'source';
$array_column['source']['type'] = 'varchar';
$array_column['source']['foreign'] = '0';

$array_column['table_name']['name'] = 'table_name';
$array_column['table_name']['type'] = 'varchar';
$array_column['table_name']['foreign'] = '0';

$array_column['line_id']['name'] = 'line_id';
$array_column['line_id']['type'] = 'varchar';
$array_column['line_id']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['privilege']['name'] = 'privilege';
$array_column['privilege']['type'] = 'enum';
$array_column['privilege']['foreign'] = '0';

$array_column['allow_type']['name'] = 'allow_type';
$array_column['allow_type']['type'] = 'varchar';
$array_column['allow_type']['foreign'] = '1';

$array_column['allow_email']['name'] = 'allow_email';
$array_column['allow_email']['type'] = 'varchar';
$array_column['allow_email']['foreign'] = '1';

$array_column['allow_groups']['name'] = 'allow_groups';
$array_column['allow_groups']['type'] = 'varchar';
$array_column['allow_groups']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
