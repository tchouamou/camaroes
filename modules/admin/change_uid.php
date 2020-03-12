<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * change_uid.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























change_uid.php,Ver 3.0  2011-Sep-Fri 21:50:35  
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




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Change uid";
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
print($lk->open_module_tab(1));
?>
<div id="change_uid_div">
<p>

<?php


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $id_groups . "&refresh=", 1);;
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $id_groups . "&refresh=", 1);;
 ;
print("<br />");
if(empty($cmr->post_var["id_user"])){
	$id = $cmr->get_user("auth_id");
}else{
    $id = $cmr->post_var["id_user"];
}

$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id . "&refresh=", 1);;
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id . "&refresh=", 1);;
$lk->add_link("modules/view_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id . "", 1);
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id . "", 1);

$lk->add_link("modules/report_user.php?id_user=" . $id . "&layer=2", 1);

$lk->add_link("modules/delete_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id . "", 1);
$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id . "", 1);
print($lk->list_link());
// $user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id);


$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_change_uid.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $id . "\" name=\"id_user\" />"));?>
<b><?php print($cmr->translate("change uid of:") . " (" . $user_email . ")");?></b>
<br />
<p  class="normal_text">
<?php  print($cmr->translate("usefull to change uid of user (") . $user_email . ")");
?>
</p>
<br />



<table border="0" align="center" >

<!--tr align="left" >
<td><?php print($cmr->translate("uid_old"));
?>:</td><td><input type="uid" name="old_uid" /> </td>
</tr-->

<tr align="left" >
<td style="text-align:right;" ><?php print($cmr->translate("uid_new"));
?>:<span class="alert">*&nbsp;</span></td><td><input type="uid" name="new_uid1" /> </td>
</tr>

<tr align="left" >
<td style="text-align:right;"><?php print($cmr->translate("uid_new_confirm"));
?>:<span class="alert">*&nbsp;</span></td><td><input type="uid" name="new_uid2" /> </td>
</tr>
<tr align="center" ><td align="center" colspan="4"><input class="submit" type="submit" value="<?php echo $cmr->translate("Change uid");?>" onclick="return confirm('<?php print($cmr->translate("sure to change uid"));
?>')"/></td></tr>

</table>
</form>
</div>
<?php
print($lk->close_module_tab());
print($division->close());
?>
