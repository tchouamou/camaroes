<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * calendar.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























calendar.php,Ver 3.0  2011-Sep-Wed 12:32:30  
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<script type="text/javascript" src="calendar.js" ></script>
<?php
// open_finestra($cmr->config, $cmr->language, $cmr->module["name"], $cmr->module["rown_position"], $cmr->module["col_position"], "<img alt=\"=> \" src=\"".$cmr->get_path("image") ."images/icon/pallino_blue.gif\">"." Calendar");
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $cmr->get_module("name");




$division->module["title"] = $cmr->translate($cmr->module["base_name"]); //$division->module["title"] = "Banner Info ";
// $division->module["text"] = "";


















print($division->show_noclose());
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/calendar.php", 1);
$lk->add_link("modules/calendario.php", 1);
print($lk->open_module_tab(0));
?>
<br /><b>
<?php
if(isset($cmr->language[$cmr->module["base_name"]]))
print($cmr->translate($cmr->module["base_name"]));
?>
</b>
<br />
<p class="normal_text">
<?php
if(isset($cmr->language[$cmr->module["base_name"]."_title"]))
print($cmr->translate($cmr->module["base_name"]."_title"));
?>
</p>
<br />
<div id="calendar-container"></div>
<div class="form" id="calendar_div">
<?php
/**
 * ____  _   _ ____  _              _     _  _   _   _
 * |  _ \| | | |  _ \| |_ ___   ___ | |___| || | | | | |
 * | |_) | |_| | |_) | __/ _ \ / _ \| / __| || |_| | | |
 * |  __/|  _  |  __/| || (_) | (_) | \__ \__   _| |_| |
 * |_|   |_| |_|_|    \__\___/ \___/|_|___/  |_|  \___/
 *
 * calendrier.php  -  A calendar
 * ---------
 * begin                : June 2002
 * Version				 : 2.1 (Jan 04)
 * copyleft             : (C) 2002-2003 PHPtools4U.com - Mathieu LESNIAK
 * email                : support@phptools4u.com
 */

/**
 * This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 */
// ## French Version
