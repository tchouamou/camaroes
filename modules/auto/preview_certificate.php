<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_certificate.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

preview_certificate.php, Ver 3.0, 2010-Sep-Mon 10:59:32
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$table_name = "certificate";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id'] = 'id';

$array_column['serial'] = 'serial';

$array_column['user_email'] = 'user_email';

$array_column['version'] = 'version';

$array_column['to_cn'] = 'to_cn';

$array_column['to_o'] = 'to_o';

$array_column['to_ou'] = 'to_ou';

$array_column['from_cn'] = 'from_cn';

$array_column['from_o'] = 'from_o';

$array_column['from_ou'] = 'from_ou';

$array_column['valid_from'] = 'valid_from';

$array_column['valid_to'] = 'valid_to';

$array_column['state'] = 'state';

$array_column['cert_pkcs'] = 'cert_pkcs';

$array_column['pub_key_pkcs'] = 'pub_key_pkcs';

$array_column['status'] = 'status';

$array_column['type'] = 'type';

$array_column['login_script'] = 'login_script';

$array_column['public_key'] = 'public_key';

$array_column['private_key'] = 'private_key';

$array_column['pass_phrase'] = 'pass_phrase';

$array_column['my_master'] = 'my_master';

$array_column['date_time'] = 'date_time';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/preview_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
