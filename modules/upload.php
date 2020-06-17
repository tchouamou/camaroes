<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * upload.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























upload.php, Ver 3.03 
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //" upload";
// $division->module["text"] = "";


















print($division->show_noclose());


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/download.php?conf_name=conf.d/modules/conf_download.ini&refresh=", 1);;
$lk->add_link("modules/upload.php?conf_name=conf.d/modules/conf_upload.ini&refresh=", 1);;
print($lk->open_module_tab(1));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="upload_div">
<fieldset class="bubble"><legend><?php  print($cmr->translate("upload:"));?></legend>
<form name="ticket_form" action="index.php" method="post" ENCTYPE="multipart/form-data">
<input type=hidden name="MAX_FILE_SIZE" VALUE="32768000" />
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_upload.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<table class="normal_text" border="1" align="center" >
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to"));?>:
	<select class='select_class' name='destination' width='200'>
	<?php 
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->config["db_name"], "name", $cmr->config["cmr_max_view"], "name", "35") );
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email,state", "column", $cmr->config["db_name"], "email", $cmr->config["cmr_max_view"], "email", "35") );
	?>
	</select>
 </td>
 </tr>

 <tr align="left">
 <td align="left">
 <?php  print($cmr->translate("attach1"));?></td><td>

 <input type="file" name="attach1"  id="attach1" />
 </td>

 <td>
 <?php  print($cmr->translate("attach2"));?></td><td>
 <input type="file" name="attach2"  id="attach2" />
 </td>
 </tr>

 <tr>
 <td>
 <?php  print($cmr->translate("attach3"));?></td><td>
 <input type="file" name="attach3"  id="attach3" />
 </td>
 <td>
 <?php  print($cmr->translate("attach4"));?></td><td>
 <input type="file" name="attach4"  id="attach4" />
 </td>
 </tr>

 <tr align="left">
 <td align="left">
 <?php  print($cmr->translate("attach5"));?></td><td>
 <input type="file" name="attach5"  id="attach5" />
 </td>

 <td>
 <?php  print($cmr->translate("attach6"));?></td><td>
 <input type="file" name="attach6"  id="attach6" />
 </td>
 </tr>

 <tr>
 <td>
 <?php  print($cmr->translate("attach7"));?></td><td>
 <input type="file" name="attach7"  id="attach7" />
 </td>
 <td>
 <?php  print($cmr->translate("attach8"));?></td><td>
 <input type="file" name="attach8"  id="attach8" />
 </td>
 </tr>

 <tr align="left">
 <td align="left">
 <?php  print($cmr->translate("attach9"));?></td><td>
 <input type="file" name="attach9"  id="attach9" />
 </td>

 <td>
 <?php  print($cmr->translate("attach10"));?></td><td>
 <input type="file" name="attach10"  id="attach10" />
 </td>
 </tr>

 <tr>
 <td>
 <?php  print($cmr->translate("attach11"));?></td><td>
 <input type="file" name="attach11"  id="attach11" />
 </td>
 <td>
 <?php  print($cmr->translate("attach12"));?></td><td>
 <input type="file" name="attach12"  id="attach12" />
 </td>
 </tr>

<tr><td colspan="4" align="center">
<input  onclick="return confirm('<?php  print($cmr->translate("reset"));?>')"  type="reset" />
<input class="submit" id="submit1" type="submit" value="<?php  print($cmr->translate("upload"));?>" onsubmit="return confirm('OK ?')" />
</td></tr>
</table>
</form>
</fieldset>


</div>
<?php 
print($lk->close_module_tab());
print($division->close());
?>
