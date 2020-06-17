<?php 
/*********************************************************************
 *         preview_sql.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 **************************************************************************/ 

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.
 
 
 
 
 
 
 
preview_sql.php, Ver 3.03   
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

 // $division->load_themes($cmr->themes);

$division->module["name"] = $mod->name;



$division->module["title"] = $cmr->translate($mod->base_name); //" query";
if(!empty($cmr->action[$cmr->action["table_name"] . "_title"])) $view_win->module["title"] = $cmr->action[$cmr->action["table_name"] . "_title"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//$division->module["text"] = "";



















print($division->show_noclose());
// =======================================================================
?>
<div id="preview_sql_div"> 
<table align="left" border="1">
<tr><td valign="top">
<?php
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
print(cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]));
 
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
?>
</td><td>


<td valign="top" width="100%">
<?php  
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);



$lk->add_link("modules/database/update_column.php?current_table=" . $cmr->post_var["current_table"] ,1);
print($lk->open_module_tab(0));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("links:"));?></legend>
<p align="center">
<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=".$cmr->post_var["current_table"]."", 1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=".$cmr->post_var["current_table"]."", 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
</p>
</fieldset>
<p align="center">
<b>
<?php
if(!empty($cmr->action[$cmr->action["table_name"] . "_title1"]))
print($cmr->action[$cmr->action["table_name"] . "_title1"]);
?>
</b>
</p>
<p class="normal_text">
<?php
if(!empty($cmr->action[$cmr->action["table_name"] . "_title2"]))
print($cmr->action[$cmr->action["table_name"] . "_title2"]);
?>
</p>
<br />
<?php 
// =======================================================================
if(empty($database_conn)) $database_conn = NewADOConnection($cmr->db["db_type"]);
if(!empty($cmr->db["db_name"])){
	$database_conn->Connect($cmr->db["db_host"], $cmr->db["db_user"], $cmr->db["db_pw"], $cmr->db["db_name"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
}
if(empty($database_conn)) $database_conn = $database_conn;
// =======================================================================
?>
</p>
<br />
<fieldset class="bubble"><legend><?php  print($cmr->translate("query sql:"));?></legend>
<?php
// =======================================================================
if(empty($cmr->post_var["sql_xml"])) $cmr->post_var["sql_xml"] = "";
$cmr->post_var["sql_xml"] = (get_post("sql_xml")) ? get_post("sql_xml") : $cmr->post_var["sql_xml"]; 
// =======================================================================
if(empty($cmr->post_var["sql"])) $cmr->post_var["sql"] = "";
$cmr->post_var["sql"] = (get_post("sql")) ? get_post("sql") : $cmr->post_var["sql"]; 
if(empty($cmr->post_var["sql"])) return false;
$sql_query = cmr_unescape($cmr->post_var["sql"]);
// =======================================================================
// =======================================================================
//----------------------------
		$from_txt = stristr($sql_query, " from ");
		$cmr->action["table_name"] = substr($from_txt, 0, strpos(" ", $from_txt));
		$cmr->action["column"] = "";
		$cmr->action["action"] = substr($sql_query, 0, strpos(" ", $sql_query));
// 		$cmr->action["where"] = cmr_where_query($cmr->config, $cmr->user, $cmr->action, $database_conn);
//----------------------------
$cmr->db["affected_rows0"] = 0;
//----------------------------
//----------------------------
$data = cmr_db_data($database_conn, "", "",  "", $sql_query);
//----------------------------
//----------------------------
if($data) $cmr->db["affected_rows0"] = count($data);
 
 


if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){
?>
 <p>
 <table class="normal_text" align="left" border="0">
 <thead>
  <tr> <td class="rown2" > <b>
  </b></td> </tr>
  <tr> <td class="rown2" > <b>
 <?php
   print($cmr->translate("affectted row:") . $cmr->db["affected_rows0"]);
 ?>
  </b></td> </tr>
 
 </thead>
 <tbody>
 <tr><td>
 <br />
 <?php
 $sql_text = highlight_string(wordwrap($sql_query));
//  print($sql_text);
 ?>
 <br />
 </td></tr>
 </tbody>
 </table>
 </p>
 </fieldset>
 <?php
    }
?>
 
  <br />
 
 
 <p>
<fieldset class="bubble"><legend><?php  print($cmr->translate("table"));?></legend>
 <table class="normal_text" align="left" border="1">
 <thead>
 <b>
 <tr>
 
 <td class="rown3">
 0
 </td>

 <td class="rown1">
 <input id="fiter_preview_query" value="yes" type="checkbox">
 </td>
 
<?php
  //=============================================
  //=============================================
  if($data)
  foreach($data[0] as $key => $value){
		   print("<td onclick=\"show('number_preview_query')\" class=\"rown3\" align=\"left\"><b>");
			   print(ucfirst($key));
		   print("</b></td>");
	  }
  //=============================================
  //=============================================
?>
 </b>
 </tr>
 </thead>
  
 <tbody>
<?php
// $result_query = sql_run("result", $database_conn, "sql", $sql_query);
// $result_query = &$database_conn->Execute($sql_query) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
$icount = 0;


if(!empty($data[$icount]))
while ((!empty($data[$icount])) && ($row_data = $data[$icount])){
?>
 <tr>
 
 <td class="rown3">
<?php
print($icount);
?>
 </td>

  <td class="rown1">
 <input id="fiter_preview_query" value="yes" type="checkbox">
 </td>
	  
<?php
foreach($row_data as $key => $value){
   print("<td onclick=\"show('title_preview_query')\" class=\"rown2\" align=\"left\">");
   is_array($value) ? cmr_print_r($value) : print(substr($value, 0, 30));
   if(strlen($value) > 30) print(" ...");
   print("</td>");
  }
?>
	 </tr>
   
  <?php
  $icount++;
//   $result_query->MoveNext();

}
   //=============================================
  //=============================================
?>
  </tbody>
 </table>
  </fieldset>
 </p>

 
 
 
<?php
if(!empty($cmr->post_var["sql_xml"])){
?>
  <br />
  <fieldset class="bubble"><legend><?php  print($cmr->translate("xml"));?></legend>
  
<p align="left" class="normal_text">
 <table class="normal_text" width="100%" align="left" border="0">
  <tr> <td align="left" > 
<br />
<br />
 <?php
	print("<br />" . htmlentities("<") . "<b>" . $cmr->translate("sql_result") . "</b>" . htmlentities(">"));
 ?>
<br />
  </td> </tr>
 </table>
 <br />
</p>

  
<?php 
  //=============================================
//  $result_query= &$database_conn->Execute($sql_query) /*, $database_conn)*/ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $database_conn->ErrorMsg());
  //=============================================
?>
<p align="left" class="normal_text">
<?php 
$icount = 0;
if(!empty($data[$icount]))
while ((!empty($data[$icount])) && ($row_data = $data[$icount])){
	print("<br /><br /><br />" . htmlentities("<") . "<b>" . $cmr->translate("rown") . "</b>" . htmlentities(">"));
	
  foreach($row_data as $key => $value){
			print("<br /><b>" . htmlentities("<") . ucfirst($cmr->translate($key)) . htmlentities(">"));
		   	is_array($value) ? cmr_print_r($value) : print("</b><br />" . wordwrap($value, 100, '<br />', 1));
			print("<br /><b>" . htmlentities("</") . ucfirst($cmr->translate($key)) . htmlentities(">"));
		   	print("</b>");
	  }
	   
	print("<br />" . htmlentities("</") . "<b>" . $cmr->translate("rown") . "</b>" . htmlentities(">"));
// 	$result_query->MoveNext();
$icount++;
}
	print("<br />" . htmlentities("</") . "<b>" . $cmr->translate("sql_result") . "</b>" . htmlentities(">"));
?>
</p>
  </fieldset>
<?php 
}
?>
<br />

</td></tr>
</table>

</div> 
<?php 
  //=============================================
 print($division->close()); 
  //=============================================
?>
