<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update_ticket.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























update_ticket.php, Ver 3.03 
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
if(get_post("id_ticket")) $cmr->post_var["id_ticket"] = get_post("id_ticket");
if(empty($cmr->post_var["id_ticket"])) $cmr->post_var["id_ticket"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "ticket", "id");
if(empty($cmr->post_var["id_ticket"])){
	print($cmr->translate("No ticket selected! clic here => "));
	print($cmr->module_link("modules/view_ticket.php?conf_name=conf_ticket" . $cmr->get_ext("conf") . "&id_ticket=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$cmr->action["todo"] = "update_ticket";




include_once($cmr->get_path("func") . "function/func_ticket.php");
include($cmr->get_path("module") . "modules/ticket.php");

// $result_te->Close();
// $result_number->Close();
// $result_rif->Close();
// $result_group->Close();
// $result_group_name->Close();
// $result_user_email->Close();
// $result_ticket->Close();
// $result_model->Close();

?>
