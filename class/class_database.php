<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * class_database.php
 * ---------
 * begin    : July 2004 - October 2011
 * copyright   : TSTM Ver 2.03 (C) 2004-2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */

/*  @license http://www.gnu.org/copyleft/gpl.html GNU/GPL */
/**
Copyright (c) 2011, Tchouamou Eric Herve  <tchouamou@gmail.com>
All rights reserved.












class_database.php,Ver 3.0  2011-July 10:36:59
*/



/**
 * Information about
 *
 * This is a modular application, all can be personalise, config file, template file, class, function, module
 * $division object istance of the class windowss
 *
 * @open _windows Class use to make module windows
 * @code_link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php");
// !!!!!!!!!!!Security and authorisation!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(!(class_exists("class_database"))){
class class_database
{
	var $return_type = "";
	var $db_connection = NULL;

	var $action = "show_databases";
	var $sql = "SELECT NOW()";

	var $db = "";
	var $table = "";
	var $field = "";

	var $order = "";
	var $limit = "";

	var $host = "localhost";
	var $user = "root";
	var $password = "";


	var $sql_data = array();
// 		$sql_data["index"] = "id",
// 		$sql_data["name"] = "",
// 		$sql_data["field_type"] = "",
// 		$sql_data["select"] = "*",
// 		$sql_data["from"] = "",
// 		$sql_data["sql_where"] = "1",
// 		$sql_data["like"] = "",
// 		$sql_data["row"] = "",
// 		$sql_data["group_by"] = "id",
// 		$sql_data["if_exists"],
// 		$sql_data["new_field"],
// 		$sql_data["new_type"],
// 		$sql_data["separator"],
// 		$sql_data["file"],
// 		$sql_data["option"],
// 		$sql_data["privilege"],
// 		$sql_data["user"],
// 		$sql_data["with"]
// 		$sql_data["severity"],
// 		$sql_data["list_value"],
// 		$sql_data["valid"]

	var $db_type = "mysqli";
	var $port = "";
	var $sockect = "";
	var $affect_rown = 0;
	var $prefix = "";
	var $where_query = "";
	var $list_group = "";
	var $group = "";
	var $email = "";
	var $send_date = "";
	var $language = "";

	var $type = "";

	var $cmr_config = array();
	var $cmr_user = array();
	var $cmr_action = array();





    //00000000000000000000000000
	function __construct($cmr_config = array(), $cmr_user = array(), $cmr_action = array(), $cmr_db_connection = NULL) // --constructor--
	{
	   return $this->class_database($cmr_config, $cmr_user, $cmr_action, $cmr_db_connection);
	}
    //00000000000000000000000000
	function class_database($cmr_config = array(), $cmr_user = array(), $cmr_action = array(), $cmr_db_connection = NULL)
	{
		//Call parent constructor
		//Initialization
		$this->cmr_config = $cmr_config;
		$this->cmr_user = $cmr_user;
		$this->cmr_action = $cmr_action;
		$this->db_connection = $cmr_db_connection;

		$this->prefix = $this->cmr_config["cmr_table_prefix"];
		$this->list_group = $this->cmr_user["auth_list_group"];
		$this->group = $this->cmr_user["auth_group"];
		$this->email = $this->cmr_user["auth_email"];

		if(empty($this->cmr_action["where"])) $this->cmr_action["where"] = "";
		$this->where_query = $this->cmr_action["where"];
		$this->sql_data["valid"] = $this->where_query;


// 		$this->limit = $this->cmr_config["cmr_max_view"];

		$this->db = $this->cmr_config["db_name"];
		$this->host = $this->cmr_config["db_host"];
		$this->user = $this->cmr_config["db_user"];
		$this->pw = $this->cmr_config["db_pw"];
	}
        /**
         * class_database::run_query()
         *
         * @return
         **/
        function run_query()
        {
			$rs = sql_run("result", $this->db_connnection, "", $this->sql);
// 		    $rs = &$this->db_connnection->Execute($this->sql);
            //if($rs) $this->affect_rown = $rs->RecordCount();
						if($rs) $this->affect_rown = $rs->affected_rows;
            return $rs;
        }


        /**
         * class_database::connnection()
         *
         * @return
         **/
        function connection()
        {
			//$conn = NewADOConnection($this->db_type);
			   $conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
			//$conn->Connect($this->host, $this->user, $this->pw) or db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->ErrorMsg());
         if ($conn->connect_errno)  db_die(__LINE__  . " - "  . __FILE__ . ": " . $conn->connect_errno);
			//if(!is_resource($conn)) $conn = cmr_get_db_connection();
			   $this->db_connnection = $conn;
        return $conn;
        }

        /**
         * class_database::select_db()
         *
         * @return
         **/
        function select_db( )
        {
					$conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
					return $conn;
			//return $this->db_connnection->Connect($this->host, $this->user, $this->pw, $this->db);
//             return cmrdb_select_db($this->sql_database, $this->db_connnection);
        }

        /**
         * class_database::escape_str()
         *
         * @param mixed $sql_data
         * @return
         **/
        function escape_str($sql_data)
        {
// 		   if(get_magic_quotes_gpc())$sql_data = stripslashes($sql_data);
// 		   if(!is_numeric($sql_data) || $this->sql_data[0] == '0') $sql_data = "'" . mysql_real_escape_string($sql_data) . "'";
					//return $this->db_connnection->qstr($sql_data);
					return $this->db_connnection->real_escape_string($sql_data);

        }
/**
 * class_database::get_query()
 *
 * @return
 **/
function get_query($action = "", $cmr_action = "")
{
if($cmr_action){
// $this->cmr_action["column"] = $column;
$this->cmr_action["action"] = $cmr_action;
$this->where_query = cmr_where_query($this->cmr_config, $this->cmr_user, $this->cmr_action, $this->db_connection);
$this->sql_data["valid"] = $this->where_query;
}

$this->sql = "";
switch($action){

	case "all_message":
	// !!!!!!!!!!!!!!ALL MESSAGE !!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "message.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "message.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "message  ";
		$this->sql .= " WHERE (1) ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "all_ticket":
	// !!!!!!!!!!!!ALL TICKET!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE ((call_log_group in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "closed_ticket":
	// !!!!!!!!!!!!!!!!!!Close Tickret!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE ((state_now=state) and ((state='close') or (state='closed')) ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		// $this->sql .= "and (date_sub(curdate(),interval 10 day) <= date_time)  ";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "current_message":
	// !!!!!!!!!!!!!!Current, message!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT *  FROM  " . $this->prefix . "message";
		$this->sql .= " WHERE (";
		$this->sql .= "(((begin_time + 0 <= CURRENT_TIMESTAMP + 0) AND (end_time  + 0 >= CURRENT_TIMESTAMP + 0)) OR (end_time  + 0 <= begin_time + 0)) ";
		$this->sql .= " AND (state <> 'disable') ";

		$this->sql .= " AND ((users_dest='' ";
		$this->sql .= " AND groups_dest='' AND modules_dest LIKE ('%%')) OR ";

		$this->sql .= " (users_dest LIKE ('%" . $this->email . "%') ";
		$this->sql .= " AND groups_dest='' and modules_dest LIKE ('%%')) OR ";

		$this->sql .= " (users_dest='' ";
		$this->sql .= " AND groups_dest IN (" . $this->list_group . ")  AND modules_dest LIKE ('%%')) OR ";

		$this->sql .= " (users_dest LIKE ('%" . $this->email . "%') ";
		$this->sql .= " OR groups_dest IN (" . $this->list_group . ")  AND modules_dest LIKE ('%%')) ";
		$this->sql .= ")) AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "date_message":
	// !!!!!!!!!!!!!!!!!!!!!!DATE MESSAGE!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT *  FROM  " . $this->prefix . "message";
		$this->sql .= " where  ( ";

		$this->sql .= "(((begin_time <= '" . $this->send_date . "')) ";
		$this->sql .= " OR ((end_time + 0 <= begin_time + 0) AND (date_time  + 0 <= '" . $this->send_date . "'))) ";


		$this->sql.= " AND (state <> 'disable') ";


		$this->sql.= " AND (( users_dest like ('%" . $this->email . "%')) ";
		$this->sql.= " OR (sender like ('%" . $this->email . "%')) OR (groups_dest IN (" . $this->list_group . "))) ";
		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "cron_message1":
	// !!!!!!!!!!!!!!!Cron message1 !!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "message.* ";
		$this->sql .= " FROM  " . $this->prefix . "message ";
		$this->sql .= " WHERE ( ";

		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time)) ";

		$this->sql .=" AND (state <> 'disable') ";
		$this->sql .=" AND (modules_dest = 'cron.php') ";

		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "cron_message2":
	// !!!!!!!!!!!!!!!Cron message2!!!!!!!!!!!!!!!!!!!!
		$this->sql = "UPDATE " . $this->prefix . "message ";
		$this->sql .= " SET state  =  'disable' ";
		$this->sql .= " WHERE ( ";

		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time)) ";

		$this->sql .=" AND (state <> 'disable') ";
		$this->sql .=" AND (modules_dest = 'cron.php') ";

		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "num_message":
	// !!!!!!!!!!!!!!!!!Num Message1!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "message.id ";
		$this->sql .= " FROM  " . $this->prefix . "message ";
		$this->sql .= " WHERE ( ";
		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";


		$this->sql .= " AND (( users_dest like ('%" . $this->email . "%')) ";
		$this->sql .= " OR (groups_dest IN (" . $this->list_group . "))) ";
		// $this->sql .= " AND (sender NOT LIKE ('%" . $this->email . "%')) ";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$GLOBALS["message_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "message");
		$GLOBALS["message_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "message");
		$list_id_message = implode($GLOBALS["message_read"], "','");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql .= " AND id NOT IN ('" . $list_id_message . "')";
		$this->sql .= ") AND " . $this->where_query . " ";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "num_ticket":
	// !!!!!!!!!!!!!!!!!!Num Ticket!!!!!!!!!!!!!!!!!!!!!!
	// $this->sql = "SELECT COUNT(DISTINCT " . $this->prefix . "ticket.id), id";
		$this->sql = "SELECT id ";
		$this->sql .= " FROM  " . $this->prefix . "ticket ";
		$this->sql .= " WHERE (";

		$this->sql .= " (state_now=state)  ";
		$this->sql .= " AND (state!='close') ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$GLOBALS["ticket_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "ticket");
		$list_id_ticket = implode($GLOBALS["ticket_read"], "','");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql .= " AND id NOT IN ('" . $list_id_ticket  . "')";

		// $this->sql .= " (SELECT line_id FROM " . $this->prefix . "history ";
		// $this->sql .= " WHERE (action = 'read') AND (user_email = '" . $this->email . "' ) ";
		// $this->sql .= " AND (table_name='" . $this->prefix . "ticket')) ";

		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// $this->sql .= "GROUP BY id ";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "locket_user":
	// !!!!!!LOCKET USER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT " . $this->prefix . "user.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "user.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "user ";
		$this->sql .= " WHERE  (state='locked') ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "expired_ticket":
	// !!!!!!!EXPIRED TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE ( ";
		$this->sql .= " (state_now=state)  ";
		$this->sql .= " AND (state!='close') ";
		$this->sql .= " AND (  CURRENT_TIMESTAMP + 0 > STR_TO_DATE(sla, 'Y-m-d H:i:s') + 0) ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "job_ticket":
	// !!!!!!!JOB TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE (type='job')  ";
		$this->sql .= " AND (state_now <>'close')  ";
		$this->sql .= " AND (state <>'close')  ";
		$this->sql .= " AND (call_log_group in (" . $this->list_group . ")) ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "model_message":
	// !!!!!!MODEL MESSAGE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "message.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "message.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "message  ";
		$this->sql .= " WHERE  ((my_master = 'cmr_model') ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "model_ticket":
	// !!!!!!!!!MODEL TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE  ((my_master = 'cmr_model') ";
		$this->sql .= " AND  (lang = '" . $this->language . "')";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "my_message":
	// !!!!!!!!MY MESSAGE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT *  FROM  " . $this->prefix . "message";
		$this->sql .= " WHERE ( ";
		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";

		// $this->sql .= " AND (state <> 'disable') ";

		$this->sql .= " AND (( users_dest like ('%" . $this->email . "%')) ";
		$this->sql .= " OR (sender like ('%" . $this->email . "%')) or (groups_dest IN (" . $this->list_group . "))) ";


		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "my_ticket":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!MY TICKET!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE (((assign_to='" . $this->email . "') ";
		$this->sql .= " OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND (state_now=state)  ";
		$this->sql .= " AND (state!='close') ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "new_ticket":
	// !!!!!!!!NEW TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM ". $this->prefix ."ticket ";
		$this->sql .= "WHERE ((state_now=state) and (state='open')  ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "pending_ticket":
	// !!!!!!!!PENDING TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket ";
		$this->sql .= " WHERE  ((state_now=state) and (state!='close') AND (state!='open')  AND (state!='closed') ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND ((call_log_group IN (" . $this->list_group . ")) OR (assign_to IN (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "received_message":
	// !!!!!!!RECEIVED MESSAGE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "message.* ";
		$this->sql .= " FROM  " . $this->prefix . "message ";
		$this->sql .= " WHERE ( ";
		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";

		// $this->sql .= " AND (state <> 'disable') ";

		$this->sql .= " AND (( users_dest like ('%" . $this->email . "%')) ";
		$this->sql .= " OR (groups_dest IN (" . $this->list_group . "))) ";

		$this->sql .=" AND (sender NOT LIKE ('%" . $this->email . "%')) ";


		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "sended_message":
	// !!!!!!!!!SENDED MESSAGE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "message.* ";
		$this->sql .= " FROM  " . $this->prefix . "message ";
		$this->sql .= " WHERE ( ";

		$this->sql .="  (sender like ('%" . $this->email . "%')) ";

		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

		$this->sql .= ") AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "unread_message":
	// !!!!!!!UNREAD MESSAGE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "message.* ";
		$this->sql .= " FROM  " . $this->prefix . "message ";
		$this->sql .= " WHERE ( ";
		$this->sql .= "((CURRENT_TIMESTAMP BETWEEN begin_time AND end_time) OR (end_time <= begin_time)) ";


		$this->sql .= " AND (( users_dest like ('%" . $this->email . "%')) ";
		$this->sql .= " OR (groups_dest IN (" . $this->list_group . "))) ";
		// $this->sql .= " AND (sender NOT LIKE ('%" . $this->email . "%')) ";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$GLOBALS["message_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "message");
		$GLOBALS["message_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "message");
		$list_id_message = implode($GLOBALS["message_read"], "','");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql .= " AND id NOT IN ('" . $list_id_message . "')";
		$this->sql .= ") AND " . $this->where_query . " ";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "unread_ticket":
	// !!!!!!!!UNREAD TICKET!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM  " . $this->prefix . "ticket ";
		$this->sql .= " WHERE (";

		$this->sql .= " (state_now=state)  ";
		$this->sql .= " AND (state!='close') ";
		$this->sql .= " AND (my_master != 'cmr_model') ";
		$this->sql .= " AND ((call_log_group in (" . $this->list_group . ")) or (assign_to in (" . $this->list_group . ")) ";
		$this->sql .= " OR (assign_to='" . $this->email . "')  OR (call_log_user='" . $this->email . "')  OR (work_by='" . $this->email . "')) ";
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$GLOBALS["ticket_read"] = cmr_readed_line($this->cmr_config, $this->cmr_user, $this->db_connection, "ticket");
		$list_id_ticket = implode($GLOBALS["ticket_read"], "','");
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql .= " AND id NOT IN ('" . $list_id_ticket  . "')";
		// $this->sql .= " AND id NOT IN ";
		// $this->sql .= " (SELECT line_id FROM " . $this->prefix . "history ";
		// $this->sql .= " WHERE (action = 'read') AND (user_email = '" . $this->email . "' ) ";
		// $this->sql .= " AND (table_name='" . $this->prefix . "ticket')) ";

		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "list_email":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT user_email FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups, " . $this->prefix . "user WHERE  ";
		$this->sql .= " (" . $this->prefix . "user_groups.group_name='" . cmr_escape($this->group) . "')  ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.user_email=" . $this->prefix . "user.email) ";
		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "user.state='active') OR (" . $this->prefix . "user.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
		$this->sql .= " AND (user_email not like '%localhost') ";
		$this->sql .= " AND  (" . $this->prefix . "groups.type<='" . $this->cmr_user["authorisation"] . "') ORDER BY user_email;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "list_email_cc":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "";
// 		$this->sql .= "SELECT user_email FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups, " . $this->prefix . "user where  ";
// 		$this->sql .= " (" . $this->prefix . "user_groups.group_name='" . cmr_escape($this->group) . "')  ";
// 		$this->sql .= " AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
// 		$this->sql .= " AND (" . $this->prefix . "user_groups.user_email=" . $this->prefix . "user.email) ";
// 		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
// 		$this->sql .= " AND ((" . $this->prefix . "user.state='active') OR (" . $this->prefix . "user.state='enable')) ";
// 		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
// 		$this->sql .= " AND (user_email not like '%localhost') ";
// 		$this->sql .= " AND  (" . $this->prefix . "groups.type<='" . $this->cmr_user["authorisation"] . "')  ORDER BY user_email;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "client_email":
// ----- select client email---
	    $this->sql = "SELECT user_email FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups where ";
	    $this->sql .= " (" . $this->prefix . "user_groups.group_name='" . cmr_escape($this->group) . "') ";
	    $this->sql .= " AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name)";
		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
	    $this->sql .= " AND (user_email not like '%localhost')";
	    $this->sql .= " AND (" . $this->prefix . "groups.type<='" . cmr_escape($this->cmr_user["authorisation"]) . "');";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "group_emails":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT group_email FROM " . $this->prefix ."groups ";
		$this->sql .= " WHERE  (group_email NOT LIKE '%localhost') ";
		$this->sql .= " AND (" . $this->prefix . "groups.name='" . cmr_escape($this->group) . "') ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "group_list":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!t_group!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
		$this->sql .= " WHERE ((state='active') OR (state='enable')) AND " . $this->where_query;
		$this->sql .= " ORDER BY name ";
	//	$this->sql .= " LIMIT " . $this->cmr_config["cmr_max_view"] . ";";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "list_group_name":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "groups.name FROM " . $this->prefix . "groups ";
		$this->sql .= "WHERE (" . $this->prefix . "groups.type>='" . $this->type . "' ) ORDER BY  " . $this->prefix . "groups.name;";
	break;
//
	case "list_user_email":
		$this->sql = "SELECT DISTINCT " . $this->prefix . "user.email FROM " . $this->prefix . "user, " . $this->prefix . "user_groups, " . $this->prefix . "groups ";
		$this->sql .= "WHERE (" . $this->prefix . "user.email=" . $this->prefix . "user_groups.user_email) ";
		$this->sql .= "AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
		$this->sql .= "AND (" . $this->prefix . "groups.type>='" . $this->type . "' ) ORDER BY " . $this->prefix . "groups.name;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "ticket_id_model":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if($this->sql_data["number"]){
		    $this->sql = "SELECT * FROM " . $this->prefix . "ticket WHERE ((number= '" . cmr_escape($this->sql_data["number"]) . "') or (my_master='cmr_model'))  and (lang='" . cmr_escape($this->sql_data["lang"]) . "')  and (type='" . cmr_escape($this->sql_data["type"]) . "') and (state='" . cmr_escape($this->sql_data["state"]) . "') and ((call_log_group in (" . $this->list_group . ")) OR (call_log_group='') OR (call_log_group=NULL))  ORDER BY id;";
		}else{
		    $this->sql = "SELECT * FROM " . $this->prefix . "ticket WHERE (id='" . $this->sql_data["id_ticket"] . "')";
		}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "ticket_solution":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT text FROM " . $this->prefix . "ticket WHERE (title LIKE '%" . cmr_escape($this->sql_data["title"]) . "%') AND (type='" . cmr_escape($this->sql_data["type"]) . "') AND (state='" . cmr_escape($this->sql_data["state"]) . "') AND ((call_log_group IN (" . $this->list_group . ")) OR (call_log_group='') OR (call_log_group=NULL))  ORDER BY id DESC;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "ticket_model":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "ticket WHERE (1) ";
		$this->sql .= "AND (my_master='cmr_model')  AND (lang='" . $this->sql_data["lang"] . "')  ";
		$this->sql .= "AND (type='" . cmr_escape($this->sql_data["type"]) . "') AND (state='" . cmr_escape($this->sql_data["state"]) . "')  ";
		$this->sql .= "AND ((call_log_group IN (" . $this->list_group . ")) OR (call_log_group='') OR (call_log_group=NULL)) ";
		$this->sql .= "ORDER BY id;";
	//  LIMIT " . $this->cmr_config["cmr_max_view"] . ";";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "ticket_new_model":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "ticket WHERE (my_master='cmr_model')  and (lang='" . $this->sql_data["lang"] . "')  and ((call_log_group in (" . $this->list_group . ")) or (call_log_group='') or (call_log_group=NULL))  order by id,state;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "ticket_new_solution":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT text FROM " . $this->prefix . "ticket WHERE (number= '" . cmr_escape($this->sql_data["number"]) . "') and  (state='close') order by id;";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_user_email":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT user_email FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups, " . $this->prefix . "user WHERE  ";
		$this->sql .= " (" . $this->prefix . "user_groups.group_name='" . cmr_escape($this->group) . "')  ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.user_email=" . $this->prefix . "user.email) ";
		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "user.state='active') OR (" . $this->prefix . "user.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
		//     $this->sql .= " AND ((" . $this->prefix . "user_groups.type != 'contact') "; //-- company contact --
		//     $this->sql .= " OR (" . $this->prefix . "user_groups.type = '') ";
		//     $this->sql .= " OR (" . $this->prefix . "user_groups.type = null) ";
		//     $this->sql .= ") "; //-- company contact --
		$this->sql .= " AND (user_email not like '%localhost') ";
		$this->sql .= " AND  (" . $this->prefix . "groups.type<='" . $this->type . "') ";
		$this->sql .= " order by user_email;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_rif_email":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT user_email FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups, " . $this->prefix . "user ";
		$this->sql .= " WHERE (" . $this->prefix . "user_groups.group_name='" . cmr_escape($this->group) . "')  ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
		$this->sql .= " AND (" . $this->prefix . "user_groups.user_email=" . $this->prefix . "user.email) ";
		//     $this->sql .= " AND (" . $this->prefix . "user_groups.type='contact') "; //-- company contact --
		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "user.state='active') OR (" . $this->prefix . "user.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
		$this->sql .= " AND (user_email not like '%localhost') ";
		$this->sql .= " AND  (" . $this->prefix . "groups.type<='" . $this->type . "')  order by user_email;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_groups":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
		$this->sql .= " WHERE (state='active' OR state='enable') AND " . $this->where_query;
		$this->sql .= " ORDER BY name ";
	//$this->sql .= " LIMIT " . $this->cmr_config["cmr_max_view"] . ";";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_group_name":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "groups.name FROM " . $this->prefix . "groups ";
		$this->sql .= " WHERE (" . $this->prefix . "groups.type>='" . $this->type . "' ) ORDER BY  " . $this->prefix . "groups.name;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_user_email":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT DISTINCT " . $this->prefix . "user.email FROM " . $this->prefix . "user, " . $this->prefix . "user_groups, " . $this->prefix . "groups ";
		$this->sql .= "WHERE (" . $this->prefix . "user.email=" . $this->prefix . "user_groups.user_email) ";
		$this->sql .= "AND (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
		$this->sql .= "AND (" . $this->prefix . "groups.type>='" . $this->type . "' ) ORDER BY " . $this->prefix . "groups.name;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_model":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "message where (my_master='cmr_model') and ((groups_dest in ($this->list_group)) or (groups_dest='') or (groups_dest=NULL))  order by id,state;";
		if($this->cmr_user["authorisation"] >= $this->type) $this->sql = "SELECT * FROM " . $this->prefix . "message where (my_master='cmr_model');";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "message_model_update":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "message where (1) ";
		$this->sql .= "AND (my_master='cmr_model') ";
		$this->sql .= "AND (type='" . $this->sql_data["type"] . "') AND (state='" . $this->sql_data["state"] . "')  ";
		$this->sql .= "AND ((groups_dest IN ($this->list_group)) OR (groups_dest='') OR (groups_dest=NULL)) ";
		$this->sql .= "ORDER BY id;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;
//
	case "delete_session":
	// *************************load_user_data************************
		$this->sql = "DELETE FROM " . $this->prefix . "session where (sessionid='" . session_id() . "') and  (sessionip='" . $_SERVER['REMOTE_ADDR'] . "') and (user_email= '" . $this->email . "') ;";
	// *************************
	break;
//
	case "insert_session":
	// *************************load_user_data************************
		$this->sql = "INSERT IGNORE INTO " . $this->prefix . "session ";
		$this->sql .= " VALUES ('', '" . session_id() . "', '" . $_SERVER['REMOTE_ADDR'] . "', '" . $this->email . "', 'connect', 'enable', '" . $this->cmr_config["cmr_session_time_out"] . "', NOW(), NOW());";
	// *************************
	break;
//
	case "user_list_group":
		// *************************load_user_data************************
		$this->sql = " SELECT " . $this->prefix . "user_groups.*, ";
		$this->sql .= " " . $this->prefix . "groups.*";
		$this->sql .= " FROM " . $this->prefix . "user_groups, " . $this->prefix . "groups ";
		$this->sql .= " WHERE (user_email='" . $this->email . "') and (group_name=name)";
		$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
		$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
		$this->sql .= " ORDER BY " . $this->prefix . "groups.type;";
	break;
//
//
//
//
// *************************get_change_email************************
	case "get_change_email1":
		$this->sql = "UPDATE " . $this->prefix . "user SET";
		$this->sql .= "email = '" . cmr_escape($this->sql_data["new_email1"]) . "',";
		$this->sql .= "date_time = NOW() WHERE id ='" . cmr_escape($this->sql_data["user_id"]) . "' ;";
// *************************get_change_email************************
	break;

	case "get_change_email2":
// *************************get_change_email************************
		$this->sql = "UPDATE " . $this->prefix . "user_groups SET";
		$this->sql .= "user_email = '" . cmr_escape($this->sql_data["new_email1"]) . "',";
		$this->sql .= "date_time = NOW() WHERE user_email ='" . cmr_escape($this->email) . "';";
// *************************get_change_email************************
	break;
//
	case "get_change_pw":
// *************************get_change_pw************************
// *************************get_change_pw************************
// *************************get_change_pw************************
		$this->sql = "UPDATE " . $this->prefix . "user SET";
		$this->sql .= "pw = '" . cmr_escape($this->sql_data["new_pw1"]) . "',";
		$this->sql .= "date_time = NOW() WHERE id ='" . cmr_escape($this->sql_data["user_id"]) . "' ;";
	break;
//
	case "get_change_type":
// *************************get_change_type************************
// *************************get_change_type************************
// *************************get_change_type************************
		$this->sql = "ALTER TABLE " . $this->prefix . $this->table ;
		$this->sql .= " CHANGE " . $this->sql_data["column_name"] ." " . $this->sql_data["column_name"];
		$this->sql .= " ENUM('" . $this->sql_data["new_type"] . "') NOT NULL";
	break;
//
// *************************get_change_uid************************
// *************************get_change_uid************************
// *************************get_change_uid************************
	case "get_change_uid":
		$this->sql = "UPDATE " . $this->prefix . "user SET";
		$this->sql .= "uid = '" . cmr_escape($this->sql_data["new_uid1"]) . "',";
		$this->sql .= "date_time = NOW() WHERE id ='" . cmr_escape($this->sql_data["user_id"]) . "' ;";
	break;
//

	case "get_change_user":
// *************************get_change_user************************
// *************************get_change_user************************
	$this->sql  = sprintf("SELECT * FROM " . $this->prefix . "user WHERE ( email='%s');", cmr_escape($this->sql_data["new_email"]));
// *************************get_change_user************************
	break;
//
	case "sql_q_assign_to":
// *************************getclose ticket************************
// *************************getclose ticket************************
// *************************getclose ticket************************
    $this->sql = "SELECT user_email FROM ". $this->prefix ."user_groups, ". $this->prefix ."groups  WHERE ";
    $this->sql .= "(". $this->prefix ."user_groups.group_name='" . cmr_escape($this->sql_data["assign_to"]) . "') ";
    $this->sql .= "AND (". $this->prefix ."user_groups.group_name=". $this->prefix ."groups.name)";
	$this->sql .= " AND ((" . $this->prefix . "user_groups.state='active') OR (" . $this->prefix . "user_groups.state='enable')) ";
	$this->sql .= " AND ((" . $this->prefix . "groups.state='active') OR (" . $this->prefix . "groups.state='enable')) ";
    $this->sql .= "AND (". $this->prefix ."groups.type > '". $this->cmr_config["cmr_user_type"] ."')";
    $this->sql .= "AND (user_email NOT LIKE '%localhost')";
	break;

	case "get_comment":
// *************************get comment************************
// *************************get comment************************
		$this->sql = "INSERT INTO " . $this->prefix . "comment (id, name, encoding, language, state, text, date_time) values ('', '" . $this->table . "@" . $this->sql_data["line_id"] . "', '', 'text', 'enable', '" . $this->sql_data["text"] . "', '', NOW());";
// *************************get comment************************
	break;

// 	case "save_attachment":
// 	break;

// *************************get comment ticket************************
// *************************get comment ticket************************
// *************************get comment ticket************************
// Creating the appropriate SQL string for update_Ticket
	break;

	case "get_comment_ticket":
	$this->sql = "UPDATE " . $this->prefix . "ticket set comment = '" . cmr_escape($this->sql_data["comment"]) . "', attach = '" . $this->sql_data["attachment"] . "' where (id ='" . cmr_escape($this->sql_data["id_ticket"]) . "');";
	break;

	case "save_escalation":
	$this->sql = "INSERT INTO " . $this->prefix . "escalation ( ";
	$this->sql .= "id, ticket_number, action, id_ticket, date_time )";
	$this->sql .= "VALUES (";
	$this->sql .= "'', '" . cmr_escape($this->sql_data["number"]) . "', '" . cmr_translate("Add comment by") . "(". $this->email . ")', '" . cmr_escape($this->sql_data["id_ticket"]) . "', NOW());";
	break;

	case "save_attachment":
    $this->sql = "INSERT INTO " . $this->prefix . "download (";
    $this->sql .= "id, url, path, file_name, file_type, file_size, state, date_time";
    $this->sql .= ") VALUES (";
    $this->sql .= "'', '" . cmr_escape($this->sql_data["id_ticket"]) . "', '" . cmr_escape($this->sql_data["id_ticket"]) . "," . $this->sql_data["attachment"] . "', '" . $this->sql_data["attachment"] . "', '?', '?', 'enable', NOW())";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "delete_groups":
// *************************get delete group************************
// *************************get delete group************************
// *************************get delete group************************
	$this->sql = "delete from  " . $this->prefix . "groups  where  id = '" . cmr_escape($this->sql_data["id_groups"]) . "';";
	break;

	case "delete_group_name":
	$this->sql = "delete from  " . $this->prefix . "user_groups where  group_name = '" . cmr_escape($this->group) . "';";
	break;

	case "delete_group_father":
    $this->sql = "delete from  " . $this->prefix . "father_groups where  group_father = '" . cmr_escape($this->group) . "';";
	break;

	case "delete_group_chield":
    $this->sql = "delete from  " . $this->prefix . "father_groups where  group_chield = '" . cmr_escape($this->group) . "';";
	break;

	case "save_email":
// *************************get email ticket************************
// *************************get email ticket************************
// *************************get email ticket************************
    $this->sql = "INSERT INTO " . $this->prefix . "email (";
    $this->sql .= "id, encoding, lang, header, mail_title, mail_from, mail_to, mail_cc, mail_bcc, attach, text, my_master, date_time";
    $this->sql .= ") VALUES (";
    $this->sql .= "'', '', '" . cmr_escape($this->language) . "', '', '" . cmr_escape($this->sql_data["mail_title"]) . "', '" . cmr_escape($this->sql_data["mail_from"]) . "', '" . cmr_escape($this->sql_data["mail_to"]) . "', '" . cmr_escape($this->sql_data["mail_cc"]) . "', '" . cmr_escape($this->sql_data["mail_bcc"]) . "', '" . $this->sql_data["attachment"] . "', '" . cmr_escape($this->sql_data["mail_text"]) . "', '" . cmr_escape($this->sql_data["my_master"]) . "', NOW())";
	break;

// 	case "save_escalation":
// 	break;
//
// 	case "save_attachment":
// *************************get escalate ticket************************
// 	break;

	case "ticket_assign_to":
	$this->sql = "UPDATE " . $this->prefix . "ticket SET assign_to = '" . cmr_escape($this->sql_data["assign_to"]) . "', comment = '" . cmr_escape($this->sql_data["comment"]) . "'    WHERE id ='" . cmr_escape($this->sql_data["id_ticket"]) . "';";
	break;

// 	case "save_escalation":
// 	break;

	case "get_forget_account":
// *************************get forget account************************
// *************************get forget account************************
// *************************get forget account************************
	$this->sql = "SELECT uid, pw FROM " . $this->prefix . "user WHERE email = '" . cmr_escape($this->email) . "'  ;";
	break;

	case "update_forget_account":
	$this->sql = "UPDATE " . $this->prefix . "user ";
	$this->sql .= " SET " . $this->prefix . "user.pw='" . $this->sql_data["password"] . "' ";
	$this->sql .= " WHERE (" . $this->prefix . "user.email='" . cmr_escape($this->email) . "') ";
	break;

	case "insert_father_admin":
// *************************get new group************************
// *************************get new group************************
// *************************get new group************************
// ----------------------------
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape($this->group) . "', 'admin', 'enable', NOW());";
	break;

	case "insert_father_groups":
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape($this->group) . "', '". $this->cmr_config["cmr_admin_group"] ."', 'enable', NOW());";
	break;

	case "insert_father_group_name":
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', '" . cmr_escape($this->group) . "', 'enable', NOW());";
	break;

	case "insert_father_sel_val":
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape($this->group) . "', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', 'enable', NOW());";
	break;

	case "insert_user_groups":
	$this->sql = "INSERT INTO " . $this->prefix . "user_groups ( id, user_email, group_name, type, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', '" . cmr_escape($this->group) . "', '" . cmr_escape($this->sql_data["type"]) . "', '" . cmr_escape($this->sql_data["state"]) . "', NOW() );";
	break;

// 	case "save_email":
// // *************************get new message************************
// 	break;

// 	case "save_attachment":
// 	break;

	case "insert_user_groups":
// *************************get new user************************
// *************************get new user************************
// *************************get new user************************
	$this->sql = "INSERT INTO " . $this->prefix . "user_groups ( id, user_email, group_name, type, state, date_time )";
	$this->sql .= "VALUES ('', '" . cmr_escape($this->sql_data["user_email"]) . "', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', 'normal', '" . cmr_escape($this->sql_data["state"]) . "', NOW() );";

	break;

	case "get_new_user":
// Creating the appropriate SQL string for new_User
	$this->sql = "INSERT INTO " . $this->prefix . "user  (";
	$this->sql .= "id, uid, name, last_name, nickname, sexe, role, sla, pw, email, email_sign, tel, cel, home, adress, location, state, type, status, type, lang, style, login_script, certificate, photo, my_master, date_time";
	$this->sql .= ") VALUES (";
	$this->sql .= "'', '" . cmr_escape($this->sql_data["uid"]) . "', '" . cmr_escape($this->sql_data["name"]) . "', '" . cmr_escape($this->sql_data["last_name"]) . "', '" . cmr_escape($this->sql_data["nickname"]) . "', '" . cmr_escape($this->sql_data["sexe"]) . "', '" . cmr_escape($this->sql_data["role"]) . "', '" . cmr_escape($this->sql_data["sla"]) . "', '" . $this->sql_data["pw"] . "', '" . cmr_escape($this->sql_data["user_email"]) . "', '" . cmr_escape($this->sql_data["user_email"]) . "', '" . cmr_escape($this->sql_data["tel"]) . "', '" . cmr_escape($this->sql_data["cel"]) . "', '" . cmr_escape($this->sql_data["home"]) . "', '" . cmr_escape($this->sql_data["adress"]) . "', '" . cmr_escape($this->sql_data["location"]) . "', '" . cmr_escape($this->sql_data["state"]) . "', '" . cmr_escape($this->sql_data["type"]) . "', '" . cmr_escape($this->sql_data["status"]) . "', '" . cmr_escape($this->sql_data["type"]) . "', '" . cmr_escape($this->sql_data["lang"]) . "', '" . cmr_escape($this->sql_data["style"]) . "', '" . cmr_escape($this->sql_data["login_script"]) . "', '" . cmr_escape($this->sql_data["certificate"]) . "', '" . cmr_escape($this->sql_data["photo"]) . "', '" . cmr_escape($this->sql_data["my_master"]) . "', NOW());";
	break;

	case "get_query":
// *************************get query************************
// *************************get query************************
// *************************get query************************

	$this->sql = "SELECT " . $this->sql_data["column"] . " FROM " . $this->sql_data["where_column"]. " ";
	//     $this->sql .= " '" . $this->sql_data["where_value"]'. " ";
	$this->sql .= " GROUP BY " . $this->sql_data["group_by_column"] . " " . $this->sql_data["group_by_order"]. " ";
	$this->sql .= " HAVING " . $this->sql_data["having_column"] . " = '" . $this->sql_data["having_value"]. "' ";
	$this->sql .= " ORDER BY " . $this->sql_data["order_by_column"] . " " . $this->sql_data["order_by_order"]. "";
	//    $this->sql .= " LIMIT " . $this->sql_data["limit1"] . ", " . $this->sql_data["limit2"] . ";";
	break;


	case "get_search_query":
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if(!($this->sql_data["post_sql_column"] == "all")){ // ---column != all---
	$this->sql = "SELECT * FROM " . $tab;
	$this->sql .= " WHERE (( 0 ";
	$this->sql .= " OR " . $this->sql_data["post_sql_column"] . search_func_column($this->sql_data["post_cmr_action"], $this->sql_data["post_search_text"]);
	// ----------
	$this->sql .= ") AND (" . $this->where_query . ")) ";
	}else{ // ---column = all---
	$colums = sql_run("array", $this->db_connection, "show_columns", "", $this->cmr_config["db_name"], $tab);
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	$this->sql = "SELECT * FROM " . $tab;
	$this->sql .= " WHERE (( 0 ";
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	if($colums[0])
	foreach($colums[0] as $col){
	$this->sql .= " OR " . $col . search_func_column($this->sql_data["post_cmr_action"], $this->sql_data["post_search_text"]);
	}
	$this->sql .= ") AND (" . $this->where_query . ")) ";
	// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
	}
	break;

// 	case "save_escalation":
// // *************************get take ticket************************
// 	break;

	case "get_update_group":
// *************************get update group************************
// *************************get update group************************
// *************************get update group************************
	$this->sql = " DELETE FROM " . $this->prefix . "user_groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " AND group_name NOT IN (" . $this->sql_data["email"] . ") ";
	$this->sql .= " AND group_name = '" . cmr_escape($this->group) . "';";
	break;

	case "delete_group_child_set":
// ===========
// ===========
	$this->sql = "DELETE FROM " . $this->prefix . "father_groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " AND group_child NOT IN (" . $this->sql_data["group_child_set"] . ") ";
	$this->sql .= " AND group_father = '" . cmr_escape($this->group) . "';";
	break;

	case "delete_group_father_set":
// ===========
// ===========
	$this->sql = "DELETE FROM " . $this->prefix . "father_groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " AND group_father NOT IN (" . $this->sql_data["group_father_set"] . ") ";
	$this->sql .= " AND group_child = '" . cmr_escape($this->group) . "';";
	break;

	case "father_groups_sel_val":
// ===========
// ===========
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', '" . cmr_escape($this->group) . "', 'enable', NOW());";
	break;

	case "father_groups_group_name":
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape($this->group) . "', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', 'enable', NOW());";
	break;

	case "user_groups_sel_val":
	$this->sql = "INSERT INTO " . $this->prefix . "user_groups ( id, user_email, group_name, type, state, date_time ) ";
	$this->sql .= " VALUES ('', '" . cmr_escape(trim($this->sql_data["sel_val"])) . "', '" . cmr_escape($this->group) . "', 'normal', '" . cmr_escape($this->sql_data["state"]) . "', NOW() );";
	break;

	case "update_user_groups":
// ----------------------------
// ----------------------------
	//     group_name ='" . cmr_escape($this->group) . "',
	$this->sql = "UPDATE " . $this->prefix . "user_groups SET ";
	$this->sql .= "state = '" . cmr_escape($this->sql_data["state"]) . "', ";
	$this->sql .= "date_time = NOW() ";
	$this->sql .= "WHERE " . $this->where_query . " and group_name = '" . cmr_escape($this->group) . "';";
	break;

	case "update_father_groups":
	//     group_father ='" . cmr_escape($this->group) . "',
	$this->sql = "UPDATE " . $this->prefix . "father_groups SET ";
	$this->sql .= "state = '" . cmr_escape($this->sql_data["state"]) . "', ";
	$this->sql .= "date_time = NOW() ";
	$this->sql .= "WHERE " . $this->where_query . " and group_father = '" . cmr_escape($this->group) . "';";
	break;

	case "update_group_child":
//     group_child ='" . cmr_escape($this->group) . "',
	$this->sql = "UPDATE " . $this->prefix . "father_groups SET ";
	$this->sql .= "state = '" . cmr_escape($this->sql_data["state"]) . "', ";
	$this->sql .= "date_time = NOW() ";
	$this->sql .= "WHERE " . $this->where_query . " and group_child = '" . cmr_escape($this->group) . "';";
	break;

	case "update_group_name":
	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= "VALUES ('', '" . cmr_escape($this->group) . "', 'admin', 'enable', NOW() );";

	$this->sql = "INSERT INTO " . $this->prefix . "father_groups ( id, group_child, group_father, state, date_time ) ";
	$this->sql .= "VALUES ('', '" . cmr_escape($this->group) . "', '". $this->cmr_config["cmr_admin_group"] ."', 'enable', NOW() );";
	break;

// 	case "save_email":
// // *************************get take ticket************************
// 	break;

// 	case "save_attachment":
// 	break;

	case "get_update_ticket":
// *************************get update ticket************************
// *************************get update ticket************************
// *************************get update ticket************************
	$this->sql = "UPDATE " . $this->prefix . "ticket SET    state_now = 'updated' WHERE number ='" . cmr_escape($this->sql_data["number"]) . "';";
	break;

	case "get_update_user":
// *************************get update user************************
// *************************get update user************************
// *************************get update user************************
	// Creating the appropriate SQL string for update_User
	// $this->sql = $this->sql_data["query_update"]($this->sql_data["id_user"]);
	$this->sql = "update " . $this->prefix . "user set  ";

	// if(strlen($this->sql_data["id_user"]) > 0) $this->sql .= "id = '$this->sql_data["id_user"]', ";
	// if(strlen($this->sql_data["uid"]) > 0) $this->sql .= "uid = '$this->sql_data["uid"]', ";
	if(strlen($this->sql_data["name"]) > 0) $this->sql .= "name = '" . $this->sql_data["name"] . "', ";
	if(strlen($this->sql_data["last_name"]) > 0) $this->sql .= "last_name = '" . $this->sql_data["last_name"] . "', ";
	if(strlen($this->sql_data["sexe"]) > 0) $this->sql .= "sexe = '" . $this->sql_data["sexe"] . "', ";
	if(strlen($this->sql_data["role"]) > 0) $this->sql .= "role = '" . $this->sql_data["role"] . "', ";
	if(strlen($this->sql_data["sla"]) > 0) $this->sql .= "sla = '" . $this->sql_data["sla"] . "', ";
	// if(strlen($this->sql_data["password"]) > 0) $this->sql .= "pw = '" . $this->sql_data["password"] . "', ";
	// if(strlen($this->email) > 0) $this->sql .= "email = '" . $this->email . "', ";
	if(strlen($this->sql_data["email_sign"]) > 0) $this->sql .= "email_sign = '" . $this->sql_data["email_sign"] . "', ";
	if(strlen($this->sql_data["tel"]) > 0) $this->sql .= "tel = '" . $this->sql_data["tel"] . "', ";
	if(strlen($this->sql_data["cel"]) > 0) $this->sql .= "cel = '" . $this->sql_data["cel"] . "', ";
	if(strlen($this->sql_data["adress"]) > 0) $this->sql .= "adress = '" . $this->sql_data["adress"] . "', ";
	if(strlen($this->sql_data["location"]) > 0) $this->sql .= "location = '" . $this->sql_data["location"] . "', ";
	if(strlen($this->sql_data["state"]) > 0) $this->sql .= "state = '" . $this->sql_data["state"] . "', ";
	if(strlen($this->sql_data["type"]) > 0) $this->sql .= "type = '" . $this->sql_data["type"] . "', ";
	if(strlen($this->sql_data["status"]) > 0) $this->sql .= "status = '" . $this->sql_data["status"] . "', ";
	if(strlen($this->sql_data["lang"]) > 0) $this->sql .= "lang = '" . $this->sql_data["lang"] . "', ";
	if(strlen($this->sql_data["style"]) > 0) $this->sql .= "style = '" . $this->sql_data["style"] . "', ";
	//if(strlen($this->sql_data["login_script"]) > 0)
	$this->sql .= "login_script = '" . $this->sql_data["login_script"] . "', ";
	if(strlen($this->sql_data["email_sign"]) > 0) $this->sql .= "email_sign = '" . $this->sql_data["email_sign"] . "', ";
	// if(strlen($this->sql_data[public_key"]) > 0) $this->sql .= "public_key = '" . $this->sql_data["public_key"] . "', ";
	// if(strlen($this->sql_data[private_key"]) > 0) $this->sql .= "private_key = '" . $this->sql_data["private_key"] . "', ";
	// if(strlen($this->sql_data[pass_phrase"]) > 0) $this->sql .= "pass_phrase = '" . $this->sql_data["pass_phrase"] . "', ";
	if(strlen($this->sql_data["comment"]) > 0) $this->sql .= "comment = '" . $this->sql_data["comment"] . "', ";
	// if(strlen($this->sql_data["date_time"]) > 0)$this->sql .= "date_time = '" . $this->sql_data["date_time"] . "', ";

	$this->sql .= "date_time = now()  where " . $this->where_query . " and  id = '" . cmr_escape($this->sql_data["id_user"]) . "';";
// ===========
// ===========
// ===========
	break;

	case "delete_send_email":

	$this->group = explode("\n", $this->sql_data["group_name0"]);
	$this->group_set = "'" . implode("','", $this->group) . "'";
	// ===========
	// ===========
	is_array($this->group) ? $text_group = implode("> ", ($this->group)) : $text_group = $this->group;
	// ===========

	$this->sql = "DELETE FROM " . $this->prefix . "user_groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " AND group_name NOT IN (" . $this->group_set . ") ";
	$this->sql .= " AND user_email = '" . cmr_escape($this->email) . "';";
// ===========
	break;

	case "user_groups_insert":
	$this->sql = "INSERT INTO " . $this->prefix . "user_groups ( id, user_email, group_name, type, state, date_time )";
	$this->sql .= "VALUES ('', '" . cmr_escape($this->email) . "', '" . cmr_escape(($this->sql_data["sel_val"])) . "', 'normal', '" . cmr_escape($this->sql_data["state"]) . "', NOW() );"; //--------define next layout ----------
	break;

	case "user_groups_update":
// ----------------------------
	$this->sql = "UPDATE " . $this->prefix . "user_groups SET";
	$this->sql .= "state = '" . cmr_escape($this->sql_data["state"]) . "',";
	$this->sql .= "date_time = NOW()";
	$this->sql .= "WHERE (" . $this->where_query . " and (user_email = '" . cmr_escape($this->email) . "'));";
// ----------------------------
	break;

	case "get_view_event":
// *************************get view event************************
// *************************get view event************************
// *************************get view event************************
	$this->sql = "UPDATE " . $this->prefix . "user SET ";
	$this->sql .= " state='" . $this->sql_data["state"] . "',";
	$this->sql .= " type='" . $this->sql_data["type"] . "' ";
	$this->sql .= " WHERE email='" . $this->email . "';";
	break;

	case "user_groups_array_email":
	$this->sql = "INSERT INTO " . $this->prefix . "user_groups VALUES ('', '" . cmr_escape($this->email) . "', '" . cmr_escape(($this->group)) . "', '" . cmr_escape($this->sql_data["state"]) . "', '', '', '', '', NOW() );";
	break;

	case "control_session":
// *************************control session************************
// *************************control session************************
// *************************control session************************
// ------------------------------------------
	$this->sql = "SELECT * FROM " . $this->prefix . "session WHERE ((sessionid =  '" . session_id() . "') ";
	$this->sql .= " AND ( sessionip  =  '" . $this->sql_data["sessionip"] . "') AND ( user_email  =  '" . $this->email . "') ";
	$this->sql .= " AND ( status  =  '" . $this->sql_data["status"] . "') AND ( state  =  '" . $this->sql_data["state"] . "') ";
	//     $this->sql .= " and ((curdate() <= session_end) or (session_end <= '2000-01-01 01:01:01'))";
	$this->sql .= ") ";
	// $this->sql .= " LIMIT 1;";
	break;

	case "select_groups_title1":
// *************************update groups************************
// *************************update groups************************
// *************************update groups************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "user ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY email;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "select_val_group":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "user_groups ";
	$this->sql .= " WHERE group_name='" . $this->group . "' AND ";
	$this->sql .= "" . $this->where_query;
	$this->sql .= " ORDER BY user_email;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "update_groups_val_group":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY name;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "select_group_child":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "father_groups ";
	$this->sql .= " WHERE group_child='" . $this->group . "' AND ";
	$this->sql .= "" . $this->where_query;
	$this->sql .= " ORDER BY group_father;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "select_group_father":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "father_groups ";
	$this->sql .= " WHERE group_father='" . $this->group . "' AND ";
	$this->sql .= "" . $this->where_query;
	$this->sql .= " ORDER BY group_child;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "update_user":
// *************************update user************************
// *************************update user************************
// *************************update user************************
	$this->sql = "SELECT * FROM " . $this->prefix . "user_groups ";
	$this->sql .= " WHERE user_email='" . $this->email . "'";
	break;

	case "groups_list":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY name;";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	break;

	case "user_groups_list":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "user_groups ";
	$this->sql .= " WHERE user_email='" . $this->email . "' AND ";
	$this->sql .= $this->where_query;
	$this->sql .= " ORDER BY group_name;";
	break;

	case "new_groups":
// *************************new groups************************
// *************************new groups************************
// *************************new groups************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "user ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY email;";
// -----------
	break;

	case "new_groups_list":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY name;";
	break;

	case "new_user":
// *************************new user************************
// *************************new user************************
// *************************new user************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = " SELECT * FROM " . $this->prefix . "groups ";
	$this->sql .= " WHERE " . $this->where_query;
	$this->sql .= " ORDER BY name;";
// -----------
	break;

	case "menu_client":
// *************************menu client************************
// *************************menu client************************
// *************************menu client************************
	$this->sql = "SELECT * FROM  " . $this->prefix . "groups WHERE ( " . $this->prefix . "groups.name IN (" . $this->list_group . "));";
	break;

	case "get_view_allow_email":
// *************************get view model************************
// *************************get view model************************
// *************************get view model************************
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "UPDATE " . $this->prefix . $this->table . "policy";
	$this->sql .= " SET  allow_email=" . $this->email;
	$this->sql .= ", line_id=" . $this->sql_data["list_check"];
	$this->sql .= " WHERE " . $this->where_query;
	break;

	case "get_view_allow_groups":
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "UPDATE " . $this->prefix . $this->table . "policy";
	$this->sql .= " SET  allow_groups=" . $this->group;
	$this->sql .= ", line_id=" . $this->sql_data["list_check"];
	$this->sql .= " WHERE " . $this->where_query;
	break;

	case "get_view_allow_type":
	$this->sql = "UPDATE " . $this->prefix . $this->table . "policy";
	$this->sql .= " SET  allow_type=" . $this->cmr_user["authorisation"];
	$this->sql .= ", line_id=" . $this->sql_data["list_check"];
	$this->sql .= " WHERE " . $this->where_query;
	break;

	case "preview_model":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// *************************preview model************************
// *************************preview model************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM  " . $this->prefix . $this->table . "";
	$this->sql .= " WHERE @_column_id_@ IN (" . $this->sql_data["list_check"] . ")" . $this->where_query;
	break;

	case "preview_comment":
// *************************preview model************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "comment ";
	$this->sql .= "WHERE (";
	$this->sql .= " ((line_id = '" . $this->sql_data["line_id"] . "') ";
	$this->sql .= " OR (line_id IN ('" . $this->sql_data["line_id"] . "'))) ";
	$this->sql .= " AND (table_name = '" . $this->table . "')";
	$this->sql .= " AND (line_id != '')";
	$this->sql .= " AND (line_id != '*')";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;

	case "preview_policy":
// *************************preview model************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "policy ";
	$this->sql .= "WHERE (";
	$this->sql .= " ((line_id = '" . $this->sql_data["line_id"] . "') ";
	$this->sql .= " OR (line_id IN ('" . $this->sql_data["line_id"] . "'))) ";
	$this->sql .= " AND (table_name = '" . $this->table . "')";
	$this->sql .= " AND (line_id != '')";
	$this->sql .= " AND (line_id != '*')";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;



	case "get_login":
// *************************get login************************
// *************************get login************************
// *************************get login************************
	$this->sql = sprintf("SELECT * FROM " . $this->prefix . "user WHERE ((uid='%s' or email='%s') AND pw='%s');", cmr_escape($this->cmr_user["auth_user_send"]), cmr_escape($this->cmr_user["auth_user_send"]), cmr_escape(pw_encode($this->cmr_user["auth_pw_send"])));
	break;

	case "escalate_ticket":
// *************************escalate ticket************************
// *************************escalate ticket************************
// *************************escalate ticket************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT " . $this->prefix . "groups.name FROM " . $this->prefix . "groups ";
	$this->sql .= "WHERE ((" . $this->prefix . "groups.type >= '" . $this->cmr_config["cmr_noc_type"] . "') ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	//$this->sql .= "limit " . $this->cmr_config["cmr_max_view"] . ";";
	break;

	case "email_in_groups":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT " . $this->prefix . "user.email FROM " . $this->prefix . "user, " . $this->prefix . "user_groups, " . $this->prefix . "groups ";
	$this->sql .= "WHERE ((" . $this->prefix . "user.email=" . $this->prefix . "user_groups.user_email) and (" . $this->prefix . "user_groups.group_name=" . $this->prefix . "groups.name) ";
	$this->sql .= "AND (" . $this->prefix . "groups.type >= '" . $this->cmr_config["cmr_noc_type"] . "') ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	//$this->sql .= "limit " . $this->cmr_config["cmr_max_view"] . ";";
	break;

	case "asset_name_comment":
// *************************preview asset************************
// *************************preview asset************************
// *************************preview asset************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "comment ";
	$this->sql .= "WHERE (";
	$this->sql .= " (line_id = '" . $this->sql_data["post_id_asset"] . "') ";
	$this->sql .= " AND (table_name = '" . $this->prefix . "asset') ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "asset_name_dipend":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT * FROM " . $this->prefix . "asset ";
	$this->sql .= " WHERE (my_master LIKE ('%" . $this->sql_data["post_asset_name"] . "%')  ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;

	case "asset_name_user":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT " . $this->prefix . "user.*, " . $this->prefix . "asset.name ";
	$this->sql .= " FROM " . $this->prefix . "asset, " . $this->prefix . "user ";
	$this->sql .= " WHERE (1";
	$this->sql .= " AND " . $this->prefix . "asset.name='" . $this->sql_data["post_asset_name"] . "' ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;


	break;

	case "group_asset":
	$this->sql = "SELECT " . $this->prefix . "groups.* ";
	$this->sql .= ", " . $this->prefix . "asset.name ";
	$this->sql .= " FROM " . $this->prefix . "asset, " . $this->prefix . "groups ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " or (" . $this->prefix . "groups.name in (" . $this->list_group . ")) ";
	$this->sql .= " or (" . $this->prefix . "asset.) ";
	$this->sql .= " or (" . $this->prefix . "asset.)) ";
	$this->sql .= " AND " . $this->prefix . "asset.name='" . $this->sql_data["post_asset_name"] . "' ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;


	break;

	case "asset_ticket_opened":
	$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
	$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
	$this->sql .= " FROM " . $this->prefix . "ticket  ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " or (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " and (my_master not LIKE ('cmr_model'))  ";
	$this->sql .= " and (state_now=state) and (state='open') ";
	$this->sql .= "and (list_asset_impact LIKE ('%" . $this->sql_data["post_asset_name"] . "%')) ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;

	break;

	case "asset_ticket_updated":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
	$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
	$this->sql .= " FROM " . $this->prefix . "ticket  ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " OR (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " AND (state_now=state) AND (state!='close') AND (state!='open') ";
	$this->sql .= "AND (list_asset_impact LIKE ('%" . $this->sql_data["post_asset_name"] . "%')) ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;

	break;

	case "asset_ticket_closed":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
	$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
	$this->sql .= " FROM " . $this->prefix . "ticket  ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " or (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " and (state_now=state) and (state='close')";
// 	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
	$this->sql .= "and (list_asset_impact LIKE ('%" . $this->sql_data["post_asset_name"] . "%')) ";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;

	break;

// 	case "procedure_analyse":
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	$this->sql = "SELECT *  FROM  " . $this->prefix . $this->table . " procedure analyse() ";
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 	break;

	case "message_sended_at":
// *************************preview date************************
	$this->sql = "SELECT  * ";
	$this->sql .= " FROM " . $this->prefix . $this->send_table . " ";
	$this->sql .= " WHERE ((1) AND ";
// 	$this->sql .= "( ";
//
// 	$this->sql .= " ) ";
// 	$this->sql .= " AND (my_master not LIKE ('cmr_model'))  ";
	$this->sql .= " DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT('" . $this->send_date. "', '%Y%m%d')";
// //	$this->sql .= "AND (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;

	break;

	case "ticket_open_at":
	$this->sql = "SELECT DISTINCT attach, number, text, state_now, state, type, attach, severity, call_log_group, id, date_time, DATE_FORMAT(date_time, '%Y-%m-%d %H:%i:%s') as the_date, title, assign_to ";
	$this->sql .= "FROM " . $this->prefix . "ticket ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " or (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " and (my_master not LIKE ('cmr_model'))  ";
	$this->sql .= " and  (state_now=state) and (state='open') ";
	$this->sql .= " and ((work_by='" . $this->email . "') or (assign_to='" . $this->email . "'))";
	$this->sql .= " and DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $this->send_date. "' as DATETIME), '%Y%m%d')";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;

	case "ticket_update_at":
	$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
	$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
	$this->sql .= " FROM " . $this->prefix . "ticket  ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " OR (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " AND (my_master not LIKE ('cmr_model'))  ";
	$this->sql .= " AND (state_now=state) AND (state!='close') AND (state!='open') ";
	$this->sql .= "AND ((work_by='" . $this->email . "') or (assign_to='" . $this->email . "')) ";
	$this->sql .= " and DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $this->send_date. "' as DATETIME), '%Y%m%d')";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;

	case "ticket_close_at":
	$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
	$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
	$this->sql .= " FROM " . $this->prefix . "ticket  ";
	$this->sql .= " WHERE (( 1 ";
	$this->sql .= " or (call_log_group in (" . $this->list_group . ")) ";

	$this->sql .= " ) ";
	$this->sql .= " and (my_master not LIKE ('cmr_model'))  ";
	$this->sql .= " and (state_now=state)  ";
	$this->sql .= " and (state='close')";
// 	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
	$this->sql .= "and ((work_by='" . $this->email . "') or (assign_to='" . $this->email . "') )";
	$this->sql .= " and DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $this->send_date. "' as DATETIME), '%Y%m%d')";
	$this->sql .= ") ";
	$this->sql .= " AND " . $this->where_query;
	break;

	case "group_change_at":
		$this->sql = "SELECT * FROM " . $this->prefix . "groups ";
		$this->sql .= " WHERE (( 1 ";
		$this->sql .= " or (name in (" . $this->list_group . ")) ";

		$this->sql .= " ) ";
		$this->sql .= " and DATE_FORMAT(date_time, '%Y%m%d') = DATE_FORMAT(cast('" . $this->send_date. "' as DATETIME), '%Y%m%d')";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_comment":
// *************************preview groups************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "comment ";
		$this->sql .= "WHERE (";
		$this->sql .= " (line_id = '" . $this->sql_data["id_groups"] . "') ";
		$this->sql .= " AND (table_name = '" . $this->prefix . "groups') ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_users":
		$this->sql = "SELECT " . $this->prefix . "user.*, group_name, user_email FROM " . $this->prefix . "user, " . $this->prefix . "user_groups ";
		$this->sql .= " WHERE ((group_name='" . $this->sql_data["group_name"] . "') and (email=user_email)";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_childs":
		$this->sql = "SELECT " . $this->prefix . "groups.*, group_father, group_child FROM " . $this->prefix . "father_groups, " . $this->prefix . "groups ";
		$this->sql .= "WHERE ((group_father='" . $this->sql_data["group_name"] . "') ";
		$this->sql .= "and (name=group_child) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_asset":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "select * ";
		$this->sql .= "FROM " . $this->prefix . "asset ";
		$this->sql .= "WHERE 1 ";
		$this->sql .= " AND " . $this->where_query;
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "group_ticket_open":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= "WHERE  ((my_master not LIKE ('cmr_model')) and (state_now=state) and (state='open') ";
		$this->sql .= "AND ((call_log_group='" . $this->sql_data["group_name"] . "') or (assign_to like('%" . $this->sql_data["group_name"] . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_ticket_updated":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= "WHERE  ((my_master not LIKE ('cmr_model')) ";
		$this->sql .= " AND (state_now=state) AND (state!='close') AND (state!='open') ";
		$this->sql .= "and ((call_log_group='" . $this->sql_data["group_name"] . "') or (assign_to like('%" . $this->sql_data["group_name"] . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "group_ticket_close":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= "WHERE ((my_master not LIKE ('cmr_model')) and (state_now=state) and (state='close')";
	// 	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
		$this->sql .= "and ((call_log_group='" . $this->sql_data["group_name"] . "') or (assign_to like('%" . $this->sql_data["group_name"] . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "last_group_message":
		$this->sql = "SELECT  * ";
		$this->sql .= " from ". $this->prefix ."message  ";
		$this->sql .= " WHERE (groups_dest like('%" . $this->sql_data["group_name"] . "%')";
	// //	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "message_comment":
// *************************preview message************************
		$this->table = "comment";
		$this->sql = "SELECT * FROM " . $this->prefix . "comment ";
		$this->sql .= "WHERE (";
		$this->sql .= " (line_id = '" . $this->sql_data["id_groups"] . "') ";
		$this->sql .= " AND (table_name = '" . $this->prefix . "groups') ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "message_story":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		$this->sql = "SELECT * FROM " . $this->prefix . "message ";
		$this->sql .= "WHERE (((id!='" . $this->sql_data["id_message"] . "') AND (my_master = '" . $this->sql_data["id_message"] . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

// 	case "procedure_analyse":
// // *************************preview report************************
// 	$this->sql["report_default"] = "SELECT *  FROM  ". $this->prefix  . $this->table . " procedure analyse()";
// // *************************preview report************************
// 	break;

	case "ticket_story":
// *************************preview ticket************************
		$this->sql = "SELECT * FROM " . $this->prefix . "ticket ";
		$this->sql .= "WHERE (((id!='" . $this->sql_data["id_ticket"] . "') AND (number='" . $this->sql_data["number"] . "')) ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "user_comment":
// *************************preview user************************
		$this->sql = "SELECT * FROM " . $this->prefix . "comment ";
		$this->sql .= "WHERE (";
		$this->sql .= " (line_id = '" . $this->sql_data["id_user"] . "') ";
		$this->sql .= " AND (table_name = '" . $this->prefix . "user') ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "groups_of_user":
		$this->sql = "SELECT " . $this->prefix . "groups.*, user_email, group_name FROM " . $this->prefix . "groups, " . $this->prefix . "user_groups  ";
		$this->sql .= " WHERE ((user_email='" . $this->email . "')";
		$this->sql .= " and (name=group_name)";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "asset_of_user":
		$this->sql = "SELECT  *  FROM " . $this->prefix . "asset ";
		$this->sql .= "WHERE (1 ";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "ticket_open_email":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= "WHERE  ((my_master not LIKE ('cmr_model')) and (state_now=state) and (state='open') ";
		$this->sql .= "and call_log_group in (" . $this->list_group . ") ";
		$this->sql .= "and ((work_by='" . $this->email . "') or (assign_to LIKE ('%" . $this->email . "%'))  or (call_log_user LIKE ('%" . $this->email . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "ticket_update_email":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= "WHERE  ((my_master not LIKE ('cmr_model')) ";
		$this->sql .= " AND (state_now=state) AND (state!='close') AND (state!='open') ";
		$this->sql .= "and call_log_group in (" . $this->list_group . ") ";
		$this->sql .= "and ((work_by='" . $this->email . "') or (assign_to LIKE ('%" . $this->email . "%'))  or (call_log_user LIKE ('%" . $this->email . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "ticket_close_email":
		$this->sql = " SELECT DISTINCT " . $this->prefix . "ticket.*, ";
		$this->sql .= " DATE_FORMAT(" . $this->prefix . "ticket.date_time, '%Y-%m-%d %H:%i:%s') as the_date ";
		$this->sql .= " FROM " . $this->prefix . "ticket  ";
		$this->sql .= " WHERE  ((my_master not LIKE ('cmr_model')) and (state_now=state) and (state='close')";
	// //	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
		$this->sql .= "and ((work_by='" . $this->email . "') or (assign_to LIKE ('%" . $this->email . "%')) or (call_log_user LIKE ('%" . $this->email . "%')) ";
		$this->sql .= ")";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	break;

	case "last_message":
		$this->sql = "SELECT  * ";
		$this->sql .= " from ". $this->prefix ."message  ";
		$this->sql .= " WHERE ((users_dest like('%" . $this->email . "%') or sender like('%" . $this->email . "%'))";
	// //	$this->sql .= "and (date_sub(CURRENT_TIMESTAMP,interval 90 day) <= date_time)";
		$this->sql .= ") ";
		$this->sql .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "procedure_analyse":
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = "SELECT *  FROM  " . $this->prefix . $this->table . " procedure analyse() ";
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "get_export":
		$this->sql  = "SELECT * INTO OUTFILE '" . cmr_escape($this->sql_data["outfile"]) . "'";
		$this->sql  .= "FIELDS TERMINATED BY '" . cmr_escape($this->sql_data["fields_terminated_by"]) . "' OPTIONALLY ENCLOSED BY '" . $this->sql_data["enclosed_by"] . "'";
		$this->sql  .= "LINES TERMINATED BY '" . cmr_escape($this->sql_data["lines_terminated_by"]) . "'";
		$this->sql  .= "FROM " . $this->prefix . $this->table . " ;";
	break;


	case "get_report_compare":
// *************************get report compare************************
// *************************get report compare************************
// *************************get report compare************************

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$date_year = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%Y')";
	$date_month = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%m')";
	$date_year_month = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%m-%Y')";
	$date_day = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%d')";
	$date_date = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%Y-%m-%d %H:%i:%s')";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// $this->sql["report_select"] .= " " . $date_year . " AS the_year, ";
	// $this->sql["report_select"] .= " " . $date_month . " AS the_month, ";
	// $this->sql["report_select"] .= " " . $date_day . " AS the_day, ";
	// $this->sql["report_select"] .= " " . $date_date . " AS the_date ";
	// $this->sql[$this->table] .= " AND DATE_FORMAT(" . $true_table . "." . $this->sql_data["date_time1"] . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $this->sql_data["post_" . $this->sql_data["date_time_base1"] . "1"] . "' as DATETIME) AND cast('" . $this->sql_data["post_" . $this->sql_data["date_time_base1"] . "2"] . "' as DATETIME)";

	$this->sql["report_select"] = " SELECT " . $this->sql_data["column"] . ", COUNT * ";
	$this->sql["report_select"] .= " FROM " . $this->prefix . $this->table;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql["report_where"] = " WHERE ((1) ";
	$this->sql["report_where"] .= " AND (";
	$this->sql["report_where"] .= " (" . $date_date . " LIKE ('" . $this->sql_data["date_time1"] . "%')";
	$this->sql["report_where"] .= " OR date_time LIKE ('" . $this->sql_data["date_time2"] . "%'))";
	if(!empty($this->sql_data["week"])) $this->sql["report_where"] .= " AND " . $date_day . " BETWEEN " . $the_day . "";


	$this->sql["report_where"] .= ")";
	$this->sql["report_where"] .= ") ";
	$this->sql["report_where"] .= " AND " . $this->where_query;




	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = $this->sql["report_select"] . $this->sql["report_where"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		switch($this->sql_data["type"]){

		case "comment_by_ticket":"comment_by_ticket";
		$this->sql["report_where"] .= " AND (table_name = 'ticket')";
		$this->sql.= " AND (table_name = 'ticket')";
		$this->sql .= " GROUP BY state DESC ";
		$this->sql .= " ORDER BY state DESC ";
		break;

		default:
		$this->sql .= " GROUP BY " . $this->sql_data["column"] . " DESC ";
		$this->sql .= " ORDER BY " . $this->sql_data["column"] . " DESC ";
		break;
		}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;

	case "get_report_periodic":
// *************************get report periodic************************
// *************************get report periodic************************
// *************************get report periodic************************
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$date_year = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%Y')";
	$date_month = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%m')";
	$date_day = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%d')";
	$date_date = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%Y-%m-%d %H:%i:%s')";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// $this->sql[$table_name] .= " AND DATE_FORMAT(" . $true_table . "." . $this->sql_data["date_time1"] . ", '%Y-%m-%d %H:%i:%s') BETWEEN  cast('" . $this->sql_data["post_" . $this->sql_data["date_time_base1"] . "1"] . "' as DATETIME) AND cast('" . $this->sql_data["post_" . $this->sql_data["date_time_base1"] . "2"] . "' as DATETIME)";

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		switch($this->table){
		case "ticket_receive":
		case "ticket":
		$this->sql["report_select"] = " SELECT DISTINCT number, attach, work_by, text, state_now, state, type, attach, severity, call_log_user, call_log_group, id, date_time, mail_from, mail_to, mail_cc, mail_bcc, title, assign_to, ";
		break;

		case "message":
		case "session":
		case "history":
		case "account":
		default:
		$this->sql["report_select"] = " SELECT " . $this->prefix . $this->table . ".*, ";
		break;
		}
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	$this->sql["report_select"] .= " " . $date_year . " AS the_year, ";
	$this->sql["report_select"] .= " " . $date_month . " AS the_month, ";
	$this->sql["report_select"] .= " " . $date_day . " AS the_day, ";
	$this->sql["report_select"] .= " " . $date_date . " AS the_date ";
	$this->sql["report_select"] .= " FROM " . $this->prefix . $this->table;

	$this->sql["report_where1"] .= " WHERE ((1) ";
	$this->sql["report_where1"] .= " AND (";

	$this->sql["report_date"] = " (" . $date_date . " LIKE ('" . $this->sql_data["date_time1"] . "%')";
	$this->sql["report_date"] .= " OR date_time LIKE ('" . $this->sql_data["date_time2"] . "%'))";
	if(!empty($this->sql_data["week"])) $this->sql["report_date"] .= " AND " . $date_day . " BETWEEN " . $week_days . "";

	$this->sql["report_where2"] = "";
	if($this->sql_data["the_table"] == "ticket_receive"){
	if(!empty($this->group)) $this->sql["report_where2"] .= " AND call_log_group LIKE ('%" . $this->group . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND ( work_by LIKE ('%" . $this->email . "%') OR call_log_user LIKE ('%" . $this->email . "%'))";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_from LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_to LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_cc LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_bcc LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "call_log_group";
	}elseif($this->table == "ticket"){
	if(!empty($this->group)) $this->sql["report_where2"] .= " AND call_log_group LIKE ('%" . $this->group . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND ( work_by LIKE ('%" . $this->email . "%') OR call_log_user LIKE ('%" . $this->email . "%'))";
	if(empty($this->email)) $this->sql["report_where2"] .= " AND (state_now=state)";
	$this->sql_data["post_report_column"] = "call_log_group";
	}elseif($this->table == "message"){
	if(!empty($this->group)) $this->sql["report_where2"] .= " AND groups_dest LIKE ('%" . $this->group . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND sender LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND users_dest LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "sender";
	}elseif($this->table == "session"){
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND user_email LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "user_email";
	}elseif($this->table == "history"){
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND user_email LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "user_email";
	}elseif($this->table == "email"){
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_from LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_to LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_cc LIKE ('%" . $this->email . "%')";
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND mail_bcc LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "mail_from";
	}elseif($this->table == "account"){
	if(!empty($this->email)) $this->sql["report_where2"] .= " AND user_email LIKE ('%" . $this->email . "%')";
	$this->sql_data["post_report_column"] = "user_email";
	}


	$this->sql["report_where2"] .= ")";
	$this->sql["report_where2"] .= ") ";
	$this->sql["report_where2"] .= " AND " . $this->where_query;
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql = $this->sql["report_select"] . $this->sql["report_where1"] . $this->sql["report_date"] . $this->sql["report_where2"];
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$this->sql_data["date_month_year"] = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%m-%Y')";
	$date_year_month = "DATE_FORMAT(" . $this->prefix . $this->table . ".date_time, '%Y-%m')";
	$this->sql_data["post_sql_report1"] = " SELECT " . $this->sql_data["date_month_year"] . ", COUNT * ";
	$this->sql_data["post_sql_report1"] .= " FROM " . $this->prefix . $this->table;
	$this->sql_data["post_sql_report1"] .= " WHERE (((" . $date_date . " LIKE ('" . $send_year . "%'))";
	$this->sql_data["post_sql_report1"] .= $this->sql["report_where2"];
	$this->sql_data["post_sql_report1"] .= " GROUP BY " . $date_year_month . " DESC ";
	$this->sql_data["post_sql_report1"] .= " ORDER BY " . $date_year_month . " DESC ";
	// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	break;


	default:
    $this->sql_data["limit"] = $this->limit;
    $this->sql_data["order"] = $this->order;
    $this->sql_data["host"] = $this->host;
    $this->sql_data["user"] = $this->user;
    $this->sql_data["pw"] = $this->pw;
	$this->action = $action;
	$this->sql = sql_run("query", $this->db_connection, $this->action, $this->sql, $this->db, $this->table, $this->field, $this->sql_data);
	break;

}
 return  $this->sql;
}

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function get_query_count($action = "", $cmr_table = "", $cmr_action = "")
{
	$total = 0;
	$cmr_query = $this->get_query($action, $cmr_action);
	if(!empty($cmr_query))
	if(!empty($this->db_connnection))
	$result_query = sql_run("result", $this->db_connnection, "", $cmr_query);
// 	$result_query = &$this->db_connection->Execute($cmr_query) or print($this->db_connection->ErrorMsg());
	if(!empty($result_query))
	$total = $result_query->RecordCount();
return $total;
}
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function run($return_type = "result", $action, $the_sql = "show databases;")
{
	$this->return_type = $return_type;
	$this->action = $action;
	if(empty($the_sql)) $the_sql = $this->get_query($action);
	$this->sql = $the_sql;
    $this->sql_data["limit"] = $this->limit;
    $this->sql_data["order"] = $this->order;
    $this->sql_data["host"] = $this->host;
    $this->sql_data["user"] = $this->user;
    $this->sql_data["pw"] = $this->pw;

	return sql_run($this->return_type, $this->db_connection, $this->action, $this->sql, $this->db, $this->table, $this->field, $this->sql_data);

}

// // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

}



}
?>
