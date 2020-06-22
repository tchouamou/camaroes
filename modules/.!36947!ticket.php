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
$lk->add_link("modules/move_ticket.php?conf_name=conf.d/modules/conf_move_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"], 1);
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
$cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);

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

    $result_te = &$cmr->db_connection->query($cmr->query["list_email"]) or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->ErrorMsg()); /*, $cmr->db_connection)*/ ;
    if(!empty($result_te))
    while ($r_email1 = $result_te->FetchRow()){
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
	    $result_te_rif = &$cmr->db_connection->query($cmr->query["list_email_cc"]) /*, $cmr->db_connection)*/  or db_die(__LINE__ . " - " . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	    // -----------
	    if($result_te_rif)
	    while ($r_email2 = $result_te_rif->FetchRow()){
	        $list_email_cc .= ", " . $r_email2[0];
	        $result_te_rif->MoveNext();
	    }
	}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $list_email_cc .= ", " . $cmr->config["cmr_cc_email"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
