<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * preview_imap.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























preview_imap.php,Ver 3.0  2011 05:49:24
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

// =======================================================================
	$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "imap" . $cmr->get_ext("lang"));
	$cmr->config = $mod->load_conf("conf_imap" . $cmr->get_ext("conf"));
	$cmr->help=$cmr->load_help_need("imap" . $cmr->get_ext("help"));
	
	$cmr->action["module_name"] = "imap.php";
	$cmr->action["to_load"] = "load_func_need";
	include($cmr->get_path("index") . "system/loader/loader_function.php");
	$cmr->action["to_load"] = "load_class_need";
	include($cmr->get_path("index") . "system/loader/loader_class.php");
// =======================================================================

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

if(!isset($cmr->post_var["id_imap"])) $cmr->post_var["id_imap"] = 0;
// =======================================================================



$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;



$division->module["title"] = $cmr->post_var["mailbox"] . ": " . $cmr->translate("Message ID: ") . $cmr->post_var["id_imap"];
// $division->module["text"] = "";


















print($division->show_noclose());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/confimap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/update_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/search_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);

$lk->add_link("modules/report_imap.php?id_imap=".$cmr->action["imap"]["id"]."&layer=2", 1);
print($lk->open_module_tab(3));

$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->action["imap"]["id"]."", 1);
$lk->add_link("modules/menu_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<br />
<fieldset class="bubble"><legend><?php print($cmr->translate("links"));?></legend>
<?php



print("<p>");
?>
</p>
</fieldset>
<br />
<p align="center">
<b>
<?php
if(($cmr->translate($mod->base_name)))
print($cmr->translate($mod->base_name));
?>
</b>
</p>
<p class="normal_text">
<?php
if(isset($cmr->language[$mod->base_name."_title"]))
print($cmr->translate($mod->base_name."_title"));
?>
</p>
<br />
<div id="preview_imap_div">
<fieldset class="bubble"><legend><?php print($cmr->translate("imap"));?></legend>
<?php
// =======================================================================






if(!($m->connect($cmr->post_var["mailbox"]))){
// =======================================================================
print( $cmr->translate("<br />connection failled...<br />"));
include($cmr->get_path("module") . "modules/login_imap.php");
// =======================================================================
}else{



print(button_assign_del($cmr->config, $cmr->language, $cmr->page, $mod->name, $base_name . "_mode"));





// -----------



// -----------
$last_uid = $cmr->post_var["id_imap"];
$m->imap_current_uid = $last_uid;
$last_num = $m->get_msgno($last_uid);
$m->imap_current_num = $last_num;
// -----------



// -----------
$cmr->email["header"] = $m->get_fetchbody($last_uid, 0);
// -----------




// -----------


$header=$m->get_headerinfo($last_num);

$cmr->email["mail_from"] = $header->fromaddress;
$cmr->email["mail_title"] = $header->Subject;
$cmr->email["mail_to"] = $header->toaddress;
$cmr->email["mail_cc"] = $header->ccaddress;
$cmr->email["mail_bcc"] = $header->bccaddress;
$cmr->email["reply_toaddress"] = $header->reply_toaddress;
$cmr->email["senderaddress"] = $header->senderaddress;
$cmr->email["return_pathaddress"] = $header->return_pathaddress;
$cmr->email["in_reply_to"] = $header->in_reply_to;

$cmr->email["id"] = $header->message_id;
$cmr->email["message_id"] = $header->message_id;
$cmr->email["number"] = $last_num;
$cmr->email["uid"] = $last_uid;
$cmr->email["Msgno"] = $header->Msgno;
$cmr->email["date"] = $header->date;
$cmr->email["MailDate"] = $header->MailDate;
$cmr->email["udate"] = $header->udate;
$cmr->email["fetchfrom"] = $header->fetchfrom;

(empty($header->Size)) ? $cmr->email["Size"] = $header->Size . " Bytes" : $cmr->email["Size"] = (($header->Size) / 1024) . " Kbytes";
($header->Draft == "X") ? $cmr->email["Draft"] = "Yes" : $cmr->email["Draft"] = "No";
($header->Deleted == "D") ? $cmr->email["Deleted"] = "Yes" : $cmr->email["Deleted"] = "No";
($header->Answered == "A") ? $cmr->email["Answered"] = "Yes" : $cmr->email["Answered"] = "No";
($header->Flagged == "F") ? $cmr->email["Flagged"] = "Yes" : $cmr->email["Flagged"] = "No";
(($header->Unseen == "U")||($header->Unseen == " ")) ? $cmr->email["Unseen"] = "Yes" : $cmr->email["Unseen"] = "No";
(($header->Recent == "R")||($header->Recent == "N")) ? $cmr->email["Recent"] = "Yes" : $cmr->email["Recent"] = "No";
// -----------
// -----------
// -----------


// 	$image0 = $cmr->get_path("www") . "images/icon/attach_icon.png";
	$image1 = $cmr->get_path("www") . "images/icon/recent_icon.png";
	$image2 = $cmr->get_path("www") . "images/icon/unseen_icon.png";
	$image3 = $cmr->get_path("www") . "images/icon/flagged_icon.png";
	$image4 = $cmr->get_path("www") . "images/icon/answered_icon.png";
	$image5 = $cmr->get_path("www") . "images/icon/deleted_icon.png";
	$image6 = $cmr->get_path("www") . "images/icon/draft_icon.png";
	
	
// 	if($cmr->email["Size"] > 10000) print("<img alt=\">\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . $cmr->translate["attach"] . "\" />");
	if($cmr->email["Recent"]=="Yes") print("<img alt=\"r\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . $cmr->translate["recent"] . "\" />");
	if($cmr->email["Unseen"]=="Yes") print("<img alt=\"u\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . $cmr->translate["unseen"] . "\" />");
	if($cmr->email["Flagged"]=="Yes") print("<img alt=\"f\" src=\"" . $image3 . "\" border=\"0\"  title=\"" . $cmr->translate["flagged"] . "\" />");
	if($cmr->email["Answered"]=="Yes") print("<img alt=\"a\" src=\"" . $image4 . "\" border=\"0\"  title=\"" . $cmr->translate["answered"] . "\" />");
	if($cmr->email["Deleted"]=="Yes") print("<img alt=\"d\" src=\"" . $image5 . "\" border=\"0\"  title=\"" . $cmr->translate["deleted"] . "\" />");
	if($cmr->email["Draft"]=="Yes") print("<img alt=\"x\" src=\"" . $image6 . "\" border=\"0\"  title=\"" . $cmr->translate["draft"] . "\" />");
    print("<ul class=\"normal_text\" >");
//     print('<li>');
//     print('</li>');
    print('<li><b>' . $cmr->translate('id') . ':</b>' . $cmr->email["uid"] . '</li>');
    print('<li><b>' . $cmr->translate('number') . ':</b>' . $cmr->email["number"] . '</li>');
//     print('<li><b>' . $cmr->translate('uid') . ':</b>' . $cmr->email["uid"] . '</li>');
    print("<li><b>" . $cmr->translate("header") . ":</b><pre>" . wordwrap(htmlentities($cmr->email["header"], 100)). "</pre>" . "</li>");
    print('</li>');
    print('<li><b>' . $cmr->translate('message_id') . ':</b>' . $cmr->email["message_id"] . '</li>');
    print('<li><b>' . $cmr->translate('msgno') . ':</b>' . $cmr->email["msgno"] . '</li>');
    print('<li><b>' . $cmr->translate('maildate') . ':</b>' . $cmr->email["maildate"] . '</li>');
    print('<li><b>' . $cmr->translate('udate') . ':</b>' . $cmr->email["udate"] . '</li>');
    print('<li><b>' . $cmr->translate('reply_toaddress') . ':</b>' . $cmr->email["reply_toaddress"] . '</li>');
    print('<li><b>' . $cmr->translate('senderaddress') . ':</b>' . $cmr->email["senderaddress"] . '</li>');
    print('<li><b>' . $cmr->translate('return_pathaddress') . ':</b>' . $cmr->email["return_pathaddress"] . '</li>');
    print('<li><b>' . $cmr->translate('in_reply_to') . ':</b>' . $cmr->email["in_reply_to"] . '</li>');
    print('<li><br /> </b></li>');
    print('<li><b>' . $cmr->translate('recent') . ':</b>' . $cmr->email["recent"] . '</li>');
    print('<li><b>' . $cmr->translate('unseen') . ':</b>' . $cmr->email["unseen"] . '</li>');
    print('<li><b>' . $cmr->translate('flagged') . ':</b>' . $cmr->email["flagged"] . '</li>');
    print('<li><b>' . $cmr->translate('answered') . ':</b>' . $cmr->email["answered"] . '</li>');
    print('<li><b>' . $cmr->translate('deleted') . ':</b>' . $cmr->email["deleted"] . '</li>');
//     print('<li><b>' . $cmr->translate('fetchfrom') . ':</b>' . $cmr->email["fetchfrom"] . '</li>');
//     print('<li><b>' . $cmr->translate('encoding') . ':</b>' . $cmr->email["encoding"] . '</li>');
//     print('<li><b>' . $cmr->translate('lang') . ':</b>' . $cmr->email["lang"] . '</li>');
    print('<li><br /> </b></li>');
    print('<li><b>' . $cmr->translate('size') . ':</b>' . $cmr->email["size"] . '</li>');
    print('<li><b>' . $cmr->translate('date') . ':</b>' . $cmr->email["date"] . '</li>');
    print('<li><b>' . $cmr->translate('mail_title') . ':</b>' . $cmr->email["mail_title"] . '</li>');
    print('<li><b>' . $cmr->translate('mail_from') . ':</b>' . $cmr->email["mail_from"] . '</li>');
    print('<li><b>' . $cmr->translate('mail_to') . ':</b>' . $cmr->email["mail_to"] . '</li>');
    print('<li><b>' . $cmr->translate('mail_cc') . ':</b>' . $cmr->email["mail_cc"] . '</li>');
    print('<li><b>' . $cmr->translate('mail_bcc') . ':</b>' . $cmr->email["mail_bcc"] . '</li>');
    print("<br \>");
	// -----------
	if($cmr->email["text"] = $m->get_fetchbody($last_uid, 1.1)){
	$intern_attach=1;
	}else{
	$intern_attach=0;
	$cmr->email["text"] = $m->get_fetchbody($last_uid, 1);
	}
	// -----------
	$mime_header = imap_mime_header_decode($cmr->email["text"]);
	for ($i=0; $i<count($mime_header); $i++){
	    print("<li><b>" . $cmr->translate("charset") . ":</b>" . $mime_header[$i]->charset . "</li>");
	    print("<li><b>" . $cmr->translate("text") . ":</b><pre>" . wordwrap(htmlentities($mime_header[$i]->text, 100)). "</pre>" . "</li>");
	}
	// -----------
	if($intern_attach){
	$j=1;
//     while($header_attach=$m->get_bodystruct($last_num, $j)){
    $i=2;
    while($header_attach=$m->get_bodystruct($last_num, "1." . $i)){
	    print('<li><b>' . $cmr->translate("attach1.") . ($i) . ':</b>');
// 	    print($m->get_download_link_default($last_uid, "1." . $i));
	    if($header_attach->ifsubtype) print("<br />" . $cmr->translate('subtype') . ": " . $header_attach->subtype);
	    if($header_attach->ifdescription) print("<br />" . $cmr->translate('description') . ": " . $header_attach->description);
	    if($header_attach->ifid)  print("<br />" . $cmr->translate('id') . ": " . $header_attach->id);
	    if($header_attach->ifdisposition)  print("<br />" . $cmr->translate('disposition') . ": " . $header_attach->disposition);
		$cmr->post_var["current_file"] = "email_attachment1" . $i;
		$_SESSION[$cmr->post_var["current_file"] . "_file"] = $header_attach->parameters[0]->value;
		$_SESSION[$cmr->post_var["current_file"] . "_data"]= $m->get_fetchbody($last_uid, "1." . $i);
	    print("<br />" . "<a class=\"cmr_link\" href=\"index.php?conf=com_attachment&current_file=" . $cmr->post_var["current_file"] . "\" >" . $header_attach->parameters[0]->value . "</a>");
	    
	    print('</li>');
	    $i++;
	}
	}
// 	}
	// -----------
	
    $i=2;
    while($header_attach=$m->get_bodystruct($last_num, $i)){

	    print('<li><b>' . $cmr->translate("attach") . ($i) . ':</b>');
// 	    print($header_attach->type);
// 	    print($header_attach->encoding);
	    if($header_attach->ifsubtype) print("<br />" . $cmr->translate('subtype') . ": " . $header_attach->subtype);
	    if($header_attach->ifdescription) print("<br />" . $cmr->translate('description') . ": " . $header_attach->description);
	    if($header_attach->ifid)  print("<br />" . $cmr->translate('id') . ": " . $header_attach->id);
	    if($header_attach->ifdisposition)  print("<br />" . $cmr->translate('disposition') . ": " . $header_attach->disposition);
		$cmr->post_var["current_file"] = "email_attachment" . $i;
		$_SESSION[$cmr->post_var["current_file"] . "_file"] = $header_attach->parameters[0]->value;
		$_SESSION[$cmr->post_var["current_file"] . "_data"]= $m->get_fetchbody($last_uid, $i);
	    print("<br />" . "<a class=\"cmr_link\" href=\"index.php?conf=com_attachment&current_file=" . $cmr->post_var["current_file"] . "\" >" . $header_attach->parameters[0]->value . "</a>");
	    print('</li>');
	    $i++;
	    }




print("</ul>");
print("</fieldset>");

$GLOBALS["current_imap_id"] = $cmr->post_var["id_imap"];
//----------
$pdf_data_text = "";
//----------
$pdf_data_text .= "\n" . $cmr->translate("PDF") . ":" . $division->module["title"] . "\n" . $cmr->translate("DATE") . ":" . $cmr->email["MailDate"] . "\n" . $cmr->translate("FROM") . ":" . $cmr->email["mail_from"] . "\n" . $cmr->translate("TITLE") . ":" . $cmr->email["mail_title"] . "\n" . $cmr->translate("HEADER") . ":\n" . serialize($cmr->email["header"]) .  "\n" . $cmr->translate("TEXT") . ":\n" . serialize($cmr->email["text"]) .  "\n===========================\n";
//----------

print("<br />");
    print(show_next_preview_bar($cmr->config, $cmr->language, $cmr->page, $mod->name, $cmr->action[$table_name]["page"], "2"));
print("<br />");
?>
<hr />
<form action="index.php?cmr_mode=pdf&ext=.pdf" method="post" id="form_<?php print($mod->base_name);?>pdf">
<!--input type="hidden" value="cmr_mode" name="pdf" />
<input type="hidden" name="ext" value=".pdf" /-->
<input type="hidden" name="title"     id="pdf_<?php print($mod->base_name);?>_title"    value="imap" />
<input type="hidden" name="author"    id="pdf_<?php echo $mod->base_name;?>_author"   value="<?php print($cmr->get_user("auth_imap"));?>" />
<input type="hidden" name="file"      id="pdf_<?php print($mod->base_name);?>_file"     value="" />
<input type="hidden" name="links"     id="pdf_<?php print($mod->base_name);?>_links"    value="" />
<input type="hidden" name="data_type" id="pdf_<?php print($mod->base_name);?>_data_type" value="text" />
<input type="hidden" name="dim_col"   id="pdf_<?php print($mod->base_name);?>_dim_col"  value="0" />
<input type="hidden" name="header"    id="pdf_<?php print($mod->base_name);?>_header"   value="" />
<textarea  class="hidded" name="data" id="pdf_preview_data"  ><?php print(wordwrap(htmlentities($pdf_data_text, 80)));?></textarea>
<input class="submit" type="submit" value="Pdf" onclick="return confirm('confirm')" />
</form>
<fieldset class="bubble"><legend><?php print($cmr->translate("links"));?></legend>
<?php
}
$lk->add_link("modules/new_imap.php?conf_name=conf.d/modules/confimap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
$lk->add_link("modules/view_imap.php?conf_name=conf.d/modules/conf_imap.ini&id_imap=".$cmr->post_var["id_imap"]."", 1);
print($lk->list_link());
print("</fieldset>");
print("<br />");
print("</div>");


print($lk->close_module_tab());
print($division->close());


?>
