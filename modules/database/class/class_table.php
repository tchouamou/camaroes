<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_table.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.



























class_table.php, Ver 3.03 
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
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
if(!(class_exists("table_class"))){
    class table_class {
        /**
         * @_array_columns_@ @_column_type_@
         *
         * @var
         */
        var $array_columns = array();
        var $array_val = array();
		
         /**
         *
         * @var int
         */
        var $column_id;
        var $id_table;
         
         
        
        
        
                 
        /**
         *
         * @var array
         */
        var $cmr_query = array();
        /**
         *
         * @var array
         */
        var $cmr_config = array();
        /**
         *
         * @var array
         **/
        var $cmr_user = array();
        /**
         *
         * @var string
         **/
        var $database = "";
        /**
         *
         * @var string
         **/
        var $table_name = "";
        /**
         *
         * @var string
         **/
        var $cmr_email = "guess@localhost";
        /**
         *
         * @var string
         **/
        var $cmr_group = "guess";
        /**
         *
         * @var string
         */
        var $cmr_list_group = "guess";
        /**
         *
         * @var string
         **/
        var $cmr_type = "0";
        /**
         *
         * @var string
         **/
        var $cmr_where = "1";
        /**
         *
         * @var string
         **/
        var $cmr_from = "";
        /**
         *
         * @var string
         **/
        var $cmr_order = "";
        /**
         *
         * @var Int
         **/
        var $cmr_limit = "1000";
        /**
         *
         * @var Boolean
         **/
        var $cmr_ascending = true;

        /**
         * Constructor
         **/
        function table_class()
        {
	     $this->cmr_config = cmr_get_config();
	     $this->cmr_user = cmr_get_user();
	     $this->cmr_from = $this->database . "." . $this->table_name;
	     $this->cmr_order = $this->column_id;
	     
// 	     $this->database = "";
	     $this->cmr_email = $this->cmr_user["auth_email"];
	     $this->cmr_group = $this->cmr_user["auth_group"];
	     $this->cmr_list_group = $this->cmr_user["auth_list_group"];
	     $this->cmr_type = $this->cmr_user["authorisation"];          
        return $this;
        }

         /**
         * get__all
         **/
        function get_form_datas($action = "post", $pre_match = "")
        {
	        
			foreach($this->array_columns as $key => $value){
			$this->array_val[$value] = get_post($value, $action, $pre_match);
        	}
            return true;
        }

         /**
         * accept
         **/
        function accept($action = "select")
        {
// //----------------------------
		$cmr_action["table_name"] = $this->database . "." . $this->table_name;
		$cmr_action["column"] = "";
		$cmr_action["action"] = $action;
// //----------------------------
          return cmr_where_query($this->cmr_config, $this->cmr_user, $cmr_action, $this->connect());
        }

        /**
         * read object from database
         **/
        function query_select($where = "1")
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $where;
			$this->cmr_query["select"] = sql_run("query", "", "select", "", $this->database, $this->table_name, "*", "", "", "", "", "", $data);
//             $this->cmr_query["select"] = "SELECT * FROM " . $this->database . "." . $this->table_name . " WHERE " . $this->accept("select") . " and " . $where;
            //." LIMIT ".$this->cmr_limit;
            return $this->cmr_query["select"];
        }

        /**
         * Returns a sorted array of objects that match given conditions
         *
         * @param string $where
         * @param string $order
         * @param boolean $ascending
         * @param int $limit
         * @return array $tableList
         **/

        function query_view()
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $this->accept("select");
			$this->cmr_query["view"] = sql_run("query", "", "select", "", $this->database, $this->table_name, "*", "", "", "", "", "", $data);
//             $this->cmr_query["view"] = "SELECT * FROM " . $this->database . "." . $this->table_name . " WHERE " . $this->accept("select");
            return $this->cmr_query["view"];
        }
        /**
         *
         **/
        function query_import($file_name = "")
        {
			$data["valid"] = "1";
			$data["option"] = "";
			$data["file"] = $file_name;
			$data["separator"] = "\n";
		    $this->cmr_query["import"] = sql_run("query", "", "load_data", "", $this->database, $this->table_name, "", "", "", "", "", "", $data);
//             $this->cmr_query["import"] = "LAOD DATA LOCAL INFILE " . $file_name . " into table " . $this->database . "." . $this->table_name . " field terminate by '\n';";
            
            return $this->cmr_query["import"];
        }
        /**
         *
         **/

        function query_export($file_name = "")
        {
			$data["valid"] = "1";
			$data["from"] = "*";
			$data["file"] = $file_name;
			$data["separator"] = "\n";
			$this->cmr_query["export"] = sql_run("query", "", "select_file", "", $this->database, $this->table_nam, "", "", "", "", "", "", $data);
//             $this->cmr_query["export"] = "SELECT * FROM " . $this->database . "." . $this->table_name . " INTO OUTFILE " . $file_name . " field terminate by '\n'";
            return $this->cmr_query["export"];
        }
        /**
         *
         **/
        function query_report($where = "1")
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $where;
			$this->cmr_query["report"] = sql_run("query", "", "select", "", $this->database, $this->table_name, "COUNT *", "", "", "", "", "", $data);
//             $this->cmr_query["report"] = "SELECT COUNT * FROM " . $this->database . "." . $this->table_name . " WHERE " . $this->accept("select") . " AND ".$where;
            return $this->cmr_query["report"];
        }
        /**
         *
         **/
        function query_search($array_func = array())
        {
// 		$str_search = "SELECT * FROM  " . $this->database . "." . $this->table_name . " WHERE ( " . $this->accept("select");
// 		
// 		foreach($this->array_columns as $key => $value){
// 		if(strlen($this->array_val[$value]) > 0) $str_search .= "AND " . $value . " " . search_func_column($array_func[$value], $this->array_val[$value]);
//         }
// 		
// 		$str_search .= " ) ";
//             $this->cmr_query["search"] = $str_search;
	        $this->cmr_query["search"] = cmr_query_search($this->array_val, $array_func, $this->database . "." . $this->table_name, $this->accept("select"));
            return $this->cmr_query["search"];
        }


        /**
         * Clones the object and saves it to the database
         *
         * @return integer $id_table
         **/
        function query_insert($id_table = "")
        {
            $this->id_table = $id_table;
//             $this->cmr_query["insert"] = "";
//             
// 	        if($this->accept("insert")){
//             $this->cmr_query["insert"] .= "INSERT INTO  " . $this->database . "." . $this->table_name . " VALUES (";
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 			foreach($this->array_columns as $key => $value){ 
//             $this->cmr_query["insert"] .= sprintf("'%s',", cmr_escape($this->array_val[$value]));
//             } 
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 			$this->cmr_query["insert"] = substr($this->cmr_query["insert"],0,-1);
//             $this->cmr_query["insert"] .= ");";
// 			}

            $this->cmr_query["insert"] = cmr_query_insert($this->array_val, $this->database . "." . $this->table_name, $this->accept("insert"));
            return $this->cmr_query["insert"];
        }

        /**
         * Saves the object to the database
         *
         * @return integer $id_table
         **/
        function query_update($id_table = "")
        {
//             $this->cmr_query["update"] = "UPDATE " . $this->database . "." . $this->table_name . " SET  ";
// 			foreach($this->array_columns as $key => $value){
// 			 if(strlen($this->array_val[$value]) > 0) $this->cmr_query["update"] .= sprintf("" . $value . " = '%s',", cmr_escape($this->array_val[$value]));
// 	        }
// 			
// 			
// 			($id_table == "") ? $val_id = $this->id_table : $val_id=$id_table;
// 			
// 			$this->cmr_query["update"] = substr($this->cmr_query["update"],0,-1);
//             $this->cmr_query["update"] .= sprintf(" WHERE " . $this->accept("update") . " AND " . $this->column_id . " = '%s';", cmr_escape($val_id));

			$array_id["key"] = $this->column_id;
			$array_id["value"] = $this->id_table;
            $this->cmr_query["update"] = cmr_query_update($this->array_val, $array_id, $id_table, $this->database . "." . $this->table_name, $this->accept("update"));
            return $this->cmr_query["update"];
        }
        /**
         * Deletes the object from the database
         *
         * @return boolean
         **/
        function query_delete($id_table=NULL)
        {
		
		
// 		$this->cmr_query["delete"]  = "DELETE FROM " . $this->database . "." . $this->table_name . " WHERE " . $this->accept("delete");
// 		$list_id = "";
// 		if(is_array($val_id)){
// 				foreach($val_id as $key => $value){
// 				$list_id .= "'" . cmr_escape($value) . "',";
// 				}
// 				$list_id = substr($list_id,0,-1);
// 		}else{
// 		$list_id = "'" . cmr_escape($val_id) . "'";
// 		}
// 				
// 		$this->cmr_query["delete"] .= " AND " . $this->column_id . " IN " . sprintf("(%s);", $list_id);
		empty($id_table) ? $val_id = $this->id_table : $val_id=$id_table;
			$array_id["key"] = $this->column_id;
			$array_id["value"] = $this->id_table;
			$this->cmr_query["delete"] = cmr_query_delete($array_id, $id_table, $this->database . "." . $this->table_name, $this->accept("delete"));
            return $this->cmr_query["delete"];
        }

        /**
         * connect
         **/
        function connect()
        {
            return $GLOBALS["cmr_db_connection"];
        }
        /**
         * run query
         *
         * @return
         **/
        function run_query($type = "select")
        {
		    if($this->accept($type)){
	            $result_query=&$conn->Execute($this->cmr_query[$type], $this->connect());
	            $this->affect_rown = cmrdb_affected_rows($this->connect());
			}else{
            return false;
			}
            return $result_query;
        }
        /**
         * data_query()
         *
         * @return
         **/
        function data_query($where = "1")
        {
            return sql_run("array", $this->connect(), "sql", $this->query_select($where));
        }
// ==============================================        
// ==============================================        
        
        /**
         * function to get the array_columns value.
         **/
		function get_array_val()
		{ 
			return $this->array_val;
		} 
        
// ==============================================        
// ==============================================        
        
        
		function get_cmr_config()
		{ 
			return $this->cmr_config;
		}
		function get_cmr_user()
		{ 
			return $this->cmr_user;
		}
		
		function get_id_table()
		{ 
			return $this->id_table;
		}
		function get_query()
		{ 
			return $this->cmr_query;
		}
		function get_database()
		{ 
			return $this->database;
		}
		function get_cmr_email()
		{ 
			return $this->cmr_email;
		}
		function get_cmr_group()
		{ 
			return $this->cmr_group;
		}
		function get_cmr_list_group()
		{ 
			return $this->cmr_list_group;
		}
		function get_cmr_type()
		{ 
			return $this->cmr_type;
		}
		function get_cmr_where()
		{ 
			return $this->cmr_where;
		}
		function get_cmr_from()
		{ 
			return $this->cmr_from;
		}
		function get_cmr_order()
		{ 
			return $this->cmr_order;
		}
		function get_cmr_limit()
		{ 
			return $this->cmr_limit;
		}
		function get_cmr_ascending($param=true)
		{ 
			return $this->cmr_ascending;
		}
// ==============================================        
// ==============================================        
        /**
         * function to set the array_columns by value ($param).
         **/
		function set_array_val($param=array())
		{ 
			return $this->array_val=$param;
		} 
        
// ==============================================        
// ==============================================        
        
		function set_cmr_config($param=array())
		{ 
			return ($this->cmr_config=$param);
		}
		function set_cmr_user($param=array())
		{ 
			return ($this->cmr_user=$param);
		}
        
		function set_id_table($param = "0")
		{ 
			return ($this->id_table=$param);
		}
		function set_query($param=array())
		{ 
			return ($this->cmr_query=$param);
		}
		function set_database($param = "")
		{ 
			return ($this->database=$param);
		}
		function set_cmr_email($param = "guess@localhost")
		{ 
			return ($this->cmr_email=$param);
		}
		function set_cmr_group($param = "guess")
		{ 
			return ($this->cmr_group=$param);
			}
		function set_cmr_list_group($param = "guess")
		{ 
			return ($this->cmr_list_group=$param);
		}
		function set_cmr_type($param = "0")
		{ 
			return ($this->cmr_type=$param);
		}
		function set_cmr_where($param = "1")
		{ 
			return ($this->cmr_where=$param);
			}
		function set_cmr_from($param = "@_table1_@")
		{ 
			return ($this->cmr_from=$param);
		}
		function set_cmr_order($param = "")
		{ 
			return ($this->cmr_order=$param);
		}
		function set_cmr_limit($param = "1000")
		{ 
			return ($this->cmr_limit=$param);
		}
		function set_cmr_ascending($param=true)
		{ 
			return ($this->cmr_ascending=$param);
		}
// ==============================================        
// ==============================================        
        

        /**
         * close 
         **/
        function close()
        {
	        $this->cmr_query = array();
            return true;
        }
        /**
         * Destructor
         **/
        function _table_class()
        {
            return $this->close();
        }
    }
}
//  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>