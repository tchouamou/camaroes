<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_user.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_user.php,Ver 3.0  2011-Sep 22:32:40  
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "user.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_comment.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "user" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("user" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("user.php");

$cmr->action["module_name"] = "user.php";
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("ticket" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("ticket" . $cmr->get_ext("help"));

$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// -----------

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "asset" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("asset" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("asset" . $cmr->get_ext("help"));

$cmr->action["to_load"] = "asset.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// -----------

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "download" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("download" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("download" . $cmr->get_ext("help"));

$cmr->action["to_load"] = "download.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "download.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["id_user"]))  {
	if(empty($cmr->post_var["id_user_email"])){ 
		$cmr->post_var["id_user"] = $cmr->get_user("auth_id");
		$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $cmr->post_var["id_user"]);
	}else{
		$user_email = trim($cmr->post_var["id_user_email"]);
		$cmr->post_var["id_user"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "id", "email", $user_email);
		}
}else{
	$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $cmr->post_var["id_user"]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"]= $mod->name;



$division->module["title"]= $cmr->translate($mod->base_name); 
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_user_title1"] = ""; 
$division->prints["match_user_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_user_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_user_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_legend_link"] = $cmr->translate("Links");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/new_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/update_user.php?conf_name=conf.d/modules/conf_user.ini&id=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/search_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/preview_user.php?conf_name=conf.d/modules/conf_user.ini&id_user=" . $cmr->post_var["id_user"], 1);
$lk->add_link("modules/report_user.php?id_user=" . $cmr->post_var["id_user"] . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(3);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/admin/change_pw.php?conf_name=conf.d/modules/conf_change_pw.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_uid.php?conf_name=conf.d/modules/conf_change_uid.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;
$lk->add_link("modules/admin/change_email.php?conf_name=conf.d/modules/conf_change_email.ini&id_user=" . $cmr->post_var["id_user"] . "&refresh=", 1);;

$lk->add_link("modules/view_user.php?conf_name=conf.d/conf_user.ini&id_user=".$cmr->post_var["id_user"]."", 1);
$lk->add_link("modules/admin/change_user.php?conf_name=conf.d/modules/conf_change_user.ini&id_user=" . $cmr->get_user("auth_id") . "&refresh=", 1);;
$lk->add_link("modules/menu_user.php?conf_name=conf.d/conf_user.ini&id_user=".$cmr->post_var["id_user"]."", 1);


$division->prints["match_list_link"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->prints["match_www_path"] = $cmr->get_path("www");


$division->prints["match_legend_user"] = $cmr->translate("user");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "user  ";
// $cmr->query["preview"] .=" WHERE (id = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_user"]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];

// // -----------
// $result_preview = &$cmr->db_connection->Execute($cmr->query["preview"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_user_id"] = $cmr->post_var["id_user"];
//----------
$pdf_data_text = "";
//----------
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "*", "id", $cmr->post_var["id_user"]);

if(!empty($result_value)){
if($result_value["id"]) $cmr->post_var["id_user"] = $result_value["id"];
//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_legend_allow"] = $cmr->translate("allow");

  $division->prints['match_label_id'] = $cmr->translate('id');
  $division->prints['match_value_id'] = show_column_value('id', $result_value["id"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('id') . ':' . $result_value["id"] . '\n';
  

  $division->prints['match_label_uid'] = $cmr->translate('uid');
  $division->prints['match_value_uid'] = show_column_value('uid', $result_value["uid"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('uid') . ':' . $result_value["uid"] . '\n';
  

  $division->prints['match_label_name'] = $cmr->translate('name');
  $division->prints['match_value_name'] = show_column_value('name', $result_value["name"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('name') . ':' . $result_value["name"] . '\n';
  

  $division->prints['match_label_last_name'] = $cmr->translate('last_name');
  $division->prints['match_value_last_name'] = show_column_value('last_name', $result_value["last_name"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('last_name') . ':' . $result_value["last_name"] . '\n';
  

  $division->prints['match_label_nickname'] = $cmr->translate('nickname');
  $division->prints['match_value_nickname'] = show_column_value('nickname', $result_value["nickname"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('nickname') . ':' . $result_value["nickname"] . '\n';
  

  $division->prints['match_label_sexe'] = $cmr->translate('sexe');
  $division->prints['match_value_sexe'] = show_column_value('sexe', $result_value["sexe"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('sexe') . ':' . $result_value["sexe"] . '\n';
  

  $division->prints['match_label_role'] = $cmr->translate('role');
  $division->prints['match_value_role'] = show_column_value('role', $result_value["role"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('role') . ':' . $result_value["role"] . '\n';
  

  $division->prints['match_label_sla'] = $cmr->translate('sla');
  $division->prints['match_value_sla'] = show_column_value('sla', $result_value["sla"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('sla') . ':' . $result_value["sla"] . '\n';
  

  $division->prints['match_label_pw'] = $cmr->translate('pw');
  $division->prints['match_value_pw'] = show_column_value('pw', $result_value["pw"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('pw') . ':' . $result_value["pw"] . '\n';
  

  $division->prints['match_label_email'] = $cmr->translate('email');
  $division->prints['match_value_email'] = show_column_value('email', $result_value["email"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('email') . ':' . $result_value["email"] . '\n';
  

  $division->prints['match_label_email_sign'] = $cmr->translate('email_sign');
  $division->prints['match_value_email_sign'] = show_column_value('email_sign', $result_value["email_sign"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('email_sign') . ':' . $result_value["email_sign"] . '\n';
  

  $division->prints['match_label_tel'] = $cmr->translate('tel');
  $division->prints['match_value_tel'] = show_column_value('tel', $result_value["tel"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('tel') . ':' . $result_value["tel"] . '\n';
  

  $division->prints['match_label_cel'] = $cmr->translate('cel');
  $division->prints['match_value_cel'] = show_column_value('cel', $result_value["cel"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('cel') . ':' . $result_value["cel"] . '\n';
  

  $division->prints['match_label_home'] = $cmr->translate('home');
  $division->prints['match_value_home'] = show_column_value('home', $result_value["home"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('home') . ':' . $result_value["home"] . '\n';
  

  $division->prints['match_label_adress'] = $cmr->translate('adress');
  $division->prints['match_value_adress'] = show_column_value('adress', $result_value["adress"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('adress') . ':' . $result_value["adress"] . '\n';
  

  $division->prints['match_label_location'] = $cmr->translate('location');
  $division->prints['match_value_location'] = show_column_value('location', $result_value["location"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('location') . ':' . $result_value["location"] . '\n';
  

  $division->prints['match_label_state'] = $cmr->translate('state');
  $division->prints['match_value_state'] = show_column_value('state', $result_value["state"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('state') . ':' . $result_value["state"] . '\n';
  

  $division->prints['match_label_type'] = $cmr->translate('type');
  $division->prints['match_value_type'] = show_column_value('type', get_user_type($result_value), $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('type') . ':' . get_user_type($result_value) . '\n';
  

  $division->prints['match_label_status'] = $cmr->translate('status');
  $division->prints['match_value_status'] = show_column_value('status', $result_value["status"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('status') . ':' . $result_value["status"] . '\n';
  

  $division->prints['match_label_lang'] = $cmr->translate('lang');
  $division->prints['match_value_lang'] = show_column_value('lang', $result_value["lang"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('lang') . ':' . $result_value["lang"] . '\n';
  

  $division->prints['match_label_style'] = $cmr->translate('style');
  $division->prints['match_value_style'] = show_column_value('style', $result_value["style"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('style') . ':' . $result_value["style"] . '\n';
  

  $division->prints['match_label_login_script'] = $cmr->translate('login_script');
  $division->prints['match_value_login_script'] = show_column_value('login_script', $result_value["login_script"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('login_script') . ':' . $result_value["login_script"] . '\n';
  

  $division->prints['match_label_certificate'] = $cmr->translate('certificate');
  $division->prints['match_value_certificate'] = show_column_value('certificate', $result_value["certificate"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('certificate') . ':' . $result_value["certificate"] . '\n';
  

  $division->prints['match_label_photo'] = $cmr->translate('photo');
  $division->prints['match_value_photo'] = show_column_value('photo', $result_value["photo"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('photo') . ':' . $result_value["photo"] . '\n';
  

//   $division->prints['match_label_my_master'] = $cmr->translate('my_master');
//   $division->prints['match_value_my_master'] = show_column_value('my_master', $result_value["my_master"], $cmr->post_var["id_user"]);
//   $pdf_data_text .= $cmr->translate('my_master') . ':' . $result_value["my_master"] . '\n';
//   

//   $division->prints['match_label_allow_type'] = $cmr->translate('allow_type');
//   $division->prints['match_value_allow_type'] = show_column_value('allow_type', $result_value["allow_type"], $cmr->post_var["id_user"]);
//   $pdf_data_text .= $cmr->translate('allow_type') . ':' . $result_value["allow_type"] . '\n';
//     

//   $division->prints['match_label_allow_groups'] = $cmr->translate('allow_groups');
//   $division->prints['match_value_allow_groups'] = show_column_value('allow_groups', $cmr->user["auth_list_group"], $cmr->post_var["id_user"]);
//   $pdf_data_text .= $cmr->translate('allow_groups') . ':' . $cmr->user["auth_list_group"] . '\n';
//   

//   $division->prints['match_label_comment'] = $cmr->translate('comment');
//   $division->prints['match_value_comment'] = show_column_value('comment', $result_value["comment"], $cmr->post_var["id_user"]);
//   $pdf_data_text .= $cmr->translate('comment') . ':' . $result_value["comment"] . '\n';
  

  $division->prints['match_label_date_time'] = $cmr->translate('date_time');
  $division->prints['match_value_date_time'] = show_column_value('date_time', $result_value["date_time"], $cmr->post_var["id_user"]);
  $pdf_data_text .= $cmr->translate('date_time') . ':' . $result_value["date_time"] . '\n';
  

}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_user_id"] = $cmr->post_var["id_user"];
if(empty($GLOBALS["user_read"])) $GLOBALS["user_read"] = array();
	
if(!in_array ($cmr->post_var["id_user"], $GLOBALS["user_read"])){
    $cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "user', '" . $cmr->post_var["id_user"] . "' ,'read'");
    $cmr->post_var["current_user_id"] = $cmr->post_var["id_user"];
    array_push ($GLOBALS["user_read"], $cmr->post_var["id_user"]);
}
// --------------------
$pdf_data_text .= "\n===========================\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_pdf_title"] = "user";
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "";

$division->prints["match_pdf_data"] = wordwrap(htmlentities($pdf_data_text, 80));
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_user" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_preview_user" . $cmr->get_ext("template");

$division->template = $division->load_template($file_list);
$division->print_template("template1");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Group of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Group of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "groups.*, user_email, group_name FROM " . $cmr->get_conf("cmr_table_prefix") . "groups, " . $cmr->get_conf("cmr_table_prefix") . "user_groups  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE ((user_email='" . $user_email . "')";
$cmr->query[$cmr->action["table_name"]] .= " AND (name=group_name)";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_groups.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_groups.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include2")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Ticket of [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Ticket of [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = " SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "ticket.*, ";
$cmr->query[$cmr->action["table_name"]] .= " DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE  ((my_master not LIKE ('cmr_model'))";
// //$cmr->query[$cmr->action["table_name"]] .= " AND (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
$cmr->query[$cmr->action["table_name"]] .= " AND ((work_by='" . $user_email . "') or (assign_to LIKE ('%" . $user_email . "%')) or (call_log_user LIKE ('%" . $user_email . "%')) ";
$cmr->query[$cmr->action["table_name"]] .= ")";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_ticket.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_ticket.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include6")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "asset";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Asset of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Asset of user [") . $user_email . "]";;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "SELECT * ";
$cmr->query[$cmr->action["table_name"]] .= "FROM " . $cmr->get_conf("cmr_table_prefix") . "asset, " . $cmr->get_conf("cmr_table_prefix") . "policy ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (1";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.table_name='asset'";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.line_id=" . $cmr->get_conf("cmr_table_prefix") . "asset.id";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->get_conf("cmr_table_prefix") . "policy.state='enable'";
$cmr->query[$cmr->action["table_name"]] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "policy.allow_email like ('%" . $user_email . "%')) ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];


if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_asset.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_asset.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include3")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Last message of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Last message of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$cmr->query[$cmr->action["table_name"]] = "SELECT  * ";
$cmr->query[$cmr->action["table_name"]] .= " from ". $cmr->get_conf("cmr_table_prefix") ."message  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE ((users_dest like('%" . $user_email . "%') or sender like('%" . $user_email . "%'))";
// //$cmr->query[$cmr->action["table_name"]] .= " AND (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 30;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_message.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_message.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) if(cmr_match_include($division->template, "match_include7")) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Comment of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment of user [") . $user_email . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "comment ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (";
$cmr->query[$cmr->action["table_name"]] .= " (line_id = '" . $cmr->post_var["id_user"] . "') ";
$cmr->query[$cmr->action["table_name"]] .= " AND (table_name = '" . $cmr->get_conf("cmr_table_prefix") . "user') ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

if(empty($cmr->post_var[$mod->base_name . "_mode"])){
    $cmr->post_var[$mod->base_name . "_mode"] = "link_detail";
}

if(empty($cmr->post_var[$mod->base_name . "_limit"])){
    $cmr->post_var[$mod->base_name . "_limit"] = 50;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module")."modules/view_comment.php";
$file_list[] = $cmr->get_path("module")."modules/auto/view_comment.php";

$view_comment_file = cmr_good_file($file_list);
if(file_exists($view_comment_file))  if(cmr_match_include($division->template, "match_include1")) include($view_comment_file);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// -----------
// ------------------------
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;


$division->module["title"] = "download of user  [" . $user_email . "]";
print($division->show_noclose());
?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("links:"));?></legend>
<?php  
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/download.php?conf_name=conf.d/modules/conf_download.ini&refresh=", 1);;
$lk->add_link("modules/upload.php?conf_name=conf.d/modules/conf_upload.ini&refresh=", 1);;
print($lk->list_link());
?>
</fieldset>
<br />
<?php

$user_uid = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "uid", "id", $cmr->post_var["id_user"]);

// --------
$file_path = $cmr->get_path("home") . "home/users/" . $user_uid . "/download/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------
// --------
$file_path = $cmr->get_path("home") . "home/users/" . $user_uid . "/attach/";
show_download($cmr->config, $cmr->db_connection, $file_path, false);
// --------

print($division->close());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
