<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_source_code.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
search_source_code.php, Ver 3.0, 2010-Sep-Mon 11:10:15  
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
$table_name = "source_code";
$array_column = array();
$cmr->config["cmr_default_table"] = "source_code";
$cmr->page["default_search"] = "source_code";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['name']['name'] = 'name';
$array_column['name']['type'] = 'varchar';
$array_column['name']['foreign'] = '0';

$array_column['path']['name'] = 'path';
$array_column['path']['type'] = 'varchar';
$array_column['path']['foreign'] = '0';

$array_column['language']['name'] = 'language';
$array_column['language']['type'] = 'varchar';
$array_column['language']['foreign'] = '0';

$array_column['lang_version']['name'] = 'lang_version';
$array_column['lang_version']['type'] = 'varchar';
$array_column['lang_version']['foreign'] = '0';

$array_column['code_version']['name'] = 'code_version';
$array_column['code_version']['type'] = 'varchar';
$array_column['code_version']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['author']['name'] = 'author';
$array_column['author']['type'] = 'varchar';
$array_column['author']['foreign'] = '0';

$array_column['copyright']['name'] = 'copyright';
$array_column['copyright']['type'] = 'varchar';
$array_column['copyright']['foreign'] = '0';

$array_column['my_md5']['name'] = 'my_md5';
$array_column['my_md5']['type'] = 'varchar';
$array_column['my_md5']['foreign'] = '0';

$array_column['license']['name'] = 'license';
$array_column['license']['type'] = 'text';
$array_column['license']['foreign'] = '0';

$array_column['text']['name'] = 'text';
$array_column['text']['type'] = 'text';
$array_column['text']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/search_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
