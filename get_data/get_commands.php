<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_commands.php
 *          --------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.








get_commands.php,  2011-Oct
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
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "commands"://----can delete or call another function for work ----
$com_action = get_post('com_action');
$com_text = get_post('com_text');
if(empty($com_text)){
	$com_text = $cmr->action["cron_text"];
	$com_action = $cmr->action["cron_type"];
  };
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $@_table_@_id_=next_max_id($cmr->get_conf("cmr_table_prefix") . "@_table_@", "id");
// $x_comment_id_=next_max_id($cmr->get_conf("cmr_table_prefix") . "x_comment", "id");
// &$cmr->db_connection->Execute("INSERT IGNORE INTO " . $cmr->get_conf("cmr_table_prefix") . "x_comment  (id, name, encoding, language, state, allow_type, allow_email,  allow_groups, date_time) values ('" $x_comment_id  "', '" . @_table_@id@" . $@_table_@_id_ . "', '', 'text', 'enable', '$post->comment', '$post->allow_type',   '$post->allow_email', '$post->allow_groups'");
// $post->id = $@_table_@_id_;
// $post->comment = "extern_@_table_@id@" . $x_comment_id_;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($com_text)){
    // echo "\$com_action=$com_action \$com_text=$com_text";exit;
    switch ($com_action){
        case "google":
            $cmr->page["middle1"] = "http://www.google.it/search?hl=it&q=" . urlencode($com_text);
            break;
        case "yahoo":
            $cmr->page["middle1"] = "http://it.search.yahoo.com/search?p=" . urlencode($com_text);
            break;
        case "url":
            $cmr->page["middle1"] = $com_text;
            break;
        case "ebay":
            $cmr->page["middle1"] = "http://search.ebay.it/search/search.dll?query=" . urlencode($com_text);
            break;
        case "search":
            $cmr->post_var["class_module"] = "search.php";
			// ----------------------------
			// ----------------------------
			$cmr->post_var["search_text"] = $com_text;
			$cmr->post_var["sql_table"] = "all";
			if($cmr->get_user("authorisation") < $cmr->get_conf("cmr_noc_type")) $cmr->post_var["sql_table"] = $cmr->get_conf("cmr_table_prefix") . "ticket," . $cmr->get_conf("cmr_table_prefix") . "message";
			$cmr->post_var["sql_column"] = "all";
			$cmr->post_var["cmr_action"] = "like";
			//----------------------------
			//----------------------------
            include($cmr->get_path("get_data") . "get_data/get_search.php");
			//----------------------------
			//----------------------------
//             $cmr->page["middle2"] = "view_search.php";
            // $cmr->output[0]="ricerca di <b>".$com_text."</b>";
//             include($cmr->get_path("module") . "modules/view_search.php");
//             $cmr->page["middle1"] = "loader_get.php";
            return;
            break;

        case "cmr":
		   $cmr->page["middle1"] = "";
		   $dir_list = array();
		   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $dir_list[] = $cmr->get_path("module") . "modules/database/";
		   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $dir_list[] = $cmr->get_path("module") . "modules/admin/";
		   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $dir_list[] = $cmr->get_path("module") ."modules/";
		   if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $dir_list[] = $cmr->get_path("module") . "modules/auto/";
		   $dir_list[] = $cmr->get_path("module") . "modules/guest/";
            //-- trying to find it  in ../modules
//----- will be usefull when using commands mode -----
//                         $_SESSION["post_class_module"] = "search.php";
//                         $_SESSION["post_search_text"] = "tchouamou";
//                         $_SESSION["post_".$file]=;
//                         $_SESSION["post_".$file]=;
//                         $_SESSION["post_".$file]=;
//                         $_SESSION["get_".$file]=;
//             $cmr->page["middle1"] = "../loader_get.php";
//             $cmr->page["middle2"] = "run_result.php";


            //--------------
		   if(file_exists($com_text)){
             $cmr->page["middle1"] = $com_text;
           }else{
	        foreach($dir_list as $key => $value){
            $dirpath = trim($value);
            $dir = opendir($dirpath );
            while ($file = readdir($dir)){
                if(($file) && ($file != ".") && ($file != "..")  && (!is_dir($dirpath . $file)) && (cmr_searchi($com_text, $file))){
                    if(($cmr->page["middle" . ($key +1)] == "") || (strlen($cmr->page["middle" . ($key +1)]) > max(strlen($file), strpos($file, " ")))){
                        $cmr->page["middle" . ($key +1)] = $dirpath . $file;
                    }
                }
            } 
            }
            };
            //--------------

            if($cmr->page["middle1"] == ""){
                if((cmr_search("\\|\/|:", $com_text)) && ($cmr->user["authorisation"] .= $cmr->get_conf("cmr_admin_type"))){
                    include($com_text);
                }else{
                    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
                    $cmr->output[0] = $com_text;
                }
            }
            //--------------
            break;
        case "jscrip" : $cmr->output[0] = "<script language=\"javascript\">" . $com_text . "</script>";
            break;
        case "php":
            if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
                $cmr->output[0] = eval($com_text);
            }else{
                $cmr->output[0] = $com_text;
            }
            break;
        case "sql":
            if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
                $com_text = cmr_search_replace('[\]*["]+', "\"", $com_text);
                $com_text = cmr_search_replace("[\]*[']+", "'", $com_text);
                $cmr->post_var["sql"] = $com_text;
                $cmr->page["middle1"] = "preview_sql.php";
            }else{
                $cmr->output[0] = $com_text;
            }
            break;
        case "email":
            if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
		        $cmr->email["recipient"] = "";
		//         $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
		        $cmr->email["subject"] = $com_text;
		        $cmr->email["message"] = $com_text . " \n";
		        $cmr->email["message"] .= "--\r\n"; // dlimiteur de signature
		        /* intestazioni addizionali */
		        $cmr->email["headers_severity"] = $post->severity;
		        $cmr->email["headers_to"] = $com_text . "\r\n";
		        $cmr->output[0] = "<b>Email " . $com_text . "  " . $cmr->translate(" Sended with success ")  . " </b><br /><br />".$com_text."<br /><pre>" . wordwrap($com_text, 80) . "</pre> <br />";
            }
            break;
        case "linux":
        case "uxix":
        case "windows":
        case "solaris":
        case "command":
        case "system":
            if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type")){
                // $com_text = array();
                exec($com_text, $com_text);
                $cmr->output[0] = "<pre>".wordwrap(htmlentities(implode("\n", $com_text)), 300)."</pre>";
//                 $cmr->output[0] = implode("\n<br />", $com_text);
                // echo $cmr->output[0];
            }else{
                $cmr->output[0] = $com_text;
            }
            break;

        case "model":
        case "html":
        default : $cmr->output[0] = $com_text;
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', '" . $com_text . "', '" . $cmr->get_session("id") . "', '" . $com_action . "'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
