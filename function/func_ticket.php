<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");

/**
 * func_ticket.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_ticket.php,Ver 3.0  2011-Sep-Sun 15:51:09
*/

// function cmr_ticket_number($cmr_config = array(), $conn = null)
// function ticket_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
// function ticket_tab_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
// function ticket_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $val) // print_r($val);



if(!(function_exists("ticket_link"))){
    // ==========
    // ==========
    $GLOBALS["ticket_read"] = $cmr->readed_line("ticket");
    // ==========
    // ==========
    /**
     * ticket_link()
     *
     * @param mixed $val
     * @return
     **/
    function ticket_link_default($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $val) // print_r($val);
    {
        $id_ticket = $val[$cmr_config["column_id_ticket"]];
        $image1 = cmr_get_path("www") . "images/icon/readed_icon.png";
        $image2 = cmr_get_path("www") . "images/icon/to_read_icon.png";
        empty($val["the_date"]) ? $times = unix_timestamp(strval($val["date_time"])) : $times = $val["the_date"];
//         $times=conv_timestamp(strval($val["date_time"]));
//         $times = $val["the_date"];
        // $email_u=$cmr_user["auth_email"];
//         $id_t = $id_ticket;
        //
        // $sql_id="SELECT COUNT * from ".$cmr_config["cmr_table_prefix"] ."ticket_read where ((user_email='$email_u') and (ticket_id='" . $id_ticket . "'));";
        //
        $ticket_link = "";
        //
        // if($nums[0])

        // $nums=$cmr_config->FetchRow(, $cmr_language,&$conn->Execute($sql_id, $conn));
        //
        $ticket_link .= input_hidden("<input type=\"checkbox\" name=\"ticket_check_" . $cmr_page["__number__"] . "\" value=\"" . $id_ticket . "\" />");


        if(in_array ($id_ticket, $GLOBALS["ticket_read"])){
           if($image1) $ticket_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
           $ticket_style = "readed";
        }else{
           $ticket_style = "unreaded";
            if($image2) $ticket_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
        };
        //
        if(($val["attach"])){
            $ticket_link .= list_attach_link(str_replace(", ", ":", $val["attach"]), "<img alt=\"&\" src=\"" . cmr_get_path("www") . "images/icon/attachment_icon.png\" border=\"0\"  title=\"" . cmr_translate("Attachment")  . "\" />", ":");
        }

        switch(($val["severity"])){
           case "low":
           $ticket_link .= "<img alt=\"?\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_yellow.png\" border=\"0\"  title=\"" . cmr_translate("low")  . "\" />";
           $ticket_style = "severity_low";
           break;
           case "info":
           $ticket_link .= "<img alt=\"@\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_blue.png\" border=\"0\"  title=\"" . cmr_translate("info")  . "\" />";
           $ticket_style = "severity_info";
           break;
           case "normal":
           $ticket_link .= "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $ticket_style = "severity_normal";
           break;
           case "medium":
           $ticket_link .= "<img alt=\"!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_gray.png\" border=\"0\"  title=\"" . cmr_translate("medium")  . "\" />";
           $ticket_style = "severity_medium";
           break;
           case "high":
           case "high":
           $ticket_link .= "<img alt=\"!!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_red.png\" border=\"0\"  title=\"" . cmr_translate("high")  . "\" />";
           $ticket_style = "severity_high";
           break;
           default:
           $ticket_link .= "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           break;
        }

        if(!in_array ($id_ticket, $GLOBALS["ticket_read"]) || $val["state"]=="close") $ticket_style = "unreaded";

        if((isset($GLOBALS["current_ticket_id"])) && ($id_ticket == cmr_get_global("current_ticket_id"))){
           $ticket_style = "current";
        }


        $ticket_link .= "<a class=\"" . $ticket_style . "\" title=\"" . $val["title"] . "\"  href=\"" . code_href($cmr_config, $cmr_language, "modules/preview_ticket.php", "id_ticket=" . $id_ticket . "&page_title=Ticket[" . $val["number"] . "]:" . $val["title"]) . "\"";
        $ticket_link .= " >";

        $ticket_link .= $val["number"];
        $ticket_link .= "<br /> " . wordwrap($val["title"],40,"\n",1) . "</a><br />";
        $ticket_link .= "" . cmr_translate("of") . ": [" . group_info_link($cmr_config, $cmr_page, $cmr_language, $val["call_log_group"]) . "] " . cmr_translate("Assign a ") . ": (" . list_user_groups_link($cmr_config, $cmr_page, $cmr_language, $val["assign_to"]) . ")";
        $ticket_link .= "<br /><i>" . date_link($cmr_config, $cmr_page, $cmr_language, $times) . " " . cmr_translate("Priority") . ":(" . $val["severity"] . ") " . cmr_translate("State") . ":(" . $val["state_now"] . ")</i>";

        return $ticket_link . "<br />";
    } //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("ticket_tab_link"))){
    /**
     * ticket_tab_link()
     *
     * @param mixed $val
     * @return
     **/
    function ticket_link_tab($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $id_ticket = $val[$cmr_config["column_id_ticket"]];
        $image1 = cmr_get_path("www") . "images/icon/readed_icon.png";
        $image2 = cmr_get_path("www") . "images/icon/to_read_icon.png";
	    $ticket_link = "<tr><td class=\"rown3\">" . $cmr_page["__number__"] . "</td>";
        if(!empty($id_ticket)){
            $ticket_link .= "<td class=\"rown1\" >" . input_hidden("<input type=\"checkbox\" name=\"ticket_check_" . $cmr_page["__number__"] . "\" value=\"" . $id_ticket . "\" />");

        if(in_array ($id_ticket, $GLOBALS["ticket_read"])){
           if($image1) $ticket_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
           $ticket_style = "readed";
        }else{
           $ticket_style = "unreaded";
            if($image2) $ticket_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
        };

        if(($val["attach"])){
            $ticket_link .= list_attach_link(str_replace(", ", ":", $val["attach"]), "<img alt=\"&\" src=\"" . cmr_get_path("www") . "images/icon/attachment_icon.png\" border=\"0\"  title=\"" . cmr_translate("Attachment")  . "\" />", ":");
        }

        switch(($val["severity"])){
           case "low":
           $ticket_link .= "<img alt=\"?\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_yellow.png\" border=\"0\"  title=\"" . cmr_translate("low")  . "\" />";
           $ticket_style = "severity_low";
           break;
           case "info":
           $ticket_link .= "<img alt=\"@\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_blue.png\" border=\"0\"  title=\"" . cmr_translate("info")  . "\" />";
           $ticket_style = "severity_info";
           break;
           case "normal":
           $ticket_link .= "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $ticket_style = "severity_normal";
           break;
           case "medium":
           $ticket_link .= "<img alt=\"!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_gray.png\" border=\"0\"  title=\"" . cmr_translate("medium")  . "\" />";
           $ticket_style = "severity_medium";
           break;
           case "high":
           case "high":
           $ticket_link .= "<img alt=\"!!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_red.png\" border=\"0\"  title=\"" . cmr_translate("high")  . "\" />";
           $ticket_style = "severity_high";
           break;
           default:
           $ticket_link .= "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           break;
        }

        if(!in_array ($id_ticket, $GLOBALS["ticket_read"]) || $val["state"]=="close") $ticket_style = "unreaded";

        if((isset($GLOBALS["current_ticket_id"])) && ($id_ticket == cmr_get_global("current_ticket_id"))){
           $ticket_style = "current";
        }
           $ticket_link .= "</td>";



            $i_col = 1;
            while ((isset($cmr_config["column" . $i_col . "_ticket"])) && ($i_col <= $cmr_page["__columns__"])){
                $val_const = $val[$cmr_config["column" . $i_col . "_ticket"]];


                if((!empty($val_const) || ($val_const == 0)) && ($val_const != null)){
                    $ticket_link .= "<td class=\"" . $ticket_style . "\">";
                    $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_ticket.php?id_ticket=$id_ticket", "", trim(wordwrap($val_const, 20, "\n",1)), "", "", "middle1",  " class=\"" . $ticket_style . "\" ");
//                     $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, $modulename, $image = "", $text = "", $img_heigth = "20", $img_right = "90", $link_layer = "middle1", $other_a_link = "", $other_img = "")
                    $ticket_link .= "</td>";
                }else{
                    $ticket_link .= "<td  class=\"" . $ticket_style . "\"></td>";
                }

                $i_col++;
            }

        	empty($val["the_date"]) ? $times = unix_timestamp(strval($val["date_time"])) : $times = $val["the_date"];
            $ticket_link .= "<td  class=\"" . $ticket_style . "\">" . conv_timestamp($times) . "</td>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . "ticket_check_" . $id_ticket . "@,@.*@,@10@;@");

                $ticket_link .= "<td class=\"rown1\" >" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_ticket.php?id_ticket=" . $id_ticket, "", " [U] ", "", "", "", " class=\"link\" ");
                $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_ticket=" . $id_ticket, "", " [C] ", "", "", "", " class=\"link\" ");
                $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_ticket=" . $id_ticket, "", " [P] ", "", "", "", " class=\"link\" ") . "</td>";
//                 $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_ticket.php?id_ticket=" . $id_ticket, "", " [D] ", "", "", "", " class=\"link\" ");
//                 $ticket_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_all_ticket.php?id_ticket=" . $id_ticket, "", " [A] ", "", "", "", " class=\"link\" ");
        }
        return $ticket_link . "</tr>";
    } //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("ticket_link_detail"))){
    /**
     * ticket_link_detail()
     *
     * @param mixed $val
     * @return
     **/
    function ticket_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $id_ticket = $val[$cmr_config["column_id_ticket"]];
        $ticket_link_d = "<fieldset class=\"bubble\"><legend>" . $val["number"] . "</legend>";

        if(($cmr_config["column_image1_ticket"]) && ($val[$cmr_config["column_image1_ticket"]]))
        $ticket_link_d .= "<img alt=\"" . translate($cmr_config["column_image1_ticket"]) . "\" src=\"" . $val[$cmr_config["column_image1_ticket"]] . "\" class=\"cmr_image\" />";


        $ticket_link_d .= "<ul>";
		$ticket_link_d .= "<li>" . ticket_link_default($cmr_config, $cmr_page, $cmr_language, $val) . "</li>";
        $ticket_link_d .= "<li class=\"normal_text\">" . htmlentities(wordwrap(substr($val["text"], 0, 1000), 80, "\n",1)) . "</li>";
        $ticket_link_d .= "<li>[" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_ticket.php?id_ticket=" . $id_ticket, "", "<b class=\"link\">" . $cmr_language['update'] . "</b>");
        $ticket_link_d .= " - ";
        $ticket_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/assign_ticket.php?id_ticket=" . $id_ticket, "", "<b class=\"link\">" . $cmr_language['assign'] . "</b>");
        $ticket_link_d .= " - ";
        $ticket_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_ticket=" . $id_ticket, "", "<b class=\"link\">" . $cmr_language['comment'] . "</b>");
        $ticket_link_d .= " - ";
        $ticket_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_ticket=" . $id_ticket, "", "<b class=\"link\">" . $cmr_language['policy'] . "</b>");
        $ticket_link_d .= "]</li></ul>";
        $ticket_link_d .= "</fieldset>";
        return  "" . $ticket_link_d . "";
    } //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("cmr_ticket_number"))){
    /**
     * cmr_ticket_number()
     *
     * @param mixed $val
     * @return
     **/
    function cmr_ticket_number($cmr_config = array(), $conn = null)
    {
    // ----calcolo del numero ticket--------
    $temp_number = 0;
    $sql_number = "SELECT MAX(CONVERT(number, UNSIGNED INTEGER)) FROM " . $cmr_config["cmr_table_prefix"] . "ticket;";
    //$conn->SetFetchMode(ADODB_FETCH_NUM);
    if($conn)
    $result_number = $conn->query($sql_number) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);
    if($result_number) $temp_number = $result_number->fetch_row();

    if((substr($temp_number[0], 0, 4)) == date("ym")){
        $temp_n = "00" . ($temp_number[0] + 1);
        $l = strlen($temp_n);
        $temp_num = substr($temp_n, $l-3, 4);
        $temp_numero = date("ym") . $temp_num;
    }else{
        $temp_numero = date("ym") . "001";
    };
        return $temp_numero;
    }
    //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
}



?>
