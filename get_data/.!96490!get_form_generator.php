<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * get_form_generator.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

 
 


 

get_form_generator.php,Ver 3.0  2011-Sep 22:32:32
*/

/**
 * Information about
 * $cmr->query[0] Is used for keeping
 * the query string you will be run in the module run_result.php
 * 
 * $output_type Is used for keeping
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
// case "form_generator":
// 


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->config = $mod->load_conf("conf.d/conf_form_generator" . $cmr->get_ext("conf"));
    $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "generator" . $cmr->get_ext("lang"));
    $cmr->help=$cmr->load_help_need("form_generator" . $cmr->get_ext("help"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    include_once($cmr->get_path("func") . "function/func_zip.php");
    include_once($cmr->get_path("func") . "function/func_generators.php");
    include_once($cmr->get_path("class") . "class/class_generators.php");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $db_source = get_post("db_source");
    $model_source = get_post("model_source");
    $model_group = get_post("model_group");
    $output_type = get_post("output_type");
    $destination = realpath(get_post("destination"));
    
    $check_backup = get_post("check_backup");
    $backup_extention = get_post("backup_extention");

    $cmr_select_theme = get_post("cmr_theme");
    $the_db_name = get_post("the_db_name");
    $cmr_core = get_post("cmr_core");
    $dbms_core = get_post("db_core");
    $dbms_core_table_prefix = get_post("db_core_table_prefix");
    
    $dbms_host = get_post("db_host");
    $dbms_port = get_post("db_port");
    $dbms_type = get_post("db_type");
    $dbms_name = get_post("db_name");
    $dbms_user = get_post("db_user");
    $dbms_pw = get_post("db_pw");
    $prefix = get_post("table_prefix");
    
    $select_tables = get_post("select_tables");
    $select_models = get_post("select_models");
    
    $remote_file_db = get_post("remote_file_db");
    $remote_file_model = get_post("remote_file_model");
    
    $for_incomplete_module = get_post("check_other_model");
    $check_extra_model = get_post("check_other_model");
    $check_administrate = get_post("check_other_model");
    $check_class_one = get_post("check_other_model");
    $cmr->output[0] = "";
    // $check_".$gen->gen_type= get_post("check_".$gen->gen_type");
    // $check_".$gen->table_name= get_post("check_".$gen->table_name");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cookie_action = get_post("cookie_action");
	save_cookie_status($cmr->config, "cookie_action", $cookie_action);
	save_cookie_status($cmr->config, "db_source", $cookie_action);
	save_cookie_status($cmr->config, "model_source", $cookie_action);
	save_cookie_status($cmr->config, "model_group", $cookie_action);
	save_cookie_status($cmr->config, "output_type", $cookie_action);
	save_cookie_status($cmr->config, "destination", $cookie_action);
	save_cookie_status($cmr->config, "check_backup", $cookie_action);
	save_cookie_status($cmr->config, "backup_extention", $cookie_action);
	save_cookie_status($cmr->config, "cmr_theme", $cookie_action);
	save_cookie_status($cmr->config, "the_db_name", $cookie_action);
	save_cookie_status($cmr->config, "cmr_core", $cookie_action);
	save_cookie_status($cmr->config, "db_core", $cookie_action);
	save_cookie_status($cmr->config, "db_core_table_prefix", $cookie_action);
	save_cookie_status($cmr->config, "db_host", $cookie_action);
	save_cookie_status($cmr->config, "db_port", $cookie_action);
	save_cookie_status($cmr->config, "db_type", $cookie_action);
	save_cookie_status($cmr->config, "db_port", $cookie_action);
	save_cookie_status($cmr->config, "db_name", $cookie_action);
	save_cookie_status($cmr->config, "db_user", $cookie_action);
	save_cookie_status($cmr->config, "db_pw", $cookie_action);
	save_cookie_status($cmr->config, "table_prefix", $cookie_action);
	save_cookie_status($cmr->config, "select_tables", $cookie_action);
	save_cookie_status($cmr->config, "select_models", $cookie_action);
	save_cookie_status($cmr->config, "remote_file_db", $cookie_action);
	save_cookie_status($cmr->config, "remote_file_model", $cookie_action);
	save_cookie_status($cmr->config, "check_other_model", $cookie_action);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$gen = new class_generators();
$gen->config = $cmr->config;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $gen->language = $cmr->get_page("language");
    $gen->prefix = $prefix;
    $gen->dbms_name = $dbms_name;
	(empty($dbms_pw)) ? $gen->dbms_pw = $cmr->get_conf("db_pw") : $gen->dbms_pw = $dbms_pw;
	(empty($dbms_user)) ? $gen->dbms_user = $cmr->get_conf("db_user") : $gen->dbms_user = $dbms_user;
	(empty($dbms_port)) ? $gen->dbms_port = $cmr->get_conf("db_port") : $gen->dbms_port = $dbms_port;
	(empty($dbms_host)) ? $gen->dbms_host = $cmr->get_conf("db_host") : $gen->dbms_host = $dbms_host;
	(empty($dbms_type)) ? $gen->dbms_type = $cmr->get_conf("db_type") : $gen->dbms_type = $dbms_type;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(!empty($model_group)) $gen->model_group = basename($model_group);
    $gen->output_type = $output_type;
    $gen->db_source = $db_source;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	(empty($destination)) ? $gen->destination = realpath("./temp/") . "/" : $gen->destination = $destination;
	if(!is_dir($gen->destination)) mkdir($gen->destination);
	if(!is_writable($gen->destination)) $gen->destination = realpath(getenv("TMP") . "/");
    if(!is_dir($gen->destination)) mkdir($gen->destination);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        switch($gen->output_type){
	        case "application_temp":;
	        $gen->destination = realpath("./temp/") . "/";
	        $gen->backup_extention = "";
	        $gen->modes = "w+";
    		$gen->save_mode = true;
		    $check_backup = get_post("check_backup");
		    if($check_backup) $gen->backup_extention = $backup_extention;
	        break;
	
	        case "application_update":;
	        $gen->destination = realpath("./") . "/";
	        $gen->backup_extention = "";
	        $gen->modes = "w+";
		    $check_backup = get_post("check_backup");
		    if($check_backup) $gen->backup_extention = $backup_extention;
	        break;
	
	        case "remote_folder":;
	        case "application_auto":;
	        case "download":;
	        case "download_zip":;
	        case "remote_zip":;
	        default:;
	        $gen->backup_extention = "";
	        $gen->modes = "w+";
	        break;
	
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$array_files_dirs_to_zip = array();
switch($gen->db_source){
        case "local_zip":;
        $gen->dbms_name = $gen->dbms_name . "_gen" . date("Ymdhis");
        $cmr->post_files = get_post_files($cmr->config, $cmr->post_files, basename(get_post("remote_file_db")));
        unzip($cmr->post_files["attachment_location"] . $cmr->post_files["attachment"], $gen->destination);
        if($cmr->post_files["attachment"]) $db_source_file = cmr_getdir_all($cmr->config, $gen->destination);
        $dbms_sql_text = file_get_contents($db_source_file[0]);
        $select_all_table = true;
        break;

        case "remote_file":;
        $gen->dbms_name = $gen->dbms_name . "_gen" . date("Ymdhis");
        if($remote_file_db) $db_source_file[] = $remote_file_db;
        if($recursive) $db_source_file = cmr_getdir_all($cmr->config, realpath(dirname($remote_file_db)));
        $dbms_sql_text = file_get_contents($db_source_file[0]);
        $select_all_table = true;
        break;

        case "remote_zip":;
        $gen->dbms_name = $gen->dbms_name . "_gen" . date("Ymdhis");
        unzip($remote_file_db, $gen->destination);
        if($remote_file_db) $db_source_file = cmr_getdir_all($cmr->config, $gen->destination);
        $dbms_sql_text = file_get_contents($db_source_file[0]);
        $select_all_table = true;
        break;

        case "text":;
        $gen->dbms_name = $gen->dbms_name . "_gen" . date("Ymdhis");
        $select_all_table = true;
        $db_source_file = "";
        $dbms_sql_text = get_post("db_sql_text");
        break;

        
        case "default":;
        case "local_file":;
        $gen->dbms_name = $gen->dbms_name . "_gen" . date("Ymdhis");
        $cmr->post_files = get_post_files($cmr->config, $cmr->post_files, basename(get_post("remote_file_db")));
        $db_source_file = $cmr->post_files["attachment_location"] . $cmr->post_files["attachment"];
        $dbms_sql_text = file_get_contents($db_source_file);
        $select_all_table = true;
        break;
        
        
        case "none":;
        $gen->dbms_name = "";
        $select_all_table = false;
        $db_source_file = "";
        $dbms_sql_text_file = "";
        break;

        
        case "server":;
        default:;
	    if(empty($gen->dbms_name)) $gen->dbms_name = $the_db_name;
	    if(empty($gen->dbms_name)) $gen->dbms_name = $cmr->get_conf("db_name");
        $select_all_table = false;
        $db_source_file = "";
        $dbms_sql_text_file = "";
        break;

}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $gen->destination = realpath($gen->destination . "/" . $gen->model_group . "/");
    if(!is_dir($gen->destination))  @mkdir($gen->destination);
    $gen->destination = realpath($gen->destination . "/" . $gen->dbms_name . "/");
    if(!is_dir($gen->destination))  @mkdir($gen->destination);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!database connection---------------------------
	$cmr->db_connection = NewADOConnection($cmr->get_conf("db_type"));
    $gen->connection = $cmr->db_connection->Connect($gen->dbms_host, $gen->dbms_user, $gen->dbms_pw, $cmr->config["db_name"]);
	if(!is_resource($gen->connection)) $gen->connection = $cmr->db_connection;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(($db_source!="server")||($db_source=="text")){
    if((file_exists($db_source_file))||(!empty($dbms_sql_text))){
	    if(!empty($dbms_sql_text)){
		$sql_query="CREATE DATABASE IF NOT EXISTS " . $gen->dbms_name . ";";
        $result_query = &$cmr->db_connection->query($sql_query, $gen->connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg() . "\n");
    	$gen->connection = $cmr->db_connection->Connect($gen->dbms_host, $gen->dbms_user, $gen->dbms_pw, $gen->dbms_name);
    	}
    	
        $result_query = &$cmr->db_connection->query($dbms_sql_text, $gen->connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg() . "\n");
        
        $dbms_sql_text = cmr_searchi_replace("^\s*--[^\n]*[\n]", " ", $dbms_sql_text);
        $sql_query_array = cmr_split(";\s*\n", $dbms_sql_text);
        foreach($sql_query_array as $key => $sql_query){
            if(!cmr_searchi("select |insert |create |delete |update |default |use ", next($sql_query_array))){
                array_push ($sql_query_array, current($sql_query_array) . ";\n" . next($sql_query_array));
                $sql_query_array[$key] = "";
                $sql_query_array[$key + 1] = "";
            }
        }
        $total = 0;
        foreach($sql_query_array as $sql_query){
            if($sql_query){
                $result_query = &$cmr->db_connection->query($sql_query . ";", $gen->connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg() . "\n");
                $total += $result_query->RecordCount();;
            }
            $cmr->output[0] .= ("<hr />" . substr(0, 50, $sql_query) . "<hr />");
        }
    }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
switch($model_source){

        case "local_zip":;
        $cmr->post_files = get_post_files($cmr->config, $cmr->post_files, basename(get_post("model_file")));
        unzip($cmr->post_files["attachment_location"] . $cmr->post_files["attachment"], $gen->destination);
        if($cmr->post_files["attachment"]) $list_models = cmr_getdir_all($cmr->config, $gen->destination);
		$model_dir = "";
        break;

        case "remote_file":;
        if($remote_file_model) $list_models[] = $remote_file_model;
        if($recursive) $list_models = cmr_getdir_all($cmr->config, realpath(dirname($remote_file_model)));
		$model_dir = "";
        break;

        case "remote_folder":;
            $dir = @opendir($remote_file_model);
            while ($file = readdir($dir)){
                if(($file != ".") && ($file != "..")&& (!is_dir($remote_file_model . "/" .$file))){
                $list_models[] = trim($file);
                }
            }
		$model_dir = $remote_file_model;
        break;

        case "remote_zip":;
        unzip($remote_file_model, $gen->destination);
        $list_models = cmr_getdir_all($cmr->config, $gen->destination);
		$model_dir = "";
        break;

        case "text":;
        $gen->models_text = get_post("models_text");
        $list_models[] = "text_model.txt";
		$model_dir = "";
        break;

        
        case "button_generator":;
		$model_dir = "";
        $list_models[] = "button_model.png";
		list($col1, $col2, $col3) = explode(",", $cmr->get_conf("cmr_button_color"));
		list($font, $x_pos, $y_pos, $size) = explode(",", $cmr->get_conf("cmr_button_dim"));
        
		$button_color = get_post("button_color");
		if(!is_numeric($button_color)) $button_color = intval($button_color, 16);
// 		hexdec($button_color), intval("0x".$button_color"), base_convert($button_color, 16, 10);octdec(), decbin(), dechex() 

		
		$button_col1 = substr($button_color,0,3);
		$button_col2 = substr($button_color,3,3);
		$button_col3 = substr($button_color,6,3);
		
		$button_x_pos = get_post("button_x_pos");
		$button_y_pos = get_post("button_y_pos");
		
		$text_font = get_post("text_font");
		$text_size = get_post("text_size");
		$button_model = get_post("button_model");
		
		if(empty($button_model)) $button_model = $cmr->get_conf("cmr_button_model");
		$cmr->post_files = get_post_files($cmr->config, $cmr->post_files, basename(get_post("button_model")));
        if($cmr->post_files["attachment"]) $button_model = $cmr->post_files["attachment_location"] . "/" . $cmr->post_files["attachment"];
		
		if(empty($button_col1)) $button_col1 = $col1;
		if(empty($button_col2)) $button_col2 = $col2;
		if(empty($button_col3)) $button_col3 = $col3;
		
		if(empty($text_font)) $text_font = $font;
		if(empty($button_x_pos)) $button_x_pos = $x_pos;
		if(empty($button_y_pos)) $button_y_pos = $y_pos;
		if(empty($text_size)) $text_size = $size;
		
        $gen->models_text = get_post("models_text");
