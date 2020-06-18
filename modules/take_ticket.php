<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * take_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























take_ticket.php,Ver 3.0  2011-Oct-Tue 15:13:38  
*/

/**
 * Information about
 * $cmr->db["sql_query1"] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->action["form_action_message"] Is used for keeping
 * the string value you will be see after running run_result.php
 *
 * $cmr->email["subject"] Is used for keeping
 * the title off the message you will be send after running run_result.php
 *
 * $cmr->email["message"] Is used for keeping
 * the text value off the message you will be send after running run_result.php
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_ticket")) $cmr->post_var["id_ticket"] = get_post("id_ticket");
if(empty($cmr->post_var["id_ticket"])) $cmr->post_var["id_ticket"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "id");
if(empty($cmr->post_var["id_ticket"])){
	print($cmr->translate("No ticket selected! clic here => "));
	print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket" . $cmr->get_ext("conf") . "&id_ticket=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //$division->module["title"] = " Update ticket";
// $division->module["text"] = "";





// 












print($division->show_noclose());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $email = $cmr->get_user("auth_email");
    $id_ticket = $cmr->post_var["id_ticket"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/take_ticket.php?conf_name=conf.d/modules/conf_take_ticket.ini&id_ticket=" . $id_ticket . "&refresh=", 1);;
$lk->add_link("modules/move_ticket.php?conf_name=conf.d/modules/conf_move_ticket.ini&id_ticket=" . $id_ticket . "&refresh=", 1);;
print($lk->open_module_tab(1));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_ticket.php?id_ticket=" . $id_ticket . "&refresh=&middle3=", 1);
$lk->add_link("modules/update_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $id_ticket . "&refresh=", 1);;
$lk->add_link("modules/close_ticket.php?conf_name=conf.d/modules/conf_close_ticket.ini&id_ticket=" . $id_ticket . "&refresh=", 1);;
$lk->add_link("modules/view_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $id_ticket . "&refresh=", 1);;
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
<div id="take_ticket_div">

<form name="frm" action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_take_ticket.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $id_ticket . "\" name=\"id_ticket\" />"));?>
<br />
<br />



<table align="center" border="0" class="normal_text" >



<?php
// -----------
$values = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "*", "id", $id_ticket);
// -----------
$comment = $values["comment"] . ";\n ";
print("<input type=\"hidden\" value=\"" . $comment . "\" name=\"comment\" id=\"comment1\">");

print("<tr><td>" . $cmr->translate("number") . ":</td><td><input value=\"" . $values["number"] . "\" type=\"text\" size=\"15\" name=\"number\" readonly /> </td></tr>");
// -----------
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
    print("<tr><td>" . $cmr->translate("assign_to") . ":</td><td>");
    print("<input type=\"text\" name=\"assign_to\" value=\"" . $email . "\" readonly ></td></tr>");
}else{
    echo " <select class=\"select_class\"  name=\"assign_to\" style=\"visibility :hidden; display:none \">";
    print("<option>" . $values["assign_to"] . "</option> </select> ");
};
// ----------- <script language="javascript" type="text/javascript">hide("submit1");show( "submit2");</script>

?>

</table>

<br />

<input class="submit" id="submit1" type="submit" <?php print("value=\"" . $cmr->translate("take_ticket") . "\"");
?> onclick="return confirm('<?php print($cmr->translate("sure"));?>')" />
<input id="submit2" class="hidded_submit" type="button" <?php print("value=\"" . $cmr->translate("take_ticket") . "\"");
?> onclick="submit_form(this.form)" />

<br />


</form>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>
