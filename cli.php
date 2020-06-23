<?php
/**
 * cli.php
 *         --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









cli.php,  2011-Oct
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
//
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/function.php");
include_once(dirname(__FILE__) . "/camaroes_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr = new camaroes();
include_once(dirname(__FILE__) . "/config.inc.php");
$cmr->config["cmr_main_config"] = dirname(__FILE__) . "/conf.d/conf.ini"; // conf_file_exist($cmr->get_conf("cmr_main_config"));
// $cmr->show();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once(dirname(__FILE__) . "/common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			!($cmr->get_conf("cmr_output_buffering")) or  ob_end_clean(); // clean  buffer content
			$doc_cli = strip_tags(($cmr->buffer), '<b><high><medium><low><h1><option><b><i><a><ul><li><pre><hr><br /><blockquote><img><p><table><tr><td>');
			$trans = array("&nbsp;" => " ", "<br" => "\n<br", "<tr" => "\n<tr", "<td" => " | <td",  "<h" => "\n<h", "<p" => "\n<p", "<option" => "\n<option", "<table" => "\n===================\n<table");
			$doc_cli = strtr($doc_cli, $trans);
			$doc_cli = strip_tags(($doc_cli));
			print(($doc_cli));
			$cmr->buffer = "";
  // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
