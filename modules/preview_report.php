<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_report.php
 *        ------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






preview_report.php,Ver 3.0  2011 05:50:56
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 *
 */

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include ($cmr->get_path("class") . "class/class_graph.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_win = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
if(!empty($cmr->post_var["template_preview_report"])) $file_list[] = $cmr->post_var["template_preview_report"];
$file_list[] = $cmr->get_user("auth_user_path") . "templates/modules/template_preview_report" . $cmr->get_ext("template");
$file_list[] = $cmr->get_user("auth_group_path") . "templates/modules/template_preview_report" . $cmr->get_ext("template");
$file_list[] = $cmr->get_path("template") . "templates/modules/template_preview_report" . $cmr->get_ext("template");
$report_win->template = $report_win->load_template($file_list);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_win->prints["match_show_graph_line"] = "";
$report_win->prints["match_show_graph_barcode"] = "";

$report_win->prints["match_show_graph_legend"] = "";
$report_win->prints["match_show_graph_bar"] = "";
$report_win->prints["match_show_graph_pie"] = "";

$report_win->prints["match_show_graph_legend1"] = "";
$report_win->prints["match_show_graph_bar1"] = "";
$report_win->prints["match_show_graph_pie1"] = "";

$report_win->prints["match_show_graph_legend2"] = "";
$report_win->prints["match_show_graph_bar2"] = "";
$report_win->prints["match_show_graph_pie2"] = "";

$report_win->prints["match_show_graph_legend3"] = "";
$report_win->prints["match_show_graph_bar3"] = "";
$report_win->prints["match_show_graph_pie3"] = "";

$report_win->prints["match_show_graph_legend4"] = "";
$report_win->prints["match_show_graph_bar4"] = "";
$report_win->prints["match_show_graph_pie4"] = "";

$report_win->prints["match_show_graph_legend5"] = "";
$report_win->prints["match_show_graph_bar5"] = "";
$report_win->prints["match_show_graph_pie5"] = "";
	//======================================================================
	//======================================================================
	//======================================================================
if(empty($cmr->report[$cmr->post_var["report_table"]])){
	//==============
	$g = new class_graph();
	
	$g->width = "400";
	$g->height = "400";
	
	$g->module["title"] = $cmr->translate("Graph") . " " . $cmr->post_var["report_table"];
	
	$g->tab_title = $cmr->translate("Last Month");
	
	$g->xtitle = $cmr->translate("Columns");
	$g->ytitle = $cmr->translate("Count");
	
	$g->legend1 = $cmr->translate("Rown size");
	$g->legend2 = $cmr->translate("Rown number");
	
	$g->scale = "int";
	
	$g->xlabel1 = "shortmonth";//'shortmonth','month','day','shortday'..
	$g->xlabel2 = "";
	  
	$g->color1 = "navy@0.7";//'red','orange','navy@0.7','blue@0.5'..
	$g->color2 = "blue@0.5";//'red','orange','navy@0.7','blue@0.5'..
	 
	$g->fillcolor1 = "skyblue@0.5";//'skyblue@0.5','lightblue'..
	$g->fillcolor2 = "lightblue";//'skyblue@0.5','lightblue' ..
	
	$g->font1 = "";//
	$g->font2 = "";//
	
	$g->path = "";//save to file
	
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$g->type2 = "line";//'bar','line'..
	

	//==============
    $ydata1 = array();
    $ydata2 = array();
    $xlabel1 = array();
	//==============

	//==============
	$cmr->query["report_default"] = "SELECT *  FROM  ". $cmr->get_conf("cmr_table_prefix")  . $cmr->post_var["report_table"] . " procedure analyse()";
	$data = sql_run("array", $cmr->db_connection, "query", $cmr->query["report_default"], $cmr->get_conf("db_name"));
	//==============

	//==============
	
// 	if(!function_exists("my_ereg_replace")){
// 	function my_ereg_replace($item1, $item2){
// 	    return cmr_search_replace($item2, "", $item1);
// 	}
// 	}
	
// 	$g->ydata2=implode($data[7], ",");
	if(!empty($data[3])) $g->ydata1 = implode($data[3], ",");
	if(!empty($data[0])) $g->xlabel1 = implode($data[0], ",");
	if(!empty($data[0])) $a = array_fill(0, count($data[0]), $cmr->get_conf("db_name") . "." . $cmr->get_conf("cmr_table_prefix")  . $cmr->post_var["report_table"] . ".");
	if(!empty($data[0])) $b = array_map('my_ereg_replace', $data[0], $a);
	if(!empty($data[0])) $g->xlabel1 = implode($b, ",");
	//==============

	//==============
	$g->module["title"] = $cmr->translate("Min length ") . " " . $cmr->post_var["report_table"];
	$g->legend1 = $cmr->translate("Min length");
	$report_win->prints["match_show_graph_legend1"] = $cmr->translate("Min length ");
	
	$report_win->prints["match_show_data1"] = ($g->show_data());
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar1"] = ($g->show_graph(microtime()));

	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie1"] = ($g->show_graph(microtime()));
	//==============

	//==============
	if(!empty($data[4])) $g->ydata1=implode($data[4], ",");
	$g->module["title"] = $cmr->translate("Max length ") . " " . $cmr->post_var["report_table"];
	$g->legend1 = $cmr->translate("Max length");
	$report_win->prints["match_show_graph_legend2"] = $cmr->translate("Max length");
	
	$report_win->prints["match_show_data2"] = ($g->show_data());
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar2"] = ($g->show_graph(microtime()));

	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie2"] = ($g->show_graph(microtime()));
	//==============

	//==============
	if(!empty($data[5])) $g->ydata1=implode($data[5], ",");
	$g->module["title"] = $cmr->translate("Empties or zeros ") . " " . $cmr->post_var["report_table"];
	$g->legend1 = $cmr->translate("Empties or zeros");
	$report_win->prints["match_show_graph_legend3"] = $cmr->translate("Empties or zeros");
	
	$report_win->prints["match_show_data3"] = ($g->show_data());
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar3"] = ($g->show_graph(microtime()));

	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie3"] = ($g->show_graph(microtime()));
	//==============

	//==============
	if(!empty($data[6])) $g->ydata1=implode($data[6], ",");
	$g->module["title"] = $cmr->translate("Nulls ") . " " . $cmr->post_var["report_table"];
	$g->legend1 = $cmr->translate("Nulls");
	$report_win->prints["match_show_graph_legend4"] = $cmr->translate("Nulls");
	
	$report_win->prints["match_show_data4"] = ($g->show_data());
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar4"] = ($g->show_graph(microtime()));

	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie4"] = ($g->show_graph(microtime()));
	//==============

	//==============
	if(!empty($data[7])) $g->ydata1=implode($data[7], ",");
	$g->module["title"] = $cmr->translate("Avg value or avg length") . " " . $cmr->post_var["report_table"];
	$g->legend1 = $cmr->translate("Avg value or avg length");
	$report_win->prints["match_show_graph_legend5"] = $cmr->translate("Avg value or avg length");
	
	$report_win->prints["match_show_data5"] = ($g->show_data());
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar5"] = ($g->show_graph(microtime()));

	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie5"] = ($g->show_graph(microtime()));
	
	
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$report_win->print_template("template1");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	}
	//======================================================================
	//======================================================================
	//======================================================================


	//======================================================================
	//======================================================================
	//======================================================================

	
	//======================================================================
	if(!empty($cmr->query["report_default"])){
	$data = sql_run("array", $cmr->db_connection, "query", $cmr->query["report_default"], $cmr->get_conf("db_name"));
	$cmr->query["report_default"] = "";
	$cmr->post_var["report_column"] = "";
	}
	//======================================================================
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$data1 = array();
if(!empty($cmr->query["report"]))
$data1 = sql_run("", $cmr->db_connection, "query", $cmr->query["report"], $cmr->get_conf("db_name"));
// $data2= sql_run("", $cmr->db_connection, "query", $cmr->query["report"], $cmr->get_conf("db_name"));
$ydata1 = array("0");
$xlabel1 = array("0");

if(empty($data1[0])) $data1[0] = array("0");
if(empty($data1[1])) $data1[1] = array("0");

array_push($ydata1, $data1[1]);
array_push($xlabel1, $data1[0]);

// // array_push($ydata2, $data2[1]);
// // array_push($xlabel2, $data2[0]);


// $cmr->report[0]["show_data"] = $report__show_data;
// $cmr->report[0]["show_graph"] = $report__show_graph;
// $cmr->report[0]["select_period"] = $report__period;

// $cmr->report[0]["width"] = $report__width;
// $cmr->report[0]["height"] = $report__height;
// $cmr->report[0]["title"] = $report__func . "  by " . "date_time" ." (from:".date("d-m-Y", $report__begin)." to:".date("d-m-Y", $report__end).")";
// $cmr->report[0]["tab_title"] = $report__period;
// $cmr->report[0]["xtitle"] = "date_time";
$cmr->report[0]["ytitle"] = ""; //"date_time";
// $cmr->report[0]["type1"] = $report__show_graph;//'bar','line','pie','barcode'..
$cmr->report[0]["type2"] = "line";//'bar','line'..
$cmr->report[0]["legend1"] = "Value";
$cmr->report[0]["legend2"] =""; // "Value";
$cmr->report[0]["scale"] = "int";
	
if(empty($xlabel1)){
	$cmr->report[0]["xlabel1"] = implode($xlabel1, ",");//'shortmonth','month','day','shortday'..
}else{
	$cmr->report[0]["xlabel1"] = "";
	}

$cmr->report[0]["xlabel2"] = "";
  
// $cmr->report[0]["color1"] = $report__color1;//'red','orange','navy@0.7','blue@0.5'..
// $cmr->report[0]["color2"] = $report__color2;//'red','orange','navy@0.7','blue@0.5'..
//  
// $cmr->report[0]["fillcolor1"] = $report__fillcolor1;//'skyblue@0.5','lightblue'..
// $cmr->report[0]["fillcolor2"] = $report__fillcolor2;//'skyblue@0.5','lightblue' ..

// $cmr->report[0]["font1"] = $report__font1;//'skyblue@0.5','lightblue'..
// $cmr->report[0]["font2"] = $report__font2;//'skyblue@0.5','lightblue' ..

// $cmr->report[0]["path"] = $report__path;//save to file


if(!empty($ydata1[0])){
	$cmr->report[0]["ydata1"] = implode($ydata1[0], ",");
}else{
	$cmr->report[0]["ydata1"] = "";
	}
	
if(!empty($xlabel1[0])){
	$cmr->report[0]["xlabel1"] = implode($xlabel1[0], ",");
}else{
	$cmr->report[0]["xlabel1"] = "";
	}


$cmr->report[0]["ydata2"] = array(); //implode($ydata2[0], ",");
$cmr->report[0]["xlabel2"] = array(); //implode($xlabel2[0], ",");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	    
	//======================================================================
	//======================================================================
	//======================================================================
	//======================================================================
	//======================================================================


	//======================================================================
	//======================================================================
	//======================================================================
if(!empty($cmr->report[$cmr->post_var["report_table"]])){
	//======================================================================
	//======================================================================
	//======================================================================
	foreach($cmr->report[$cmr->post_var["report_table"]] as $key => $value){
		
	$g = new class_graph();
	
	$g->grppath = "";
	
	$g->width = $value["width"];//"400";
	$g->height = $value["height"];//"200";
	
	$g->module["title"] = $value["title"];//"Graph";
	
	$g->tab_title = $value["tab_title"];//"Period";
	
	$g->xtitle = $value["xtitle"];//"";
	$g->ytitle = $value["ytitle"];//"";
	
	$g->legend1 = $value["legend1"];//"Legend1";
	$g->legend2 = $value["legend2"];//"Legend2";
	
	$g->scale = $value["scale"];//"int";
	
// 	$value["select_period"];
	$g->xlabel1 = $value["xlabel1"];//"shortmonth";//'shortmonth','month','day','shortday'..
	$g->xlabel2 = $value["xlabel2"];//"";
	  
	$g->color1 = $value["color1"];//"navy@0.7";//'red','orange','navy@0.7','blue@0.5'..
	$g->color2 = $value["color2"];//"blue@0.5";//'red','orange','navy@0.7','blue@0.5'..
	 
	$g->fillcolor1 = $value["fillcolor1"];//"skyblue@0.5";//'skyblue@0.5','lightblue'..
	$g->fillcolor2 = $value["fillcolor2"];//"lightblue";//'skyblue@0.5','lightblue' ..
	
	$g->font1 = $value["font1"];//"skyblue@0.5";//'skyblue@0.5','lightblue'..
	$g->font2 = $value["font2"];//"lightblue";//'skyblue@0.5','lightblue' ..
	
	$g->path = $value["path"];//save to file
	
	$g->type1 = $value["type1"];//"bar";//'bar','line','pie','barcode'..
	$g->type2 = $value["type2"];//"line";//'bar','line'..
	$g->ydata2 = $value["ydata2"];//"60,80,40,120,200,60,80,40,20";
	$g->ydata1 = $value["ydata1"];//"260,170,60,40,20,10,70,40,120";
	
	if(!empty($value["show_data"])) 
	$report_win->prints["match_show_data"] = ($g->show_data());
	
	$report_win->prints["match_show_graph_legend"] = strtoupper($cmr->translate($cmr->post_var["report_table"] . " / " . $key));

	if(!empty($value["show_graph"])){
	if($value["type1"]=="default"){
		
	$g->type1 = "bar";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_bar"] = $cmr->translate("version [bar graph]");
	$report_win->prints["match_show_graph_bar"] .= ($g->show_graph(microtime()));
	
	$g->type1 = "pie";//'bar','line','pie','barcode'..
	$report_win->prints["match_show_graph_pie"] = $cmr->translate("version [pie graph]");
	$report_win->prints["match_show_graph_pie"] .= ($g->show_graph(microtime()));
	}else{
	$report_win->prints["match_show_graph_pie"] .= ($g->show_graph(microtime()));
	}
	}
	
	$g=NULL;
	//==============
	}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$report_win->print_template("template2");
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

}


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$report_win->prints = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

