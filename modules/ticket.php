<?php
/**
 * new_ticket.php
 *         ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.03 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes//
 */

 /* vim: set expandtab tabstop=4 shiftwidth=4: */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








 */

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $cmr->action["todo"] . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("ticket" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("ticket" . $cmr->get_ext("help"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "ticket.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$todo = $cmr->action["todo"];
if(empty($todo)) $todo = "new_ticket";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_ticket")) $cmr->post_var["id_ticket"] = get_post("id_ticket");
if(empty($cmr->post_var["id_ticket"])) $cmr->post_var["id_ticket"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "id");
if(empty($cmr->post_var["id_ticket"]) && ($todo != "new_ticket")){
	print($cmr->translate("No ticket selected! clic here => "));
	print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket" . $cmr->get_ext("conf") . "&id_ticket=", 1));
	print($cmr->translate(" to select one."));
    return;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ==============================================================
// ==============================================================
// ========================select client email===================
// ==============================================================
// ==============================================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;
$division->module["title"] = $cmr->translate($cmr->get_action("todo"));
// $division->module["title"] = " Open a news ticket";
// $division->module["text"] = "";
















$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/update_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/search_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/preview_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/report_ticket.php?id_ticket=" . $cmr->post_var["id_ticket"] . "&layer=2", 1);
$lk->add_link("modules/view_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);

$division->prints["match_open_tab"] = $lk->open_module_tab(0);
if($todo == "update_ticket") $division->prints["match_open_tab"] = $lk->open_module_tab(1);

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/close_ticket.php?conf_name=conf.d/modules/conf_close_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/email_ticket.php?conf_name=conf.d/modules/conf_email_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/take_ticket.php?conf_name=conf.d/modules/conf_take_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/escalate_ticket.php?conf_name=conf.d/modules/conf_escalate_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$division->prints["match_link_list"] = $lk->list_link();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_new_ticket.php?conf_name=conf.d/modules/conf_new_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_pending_ticket.php?conf_name=conf.d/modules/conf_pending_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_closed_ticket.php?conf_name=conf.d/modules/conf_closed_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_my_ticket.php?conf_name=conf.d/modules/conf_my_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_unread_ticket.php?conf_name=conf.d/modules/conf_unread_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_expired_ticket.php?conf_name=conf.d/modules/conf_expired_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$lk->add_link("modules/view_model_ticket.php?conf_name=conf.d/modules/conf_model_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
$division->prints["match_link_list1"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->translate($mod->base_name)))
$division->prints["match_ticket_title1"] = $cmr->translate($mod->base_name);
if(!empty($cmr->language[$mod->base_name . "_title"]))
$division->prints["match_ticket_title2"] = ucfirst($cmr->language[$mod->base_name . "_title"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_link_call_log_group"] = "";
$division->prints["match_link_call_log_user"] = "";
$division->prints["match_link_type"] = "";
$division->prints["match_link_state"] = "";
$division->prints["match_link_severity"] = "";
$division->prints["match_link_assign_to"] = "";
$division->prints["match_link_call_method"] = "";
$division->prints["match_link_list_user_impact"] = "";
$division->prints["match_link_list_group_impact"] = "";
$division->prints["match_link_list_asset_impact"] = "";
$division->prints["match_link_mail_from"] = "";
$division->prints["match_link_mail_to"] = "";
$division->prints["match_link_mail_cc"] = "";
$division->prints["match_link_mail_bcc"] = "";

$division->prints["match_ticket_title1"] = "";
$division->prints["match_ticket_title2"] = "";

$division->prints["match_noc_type"] = "";
$division->prints["match_label_model_title"] = "";
$division->prints["match_label_No_number"] = "";

$division->prints["match_value_model_title"] = "";
$division->prints["match_value_title"] = "";
$division->prints["match_value_mail_title"] = "";
$division->prints["match_value_mail_text"] = "";
$division->prints["match_value_model_id"] = "";
// $division->prints["match_value_allow_email"] = "";
// $division->prints["match_value_allow_groups"] = "";
// $division->prints["match_value_allow_type"] = "";
$division->prints["match_value_pre_text"] = "";
$division->prints["match_value_pre_mail_text"] = "";
$division->prints["match_value_comment"] = "";
$division->prints["match_value_list_asset_impact"] = "";
$division->prints["match_value_label_search_model"] = "";
$division->prints["match_value_my_master"] = "";
// $division->prints["match_value_allow_email"] = "";
// $division->prints["match_value_allow_groups"] = "";
// $division->prints["match_value_allow_type"] = "";
$division->prints["match_value_pre_email"] = "";
$division->prints["match_value_auth_group"] = $cmr->get_user("auth_group");
$division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"];
$division->prints["match_value_mail_to"] = $cmr->config["cmr_from_email"];
$division->prints["match_value_mail_cc"] = $cmr->config["cmr_cc_email"];
$division->prints["match_value_mail_bcc"] = $cmr->config["cmr_bcc_email"];
$division->prints["match_value_number"] = "";

$division->prints["match_options_code_insert"] = "";
$division->prints["match_options_state"] = "<option value=\"open\">" . $cmr->translate("open") . "</option>";
$division->prints["match_options_severity"] = "<option value=\"normal\">" . $cmr->translate("normal") . "</option>";;
$division->prints["match_options_type"] = "<option value=\"normal\">" . $cmr->translate("normal") . "</option>";;

$division->prints["ticket_text"] = "";
$division->prints["match_id_input"] = "";
$division->prints["match_value_model_number"] = "";
$division->prints["match_hidden_input"] = "";
// $division->prints["match_noc_type"] = "";
$division->prints["match_www_path"] = $cmr->get_path("www");
$division->prints["match_auth_group"] = $cmr->get_user("auth_group");
$division->prints["match_print"] = $cmr->translate("print");
$division->prints["match_problem"] = $cmr->translate("problem");
$division->prints["match_solution_title"] = $cmr->translate("Last solution ");
$division->prints["match_solution"] = "";

// $division->prints["match_label_No_number"] = "";
// $division->prints["match_label_model_title"] = "";
// $division->prints["match_label_id"] = "";
$division->prints["match_label_code"] = $cmr->translate("code");
$division->prints["match_label_delete"] = $cmr->translate("delete");
$division->prints["match_label_ticket_alert1"] = $cmr->translate("ticket_alert1");
$division->prints["match_label_ticket_alert2"] = $cmr->translate("ticket_alert2");
$division->prints["match_label_ticket_alert3"] = $cmr->translate("ticket_alert3");
$division->prints["match_label_ticket_alert4"] = $cmr->translate("ticket_alert4");
$division->prints["match_label_ticket_alert5"] = $cmr->translate("ticket_alert5");
$division->prints["match_label_ticket_alert6"] = $cmr->translate("ticket_alert6");
$division->prints["match_label_ticket_alert7"] = $cmr->translate("ticket_alert7");
$division->prints["match_label_ticket_alert8"] = $cmr->translate("ticket_alert8");
$division->prints["match_label_ticket_alert9"] = $cmr->translate("ticket_alert9");
$division->prints["match_label_ticket_alert10"] = $cmr->translate("ticket_alert10");
$division->prints["match_label_ticket_alert11"] = $cmr->translate("ticket_alert11");
$division->prints["match_label_ticket_alert12"] = $cmr->translate("ticket_alert12");
$division->prints["match_label_ticket_alert13"] = $cmr->translate("ticket_alert13");
$division->prints["match_label_ticket_alert14"] = $cmr->translate("ticket_alert14");
$division->prints["match_label_ticket_alert15"] = $cmr->translate("ticket_alert15");
$division->prints["match_label_ticket_alert16"] = $cmr->translate("ticket_alert16");

$division->prints["match_label_ticket_alert16"] = $cmr->translate("ticket_alert16");
$division->prints["match_label_ticket_alert17"] = $cmr->translate("ticket_alert17");
$division->prints["match_label_ticket_alert18"] = $cmr->translate("ticket_alert18");
$division->prints["match_label_ticket_alert19"] = $cmr->translate("ticket_alert19");
$division->prints["match_label_ticket_alert20"] = $cmr->translate("ticket_alert20");
$division->prints["match_label_ticket_alert21"] = $cmr->translate("ticket_alert21");
$division->prints["match_label_ticket_alert22"] = $cmr->translate("ticket_alert22");
$division->prints["match_label_ticket_alert23"] = $cmr->translate("ticket_alert23");
$division->prints["match_label_ticket_alert24"] = $cmr->translate("ticket_alert24");
$division->prints["match_label_ticket_alert25"] = $cmr->translate("ticket_alert25");
$division->prints["match_label_ticket_alert26"] = $cmr->translate("ticket_alert26");
$division->prints["match_label_ticket_alert27"] = $cmr->translate("ticket_alert27");
$division->prints["match_label_ticket_alert28"] = $cmr->translate("ticket_alert28");
$division->prints["match_label_ticket_alert29"] = $cmr->translate("ticket_alert29");

$division->prints["match_label_number"] = $cmr->translate("number");
$division->prints["match_label_property"] = $cmr->translate("property");
$division->prints["match_label_lang"] = $cmr->translate("language");
$division->prints["match_label_title"] = $cmr->translate("title");
$division->prints["match_label_work_by"] = $cmr->translate("work_by");
$division->prints["match_label_call_log_user"] = $cmr->translate("call_log_user");
$division->prints["match_label_call_log_group"] = $cmr->translate("call_log_group");
$division->prints["match_label_call_method"] = $cmr->translate("call_method");
$division->prints["match_label_state"] = $cmr->translate("state");
$division->prints["match_label_state_now"] = $cmr->translate("state_now");
$division->prints["match_label_assign_to"] = $cmr->translate("assign_to");
$division->prints["match_label_list_user_impact"] = $cmr->translate("list_user_impact");
$division->prints["match_label_list_group_impact"] = $cmr->translate("list_group_impact");
$division->prints["match_label_list_asset_impact"] = $cmr->translate("list_asset_impact");
$division->prints["match_label_severity"] = $cmr->translate("severity");
$division->prints["match_label_sla"] = $cmr->translate("sla");
$division->prints["match_label_mail_title"] = $cmr->translate("mail_title");
$division->prints["match_label_mail_from"] = $cmr->translate("mail_from");
$division->prints["match_label_mail_to"] = $cmr->translate("mail_to");
$division->prints["match_label_mail_cc"] = $cmr->translate("mail_cc");
$division->prints["match_label_mail_bcc"] = $cmr->translate("mail_bcc");
$division->prints["match_label_type"] = $cmr->translate("type");
$division->prints["match_label_text"] = $cmr->translate("text");
$division->prints["match_label_mail_text"] = $cmr->translate("mail_text");
$division->prints["match_label_my_master"] = $cmr->translate("my_master");
// $division->prints["match_label_allow_type"] = $cmr->translate("allow_type");
// $division->prints["match_label_allow_email"] = $cmr->translate("allow_email");
// $division->prints["match_label_allow_groups"] = $cmr->translate("allow_groups");
$division->prints["match_label_comment"] = $cmr->translate("comment");
$division->prints["match_label_date_time"] = $cmr->translate("date");
$division->prints["match_label_print"] = $cmr->translate("print");
$division->prints["match_label_mail_text"] = $cmr->translate("mail text");
$division->prints["match_label_normal"] = $cmr->translate("normal");
$division->prints["match_label_extend"] = $cmr->translate("extend");
$division->prints["match_label_db"] = $cmr->translate("database");
$division->prints["match_label_problem"] = $cmr->translate("poblem");
$division->prints["match_label_email"] = $cmr->translate("email");
$division->prints["match_label_attach"] = $cmr->translate("attach");
$division->prints["match_label_attach1"] = $cmr->translate("attach1");
$division->prints["match_label_attach2"] = $cmr->translate("attach2");
$division->prints["match_label_attach3"] = $cmr->translate("attach3");
$division->prints["match_label_attach4"] = $cmr->translate("attach4");
$division->prints["match_label_header"] = $cmr->translate("header");
$division->prints["match_label_action"] = $cmr->translate("action");
$division->prints["match_label_day"] = $cmr->translate("day");
$division->prints["match_label_microsecond"] = $cmr->translate("microsecond");
$division->prints["match_label_week"] =  $cmr->translate("week");;
$division->prints["match_label_day_microsecond"] = $cmr->translate("day microsecond");
$division->prints["match_label_second"] = $cmr->translate("second");
$division->prints["match_label_minute"] = $cmr->translate("minute");
$division->prints["match_label_hour"] = $cmr->translate("hour");
$division->prints["match_label_week"] = $cmr->translate("week");
$division->prints["match_label_month"] = $cmr->translate("month");
$division->prints["match_label_quarter"] = $cmr->translate("quarter");
$division->prints["match_label_year"] = $cmr->translate("year");
$division->prints["match_label_second_microsecond"] = $cmr->translate("second_microsecond");
$division->prints["match_label_minute_microsecond"] = $cmr->translate("minute_microsecond");
$division->prints["match_label_minute_second"] = $cmr->translate("minute_second");
$division->prints["match_label_hour_microsecond"] = $cmr->translate("hour_microsecond");
$division->prints["match_label_hour_second"] = $cmr->translate("hour_second");
$division->prints["match_label_hour_minute"] = $cmr->translate("hour_minute");
$division->prints["match_label_day_microsecond"] = $cmr->translate("day_microsecond");
$division->prints["match_label_day_second"] = $cmr->translate("day_second");
$division->prints["match_label_day_minute"] = $cmr->translate("day_minute");
$division->prints["match_label_day_hour"] = $cmr->translate("day_hour");
$division->prints["match_label_year_month"] = $cmr->translate("year_month");
//   $division->prints["match_label_email"] = $cmr->translate("email");
// -----------
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
// -----------
//$cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);

// -----------
// -----------

$tab_list_group = explode(", ", cmr_search_replace("'", "", $cmr->user["auth_list_group"]));
foreach($tab_list_group as $key => $val){
    $current_group = $val;

//     $cmr->query["list_email"] = "SELECT user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups,  " . $cmr->get_conf("cmr_table_prefix") . "groups, " . $cmr->get_conf("cmr_table_prefix") . "user WHERE  ";
//     $cmr->query["list_email"] .= " (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name='" . cmr_escape($current_group) . "')  ";
//     $cmr->query["list_email"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
//     $cmr->query["list_email"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email=" . $cmr->get_conf("cmr_table_prefix") . "user.email) ";
//     $cmr->query["list_email"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable') ";
//
//     $cmr->query["list_email"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user.state='enable') ";
//     $cmr->query["list_email"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable') ";
//     $cmr->query["list_email"] .= " AND (user_email not like '%localhost') ";
//     $cmr->query["list_email"] .= " AND  (" . $cmr->get_conf("cmr_table_prefix") . "groups.type<='" . $cmr->get_user("authorisation") . "') order by user_email;";
    // -----------
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->group = $current_group;
	$cmr->query["list_email"] = $qr->get_query("list_email");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // -----------
    // -----------
    $list_email = "";
    $list_email_cc = "";
    $list_email_bcc = "";
    // -----------
    if($cmr->db_connection)
    $result_te = $cmr->db_connection->query($cmr->query["list_email"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error); /*, $cmr->db_connection)*/ ;

    if($cmr->db_connection)
    if($result_te)
    while ($r_email1 = $result_te->fetch_row()){
        $list_email .= ", " . $r_email1[0];
//         $result_te->MoveNext();
    }
    // ==============================================================


    // ==============================================================
    // =============insert contact cmr_company_name=========
    // ==============================================================
    // ==============================================================
//     $cmr->query["list_email_cc"] = "SELECT user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups,  " . $cmr->get_conf("cmr_table_prefix") . "groups, " . $cmr->get_conf("cmr_table_prefix") . "user where  ";
//     $cmr->query["list_email_cc"] .= " (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name='" . cmr_escape($current_group) . "')  ";
//     $cmr->query["list_email_cc"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
//     $cmr->query["list_email_cc"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email=" . $cmr->get_conf("cmr_table_prefix") . "user.email) ";
//     $cmr->query["list_email_cc"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable') ";
//     $cmr->query["list_email_cc"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user.state='enable') ";
//     $cmr->query["list_email_cc"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable') ";
//     $cmr->query["list_email_cc"] .= " AND (user_email not like '%localhost') ";
//     $cmr->query["list_email_cc"] .= " AND  (" . $cmr->get_conf("cmr_table_prefix") . "groups.type<='" . $cmr->get_user("authorisation") . "')  order by user_email;";
    // -----------
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->group = $current_group;
	$cmr->query["list_email_cc"] = $qr->get_query("list_email_cc");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if($cmr->query["list_email_cc"]){
      if($cmr->db_connection)
	    $result_te_rif = $cmr->db_connection->query($cmr->query["list_email_cc"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
	    // -----------
	    if($result_te_rif)
	    while ($r_email2 = $result_te_rif->fetch_row()){
	        $list_email_cc .= ", " . $r_email2[0];
	        $result_te_rif->fetch_row();
	    }
	}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $list_email_cc .= ", " . $cmr->config["cmr_cc_email"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // �������������������������������������������������������������
    // �������������������������������������������������������������
    // �������������������������������������������������������������
    // ----- select client email---
// //     $cmr->query["client_email"] = "SELECT user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups,  " . $cmr->get_conf("cmr_table_prefix") . "groups where ";
// //     $cmr->query["client_email"] .= " (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name='" . cmr_escape($current_group) . "') ";
// //     $cmr->query["client_email"] .= "and (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name)";
// //     $cmr->query["client_email"] .= "and (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable')";
// //     $cmr->query["client_email"] .= "and (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable')";
// //     $cmr->query["client_email"] .= "and (user_email not like '%localhost')";
// //     $cmr->query["client_email"] .= "and (" . $cmr->get_conf("cmr_table_prefix") . "groups.type<='" . cmr_escape($cmr->get_user("authorisation")) . "');";
// 	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$qr->group = $current_group;
// 	$cmr->query["client_email"] = $qr->get_query("client_email");
// 	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//     $resulte = $cmr->db_connection->Execute($cmr->query["client_email"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//     // -----------
//     if($resulte)
//     while ($elt_bcc = $resulte->FetchRow()){
//         $list_email_bcc .= ", " . $elt_bcc[0];
//         $resulte->MoveNext();
//     }
    // -----------
    $list_email_bcc .= ", " . $cmr->config["cmr_bcc_email"];
    // -----------



    // -------insert group email  " . $cmr->get_conf("cmr_company_name") ."-----
    if(cmr_column_exist("group_email", $cmr->get_conf("cmr_table_prefix") ."groups", $cmr->db_connection)){
//     $cmr->query["group_emails"] = "SELECT group_email FROM " . $cmr->get_conf("cmr_table_prefix") ."groups ";
//     $cmr->query["group_emails"] .= " WHERE  (group_email NOT LIKE '%localhost') ";
//     $cmr->query["group_emails"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.name='" . cmr_escape($current_group) . "') ";
//     $cmr->query["group_emails"] .= " AND ((" . $cmr->get_conf("cmr_table_prefix") . "groups.state='active') or (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable'))";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->group = $current_group;
	$cmr->query["group_emails"] = $qr->get_query("group_emails");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //$cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);
    if($cmr->db_connection)
    $resulte_rif = $cmr->db_connection->query($cmr->query["group_emails"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
    //-----------
    if($elt_rif = $resulte_rif->fetch_row()){
    $list_email_bcc.=", " . $elt_rif[0];
    }
  	}


    // -------insert in bcc, work_by-----
    $list_email_bcc .=", " . $cmr->get_user("auth_email");//-- making ticket ---

//     // -------inserimento in bcc del messaggio a assign_to-----


    // ----List Client Email ---
    if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
//         $division->prints["match_value_mail_to"].=", " . $list_bcc;
    }else{
//         $division->prints["match_value_mail_cc"] .= ", " . $list_bcc;
    }
    // //--------------
    // �������������������������������������������������������������
    // �������������������������������������������������������������
    // �������������������������������������������������������������
    // -----------
    $list_email = cmr_search_replace("^[,][ ]", "", $list_email); //--remove comma at begin--
    $list_email_cc = cmr_search_replace("^[,][ ]", "", $list_email_cc); //--remove comma at begin--
    $list_email_bcc = cmr_search_replace("^[,][ ]", "", $list_email_bcc); //--remove comma at begin--
    // ----List Client Email html object generation---
    if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $current_group . "\" id=\"_" . $current_group . "\" value=\"" . $list_email . "\" />\n";
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $current_group . "_cc\" id=\"_" . $current_group . "_cc\" value=\"" . $list_email_cc . "\" />\n";
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $current_group . "_bcc\" id=\"_" . $current_group . "_bcc\" value=\"" . $list_email_bcc . "\" />\n";
        $email_cc = "";
    }else{
        if($current_group == $cmr->get_user("auth_group")) $email_cc = ", " . $list_email . $list_email_cc;
    }
    // -----------;
}
// ==============================================================
// ===========end select client email============================
// ==============================================================
// ==============================================================


// ==============================================================
// ===============number generate================================
// ==============================================================
// ��������������������������������������������������������������
// $cmr->config["no_number"] = $no_number;
$temp_numero = cmr_ticket_number($cmr->config, $cmr->db_connection);
// ��������������������������������������������������������������
// ==============================================================
// ==============================================================
// =============== end number generate ==========================
// ==============================================================
// ==============================================================
// ==============================================================
// ===============generate groups and emails=====================
// ==============================================================
// ==============================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->action["table_name"] = "groups";
	$cmr->action["column"] = "name";
	$cmr->action["action"] = "select";
	$cmr->action["where"] = $cmr->where_query();
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["t_group"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// $cmr->query["t_group"] .= " WHERE (state='enable') AND " . $cmr->action["where"];
// $cmr->query["t_group"] .= " ORDER BY name ";
// //$cmr->query["t_group"] .= " LIMIT " . $cmr->get_conf("cmr_max_view") . ";";
// // ==============================================================
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->where_query = $cmr->action["where"];
	$cmr->query["t_group"] = $qr->get_query("group_list");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// ==============================================================
if($cmr->db_connection)
	$result_group = $cmr->db_connection->query($cmr->query["t_group"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);

	$const = $cmr->get_conf("cmr_noc_type");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->type = $const;
	$cmr->query["t_group_name"] = $qr->get_query("list_group_name");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// 	$cmr->query["t_group_name"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "groups.name FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// 	$cmr->query["t_group_name"] .= "WHERE (" . $cmr->get_conf("cmr_table_prefix") . "groups.type>='$const') ORDER BY  " . $cmr->get_conf("cmr_table_prefix") . "groups.name;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->query["t_user_email"] = $qr->get_query("list_user_email");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// 	$cmr->query["t_user_email"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "user.email FROM " . $cmr->get_conf("cmr_table_prefix") . "user, " . $cmr->get_conf("cmr_table_prefix") . "user_groups, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// 	$cmr->query["t_user_email"] .= "WHERE (" . $cmr->get_conf("cmr_table_prefix") . "user.email=" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email) ";
// 	$cmr->query["t_user_email"] .= "AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
// 	$cmr->query["t_user_email"] .= "AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.type>='$const') ORDER BY " . $cmr->get_conf("cmr_table_prefix") . "groups.name;";

if($cmr->db_connection)
$result_group_name = $cmr->db_connection->query($cmr->query["t_group_name"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
if($cmr->db_connection)
	$result_user_email = $cmr->db_connection->query($cmr->query["t_user_email"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
// ==============================================================
// ==============================================================
// ===============end generate groups and emails=================
// ==============================================================
// ==============================================================
// ==============================================================
// ==============================================================
// ===============Action todo switch get=========================
// ==============================================================
// ==============================================================

// ==============================================================
// =======loading ticket id =====================================
if(!empty($cmr->post_var["id_ticket"])){
	$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "*", "id", $cmr->post_var["id_ticket"]);
}
// ==============================================================
$language = $cmr->get_page("language");
if(empty($language)) $language = "italian";
// ==============================================================
        $duedate = time() + (1 * 3 * 60 * 60);
        $division->prints["match_value_sla"]  = date("Y-m-d H:i:00", $duedate);
// ==============================================================


  $division->prints["match_options_mode"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
  $division->prints["match_options_mode"] .= "<option value=\"new_model\" >" . $cmr->translate("New model") . "</option>";
  $division->prints["match_options_mode"] .= "<option value=\"update_model\" >" . $cmr->translate("Update model") . "</option>";
};

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_input_hidden_conf"] = "";
$division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"get_data/get_" . $cmr->action["todo"] . ".php\" name=\"cmr_get_data\" />");
$division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"modules/" . $cmr->action["todo"] . ".php\" name=\"middle1\" />");
$division->prints["match_input_hidden_id_ticket"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["id_ticket"] . "\" name=\"id_ticket\" />");

$division->prints["match_label_code_insert"] = $cmr->translate("insert");
$division->prints["match_link_code_insert"] = $cmr->module_link("modules/new_code.php?conf_name=conf.d/modules/conf_code.ini", "", "->");

$division->prints["match_label_model"] = $cmr->translate("model");
$division->prints["match_link_model"] = $cmr->module_link("modules/ticket_from_model.php?conf_name=conf.d/modules/conf_ticket_from_model.ini", "", "->");

    // ==============================================================
// ==============case todo=======================================
// ==============================================================
switch ($todo){
    // ==============================================================
    // ==============model case =====================================
    // ==============================================================
    case "ticket_from_model":

	if(empty($cmr->post_var["id_ticket"])){
		print($cmr->translate("No ticket selected! clic here => "));
		print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"] . "", 1));
		print($cmr->translate(" to select one."));
// 	    return;
	}
        $todo_type = $result_value["type"];
        $todo_number = $result_value["number"];
        $todo_title = ($result_value["title"]);
        $todo_state = "open";
        $todo_number = $result_value["number"];
        $division->prints["match_options_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");


	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["title"] = $todo_title;
        $qr->sql_data["number"] = $todo_number;
        $qr->sql_data["lang"] = $language;
        $qr->sql_data["type"] = $todo_type;
        $qr->sql_data["state"] = $todo_state;
        $qr->sql_data["id_ticket"] = $cmr->post_var["id_ticket"];
		$cmr->query["t_model"] = $qr->get_query("ticket_id_model");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//         if($todo_number){
//             $cmr->query["t_model_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE ((number= '" . cmr_escape($todo_number) . "') or (my_master='cmr_model'))  and (lang='" . cmr_escape($language) . "')  and (type='" . cmr_escape($todo_type) . "') and (state='" . cmr_escape($todo_state) . "') and ((call_log_group in (" . $cmr->get_user("auth_list_group") . ")) or (call_log_group='') or (call_log_group=NULL))  order by id;";
//         }else{
//             $cmr->query["t_model_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (id='" . $cmr->post_var["id_ticket"] . "')";
//         }

//         $cmr->query["t_model"] = $cmr->query["t_model_model"];

if($cmr->db_connection)
$result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        $r_model = $result_t_model->fetch_object(false);
        // ========== Solution ===================
        $division->prints["match_value_model_id"] = $r_model->id;
        $r_model_number = $r_model->number;
//         $cmr->query["t_model_solution"] = "SELECT text FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (title LIKE '%" . cmr_escape($todo_title) . "%') AND (type='" . cmr_escape($todo_type) . "') AND (state='" . cmr_escape($todo_state) . "') AND ((call_log_group IN (" . $cmr->get_user("auth_list_group") . ")) OR (call_log_group='') OR (call_log_group=NULL))  ORDER BY id DESC ;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->query["t_model_solution"] = $qr->get_query("ticket_solution");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  if($cmr->db_connection)
$result_model_solution = $cmr->db_connection->query($cmr->query["t_model_solution"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        if(!empty($result_model_solution)) $r_model_solution = $result_model_solution->fetch_object(false);
        if(!empty($r_model_solution)) $division->prints["match_solution"] = $r_model_solution->text;
//         $result_model_solution->Close();
        // =======================================
        $division->prints["match_ticket_title1"] = $cmr->translate("new ticket from model");
        // ========== Solution ===================

        $division->prints["match_class_module"]  = "new_ticket";
        // ============================================
        // =============Base model sistem==============
        // ============================================
        $division->prints["match_model_number"]  = $r_model->number;
//         $model_title = $r_model->title;
	  $division->prints["match_value_my_master"] = $r_model->title;
        // ============================================
        // ============================================
        // ============================================
        $division->prints["match_assign_to"]  = $r_model->assign_to;
        empty($r_model->mail_from) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = $r_model->mail_from;
        $division->prints["match_value_mail_to"] = $r_model->mail_to;
        $division->prints["match_value_mail_cc"] = $r_model->mail_cc;
        $division->prints["match_value_mail_bcc"] = $r_model->mail_bcc;

        $division->prints["match_options_state"] = "<option value=\"open\">" . $cmr->translate("open") . "</option>";
        $division->prints["match_options_severity"] = "<option value=\"" . $r_model->severity . "\">" . $cmr->translate($r_model->severity) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "severity", "type");
        $division->prints["match_options_type"] = "<option value=\"" . $r_model->type . "\">" . $cmr->translate($r_model->type) . "</option>";

        $division->prints["match_value_sla"]  = $r_model->sla;
        // $custumer_group1="<option>" . $cmr->get_user("auth_group") . "</option>";
        $division->prints["match_options_call_log_user"] = "<option value=\"" . $r_model->call_log_user . "\">" . ucfirst($r_model->call_log_user) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");


        $division->prints["match_options_assign_to"] = "<option value=\"" . $r_model->assign_to . "\">" . ucfirst($r_model->assign_to) . "</option>";
		$select_assign_to = "";
        empty($r_model->assign_to) ? $select_assign_to .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>" : $select_assign_to .= "<option value=\"" . $r_model->assign_to."\">" . $r_model->assign_to . "</option>";


         $array_value1 = array();
         $array_value2 = array();
		if($result_group_name)
        while ($groups_value = $result_group_name->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");


         $array_value1 = array();
         $array_value2 = array();
		if($result_user_email)
        while ($user_value = $result_user_email->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $user_value->email . "</option>";
         $array_value1[] = $user_value->email;
         $array_value2[] = $user_value->email;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");


        $division->prints["match_options_call_log_group"] = "<option value=\"" . $result_value["call_log_group"] . "\">" . ucfirst($r_model->call_log_group) . "</option>";

		$select_custumer_group = "";
        empty($r_model->call_log_group) ? $select_custumer_group .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>" : $select_custumer_group .= "<option value=\"" . $r_model->call_log_group."\">" . $r_model->call_log_group . "</option>";
//         $division->prints["match_options_call_log_group"] .= "<option>" . $cmr->get_conf("cmr_admin_group") . "</option>";





         $array_value1 = array();
         $array_value2 = array();
		if($result_group)
		while ($groups_value = $result_group->fetch_object(false)){
//             $division->prints["match_options_call_log_group"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
        $division->prints["match_options_call_log_group"] .= select_order($cmr->language, $array_value1,  $array_value2, "");


        $division->prints["match_options_call_method"] = "<option value=\"" . $result_value["call_method"] . "\">" . ucfirst($r_model->call_method) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "call_method", "type");

        $division->prints["match_value_list_user_impact"] = $r_model->list_user_impact;
        $division->prints["match_value_list_group_impact"] = $r_model->list_group_impact;
        $division->prints["match_value_asset_impact"] = $r_model->list_asset_impact;
        // $assign_to= $cmr->config["cmr_from_email"];
//         empty($r_model->mail_from) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = $r_model->mail_from;
// //         $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"];
//         $division->prints["match_value_mail_to"] = $r_model->mail_to;
//         $division->prints["match_value_mail_cc"] = $r_model->mail_cc;
//         $division->prints["match_value_mail_bcc"] = $r_model->mail_bcc;

        $division->prints["match_value_number"]  = $temp_numero;

        $division->prints["match_value_pre_mail_text"] = "";
        $division->prints["match_value_pre_text"] = "";

        $division->prints["match_value_title"]  = ($r_model->title);

        $division->prints["match_value_text"] = cmr_search_replace($r_model->number, $temp_numero, $r_model->text);
        $division->prints["match_value_mail_text"] = cmr_search_replace($r_model->number, $temp_numero, $r_model->mail_text);

        if(empty($r_model->mail_text)) $r_model->mail_text = "-------------[{{date_time}}]-------------\n\n{{ticket_text}}\n\n-- \n\n{{groups_email_sign}}";
        if(empty($r_model->mail_title)) $r_model->mail_title =  $cmr->translate("new ticket") . "[{{ticket_number}}]:{{ticket_title}}";
        $division->prints["match_value_mail_text"] = $r_model->mail_text . "\n\n--\n\n" . $result_value["mail_text"];
        $division->prints["match_value_mail_title"] = $r_model->mail_title ;

        $division->prints["match_value_comment"] .= "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Open by [") . $cmr->get_user("auth_email") . "]\n";

        $division->prints["match_problem"] = $cmr->translate("problem");

        $division->prints["match_submit_text"]  = $cmr->translate("send_ticket");
//         $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'ticket_');</script>";
        $division->prints["match_load_script"] ="";
        break;
    // ==============================================================
    // ==============================================================
    // ==============update case ====================================
    // ==============================================================
    // ==============================================================
    case "update_ticket":

	if(empty($cmr->post_var["id_ticket"])){
		print($cmr->translate("update_ticket:No ticket selected! clic here => "));
		print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"] . "", 1));
		print($cmr->translate(" to select one."));
	    return;
	}
        $todo_title = ($result_value["title"]);
        $todo_type = $result_value["type"];
        $todo_number = $result_value["number"];
        $todo_state = "update";
        $todo_model_number = $result_value["number"];
        $division->prints["match_options_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");

//         $cmr->query["t_model_update"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (1) ";
//         $cmr->query["t_model_update"] .= "AND (my_master='cmr_model')  AND (lang='$language')  ";
//         $cmr->query["t_model_update"] .= "AND (type='" . cmr_escape($todo_type) . "') AND (state='" . cmr_escape($todo_state) . "')  ";
//         $cmr->query["t_model_update"] .= "AND ((call_log_group IN (" . $cmr->get_user("auth_list_group") . ")) OR (call_log_group='') OR (call_log_group=NULL)) ";
//         $cmr->query["t_model_update"] .= "ORDER BY id;";
//         //  LIMIT " . $cmr->get_conf("cmr_max_view") . ";";

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["title"] = $todo_title;
        $qr->sql_data["number"] = $todo_number;
        $qr->sql_data["lang"] = $language;
        $qr->sql_data["type"] = $todo_type;
        $qr->sql_data["state"] = $todo_state;
		$cmr->query["t_model"] = $qr->get_query("ticket_model");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  if($cmr->db_connection)
$result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        $r_model = $result_t_model->fetch_object(false);
        // ========== Solution ===================
        $division->prints["match_value_model_id"] = $r_model->id;
        $r_model_number = $r_model->number;
	  $division->prints["match_value_my_master"] = $r_model->title;
//         $cmr->query["t_model_solution"] = "SELECT text FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (title LIKE '%" . cmr_escape($todo_title) . "%') AND (type='" . cmr_escape($todo_type) . "') AND (state='" . cmr_escape($todo_state) . "') AND ((call_log_group IN (" . $cmr->get_user("auth_list_group") . ")) OR (call_log_group='') OR (call_log_group=NULL))  ORDER BY id DESC;";
		$cmr->query["t_model_solution"] = $qr->get_query("ticket_solution");

    if($cmr->db_connection)
$result_model_solution = $cmr->db_connection->query($cmr->query["t_model_solution"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        if(!empty($result_model_solution)) $r_model_solution = $result_model_solution->fetch_object(false);
        if(!empty($r_model_solution)) $division->prints["match_solution"] = $r_model_solution->text;
//         $result_model_solution->Close();
        // =======================================
        $division->prints["match_ticket_title1"] = $cmr->translate("update ticket");

        $division->prints["match_ticket_title1"]  = $cmr->translate("update_ticket_title");
        $division->prints["match_ticket_title2"]  = $cmr->translate("update_ticket_text");

        $division->prints["match_class_module"]  = "update_ticket";

        $division->prints["match_model_number"]  = $result_value["number"];
//         $model_title = $result_value["model_title"];

        $division->prints["match_assign_to"]  = $result_value["assign_to"];
        empty($result_value["mail_from"]) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = ($result_value["mail_from"]);
//         $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"];
        $division->prints["match_value_mail_to"] = $result_value["mail_to"];
        $division->prints["match_value_mail_cc"] = $result_value["mail_cc"];
        $division->prints["match_value_mail_bcc"] = $result_value["mail_bcc"];
//         // $assign_to= $cmr->config["cmr_from_email"];
//         empty($result_value["mail_from"]) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = ($result_value["mail_from"]);

        $division->prints["match_options_state"] = "<option value=\"update\">" . $cmr->translate("update") . "</option>";
        $division->prints["match_options_severity"] = "<option value=\"" . $result_value["severity"] . "\">" . $cmr->translate($result_value["severity"]) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "severity", "type");
        $division->prints["match_options_type"] = "<option value=\"" . $result_value["type"] . "\">" . $cmr->translate($result_value["type"]) . "</option>";

        $division->prints["match_value_sla"]  = $result_value["sla"];
        // $custumer_group1="<option>" . $cmr->get_user("auth_group") . "</option>";
        $division->prints["match_options_call_log_user"] = "<option value=\"" . $result_value["call_log_user"] . "\">" . ucfirst($result_value["call_log_user"]) . "</option>";

//         empty($r_model->assign_to) ? $select_assign_to .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>" : $select_assign_to .= "<option value=\"" . $r_model->assign_to."\">" . $r_model->assign_to . "</option>";
        $division->prints["match_options_assign_to"] = "<option value=\"" . $result_value["assign_to"] . "\">" . ucfirst($result_value["assign_to"]) . "</option>";
        $division->prints["match_options_assign_to"] .= "<optgroup label=\"- " . $cmr->translate("Groups") . " -\" >";
        $division->prints["match_options_assign_to"] .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>";

         $array_value1 = array();
         $array_value2 = array();
		if($result_group_name)
        while ($groups_value = $result_group_name->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
            $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");

        $division->prints["match_options_assign_to"] .= "</optgroup>";
        $division->prints["match_options_assign_to"] .= "<optgroup label=\"- " . $cmr->translate("Users") . " -\" >";

         $array_value1 = array();
         $array_value2 = array();
		if($result_user_email)
        while ($user_value = $result_user_email->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $user_value->email . "</option>";
         $array_value1[] = $user_value->email;
         $array_value2[] = $user_value->email;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
        $division->prints["match_options_assign_to"] .= "</optgroup>";




        $division->prints["match_options_call_log_group"] = "<option value=\"" . $result_value["call_log_group"] . "\">" . ucfirst($result_value["call_log_group"]) . "</option>";
        // $select_custumer_group.="<option>" . $cmr->get_conf("cmr_admin_group") ."</option>";
        // while ($groups_value = $result_group->FetchNextObject(false)){
        // $select_custumer_group.="<option>" . $groups_value->name."</option>";
        // };
        $division->prints["match_options_call_method"] = "<option value=\"" . $result_value["call_method"] . "\">" . ucfirst($result_value["call_method"]) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "call_method", "type");

        $division->prints["match_value_list_user_impact"] = $result_value["list_user_impact"];
        $division->prints["match_value_list_group_impact"] = $result_value["list_group_impact"];
        $division->prints["match_value_asset_impact"] = $result_value["list_asset_impact"];

        $division->prints["match_value_number"]  = $result_value["number"];

        $division->prints["match_value_title"]  = ($result_value["title"]);

        if(empty($r_model->mail_text)) $r_model->mail_text = "-------------[{{date_time}}]-------------\n\n{{ticket_text}}\n\n-- \n\n{{groups_email_sign}}";
        if(empty($r_model->mail_title)) $r_model->mail_title =  $cmr->translate("update ticket") . "[{{ticket_number}}]:{{ticket_title}}";
        $division->prints["match_value_mail_text"] = $r_model->mail_text . "\n\n--\n\n" . $result_value["mail_text"];
        $division->prints["match_value_mail_title"] = $r_model->mail_title ;
        $division->prints["match_value_text"] = $r_model->text . "\n\n";

        $division->prints["match_value_pre_mail_text"] = $result_value["mail_text"];
        $division->prints["match_value_pre_text"] = $result_value["text"];

        $division->prints["match_submit_text"]  = $cmr->translate("update_ticket");
        $division->prints["match_problem"] = $cmr->translate("action");

        if($result_value["state"] == "close"){
        $division->prints["match_value_comment"] .= $result_value["comment"] . "\n* " . date("Y-m-d H:i:s") . $cmr->translate("Open again: Updated by [") . $cmr->get_user("auth_email") . "]\n";
    	}else{
        $division->prints["match_value_comment"] .= $result_value["comment"] . "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Updated by [") . $cmr->get_user("auth_email") . "]\n";
		}

        $division->prints["match_submit_text"]  = $cmr->translate("update_ticket");
//         $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'ticket_');</script>";
        $division->prints["match_load_script"] ="";
        break;
    // ==============================================================
    // ==============================================================
    // ==============close case ============================
    // ==============================================================
    // ==============================================================
    case "close_ticket":

	if(empty($cmr->post_var["id_ticket"])){
		print($cmr->translate("close_ticket:No ticket selected! clic here => "));
		print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"] . "", 1));
		print($cmr->translate(" to select one."));
	    return;
	}
        $todo_title = ($result_value["title"]);
        $todo_type = $result_value["type"];
        $todo_state = "close";
        $division->prints["match_options_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["title"] = $todo_title;
        $qr->sql_data["lang"] = $language;
        $qr->sql_data["type"] = $todo_type;
        $qr->sql_data["state"] = $todo_state;
		$cmr->query["t_model"] = $qr->get_query("ticket_model");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//         $cmr->query["t_model_close"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (1) ";
//         $cmr->query["t_model_close"] .= "AND (my_master='cmr_model') AND (lang='$language') ";
//         // $cmr->query["t_model_close"] .= " AND (model_number='$todo_model_number') ";
//         $cmr->query["t_model_close"] .= " AND (type='$todo_type') AND (state='$todo_state') ";
//         $cmr->query["t_model_close"] .= " AND ((call_log_group IN (" . $cmr->get_user("auth_list_group") . ")) OR (call_log_group='') or (call_log_group=NULL)) ";
//         $cmr->query["t_model_close"] .= " ORDER BY id ;";
//         // LIMIT " . $cmr->get_conf("cmr_max_view") . ";";
//
//         $cmr->query["t_model"] = $cmr->query["t_model_close"];
if($cmr->db_connection)
        $result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        $r_model = $result_t_model->fetch_object(false);

        $division->prints["match_ticket_title1"] = $cmr->translate("close ticket");
        // ========== Solution ===================
        $division->prints["match_value_model_id"] = $r_model->id;
	  $division->prints["match_value_my_master"] = $r_model->title;
        $r_model_number = $r_model->number;
//         $cmr->query["t_model_solution"] = "SELECT text FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (title LIKE '%" . cmr_escape($todo_title) . "%') AND (type='" . cmr_escape($todo_type) . "') AND (state='" . cmr_escape($todo_state) . "') AND ((call_log_group IN (" . $cmr->get_user("auth_list_group") . ")) OR (call_log_group='') OR (call_log_group=NULL))  ORDER BY id DESC;";
		$cmr->query["t_model_solution"] = $qr->get_query("ticket_solution");

    if($cmr->db_connection)
        $result_model_solution = $cmr->db_connection->query($cmr->query["t_model_solution"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        if(!empty($result_model_solution)) $r_model_solution = $result_model_solution->fetch_object(false);
        if(!empty($r_model_solution)) $division->prints["match_solution"] = $r_model_solution->text;
//         $result_model_solution->Close();
        // =======================================
        $division->prints["match_ticket_title1"]  = $cmr->translate("close_ticket_title");
        $division->prints["match_ticket_title2"]  = $cmr->translate("close_ticket_text");

        $division->prints["match_class_module"]  = "close_ticket";
        $division->prints["match_model_number"]  = $result_value["number"];
//         $model_title = $result_value["model_title"];

        $division->prints["match_assign_to"]  = $result_value["assign_to"];
        empty($r_model->mail_from) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = $r_model->mail_from;
//         $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"];
        $division->prints["match_value_mail_to"] = $result_value["mail_to"];
        $division->prints["match_value_mail_cc"] = $result_value["mail_cc"];
        $division->prints["match_value_mail_bcc"] = $result_value["mail_bcc"];

        $division->prints["match_options_state"] = "<option value=\"close\">" . $cmr->translate("close") . "</option>";
        $division->prints["match_options_severity"] = "<option value=\"" . $result_value["severity"] . "\">" . $cmr->translate($result_value["severity"]) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "severity", "type");
        $division->prints["match_options_type"] = "<option value=\"" . $result_value["type"] . "\">" . $cmr->translate($result_value["type"]) . "</option>";

        $division->prints["match_value_sla"]  = $result_value["sla"];
        // $custumer_group1="<option>" . $cmr->get_user("auth_group") . "</option>";
        $division->prints["match_options_call_log_user"] = "<option value=\"" . $result_value["call_log_user"] . "\">" . ucfirst($result_value["call_log_user"]) . "</option>";

        $division->prints["match_options_assign_to"] = "<option value=\"" . $result_value["assign_to"] . "\">" . ucfirst($result_value["assign_to"]) . "</option>";
        $division->prints["match_options_assign_to"] .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>";


         $array_value1 = array();
         $array_value2 = array();
		if($result_group_name)
        while ($groups_value = $result_group_name->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");


         $array_value1 = array();
         $array_value2 = array();
		if($result_user_email)
        while ($user_value = $result_user_email->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $user_value->email . "</option>";
         $array_value1[] = $user_value->email;
         $array_value2[] = $user_value->email;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");

        $division->prints["match_options_call_log_group"] = "<option value=\"" . $result_value["call_log_group"] . "\">" . ucfirst($result_value["call_log_group"]) . "</option>";
        // if(isset($_SESSION['ticket_log_group'])){
        // $select_custumer_group.="<option value=\"" . $_SESSION['ticket_log_group'] . "\">" . $_SESSION['ticket_log_group'] . "</option>";
        // }
        // $select_custumer_group.="<option>" . $cmr->get_conf("cmr_admin_group") ."</option>";
        // while ($groups_value = $result_group->FetchNextObject(false)){
        // $select_custumer_group.="<option>" . $groups_value->name."</option>";
        // };
        $division->prints["match_options_call_method"] = "<option value=\"" . $result_value["call_method"] . "\">" . ucfirst($result_value["call_method"]) . "</option>" . $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "call_method", "type");

        $division->prints["match_value_list_user_impact"] = $result_value["list_user_impact"];
        $division->prints["match_value_list_group_impact"] = $result_value["list_group_impact"];
        $division->prints["match_value_asset_impact"] = $result_value["list_asset_impact"];
        $division->prints["match_value_number"]  = $result_value["number"];

        $division->prints["match_value_title"]  = ($result_value["title"]);

        if(empty($r_model->mail_text)) $r_model->mail_text = "-------------[{{date_time}}]-------------\n\n{{ticket_text}}\n\n-- \n\n{{groups_email_sign}}";
        if(empty($r_model->mail_title)) $r_model->mail_title =  $cmr->translate("closed ticket") . "[{{ticket_number}}]:{{ticket_title}}";
        $division->prints["match_value_mail_text"] = $r_model->mail_text . "\n\n--\n\n" . $result_value["mail_text"];
        $division->prints["match_value_mail_title"] = $r_model->mail_title ;
        $division->prints["match_value_text"] = $r_model->text . "\n\n";

        $division->prints["match_value_pre_mail_text"] = $result_value["mail_text"];
        $division->prints["match_value_pre_text"] = $result_value["text"];

        $division->prints["match_value_comment"] .= $result_value["comment"] . "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Closed by [") . $cmr->get_user("auth_email") . "]\n";

        $division->prints["match_submit_text"]  = $cmr->translate("close_ticket");
        $division->prints["match_problem"] = $cmr->translate("solution");

        $division->prints["match_load_script"] ="";
        break;
    // ==============================================================
    // ==============================================================
    // ==============email ticket ============================
    // ==============================================================
    // ==============================================================
    case "email_ticket":
        $todo_type = $result_value["type"];
        $todo_title = ($result_value["title"]);

	if(empty($cmr->post_var["id_ticket"])){
		print($cmr->translate("No ticket selected! clic here => "));
		print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"] . "", 1));
		print($cmr->translate(" to select one."));
	}

        $division->prints["match_ticket_title1"] = $cmr->translate("email ticket");
        $division->prints["match_options_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");

        $division->prints["match_class_module"]  = "email_ticket";
        if(!empty($result_value["number"])) $division->prints["match_model_number"]  = $result_value["number"];

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["lang"] = $language;
		$cmr->query["t_model"] = $qr->get_query("ticket_new_model");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//         $cmr->query["t_model_new"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (my_master='cmr_model')  and (lang='$language')  and ((call_log_group in (" . $cmr->get_user("auth_list_group") . ")) or (call_log_group='') or (call_log_group=NULL))  order by state;";
//         $cmr->query["t_model"] = $cmr->query["t_model_new"];

if($cmr->db_connection)
        $result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        $r_model = $result_t_model->fetch_object(false);

        $division->prints["match_ticket_title1"] = $cmr->translate($mod->base_name);
        // ========== Solution ===================
        $division->prints["match_value_model_id"] = $r_model->id;
        $r_model_number = $r_model->number;
	  $division->prints["match_solution"] = "";
//         $result_model_solution->Close();
        // =======================================
        $division->prints["match_ticket_title1"]  = $cmr->translate("email_ticket_title");
        $division->prints["match_ticket_title2"]  = $cmr->translate("email_ticket_text");

        $id_input = "";

        $division->prints["match_model_number"]  = $r_model->number;

        $division->prints["match_options_state"] = "<option value=\"open\">" . $cmr->translate("open") . "</option>";
        $division->prints["match_options_severity"] = "<option value=\"normal\">" . $cmr->translate("normal") . "</option>";;
        $division->prints["match_options_type"] = "<option value=\"normal\">" . $cmr->translate("normal") . "</option>";;



        $division->prints["match_options_call_log_user"] = "";

        $division->prints["match_options_assign_to"] = "";

        $division->prints["match_options_call_log_group"] = "";

        $division->prints["match_options_call_method"] = "";

        $division->prints["match_value_list_user_impact"] = "";//$cmr->user["auth_email"];
        $division->prints["match_value_list_group_impact"] = "";//$cmr->user["auth_group"];
        $division->prints["match_value_asset_impact"] = "";

        $division->prints["match_assign_to"]  = $cmr->config["cmr_from_email"];

        empty($result_value["mail_from"]) ? $division->prints["match_value_mail_from"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_from"] = ($result_value["mail_from"]);
        empty($result_value["mail_to"]) ? $division->prints["match_value_mail_to"] = $cmr->config["cmr_from_email"] : $division->prints["match_value_mail_to"] = $result_value["mail_to"];
        empty($result_value["mail_cc"]) ? $division->prints["match_value_mail_cc"] = $cmr->config["cmr_cc_email"] : $division->prints["match_value_mail_cc"] = $result_value["mail_cc"];
        empty($result_value["mail_bcc"]) ? $division->prints["match_value_mail_bcc"] = $cmr->config["cmr_bcc_email"] : $division->prints["match_value_mail_bcc"] = $result_value["mail_bcc"];


      if(!empty($result_value["title"])) $division->prints["match_value_title"]  = ($result_value["title"]);

        $division->prints["match_value_pre_mail_text"] = "";
        $division->prints["match_value_pre_text"] = "";

        if(!empty($result_value["mail_text"])) $division->prints["match_value_mail_text"] = ($result_value["mail_text"]) . "\n\n";
        $division->prints["match_value_text"] = $r_model->text . "\n\n";
        if(!empty($result_value["mail_title"])) $division->prints["match_value_mail_title"] = $result_value["mail_title"] ;
        $division->prints["match_problem"] = $cmr->translate("problem");

        $division->prints["match_value_comment"]  = "";

        $division->prints["match_submit_text"]  = $cmr->translate("send");

        $division->prints["match_load_script"]  = "<script language=\"javascript\">";




        $division->prints["match_load_script"] .= "hide('model_extra');";

        $division->prints["match_load_script"] .= "hide('type_zone');";
        $division->prints["match_load_script"] .= "hide('hide_type');";
        $division->prints["match_load_script"] .= "hide('show_type');";

        $division->prints["match_load_script"] .= "hide('number_zone');";
        $division->prints["match_load_script"] .= "hide('ticket_zone');";

        $division->prints["match_load_script"] .= "hide('extra_sla');";
        $division->prints["match_load_script"] .= "hide('hide_sla');";
        $division->prints["match_load_script"] .= "hide('show_sla');";
        $division->prints["match_load_script"] .= "hide('sla_text');";
        $division->prints["match_load_script"] .= "hide('extra_code');";

        $division->prints["match_load_script"] .= "hide('show_code');";
        $division->prints["match_load_script"] .= "hide('hide_code');";

        $division->prints["match_load_script"] .= "hide('header_zone');";
        $division->prints["match_load_script"] .= "hide('show_header');";
        $division->prints["match_load_script"] .= "hide('action_id');";

//         $division->prints["match_load_script"] .= "hide('title_zone');";
        $division->prints["match_load_script"] .= "hide('show_email');";

        $division->prints["match_load_script"] .= "show('hide_email');";
        $division->prints["match_load_script"] .= "show('extra_email');";
        $division->prints["match_load_script"] .= "show('hide_header');";

        $division->prints["match_load_script"] .= "</script>";

        break;
    // ==============================================================
    // ==============================================================
    // ==============new case ============================
    // ==============================================================
    // ==============================================================
    case "new_ticket":
    // ==============================================================
    // ==============================================================
    // ==============default case ============================
    // ==============================================================
    // ==============================================================
    default:
        // $todo_type=$result_value["type"];
        // $todo_state="open";
//         $cmr->query["t_model_new"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (my_master='cmr_model')  and (lang='$language')  and ((call_log_group in (" . $cmr->get_user("auth_list_group") . ")) or (call_log_group='') or (call_log_group=NULL))  order by id,state;";
// //         die($cmr->query["t_model_new"]);
//         $cmr->query["t_model"] = $cmr->query["t_model_new"];
        $qr->sql_data["lang"] = $language;
		$cmr->query["t_model"] = $qr->get_query("ticket_new_model");

    if($cmr->db_connection)
      $result_t_model = $cmr->db_connection->query($cmr->query["t_model"])  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        $r_model = $result_t_model->fetch_object(false);
        $division->prints["match_ticket_title1"] = $cmr->translate($mod->base_name);
        // ========== Solution ===================
        $division->prints["match_value_model_id"] = $r_model->id;
        $r_model_number = $r_model->number;
//         $cmr->query["t_model_solution"] = "SELECT text FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket WHERE (number= '$r_model_number') and  (state='close') order by id;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["number"] = $r_model_number;
		$cmr->query["t_model_solution"] = $qr->get_query("ticket_new_solution");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  if($cmr->db_connection)
      $result_model_solution = $cmr->db_connection->query($cmr->query["t_model_solution"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
        if(!empty($result_model_solution)) $r_model_solution = $result_model_solution->fetch_object(false);
        if(!empty($r_model_solution)) $division->prints["match_solution"] = $r_model_solution->text;
//         $result_model_solution->Close();
        // =======================================

        $id_input = "";
        $division->prints["match_options_code_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");

        $division->prints["match_class_module"]  = "new_ticket";
        $division->prints["match_model_number"]  = $r_model->number;
	  $division->prints["match_value_my_master"] = $r_model->title;
//         $model_title = $r_model->model_title;

        $division->prints["match_options_state"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "state", "type");
        $division->prints["match_options_severity"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "severity", "type");
        $division->prints["match_options_type"] .= $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "type", "type");


//         $division->prints["match_value_mail_to"] = "";
        $division->prints["match_value_mail_from"] = $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">";
        $division->prints["match_value_mail_to"] = $cmr->config["cmr_from_email"];
        $division->prints["match_value_mail_cc"] = $cmr->config["cmr_cc_email"] . $email_cc;
        $division->prints["match_value_mail_bcc"] = $cmr->config["cmr_bcc_email"];

        // $custumer_group1="<option>" . $cmr->get_user("auth_group") . "</option>";
        $division->prints["match_options_call_log_user"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");

        $division->prints["match_assign_to"]  = $cmr->config["cmr_from_email"];
        $division->prints["match_options_assign_to"] = "";

        $division->prints["match_options_assign_to"] .= "<option value=\"" . $cmr->get_conf("cmr_admin_group") . "\">" . $cmr->get_conf("cmr_admin_group") . "</option>";

        $array_value1 = array();
        $array_value2 = array();
        if($result_group_name)
        while ($groups_value = $result_group_name->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");

        $array_value1 = array();
        $array_value2 = array();
        if($result_user_email)
        while ($user_value = $result_user_email->fetch_object(false)){
//             $division->prints["match_options_assign_to"] .= "<option>" . $user_value->email . "</option>";
         $array_value1[] = $user_value->email;
         $array_value2[] = $user_value->email;
        };
        $division->prints["match_options_assign_to"] .= select_order($cmr->language, $array_value1,  $array_value2, "");

        $division->prints["match_options_call_log_group"] = "";

        $division->prints["match_options_call_log_group"] .= "<option>" . $cmr->get_conf("cmr_admin_group") . "</option>";

        $array_value1 = array();
        $array_value2 = array();
        if($result_group)
        while ($groups_value = $result_group->fetch_object(false)){
//             $division->prints["match_options_call_log_group"] .= "<option>" . $groups_value->name . "</option>";
         $array_value1[] = $groups_value->name;
         $array_value2[] = $groups_value->name;
        };
        $division->prints["match_options_call_log_group"] .= select_order($cmr->language, $array_value1,  $array_value2, "");

        $division->prints["match_options_call_method"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "ticket", "call_method", "type");

        $division->prints["match_value_list_user_impact"] = "";//$cmr->user["auth_email"];
        $division->prints["match_value_list_group_impact"] = "";//$cmr->user["auth_group"];
        $division->prints["match_value_asset_impact"] = "";



        $division->prints["match_value_number"]  = $temp_numero;
        $division->prints["match_value_title"]  = "";

        $division->prints["match_value_pre_mail_text"] = "";
        $division->prints["match_value_pre_text"] = "";

        if(empty($r_model->mail_text)) $r_model->mail_text = "-------------[{{date_time}}]-------------\n\n{{ticket_text}}\n\n-- \n\n{{groups_email_sign}}";
        if(empty($r_model->mail_title)) $r_model->mail_title =  $cmr->translate("new ticket") . "[{{ticket_number}}]:{{ticket_title}}";
        $division->prints["match_value_mail_text"] = $r_model->mail_text . "\n\n--\n\n";
        $division->prints["match_value_mail_title"] = $r_model->mail_title ;
        $division->prints["match_value_text"] = $r_model->text . "\n\n";

        $division->prints["match_problem"] = $cmr->translate("problem");

        $division->prints["match_value_comment"] .= "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Opened by [") . $cmr->get_user("auth_email") . "] \n";

        $division->prints["match_submit_text"]  = $cmr->translate("send_ticket");

        $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'ticket_');</script>";

        break;
}










// ==============================================================
// ===============loading model in html object=====================
// ==============================================================
$array_value1 = array();
$array_value2 = array();
$division->prints["match_options_model"] = "";
//$cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);
if($cmr->db_connection)
$result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
if($result_t_model)
while ($r_model = $result_t_model->fetch_object(false)){
	$array_value1[] = $r_model->id;
	$array_value2[] = (substr($r_model->title, 0, 66));
};
    $division->prints["match_options_model"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
// ==============================================================
// ==============================================================




// ==============================================================
// ==============================================================
$division->prints["match_default_lang"] = $language;
$division->prints["match_options_lang"] = "";
// ==============================================================
    $array_value = get_languages_list($cmr->config);
    $division->prints["match_options_lang"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");
// ==============================================================



// ==============================================================
// ==============================================================
// =========================hidden============================
// ==============================================================
// $cmr->query["t_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") ."ticket WHERE (model_title like 'cmr_model:%') order by id;";
// $cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);
$result_t_model = $cmr->db_connection->query($cmr->query["t_model"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->error);
$division->prints["match_hidden_model"] = "";

// ==============================================================
	$array_columns = get_all_columns($cmr->db_connection, $cmr->get_conf("cmr_table_prefix"), "ticket");
//     cmr_print_r($array_columns);exit;
// ==============================================================



if($result_t_model)
while ($r_model = $result_t_model->FetchRow()){
    $ticket_value = "";
    for($j = 0; $j < $result_t_model->FieldCount( ); $j++){
	    if(($j == 16)&&(empty($r_model[$j]))) $r_model[$j] = "{{ticket_title}}";
	    if(($j == 24)&&(empty($r_model[$j]))) $r_model[$j] = "\n-------------[{{date_time}}]-------------\n{{ticket_text}} \n--\n{{groups_email_sign}}";
        if(empty($array_columns[$j]["Field"])) $array_columns[$j]["Field"] = "";
        if(empty($r_model[$j])) $r_model[$j] = "";
	    $ticket_value .= $array_columns[$j]["Field"] . ":,:" . $r_model[$j] . ":.:";
     }



    $ticket_value = cmr_searchi_replace("{{ticket_number}}", $temp_numero, $ticket_value);
    $division->prints["match_hidden_model"] .= "<input  type=\"hidden\" name=\"ticket_" . $r_model[0] . "\" id=\"ticket_" . $r_model[0] . "\" value=\"" . $ticket_value . "\" />\n";
//         echo "<hr />" . ("<input  type=\"hidden\" name=\"ticket_" . $r_model[0] . "\" id=\"ticket_" . $r_model[0] . "\" value=\"" . $ticket_value . "\" />\n") . "<br />";
}
// ==============================================================
// ==============================================================
// ===============hidden=========================================
// ==============================================================
// ==============================================================
// ==============================================================
$division->prints["match_close_tab"] = $lk->close_module_tab();
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_hidden_assign_to"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->config["cmr_bcc_email"] . "\" name=\"assign_to\"  id=\"assign_to1\" />");
$division->prints["match_hidden_from"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->config["cmr_from_email"] . "\" name=\"mail_from\"  id=\"mail_from\" />");
$division->prints["match_hidden_to"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->config["cmr_from_email"] . "\" name=\"mail_to\"  id=\"mail_to\" />");
$division->prints["match_hidden_cc"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->config["cmr_cc_email"] . "\" name=\"mail_cc\"  id=\"mail_cc1\" />");
$division->prints["match_hidden_bcc"] = input_hidden("<input type=\"hidden\" value=\"" . $cmr->config["cmr_bcc_email"] . "\" name=\"mail_bcc\"  id=\"mail_bcc1\" />");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_ticket_title1"] = "";
$division->prints["match_ticket_title2"] = "";
if(($cmr->translate($mod->base_name)))
$division->prints["match_ticket_title1"] = $cmr->translate($mod->base_name);
if(isset($cmr->language[$mod->base_name . "_title"]))
$division->prints["match_ticket_title2"] = $cmr->translate($mod->base_name . "_title");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")) $division->prints["match_solution"]  = "";

$division->prints["match_link_legend"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_ticket" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_ticket" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_conf("cmr_tiny_editor"))){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template4");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template5");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template6");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template7");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template8");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
