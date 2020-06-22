<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_event.php
 *    ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.03 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









view_event.php,Ver 3.0  2011-July 10:36:59
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
//
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


if(!$cmr->db_connection) return;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_themes($cmr->themes);
$division->module["name"]= basename(__FILE__);



$division->module["title"] = "";
// $division->module["text"] = "";
$division->themes["header_visible"] = 0;





$division->prints["match_open_windows"] = $division->show_noclose();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $division->prints["match_view_event_title1"] = "";
// $division->prints["match_view_event_title2"] = "";
// if(($cmr->translate($mod->base_name)))
// $division->prints["match_view_event_title1"] = $cmr->translate($mod->base_name);
// if(isset($cmr->language[$mod->base_name."_title"]))
// $division->prints["match_view_event_title2"] = $cmr->translate($mod->base_name . "_title");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query["cron_message1"] = $qr->get_query("cron_message1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["cron_message1"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "message.* ";
// $cmr->query["cron_message1"] .= " FROM  " . $cmr->get_conf("cmr_table_prefix") . "message ";
// $cmr->query["cron_message1"] .= " WHERE ( ";

// $cmr->query["cron_message1"] .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time)) ";

// $cmr->query["cron_message1"] .=" AND (state <> 'disable') ";
// $cmr->query["cron_message1"] .=" AND (modules_dest = 'cron.php') ";

// $cmr->query["cron_message1"] .= ") AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$result = sql_run("array", $cmr->db_connection, "sql", $cmr->query["cron_message1"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($result))
foreach($result as $data){
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$cmr->action["cron_text"] = $data[0]["text"];
		$cmr->action["cron_type"] = $data[0]["type"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(($cmr->get_action("cron_text"))){
		    /*==================*/
		 include_once($cmr->get_path("get_data") . "get_data/get_commands.php");
         include_once($cmr->get_path("index") . "system/run_result.php");
		    /*==================*/
	}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_action("cron_text"))){
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query["cron_message2"] = $qr->get_query("cron_message2");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 		$cmr->query["cron_message2"] = "UPDATE " . $cmr->get_conf("cmr_table_prefix") . "message ";
// 		$cmr->query["cron_message2"] .= " SET state  =  'disable' ";
// 		$cmr->query["cron_message2"] .= " WHERE ( ";
//
// 		$cmr->query["cron_message2"] .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time)) ";
//
// 		$cmr->query["cron_message2"] .=" AND (state <> 'disable') ";
// 		$cmr->query["cron_message2"] .=" AND (modules_dest = 'cron.php') ";
//
// 		$cmr->query["cron_message2"] .= ") AND " . $cmr->action["where"];
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$result_message = $cmr->db_connection->query($cmr->query["cron_message2"]) /*, $cmr->db_connection)*/  or print($cmr->db_connection->ErrorMsg());
		// ========================Cleaning=======================
}
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "message";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query["num_message"] = $qr->get_query("num_message");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $cmr->query["num_message"] = "SELECT DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "message.id ";
// $cmr->query["num_message"] .= " FROM  " . $cmr->get_conf("cmr_table_prefix") . "message ";
// $cmr->query["num_message"] .= " WHERE ( ";
// $cmr->query["num_message"] .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";


// $cmr->query["num_message"] .= " AND (( users_dest like ('%" . $cmr->get_user("auth_email") . "%')) ";
// $cmr->query["num_message"] .= " OR (groups_dest IN (" . $cmr->get_user("auth_list_group") . "))) ";
// // $cmr->query["num_message"] .= " AND (sender NOT LIKE ('%" . $cmr->get_user("auth_email") . "%')) ";

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $GLOBALS["message_read"] = $cmr->readed_line("message");
// $GLOBALS["message_read"] = $cmr->readed_line("message");
// $list_id_message = implode($GLOBALS["message_read"], "','");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["num_message"] .= " AND id NOT IN ('" . $list_id_message . "')";
// $cmr->query["num_message"] .= ") AND " . $cmr->action["where"] . " ";
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "ticket";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query["num_ticket"] = $qr->get_query("num_ticket");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // $cmr->query["num_ticket"] = "SELECT COUNT(DISTINCT " . $cmr->get_conf("cmr_table_prefix") . "ticket.id), id";
// $cmr->query["num_ticket"] = "SELECT id ";
// $cmr->query["num_ticket"] .= " FROM  " . $cmr->get_conf("cmr_table_prefix") . "ticket ";
// $cmr->query["num_ticket"] .= " WHERE (";

// $cmr->query["num_ticket"] .= " (state_now=state)  ";
// $cmr->query["num_ticket"] .= " AND (state!='close') ";
// $cmr->query["num_ticket"] .= " AND (my_master != 'cmr_model') ";
// $cmr->query["num_ticket"] .= " AND ((call_log_group in (" . $cmr->get_user("auth_list_group") . ")) or (assign_to in (" . $cmr->get_user("auth_list_group") . ")) ";
// $cmr->query["num_ticket"] .= " OR (assign_to='" . $cmr->get_user("auth_email") . "')  OR (call_log_user='" . $cmr->get_user("auth_email") . "')  OR (work_by='" . $cmr->get_user("auth_email") . "')) ";

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $GLOBALS["ticket_read"] = $cmr->readed_line("ticket");
// $list_id_ticket = implode($GLOBALS["ticket_read"], "','");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["num_ticket"] .= " AND id NOT IN ('" . $list_id_ticket  . "')";

// // $cmr->query["num_ticket"] .= " (SELECT line_id FROM " . $cmr->get_conf("cmr_table_prefix") . "history ";
// // $cmr->query["num_ticket"] .= " WHERE (action = 'read') AND (user_email = '" . $cmr->get_user("auth_email") . "' ) ";
// // $cmr->query["num_ticket"] .= " AND (table_name='" . $cmr->get_conf("cmr_table_prefix") . "ticket')) ";

// $cmr->query["num_ticket"] .= ") ";
// $cmr->query["num_ticket"] .= " AND " . $cmr->action["where"];
// // $cmr->query["num_ticket"] .= "GROUP BY id ";
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->db_connection)
$result_message = $cmr->db_connection->query($cmr->query["num_message"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
if($cmr->db_connection)
$result_ticket = $cmr->db_connection->query($cmr->query["num_ticket"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// ------------------------
if($result_message)
 if(!($division->prints["match_value_num_message"] = $result_message->field_count)) $division->prints["match_value_num_message"] = 0;
if($result_ticket)
 if(!($division->prints["match_value_num_ticket"] = $result_ticket->field_count)) $division->prints["match_value_num_ticket"] = 0;
// if(!($division->prints["match_value_num_email"] = $result_email->RecordCount())) $division->prints["match_value_num_email"] = 0;
// ------------------------
// $division->prints["match_value_num_message"] = $result_message[0][0];
// $division->prints["match_value_num_ticket"] = $result_ticket[0][0];
// $result_email = 0;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// include_once($cmr->get_path("class") . "class/class_imap.php");
// $m = new class_imap();
// $m->imap_service="imap";
// $m->imap_server = $cmr->email["imap_server"];
// $m->imap_port = $cmr->email["imap_port"];
// $m->imap_user_name = $cmr->email["imap_user_name"];
// $m->imap_password = $cmr->email["imap_password"];
// $m->imap_default_folder = $cmr->email["imap_default_folder"];
//
// $cmr->email["imap_default_folder"] = $m->imap_default_folder;
// $m->mailbox=$m->get_mailbox();
// // $name = strtoupper(str_replace($m->mailbox, "", $m->mailbox));
// $cmr->post_var["Unread" . $name] = "0";
(empty($cmr->post_var["UnreadINBOX"])) ? $division->prints["match_value_num_email"] = "0" : $division->prints["match_value_num_email"] = $cmr->post_var["UnreadINBOX"];
// // =======================================================================
// if(!($m->connect())){
// }else{
// $info_new=$m->get_mailboxmsginfo();
// if(!empty($info_new->Unread)) $division->prints["match_value_num_email"] = "(" . $info_new->Unread . ")";
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["cmr_image_path"] = "";
$division->prints["match_event_key"] = "";
$division->prints["match_value_event_key"] = "";
$division->prints["match_label_unread_message"] = $cmr->translate(" Messages Unread") ;
$division->prints["match_label_unread_ticket"] = $cmr->translate(" Ticket Unread") ;
$division->prints["match_label_unread_email"] = $cmr->translate(" Email Unread") ;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_label_account"] = $cmr->translate("account");
$division->prints["match_label_exit"] = $cmr->translate("exit");
$division->prints["match_label_home"] = $cmr->translate("home");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_view_event" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_view_event" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_view_event" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/auto/template_view_event" . $cmr->get_ext("template");
$division->template = $division->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $division->prints["match_alert_text"] = "" ;
 if(($division->prints["match_value_num_message"] != $cmr->get_user("value_num_message"))  && (!empty($division->prints["match_value_num_message"])))
 if(!($cmr->get_user("value_num_message")))
 $division->prints["match_alert_text"] .= $cmr->translate($division->prints["match_value_num_message"] . " !!! New Messages Unread !!!") . "\\n";

 if(($division->prints["match_value_num_ticket"] != $cmr->get_user("value_num_ticket"))  && (!empty($division->prints["match_value_num_ticket"])))
 if(!($cmr->get_user("value_num_ticket")))
 $division->prints["match_alert_text"] .= $cmr->translate($division->prints["match_value_num_ticket"] . " !!! New Ticket Unread !!!") . "\\n";

 if(($division->prints["match_value_num_email"] != $cmr->get_user("value_num_email")) && (!empty($division->prints["match_value_num_email"])))
 if(!($cmr->get_user("value_num_email")))
 $division->prints["match_alert_text"] .= $cmr->translate($division->prints["match_value_num_email"] . " !!! New Email Unread !!!") . "\\n";

 $cmr->user["value_num_message"] = $division->prints["match_value_num_message"];
 $cmr->user["value_num_ticket"] = $division->prints["match_value_num_ticket"];
 $cmr->user["value_num_email"] = $division->prints["match_value_num_email"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 $division->prints["match_link_num_email"] = $cmr->module_link("modules/view_imap.php&event_action=unread", "", $division->prints["match_value_num_email"] . " " . $division->prints["match_label_unread_email"]);
 $division->prints["match_link_num_message"] = $cmr->module_link("modules/view_message_tab.php&event_action=unread", "", $division->prints["match_value_num_message"] . " " . $division->prints["match_label_unread_message"]);
 $division->prints["match_link_num_ticket"] = $cmr->module_link("modules/view_ticket_tab.php&event_action=unread", "", $division->prints["match_value_num_ticket"] . " " .  $division->prints["match_label_unread_ticket"]);
 $division->prints["match_link_my_account"] = $cmr->module_link("modules/my_account.php", "", $cmr->translate("account"));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->action["table_name"] = "user";
	$cmr->action["column"] = "";
	$cmr->action["action"] = "select";
	$cmr->action["where"] = $cmr->where_query();
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$cmr->query["locked"] = " SELECT " . $cmr->get_conf("cmr_table_prefix") . "user.*, ";
// 	$cmr->query["locked"] .= " DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . "user.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
// 	$cmr->query["locked"] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . "user ";
// 	$cmr->query["locked"] .= " WHERE  (state='locked') ";
// 	$cmr->query["locked"] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$qr = new class_database($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
$cmr->query["locked"] = $qr->get_query("locket_user");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$array_uid = array();
$array_email = array();
$array_type = array();
$array_state = array();
$array_pw = array();
$array_date_time = array();
$db_result = sql_run("array_assoc", $cmr->db_connection, "sql", $cmr->query["locked"], $cmr->get_conf("db_name"), $cmr->get_conf("cmr_table_prefix") . "user", "*");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 if(!empty($db_result)){
       foreach($db_result as $key => $value){
 		if(!empty($value["email"])){
                    $array_uid[] = $value["uid"];
                    $array_email[] = trim($value["email"]);
                    $array_type[] = $value["type"];
                    $array_state[] = $value["state"];
                    $array_date_time[] = $value["date_time"];
                    $array_pw[] = $value["pw"];
            }
        }

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(!empty($array_email)){
                array_multisort(
                    $array_uid, SORT_DESC, SORT_STRING,
                    $array_email, SORT_DESC, SORT_STRING,
                    $array_type, SORT_DESC, SORT_STRING,
                    $array_state, SORT_DESC, SORT_STRING,
                    $array_date_time, SORT_DESC, SORT_STRING,
                    $array_pw, SORT_DESC, SORT_STRING
                    );
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

  $division->prints["match_www_path"] = $cmr->get_path("www");
  $division->prints["match_form_param"] = "";
  $division->prints["match_form_id"] = "view_event";

  $division->prints["match_input_hidden_module"] = input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />");
  $division->prints["match_input_hidden_get"] = input_hidden("<input type=\"hidden\" value=\"view_event.php\" name=\"cmr_get_data\" />");
  $division->prints["match_input_hidden_conf"] = "";

  $division->prints["match_legend"] = $cmr->translate("User to unlock ");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_uid"] = $cmr->translate("Uid");
  $division->prints["match_email"] = $cmr->translate("Email");
  $division->prints["match_group"] = $cmr->translate("group");
  $division->prints["match_type"] = $cmr->translate("type");
  $division->prints["match_unlock"] = $cmr->translate("Unlock");
  $division->prints["match_link"] = $cmr->translate("Link");
  $division->prints["match_date_time"] = $cmr->translate("Date time");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  $division->prints["match_input_hidden_list_email"] = input_hidden("<input type=\"hidden\" value=\"" . implode(",", $array_email) . "\" name=\"list_email\" />");
  $division->prints["match_list_user_groups"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $options_group = $cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'groups', 'name', 'column', $cmr->config['db_name']);
            $options_type = $cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'type', 'type', $cmr->config['db_name']);
            $options_state = $cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'state', 'type', $cmr->config['db_name']);
            foreach ($array_email as $key => $value){
	            if(!empty($value)){
                    $division->prints["match_list_user_groups"] .= "<tr>";
                    $division->prints["match_list_user_groups"] .= "<td>" . $key . "</td>";
                    $division->prints["match_list_user_groups"] .= "<td>" . $array_uid[$key] . "</td>";
                    $division->prints["match_list_user_groups"] .= "<td>" . list_user_groups_link($cmr->config, $cmr->page, $cmr->language, $array_email[$key]) . "</td>";


                    $division->prints["match_list_user_groups"] .= "<td>";
                    $division->prints["match_list_user_groups"] .= "<select name=\"group_" . $array_email[$key] . "\" >";
                    $division->prints["match_list_user_groups"] .= "<option value=\"guest\" >guest</option>";
				  $division->prints["match_list_user_groups"] .= $options_group;
                    $division->prints["match_list_user_groups"] .= "</select>";
                    $division->prints["match_list_user_groups"] .= "</td>";


                    $division->prints["match_list_user_groups"] .= "<td>";
                    $division->prints["match_list_user_groups"] .= "<select name=\"type_" . $array_email[$key] . "\" >";
                    $division->prints["match_list_user_groups"] .= "<option value=\"" . $array_type[$key] . "\" >" . $array_type[$key] . "</option>";
				  $division->prints["match_list_user_groups"] .= $options_type;
                    $division->prints["match_list_user_groups"] .= "</select>";
                    $division->prints["match_list_user_groups"] .= "</td>";




                    $division->prints["match_list_user_groups"] .= "<td>";
                    $division->prints["match_list_user_groups"] .= "<select name=\"state_" . $array_email[$key] . "\" >";
                    $division->prints["match_list_user_groups"] .= "<option value=\"" . $array_state[$key] . "\" >" . $array_state[$key] . "</option>";
				  $division->prints["match_list_user_groups"] .= $options_state;
                    $division->prints["match_list_user_groups"] .= "</select>";
                    $division->prints["match_list_user_groups"] .= "</td>";


                    $division->prints["match_list_user_groups"] .= "<td>" . "<input type=\"text\" value=\"" . "index.php?cmr_mode=validation&cmr_get_data=validation&uid=" . $array_uid[$key] . "&code1=" . md5("cmr_" . $array_pw[$key]) . "\" size=\"16\" /></td>";
                    $division->prints["match_list_user_groups"] .= "<td>" . date_link($cmr->config, $cmr->page, $cmr->language, $array_date_time[$key]) . " </td>";
                    $division->prints["match_list_user_groups"] .= "</tr>";
            }
        }
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		  $division->prints["match_reset_form"] = $cmr->translate("confirm that you want to empty this form");
		  $division->prints["match_submit"] = $cmr->translate('Unlock');
		  $division->prints["match_submit_java"] = $cmr->translate("confirm that you want to Unlock these user");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$division->print_template("template2");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
  }
  }
  }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//     // include($cmr_config["cmr_path"] ."event_iframe.php");
//     // include($cmr_config["cmr_path"] ."event_popup.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->prints["match_close_windows"] = $division->close();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($_SERVER['PHP_AUTH_USER']))
if(empty($cmr->config["cmr_ip_auth"]))
if(!empty($division->prints["match_alert_text"])) $division->print_template("template3");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division->print_template("template4");
$division->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
