<?php
/**
 * class_generators.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.










class_generators.php, Ver 3.03
*/



// {@_database_@}
// {@_show_create_db_@}
// {@_date_time_@}
// {@_db_date_time_@}
// {@_db_privileges_@}
// {@_db_caracter_set_@}
// {@_db_collation_@}
// {@_db_type_@}
// {@_pre_match_@}
// {@_form_name_@}
// {@_table_@}
// {@_table_name_@}
// {@_show_create_table_@}
// {@_table_engine_@}
// {@_table_version_@}
// {@_table_row_format_@}
// {@_table_rows_@}
// {@_table_avg_row_length_@}
// {@_table_data_length_@}
// {@_table_max_data_length_@}
// {@_table_index_length_@}
// {@_table_data_free_@}
// {@_table_auto_increment_@}
// {@_table_create_time_@}
// {@_table_update_time_@}
// {@_table_check_time_@}
// {@_table_collation_@}
// {@_table_checksum_@}
// {@_table_create_options_@}
// {@_table_comment_@}
// {@_table_index_@}
// {@_table_num_row_@}
// {@_table_num_column_@}
// {@_table_primary_@}
// {@_table_type_@}
// {@_table_privilege_@}
// {@_table_date_time_@}
// {@_table_non_unique_@}
// {@_table_key_name_@}
// {@_table_seq_in_index_@}
// {@_table_column_name_@}
// {@_table_collation_@}
// {@_table_cardinality_@}
// {@_table_sub_part_@}
// {@_table_packed_@}
// {@_table_index_type_@}
// {@_column_@}
// {@_column_id_@}
// {@_column_count_@}
// {@_column_null_@}
// {@_column_default_@}
// {@_column_extra_@}
// {@_column_field_@}
// {@_column_type_@}
// {@_column_collation_@}
// {@_column_key_@}
// {@_column_privileges_@}
// {@_column_comment_@}
// {@_column_index1_@}
// {@_column_unique1_@}
// {@_column_not_null1_@}
// {@_column_extern1_@}
// {@_column_comment1_@}
// {@_column_date_time1_@}
// {@_column_int1_@}
// {@_column_null1_@}
// {@_column_key1_@}
// {@_column_text1_@}
// {@_column_index2_@}
// {@_column_unique2_@}
// {@_column_not_null2_@}
// {@_column_extern2_@}
// {@_column_comment2_@}
// {@_column_date_time2_@}
// {@_column_int2_@}
// {@_column_null2_@}
// {@_column_key2_@}
// {@_column_text2_@}
// {@_column_index3_@}
// {@_column_unique3_@}
// {@_column_not_null3_@}
// {@_column_extern3_@}
// {@_column_comment3_@}
// {@_column_date_time3_@}
// {@_column_int3_@}
// {@_column_null3_@}
// {@_column_key3_@}
// {@_column_text3_@}
// {@_column0_@}
// {@_column1_@}
// {@_column2_@}
// {@_column3_@}
// {@_column4_@}
// {@_column5_@}
// {@_form_label_elmt_@}
// {@_form_label_elmt1_@}
// {@_form_label_elmt1_@}
// {@_form_box_elmt_@}
// {@_form_box_elmt1_@}
// {@_form_box_elmt1_@}
// {@_form_box_elmt_upd_@}
// {@_form_box_elmt_upd1_@}
// {@_form_box_elmt_upd1_@}
// {@_column[0-9]+_@}
// {@_table[0-9]+_@}
// {@_rown[0-9]+_@}

// (�_foreach_comment_�)(.*)(��_foreach_comment_��)
// (�_foreach_db_�)(.*)(��_foreach_db_��)
// (�_foreach_table_�)(.*)(��_foreach_table_��)
// (�_foreach_column_�)(.*)(��_foreach_column_��)
// (�_foreach_rown_�)(.*)(��_foreach_rown_��)

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * class_generators()
     *
     * @param string $template
     * @param string $this->form_name
     * @param mixed $this->table_name
     * @param mixed $this->short_table_name
     * @param string $this->list_column
     * @return
     **/

/**
 * gen_model_array($this->config)
 *
 * @return
 **/

if(!class_exists("class_generators")){

class class_generators {

	var  $button_dest = ""; // @param string
	var  $button_model = ""; // @param string
	var  $button_color = ""; // @param string
	var  $button_dim = ""; // @param string
	var  $button_text_font = ""; // @param string
	var  $button_text_size = ""; // @param string

	var  $short_table_name = ""; // @param string
	var  $dbms_pw = ""; // @param string
	var  $dbms_user = "root"; // @param string
	var  $dbms_name = "camaroes_db"; // @param string
	var  $dbms_port = ""; // @param string
	var  $dbms_host = "localhost"; // @param string
	var  $dbms_type = "mysql"; // @param string
	var  $theme = "default"; // @param string
	var  $limit = "10"; // @param string

	var  $config = array(); // @param array
	var  $array_tables = array(); // @param array
	var  $array_columns = array(); // @param array
	var  $array_index = array(); // @param array
	var  $table_columns = array(); // @param array
	var  $rows_columns = array(); // @param array
	var  $columns = array(); // @param array

	var  $list_column = ""; // @param array
	var  $language = "english"; // @param array

	var  $connection = NULL; // @param mixed
	var  $form_name = ""; // @param string
	var  $gen_type = "other,php"; // @param string
	var  $send_type = "other"; // @param string
	var  $table_name = "table"; // @param string
	var  $prefix = ""; // @param string
	var  $column_name = ""; // @param string

	var  $db_source = "server"; // @param string
	var  $output_type = "application_temp"; // @param string
	var  $model_group = "php"; // @param string

	var  $match = ""; // @param string
	var  $models_text = ""; // @param string
	var  $save_mode = false; // @param string
	var  $create_path = ""; // @param string
	var  $destination = ""; // @param string
	var  $backup_extention = ""; // @param string
	var  $write_extension = ""; // @param string
	var  $where = "1"; // @param string
	var  $modes = "w+"; // @param string


//00000000000000000000000000
function __construct() // --constructor--
{
   return true;
}
//00000000000000000000000000
function gen_model_array()
{
    if(!empty($this->config["gen_model_array"])){
    return array_map("trim", explode(",", $this->config["gen_model_array"]));
    }

    $a = array(
        "new",
        "update",
        "delete",
        "search",
        "preview",
        "view",
        "view_all",
        "view_info",
        "report",
        "view_report",
        "menu",
        "config",
        "export",
        "import",
        "conf_new",
        "conf_update",
        "conf_delete",
        "conf_search",
        "conf_preview",
        "conf_view",
        "conf_all",
        "conf_info",
        "conf_report",
        "conf_report",
        "conf_menu",
        "conf_config",
        "conf_export",
        "conf_import",
        "func",
        "class",
        "help",
        "lang",
        "notify_new",
        "notify_update",
        "notify_delete",
        "notify_search",
        "notify_view",
        "notify_report",
        "notify_import",
        "notify_export",
        "notify_config",
        "template",
        "get_new",
        "get_update",
        "get_delete",
        "get_search",
        "get_view",
        "get_report",
        "get_import",
        "get_export",
        "get_config",
        "button"
        );

    return $a;
}

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * get_array_status( )
     *
     * @return
     **/
    function get_array_status()
    {
        // =======================================
    $array_status = array();
    if($this->connection)
		   $sql_status_result = sql_run("result", $this->connection, "", "show status;");
//         $sql_status_result = &$this->connection->Execute("show status;")  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $this->connection->ErrorMsg());
    if($sql_status_result)
        while (($status = $sql_status_result->fetch_row())){
            $array_status[$status[0]] = $status;
//             $sql_status_result->MoveNext();
        }
        return $array_status;
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * get_array_variable()
     *
     * @return
     **/
    function get_array_variable()
    {
        // =======================================
    $array_status = array();
    if($this->connection)
		$sql_variable_result = sql_run("result", $this->connection, "", "show variables;");
//         $sql_variable_result = &$this->connection->Execute("show variables;")  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $this->connection->ErrorMsg());
    if($sql_variable_result)
        while (($variable = $sql_variable_result->fetch_row())){
            $array_variable[$variable[0]] = $variable;
//             $sql_variable_result->MoveNext();
        }
        return $array_variable;
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * get_array_db()
     *
     * @return
     **/
    function get_array_db()
    {
       $array_db = array();
       // $this->connection->SetFetchMode(ADODB_FETCH_NUM);
   if($this->connection)
       $sql_db_result = sql_run("result", $this->connection, "show_databases");
//         $sql_db_result = $this->connection->Execute("show databases;")  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $this->connection->ErrorMsg());
    if($sql_db_result)
        while (($db = $sql_db_result->fetch_row())){
            $array_db[$db[0]] = $db;
//             $sql_db_result->MoveNext();
        }
        return $array_db;
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    function get_array_tables($dbms_name)
    {

       $array_table = array();
        // $this->connection->SetFetchMode(ADODB_FETCH_NUM);

        if($this->connection)
        $sql_table_result = sql_run("result", $this->connection, "show_tables", "", $dbms_name);
//         $sql_table_result = $this->connection->Execute("show tables from " . $dbms_name . ";")  or db_die(__LINE__  . " - "  . __FILE__ . ": " . $this->connection->ErrorMsg());
        $count = 0;
        if($sql_table_result)
        while (($table = $sql_table_result->fetch_row())){
            //$array_table[$table[0]][0] = $table;
           $array_table[$count]["Name"] = $table[0];
           $array_table[$count]["Privileges"] = "*";
           $array_table[$table[0]]["Name"] = $table[0];
           $array_table[$table[0]]["Privileges"] = $table[0];

            $count++;
//             $sql_db_result->MoveNext();
        }
        return $array_table;
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
     /**
     * gen_database( )
     *
     * @return
     **/
   function gen_database($name)
    {
		return write_gen_database($this->connection, $this->create_path, $this->models_text, $name, $this->send_type, $this->config["cmr_version"]);
	}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

function write_gen_file()
{
    // =========================
    if($this->write_extension=="png"){
		$button_data = cmr_get_path("image") . "," . $this->button_dest . "," . $this->button_model . "," . $this->button_color . "," . $this->button_dim;
// 		$button_data .= "," . $this->button_text_font . "," . $this->button_text_size;
        preg_replace("/(�_button_�)(.*)(��_button_��)/seU", "gen_image_save('\\2', '$button_data')", $this->models_text);
        return true;
	}

        $output = "";
    if(!strlen($this->form_name)) return false;
    $output .= ($this->form_name);

    if($this->backup_extention!="database"){
        if(!file_exists($this->create_path)){
            if(!is_writable($this->create_path)) $this->create_path=dirname(tempnam ($this->create_path, "cmr_")) . "/";
            mkdir($this->create_path);
        }
       @ chmod($this->create_path, 0775);


		$fich_name= $this->create_path . $this->form_name . "." . $this->write_extension;
        $fich_name_bak = $fich_name . $this->backup_extention;
        if(!empty($this->backup_extention)&&(file_exists($fich_name))){
	        $backup_content=file_get_contents($fich_name);
            $fich_bak = fopen($fich_name_bak, "w+");
		  @ chmod($fich_name_bak, 0775);
			if(fwrite($fich_bak, $backup_content)){
			$output .= ("<br /> ".cmr_translate("file", "english", $this->language) . " [" . realpath($fich_name_bak) . "] ".cmr_translate("successfully created", "english", $this->language).".......<br />");
            }else{
			$output .= ("<br /> ".cmr_translate("file", "english", $this->language) . " [" . realpath($fich_name_bak) . "] ".cmr_translate("!!!!! can't be created !!!!!?", "english", $this->language).".......<br />");
	            }
	     }
	     $backup_extention = $this->backup_extention;
		$fich = fopen($fich_name, "w+");
		@ chmod($fich_name, 0775);
            if(fwrite($fich, $this->models_text)){
                $output .= ("<br /> ".cmr_translate("file", "english", $this->language) . " [" . realpath($fich_name) . "] ".cmr_translate("successfully created", "english", $this->language).".......<br />");
            }else{
				$output .= ("<br /> ".cmr_translate("file", "english", $this->language) . " [" . realpath($fich_name) . "] ".cmr_translate("!!!!! can't be created, trying with the database !!!!!?", "english", $this->language).".......<br />");
                $backup_extention = "database";
    		}
        @ fclose($fich);
    }
        // =========================
        // =========================
        if($backup_extention=="database"){
            echo "<br /> ".cmr_translate("File", "english", $this->language) . " [" . $this->create_path . $this->form_name . "." . $this->write_extension . "] ".cmr_translate(" not created ", "english", $this->language) . " ??!!!!<br />";

            $name = $this->form_name . "." . $this->write_extension;

            $affected_rows = $this->gen_database($name);

            if($affected_rows){
                $output .= ("<br /> <b>(" . $affected_rows . ") " . cmr_translate("file", "english", $this->language) . " [" . $this->form_name . "." . $this->write_extension . "] ".cmr_translate(" insert in table ", "english", $this->language) . " cmr_source_code</b><br />");
            }else{
                $output .= ("<br /> <b>(" . $affected_rows . ") " . cmr_translate("file", "english", $this->language) . " [" . $this->form_name . "." . $this->write_extension . "] ".cmr_translate(" not insert in table ", "english", $this->language) . " cmr_source_code !!</b><br />");
            }
        return $affected_rows;
        }
        // =========================
        return array($fich_name, $output);
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * gen_path()
     *
     * @param mixed $this->destination
     * @param string $this->gen_type
     * @param string $this->form_name
     * @param mixed $this->save_mode
     * @return
     **/
    function gen_path()
    {
            if(!file_exists($this->destination) && ($this->save_mode))  mkdir($this->destination);
            $this->gen_type = $this->gen_type . "_";
//         switch (substr($this->gen_type, 0, 3))
//             case "get":
        if(substr($this->gen_type, 0, 4) == "get_"){
            $this->send_type = "get_data";
            if(!file_exists($this->destination . "/get_data/") && ($this->save_mode)) mkdir($this->destination . "/get_data/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/get_data/";
                $this->create_path = $this->destination . "/get_data/";

//                 break;
        }elseif(substr($this->gen_type, 0, 7) == "config_"){
            $this->send_type = "modules";
//             case "con":
            if(!file_exists($this->destination . "/modules/") && ($this->save_mode)) mkdir($this->destination . "/modules/");
//                 if(cmr_searchi("^config", $this->form_name)){
                    $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/modules/";
                    $this->create_path = $this->destination . "/modules/";
//                 }else{
//                 }
//                 break;
        }elseif(substr($this->gen_type, 0, 5) == "conf_"){
            $this->send_type = "config";
//             case "con":
            if(!file_exists($this->destination . "/conf.d/") && ($this->save_mode)) mkdir($this->destination . "/conf.d/");
            if(!file_exists($this->destination . "/conf.d/modules/") && ($this->save_mode)) mkdir($this->destination . "/conf.d/modules/");
                    $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/conf.d/modules/";
                    $this->create_path = $this->destination . "/conf.d/modules/";
//                 break;
        }elseif(substr($this->gen_type, 0, 5) == "lang_"){
            $this->send_type = "languages";
//             case "lan":
            if(!file_exists($this->destination . "/languages/") && ($this->save_mode)) mkdir($this->destination . "/languages/");
            if(!file_exists($this->destination . "/languages/" . $this->language . "/") && ($this->save_mode)) mkdir($this->destination . "/languages/" . $this->language . "/");

                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/languages/" . $this->language . "/";
                $this->create_path = $this->destination . "/languages/" . $this->language . "/";
//                 break;
        }elseif(substr($this->gen_type, 0, 5) == "func_"){
            $this->send_type = "function";
//             case "fun":
            if(!file_exists($this->destination . "/function/") && ($this->save_mode)) mkdir($this->destination . "/function/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/function/";
                $this->create_path = $this->destination . "/function/";
//                 break;
        }elseif(substr($this->gen_type, 0, 5) == "help_"){
            $this->send_type = "help";
//             case "hel":
            if(!file_exists($this->destination . "/doc/") && ($update)) mkdir($this->destination . "/doc/");
            if(!file_exists($this->destination . "/doc/help/") && ($update)) mkdir($this->destination . "/doc/help/");
            if(!file_exists($this->destination . "/doc/help/" . $this->language . "/") && ($update)) mkdir($this->destination . "/doc/help/" . $this->language . "/");
                $update_path = str_replace("index.php", "", realpath("index.php")) . "/doc/help/" . $this->language . "/";
                $create_path = $this->destination . "/doc/help/" . $this->language . "/";
//                 break;
        }elseif(substr($this->gen_type, 0, 7) == "notify_"){
            $this->send_type = "notify";
//             case "not":
            if(!file_exists($this->destination . "/templates/") && ($this->save_mode)) mkdir($this->destination . "/templates/");
            if(!file_exists($this->destination . "/templates/notify/") && ($this->save_mode)) mkdir($this->destination . "/templates/notify/");
            if(!file_exists($this->destination . "/templates/notify/" . $this->language . "/") && ($this->save_mode)) mkdir($this->destination . "/templates/notify/" . $this->language . "/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/templates/notify/" . $this->language . "/";
                $this->create_path = $this->destination . "/templates/notify/" . $this->language . "/";
//                 break;
        }elseif(substr($this->gen_type, 0, 9) == "template_"){
            $this->send_type = "templates";
//             case "tem":
            if(!file_exists($this->destination . "/templates/") && ($this->save_mode)) mkdir($this->destination . "/templates/");
            if(!file_exists($this->destination . "/templates/modules/") && ($this->save_mode)) mkdir($this->destination . "/templates/modules/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/templates/modules/";
                $this->create_path = $this->destination . "/templates/modules/";
//                 break;
        }elseif(substr($this->gen_type, 0, 6) == "class_"){
            $this->send_type = "class";
//             case "cla":
            if(!file_exists($this->destination . "/class/") && ($this->save_mode)) mkdir($this->destination . "/class/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/class/";
                $this->create_path = $this->destination . "/class/";
//                 break;
        }elseif(substr($this->gen_type, 0, 7) == "button_"){
            $this->send_type = "button";
//             case "but":
            if(!file_exists($this->destination . "/images/") && ($this->save_mode)) mkdir($this->destination . "/images/");
            if(!file_exists($this->destination . "/images/button/") && ($this->save_mode)) mkdir($this->destination . "/images/button/");
            if(!file_exists($this->destination . "/images/button/" . $this->language . "/") && ($this->save_mode)) mkdir($this->destination . "/images/button/" . $this->language . "/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/images/button/" . $this->language . "/";
                $this->create_path = $this->destination . "/images/button/" . $this->language . "/";
//                 break;
        }elseif(substr($this->gen_type, 0, 3) == "oth"){
            $this->send_type = "other";
//             case "oth":
            if(!file_exists($this->destination . "/other/") && ($this->save_mode)) mkdir($this->destination . "/other/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/other/";
                $this->create_path = $this->destination . "/other/";
//                 break;
        }else {
//             default:
            if(!file_exists($this->destination . "/modules/") && ($this->save_mode)) mkdir($this->destination . "/modules/");
                $create_realpath = str_replace("index.php", "", realpath("index.php")) . "/modules/";
                $this->create_path = $this->destination . "/modules/";
            $this->send_type = "modules";
	    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		 if(!file_exists($this->destination . "/images/") && ($this->save_mode)) mkdir($this->destination . "/images/");
		 if(!file_exists($this->destination . "/images/icon/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/");
		 if(!file_exists($this->destination . "/images/icon/16x16/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/16x16/");
		 if(!file_exists($this->destination . "/images/icon/32x32/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/32x32/");
		 if(!file_exists($this->destination . "/images/icon/16x16/modules/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/16x16/modules/");
		 if(!file_exists($this->destination . "/images/icon/16x16/modules/auto/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/16x16/modules/auto/");
		 if(!file_exists($this->destination . "/images/icon/32x32/modules/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/32x32/modules/");
		 if(!file_exists($this->destination . "/images/icon/32x32/modules/auto/") && ($this->save_mode)) mkdir($this->destination . "/images/icon/32x32/modules/auto/");
	    if($this->output_type == "application_auto"){
            $this->send_type = "images";
// 		     cmr_copy(cmr_get_path("index") . "images/16x16.png", $this->destination . "/images/icon/16x16/modules/auto/" .  $this->form_name . ".png");
// 	    	 cmr_copy(cmr_get_path("index") . "images/32x32.png", $this->destination . "/images/icon/32x32/modules/auto/" .  $this->form_name . ".png");
        }
	    // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//                 break;
        }

                $file_path = $create_realpath . $this->form_name . ".php";

            if(!file_exists($this->create_path) && ($this->save_mode)) mkdir($this->create_path);
            if(!file_exists($create_realpath) && !($this->save_mode)) mkdir($create_realpath);
            if(!file_exists($create_realpath . "auto/") && !($this->save_mode)) mkdir($create_realpath . "auto/");

        if(!($this->save_mode)) return $create_realpath . "auto/";

        return $this->create_path;
    }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * $this->gen_correction()
     *
     * @param mixed $template
     * @return
     **/
    function gen_correction()
    {
        $this->work_model = cmr_search_replace(";[[:space:]]*\)|,[[:space:]]*\)|\.[[:space:]]*\)|\:[[:space:]]*\)", ")", $this->work_model);
        // $this->work_model=cmr_search_replace("\.[[:space:]]*\}|,[[:space:]]*\}|\.\:[[:space:]]*\}|;[[:space:]]*\}", "}", $this->work_model);
        $this->work_model = cmr_search_replace(";[[:space:]]*\]|,[[:space:]]*\]|\.[[:space:]]*\]|\:[[:space:]]*\]", "]", $this->work_model);
        // ========== correction ====================
        if(cmr_searchi("^get_|func_|class_", $this->form_name)){
            if(cmr_searchi("^get_|^preview_", $this->form_name)){
                $this->work_model = str_replace("<b>id: </b>\$id;<br />", "", $this->work_model);
                $this->work_model = str_replace("<b>id: </b>\$id\\n;", "", $this->work_model);
                $this->work_model = str_replace("<b>id: </b>\$id;", "", $this->work_model);

                $this->work_model = str_replace("<b>pw: </b>\$pw;<br />", "", $this->work_model);
                $this->work_model = str_replace("<b>pw: </b>\$pw\\n;", "", $this->work_model);
                $this->work_model = str_replace("<b>pw: </b>\$pw;", "", $this->work_model);
                $this->work_model = str_replace("print('<li><b>'.\$cmr->translate('id').':</b>'.\$val->id);", "", $this->work_model);
            }

            $this->work_model = str_replace("date_time = '\$date_time', ", "", $this->work_model);
            $this->work_model = str_replace("date_time,  ) values (  '\$id', ", "date_time  ) values (  '', ", $this->work_model);
            $this->work_model = str_replace(" '\$date_time',  );", " NOW()  );", $this->work_model);

            $this->work_model = str_replace("set   id = '\$id', ", "set   ", $this->work_model);
            $this->work_model = str_replace(" and id like ('%\$id%') ", "", $this->work_model);
            $this->work_model = str_replace("), );", "));", $this->work_model);
        }

        return $this->work_model;
    }
	    /**
	     * generate()
	     *
	     * @return
	     **/
		function generate()
		    {

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			if(empty($this->models_text)) return "";
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			$db_name = $this->dbms_name;
			$form_name = $this->form_name;
			$table_name = $this->table_name;
			$cmr_prefix = $this->prefix;
			$list_column = $this->list_column;
			$where = $this->where;
			$limit = $this->limit;
			$language = $this->language;
// 			$GLOBALS["dbms_pw"] = $this->dbms_pw;
// 			$GLOBALS["dbms_user"] = $this->dbms_user;
// 			$GLOBALS["dbms_port"] = $this->dbms_port;
// 			$GLOBALS["dbms_host"] = $this->dbms_host;
// 			$GLOBALS["dbms_type"] = $this->dbms_name;
// 			$GLOBALS["dbms_name"] = $this->dbms_name;
// 			$GLOBALS["limit"] = $this->limit;
// 			$GLOBALS["where"] = $this->where;
// 	        $GLOBALS["array_tables"] = $this->array_tables;
	        $GLOBALS["array_columns"] = $this->array_columns;
	        $GLOBALS["array_index"] = $this->array_index ;
	        $GLOBALS["array_calendar"] = array();
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			if(empty($this->dbms_name)) return preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $this->models_text);
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 			$this->short_table_name=cmr_searchi_replace("^" . $this->prefix, "", $this->table_name);
	        $this->work_model = $this->models_text;
	        $temp_str = stristr($this->work_model, "�_foreach_");
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	        if($temp_str){
	        while ($temp_str){
	            $choose = substr($temp_str, 10, 2);
	            $temp_str = substr($temp_str, 1);
	            $temp_str = stristr($temp_str, "�_foreach_");
	            // $output .= ("<br />--" . $choose . "--<br />");
	            switch ($choose){
                case "ct" : $this->work_model = preg_replace("/(�_foreach_comment_�)(.*)(��_foreach_comment_��)/seU", "", $this->work_model);
                    break;
                case "db" : $this->work_model = preg_replace("/(�_foreach_db_�)(.*)(��_foreach_db_��)/seU", "eval_db('\\2', '$cmr_prefix', '$form_name')", $this->work_model);
                    break;
                case "ta" : $this->work_model = preg_replace("/(�_foreach_table_�)(.*)(��_foreach_table_��)/seU", "eval_table('\\2', '$cmr_prefix', '$db_name',  '$form_name')", $this->work_model);
                    break;
                case "co" : $this->work_model = preg_replace("/(�_foreach_column_�)(.*)(��_foreach_column_��)/seU", "eval_column('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $this->work_model);
                    break;
                case "ro" : $this->work_model = preg_replace("/(�_foreach_rown_�)(.*)(��_foreach_rown_��)/seU", "eval_rowns_in_col('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $this->work_model);
	                    break;
	                default:break;
	            }
	        }
	        }

	        $this->work_model = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $this->work_model);
        	preg_replace("/(�_button_�)(.*)(��_button_��)/seU", "gen_image_save('\\2', '\\2')", $this->work_model);
// 			preg_replace("/(�_link_�)(.*)(��_link_��)/seU", "gen_link('\\2', '\\2')", $this->work_model);
	        // ========== correction ====================
	        $this->work_model = $this->gen_correction();
	        // ========== language ====================
	        if((!empty($this->config["cmr_generate_defaul_lang"])) && cmr_searchi("^lang_", $this->form_name))
	        $this->work_model = preg_replace("/([a-zA-Z][^ ]+)=([^\n]*)\n/eisU", "eval_lang('\\1', '\\2', '$language')", $this->work_model);
	        // ==========================================
	        // $output .= ("<br />******<br />".htmlentities($this->work_model)."<br />--<br />");
	        if(empty($this->work_model)) return $this->models_text;
	        $GLOBALS["array_columns"] = array();
	        $GLOBALS["array_index"] = array();
	        $GLOBALS["array_calendar"] = array();



	        return $this->work_model;
	        }
	  }
}
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
