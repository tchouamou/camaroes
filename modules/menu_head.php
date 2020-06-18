<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_head.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_head.php,  2011-Oct
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


$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = substr("(" . $cmr->get_conf("cmr_portal_short_name") . ")" . $cmr->get_conf("cmr_portal_name") . " ver. " . cmr_version . " &copy;2005" . $cmr->get_conf("cmr_company_name") . "" . $cmr->get_conf("cmr_company_address") . " Tel:" . $cmr->get_conf("cmr_company_tel"), 0, 120);
// $division->module["text"] = "";


















print($division->show_noclose());
// print("<b>");
// print($cmr->language['" . $mod->base_name . "_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
?>
<div id="menu_head_div">
<table border="0" class="normal_text" align="center" cellspacing="0" cellpadding="0">
<tr>

<td class="menu_row"  width="150" height="30" valign="middle" align="center" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">

<a href="index.php?conf=init">

<?php print(try_create_image($cmr->config, $cmr->language, "home", "home", $cmr->user["auth_lang"], "20", "90"));?>
<!--img src=<-php print("\"" . $cmr->get_path("image") . "images/button/" . $cmr->get_user("auth_lang") . "/home.png\"");
_> alt="|Home|" border="0" width="90" /-->

</a>
</td>

<?php
$module = explode("|\n", $cmr->get_page("menu1"));
foreach($module as $key => $value){
    if(!empty($value)){
		// ====================================================
        list($label, $mod_name, $image) = explode("|", $value);
		$label = trim($label);
		$mod_name = trim($mod_name);
		$image = trim($image);
		if(empty($mod_name)) $mod_name = $label;
		// ====================================================
        if(!is_file($image)) $image = dirname($image) . "/auto/" . basename($image);
		// ====================================================

		if(accept_mod($cmr->config, $cmr->user, $mod_name)){
        print("<td class=\"rown\"  width=\"150\" height=\"30\" valign=\"middle\" align=\"center\" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\"> ");
        if(file_exists($image)){
        print("<img src=\"" . $cmr_config["cmr_www_path"] . $image . "\" alt=\"|\" />");
      }else{
        print($cmr->module_icon($mod_name, "16"));  
      }
        print(" " . $cmr->module_link($mod_name, "1", $label));
        // }
        print("</td>");
    };
    };
}

?>
<td class="menu_row" width="150" height="30" valign="middle" align="center" onmouseover="this.style.backgroundColor='#00EEEE'" onmouseout="this.style.backgroundColor=''">
<a href="index.php?cmr_mode=logout" ><!--href="#" <onClick="window.close ();"-->
<?php print(try_create_image($cmr->config, $cmr->language, "exit", "exit", $cmr->user["auth_lang"], "20", "90"));?>
<!--img src=<-php print("\"" . $cmr->get_path("lang") . "images/button/" . $cmr->get_user("auth_lang") . "/exit.png\"");
_> alt="|Exit|" border="0" width="90" / -->
</a>
</td>
</tr>
</table>
</div>
<?php

print($division->close());
?>
