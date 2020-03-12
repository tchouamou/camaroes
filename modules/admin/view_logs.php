<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * view_logs
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























view_logs,Ver 3.0  2011-Sep-Wed 12:32:30  
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
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name);
// $division->module["title"] = "New Open ticket";
// $division->module["text"] = "";


















print($division->show_noclose());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="view_logs_div">
<fieldset class="bubble"><legend><?php  print($cmr->translate("list logs:"));?></legend>

<table border="1" align="center" >
<tr>
<th><?php print($cmr->translate("File log")); ?></th>
<th><?php print($cmr->translate("Type")); ?></th>
<th><?php print($cmr->translate("Size")); ?></th>
<th><?php print($cmr->translate("Time")); ?></th>
<th><?php print($cmr->translate("Owner")); ?></th>
<th><?php print($cmr->translate("Permission")); ?></th>
<th><?php print($cmr->translate("Download")); ?></th>
</tr>
<?php
$cols = "0";

$dir = opendir($cmr->get_path("log") . "log/");

$cols++;

while ($file = readdir($dir)){
    $file_name = $cmr->get_path("log") . "log/" . $file;
    if(($file != ".") && ($file != "..") && ($file)){
                    print("<tr>");
                    print("<td>" . $cmr->module_icon($file_name, "16") . $cmr->module_link($cmr->get_path("module") . "modules/view_logs.php?file_name=" . $file_name, "", $file) . "</td>");
                    print("<td>" . filetype($file_name) . "</td>");
                    print("<td>" . filesize($file_name) . "</td>");
                    print("<td>" . fileatime($file_name) . "</td>");
                    print("<td>" . fileowner($file_name) . "</td>");
                    print("<td>" . fileperms($file_name) . "</td>");
                    print("<td>" . file_link($file_name) . "</td>");
                    print("</tr>");
        
    };
}
?>
 </table>
</fieldset>





<br />
<?php
$file_name = "";
if(!empty($cmr->post_var["file_name"])) $file_name = realpath($cmr->post_var["file_name"]);
?>
<fieldset class="bubble"><legend><?php  print($cmr->translate("preview log: " . $file_name));?></legend>
<table width="100%" border="1" align="left" >
<tr>
<td valign="top" align="left">
<?php
if(!empty($file_name)){
if(!file_exists($file_name)){
    cmr_error_log($cmr->config, $cmr->session, "Script=" . __FILE__ . "  Line=" . __LINE__ . " : " . "File [" . $file_name . "]  Can not  be found");
    print("file [" . $file_name . "] not found !!!..<br />");
    return $file_name;
}else{
    $lines_text = file_get_contents($file_name);
    print(nl2br($lines_text));
}
}

?>


 </td>
 </tr>

 </table>
</fieldset>





<br />
 
</div>
<?php  print($division->close());
?>

