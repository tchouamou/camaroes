<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * change_account.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



change_account.php,Ver 3.0  2011-Sep-Fri 21:50:35  
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




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Change email";
// $division->module["text"] = "";


$division->prints["match_open_windows"] = $division->show_noclose();


$id_groups = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "groups", "id", "name", $cmr->user["auth_group"]);


if(empty($cmr->post_var["id_user"])){
	$id_user = $cmr->get_user("auth_id");
}else{
    $id_user = $cmr->post_var["id_user"];
}

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_account.php?conf_name=conf.d/modules/conf_change_account.ini&id_user=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/change_type.php?conf_name=conf.d/modules/conf_change_type.ini&id_type=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/admin/change_user.php?conf_name=conf.d/modules/conf_change_user.ini&id_user=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/admin/change_groups.php?conf_name=conf.d/modules/conf_change_groups.ini&id_groups=" . $id_groups . "&refresh=", 1);;
$division->prints["match_open_tab"] = ($lk->open_module_tab(2));


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/update_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $id_groups . "&refresh=", 1);;
$lk->add_link("modules/admin/new_groups.php?conf_name=conf.d/modules/conf_groups.ini&id=" . $id_groups . "&refresh=", 1);;
$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $id_user . "&refresh=", 1);;
$lk->add_link("modules/view_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);
$lk->add_link("modules/report_user.php?id_user=" . $id_user . "&layer=2", 1);

$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $id_user . "", 1);


$division->prints["match_link_list"] = ($lk->list_link());
// $user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id_user);


$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id_user);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_legend"] = $cmr->translate("Links");
$division->prints["match_user_title1"] = $cmr->get_title($mod->base_name);
$division->prints["match_user_title2"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_form_param"] = "";

$division->prints["match_input_hidden_module"] = cmr_input_hidden("middle1", __FILE__ , "hidden");
$division->prints["match_input_hidden_get"] = cmr_input_hidden("cmr_get_data", "get_data/get_change_account.php", "hidden");
$division->prints["match_input_hidden_conf"] = cmr_input_hidden("cmr_conf", "conf.d/modules/conf_change_account" . $cmr->get_ext("conf"), "hidden");
$division->prints["match_input_hidden_id"] = cmr_input_hidden("id_user", $id_user, "hidden");
?>


<?php print($cmr->translate("change email of:") . " (" . $user_email . ")");?></b>


<?php  print($cmr->translate("usefull to change email of user (") . $user_email . ")");?>
<?php print($cmr->translate("email_new"));?>
<?php print($cmr->translate("email_new_confirm"));?>
<input class="submit" type="submit" value="<?php echo $cmr->translate("Change email");?>" onclick="return confirm('<?php print($cmr->translate("sure to change email"));?>')"/>


<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/change_account" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/change_account" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/change_account" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
$division->print_template();
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>


