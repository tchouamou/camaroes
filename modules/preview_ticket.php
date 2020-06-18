<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_ticket.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_ticket.php,Ver 3.0  2011-Jun-Mon 04:02:34
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

if($cmr->post_var["cmr_get_data"] == "get_data/get_comment_ticket.php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_ticket")) $cmr->post_var["id_ticket"] = get_post("id_ticket");
if(empty($cmr->post_var["id_ticket"])) $cmr->post_var["id_ticket"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "id");
if(empty($cmr->post_var["id_ticket"])){
	print($cmr->translate("No ticket selected! clic here => "));
	print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket" . $cmr->get_ext("conf") . "&id_ticket=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);



// $division->module["name"] = $mod->name;



$division->module["title"] = $cmr->translate($mod->base_name); 
// $division->module["text"] = "";





// 












$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_class_div"] = "preview_ticket_div";

$division->prints["match_preview_ticket_title1"] = ""; 
$division->prints["match_preview_ticket_title2"] = ""; 
if(($cmr->translate($mod->base_name))) 
$division->prints["match_preview_ticket_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name."_title"])) 
$division->prints["match_preview_ticket_title2"] = $cmr->translate($mod->base_name . "_title");


$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_legend_link"] = $cmr->translate("Links");



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/update_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/search_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/preview_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/report_ticket.php?id_ticket=" . $cmr->post_var["id_ticket"] . "&layer=2", 1);
$division->prints["match_open_tab"] = $lk->open_module_tab(3);


$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/update_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/close_ticket.php?conf_name=conf.d/modules/conf_close_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/email_ticket.php?conf_name=conf.d/modules/conf_email_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/take_ticket.php?conf_name=conf.d/modules/conf_take_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/move_ticket.php?conf_name=conf.d/modules/conf_move_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$division->prints["match_list_link"] = $lk->list_link();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_new_ticket.php?conf_name=conf.d/modules/conf_new_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_pending_ticket.php?conf_name=conf.d/modules/conf_pending_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_closed_ticket.php?conf_name=conf.d/modules/conf_closed_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_my_ticket.php?conf_name=conf.d/modules/conf_my_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_unread_ticket.php?conf_name=conf.d/modules/conf_unread_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_expired_ticket.php?conf_name=conf.d/modules/conf_expired_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_model_ticket.php?conf_name=conf.d/modules/conf_model_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$division->prints["match_list_link1"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_www_path"] = $cmr->get_path("www");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["preview"] = "SELECT * FROM  " . $cmr->get_conf("cmr_table_prefix") . "ticket  ";
// $cmr->query["preview"] .=" WHERE (id = " . sprintf("'%s'", cmr_escape($cmr->post_var["id_ticket"]));
// $cmr->query["preview"] .= ")  ";
// $cmr->query["preview"] .= " AND " . $cmr->action["where"];

// // -----------
// $cmr->db["result"]["preview"] = &$cmr->db_connection->Execute($cmr->query["preview"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_ticket_id"] = $cmr->post_var["id_ticket"];
//----------
$pdf_data_text = "";
//----------
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "*", "id", $cmr->post_var["id_ticket"]);

if(!empty($result_value)){
// if($result_value["id"]) $cmr->post_var["id_ticket"] = $result_value["id"];
//----------
$pdf_data_text .= "\n" . $cmr->translate("DATE:") . date("e") ."\n\n" . $cmr->translate("TEXT:") . ":\n";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_legend_allow"] = $cmr->translate("allow");

  $division->prints["match_label_id"] = $cmr->translate("id");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_id"] = $result_value["id"];
  $pdf_data_text .= $cmr->translate("id") . ':' . $result_value["id"] . '\n';
}else{
  $division->prints["match_value_id"] = "";
	}
  $division->prints["match_label_number"] = $cmr->translate("number");
  $division->prints["match_value_number"] = $result_value["number"];
  $pdf_data_text .= $cmr->translate("number") . ':' . $result_value["number"] . '\n';
  

  $division->prints["match_label_lang"] = $cmr->translate("language");
  $division->prints["match_value_lang"] = $result_value["lang"];
  $pdf_data_text .= $cmr->translate("language") . ':' . $result_value["lang"] . '\n';
  

  $division->prints["match_label_title"] = $cmr->translate("title");
  $division->prints["match_value_title"] = htmlentities($result_value["mail_title"]);
  $pdf_data_text .= $cmr->translate("title") . ':' . $result_value["title"] . '\n';
  

  $division->prints["match_label_work_by"] = $cmr->translate("work_by");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_work_by"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["work_by"]);
  $pdf_data_text .= $cmr->translate("work_by") . ':' . $result_value["work_by"] . '\n';
}else{
  $division->prints["match_value_work_by"] = "";
	}

  $division->prints["match_label_call_log_user"] = $cmr->translate("call_log_user");
  $division->prints["match_value_call_log_user"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["call_log_user"]);
  $pdf_data_text .= $cmr->translate("call_log_user") . ':' . $result_value["call_log_user"] . '\n';
  

  $division->prints["match_label_call_log_group"] = $cmr->translate("call_log_group");
  $division->prints["match_value_call_log_group"] = group_info_link($cmr->config, $cmr->page, $cmr->language, $result_value["call_log_group"]);
  $pdf_data_text .= $cmr->translate("call_log_group") . ':' . $result_value["call_log_group"] . '\n';
  

  $division->prints["match_label_call_method"] = $cmr->translate("call_method");
  $division->prints["match_value_call_method"] = $result_value["call_method"];
  $pdf_data_text .= $cmr->translate("call_method") . ':' . $result_value["call_method"] . '\n';
  

  $division->prints["match_label_state"] = $cmr->translate("state");
  $division->prints["match_value_state"] = $result_value["state"];
  $pdf_data_text .= $cmr->translate("state") . ':' . $result_value["state"] . '\n';
  

  $division->prints["match_label_state_now"] = $cmr->translate("state_now");
  $division->prints["match_value_state_now"] = $result_value["state_now"];
  $pdf_data_text .= $cmr->translate("state_now") . ':' . $result_value["state_now"] . '\n';
  

  $division->prints["match_label_assign_to"] = $cmr->translate("assign_to");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_assign_to"] = list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $result_value["assign_to"]);
  $pdf_data_text .= $cmr->translate("assign_to") . ':' . $result_value["assign_to"] . '\n';
}else{
  $division->prints["match_value_assign_to"] = "";
	}
  

  $division->prints["match_label_list_user_impact"] = $cmr->translate("list_user_impact");
  $division->prints["match_value_list_user_impact"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["list_user_impact"]);
  $pdf_data_text .= $cmr->translate("list_user_impact") . ':' . $result_value["list_user_impact"] . '\n';
  

  $division->prints["match_label_list_group_impact"] = $cmr->translate("list_group_impact");
  $division->prints["match_value_list_group_impact"] = $result_value["list_group_impact"];
  $pdf_data_text .= $cmr->translate("list_group_impact") . ':' . $result_value["list_group_impact"] . '\n';
  

  $division->prints["match_label_list_asset_impact"] = $cmr->translate("list_asset_impact");
  $division->prints["match_value_list_asset_impact"] = $result_value["list_asset_impact"];
  $pdf_data_text .= $cmr->translate("list_asset_impact") . ':' . $result_value["list_asset_impact"] . '\n';
  

  $division->prints["match_label_severity"] = $cmr->translate("severity");
  $division->prints["match_value_severity"] = $result_value["severity"];
  $pdf_data_text .= $cmr->translate("severity") . ':' . $result_value["severity"] . '\n';
  

  $division->prints["match_label_sla"] = $cmr->translate("sla");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_sla"] = $result_value["sla"];
  $pdf_data_text .= $cmr->translate("sla") . ':' . $result_value["sla"] . '\n';
}else{
  $division->prints["match_value_sla"] = "";
	}
  

  $division->prints["match_label_mail_title"] = $cmr->translate("mail_title");
  $division->prints["match_value_mail_title"] = htmlentities($result_value["mail_title"]);
  $pdf_data_text .= $cmr->translate("mail_title") . ':' . $result_value["mail_title"] . '\n';
  

  $division->prints["match_label_mail_from"] = $cmr->translate("mail_from");
  $division->prints["match_value_mail_from"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_from"]);
  $pdf_data_text .= $cmr->translate("mail_from") . ':' . $result_value["mail_from"] . '\n';
  

  $division->prints["match_label_mail_to"] = $cmr->translate("mail_to");
  $division->prints["match_value_mail_to"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_to"]);
  $pdf_data_text .= $cmr->translate("mail_to") . ':' . $result_value["mail_to"] . '\n';
  

  $division->prints["match_label_mail_cc"] = $cmr->translate("mail_cc");
  $division->prints["match_value_mail_cc"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_cc"]);
  $pdf_data_text .= $cmr->translate("mail_cc") . ':' . $result_value["mail_cc"] . '\n';
  

  $division->prints["match_label_mail_bcc"] = $cmr->translate("mail_bcc");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_mail_bcc"] = list_user_link($cmr->config, $cmr->page, $cmr->language, $result_value["mail_bcc"]);
  $pdf_data_text .= $cmr->translate("mail_bcc") . ':' . $result_value["mail_bcc"] . '\n';
}else{
  $division->prints["match_value_mail_bcc"] = "";
	}
  

  $division->prints["match_label_attach"] = $cmr->translate("attach");$division->prints["match_value_attach"] = list_attach_link($result_value["attach"], "", ", ");
  $pdf_data_text .= $cmr->translate("attach") . ':' . $result_value["attach"] . '\n';
  

  $division->prints["match_label_type"] = $cmr->translate("type");
  $division->prints["match_value_type"] = $result_value["type"];
  $pdf_data_text .= $cmr->translate("type") . ':' . $result_value["type"] . '\n';
  

  $division->prints["match_label_text"] = $cmr->translate("description");
  $division->prints["match_value_text"] = wordwrap(htmlentities($result_value["text"], 100));
  $pdf_data_text .= $cmr->translate("text") . ':' . $result_value["text"] . '\n';
  

  $division->prints["match_label_mail_text"] = $cmr->translate("mail_text");
  $division->prints["match_value_mail_text"] = wordwrap(htmlentities($result_value["mail_text"], 100));
  $pdf_data_text .= $cmr->translate("mail_text") . ':' . $result_value["mail_text"] . '\n';
  

  $division->prints["match_label_my_master"] = $cmr->translate("my_master");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_my_master"] = $result_value["my_master"];
  $pdf_data_text .= $cmr->translate("my_master") . ':' . $result_value["my_master"] . '\n';
}else{
  $division->prints["match_value_my_master"] = "";
	}
  

//   $division->prints["match_label_allow_type"] = $cmr->translate("allow_type");
//   $division->prints["match_value_allow_type"] = $result_value["allow_type"];
//   $pdf_data_text .= $cmr->translate("allow_type") . ':' . $result_value["allow_type"] . '\n';
  

//   $division->prints["match_label_allow_email"] = $cmr->translate("allow_email");
//   $division->prints["match_value_allow_email"] = "";
  

//   $division->prints["match_label_allow_groups"] = $cmr->translate("allow_groups");
//   $division->prints["match_value_allow_groups"] = "";
  

  $division->prints["match_label_comment"] = $cmr->translate("comment");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
  $division->prints["match_value_comment"] = htmlentities(wordwrap($result_value["comment"], 100));
  $pdf_data_text .= $cmr->translate("comment") . ':' . wordwrap($result_value["comment"], 100) . '\n';
}else{
  $division->prints["match_value_comment"] = "";
	}
  

  $division->prints["match_label_date_time"] = $cmr->translate("date_time");
  $division->prints["match_value_date_time"] = date_link($cmr->config, $cmr->page, $cmr->language, strval($result_value["date_time"]));
  $pdf_data_text .= $cmr->translate("date_time") . ':' . $result_value["date_time"] . '\n';
  

 $division->prints["match_comment_hidden"] = cmr_input_hidden("cmr_get_data", "get_data/get_comment_ticket.php", "hidden");
 $division->prints["match_comment_hidden_id"] = cmr_input_hidden("id_ticket", $result_value["id"], "hidden");
  
  
  
  
  $division->prints["match_comment_submit"] = $cmr->translate("add comment");
  
  $division->prints["match_legend_ticket"] = $cmr->translate("ticket") . " [" . $result_value["number"] . "]" . " :" . substr($result_value["title"], 0 ,40);
  $division->prints["match_legend_info"] = $cmr->translate("info ticket");
  $division->prints["match_legend_state"] = $cmr->translate("state");
  $division->prints["match_legend_impact"] = $cmr->translate("impact");
  $division->prints["match_legend_allow"] = $cmr->translate("allow");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
	return;
	}
  $pdf_data_text .= "\n===========================\n";




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ;
$division->prints["match_pdf_title"] = $cmr->translate("Ticket") . ":[" . $result_value["number"] . "]" . $result_value["title"];
$division->prints["match_pdf_author"] = $cmr->get_user("auth_email");
$division->prints["match_pdf_file"] = "";
$division->prints["match_pdf_links"] = "";
$division->prints["match_pdf_data_type"] = "text";
$division->prints["match_pdf_dim_col"] = "0";
$division->prints["match_pdf_header"] = "[" . $result_value["number"] . "]";

$division->prints["match_pdf_data"] = wordwrap(htmlentities($result_value["mail_text"]), 100);
$division->prints["match_pdf_confirm"] = $cmr->translate("confirm");


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close(); 
$division->prints["ticket_story"] = $cmr->translate("story_of_ticket ") . " " . $result_value["number"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$GLOBALS["current_ticket_id"] = $cmr->post_var["id_ticket"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(empty($GLOBALS["ticket_read"])) $GLOBALS["ticket_read"] = array();

if(!in_array ($result_value["id"], $GLOBALS["ticket_read"])){
	$sql = "INSERT INTO " . $cmr->get_conf("cmr_table_prefix") . "history (id, user_email, table_name, line_id, action, date_time) VALUES ('', '" . $cmr->get_user("auth_email") . "', '" . $cmr->get_conf("cmr_table_prefix") . "ticket', '" . $result_value["id"] . "' ,'read',  NOW());";
    $cmr->db_connection->Execute($sql) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg()); 
    $cmr->post_var["current_ticket_id"] = $result_value["id"];

    array_push ($GLOBALS["ticket_read"], $result_value["id"]);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_preview_ticket" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);

$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template3");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// ------ ticket story--------







// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("story_of_ticket") . " [" . $result_value["number"] . "] " . $result_value["title"];
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("story_of_ticket") . " [" . $result_value["number"] . "] " . $result_value["title"];
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket ";
$cmr->query[$cmr->action["table_name"]] .= "WHERE (((id!='" . $cmr->post_var["id_ticket"] . "') AND (number='" . $result_value["number"] . "')) ";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))
$cmr->post_var[$mod->base_name . "_mode"] = "link_detail";

if(empty($cmr->post_var[$mod->base_name . "_limit"]))
$cmr->post_var[$mod->base_name . "_limit"] = 50;

$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_ticket.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_ticket.php";
$view_ticket_file = cmr_good_file($file_list);

if(file_exists($view_ticket_file)) if(cmr_match_include($division->template, "match_include1")) include($view_ticket_file);
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
// $cmr->action["table_name"] = "ticket";
// $cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Analyse of " . $cmr->action["table_name"]);
// $cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Procedure analyse of " . $cmr->action["table_name"]);;
// $cmr->action[$cmr->action["table_name"] . "_title2"] = "";
// $cmr->action["column"] = "";
// $cmr->action["action"] = "select";
// $cmr->action["where"] = $cmr->where_query();
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->post_var["sql"] = "SELECT *  FROM  " . $cmr->get_conf("cmr_table_prefix") . $cmr->action["table_name"]." procedure analyse() ";


// if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_developer_type")){
// if(cmr_match_include($division->template, "match_include2")) include($cmr->get_path("module") ."modules/admin/preview_sql.php");
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
