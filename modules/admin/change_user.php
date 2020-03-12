<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * change_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























change_user.php,Ver 3.0  2011-Sep-Fri 21:50:35  
*/

/**
 * Information about
 * $cmr->db["sql_query1"] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->action["form_action_message"] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->user["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->user["message"] Is used for keeping
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
$division->module["title"] = $cmr->translate("current user: [" . $cmr->get_user("auth_email") . "]"); //$division->module["title"] = " Change user";
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
print($lk->open_module_tab(4));
?>
<div id="middle_div">
<p>

<?php


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);

$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/view_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->get_user("auth_id") . "", 1);
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->get_user("auth_id") . "", 1);

$lk->add_link("modules/report_user.php?id_user=" . $cmr->get_user("auth_id") . "&layer=2", 1);

$lk->add_link("modules/delete_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->get_user("auth_id") . "", 1);
$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->get_user("auth_id") . "", 1);
print($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_change_user.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<b><?php print($cmr->translate("change user :") . " (" . $cmr->get_user("auth_email") . ")");?></b>
<br />
<p  class="normal_text">
<?php  print($cmr->translate("usefull to change user of user (") . $cmr->get_user("auth_email") . ")");
?>
</p>
<br />



<table border="0" align="center" >



<tr align="left" >
<td style="text-align:right;" ><?php print($cmr->translate("select new user"));
?>:<span class="alert">*&nbsp;</span></td>
<td>

<select name="user_email" id="user_email" >
<?php 
    print("<option value=\"" . $cmr->get_user("auth_email") . "\" >" . $cmr->get_user("auth_email") . "</option>");
	print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'email,state', 'column', $cmr->config['db_name'], 'email', $cmr->config['cmr_max_view'], 'email', '35') );
?>
</select>

</td>
</tr>

<tr align="center" ><td align="center" colspan="4"><input class="submit" type="submit" value="<?php echo $cmr->translate("Select user");?>" onclick="return confirm('<?php print($cmr->translate("sure to change user"));
?>')"/></td></tr>

</table>
</form>
</div>
<?php
 print($lk->close_module_tab());
 print($division->close());
?>


