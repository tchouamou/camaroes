<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_contact.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_contact.php, Ver 3.0, 2010-Sep-Mon 11:01:37  
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
$table_name = "contact";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['uid']['name'] = 'uid';
$array_column['uid']['type'] = 'varchar';
$array_column['uid']['foreign'] = '0';

$array_column['name']['name'] = 'name';
$array_column['name']['type'] = 'varchar';
$array_column['name']['foreign'] = '0';

$array_column['last_name']['name'] = 'last_name';
$array_column['last_name']['type'] = 'varchar';
$array_column['last_name']['foreign'] = '0';

$array_column['sexe']['name'] = 'sexe';
$array_column['sexe']['type'] = 'enum';
$array_column['sexe']['foreign'] = '0';

$array_column['functio']['name'] = 'functio';
$array_column['functio']['type'] = '';
$array_column['functio']['foreign'] = '0';

$array_column['email']['name'] = 'email';
$array_column['email']['type'] = 'varchar';
$array_column['email']['foreign'] = '0';

$array_column['email_sign']['name'] = 'email_sign';
$array_column['email_sign']['type'] = 'text';
$array_column['email_sign']['foreign'] = '0';

$array_column['tel']['name'] = 'tel';
$array_column['tel']['type'] = 'varchar';
$array_column['tel']['foreign'] = '0';

$array_column['cel']['name'] = 'cel';
$array_column['cel']['type'] = 'varchar';
$array_column['cel']['foreign'] = '0';

$array_column['adress']['name'] = 'adress';
$array_column['adress']['type'] = 'varchar';
$array_column['adress']['foreign'] = '0';

$array_column['location']['name'] = 'location';
$array_column['location']['type'] = 'varchar';
$array_column['location']['foreign'] = '0';

$array_column['country']['name'] = 'country';
$array_column['country']['type'] = 'varchar';
$array_column['country']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['status']['name'] = 'status';
$array_column['status']['type'] = 'enum';
$array_column['status']['foreign'] = '0';

$array_column['lang']['name'] = 'lang';
$array_column['lang']['type'] = 'varchar';
$array_column['lang']['foreign'] = '0';

$array_column['style']['name'] = 'style';
$array_column['style']['type'] = 'varchar';
$array_column['style']['foreign'] = '0';

$array_column['public_key']['name'] = 'public_key';
$array_column['public_key']['type'] = 'text';
$array_column['public_key']['foreign'] = '0';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
