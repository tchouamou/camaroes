<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_periodic.php
 * ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.







report_periodic.php,Ver 3.0  2011-May-Thu 03:42:13
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




$division->module["title"] = $cmr->language[$mod->base_name]; //$division->module["title"] = " Change uid";
// $division->module["text"] = "";


















print($division->show_noclose());

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/report.php?conf_name=conf.d/modules/conf_report.ini&refresh=", 1);;
$lk->add_link("modules/report_periodic.php?conf_name=conf.d/modules/conf_periodic.ini&refresh=", 1);;
$lk->add_link("modules/report_compare.php?conf_name=conf.d/modules/conf_compare.ini&refresh=", 1);;
print($lk->open_module_tab(1));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="report_periodic_div">
<p align="center">

</p>

<?php
$current_year = date("Y");
$current_month = date("n");
?>
<fieldset class="bubble">
<legend><?php print($cmr->translate("report"));?></legend>
<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_report_periodic.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<fieldset class="bubble">
<legend><?php print($cmr->translate("type"));?></legend>
<table  border="0" align="center"  >
<tr>
<td align="left"><b><?php print($cmr->translate("table"));?>:</b></td>
<td>
<select name="the_table">
    <option value="ticket"><?php print($cmr->translate("ticket")); ?></option>
    <option value="message"><?php print($cmr->translate("message")); ?></option>
    <option value="session"><?php print($cmr->translate("session")); ?></option>
    <option value="history"><?php print($cmr->translate("history")); ?></option>
    <option value="email"><?php print($cmr->translate("email")); ?></option>
    <option value="ticket_receive"><?php print($cmr->translate("ticket_receive")); ?></option>
</select>
</td>
</tr>
</table>
</fieldset>


<br />


<fieldset class="bubble">
<legend><?php print($cmr->translate("from"));?></legend>
<table  border="0" align="center"  >
<tr>
<td align="left"><b><?php print($cmr->translate("group"));?>:</b></td>
<td>
<select name="call_log_group">
<?php 
print("<option value=\"\">" . $cmr->translate("all") . "</option>");
print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'groups', 'name', 'column', $cmr->config['db_name'], 'name', $cmr->config['cmr_max_view'], 'name', '100') );

?>
</select>
</td>
</tr>

<tr>
<td align="left"><b><?php print($cmr->translate("user"));?>:</b></td>
<td>
<select name="call_log_user">
<?php 
print("<option value=\"\">" . $cmr->translate("all") . "</option>");
print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'email', 'column', $cmr->config['db_name'], 'email', $cmr->config['cmr_max_view'], 'email', '100') );

?>
</select>
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
if(!get_post("the_table")) return;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->action["table_name"] = $cmr->post_var["report_table"];
	$cmr->query[$cmr->action["table_name"]] = $cmr->post_var["sql_report"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($cmr->post_var[$mod->base_name . "_mode"]))
	$cmr->post_var[$mod->base_name . "_mode"] = "link_tab";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($cmr->post_var[$mod->base_name . "_limit"]))
	$cmr->post_var[$mod->base_name . "_limit"] = 30;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$file_list = array();
	$file_list[] = $cmr->get_path("module") . "modules/view_" . $cmr->post_var["report_table"] . ".php";
	$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $cmr->post_var["report_table"] . ".php";
	
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
// to be use by get_report_$cmr->post_var["report_table"]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_sql"] = $cmr->post_var["sql_report1"];
	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_table"] = $cmr->post_var["report_table"];	
// 	$cmr->post_var["report_" . $cmr->post_var["report_table"] . "_where"] = $cmr->query["report_where"];
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
