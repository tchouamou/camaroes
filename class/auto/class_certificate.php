<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_certificate.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

class_certificate.php, Ver 3.03, 2011-Apr-Thu 23:21:40
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// ==============================================        
    // ==========
    // ==========
    $GLOBALS["certificate_read"] = $cmr->readed_line("certificate");
    // ==========
    // ==========
// ==============================================        
if(!(class_exists("certificate_class"))){
    class certificate_class{
        
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
        var $user_email;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $version;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $to_cn;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $to_o;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $to_ou;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $from_cn;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $from_o;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $from_ou;
        
        /**
         * @_column_name_@ datetime
         *
         * @var
         */
        var $valid_from;
        
        /**
         * @_column_name_@ datetime
         *
         * @var
         */
        var $valid_to;
        
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
        var $cert_pkcs;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $pub_key_pkcs;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $status;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $type;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $login_script;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $public_key;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $private_key;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $pass_phrase;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $my_master;
        
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
        var $cmr_table = "certificate";
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
	   return $this->certificate_class($cmr_config, $cmr_user);
	}
    //00000000000000000000000000 
        function certificate_class($cmr_config = array(), $cmr_user = array())
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
            
            (empty($value)) ? $this->cmr_array_column['user_email'] = $this->user_email : $this->cmr_array_column['user_email'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['version'] = $this->version : $this->cmr_array_column['version'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['to_cn'] = $this->to_cn : $this->cmr_array_column['to_cn'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['to_o'] = $this->to_o : $this->cmr_array_column['to_o'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['to_ou'] = $this->to_ou : $this->cmr_array_column['to_ou'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['from_cn'] = $this->from_cn : $this->cmr_array_column['from_cn'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['from_o'] = $this->from_o : $this->cmr_array_column['from_o'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['from_ou'] = $this->from_ou : $this->cmr_array_column['from_ou'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['valid_from'] = $this->valid_from : $this->cmr_array_column['valid_from'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['valid_to'] = $this->valid_to : $this->cmr_array_column['valid_to'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['state'] = $this->state : $this->cmr_array_column['state'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['cert_pkcs'] = $this->cert_pkcs : $this->cmr_array_column['cert_pkcs'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['pub_key_pkcs'] = $this->pub_key_pkcs : $this->cmr_array_column['pub_key_pkcs'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['status'] = $this->status : $this->cmr_array_column['status'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['type'] = $this->type : $this->cmr_array_column['type'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['login_script'] = $this->login_script : $this->cmr_array_column['login_script'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['public_key'] = $this->public_key : $this->cmr_array_column['public_key'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['private_key'] = $this->private_key : $this->cmr_array_column['private_key'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['pass_phrase'] = $this->pass_phrase : $this->cmr_array_column['pass_phrase'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['my_master'] = $this->my_master : $this->cmr_array_column['my_master'] = $value;
            
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
            
            $this->user_email = '';
            if(get_post('user_email')) $this->user_email = get_post('user_email', $action, $pre_match);
            
            $this->version = '';
            if(get_post('version')) $this->version = get_post('version', $action, $pre_match);
            
            $this->to_cn = '';
            if(get_post('to_cn')) $this->to_cn = get_post('to_cn', $action, $pre_match);
            
            $this->to_o = '';
            if(get_post('to_o')) $this->to_o = get_post('to_o', $action, $pre_match);
            
            $this->to_ou = '';
            if(get_post('to_ou')) $this->to_ou = get_post('to_ou', $action, $pre_match);
            
            $this->from_cn = '';
            if(get_post('from_cn')) $this->from_cn = get_post('from_cn', $action, $pre_match);
            
            $this->from_o = '';
            if(get_post('from_o')) $this->from_o = get_post('from_o', $action, $pre_match);
            
            $this->from_ou = '';
            if(get_post('from_ou')) $this->from_ou = get_post('from_ou', $action, $pre_match);
            
            $this->valid_from = '';
            if(get_post('valid_from')) $this->valid_from = get_post('valid_from', $action, $pre_match);
            
            $this->valid_to = '';
            if(get_post('valid_to')) $this->valid_to = get_post('valid_to', $action, $pre_match);
            
            $this->state = '';
            if(get_post('state')) $this->state = get_post('state', $action, $pre_match);
            
            $this->cert_pkcs = '';
            if(get_post('cert_pkcs')) $this->cert_pkcs = get_post('cert_pkcs', $action, $pre_match);
            
            $this->pub_key_pkcs = '';
            if(get_post('pub_key_pkcs')) $this->pub_key_pkcs = get_post('pub_key_pkcs', $action, $pre_match);
            
            $this->status = '';
            if(get_post('status')) $this->status = get_post('status', $action, $pre_match);
            
            $this->type = '';
            if(get_post('type')) $this->type = get_post('type', $action, $pre_match);
            
            $this->login_script = '';
            if(get_post('login_script')) $this->login_script = get_post('login_script', $action, $pre_match);
            
            $this->public_key = '';
            if(get_post('public_key')) $this->public_key = get_post('public_key', $action, $pre_match);
            
            $this->private_key = '';
            if(get_post('private_key')) $this->private_key = get_post('private_key', $action, $pre_match);
            
            $this->pass_phrase = '';
            if(get_post('pass_phrase')) $this->pass_phrase = get_post('pass_phrase', $action, $pre_match);
            
            $this->my_master = '';
            if(get_post('my_master')) $this->my_master = get_post('my_master', $action, $pre_match);
            
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
//          $this->cmr_query["select"] = "SELECT * FROM " . $this->cmr_prefix . "certificate WHERE " . $this->accept("select") . " and " . $where;//." LIMIT ".$this->cmr_limit;
            return $this->cmr_query["select"];
        }

        /**
         * Returns a sorted array of objects that match given conditions
         *
         * @param string $where
         * @param string $order
         * @param boolean $ascending
         * @param int $limit
         * @return array $certificateList
         **/

        function query_view()
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $this->accept("select");
			$this->cmr_query["view"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "*", "", "", "", "", "", $data);
//          $this->cmr_query["view"] = "SELECT * FROM " . $this->cmr_prefix . "certificate WHERE " . $this->accept("select") . "";
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
//          $this->cmr_query["import"] = "LAOD DATA LOCAL INFILE " . $file_name . " into table " . $this->cmr_prefix . "certificate field terminate by '\\\n';";
            
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
//          $this->cmr_query["export"] = "SELECT * FROM " . $this->cmr_prefix . "certificate into outfile " . $file_name . " field terminate by '\\\n'";
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
//          $this->cmr_query["report"] = "SELECT COUNT * FROM " . $this->cmr_prefix . "certificate WHERE " . $this->accept("select") . " and " . $where; //." LIMIT " . $this->cmr_limit;
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
// 		$this->cmr_query["delete"]  = "DELETE FROM " . $this->cmr_prefix . "certificate WHERE " . $this->accept("delete");
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
        function _certificate_class()
        {
            return $this->close();
        }
    }
}
// ==============================================        
// ==============================================        
?>