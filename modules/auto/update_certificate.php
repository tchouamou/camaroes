<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * Update_certificate.php
 *        ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
Update_certificate.php, Ver 3.0, 2010-Sep-Mon 10:59:36  
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
$table_name = "certificate";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id']['name'] = 'id';
$array_column['id']['type'] = 'bigint';
$array_column['id']['foreign'] = '0';

$array_column['serial']['name'] = 'serial';
$array_column['serial']['type'] = 'varchar';
$array_column['serial']['foreign'] = '0';

$array_column['user_email']['name'] = 'user_email';
$array_column['user_email']['type'] = 'varchar';
$array_column['user_email']['foreign'] = '0';

$array_column['version']['name'] = 'version';
$array_column['version']['type'] = 'varchar';
$array_column['version']['foreign'] = '0';

$array_column['to_cn']['name'] = 'to_cn';
$array_column['to_cn']['type'] = 'varchar';
$array_column['to_cn']['foreign'] = '0';

$array_column['to_o']['name'] = 'to_o';
$array_column['to_o']['type'] = 'varchar';
$array_column['to_o']['foreign'] = '0';

$array_column['to_ou']['name'] = 'to_ou';
$array_column['to_ou']['type'] = 'varchar';
$array_column['to_ou']['foreign'] = '0';

$array_column['from_cn']['name'] = 'from_cn';
$array_column['from_cn']['type'] = 'varchar';
$array_column['from_cn']['foreign'] = '0';

$array_column['from_o']['name'] = 'from_o';
$array_column['from_o']['type'] = 'varchar';
$array_column['from_o']['foreign'] = '0';

$array_column['from_ou']['name'] = 'from_ou';
$array_column['from_ou']['type'] = 'varchar';
$array_column['from_ou']['foreign'] = '0';

$array_column['valid_from']['name'] = 'valid_from';
$array_column['valid_from']['type'] = 'datetime';
$array_column['valid_from']['foreign'] = '0';

$array_column['valid_to']['name'] = 'valid_to';
$array_column['valid_to']['type'] = 'datetime';
$array_column['valid_to']['foreign'] = '0';

$array_column['state']['name'] = 'state';
$array_column['state']['type'] = 'enum';
$array_column['state']['foreign'] = '0';

$array_column['cert_pkcs']['name'] = 'cert_pkcs';
$array_column['cert_pkcs']['type'] = 'varchar';
$array_column['cert_pkcs']['foreign'] = '0';

$array_column['pub_key_pkcs']['name'] = 'pub_key_pkcs';
$array_column['pub_key_pkcs']['type'] = 'varchar';
$array_column['pub_key_pkcs']['foreign'] = '0';

$array_column['status']['name'] = 'status';
$array_column['status']['type'] = 'enum';
$array_column['status']['foreign'] = '0';

$array_column['type']['name'] = 'type';
$array_column['type']['type'] = 'varchar';
$array_column['type']['foreign'] = '0';

$array_column['login_script']['name'] = 'login_script';
$array_column['login_script']['type'] = 'text';
$array_column['login_script']['foreign'] = '0';

$array_column['public_key']['name'] = 'public_key';
$array_column['public_key']['type'] = 'text';
$array_column['public_key']['foreign'] = '0';

$array_column['private_key']['name'] = 'private_key';
$array_column['private_key']['type'] = 'text';
$array_column['private_key']['foreign'] = '0';

$array_column['pass_phrase']['name'] = 'pass_phrase';
$array_column['pass_phrase']['type'] = 'varchar';
$array_column['pass_phrase']['foreign'] = '0';

$array_column['my_master']['name'] = 'my_master';
$array_column['my_master']['type'] = 'varchar';
$array_column['my_master']['foreign'] = '1';

$array_column['date_time']['name'] = 'date_time';
$array_column['date_time']['type'] = 'datetime';
$array_column['date_time']['foreign'] = '0';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/update_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
