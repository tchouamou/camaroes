<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 *        message.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 
 


 


message,Ver 3.0  @_date_time_@  
*/


/**
* Information about
* Is used for keeping
* windowss (design for the layer usefull when running a module)  
* @$division object istance of the class windowss
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



// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "message" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("message" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("message" . $cmr->get_ext("help"));

$cmr->action["module_name"] = "message.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------            
$todo = $cmr->action["todo"];
if(empty($todo)) $todo = "new_message";
// ----------------            

if(get_post("id_message")) $cmr->post_var["id_message"] = get_post("id_message");
if(empty($cmr->post_var["id_message"])) $cmr->post_var["id_message"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "message", "id");
if(empty($cmr->post_var["id_message"]) && ($todo != "new_message")){
	print($cmr->translate("No message selected! clic here => "));
	print($cmr->module_link("modules/view_message.php?conf_name=conf_message" . $cmr->get_ext("conf") . "&id_message=", 1));
	print($cmr->translate(" to select one."));
    return;
} 

// ==============================================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($cmr->get_action("todo"));
// $division->module["title"] = " Open a news message";
// $division->module["text"] = "";


















$division->prints["match_open_windows"] = $division->show_noclose();
// ==============================================================
// ========================select client email===================
// ==============================================================
// ==============================================================
	$aut = $cmr->get_user("authorisation");
	$list_group = $cmr->get_user("auth_list_group");
	$tab_list_group = explode(", ", cmr_search_replace("'", "", $cmr->user["auth_list_group"]));
// -----------
// -----------
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
// -----------
  $division->prints["match_value_model_id"] = "";
  $division->prints["match_value_my_master"] = "";
//   $division->prints["match_value_allow_email"] = "";
//   $division->prints["match_value_allow_groups"] = "";
//   $division->prints["match_value_allow_type"] = "";
  $division->prints["match_value_pre_text"] = "";
  $division->prints["match_value_pre_text"] = "";
  $division->prints["match_value_comment"] = "";
  $division->prints["match_value_sender"] = $cmr->get_user("auth_email");
  $division->prints["match_value_mail_to"] = "";
  $division->prints["match_value_mail_to"] = "";        
  $division->prints["match_value_mail_cc"] = "";
  $division->prints["match_value_mail_bcc"] = "";
  $division->prints["match_value_type"] = "";
  $division->prints["match_value_state"] = "";
  $division->prints["match_value_intervale"]  = "3";
  $division->prints["match_intervale"] = "DAY";
  $division->prints["match_value_ripetitive"] = "0";
  $division->prints["match_value_my_master"] = "";
//   $division->prints["match_value_allow_type"] = "";
//   $division->prints["match_value_allow_email"] = "";
//   $division->prints["match_value_allow_groups"] = "";
	
	foreach($tab_list_group as $key => $val){
    $groups_dest = $val;

//     $cmr->query["t_q"] = "SELECT user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups,  " . $cmr->get_conf("cmr_table_prefix") . "groups, " . $cmr->get_conf("cmr_table_prefix") . "user WHERE  ";
//     $cmr->query["t_q"] .= " (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name='" . cmr_escape($groups_dest) . "')  ";
//     $cmr->query["t_q"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
//     $cmr->query["t_q"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email=" . $cmr->get_conf("cmr_table_prefix") . "user.email) ";
//     $cmr->query["t_q"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable') ";
//                                  
// //     $cmr->query["t_q"] .= " AND ((" . $cmr->get_conf("cmr_table_prefix") . "user_groups.type != 'contact') "; //-- company contact --
// //     $cmr->query["t_q"] .= " OR (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.type = '') "; 
// //     $cmr->query["t_q"] .= " OR (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.type = null) "; 
// //     $cmr->query["t_q"] .= ") "; //-- company contact --
//                                  
//     $cmr->query["t_q"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user.state='enable') ";
//     $cmr->query["t_q"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable') ";
//     $cmr->query["t_q"] .= " AND (user_email not like '%localhost') ";
//     $cmr->query["t_q"] .= " AND  (" . $cmr->get_conf("cmr_table_prefix") . "groups.type<='$aut') ";
//     $cmr->query["t_q"] .= " order by user_email;";
//   -----------
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->group = $val;
	$qr->type = $aut;
	$cmr->query["t_q"] = $qr->get_query("message_user_email");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $result_te = &$cmr->db_connection->Execute($cmr->query["t_q"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//   -----------
//   -----------
    $division->prints["match_list_email"] = "";
    if($result_te)
    while ($r_email1 = $result_te->FetchRow()){
        $division->prints["match_list_email"] .= ", " . $r_email1[0];
//         $r_email1->MoveNext();
    }
//   ==============================================================
//   ==============================================================
    
//   ==============================================================
//   =============inserimento riferimento cmr_company_name=========
//   ==============================================================
    $list_email = "";
    $list_email_cc = "";
    $list_email_bcc = "";
// //   ==============================================================
//     $cmr->query["t_q_rif"] = "SELECT user_email FROM " . $cmr->get_conf("cmr_table_prefix") . "user_groups,  " . $cmr->get_conf("cmr_table_prefix") . "groups, " . $cmr->get_conf("cmr_table_prefix") . "user where  ";
//     $cmr->query["t_q_rif"] .= " (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name='" . cmr_escape($groups_dest) . "')  ";
//     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
//     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email=" . $cmr->get_conf("cmr_table_prefix") . "user.email) ";
//     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.state='enable') ";
// //     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.type='contact') "; //-- company contact --
//     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "user.state='enable') ";
//     $cmr->query["t_q_rif"] .= " AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.state='enable') ";
//     $cmr->query["t_q_rif"] .= " AND (user_email not like '%localhost') ";
//     $cmr->query["t_q_rif"] .= " AND  (" . $cmr->get_conf("cmr_table_prefix") . "groups.type<='$aut')  order by user_email;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->group = $val;
	$qr->type = $aut;
	$cmr->query["t_q_rif"] = $qr->get_query("message_rif_email");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $result_rif = &$cmr->db_connection->Execute($cmr->query["t_q_rif"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//   -----------
    if($result_rif)
    while ($r_email2 = $result_rif->FetchRow()){
        $division->prints["match_list_email_cc"] .= ", " . $r_email2[0];
//         $r_email2->MoveNext();
    }
//   -----------
    $list_email_cc .= ", " . $cmr->config["cmr_cc_email"];
//   -----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//   -----------
    $list_email_bcc .= ", " . $cmr->config["cmr_bcc_email"];
//   -----------
    
    
    
    
    
    
//   -----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//   -----------
    $list_email = cmr_search_replace("^[,][ ]", "", $list_email); //--rimossione vigola all'inizio--
    $list_email_cc = cmr_search_replace("^[,][ ]", "", $list_email_cc); //--rimossione vigola all'inizio--
    $list_email_bcc = cmr_search_replace("^[,][ ]", "", $list_email_bcc); //--rimossione vigola all'inizio--
//   ----List Client Email html object generetion---
  $division->prints["match_hidden_input"] = "";
    if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $groups_dest . "\" id=\"_" . $groups_dest . "\" value=\"" . $list_email . "\" />\r\n";
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $groups_dest . "_cc\" id=\"_" . $groups_dest . "_cc\" value=\"" . $list_email_cc . "\" />\r\n";
        $division->prints["match_hidden_input"] .= "<input  type=\"hidden\" name=\"_" . $groups_dest . "_bcc\" id=\"_" . $groups_dest . "_bcc\" value=\"" . $list_email_bcc . "\" />\r\n";
        $email_cc = "";
    }else{
        if($groups_dest == $cmr->get_user("auth_group")){
            $email_cc = ", " . $list_email . $list_email_cc;
        };
	    }
	}
// ==============================================================
// ==============================================================

// ==============================================================
// ==============================================================
// ===============generate groups and emails=====================
// ==============================================================
// ==============================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->action["table_name"] = "groups";
	$cmr->action["column"] = "name";
	$cmr->action["action"] = "select";
	$cmr->action["where"] = $cmr->where_query();
// 	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$cmr->query["t_group"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// 	$cmr->query["t_group"] .= " WHERE (state='enable') AND " . $cmr->action["where"];
// 	$cmr->query["t_group"] .= " ORDER BY name ";
// 	//$cmr->query["t_group"] .= " LIMIT " . $cmr->get_conf("cmr_max_view") . ";";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->where_query = $cmr->action["where"];
	$cmr->query["t_group"] = $qr->get_query("message_groups");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 // ==============================================================

// ==============================================================
	$result_group = &$cmr->db_connection->Execute($cmr->query["t_group"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	$const = $cmr->get_conf("cmr_noc_type");
	
// 	$cmr->query["t_group_name"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "groups.name FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// 	$cmr->query["t_group_name"] .= "WHERE (" . $cmr->get_conf("cmr_table_prefix") . "groups.type>='$const') ORDER BY  " . $cmr->get_conf("cmr_table_prefix") . "groups.name;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->type = $cmr->get_conf("cmr_noc_type");
	$cmr->query["t_group_name"] = $qr->get_query("message_group_name");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	
	
// 	
// 	$cmr->query["t_user_email"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "user.email FROM " . $cmr->get_conf("cmr_table_prefix") . "user, " . $cmr->get_conf("cmr_table_prefix") . "user_groups, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
// 	$cmr->query["t_user_email"] .= "WHERE (" . $cmr->get_conf("cmr_table_prefix") . "user.email=" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email) ";
// 	$cmr->query["t_user_email"] .= "AND (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
// 	$cmr->query["t_user_email"] .= "AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.type>='$const') ORDER BY " . $cmr->get_conf("cmr_table_prefix") . "groups.name;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->type = $cmr->get_conf("cmr_noc_type");
	$cmr->query["t_user_email"] = $qr->get_query("message_user_email");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$result_group_name = &$cmr->db_connection->Execute($cmr->query["t_group_name"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	$result_user_email = &$cmr->db_connection->Execute($cmr->query["t_user_email"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// ==============================================================
// =======loading message id =====================================
if(!empty($cmr->post_var["id_message"])){
//     $cmr->query["t_message"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message WHERE id='" . $cmr->post_var["id_message"] . "'";

	//     $result_message = &$cmr->db_connection->Execute($cmr->query["t_message"],$cmr->get_conf("cmr_max_view") /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//     $message_todo = $result_message->FetchNextObject(false);
$result_value = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "message", "*", "id", $cmr->post_var["id_message"]);
//     $id_input = input_hidden("<input type=\"hidden\" value=\"".$cmr->post_var["id_message"]."\" name=\"id_message\" />");
}
// ==============================================================
$division->prints["match_default_lang"] = $cmr->get_page("language");
// ==============================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/new_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/reply_message.php?conf_name=conf.d/modules/conf_reply_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/search_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/preview_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/report_message.php?id_message=".$cmr->post_var["id_message"]."&layer=2", 1);
	$lk->add_link("modules/view_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
  $division->prints["match_open_tab"] = $lk->open_module_tab(0);
	if($todo == "update_message") $division->prints["match_open_tab"] = $lk->open_module_tab(1);
	
	$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/email_message.php?conf_name=conf.d/modules/conf_email_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/message_from_model.php?conf_name=conf.d/modules/conf_message_from_model.ini&id_message=".$cmr->post_var["id_message"]."", 1);
  $division->prints["match_link_list"] = $lk->list_link();
	
	$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
	$lk->add_link("modules/view_message.php?conf_name=conf.d/modules/conf_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_my_message.php?conf_name=conf.d/modules/conf_my_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_received_message.php?conf_name=conf.d/modules/conf_received_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_unread_message.php?conf_name=conf.d/modules/conf_unread_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_sended_message.php?conf_name=conf.d/modules/conf_sended_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_current_message.php?conf_name=conf.d/modules/conf_current_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_date_message.php?conf_name=conf.d/modules/conf_date_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
	$lk->add_link("modules/view_model_message.php?conf_name=conf.d/modules/conf_model_message.ini&id_message=".$cmr->post_var["id_message"]."", 1);
  $division->prints["match_link_list1"] = $lk->list_link();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ==============case todo=======================================
// ==============================================================
  $division->prints["match_message_title1"] = ""; 
  $division->prints["match_message_title2"] = ""; 
	if(($cmr->translate($mod->base_name))) 
  $division->prints["match_message_title1"] = $cmr->translate($mod->base_name);
	if(isset($cmr->language[$mod->base_name."_title"])) 
//   $division->prints["match_message_title2"] = $cmr->translate($mod->base_name . "_title");
	
  $division->prints["match_label_id"] = "";
  $division->prints["match_label_search_model"] = "";
  $division->prints["match_value_pre_email"] = "";
  $division->prints["match_id_input"] = "";
  $division->prints["match_value_groups_dest"] = "";
  $division->prints["match_value_groups_dest"] = "";
  $division->prints["match_value_users_dest"] = "";
  $division->prints["match_value_users_dest"] = "";
  $division->prints["match_label_code"] = "";
  $division->prints["match_value_modules_dest"] = "";
  $division->prints["match_value_modules_dest"] = "";
  $division->prints["match_link_priority"] = "";
	
  $division->prints["match_www_path"] = $cmr->get_path("www");
  $division->prints["match_label_lang"] = $cmr->translate("language");
  $division->prints["match_label_title"] = $cmr->translate("title");
  $division->prints["match_label_users_dest"] = $cmr->translate("users_dest");
  $division->prints["match_label_groups_dest"] = $cmr->translate("groups_dest");
  $division->prints["match_label_state"] = $cmr->translate("state");
  $division->prints["match_label_modules_dest"] = $cmr->translate("modules_dest");
  $division->prints["match_label_begin_time"] = $cmr->translate("begin_time");
  $division->prints["match_label_intervale"] = $cmr->translate("intervale");
  $division->prints["match_label_end_time"] = $cmr->translate("end_time");
  $division->prints["match_label_priority"] = $cmr->translate("priority");
  $division->prints["match_label_timing"] = $cmr->translate("timing");
  $division->prints["match_label_property"] = $cmr->translate("property");
  $division->prints["match_label_extra_destination"] = $cmr->translate("extra_destination");
  $division->prints["match_label_owner"] = $cmr->translate("owner");
  $division->prints["match_label_message"] = $cmr->translate("message");
	
  $division->prints["match_label_mail_title"] = $cmr->translate("mail_title");
  $division->prints["match_label_sender"] = $cmr->translate("sender");
  $division->prints["match_label_mail_to"] = $cmr->translate("mail_to");
  $division->prints["match_label_mail_cc"] = $cmr->translate("mail_cc");
  $division->prints["match_label_mail_bcc"] = $cmr->translate("mail_bcc");
  $division->prints["match_label_type"] = $cmr->translate("type");
  $division->prints["match_label_text"] = $cmr->translate("text");
  $division->prints["match_label_my_master"] = $cmr->translate("my_master");
//   $division->prints["match_label_allow_type"] = $cmr->translate("allow_type");
//   $division->prints["match_label_allow_email"] = $cmr->translate("allow_email");
//   $division->prints["match_label_allow_groups"] = $cmr->translate("allow_groups");
  $division->prints["match_label_comment"] = $cmr->translate("comment");
  $division->prints["match_label_date_time"] = $cmr->translate("date");
	
  $division->prints["match_label_print"] = $cmr->translate("print");
  $division->prints["match_label_text"] = $cmr->translate("mail text");
  $division->prints["match_label_normal"] = $cmr->translate("normal");
  $division->prints["match_label_extend"] = $cmr->translate("extend");
  $division->prints["match_label_db"] = $cmr->translate("database");
	
	
	
  $division->prints["match_options_action"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
  $division->prints["match_options_action"] .= "<option value=\"new_model\" >" . $cmr->translate("New model") . "</option>";
  $division->prints["match_options_action"] .= "<option value=\"update_model\" >" . $cmr->translate("Update model") . "</option>";
};

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"new_message.php\" name=\"cmr_get_data\" />");
  $division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"modules/" . $cmr->action["todo"] . ".php\" name=\"middle1\" />");
  $division->prints["match_input_hidden_conf"] = "";
  $division->prints["match_input_hidden_id_message"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->post_var["id_message"]."\" name=\"id_message\" />");
	
  $division->prints["match_label_code_insert"] = $cmr->translate("insert");
  $division->prints["match_link_code_insert"] = $cmr->module_link("modules/new_code.php?conf_name=conf.d/modules/conf_code.ini", "", "->");

//   $division->prints["match_label_email"] = $cmr->translate("email");
  $division->prints["match_print"] = $cmr->translate("print");
  $division->prints["match_label_email"] = $cmr->translate("email");
	
	
  $division->prints["match_begin_time"] = date("Y-m-d H:i:s");
  $division->prints["match_end_time"] = date("2999-m-d H:i:s");
	
  $division->prints["match_label_attach"] = $cmr->translate("attach");
  $division->prints["match_label_attach1"] = $cmr->translate("attach1");
  $division->prints["match_label_attach2"] = $cmr->translate("attach2");
  $division->prints["match_label_attach3"] = $cmr->translate("attach3");
  $division->prints["match_label_attach4"] = $cmr->translate("attach4");
	
  $division->prints["match_label_model"] = $cmr->translate("model");
  $division->prints["match_link_model"] = $cmr->module_link("modules/message_from_model.php?conf_name=conf.d/modules/conf_message_from_model.ini", "", "->");
  $division->prints["match_label_header"] = $cmr->translate("header");
  $division->prints["match_label_action"] = $cmr->translate("action");
	
  $division->prints["match_label_every"] = $cmr->translate("every");
  $division->prints["match_label_only"] = $cmr->translate("only");
	
  $division->prints["match_label_day"] = $cmr->translate("day");
  $division->prints["match_label_microsecond"] = $cmr->translate("microsecond");
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
  
// ========================NEW================================
	// $todo_type=$result_value["type"];
	// $todo_state="open";
// 	$cmr->query["t_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message where (my_master='cmr_model') and ((groups_dest in ($list_group)) or (groups_dest='') or (groups_dest=NULL))  order by id,state;";
// 	if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")) $cmr->query["t_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message where (my_master='cmr_model');";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$qr->type = $cmr->get_conf("cmr_noc_type");
	$cmr->query["t_model"] = $qr->get_query("message_model");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
	$result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	$r_model = $result_model->FetchNextObject(false);
	// =======================================
  $division->prints["match_value_model_id"] = $r_model->id;
	// =======================================
	
	$id_input = "";
  $division->prints["match_options_code_insert"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "code", "code", "column");
	
  $division->prints["match_class_module"]  = "new_message";
  $division->prints["match_func_list"] = $cmr->get_conf("cmr_new_function");
	//   $model_title = $r_model->model_title;
	
  $division->prints["match_options_state"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "message", "state", "type");
  $division->prints["match_value_priority"] = 3;
  $division->prints["match_options_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "message", "type", "type");
	
	
	
	// $groups_dest1="<option>". $cmr->get_user("auth_group")."</option>";
  $division->prints["match_options_users_dest"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");
  $division->prints["match_options_mail_to"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");
  $division->prints["match_options_mail_cc"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");
  $division->prints["match_options_mail_bcc"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");

	 $array_value1 = array();
	 $array_value2 = array();
	while ($groups_value = $result_group_name->FetchNextObject(false)){
	 $array_value1[] = $groups_value->name;
	 $array_value2[] = $groups_value->name;
	};
	
	 $array_value1 = array();
	 $array_value2 = array();
	while ($user_value = $result_user_email->FetchNextObject(false)){
	 $array_value1[] = $user_value->email;
	 $array_value2[] = $user_value->email;
	};
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_options_groups_dest"] = "";
	if(isset($_SESSION['message_groups_dest'])){
	    $division->prints["match_options_groups_dest"] .= "<option value=\"" . $_SESSION['message_groups_dest'] . "\">" . $_SESSION['message_groups_dest'] . "</option>";
	}
  $division->prints["match_options_groups_dest"] .= "<option>" . $cmr->get_conf("cmr_admin_group") . "</option>";
	
	 $array_value1 = array();
	 $array_value2 = array();
	while ($groups_value = $result_group->FetchNextObject(false)){
	//       $division->prints["match_options_groups_dest"] .= "<option>" . $groups_value->name . "</option>";
	 $array_value1[] = $groups_value->name;
	 $array_value2[] = $groups_value->name;
	};
  $division->prints["match_options_groups_dest"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//   $division->prints["match_options_allow_groups"] = select_order($cmr->language, $array_value1,  $array_value2, "");
//   $division->prints["match_options_allow_type"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "type", "type");
//   $division->prints["match_options_allow_email"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "user", "email", "column");
  $division->prints["match_options_my_master"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "message", "title", "column");

  $division->prints["match_options_modules_dest"] = "<option value=\"\"></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"cron.php\"><b>!CRON!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"monitor1.php\"><b>!Monitor1!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"monitor2.php\"><b>!Monitor2!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"monitor3.php\"><b>!Monitor3!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"monitor4.php\"><b>!Monitor4!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"monitor5.php\"><b>!Monitor5!</b></option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"index.php\">index.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"loader_get.php\">loader_get.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"page_print.php\">page_print.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"foot.php\">foot.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"head.php\">head.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"left.php\">left.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"main.php\">main.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"middle.php\">middle.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"right.php\">right.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"logout.php\">logout.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"login.php\">login.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"load_user_data.php\">load_user_data.php</option>";
  $division->prints["match_options_modules_dest"] .= "<option value=\"get_default_data.php\">get_default_data.php</option>";
	
    $array_value = get_modules_list($cmr->config);
  $division->prints["match_options_modules_dest"] .= select_order($cmr->language, $array_value[1],  $array_value[2], "");
	// ==============================================================
  $division->prints["match_default_lang"] = $cmr->translate("default");
  $division->prints["match_options_lang"] = "";
  $division->prints["match_options_lang"] = $cmr->print_select($cmr->get_conf("cmr_table_prefix") . "message", "lang", "type");
  $division->prints["match_value_priority"] = 3;
	
	// ==============================================================
	
	
	
  $division->prints["match_value_begin_time"] = "";//$cmr->user["auth_group"];
  $division->prints["match_value_end_time"] = "";
	
	
	
  $division->prints["match_value_title"]  = "";
  $division->prints["match_value_pre_text"] = "";
  $division->prints["match_value_pre_text"] = "";
	
  $division->prints["match_value_text"] = $r_model->text . "\n\n";
	(empty($r_model->mail_title)) ? $mail_title =  "message:{{message_title}}" : $mail_title = $r_model->mail_title ;
	
  $division->prints["match_value_comment"] .= "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Write by [") . $cmr->get_user("auth_email") . "] \n";
  $division->prints["match_submit_text"]  = $cmr->translate("send_message");
  $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'message_');</script>";
// ==============================================================
switch ($todo){
//   ==============================================================
//   ==============================================================
//   ==============model case =====================================
//   ==============================================================
//   ==============================================================
case "message_from_model":

if(empty($cmr->post_var["id_message"])){
	print($cmr->translate("No message selected! clic here => "));
	print($cmr->module_link("modules/view_message.php?conf_name=conf_message.ini&id_message=" . $cmr->post_var["id_message"] . "", 1));
	print($cmr->translate(" to select one."));
    return;
} 
    $todo_type = $result_value["type"];
    $todo_title = $result_value["title"];
    $todo_state = "open";
		

//   $cmr->query["t_model_model"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message where ((title= '$todo_title') or (my_master='cmr_model')) and (type='$todo_type') and (state='$todo_state') and ((groups_dest in ($list_group)) or (groups_dest='') or (groups_dest=NULL))  order by id;";
//   $cmr->query["t_model"] = $cmr->query["t_model_model"];

//   $result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//   $r_model = $result_model->FetchNextObject(false);
//   =======================================
    $division->prints["match_message_title1"] = $cmr->translate("new message from model");
//   $division->prints["match_message_title1"]  = $cmr->language[$mod->base_name . "_title"];

//   if(empty($cmr->post_var["id_message"])) exit;
    $division->prints["match_class_module"]  = "new_message";


//   ============================================
//   =============Base model sistem==============
//   ============================================
//   $model_title = $r_model->title;
//   ============================================
//   ============================================
//   ============================================
    empty($r_model->sender) ? $sender = $cmr->config["cmr_from_email"] : $sender = $r_model->sender;
    $division->prints["match_value_mail_to"] = $r_model->mail_to;
    $division->prints["match_value_mail_cc"] = $r_model->mail_cc;
    $division->prints["match_value_mail_bcc"] = $r_model->mail_bcc;
  $division->prints["match_value_my_master"] = $r_model->title;

    $division->prints["match_value_state"] = ucfirst("open");
    $division->prints["match_value_priority"] = $r_model->priority;
    $division->prints["match_value_type"] = $r_model->type;

	@ list($value_intervale, $intervale) = explode(" ", $r_model->intervale);
    $division->prints["match_value_intervale"]  = trim($value_intervale);
    $division->prints["match_intervale"] = trim($intervale);
    (empty($value_intervale)) ? $division->prints["match_value_ripetitive"] = "0" : $division->prints["match_value_ripetitive"] = "1";
//   $groups_dest1="<option>". $cmr->get_user("auth_group")."</option>";
    
    $division->prints["match_value_users_dest"] .= $cmr->config["cmr_bcc_email"];
    if(isset($_SESSION['message_users_dest'])) $division->prints["match_value_users_dest"] .= $_SESSION['message_users_dest'];
    if(!empty($result_value["users_dest"])) $division->prints["match_value_users_dest"] =  $result_value["users_dest"];


    
    
     $array_value1 = array();
     $array_value2 = array();
    while ($groups_value = $result_group_name->FetchNextObject(false)){
     $array_value1[] = $groups_value->name;
     $array_value2[] = $groups_value->name;
    };
    
    
     $array_value1 = array();
     $array_value2 = array();
    while ($user_value = $result_user_email->FetchNextObject(false)){
     $array_value1[] = $user_value->name;
     $array_value2[] = $user_value->name;
    };
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_value_groups_dest"] .= $cmr->get_conf("cmr_admin_group");
    if(isset($_SESSION['message_groups_dest'])) $division->prints["match_value_groups_dest"] .= $_SESSION['message_groups_dest'];
    if(!empty($result_value["groups_dest"])) $division->prints["match_value_groups_dest"] =  $result_value["groups_dest"];
    
     $array_value1 = array();
     $array_value2 = array();
    while ($groups_value = $result_group->FetchNextObject(false)){
//       $division->prints["match_options_groups_dest"] .= "<option>" . $groups_value->name . "</option>";
     $array_value1[] = $groups_value->name;
     $array_value2[] = $groups_value->name;
    };
    $division->prints["match_options_groups_dest"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    

    $division->prints["match_value_modules_dest"] = $r_model->modules_dest;
    $division->prints["match_value_begin_time"] = $r_model->begin_time;
    $division->prints["match_value_end_time"] = $r_model->end_time;
    $division->prints["match_value_title"]  = $r_model->title;
    (empty($r_model->mail_title)) ? $mail_title =  "message:{{message_title}}" : $mail_title = $r_model->mail_title ;
    $division->prints["match_value_comment"] .= "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Write by [") . $cmr->get_user("auth_email") . "]\n";
//   empty($r_model->sender) ? $sender = $cmr->config["cmr_from_email"] : $sender = $r_model->sender;
//   $division->prints["match_value_mail_to"] = $r_model->mail_to;
//   $division->prints["match_value_mail_cc"] = $r_model->mail_cc;
//   $division->prints["match_value_mail_bcc"] = $r_model->mail_bcc;
    $division->prints["match_value_pre_text"] = "";
    $division->prints["match_value_pre_text"] = "";




//   $text=$r_model->text."\n\n".$result_value["text"];


    $division->prints["match_submit_text"]  = $cmr->translate("send_message");
//   $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'message_');</script>";
    $division->prints["match_load_script"] ="";
    break;
// ==============================================================
// ==============================================================
// ==============update case ====================================
// ==============================================================
// ==============================================================
case "reply_message":
case "update_message":
if(empty($cmr->post_var["id_message"])){
	print($cmr->translate("No message selected! clic here => "));
	print($cmr->module_link("modules/view_message.php?conf_name=conf_message.ini&id_message=" . $cmr->post_var["id_message"] . "", 1));
	print($cmr->translate(" to select one."));
    return;
} 

    $todo_type = $result_value["type"];
    $todo_state = "update";

//     $cmr->query["t_model_update"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message where (1) ";
//     $cmr->query["t_model_update"] .= "AND (my_master='cmr_model') ";
//     $cmr->query["t_model_update"] .= "AND (type='$todo_type') AND (state='$todo_state')  ";
//     $cmr->query["t_model_update"] .= "AND ((groups_dest IN ($list_group)) OR (groups_dest='') OR (groups_dest=NULL)) ";
//     $cmr->query["t_model_update"] .= "ORDER BY id;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $qr->sql_data["type"] = $todo_type;
        $qr->sql_data["state"] = $todo_state;
		$cmr->query["t_model_update"] = $qr->get_query("message_model_update");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//   $cmr->query["t_model"] = $cmr->query["t_model_update"];
//   $result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//   $r_model = $result_model->FetchNextObject(false);
//   =======================================
    $division->prints["match_value_model_id"] = $r_model->id;
  $division->prints["match_value_my_master"] = $r_model->title;
//   =======================================
    $division->prints["match_message_title1"] = $cmr->translate("update message");
//   $division->prints["match_message_title1"]  = $cmr->translate("reply_message_title");
    $division->prints["match_message_title2"]  = $cmr->translate("reply_message_text");

//   if(empty($cmr->post_var["id_message"])) exit;
    
    $division->prints["match_class_module"]  = "reply_message";
    $division->prints["match_func_list"] = $cmr->get_conf("cmr_update_function");
//   $model_title = $result_value["model_title"];

    empty($result_value["sender"]) ? $sender = $cmr->config["cmr_from_email"] : $sender = htmlentities($result_value["sender"]);
//   $division->prints["match_value_sender"] = $cmr->get_user("auth_email");
    $division->prints["match_value_mail_to"] = $result_value["mail_to"];
    $division->prints["match_value_mail_cc"] = $result_value["mail_cc"];
    $division->prints["match_value_mail_bcc"] = $result_value["mail_bcc"];
//   empty($result_value["sender"]) ? $sender = $cmr->config["cmr_from_email"] : $sender = htmlentities($result_value["sender"]);

    $division->prints["match_value_state"] = ucfirst("update");
    $division->prints["match_value_priority"] = $result_value["priority"];
    $division->prints["match_value_type"] = $result_value["type"];
    
  $division->prints["match_begin_time"] = $result_value["begin_time"];
  $division->prints["match_end_time"] = $result_value["end_time"];

	@ list($value_intervale, $intervale) = explode(" ", $result_value["intervale"]);
    $division->prints["match_value_intervale"]  = trim($value_intervale);
    $division->prints["match_intervale"] = trim($intervale);
    (empty($value_intervale)) ? $division->prints["match_value_ripetitive"] = "0" : $division->prints["match_value_ripetitive"] = "1";
//   $groups_dest1="<option>". $cmr->get_user("auth_group")."</option>";
    
    $division->prints["match_value_users_dest"] .= $cmr->config["cmr_bcc_email"];
    if(isset($_SESSION['message_users_dest'])) $division->prints["match_value_users_dest"] .= $_SESSION['message_users_dest'];
    if(!empty($result_value["users_dest"])) $division->prints["match_value_users_dest"] =  $result_value["users_dest"];

    $division->prints["match_value_groups_dest"] .= $cmr->get_conf("cmr_admin_group");
    if(isset($_SESSION['message_groups_dest'])) $division->prints["match_value_groups_dest"] .= $_SESSION['message_groups_dest'];
    if(!empty($result_value["groups_dest"])) $division->prints["match_value_groups_dest"] =  $result_value["groups_dest"];
     
    $array_value1 = array();
    $array_value2 = array();
    while ($groups_value = $result_group_name->FetchNextObject(false)){
     $array_value1[] = $groups_value->name;
     $array_value2[] = $groups_value->name;
    };
    
    
     $array_value1 = array();
     $array_value2 = array();
    while ($user_value = $result_user_email->FetchNextObject(false)){
     $array_value1[] = $user_value->email;
     $array_value2[] = $user_value->email;
    };

    
    
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_options_groups_dest"] = "<option value=\"" . $result_value["groups_dest"] . "\">" . ucfirst($result_value["groups_dest"]) . "</option>" . $division->prints["match_options_groups_dest"];

    if(isset($_SESSION['message_groups_dest'])){
        $division->prints["match_options_groups_dest"] .= "<option value=\"" . $_SESSION['message_groups_dest'] . "\">" . $_SESSION['message_groups_dest'] . "</option>";
    }
    $division->prints["match_options_groups_dest"] .= "<option>" . $cmr->get_conf("cmr_admin_group") . "</option>";
    
     $array_value1 = array();
     $array_value2 = array();
    while ($groups_value = $result_group->FetchNextObject(false)){
//       $division->prints["match_options_groups_dest"] .= "<option>" . $groups_value->name . "</option>";
     $array_value1[] = $groups_value->name;
     $array_value2[] = $groups_value->name;
    };
    $division->prints["match_options_groups_dest"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_value_modules_dest"] = $result_value["modules_dest"];
    $division->prints["match_value_begin_time"] = $result_value["begin_time"];
    $division->prints["match_value_end_time"] = $result_value["end_time"];
    $division->prints["match_value_title"]  = $result_value["title"];
    $division->prints["match_value_text"] = $result_value["text"];
    (empty($r_model->mail_title)) ? $mail_title =  "message:{{message_title}}" : $mail_title = $r_model->mail_title ;
    $division->prints["match_value_comment"] .= $result_value["comment"] . "\n* " . date("Y-m-d H:i:s") . $cmr->translate(" Updated by [") . $cmr->get_user("auth_email") . "]\n";
    $division->prints["match_value_pre_text"] = $result_value["text"];


  $division->prints["match_value_my_master"] = $result_value["id"];
//   $division->prints["match_value_allow_type"] = $result_value["allow_type"];
//   $division->prints["match_value_allow_email"] = $result_value["allow_email"];
//   $division->prints["match_value_allow_groups"] = $result_value["allow_groups"];


    $division->prints["match_submit_text"]  = $cmr->translate("reply_message");
    $division->prints["match_submit_text"]  = $cmr->translate("reply_message");
//   $division->prints["match_load_script"]  = "<script language=\"javascript\" type=\"text/javascript\">load_model(this.form,'model', 'message_');</script>";
    $division->prints["match_load_script"] ="";
    break;

// ==============================================================
// ==============================================================
// ==============email message ============================
// ==============================================================
// ==============================================================
case "email_message":

//   if(empty($cmr->post_var["id_message"])) exit;

    $division->prints["match_message_title1"] = $cmr->translate("email message");

//   $division->prints["match_message_title1"]  = $cmr->translate("delete_message_title");
//   $division->prints["match_message_title2"]  = $cmr->translate("delete_message_text");

    $division->prints["match_class_module"]  = "email_message";
    $division->prints["match_func_list"] = $cmr->get_conf("cmr_new_function");
//   $model_title = $result_value["model_title"];

//   $cmr->query["t_model_new"] = "SELECT * FROM " . $cmr->get_conf("cmr_table_prefix") . "message where (my_master='cmr_model') and ((groups_dest in ($list_group)) or (groups_dest='') or (groups_dest=NULL))  order by state;";
//   $cmr->query["t_model"] = $cmr->query["t_model_new"];

//   $result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
//   $r_model = $result_model->FetchNextObject(false);

//   =======================================
    $division->prints["match_value_model_id"] = $r_model->id;
//   =======================================
    $division->prints["match_message_title1"]  = $cmr->translate("email_message_title");
    $division->prints["match_message_title2"]  = $cmr->translate("email_message_text");

    $id_input = "";

//   $model_title = $r_model->model_title;

    $division->prints["match_options_state"] = "";
    $division->prints["match_value_priority"] = "";
    $division->prints["match_options_type"] = "";

    $division->prints["match_value_intervale"]  = "3";
    
    $division->prints["match_value_users_dest"] .= $cmr->config["cmr_bcc_email"];
    if(isset($_SESSION['message_users_dest'])) $division->prints["match_value_users_dest"] .= $_SESSION['message_users_dest'];
    if(!empty($result_value["users_dest"])) $division->prints["match_value_users_dest"] =  $result_value["users_dest"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_value_groups_dest"] .= $cmr->get_conf("cmr_admin_group");
    if(isset($_SESSION['message_groups_dest'])) $division->prints["match_value_groups_dest"] .= $_SESSION['message_groups_dest'];
    if(!empty($result_value["groups_dest"])) $division->prints["match_value_groups_dest"] =  $result_value["groups_dest"];
    
     $array_value1 = array();
     $array_value2 = array();
    while ($groups_value = $result_group->FetchNextObject(false)){
//       $division->prints["match_options_groups_dest"] .= "<option>" . $groups_value->name . "</option>";
     $array_value1[] = $groups_value->name;
     $array_value2[] = $groups_value->name;
    };
    $division->prints["match_options_groups_dest"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $division->prints["match_value_modules_dest"] = "";//$cmr->user["auth_email"];
    $division->prints["match_value_begin_time"] = "";//$cmr->user["auth_group"];
    $division->prints["match_value_end_time"] = "";


    empty($result_value["sender"]) ? $sender = $cmr->config["cmr_from_email"] : $sender = htmlentities($result_value["sender"]);
    empty($result_value["mail_to"]) ? $mail_to = $cmr->config["cmr_from_email"] : $mail_to = $result_value["mail_to"];
    empty($result_value["mail_cc"]) ? $mail_cc = $cmr->config["cmr_cc_email"] : $mail_cc = $result_value["mail_cc"];
    empty($result_value["mail_bcc"]) ? $mail_bcc = $cmr->config["cmr_bcc_email"] : $mail_bcc = $result_value["mail_bcc"];

//   $division->prints["match_value_sender"] = $cmr->get_user("auth_email");
//   $division->prints["match_value_mail_to"] = $cmr->config["cmr_from_email"];
//   $division->prints["match_value_mail_cc"] = $cmr->config["cmr_cc_email"];
//   $division->prints["match_value_mail_bcc"] = $cmr->config["cmr_bcc_email"];

    $division->prints["match_value_title"]  = $result_value["title"];
    $division->prints["match_value_pre_text"] = "";
    $division->prints["match_value_pre_text"] = "";
    $division->prints["match_value_comment"]  = "";
    $division->prints["match_value_text"] = htmlentities($result_value["text"]) . "\n\n";
    $division->prints["match_value_mail_title"] = $result_value["mail_title"] ;

    $division->prints["match_submit_text"]  = $cmr->translate("send");
    $division->prints["match_load_script"]  = "";

    break;
//   ==============================================================
//   ==============================================================
//   ==============new case ============================
//   ==============================================================
//   ==============================================================
    case "new_message":
//   ==============================================================
//   ==============================================================
//   ==============default case ============================
//   ==============================================================
//   ==============================================================
    default:
    break;
}
// ==============================================================
// ==============================================================


// ==============================================================
// ==============================================================
// ===============loading model in html object====================
// ==============================================================
  $division->prints["match_options_model"] = "";
	 $array_value1 = array();
	 $array_value2 = array();
	$result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	while ($r_model = $result_model->FetchNextObject(false)){
	 $array_value1[] = $r_model->id ;
	 $array_value2[] = htmlentities(substr($r_model->title, 0, 66));
	}
// ==============================================================
  $division->prints["match_options_model"] .= select_order($cmr->language, $array_value1,  $array_value2, "");
// ==============================================================


// ==============================================================
// ==============================================================
  $division->prints["match_func_sender"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_sender', '');
  $division->prints["match_func_groups_dest"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_groups_dest', '');
  $division->prints["match_func_users_dest"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_users_dest', '');
  $division->prints["match_func_title"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_title', '');
  $division->prints["match_func_text"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_text', '');
  $division->prints["match_func_modules_dest"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_modules_dest', '');
  $division->prints["match_func_mail_to"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_mail_to', '');
  $division->prints["match_func_mail_cc"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_mail_cc', '');
  $division->prints["match_func_mail_bcc"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_mail_bcc', '');
  $division->prints["match_func_priority"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_priority', '');
  $division->prints["match_func_type"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_type', '');
  $division->prints["match_func_state"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_state', '');
  $division->prints["match_func_begin_time"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_begin_time', '');
  $division->prints["match_func_intervale"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_intervale', '');
  $division->prints["match_func_end_time"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_end_time', '');
  $division->prints["match_func_my_master"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_my_master', '');
//   $division->prints["match_func_allow_type"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_allow_type', '');
//   $division->prints["match_func_allow_email"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_allow_email', '');
//   $division->prints["match_func_allow_groups"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_allow_groups', '');
  $division->prints["match_func_comment"] = cmrprint_select($cmr->get_conf("cmr_new_function"), 'func_comment', '');
// ==============================================================
// ==============================================================



// ==============================================================
// =========================hidden===============================
// ==============================================================
// $cmr->query["t_model"] = "SELECT * FROM ". $cmr->get_conf("cmr_table_prefix") ."message where (model_title like 'cmr_model:%') order by id;";

$cmr->db_connection->SetFetchMode(ADODB_FETCH_NUM);
	$result_model = &$cmr->db_connection->Execute($cmr->query["t_model"]) /*, $cmr->get_conf("cmr_max_view")*/ /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
  $division->prints["match_hidden_model"] = "";
	$array_columns=get_all_columns($cmr->db_connection, $cmr->get_conf("cmr_table_prefix"), "message");
//     cmr_print_r($array_columns);exit;
if($result_model) 
	while ($r_model = $result_model->FetchRow()){
	    $message_value = "";
	    for($j = 0; $j < $result_model->FieldCount( ); $j++){
        if(empty($array_columns[$j]["Field"])) $array_columns[$j]["Field"] = "";
        if(empty($r_model[$j])) $r_model[$j] = "";
	        $message_value .= $array_columns[$j]["Field"] . ":,:" . $r_model[$j] . ":.:";
	    }
	    $division->prints["match_hidden_model"] .= "<input  type=\"hidden\" name=\"message_" . $r_model[0] . "\" id=\"message_" . $r_model[0] . "\" value=\"" . $message_value . "\" />\r\n";
// 	$result_model->MoveNext();
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
  $division->prints["match_hidden_from"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->config["cmr_from_email"]."\" name=\"sender\"  id=\"sender\" />");
  $division->prints["match_hidden_to"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->config["cmr_from_email"]."\" name=\"mail_to\"  id=\"mail_to\" />");
  $division->prints["match_hidden_cc"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->config["cmr_cc_email"]."\" name=\"mail_cc\"  id=\"mail_cc1\" />");
  $division->prints["match_hidden_bcc"] = input_hidden("<input type=\"hidden\" value=\"".$cmr->config["cmr_bcc_email"]."\" name=\"mail_bcc\"  id=\"mail_bcc1\" />");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


  $division->prints["match_message_title1"] = ""; 
  $division->prints["match_message_title2"] = ""; 
	if(($cmr->translate($mod->base_name))) 
  $division->prints["match_message_title1"] = $cmr->translate($mod->base_name);
	if(isset($cmr->language[$mod->base_name."_title"])) 
  $division->prints["match_message_title2"] = $cmr->translate($mod->base_name . "_title");


  $division->prints["match_link_legend"] = $cmr->translate("Links");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$file_list = array();
	$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_message" . $cmr->get_ext("template");
	$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_message" . $cmr->get_ext("template");
	$file_list[] = $cmr->get_path("template") . "templates/modules/template_message" . $cmr->get_ext("template");
	$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_message" . $cmr->get_ext("template");
	$division->template = $division->load_template($file_list);
	
	  
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(($cmr->get_conf("message_tiny_editor"))){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
  $division->prints["match_label_message_alert1"] = $cmr->translate("message_alert1");
  $division->prints["match_label_message_alert2"] = $cmr->translate("message_alert2");
  $division->prints["match_label_message_alert3"] = $cmr->translate("message_alert3");
  $division->prints["match_label_message_alert4"] = $cmr->translate("message_alert4");
  $division->prints["match_label_message_alert5"] = $cmr->translate("message_alert5");
  $division->prints["match_label_message_alert6"] = $cmr->translate("message_alert6");
  $division->prints["match_label_message_alert7"] = $cmr->translate("message_alert7");
  $division->prints["match_label_message_alert8"] = $cmr->translate("message_alert8");
  $division->prints["match_label_message_alert9"] = $cmr->translate("message_alert9");
  $division->prints["match_label_message_alert10"] = $cmr->translate("message_alert10");
  $division->prints["match_label_message_alert11"] = $cmr->translate("message_alert11");
  $division->prints["match_label_message_alert12"] = $cmr->translate("message_alert12");
  $division->prints["match_label_message_alert13"] = $cmr->translate("message_alert13");
  $division->prints["match_label_message_alert14"] = $cmr->translate("message_alert14");
  $division->prints["match_label_message_alert15"] = $cmr->translate("message_alert15");
  $division->prints["match_label_message_alert16"] = $cmr->translate("message_alert16");
	
  $division->prints["match_label_message_alert16"] = $cmr->translate("message_alert16");
  $division->prints["match_label_message_alert17"] = $cmr->translate("message_alert17");
  $division->prints["match_label_message_alert18"] = $cmr->translate("message_alert18");
  $division->prints["match_label_message_alert19"] = $cmr->translate("message_alert19");
  $division->prints["match_label_message_alert20"] = $cmr->translate("message_alert20");
  $division->prints["match_label_message_alert21"] = $cmr->translate("message_alert21");
  $division->prints["match_label_message_alert22"] = $cmr->translate("message_alert22");
  $division->prints["match_label_message_alert23"] = $cmr->translate("message_alert23");
  $division->prints["match_label_message_alert24"] = $cmr->translate("message_alert24");
  $division->prints["match_label_message_alert25"] = $cmr->translate("message_alert25");
  $division->prints["match_label_message_alert26"] = $cmr->translate("message_alert26");
  $division->prints["match_label_message_alert27"] = $cmr->translate("message_alert27");
  $division->prints["match_label_message_alert28"] = $cmr->translate("message_alert28");
  $division->prints["match_label_message_alert29"] = $cmr->translate("message_alert29");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// }else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template4");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template5");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template6");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// }else{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template7");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$division->print_template("template8");
	$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
