<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_install.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_install.php,Ver 3.0  2011-May-Mon 09:34:00
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


<div id="left_menu_install_div">
<ul class="cmr_menu">



 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <a href="index.php?conf=init"><?php print($cmr->translate(" |home| "));?></a>
 </li>





 <li>
  <?php print($cmr->module_icon("install.php", "16") . $cmr->module_link("install/install.php"));
?>
 </li>




 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <?php print($cmr->module_icon("install.php", "16") . $cmr->module_link("install/install_db.php"));
?>
 </li>




 <li>
  <?php print($cmr->module_icon("install.php", "16") . $cmr->module_link("install/update.php"));
?>
 </li>




 <li class="menu_row2" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
  <?php print($cmr->module_icon("install_need.php", "16") . $cmr->module_link("install/install_need.php"));
?>
 </li>



 <li>
  <?php print($cmr->module_icon("modules/menu_list.php", "16") . $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini"));
?>
 </li>




 <li>
  <a href="index.php?cmr_mode=logout" ><?php print($cmr->translate("|exit|"));?></a>
 </li>



</ul></div>
<?php
print($division->close());

?>
