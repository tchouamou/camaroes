<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_tools.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_tools.php,Ver 3.0  2011-May-Mon 09:34:00
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["text"] = "";


















print($division->show_noclose());
// print("<b>".$cmr->language[''.$mod->base_name]."</b>");
// print("<br />");
// print("<p class=\"normal_text\">");
// print(ucfirst($cmr->language['" . $mod->base_name . "_title']));
// print("</p>");
// print("<br />");
print("<br />");

?>


<div id="left_menu_tools_div">
<ul class="cmr_menu">



 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <a href="index.php?conf=init"><?php print($cmr->translate(" |home| "));?></a>
 </li>




 <li>
  <?php print($cmr->module_icon("calendar.php", "16") . $cmr->module_link("modules/calendar.php"));
?>
 </li>





 <li>
  <?php print($cmr->module_icon("download.php", "16") . $cmr->module_link("modules/download.php"));
?>
 </li>





 <li>
  <?php print($cmr->module_icon("upload.php", "16") . $cmr->module_link("modules/upload.php"));
?>
 </li>




 <li>
  <?php print($cmr->module_icon("login_imap.php", "16") . $cmr->module_link("modules/login_imap.php"));
?>
 </li>




 <li>
  <?php print($cmr->module_icon("form_generator.php", "16") . $cmr->module_link("modules/admin/form_generator.php"));
?>
 </li>





 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <?php print($cmr->module_icon("explore.php", "16") . $cmr->module_link("modules/admin/explore.php"));
?>
 </li>




 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <?php print($cmr->module_icon("query.php", "16") . $cmr->module_link("modules/admin/query.php"));
?>
 </li>




 <li>
  <?php print($cmr->module_icon("login_db.php", "16") . $cmr->module_link("replace/database/login_db.php"));
?>
 </li>




 <li>
  <?php print($cmr->module_icon("modules/guest/game.php", "16") . $cmr->module_link("modules/guest/game.php?conf_name=conf.d/modules/game.ini"));
?>
 </li>




 <li>
  <a href="index.php?cmr_mode=logout" ><?php print($cmr->translate("|exit|"));?></a>
 </li>



</ul></div>
<?php
print($division->close());

?>
