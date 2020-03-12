<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_new_imap.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_new_imap.php,Ver 3.0  2011 05:49:23
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 *
 * $cmr->output[0] Is used for keeping
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
// case "@_form_@"://When Working in data send by  form [new_imap.php]


// -----------------------------------------------------

if(get_post('id')){
    $id=(get_post('id', 'post', $cmr->session['pre_match'])); //Getting variable [$post->id] sended by form [new_imap.php]
}

if(get_post('encoding')){
    $encoding=(get_post('encoding', 'post', $cmr->session['pre_match'])); //Getting variable [$post->encoding] sended by form [new_imap.php]
}

if(get_post('lang')){
    $lang=(get_post('lang', 'post', $cmr->session['pre_match'])); //Getting variable [$post->lang] sended by form [new_imap.php]
}

if(get_post('header')){
    $mail_pop_header=(get_post('header', 'post', $cmr->session['pre_match'])); //Getting variable [$post->header] sended by form [new_imap.php]
}

if(get_post('mail_title')){
    $mail_pop_title=(get_post('mail_title', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_title] sended by form [new_imap.php]
}

if(get_post('mail_from')){
    $mail_pop_from=(get_post('mail_from', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_from] sended by form [new_imap.php]
}

if(get_post('mail_to')){
    $mail_pop_to=(get_post('mail_to', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_to] sended by form [new_imap.php]
}

if(get_post('mail_cc')){
    $mail_pop_cc=(get_post('mail_cc', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_cc] sended by form [new_imap.php]
}

if(get_post('mail_bcc')){
    $mail_pop_bcc=(get_post('mail_bcc', 'post', $cmr->session['pre_match'])); //Getting variable [$post->mail_bcc] sended by form [new_imap.php]
}

if(get_post('attach')){
    $attach=(get_post('attach', 'post', $cmr->session['pre_match'])); //Getting variable [$post->attach] sended by form [new_imap.php]
}

if(get_post('text')){
    $mail_pop_text=(get_post('text', 'post', $cmr->session['pre_match'])); //Getting variable [$post->text] sended by form [new_imap.php]
}



// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(get_post("mail_text")){
$mail_pop_text = get_post("mail_text");
}else{
@ $mail_pop_text = get_post("alt_text");
}
// *************************
$cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/users/" . $cmr->get_user("auth_user") . "/attach/";
$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
// *************************
$mail_pop_to = cmr_search_replace("^[,][ ]", "", $mail_pop_to); //--rimossione vigola all'inizio--
$mail_pop_cc = cmr_search_replace(",, ", ", ", $mail_pop_cc); //--rimossione vigole doppie--
$mail_pop_cc = cmr_search_replace("^[,][ ]", "", $mail_pop_cc); //--rimossione vigola all'inizio--
$mail_pop_bcc = cmr_search_replace("^[,][ ]", "", $mail_pop_bcc); //--rimossione vigola all'inizio--

$mail_pop_text = stripslashes($mail_pop_text); //remove slashes from email_text
$mail_pop_title = stripslashes($mail_pop_title); //remove slashes from email_title
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




$envelope["from"]= $mail_pop_from;
$envelope["to"]  = $mail_pop_to;
$envelope["cc"]  = $mail_pop_cc;
// $envelope["bcc"]  = $mail_pop_bcc;

$mime_part1["type"] = TYPEMULTIPART;
$mime_part1["subtype"] = "mixed";

// $filename = $cmr->post_files["attachment_location"];
// if(file_exists($filename)){
// $fp = fopen($filename, "r");
// $contents = fread($fp, filesize($filename));
// fclose($fp);

//snip
if(count($_FILES) > 0){
    $mime_part1["type"] = TYPEMULTIPART;
    $mime_part1["subtype"] = "mixed";
}
$mime_body[] = $mime_part1;
//snip
$uploaddir = ini_get("upload_tmp_dir"); //Get tmp upload dir from PHP.ini
foreach ($_FILES as $fieldName => $file){
    for ($i=0;$i < count($file['tmp_name']);$i++){
        if(is_uploaded_file($file['tmp_name'][$i])){
            $file_handle = fopen($file["tmp_name"][$i], "rb");
            $file_name = $file["name"][$i];
            $file_size = filesize($file["tmp_name"][$i]);
           
            $mime_part2["type"] = TYPEAPPLICATION;
            $mime_part2["encoding"] = ENCBASE64;
            $mime_part2["subtype"] = "octet-stream";
            $mime_part2["description"] = $file_name;
            $mime_part2['disposition.type'] = 'attachment';
            $mime_part2['disposition'] = array ('filename' => $file_name);
            $mime_part2['dparameters.filename'] = $file_name;
            $mime_part2['parameters.name'] = $file_name;
            $mime_part2["contents.data"] = base64_encode(fread($file_handle,$file_size));
           
            $mime_body[] = $mime_part2;
            unlink($file["tmp_name"][$i]);
        }
    }
}
//snip




// $mime_part2["type"] = TYPEAPPLICATION;
// $mime_part2["encoding"] = ENCBINARY;
// $mime_part2["subtype"] = "octet-stream";
// $mime_part2["description"] = basename($filename);
// $mime_part2["contents.data"] = $contents;
// }

$mime_part3["type"] = TYPETEXT;
$mime_part3["subtype"] = "plain";
$mime_part3["description"] = "Body";
$mime_part3["contents.data"] = $mail_pop_text . "\n\n\n\t";

$mime_body[] = $mime_part3;

/*
Creating the appropriate SQL string for  new_in imap
*/

// echo nl2br(mail_mail_compose($envelope, $mime_body));
if(function_exists("mail_mail")){
	$temp_env=unserialize(serialize($envelope));
	$sendmail = mail_mail_compose($temp_env, $mime_body);
	mail_mail($mail_pop_to, $mail_pop_title, $sendmail, $mail_pop_header, $mail_pop_cc, $mail_pop_bcc, $mail_pop_from);
}else{
	$temp_env=unserialize(serialize($envelope));
	$sendmail = mail_mail_compose($temp_env, $mime_body);
	mail($mail_pop_to, $mail_pop_title, $sendmail, $mail_pop_header);
}
/*
Creating the appropriate notification Message to be send to the administrator group
*/
$templates_notify=cmr_look_file("notify_delete_imap.xml", $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/, ". $cmr->get_path("notify")."templates/notify/" . $cmr->get_page("language") . "/auto/, ". $cmr->get_path("notify")."templates/notify/auto/");
$cmr->notify = $cmr->load_notify($templates_notify);
if(($cmr->get_conf("log_to_page_delete_imap"))) $cmr->output[0] = $cmr->notify["to_page"];
if(($cmr->get_conf("log_to_log_delete_imap"))) $cmr->output[1] = $cmr->notify["to_log"];
if(($cmr->get_conf("log_to_mail_delete_imap"))) $cmr->email = $cmr->notify["to_imap"];
if(($cmr->get_conf("log_to_db_delete_imap")));
// if(($cmr->get_conf("log_to_sms_delete_imap")));
// if(($cmr->get_conf("log_to_flux_delete_imap")));
// if(($cmr->get_conf("log_to_rss_delete_imap")));
// if(($cmr->get_conf("log_to_other_delete_imap")));


/*
Select next module to be run
*/
$cmr->page["layer"] = "3";

$cmr->page["left1"] = "modules/menu_imap.php";
$cmr->page["left2"] = "";
$cmr->page["middle1"] = "run_result.php";
$cmr->page["middle2"] = "modules/view_imap.php";
$cmr->page["middle3"] = "";

$cmr->page["right1"] = "";
$cmr->page["right2"] = "";
$cmr->page["right3"] = "";
$cmr->page["right4"] = "";

$cmr->output[0]="<i>".$cmr->translate("Email sended: <br />".$mail_pop_to. "<br /> " . $mail_pop_title ." Texte:")."<br />".$mail_pop_text."</i><br />";

$cmr->post_var["output0"] = "";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'imap', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $mod->path;
include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// echo "<h1>" . $cmr->translate(" INBOX") . "</h1>\n";
// // $folders = mail_list($mbox, $mailbox, $cmr->get_conf("mail_list_folder"));
// $folders = mail_getmailboxes($mbox, $mailbox, $cmr->get_conf("mail_list_folder"));

// if(is_array($folders)){
// reset($folders);
// if($folders == false){
//     echo "Appel échoué<br />\n";
// }else{
//     foreach ($folders as $key => $val){
//         // echo "<b>".$key."</b>:".mail_utf7_decode($val)."<br />\n";
//         // echo "<b>".$key."</b>:<br />";
//         // print_r($val);
//         // echo "<br />\n";
//         echo "($key) ";
//         echo mail_utf7_decode($val->name) . ", ";
//         echo "'" . $val->delimiter . "', ";
//         echo $val->attributes . "<br />\n";
//     }
// }
// }else{
// echo "mail_getmailboxes Error : " . mail_last_error() . "\n";
// }
// // ******************************************
// // ******************************************
// echo "<h1>" . $cmr->translate(" INBOX") . "</h1>\n";
// $status = mail_status($mbox, $mailbox, SA_ALL);
// print_r ($status);

// $time = microtime();

// $cmr->imap["headers"] = mail_headers($mbox);

// $timediff = microtime() - $time;
// echo "<br />Time taken: " . $timediff;

// if($cmr->imap["headers"] == false){
// echo "mail_headers Error : " . mail_last_error() . "\n";
// }else{
// $overview = mail_fetch_overview($mbox, "2,4:6", 0);
// foreach ($cmr->imap["headers"] as $key => $val){
//     echo "<b>" . $key . "</b>:" . $val . "<br />\n";
//     echo "<b>" . $key . "</b>:";

//     echo "<br /><pre>\n";
//     $messg = mail_fetch_overview($mbox, $key + 1);
//     print_r ($messg);
//     // print_r (mail_headerinfo($mbox, $key +1));
//     // //        echo "<hr /><pre>".mail_body($mbox, $key + 1 )."</pre><hr />";
//     // echo "<br />*******************************\n";
//     // print_r (mail_fetchstructure($mbox, $key + 1));
//     echo mail_fetchbody($mbox, $msg, $messg["uid"] , '0');
//     echo mail_fetchbody($mbox, $msg, $messg["uid"] , '1');
//     echo "</pre>@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@\n";

//     if($key > 10){
//         break;
//     }
// }
// }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// echo "<h1>". $cmr->translate("imap check ") . "</h1>\n";
		// $check = mail_check($mbox);
		// echo "Nombre de message avant ajout : ". $check->Nmsgs . "\n";
		// //  mail_append($mbox, "{". $cmr->get_conf("mail_server")."}INBOX.forlin"
		// //                    , "From: tchouamou@gmail.com\r\n"
		// //                    . "To:tchouamou@gmail.com\r\n"
		// //                    . "Subject: test\r\n"
		// //                    . "\r\n"
		// //                    . "Ceci est un message de test. Ignorez le\r\n"
		// //                  );
		// $check = mail_check($mbox);
		// echo "Nombre de messages après ajout : ". $check->Nmsgs . "\n";
		// //******************************************
// mail_close($mbox);
		// ******************************************
		// echo which php;
		// // si cela ne marche pas, essayez
		// echo PHP_BIN;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $mbox = mail_open("{pop3.sourceforge.net:143}INBOX", "".$inf['helpdesk_imap']."", "w3e4rf");
// mail_mail($cmr->imap["headersto"], $cmr->imap["subject"], $cmr->imap["body"], $cmr->imap["headerscc"], $cmr->imap["headers"]);
// mail_close($mbox);
// $sh = socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
// socket_connect($sh,  '127.0.0.1', 25);
// $buf = "helo\r\n";
// $buf .= "helo\r\n";
// $buf .= "mail from:<tchouamoueric@yahoo.com>\r\n";
// $buf .= "rcpt to:<tchouamou@gmail.com>\r\n";
// $buf .= "rcpt cc:<tchoumoueric@hotmal.com>\r\n";
// $buf .= "rcpt bcc:<tchouamou@yahoo.com>\r\n";
// $buf .= "data\r\n";
// $buf .= "$cmr->imap["body"]\r\n";
// $buf .= ".\r\n";
// $buf .= "from:<tchouamoueric@yahoo.com>\r\n";
// $buf .= "to:<tchouamou@gmail.com>\r\n";
// $buf .= "cc:<tchouamou@gmail.com>\\r\n";
// $buf .= "bcc:<tchouamou@yahoo.com>\r\n";
// $buf .= "$cmr->imap["subject"]\r\n";
// $buf .= "quit\r\n";
// socket_write($sh, $buf, strlen($buf));
// socket_close($sh);
// $dn = array();  // use defaults
// $res_privkey = openssl_pkey_new();
// $res_csr = openssl_csr_new($dn, $res_privkey);
// $res_cert = openssl_csr_sign($res_csr, null, $res_privkey, $ndays);
// openssl_x509_export($res_cert, $str_cert);
// $res_pubkey = openssl_pkey_get_public($str_cert);
// ///////////////////////////
// Encrypt using public key, decrypt using private key.
// Use this to store stuff in your database: Unless someone
// has your private key, the database contents are useless.
// Also, use this for sending to a specific individual:  Get
// their public key, encrypt the message, only they can use
// their private key to decode it.
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// echo "Source: $source";
// $fp=fopen("/path/to/certificate.crt", "r");
// $pub_key=fread($fp,8192);
// fclose($fp);
// openssl_get_publickey($pub_key);
// /*
// * NOTE:  Here you use the $pub_key value (converted, I guess)
// */
// openssl_public_encrypt($source, $crypttext, $pub_key);
// echo "string crypted: $crypttext";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $fp=fopen("/path/to/private.key", "r");
// $priv_key=fread($fp,8192);
// fclose($fp);
// // $passphrase is required if your key is encoded (suggested)
// $res = openssl_get_privatekey($priv_key, $passphrase);
// /*
// * NOTE:  Here you use the returned resource value
// */
// openssl_private_decrypt($crypttext, $newsource, $res);
// echo "string decrypt : $newsource";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // On suppose que $data contient les données à signer
// // lecture de la clé publique pour chaque destinataire
// $fp = fopen("/src/openssl-0.9.6/demos/sign/key.pem", "r");
// $priv_key = fread($fp, 8192);
// fclose($fp);
// $pkeyid = openssl_get_privatekey($priv_key);
// // calcule de la signature
// openssl_sign($data, $signature, $pkeyid);
// // libère les clés de la mémoire
// openssl_free_key($pkeyid);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // On suppose que $data et $signature contiennent les données à signer et
// // la signature
// // lecture de la clé publique depuis le certificat
// $fp = fopen("/src/openssl-0.9.6/demos/sign/cert.pem", "r");
// $cert = fread($fp, 8192);
// fclose($fp);
// $pubkeyid = openssl_get_publickey($cert);
// // indique si la signature est correcte
// $ok = openssl_verify($data, $signature, $pubkeyid);
// if($ok == 1){
// echo 'Signature valide';
// } elseif($ok == 0){
// echo 'Signature erronée';
// }else{
// echo 'Erreur de vérification de la signature';
// }
// // libère les clés de la mémoire
// openssl_free_key($pubkeyid);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // On suppose que $data contient les données à sceller
// // lecture de la clé publique pour chaque destinataire
// $fp = fopen("/src/openssl-0.9.6/demos/maurice/cert.pem", "r");
// $cert = fread($fp, 8192);
// fclose($fp);
// $pk1 = openssl_get_publickey($cert);
// // pour le deuxième destinataire
// $fp = fopen("/src/openssl-0.9.6/demos/sign/cert.pem", "r");
// $cert = fread($fp, 8192);
// fclose($fp);
// $pk2 = openssl_get_publickey($cert);
// // scelle le message : seuls, les possesseurs de $pk1 et $pk2 peuvent déchiffrer
// // le message $sealed avec les clés $ekeys[0] et $ekeys[1] (respectivement).
// openssl_seal($data, $sealed, $ekeys, array($pk1, $pk2));
// // libère les clés de la mémoire
// openssl_free_key($pk1);
// openssl_free_key($pk2);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // On suppose que $sealed et $env_key contiennent les données scellées
// // et la clé d'enveloppe, fournies par l'expéditeur
// // lecture de la clé privée dans un fichier
// $fp = fopen("/src/openssl-0.9.6/demos/sign/key.pem", "r");
// $priv_key = fread($fp, 8192);
// fclose($fp);
// $pkeyid = openssl_get_privatekey($priv_key);
// // déchiffrage des données : elles sont placées dans $open
// if(openssl_open($sealed, $open, $env_key, $pkeyid)){
// echo "Voici les données déchiffrées : ", $open;
// }else{
// echo "Impossible de déchiffrer les données";
// }
// // libération des ressources
// openssl_free_key($pkeyid);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// array mail_search ( resource mail_stream, string criteria [, int options [, string charset]] )
// mail_search() effectue une recherche dans la boîte aux lettres courante, sur le flux IMAP courant. criteria est une chaîne, délimitée par des espaces, dans laquelle les mots-clés suivants sont acceptés. Tous les arguments multi-mots doivent être entre guillemets : 
// ALL - retourne tous les messages qui vérifient le reste du critère. 
// ANSWERED - tous les messages avec le flag \\ANSWERED 
// BCC "string" - tous les messages avec la chaîne "string" dans le champ Bcc : 
// BEFORE "date" - tous les messages avec Date : avant "date" 
// BODY "string" - tous les messages avec "string" dans le corps 
// CC "string" - tous les messages avec "string" dans le champ Cc : 
// DELETED - tous les messages effacés 
// FLAGGED - tous les messages avec le flag \\FLAGGED (parfois interprété comme Important ou Urgent) 
// FROM "string" - tous les messages avec la chaîne "string" dans le champ From : 
// KEYWORD "string" - tous les messages avec la chaîne "string" comme mot-clé 
// NEW - tous les nouveaux messages 
// OLD - tous les anciens messages 
// ON "date" - tous les messages avec la date "date" comme champ Date : 
// RECENT - tous les messages avec le flag \\RECENT 
// SEEN - tous les messages lus (avec le flag\\SEEN flag) 
// SINCE "date" - tous les messages avec la date Date: après "date" 
// SUBJECT "string" - tous les messages avec la chaîne "string" dans le champ Subject : 
// TEXT "string" - tous les messages avec le texte "string" 
// TO "string" - tous les messages avec la chaîne "string" dans le champ To : 
// UNANSWERED - tous les messages non répondus 
// UNDELETED - tous les messages non effacés 
// UNFLAGGED - tous les messages non flaggés 
// UNKEYWORD "string" - tous les messages ne contenant pas le mot-clé "string" 
// UNSEEN - tous les messages non lus 


// Par exemple, pour rechercher les messages non répondus, envoyés par maman, vous pouvez utiliser : "UNANSWERED FROM maman". Les recherches semblent insensibles à la casse. Cette liste de critères est issue du code d'un client C UW et peut être incomplète ou inprécise. (voir aussi RFC2060, section 6.4.4). 
// Les valeurs pour les flags sont SE_UID, qui fait que le tableau réponse contient les UIDs plutôt que les numéros de séquence. 
// array mail_fetch_overview ( resource mail_stream, string sequence [, int options] )
// mail_fetch_overview() lit les en-têtes des courriers électroniques de la séquence sequence et retourne un sommaire de leur contenu. sequence va contenir une séquence d'indice de message ou d'UIDs, si flags cotient FT_UID. La valeur retournée est un tableau d'objets : un par message d'en-tête décrit : 


// subject - Le sujet du message 
// from - Expéditeur 
// to - Destinataire 
// date - Date d'expédition 
// message_id - Identification du message 
// references - est une référence sur l'id de ce message 
// in_reply_to - est une réponse à cet identifiant de message 
// size - taille en octets 
// uid - UID du message dans la boîte aux lettres 
// msgno - numéro de séquence du message dans la boîte 
// recent - Ce message est récent 
// flagged - Ce message est marqué 
// answered - Ce message a donné lieu à une réponse 
// deleted - Ce message est marqué pour l'effacement 
// seen - Ce message est déjà lu 
// draft - Ce message est un brouillon 
// Exemple 1. Exemple avec mail_fetch_overview()

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // $overview = mail_fetch_overview($mbox, "2,4:6", 0);

// // if(is_array($overview)){
// //    foreach ($overview as $aval){
// //        echo "$aval->msgno - $aval->date - $aval->subject\n";
// //    }
// // } 
//  

// bool mail_ping ( resource mail_stream )
// array mail_sort ( resource stream, int criteria, int reverse [, int options [, string search_criteria [, string charset]]] )


// mail_sort() retourne un tableau de numéros de messages, triés en fonction des paramètres suivants : 

// reverse vaut 1 pour signifier : tri inverse. 
// Les critères criteria peuvent être un (et un seul) parmi les suivants : 
// SORTDATE - Date du message 
// SORTARRIVAL - Date d'arrivée 
// SORTFROM - Nom de la première boîte aux lettres de l'adresse d'origine (From address) 
// SORTSUBJECT - Sujet du message 
// SORTTO - Nom de la première boîte aux lettres de destination (To address) 
// SORTCC - Nom de la boîte aux lettres de copie cachée (cc address) 
// SORTSIZE - Taille du message en octets 
// Les flags dont des masques de bits, d'un ou plusieurs des éléments suivants : 
// SE_UID - Retourne des UID à la place de numéros 

// SE_NOPREFETCH - Ne pas pré-télécharger les messages trouvés 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>