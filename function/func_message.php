<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        func_message.php
 *       ---------
 * begin    : July 2004 - Marzo 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 *********************************************************************/


/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








func_message.php,Ver 3.0  2011-Nov-Wed 22:18:53
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



// function module_message($cmr_config = array(), $conn, $module = "", $user = "", $group = "")
// function user_message($cmr_config = array(), $conn, $user = "", $group = "")
// function show_message($cmr_config = array(), $conn, $module = "", $user = "", $group = "")
// function exist_message($cmr_config = array(), $module = "", $user = "", $group = "")
// function update_messages($cmr_config = array(), $conn)
// function message_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
// function message_tab_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
// function message_link($cmr_config = array(), $cmr_page = array(), $cmr_language=array())

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("message_link"))){
    // ==========
    // ==========
//  $GLOBALS["message_read"] = $cmr->readed_line("message");
    // ==========
    // ==========
     /**
      * message_link()
      *
      * @param mixed $val
      * @return
      **/
     function message_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
       $id_message = $val[$cmr_config["column_id_message"]];
	     $message_link="";
	     $message_style="";
      if($id_message){
        $message_link=input_hidden("<input type=\"checkbox\" name=\"message_check_" . $id_message."\" value=\"" . $id_message."\" />");

        $image1 = cmr_get_path("www") . "images/icon/readed_icon.png";
        $image2 = cmr_get_path("www") . "images/icon/to_read_icon.png";
        if(in_array ($id_message, $GLOBALS["message_read"])){
            $message_link .=  "<img  alt=\"<\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
            $message_style .=  " class=\"readed\" ";
        }else{
            $message_link .=  "<img alt=\">\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
            $message_style .= " class=\"unreaded\" ";
        };


        switch(($val["priority"])){
           case "0":
           case "1":
           $message_link .=  "<img alt=\"?\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_yellow.png\" border=\"0\"  title=\"" . cmr_translate("low")  . "\" />";
           $message_style .= " class=\"severity_low\" ";
           break;
           case "2":
           case "3":
           $message_link .=  "<img alt=\"@\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_blue.png\" border=\"0\"  title=\"" . cmr_translate("info")  . "\" />";
           $message_style .= " class=\"severity_info\" ";
           break;
           case "4":
           case "5":
           $message_link .=  "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $message_style .= " class=\"severity_normal\" ";
           break;
           case "6":
           case "7":
           $message_link .=  "<img alt=\"!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_gray.png\" border=\"0\"  title=\"" . cmr_translate("medium")  . "\" />";
           $message_style .= " class=\"severity_medium\" ";
           break;
           case "8":
           case "9":
           $message_link .=  "<img alt=\"!!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_red.png\" border=\"0\"  title=\"" . cmr_translate("high")  . "\" />";
           $message_style .= " class=\"severity_high\" ";
           break;
           default:
           $message_link .=  "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $message_style .= " class=\"severity_medium\" ";
           break;
        }


        if((isset($GLOBALS["current_message_id"])) && ($id_message == cmr_get_global("current_message_id"))){
            $message_style .=  " class=\"current\" ";
        }











        $message_link .= "<b>";

        $message_link .= trim(substr($val[$cmr_config["column2_message"]],0,20));
        $message_link .= " => ";
        $message_link .= trim(substr($val[$cmr_config["column4_message"]],0,20));
        $message_link .= "</b>";
        $message_link .= "<i>";

        $message_link .= "[" . date_link($cmr_config, $cmr_page, $cmr_language, $val[$cmr_config["column_date_time1_message"]]) . "] ";
        $message_link .= "(".trim(substr($val[$cmr_config["column_text1_message"]],0,20)).")";
        $message_link .= "</i>";
        $message_link .= "<br />";

        $message_link .=  code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_message.php?id_message=" . $id_message, "", $val[$cmr_config["column1_message"]], "", "", "", $message_style);
        $message_link .=  "</b>";

        cmr_set_session("pre_match",  cmr_get_session("pre_match") . "message_check_" . $id_message . "@,@.*@,@10@;@");


        }
        return $message_link . "<br />";
    }
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@



//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("message_tab_link"))){
     /**
      * message_tab_link()
      *
      * @param mixed $val
      * @return
      **/
     function message_link_tab($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
 {
    $id_message = $val[$cmr_config["column_id_message"]];
    $message_link = "<tr><td class=\"rown3\">" . $cmr_page["__number__"] . "</td>";
    $message_style = "";

    if($id_message){
    	$message_link .= "<td class=\"rown1\" >";

        $image1 = cmr_get_path("www") . "images/icon/readed_icon.png";
        $image2 = cmr_get_path("www") . "images/icon/to_read_icon.png";
        if(in_array ($id_message, $GLOBALS["message_read"])){
            $message_link .=  "<img  alt=\"<\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
            $message_style .=  " class=\"readed\" ";
        }else{
            $message_link .=  "<img alt=\">\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
            $message_style .= " class=\"unreaded\" ";
        };


        switch(($val["priority"])){
           case "0":
           case "1":
           $message_link .=  "<img alt=\"?\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_yellow.png\" border=\"0\"  title=\"" . cmr_translate("low")  . "\" />";
           $message_style .= " class=\"severity_low\" ";
           break;
           case "2":
           case "3":
           $message_link .=  "<img alt=\"@\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_blue.png\" border=\"0\"  title=\"" . cmr_translate("info")  . "\" />";
           $message_style .= " class=\"severity_info\" ";
           break;
           case "4":
           case "5":
           $message_link .=  "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $message_style .= " class=\"severity_normal\" ";
           break;
           case "6":
           case "7":
           $message_link .=  "<img alt=\"!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_gray.png\" border=\"0\"  title=\"" . cmr_translate("medium")  . "\" />";
           $message_style .= " class=\"severity_medium\" ";
           break;
           case "8":
           case "9":
           $message_link .=  "<img alt=\"!!\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_red.png\" border=\"0\"  title=\"" . cmr_translate("high")  . "\" />";
           $message_style .= " class=\"severity_high\" ";
           break;
           default:
           $message_link .=  "<img alt=\"*\" src=\"" . cmr_get_path("www") . "images/icon/record_icon_green.png\" border=\"0\"  title=\"" . cmr_translate("normal")  . "\" />";
           $message_style .= " class=\"severity_medium\" ";
           break;
        }


        if((isset($GLOBALS["current_message_id"])) && ($id_message == cmr_get_global("current_message_id"))){
            $message_style .=  " class=\"current\" ";
        }


		$message_link .= input_hidden("<input type=\"checkbox\" name=\"message_check_" . $id_message."\" value=\"" . $id_message."\" />")."</td>";

        if(!in_array ($id_message, $GLOBALS["message_read"])) $message_style = "unreaded";

        if((isset($GLOBALS["current_message_id"])) && ($id_message == cmr_get_global("current_message_id"))){
           $message_style = "current";
        }
           $message_link .= "</td>";



            $i_col = 1;
            while ((isset($cmr_config["column" . $i_col . "_message"])) && ($i_col <= $cmr_page["__columns__"])){
                $val_const = $val[$cmr_config["column" . $i_col . "_message"]];


                if((!empty($val_const) || ($val_const == 0)) && ($val_const != null)){
                    $message_link .= "<td class=\"" . $message_style . "\">";
                    $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_message.php?id_message=$id_message", "", trim(wordwrap($val_const, 20, "\n",1)), "", "", "middle1",  " class=\"" . $message_style . "\" ");
//                     $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, $modulename, $image = "", $text = "", $img_heigth = "20", $img_right = "90", $link_layer = "middle1", $other_a_link = "", $other_img = "")
                    $message_link .= "</td>";
                }else{
                    $message_link .= "<td  class=\"" . $message_style . "\"></td>";
                }

                $i_col++;
            }

//         	empty($val["the_date"]) ? $times = unix_timestamp(strval($val["date_time"])) : $times = $val["the_date"];
//             $message_link .= "<td  class=\"" . $message_style . "\">" . conv_timestamp($times) . "</td>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . "message_check_" . $id_message . "@,@.*@,@10@;@");

        $message_link .= "<td class=\"rown1\" >";

        $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/reply_message.php?id_message=" . $id_message, "", " [U] ", "", "", "", " class=\"link\" ");
        $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_message=" . $id_message, "", " [C] ", "", "", "", " class=\"link\" ");
        $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_message=" . $id_message, "", " [P] ", "", "", "", " class=\"link\" ");
//         $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_all_message.php?id_message=" . $id_message, "", " [A] ", "", "", "", " class=\"link\" ");
//         $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_message.php?id_message=" . $id_message, "", " [N] ", "", "", "", " class=\"link\" ");

        $message_link .= "</td>";

        }
        return $message_link . "</tr>";
    }
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(function_exists("message_link_detail"))){
     /**
      * message_link_detail()
      *
      * @param mixed $val
      * @return
      **/
     function message_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $id_message = $val[$cmr_config["column_id_message"]];
        $message_link = "<fieldset class=\"bubble\"><legend>" . $val["title"] . "</legend>";

        if(($cmr_config["column_image1_message"]) && ($val[$cmr_config["column_image1_message"]]))
        $message_link .= "<img alt=\"" . translate($cmr_config["column_image1_message"]) . "\" src=\"" . $val[$cmr_config["column_image1_message"]] . "\" class=\"cmr_image\" />";

        $message_link .= "<ul>";
	    $message_link .= "<li>" . message_link($cmr_config, $cmr_page, $cmr_language, $val) . "</li>";
        $message_link .= "<li class=\"normal_text\">" . htmlentities(substr($val[$cmr_config["column_text1_message"]],0,400)) . "</li>";
        $message_link .= "<li>[" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/reply_message.php?id_message=" . $id_message, "", "<b class=\"link\">" . $cmr_language['update']."</b>");
        $message_link .= " - ";
        $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_message=" . $id_message, "", "<b class=\"link\">" . $cmr_language['comment']."</b>");
        $message_link .= " - ";
        $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?id_message=" . $id_message, "", "<b class=\"link\">" . $cmr_language['policy']."</b>");
//         $message_link .= " - ";
//         $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?id_message=" . $id_message, "", "<b class=\"link\">" . $cmr_language['new']."</b>");
//         $message_link .= " - ";
//         $message_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_all_message.php?id_message=" . $id_message, "", "<b class=\"link\">" . $cmr_language['view']."</b>");
        $message_link .= "]</li></ul>";
        $message_link .= "</fieldset>";
//         if(exist_attach()) print(image_link());

        return "" . $message_link . "";
    }
}

//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@




/**
 * update_messages()
 *
 * @param mixed $conn
 * @return
 **/
if(!(function_exists("update_messages"))){
function update_messages($cmr_config = array(), $conn)
{
	$num_result1 = 0;
    $result_upd1 = "";
	if(empty($_SESSION['last_cron'])) $_SESSION['last_cron'] = time();
	$cron_interval = time() - $_SESSION['last_cron'];
	if($cron_interval > 180) return $num_result1;
	$_SESSION['last_cron'] = time();


    $sql_upd1 = " SELECT id, intervale FROM " . $cmr_config["cmr_table_prefix"] . "message ";
    $sql_upd1 .=  " WHERE (intervale != '0') AND (intervale != '') AND (end_time + 0 < CURRENT_TIMESTAMP + 0) ";
    $sql_upd1 .=  " AND (begin_time + 0 > CURRENT_TIMESTAMP + 0);";

     if($conn) $result_upd1 = $conn->query($sql_upd1) /*, $conn) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);
//     $num_result1 = @ $result_upd->RecordCount(1);

    if($num_result1){
        while ($val1 = $result_upd1->fetch_object()){

            $sql_upd2 = " UPDATE " . $cmr_config["cmr_table_prefix"] . "message set ";
            $sql_upd2 .=  " begin_time = DATE_ADD(begin_time, INTERVAL " . $val1->intervale . "), ";
            $sql_upd2 .=  " end_time = DATE_ADD(end_time, INTERVAL " . $val1->intervale . ")";
            $sql_upd2 .=  " WHERE id='" . $val1->id . "';";

            $sql_upd3 = " DELETE FROM " . $cmr_config["cmr_table_prefix"] . "history ";
            $sql_upd3 .=  " WHERE table_name='" . $cmr_config["cmr_table_prefix"] . "message' ";
            $sql_upd3 .=  " AND line_id='" . $val1->id . "';";

            if($conn) $result_upd2 = $conn->query($sql_upd2) /*, $conn) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);
            if($conn) $result_upd3 = $conn->query($sql_upd3) /*, $conn) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);

        }
    }
    // print($sql_upd1);
    // print("<br />");
    // print("$num_result1 ");
    // print("<br />");
    // print($sql_upd2);
    return $num_result1;
}
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * exist_message($cmr_config, $cmr_config, $cmr_language,)
 *
 * @param string $module
 * @param string $user
 * @param string $group
 * @return
 **/
if(!(function_exists("exist_message"))){
function exist_message($cmr_config = array(), $module = "", $user = "", $group = "")
{
    if((!(isset($cmr_config["cmr_show_message"]))) || (!($cmr_config["cmr_show_message"]))){
        return 0;
    }

    return 1;
}
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * show_message($cmr_config, $cmr_language, $cmr_config, $cmr_language)
 *
 * @param mixed $conn
 * @param string $module
 * @param string $user
 * @param string $group
 * @return
 **/
if(!(function_exists("show_message"))){
function show_message($cmr_config = array(), $conn, $module = "", $user = "", $group = "")
{
    $str_return = "";
    if(empty($user)) $user = cmr_get_user("auth_email");
    if(empty($group)) $user = cmr_get_user("auth_group");
    if(empty($cmr_config["cmr_with_login"]) || ($conn == null)){
        return $str_return;
    }

    $sql = "SELECT * FROM " . $cmr_config["cmr_table_prefix"] . "message ";
    $sql .=  " WHERE ";
    $sql .=  "(((begin_time + 0 <= CURRENT_TIMESTAMP + 0) AND (end_time + 0 >= CURRENT_TIMESTAMP + 0)) OR (end_time + 0 <= begin_time + 0)) ";


    $sql .=  " AND (state <> 'disactivated') ";

    $sql .=  " AND (";
    $sql .=  " (users_dest='' AND groups_dest='' AND modules_dest like ('%" . $module . "%'))";
    $sql .=  " OR ";
    $sql .=  " ( users_dest LIKE ('%" . $user . "%') AND groups_dest='' AND modules_dest LIKE ('%" . $module . "%'))";
    $sql .=  " OR ";
    $sql .=  " ( users_dest='' AND groups_dest LIKE ('%" . $group . "%')  AND modules_dest LIKE ('%" . $module . "%'))";
    $sql .=  " OR ";
    $sql .=  " (users_dest LIKE ('%" . $user . "%')) ";
    $sql .=  " OR ";
    $sql .=  " (groups_dest LIKE ('%" . $group . "%')) ";
    $sql .=  " ) ";

    $sql .=  " ORDER BY begin_time;";

    if($conn) $result = $conn->query($sql) /*, $conn) */ or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->error);
    if($result)
    while ($val = $result->fetch_object()){
        if(($val->type) == "php"){
            $str_return .=  $cmr_config["cmr_mod_mess_separ"] . eval($val->text);
        }else{
            $str_return .=  $cmr_config["cmr_mod_mess_separ"] . $val->text;
        };
    }

    return $str_return;
}
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * user_message($cmr_config, $cmr_language, $cmr_config, $cmr_language)
 *
 * @param mixed $conn
 * @param string $user
 * @param string $group
 * @return
 **/
if(!(function_exists("user_message"))){
function user_message($cmr_config = array(), $conn, $user = "", $group = "")
{
    if(empty($user)) $user = cmr_get_user("auth_email");
    if(empty($group)) $user = cmr_get_user("auth_group");
    $str_return = show_message($cmr_config, $conn, "", $user, $group);
    return $str_return;
}
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
/**
 * module_message($cmr_config, $cmr_language, $cmr_config, $cmr_language)
 *
 * @param mixed $conn
 * @param string $module
 * @param string $user
 * @param string $group
 * @return
 **/
if(!(function_exists("module_message"))){
function module_message($cmr_config = array(), $conn, $module = "", $user = "", $group = "")
{


	$str_return = "";
    if(empty($user)) $user = cmr_get_user("auth_email");
    if(empty($group)) $user = cmr_get_user("auth_group");
    if(empty($module))return $str_return;
    $str_return .= show_message($cmr_config, $conn, $module, $user, $group);

    return $str_return;
}
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

?>
