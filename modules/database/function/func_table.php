<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/********************************************************************
 *        func_table.php
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



























func_table.php,Ver 3.0  2011-Nov-Wed 22:18:53
*/
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


/*=================================================================*/
if(!(function_exists("table_link_default"))){

    /**
     * table_link()
     *
     * @param mixed $val
     * @return
     **/
    function table_link_default($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
	    $table_id = $cmr_page["__column_id__"];
		$table_style = "";
        $table_link = "";
        
	    $table = $cmr_page["__table__"];
	    $num_view = $cmr_page["__number__"];
		$array_column = $cmr_page["__array_column__"];
        $column_id = $val[$table_id];
        
	        if($table_id){
	            $table_link = input_hidden("<input type=\"checkbox\" name=\"" . $cmr_page["_table_"] . "_check_" . $cmr_page["___number___"] . "\" value=\"" . $val[$table_id] . "\" />");
	            
	        $image1 = cmr_get_path("image") . "images/icon/readed_icon.png";
	        $image2 = cmr_get_path("image") . "images/icon/to_read_icon.png";
	        
	        if(in_array ($table_id, $GLOBALS[$cmr_page["_table_"] . "_read"])){
	            if($image1) $table_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
		            $table_style .= " class=\"readed\" ";
	        }else{
	            if($image2) $table_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
		            $table_style .= " class=\"unreaded\" ";
	        };
            
	        if((isset($GLOBALS["current_" . $cmr_page["_table_"] . "_id"])) && ($table_id == $GLOBALS["current_" . $cmr_page["_table_"] . "_id"])){
	            $table_style .= " class=\"current\" ";
	        }
	        
			$num=0;
	        foreach($val as $key => $value){
		        if(($num <= $cmr_page["__columns__"])&&($key != "_columns_")&&($key != "_column_id_")&&($key != "_date_time1")&&($key != "_table_")&&($key != "_database_"))
	            $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/preview_table.php?id_table=" . $val[$table_id], "", $value , "", "", "", $table_style);
	            $table_link .= "<br />";
				$num++;
            }
            
            if(isset($val[$val["_date_time1"]])) $table_link .= "[" . strval($val[$val["_date_time1"]]) . "] ";
            $table_link .= "<br />";
            

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . $cmr_page["_table_"] . "_check_" . $val[$table_id] . "@,@.*@,@10@;@");

            if(1){
                $table_link .= " [";
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=" . $table . "&line_id=" . $column_id, "", " [C] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=" . $table . "&line_id=" . $column_id, "", " [P] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/update_table.php?id_table=" . $val[$table_id], "", " [U] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/delete_table.php?id_table=" . $val[$table_id], "", " [D] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/preview_table.php?id_table=" . $val[$table_id], "", " [P] ", "", "", "", " class=\"link\" ");
                $table_link .= "]";
            }
        }
        return $table_link . "<br />";
    }
}
// ==========================@@@
// ==========================@@@
if(!(function_exists("table_link_tab"))){
    /**
     * " . $cmr_page["_table_"] . "_tab_link()
     *
     * @param mixed $val
     * @return
     **/
    function table_link_tab($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $table_link = "";
	    $table_style = "";
        $table_id = $cmr_page["__column_id__"];
        
	    $table = $cmr_page["__table__"];
	    $num_view = $cmr_page["__number__"];
		$array_column = $cmr_page["__array_column__"];

        if(!empty($val))
        if(!empty($val[$table_id])){
        $column_id = $val[$table_id];
            $table_link = "<td class=\"rown1\" >" . input_hidden("<input type=\"checkbox\" name=\"" . $cmr_page["_table_"] . "_check_" . $cmr_page["___number___"] . "\" value=\"" . $val[$table_id] . "\" />");

	        $image1 = cmr_get_path("image") . "images/icon/readed_icon.png";
	        $image2 = cmr_get_path("image") . "images/icon/to_read_icon.png";
	        
	        if(in_array ($table_id, $GLOBALS[$cmr_page["_table_"] . "_read"])){
	            if($image1) $table_link .= "<img alt=\">\" src=\"" . $image1 . "\" border=\"0\"  title=\"" . cmr_translate("unreaded")  . "\" />";
		            $table_style .= " class=\"readed\" ";
	        }else{
	            if($image2) $table_link .= "<img  alt=\"<\" src=\"" . $image2 . "\" border=\"0\"  title=\"" . cmr_translate("readed")  . "\" />";
		            $table_style .= " class=\"unreaded\" ";
	        };
            
	        $table_link .= "</td>";
	        if((isset($GLOBALS["current_" . $cmr_page["_table_"] . "_id"])) && ($table_id == $GLOBALS["current_" . $cmr_page["_table_"] . "_id"])){
	            $table_style .= " class=\"current\" ";
	        }
	        
			$num=0;
	        foreach($val as $key => $value){
		        		        
                $text_empty = "";
                $text_full =  code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/preview_table.php?id_table=" . $val[$table_id], "", htmlentities(trim(substr($value, 0, 20))), "", "", "middle1", $table_style);
                if($cmr_page["__mode__"] == "link_print") $text_full =  htmlentities($value);
                if($cmr_page["__mode__"] == "link_update"){
	                $text_full =  "<input type=\"text\" size=\"20\" name=\"" . $table . "_" . $num_view . "_table\" value=\"" . htmlentities($value) . "\" >";
	                $text_empty = "<input type=\"text\" name=\"" . $table . "_" . $num_view . "_table\" value=\"\"  size=\"20\">";
                }
		        
		        
		        if(($num <= $cmr_page["__columns__"])&&($key != "_columns_")&&($key != "_column_id_")&&($key != "_date_time1")&&($key != "_table_")&&($key != "_database_"))
                if((!empty($value) || ($value == 0)) && ($value != null)){
                    $table_link .= "<td class=\"rown" . ($num % 2 + 1) . "\">" . $text_full . "</td>";
                }else{
                    $table_link .= "<td class=\"rown" . ($num % 2 + 1) . "\" >" . $text_empty . "</td>";
                }
			$num++;
            }
            

            $table_link .= "<td class=\"rown2\" >" . strval($val[$val["_date_time1"]]) . "</td>";

            cmr_set_session("pre_match",  cmr_get_session("pre_match") . $cmr_page["_table_"] . "_check_" . $cmr_page["___number___"] . "@,@.*@,@10@;@");

            $table_link .= "<td class=\"rown1\" >";
        	if($cmr_page["__mode__"] != "link_print"){
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=" . $table . "&line_id=" . $column_id, "", " [C] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=" . $table . "&line_id=" . $column_id, "", " [P] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/update_table.php?id_table=" . $table_id, "", " [U] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/delete_table.php?id_table=" . $table_id, "", " [D] ", "", "", "", " class=\"link\" ");
                $table_link .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/preview_table.php?id_table=" . $table_id, "", " [P] ", "", "", "", " class=\"link\" ");
            }
            $table_link .= "</td>";
        }
        return "<tr>" . $table_link . "</tr>";
    }
}
// ==========================@@@
// ==========================@@@
if(!(function_exists("table_link_detail"))){
    /**
     * table_link_detail()
     *
     * @param mixed $val
     * @return
     **/
    function table_link_detail($cmr_config = array(), $cmr_page = array(), $cmr_language = array(), $val)
    {
        $table_id = $cmr_page["__column_id__"];
        
	    $table = $cmr_page["__table__"];
	    $num_view = $cmr_page["__number__"];
		$array_column = $cmr_page["__array_column__"];
        $column_id = $val[$table_id];

        $table_link_d = table_link_default($cmr_config, $cmr_page, $cmr_language, $val);
        $table_link_d .= "<br /> ["; 
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_comment.php?table_name=" . $table . "&line_id=" . $column_id, "", " [C] ", "", "", "", " class=\"link\" ");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/new_policy.php?table_name=" . $table . "&line_id=" . $column_id, "", " [P] ", "", "", "", " class=\"link\" ");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/update_table.php?id_table=" . $val[$table_id], "", "<b class=\"link\">" . $cmr_language["update"] . "</b>");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/preview_table.php?id_table=" . $val[$table_id], "", "<b class=\"link\">" . $cmr_language["print"] . "</b>");
        $table_link_d .= " - ";
        $table_link_d .= code_link($cmr_config, $cmr_page, $cmr_language, "modules/database/delete_table.php?id_table=" . $val[$table_id], "", "<b class=\"link\">" . $cmr_language["delete"] . "</b>");
        $table_link_d .= "]";
        return "<p align=\"left\">" . $table_link_d . "</p>";
    }
}
// ==========================@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * print_collation()
     *
     * @param $cmr_language
     * @param $array_value1
     * @param $array_value2
     * @return
     **/
if(!function_exists("print_collation")){
    function print_collation($cmr_collation = "", $cmr_collation_title = "")
    {
	    $array_col1 = explode(";", $cmr_collation);
	    $array_col2 = explode(";", $cmr_collation_title);
	    foreach($array_col1 as $key => $value) $array_value1[] = substr($value, 0, strpos($value, ","));
	    foreach($array_col2 as $key => $value) $array_value2[] = substr($value, 0, strpos($value, ","));
	    
	    
	    $cmr_language["cmr_alphabet"] = implode(",", $array_value2);
        return select_order($cmr_language, $array_value1,  $array_value1);
    }
}
// ==========================@@@@@@@@@@@@@@@@@@@@@@@@@@
// ==========================@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * database_connect()
     *
     * @param  $conn
     * @param  $db_conn
     * @param array $cmr_db
     * @return
     **/
if(!function_exists("database_connect")){
    function database_connect($conn, $db_conn, $cmr_db = array())
    {
		if(empty($db_conn)) $db_conn = NewADOConnection($cmr_db["db_type"]);
		if(!empty($cmr_db["db_name"])) $db_conn->Connect($cmr_db["db_host"], $cmr_db["db_user"], $cmr_db["db_pw"], $cmr_db["db_name"]) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $db_conn->ErrorMsg());
		if(empty($db_conn)) $db_conn = $conn;
        return $db_conn;
    };
 }
    // ==========================
    // ==========================

    /**
     * is_id_column()
     *
     * @param array $columns
     * @return
     **/
if(!function_exists("is_id_column")){
    function is_id_column($columns = array())
    {
        return (cmr_searchi("pri", $columns["Key"]) || cmr_searchi("auto_increment", $columns["Extra"]) || ($columns["Extra"] = "Field"));
    };
 }
    // ==========================
    // ==========================
    /**
     * is_date_time_column()
     *
     * @param array $columns
     * @return
     **/
if(!function_exists("is_date_time_column")){
    function is_date_time_column($columns = array())
    {
        return (cmr_searchi("date|time|date_time|year", $columns["Field"]));
    };
 }
    // ==========================
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * column_id()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
if(!function_exists("column_id")){
    function column_id($array_columns = array(), $numero = "1")
    {
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_id_column($template)){
                if($count >= $numero) return $template["Field"];
                $count++;
            }
        }
        return $template["Field"];
    };
 }
    // ==========================
    // ==========================
    /**
     * column_date_time( )
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
if(!function_exists("column_date_time")){
    function column_date_time($array_columns = array(), $numero = "1")
    {
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_date_time_column($template)){
                if($count >= $numero) return $template["Field"];
                $count++;
            }
        }
        return $template["Field"];
    };
 }
    // ==========================
    // ==========================
    /**
     * type_column()
     *
     * @param array $columns
     * @return
     **/
if(!function_exists("type_column")){
    function type_column($columns = array())
    {
	if(empty($columns["Type"])) $columns["Type"] = "INT";
        $pst = strpos($columns["Type"], "(");

        if($pst){
            return strtolower(substr($columns["Type"], 0, $pst));
        }else{
            return strtolower($columns["Type"]);
        }
    };
 }
    // ==========================
if(!function_exists("print_column")){
    function print_column($columns = array(), $name_column = "", $value_column = "", $table_name = "")
    {
        switch (type_column($columns)){
            case "tinytext":
            case "mediumtext":
            case "longtext":
            case "blob":
            case "tinyblob":
            case "mediumblob":
            case "longblob":
            case "text":
                $form_elmt = "<textarea rows=\"8\" cols=\"40\" name=\"" . $name_column . "\" id=\"" . $name_column . "\" onfocus=\"this.select()\" >" . $value_column . "</textarea>";
            break;


            case "time":
            case "timestamp":
            case "date":
            case "datetimes":
            case "date_times":
                    $form_elmt = "<input type=\"text\" value=\"" . $value_column . "\" id=\"date_time_" . $name_column . "\" name=\"" . $name_column . "\" onclick=\"large_id('" . $table_name. "," . $name_column . "')\" onfocus=\"this.select()\" />";
//                     $form_elmt .= "<button id=\"button_$name_column" . $name_column . "\">...</button>";
                    $GLOBALS["array_calendar"][] = $name_column;
                
            break;
            
            case "set":
            case "enum":
//                     $form_elmt = "<select name=\"" . $name_column . "\" id=\"" . $name_column . "\"  onclick=\"large_id('" . $table_name . "," . $name_column . "')\">" . "<option selected value=\"" . $value_column . "\">" . $value_column . "</option>";
//                     $form_elmt .= cmrprint_select($table_name, "" . $name_column . "", "type");
//                     cmr_print_select($cmr_config = array(), $cmr_language = array(), $conn, $table = "cmr_user", $column = "name", $action = "type", $db_name = "mysql")
//                     $form_elmt .= "</select>" . $cmr->module_link("modules/change_type.php?table_name=" . $table_name . "&column_name=" . $name_column, "", "->");
//             break;
            default;
                    $form_elmt = "<input type=\"text\" value=\"" . $value_column . "\" id=\"" . $name_column . "\" name=\"" . $name_column . "\" onclick=\"large_id('" . $table_name. "," . $name_column . "')\" onfocus=\"this.select()\" />";
            break;
    };
    return $form_elmt;
    };
 }
    // ==========================
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_menu_db"))){
    /**
     * cmr_preview_sql()
     *
     * @param array $conn
     * @return
     **/
function cmr_menu_db($conn, $result_type = "", $current_database = "", $current_table = "", $current_column = "")
{
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$menustring = "<ul class=\"cmr_menu\">";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/login_db.php\">" . cmr_translate("Login") . "</a>" . "</li>";
	$menustring .= "<li>"; 
	$menustring .= "<a href=\"index.php?module_name=modules/database/databases.php\"><b>" . cmr_translate("DATABASE") . "</b></a>";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$menustring .= "<ul>";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$object_database = (sql_run("array", $conn, "show_databases"));
	if(!empty($object_database))
	foreach($object_database[0] as $val_database){
		$menustring .= "<li>"; 
		$menustring .= "<a href=\"index.php?module_name=modules/database/tables.php&current_database=" . $val_database . "\">[<b>" . strtoupper($val_database) . "]</b></a>";
		if($current_database == $val_database){
		$object_tables = sql_run("array", $conn, $action = "show_tables", "", $val_database);
		$menustring .= "<ul>";
		if(!empty($object_tables))
		foreach($object_tables[0] as $val_tables){
			$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/columns.php&current_table=" . $val_tables . "&current_database=" . $val_database . "\">" . $val_tables . "</a>" . "</li>";
// 			if($current_table == $val_tables){
// 			$object_columns = sql_run("array", $conn, $action = "show_columns", "", $val_database, $val_tables);
// 			$menustring .= "<ul>";
// 			foreach($object_columns[0] as $val_columns){
// 			$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/update_columns.php&current_columns=" . $val_columns . "&current_table=" . $val_tables . "&current_database=" . $val_database . "\">" . $val_columns . "</a>" . "</li>";
// 			}
// 			$menustring .= "</ul>";
// 			}
		}
		$menustring .= "</ul>";
		}
		$menustring .= "</li>";
	}
		$menustring .= "</ul>";
		$menustring .= "</li>";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$menustring .= "<li>";
	$menustring .= "<a href=\"index.php?module_name=modules/database/login_db.php\"><b>" . cmr_translate("DB settings") . "</b></a>";
	$menustring .= "<ul>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW PRIVILEGES;&sql_xml=0\">" . cmr_translate("PRIVILEGES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW GRANTS;&sql_xml=0\">" . cmr_translate("GRANTS") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW OPEN TABLES ;&sql_xml=0\">" . cmr_translate("OPEN TABLES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW TRIGGERS;&sql_xml=0\">" . cmr_translate("TRIGGERS") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW PROCESSLIST;&sql_xml=0\">" . cmr_translate("PROCESSLIST") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW ERRORS;&sql_xml=0\">" . cmr_translate("ERRORS") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW WARNINGS;&sql_xml=0\">" . cmr_translate("WARNINGS") . "</a>" . "</li>";
// 	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW PROFILES ALL;&sql_xml=0\">" . cmr_translate("PROFILES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SET profiling = 1;&sql_xml=0\">" . cmr_translate("PROFILES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW VARIABLES;&sql_xml=0\">" . cmr_translate("VARIABLES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW CHARACTER SET;&sql_xml=0\">" . cmr_translate("CHARACTER") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW COLLATION;&sql_xml=0\">" . cmr_translate("COLLATION") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW ENGINES;&sql_xml=0\">" . cmr_translate("ENGINES") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW MUTEX STATUS;&sql_xml=0\">" . cmr_translate("MUTEX") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SHOW STATUS;&sql_xml=0\">" . cmr_translate("STATUS") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SELECT VERSION();&sql_xml=1\">" . cmr_translate("VERSION") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/database/result_sql.php&sql=SELECT NOW();&sql_xml=1\">" . cmr_translate("Date") . "</a>" . "</li>";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$menustring .= "</ul>";
	$menustring .= "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?module_name=modules/admin/config_all.php?file_name=modules/database/conf.d/conf_table.ini\">" . cmr_translate("Config") . "</a>" . "</li>";
	$menustring .= "<li>" . "<a href=\"index.php?conf=exit\">" . cmr_translate("Exit") . "</a>" . "</li>";
	$menustring .= "</ul>";
	return $menustring;
	} 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_db_init_data"))){
    /**
     * cmr_db_init_data()
     *
     * @param array $conn
     * @return
     **/
function cmr_db_init_data($cmr_db_connection, $cmr_config = array(), $cmr_post_var = array(), $cmr_db = array(), $result_type = "")
{
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$val_table = array();
	if(empty($cmr_post_var["current_dbms"])) $cmr_post_var["current_dbms"] = $cmr_config["db_type"];
	$database = $cmr_post_var["current_database"];
	$table_name = $cmr_post_var["current_table"];
	$val_table["_database_"] = $database;
	$val_table["_table_"] = $table_name;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	if(empty($database_conn)) $database_conn = NULL;
	$database_conn = database_connect($cmr_db_connection, $database_conn, $cmr_db);
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$the_columns = get_all_columns($database_conn, "", $database . "." . $table_name);
	if($the_columns)
	foreach($the_columns as $one_columns) $all_columns[0][] = $one_columns["Field"];
	$all_columns[1] = $the_columns;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$array_columns = $all_columns[0];
	$column_id = column_id($all_columns[1]);
	$_date_time1 = column_date_time($all_columns[1]);
	$val_table["_column_id_"] = $column_id;
	$val_table["_date_time1"] = $_date_time1;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$data["val_table"] = $val_table;
	$data["column_id"] = $column_id;
	$data["_date_time1"] = $_date_time1;
	$data["database_conn"] = $database_conn;
	$data["database"] = $database;
	$data["table_name"] = $table_name;
	$data["array_columns"] = $array_columns;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	return $data;
	} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("get_data_table"))){
    /**
     * get_data_table()
     *
     * @param array $data_table
     * @return
     **/
function get_data_table($table_name, $table_name, $data_table = array())
{
	return $table_name;
	} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_new_table"))){
    /**
     * cmr_sql_new_table()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_new_table($table_name, $data_column = array())
{
// CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name
//     (create_definition,...)
//     [table_options]
//     [partition_options]

// Or:

// CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name
//     [(create_definition,...)]
//     [table_options]
//     [partition_options]
//     select_statement

// Or:

// CREATE [TEMPORARY] TABLE [IF NOT EXISTS] tbl_name
//     { LIKE old_tbl_name | (LIKE old_tbl_name) }

// create_definition:
//     col_name column_definition
//   | [CONSTRAINT [symbol]] PRIMARY KEY [index_type] (index_col_name,...)
//       [index_option] ...
//   | {INDEX|KEY} [index_name] [index_type] (index_col_name,...)
//       [index_option] ...
//   | [CONSTRAINT [symbol]] UNIQUE [INDEX|KEY]
//       [index_name] [index_type] (index_col_name,...)
//       [index_option] ...
//   | {FULLTEXT|SPATIAL} [INDEX|KEY] [index_name] (index_col_name,...)
//       [index_option] ...
//   | [CONSTRAINT [symbol]] FOREIGN KEY
//       [index_name] (index_col_name,...) reference_definition
//   | CHECK (expr)

// column_definition:
//     data_type [NOT NULL | NULL] [DEFAULT default_value]
//       [AUTO_INCREMENT] [UNIQUE [KEY] | [PRIMARY] KEY]
//       [COMMENT 'string']
//       [COLUMN_FORMAT {FIXED|DYNAMIC|DEFAULT}]
//       [STORAGE {DISK|MEMORY|DEFAULT}]
//       [reference_definition]

// data_type:
//     BIT[(length)]
//   | TINYINT[(length)] [UNSIGNED] [ZEROFILL]
//   | SMALLINT[(length)] [UNSIGNED] [ZEROFILL]
//   | MEDIUMINT[(length)] [UNSIGNED] [ZEROFILL]
//   | INT[(length)] [UNSIGNED] [ZEROFILL]
//   | INTEGER[(length)] [UNSIGNED] [ZEROFILL]
//   | BIGINT[(length)] [UNSIGNED] [ZEROFILL]
//   | REAL[(length,decimals)] [UNSIGNED] [ZEROFILL]
//   | DOUBLE[(length,decimals)] [UNSIGNED] [ZEROFILL]
//   | FLOAT[(length,decimals)] [UNSIGNED] [ZEROFILL]
//   | DECIMAL[(length[,decimals])] [UNSIGNED] [ZEROFILL]
//   | NUMERIC[(length[,decimals])] [UNSIGNED] [ZEROFILL]
//   | DATE
//   | TIME
//   | TIMESTAMP
//   | DATETIME
//   | YEAR
//   | CHAR[(length)]
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | VARCHAR(length)
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | BINARY[(length)]
//   | VARBINARY(length)
//   | TINYBLOB
//   | BLOB
//   | MEDIUMBLOB
//   | LONGBLOB
//   | TINYTEXT [BINARY]
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | TEXT [BINARY]
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | MEDIUMTEXT [BINARY]
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | LONGTEXT [BINARY]
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | ENUM(value1,value2,value3,...)
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | SET(value1,value2,value3,...)
//       [CHARACTER SET charset_name] [COLLATE collation_name]
//   | spatial_type

// index_col_name:
//     col_name [(length)] [ASC | DESC]

// index_type:
//     USING {BTREE | HASH}

// index_option:
//     KEY_BLOCK_SIZE [=] value
//   | index_type
//   | WITH PARSER parser_name

// reference_definition:
//     REFERENCES tbl_name (index_col_name,...)
//       [MATCH FULL | MATCH PARTIAL | MATCH SIMPLE]
//       [ON DELETE reference_option]
//       [ON UPDATE reference_option]

// reference_option:
//     RESTRICT | CASCADE | SET NULL | NO ACTION

// table_options:
//     table_option [[,] table_option] ...

// table_option:
//     ENGINE [=] engine_name
//   | AUTO_INCREMENT [=] value
//   | AVG_ROW_LENGTH [=] value
//   | [DEFAULT] CHARACTER SET [=] charset_name
//   | CHECKSUM [=] {0 | 1}
//   | [DEFAULT] COLLATE [=] collation_name
//   | COMMENT [=] 'string'
//   | CONNECTION [=] 'connect_string'
//   | DATA DIRECTORY [=] 'absolute path to directory'
//   | DELAY_KEY_WRITE [=] {0 | 1}
//   | INDEX DIRECTORY [=] 'absolute path to directory'
//   | INSERT_METHOD [=] { NO | FIRST | LAST }
//   | KEY_BLOCK_SIZE [=] value
//   | MAX_ROWS [=] value
//   | MIN_ROWS [=] value
//   | PACK_KEYS [=] {0 | 1 | DEFAULT}
//   | PASSWORD [=] 'string'
//   | ROW_FORMAT [=] {DEFAULT|DYNAMIC|FIXED|COMPRESSED|REDUNDANT|COMPACT}
//   | TABLESPACE tablespace_name [STORAGE {DISK|MEMORY|DEFAULT}]
//   | UNION [=] (tbl_name[,tbl_name]...)

// partition_options:
//     PARTITION BY
//         { [LINEAR] HASH(expr)
//         | [LINEAR] KEY(column_list)
//         | RANGE(expr)
//         | LIST(expr) }
//     [PARTITIONS num]
//     [SUBPARTITION BY
//         { [LINEAR] HASH(expr)
//         | [LINEAR] KEY(column_list) }
//       [SUBPARTITIONS num]
//     ]
//     [(partition_definition [, partition_definition] ...)]

// partition_definition:
//     PARTITION partition_name
//         [VALUES 
//             {LESS THAN {(expr) | MAXVALUE} 
//             | 
//             IN (value_list)}]
//         [[STORAGE] ENGINE [=] engine_name]
//         [COMMENT [=] 'comment_text' ]
//         [DATA DIRECTORY [=] 'data_dir']
//         [INDEX DIRECTORY [=] 'index_dir']
//         [MAX_ROWS [=] max_number_of_rows]
//         [MIN_ROWS [=] min_number_of_rows]
//         [TABLESPACE [=] tablespace_name]
//         [NODEGROUP [=] node_group_id]
//         [(subpartition_definition [, subpartition_definition] ...)]

// subpartition_definition:
//     SUBPARTITION logical_name
//         [[STORAGE] ENGINE [=] engine_name]
//         [COMMENT [=] 'comment_text' ]
//         [DATA DIRECTORY [=] 'data_dir']
//         [INDEX DIRECTORY [=] 'index_dir']
//         [MAX_ROWS [=] max_number_of_rows]
//         [MIN_ROWS [=] min_number_of_rows]
//         [TABLESPACE [=] tablespace_name]
//         [NODEGROUP [=] node_group_id]

// select_statement:
//     [IGNORE | REPLACE] [AS] SELECT ...   (Some legal select statement)
	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_alter_table"))){
    /**
     * cmr_sql_alter_table()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_alter_table($table_name, $data_column1 = array(), $data_column2 = array())
{
// ALTER [ONLINE | OFFLINE] [IGNORE] TABLE tbl_name
//     alter_specification [, alter_specification] ...

// alter_specification:
//     table_options
//   | ADD [COLUMN] col_name column_definition
//         [FIRST | AFTER col_name ]
//   | ADD [COLUMN] (col_name column_definition,...)
//   | ADD {INDEX|KEY} [index_name]
//         [index_type] (index_col_name,...) [index_option] ...
//   | ADD [CONSTRAINT [symbol]] PRIMARY KEY
//         [index_type] (index_col_name,...) [index_option] ...
//   | ADD [CONSTRAINT [symbol]]
//         UNIQUE [INDEX|KEY] [index_name]
//         [index_type] (index_col_name,...) [index_option] ...
//   | ADD FULLTEXT [INDEX|KEY] [index_name]
//         (index_col_name,...) [index_option] ...
//   | ADD SPATIAL [INDEX|KEY] [index_name]
//         (index_col_name,...) [index_option] ...
//   | ADD [CONSTRAINT [symbol]]
//         FOREIGN KEY [index_name] (index_col_name,...)
//         reference_definition
//   | ALTER [COLUMN] col_name {SET DEFAULT literal | DROP DEFAULT}
//   | CHANGE [COLUMN] old_col_name new_col_name column_definition
//         [FIRST|AFTER col_name]
//   | MODIFY [COLUMN] col_name column_definition
//         [FIRST | AFTER col_name]
//   | DROP [COLUMN] col_name
//   | DROP PRIMARY KEY
//   | DROP {INDEX|KEY} index_name
//   | DROP FOREIGN KEY fk_symbol
//   | DISABLE KEYS
//   | ENABLE KEYS
//   | RENAME [TO] new_tbl_name
//   | ORDER BY col_name [, col_name] ...
//   | CONVERT TO CHARACTER SET charset_name [COLLATE collation_name]
//   | [DEFAULT] CHARACTER SET [=] charset_name [COLLATE [=] collation_name]
//   | DISCARD TABLESPACE
//   | IMPORT TABLESPACE
//   | partition_options
//   | ADD PARTITION (partition_definition)
//   | DROP PARTITION partition_names
//   | COALESCE PARTITION number
//   | REORGANIZE PARTITION [partition_names INTO (partition_definitions)]
//   | ANALYZE PARTITION  {partition_names | ALL }
//   | CHECK PARTITION  {partition_names | ALL }
//   | OPTIMIZE PARTITION  {partition_names | ALL }
//   | REBUILD PARTITION  {partition_names | ALL }
//   | REPAIR PARTITION  {partition_names | ALL }
//   | PARTITION BY partitioning_expression
//   | REMOVE PARTITIONING

// index_col_name:
//     col_name [(length)] [ASC | DESC]

// index_type:
//     USING {BTREE | HASH}

// index_option:
//     KEY_BLOCK_SIZE [=] value
//   | index_type
//   | WITH PARSER parser_name

// table_options:
//     table_option [[,] table_option] ...  (see CREATE TABLE options)
// 	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_copy_table"))){
    /**
     * cmr_sql_copy_table()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_copy_table($table_name1, $table_name2, $data_column = array())
{
 // CREATE TABLE `cd`.`er` (
// `er` int( 11 ) NOT NULL ,
// `as` int( 11 ) NOT NULL
// ) ENGINE = MYISAM DEFAULT CHARSET = latin1;

// INSERT INTO `cd`.`er`
// SELECT *
// FROM `test`.`er` ;

	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_copy_db"))){
    /**
     * cmr_sql_copy_db()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_copy_db($db_name1, $db_name2, $list_table = array())
{
// CREATE DATABASE `cd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

// CREATE TABLE `cd`.`er` (
// `er` int( 11 ) NOT NULL ,
// `as` int( 11 ) NOT NULL
// ) ENGINE = MYISAM DEFAULT CHARSET = latin1;

// INSERT INTO `cd`.`er`
// SELECT *
// FROM `test`.`er` ;
 
	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_grand_privilege"))){
    /**
     * cmr_sql_grand_privilege()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_grand_privilege($user, $host, $password, $db_name = array(), $table_name = array(), $data_privilege = array())
{
// GRANT
//     priv_type [(column_list)]
//       [, priv_type [(column_list)]] ...
//     ON [object_type] priv_level
//     TO user [IDENTIFIED BY [PASSWORD] 'password']
//         [, user [IDENTIFIED BY [PASSWORD] 'password']] ...
//     [REQUIRE {NONE | ssl_option [[AND] ssl_option] ...}]
//     [WITH with_option ...]
// 
// object_type:
//     TABLE
//   | FUNCTION
//   | PROCEDURE
// 
// priv_level:
//     *
//   | *.*
//   | db_name.*
//   | db_name.tbl_name
//   | tbl_name
//   | db_name.routine_name
// 
// ssl_option:
//     SSL
//   | X509
//   | CIPHER 'cipher'
//   | ISSUER 'issuer'
//   | SUBJECT 'subject'
// 
// with_option:
//     GRANT OPTION
//   | MAX_QUERIES_PER_HOUR count
//   | MAX_UPDATES_PER_HOUR count
//   | MAX_CONNECTIONS_PER_HOUR count
//   | MAX_USER_CONNECTIONS count
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_create_function"))){
    /**
     * cmr_sql_create_function()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_create_function($name, $data = array())
{
// CREATE
//     [DEFINER = { user | CURRENT_USER }]
//     PROCEDURE sp_name ([proc_parameter[,...]])
//     [characteristic ...] routine_body

// CREATE
//     [DEFINER = { user | CURRENT_USER }]
//     FUNCTION sp_name ([func_parameter[,...]])
//     RETURNS type
//     [characteristic ...] routine_body

// proc_parameter:
//     [ IN | OUT | INOUT ] param_name type

// func_parameter:
//     param_name type

// type:
//     Any valid MySQL data type

// characteristic:
//     COMMENT 'string'
//   | LANGUAGE SQL
//   | [NOT] DETERMINISTIC
//   | { CONTAINS SQL | NO SQL | READS SQL DATA | MODIFIES SQL DATA }
//   | SQL SECURITY { DEFINER | INVOKER }

// routine_body:
//     Valid SQL routine statement
 
	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(function_exists("cmr_sql_create_trigger"))){
    /**
     * cmr_sql_create_trigger()
     *
     * @param array $conn
     * @return
     **/
function cmr_sql_create_trigger($name, $event = array(), $data = array())
{
// CREATE
//     [DEFINER = { user | CURRENT_USER }]
//     TRIGGER trigger_name trigger_time trigger_event
//     ON tbl_name FOR EACH ROW trigger_body
	
	return $sql_string;
} 
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>