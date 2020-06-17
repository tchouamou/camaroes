<?php
defined("cmr_online") or die("Application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a> to login before continue ");
/**
 * sincronisation.php
 * --------
 * begin : July 2005 - July 2007
 * copyright : Camaroes Ver 2.0 (C) 2005-2007 T.E.H
 * www : http://sourceforge.net/projects/camaroes/
 */

/* vim: set expandtab tabstop=4 shiftwidth=4: */
/*
Copyright (c) 2006, Tchouamou Eric Herve <tchouamou@gmail.com>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions
are met:

1. Redistributions of source code must retain the above copyright
 notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright
 notice, this list of conditions and the following disclaimer in the
 documentation and/or other materials provided with the distribution.
3. The names of the authors may not be used to endorse or promote products
 derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS AS IS AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY
OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

This code cannot simply be copied and put under the GNU Public License or
any other GPL-like (LGPL, GPL2) License.

sincronisation.php, 2007-Feb-Tue 0:12:13
*/

/**
 * Information about
 *
 * Is used for keeping
 * $t object istance of the class open_windows
 *
 * @open _windows Class use to make module windows
 * @a _link() function who take in input a module name and create and html link to this module
 */
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once($cmr->get_path("index") . "control.php"); //to control access 
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//=================================================
// 

global $match_quote;
global $the_quote;

$cmr_operators = array (
array("BINARY", "COLLATE"),
array("NOT", "!"),
array("-", "~"),//- (unary minus),~ (unary bit inversion)
array("^"),
array("*", "/", "DIV", "%", "MOD"),
array("-", "+"),
array("<<", ">>"),
array("&"),
array("|"),
array("<=>", ">=", "<=", "<>", "!=", "IS", "LIKE", "REGEXP", "IN", "=", ">", "<"),
array("BETWEEN", "CASE", "WHEN", "THEN", "ELSE"),
array("&&", "AND"),
array("||", "OR", "XOR"),
array(":="),
);



$cmr_operator = array (
					"===",
					"!==",
					"<<=",
					">>=", 
					"CASE", 
					"WHEN", 
					"THEN", 
					"ELSE",
					"COLLATE",
					"REGEXP",
					"BETWEEN",
					"BINARY",
					"DIV",
					"MOD",
					"IS",
					"IN",
					"NOT",
					"AND",
					"XOR",
					"OR",
					"LIKE",
					"<<",
					"++",
					"--",
					">>",
					"<=",
					">=",
					"&&",
					"||",
					"+=",
					"-=",
					"*=",
					"/=",
					".=",
					"%=",
					"&=",
					"|=",
					"^=",
					"!=",
					"==",
					"=",
					"<",
					">",
					"?",
					":",
					"&",
					"^",
					"|",
					"!",
					"~",
					"-",
					"*",
					"/",
					"%",
					"+",
					"-",
					"."
);
 //================================================= 
$cmr_query_type = array (
					"INSERT",
					"UPDATE",
					"DELETE",
							
					"REPLACE",
					"TRUNCATE",
					"SELECT",
					"GRANT",
					"REVOKE",
					"REVOKE ALL PRIVILEGES",
					"ANALYZE TABLE",
					"BACKUP TABLE",
					"CHECK TABLE",
					"CHECKSUM TABLE",
					"OPTIMIZE TABLE",
					"REPAIR TABLE",
					"RESTORE TABLE",
					"SHOW",
					"SHOW CREATE DATABASE",
					"SHOW CREATE TABLE",
					"SHOW DATABASES",
					"SHOW ENGINE",
					"SHOW ERRORS",
					"SHOW GRANTS FOR",
					"SHOW INDEX FROM",
					"SHOW INNODB STATUS",
					"SHOW PRIVILEGES",
					"SHOW TABLE STATUS",
					"SHOW WARNINGS",
					"SHOW BINARY LOGS",
					"SHOW MASTER STATUS",
					"SHOW SLAVE HOSTS",
					"SHOW SLAVE STATUS",
					"SHOW BINLOG EVENTS",
					"SHOW MASTER LOGS",
					"SHOW CHARACTER SET",
					"SHOW COLLATION",
					"SHOW COLUMNS",
					"SHOW FUNCTION STATUS",
					"SHOW KEYS",
					"SHOW OPEN TABLES",
					"SHOW PROCEDURE STATUS",
					"SHOW STATUS",
					"SHOW TABLE STATUS",
					"SHOW TABLES",
					"SHOW VARIABLES",
					"SHOW CREATE",
					"HELP",
					"ALTER",
					"CREATE",
					"ALTER DATABASE",
					"CREATE DATABASE",
					"DROP DATABASE",
					"DROP INDEX",
					"RENAME TABLE",
					"LOAD DATA",
					"DROP",
					"RENAME USER",
					"SET PASSWORD",
					"SET PASSWORD FOR",
					"DROP USER",
					"CREATE USER",
					"CACHE INDEX",
					"FLUSH",
					"KILL",
					"LOAD INDEX INTO CACHE",
					"HANDLER",
					"CREATE PROCEDURE",
					"CREATE FUNCTION",
					"LANGUAGE SQL",
					"ALTER PROCEDURE",
					"CALL",
					"DECLARE",
					"SQLSTATE",
					"OPEN",
					"FETCH",
					"CLOSE",
					"SET",
					"CREATE TRIGGER",
					"DROP TRIGGER",
					"DO",
					"PREPARE",
					"EXECUTE",
					"DEALLOCATE PREPARE",
					"CHANGE MASTER TO",
					"LOAD TABLE",
					"SELECT MASTER POS WAIT",
					"RESET SLAVE",
					"SET GLOBAL SQL SLAVE SKIP COUNTER",
					"START SLAVE",
					"MASTER LOG FILE",
					"RELAY LOG FILE",
					"STOP SLAVE",
					"PURGE",
					"SET SQL LOG BIN",
					"SAVEPOINT",
					"SET AUTOCOMMIT",
					"START TRANSACTION",
					"COMMIT",
					"LOCK TABLES",
					"UNLOCK TABLES"
);
//================================================= 
function cmr_detect_sql_source($matches=array(),$sin1=array(),$sin2=array()){
	$source=$sin1;
	
 if(eregi($value, $matches[0]["db_name"])) $source=$sin2;
 if(eregi($value, $matches[0]["list_db"])) $source=$sin2;
 
 if(eregi($value, $matches[0]["db_name"])) $source=$sin1;
 if(eregi($value, $matches[0]["list_db"])) $source=$sin1;
 
 foreach($syn2["cmr_table"] as $key=>$value){
 if(eregi($value, $matches[0]["tbl_name"])) $source=$sin2;
 if(eregi($value, $matches[0]["list_table"])) $source=$sin2;
 if(eregi($value, $matches[0]["table_references"])) $source=$sin2;
 if(eregi($value, $matches[0]["table_cols_ref"])) $source=$sin2;
 }
 foreach($syn1["cmr_table"] as $key=>$value){
 if(eregi($value, $matches[0]["tbl_name"])) $source=$sin1;
 if(eregi($value, $matches[0]["list_table"])) $source=$sin1;
 if(eregi($value, $matches[0]["table_references"])) $source=$sin1;
 if(eregi($value, $matches[0]["table_cols_ref"])) $source=$sin1;
 }
	return $source;
}

//================================================= 
function cmr_gen_sql($matches = array(), $sin1 = array(), $sin2 = array()){
	$sql = "";
	
 if(cmr_detect_sql_source($matches,$sin1,$sin2) == $syn2){
 $syn_temp = $syn2;
 $syn2 = $syn1;
 $syn1 = $syn_temp;
 }

	// -----------------
	$syn_table = array();
	$syn_column = array();
	// -----------------
	
	$syn_db[$syn1["cmr_db_name"]] = $syn2["cmr_db_name"];
	$count1 = 0;
	while($count1 < count($syn1["cmr_table"])){
		if(!empty($syn1["cmr_table"][$count1])){
			$table1 = $syn1["cmr_table"][$count1];
			$table2 = $syn1["cmr_table"][$count1];
		// -----------------
				$syn_table[$table1] = $table2;
		// -----------------
				$count2 = 0;
				while($count2 < count($syn1[$table1])){
					if(!empty($syn1[$table1][$count2])){
		// -----------------
						$syn_column[$table1][$count2] = $syn2[$table2][$count2];
		// -----------------
					}
				$count2++;
				}
		 }
	$count1++;
	}

// -----------------

	foreach($matches[0] as $key => $value){
			
	$operator = preg_quote(implode(" ", $cmr_operator));
	$operator = str_replace(" ", "|", $operator);
	$keywords = preg_split($operator, $text, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_OFFSET_CAPTURE);
	
		$match_split=implode("[^;]*;|", $cmr_operator)."[^;]*;";
		$array_query = preg_split($match_split, $cmr_query.";");
	
		switch($key){
			case "list_db":
			case "db_name":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
			break;
			
			case "list_table":
			case "table_references":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = ereg_replace("([ ]?[,][ ]?)+", ",", $matches[0][$key]);
			break;
			case "tbl_name2":
			case "new_tbl_name":
			case "new_tbl_name2":
			case "tbl_name":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
			break;
			
			case "table_cols_ref":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = ereg_replace("([ ]?[,][ ]?)+", ",", $matches[0][$key]);
			break;
		
			case "col_name1":
			case "col_name2":
			case "col_name":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
			break;
			
			case "list_column":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = ereg_replace("([ ]?[,][ ]?)+", ",", $matches[0][$key]);
			break;
			
			
			case "list_col_value":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $matches[0]["cmr_list_col_value"]);
				$matches[0][$key] = ereg_replace("([ ]?[,][ ]?)+", ",", $matches[0][$key]);
			break;
			
			case "set_cols_value":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $matches[0]["cmr_set_cols_value"]);
				$matches[0][$key] = ereg_replace("([ ]?[,][ ]?)+", ",", $matches[0][$key]);
			break;
			
			
			case "expr1":
			case "expr2":
			case "expr":
			case "expression":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $matches[0]["cmr_list_value"]);
			break;
	
			
			case "where_condition":
				$matches[0][$key] = preg_replace($syn1["cmr_db_name"], $syn_db[$syn1["cmr_db_name"]], $value);
				$matches[0][$key] = preg_replace($syn1["cmr_table"], $syn_table, $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $value);
				$matches[0][$key] = preg_replace($syn1[$table1], $syn_column[$table1], $matches[0]["cmr_list_value"]);
			break;
			
			default:
			break;
		}
// 	$cmr_expr = "(?P<expr>" . $cmr_exp . ")";
// 	$cmr_expression = "(?P<expression>" . $cmr_exp . ")";
// 	
// 	$cmr_db_name = "(?P<db_name>$cmr_db_ref" . ")";
// 	$cmr_list_db = "(?P<list_db>" . $cmr_db_name . "," . $cmr_db_name . ")*" . ")"; 
// 	
// 	$cmr_tbl_name = "(?P<tbl_name>" . $cmr_db_name . "\\." . $cmr_db_ref .  "" . "|" . $cmr_db_ref .  "" . ")" . ")";
// 	$cmr_list_table = "(?P<list_table>" . $cmr_db_ref .  "" . "," . $cmr_db_ref .  "" . ")*" . ")";
// 	$cmr_table_references = "(?P<table_references>" . $cmr_list_table;
// 	$cmr_table_cols_ref = "(?P<table_cols_ref>" . $cmr_db_ref .  "" . "([.][*])?)(," . $cmr_db_ref .  "" . "([.][*])?)*" . ")";
// 	
// 	$cmr_col_name = "(?P<col_name>" . $cmr_db_ref .  "\\." .  $cmr_name . "|" . $cmr_name . "|[*]" . ")" . ")";
// 	$cmr_list_column = "(?P<list_column>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ")*" . ")";
// 	
// 	$cmr_list_col_value = "(?P<list_col_value>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" .$cmr_expr . ")(," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" .$cmr_expr . ")*" . ")";
// 	$cmr_set_cols_value = "(?P<set_cols_value>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" ."(" . $cmr_exp . "|DEFAULT))(," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" ."(" . $cmr_exp . "|DEFAULT))*" . ")";
// 	$cmr_list_value = "(?P<list_value>" . $cmr_exp . "|DEFAULT)(," . $cmr_exp . "|DEFAULT)*" . ")";
	
}
// -----------------



// -----------------
// -----------------
$count3=0;
while($count3 < count($matches[0])){
	$sql .= $matches[0][$count3];
}
// -----------------
// -----------------

 
// $cmr_syn_table=preg_replace("/[\s]*(insert into )([()]*)set((.*))seU", "\\2", $val);;
// $cmr_syn_query="";
// 
// 
// 
// 
// foreach($syn1[$cmr_syn_table] as $key=>$value){
// if(!empty($value) && !empty($syn2["cmr_table"][$key]) && (($value==$cmr_syn_table)||($syn2["cmr_table"][$key]==$cmr_syn_table))){
// $syn_key=$key;
// }
// }
// 
// 
// 
// foreach($syn1[$syn_key] as $key=>$value){
// if(!empty($value) && !empty($syn2["cmr_table"][$key]) && (($value==$cmr_syn_table)||($syn2["cmr_table"][$key]==$cmr_syn_table))){
// $syn_key=$key;
// }
// }
// 
// 

// 
// 
// 
// foreach($syn1["cmr_table"] as $syn_key=>$syn_value){
// if(!empty($syn_value) && !empty($syn2["cmr_table"][$syn_key]) && ($syn_value==$cmr_syn_table)){
// $cmr_syn_result = cmrdb_query($cmr_syn_query, $cmr_syn_connection) or db_die(cmrdb_error()); // or db_die(cmrdb_error());
// $cmr->db["affected_rows".$count] = cmrdb_affected_rows($cmr_syn_connection);
// $count++;
// }
// }
// ============ ".action_db." ==============

// $val = preg_replace("/[\s]*(insert into )([()]*)set((.*))seU", "\\2", $val);
// 
// $cmr_syn_query=eregi_replace("^insert into ".$cmr_syn_table, "INSERT INTO "."", $cmr->query[$count]);
// $cmr_syn_query=eregi_replace("^delete ".$cmr_syn_table,"DELETE "."",$cmr->query[$count]);
// $cmr_syn_query=eregi_replace("^update ".$cmr_syn_table,"UPDATE "."",$cmr->query[$count]);
// 
// $cmr_syn_table=preg_replace("/[\s]*(insert into )([()]*)set((.*))seU", "\\2", $val);;
