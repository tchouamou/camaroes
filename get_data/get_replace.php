<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_replace.php
 *        ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */



/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_replace.php, Ver 3.03   
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
    $sensitive = get_post("sensitive", "post", $cmr->get_session("pre_match")); //Getting variable [$my_master] sended by form [replace.php]
    $regular = get_post("regular", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $recursive = get_post("recursive", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    
    $source_action = get_post("source_action", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $destination_action = get_post("destination_action", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    
    $source_type = get_post("source_type", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $destination_type = get_post("destination_type", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    
    
    $local_file_source = get_post("local_file_source", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $remote_file_source = get_post("remote_file_source", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $destination_replace = realpath(get_post("destination_replace", "post", $cmr->get_session("pre_match"))); //Getting variable [$allow_type] sended by form [replace.php]
    
    $with_backup = get_post("with_backup", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $with_estension = get_post("with_estension", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    
    $match_text = get_post("match_text", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
    $replace_text = get_post("replace_text", "post", $cmr->get_session("pre_match")); //Getting variable [$allow_type] sended by form [replace.php]
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cookie_action = (get_post("save_cookies"));
	save_cookie_status($cmr->config, "save_cookies", $cookie_action);
	save_cookie_status($cmr->config, "sensitive", $cookie_action);
	save_cookie_status($cmr->config, "regular", $cookie_action);
	save_cookie_status($cmr->config, "recursive", $cookie_action);
	save_cookie_status($cmr->config, "source_action", $cookie_action);
	save_cookie_status($cmr->config, "destination_action", $cookie_action);
	save_cookie_status($cmr->config, "source_type", $cookie_action);
	save_cookie_status($cmr->config, "destination_type", $cookie_action);
	save_cookie_status($cmr->config, "local_file_source", $cookie_action);
	save_cookie_status($cmr->config, "remote_file_source", $cookie_action);
	save_cookie_status($cmr->config, "destination_replace", $cookie_action);
	save_cookie_status($cmr->config, "with_backup", $cookie_action);
	save_cookie_status($cmr->config, "with_estension", $cookie_action);
	save_cookie_status($cmr->config, "match_text", $cookie_action);
	save_cookie_status($cmr->config, "replace_text", $cookie_action);

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->post_files["attachment_location"] = $cmr->get_path("index") . "home/groups/" . strtolower($cmr->get_user("auth_group")) . "/attach/";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


$cmr->output[0] = "\n " .  $cmr->translate("Begining") . " ..... \n";

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(file_exists($cmr->get_path("func") ."function/func_zip.php")){
include($cmr->get_path("func") ."function/func_zip.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$options = "Um";
if($source_action=="php") $options .= "e";
if($sensitive=="yes") $options .= "i";
if($regular=="yes") $options .= "s";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(cmr_search("\n", $match_text)) $options .= "";
if(cmr_search("\n", $replace_text)) $options .= "";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($replace_text)) $destination_action = "find_only";
if(empty($with_estension)) $with_estension = ".bak";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($destination_replace)) $destination_replace = realpath("./temp/");
if(!is_dir($destination_replace)) mkdir($destination_replace);
// if(!is_writable($destination_replace)) $destination_replace = getenv("TMP") . "/";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$array_source = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($source_type){
    case "local_zip": 
    $cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
    unzip($cmr->post_files["attachment_location"] . $cmr->post_files["attachment"], $destination_replace);
    if($cmr->post_files["attachment"]) $array_source = cmr_getdir_all($cmr->config, $destination_replace);
    break;

    case "local_folder": 
    $cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
    if($cmr->post_files["attachment_location"]) 
    $array_source = cmr_getdir_all($cmr->config, $cmr->post_files["attachment_location"]);
    break;

    case "remote_file": 
    if($remote_file_source) $array_source[] = $remote_file_source;
    if($recursive) $array_source = cmr_getdir_all($cmr->config, realpath($remote_file_source));
    break;

    case "remote_zip": 
    // *************************
    unzip($remote_file_source, $destination_replace);
    if($remote_file_source) 
    $array_source = cmr_getdir_all($cmr->config, $destination_replace);
    // *************************
    break;

    case "remote_folder": 
    if($recursive){
         $array_source = cmr_getdir_all($cmr->config, realpath($remote_file_source));
    }else{
        $dir = @opendir($remote_file_source);
        while ($file = readdir($dir)){
            if((!is_dir($remote_file_source . "/" .$file))){
            $array_source[] = $remote_file_source . "/" .$file;
            }
        }
    }
    break;
    
    case "local_file": 
    
    default:
    $cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
    if($cmr->post_files["attachment"]) $array_source[] = $cmr->post_files["attachment_location"] . "/" . basename($cmr->post_files["attachment"]);
//  cmr_print_r($cmr->post_files);cmr_print_r($_FILES);;cmr_print_r($_POST);exit;
    break;
    
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    
    
    
    
    
    
    
    
    
    
    
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $array_destination = array();
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(count($array_source)){
    foreach($array_source as $value){
	    
    if(is_dir($value)){
	    $cmr->output[0] .= "\n " .  $cmr->translate("No action on folder") . " [" . $value . "] \n";
	}else{
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$contents = file_get_contents($value);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
   if($destination_action=="find_only"){
    // *************************
    preg_match_all("|" . $match_text . "|" . $options . "", $contents, $matches);
    if(empty($matches[0])){
        $cmr->output[0] .= "\n" .  $cmr->translate("Not Find in") . " [" . $value . "]\n";
    }else{
        $cmr->output[0] .= "\n --[" . $matches[0][0] . "]-- " .  $cmr->translate("Finded in") . " [" . $value . "]\n";
        }

    // ------------------------

    // ------------------------
    }else{
    // ------------------------

    // ------------------------
    $new_file = $destination_replace . "/" . basename($value);
    $array_destination[] = $new_file;
    // ------------------------

    // ------------------------
    if($with_backup=="yes"){
        $cmr->output[0] .= "\n " .  $cmr->translate("Creating backup for") . " [" . $new_file . $with_estension . "] \n";
        $fich = fopen($new_file . $with_estension, "w");
        fputs($fich, $contents);
        fclose($fich);
    }
    // ------------------------

    // ------------------------
    $replace_contents = preg_replace("/" . $match_text . "/" . $options, $replace_text, $contents);
    $fich = fopen($new_file, "w");
    fputs($fich, $replace_contents);
    fclose($fich);
    // ------------------------

    // ------------------------
    if($replace_contents==$contents){
        $cmr->output[0] .= "\n " .  $cmr->translate("Zero Replace in") . " [" . $value . "]\n";
    }else{
        $cmr->output[0] .= "\n " .  $cmr->translate("Finded and Replaced in") . " [" . $value . "]\n";
        }
    // ------------------------

    // ------------------------
    }
    
    // ------------------------

    // ------------------------
	}
	
	} //end foreach
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    // -----------------------------------------------------
//  $array_destination = cmr_getdir_all($cmr->config, array($destination_replace . "/"), "");
    // -----------------------------------------------------
    $zip_file = dirname($destination_replace) . "/" . $options . "_" . date("_Y_m_d_h_i_s") . "_replace.zip";
    if((($destination_type=="remote_zip") || ($destination_type=="download")) && (count($array_destination) > 1)){
    // ------------
    $zip_data = cmr_zipfiles($array_destination, dirname($destination_replace), "UTF-8");
    $fich = fopen($zip_file, "w");
    fputs($fich, $zip_data);
    fclose($fich);
    $cmr->output[0] .= "<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($zip_file) . "</h2> - " . $cmr->translate(" to download the result") . "</p>";

// 	export($cmr->config, $zip_data, "zip", $zip_file);
    if($destination_type=="download") 
     $cmr->output[0] .= "\nZip " .  $cmr->translate("file") . " [" . $zip_file . "] " .  $cmr->translate("Created") . " \n";
    // ------------
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    (count($array_destination) > 1) ? $export_file=$zip_file : $export_file=$new_file;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//     if($destination_type=="download") 
//     export($cmr->config, $zip_data, "zip", $export_file, "");
    if($destination_type=="remote_folder") $cmr->output[0] .= implode("\n", $array_destination);
    if($destination_type=="print") $cmr->output[0] .= "\n" . $replace_contents . implode("\n\n\n", $array_destination);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	}else{
     $cmr->output[0] .= "\n " .  $cmr->translate("Zero source file finded") . " \n";
    }
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->output[0] .= "\n ...." . $cmr->translate(" Ending ") . "..... \n";
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//     $cmr->email["recipient"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
//     $cmr->email["subject"] = "" .  $cmr->translate("Replace Run");
//     $cmr->email["message"] =  $cmr->user["auth_email"] . "\n\n\n  ".$cmr->translate(" run the next action") . "  \n\n" . $cmr->output[0] . "\n";
//     $cmr->email["message"] .= "\n " . $cmr->translate("thanks") . "  \n";
//     $cmr->email["message"] .= "--\r\n"; // separator
//     /* intestazioni addizionali */
// //     $cmr->email["headers_severity"] = 3;
// //     $cmr->email["headers_to"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// //     $cmr->email["headers_from"] = "" . $cmr->get_conf("cmr_admin_name") . " <" . $cmr->config["cmr_from_email"] . ">\r\n";
// //     $cmr->email["headers_cc"] = "" ;//. $cmr->config["cmr_cc_name"] . " <" . $cmr->config["cmr_cc_email"] . ">\r\n";
//     // $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"] ." <".$cmr->config["cmr_bcc_email"] .">\r\n";
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->output[0] = nl2br($cmr->output[0]);
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'text', '" . $cmr->get_session("id") . "' ,'replace'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
$cmr->page["middle2"] = $mod->path;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
