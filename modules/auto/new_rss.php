<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * new_rss.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

new_rss.php, Ver 3.0, 2010-Sep-Mon 11:08:08
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
$table_name = "rss";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['version']['name'] = 'version';
$array_column['version']['type'] = 'varchar';
$array_column['version']['foreign'] = '0';

$array_column['title']['name'] = 'title';
$array_column['title']['type'] = 'varchar';
$array_column['title']['foreign'] = '0';

$array_column['link']['name'] = 'link';
$array_column['link']['type'] = 'varchar';
$array_column['link']['foreign'] = '0';

$array_column['language']['name'] = 'language';
$array_column['language']['type'] = 'varchar';
$array_column['language']['foreign'] = '0';

$array_column['rating']['name'] = 'rating';
$array_column['rating']['type'] = 'varchar';
$array_column['rating']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['feed_adress']['name'] = 'feed_adress';
$array_column['feed_adress']['type'] = 'varchar';
$array_column['feed_adress']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'enum';
$array_column['type']['foreign'] = '0';

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
