<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * faq.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























faq.php,Ver 3.0  2011-Sep-Wed 12:32:30  
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
include_once($cmr->get_path("index") . "control.php"); //to control access in the module
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
/*
NOTA: Questo articolo è stato tradotto da un sistema di traduzione automatica senza intervento umano. Tchouamou Eric Herve  mette a disposizione questi articoli come beneficio per coloro che non parlano la lingua inglese al fine di facilitarli nella comprensione. Tchouamou Eric Herve  non garantisce la qualità linguistica delle traduzioni e non è responsabile di qualsivoglia problema, diretto o indiretto, dovuto alla erronea interpretazione dei contenuti o dell’ultilizzo degli stessi presso i clienti.
*/

$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


if(($cmr->get_user("auth_email"))){
    // $division->load_themes($cmr->themes);
}else{
    $cmr->page["auth_theme"] = "default";
    // $division->load_themes($cmr->themes);
}
$cmr->module["name"] = "faq.php";
// $division->module["name"]= $cmr->get_module("name");
$cmr->module["base_name"] = strtolower(substr($cmr->module["name"], 0, strrpos($cmr->module["name"], ".")));



$division->module["title"] = $cmr->translate($cmr->module["base_name"]); //$division->module["title"] = " Faq and Help";
// $division->module["text"] = "";


















print($division->show_noclose());


if(!isset($cmr->post_var["id_faq"])){
}else{
    $id = $cmr->post_var["id_faq"];
}
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/update_faq.php?conf_name=conf.d/modules/conf_faq.ini&id=" . $id . "&refresh=", 1);;
$lk->add_link("modules/new_faq.php?conf_name=conf.d/modules/conf_faq.ini&id=" . $id . "&refresh=", 1);;
$lk->add_link("modules/view_faq.php?conf_name=conf.d/modules/conf_faq.ini&id_faq=" . $id . "", 1);
$lk->add_link("modules/search_faq.php?conf_name=conf.d/modules/conf_faq.ini&id_faq=" . $id . "", 1);
$lk->add_link("modules/report_faq.php?id_faq=" . $id . "&layer=2", 1);
$lk->add_link("modules/preview_faq.php?conf_name=conf.d/modules/conf_faq.ini&id_faq=" . $id . "", 1);
print($lk->list_link());

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
print($cmr->get_title($cmr->module["base_name"]));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<div id="faq_div">



<?php 
print($cmr->module_link("modules/view_all_forum.php?id_forum=" . $id . "", 1));
print("<br />");
?>
<p align="left" class="normal_text">
<br />

<div id="faq_div"> 


<u><b>FREQUENTLY ASKED QUESTIONS </b></u><br />

<p style="font-size: 12px; font-family: Verdana,Arial;" align="left">
<br /><b>PARTE 1: <u>DESCRIZIONE DEL SERVIZIO, AIUTO ALL'UTILIZZO</u></b><br /><br />
<br /><br /><br /><b>1) A cosa serve il portale TSTM ? </b><br />
Il portale è l'interfaccia tra S G S.r.l. e il nostro cliente; permette di fornire certi servizi direttamente al cliente, al fine di velocizzarli e migliorarli.
<br /><br /><b>2) Cosa si intende per "Ticket" ?</b><br />
Un Ticket rappresenta la vita di un problema gestito dal Soc di S G S.r.l.: è semplicemente un appunto testuale in cui si segue il problema dall'inizio fino alla sua risoluzione. Un ticket è accessibile sia al cliente che a S G S.r.l.: una copia di esso è spedità tramite email al cliente; un cliente può aprire, aggiornare o anche chiudere un ticket. 
<br /><br /><b>3) Come si apre un Ticket ?</b><br />

Bisogna:
<br />- collegarsi al portale TSTM;
<br />- fare clic sul pulsante [Tickets] nel menù in alto del portale;
<br />- inserire il titolo del ticket;
<br />- inserire il testo del ticket;
<br />- infine fare click su [Send ticket]. 
<br />
Si può anche semplicemente chiamare il Soc di S G S.r.l. per aprire il ticket telefonicamente, o ancora spedire una mail di apertura ticket a soc@localhost 
<br /><br /><b>4) Come fare per vedere un Ticket ?</b><br />
I ticket gestiti dal Soc di S G S.r.l. per la sua struttura sono tutti elencati a destra del portale; sono organizzati in quattro gruppi:
<br />- Ticket appena aperti 
<br />- Ticket gia aggiornati 
<br />- Ticket gia chiusi 
<br />- Ticket nella nostra coda (elenco dei ticket che abbiamo noi stessi appena modificato) 
<br /><br /><b>5) Come si aggiorna un Ticket ?</b><br />

Basta fare clic sul link che rappresenta il nostro ticket a destra: ci compare l'anteprima del ticket con alcuni pulsanti in alto. A questo punto bisogna cliccare sul pulsante [Update Ticket], il nostro ticket verrà aperto, si aggiunge la modifica che vogliamo e infine si clicca su "Send Ticket". Fatto ciò, funziona allo stesso modo dell' E-mail. 
<br /><br /><b>6) Come chiudere un Ticket ?</b><br />
Bisogna fare clic sul link che rappresenta il nostro ticket a destra: ci compare l'anteprima del ticket con alcuni pulsanti in alto. A questo punto bisogna cliccare sul pulsante [Close Ticket], il nostro ticket sarà aperto, si aggiunge un commento infine si clicca su "Send Ticket"; il ticket è chiuso. 
<br /><br /><b>7) Come scaricare un report ?</b><br />
Fare Clic sul pulsante [Report] nel menù in alto, poi cliccare sotto nella finestra appena comparsa sul report che ci interessa scaricare. Il resto funziona come un normale download da internet 
<br /><br /><b>8) Posso modificare i mie dati ?</b><br />
No per il momento, è sempre meglio contattare S G S.r.l. per aiutarvi in questo caso. 
<br /><br /><b>9) Per ogni altro dubbio?</b><br />
Contattare semplicemente S G S.r.l. al numero verde 
</p>
<!--br /><br /><br /><b><u>PARTE 2 "ADMINISTRAZIONE E CONFIGURAZIONE DEL PORTALE"</u></b><br /><br />


<br /><b>1) chi gestisce ?</b><br />
<br /><b>4) gli utenti ?</b><br />
<br /><b>5) chi puo' avere un account ?</b><br />
<br /><b>6) in cosa consiste il servizio offerto agli utenti?</b><br />
<br /><b>7) perche' come interfaccia utente c'e' un menu?</b><br />
<br /><b>8) quanto ?</b><br />
<br /><b>9) dopo quanto tempo scade un acconto?</b><br />
<br /><b>10) cosa fare quando scade l'acconto ?</b><br />
<br /><b>11) cosa fare quando scade la password ?</b><br />
<br /><b>12) cosa fare quando si dimentica la password?</b><br />


<br /><b>14) da dove e' possibile ?</b><br />
<br /><b>15) posso collegarmi ?</b><br />
<br /><b>16) ho la ?</b><br />
<br /><b>17) posso avere ?</b><br />
<br /><b>18) posso usare ?</b><br />

<br /><br /><br /><b>PARTE 4 "PER SVILUPPATORI E ADETTI ALLA MANUTENZIONE DEL PORTALE"</b><br /><br />


<br /><b>19) perche' qualcuno ha diversi privilegi?</b><br />
<br /><b>22) vorrei dare una mano, come fare?</b><br />
<br /><b>23) come salvo i miei ?</b><br />
<br /><b>26) ma allora chi gestisce ?</b><br />
</p>
Sommario FAQ
database
[en/database] 100030 Can I use my nice Oracle or DB2? (modificato 03/07/2005 13:53:57)
[en/database] 100016 MySQL server has gone away (modificato 22/03/2004 17:32:28)
[en/database] 100013 Upgrate to <?php print($cmr->get_conf("cmr_portal_short_name"));
?> 1.2: job 'UnlockTickets' fails due to missing column 'comment' (modificato 27/02/2004 22:51:38)
[en/database] 100014 Setup <?php print($cmr->get_conf("cmr_portal_short_name"));
?> on a PostgreSQL database (modificato 27/02/2004 22:49:32)
[en/database] 10006 Delete all tickets from database! (modificato 27/02/2004 00:51:22)
general
[en/general] 100038 Which browser do I need? (modificato 28/06/2004 08:31:54)
[en/general] 100034 Is it possible to customize TSTM? (modificato 28/06/2004 08:26:50)
[en/general] 100031 Which programming language is used within TSTM? (modificato 28/06/2004 08:22:56)
[en/general] 100017 How can I delete a user who is no longer needed? (modificato 28/06/2004 07:49:35)
[en/general] 100019 What is an agent in the context of TSTM? (modificato 28/06/2004 07:46:24)
[en/general] 100010 What does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> stand for? (modificato 28/06/2004 07:40:41)
[en/general] 10008 What is TSTM? (modificato 18/02/2004 00:48:04)
[en/general] 10009 What does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> cost? (modificato 18/02/2004 00:47:52)
other
[en/other] 100040 Does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> support RFC 1297? (modificato 28/06/2004 08:33:57)
[en/other] 100037 I do like the <?php print($cmr->get_conf("cmr_portal_short_name"));
?> but would feel more comfortable by using a commercial product. (modificato 28/06/2004 08:30:32)
[en/other] 100036 How can I become a part of the <?php print($cmr->get_conf("cmr_portal_short_name"));
?> developer comunity? (modificato 28/06/2004 08:29:44)
[en/other] 100015 Positioning browser windows from within <?php print($cmr->get_conf("cmr_portal_short_name"));
?> via JavaScript (modificato 05/04/2004 10:03:55)
[en/other] 10005 Setting up a simple <?php print($cmr->get_conf("cmr_portal_short_name"));
?> LDAP server! (modificato 18/02/2004 00:41:25)
system
[en/system] 100048 <?php print($cmr->get_conf("cmr_portal_short_name"));
?> on SUSE Linux Enterprise Server 9 (modificato 19/07/2005 15:12:53)
[en/system] 10003 <?php print($cmr->get_conf("cmr_portal_short_name"));
?> and utf8 (modificato 03/07/2005 14:00:46)
[en/system] 100046 Is it wise to keep all files under one directory on Win32? (modificato 28/06/2004 08:41:31)
[en/system] 100045 Why should I install the servers as system services at all on Win32? (modificato 28/06/2004 08:40:58)
[en/system] 100044 What about the services' installations on Win32? (modificato 28/06/2004 08:39:59)
[en/system] 100043 Which changes are made to my system when using the TSTM4win32 installer? (modificato 28/06/2004 08:38:58)
[en/system] 100042 Is it possible to host more than one <?php print($cmr->get_conf("cmr_portal_short_name"));
?> on one machine? (modificato 28/06/2004 08:38:00)
[en/system] 100035 Is it possible to install <?php print($cmr->get_conf("cmr_portal_short_name"));
?> on a Windows box? (modificato 28/06/2004 08:27:57)
[en/system] 100033 Does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> work with mod_perl? (modificato 28/06/2004 08:25:41)
[en/system] 100032 What is the default admin account? (modificato 28/06/2004 08:24:07)
[en/system] 100029 How does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> scale and how big can it become? (modificato 28/06/2004 08:19:47)
[en/system] 100028 How stable is TSTM? (modificato 28/06/2004 08:17:48)
[en/system] 100027 What hardware do I need? (modificato 28/06/2004 08:14:41)
[en/system] 100026 What software will be needed? (modificato 28/06/2004 08:12:07)
[en/system] 100025 Does <?php print($cmr->get_conf("cmr_portal_short_name"));
?> work only on a SuSE Linux based system? (modificato 28/06/2004 08:07:24)
[en/system] 100023 Is <?php print($cmr->get_conf("cmr_portal_short_name"));
?> multi user and multi group capable? (modificato 28/06/2004 08:00:32)
[en/system] 100020 Is <?php print($cmr->get_conf("cmr_portal_short_name"));
?> able to receive emails? (modificato 28/06/2004 07:59:57)
[en/system] 100021 Is <?php print($cmr->get_conf("cmr_portal_short_name"));
?> able to send emails? (modificato 28/06/2004 07:58:30)
[en/system] 100022 Is fulltext searching possible within TSTM? (modificato 28/06/2004 07:56:24)
[en/system] 100018 Cannot install SuSE 8.0 RPM (modificato 28/06/2004 07:43:53)
[en/system] 10002 connection failed at Kernel/System/CheckItem.pm line 68 (modificato 17/02/2004 00:40:29)
webserver
[en/webserver] 100047 SUSE Linux: Invalid command 'Perlrequire'... (modificato 07/01/2005 08:49:10)
[en/webserver] 10004 Apache Error: (28)No space left on device (modificato 22/06/2004 13:31:21)<-->
</div>
<?php 
 print($division->close());
 
 
 
if(file_exists($cmr->get_path("module") ."modules/view_all_faq.php")){
        include($cmr->get_path("module") ."modules/view_all_faq.php");
    }else{
	    if(file_exists($cmr->get_path("module") . "modules/auto/view_all_faq.php")){
	        include($cmr->get_path("module") . "modules/auto/view_all_faq.php");
	    }
     };

if(file_exists($cmr->get_path("module") ."modules/view_all_forum.php")){
        include($cmr->get_path("module") ."modules/view_all_forum.php");
    }else{
	    if(file_exists($cmr->get_path("module") . "modules/auto/view_all_forum.php")){
	        include($cmr->get_path("module") . "modules/auto/view_all_forum.php");
	    }
     };

if(file_exists($cmr->get_path("module") ."modules/view_all_help.php")){
        include($cmr->get_path("module") ."modules/view_all_help.php");
    }else{
	    if(file_exists($cmr->get_path("module") . "modules/auto/view_all_help.php")){
	        include($cmr->get_path("module") . "modules/auto/view_all_help.php");
	    }
     };

?>

