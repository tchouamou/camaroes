<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_default.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_default.php,Ver 3.0  2011-Sep 22:32:40  
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




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = "Left Menu";
$division->module["title"] = "Admin";
// $division->module["text"] = "";


















print($division->show_noclose());
// print("<b>");
// print($cmr->language['" . $mod->base_name . "_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
// open_finestra($cmr->config, $cmr->language, $mod->name, $mod->rown_position, $mod->col_position, "Left Menu");
print("<div id=\"menu_default_div\">");
print("<ul class=\"cmr_menu\">");


//-----------

$module = explode("|\n", $cmr->get_page("menu2"));
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
        print("<li class=\"" . "row" . ($key % 2) . " \" onmouseover=\"this.style.backgroundcolor='#00eeee'\" onmouseout=\"this.style.backgroundcolor=''\"> ");
        (file_exists($image))?print("<img src=\"" . $cmr_config["cmr_www_path"] . $image . "\" alt=\"|\" />"):print($cmr->module_icon($mod_name, "16");           
        print($cmr->module_link($mod_name, "", $label));
        print("</li>");
    };
    };
};

//-----------

?>


 <li>
  <?php print("->" . $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini"));
?>
 </li>


<?php
print("</ul></div> ");

print($division->close());

?>




