<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * search_imap.php
 *        ---------
 * begin    : July 2004 - July 2011
 * copyright   : Camaroes Ver 3.0 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























search_imap.php,Ver 3.0  2011-Apr-Tue 06:25:03  
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
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //" search imap";
// $division->module["text"] = "";





// 












print($division->show_noclose());
// =======================================================================
include_once($cmr->get_path("class") . "class/class_imap.php");

if((class_exists("class_imap"))){
$m = new class_imap();
$m->imap_service = "imap";
$m->imap_server = $cmr->email["imap_server"];
$m->imap_port = $cmr->email["imap_port"];
$m->imap_user_name = $cmr->email["imap_user_name"];
$m->imap_password = $cmr->email["imap_password"];
$m->imap_default_folder = $cmr->email["imap_default_folder"];
        
$cmr->email["imap_default_folder"] = $m->imap_default_folder;
if($m->connect());

}
// =======================================================================
if(!isset($cmr->post_var["id_imap"])){
    $cmr->action["imap"]["id"] = "";
}else{
    $cmr->action["imap"]["id"] = $cmr->post_var["id_imap"];
}
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/update_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/search_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);

$lk->add_link("modules/report_imap.php?id_imap=".$cmr->action["imap"]["id"]."&layer=2", 1);
print($lk->open_module_tab(2));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($mod->base_name));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="search_imap_div">
<form action="index.php" method="post" />
<?php print(input_hidden("<input type=\"hidden\" value=\"get_data/get_search_imap.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<br />




<fieldset class="bubble"><legend><?php print($cmr->translate("imap"));
?>:</legend>
<p>
<table  border="1"  class="normal_text"   align="center">



 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("all:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="ALL" value=""> </input><br />
  </td>
 </tr>

 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("on"));?></b></label>
  </td>
  <td align='left'><input type="text" name="ON" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("since"));?></b></label>
  </td>
  <td align='left'><input type="text" name="SINCE" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("before"));?></b></label>
  </td>
  <td align='left'><input type="text" name="BEFORE" value=""> </input><br />
  </td>
 </tr>


 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("from"));?></b></label>
  </td>
  <td align='left'><input type="text" name="FROM" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("cc"));?></b></label>
  </td>
  <td align='left'><input type="text" name="CC" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("bcc"));?></b></label>
  </td>
  <td align='left'><input type="text" name="BCC" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("to"));?></b></label>
  </td>
  <td align='left'><input type="text" name="TO" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("subject"));?></b></label>
  </td>
  <td align='left'><input type="text" name="SUBJECT" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("keyword"));?></b></label>
  </td>
  <td align='left'><input type="text" name="KEYWORD" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("body"));?></b></label>
  </td>
  <td align='left'><input type="text" name="BODY" value=""> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("text"));?></b></label>
  </td>
  <td align='left'><input type="text" name="TEXT" value=""> </input><br />
  </td>
 </tr>


 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("answered:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="ANSWERED" value="ANSWERED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("deleted:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="DELETED" value="DELETED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("flagged:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="FLAGGED" value="FLAGGED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("new:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="NEW" value="NEW"> </input><br />
  </td>
 </tr>
 
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("old:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="OLD" value="OLD"> </input><br />
  </td>
 </tr>
 
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("recent:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="RECENT" value="RECENT"> </input><br />
  </td>
 </tr>
 
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("seen:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="SEEN" value="SEEN"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("unanswered:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="UNANSWERED" value="UNANSWERED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("undeleted:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="UNDELETED" value="UNDELETED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("unflagged:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="UNFLAGGED" value="UNFLAGGED"> </input><br />
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("unkeyword:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="UNKEYWORD" value="UNKEYWORD"></input>
  </td>
 </tr>
 <tr>
  <td align='rigth'>
   <label><b><?php print($cmr->translate("unseen:"));?></b></label>
  </td>
  <td align='left'><input type="checkbox" name="UNSEEN" value="UNSEEN"> </input><br />
  </td>
 </tr>
 
</table>
</p>
</fieldset>
<p>
   <input type="reset" onclick="return confirm('<?php print($cmr->translate("confirm that you want to empty this form"));?>')">
<input class="submit" type="submit" value="<?php print($cmr->translate("search"));
?>" />
</p>
</form>

</div>
<?php 
print($lk->close_module_tab());
print($division->close());
?>
