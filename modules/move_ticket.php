<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * move_ticket.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























move_ticket.php, Ver 3.03   
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
if(get_post("id_ticket")) $cmr->post_var["id_ticket"] = get_post("id_ticket");
if(empty($cmr->post_var["id_ticket"])) $cmr->post_var["id_ticket"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "id");
if(empty($cmr->post_var["id_ticket"])){
	print($cmr->translate("No ticket selected! clic here => "));
	print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket" . $cmr->get_ext("conf") . "&id_ticket=", 1));
	print($cmr->translate(" to select one."));
    return;
} 

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["title"] = "move_ticket";
// $division->module["text"] = "";
print($division->show_noclose());














// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $email = $cmr->get_user("auth_email");
    $id = $cmr->post_var["id_ticket"];
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/take_ticket.php?conf_name=conf.d/modules/conf_take_ticket.ini&id_ticket=" . $cmr->post_var["id_ticket"] . "&refresh=", 1);;
$lk->add_link("modules/move_ticket.php?conf_name=conf.d/modules/conf_move_ticket.ini&id_ticket=" . $id . "&refresh=", 1);;
print($lk->open_module_tab(1));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_ticket.php?id_ticket=" . $id . "&refresh=&middle3=", 1);
$lk->add_link("modules/update_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $id . "&refresh=", 1);;
$lk->add_link("modules/close_ticket.php?conf_name=conf.d/modules/conf_close_ticket.ini&id_ticket=" . $id . "&refresh=", 1);;
$lk->add_link("modules/view_ticket.php?conf_name=conf.d/modules/conf_ticket.ini&id_ticket=" . $id . "&refresh=", 1);;
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
<div id="move_ticket_div">


<?php
print($cmr->get_title($mod->base_name));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$values = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "*", "id", $cmr->post_var["id_ticket"]);
// -----------

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "groups";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query["groups"] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "groups.name FROM " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query["groups"] .= "WHERE ((" . $cmr->get_conf("cmr_table_prefix") . "groups.type >= '" . $cmr->get_conf("cmr_noc_type") . "') ";
$cmr->query["groups"] .= ") ";
$cmr->query["groups"] .= " AND " . $cmr->action["where"];
//$cmr->query["groups"] .= "limit " . $cmr->get_conf("cmr_max_view") . ";";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->action["table_name"] = "user";
$cmr->action["column"] = "";
$cmr->action["action"] = "select";
$cmr->action["where"] = $cmr->where_query();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->query["user"] = "SELECT " . $cmr->get_conf("cmr_table_prefix") . "user.email FROM " . $cmr->get_conf("cmr_table_prefix") . "user, " . $cmr->get_conf("cmr_table_prefix") . "user_groups, " . $cmr->get_conf("cmr_table_prefix") . "groups ";
$cmr->query["user"] .= "WHERE ((" . $cmr->get_conf("cmr_table_prefix") . "user.email=" . $cmr->get_conf("cmr_table_prefix") . "user_groups.user_email) and (" . $cmr->get_conf("cmr_table_prefix") . "user_groups.group_name=" . $cmr->get_conf("cmr_table_prefix") . "groups.name) ";
$cmr->query["user"] .= "AND (" . $cmr->get_conf("cmr_table_prefix") . "groups.type >= '" . $cmr->get_conf("cmr_noc_type") . "') ";
$cmr->query["user"] .= ") ";
$cmr->query["user"] .= " AND " . $cmr->action["where"];
//$cmr->query["user"] .= "limit " . $cmr->get_conf("cmr_max_view") . ";";

$result_query1 = &$cmr->db_connection->Execute($cmr->query["groups"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
$result_query2 = &$cmr->db_connection->Execute($cmr->query["user"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
// -----------
?>

<form name="frm" action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_move_ticket.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . $cmr->post_var["id_ticket"] . "\" name=\"id_ticket\" />"));?>
<?php 
// print(input_hidden("<input type=\"hidden\" value=\"get_data/get_comment\" name=\"comment\"  id=\"comment1\" />"));
?>
<br />
<br />




<table align="center" border="0" class="normal_text" >



<?php // -----------
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type")){
    echo "<tr><td>" . $cmr->translate("assign_to") . ":</td><td><select class=\"select_class\" name=\"assign_to\"><option value=\"" . $values["assign_to"] . "\">" . $values["assign_to"] . "</option>";
    while ($groups = $result_query1->FetchNextObject(false)){
        print("<option value=\"" . $groups->name . "\">" . $groups->name . "</option>");
    };

    while ($users = $result_query2->FetchNextObject(false)){
        print("<option value=\"" . $users->email . "\">" . $users->email . "</option>");
    };

    print("</select></td></tr>");
}else{
    print("<select class=\"select_class\"  name=\"assign_to\" style=\"visibility :hidden); display:none \"><option>" . $values["assign_to"] . "</option> </select> ");
};
// -----------
?>

<tr><td><?php print($cmr->translate("number"));
?>:</td><td><input value="<?php print($values["number"]);
?>" type="text" size="15" name="number" readonly /> </td></tr>
</table>

<br />

<input class="submit" id="submit2" type="button" <?php print("value=\"" . $cmr->translate("move_ticket") . "\"");
?> onclick="submit_form(this.form)" />

<br />


</form>
</div>
<?php  
print($lk->close_module_tab());
print($division->close());
?>
