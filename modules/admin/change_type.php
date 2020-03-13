<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * change_type.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























change_type.php,Ver 3.0  2011-Sep-Fri 21:50:35  
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

if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));
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
$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Change Password";
// $division->module["text"] = "";





// 












print($division->show_noclose());

$id_groups = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);

if(empty($cmr->post_var["id_user"])){
	$id_user = $cmr->get_user("auth_id");
}else{
    $id_user = $cmr->post_var["id_user"];
}

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_email.php?conf_name=conf.d/modules/conf_change_email.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_type.php?conf_name=conf.d/modules/conf_change_type.ini&id_type=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/admin/change_user.php?conf_name=conf.d/modules/conf_change_user.ini&id_user=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/admin/change_groups.php?conf_name=conf.d/modules/conf_change_groups.ini&id_groups=" . $id_groups . "&refresh=", 1);;
print($lk->open_module_tab(3));
?>
<div id="change_type_div">

<?php


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/menu_db.php?conf_name=conf.d/modules/conf_db.ini", 1);;
$lk->add_link("modules/administrate.php?conf_name=conf.d/modules/conf_administrate.ini", 1);;

$lk->add_link("modules/desktop.php?conf_name=conf.d/modules/conf_desktop.ini", 1);;
$lk->add_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini", 1);;
print($lk->list_link());

if(empty($cmr->post_var["table_name"])) $cmr->post_var["table_name"] = "groups";
if(empty($cmr->post_var["column_name"])) $cmr->post_var["column_name"] = "type";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_change_type.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_".$cmr->post_var["table_name"]."\" name=\"table_name\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_".$cmr->post_var["column_name"]."\" name=\"column_name\" />"));?>
<br />
<p  class="normal_text">
<i><?php  
print($cmr->translate("change type of column <b>(" . $cmr->post_var["column_name"] . ")</b> for table <b>(" . $cmr->post_var["table_name"] . ")</b>"));
?></i>
</p>
<br />



<table border="0" class="normal_text" >
<td align="center">
<b>
<?php  
print($cmr->translate($cmr->post_var["column_name"]));
?>:
</b>
</td>
<td align="center">
<textarea class="textarea_class" rows="15" id="new_type" name="new_type" >
<?php 
print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . $cmr->post_var["table_name"], $cmr->post_var["column_name"], 'type_list', $cmr->config['db_name'], $cmr->post_var["column_name"], $cmr->config['cmr_max_view'], $cmr->post_var["column_name"], '35') );
?>
</textarea>
<br />
<br />
</td>
</tr>
<tr align="center" ><td align="center" colspan="4"><input class="submit" type="submit" value="<?php echo $cmr->translate("Change Column");?>" onclick="return confirm('<?php print($cmr->translate("sure to change column"));
?>')"/></td></tr>

</table>
</form>
</div>
<?php
 print($lk->close_module_tab());
 print($division->close());
?>
