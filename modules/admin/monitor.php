<?php 
defined("cmr_online") or die("Hacking attempt, Application is not online");
/********************************************************************
 *        graph_default.php
 *       ---------
 * begin    : July 2004 - Marzo 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/ 

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 

 
 

 


 
 
 
 
 
 
 
 
 


 


graph_default.php,Ver 3.0  2011-Nov-Wed 22:19:23  
*/





/**
* Information about
*
* Is used for keeping
*
* windowss (design for the layer usefull when running a module)  
*
* @$division object istance of the class windowss

*/


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


?>
<div id="monitor_div"> 
<br />
<?php 

//==============================
//==============================
//========Click Management======
//==============================
//==============================

// $cmr->post_var["report_ticket_form"] = "report_history";
// $cmr->post_var["report_ticket_column"] = "table_name";	
	
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$file_list = array();
$file_list[] = $cmr->get_path("module") . "modules/report_history.php";
$file_list[] = $cmr->get_path("module") . "modules/auto/report_history.php";

$file_path = cmr_good_file($file_list);
if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//===============================
//===============================
//===============================
//===============================

// $g=new class_graph();

// $g->width="400";
// $g->height="200";
// $g->module["title"] = "Graph";
// $g->tab_title="Period";
// $g->xtitle="";
// $g->ytitle="";
// $g->type1="bar";//'bar','line','pie','barcode'..
// $g->type2="line";//'bar','line'..
// $g->legend1="Legend1";
// $g->legend2="Legend2";
// $g->scale="int";
// $g->xlabel1="shortmonth";//'shortmonth','month','day','shortday'..
// $g->xlabel2="";
//   
// $g->color1="navy@0.7";//'red','orange','navy@0.7','blue@0.5'..
// $g->color2="blue@0.5";//'red','orange','navy@0.7','blue@0.5'..
//  
// $g->fillcolor1="skyblue@0.5";//'skyblue@0.5','lightblue'..
// $g->fillcolor2="lightblue";//'skyblue@0.5','lightblue' ..









// $g->ydata1="60,80,40,120,200,60,80,40,20";
// $g->ydata2="260,170,60,40,20,10,70,40,120";
// // $g->show_graph(microtime());
// // print("<br />");
// $g->ydata1="";
// $g->ydata2="";
// $g->show_graph(microtime()+1);
// $g->ydata1="";
// $g->ydata2="260,170,60,40,20,10,70,40,120";
// $g->show_graph(microtime()+2);
// $g->show_data();
// $g->ydata1="60,80,40,120,200,60,80,40,20";
// $g->ydata2="";
// $g->show_graph(microtime()+3);
// $g->show_data();
// $g->ydata1="60,80,0,40,20,5";
// $g->ydata2="260";
// $g->type1="pie";
// $g->show_graph(microtime()+4);
// $g->show_data();
// $g->ydata1="60,80,40,120,200,60,80,40,20";
// $g->ydata2="260,170,60,40,20,10,70,40,120";
// $g->show_graph(microtime()+5);
// $g->show_data();
// $g->type1="bar";
// $g->ydata2="60,80,40,120,200,60,80,40,20";
// $g->ydata1="260,170,60,40,20,10,70,40,120";
// $g->show_graph(microtime()+6);
// $g->show_data();

// print("<br />");
// $g1=new class_graph();
// $g1->ydata1="60,80,40,120,60,80,40,20,5";
// $g1->ydata2="260,170,60,40,20,10,70,40,120";
// $g1->show();

// print(('<img  align="center" src="graph.php?' .microtime(). '">'));
// print("<br />");
// print(('<img  align="center" src="graph.php?' .microtime(). '">'));
// print("<br />");
// print(('<img  align="center" src="graph.php?' .microtime(). '">'));
// print("<br />");
// print(('<img  align="center" src="graph.php?' .microtime(). '">'));
// $division->close(); 
?>
</div>
