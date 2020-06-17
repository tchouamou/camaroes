<?php 
/********************************************************************
 *        graph_class.php
 *       -------------------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/ 

 /*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 


graph_class.php,Ver 3.0  2011-Nov-Wed 22:19:23  
*/





/**
* Information about
*
* Is used for keeping
*
**/
//0000000000000000000000000000000000000000000000000000000000000000000000000000
//00000000000000000000000000       class_graph     000000000000000000000000000000
//0000000000000000000000000000000000000000000000000000000000000000000000000000
//  @	include_once ("jpgraph/src/jpgraph.php");
if(!(class_exists("class_graph"))){

class class_graph{
 var $width = "600";
 var $height = "600";
 var $title = "Graph";
 var $tab_title = "Period";
 var $xtitle = "";
 var $ytitle = "";
 var $type1 = "bar";//'bar','line','pie','barcode'..
 var $type2 = "line";//'bar','line'..
 var $legend1 = "Legend";
 var $legend2 = "Legend";
 var $scale = "int";
 
 var $xlabel1 = "shortmonth";//'shortmonth','month','day','shortday'..
 var $xlabel2 = "";
 
 var $array_xlabel1 = array();// array('shortmonth','month','day','shortday'..)
 var $array_xlabel2 = array();
 
 var $color1 = "navy@0.7";//'red','orange','navy@0.7','blue@0.5'..
 var $color2 = "blue@0.5";//'red','orange','navy@0.7','blue@0.5'..
 
 var $fillcolor1 = "skyblue@0.5";//'skyblue@0.5','lightblue'..
 var $fillcolor2 = "lightblue";//'skyblue@0.5','lightblue' ..
 
 var $font1 = "";//
 var $font2 = "";//
 
 var $grppath = "";//save to file
 var $path = "";//save to file
 
 var $ydata1 = "";//23,12,5,19,17,10,15;
 var $ydata2 = "";
 
 var $array_ydata1 = array();//array(23,12,5,19,17,10,15);
 var $array_ydata2 = array();
 
 var $sum1 = 0;
 var $sum2 = 0;
// .........................
 
  
 function class_graph(){
	 return true;
	 }
// .........................
	 
 function show_graph($time = "1"){
	 
	$show_graph = "";
	
	$grp1 = "width=" . urlencode($this->width) . "&height=" . urlencode($this->height);
	$grp1 .= "&title=" . urlencode($this->module["title"]) . "&tab_title=" . urlencode($this->tab_title);
	$grp1 .= "&xtitle=" . urlencode($this->xtitle) . "&ytitle=" . urlencode($this->ytitle);
	$grp1 .= "&type1=" . urlencode($this->type1) . "&type2=" . urlencode($this->type2);
	$grp1 .= "&legend1=" . urlencode($this->legend1) . "&legend2=" . urlencode($this->legend2);
	$grp1 .= "&scale=" . urlencode($this->scale) . "&xlabel1=" . urlencode(implode(",", $this->array_xlabel1));
	$grp1 .= "&xlabel2=" . urlencode(implode(",", $this->array_xlabel2)) . "&ydata1=" . urlencode(implode(",", $this->array_ydata1));
	$grp1 .= "&ydata2=" . urlencode(implode(",", $this->array_ydata2));
	$grp1 .= "&color1=" . urlencode($this->color1) . "&color2=" . urlencode($this->color2);
	$grp1 .= "&fillcolor1=" . urlencode($this->fillcolor1) . "&fillcolor2=" . urlencode($this->fillcolor2);
	$grp1 .= "&font1=" . urlencode($this->font1) . "&font2=" . urlencode($this->font2);
	$grp1 .= "&path=" . urlencode($this->path);
	$grp1 .= "&time=" . $time;
	
	$show_graph .= "<fieldset class=\"bubble\"><legend>" . $this->module["title"]. "</legend>";
	$show_graph .= '<img  border="1" alt="@" align="center" src="' . $this->grppath . 'index.php?cmr_mode=graph&'. $grp1 . '&'. microtime(). '" />';
    $show_graph .= "</fieldset>";
    
    return $show_graph;
	}
// .........................
 function data_explode($eparator=",", $number=1, $str_label=""){
 	switch($str_label){
			case "shortmonth"://$datax = $gDateLocale->GetShortMonth();
			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dic");
			break;
			
			case "month"://$datax = $gDateLocale->GetMonth();
			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dic");
			break;
			
			case "shortmonthname"://$datax = $gDateLocale->GetShortMonthName();
			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dic");
			break;
			
			case "longmonthname"://$datax = $gDateLocale->GetLongMonthName();
			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dic");
			break;
			
			case "day"://$datax = $gDateLocale->GetDayAbb();
			$datax = array("Mon","Tue","Wen","Thu","Fri","Sat","Sun");
			break;
			
			case "shortday"://$datax = $gDateLocale->GetShortDay();
			$datax = array("Mon","Tue","Wen","Thu","Fri","Sat","Sun");
			break;
			
			case "alpha"://$datax = $gDateLocale->GetShortDay();
			$datax = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
			break;
			
			case "numeric"://$datax = $gDateLocale->GetShortDay();
			$datax = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9");
			break;
			
			default:
			$datax = explode($eparator, $str_label);
			break;
	 }
	 
	 !($number) or array_splice ($datax, $number);
	 
	 while((count($datax))&&(count($datax) < $number)){
	   $datax = array_merge ($datax, $datax);
		 }
	 
	 
// 			$datax = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct");
	 return $datax;
	 }
// .........................












 function show_data(){
	$t_ydata1 = array();
	$t_xlabel1 = array();
	$t_ydata2 = array();
	$t_xlabel2 = array();
	$show_data = "";

	 
	 $this->array_ydata1 = explode(",",$this->ydata1);
	 if(!empty($this->ydata2)) $this->array_ydata2 = explode(",",$this->ydata2);
	 
	 $this->array_xlabel1 = $this->data_explode(",", count($this->array_ydata2), $this->xlabel1);
	 if(!empty($this->ydata2)) $this->array_xlabel2 = $this->data_explode(",", count($this->array_ydata2), $this->xlabel2);
	 
	 $show_data .= "<fieldset class=\"bubble\"><legend>" . $this->module["title"]. "</legend>";
	 $show_data .= "<table align=\"center\" border=\"1\">";
	 $show_data .= "<tr><th colspan=\"";
	 if(!empty($this->ydata2)){
		 $show_data .= "7";
		 }else{
			 $show_data .= "4";
			 }	 
	 $show_data .= "\">" . $this->module["title"] . "</th></tr>";
	 
	 
	 
	 $show_data .= "<tr><th>" . "Key" . "</th>";
	 $show_data .= "<th>" . $this->xtitle . "</th>";
	 $show_data .= "<th>" . $this->legend1 . "</th>";
	 $show_data .= "<th>%</th>";
	 $this->sum1 = array_sum($this->array_ydata1);
	 if(!empty($this->ydata2)){
		  $show_data .= "<th>" . $this->ytitle . "</th>";
	      $show_data .= "<th>" . $this->legend2 . "</th>";
	      $show_data .= "<th>%</th>";
	      $this->sum2 = array_sum($this->array_ydata2);
      }
	 $show_data .= "</tr>";
	 
	 
	$t_ydata1 = $this->array_ydata1;
	$t_xlabel1 = $this->array_xlabel1;
   if(!empty($this->ydata1)){
    array_multisort(
        $t_ydata1, SORT_ASC, SORT_NUMERIC,
        $t_xlabel1, SORT_ASC, SORT_STRING
        );
      }
      
      
   if(!empty($this->ydata2)){
	$t_ydata1 = $this->array_ydata2;
	$t_xlabel1 = $this->array_xlabel2;
    array_multisort(
        $t_ydata2, SORT_ASC, SORT_NUMERIC,
        $t_xlabel2, SORT_ASC, SORT_STRING
        );
      }
      
      
	 foreach($t_ydata1 as $key => $value){
		 $percent1 = "";
		 if(!empty($this->sum1))
		 $percent1 = (($t_ydata1[$key]) / $this->sum1) * 100;
		 
		  $show_data .= "<tr><td>" . $key . "</td>";
		  $show_data .= "<td>" . $t_xlabel1[$key] . "</td>";
	      $show_data .= "<td>" . $t_ydata1[$key] . "</td>";
	      $show_data .= "<td>" . sprintf("%02d", $percent1) . "%</td>";
	 if(!empty($this->ydata2)){
		 if(!empty($this->sum2))
		 $percent2=(($t_ydata2[$key]) / $this->sum2) * 100;
		 $show_data .= "<td>" . $t_xlabel2[$key] . "</td>";
		 $show_data .= "<td>" . $t_ydata2[$key] . "</td>";
		 $show_data .= "<td>" . sprintf("%02d", $percent2) . "%</td>";
		 }	 
		 $show_data .= "</tr>";
		 }	 
		 
		 
		 
		 
		 
	 $show_data .= "<tr><td><b> . "." . </b></td>";
	 $show_data .= "<td><b>" . "Total:" . "</b></td>";
	 $show_data .= "<td><b>" . $this->sum1 . "</b></td>";
	 $show_data .= "<td><b>100%</b></td>";
	 if(!empty($this->ydata2)){
		  $show_data .= "<td><b>+</b></td>";
	      $show_data .= "<td><b>" . $this->sum2 . "</b></td>";
	      $show_data .= "<td><b>100%</b></td>";
      }
	 $show_data .= "</tr>";
	 
	 $show_data .= "</table>";
     $show_data .= "</fieldset>";
	 
	 
	 return $show_data;
	 }
// .........................
	 
 function show_data_graph(){
	$show_data_graph = "";
	$show_data_graph .= "<table align=\"center\" border=\"4\">";
	$show_data_graph .= "<tr><td>";
	$show_data_graph .= $this->show_graph();
	$show_data_graph .= $this->show_data();
	$show_data_graph .= "</td></tr>";
	$show_data_graph .= "</table>";
 return $show_data_graph;
 }
// .........................

}
}
?>
