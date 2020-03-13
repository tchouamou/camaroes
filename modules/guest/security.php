<?php
/**
 * security.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve , tchouamou@gmail.com
All rights reserved.


security.php, Ver 3.03   
*/

/**
 * Information security
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @windowss (design for the layer usefull when running a module)

 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);
// $division->load_themes($cmr->themes);
$division->module["name"] = $cmr->module["name"]; 
$division->module["title"] = $cmr->translate($cmr->module["base_name"]);
// $division->module["text"] = "";

print($division->show_noclose());
print($cmr->translate("!!!! More privilege needed for module") . " [" . $cmr->post_var["module_message"] . "], " . $cmr->translate("to user type:" . $cmr->get_user("authorisation") . "; contact administrator !!!!") . "\n\r");
print($division->close());
?>


