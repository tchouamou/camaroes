<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * email.php
 *           --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










email.php,  2011-Oct
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function  who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // ===============
    $use_phpmailer = $cmr->get_conf("cmr_use_phpmailer");
    // ===============
    // ===========
// cmr_mail_SMTP=
// cmr_mail_language=us
// cmr_mail_timeout=30
// cmr_mail_charset=
// cmr_mail_ConfirmReadingTo=
// cmr_mail_ContentType=
// cmr_mail_Encoding=
// cmr_mail_Helo=Helo
// cmr_mail_LE=
// cmr_mail_severity=
// cmr_Sendmail_path=/usr/local/sendmail;
// cmr_mail_wordwrap=1000
        // ------------------------------------------

        // ------------------------------------------
    // $$$$$$$$$$$$$$$$$$$$$$$$$$$
    // $$$$$$$$$$$$$$$$$$$$$$$$$$$
    if(!empty($use_phpmailer)){
        require_once($cmr->get_path("index") . "phpmailer/class.phpmailer.php");
        require_once($cmr->get_path("func") . "function/func_php_mailer.php");

        $mail = new PHPMailer();
        // $mail->PluginDir = "./";
        $mail->Timeout = $cmr->get_conf("cmr_mail_timeout");
        // $mail->Mailer= $cmr->get_conf("cmr_mail_mailer");
        $mail->IsSMTP(); // send via SMTP
        $mail->Host = $cmr->get_conf("cmr_mail_host"); // SMTP servers
        $mail->Port = $cmr->get_conf("cmr_mail_port");
        $mail->CharSet= $cmr->get_conf("cmr_mail_charset");
        // $mail->ConfirmReadingTo= $cmr->get_conf("cmr_mail_confirmreadingto");
        // $mail->ContentType= $cmr->get_conf("cmr_mail_contenttype");
        // $mail->Encoding= $cmr->get_conf("cmr_mail_encoding");
        $mail->SetLanguage($cmr->get_conf("cmr_mail_language"), "phpmailer/language/");
        $mail->Helo = trim($cmr->get_conf("cmr_mail_helo"));
        // $mail->LE= $cmr->get_conf("cmr_mail_le");
        // $mail->severity= $cmr->get_conf("cmr_mail_severity");
        // $mail->Sendmail= $cmr->get_conf("cmr_sendmail_path");
        // $mail->UseMSMailHeaders=1;/--microsoft--
        // $mail->Version;
        $mail->SMTPAuth = trim($cmr->get_conf("cmr_mail_smtpauth")); // turn on SMTP authentication
        $mail->Username = trim($cmr->get_conf("cmr_mail_username")); // SMTP username
        $mail->Password = trim($cmr->get_conf("cmr_mail_password")); // SMTP password
        $mail->Sender = "" . trim($cmr->get_conf("cmr_from_email")) . "";

        $mail->From = "" . trim($cmr->get_conf("cmr_from_email")) . "";
        $mail->FromName = "" . trim($cmr->get_conf("cmr_admin_name")) . "";
        // $mail->AddReplyTo("".$cmr->config["cmr_from_email"] ."", "". $cmr->get_conf("cmr_admin_name") .");
        $mail->WordWrap = trim($cmr->get_conf("cmr_mail_wordwrap")); // set word wrap
        // ------------------------------------------

        // ------------------------------------------
        if($cmr->email["headers_from"]){
            $mail = add_email($mail, $cmr->email["headers_from"], "from");
        }

//         foreach(cmr_split("[,;:]", $cmr->email["recipient"]) as $vals){
//             if(($vals) && (cmr_search("@", $vals))){
//                 $mail = add_email($mail, $vals, "to");
//             }
//         }
        $cmr->email["email_to"] = $cmr->email["headers_to"] . "," . $cmr->email["recipient"];
        
        if(!empty($cmr->email["email_to"])) $tab_email_to = array_unique(cmr_split("[,;:]", $cmr->email["email_to"]));
        if(!empty($cmr->email["headers_cc"])) $tab_headers_cc = array_unique(cmr_split("[,;:]", $cmr->email["headers_cc"]));
        if(!empty($cmr->email["headers_bcc"])) $tab_headers_bcc = array_unique(cmr_split("[,;:]", $cmr->email["headers_bcc"]));
        
        if(!empty($tab_email_to)) 
        if(is_array($tab_email_to))
        foreach($tab_email_to as $vals){
            if(($vals) && (cmr_search("@", $vals))){
                $mail = add_email($mail, $vals, "to");
            }
        }
        
        if(!empty($tab_headers_cc)) 
        if(is_array($tab_headers_cc))
        foreach($tab_headers_cc as $vals){
            if(($vals) && (cmr_search("@", $vals))){
                $mail = add_email($mail, $vals, "cc");
            }
        }
        
        if(!empty($tab_headers_bcc)) 
        if(is_array($tab_headers_bcc))
        foreach($tab_headers_bcc as $vals){
            if(($vals) && (cmr_search("@", $vals))){
                $mail = add_email($mail, $vals, "bcc");
            }
        }
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        if(!empty($cmr->post_files["files_path"])){
            foreach($cmr->post_files["files_path"] as $key_f => $val_f){
                // print("<br />attach:".$cmr->post_files["files_path"][$key_f]);
                // =================
                @ $mail->AddAttachment($cmr->post_files["files_path"][$key_f], $cmr->post_files["files_name"][$key_f], "base64", $cmr->post_files["files_type"][$key_f]);
                // =================
            }
        }
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // $mail->IsHTML(false);                               // send as HTML
        $mail->Subject = $cmr->email["subject"];
        $mail->Body = $cmr->email["message"];
        // $mail->AltBody  =  $cmr->email["message"];
			// $$$$$$$$$$$$$$$$$$$$$$$$$$$
        $is_send = "";
        $loop = 0;
        while ((!$is_send)and($loop < 2)){ // --tried until is_send--
            $is_send = $mail->Send();
            $loop++;
        }

        if($is_send){
            $mssge = "<b> " . $cmr->translate("send_success") . "</b><br /><br />";
        }else{
            $mssge = "<u><b class=\"blink\"> " . $cmr->translate("messg_not_send") . " </b></u><br />";
            $mssge .= "<br /><b>" . $cmr->translate("mailer error") . ": " . $mail->ErrorInfo . ", " . $cmr->translate("tried for ") . $loop . $cmr->translate(" times") . "</b><br /><br />";
            // exit;
        }
        	print($mssge);
			// $$$$$$$$$$$$$$$$$$$$$$$$$$$

        // Clear all addresses and attachments for next loop
        $mail->ClearAddresses();
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();
        $mail->ClearBCCs();
        $mail->ClearCCs();
        $mail->ClearCustomHeaders();
        $mail->ClearReplyTos();
    }else{
        // ------------------------------------------
        // ------------------------------------------
			$cmr->email["boundary"] = "--" . md5(uniqid("cmr_boundary"));
			$cmr->email["ctencoding"] = "8bit";
			$cmr->email["disposition"] = "attachment"; //"inline";
			$cmr->email["headers_content"] = "text/plain";
			$cmr->email["headers_mime"] = "1.0";
			$cmr->email["herders_charset"] = "iso-8859-1";
			$cmr->email["MSMail_severity"] = "Normal";
			$cmr->email["headers_severity"] = "3";
        // ------------------------------------------


        // ------------------------------------------
			$cmr->email["body"] = "";
			if(sizeof($cmr->post_files["content"][0])){ // Attachment version of message
			        $cmr->email["body"] .= "--".$cmr->email["boundary"] ."\r\n";
			        $cmr->email["body"] .= "Content-Type: ".$cmr->email["headers_content"] ."; charset=".$cmr->email["herders_charset"]."\r\n";
			        $cmr->email["body"] .= "Content-Transfer-Encoding: base64\r\n\r\n";
			        $cmr->email["body"] .= chunk_cmr_split(base64_encode("\r\n".$cmr->email["message"] .""));
// 			        $cmr->email["body"] .= $val;
			    foreach($cmr->post_files["content"] as $key => $val){
			        // Attachment
			        $cmr->email["body"] .= "--".$cmr->email["boundary"] ."\r\n";
			        $cmr->email["body"] .= "Content-type: " . $cmr->post_files["files_type"][$key] . " ;\n name=\"" . $cmr->post_files["files_name"][$key] . "\"\n";
			        $cmr->email["body"] .= "Content-Transfer-Encoding: base64\n";
			        $cmr->email["body"] .= "Content-Disposition: ".$cmr->email["disposition"] .";\n  filename=\"" . $cmr->post_files["files_name"][$key] . "\"\n";
// 			        $cmr->email["body"] .= chunk_cmr_split(base64_encode(file_get_contents($val)));
			        $cmr->email["body"] .= $val;
			    };
// 			        $cmr->email["body"] .= "--".$cmr->email["boundary"] ."\r\n";
// 			    	$cmr->email["body"] = "\r\n".$cmr->email["message"];
			}else{
// 			    $cmr->email["headers_all"] = "Content-Type: ".$cmr->email["headers_content"] ."; charset=".$cmr->email["herders_charset"]."\r\n";
// 			    $cmr->email["headers_all"] .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
				$cmr->email["body"] .= "\r\n".$cmr->email["message"];
			} //text version of message
			// ======================================================
			// ======================================================
			// ======================================================
			$cmr->email["recipient"] = $cmr->email["recipient"] . " \r\n";
			$cmr->email["headers_all"] = "From: " . $cmr->email["headers_from"] . " \r\n";
			$cmr->email["headers_all"] .= "To: " . $cmr->email["headers_to"] . " \r\n";
			$cmr->email["headers_all"] .= "Cc: " . $cmr->email["headers_cc"] . " \r\n";
			$cmr->email["headers_all"] .= "Bcc: " . $cmr->email["headers_bcc"] . " \r\n";
			$cmr->email["headers_all"] .= "Mime-Version: " . $cmr->email["headers_mime"] . " \r\n";
			// $cmr->email["headers_all"] .= "Reply-To: ".$cmr->email["email_from"] . " \r\n";
			
			if(@sizeof($cmr->post_files["content"][0])){
			    $cmr->email["headers_all"] .= "Content-Type: multipart/mixed; boundary = ".$cmr->email["boundary"] ."\r\n\r\n";
				$cmr->email["headers_all"] .= "Content-Transfer-Encoding: ".$cmr->email["ctencoding"]."\r\n";
			}else{
// 			    $cmr->email["headers_all"] .= "Content-Type: multipart/mixed; charset=".$cmr->email["herders_charset"]."\r\n";
			    $cmr->email["headers_all"] .= "Content-Type: ".$cmr->email["headers_content"] ."; charset=".$cmr->email["herders_charset"]."\r\n";
			    $cmr->email["headers_all"] .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
			}
			
			$cmr->email["headers_all"] .= "X-severity: ".$cmr->email["headers_severity"]."\r\n";
			// $cmr->email["headers_all"].= "X-Mailer: Php/libMailv1.3\r\n";
			$cmr->email["headers_all"] .= "X-MSMail-severity: ".$cmr->email["MSMail_severity"]."\r\n";
			$cmr->email["headers_all"] .= "Return-Path: " . $cmr->config["cmr_from_email"] . "\r\n";
			// $cmr->email["headers_all"].= "X-Sender: ".$cmr->config["cmr_from_email"] ."\r\n";
			// $cmr->email["headers_all"].= "X-Originating-IP: [62.152.110.67]\r\n";
			// $cmr->email["headers_all"].= "X-Originating-Email: ".$cmr->config["cmr_from_email"] ."\r\n";
        // ------------------------------------------

        // ------------------------------------------
			print($cmr->send_email());
// 			@ mail($cmr->email["recipient"], $cmr->email["subject"], $cmr->email["body"], $cmr->email["headers_all"]);
// 			$mod->send_email($cmr->email, $cmr->post_file);
        // ------------------------------------------


        // ------------------------------------------
    }
?>