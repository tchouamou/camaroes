<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * func_imap.php
 *  ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










func_imap.php,Ver 3.0  2011 05:48:43
*/

/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 *
 * @class_imap Class is the class use to access and modify in the table cmr_imap
 * @code_link() function  who take in input a module name and create and html link to this module
 * @imap_link) function who take in input a module name and create and html link to this module
 * @imap_tab_link() function who take in input a module name and create and html link to this module
 * @imap_link_detail() function who take in input a module name and create and html link to this module
 */


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


/*=================================================================*/
/*=================================================================*/
if(!(function_exists("imap_link"))){
    /**
     * imap_link()
     *
     * @param mixed $aval
     * @param string $extend
     * @param array $header
     * @return
     **/
    function imap_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(),  $aval, $extend = "", $header = array())
    {
        $id_imap = $aval[$cmr_config["column_id_imap"]];
        if($aval["Unseen"]) $imap_link .= "<b>";
        if($id_imap){
            $imap_link = "<input type=\"checkbox\" name=\"imap_check_" . $aval[$cmr_config["column_id_imap"]] . "\" value=\"" . $aval[$cmr_config["column_id_imap"]] . "\" />";
		        $image0 = cmr_get_path("www") . "images/icon/attach_icon.png";
		        $image1 = cmr_get_path("www") . "images/icon/recent_icon.png";
		        $image2 = cmr_get_path("www") . "images/icon/unseen_icon.png";
		        $image3 = cmr_get_path("www") . "images/icon/flagged_icon.png";
		        $image4 = cmr_get_path("www") . "images/icon/answered_icon.png";
		        $image5 = cmr_get_path("www") . "images/icon/deleted_icon.png";
		        $image6 = cmr_get_path("www") . "images/icon/draft_icon.png";
		        
		        
                if($aval["Size"] > 10000) $imap_link .= "<img alt=\">\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . cmr_translate("attach") . "\" />";
                if($aval["Recent"]) $imap_link .= "<img alt=\"R\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("recent") . "\" />";
                if($aval["Unseen"]) $imap_link .= "<img alt=\"U\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unseen") . "\" />";
                if($aval["Flagged"]) $imap_link .= "<img alt=\"F\" src=\"" . $image3 . "\" border=\"0\"  title=\"" . cmr_translate("flagged") . "\" />";
                if($aval["Answered"]) $imap_link .= "<img alt=\"A\" src=\"" . $image4 . "\" border=\"0\"  title=\"" . cmr_translate("answered") . "\" />";
                if($aval["Deleted"]) $imap_link .= "<img alt=\"D\" src=\"" . $image5 . "\" border=\"0\"  title=\"" . cmr_translate("deleted") . "\" />";
                if($aval["Draft"]) $imap_link .= "<img alt=\"X\" src=\"" . $image6 . "\" border=\"0\"  title=\"" . cmr_translate("draft") . "\" />";
            $imap_link .= htmlentities(trim(substr($aval[$cmr_config["column1_imap"]], 0, 200)));
            $imap_link .= ":";
            $imap_link .= htmlentities(trim(substr($aval[$cmr_config["column4_imap"]], 0, 200)));
            
            $imap_link .= "<i><small>";
            $imap_link .= "[" . ($aval[$cmr_config["column_date_time1_imap"]]) . "] ";
            $imap_link .= "(" . htmlentities(trim(substr($aval[$cmr_config["column_text1_imap"]], 0, 200))) . ")";
            $imap_link .= "</small></i>";
            $imap_link .= "<br />";

            $imap_color .= "";
	        if((isset($GLOBALS["current_imap_id"])) && ($id_t == cmr_get_global("current_imap_id"))){
	            $imap_color .= " style=\"color:#EE00EE \" ";
	        }
            
            $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", $aval[$cmr_config["column2_imap"]], "", "", "", $imap_color);
            if($aval["Unseen"]) $imap_link .= "</b>";

            $cmr_session["pre_match"] .= "imap_check_" . $aval[$cmr_config["column_id_imap"]] . "@,@.*@,@10@;@";

            if($extend){
//                 $imap_link .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[U]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[D]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[P]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[A]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[N]</b>") . "]";
            }
        }
        return $imap_link . "<br />";
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("imap_tab_link"))){
    /**
     * imap_tab_link()
     *
     * @param mixed $aval
     * @param string $extend
     * @param array $header
     * @return
     **/
    function imap_tab_link($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $aval, $extend = "", $header = array())
    {
        $imap_link = "";
        $id_imap = $aval[$cmr_config["column_id_imap"]];

        if(!empty($aval)){
            $imap_link = "<td class=\"rown1\" >" . "<input type=\"checkbox\" name=\"imap_check_" . $aval[$cmr_config["column_id_imap"]] . "\" value=\"" . $aval[$cmr_config["column_id_imap"]] . "\" />";
		        $image0 = cmr_get_path("www") . "images/icon/attach_icon.png";
		        $image1 = cmr_get_path("www") . "images/icon/recent_icon.png";
		        $image2 = cmr_get_path("www") . "images/icon/unseen_icon.png";
		        $image3 = cmr_get_path("www") . "images/icon/flagged_icon.png";
		        $image4 = cmr_get_path("www") . "images/icon/answered_icon.png";
		        $image5 = cmr_get_path("www") . "images/icon/deleted_icon.png";
		        $image6 = cmr_get_path("www") . "images/icon/draft_icon.png";
		        
		        
                if($aval["Size"] > 10000) $imap_link .= "<img alt=\">\" src=\"" . $image0 . "\" border=\"0\"  title=\"" . cmr_translate("attach") . "\" />";
                if($aval["Recent"]) $imap_link .= "<img alt=\"R\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("recent") . "\" />";
                if($aval["Unseen"]) $imap_link .= "<img alt=\"U\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("unseen") . "\" />";
                if($aval["Flagged"]) $imap_link .= "<img alt=\"F\" src=\"" . $image3 . "\" border=\"0\"  title=\"" . cmr_translate("flagged") . "\" />";
                if($aval["Answered"]) $imap_link .= "<img alt=\"A\" src=\"" . $image4 . "\" border=\"0\"  title=\"" . cmr_translate("answered") . "\" />";
                if($aval["Deleted"]) $imap_link .= "<img alt=\"D\" src=\"" . $image5 . "\" border=\"0\"  title=\"" . cmr_translate("deleted") . "\" />";
                if($aval["Draft"]) $imap_link .= "<img alt=\"X\" src=\"" . $image6 . "\" border=\"0\"  title=\"" . cmr_translate("draft") . "\" />";
            $imap_link .= "</td>";

            $i_col = 1;
            $aval_const = $cmr_config["column" . $i_col . "_imap"];
            if($aval["Unseen"]) $imap_link .= "<b>";

            while ((isset($cmr_config["column" . $i_col . "_imap"]))){
                $aval_const = $aval[$cmr_config["column" . $i_col . "_imap"]];

                if((!empty($aval_const) || ($aval_const == 0)) && ($aval_const != null)){
                    $imap_link .= "<td class=\"rown" . ($i_col % 2 + 1) . "\">";
                    $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", htmlentities(trim(substr($aval_const, 0, 200))));
                    $imap_link .= "</td>";
                }else{
                    $imap_link .= "<td class=\"rown" . ($i_col % 2 + 1) . "\" ></td>";
                }
                $i_col++;
            }

            $imap_link .= "<td class=\"rown2\" >" . $aval[$cmr_config["column_date_time1_imap"]] . "</td>";
            if($aval["Unseen"]) $imap_link .= "</b>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . "imap_check_" . $aval[$cmr_config["column_id_imap"]] . "@,@.*@,@10@;@");

//             $imap_link .= "<td class=\"rown1\" >";
//             if($extend){
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_imap.php?id_imap=" . $id_imap, "", "<b class=\"link\">[U]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=" . $id_imap, "", "<b class=\"link\">[D]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/preview_imap.php?id_imap=$id_imap", "", "<b class=\"link\">[P]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=$id_imap", "", "<b class=\"link\">[A]</b>");
//                 $imap_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">[N]</b>");
//             }
//             $imap_link .= "</td>";
        }
        return $imap_link;
    }
}
/*=================================================================*/
/*=================================================================*/
if(!(function_exists("imap_link_detail"))){
    /**
     * imap_link_detail()
     *
     * @param mixed $aval
     * @param string $extend
     * @param array $header
     * @return
     **/
    function imap_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $aval, $extend = "", $header = array())
    {
        $imap_link_d = imap_link($cmr_config, $cmr_page, $cmr_language, $aval, $extend, $header);
        $imap_link_d .= "<br />" . htmlentities(trim(wordwrap($aval[$cmr_config["column_text1_imap"]]))) . "<br />";
        $imap_link_d .= " [" . code_link($cmr_config, $cmr_page, $cmr_language, "modules/update_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">" . cmr_translate("update") . "</b>");
        $imap_link_d .= " - ";
        $imap_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/print_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">" . cmr_translate("print") . "</b>");
        $imap_link_d .= " - ";
        $imap_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">" . cmr_translate("delete") . "</b>");
        $imap_link_d .= " - ";
        $imap_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/view_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">" . cmr_translate("view_all") . "</b>");
        $imap_link_d .= " - ";
        $imap_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_imap.php?id_imap=" . $aval[$cmr_config["column_id_imap"]] . "&mailbox=" . $aval["mailbox"], "", "<b class=\"link\">" . cmr_translate("new_imap") . "</b>") . "]";
        return "<p align=\"left\">" . $imap_link_d . "</p>";
    }
}
/*=================================================================*/
/*=================================================================*/
?>