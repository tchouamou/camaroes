<?php
// /* vim: set expandtab tabstop=4 shiftwidth=4: */
// +----------------------------------------------------------------------+
// | PHP Version 5                                                        |
// +----------------------------------------------------------------------+
// | Copyright (c) 1997-2004 The PHP Group                                |
// +----------------------------------------------------------------------+
// | This source file is subject to version 3.0 of the PHP license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.php.net/license/3_0.txt.                                  |
// | If you did not receive a copy of the PHP license and are unable to   |
// | obtain it through the world-wide-web, please send a note to          |
// | license@php.net so we can mail you a copy immediately.               |
// +----------------------------------------------------------------------+
// | Author: Stig Bakken <ssb@php.net>                                    |
// |                                                                      |
// +----------------------------------------------------------------------+
//
// $Id: Autoloader.php,v 1.11 2004/02/27 02:21:29 cellog Exp $

if (!extension_loaded("overload")) {
    // die hard without ext/overload
    die("Rebuild PHP with the `overload' extension to use PEAR_Autoloader");
}

require_once "PEAR.php";

/**
 * This class is for objects where you want to separate the code for
 * some methods into separate classes.  This is useful if you have a
 * class with not-frequently-used methods that contain lots of code
 * that you would like to avoid always parsing.
 *
 * The PEAR_Autoloader class provides autoloading and aggregation.
 * The autoloading lets you set up in which classes the separated
 * methods are found.  Aggregation is the technique used to import new
 * methods, an instance of each class providing separated methods is
 * stored and called every time the aggregated method is called.
 *
