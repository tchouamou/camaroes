<?php 
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * menu_imap.php
 *    ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.03 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */


/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























menu_imap.php,Ver 3.0  2011-July 10:36:59
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

// =======================================================================
include_once($cmr->get_path("class") . "class/class_imap.php");
// =======================================================================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!class_exists("class_imap")){
	print($cmr->translate("load class_imap before !?"));
    return;
} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

$m = new class_imap();
// =======================================================================
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
        
$m->mailbox=$m->get_mailbox();        
// =======================================================================
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);

// $division->load_themes($cmr->themes);
// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->post_var["imap_server"];
// $division->module["text"] = "";


















print($division->show_noclose());
// print($cmr->language['" . $mod->base_name . "_title']);
// print("</b><br /><p class=\"normal_text\">");
// print($cmr->language['" . $mod->base_name . "_text']);
// print("</p>");
// =======================================================================
// =======================================================================
empty($cmr->post_var["searchbox"]) ? $searchbox = "ALL" : $searchbox = $cmr->post_var["searchbox"];
empty($cmr->post_var["searchbox1"]) ? $searchbox1 = "" : $searchbox = $searchbox . " " . $cmr->post_var["searchbox1"];
empty($cmr->post_var["orderbox"]) ? $orderbox = "SORTARRIVAL" : $orderbox = $cmr->post_var["orderbox"];
$mailbox = $m->mailbox;
$inboxmailbox= substr($mailbox, 0, strpos($mailbox, "}")) . "}INBOX";
$num_new = "";
// =======================================================================
?>

<div id="menu_imap_div">

<ul class="cmr_menu">

 <li>
  <?php 
  print("->" . $cmr->module_link("modules/login_imap.php?conf_name=conf.d/modules/conf_login_imap.ini&conf_name=conf.d/modules/conf_login_imap.ini"));
    ?>
 </li>



 <li>
  <?php 
  print("->" . $cmr->module_link("modules/new_imap.php?conf_name=conf.d/modules/conf_imap.ini&conf_name=conf.d/modules/conf_imap.ini"));
    ?>
 </li>


<!--tr>
 <li>
  <?php 
  print("->" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&conf_name=conf.d/modules/conf_imap.ini"));
    ?>
 </li>
</tr-->


 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortarrival&searchbox=all&mailbox=" . $inboxmailbox, "", $cmr->translate("inbox")) . $num_new ."]");
    ?>
 </li>


<br/ >
<?php
// =======================================================================
print($cmr->module_link("modules/menu_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=all&mailbox=" . $mailbox, 1));
// =======================================================================
if(!($m->connect())){
// =======================================================================
print( $cmr->translate("<br />connection failled...<br />"));
// =======================================================================
}else{
$info_new=$m->get_mailboxmsginfo();
if(!empty($info_new->Unread)) $num_new = "(" . $info_new->Unread . ")";

?>


 <li>
==
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=all&mailbox=" . $mailbox , "", $cmr->translate("all")) . "]" );
    ?>
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=deleted&mailbox=" . $mailbox , "", $cmr->translate("deleted")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=answered&mailbox=" . $mailbox , "", $cmr->translate("answered")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=flagged&mailbox=" . $mailbox , "", $cmr->translate("flagged")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=unseen&mailbox=" . $mailbox , "", $cmr->translate("unseen")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=unanswered&mailbox=" . $mailbox , "", $cmr->translate("unanswered")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=undeleted&mailbox=" . $mailbox , "", $cmr->translate("undeleted")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=unflagged&mailbox=" . $mailbox , "", $cmr->translate("unflagged")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=new&mailbox=" . $mailbox , "", $cmr->translate("new")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=old&mailbox=" . $mailbox , "", $cmr->translate("old")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=recent&mailbox=" . $mailbox , "", $cmr->translate("recent")) . "]" );
    ?>
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=seen&mailbox=" . $mailbox , "", $cmr->translate("seen")) . "]" );
    ?>
 </li>




 <li>
==
 </li>



 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortdate&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortdate")) . "]" );
    ?>
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortarrival&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortarrival")) . "]" );
    ?>
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortfrom&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortfrom")) . "]" );
    ?>
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortsubject&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortsubject")) . "]" );
    ?>
 </li>




 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortto&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortto")) . "]" );
    ?>
 </li>





 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortcc&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortcc")) . "]" );
    ?>
 </li>





 <li>
  <?php 
  print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=sortsize&searchbox=" . $searchbox . "&mailbox=" .  $mailbox , "", $cmr->translate("sortsize")) . "]" );
    ?>
 </li>




 <li>
==
 </li>




<?php
// =======================================================================



$m->imap_folder_list=$m->get_getmailboxes();
foreach($m->imap_folder_list as $key => $val){
// 	print( "<hr />name");
// 	echo  "; attributes" . $value->attributes . "; delimiter" . $value->delimiter . "<hr />";
$imap_folder_list[] = $val->name;
}
sort($imap_folder_list);



foreach($imap_folder_list as $key => $value){
// $name = strtoupper(str_replace($m->mailbox, "", $value));
$name = substr($value, strpos($value, "}") + 1);
$num_new = "";
if(!empty($cmr->post_var["Unread" . $name])) $num_new = "(" . $cmr->post_var["Unread" . $name] . ")";

?>


 <li>
  <?php print("[" . $cmr->module_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=" . $searchbox . "&mailbox=" . ($value), "", $name) . $num_new ."]");
?>
 </li>


<?php
}

}
?>

 <li>
==
 </li>



 <li>
  <?php 
	print("->" . $cmr->module_link("modules/menu_imap.php?conf_name=conf.d/modules/conf_imap.ini&orderbox=" . $orderbox . "&searchbox=all&mailbox=" . $mailbox, "1", "", "", "", "left1"));
?>
 </li>



 <li>
  <?php 
	print("->" . $cmr->module_link("modules/menu_list.php?conf_name=conf.d/modules/conf_general.ini&conf_name=conf.d/modules/conf_general.ini"));
?>
 </li>

</ul></div>

<?php
print($division->close());
// =======================================================================
?>
