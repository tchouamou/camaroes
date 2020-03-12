<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_search.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






view_search.php,Ver 3.0  2011-Sep 22:32:40  
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
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate("Search");
// $division->module["title"] = " preview Sql";
// $division->module["text"] = "";


















print($division->show_noclose());
?> 
<br /><b>
<?php
if(($cmr->translate($mod->base_name))) print($cmr->translate($mod->base_name));
print("<br />" . $cmr->translate("Search") . ": [" . $cmr->post_var["search_text"] . "]");
?>
</b>
<br />
<p class="normal_text">
<?php
if(isset($cmr->language[$mod->base_name."_title"])) print(ucfirst($cmr->language[$mod->base_name."_title"]));
?>
</p>
<br />
<?php 
$replace = "<b><font color=\"red\" >" . $cmr->post_var["search_text"] . "</font></b>";
$search = $cmr->post_var["search_text"];
?>
<div id="view_search_div">
<br />
<?php

if(($cmr->get_user("authorisation")) >= $cmr->get_conf("cmr_admin_type")){
?>
<br />
  <fieldset class="bubble"><legend><?php  print($cmr->translate("query sql:"));?></legend>
 <table class="normal_text" align="left" border="1">
 <thead>
  <tr> <td class="rown2" > <b>
 <?php
 print($cmr->translate("query sql:"));
 ?>
  </b></td> </tr>
 </thead>
 <tbody>
  <tr> <td> <br />
 <?php
 if(!empty($cmr->post_var["sql"]))$sql_text=highlight_string(wordwrap($cmr->post_var["sql"]));
 ?>
  <br /></td> </tr>
 </tbody>
 </table>
 </fieldset>
  <br />
 <?php
    }

?>
<p>
  <fieldset class="bubble"><legend><?php  print($cmr->translate("search result:"));?></legend>
 </fieldset>
</p>
</div>
<?php  print($division->close());
?>
<?php // ----------------
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_noc_type")){
    if($cmr->post_var["sql_table"] == "all"){
        $cmr->post_var["sql_table"] = $cmr->get_conf("cmr_default_table");
        $cmr->post_var["sql"] = $cmr->post_var["sql_" . $cmr->get_conf("cmr_default_table")];
    }

}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if($cmr->post_var["sql_table"] == "all"){ // --infor that result of searching ticket ---
    $tables = sql_run("", $cmr->db_connection, "show_tables", "", $cmr->get_conf("db_name"));

    foreach($tables[0] as $tab){
        $tab_key = 'sql_' . $tab;
        $pre = cmr_search_replace($cmr->get_conf("cmr_table_prefix"), "", $tab);

        if((isset($cmr->post_var[$tab_key])) && ($cmr->post_var[$tab_key])){
			$cmr->action["table_name"] = $pre;
			$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Search result " . $pre);
			$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Find in " . $pre);;
			$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
			$cmr->action[$cmr->action["table_name"] . "_module"] = __FILE__;
			$cmr->query[$cmr->action["table_name"]] = $cmr->post_var[$tab_key];
			$cmr->post_var[$mod->base_name . "_order"] = "id";
			        // print("<br /><b>".${"sql_view_".$pre}."</b><br />");
			        
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$file_list = array();
			$file_list[] = $cmr->get_path("module") ."modules/view_" . $pre . ".php";
			$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $pre . ".php";
			if(is_database($cmr->post_var, "table")) $file_list[] = $cmr->get_path("module") . "modules/database/view_table.php";
			
			$file_path = cmr_good_file($file_list);
			if(file_exists($file_path)) include($file_path);
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

            
        }else{
            print("<br /><b>" . $pre . $cmr->translate("no result") . " </b><br />");
        }
    };
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}else {
    if((isset($cmr->post_var["sql"])) && ($cmr->post_var["sql"])){
        $pre = cmr_search_replace($cmr->get_conf("cmr_table_prefix"), "", $cmr->post_var["sql_table"]);

			$cmr->action["table_name"] = $pre;
			$cmr->action[$cmr->action["table_name"] . "_title"] = $cmr->translate("Search result " . $pre);
			$cmr->action[$cmr->action["table_name"] . "_title1"] = $cmr->translate("Find in " . $pre);;
			$cmr->action[$cmr->action["table_name"] . "_title2"] = "";
			$cmr->action[$cmr->action["table_name"] . "_module"] = __FILE__;
			$cmr->query[$cmr->action["table_name"]] = $cmr->post_var["sql"];
			
			// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$file_list = array();
			$file_list[] = $cmr->get_path("module") ."modules/view_" . $pre . ".php";
			$file_list[] = $cmr->get_path("module") . "modules/auto/view_" . $pre . ".php";
			if(is_database($cmr->post_var, "table")) $file_list[] = $cmr->get_path("module") . "modules/database/view_table.php";
			
			$file_path = cmr_good_file($file_list);
			if(file_exists($file_path)) include($file_path);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    };
    // unset($cmr->post_var["sql"]);
};
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$cmr->post_var["current_table"] = "";
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// $cmr->page["middle2"] = "";

?>
