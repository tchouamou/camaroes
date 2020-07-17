<?php
defined("cmr_online") or die("Application is not online, click <a href=\"http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 *              select_mode.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









select_mode.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr_mode = isset($_GET["cmr_mode"])?($_GET["cmr_mode"]):($_POST["cmr_mode"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if ($cmr_mode) {
    switch ($cmr_mode) {
      case "image":
      include_once(dirname(__FILE__) . "/function/func_input.php");
      include_once(dirname(__FILE__) . "/function/func_image.php");
      include_once(dirname(__FILE__) . "/system/generate/image.php");
      exit;
      break;

        case "pdf":
        include_once(dirname(__FILE__) . "/function/func_input.php");
        include_once(dirname(__FILE__) . "/function/func_pdf.php");
        include_once(dirname(__FILE__) . "/class/class_pdf.php");
        include_once(dirname(__FILE__) . "/system/generate/pdf.php");
        exit;
        break;

        case "tips":
        include_once(dirname(__FILE__) . "/system/generate/tips.php");
        exit;
        break;

        case "graph":
        include_once(dirname(__FILE__) . "/function/func_input.php");
        include_once(dirname(__FILE__) . "/class/class_graph.php");
        include_once(dirname(__FILE__) . "/system/generate/graph.php");
        exit;
        break;

        case "ajax":
        exit;
        break;

        case "download":
        exit;
        break;


        case "barcode":
        exit;
        break;

}
}
