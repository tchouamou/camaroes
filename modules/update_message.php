<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * update_message.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.






update_message.php, Ver 3.03 
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



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(get_post("id_message")) $cmr->post_var["id_message"] = get_post("id_message");
if(empty($cmr->post_var["id_message"])) $cmr->post_var["id_message"] = $cmr->get_column($cmr->get_conf("cmr_table_prefix") . "message", "id");
if(empty($cmr->post_var["id_message"])){
	print($cmr->translate("No message selected! clic here => "));
	print($cmr->module_link("modules/view_message.php?conf_name=conf_message" . $cmr->get_ext("conf") . "&id_message=", 1));
	print($cmr->translate(" to select one."));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$id = $cmr->post_var["id_message"];

$cmr->action["todo"] = "update_message";




include_once($cmr->get_path("func") . "function/func_message.php");
include($cmr->get_path("module") . "modules/message.php");

// $result_te->Close();
// $result_number->Close();
// $result_rif->Close();
// $result_group->Close();
// $result_group_name->Close();
// $result_user_email->Close();
// $result_message->Close();
// $result_model->Close();

?>
