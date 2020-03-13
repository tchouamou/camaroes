<?php
// * @package cmr
// * @copyright Copyright (C) 2011 Open Source Matters. All rights reserved.
// * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
// * This version may have been modified pursuant
// * to the GNU General Public License, and as distributed it includes or
// * is derivative of works licensed under the GNU General Public License or
// * other free or open source software licenses.
// */
// ======================================================================

// The following code (unsetting globals)
// PHP5 with register_long_arrays off?
if(@ phpversion() < '4.0.0' && !(@ ini_get('register_long_arrays') || @ ini_get('register_long_arrays') == '0' || strtolower(@ ini_get('register_long_arrays')) == 'off')){
    $_POST = $HTTP_POST_VARS;
    $_GET = $HTTP_GET_VARS;
    $_SERVER = $HTTP_SERVER_VARS;
    $_COOKIE = $HTTP_COOKIE_VARS;
    // $_ENV$HTTP =_ENV_VARS;
    $_FILES = $HTTP_POST_FILES;
    print("Can be better to user a php version >= 5.00");
    // _SESSION is the only superglobal which is conditionally set
    if(!isset($_SESSION)){
        $_SESSION = $HTTP_SESSION_VARS;
    }
}
// ===================================================================
// Protect against HTTP_SESSION_VARS tricks
if(isset($HTTP_SESSION_VARS) && !is_array($HTTP_SESSION_VARS)){
    die("Hacking attempt");
}
// Protect against GLOBALS tricks
if(isset($HTTP_POST_VARS['GLOBALS']) || isset($HTTP_POST_FILES['GLOBALS']) || isset($HTTP_GET_VARS['GLOBALS']) || isset($HTTP_COOKIE_VARS['GLOBALS'])){
	die("Hacking attempt, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");}

defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
// ======================================================================
// ======================================================================
// ======================================================================
// ======================================================================
?>