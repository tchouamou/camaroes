<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_cve.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
search_cve.php, Ver 3.0, 2010-Sep-Mon 11:02:22  
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
$table_name = "cve";
$array_column = array();
$cmr->config["cmr_default_table"] = "cve";
$cmr->page["default_search"] = "cve";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['number']['name'] = 'number';
$array_column['number']['type'] = 'varchar';
$array_column['number']['foreign'] = '0';

$array_column['title']['name'] = 'title';
$array_column['title']['type'] = 'varchar';
$array_column['title']['foreign'] = '0';

$array_column['severity']['name'] = 'severity';
$array_column['severity']['type'] = 'varchar';
$array_column['severity']['foreign'] = '0';

$array_column['platform']['name'] = 'platform';
$array_column['platform']['type'] = 'varchar';
$array_column['platform']['foreign'] = '0';

$array_column['problem']['name'] = 'problem';
$array_column['problem']['type'] = 'text';
$array_column['problem']['foreign'] = '0';

$array_column['solution']['name'] = 'solution';
$array_column['solution']['type'] = 'text';
$array_column['solution']['foreign'] = '0';

$array_column['refer']['name'] = 'refer';
$array_column['refer']['type'] = 'text';
$array_column['refer']['foreign'] = '0';

$array_column['other']['name'] = 'other';
$array_column['other']['type'] = 'text';
$array_column['other']['foreign'] = '0';

$array_column['release_date']['name'] = 'release_date';
$array_column['release_date']['type'] = 'datetime';
$array_column['release_date']['foreign'] = '0';

$array_column['last_revision']['name'] = 'last_revision';
$array_column['last_revision']['type'] = 'datetime';
$array_column['last_revision']['foreign'] = '0';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'timestamp';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
