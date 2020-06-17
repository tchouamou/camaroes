<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * front_page.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























front_page.php,Ver 3.0  2011-Oct-Tue 15:13:38  
*/

/**
 * Information about
 * $cmr->db["sql_query1"] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->action["form_action_message"] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_soc_type")) return;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Update client";
// $division->module["text"] = "";





// 












print($division->show_noclose());

$id = $cmr->get_user("auth_id");
if(!isset($cmr->post_var["id_groups"])){
$id = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);
}else{
    $id = $cmr->post_var["id_groups"];
}

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_front_page.php?conf_name=templates/modules/conf_front_page.ini", 1);
$lk->add_link("modules/admin/config_menu.php?conf_name=templates/modules/conf_menu.ini", 1);
$lk->add_link("modules/admin/config_template.php?conf_name=templates/modules/conf_template.ini", 1);
$lk->add_link("modules/admin/config_all.php?conf_name=conf.d/modules/conf_all.ini", 1);
print($lk->open_module_tab(1));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=tab&middle2=", "", $cmr->translate("Policy tab"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=query&middle2=", "", $cmr->translate("Policy query"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=module&middle2=", "", $cmr->translate("Policy module"));
$lk->add_link("modules/admin/config_policy.php?conf_name=conf.d/modules/conf_policy.ini&policy_mode=lib&middle2=", "", $cmr->translate("Policy lib"));

$lk->add_link("modules/admin/config_default_conf.php?conf_name=conf.d/modules/conf_default_conf.ini", 1);
$lk->add_link("modules/admin/config_default_page.php?conf_name=conf.d/modules/conf_default_page.ini", 1);
$lk->add_link("modules/admin/config_default_lang.php?conf_name=conf.d/modules/conf_default_lang.ini", 1);
$lk->add_link("modules/admin/config_default_theme.php?conf_name=conf.d/modules/conf_default_theme.ini", 1);

$lk->add_link("modules/admin/configure_conf.php?conf_name=conf.d/modules/conf_configure_conf.ini", 1);
$lk->add_link("modules/admin/configure_page.php?conf_name=conf.d/modules/conf_configure_page.ini", 1);
$lk->add_link("modules/admin/configure_lang.php?conf_name=conf.d/modules/conf_configure_lang.ini", 1);
$lk->add_link("modules/admin/configure_theme.php?conf_name=conf.d/modules/conf_configure_theme.ini", 1);
$lk->add_link("modules/admin/configure_tab.php?conf_name=conf.d/modules/conf_configure_tab.ini", 1);
$lk->add_link("modules/menu_config.php?conf_name=conf.d/modules/conf_config.ini", 1);
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="front_page_div">

<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_config_menu.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>

<fieldset class="bubble"><legend><?php  print($cmr->translate("destination:"));?></legend>
<table border="1" align="center" >
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to user"));?>:
	<select class="select_class" name="dest_user" width="200">
	<?php 
	print("<option value=\"\">" . $cmr->translate("default") . "</option>");
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email,state", "column", $cmr->config["db_name"], "uid", $cmr->config["cmr_max_view"], "uid", "35") );
	?>
	</select>
 </td>
 </tr>
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to group"));?>:
	<select class="select_class" name="dest_group" width="200">
	<?php 
	print("<option value=\"\">" . $cmr->translate("default") . "</option>");
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->config["db_name"], "name", $cmr->config["cmr_max_view"], "name", "35") );
	?>
	</select>
 </td>
 </tr>
</table>
</fieldset>



<br />
<table align="center" border="0" bordercolor="black" width="100%" cellspacing="0" >
<tr align="center"><td><?php print($cmr->translate("desktop_for_user"));
?></td></tr>

<tr align="center">
<td><textarea name="desktop"  rows="15" cols="160" ><?php print($cmr->get_page("desktop"));?></textarea></td>
</tr>
</table>
<br />


<br />
<table align="center" border="0" bordercolor="black" width="100%" cellspacing="0" >
<tr align="center"><td colspan="2"><?php print($cmr->translate("tab_for_user"));
?></td></tr>

<tr align="center">
<td><textarea name="tab"  rows="15" cols="160" ><?php print($cmr->get_page("tab"));?></textarea></td>
</tr>
</table>
<br />


<br />
<table align="center" border="0" bordercolor="black" width="100%" cellspacing="0" >
<tr align="center"><td colspan="2"><?php print($cmr->translate("menu1_for_user"));
?></td></tr>

<tr align="center">
<td><textarea name="menu1"  rows="15" cols="160" ><?php print($cmr->get_page("menu1"));?></textarea></td>
</tr>
</table>
<br />


<br />
<table align="center" border="0" bordercolor="black" width="100%" cellspacing="0" >
<tr align="center"><td colspan="2"><?php print($cmr->translate("menu2_for_user"));
?></td></tr>

<tr align="center">
<td><textarea name="menu2"  rows="15" cols="160" ><?php print($cmr->get_page("menu2"));?></textarea></td>
</tr>
</table>
<br />



<br />
<table align="center" border="0" bordercolor="black" width="100%" cellspacing="0" >
<tr align="center"><td colspan="2"><?php print($cmr->translate("menu_tree_for_user"));
?></td></tr>

<tr align="center">
<td><textarea name="menu_tree"  rows="15" cols="160" ><?php print($cmr->get_page("menu_tree"));?></textarea></td>
</tr>





 <tr align="left" >
  <td align="center" colspan="4">
   <input class="submit" type="submit" value="<?php print($cmr->translate("save"));
?>" onclick="this.class_module.value=front_page;return confirm('<?php print($cmr->translate("confirm that you want to save these menu"));?> ')"/>
   <input type="reset" onclick="return confirm('<?php print($cmr->translate("confirm that you want to empty this form"));?>')">
  </td>
 </tr>

 
 

</table>
</fieldset>
</form>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>
