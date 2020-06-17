<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * calendario.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.





calendario.php,Ver 3.0  2011-May-Thu 03:42:05
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

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["send_table"])) $cmr->post_var["send_table"] = "message";

if(empty($cmr->post_var["calendar_mode"])) $cmr->post_var["calendar_mode"] = "month";
if(empty($cmr->post_var["calendar_step"])) $cmr->post_var["calendar_step"] = 0;
if(empty($cmr->post_var["calendar_begin"])) $cmr->post_var["calendar_begin"] = time();
if(empty($cmr->post_var["calendar_end"])) $cmr->post_var["calendar_end"] = time() + (31 * 24 * 60 * 60);
if(empty($cmr->post_var["calendar_period"])) $cmr->post_var["calendar_period"] = 3;
if(empty($cmr->post_var[$mod->base_name . "_page"])) $cmr->post_var[$mod->base_name . "_page"] = -1;
$calendar_begin = intval($cmr->post_var["calendar_begin"]);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;


$division->module["title"] =  $cmr->translate($mod->base_name . " for " . $cmr->post_var["calendar_mode"]);
// $division->module["text"] = "";


















echo $division->show_noclose();

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/calendar.php", 1);
$lk->add_link("modules/calendario.php", 1);
print($lk->open_module_tab(1));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/calendario.php?conf_name=conf.d/modules/conf_calendario.ini&calendar_mode=year&middle2=", "", $cmr->translate("By year"));
$lk->add_link("modules/calendario.php?conf_name=conf.d/modules/conf_calendario.ini&calendar_mode=month&middle2=", "", $cmr->translate("By month"));
$lk->add_link("modules/calendario.php?conf_name=conf.d/modules/conf_calendario.ini&calendar_mode=week&middle2=", "", $cmr->translate("By week"));
$lk->add_link("modules/calendario.php?conf_name=conf.d/modules/conf_calendario.ini&calendar_mode=day&middle2=", "", $cmr->translate("By day"));
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<br />
<fieldset class="bubble"><legend><?php  print($cmr->translate("period"));?></legend>
</fieldset>
<div class="form" id="calendario_div">


<form  action="index.php" method="post">
<?php 
// print(input_hidden("<input type=\"hidden\" value=\"calendario\" name=\"cmr_get_data\" />"));
?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["calendar_mode"] . "\" name=\"cmr_calendar\" />"));?>



<fieldset class="bubble"><legend><?php  print($cmr->translate("source:"));?></legend>
<table border="1" align="center" >
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to table"));?>:
	<select class="select_class" name="dest_table" width="200">
	<?php 
	print("<option value=\"" . $cmr->post_var["send_table"] . "\">" . $cmr->translate($cmr->post_var["send_table"]) . "</option>");
// 	print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'table', 'uid,state', 'column', $cmr->config['db_name'], 'iud', $cmr->config['cmr_max_view'], 'uid', '35') );
	?>
	</select>
 </td>
 </tr>
 <tr>
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to user"));?>:
	<select class="select_class" name="dest_user" width="200">
	<?php 
	print("<option value=\"\">" . $cmr->translate("My") . "</option>");
	print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'user', 'email,state', 'column', $cmr->config['db_name'], 'iud', $cmr->config['cmr_max_view'], 'uid', '35') );
	?>
	</select>
 </td>
 </tr>
 <tr>
 <td align="center" colspan="4">
 <?php  print($cmr->translate("to group"));?>:
	<select class='select_class' name='dest_group' width='200'>
	<?php 
	print("<option value=\"\">" . $cmr->translate("My") . "</option>");
	print($cmr->print_select($cmr->get_conf("cmr_table_prefix") . "groups", "name,state", "column", $cmr->config["db_name"], "name", $cmr->config["cmr_max_view"], "name", "35") );
	?>
	</select>
<input class="submit" type="submit" value="<?php echo  $cmr->translate("go");?>" />
 </td>
 </tr>
</table>
</fieldset>


<br />
<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$array_calendar = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = $cmr->post_var["send_table"];
$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Date " . $cmr->action["table_name"]);
$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("List date " . $cmr->action["table_name"]);;
$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$list_group = $cmr->get_user("auth_list_group");
$email = $cmr->get_user("auth_email");
$group = $cmr->get_user("auth_group");

if(empty($cmr->post_var["send_date"])) $cmr->post_var["send_date"] = date("Y-m-d H:i:s");
$cmr->post_var["send_date"] = conv_unix_timestamp($cmr->post_var["send_date"]);

$cmr->query[$cmr->action["table_name"]] = "SELECT date_time FROM  " . $cmr->get_conf("cmr_table_prefix") . $cmr->post_var["send_table"] ."";
$cmr->query[$cmr->action["table_name"]] .= " WHERE  ( ";

$cmr->query[$cmr->action["table_name"]] .= "((begin_time <= '" . $cmr->post_var["calendar_begin"] . "')) ";
// $cmr->query[$cmr->action["table_name"]] .= " OR ((end_time + 0 <= begin_time + 0) AND (date_time  + 0 <= '" . $cmr->post_var["send_date"] . "'))) ";


$cmr->query[$cmr->action["table_name"]].= " AND (state <> 'disactivated') ";

if($cmr->post_var["send_table"] == "message"){
	$cmr->query[$cmr->action["table_name"]].= " AND (( users_dest like ('%" . $email . "%')) ";
	$cmr->query[$cmr->action["table_name"]].= " OR (sender like ('%" . $email . "%')) OR (groups_dest like ('%" . $group . "%'))) ";
}

$cmr->query[$cmr->action["table_name"]] .= ") AND " . $cmr->action["where"];
//$cmr->query[$cmr->action["table_name"]] .= " LIMIT 1000";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$result_query = &$cmr->db_connection->SelectLimit($cmr->query[$cmr->action["table_name"]], 1000) /*, $cmr->db_connection)*/  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
while ($value = $result_query->FetchRow()){
	$key1 = date("Y", unix_timestamp($value["date_time"]));
	$key2 = date("m", unix_timestamp($value["date_time"]));
	$key3 = date("d", unix_timestamp($value["date_time"]));
	$key4 = date("h", unix_timestamp($value["date_time"]));
	$array_calendar[$key1][$key2][$key3][$key4][] = $value;
	$result_query->MoveNext();
 }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($cmr->post_var["calendar_mode"]){
	case "day":
		$block_count = (24 * 60 * 60);
		$begin_count = mktime(0, 0, 0, date("m", $calendar_begin), date("d", $calendar_begin), date("Y", $calendar_begin));
		$base_count = (60 * 60);
		$rown_count = 24;
		$format = "H\h";
		$format1 = "l d F Y";
		$rown_class = "";
	break;
	
	case "week":;
		$i=0;
		while((strtolower(date("D", $calendar_begin)) != "mon")&&($i < 10)){
		   $calendar_begin = $calendar_begin - (24 * 60 * 60);
		   $i++;
		}
		$block_count = (7 * 24 * 60 * 60);
		$begin_count = mktime(0, 0, 0, date("m", $calendar_begin), date("d", $calendar_begin), date("Y", $calendar_begin));
		$base_count = (24 * 60 * 60);
		$rown_count = 7;
		$format = "d l";
		$format1 = "d F Y";
		$rown_class = "";
	break;
	
	case "year":;
		$block_count = (12 * 31 * 24 * 60 * 60);
		$begin_count = mktime(0, 0, 0, 1, 1, date("Y", $calendar_begin));
		$base_count = (31 * 24 * 60 * 60);
		$rown_count = 12;
		$format = "F Y";
		$format1 = "Y";
		$rown_class = "";
	break;
	
	case "month":;
	default:;
		$block_count = (31 * 24 * 60 * 60);
		$begin_count = mktime(0, 0, 0, date("m", $calendar_begin), 1, date("Y", $calendar_begin));
		$base_count = (24 * 60 * 60);
		$rown_count = 31;
		$format = "d l";
		$format1 = "F Y";
		$rown_class = "";
	break;
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$begin_count = $begin_count + $block_count * (intval($cmr->post_var[$mod->base_name . "_page"]) - 1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(show_next_preview_bar($cmr->config, $cmr->language, $cmr->page, $mod->name, $cmr->post_var[$mod->base_name . "_page"], $cmr->post_var[$mod->base_name . "_page"] + 10));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>

<table border="1" width="100%" class="normal_text"  cellspacing="3" cellpadding="3" >
<tr>
<th colspan="<?php print($rown_count);?>">
<input value="<?php print($cmr->post_var["calendar_period"]);?>" name="calendar_period" size="4" />
<?php print($cmr->translate("calendar for " . $cmr->post_var["calendar_mode"]));?>
</th>
</tr>

<tr>
<?php 
	    
//----------------------
// sort($array_calendar, SORT_STRING);
//----------------------
$key_col = 0;
//----------------------
while ($key_col < intval($cmr->post_var["calendar_period"])){
    $beginning = $begin_count + ($key_col * $block_count);
    ?>
   <td valign="top">

    <table border="1" width="100%" class="normal_text"  cellspacing="3" cellpadding="3" >
    <tr>
    <th colspan="3"><?php print($cmr->translate(date($format1, $beginning)));?></th>
    </tr>
    
    <tr>
    <td><b>-</b></td>
    <td><b><?php print($cmr->translate($cmr->post_var["calendar_mode"] . " " . ($key_col + 1)));?></b></td>
    <td><b><?php print($cmr->translate("Event"));?></b></td>
    </tr>
                
    <?php 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if($cmr->post_var["calendar_mode"] == "month") $rown_count = cal_days_in_month(CAL_GREGORIAN, date("m", $beginning), date("Y", $beginning)); 
    $key = 0;
    while (($key < $rown_count)){
            $total_count = $beginning + ($key * $base_count);
            (strtolower(date("D", $total_count))=="sun") ? $rown_class = "row3" : $rown_class = "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $key1 = date("Y", $total_count);
			$key2 = date("m", $total_count);
			$key3 = date("d", $total_count);
			$key4 = date("h", $total_count);
			
// 			switch($cmr->post_var["calendar_mode"]){
// 			  case "day" : $array_calendar[$key1][$key2][$key3][$key4] = "\$array_calendar[$key1][$key2][$key3][$key4]";break;
// 			  case "week" : $array_calendar[$key1][$key2][$key3] = "\$array_calendar[$key1][$key2][$key3]";break;
// 			  case "year" : $array_calendar[$key1][$key2] = "\$array_calendar[$key1][$key2]"; break;
// 			  case "month":	  
// 			  default : $array_calendar[$key1][$key2][$key3] = "\$array_calendar[$key1][$key2][$key3]";break;
// 			}
			
			switch($cmr->post_var["calendar_mode"]){
			  case "day":
				  if(!empty($array_calendar[$key1][$key2][$key3][$key4])) 
				  $data_print = ($array_calendar[$key1][$key2][$key3][$key4]);
			  break;
			  case "week":
				  if(!empty($array_calendar[$key1][$key2][$key3])) 
				  $data_print = ($array_calendar[$key1][$key2][$key3]);
			  break;
			  case "year":
				  if(!empty($array_calendar[$key1][$key2])) 
				  $data_print = ($array_calendar[$key1][$key2]); 
			  break;
			  case "month":	  
			  default:
				  if(!empty($array_calendar[$key1][$key2][$key3])) 
				  $data_print = ($array_calendar[$key1][$key2][$key3]);
			  break;
			}
            if(!empty($data_print)) $to_print = count($data_print) . " " . $cmr->translate(" Event");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            print("<tr>");
            print("<td>" . ($key + 1) . "</td>");
            print("<td class=\"" . $rown_class . "\">");
			print($cmr->module_link("modules/preview_date.php?send_date=" . date("YmdHis", $total_count) . "&middle2=", "", $cmr->translate(date($format, $total_count))));
            print("</td>");
            
            print("<td>.");
			if(!empty($data_print)) print($cmr->module_link("modules/preview_date.php?send_date=" . date("YmdHis", $total_count) . "&send_mode=" . $cmr->post_var["calendar_mode"] . "&send_table=" . $cmr->action["table_name"] . "&middle2=", "", $to_print));
            print("</td>");
            print("</tr>");
	$key++;
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	?>
	</table>
	</td>
<?php
	$key_col++;
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</tr>
</table>
<?php

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print(show_next_preview_bar($cmr->config, $cmr->language, $cmr->page, $mod->name, $cmr->post_var[$mod->base_name . "_page"], $cmr->post_var[$mod->base_name . "_page"] + 10));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>


</form>

</div>

<?php 
print($lk->close_module_tab());
print($division->close());
?>
