<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_report_compare.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.









get_report_compare.php, Ver 3.03 
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to compare module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// case "report_compare":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $call_log_user = $cmr->user["auth_email"];
    $call_log_group = $cmr->user["auth_groups"];
    $send_month = get_post('the_month');
    $send_year = get_post('the_year');
    $send_week = get_post('the_week');
    $send_day = get_post('the_day');
    $report_type = get_post('table_by_table');
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$the_day = "";
	$destinate = $cmr->translate($report_type);
	$date_time1="";
	$date_time2="";
    (empty($send_day)) ? $period = $cmr->translate(" All day - ") : $period = $send_day . $cmr->translate("° day/");
    (empty($send_month)) ? $period .= $cmr->translate(" All month - ") : $period .= $send_month . $cmr->translate("° month/");
    (empty($send_year)) ? $period .= $cmr->translate(" All year - ") : $period .= $send_year . " ";
    (empty($send_week)) ? $period .= "" : $period .= " (" . $send_week . $cmr->translate("° Week)");
// 	age BETWEEN 12 AND 16
// 	age IN (‘rouge’, ‘blanc’, ’noir’)
	if($send_week == "first_week") $the_day = "01 AND 07";
	if($send_week == "second_week") $the_day = "07 AND 14";
	if($send_week == "third_week") $the_week = "14 AND 21";
	if($send_week == "fourth_week") $the_day = "21 AND 28";
	if($send_week == "last_week") $the_day = "28 AND 31";
	
    if(!empty($send_year)) $send_year = sprintf("%04d", $send_year);
    if(!empty($send_month)) $send_month = sprintf("%02d", $send_month);
//     if(!empty($send_day)) $send_day = sprintf("%02d", $send_day);
    
    if(empty($send_year)) $send_year = "____";
    if(empty($send_month)) $send_month = "__";
    if(empty($send_day)) $send_day = "__";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    
    
    
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($report_type){
	case "ticket_by_date":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "date_time";
	$complete_column = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
	break;
	
	case "ticket_by_user":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "work_by";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_group":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "call_log_group";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_asset":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "list_user_impact";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_type":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_state":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_state_now":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "state_now";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_severity":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "severity";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "ticket_by_update":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_by_group":
	$cmr->post_var["report_table"] = "user_groups";
	$cmr->post_var["report_column"] = "user_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_by_sexe":
	$cmr->post_var["report_table"] = "user";
	$cmr->post_var["report_column"] = "sexe";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_by_type":
	$cmr->post_var["report_table"] = "user";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_by_state":
	$cmr->post_var["report_table"] = "user";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_by_status":
	$cmr->post_var["report_table"] = "user";
	$cmr->post_var["report_column"] = "status";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	
	case "group_by_state":
	$cmr->post_var["report_table"] = "groups";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "group_by_type":
	$cmr->post_var["report_table"] = "groups";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "group_by_notify":
	$cmr->post_var["report_table"] = "groups";
	$cmr->post_var["report_column"] = "notify";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "user_group_by_type":
	$cmr->post_var["report_table"] = "user_groups";
	$cmr->post_var["report_column"] = "type";
	break;
	
	case "user_group_by_state":
	$cmr->post_var["report_table"] = "user_groups";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "father_group_by_state":
	$cmr->post_var["report_table"] = "father_groups";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "message_by_date":
	$cmr->post_var["report_table"] = "message";
	$cmr->post_var["report_column"] = "date_time";
	$complete_column = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
	break;
	
	case "message_by_user":
	$cmr->post_var["report_table"] = "message";
	$cmr->post_var["report_column"] = "users_dest";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "message_by_group":
	$cmr->post_var["report_table"] = "message";
	$cmr->post_var["report_column"] = "groups_dest";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "message_by_type":
	$cmr->post_var["report_table"] = "message";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "message_by_state":
	$cmr->post_var["report_table"] = "message";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "asset_by_user":
	$cmr->post_var["report_table"] = "asset";
	$cmr->post_var["report_column"] = "allow_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "asset_by_group":
	$cmr->post_var["report_table"] = "asset";
	$cmr->post_var["report_column"] = "allow_groups";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "asset_by_type":
	$cmr->post_var["report_table"] = "asset";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "asset_by_state":
	$cmr->post_var["report_table"] = "asset";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "asset_by_os":
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "os";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "session_by_date":
	$cmr->post_var["report_table"] = "session";
	$cmr->post_var["report_column"] = "date_time";
	$complete_column = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
	break;
	
	case "session_by_user":
	$cmr->post_var["report_table"] = "session";
	$cmr->post_var["report_column"] = "user_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "session_by_ip":
	$cmr->post_var["report_table"] = "session";
	$cmr->post_var["report_column"] = "sessionip";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "comment_by_date":
	$cmr->post_var["report_table"] = "comment";
	$cmr->post_var["report_column"] = "date_time";
	$complete_column = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
	break;
	
	case "comment_by_user":
	$cmr->post_var["report_table"] = "comment";
	$cmr->post_var["report_column"] = "allow_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "comment_by_group":
	$cmr->post_var["report_table"] = "comment";
	$cmr->post_var["report_column"] = "allow_groups";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;

	case "comment_by_ticket":
	$cmr->post_var["report_table"] = "comment";
	$cmr->post_var["report_column"] = "table_name";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "comment_by_state":
	$cmr->post_var["report_table"] = "comment";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_state":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_type":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_table_name":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "table_name";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_privilege":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "privilege";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_allow_type":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "allow_type";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_allow_groups":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "allow_groups";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_allow_email":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "allow_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_state":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "policy_by_source":
	$cmr->post_var["report_table"] = "policy";
	$cmr->post_var["report_column"] = "source";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "notify_by_action":
	$cmr->post_var["report_table"] = "notify";
	$cmr->post_var["report_column"] = "action";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	
	case "notify_by_destination":
	$cmr->post_var["report_table"] = "notify";
	$cmr->post_var["report_column"] = "destination";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "notify_by_source":
	$cmr->post_var["report_table"] = "notify";
	$cmr->post_var["report_column"] = "source";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "notify_by_state":
	$cmr->post_var["report_table"] = "notify";
	$cmr->post_var["report_column"] = "state";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	
	case "monitor_by_group_name":
	$cmr->post_var["report_table"] = "monitor";
	$cmr->post_var["report_column"] = "group_name";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "history_by_user_email":
	$cmr->post_var["report_table"] = "history";
	$cmr->post_var["report_column"] = "user_email";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "history_by_action":
	$cmr->post_var["report_table"] = "history";
	$cmr->post_var["report_column"] = "action";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	case "history_by_table_name":
	$cmr->post_var["report_table"] = "history";
	$cmr->post_var["report_column"] = "table_name";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
	
	default:
	$cmr->post_var["report_table"] = "ticket";
	$cmr->post_var["report_column"] = "work_by";
	$complete_column = $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . "." . $cmr->post_var["report_column"];
	break;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    
    
    
    
    
    
    
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(empty($cmr->post_var["report_table"])) $cmr->post_var["report_table"] = "ticket";
    if($cmr->post_var["report_table"] == "ticket_receive") $cmr->post_var["report_table"] = "ticket";
// 	if(empty($call_log_group)) $destinate .= $call_log_group;
// 	if(empty($call_log_user)) $destinate .= " - " . $call_log_user . " - ";
	if(empty($destinate)) $destinate .= $cmr->translate(" ALL ");
	
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	 $date_time1 = $send_year . "-" . $send_month . "-" . $send_day;
	 $date_time2 = $send_year . $send_month . $send_day;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	    echo "\$date_time2=$date_time2\n\$date_time2=$date_time2";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $cmr->post_var["report_table"];
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$date_year = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%Y')";
$date_month = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m')";
$date_year_month = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
$date_day = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%d')";
$date_date = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%Y-%m-%d %H:%i:%s')";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query["report_select"] .= " " . $date_year . " AS the_year, ";
// $cmr->query["report_select"] .= " " . $date_month . " AS the_month, ";
// $cmr->query["report_select"] .= " " . $date_day . " AS the_day, ";
// $cmr->query["report_select"] .= " " . $date_date . " AS the_date ";
// $cmr->query[$cmr->post_var["report_table"]] .= " AND DATE_FORMAT(" . $true_table . "." . $date_time1 . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $cmr->post_var[$date_time_base1 . "1"] . "' as DATETIME) AND cast('" . $cmr->post_var[$date_time_base1 . "2"] . "' as DATETIME)";

$cmr->query["report_select"] = " SELECT " . $complete_column . ", COUNT(*) ";
$cmr->query["report_select"] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query["report_where"] = " WHERE ((1) ";
$cmr->query["report_where"] .= " AND (";
$cmr->query["report_where"] .= " (" . $date_date . " LIKE ('" . $date_time1 . "%')";
$cmr->query["report_where"] .= " OR date_time LIKE ('" . $date_time2 . "%'))";
if(!empty($send_week)) $cmr->query["report_where"] .= " AND " . $date_day . " BETWEEN " . $the_day . "";


$cmr->query["report_where"] .= ")";
$cmr->query["report_where"] .= ") ";
$cmr->query["report_where"] .= " AND " . $cmr->action["where"];




// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["sql_report"] = $cmr->query["report_select"] . $cmr->query["report_where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($report_type){
	
	case "comment_by_ticket":"comment_by_ticket";
	$cmr->query["report_where"] .= " AND (table_name = 'ticket')";
	$cmr->post_var["sql_report"].= " AND (table_name = 'ticket')";
	$cmr->post_var["sql_report"] .= " GROUP BY state DESC "; 
	$cmr->post_var["sql_report"] .= " ORDER BY state DESC ";
	break;

	default:
	$cmr->post_var["sql_report"] .= " GROUP BY " . $complete_column . " DESC "; 
	$cmr->post_var["sql_report"] .= " ORDER BY " . $complete_column . " DESC ";
	break;
}

//	$cmr->post_var["sql_report"] .= " LIMIT 100;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["report_where"] = $cmr->query["report_where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->output[0]="<i>" . $cmr->translate("Report of: " . $period . " generated for:")."</i><b>" . $destinate . "</b><br />";
$cmr->post_var["output0"] = "<i>" . $cmr->translate("Report of: " . $period ." generated for:")."</i><b>" . $destinate . "</b><br />";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'report', '" . $report_type . "', 'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
// $cmr->page["middle1"] = $mod->path;
	$cmr->page["middle1"] = get_post("middle1");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>