<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_ticket.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

class_ticket.php, Ver 3.03, 2011-Apr-Thu 23:21:48
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// ==============================================        
    // ==========
    // ==========
    $GLOBALS["ticket_read"] = $cmr->readed_line("ticket");
    // ==========
    // ==========
// ==============================================        
if(!(class_exists("ticket_class"))){
    class ticket_class{
        
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
        var $number;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $lang;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $title;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $work_by;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $call_log_user;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $call_log_group;
        
        /**
         * @_column_name_@ set
         *
         * @var
         */
        var $call_method;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $state;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $state_now;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $assign_to;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $list_user_impact;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $list_group_impact;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $list_asset_impact;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $severity;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $sla;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mail_title;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mail_from;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mail_to;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mail_cc;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $mail_bcc;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $attach;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $type;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $text;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $mail_text;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $my_master;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $comment;
        
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
        var $cmr_table = "ticket";
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
	   return $this->ticket_class($cmr_config, $cmr_user);
	}
    //00000000000000000000000000 
        function ticket_class($cmr_config = array(), $cmr_user = array())
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
            
            (empty($value)) ? $this->cmr_array_column['number'] = $this->number : $this->cmr_array_column['number'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['lang'] = $this->lang : $this->cmr_array_column['lang'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['title'] = $this->title : $this->cmr_array_column['title'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['work_by'] = $this->work_by : $this->cmr_array_column['work_by'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['call_log_user'] = $this->call_log_user : $this->cmr_array_column['call_log_user'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['call_log_group'] = $this->call_log_group : $this->cmr_array_column['call_log_group'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['call_method'] = $this->call_method : $this->cmr_array_column['call_method'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['state'] = $this->state : $this->cmr_array_column['state'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['state_now'] = $this->state_now : $this->cmr_array_column['state_now'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['assign_to'] = $this->assign_to : $this->cmr_array_column['assign_to'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['list_user_impact'] = $this->list_user_impact : $this->cmr_array_column['list_user_impact'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['list_group_impact'] = $this->list_group_impact : $this->cmr_array_column['list_group_impact'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['list_asset_impact'] = $this->list_asset_impact : $this->cmr_array_column['list_asset_impact'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['severity'] = $this->severity : $this->cmr_array_column['severity'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['sla'] = $this->sla : $this->cmr_array_column['sla'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_title'] = $this->mail_title : $this->cmr_array_column['mail_title'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_from'] = $this->mail_from : $this->cmr_array_column['mail_from'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_to'] = $this->mail_to : $this->cmr_array_column['mail_to'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_cc'] = $this->mail_cc : $this->cmr_array_column['mail_cc'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_bcc'] = $this->mail_bcc : $this->cmr_array_column['mail_bcc'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['attach'] = $this->attach : $this->cmr_array_column['attach'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['type'] = $this->type : $this->cmr_array_column['type'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['text'] = $this->text : $this->cmr_array_column['text'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['mail_text'] = $this->mail_text : $this->cmr_array_column['mail_text'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['my_master'] = $this->my_master : $this->cmr_array_column['my_master'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['comment'] = $this->comment : $this->cmr_array_column['comment'] = $value;
            
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
            
            $this->number = '';
            if(get_post('number')) $this->number = get_post('number', $action, $pre_match);
            
            $this->lang = '';
            if(get_post('lang')) $this->lang = get_post('lang', $action, $pre_match);
            
            $this->title = '';
            if(get_post('title')) $this->title = get_post('title', $action, $pre_match);
            
            $this->work_by = '';
            if(get_post('work_by')) $this->work_by = get_post('work_by', $action, $pre_match);
            
            $this->call_log_user = '';
            if(get_post('call_log_user')) $this->call_log_user = get_post('call_log_user', $action, $pre_match);
            
            $this->call_log_group = '';
            if(get_post('call_log_group')) $this->call_log_group = get_post('call_log_group', $action, $pre_match);
            
            $this->call_method = '';
            if(get_post('call_method')) $this->call_method = get_post('call_method', $action, $pre_match);
            
            $this->state = '';
            if(get_post('state')) $this->state = get_post('state', $action, $pre_match);
            
            $this->state_now = '';
            if(get_post('state_now')) $this->state_now = get_post('state_now', $action, $pre_match);
            
            $this->assign_to = '';
            if(get_post('assign_to')) $this->assign_to = get_post('assign_to', $action, $pre_match);
            
            $this->list_user_impact = '';
            if(get_post('list_user_impact')) $this->list_user_impact = get_post('list_user_impact', $action, $pre_match);
            
            $this->list_group_impact = '';
            if(get_post('list_group_impact')) $this->list_group_impact = get_post('list_group_impact', $action, $pre_match);
            
            $this->list_asset_impact = '';
            if(get_post('list_asset_impact')) $this->list_asset_impact = get_post('list_asset_impact', $action, $pre_match);
            
            $this->severity = '';
            if(get_post('severity')) $this->severity = get_post('severity', $action, $pre_match);
            
            $this->sla = '';
            if(get_post('sla')) $this->sla = get_post('sla', $action, $pre_match);
            
            $this->mail_title = '';
            if(get_post('mail_title')) $this->mail_title = get_post('mail_title', $action, $pre_match);
            
            $this->mail_from = '';
            if(get_post('mail_from')) $this->mail_from = get_post('mail_from', $action, $pre_match);
            
            $this->mail_to = '';
            if(get_post('mail_to')) $this->mail_to = get_post('mail_to', $action, $pre_match);
            
            $this->mail_cc = '';
            if(get_post('mail_cc')) $this->mail_cc = get_post('mail_cc', $action, $pre_match);
            
            $this->mail_bcc = '';
            if(get_post('mail_bcc')) $this->mail_bcc = get_post('mail_bcc', $action, $pre_match);
            
            $this->attach = '';
            if(get_post('attach')) $this->attach = get_post('attach', $action, $pre_match);
            
            $this->type = '';
            if(get_post('type')) $this->type = get_post('type', $action, $pre_match);
            
            $this->text = '';
            if(get_post('text')) $this->text = get_post('text', $action, $pre_match);
            
            $this->mail_text = '';
            if(get_post('mail_text')) $this->mail_text = get_post('mail_text', $action, $pre_match);
            
            $this->my_master = '';
            if(get_post('my_master')) $this->my_master = get_post('my_master', $action, $pre_match);
            
            $this->comment = '';
            if(get_post('comment')) $this->comment = get_post('comment', $action, $pre_match);
            
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
//          $this->cmr_query["select"] = "SELECT * FROM " . $this->cmr_prefix . "ticket WHERE " . $this->accept("select") . " and " . $where;//." LIMIT ".$this->cmr_limit;
            return $this->cmr_query["select"];
        }

        /**
         * Returns a sorted array of objects that match given conditions
         *
         * @param string $where
         * @param string $order
         * @param boolean $ascending
         * @param int $limit
         * @return array $ticketList
         **/

        function query_view()
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $this->accept("select");
			$this->cmr_query["view"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "*", "", "", "", "", "", $data);
//          $this->cmr_query["view"] = "SELECT * FROM " . $this->cmr_prefix . "ticket WHERE " . $this->accept("select") . "";
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
//          $this->cmr_query["import"] = "LAOD DATA LOCAL INFILE " . $file_name . " into table " . $this->cmr_prefix . "ticket field terminate by '\\\n';";
            
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
//          $this->cmr_query["export"] = "SELECT * FROM " . $this->cmr_prefix . "ticket into outfile " . $file_name . " field terminate by '\\\n'";
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
//          $this->cmr_query["report"] = "SELECT COUNT * FROM " . $this->cmr_prefix . "ticket WHERE " . $this->accept("select") . " and " . $where; //." LIMIT " . $this->cmr_limit;
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
// 		$this->cmr_query["delete"]  = "DELETE FROM " . $this->cmr_prefix . "ticket WHERE " . $this->accept("delete");
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
        function _ticket_class()
        {
            return $this->close();
        }
    }
}
// ==============================================        
// ==============================================        
?>