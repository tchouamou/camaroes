<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_user.php
 * ---------
 * begin    : July 2004 - July 2010
 * copyright   : Camaroes Ver 3.0 (C) 2004-2010 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2010, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

preview_user.php, Ver 3.0, 2010-Sep-Mon 11:11:58
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
$table_name = "user";
$column_id = "id";
$array_column = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$array_column['id'] = 'id';

$array_column['uid'] = 'uid';

$array_column['name'] = 'name';

$array_column['last_name'] = 'last_name';

$array_column['nickname'] = 'nickname';

$array_column['sexe'] = 'sexe';

$array_column['role'] = 'role';

$array_column['sla'] = 'sla';

$array_column['pw'] = 'pw';

$array_column['email'] = 'email';

$array_column['email_sign'] = 'email_sign';

$array_column['tel'] = 'tel';

$array_column['cel'] = 'cel';

$array_column['home'] = 'home';

$array_column['adress'] = 'adress';

$array_column['location'] = 'location';

$array_column['state'] = 'state';

$array_column['status'] = 'status';

$array_column['type'] = 'type';

$array_column['lang'] = 'lang';

$array_column['style'] = 'style';

$array_column['login_script'] = 'login_script';

$array_column['certificate'] = 'certificate';

$array_column['photo'] = 'photo';

$array_column['my_master'] = 'my_master';

$array_column['date_time'] = 'date_time';

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("module") . "modules/share/preview_core.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
