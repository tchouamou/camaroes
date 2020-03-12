<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_report_periodic.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.


get_report_periodic.php, Ver 3.03 
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// case "report_periodic":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $call_log_user = get_post('call_log_user');
    $call_log_group = get_post('call_log_group');
    $send_month = get_post('the_month');
    $send_year = get_post('the_year');
    $send_week = get_post('the_week');
    $send_day = get_post('the_day');
    $cmr->post_var["report_table"] = get_post('the_table');
    $cmr->post_var["report_column"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$week_days = "";
	$destinate = "";
	$date_time1="";
	$date_time2="";
    (empty($send_day)) ? $period = $cmr->translate(" All day - ") : $period = $send_day . $cmr->translate("° day/");
    (empty($send_month)) ? $period .= $cmr->translate(" All month - ") : $period .= $send_month . $cmr->translate("° month/");
    (empty($send_year)) ? $period .= $cmr->translate(" All year - ") : $period .= $send_year . " ";
    (empty($send_week)) ? $period .= "" : $period .= " (" . $send_week . $cmr->translate("° Week)");
// 	age BETWEEN 12 AND 16
// 	age IN (‘rouge’, ‘blanc’, ’noir’)
	if($send_week == "first_week") $week_days = "01 AND 07";
	if($send_week == "second_week") $week_days = "07 AND 14";
	if($send_week == "third_week") $the_week = "14 AND 21";
	if($send_week == "fourth_week") $week_days = "21 AND 28";
	if($send_week == "last_week") $week_days = "28 AND 31";
	
    if(!empty($send_year)) $send_year = sprintf("%04d", $send_year);
    if(!empty($send_month)) $send_month = sprintf("%02d", $send_month);
//     if(!empty($send_day)) $send_day = sprintf("%02d", $send_day);
    
    if(empty($send_year)) $send_year = "____";
    if(empty($send_month)) $send_month = "__";
    if(empty($send_day)) $send_day = "__";
    
    if(empty($cmr->post_var["report_table"])) $cmr->post_var["report_table"] = "ticket";
    if($cmr->post_var["report_table"] == "ticket_receive") $cmr->post_var["report_table"] = "ticket";
	if(!empty($call_log_group)) $destinate .= $call_log_group;
	if(!empty($call_log_user)) $destinate .= " - " . $call_log_user . " - ";
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
$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $cmr->db_connection);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$date_year = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%Y')";
$date_month = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m')";
$date_day = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%d')";
$date_date = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%Y-%m-%d %H:%i:%s')";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->query[$table_name] .= " AND DATE_FORMAT(" . $true_table . "." . $date_time1 . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $cmr->post_var[$date_time_base1 . "1"] . "' as DATETIME) AND cast('" . $cmr->post_var[$date_time_base1 . "2"] . "' as DATETIME)";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($cmr->post_var["report_table"]){
	case "ticket_receive":
	case "ticket":
	$cmr->query["report_select"] = " SELECT DISTINCT number, attach, work_by, text, state_now, state, type, attach, severity, call_log_user, call_log_group, id, date_time, mail_from, mail_to, mail_cc, mail_bcc, title, assign_to, allow_groups, allow_groups, ";
	break;
	
	case "message":
	case "session":
	case "history":
	case "account":
	default:
	$cmr->query["report_select"] = " SELECT " . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".*, ";
	break;
	
	}

$cmr->query["report_select"] .= " " . $date_year . " AS the_year, ";
$cmr->query["report_select"] .= " " . $date_month . " AS the_month, ";
$cmr->query["report_select"] .= " " . $date_day . " AS the_day, ";
$cmr->query["report_select"] .= " " . $date_date . " AS the_date ";
$cmr->query["report_select"] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"];

$cmr->query["report_where1"] .= " WHERE ((1) ";
$cmr->query["report_where1"] .= " AND (";

$cmr->query["report_date"] = " (" . $date_date . " LIKE ('" . $date_time1 . "%')";
$cmr->query["report_date"] .= " OR date_time LIKE ('" . $date_time2 . "%'))";
if(!empty($send_week)) $cmr->query["report_date"] .= " AND " . $date_day . " BETWEEN " . $week_days . "";

$cmr->query["report_where2"] = "";
if(get_post('the_table') == "ticket_receive"){
	if(!empty($call_log_group)) $cmr->query["report_where2"] .= " AND call_log_group LIKE ('%" . $call_log_group . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND ( work_by LIKE ('%" . $call_log_user . "%') OR call_log_user LIKE ('%" . $call_log_user . "%'))";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_from LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_to LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_cc LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_bcc LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "call_log_group";
}elseif($cmr->post_var["report_table"] == "ticket"){
	if(!empty($call_log_group)) $cmr->query["report_where2"] .= " AND call_log_group LIKE ('%" . $call_log_group . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND ( work_by LIKE ('%" . $call_log_user . "%') OR call_log_user LIKE ('%" . $call_log_user . "%'))";
	if(empty($call_log_user)) $cmr->query["report_where2"] .= " AND (state_now=state)";
    $cmr->post_var["report_column"] = "call_log_group";
}elseif($cmr->post_var["report_table"] == "message"){
	if(!empty($call_log_group)) $cmr->query["report_where2"] .= " AND groups_dest LIKE ('%" . $call_log_group . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND sender LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND users_dest LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "sender";
}elseif($cmr->post_var["report_table"] == "session"){
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND user_email LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "user_email";
}elseif($cmr->post_var["report_table"] == "history"){
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND user_email LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "user_email";
}elseif($cmr->post_var["report_table"] == "email"){
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_from LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_to LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_cc LIKE ('%" . $call_log_user . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND mail_bcc LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "mail_from";
}elseif($cmr->post_var["report_table"] == "account"){
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND user_email LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "user_email";
}else{
	if(!empty($call_log_group)) $cmr->query["report_where2"] .= " AND allow_groups LIKE ('%" . $call_log_group . "%')";
	if(!empty($call_log_user)) $cmr->query["report_where2"] .= " AND allow_email LIKE ('%" . $call_log_user . "%')";
    $cmr->post_var["report_column"] = "allow_groups";
}


$cmr->query["report_where2"] .= ")";
$cmr->query["report_where2"] .= ") ";
$cmr->query["report_where2"] .= " AND " . $cmr->action["where"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->post_var["sql_report"] = $cmr->query["report_select"] . $cmr->query["report_where1"] . $cmr->query["report_date"] . $cmr->query["report_where2"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$date_month_year = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%m-%Y')";
$date_year_month = "DATE_FORMAT(" . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"] . ".date_time, '%Y-%m')";
$cmr->post_var["sql_report1"] = " SELECT " . $date_month_year . ", COUNT(*) ";
$cmr->post_var["sql_report1"] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["report_table"];
$cmr->post_var["sql_report1"] .= " WHERE (((" . $date_date . " LIKE ('" . $send_year . "%'))";
$cmr->post_var["sql_report1"] .= $cmr->query["report_where2"];
$cmr->post_var["sql_report1"] .= " GROUP BY " . $date_year_month . " DESC "; 
$cmr->post_var["sql_report1"] .= " ORDER BY " . $date_year_month . " DESC ";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->output[0]="<i>" . $cmr->translate("Report: " . $period . " generated for:")."</i><b>" . $destinate . "</b><br />";
$cmr->post_var["output0"] = "<i>" . $cmr->translate("Report of: " . $period ." generated for:")."</i><b>" . $destinate . "</b><br />";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'report', '" . $cmr->post_var["report_table"] . "', 'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//--------next layout ----------
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