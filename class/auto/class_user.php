<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_user.php
 *         ---------
 * begin    : July 2004 - October 2011
 * copyright : Camaroes Ver 3.03 (C) 2004-2011 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */

/*
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.

class_user.php, Ver 3.03, 2011-Apr-Thu 23:21:48
*/

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// ==============================================        
    // ==========
    // ==========
    $GLOBALS["user_read"] = $cmr->readed_line("user");
    // ==========
    // ==========
// ==============================================        
if(!(class_exists("user_class"))){
    class user_class{
        
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
        var $uid;
        
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
        var $last_name;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $nickname;
        
        /**
         * @_column_name_@ enum
         *
         * @var
         */
        var $sexe;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $role;
        
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
        var $pw;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $email;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $email_sign;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $tel;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $cel;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $home;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $adress;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $location;
        
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
        var $status;
        
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
        var $lang;
        
        /**
         * @_column_name_@ varchar
         *
         * @var
         */
        var $style;
        
        /**
         * @_column_name_@ text
         *
         * @var
         */
        var $login_script;
        
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
        var $photo;
        
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
        var $cmr_table = "user";
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
	   return $this->user_class($cmr_config, $cmr_user);
	}
    //00000000000000000000000000 
        function user_class($cmr_config = array(), $cmr_user = array())
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
            
            (empty($value)) ? $this->cmr_array_column['uid'] = $this->uid : $this->cmr_array_column['uid'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['name'] = $this->name : $this->cmr_array_column['name'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['last_name'] = $this->last_name : $this->cmr_array_column['last_name'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['nickname'] = $this->nickname : $this->cmr_array_column['nickname'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['sexe'] = $this->sexe : $this->cmr_array_column['sexe'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['role'] = $this->role : $this->cmr_array_column['role'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['sla'] = $this->sla : $this->cmr_array_column['sla'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['pw'] = $this->pw : $this->cmr_array_column['pw'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['email'] = $this->email : $this->cmr_array_column['email'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['email_sign'] = $this->email_sign : $this->cmr_array_column['email_sign'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['tel'] = $this->tel : $this->cmr_array_column['tel'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['cel'] = $this->cel : $this->cmr_array_column['cel'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['home'] = $this->home : $this->cmr_array_column['home'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['adress'] = $this->adress : $this->cmr_array_column['adress'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['location'] = $this->location : $this->cmr_array_column['location'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['state'] = $this->state : $this->cmr_array_column['state'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['status'] = $this->status : $this->cmr_array_column['status'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['type'] = $this->type : $this->cmr_array_column['type'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['lang'] = $this->lang : $this->cmr_array_column['lang'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['style'] = $this->style : $this->cmr_array_column['style'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['login_script'] = $this->login_script : $this->cmr_array_column['login_script'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['certificate'] = $this->certificate : $this->cmr_array_column['certificate'] = $value;
            
            (empty($value)) ? $this->cmr_array_column['photo'] = $this->photo : $this->cmr_array_column['photo'] = $value;
            
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
            
            $this->uid = '';
            if(get_post('uid')) $this->uid = get_post('uid', $action, $pre_match);
            
            $this->name = '';
            if(get_post('name')) $this->name = get_post('name', $action, $pre_match);
            
            $this->last_name = '';
            if(get_post('last_name')) $this->last_name = get_post('last_name', $action, $pre_match);
            
            $this->nickname = '';
            if(get_post('nickname')) $this->nickname = get_post('nickname', $action, $pre_match);
            
            $this->sexe = '';
            if(get_post('sexe')) $this->sexe = get_post('sexe', $action, $pre_match);
            
            $this->role = '';
            if(get_post('role')) $this->role = get_post('role', $action, $pre_match);
            
            $this->sla = '';
            if(get_post('sla')) $this->sla = get_post('sla', $action, $pre_match);
            
            $this->pw = '';
            if(get_post('pw')) $this->pw = get_post('pw', $action, $pre_match);
            
            $this->email = '';
            if(get_post('email')) $this->email = get_post('email', $action, $pre_match);
            
            $this->email_sign = '';
            if(get_post('email_sign')) $this->email_sign = get_post('email_sign', $action, $pre_match);
            
            $this->tel = '';
            if(get_post('tel')) $this->tel = get_post('tel', $action, $pre_match);
            
            $this->cel = '';
            if(get_post('cel')) $this->cel = get_post('cel', $action, $pre_match);
            
            $this->home = '';
            if(get_post('home')) $this->home = get_post('home', $action, $pre_match);
            
            $this->adress = '';
            if(get_post('adress')) $this->adress = get_post('adress', $action, $pre_match);
            
            $this->location = '';
            if(get_post('location')) $this->location = get_post('location', $action, $pre_match);
            
            $this->state = '';
            if(get_post('state')) $this->state = get_post('state', $action, $pre_match);
            
            $this->status = '';
            if(get_post('status')) $this->status = get_post('status', $action, $pre_match);
            
            $this->type = '';
            if(get_post('type')) $this->type = get_post('type', $action, $pre_match);
            
            $this->lang = '';
            if(get_post('lang')) $this->lang = get_post('lang', $action, $pre_match);
            
            $this->style = '';
            if(get_post('style')) $this->style = get_post('style', $action, $pre_match);
            
            $this->login_script = '';
            if(get_post('login_script')) $this->login_script = get_post('login_script', $action, $pre_match);
            
            $this->certificate = '';
            if(get_post('certificate')) $this->certificate = get_post('certificate', $action, $pre_match);
            
            $this->photo = '';
            if(get_post('photo')) $this->photo = get_post('photo', $action, $pre_match);
            
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
//          $this->cmr_query["select"] = "SELECT * FROM " . $this->cmr_prefix . "user WHERE " . $this->accept("select") . " and " . $where;//." LIMIT ".$this->cmr_limit;
            return $this->cmr_query["select"];
        }

        /**
         * Returns a sorted array of objects that match given conditions
         *
         * @param string $where
         * @param string $order
         * @param boolean $ascending
         * @param int $limit
         * @return array $userList
         **/

        function query_view()
        {
			$data["valid"] = $this->accept("select");
			$data["sql_where"] =  $this->accept("select");
			$this->cmr_query["view"] = sql_run("query", "", "select", "", $this->cmr_config["db_name"], $this->cmr_prefix . $this->cmr_table, "*", "", "", "", "", "", $data);
//          $this->cmr_query["view"] = "SELECT * FROM " . $this->cmr_prefix . "user WHERE " . $this->accept("select") . "";
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
//          $this->cmr_query["import"] = "LAOD DATA LOCAL INFILE " . $file_name . " into table " . $this->cmr_prefix . "user field terminate by '\\\n';";
            
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
//          $this->cmr_query["export"] = "SELECT * FROM " . $this->cmr_prefix . "user into outfile " . $file_name . " field terminate by '\\\n'";
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
//          $this->cmr_query["report"] = "SELECT COUNT * FROM " . $this->cmr_prefix . "user WHERE " . $this->accept("select") . " and " . $where; //." LIMIT " . $this->cmr_limit;
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
// 		$this->cmr_query["delete"]  = "DELETE FROM " . $this->cmr_prefix . "user WHERE " . $this->accept("delete");
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
        function _user_class()
        {
            return $this->close();
        }
    }
}
// ==============================================        
// ==============================================        
?>
