<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        func_php_mailer.php
 *       ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/


/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_php_mailer.php,Ver 3.0  2011-Nov-Wed 22:19:05  
*/





// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if(!(function_exists("add_email"))){
    /**
     * add_email()
     *
     * @param mixed $mail
     * @param string $value
     * @param string $type
     * @return
     **/
    function add_email($mail, $value = "cmr_Helpdesk_email", $type = "to")
    {
        $value = cmr_search_replace("\\r$", "", $value);
        $value = cmr_search_replace("\\n$", "", $value);
        $value = cmr_search_replace("[<>]", "", $value);

        $address_array = cmr_split(" ", $value);

        $name = "";
        foreach($address_array as $val){
            if(cmr_search("@", $val)){
                $address = trim($val);
            }else{
                $name .= " " . trim($val);
                $address = "";
            }
        }
        $name = trim($name);
        // print("adress=$address, name=$name, type=$type;<br />");
        if(!empty($address))
        if($name){
            switch ($type){
                case "to" : $mail->AddAddress($address, $name);
                    break;
                case "cc" : $mail->AddCc($address, $name);
                    break;
                case "bcc" : $mail->AddBcc($address, $name);
                    break;
                case "from" : $mail->From = $address;
                    $mail->FromName = $name; ;
                    break;
                default : $mail->AddAddress($address, $name);
                    break;
            }
        }else{
            // optional name
            switch ($type){
                case "to" : $mail->AddAddress($address);
                    break;
                case "cc" : $mail->Addcc($address);
                    break;
                case "bcc" : $mail->Addbcc($address);
                    break;
                case "from" : $mail->From = $address;
                    break;
                default : $mail->AddAddress($address);
                    break;
            }
        }
        return $mail;
    }
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>
