<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_imap.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























view_imap.php,Ver 3.0  2011-Jun-Sun 14:59:09  
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
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "imap";
if(empty($cmr->post_var["id_imap"])) $cmr->post_var["id_imap"] = "";
$base_name = $mod->base_name;
$table_name = $cmr->action["table_name"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/**
 * loading configurations files, fonctions and languages file need by this module
 */
// =======================================================================




// =======================================================================
// 	print($cmr->module_link("modules/menu_imap.php?orderbox=" . $orderbox . "&searchbox=all&mailbox=" . $cmr->post_var["mailbox"], "1", "", "", "", "left1"));
// ----------------            
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "imap.php");
$cmr->config = $mod->load_conf("conf_imap.ini");
$cmr->help = $cmr->load_help_need("imap.php");
// =======================================================================

// =======================================================================
include_once($cmr->get_path("func") . "function/func_imap.php");
include_once($cmr->get_path("class") . "class/class_imap.php");
// =======================================================================



$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);; //" upload";
if(!empty($cmr->action["imap_title"])) $division->module["title"] = $cmr->action["imap_title"];
// $division->module["text"] = "";


















print($division->show_noclose());
print("<div id=\"" . $mod->base_name . "_div\">");
?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("links:"));?></legend>
<?php  
// =======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!class_exists("class_imap")){
	print($cmr->translate("load class_imap before !?"));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$m = new class_imap();
// =======================================================================
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var[$base_name . "_mode"])) $cmr->post_var[$base_name . "_mode"] = "link_tab";
if(empty($cmr->post_var[$base_name . "_limit"])) $cmr->post_var[$base_name . "_limit"] = 50;
$cmr->post_var[$base_name . "_order"] = get_post($base_name . "_order");
if(empty($cmr->post_var[$base_name . "_page"])) $cmr->post_var[$base_name . "_page"] = 0;
if(empty($cmr->post_var[$base_name . "_columns"])) $cmr->post_var[$base_name . "_columns"] = "6";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
empty($cmr->post_var["imap_service"]) ? $cmr->post_var["imap_service"] = $m->imap_service : $m->imap_service = $cmr->post_var["imap_service"];
empty($cmr->post_var["imap_server"]) ? $cmr->post_var["imap_server"] = $m->imap_server : $m->imap_server = $cmr->post_var["imap_server"];
empty($cmr->post_var["imap_port"]) ? $cmr->post_var["imap_port"] = $m->imap_port : $m->imap_port = $cmr->post_var["imap_port"];
empty($cmr->post_var["imap_user_name"]) ? $cmr->post_var["imap_user_name"] = $m->imap_user_name : $m->imap_user_name = $cmr->post_var["imap_user_name"];
empty($cmr->post_var["imap_password"]) ? $cmr->post_var["imap_password"] = $m->imap_password : $m->imap_password = $cmr->post_var["imap_password"];
empty($cmr->post_var["imap_default_folder"]) ? $cmr->post_var["imap_default_folder"] = $m->imap_default_folder : $m->imap_default_folder = $cmr->post_var["imap_default_folder"];
empty($cmr->post_var["mailbox"]) ? $cmr->post_var["mailbox"] = $m->mailbox : $m->mailbox = $cmr->post_var["mailbox"];
// =======================================================================
$m->imap_service="imap";
$m->imap_server = $cmr->post_var["imap_server"];
$m->imap_port = $cmr->post_var["imap_port"];
$m->imap_user_name = $cmr->post_var["imap_user_name"];
$m->imap_password = $cmr->post_var["imap_password"];
// $m->imap_default_folder = $cmr->post_var["imap_default_folder"];
        
$m->mailbox = $m->get_mailbox();        
// =======================================================================
empty($cmr->post_var["searchbox"]) ? $searchbox = "ALL" : $searchbox = $cmr->post_var["searchbox"];
empty($cmr->post_var["searchbox1"]) ? $searchbox1 = "" : $searchbox .=  " " . $cmr->post_var["searchbox1"];
if(empty($cmr->post_var[$base_name . "_order"])) $cmr->post_var[$base_name . "_order"] = "date_time";
// =======================================================================
if(empty($cmr->post_var[$base_name . "_order"])) $cmr->post_var[$base_name . "_order"] = "date_time";
if(($cmr->post_var[$base_name . "_order"] == "Fromaddress")) $orderbox = "SORTFROM";
if(($cmr->post_var[$base_name . "_order"] == "Subject")) $orderbox = "SORTSUBJECT";
if(($cmr->post_var[$base_name . "_order"] == "Toaddress")) $orderbox = "SORTTO";
if(($cmr->post_var[$base_name . "_order"] == "Toaddress")) $orderbox = "SORTCC";
if(($cmr->post_var[$base_name . "_order"] == "Size")) $orderbox = "SORTSIZE";
if(($cmr->post_var[$base_name . "_order"] == "date_time")) $orderbox = "SORTARRIVAL";
if(($cmr->post_var[$base_name . "_order"] == "date_time")) $orderbox = "SORTDATE";
if(empty($orderbox)) $orderbox = "SORTARRIVAL";
// =======================================================================
$name = strtoupper(str_replace($m->mailbox, "", $cmr->post_var["mailbox"]));
$name1 = substr($m->mailbox, strpos($m->mailbox, "}") + 1);
$cmr->post_var["Unread" . $name1] = "0";
$cmr->post_var["Unread" . $name] = "0";
// =======================================================================
if(!($m->connect($cmr->post_var["mailbox"]))){
print( $cmr->translate("<br />connection failled...<br />"));
include($cmr->get_path("module") . "modules/login_imap.php");
// =======================================================================
}else{
$info_new = $m->get_mailboxmsginfo();
$cmr->post_var["Unread" . $name1] = $info_new->Unread;



// $info_new->Date
// $info_new->Driver
// $info_new->Mailbox
// $info_new->Nmsgs
// $info_new->Recent
// $info_new->Unread
// $info_new->Deleted
// $info_new->Size

// 	$m->info = $m->get_mailboxmsginfo();
// 	$m->current_status = $m->get_status();
// 	$m->current_alerts = $m->get_alerts();
// 	$m->current_error = $m->get_last_error();
// 	$m->imap_checks = $m->get_check();	
// 	$m->get_check();
// 	$m->get_num_recent()
// 	
// 	
// 	$m->imap_headers_list = $m->get_headerinfos();
// 	$m->imap_current_uid = $m->get_uid(0);
// 	$m->imap_current_message = $m->get_message(0);
// 	$m->imap_current_header = $m->get_headerinfo(0)
// 	$m->imap_current_body = $m->get_body(0);




// print( "<pre>");
// print( $cmr->translate("<br />succefull connect...<br />"));
// $m->get_mailboxmsginfo();
// echo  "<hr />get_mailboxmsginfo<hr />";  print_r($m->info);
// $m->get_status();
// echo  "<hr />get_status<hr />";  print_r($m->current_status);
// $m->get_alerts();
// echo  "<hr />alerts<hr />"; print_r($m->current_alerts);
// $m->get_last_error();
// echo  "<hr />error<hr />"; print_r($m->current_error);
// $m->get_check();
// echo  "<hr />get_check<hr />";  print_r($m->imap_checks);

// print( "<hr />get_check<hr />".$m->get_check());
// print( "<hr />get_num_recent<hr />".$m->get_num_recent());
// $last_uid = $m->get_uid(1);
// print( "<hr />imap_current_uid<hr />".($m->imap_current_uid));
// print( "</pre>");
// $arrayheader = $m->get_fetch_overview("1:".$m->info->Nmsgs);
// $arrayheader = imap_fetch_overview($m->mbox  , "1:".$m->info->Nmsgs, FT_UID);
// foreach($arrayheader as $key => $value){
// $arrayall[]= $value->uid;
// }

// 	$arraysearch = imap_search  ($m->mbox  , "ALL" , SE_UID);

// $arrayuid=array_intersect($arrayall, $arraysort);
// $arrayuid=array_values ($arraysort);



// =======================================================================
// $m->get_headerinfo($last_uid);
// echo  "<hr />imap_current_header<hr />"; print_r($m->imap_current_header);
// $m->get_message($last_uid);
// echo  "<hr />imap_current_message<hr />"; print_r($m->imap_current_message);
// $m->get_body($last_uid);
// echo  "<hr />imap_current_body<hr />"; print_r($m->imap_current_body);
// print( "</pre>");
// =======================================================================
// $message = $m->get_fetchstructure($last_uid);
// echo  "<hr />message<hr />"; print_r($message);
// $body = $m->get_bodystruct($last_uid);
// echo  "<hr />body<hr />"; print_r($body);
// =======================================================================




// =======================================================================
/**
 * imap, and list of all group in with authentificated user have rigth
 */
/**
 * getting the column use to order the table
 */

/**
 * getting the value use to order in descendend or ascendent
 */
if(empty($cmr->post_var[$base_name . "_desc"])){
    $cmr->post_var[$base_name . "_desc"] = "0";
}else{
    $cmr->post_var[$base_name . "_desc"] = "1";
}

/**
 * getting the value use to determinate number of line to show
 */
if(intval($cmr->post_var[$base_name . "_limit"]) < 2) $cmr->post_var[$base_name . "_limit"] = 25;

/**
 * getting the page number in with to jump
 */
$cmr->post_var[$base_name . "_page"] = intval($cmr->post_var[$base_name . "_page"]);



/**
 * getting the mode use to determinate the mode to show rows
 */

$date_time = get_post("date_time_" . $base_name);
(empty($date_time)) ? $date_time = $cmr->post_var[$base_name . "_date_time"] : $cmr->post_var[$base_name . "_date_time"] = $date_time;
$cmr->post_var[$base_name . "_date_time"] = $date_time;

/**
 * getting var use to inver the fiter condition (like)
 */



/**
 * complex mode to loat in the sql string filter condition
 * using constant taked in the configuration file
 */
$i_col = 1;
$const_column = $cmr->config["column" . $i_col . "_imap"];
while ((isset($cmr->config["column" . $i_col . "_imap"])) && (!empty($const_column))){
    $const_column = $cmr->config["column" . $i_col . "_imap"];
    $var_const_column = $const_column . "_" . $base_name;
    $get_column = get_post($const_column . "_" . $base_name);
	(empty($get_column)) ? $get_column = $cmr->post_var[$var_const_column] : $cmr->post_var[$var_const_column] = $get_column;
	 $cmr->action[$table_name][$const_column] = $get_column;

    if(strlen($get_column) > 0) $searchbox .= $const_column . " " .  $get_column;
    $i_col++;
}

/**
 * complete filter in the sql string with the date_time column
 */
if(strlen($date_time) > 0){
	$date_time1 = $date_time;
	$date_time2=cmr_search_replace("[-\/ :]", "", $date_time);
}


/**
 * num row to be show
 */
$num_row = intval($cmr->post_var[$base_name . "_limit"]);





// =======================================================================
$arrayuid = $m->get_sort($orderbox, $searchbox, $cmr->post_var[$base_name . "_desc"]);
$total = count($arrayuid);
// =======================================================================


// =======================================================================
if(empty($cmr->post_var[$base_name . "_page"]))
    $cmr->post_var[$base_name . "_page"] = intval($total /intval($cmr->post_var[$base_name . "_limit"]));
// =======================================================================

// =======================================================================
/**
 * return if zero rown found
 */
if(empty($total)){
    print("<p align=\"left\">" . $cmr->module_link($mod->name . "?right1=&middle2=&middle3=", "", $cmr->translate("zero") . " " . $cmr->translate("finded") . " (" . $total . ") <b>imap </b>") . "</p>");
    $cmr->post_var[$base_name . "_order"] = "";
    $action = "";
    $cmr->post_var["id_imap"] = "";
    $last_id = "";

}
// =======================================================================
/**
 * calculate numero off page
 */
if(intval($num_row)){
    $num_page = intval($total /intval($cmr->post_var[$base_name . "_limit"])) ;
}else{
    $num_page = 0;
}



/**
 * organized the page value var
 */
if(intval($cmr->post_var[$base_name . "_page"]) < 0) 
$cmr->post_var[$base_name . "_page"] = 0;

/**
 * reset the value of action to be done
 */


/**
 * form need for table mode view to send
 */
if($cmr->post_var[$base_name . "_mode"] == "link_tab"){
?>
<form action="index.php" method="post" id="form_<?php print($base_name);
?>" >

<b>
<?php 
print($cmr->translate("go to:"));
input_hidden("<input type=\"hidden\" name=\"".$mod->position."\" value=\"".$mod->path."\" />");
?>
</b>

<select name="<?php print($base_name . "_page");?>" onchange="this.form.submit();">
<?php
    print("<option value=\"" . $cmr->post_var[$base_name . "_page"] . "\">page " . $cmr->post_var[$base_name . "_page"] . "</option>");
    print("<option value=\"0\">" . $cmr->translate("page 0") . "</option>");
    for($ip = 1; $ip < $num_page; $ip++){
        print("<option value=\"$ip\">page $ip</option>");
    }

    ?>
</select>

<?php print($cmr->translate("limit"));?>
:<input type="text" size="5" value="<?php print($cmr->post_var[$base_name . "_limit"]);
    ?>" name="<?php print($base_name . "_limit");
    ?>" / >
<input type="submit" value="go" />
<br />
<b>
<?php 
print($cmr->translate("search:"));
?>
</b>
<select name="searchbox">
<option value="all" selected> <?php print($cmr->translate("all"));?></option>
<optgroup label="<?php print($cmr->translate("date"));?>">
<option value="ON"> <?php print($cmr->translate("on"));?></option>
<option value="SINCE"> <?php print($cmr->translate("since"));?></option>
<option value="BEFORE"> <?php print($cmr->translate("before"));?></option>
</optgroup>


<optgroup label="<?php print($cmr->translate("string"));?>">
<option value="FROM"> <?php print($cmr->translate("from"));?></option>
<option value="CC"> <?php print($cmr->translate("cc"));?></option>
<option value="BCC"> <?php print($cmr->translate("bcc"));?></option>
<option value="TO"> <?php print($cmr->translate("to"));?></option>
<option value="SUBJECt"> <?php print($cmr->translate("subject"));?></option>
<option value="KEYWORd"> <?php print($cmr->translate("keyword"));?></option>
<option value="BODY"> <?php print($cmr->translate("body"));?></option>
<option value="TEXT"> <?php print($cmr->translate("text"));?></option>
</optgroup>

<optgroup label="<?php print($cmr->translate("only select"));?>">
<option value="ANSWERED"> <?php print($cmr->translate("answered"));?></option>
<option value="DELETED"> <?php print($cmr->translate("deleted"));?></option>
<option value="FLAGGED"> <?php print($cmr->translate("flagged"));?></option>
<option value="NEW"> <?php print($cmr->translate("new"));?></option>
<option value="OLD"> <?php print($cmr->translate("old"));?></option>
<option value="RECENT"> <?php print($cmr->translate("recent"));?></option>
<option value="SEEN"> <?php print($cmr->translate("seen"));?></option>
<option value="UNANSWERED"> <?php print($cmr->translate("unanswered"));?></option>
<option value="UNDELETED"> <?php print($cmr->translate("undeleted"));?></option>
<option value="UNFLAGGED"> <?php print($cmr->translate("unflagged"));?></option>
<option value="UNKEYWORD"> <?php print($cmr->translate("unkeyword"));?></option>
<option value="UNSEEN"> <?php print($cmr->translate("unseen"));?></option>
</optgroup>
</select>

:<input type="text" name="searchbox1" size="40" value="">


<input type="submit" value="go" />
<br />
<?php
}

/**
 * link to current module showing num of row
 */
print($cmr->module_link($mod->name . "?right1=&middle2=&middle3=", "", "(" . $num_row . ")/(" . $total . ")  <b>" . $cmr->post_var["searchbox"] . "</b>"));
print("<br />");
print($cmr->module_link($mod->name . "?right1=&middle2=&middle3=", "", "(" . $cmr->post_var["Unread" . $name1] . ")  <b>" . $cmr->translate("unread") . "</b>"));

if($cmr->post_var[$base_name . "_mode"] == "link_tab"){
    /**
     * part use by type mode to show table header
     */
    ?>
 <table align="left" width="100%" class="normal_text" border="1">


 <tr>
 <td class="rown3">
 !<input type="checkbox" name="check_<?php print($base_name);
    ?>" value="not">
</select>
 </td>

 <td class="rown1">
<select name="flagbox">
<option value="Seen" selected> <?php print($cmr->translate("seen"));?></option>
<option value="Answered" selected> <?php print($cmr->translate("answered"));?></option>
<option value="Flagged" selected> <?php print($cmr->translate("flagged"));?></option>
<option value="Deleted" selected> <?php print($cmr->translate("deleted"));?></option>
<option value="Draft" selected> <?php print($cmr->translate("draft"));?></option>
<option value="Recent" selected> <?php print($cmr->translate("recent"));?></option>
 <!--input type="checkbox" id="fiter_<?php print($base_name);?>" value="yes"-->
 </td>

 <?php
    $i_col = 1;
    $constant = $cmr->config["column" . $i_col . "_imap"];
    while ((isset($cmr->config["column" . $i_col . "_imap"])) && (!empty($const_column))){
        $constant = $cmr->config["column" . $i_col . "_imap"];
        $get_constant = get_post($constant . "_" . $base_name);
?>
 <td onclick="show('<?php print($constant . '_' . $base_name);?>')" class="rown2" align="center">
 <input 
 <?php if(strlen($get_constant) == 0)  echo "class=\"hidded\" ";?>
 	type="text" size="8" 
	name="<?php print($constant . '_' . $base_name);?>" 
    id="<?php print($constant . '_' . $base_name);?>"
    value="<?php print($get_constant);?>"
    />
 <?php
        $i_col++;
    }

        $get_constant = get_post("date_time_" . $base_name);
  ?>
 </td>



 <td onclick="show('date_time_<?php print($base_name);?>')" class="rown2" align="center">
 <input 
 <?php if(strlen($get_constant) == 0) echo "class=\"hidded\" ";?>
 type="text" size="8" 
 name="date_time_<?php print($base_name);?>" 
 id="date_time_<?php print($base_name);?>"
    value="<?php print($get_constant);?>"
    />
    <button id="button_date_time_<?php print($base_name);?>">...</button>
 </td>



 <!--td class="rown1" align="center">

 </td-->
 </tr>



 <tr>
 <td class="rown3">
  <?php 
  print($cmr->module_link($mod->name . "?" . $base_name . "_order=" . $cmr->config["column_index1_imap"] . "&" . $base_name . "_desc=" . $cmr->post_var[$base_name . "_desc"], "", $cmr->config["column_index1_imap"], "", "", $mod->position, " style='color:#ffffff'"));
  ?>
 </td>


 <td class="rown3">
 <input type="checkbox" id="sel_all_<?php print($base_name);
    ?>" value="yes">
 </td>


 <?php
	$image0 = $cmr->get_path("www") . "images/icon/sort_icon.png";
    $i_col = 1;
    $constant = $cmr->config["column" . $i_col . "_imap"];
    while ((isset($cmr->config["column" . $i_col . "_imap"])) && (!empty($constant))){
        $constant = $cmr->config["column" . $i_col . "_imap"];

        ?>

 <td class="rown3"><b>
 <?php print($cmr->module_link($mod->name . "?" . $base_name . "_order=" . $constant . "&" . $base_name . "_desc=" . $cmr->post_var[$base_name . "_desc"], "", ucfirst($cmr->translate($constant)), "", "", $mod->position, " style='color:#ffffff'"));
  if(($orderbox == "SORTFROM")&&($constant == "Fromaddress")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortfrom") . "\" />");
  if(($orderbox == "SORTSUBJECT")&&($constant == "Subject")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortsubject") . "\" />");
  if(($orderbox == "SORTTO")&&($constant == "Toaddress")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortto") . "\" />");
  if(($orderbox == "SORTCC")&&($constant == "Toaddress")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortcc") . "\" />");
  if(($orderbox == "SORTSIZE")&&($constant == "Size")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortsize") . "\" />");
  if(($orderbox == "SORTARRIVAL")&&($constant == "date_time")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortarrival") . "\" />");
  if(($orderbox == "SORTDATE")&&($constant == "date_time")) print("<img alt=\"v\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->get_language("sortdate") . "\" />");
   
        ?>
 </b></td>
 <?php
        $i_col++;
    }

    ?>


 <td class="rown3"><b>
 <?php print($cmr->module_link($mod->name . "?" . $base_name . "_order=date_time&" . $base_name . "_desc=" . $cmr->post_var[$base_name . "_desc"], "", ucfirst($cmr->translate("date_time")), "", "", $mod->position, " style='color:#ffffff'"));
    ?>

 </b></td>
 </tr>



<?php
}else{
}
?>
</form>






<?php

/**
 * declaration off the form need to contain all checkbox
 */
?>
<form action="index.php?cmr_conf=conf.d/conf_imap.php" method="post" id="form_<?php print($base_name);
?>" >
<?php
print(input_hidden("<input name=\"cmr_get_data\" value=\"get_data/get_view_imap.php\" type=\"hidden\" />"));
?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<input name="check_action" value="" type="hidden" />






<?php
//----------
$pdf_data_text = "";
//----------
/**
 * function use to show incon tools
 */
print($cmr->view_assign_del($base_name . "_mode"));

if($cmr->post_var[$base_name . "_mode"] != "link_tab"){
    print("<p align=\"left\" class=\"normal_text\">");
}
/**
 * jumping in the row result by current page
 */


$set = intval($cmr->post_var[$base_name . "_limit"]);
$begin = $set * intval($cmr->post_var[$base_name . "_page"]);
$num = 0;

// 	$content1 = $m->get_fetch_overview();
// 	print_r($content1);

($begin < ($total)) ? $key = $begin : $key = $total;

while((($key >= 0) && ($num <= $set)) && ($total >= $key)){
// foreach($arrayuid as $key => $last_uid)
	$last_uid = $arrayuid[$key];
	$last_num = $m->get_msgno($last_uid);

	$content = $m->get_headerinfo($last_num);
	$aval["id"] = $last_num;
	$aval["number"] = $last_num;
	$aval["uid"] = $last_uid;
	$aval["message_id"] = $content->message_id;
	$aval["date"] = $content->date;
	$aval["date_time"] = $content->date;
		
	($content->Draft == "X") ? $aval["Draft"] = "1" : $aval["Draft"] = "0";
	($content->Deleted == "D") ? $aval["Deleted"] = "1" : $aval["Deleted"] = "0";
	($content->Answered == "A") ? $aval["Answered"] = "1" : $aval["Answered"] = "0";
	($content->Flagged == "F") ? $aval["Flagged"] = "1" : $aval["Flagged"] = "0";
	(($content->Unseen == "U")||($content->Unseen == " ")) ? $aval["Unseen"] = "1" : $aval["Unseen"] = "0";
	(($content->Recent == "R")||($content->Recent == "N")) ? $aval["Recent"] = "1" : $aval["Recent"] = "0";
		
	$aval["Msgno"] = $content->Msgno;
	$aval["MailDate"] = $content->MailDate;
	$aval["Size"] = $content->Size;
	$aval["udate"] = $content->udate;
	$aval["fetchfrom"] = $content->fetchfrom;
	$aval["fromaddress"] = $content->fromaddress;
	$aval["Subject"] = $content->Subject;
	$aval["toaddress"] = $content->toaddress;
	// 	$aval["mailbox"] = $content->mailbox;
	$aval["mailbox"] = $cmr->post_var["mailbox"];
	$aval["senderaddress"] = $content->senderaddress;
	$aval["reply_toaddress"] = $content->reply_toaddress;



    $num++;
    $key--;
    


//----------
$pdf_data_text .= "\nDATE:" . $aval["date_time"] ."\nfrom:" . $aval["fromaddress"] . "\ntoaddress:\n" . $aval["toaddress"] . "\n----------------\nSubject:\n" . $aval["Subject"] . "\n===========================\n";
//----------

    if($cmr->post_var[$base_name . "_mode"] == "link_tab") print("<tr><td class=\"rown3\">" . $num . "</td>");
    /**
     * calling the function to show link to the row rispect to the current mode
     */
// print_r($aval);print("<hr /><br />");
    if($cmr->post_var[$base_name . "_mode"] == "link_tab"){
        print(imap_tab_link($cmr->config, $cmr->page, $cmr->language, $aval, 1));
    }else{
        if($cmr->post_var[$base_name . "_mode"] == "link_detail"){
            print(imap_link_detail($cmr->config, $cmr->page, $cmr->language, $aval, 1));
        }else{
            print(imap_link($cmr->config, $cmr->page, $cmr->language, $aval, 0));
        }
    }
    $last_id = $aval["id"];

    if($cmr->post_var[$base_name . "_mode"] == "link_tab") print("</tr>");
// 	if($key > $num_row) break;
	}


/**
 * use by table mode space to insert the page navigation bar
 */
if($cmr->post_var[$base_name . "_mode"] == "link_tab") 
print("<tr><td colspan=\"" . ($i_col + 2) . "\">");

/**
 * showing the page navigation bar
 */
if(!empty($last_id))
print($cmr->next_preview_bar($cmr->post_var[$base_name . "_page"], $num_page));

/**
 * use by table mode to close the table
 */
if($cmr->post_var[$base_name . "_mode"] == "link_tab"){
    print("</td></tr>");
    print("</table></form>");
}else{
    print("</p>");
}
print("</form>");

/**
 * free memory and reset some var
 */
if($cmr->post_var[$base_name . "_mode"] == "link_tab"){
?>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "date_time_<?php print($base_name);?>",         // id of the input field
      ifFormat    : "%Y-%m",    // the date format
      button      : "button_date_time_<?php print($base_name);?>",      // id of the button
      showsTime      :    true,
      timeFormat     :    "24"
    }
  );
</script>  
<hr />
<?php 
};
?>
<form action="index.php?cmr_mode=pdf&ext=.pdf" method="post" id="form_preview__pdf">
<!--input type="hidden" value="cmr_mode" name="pdf" />
<input type="hidden" name="ext" value=".pdf" /-->
<input type="hidden" name="title"     id="pdf_<?php print($base_name);?>_title"    value="imap" />
<input type="hidden" name="author"    id="pdf_<?php echo $base_name;?>_author"   value="<?php print($cmr->get_user("auth_imap"));?>" />
<input type="hidden" name="file"      id="pdf_<?php print($base_name);?>_file"     value="" />
<input type="hidden" name="links"     id="pdf_<?php print($base_name);?>_links"    value="" />
<input type="hidden" name="data_type" id="pdf_<?php print($base_name);?>_data_type" value="text" />
<input type="hidden" name="dim_col"   id="pdf_<?php print($base_name);?>_dim_col"  value="0" />
<input type="hidden" name="header"    id="pdf_<?php print($base_name);?>_header"   value="" />
<textarea  class="hidded" name="data" id="pdf_<?php echo $base_name;?>_data"  ><?php print(wordwrap(htmlentities($pdf_data_text, 80)));?></textarea>
<input class="submit" type="submit" value="pdf" onclick="return confirm('confirm')" />
</form>
</fieldset>


</div>
<br />
<fieldset class="bubble"><legend><?php print($cmr->translate("links"));?></legend>
<?php



print("<p>");
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/update_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/search_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/report_imap.php?id_imap=".$cmr->post_var["id_imap"]."&layer=2", 1);

$lk->add_link("modules/preview_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/menu_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
print($lk->list_link());
?>
</p>
</fieldset>
<br />
<?php 
 print($division->close());

 // print($cmr->query[$table_name]);
$action = "";
$last_id = "";
}
?>
