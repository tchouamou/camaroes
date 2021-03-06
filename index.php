<?php
/**
 * index.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









index.php,  2011-Oct
*/


/*=====================*/
define("cmr_online", "1");//-- Control when loading module --
/*=====================*/
//
// ( \/ ) / _\ (  )(  ( \
// / \/ \/    \ )( /    /
// \_)(_/\_/\_/(__)\_)__)
//
//  Main Camaroes
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (isset($_GET["cmr_mode"]) || isset($_POST["cmr_mode"])) {
    include(dirname(__FILE__) . "/select_mode.php");
}//image, pdf, graph, download, ..etc
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/function.php");
include_once(dirname(__FILE__) . "/camaroes_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr = new camaroes();
include_once(dirname(__FILE__) . "/config.inc.php");
$cmr->config["cmr_main_config"] = dirname(__FILE__) . "/conf.d/conf.ini"; // conf_file_exist($cmr->get_conf("cmr_main_config"));
// $cmr->show();
include(dirname(__FILE__) . "/package.php");//usefull config, //usefull function, usefull class,..etc
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (isset($_GET["cmr_mode"]) || isset($_POST["cmr_mode"])) {
    include(dirname(__FILE__) . "/initial_page.php");
}//login, logout, forget_account, inscription, install..etc
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/common_begin.php"); // user data, ..etc
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if (get_post("class_module") || get_post("cmr_get_data")) {
    include_once($cmr->get_path("index") . "system/loader/loader_get.php");
} //get form data and apply modifications ...etc
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include($cmr->get_path("index") . "front_page.php");
include_once($cmr->get_path("index") . "common_end.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->debug_print();exit;
$cmr->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
