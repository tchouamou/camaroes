<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * commands.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



commands.php,  2011-Oct
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
$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";





print($division->show_noclose());
// print("<b>");
// print($cmr->language['" . $mod->base_name . "_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
?>

<div id="commands_div">

<form  action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_commands.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>

<select name="com_action" id="com_action">
<option value="cmr"><?php echo $cmr->translate("Run ");?>
<?php print($cmr->get_conf("cmr_portal_short_name"));
?></option>
<option value="search"><?php print($cmr->translate("search"));?></option>
<option value="google"><?php print($cmr->translate("google"));?></option>
<option value="yahoo"><?php print($cmr->translate("yahoo"));?></option>
<option value="html"><?php print($cmr->translate("run html"));?></option>
<?php
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){

    ?>
<option value="url"><?php print($cmr->translate("url"));?></option>
<option value="jscrip"><?php print($cmr->translate("run java script"));?></option>
<option value="php"><?php print($cmr->translate("run php"));?></option>
<option value="ebay"><?php print($cmr->translate("ebay"));?></option>
<option value="sql"><?php print($cmr->translate("run sql"));?></option>
<option value="linux"><?php print($cmr->translate("system"));?></option>
<option value="email"><?php print($cmr->translate("email"));?></option>
<!--option value="linux"><?php print($cmr->translate("run linux"));?></option>
<option value="uxix"><?php print($cmr->translate("run unix"));?></option>
<option value="windows"><?php print($cmr->translate("run windows"));?></option>
<option value="solaris"><?php print($cmr->translate("run solaris"));?></option>
<option value="model"><?php print($cmr->translate("run a model"));?></option-->
<?php
}

?>
</select>


<label><?php echo $cmr->translate("text")?>:</label><input type="text" name="com_text" size="90" />



<input class="submit" type="submit" value="<?php print($cmr->translate("run"));
?>" />
</form>
</div>
<?php
 
print($division->close());
?>
