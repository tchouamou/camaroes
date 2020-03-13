<?php
/**
 * func_generators.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























func_generators.php, Ver 3.03 
*/


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// /**
//  * gen_model_array($cmr_config)
//  *
//  * @return
//  **/
// if(!function_exists("gen_model_array")){
// function gen_model_array($cmr_config = array())
// {
//     if(!empty($cmr_config["gen_model_array"])){
//     return array_map("trim", explode(",", $cmr_config["gen_model_array"]));
//     }
// 
//     $a = array(
//         "new",
//         "update",
//         "delete",
//         "search",
//         "preview",
//         "view",
//         "view_all",
//         "view_info",
//         "report",
//         "view_report",
//         "menu",
//         "config",
//         "export",
//         "import",
//         "conf_new",
//         "conf_update",
//         "conf_delete",
//         "conf_search",
//         "conf_preview",
//         "conf_view",
//         "conf_all",
//         "conf_info",
//         "conf_report",
//         "conf_report",
//         "conf_menu",
//         "conf_config",
//         "conf_export",
//         "conf_import",
//         "func",
//         "class",
//         "help",
//         "lang",
//         "notify_new",
//         "notify_update",
//         "notify_delete",
//         "notify_search",
//         "notify_view",
//         "notify_report",
//         "notify_import",
//         "notify_export",
//         "notify_config",
//         "template",
//         "get_new",
//         "get_update",
//         "get_delete",
//         "get_search",
//         "get_view",
//         "get_report",
//         "get_import",
//         "get_export",
//         "get_config",
//         "button"
//         );
// 
//     return $a;
// };
// 
// }//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// function move_to_auto($source="./", $dest="./auto", $file=""){
//         print("<br />trying move ".$source.$file.", to ".$dest.$file);
//     if(file_exists($source.$file)){
//         unlink($dest.$file);
//      if(copy($source.$file, $dest.$file)){
//         unlink($source.$file);
//         print("<br />move ".$source.$file.", to ".$dest.$file);
//         return rename($source.$file , $dest.$file);
//      }
//  }
// return false;
// }
//  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    /**
     * is_id_column()
     *
     * @param array $columns
     * @return
     **/
    function is_id_column($columns = array())
    {
        return (cmr_searchi("pri", $columns["Key"]) || cmr_searchi("auto_increment", $columns["Extra"]) || ($columns["Extra"] = "Field"));
    };
    // ==========================
    /**
     * is_null_column()
     *
     * @param array $columns
     * @return
     **/
    function is_null_column($columns = array())
    {
        return (cmr_searchi("yes", $columns["Null"]));
    }
    // ==========================
    /**
     * is_index_column()
     *
     * @param array $columns
     * @return
     **/
    function is_index_column($columns = array())
    {
        return (cmr_searchi("pri", $columns["Key"]) || cmr_searchi("auto_increment", $columns["Extra"]));
    };
    // ==========================
    /**
     * is_key_column()
     *
     * @param array $columns
     * @return
     **/
    function is_key_column($columns = array())
    {
        return (cmr_searchi("pri", $columns["Key"]));
    };
    // ==========================
    /**
     * is_text_column()
     *
     * @param array $columns
     * @return
     **/
    function is_text_column($columns = array())
    {
        return (($columns["Field"] == "email_text") || ($columns["Field"] == "text") || cmr_searchi("text|blob|tinyblob|tinytext", $columns["Type"]));
    };
    // ==========================
    /**
     * is_int_column()
     *
     * @param array $columns
     * @return
     **/
    function is_int_column($columns = array())
    {
        return (cmr_searchi("int|decimal|float|double|binary|tinyint", $columns["Type"]));
    };
    // ==========================
    /**
     * is_comment_column( )
     *
     * @param array $columns
     * @return
     **/
    function is_comment_column($columns = array())
    {
        return (cmr_searchi("comment", $columns["Field"]));
    };
    // ==========================
    /**
     * is_set_column()
     *
     * @param array $columns
     * @return
     **/
    function is_set_column($columns = array())
    {
        return (cmr_searchi("set(|enum(", $columns["Type"]));
    };
    // ==========================
    /**
     * is_password_column()
     *
     * @param array $columns
     * @return
     **/
    function is_password_column($columns = array())
    {
        return (cmr_searchi("pwd|passw|pw|password", $columns["Field"]));
    };
    // ==========================
    /**
     * is_auto_increment_column()
     *
     * @param array $columns
     * @return
     **/
    function is_auto_increment_column($columns = array())
    {
        return (cmr_searchi("auto_increment", $columns["Extra"]));
    };
    // ==========================
    /**
     * is_date_time_column()
     *
     * @param array $columns
     * @return
     **/
    function is_date_time_column($columns = array())
    {
        return (cmr_searchi("date|time|date_time|year", $columns["Field"]));
    };
    // ==========================
    /**
     * is_extern_column()
     *
     * @param array $columns
     * @return
     **/
    function is_extern_column($columns = array())
    {
        return (cmr_searchi("foreign", $columns["Type"]) || cmr_searchi("extern_", $columns["Default"]));
    };
    // ==========================
    /**
     * is_unsigned_column()
     *
     * @param array $columns
     * @return
     **/
    function is_unsigned_column($columns = array())
    {
        return (cmr_searchi("unsigned", $columns["Extra"]));
    };
    // ==========================
    /**
     * is_multiple_key_column()
     *
     * @param array $columns
     * @return
     **/
    function is_multiple_key_column($columns = array())
    {
        return (cmr_searchi("multiple_key", $columns["Extra"]));
    };
    // ==========================
    /**
     * is_zerofill_column()
     *
     * @param array $columns
     * @return
     **/
    function is_zerofill_column($columns = array())
    {
        return (cmr_searchi("multiple_key", $columns["Extra"]));
    };
    // ==========================
    /**
     * len_column()
     *
     * @param array $columns
     * @return
     **/
    function len_column($columns = array())
    {
        if(cmr_searchi("int|date|time|double|decimal|year", type_column($columns))){
            return 30;
        }

        if(type_column($columns) == "char"){
            return 1;
        }

        $col_len = substr(strpos($columns["Type"], "("), strpos($columns["Type"], ")") - strpos($columns["Type"], "("), $columns["Type"]);
        if($col_len){
            if($col_len < 20){
                return 20;
            }

            if($col_len > 40){
                return 40;
            }
        }else{
            return 10000;
        }
        return 254;
    };
    // ==========================
    /**
     * table_extern_column()
     *
     * @param array $columns
     * @return
     **/
    function table_extern_column($cmr_prefix="cmr_", $columns = array())
    {
        if(cmr_searchi("extern_", $columns["Default"])){
            return $cmr_prefix . str_replace("extern_", "", $columns["Default"]);
        }else{
            return $cmr_prefix . str_replace("extern_", "", $columns["Default"]);
            list($str1, $str2, $str3) = explode(")", $columns["Type"]);
            $return_val = cmr_searchi_replace( "REFERENCES ", "", $str2);
            list($str1, $str2) = explode("(", $return_val);

            return trim($str1) . "." . trim($str2);
            // FOREIGN KEY (reviewingid) REFERENCES reviewing (reviewingid) on delete cascade
        }
        return "";
    };
    // ==========================
    /**
     * type_column()
     *
     * @param array $columns
     * @return
     **/
    function type_column($columns = array())
    {
        $pst = strpos($columns["Type"], "(");

        if($pst){
            return strtolower(substr($columns["Type"], 0, $pst));
        }else{
            return strtolower($columns["Type"]);
        }
    };
    // ==========================
    /**
     * name_column()
     *
     * @param array $columns
     * @return
     **/
    function name_column($columns = array())
    {
        return $columns["Field"];
    };
    // ==========================
    /**
     * default_column()
     *
     * @param array $columns
     * @return
     **/
    function default_column($columns = array())
    {
        return $columns["Default"];
    };
    // ==========================
    /**
     * comment_column()
     *
     * @param array $columns
     * @return
     **/
    function comment_column($columns = array())
    {
        return $columns["Comment"];
    };
    // ==========================
    /**
     * privileges_column()
     *
     * @param array $columns
     * @return
     **/
    function privileges_column($columns = array())
    {
        return $columns["Privileges"];
    };
    // ==========================
    /**
     * flags_column()
     *
     * @param array $columns
     * @return
     **/
    function flags_column($columns = array())
    {
        return type_column($columns) . " " . $columns["Extra"] . " " . $columns["Key"] . " " . privileges_column($columns) . " " . $columns["Collation"] . " " . $columns["Null"];
    };
    // $is_zerofill=cmr_searchi("zerofill", $col_flags);
    // $is_unique = cmr_searchi("unique_key", $col_flags);
    // $is_unsigned=cmr_searchi("unsigned", $col_flags);
    // $is_multiple_key=cmr_searchi("multiple_key", $col_flags);
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * table_name()
     *
     * @param array $table_columns
     * @param string $numero
     * @return
     **/
    function table_name($table_columns = array(), $numero = "1")
    {
        return "";
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * rown_name()
     *
     * @param array $rows_columns
     * @param string $numero
     * @return
     **/
    function rown_name($rows_columns = array(), $numero = "1")
    {
        return "";
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * show_create_db( )
     *
     * @param string $db_name
     * @return
     **/
    function show_create_db($db_name = "")
    {
	    if(empty($php_con_new)) $php_con_new = NULL;
	     $data["limit"] = "";
	     $data["order"] = "";
	     $data["host"] = cmr_get_global("dbms_host");
	     $data["user"] = cmr_get_global("dbms_user");
	     $data["pw"] = cmr_get_global("dbms_pw");
        $result = sql_run("array", $php_con_new, "show_create_database", "", $GLOBALS["dbms_name"], "", "", cmr_get_config("cmr_max_view"), $data);
    return $result[1][0];
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * show_create_table( )
     *
     * @param string $db_name
     * @param string $table_name
     * @return
     **/
    function show_create_table($db_name, $cmr_prefix, $table_name = "")
    {
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
	    if(empty($php_con_new)) $php_con_new = NULL;
	     $data["limit"] = "";
	     $data["order"] = "";
	     $data["host"] = cmr_get_global("dbms_host");
	     $data["user"] = cmr_get_global("dbms_user");
	     $data["pw"] = cmr_get_global("dbms_pw");
        $result = sql_run("array", $php_con_new, "show_create_table", "", $db_name, $cmr_prefix . $short_table_name, "", cmr_get_config("cmr_max_view"), $data);
        return $result[1][0];
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * column_count()
     *
     * @param array $array_columns
     * @param string $list_column
     * @return
     **/
    function column_count($array_columns = array(), $list_column = "")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 0;
        foreach($array_columns as $key => $template){
            if($template["Field"] == $list_column){
                return $count;
            }
            $count++;
        }
        return $count;
    	}
        return 0;
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * column_name()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_name($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 0;
        foreach($array_columns as $key => $template){
            if($count >= $numero){
                return $template["Field"];
            }
            $count++;
        }
        return $template["Field"];
    	}
        return "";
    };
    // ==========================
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!function_exists("column_id")){
    /**
     * column_id()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_id($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
   };
    // ==========================
    /**
     * column_index()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_index($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_unique()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/

    function column_unique($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_not_null()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_not_null($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_extern()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_extern($array_columns = array(), $numero = "1")
    {
        // FOREIGN KEY (reviewingid) REFERENCES reviewing (reviewingid) on delete cascade
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_extern_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_comment()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_comment($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_comment_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_date_time( )
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_date_time($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_date_time_column($template)){
                if($count >= $numero) return $template["Field"];
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_int()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_int($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_int_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_null()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_null($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_key()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_key($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_index_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    // ==========================
    /**
     * column_text()
     *
     * @param array $array_columns
     * @param string $numero
     * @return
     **/
    function column_text($array_columns = array(), $numero = "1")
    {
	    if(!empty($array_columns)){
        reset($array_columns);
        $count = 1;
        foreach($array_columns as $key => $template){
            if(is_text_column($template)){
                if($count >= $numero){
                    return $template["Field"];
                }
                $count++;
            }
        }
        return column_name($array_columns, 0);
    	}
        return "";
    };
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    // ==========================
    /**
     * icall_id( )
     *
     * @param string $template
     * @return
     **/
    function icall_id($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_date_time( )
     *
     * @param string $template
     * @return
     **/
    function icall_date_time($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_allow_type( )
     *
     * @param string $template
     * @return
     **/
    function icall_allow_type($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_allow_email( )
     *
     * @param string $template
     * @return
     **/
    function icall_allow_email($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_allow_group( )
     *
     * @param string $template
     * @return
     **/
    function icall_allow_group($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_my_master( )
     *
     * @param string $template
     * @return
     **/
    function icall_my_master($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_my_slave( )
     *
     * @param string $template
     * @return
     **/
    function icall_my_slave($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_my_slave( )
     *
     * @param string $template
     * @return
     **/
    function icall_my_md5($template = "")
    {
        return "";
    };
    // ==========================
    // ==========================
    /**
     * icall_comment( )
     *
     * @param string $template
     * @return
     **/
    function icall_certificate($template = "")
    {
        return "";
    };
    // ==========================
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * func_exp_reg()
     *
     * @param mixed $col_type
     * @return
     **/
if(!function_exists("func_exp_reg")){
    function func_exp_reg($col_type)
    {
        switch (strtolower($col_type)){
            case "char" : $exp_reg = ".?";
            break;
            case "varchar" : $exp_reg = ".*";
            break;
            case "tyniblob" : $exp_reg = ".*";
            break;
            case "tynitext" : $exp_reg = ".*";
            break;
            case "blob" : $exp_reg = ".*";
            break;
            case "mediumblob" : $exp_reg = ".*";
            break;
            case "mediumtext" : $exp_reg = ".*";
            break;
            case "longblob" : $exp_reg = ".*";
            break;
            case "longtext" : $exp_reg = ".*";
            break;
            case "enum" : $exp_reg = ".*";
            break;
            case "set" : $exp_reg = ".*";
            break;
            case "string" : $exp_reg = ".*";
            break;
            case "text" : $exp_reg = ".*";
            break;
            case "datetime" : $exp_reg = "[:digit:]+";
//             $exp_reg = "(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])";
            break;
            case "timestamp" : $exp_reg = "[:digit:]+";
            break;
            case "time" : $exp_reg = "[0-9 :]+";
            break;
            case "date" : $exp_reg = "[0-9 -/.]+";
//             $exp_reg = "(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])";
            break;
            case "tinyint" : $exp_reg = "[:digit:]+";
            break;
            case "smallint" : $exp_reg = "[:digit:]+";
            break;
            case "mediumint" : $exp_reg = "[:digit:]+";
            break;
            case "int" : $exp_reg = "[:digit:]+";
            break;
            case "bigint" : $exp_reg = "[:digit:]+";
            break;
            case "float" : $exp_reg = "[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?";
            break;
            case "double" : $exp_reg = "[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?";
            break;
            case "decimal" : $exp_reg = "[-+]?[0-9]*\.?[0-9]+([eE][-+]?[0-9]+)?";
            break;
            case "year" : $exp_reg = "[:digit:]+";
//             $exp_reg = "(19|20)\d\d([- /.])(0[1-9]|1[012])\2(0[1-9]|[12][0-9]|3[01])";
            break;
            default : $exp_reg = ".*";
            break;
        }
        return $exp_reg;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_match()
     *
     * @param mixed $form_name
     * @return
     **/
if(!function_exists("eval_match")){
    function eval_match($form_name)
    {
        // new_user:name1,reg_exp,len;name2,reg_exp,len;
        $var_match = "@#@" . $form_name . ".php@:@";
        // ==========================
        foreach($GLOBALS["array_columns"] as $columns){
            $exp_reg = func_exp_reg(type_column($columns));
            $var_match .= name_column($columns) . "@,@" . $exp_reg . "@,@" . len_column($columns) . "@;@";
        }
        // ==========================
        return $var_match;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_calendar()
     *
     * @param mixed $data_array
     * @return
     **/
if(!function_exists("eval_calendar")){
    function eval_calendar($data_array)
    {
        // ==========================
        if(empty($data_array)) return "";
        if(!is_array($data_array)) return "";
            $return_val = "<script type=\"text/javascript\">";
        foreach($data_array as $key => $column){
            $return_val .= "  Calendar.setup(";
            $return_val .= "    {";
            $return_val .= "      showsTime      :    true,";
            $return_val .= "      timeFormat     :    \"24\",";
            $return_val .= "      inputField  : \"{match_base_name}" . $column . "\",         // ID of the input field";
            $return_val .= "      ifFormat    : \"%Y-%m-%d %H:%M:00\",    // the date format";
            $return_val .= "      button      : \"button_{match_base_name}" . $column . "\"       // ID of the button";
            $return_val .= "    }";
            $return_val .= "  );";
        }
            $return_val .= "</script>";
        // ==========================
        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * form_elmt_change()
     *
     * @param mixed $template
     * @param mixed $columns
     * @param mixed $table_name
     * @return
     **/
if(!function_exists("form_elmt_change")){
    function form_elmt_change($cmr_prefix="cmr_", $template, $columns, $table_name)
    {
    // ==========================
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
        $list_column = name_column($columns);

        $to_2 =  "\" . htmlentities(\$val_u['" . $list_column . "']) . \"";
        $label = "\"<label for=\\\"" . $list_column . "\\\"><b>\" . ucfirst(\$cmr->translate(\"" . $list_column . "\")) . \":</b></label>\"";
        $form_elmt1 = "\"\"";
        $form_elmt2 = "\"\"";
        $form_elmt = "\"<input size=\\\"20\\\" type=\\\"text\\\" value=\\\"\\\"  id=\\\"" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
    // ==========================
    // ==========================

        switch ($template){
            case "@_form_label_elmt1_@":
            return $label;
            case "@_form_box_html_search_@":
            return $form_elmt;
            break;
            
            default:
            break;
        }
    // ==========================
    // ==========================

        switch (type_column($columns)){
            case "tinytext":
            case "mediumtext":
            case "longtext":
            case "blob":
            case "tinyblob":
            case "mediumblob":
            case "longblob":
            case "text":
                $form_elmt1 = "\"<textarea rows=\\\"8\\\" cols=\\\"40\\\" name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\"></textarea>\"";
                $form_elmt2 = "\"<textarea rows=\\\"8\\\" cols=\\\"40\\\" name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\" >" . $to_2 . "</textarea>\"";
            break;

            case "set":
            case "enum":
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                    
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" .  $short_table_name . "\", \"" . $list_column . "\", \"type\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/change_type.php?table_name=" . $short_table_name . "&column_name=" . $list_column . "\", \"\", \"->\")";
                    
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" .  $short_table_name . "\", \"" . $list_column . "\", \"type\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/change_type.php?table_name=" . $short_table_name . "&column_name=" . $list_column . "\", \"\", \"->\")";
            break;

            case "time":
            case "timestamp":
            case "date":
            case "datetimes":
            case "date_times":
                if(is_extern_column($columns)){
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"date_time_" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"date_time_" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";

                    list($extern_table, $extern_column) = explode(".", table_extern_column($cmr_prefix, $columns));
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $extern_table . ".php" . "\", \"\", \"->\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $extern_table . ".php" . "\", \"\", \"->\")";
                }else{
                    $form_elmt1 = "\"<input type=\\\"text\\\" value=\\\"\" . date(\"Y-m-d H-i-s\") . \"\\\" id=\\\"date_time_" . $list_column . "\\\"  name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\" /><button id=\\\"button_{match_base_name}" . $list_column . "\\\">...</button>\"";
                    $form_elmt2 = "\"<input type=\\\"text\\\" value=\\\"" . $to_2 . "\\\" id=\\\"date_time_" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\" /><button id=\\\"button_{match_base_name}" . $list_column . "\\\">...</button>\"";
                    $GLOBALS["array_calendar"][] = $list_column;
                }
                
                
            break;

            default:
                if(is_extern_column($columns)){
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";

                    list($extern_table, $extern_column) = explode(".", table_extern_column($cmr_prefix, $columns));
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= " . \$cmr->print_select(\"" . $extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $extern_table . ".php" . "\", \"\", \"->\")";
                    
                    $form_elmt2 .= " . \$cmr->print_select(\"" . $extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $extern_table . ".php" . "\", \"\", \"->\")";
                }else{
                    if(is_password_column($columns)){
                        $form_elmt1 = "\"<input size=\\\"10\\\" type=\\\"password\\\" value=\\\"\\\"  id=\\\"" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\" />\"";
                        $form_elmt2 = "\"<input size=\\\"10\\\" type=\\\"password\\\" value=\\\"\\\"  id=\\\"" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\" />\"";
                    }else{
                        $form_elmt1 = "\"<input size=\\\"20\\\" type=\\\"text\\\" value=\\\"\\\"  id=\\\"" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                        $form_elmt2 = "\"<input size=\\\"20\\\" type=\\\"text\\\" value=\\\"" . $to_2 . "\\\"  id=\\\"" . $list_column . "\\\" name=\\\"" . $list_column . "\\\" onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\" />\"";
                    }
                }
            break;
        }


        if(is_auto_increment_column($columns)) return  "\"\"";
        if(is_date_time_column($columns)) return "\"\"";
        
    // ==========================
    // ==========================

        switch ($list_column){
            case "id":
        		$label = "\"\"";
                return "\"" . icall_id($template) . "\"";
        	break;
            case "date_time":
        		$label = "\"\"";
                return "\"" . icall_date_time($template) . "\"";
        	break;
            case "my_md5":
                return "\"" . icall_my_md5($template) . "\"";
        	break;
            case "allow_type":
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                list($extern_table, $extern_column) = explode(".", $cmr_prefix .  "groups.type");
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"groups\", \"type\", \"type\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/change_type.php?table_name=groups&column_name=type\", \"\", \"->\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"groups\", \"type\", \"type\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/change_type.php?table_name=groups&column_name=type\", \"\", \"->\")";

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\") ";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\") ";
//              return icall_allow_type($template);
        	break;
            case "allow_email":
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                 list($extern_table, $extern_column) = explode(".", $cmr_prefix . "user.email");
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_extern_table . ".php" . "\", \"\", \"->\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_extern_table . ".php" . "\", \"\", \"->\")";

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";
//          return icall_allow_email($template);
        	break;
            case "allow_groups":
                     $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                     $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                list($extern_table, $extern_column) = explode(".", $cmr_prefix . "groups.name");
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_extern_table . ".php" . "\", \"\", \"->\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_extern_table . "\", \"" . $extern_column . "\", \"column\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_extern_table . ".php" . "\", \"\", \"->\")";

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";
//              return icall_allow_group($template);
        	break;
            case "my_master":
                list($extern_table, $extern_column) = explode(".", $cmr_prefix . $short_table_name . "." . $list_column);
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table); 
                        
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_table_name . "\", \"" . column_name($GLOBALS["array_columns"], 1) . "," . column_name($GLOBALS["array_columns"], 2) . "," . column_name($GLOBALS["array_columns"], 3) . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_table_name . ".php" . "\", \"\", \"->\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_table_name . "\", \"" . column_name($GLOBALS["array_columns"], 1) . "," . column_name($GLOBALS["array_columns"], 2) . "," . column_name($GLOBALS["array_columns"], 3) . "\", \"column\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_table_name . ".php" . "\", \"\", \"->\")";

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";
//              return icall_my_master($template);
        	break;
            case "my_slave":
                list($extern_table, $extern_column) = explode(".", $cmr_prefix . $short_table_name . "." . $list_column);
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table); 
                        
                    $form_elmt1 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">\"";
                    $form_elmt2 = "\"<select name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  onclick=\\\"large_id('" . $short_table_name . "," . $list_column . "')\\\">" . "<option selected value=\\\"" . $to_2 . "\\\">" . $to_2 . "</option>\"";
                    $form_elmt1 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_table_name . "\", \"" . column_name($GLOBALS["array_columns"], 1) . "," . column_name($GLOBALS["array_columns"], 2) . "," . column_name($GLOBALS["array_columns"], 3) . "\", \"column\")";
                    $form_elmt1 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_table_name . ".php" . "\", \"\", \"->\")";
                    $form_elmt2 .= " . \$cmr->print_select(\$cmr->config[\"cmr_table_prefix\"] . \"" . $short_table_name . "\", \"" . column_name($GLOBALS["array_columns"], 1) . "," . column_name($GLOBALS["array_columns"], 2) . "," . column_name($GLOBALS["array_columns"], 3) . "\", \"column\")";
                    $form_elmt2 .= " . \"</select>\" . \$cmr->module_link(\"modules/new_" . $short_table_name . ".php" . "\", \"\", \"->\")";

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";

//              return icall_my_slave($template);
        	break;
            case "comment":
//              return icall_comment($template);

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";
        	break;
            case "certificate":
//              return icall_certificate($template);

                    $form_elmt1 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt1 . " . show_hide(\"" . $list_column . "\", \"end\")";
                    $form_elmt2 = "show_hide(\"" . $list_column . "\", \"begin\") . " . $form_elmt2 . " . show_hide(\"" . $list_column . "\", \"end\")";
            case "attach":
            case "attachment":
                    $form_elmt1 = "\"<input type=\\\"file\\\" name=\\\"" . $list_column . "\\\" id=\\\"" . $list_column . "\\\"  />\"";
                    $form_elmt2 = $form_elmt1;
        	break;
                
            default:
//              return $template;
        	break;
        }
    // ==========================
    // ==========================

        switch ($template){
            case "@_form_label_elmt1_@":
            	return $label;
            break;
            case "@_form_box_elmt1_@":
            	return $form_elmt1;
            break;
            case "@_form_box_elmt_upd1_@":
            	return $form_elmt2;
            break;
            default:return $template;
            break;
        }
    // ==========================
    // ==========================

        return $template;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * form_elmt_html()
     *
     * @param mixed $template
     * @param mixed $columns
     * @param mixed $table_name
     * @return
     **/
if(!function_exists("form_elmt_html")){
    function form_elmt_html($cmr_prefix="cmr_", $template, $columns, $table_name)
    {
    // ==========================
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
        $list_column = name_column($columns);

        $to_2 =  "{match_value_" . $list_column . "}";
        
        $label = "<label for=\"" . $list_column . "\"><b>{match_label_" . $list_column . "}:</b></label>";
        $form_elmt1 = "";
        $form_elmt2 = "";
        $form_elmt = "<input size=\"20\" type=\"text\" value=\"\"  id=\"" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
    // ==========================
    // ==========================
        
        
        
        switch (type_column($columns)){
            case "tinytext":
            case "mediumtext":
            case "longtext":
            case "blob":
            case "tinyblob":
            case "mediumblob":
            case "longblob":
            case "text":
                $form_elmt1 = "<textarea rows=\"8\" cols=\"40\" name=\"" . $list_column . "\" id=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\"></textarea>";
                $form_elmt2 = "<textarea rows=\"8\" cols=\"40\" name=\"" . $list_column . "\" id=\"" . $list_column . "\" onfocus=\"this.select()\" >" . $to_2 . "</textarea>";
            break;

            case "set":
            case "enum":
                    $form_elmt1 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    $form_elmt2 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    
                    $form_elmt1 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt1 .= "{match_link_" . $list_column . "}";
                    
                    $form_elmt2 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt2 .= "{match_link_" . $list_column . "}";
            break;

            case "time":
            case "timestamp":
            case "date":
            case "datetimes":
            case "date_times":
                if(is_extern_column($columns)){
                    $form_elmt1 = "<select name=\"" . $list_column . "\" id=\"date_time_" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    $form_elmt2 = "<select name=\"" . $list_column . "\" id=\"date_time_" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";

                    list($extern_table, $extern_column) = explode(".", table_extern_column($cmr_prefix, $columns));
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt1 .= "{match_link_" . $list_column . "}";
                    
                    $form_elmt2 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt2 .= "{match_link_" . $list_column . "}";
                }else{
                    $form_elmt1 = "<input type=\"text\" value=\"\" id=\"date_time_" . $list_column . "\"  name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\" /><button id=\"button_{match_base_name}" . $list_column . "\">...</button>";
                    $form_elmt2 = "<input type=\"text\" value=\"" . $to_2 . "\" id=\"date_time_" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\" onfocus=\"this.select()\" /><button id=\"button_{match_base_name}" . $list_column . "\">...</button>";
                    $GLOBALS["array_calendar"][] = $list_column;
                }
                
                
            break;

            default:
                if(is_extern_column($columns)){
                    $form_elmt1 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    $form_elmt2 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";

                    list($extern_table, $extern_column) = explode(".", table_extern_column($cmr_prefix, $columns));
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table);     
                    
                    $form_elmt1 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt1 .= "{match_link_" . $list_column . "}";
                    
                    $form_elmt2 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt2 .= "{match_link_" . $list_column . "}";
                }else{
                    if(is_password_column($columns)){
                        $form_elmt1 = "<input size=\"10\" type=\"password\" value=\"\"  id=\"" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\" />";
                        $form_elmt2 = "<input size=\"10\" type=\"password\" value=\"\"  id=\"" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\" onfocus=\"this.select()\" />";
                    }else{
                        $form_elmt1 = "<input size=\"20\" type=\"text\" value=\"\"  id=\"" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                        $form_elmt2 = "<input size=\"20\" type=\"text\" value=\"" . $to_2 . "\"  id=\"" . $list_column . "\" name=\"" . $list_column . "\" onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\" onfocus=\"this.select()\" />";
                    }
                }
            break;
        }


        if(is_auto_increment_column($columns)) return  "";
        if(is_date_time_column($columns)) return "";
        
    // ==========================
    // ==========================

        switch ($list_column){
            case "id":
	            $label = "";
	            return icall_id($template);
        	break;
            case "date_time":
	            $label = "";
	            return icall_date_time($template);
			break;
            case "my_md5":
            	return icall_my_md5($template);
        	break;
            
            case "photo":
            case "image":
            case "picture":
              $form_elmt2 .= "<img alt=\"" . $list_column . "\" src=\"" . $to_2 . "\" class=\"cmr_image\" />";
			break;
            
            
            case "allow_type":
//              return icall_allow_type($template);
            case "allow_email":
//          return icall_allow_email($template);
            case "allow_groups":
//              return icall_allow_group($template);
            case "my_master":
//              return icall_my_master($template);
            case "my_slave":
                list($extern_table, $extern_column) = explode(".", $cmr_prefix . $short_table_name . "." . $list_column);
                    $short_extern_table = cmr_searchi_replace("^" . $cmr_prefix, "", $extern_table); 
                        
                    $form_elmt1 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    $form_elmt2 = "<select name=\"" . $list_column . "\" id=\"" . $list_column . "\"  onclick=\"large_id('" . $short_table_name . "," . $list_column . "')\">";
                    
                    $form_elmt1 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt1 .= "{match_link_" . $list_column . "}";
                    
                    $form_elmt2 .= $to_2 . "<option value=\"\"></option>";
                    $form_elmt2 .= "{match_link_" . $list_column . "}";

                    $form_elmt1 = show_hide($list_column, "begin") . $form_elmt1 . show_hide($list_column, "end");
                    $form_elmt2 = show_hide($list_column, "begin") . $form_elmt2 . show_hide($list_column, "end");

//              return icall_my_slave($template);
        	break;
            
            case "comment":
//              return icall_comment($template);
            case "certificate":
//              return icall_certificate($template);

                    $form_elmt1 = show_hide($list_column, "begin") . $form_elmt1 . show_hide($list_column, "end");
                    $form_elmt2 = show_hide($list_column, "begin") . $form_elmt2 . show_hide($list_column, "end");
            case "attach":
            case "attachment":
                    $form_elmt1 = "<input type=\"file\" name=\"" . $list_column . "\" id=\"" . $list_column . "\"  />";
                    $form_elmt2 = $form_elmt1;
        	break;
                
            default:
//              return $template;
        	break;
        }
    // ==========================
    // ==========================

        switch ($template){
            case "@_form_box_html_@":
            	return $form_elmt1;
            break;
            case "@_form_box_html_upd_@":
            	return $form_elmt2;
            break;
            case "@_form_label_html_@":
            	return $label;
            break;
            case "@_form_box_html_search_@":
            	return $form_elmt;
            break;
            default:
            	return $template;
            break;
        }
    // ==========================
    // ==========================

        return $template;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!function_exists("other_replace")){
    function other_replace($replace_match, $conn, $db_name, $form_name, $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
     {
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
        return $replace_match;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * replace_gen()
     *
     * @param mixed $replace_match
     * @param mixed $db_name
     * @param mixed $form_name
     * @param mixed $table_name
     * @param mixed $short_table_name
     * @param mixed $list_column
     * @return
     **/
if(!function_exists("replace_gen")){
    function replace_gen($replace_match, $db_name, $form_name, $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
    {
    $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
    $str_replace = $replace_match;
        
//    $cmr_prefix=str_replace($short_table_name,"",$table_name);
	
       $ta = cmr_get_global("array_tables");
       $table = $ta[$table_name];
//    print_r($GLOBALS["array_tables"]);exit;
       $co= cmr_get_global("array_columns");
       $columns = $co[$list_column];
       

       @ $db_privileges = $columns["Privileges"];
       @ $db_caracter_set = $table["Row_format"];
//     $db_collation = $table["Collation"];
//     $db_type = $table["Engine"];
       $inde = cmr_get_global("array_index");
        switch ($replace_match){
            case "@_database_@" : $str_replace = $db_name;
            break;
            case "@_show_create_db_@" : $str_replace = show_create_db($db_name);
            break;
            case "@_date_time_@":
            case "@_db_date_time_@" : $str_replace = date("Y-M-D H:i:s");
            break;
            case "@_db_privileges_@" : $str_replace = $db_privileges;
            break;
            case "@_db_caracter_set_@" : $str_replace = $db_caracter_set;
            break;
            case "@_db_collation_@" : $str_replace = $table["Collation"];
            break;
            case "@_db_type_@" : $str_replace = $table["Engine"];
            break;
            case "@_pre_match_@" : $str_replace = eval_match($form_name);
            break;
            case "@_script_calendar_@": eval_calendar($GLOBALS["array_calendar"]) ;
            break;
            case "@_table_@" : $str_replace = $short_table_name;
            break;
            case "@_table_name_@" : $str_replace = $table["Name"];
            break;
            case "@_show_create_table_@" : $str_replace = show_create_table($db_name, $cmr_prefix, $table_name);
            break;
            case "@_table_engine_@" : $str_replace = $table["Engine"];
            break;
            case "@_table_version_@" : $str_replace = $table["Version"];
            break;
            case "@_table_row_format_@" : $str_replace = $table["Row_format"];
            break;
            case "@_table_rows_@" : $str_replace = $table["Rows"];
            break;
            case "@_table_avg_row_length_@" : $str_replace = $table["Avg_row_length"];
            break;
            case "@_table_data_length_@" : $str_replace = $table["Data_length"];
            break;
            case "@_table_max_data_length_@" : $str_replace = $table["Max_data_length"];
            break;
            case "@_table_index_length_@" : $str_replace = $table["Index_length"];
            break;
            case "@_table_data_free_@" : $str_replace = $table["Data_free"];
            break;
            case "@_table_auto_increment_@" : $str_replace = $table["Auto_increment"];
            break;
            case "@_table_create_time_@" : $str_replace = $table["Create_time"];
            break;
            case "@_table_update_time_@" : $str_replace = $table["Update_time"];
            break;
            case "@_table_check_time_@" : $str_replace = $table["Check_time"];
            break;
            case "@_table_collation_@" : $str_replace = $table["Collation"];
            break;
            case "@_table_checksum_@" : $str_replace = $table["Checksum"];
            break;
            case "@_table_create_options_@" : $str_replace = $table["Create_options"];
            break;
            case "@_table_comment_@" : $str_replace = $table["Comment"];
            break;
            case "@_table_index_@" : $str_replace = $inde["Table"];
            break;
            case "@_table_num_row_@" : $str_replace = $inde["Cardinality"];
            break;
            case "@_table_num_column_@" : $str_replace = count($GLOBALS["array_columns"]);
            break;
            case "@_table_primary_@" : $str_replace = $inde["Column_name"];
            break;
            case "@_table_type_@" : $str_replace = $table["Engine"] . " " . $table["Version"] . " " . $table["Row_format"];
            break;
            case "@_table_privilege_@" : $str_replace = $table["Create_options"];
            break;
            case "@_table_date_time_@" : $str_replace = $table["Table_update_time"];
            break;
            case "@_table_non_unique_@" : $str_replace = $table["Table_non_unique"];
            break;
            case "@_table_key_name_@" : $str_replace = $table["Table_key_name"];
            break;
            case "@_table_seq_in_index_@" : $str_replace = $table["Table_seq_in_index"];
            break;
            case "@_table_column_name_@" : $str_replace = $table["Table_column_name"];
            break;
            case "@_table_collation_@" : $str_replace = $table["Table_collation"];
            break;
            case "@_table_cardinality_@" : $str_replace = $table["Table_cardinality"];
            break;
            case "@_table_sub_part_@" : $str_replace = $table["Table_sub_part"];
            break;
            case "@_table_packed_@" : $str_replace = $table["Table_packed"];
            break;
            case "@_table_index_type_@" : $str_replace = $table["Table_index_type"];
            break;

            case "@_column_@" : $str_replace = $list_column;
            break;
            case "@_column_id_@" : $str_replace = column_id($GLOBALS["array_columns"], 1);
            break;
            case "@_column_count_@" : $str_replace = column_count($GLOBALS["array_columns"], $list_column);
            break;

            case "@_column_null_@" : $str_replace = $columns["Null"];
            break;
            case "@_column_default_@" : $str_replace = $columns["Column_name"];
            break;
            case "@_column_extra_@" : $str_replace = $columns["Default"];
            break;

            case "@_column_field_@" : $str_replace = $columns["Field"];
            break;
            case "@_column_true_type_@" : $str_replace = $columns["Type"];
            
            case "@_column_type_@" : $str_replace = type_column($columns);
            break;
            case "@_column_collation_@" : $str_replace = $columns["Collation"];
            break;
            case "@_column_key_@" : $str_replace = $columns["Key"];
            break;
            case "@_column_privileges_@" : $str_replace = $columns["Privileges"];
            break;
            case "@_column_comment_@" : $str_replace = $columns["Comment"];
            break;

            case "@_is_extern_@" : is_extern_column($columns) ? $str_replace = "1":$str_replace = "0";
            break;

            case "@_column_index1_@" : $str_replace = column_index($GLOBALS["array_columns"], 1);
            break;
            case "@_column_unique1_@" : $str_replace = column_unique($GLOBALS["array_columns"], 1);
            break;
            case "@_column_not_null1_@" : $str_replace = column_not_null($GLOBALS["array_columns"], 1);
            break;
            case "@_column_extern1_@" : $str_replace = column_extern($GLOBALS["array_columns"], 1);
            break;
            case "@_column_comment1_@" : $str_replace = column_comment($GLOBALS["array_columns"], 1);
            break;
            case "@_column_date_time1_@" : $str_replace = column_date_time(  $GLOBALS["array_columns"], 1);
            break;
            case "@_column_int1_@" : $str_replace = column_int($GLOBALS["array_columns"], 1);
            break;
            case "@_column_null1_@" : $str_replace = column_null($GLOBALS["array_columns"], 1);
            break;
            case "@_column_key1_@" : $str_replace = column_key($GLOBALS["array_columns"], 1);
            break;
            case "@_column_text1_@" : $str_replace = column_text($GLOBALS["array_columns"], 1);
            break;

            case "@_column_index2_@" : $str_replace = column_index($GLOBALS["array_columns"], 2);
            break;
            case "@_column_unique2_@" : $str_replace = column_unique($GLOBALS["array_columns"], 2);
            break;
            case "@_column_not_null2_@" : $str_replace = column_not_null($GLOBALS["array_columns"], 2);
            break;
            case "@_column_extern2_@" : $str_replace = column_extern($GLOBALS["array_columns"], 2);
            break;
            case "@_column_comment2_@" : $str_replace = column_comment($GLOBALS["array_columns"], 2);
            break;
            case "@_column_date_time2_@" : $str_replace = column_date_time(  $GLOBALS["array_columns"], 2);
            break;
            case "@_column_int2_@" : $str_replace = column_int($GLOBALS["array_columns"], 2);
            break;
            case "@_column_null2_@" : $str_replace = column_null($GLOBALS["array_columns"], 2);
            break;
            case "@_column_key2_@" : $str_replace = column_key($GLOBALS["array_columns"], 2);
            break;
            case "@_column_text2_@" : $str_replace = column_text($GLOBALS["array_columns"], 2);
            break;

            case "@_column_index3_@" : $str_replace = column_index($GLOBALS["array_columns"], 3);
            break;
            case "@_column_unique3_@" : $str_replace = column_unique($GLOBALS["array_columns"], 3);
            break;
            case "@_column_not_null3_@" : $str_replace = column_not_null($GLOBALS["array_columns"], 3);
            break;
            case "@_column_extern3_@" : $str_replace = column_extern($GLOBALS["array_columns"], 3);
            break;
            case "@_column_comment3_@" : $str_replace = column_comment($GLOBALS["array_columns"], 3);
            break;
            case "@_column_date_time3_@" : $str_replace = column_date_time(  $GLOBALS["array_columns"], 3);
            break;
            case "@_column_int3_@" : $str_replace = column_int($GLOBALS["array_columns"], 3);
            break;
            case "@_column_null3_@" : $str_replace = column_null($GLOBALS["array_columns"], 3);
            break;
            case "@_column_key3_@" : $str_replace = column_key($GLOBALS["array_columns"], 3);
            break;
            case "@_column_text3_@" : $str_replace = column_text($GLOBALS["array_columns"], 3);
            break;

            case "@_column0_@" : $str_replace = column_name($GLOBALS["array_columns"], 0);
            break;
            case "@_column1_@" : $str_replace = column_name($GLOBALS["array_columns"], 1);
            break;
            case "@_column2_@" : $str_replace = column_name($GLOBALS["array_columns"], 2);
            break;
            case "@_column3_@" : $str_replace = column_name($GLOBALS["array_columns"], 3);
            break;
            case "@_column4_@" : $str_replace = column_name($GLOBALS["array_columns"], 4);
            break;
            case "@_column5_@" : $str_replace = column_name($GLOBALS["array_columns"], 5);
            break;

            case "@_form_label_elmt_@":
            case "@_form_label_elmt1_@":
            $str_replace = form_elmt_change($cmr_prefix, "@_form_label_elmt1_@", $columns, $table_name);
            break;
            case "@_form_box_elmt_@":
            case "@_form_box_elmt1_@":
            $str_replace = form_elmt_change($cmr_prefix, "@_form_box_elmt1_@", $columns, $table_name);
            break;
            case "@_form_box_elmt_upd_@":
            case "@_form_box_elmt_upd1_@":
            $str_replace = form_elmt_change($cmr_prefix, "@_form_box_elmt_upd1_@", $columns, $table_name);
            break;


            case "@_form_label_html_@":
            $str_replace = form_elmt_html($cmr_prefix, "@_form_label_html_@", $columns, $table_name);
            break;
            case "@_form_box_html_@":
            $str_replace = form_elmt_html($cmr_prefix, "@_form_box_html_@", $columns, $table_name);
            break;
            case "@_form_box_html_search_@":
            $str_replace = form_elmt_html($cmr_prefix, "@_form_box_html_search_@", $columns, $table_name);
            break;
            case "@_form_box_html_upd_@":
            $str_replace = form_elmt_html($cmr_prefix, "@_form_box_html_upd_@", $columns, $table_name);
            break;
            case "@_form_function_html_@":
            $str_replace = cmrprint_select($GLOBALS["cmr_new_function"], "func_" . $list_column, "");
            case "@_form_function_html_upt_@":
            $str_replace = cmrprint_select($GLOBALS["cmr_update_function"], "func_" . $list_column, "");
            case "@_form_operator_html_search_@":
            $str_replace = cmrprint_select($GLOBALS["cmr_search_operator"], "func_" . $list_column, "");

            break;
                
            default:
                if(cmr_searchi("@_column[0-9]+_@", $replace_match)){
                    $str_replace = column_name($GLOBALS["array_columns"], intval(substr($replace_match, 8)));
                } elseif(cmr_searchi("@_table[0-9]+_@", $replace_match)){
                    $str_replace = table_name($GLOBALS["array_tables"], intval(substr($replace_match, 7)));
                } elseif(cmr_searchi("@_rown[0-9]+_@", $replace_match)){
                    $str_replace = rown_name($GLOBALS["array_rowns"], intval(substr($replace_match, 6)));
                }else{
                    $str_replace = other_replace($replace_match, cmr_get_db_connection(), $db_name, $form_name, $table_name, $cmr_prefix, $list_column);
                }
            break;
        }
        //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        // print("$replace_match=$str_replace<br />");
        // exit;
        return $str_replace;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_cols_in_rown()
     *
     * @param mixed $template
     * @param mixed $db_name
     * @param string $form_name
     * @param mixed $table_name
     * @param mixed $short_table_name
     * @param string $list_column
     * @return
     **/
if(!function_exists("eval_cols_in_rown")){
    function eval_cols_in_rown($template, $db_name, $form_name = "form", $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
    {
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
        $return_val = "";
        // print_r($GLOBALS["array_columns"]);exit;
	    if(!empty($array_columns)){
        $array_columns = cmr_get_global("array_columns");
        reset($array_columns);
        $columns = current($array_columns);

        $val = "";
        if($GLOBALS["array_rown"]){
            foreach($GLOBALS["array_rown"] as $key => $rown_val){
                $val .= str_replace("@_rown_@", $rown_val, $template);

                $list_column = $columns["Field"];
                $val = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
                $columns = next($array_columns);
            }
        }

        $return_val = $val;

        if(empty($return_val)){
            $return_val = str_replace("@_rown_@", "", $template);
        }

        return $return_val;
    	}
        return "";
    };
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_by_rown()
     *
     * @param mixed $template
     * @param mixed $db_name
     * @param string $form_name
     * @param mixed $table_name
     * @param mixed $short_table_name
     * @param string $list_column
     * @return
     **/
if(!function_exists("eval_by_rown")){
    function eval_by_rown($template, $db_name, $form_name = "form", $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
    {
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
        $return_val = "";
        $GLOBALS["array_columns"] = get_array_columns($cmr_prefix, $table_name, $list_column);

	    $php_con_new = NULL;
            // -----------
	     $data["valid"] = "1";
	     $data["sql_where"] = $where;
	     $data["limit"] = $limit;
	     $data["order"] = "";
	     $data["host"] = cmr_get_global("dbms_host");
	     $data["user"] = cmr_get_global("dbms_user");
	     $data["pw"] = cmr_get_global("dbms_pw");
        if(cmr_search(",", $list_column)){
         $all_rown_table = sql_run("array_assoc", $php_con_new, "select", "", $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, $list_column, $data);
//          $sql_query = "SELECT " . $list_column . " FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//          $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, $list_column, $data);
        }else{
         $all_rown_table = sql_run("array_assoc", $php_con_new, "select", "", $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, "*", $data);
//          $sql_query = "SELECT * FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//          $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, "*", $data);
        }
            // -----------
        foreach($all_rown_table as $key => $array_rown){
            $GLOBALS["array_rown"] = $array_rown;

            $val = $template;

            $val = preg_replace("/(£_foreach_cols_in_rown_£)(.*)(££_foreach_cols_in_rown_££)/seU", "eval_cols_in_rown('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
            $val = str_replace("@_rown_id_@", $key, $val);
            $val = str_replace("@_rown_@", $array_rown, $val);
            $val = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);

            $return_val .= $val;
        }

        if(empty($return_val)){
            $return_val = str_replace("@_rown_@", "", $template);
        }

        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_rowns_in_col()
     *
     * @param mixed $template
     * @param mixed $db_name
     * @param mixed $form_name
     * @param mixed $table_name
     * @param mixed $short_table_name
     * @param mixed $list_column
     * @return
     **/
if(!function_exists("eval_rowns_in_col")){
    function eval_rowns_in_col($template, $db_name, $form_name, $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
    {
        // =======================================
        if(empty($limit)) $limit = cmr_get_config("cmr_max_view");
        $short_table_name = cmr_searchi_replace("^" . $cmr_prefix, "", $table_name);     
            // -----------
	    $php_con_new = NULL;
            // -----------
	     $data["valid"] = "1";
	     $data["sql_where"] = $where;
	     $data["limit"] = $limit;
	     $data["order"] = "";
	     $data["host"] = cmr_get_global("dbms_host");
	     $data["user"] = cmr_get_global("dbms_user");
	     $data["pw"] = cmr_get_global("dbms_pw");
	     
        if(cmr_search(",", $list_column)){
         $all_rown_table = sql_run("array_assoc", $php_con_new, "select", "", $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, $list_column, $data);
//          $sql_query = "SELECT " . $list_column . " FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//          $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, $list_column, $data);
        }else{
         $all_rown_table = sql_run("array_assoc", $php_con_new, "select", "", $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, "*", $data);
//          $sql_query = "SELECT * FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//          $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, "*", $data);
        }
// 	    if(empty($php_con_new)) $php_con_new = NULL;
//         if(cmr_search(",", $list_column)){
//             $sql_query = "SELECT " . $list_column . " FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//             $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, $list_column, $data);
//         }else{
//             $sql_query = "SELECT * FROM " . $cmr_prefix . $short_table_name . " WHERE " . $where . ";";
//             $all_rown_table = sql_run("array_assoc", $php_con_new, "sql_query", $sql_query, $GLOBALS["dbms_name"], $cmr_prefix . $short_table_name, "*", $data);
// //          $all_rown_table = sql_run("array_assoc", $php_con_new, "select", "", $GLOBALS["dbms_name"], $table_name, "*", cmr_get_config("cmr_max_view"), $data);
//         }
            // -----------
        // print_r($all_rown_table);exit;
        foreach($all_rown_table as $key => $array_rown){
            // -----------
            $GLOBALS["array_rown"] = $array_rown;
            $val = $template;

            $val = preg_replace("/(£_foreach_comment_£)(.*)(££_foreach_comment_££)/seU", "", $val);
            $val = preg_replace("/(£_foreach_column_£)(.*)(££_foreach_column_££)/seU", "eval_by_rown('\\2', $form_name, $table_name, $cmr_prefix, $list_column)", $val);
            $val = str_replace("@_rown_id_@", $key, $val);
            $val = str_replace("@_rown_@", $array_rown[$list_column], $val);
            // -----------
            $return_val .= $val;
            // -----------
        }
        // =======================================
        if(empty($return_val)){
            $return_val = $template;
        }
        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_column()
     *
     * @param string $template
     * @param string $db_name
     * @param string $form_name
     * @param string $table_name
     * @param string $short_table_name
     * @param string $list_column
     * @return
     **/
if(!function_exists("eval_column")){
    function eval_column($template = "", $db_name = "", $form_name = "", $table_name, $cmr_prefix="cmr_", $list_column = "id", $where="1", $limit="0")
    {
        $return_val = "";
        // $short_table_name = cmr_searchi_replace( "^".$cmr_prefix, "", $table_name);
        // $form_type="mod";
        // $form_name=$form_type."_".$short_table_name;
        $GLOBALS["array_columns"] = get_array_columns($cmr_prefix, $table_name, $list_column);

        $GLOBALS["array_index"] = get_array_index($cmr_prefix, $table_name);
        $return_val = "";

        foreach($GLOBALS["array_columns"] as $columns){
            $list_column = $columns["Field"];

            if(!empty($list_column)){
                // print("--column--<br />\$table_name=$table_name;\$list_column=$list_column----<br />");
//                 continue;

            if($list_column == "function"){
                $list_column = "functio";
            }
            $val = $template;
            // ==========================================
            $temp_str = stristr($val, "£_foreach_");
            while ($temp_str){
                $choose = substr($temp_str, 10, 2);
                $temp_str = substr($temp_str, 1);
                $temp_str = stristr($temp_str, "£_foreach_");
                // print("<br />--".$choose."--<br />");
                switch ($choose){
                    case "ct" : $val = preg_replace("/(£_foreach_comment_£)(.*)(££_foreach_comment_££)/seU", "", $val);
                    break;
                    case "db" : $val = preg_replace("/(£_foreach_db_£)(.*)(££_foreach_db_££)/seU", "eval_db('\\2', '$cmr_prefix', '$form_name')", $val);
                    break;
                    case "ta" : $val = preg_replace("/(£_foreach_table_£)(.*)(££_foreach_table_££)/seU", "eval_table('\\2', '$cmr_prefix', '$db_name',  '$form_name')", $val);
                    break;
                    case "co" : $val = preg_replace("/(£_foreach_column_£)(.*)(££_foreach_column_££)/seU", "eval_column('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
                    break;
                    case "ro" : $val = preg_replace("/(£_foreach_rown_£)(.*)(££_foreach_rown_££)/seU", "eval_rowns_in_col('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
                    break;
                    default:break;
                }
            }
            // ==========================================
            $val = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
            // ==========================================
            $return_val .= $val;
                    }
        }


        if(empty($return_val)){
            $return_val = $template;
        }

        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_table()
     *
     * @param mixed $cmr_prefix
     * @param mixed $template
     * @param mixed $db_name
     * @param mixed $form_name
     * @return
     **/
if(!function_exists("eval_table")){
    function eval_table($template, $cmr_prefix="", $db_name, $form_name)
    {
        if(empty($GLOBALS["array_tables"])) $GLOBALS["array_tables"] = get_array_tables($db_name);

        $return_val = "";
        $limit = cmr_get_global("limit");
        $where = cmr_get_global("where");
        foreach($GLOBALS["array_tables"] as $table){
            $table_name = $table['Name'];
            $short_table_name = cmr_searchi_replace( "^" . $cmr_prefix, "", $table_name);

            if(empty($list_column)) $list_column = "";
            $GLOBALS["array_columns"] = get_array_columns($cmr_prefix, $table_name, $list_column);
            reset($GLOBALS["array_columns"]);
            $columns = current($GLOBALS["array_columns"]);
            $list_column = $columns["Field"];

                // print("--table--<br />\$table_name=$table_name;\$list_column=$list_column----<br />");

            $val = $template;
            // ==========================================
            $temp_str = stristr($val, "£_foreach_");
            while ($temp_str){
                $choose = substr($temp_str, 10, 2);
                $temp_str = substr($temp_str, 1);
                $temp_str = stristr($temp_str, "£_foreach_");
                // print("<br />--".$choose."--<br />");
                switch ($choose){
                    case "ct" : $val = preg_replace("/(£_foreach_comment_£)(.*)(££_foreach_comment_££)/seU", "", $val);
                    break;
                    case "db" : $val = preg_replace("/(£_foreach_db_£)(.*)(££_foreach_db_££)/seU", "eval_db('\\2', '$cmr_prefix', '$form_name')", $val);
                    break;
                    case "ta" : $val = preg_replace("/(£_foreach_table_£)(.*)(££_foreach_table_££)/seU", "eval_table('\\2', '$cmr_prefix', '$db_name',  '$form_name')", $val);
                    break;
                    case "co" : $val = preg_replace("/(£_foreach_column_£)(.*)(££_foreach_column_££)/seU", "eval_column('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
                    break;
                    case "ro" : $val = preg_replace("/(£_foreach_rown_£)(.*)(££_foreach_rown_££)/seU", "eval_by_rown('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
                    break;
                    default:break;
                }
            }
            // ==========================================
            $val = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
            // ==========================================
            $return_val .= $val;
        }

        if(empty($return_val)){
            $return_val = $template;
        }

        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    /**
     * eval_db( )
     *
     * @param mixed $cmr_prefix
     * @param mixed $template
     * @param mixed $form_name
     * @return
     **/
if(!function_exists("eval_db")){
    function eval_db($template, $cmr_prefix="", $form_name)
    {
        $return_val = "";
        $limit = cmr_get_global("limit");
        $where = cmr_get_global("where");
        foreach($GLOBALS["array_db"] as $db){
            $db_name = $db['Name'];
            // $table_name=$db['Name'];
            // $short_table_name = cmr_searchi_replace( "^".$cmr_prefix, "", $table_name);
            // $columns=current($GLOBALS["array_columns"]);
            // $list_column=$columns["Field"];
            $val = $template;
            // ==========================================
            $temp_str = stristr($val, "£_foreach_");
            while ($temp_str){
                $choose = substr($temp_str, 10, 2);
                $temp_str = substr($temp_str, 1);
                $temp_str = stristr($temp_str, "£_foreach_");
                // print("<br />--".$choose."--<br />");
                switch ($choose){
                    case "ct" : $val = preg_replace("/(£_foreach_comment_£)(.*)(££_foreach_comment_££)/seU", "", $val);
                    break;
                    case "db" : $val = preg_replace("/(£_foreach_db_£)(.*)(££_foreach_db_££)/seU", "eval_db('\\2', '$cmr_prefix', '$form_name')", $val);
                    break;
                    case "ta" : $val = preg_replace("/(£_foreach_table_£)(.*)(££_foreach_table_££)/seU", "eval_table('\\2', '$cmr_prefix', '$db_name',  '$form_name')", $val);
                    break;
                    // case "co" : $val=preg_replace("/(£_foreach_column_£)(.*)(££_foreach_column_££)/seU", "eval_column('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);break;
                    // case "ro" : $val=preg_replace("/(£_foreach_rown_£)(.*)(££_foreach_rown_££)/seU", "eval_by_rown('\\2', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);break;
                    default:break;
                }
            }
            // ==========================================
            $val = preg_replace("/(@_)([^@]*)(_@)/e", "replace_gen('@_\\2_@', '$db_name', '$form_name', '$table_name', '$cmr_prefix', '$list_column', '$where', '$limit')", $val);
            // ==========================================
            $return_val .= $val;
        }

        if(empty($return_val)){
            $return_val = $template;
        }

        return $return_val;
    }
    }
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
    //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!function_exists("gen_image_save")){
    function gen_image_save($button_text = "-", $button_data = "_form_"){
//         $a=array(
//      "cmr_images_path"=>$cmr_images_path,
//      "cmr_button_model"=>$cmr_button_model,
//      "cmr_button_color"=>$cmr_button_color,
//      "cmr_button_dim"=>$cmr_button_dim
//         );
		if(strpos($button_data, ",") >= 0){
		list($cmr_images_path, $images_dest_dir, $button_model, $col1, $col2, $col3, $font, $x_pos, $y_pos, $size) = explode(",", $button_data);
		$button_data = $button_text;
		$images_path = $images_dest_dir . "/" . trim($button_text)  . ".png";
		$cmr_config["cmr_images_path"] = $cmr_images_path;
		$cmr_config["cmr_button_model"] = $button_model;
		$cmr_config["cmr_button_color"] = $col1 . "," . $col2 . "," . $col3;
		$cmr_config["cmr_button_dim"] =  $font . "," . $x_pos . "," . $y_pos . "," . $size;
		
		}else{
		$cmr_config = cmr_get_config();
			if(($button_text==$button_data)&&(!empty($GLOBALS["destination"]))){
			$images_path = cmr_get_global("destination") . "/" . trim($button_text)  . ".png";
			}else{
	        $images_path = cmr_get_path("image") . "images/button/" . $cmr_lang . "/auto/" . trim($button_data)  . ".png";
				}
    	}
    	
        if(image_save($cmr_config , trim($button_text),  $images_path)){
           print("<br /> ".cmr_translate("button ")." [" . realpath($images_path) . "] ".cmr_translate("successfully created").".......<br />");
        }else{
           print("<br /> ".cmr_translate("button ")." [" . realpath($images_path) . "] ".cmr_translate("not created!!!").".......<br />");
        };
    	
    	
        return false;
        }
    }
    // ==========================================

 //  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>