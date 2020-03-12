<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_asset.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

class_asset.php, Ver 3.03, 2011-Apr-Thu 23:21:40
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// ==============================================        
    // ==========
    // ==========
    $GLOBALS["asset_read"] = $cmr->readed_line("asset");
    // ==========
    // ==========
// ==============================================        
if(!(class_exists("asset_class"))){
    class asset_class{
        
        /**
         * @_column_name_@ bigint
         *
         * @var
         */
        var $id;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $serial;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mac_adress;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $name;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $location;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $ip;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $nat_ip;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mask;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $gateway;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $dns1;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $dns2;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $type;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $os;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $state;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $login_id;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $login_pw;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $check_command;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $certificate;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $my_master;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $my_software;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $my_service;
        
        /**
         * @_column_name_@ datetime
         *
         * @var
         */
        var $date_time;
        

         /**
         *
         * @var int
         */
        var $cmr_id;
         
         
        
        
        
                 
        /**
         *
         * @var array
         */
        var $cmr_array_column = array();
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
        var $cmr_prefix = "";
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
        var $cmr_table = "asset";
        /**
         *
         * @var string
         **/
        var $cmr_order = "id";
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
        var $cmr_connection = NULL;

        /**
         * Constructor
         **/
    //00000000000000000000000000 
	function __construct($cmr_config = array(), $cmr_user = array()) // --constructor--
	{
	   return $this->asset_class($cmr_config, $cmr_user);
	}
    //00000000000000000000000000 
        function asset_class($cmr_config = array(), $cmr_user = array())
        {
	     if(empty($cmr_config)) $cmr_config = cmr_get_config();
	     if(empty($cmr_user)) $cmr_user = cmr_get_user();
	     
	     if(($cmr_config)) $this->cmr_config = $cmr_config;
	     if(($cmr_user)) $this->cmr_user = $cmr_user;
	     
	     
	     $this->cmr_prefix = $this->cmr_config["cmr_table_prefix"];
	     $this->cmr_email = $this->cmr_user["auth_email"];
	     $this->cmr_group = $this->cmr_user["auth_group"];
	     $this->cmr_list_group = $this->cmr_user["auth_list_group"];
	     $this->cmr_type = $this->cmr_user["authorisation"];          
        return $this;
        }

         /**
         *
         * get_array_datas
         **/
        function get_array_datas($value = "")
        {
            
            (empty($value)) ? $this->cmr_array_column['id'] = $this->id : $this->cmr_array_column['id'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['serial'] = $this->serial : $this->cmr_array_column['serial'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mac_adress'] = $this->mac_adress : $this->cmr_array_column['mac_adress'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['name'] = $this->name : $this->cmr_array_column['name'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['location'] = $this->location : $this->cmr_array_column['location'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['ip'] = $this->ip : $this->cmr_array_column['ip'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['nat_ip'] = $this->nat_ip : $this->cmr_array_column['nat_ip'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mask'] = $this->mask : $this->cmr_array_column['mask'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['gateway'] = $this->gateway : $this->cmr_array_column['gateway'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['dns1'] = $this->dns1 : $this->cmr_array_column['dns1'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['dns2'] = $this->dns2 : $this->cmr_array_column['dns2'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['type'] = $this->type : $this->cmr_array_column['type'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['os'] = $this->os : $this->cmr_array_column['os'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['state'] = $this->state : $this->cmr_array_column['state'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['login_id'] = $this->login_id : $this->cmr_array_column['login_id'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['login_pw'] = $this->login_pw : $this->cmr_array_column['login_pw'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['check_command'] = $this->check_command : $this->cmr_array_column['check_command'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['certificate'] = $this->certificate : $this->cmr_array_column['certificate'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['my_master'] = $this->my_master : $this->cmr_array_column['my_master'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['my_software'] = $this->my_software : $this->cmr_array_column['my_software'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['my_service'] = $this->my_service : $this->cmr_array_column['my_service'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['date_time'] = $this->date_time : $this->cmr_array_column['date_time'] = $value;
            
            
            return $this->cmr_array_column;
        }
         /**
         *
         * get_form_datas
         **/
        function get_form_datas($action = "post", $pre_match = "")
        {
            
            $this->id = '';
            if(get_post('id')) $this->id = get_post('id', $action, $pre_match);
            
            $this->serial = '';
            if(get_post('serial')) $this->serial = get_post('serial', $action, $pre_match);
            
            $this->mac_adress = '';
            if(get_post('mac_adress')) $this->mac_adress = get_post('mac_adress', $action, $pre_match);
            
            $this->name = '';
            if(get_post('name')) $this->name = get_post('name', $action, $pre_match);
            
            $this->location = '';
            if(get_post('location')) $this->location = get_post('location', $action, $pre_match);
            
            $this->ip = '';
            if(get_post('ip')) $this->ip = get_post('ip', $action, $pre_match);
            
            $this->nat_ip = '';
            if(get_post('nat_ip')) $this->nat_ip = get_post('nat_ip', $action, $pre_match);
            
            $this->mask = '';
            if(get_post('mask')) $this->mask = get_post('mask', $action, $pre_match);
            
            $this->gateway = '';
            if(get_post('gateway')) $this->gateway = get_post('gateway', $action, $pre_match);
            
            $this->dns1 = '';
            if(get_post('dns1')) $this->dns1 = get_post('dns1', $action, $pre_match);
            
            $this->dns2 = '';
            if(get_post('dns2')) $this->dns2 = get_post('dns2', $action, $pre_match);
            
            $this->type = '';
            if(get_post('type')) $this->type = get_post('type', $action, $pre_match);
            
            $this->os = '';
            if(get_post('os')) $this->os = get_post('os', $action, $pre_match);
            
            $this->state = '';
            if(get_post('state')) $this->state = get_post('state', $action, $pre_match);
            
            $this->login_id = '';
            if(get_post('login_id')) $this->login_id = get_post('login_id', $action, $pre_match);
            
            $this->login_pw = '';
            if(get_post('login_pw')) $this->login_pw = get_post('login_pw', $action, $pre_match);
            
            $this->check_command = '';
            if(get_post('check_command')) $this->check_command = get_post('check_command', $action, $pre_match);
            
            $this->certificate = '';
            if(get_post('certificate')) $this->certificate = get_post('certificate', $action, $pre_match);
            
            $this->my_master = '';
            if(get_post('my_master')) $this->my_master = get_post('my_master', $action, $pre_match);
            
            $this->my_software = '';
            if(get_post('my_software')) $this->my_software = get_post('my_software', $action, $pre_match);
            
            $this->my_service = '';
            if(get_post('my_service')) $this->my_service = get_post('my_service', $action, $pre_match);
            
            $this->date_time = '';
            if(get_post('date_time')) $this->date_time = get_post('date_time', $action, $pre_match);
            
            
            $this->cmr_array_column = $this->get_array_datas();
            
            return true;
        }

         /**
         *
         * accept
         **/
        function accept($action = "select")
        {
//----------------------------
		$cmr_action["table_name"] = $this->cmr_prefix . $this->cmr_table;
		$cmr_action["column"] = "";
		$cmr_action["action"] = $action;
//----------------------------
          return cmr_where_query($this->cmr_config, $this->cmr_user, $cmr_action, $this->connect());
        }

        /**
         *
         *print_value the list of value
         **/
        function print_value()
        {
		$str_print = "";
		$this->cmr_array_column = $this->get_array_datas();
		foreach($this->cmr_array_column as $key => $value)
		$str_print .= '\n - ' . $key . ' : ' . $value;
        return $str_print;
        }
        /**
         *
         * read object from database
         **/
        function query_select($where = "1")
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $where;
			$this->cmr_query["select"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "*", "", "", "", "", "", $data);
//          $this->cmr_query["select"] = "SELECT * FROM " . $this->cmr_prefix . "asset WHERE " . $this->accept("select") . " and " . $where;//." LIMIT ".$this->cmr_limit;
            return $this->cmr_query["select"];
        }

        /**
         * Returns a sorted array of objects that match given conditions
         *
         * @param string $where
         * @param string $order
         * @param boolean $ascending
         * @param int $limit
         * @return array $assetList
         **/

        function query_view()
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $this->accept("select");
			$this->cmr_query["view"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "*", "", "", "", "", "", $data);
//          $this->cmr_query["view"] = "SELECT * FROM " . $this->cmr_prefix . "asset WHERE " . $this->accept("select") . "";
            return $this->cmr_query["view"];
        }
        
        /**
         *query_import
         **/
        function query_import($file_name = "")
        {
			$data["valid"] = "1";
			$data["option"] = "";
			$data["file"] = $file_name;
			$data["separator"] = "\\\n";
		    $this->cmr_query["import"] = sql_run("query", "", "load_data", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "", "", "", "", "", "", $data);
//          $this->cmr_query["import"] = "LAOD DATA LOCAL INFILE " . $file_name . " into table " . $this->cmr_prefix . "asset field terminate by '\\\n';";
            
            return $this->cmr_query["import"];
        }
        
        
        /**
         *query_export
         **/
        function query_export($file_name = "")
        {
			$data["valid"] = "1";
			$data["from"] = "*";
			$data["file"] = $file_name;
			$data["separator"] = "\\\n";
			$this->cmr_query["export"] = sql_run("query", "", "select_file", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "", "", "", "", "", "", $data);
//          $this->cmr_query["export"] = "SELECT * FROM " . $this->cmr_prefix . "asset into outfile " . $file_name . " field terminate by '\\\n'";
            return $this->cmr_query["export"];
        }
        
        /**
         *
         **/
        function query_report($where = "1")
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $where;
			$this->cmr_query["report"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "COUNT *", "", "", "", "", "", $data);
//          $this->cmr_query["report"] = "SELECT COUNT * FROM " . $this->cmr_prefix . "asset WHERE " . $this->accept("select") . " and " . $where; //." LIMIT " . $this->cmr_limit;
            return $this->cmr_query["report"];
        }
        
        /**
         *
         **/
        function query_search($array_func = array())
        {
			$this->cmr_array_column = $this->get_array_datas(get_post("search_text"));
	        $this->cmr_query["search"] = cmr_query_search($this->cmr_array_column, $array_func, $this->cmr_prefix . $this->cmr_table, $this->accept("select"), get_post("search_text"));
            return $this->cmr_query["search"];
        }
        


        /**
         * Clones the object and saves it to the database
         *
         * @return integer $col_id
         **/
        function query_insert($col_id = "")
        {
            if(isset($this->date_time) && empty($this->date_time)) $this->date_time = date("Y-m-d H:i:s");
            if(isset($this->date_time) && empty($this->date_time)) $this->date_time = date("Y-m-d H:i:s");
            
            $this->id = $col_id;
			$this->cmr_array_column = $this->get_array_datas();
            
            $this->cmr_query["insert"] = cmr_query_insert($this->cmr_array_column, $this->cmr_prefix . $this->cmr_table, $this->accept("insert"));
            return $this->cmr_query["insert"];
        	}

        /**
         * Saves the object to the database
         *
         * @return integer $col_id
         **/
        function query_update($col_id = "")
        {
			$this->cmr_array_column = $this->get_array_datas();
			$this->cmr_id = $this->id;
			$array_id["key"] = "id";
			$array_id["value"] = $this->id;
            $this->cmr_query["update"] = cmr_query_update($this->cmr_array_column, $array_id, $col_id, $this->cmr_prefix . $this->cmr_table, $this->accept("update"));
            return $this->cmr_query["update"];
        }

        /**
         * Deletes the object from the database
         *
         * @return boolean
         **/
        function query_delete($col_id = NULL)
        {
// 		$this->cmr_query["delete"]  = "DELETE FROM " . $this->cmr_prefix . "asset WHERE " . $this->accept("delete");
// 		
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
// 		$this->cmr_query["delete"] .= " AND id IN " . sprintf("(%s);", $list_id);
		empty($col_id) ? $val_id = $this->id : $val_id = $col_id;
			$this->cmr_id = $this->id;
			$array_id["key"] = "id";
			$array_id["value"] = $this->id;
			$this->cmr_query["delete"] = cmr_query_delete($array_id, $val_id, $this->cmr_prefix . $this->cmr_table, $this->accept("delete"));
            return $this->cmr_query["delete"];
        }

        /**
         * connect
         **/
        function connect()
        {
	        if(is_resource($this->cmr_connection)) return $this->cmr_connection;
            return cmr_get_db_connection();
        }
        
        /**
         * run query
         *
         * @return
         **/
        function run_query($query = "")
        {
        	$result_query = sql_run("result", $this->connect(), "sql", $query);
            $this->affect_rown = $result_query->RecordCount();
            return $result_query;
        }
        
        /**
         * data_query()
         *
         * @return
         **/
        function data_query($query = "")
        {
            return sql_run("array", $this->connect(), "sql", $query);
        }
// ==============================================        
// ==============================================        
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
        function _asset_class()
        {
            return $this->close();
        }
    }
}
// ==============================================        
// ==============================================        
?>