<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_report_periodic.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























get_report_periodic.php, Ver 3.03 
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
// case "search_@_table_@"://When Working in data send by  form [search_@_table_@.php]
// ----------------

// ----------------
$cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "nessus" . $cmr->get_ext("lang"));
$cmr->config = $mod->load_conf("conf_nessus" . $cmr->get_ext("conf"));
$cmr->help = $cmr->load_help_need( "nessus" . $cmr->get_ext("help"));
// ----------------

// ----------------
$cmr->action["module_name"] = "nessus.php";
$cmr->action["to_load"] = "load_func_need";
include($cmr->get_path("index") . "system/loader/loader_function.php");
$cmr->action["to_load"] = "load_class_need";
include($cmr->get_path("index") . "system/loader/loader_class.php");
// ----------------

// ----------------
// case "report_periodic":
$new_action= get_post("new_action");
$call_log_group= get_post("call_log_group");
$destination = $cmr->get_conf("output_folder") . "/" . $call_log_group . "/nessus/" . date("Y_m_d") . "/";
$va_list_link = "";
// ----------------

// ----------------
switch ($new_action){
 case "download_report":
//     $cmr->action["form_action_run"] = "include_once(\$cmr->config[\"cmr_path\"] . \"function/func_download.php\");";
    $cmr->action["form_action_run"] .= "\$file_path = \$cmr->config[\"output_folder\"] . \"/\" . \$call_log_group . \"/nessus/\";";
    $cmr->action["form_action_run"] .= "show_download(\$cmr->config, \$cmr->db_connection, \$file_path, false);";
 break;
// ----------------

// ----------------
 case "preview_report":
 $file_path = $cmr->get_conf("output_folder") . "/" . $call_log_group . "/nessus/";
 $file_array = array();
        if($dir = opendir($file_path)){
            while ($file = readdir($dir)){
                if(($file != ".") && ($file != "..") && is_dir($file_path . $file)){
	                $file_array[] = $file;
                }
            }
            closedir($dir);
        }
        
        sort($file_array);
        
 $cmr->output[0] = "<table border=\"0\">";
 foreach($file_array as $val) 
 $cmr->output[0] .= "<tr><td><a href=\"home/groups/" . $call_log_group . "/nessus/" . $val . "/index.html\" ><h2>" . $val . "</h2></a></td></tr>";
 $cmr->output[0] .= "</table>";
 $cmr->page["middle1"] = "run_result.php";
//  header("Location: https://sourceforge.net/tstm-new/home/groups/" . $call_log_group . "/nessus/"  . date("Y_m_d") . "/index.html");
 break;
// ----------------

// ----------------
 case "new_report":
// ----------------

// ----------------
 default:
    unset($output_array);
    $template_data1 = file_get_contents($cmr->get_conf("output_template1"));
    $template_data2 = file_get_contents($cmr->get_conf("output_template2"));
    $template_data3 = file_get_contents($cmr->get_conf("output_template3"));
// ----------------

// ----------------
    if(!file_exists($cmr->get_conf("output_folder"))) mkdir($cmr->get_conf("output_folder"));
    
    if(!file_exists($cmr->get_conf("output_folder") . "/" . $call_log_group . "/")) 
    mkdir($cmr->get_conf("output_folder") . "/" . $call_log_group . "/");
    
    if(!file_exists($cmr->get_conf("output_folder") . "/" . $call_log_group . "/nessus/")) 
    mkdir($cmr->get_conf("output_folder") . "/" . $call_log_group . "/nessus/");
    
    if(!file_exists($destination)) mkdir($destination);
// ----------------

    
    exec(escapeshellcmd($cmr->get_conf("command_cp") . " " . $cmr->get_conf("output_image") . " " . $destination), $output_array);
//  cmr_dir_copy($cmr->get_conf("output_image"), $destination);
    
    $output_array[] = "";
    
	$array_list_groups = explode(";", $cmr->get_conf("scanner_list_groups")); 
	foreach($array_list_groups as $the_group){
		$group_name = substr($the_group, 0, strpos($the_group, ":"));
		$list_nbe[$group_name] = substr($the_group, strpos($the_group, ":") + 1);
		}
    $array_nbe  = explode(",", $list_nbe[$call_log_group]);
// ----------------

// ----------------
    foreach($array_nbe as $key => $source){

// ----------------
	$checkbox = get_post("checkbox" . $key);
	$scanner = get_post("scanner" . $key);
	$nbe_file = get_post("source" . $key);
// ----------------

// ----------------
	    
	if($checkbox){
    $pure_name = substr(trim($nbe_file), 0 , strrpos(trim($nbe_file), "."));
    $dest_dir = $destination . $pure_name . "/";
// ----------------

// ----------------
    $command0 = $cmr->get_conf("command_rm") . " " . $dest_dir . "graph/";
    $command1 = $cmr->get_conf("command_rm") . " " . $dest_dir . "ip/index.html";
    
    if((exec(escapeshellcmd($command0), $output_array)))
    $output_array[] = " \n# " . $cmr->translate("Failled!! Run this: "). " \n<b>" . $command0 . ";</b>\n # " . $cmr->translate(" at command line") . "\n" ;

    if((exec(escapeshellcmd($command1), $output_array)))
    $output_array[] = " \n# " . $cmr->translate("Failled!! Run this: "). " \n<b>" . $command1 . ";</b>\n # " . $cmr->translate(" at command line") . "\n" ;
// ----------------

// ----------------
    exec(escapeshellcmd("cp -R " . $cmr->get_conf("output_image") . " " . $dest_dir), $output_array);
//  	cmr_dir_copy($cmr->get_conf("output_image"), $dest_dir);
    if(!file_exists($dest_dir)) mkdir($dest_dir);
    if(!file_exists($dest_dir . "ip/")) mkdir($dest_dir . "ip/");
// ----------------

// ----------------
    $handle = fopen($dest_dir . "index.html", "w");
    ($pure_name=="tutto") ? $template_data3 = str_replace("{va_title}", $call_log_group, $template_data3) : $template_data3 = str_replace("{va_title}", $pure_name, $template_data3);
    fwrite($handle, $template_data3);
    fclose($handle);
// ----------------

// ----------------
    $va_list_link .= "<br /><b><a href=\"" . $pure_name . "/index.html\">" . $pure_name . "</a></b>";

    $nbe_temp = $dest_dir . trim($nbe_file);
// ----------------

// ----------------
	if($scanner=="local"){
	$cmr->post_files["attachment_location"] = $cmr->get_conf("output_folder") . "/" . strtolower($call_log_group) . "/attach/";
	$cmr->post_files = get_post_files($cmr->config, $cmr->post_files);
    $url_source = $cmr->post_files["attachment"];
	}else{
    $url_source = $scanner . "/" . $call_log_group . "/" . $cmr->get_conf("nbe_url_folder") . "/" . trim($nbe_file);
	}
    $contents = file_get_contents($url_source);
    $handle = fopen($nbe_temp, "w");
    fwrite($handle, $contents);
    fclose($handle);
// ----------------

// ----------------
    $command2 = $cmr->get_conf("command_nessus") . " -i " . $nbe_temp . " -T html -o " . $dest_dir . "ip/index.html";// > /dev/null 2>&1";
    $command3 = $cmr->get_conf("command_nessus") . " -i " . $nbe_temp . " -T html_graph -o " . $dest_dir . "graph/";// > /dev/null 2>&1";
    
    
    if((exec(escapeshellcmd($command2), $output_array)))
    $output_array[] = " \n# " . $cmr->translate("Failled!! Run this: "). " \n<b>" . $command2 . ";</b>\n # " . $cmr->translate(" at command line") . "\n" ;
    
    if((exec(escapeshellcmd($command3), $output_array)))
    $output_array[] = " \n# " . $cmr->translate("Failled!! Run this: "). " \n<b>" . $command3 . ";</b>\n # " . $cmr->translate(" at command line") . "\n" ;
// ----------------

// ----------------
	}
	}
	
// ----------------
    $handle = fopen($destination . "index.html", "w");
    $template_data1 = str_replace("{va_title}", $call_log_group, $template_data1);
    if($pure_name=="tutto") $template_data1 = str_replace("index2", $pure_name . "/index", $template_data1);
    fwrite($handle, $template_data1);
    fclose($handle);
// ----------------
	
// ----------------
    if($pure_name=!"tutto"){ 
    $handle = fopen($destination . "index2.html", "w");
    $template_data2 = str_replace("{va_title}", $call_log_group, $template_data2);
    $template_data2 = str_replace("{va_list_link}", $va_list_link, $template_data2);

    fwrite($handle, $template_data2);
    fclose($handle);
	}
// ----------------

// ----------------
    $cmr->action["module_name"] = "zip.php";
    $cmr->action["to_load"] = "load_func_need";
    include($cmr->get_path("index") . "system/loader/loader_function.php");
// ----------------

// ----------------
    $array_files_dirs_to_zip = cmr_getdir_all($cmr->config, array($destination), "");
//     cmr_print_r($array_files_dirs_to_zip);cmr_print_r(dirname($destination));exit;
    $zip_data = cmr_zipfiles($array_files_dirs_to_zip, dirname($destination), "UTF-8");
    $zip_file = $cmr->get_conf("output_folder") . "/" . $call_log_group . "/nessus/" . $call_log_group . date("_Y_m_d") . "_va.zip";
    $fich = fopen($zip_file, "w");
    fputs($fich, $zip_data);
    fclose($fich);
    $cmr->output[0] .= "<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($zip_file) . "</h2> - " . $cmr->translate(" to download the result") . "</p>";
    // ------------
    export($cmr->config, $zip_data, "zip", $zip_file);
// ----------------

// ----------------
    $output_array[] = "";
    $cmr->output[0] = "<i>".$cmr->translate("Report of: " . date("Y_m_d") . " generated for:")."</i><b>".$call_log_group."</b>\n";
    foreach($output_array as $val) $cmr->output[0] .= "\n" . $val;
    foreach($array_files_dirs_to_zip as $val) $cmr->output[0] .= "\n" . $val;

    
// $cmr->email["headers_severity"]=3;
// $cmr->email["headers_to"] = "". $cmr->get_conf("cmr_log_name")." <". $cmr->get_conf("cmr_log_email").">\r\n";
// $cmr->email["headers_from"] = "". $cmr->get_conf("cmr_admin_name")." <".$cmr->config["cmr_from_email"].">\r\n";
// $cmr->email["headers_cc"] = "".$cmr->config["cmr_cc_name"]." <".$cmr->config["cmr_cc_email"].">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_bcc_name"]." <".$cmr->config["cmr_bcc_email"].">\r\n";
// $cmr->email["headers_bcc"] = "".$cmr->config["cmr_from_name"]." <". $cmr->get_conf("cmr_admin_email").">\r\n";
//  $cmr->email["subject"] = $cmr->translate("Report va nessus of: " . date("Y_m_d") . " generated for:") . $call_log_group;
//  $cmr->email["message"] = $cmr->translate("by:") . $cmr->get_user("auth_email") . "\n\n\n";
//  $cmr->email["message"] .= str_replace("<br />", "\n", $cmr->output[0]); 
//  $cmr->email["message"] .= $cmr->translate("thanks") . "  --\n";
//  $cmr->email["message"] .= $cmr->get_user("auth_sign") . "\r\n";

    
    
    $cmr->post_var["output0"] = "<i>".$cmr->translate("Report of: " . date("Y_m_d") . " generated for:")."</i><b>".$call_log_group."</b><br />";
    $cmr->page["middle1"] = $cmr->get_path("index") . "system/run_result.php";
    $cmr->page["middle2"] = $cmr->get_path("module") . "modules/guest/download.php";
 break;
    
}
// ----------------

// ----------------



// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'report_nessus', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//--------next futuro layout ----------
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $cmr->page["middle1"] = $mod->path;
// include_once($cmr->get_path("index") . "system/run_result.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>