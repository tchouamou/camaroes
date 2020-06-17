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
Copyright (c) 2011, Tchouamou Eric Herve <tchouamou@gmail.com>
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
if(empty($gen)) return;
if(($cmr->get_user("authorisation")) < $cmr->get_conf("cmr_admin_type")) die($cmr->translate("Admin privilege needed, click ") . "<a href=\"index.php?cmr_mode=login\" >" .  $cmr->translate("Here") . "</a>" . $cmr->translate(" to login with [admin] account "));
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
// if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php")
// include_once($cmr->get_path("index") . "system/loader/loader_get.php");
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// case "form_generator":
// 


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
//     $lk->add_link("modules/admin/administrate.php?left1=&middle2=", 1);
//     $lk->add_link("modules/admin/explore.php?left1=&middle2=", 1);
    $lk->add_link("modules/admin/form_generator.php?left1=&middle2=", 1);
//     $lk->add_link("modules/guest/menu_list.php?left1=&middle2=", 1);
    $lk->add_link("modules/guest/desktop.php?left1=&middle2=", 1);
//     $lk->add_link("modules/guest/site_map.php?left1=&middle2=", 1);
//     $lk->add_link("modules/database/menu_db.php?left1=&middle2=", 1);
    print($lk->list_link());
    print("<br />");
    print("<br />");
    print("<br />");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// load_module_need($cmr->config, $cmr_language, $cmr->page, "form_generator.php");
    $cmr->config = $mod->load_conf("conf.d/modules/conf_form_generator" . $cmr->get_ext("conf"));
    $cmr->language = $mod->load_lang($cmr->language, $cmr->page["language"], "lang_generator" . $cmr->get_ext("lang"));
    $cmr->help = $mod->load_help("form_generator" . $cmr->get_ext("help"));
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $cmr->action["to_load"] = $cmr->get_path("func") . "function/func_zip.php";
	include($cmr->get_path("index") . "system/loader/loader_function.php");
    $cmr->action["to_load"] = $cmr->get_path("func") . "function/func_generators.php";
	include($cmr->get_path("index") . "system/loader/loader_class.php");
	$cmr->action["to_load"] = $cmr->get_path("class") . "class/class_generators.php";
	include($cmr->get_path("index") . "system/loader/loader_class.php");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// $move_to_auto = get_post("move");
// if(empty($move_to_auto)){
//     $move_to_auto = false;
// }else{
//     $move_to_auto = true;
//  }

// $gen->prefix = get_post("table_prefix");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($gen->dbms_name)||($model_source=="button_generator")){
		$gen->connection = $cmr->db_connection;
				
		$gen->dbms_name = "";
		$gen->table_name = "";
		$gen->list_column = "";
		$gen->gen_type = "png";
		$gen->write_extension = "png";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $gen->create_path = $gen->gen_path();
        $new_file = $gen->write_gen_file($gen->connection, $gen->write_extension, $gen->create_path, $gen->form_name, $gen->models_text, $gen->backup_extention, $gen->modes);
        print($new_file[1]);

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	}else{
//  !!!!!!!!!!!!!!!!!!!!!!!database connection---------------------------
//     $gen->connection = cmrdb_connect($gen->dbms_host, $gen->dbms_user, $gen->dbms_pw) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg());
	$gen->connection = NewADOConnection($gen->dbms_type);
	$gen->connection->Connect($gen->dbms_host, $gen->dbms_user, $gen->dbms_pw, $gen->dbms_name);
	if(!is_resource($gen->connection)) $gen->connection = $cmr->db_connection;
//     cmrdb_select_db($gen->dbms_name, $gen->connection);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$GLOBALS["dbms_pw"] = $gen->dbms_pw;
			$GLOBALS["dbms_user"] = $gen->dbms_user;
			$GLOBALS["dbms_port"] = $gen->dbms_port;
			$GLOBALS["dbms_host"] = $gen->dbms_host;
			$GLOBALS["dbms_type"] = $gen->dbms_type;
			$GLOBALS["dbms_name"] = $gen->dbms_name;
// 			$GLOBALS["cmr_lang"] = $gen->language;
			$GLOBALS["limit"] = $gen->limit;
			$GLOBALS["where"] = $gen->where;
			
            $GLOBALS["cmr_new_function"] = $cmr->config["cmr_new_function"];
            $GLOBALS["cmr_update_function"] = $cmr->config["cmr_update_function"];
            $GLOBALS["cmr_report_function"] = $cmr->config["cmr_report_function"];
            $GLOBALS["cmr_search_operator"] = $cmr->config["cmr_search_operator"];
            $GLOBALS["cmr_report_operator"] = $cmr->config["cmr_report_operator"];
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$cookie_action= get_post("save_cookies");
    $str_class = "\n";
    $gen->form_name = "other,php";
    $gen->table_name = "table";
    $gen->short_table_name = cmr_searchi_replace("^" . $gen->prefix, "", $gen->table_name);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $array_model_type = $gen->gen_model_array();
    $gen->array_db = $gen->get_array_db();
    $gen->array_tables = $gen->get_array_tables($gen->dbms_name);
	$GLOBALS["array_tables"] = $gen->array_tables;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    print("\n <b > ".$cmr->translate("begining work with database") .  "[" . $gen->dbms_name . "]...... </b>\n");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    foreach($gen->array_tables as $table){
    $gen->table_name = $table["Name"];
    $gen->short_table_name = cmr_searchi_replace("^" . $gen->prefix, "", $gen->table_name);
    if((in_array($gen->table_name, $list_tables)) || $select_all_table){
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $gen->array_index = get_array_index($gen->prefix, $gen->table_name);
    $gen->array_columns = get_array_columns($gen->prefix, $gen->table_name);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $gen->columns = current($gen->array_columns);
    $gen->list_column = $gen->columns["Field"];
    $search_model_array = array();
    $var_match = "@#@" . $gen->form_name . ".php@:@";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//          save_cookie_status($cmr->config, "check_" . $gen->table_name, $cookie_action);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    print("\n <strong > ".$cmr->translate("bigining work with table") .  "[".$gen->table_name."]...... </b>\n");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    foreach ($list_models as $source){
        $gen->gen_type = str_replace(strstr(basename($source), "_model"), "", basename($source));
        $gen->write_extension = str_replace("_model.", "", strstr(basename($source), "_model."));
        $gen->form_name = $gen->gen_type . "_" . $gen->short_table_name;
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if(!empty($check_class)) $str_class .= "\$cmr->" . $gen->form_name . "(); \n";
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//          print"\$source=$source;\$gen->gen_type=$gen->gen_type;\$gen->write_extension=$gen->write_extension;\n";

                if(($model_source!="text") && ($model_source!="button_generator") && (file_exists($model_dir . $source)))
                $gen->models_text = file_get_contents($model_dir . $source);
                
                if(!empty($gen->models_text)){
// 	                &&(in_array($gen->gen_type, $array_model_type)))
                    array_push ($search_model_array, $gen->gen_type . "_model." . $gen->write_extension);
                    $gen->create_path = $gen->gen_path();
                    $gen->models_text = $gen->generate();
                    $new_file = $gen->write_gen_file();
         array_push ($array_files_dirs_to_zip, $new_file[0]);
         print($new_file[1]);
                    }
                $gen->models_text = "";
                // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
        $str_class .= "\n\n";
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        print("\n <strong > " . $cmr->translate("ending work with table") . " [".$gen->table_name."]...... </b>\n\n");
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//     $sql_index_result->Close();
//     $sql_column_result->Close();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
};
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// $sql_table_result->Close();
// $sql_tables_result->Close();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!! database !!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}




//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!empty($check_extra_model)){
//     save_cookie_status($cmr->config, "for_incomplete_module", $cookie_action);
    print("<br /> <strong > " . $cmr->translate("bigining work with incomplete modules") .  "...... </b><br />");
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $model_source1 = $cmr->get_path("model") . "model/" . $gen->model_group . "/extra/conf_model_extra.ini";
    $model_source2 = $cmr->get_path("model") . "model/" . $gen->model_group . "/extra/lang_model_extra.ini";
    $model_source3 = $cmr->get_path("model") . "model/" . $gen->model_group . "/extra/help_model_extra.ini";
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $array_model_source = array($model_source1, $model_source2, $model_source3);
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$file_list[] = $cmr->get_path("module") . "modules/guest/";
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_guest_type")) $file_list[] = $cmr->get_path("module") ."modules/";
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("module") . "modules/admin/" ;
	if($cmr->get_user("authorisation") > $cmr->get_conf("cmr_noc_type")) $file_list[] = $cmr->get_path("module") . "modules/database/";
    
	foreach($file_list as $key => $value){
	while($file = readdir($value)){
    if(($file !=".") && ($file !="..") && (is_file($value . "/" . $file))){
    $file_short_name=substr($file,0, strpos($file, "."));
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    cmr_copy($cmr->get_path("image") . "/images/16x16.png", $cmr->get_path("image") . "images/icon/16x16/modules/auto/" . $file_short_name . ".png");
    cmr_copy($cmr->get_path("image") . "/images/32x32.png", $cmr->get_path("image") . "images/icon/32x32/modules/auto/" . $file_short_name . ".png");
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $patner_type="^".implode($array_model_type, "_|^");
    // print$gen->destination.";".$file_short_name.";".$patner_type;exit;
    if(!cmr_search($patner_type, $file_short_name)){
	    foreach($array_model_source as $model_source){
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        $gen->gen_type = str_replace("model_extra.ini", "", basename($model_source));
	        $gen->write_extension = "ini";
	        $gen->models_text = file_get_contents($model_source);
	        array_push ($search_model_array, $model_source);
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        $gen->form_name = $gen->gen_type.$file_short_name;
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        $gen->create_path = $gen->gen_path();
	        $gen->models_text = $gen->generate();
	        $new_file = $gen->write_gen_file();
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        array_push ($array_files_dirs_to_zip, $new_file);
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        // $new_file = write_gen_file($gen->connection, $gen->write_extension, $gen->create_path, $gen->dbms_name ."_conf", $gen->models_text, TRUE, $gen->modes);
	        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        $gen->models_text = "";
    	}
    }
  }
 }
}
        print("<br /> <strong > ".$cmr->translate("ending work with incomplete modules") .  "...... </b><br />");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  @@@@@@@@@@@@@@@@@@@@@@ other @@@@@@@@@@@@@
//     save_cookie_status($cmr->config, "check_extra_model");
    print("<br /> <strong > ".$cmr->translate("bigining with extra model") .  "...... </b><br />");
    $path_dir = ($cmr->get_path("model") . "model/" . $gen->model_group . "/extra/");
    $dir = @ opendir($path_dir);
    while ($file_model = readdir($dir)){
    if(is_file($path_dir . "/" . $file_model) && (cmr_searchi("_model", $file_model) && (!in_array($file_model, $search_model_array)))){
    array_push ($search_model_array, $file_model);
        $gen->write_extension = str_replace("_model.", "", strstr($file_model, "_model."));
        $gen->form_name = str_replace("_model." . $gen->write_extension, "", $file_model);
        $model_source = $cmr->get_path("model") . "model/" . $gen->model_group . "/" . $file_model;
        $gen->models_text = file_get_contents($model_source);
        $gen->gen_type="other_";
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//      if($move_to_auto){
//             move_to_auto($path."../", $path, "class_one.php");
//      }else{
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $gen->create_path = $gen->gen_path();
        $gen->models_text = $gen->generate();
        $new_file = $gen->write_gen_file();
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        array_push ($array_files_dirs_to_zip, $new_file);
        // $new_file = write_gen_file($gen->connection, $gen->write_extension, $gen->create_path, $gen->form_name, $gen->models_text, TRUE, $gen->modes);
//      }
        // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $gen->models_text = "";
        }
    }
    print("<br /> <strong > ".$cmr->translate("ending work with extra model") .  "...... </b><br />");
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//         if($move_to_auto){
//             die("<br /><h2>".$cmr->translate("Move finished.")."</h2>");
//      }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//     print("<br /> <strong > " . $cmr->translate("begining work with cookie") . " ...... </b><br /><br />");

//     save_cookie_status($cmr->config, "db_source", $cookie_action);
//     save_cookie_status($cmr->config, "model_source", $cookie_action);
//     save_cookie_status($cmr->config, "model_group", $cookie_action);
//     save_cookie_status($cmr->config, "destination", $cookie_action);
//     save_cookie_status($cmr->config, "cmr_theme", $cookie_action);
//     save_cookie_status($cmr->config, "the_db_name", $cookie_action);
//     save_cookie_status($cmr->config, "cmr_core", $cookie_action);
//     save_cookie_status($cmr->config, "db_core", $cookie_action);
//     save_cookie_status($cmr->config, "table_prefix", $cookie_action);
//     save_cookie_status($cmr->config, "check_administrate", $cookie_action);
//     save_cookie_status($cmr->config, "check_button", $cookie_action);
//     save_cookie_status($cmr->config, "check_class", $cookie_action);
//     save_cookie_status($cmr->config, "for_incomplete_module", $cookie_action);
//     save_cookie_status($cmr->config, "check_extra_model", $cookie_action);

//     save_cookie_status($cmr->config, "db_pw", $cookie_action);
//     save_cookie_status($cmr->config, "db_user", $cookie_action);
//     save_cookie_status($cmr->config, "db_name", $cookie_action);
//     save_cookie_status($cmr->config, "db_port", $cookie_action);
//     save_cookie_status($cmr->config, "db_host", $cookie_action);
//     save_cookie_status($cmr->config, "db_type", $cookie_action);
//     
//     save_cookie_status($cmr->config, "cmr_model", $cookie_action);
//     save_cookie_status($cmr->config, "save_cookies", $cookie_action);
//     save_cookie_status($cmr->config, "cmr_theme", $cookie_action);
//     print("<br /> <strong > " . $cmr->translate("ending work with cookie") . " ...... </b><br /><br />");
//     save_cookie_status($cmr->config, "button_col1", $cookie_action);
//     save_cookie_status($cmr->config, "button_col2", $cookie_action);
//     save_cookie_status($cmr->config, "button_col3", $cookie_action);
		
//     save_cookie_status($cmr->config, "button_dim1", $cookie_action);
//     save_cookie_status($cmr->config, "button_dim2", $cookie_action);
//     save_cookie_status($cmr->config, "button_dim3", $cookie_action);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!




//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//         if($move_to_auto){
//             die("\n<h2>".$cmr->translate("Move finished.")."</h2>");
//      }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    print("\n <b > " . $cmr->translate("end of all work with database ") . $gen->dbms_name . ". </b>\n");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(!empty($cmr_core)){
//     save_cookie_status($cmr->config, "cmr_core", $cookie_action);
    print("\n <strong > ".$cmr->translate("bigining copy of ") .  "[".$gen->destination . "index.zip"."]...... </b>\n");
// $command="xcopy /E/C/F/Y model\\".$gen->model_group."\\index\\ ".$gen->destination;
//     cmr_copy($cmr->get_path("model") . "model/" . $gen->model_group . "/extra/index.zip", $gen->destination . "index.zip");
// copy("./model/".$gen->model_group."/extra/" . $cmr->get_conf("cmr_main_config") , $gen->destination. $cmr->get_conf("cmr_main_config"));
//  @@@@@@@@@@
    print("\n <strong > ".$cmr->translate("ending copy of ") .  "[".$gen->destination . "index.zip"."]...... </b>\n");
// unzip("./model/".$gen->model_group."/extra/index.zip", $gen->destination);
// @@@@@@@@@@
    print("\n<b>" . $cmr->translate("application created successfuly") . "</b>...\n");
// print("\n" . $cmr->translate("run the next command to complete your application") . "...\n");
// print("\n" . $command . "\n");
    print("\n" . $cmr->translate("next, click on the next link to try your application") . "\n...");
// print("\n<blink><a href=\"./model/".$gen->model_group."/extra/index.zip\"> ".$cmr->translate("clicca qui") . "</a></blink>\n...");
    print("\n<blink><a href=\"" . $gen->destination . "\"> ".$cmr->translate("click here") . "</a></blink>\n...");
// exec($command);
    print("\n <strong > " . $cmr->translate("bigining copy of ") . "[" .  $cmr->get_path("model") . "model/" . $gen->model_group . "/index" . "]...... </b>\n");
    cmr_dir_copy($cmr->config, $cmr->get_path("model") . "model/" . $gen->model_group . "/extra/index", $gen->destination);
    print("\n <strong > " . $cmr->translate("ending copy of ") . "[" .  $cmr->get_path("model") . "model/" . $gen->model_group . "/index"."]...... </b>\n");
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    if(!empty($dbms_core)){
//     save_cookie_status($cmr->config, "db_core");
    $source = $cmr->get_path("install") . "install/cmr_scheme.sql";
        print("\n <strong > ".$cmr->translate("bigining database creation and insertion ") .  "[".realpath($source)."]...... </b>\n");
    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!= adaptation of the database ===========
    if(file_exists($source)){
        // $gen->connection  =  cmrdb_connect($gen->dbms_host, $gen->dbms_user, $gen->dbms_pw) or print_r("\n".$cmr->db_connection->ErrorMsg()."\n");

        $dbms_sql_text = file_get_contents($source);
        $dbms_sql_text = cmr_searchi_replace("^\s*--[^\n]*[\n]", " ", $dbms_sql_text);

        $dbms_sql_text = str_replace("INSERT IGNORE INTO cmr_", "INSERT IGNORE INTO " . $dbms_core_table_prefix, $dbms_sql_text);
        $dbms_sql_text = str_replace("INSERT INTO cmr_", "INSERT INTO " . $dbms_core_table_prefix, $dbms_sql_text);
        $dbms_sql_text = str_replace("CREATE TABLE IF NOT EXISTS cmr_", "CREATE TABLE IF NOT EXISTS " . $dbms_core_table_prefix, $dbms_sql_text);
        $dbms_sql_text = str_replace("CREATE TABLE cmr_", "CREATE TABLE " . $dbms_core_table_prefix, $dbms_sql_text);

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
                $result_query = &$cmr->db_connection->Execute($sql_query . ";", $gen->connection) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $cmr->db_connection->ErrorMsg() . "\n");
    			if($result_query) $total += $result_query->RecordCount();;
            }
            print("<hr />" . substr(0, 50, $sql_query) . "<hr />");
        }
    }
        print("\n <strong > " . $cmr->translate("end database creation and insertion ") .  "[".realpath($source)."]...... </b>\n");
        $good_install_db = ($total > 1);
        
        
        print("\n <strong > " . $cmr->translate("bigining working in the config file ") . "[" . realpath($gen->destination) . "config.inc.php]...... </b>\n");
	    $conf_text1 = file_get_contents($cmr->get_path("index") . "config.inc.php");
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_type\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_type\"]=\"" . $gen->dbms_type . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_port\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_port\"]=\"" . $gen->dbms_port . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_socket\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_socket\"]=\"" . $gen->dbms_socket . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_host\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_host\"]=\"" . $gen->dbms_host . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_name\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_name\"]=\"" . $gen->dbms_name . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_user\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_user\"]=\"" . $gen->dbms_user . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"db_pw\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"db_pw\"]=\"" . $gen->dbms_pw . "\";\n", $conf_text1);
	    $conf_text1 = cmr_searchi_replace("\$cmr->config\[\"cmr_table_prefix\"\][ \t]*=[^\n]*[\n]", "\$cmr->config[\"cmr_table_prefix\"]=\"" . $dbms_core_table_prefix . "\";\n", $conf_text1);
    
        print("\n <strong > " . $cmr->translate("bigining working in the config file ") .  "[".realpath($cmr->get_path("index") . $cmr->get_conf("cmr_main_config")) ."]...... </b>\n");
        $conf_text2 = file_get_contents($cmr->get_path("index") . $cmr->get_conf("cmr_main_config") );
        $conf_text2 = cmr_searchi_replace("db_type[ \t]*=[^\n]*[\n]", "db_type=" . $gen->dbms_type . "\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("db_port[ \t]*=[^\n]*[\n]", "db_port=" . $gen->dbms_port . "\n", $conf_text2);
        // $conf_text2=cmr_searchi_replace("db_socket[ \t]*=[^\n]*[\n]", "db_socket=".$gen->dbms_socket."\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("db_host[ \t]*=[^\n]*[\n]", "db_host=" . $gen->dbms_host . "\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("db_name[ \t]*=[^\n]*[\n]", "db_name=" . $gen->dbms_name . "\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("db_user[ \t]*=[^\n]*[\n]", "db_user=" . $gen->dbms_user . "\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("db_pw[ \t]*=[^\n]*[\n]", "db_pw=" . $gen->dbms_pw . "\n", $conf_text2);
        $conf_text2 = cmr_searchi_replace("cmr_table_prefix[ \t]*=[^\n]*[\n]", "cmr_table_prefix=" . $dbms_core_table_prefix . "\n", $conf_text2);


        $good_install_conf = true;
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if(file_exists($gen->destination . "config.inc.php")){
            $good_install_conf = rename($gen->destination . "config.inc.php" , $gen->destination . "config.inc.php" . ".old_" . date("y_m_d_h_i"));
        }

        if($good_install_conf){
            $fich = @ fopen($gen->destination . "config.inc.php" , "w+");
            chmod($gen->destination . "config.inc.php" , 0775);

            if(@ fwrite($fich, $conf_text2)){
                print("\n<b>".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "]".$cmr->translate(" successfully created") . "</b> .......\n");
            }else{
                print("\n ".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "] ".$cmr->translate("not created") . " ??!!!!\n");
                $good_install_conf = false;
            }
        }else{
            print("\n ".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "] ".$cmr->translate("can not be created") . " ??!!!!\n");
        }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
        
        
        
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        if(file_exists($gen->destination . $cmr->get_conf("cmr_main_config") )){
            $good_install_conf = rename($gen->destination . $cmr->get_conf("cmr_main_config") , $gen->destination . $cmr->get_conf("cmr_main_config") . ".old_" . date("y_m_d_h_i"));
        }

        if($good_install_conf){
            $fich = @ fopen($gen->destination . $cmr->get_conf("cmr_main_config") , "w+");
            chmod($gen->destination . $cmr->get_conf("cmr_main_config") , 0775);

            if(@ fwrite($fich, $conf_text2)){
                print("\n<b>".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "]".$cmr->translate(" successfully created") . "</b> .......\n");
            }else{
                print("\n ".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "] ".$cmr->translate("not created") . " ??!!!!\n");
                $good_install_conf = false;
            }
        }else{
            print("\n ".$cmr->translate("file") . " [" . realpath($cmr->get_conf("cmr_main_config")) . "] ".$cmr->translate("can not be created") . " ??!!!!\n");
        }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        
        
        
        print("\n <strong > " . $cmr->translate("ending work of the config file ") . "[" . realpath($gen->destination) . "config.inc.php]...... </b>\n");
        print("\n <strong > " . $cmr->translate("ending work of the config file ") . "[" . realpath($gen->destination) . $cmr->get_conf("cmr_main_config") . "]...... </b>\n");
        if(($good_install_db) && ($good_install_conf)){
            //  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            print("\n". $cmr->translate("all generated successfully"). "\n");
            //  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
}
    	$cmr->db_connection = $cmr->connect();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    switch($output_type){
        case "download":;
        case "remote_zip":;
        case "download_zip":;
            print("\n <strong > ".$cmr->translate("bigining zip and download ") .  "[".realpath($gen->destination)."]...... </b>\n");
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            $array_files_dirs_to_zip = cmr_getdir_all($cmr->config, array($gen->destination), "");
            $zip_data = cmr_zipfiles($array_files_dirs_to_zip, dirname($gen->destination), "UTF-8");
            $zip_file = dirname($gen->destination. "/" .$model_source) . "_" .date("Ymdhis") . "_gen.zip";
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		    $fich = fopen($zip_file, "w");
		    fwrite($fich, $zip_data);
		    fclose($fich);
			print("<p>" .  $cmr->translate(" Click here") . " -> <h2>" . file_link($zip_file) . "</h2> - " . $cmr->translate(" to download the result") . "</p>");
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            if(($output_type=="download") || ($output_type=="download")){
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				// 			 export($cmr->config, $zip_data, "zip", $zip_file);
				// 			 $cmr->down_file(realpath($zip_file));
				// 			 export($cmr->config, "", "zip", $zip_file, "yes");
            // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        	} 
            print("\n <strong > " . $cmr->translate("ending zip and download in ") . " [".realpath($gen->destination)."]...... </b>\n\n");
        break;

        case "application_auto":;
        case "application_temp":;
        case "application_update":;
        case "remote_folder":;
        default:;
        break;

}

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->log_to_db("'" . $cmr->get_user("auth_email") . "', 'form_generator', '" . $cmr->get_session("id") . "' ,'new'");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

?>
