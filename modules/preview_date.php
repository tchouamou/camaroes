<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_date.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_date.php,Ver 3.0  2011-Sep 22:32:40  
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$user_email = $cmr->get_user("auth_email");
$list_group = $cmr->get_user("auth_list_group");

if(!isset($cmr->post_var["id_user"])){
	$id_user = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "id", "email", $user_email);
}else{
    $id_user = $cmr->post_var["id_user"];
	$user_email = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "user", "email", "id", $id_user);
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$send_date = conv_unix_timestamp($cmr->post_var["send_date"]);
$send_mode = ($cmr->post_var["send_mode"]);
$send_table = ($cmr->post_var["send_table"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($send_table)) $send_table = "message";
if(empty($send_mode)) $send_mode = "day";
if(empty($send_date)) $send_date = date("Y-m-d H:i:s");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $send_date = cmr_search_replace(":| |-|%", "", $cmr->post_var["send_date"]);
// $send_date = substr($send_date, 0, 4) . "-" . substr($send_date, 4, 2) . "-" . substr($send_date, 6, 2); //." ".substr($send_date,8,2).":".substr($send_date,10,2).":".substr($send_date,12);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "ticket" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("ticket" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("ticket.php");

$cmr->action["module_name"] = "ticket.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");

$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "asset" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("asset" . $cmr->get_ext("conf"));
$cmr->help=$cmr->load_help_need("asset.php");

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;



$division->module["title"] = "Attivita del: " . $send_date;
print( $division->show_noclose());

?>
<br />
<p align="center">
<b>
<?php
if(($cmr->translate($mod->base_name)))
print($cmr->translate($mod->base_name));
?>
</b>
</p>
<p class="normal_text">
<?php
if(isset($cmr->language[$mod->base_name."_title"]))
print($cmr->translate($mod->base_name."_title"));
?>
</p>
<br />
<fieldset class="bubble"><legend><?php print($cmr->translate("links"));?></legend>
<?php
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/calendar.php");
// $lk->add_link("modules/view_ticket.php?refresh=&middle2=");
// $lk->add_link("modules/view_message.php?refresh=&middle2=");
// $lk->add_link("modules/view_logs.php?refresh=&middle2=");
print($lk->list_link());
print("</fieldset>");

print($division->close());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(file_exists($cmr->get_path("module") ."modules/guest/calendar.php"))
include($cmr->get_path("module") ."modules/guest/calendar.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $send_table;
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Message of [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Message of [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$cmr->query[$cmr->action["table_name"]] = "SELECT  * ";
$cmr->query[$cmr->action["table_name"]] .= " FROM " . $cmr->get_conf("cmr_table_prefix") . $send_table . " ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE ((1) AND ";
// $cmr->query[$cmr->action["table_name"]] .= "(allow_email LIKE ('%" . $cmr->get_user("auth_email") . "%') ";
// $cmr->query[$cmr->action["table_name"]] .= " OR (allow_groups LIKE ('%" . $cmr->get_user("auth_group") . "%')) ";
// $cmr->query[$cmr->action["table_name"]] .= " OR (allow_type LIKE ('%" . $cmr->get_user("auth_type") . "%'))) ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (my_master not LIKE ('cmr_model'))  ";
$cmr->query[$cmr->action["table_name"]] .= " DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT('" . $send_date. "', '%Y%m%d')";
// //$cmr->query[$cmr->action["table_name"]] .= " AND (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_" . $send_table . ".php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $send_table . ".php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
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
$cmr->action["table_name"] = "ticket";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Ticket at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Ticket at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT DISTINCT attach , number, text, state_now, state, type, attach, severity, call_log_group, id, date_time, DATE_FORMAT(date_time, '%Y-%m-%d %H:%i:%s') as the_date, title, assign_to ";
$cmr->query[$cmr->action["table_name"]] .= "FROM " . $cmr->get_conf("cmr_table_prefix") . "ticket ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND ((call_log_group IN (" . $list_group . ")) OR (assign_to IN (" . $list_group . ")) ";
$cmr->query[$cmr->action["table_name"]] .= " OR (assign_to='" . $user_email . "')  OR (call_log_user='" . $user_email . "')  OR (work_by='" . $user_email . "')) ";
// $cmr->query[$cmr->action["table_name"]] .= " AND (my_master not LIKE ('cmr_model'))  ";
// $cmr->query[$cmr->action["table_name"]] .= " AND  (state_now=state) and (state='open') ";
$cmr->query[$cmr->action["table_name"]] .= " AND DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $send_date. "' as DATETIME), '%Y%m%d')";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_ticket.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_ticket.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "comment";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("List comment at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List comment at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT *  ";
$cmr->query[$cmr->action["table_name"]] .= " from " . $cmr->get_conf("cmr_table_prefix") . "comment  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $send_date. "' as DATETIME), '%Y%m%d')";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_comment.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_comment.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "history";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Event history at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Event history at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT *  ";
$cmr->query[$cmr->action["table_name"]] .= " from " . $cmr->get_conf("cmr_table_prefix") . "history  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $send_date. "' as DATETIME), '%Y%m%d')";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_history.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_history.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_noc_type")){

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "session";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("List session at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List session at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT *  ";
$cmr->query[$cmr->action["table_name"]] .= " from " . $cmr->get_conf("cmr_table_prefix") . "session  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $send_date. "' as DATETIME), '%Y%m%d')";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_session.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_session.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_column_exist("date_time", $cmr->get_conf("cmr_table_prefix") . "forum", $cmr->db_connection)){

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "forum";
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Event in forum at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Event in forum at: [") . $send_date . "]";
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->query[$cmr->action["table_name"]] = "SELECT *  ";
$cmr->query[$cmr->action["table_name"]] .= " from " . $cmr->get_conf("cmr_table_prefix") . "forum  ";
$cmr->query[$cmr->action["table_name"]] .= " WHERE (1 ";
$cmr->query[$cmr->action["table_name"]] .= " AND DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $send_date. "' as DATETIME), '%Y%m%d')";
$cmr->query[$cmr->action["table_name"]] .= ") ";
$cmr->query[$cmr->action["table_name"]] .= " AND " . $cmr->action["where"];

// if(empty($cmr->post_var[$mod->base_name . "_mode"]))$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
// if(empty($cmr->post_var[$mod->base_name . "_limit"])) $cmr->post_var[$mod->base_name . "_limit"] = 30;

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/view_forum.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/view_forum.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query[$cmr->action["table_name"]] = "";
}
}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
