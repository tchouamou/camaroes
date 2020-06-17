<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * test.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























test.php ,Ver 3.0  @_date_time_@
*/


 
 
 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->language[$mod->base_name]; //$division->module["title"] = "Safe Mode";
// $division->module["text"] = "";


















print($division->show_noclose());
print("<b>" . $cmr->language['' . $mod->base_name . '_title']);
print("</b><br /><p class=\"normal_text\">");
print($cmr->language['' . $mod->base_name . '_text']);
print("</p>");
// open_box($cmr->config, $cmr->language, $mod->name, $mod->rown_position, $mod->col_position, "Safe Mode");
// print(open_tab($cmr->config, $cmr->language));
/*==================*/

$division->themes["text_align"] = "left";
?>

<textarea cols="100%" rows="40">
<h1>cmr-><?php print($cmr->translate("class"));?></h1><hr />
<?php
print_r($cmr);
?>
</textarea>
<?php


print("<select>");
print($cmr->print_select( $cmr->get_conf("cmr_table_prefix") . "user", "email", "column", "", "id", "100"));
print("</select>");

?>
<div id="test_div">
<textarea cols="100%" rows="40">
<?php echo $cmr->translate(" SESSION ");?>
<?php echo $cmr->translate(" COOKIE ");?>
</textarea>
<textarea cols="100%" rows="40">
<?php
print("<hr /> _files=".implode(" : ",array_keys($_files)));
print("<hr /> _session=".implode(" : ",array_keys($_session)));
print("<hr /> _session=".implode(" : ",array_keys($_session)));
print("<hr /> _session=".implode(" : ",array_keys($_session)));
print("<hr /> remote_addr=$remote_addr");
print("<br /> _server=".implode(" : ",array_values($_server)));
print("<br /> _session=".implode(" : ", $_session));
?>
</textarea>

<?php  print($division->close());
phpinfo();

?>
