<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_compare.php
 * ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






report_compare.php,Ver 3.0  2011-May-Thu 03:42:13
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["text"] = "";


















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/report.php?conf_name=conf.d/modules/conf_report.ini&refresh=", 1);;
$lk->add_link("modules/report_periodic.php?conf_name=conf.d/modules/conf_periodic.ini&refresh=", 1);;
$lk->add_link("modules/report_compare.php?conf_name=conf.d/modules/conf_compare.ini&refresh=", 1);;
print($lk->open_module_tab(2));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="report_compare_div">
<p align="center">

</p>
<?php
$current_year = date("Y");
$current_month = date("n");
$current_day = date("d");
?>
<fieldset class="bubble">
<legend><?php print($cmr->translate("report"));?></legend>
<form action="index.php" method="post">
<input type="hidden" value="compare" name="report_compare_form" />
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_report_compare.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<br />
<table  border="0" align="center"  >
<tr>
<td align="left"><b><?php print($cmr->translate("type"));?>:</b></td>
<td>
<select name="table_by_table">
    <option value="ticket_by_date"><?php print($cmr->translate("ticket/date")); ?></option>
    <option value="ticket_by_user"><?php print($cmr->translate("ticket/user")); ?></option>
    <option value="ticket_by_group"><?php print($cmr->translate("ticket/group")); ?></option>
    <option value="ticket_by_asset"><?php print($cmr->translate("ticket/asset")); ?></option>
    <option value="ticket_by_type"><?php print($cmr->translate("ticket/type")); ?></option>
    <option value="ticket_by_state"><?php print($cmr->translate("ticket/state")); ?></option>
    <option value="ticket_by_state_now"><?php print($cmr->translate("ticket/state_now")); ?></option>
    <option value="ticket_by_severity"><?php print($cmr->translate("ticket/severity")); ?></option>
    <option value="ticket_by_update"><?php print($cmr->translate("ticket/update")); ?></option>
    
    <option value="user_by_group"><?php print($cmr->translate("user/group")); ?></option>
    <option value="user_by_sexe"><?php print($cmr->translate("user/sexe")); ?></option>
    <option value="user_by_type"><?php print($cmr->translate("user/type")); ?></option>
    <option value="user_by_state"><?php print($cmr->translate("user/state")); ?></option>
    <option value="user_by_status"><?php print($cmr->translate("user/status")); ?></option>
    
    <option value="group_by_type"><?php print($cmr->translate("group/type")); ?></option>
    <option value="group_by_state"><?php print($cmr->translate("group/state")); ?></option>
    <option value="group_by_notify"><?php print($cmr->translate("group/notify")); ?></option>
    
    <option value="user_group_by_state"><?php print($cmr->translate("user_group/state")); ?></option>
    
    <option value="father_group_by_state"><?php print($cmr->translate("father_group/state")); ?></option>
    
    <option value="message_by_date"><?php print($cmr->translate("message/date")); ?></option>
    <option value="message_by_user"><?php print($cmr->translate("message/user")); ?></option>
    <option value="message_by_group"><?php print($cmr->translate("message/group")); ?></option>
    <option value="message_by_type"><?php print($cmr->translate("message/type")); ?></option>
    <option value="message_by_state"><?php print($cmr->translate("message/state")); ?></option>
    
    <option value="policy_by_type"><?php print($cmr->translate("policy/type")); ?></option>
    <option value="policy_by_privilege"><?php print($cmr->translate("policy/privilege")); ?></option>
    <option value="policy_by_state"><?php print($cmr->translate("policy/state")); ?></option>
    <option value="policy_by_allow_type"><?php print($cmr->translate("policy/allow_type")); ?></option>
    <option value="policy_by_allow_email"><?php print($cmr->translate("policy/allow_email")); ?></option>
    <option value="policy_by_allow_groups"><?php print($cmr->translate("policy/allow_groups")); ?></option>
    <option value="policy_by_source"><?php print($cmr->translate("policy/source")); ?></option>
    <option value="policy_by_table_name"><?php print($cmr->translate("policy/table_name")); ?></option>
    
    <option value="history_by_action"><?php print($cmr->translate("history/action")); ?></option>
    <option value="history_by_user_email"><?php print($cmr->translate("history/user_email")); ?></option>
    <option value="history_by_table_name"><?php print($cmr->translate("history/table_name")); ?></option>
    
    <option value="notify_by_type"><?php print($cmr->translate("notify/type")); ?></option>
    <option value="notify_by_state"><?php print($cmr->translate("notify/state")); ?></option>
    <option value="notify_by_source"><?php print($cmr->translate("notify/source")); ?></option>
    <option value="notify_by_detination"><?php print($cmr->translate("notify/detination")); ?></option>
    
    <option value="monitor_by_group_name"><?php print($cmr->translate("monitor/group_name")); ?></option>
    
    <option value="asset_by_user"><?php print($cmr->translate("asset/user")); ?></option>
    <option value="asset_by_group"><?php print($cmr->translate("asset/group")); ?></option>
    <option value="asset_by_type"><?php print($cmr->translate("asset/type")); ?></option>
    <option value="asset_by_state"><?php print($cmr->translate("asset/state")); ?></option>
    <option value="asset_by_os"><?php print($cmr->translate("asset/os")); ?></option>
    
    <option value="session_by_date"><?php print($cmr->translate("session/date")); ?></option>
    <option value="session_by_user"><?php print($cmr->translate("session/user")); ?></option>
    <option value="session_by_ip"><?php print($cmr->translate("session/ip")); ?></option>
    
    <option value="comment_by_date"><?php print($cmr->translate("comment/date")); ?></option>
    <option value="comment_by_user"><?php print($cmr->translate("comment/user")); ?></option>
    <option value="comment_by_group"><?php print($cmr->translate("comment/group")); ?></option>
    <option value="comment_by_ticket"><?php print($cmr->translate("comment/ticket")); ?></option>
    <option value="comment_by_table_name"><?php print($cmr->translate("comment/table_name")); ?></option>
    <option value="comment_by_state"><?php print($cmr->translate("comment/state")); ?></option>
?>
</select>
<br />
<br />
</td>
</tr>
</table>
</fieldset>

<br />

<fieldset class="bubble">
<legend><?php print($cmr->translate("period"));?></legend>

<table  border="0" align="center"  >
<tr>
<td align="left"><b><?php print($cmr->translate("year"));?>:</b></td>
<td>
<select  name="the_year">
    <option value=""><?php print($cmr->translate("all")); ?></option>
<?php
for( $year_num=1970; $year_num <= $current_year; $year_num++ ){
if($year_num==$current_year){
	print("<option value=\"" . $current_year . "\" selected>" . $current_year . "</option>");
}else{
	print("<option value=\"" . $year_num . "\" >" . $year_num . "</option>");
}
}
?>
</select>
</td></tr>



<tr><td align="left"><b><?php print($cmr->translate("month"));?>:</b></td>
<td>
<select name="the_month">
    <optgroup label="<?php print($cmr->translate("Other")); ?>">
    <option value=""><?php print($cmr->translate("All")); ?></option>
    <option value=""><?php print($cmr->translate("Annual")); ?></option>
    </optgroup>
    
    <optgroup label="<?php print($cmr->translate("month")); ?>">
<?php 

for($month_num=1; $month_num <= 12; $month_num++){
  if($current_month == $month_num ){
    print("<option value=\"" . $month_num . "\" selected>" . $cmr->translate(date("F", mktime(0, 0, 0, $month_num, 1, $current_year))) . "</option>");
}else{
    print("<option value=\"" . $month_num . "\">" . $cmr->translate(date("F", mktime(0, 0, 0, $month_num, 1, $current_year))) . "</option>");
}
}
    ?>
</optgroup>
</select>
</td></tr>






<tr>
<td align="left"><b><?php print($cmr->translate("week"));?>:</b></td>
<td>
<select  name="the_week">
    <option value=""><?php print($cmr->translate("all")); ?></option>
    <option value="first_week"><?php print($cmr->translate("first week")); ?></option>
    <option value="second_week"><?php print($cmr->translate("second week")); ?></option>
    <option value="third_week"><?php print($cmr->translate("third week")); ?></option>
    <option value="fourth_week"><?php print($cmr->translate("fourth week")); ?></option>
    <option value="last_week""><?php print($cmr->translate("last week")); ?></option>
</select>
</td>
</tr>


<tr>
<td align="left"><b><?php print($cmr->translate("day"));?>:</b></td>
<td>
<select  name="the_week">
    <option value=""><?php print($cmr->translate("all")); ?></option>
    <option value="<?php print($current_day);?>"><?php print($cmr->translate("today")); ?></option>
    <option value="01"><?php print($cmr->translate("01")); ?></option>
    <option value="02"><?php print($cmr->translate("02")); ?></option>
    <option value="03"><?php print($cmr->translate("03")); ?></option>
    <option value="04"><?php print($cmr->translate("04")); ?></option>
    <option value="05"><?php print($cmr->translate("05")); ?></option>
    <option value="06"><?php print($cmr->translate("06")); ?></option>
    <option value="07"><?php print($cmr->translate("07")); ?></option>
    <option value="08"><?php print($cmr->translate("08")); ?></option>
    <option value="09"><?php print($cmr->translate("09")); ?></option>
    <option value="10"><?php print($cmr->translate("10")); ?></option>
    <option value="11"><?php print($cmr->translate("11")); ?></option>
    <option value="12"><?php print($cmr->translate("12")); ?></option>
    <option value="13"><?php print($cmr->translate("13")); ?></option>
    <option value="14"><?php print($cmr->translate("14")); ?></option>
    <option value="15"><?php print($cmr->translate("15")); ?></option>
    <option value="16"><?php print($cmr->translate("16")); ?></option>
    <option value="17"><?php print($cmr->translate("17")); ?></option>
    <option value="18"><?php print($cmr->translate("18")); ?></option>
    <option value="19"><?php print($cmr->translate("19")); ?></option>
    <option value="20"><?php print($cmr->translate("20")); ?></option>
    <option value="21"><?php print($cmr->translate("21")); ?></option>
    <option value="22"><?php print($cmr->translate("22")); ?></option>
    <option value="23"><?php print($cmr->translate("23")); ?></option>
    <option value="24"><?php print($cmr->translate("24")); ?></option>
    <option value="25"><?php print($cmr->translate("25")); ?></option>
    <option value="26"><?php print($cmr->translate("26")); ?></option>
    <option value="27"><?php print($cmr->translate("27")); ?></option>
    <option value="28"><?php print($cmr->translate("28")); ?></option>
    <option value="29"><?php print($cmr->translate("29")); ?></option>
    <option value="30"><?php print($cmr->translate("30")); ?></option>
    <option value="31"><?php print($cmr->translate("31")); ?></option>
</select>
</td>
</tr>
</table>
</fieldset>



<br />
<p align="center">
<input class="submit" type="submit" value="<?php print($cmr->translate(" preview report"));?>" />
</p>
<br />
</form>
</fieldset>

</div>

<?php  
print($lk->close_module_tab());
print($division->close());














// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!get_post("table_by_table")) return;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
include_once($cmr->get_path("get_data") . "get_data/get_report_compare.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["report_table"])) return;
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
// to be use by get_report_$cmr->post_var["report_table"]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_sql"] = $cmr->post_var["sql_report"];
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_table"] = $cmr->post_var["report_table"];	
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_where"] = $cmr->query["report_where"];
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_column"] = $cmr->post_var["report_column"];
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_form"] = "report_". $cmr->post_var["report_table"] . ".php";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$file_list = array();
	$file_list[] = $cmr->get_path("get_data") . "get_data/get_report_". $cmr->post_var["report_table"] . ".php";
	$file_list[] = $cmr->get_path("get_data") . "get_data/auto/get_report_". $cmr->post_var["report_table"] . ".php";
	
	$file_path = cmr_good_file($file_list);
	if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	//===============================
	print("<br />");
	print($cmr->post_var["output0"]);
	print("<hr />");
	//===============================
	//===============================
	include_once ($cmr->get_path("module") . "modules/preview_report.php");
	//===============================
	//===============================
	$cmr->report[$cmr->post_var["report_table"]] = array();
	//===============================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->post_var["report_" . $cmr->post_var["report_table"] . "_form"] = "";
    $cmr->post_var["report_" . $cmr->post_var["report_table"] . "_sql"] = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
