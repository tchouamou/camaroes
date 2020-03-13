<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * report_periodic_nessus.php
 * ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 2.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (C) 2011, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.



























report_periodic_nessus.php,v 1.5  2008-May-Thu 03:42:13
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->post_var["cmr_get_data"] = get_post("cmr_get_data");
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $cmr->module["base_name"] . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// ----------------            
$cmr->language = load_lang_need($cmr->config, $cmr->language, $cmr->page, "nessus" . $cmr->get_ext("lang"));
$cmr->config = $cmr->load_conf_need("conf_nessus" . $cmr->get_ext("conf"));
$cmr->help = load_help_need($cmr->config, $cmr->help, "nessus" . $cmr->get_ext("help"));

$cmr->action["to_load"] = "nessus.php";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "nessus.php";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------            

$win = new class_windows($cmr->page, $cmr->module, $cmr->themes);
/*$win->win_type="default"()*/

// $win->load_themes($cmr->themes);

$win->themes["module_name"]= $cmr->get_module("name");
/*$cmr->module["base_name"]=strtolower(substr($cmr->module["name"],0,strrpos($cmr->module["name"], ".")));*/
$win->themes["module_positionx"]= $cmr->get_module("rown_position");
$win->themes["module_positiony"]= $cmr->get_module("col_position");

$win->module["title"] = $cmr->translate("report va"); 
//$win->module["title"] = " Change uid";
// $win->module["text"] = "";
// $win->themes["text_align"] = "left";
// $win->themes["bgcolor"] = "#FFFFFF";
// $win->themes["border"] = "0";
// $win->themes["bordercolor"] = "";
// $win->themes["background"]= "";
// // $win->themes["bgcolor"] = "#E0E0E0";
// $win->themes["width"] = "100%";
// $win->themes["header_visible"] = 1;
// $win->themes["header_tools_left"] = 1;
// $win->themes["header_tools_right"] = 1;
// $win->themes["header_bgcolor"] = "#DDDDDD";
// $win->themes["header_color"] = "#000000";
// $win->themes["header_align"] = "left";
// $win->themes["header_border"] = "2";
// $win->themes["header_bgimage_left"] = "";
// $win->themes["header_bgimage_middle"] = "";
// $win->themes["header_bgimage_right"] = "";
// $win->themes["header_mouse_effect"] = "";
print($win->show_noclose());
// print("<b>");
// print($cmr->language['".$cmr->module["base_name"]."_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['".$cmr->module["base_name"]."_text']);
// print("</p>");
// 
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/report_periodic_nessus.php?refresh=3600&layer=3", 1);
$lk->add_link("modules/config_nessus.php?refresh=3600&layer=3", 1);
print($lk->list_link());

$call_log_group = get_post("call_log_group");
$new_action = get_post("new_action");
?>
<div id="report_periodic_nessus_div">
<br />
<br />

<form action="index.php" method="post" ENCTYPE="multipart/form-data">
<input type=hidden name="MAX_FILE_SIZE" VALUE="32768000" />
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_report_periodic_nessus.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<table  border="1" class="normal_text" align="center"  >
<td align="left"><b><?php print($cmr->translate("group"));
?>:</b>
</td>
<td align="left">
<select id="call_log_group" class="select_class" name="call_log_group" onchange="link_conf('call_log_group','call_log_group');" >
<option>
<?php 
if(empty($call_log_group)){
	if($new_action) print($cmr->post_var["call_log_group"]);
}else{
	print($call_log_group);
	$cmr->post_var["call_log_group"] = $call_log_group;
	}
?>
</option>



<?php 
$array_list_groups = explode(";", $cmr->get_conf("scanner_list_groups")); 
foreach($array_list_groups as $the_group){
	$group_name = substr($the_group, 0, strpos($the_group, ":"));
	$list_nbe[$group_name] = substr($the_group, strpos($the_group, ":") + 1);
	$array_value[] = $group_name;
	}
print(select_order(array(), $array_value,  $array_value, "", "100"));
// print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'groups', 'name', 'column', $cmr->config['db_name'], 'name', $cmr->config['cmr_max_view'], 'name', '100') );
?>
</select>
</td>
</tr>




<tr>
<td align="left"><b><?php print($cmr->translate("action"));?>:</b></td>
<td align="left">
<select id="new_action" class="select_class" name="new_action" onchange="link_conf('new_action','new_action');" >
<?php 
if($new_action) print("<option value=\"" . $new_action . "\">" . $cmr->translate($new_action) . "</option>");
?>
<option value="new_report"><?php print($cmr->translate("new report"));?></option>
<option value="download_report"><?php print($cmr->translate("download report"));?></option>
<option value="preview_report"><?php print($cmr->translate("preview") . " " . $cmr->translate("report"));?></option>
</select>
</td>
</tr>



</table>

<br />

<table  border="1" class="normal_text" align="center"  >

<?php 

if((($call_log_group) && (empty($new_action)))||(empty($call_log_group) && ($new_action == "new_report"))){
if(empty($call_log_group)) $call_log_group = $cmr->post_var["call_log_group"];
$array_nbe  = explode(",", $list_nbe[$call_log_group]);

$list_source  = explode(",", $cmr->get_conf("list_source"));
?>
<tr>
<td align="left">
<input type="checkbox" name="check_all" value="checked"  id="check_all"  onclick="check_uncheck(this.form, 'check_all');" checked />
</td>
<td align="left"><b><?php print($cmr->translate("file"));?>:</b></td>
<td align="left"><b><?php print($cmr->translate("source"));?>:</b></td>
</tr>
<?php 
foreach($array_nbe as $key => $nbe_file){
?>

<tr>
<td align="left">
<input type="checkbox" name="checkbox<?php echo $key;?>" value="checkbox<?php print($key);?>" checked />
</td>

<td align="left">


<?php 
if(trim($list_source[0])=="local:local"){
 echo "<div id=\"scanner_div" . $key . "\" class=\"hidded\">";
}else{
 print("<div id=\"scanner_div" . $key . "\">");
}
?>
<input type="text" size="40" name="source<?php echo $key;?>" value="<?php print($nbe_file);?>" />
</div>



<?php 
if(trim($list_source[0])=="local:local"){
 print("<div id=\"file_div" . $key . "\">");
}else{
 echo "<div id=\"file_div" . $key . "\" class=\"hidded\">";
}
?>
<input type="file" size="40" name="file<?php print($key);?>" />
</div>

</td>

<td align="left">
<select id="scanner<?php echo $key;?>" class="select_class" name="scanner<?php echo $key;?>"  onchange="
hide_group_value('scanner<?php echo $key;?>','!local','file_div<?php echo $key;?>','scanner_div<?php echo $key;?>');
 ">


<!--option value="http://sonda1/nessus/">Sonda1</option>
<option value="http://sonda2/nessus/">Sonda2</option>
<option value="local">Local</option-->

<?php 
foreach($list_source as $the_source){
$source_label = substr($the_source, 0, strpos($the_source, ":"));
$source_val = substr($the_source, strpos($the_source, ":") + 1 );
 print("<option value=\"" . $source_val . "\">" . $cmr->translate($source_label) . "</option>");
}
?>

</select>
</td></tr>
<?php 
}
}
?>
</table>


<br />
<p align="center">
<input class="submit" type="submit" value="<?php print($cmr->translate(" go "));?>" />
</p>


</form>
<hr />




<?php
$call_log_group = $cmr->post_var["call_log_group"];
if($new_action == "download_report"){
// ----------------
 print("<p>");
    $file_path = $cmr->get_conf("output_folder") . "/" . $cmr->post_var["call_log_group"] . "/nessus/";
    show_download($cmr->config, $cmr->db_connection, $file_path, false);
 print("</p>");
// ----------------
}elseif($new_action == "preview_report"){
// ----------------
 $file_path = $cmr->get_conf("output_folder") . "/" . $cmr->post_var["call_log_group"] . "/nessus/";
 $file_array = array();
        if($dir = @ opendir($file_path)){
            while ($file = readdir($dir)){
                if(($file != ".") && ($file != "..") && is_dir($file_path . $file)){
	                $file_array[] = $file;
                }
            }
            closedir($dir);
        }
        
        sort($file_array);
        
 print("<table  border=\"1\" align=\"center\"  >");
 print("<tr><th>" .  $cmr->translate("preview") . "</th></tr>");
 foreach($file_array as $val) 
 print("<tr><td><a href=\"home/groups/" . $call_log_group . "/nessus/" . $val . "/index.html\" ><h2>" . $val . "</h2></a></td></tr>");
//  header("Location: https://castore.sg.it/tstm-new/home/groups/" . $call_log_group . "/nessus/"  . date("Y_m_d") . "/index.html");
 print("</table>");
// ----------------
}
?>

</div>

<?php 
 print($win->close());
/* BEGIN JAVASCRIPT*/
// function hide_by_value(elt_id, val, id_true, id_false){
// select_val = document.getElementById(elt_id).options[document.getElementById(elt_id).selectedIndex].value;
// if(select_val==val){
// hide(id_false);
// show(id_true);
// }else{
// hide(id_true);
// show(id_false);
// 	}
// return(false);
// }
/* END JAVASCRIPT */



?>
