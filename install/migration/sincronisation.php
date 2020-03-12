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
// // case "ro":$val = preg_replace("(£_foreach_rown_£)((.*))(££_foreach_rown_££)seU", "eval_rowns_in_col('\\2', $db_name, $form_name, $table_name, $short_table_name, $column_name)", $val);
// 
// 
// 
// 

// 	$new_sql=preg_replace($pattern, $subject, -1,$count);
// 	print_r($new_sql);

 	return $sql;
}

//================================================= 
	
	
//================================================= 


function cmr_gen_pattern(){

$h = "[0-9a-f]";
$nonascii = "[\200-\377]";
$unicode = "\\{h}{1,6}[ \t\r\n\f]?";
$escape = "{" . $unicode . "}|\\[ -~\200-\377]";
$nmstart = "[a-z]|{" . $nonascii . "}|{" . $escape . "}";
$nmchar = "[a-z0-9-]|{" . $nonascii . "}|{escape}";
$string1 = "\"([\t !#$%&(-~]|\\{nl}|\'|{" . $nonascii . "}|{" . $escape . "})*\$";
$string2 = "\'([\t !#$%&(-~]|\\{nl}|\"|{" . $nonascii . "}|{" . $escape . "})*\'";
$ident = "{" . $nmstart . "}{" . $nmchar . "}*";
$name = "{" . $nmchar . "}+";
$num = "[0-9]+|[0-9]*"."[0-9]+";
$string = "{" . $string1 . "}|{" . $string2 . "}";
$url = "([!#$%&*-~]|{" . $nonascii . "}|{" . $escape . "})*";
$w = "[ \t\r\n\f]*";
$nl = "\n|\r\n|\r|\f";
$range = "\?{1,6}|{h}(\?{0,5}|{h}(\?{0,4}|{h}(\?{0,3}|{h}(\?{0,2}|{h}(\??|{h})))))";


// $pattern_var=array(

$cmr_sepace = "[\\s \\n\\r\\t\\f[[:space:]]+";
$cmr_comma_sep = "[ ][,]|[,][ ]|[ ][,][ ]";
$cmr_comma_dot = "[ ][;]|[;][ ]|[ ][;][ ]|[;][;]";
$cmr_equal = "[ ]?=[ ]?";
$cmr_point = "[ ]?\\.[ ]?";
$cmr_char = "(?P<char>[a-z0-9_])";
// $cmr_name = "[a-z_\x7f-\xff][a-z0-9_\x7f-\xff]*";
$cmr_name = ".+";
$cmr_db_ref = "[`]?" . $cmr_name . "[`]?";
$cmr_exp = "[^#]*";

// $cmr_tbl_name = "[^;]{1,100}";
// $cmr_set_cols_value = "[^;]{1,100}";
// $cmr_where_condition = "[^;]{1,100}";
// $cmr_list_column = "[^;]{1,100}";
// $cmr_row_count = "[^;]{1,100}";

$cmr_log_name = "(?P<log_name>" . $cmr_name . ")";
$cmr_log_pos = "(?P<log_pos>" . $cmr_name . ")";

$cmr_symbol = "(?P<symbol>" . $cmr_name . ")";
$cmr_fk_symbol = "(?P<fk_symbol>" . $cmr_name . ")";

$cmr_date = "(?P<date>[0-9]+|[0-9]*"."[0-9]+)";
$cmr_number = "(?P<number>[0-9]+|[0-9]*"."[0-9]+)";
$cmr_position = "(?P<position>[0-9]+|[0-9]*"."[0-9]+)";
$cmr_length = "(?P<length>[0-9]+|[0-9]*"."[0-9]+)";
$cmr_count = "(?P<count>[0-9]+|[0-9]*"."[0-9]+)";
$cmr_decimals = "(?P<decimals>[0-9]+|[0-9]*"."[0-9]+)";


$cmr_alias = "(?P<alias>" . $cmr_name . ")";
$cmr_user = "(?P<user>" . $cmr_name . ")";
$cmr_newname = "(?P<newname>" . $cmr_name . ")";
$cmr_type = "(?P<type>" . $cmr_name . ")";
$cmr_string = "(?P<string>" . $cmr_name . ")";
$cmr_wild = "(?P<wild>" . $cmr_name . ")";
$cmr_offset = "(?P<offset>" . $cmr_name . ")";
$cmr_password = "(?P<password>" . $cmr_name . ")";
$cmr_literal = "(?P<literal>" . $cmr_name . ")";
$cmr_default = "(?P<default>DEFAULT)";
$cmr_cipher = "(?P<cipher>" . $cmr_name . ")";
$cmr_var_name = "(?P<var_name>" . $cmr_name . ")";
$cmr_index_name = "(?P<index_name>" . $cmr_name . ")";
$cmr_file_name = "(?P<file_name>" . $cmr_name . ")";
$cmr_collation_name = "(?P<collation_name>" . $cmr_name . ")";
$cmr_procedure_name = "(?P<procedure_name>" . $cmr_name . ")";
$cmr_charset_name = "(?P<charset_name>" . $cmr_name . ")";
$cmr_engine_name = "(?P<engine_name>" . $cmr_name . ")";
$cmr_index_col_name = "(?P<index_col_name>" . $cmr_name . ")";
$cmr_priv_type = "(?P<priv_type>" . $cmr_name . ")";
$cmr_index_type = "(?P<index_type>" . $cmr_name . ")";
$cmr_subject = "(?P<subject>" . $cmr_name . ")";
$cmr_issuer = "(?P<issuer>" . $cmr_name . ")";
$cmr_user = "(?P<user>" . $cmr_name . ")";



$cmr_with_option = "(?P<with_option>" . $cmr_name . ")";
$cmr_export_options = "(?P<export_options>" . $cmr_name . ")";
$cmr_list_argument = "(?P<list_argument>" . $cmr_name . ")";

$cmr_select_expr = "(?P<select_expr>[^#]+)";

$cmr_column_definition = "(?P<column_definition>" . $cmr_name . ")";
$cmr_alter_specification = "(?P<alter_specification>" . $cmr_name . ")";
$cmr_table_option = "(?P<table_option>" . $cmr_name . ")";
$cmr_create_specification = "(?P<create_specification>" . $cmr_name . ")";


$cmr_expr = "(?P<expr>" . $cmr_exp . ")";
$cmr_expression = "(?P<expression>" . $cmr_exp . ")";
$cmr_value = "(?P<value>" . $cmr_exp . ")";

$cmr_db_name = "(?P<db_name>$cmr_db_ref" . ")";
$cmr_list_db = "(?P<list_db>$cmr_db_ref(,$cmr_db_ref)*)"; 

$cmr_tbl_name = "(?P<tbl_name>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?)";
$cmr_list_table = "(?P<list_table>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(,$cmr_db_ref(\\." .  $cmr_db_ref .  ")?)*)";
$cmr_table_references = "(?P<table_references>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(,$cmr_db_ref(\\." .  $cmr_db_ref .  ")?)*)";
$cmr_table_cols_ref = "(?P<table_cols_ref>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(,$cmr_db_ref(\\." .  $cmr_db_ref .  ")?)*)";

$cmr_col_name = "(?P<col_name>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?)";
$cmr_list_column = "(?P<list_column>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "(," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?)*)";

$cmr_list_col_value = "(?P<list_col_value>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?". "=" . $cmr_exp . "(," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" . $cmr_exp . ")*)";
$cmr_set_cols_value = "(?P<set_cols_value>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=(" . $cmr_exp . "|DEFAULT)(," . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . "=" ."(" . $cmr_exp . "|DEFAULT))*" . ")";

$cmr_list_value = "(?P<list_value>([^,]+|DEFAULT)(,([^,]+|DEFAULT)" . ")*)";

$cmr_row_count = "(?P<row_count>[0-9]+(,[0-9]+)?" . ")";


$cmr_where_condition = "(?P<where_condition>" . $cmr_exp . ")";




$cmr_tbl_name2 = "(?P<tbl_name2>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?)";
$cmr_new_tbl_name = "(?P<new_tbl_name>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?)";
$cmr_new_tbl_name2 = "(?P<new_tbl_name2>" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?)";
$cmr_col_name1 = "(?P<col_name1>" . $cmr_name . ")";
$cmr_expr1 = "(?P<expr1>" . $cmr_exp . ")";
$cmr_col_name2 = "(?P<col_name2>" . $cmr_name . ")";
$cmr_expr2 = "(?P<expr2>" . $cmr_exp . ")";

$cmr_old_table_name = "(?P<old_table_name>" . $cmr_name . ")";
$cmr_reference_definition = "(?P<reference_definition>" . $cmr_name . ")";
$cmr_reference_option = "(?P<reference_option>" . $cmr_name . ")";
$cmr_list_table_index = "(?P<list_table_index>" . $cmr_name . ")";

$cmr_select_statement = "(?P<select_statement>" . $cmr_name . ")";






$cmr_list_rown = "(?P<list_rown>" . $cmr_name . ")";

$cmr_default_value = "(?P<default_value>" . $cmr_exp . ")";
$cmr_value1 = "(?P<value1>" . $cmr_exp . ")";
$cmr_value2 = "(?P<value2>" . $cmr_exp . ")";
$cmr_value3 = "(?P<value3>" . $cmr_exp . ")";

$cmr_thread_id = "(?P<thread_id>" . $cmr_name . ")";
$cmr_parameter = "(?P<parameter>" . $cmr_name . ")";
$cmr_host_name = "(?P<host_name>" . $cmr_name . ")";
$cmr_user_name = "(?P<user_name>" . $cmr_name . ")";
$cmr_port_num = "(?P<port_num>" . $cmr_name . ")";
$cmr_master_log_name = "(?P<master_log_name>" . $cmr_name . ")";
$cmr_sp_name = "(?P<sp_name>" . $cmr_name . ")";
$cmr_param_name = "(?P<param_name>" . $cmr_name . ")";
$cmr_condition_name = "(?P<condition_name>" . $cmr_name . ")";
$cmr_cursor_name = "(?P<cursor_name>" . $cmr_name . ")";
$cmr_key_cache_name = "(?P<key_cache_name>" . $cmr_name . ")";
$cmr_ca_directory_name = "(?P<ca_directory_name>" . $cmr_name . ")";
$cmr_cert_file_name = "(?P<cert_file_name>" . $cmr_name . ")";
$cmr_key_file_name = "(?P<key_file_name>" . $cmr_name . ")";
$cmr_trigger_name = "(?P<trigger_name>" . $cmr_name . ")";
$cmr_relay_log_name = "(?P<relay_log_name>" . $cmr_name . ")";
$cmr_ca_file_name = "(?P<ca_file_name>" . $cmr_name . ")";
$cmr_stmt_name = "(?P<stmt_name>" . $cmr_name . ")";
$cmr_thread_name = "(?P<thread_name>" . $cmr_name . ")";
$cmr_handler_type = "(?P<handler_type>" . $cmr_name . ")";
$cmr_condition_value = "(?P<condition_value>" . $cmr_name . ")";
$cmr_create_definition = "(?P<create_definition>" . $cmr_name . ")";
$cmr_table_options = "(?P<table_options>" . $cmr_name . ")";


$cmr_absolute_path_to_directory = "(?P<absolute_path_to_directory>" . $cmr_name . ")";
$cmr_some_password = "(?P<some_password>" . $cmr_name . ")"; 
$cmr_old_user = "(?P<old_user>" . $cmr_name . ")";
$cmr_new_user = "(?P<new_user>" . $cmr_name . ")";
$cmr_flush_option = "(?P<flush_option>" . $cmr_name . ")";
$cmr_identifier = "(?P<identifier>" . $cmr_name . ")";
$cmr_reset_option = "(?P<reset_option>" . $cmr_name . ")";
$cmr_characteristic = "(?P<characteristic>" . $cmr_name . ")";
$cmr_routine_body = "(?P<routine_body>" . $cmr_name . ")";
$cmr_sp_statement = "(?P<sp_statement>" . $cmr_name . ")";
$cmr_sqlstate_value = "(?P<sqlstate_value>" . $cmr_name . ")";
$cmr_mysql_error_code = "(?P<mysql_error_code>" . $cmr_name . ")";
$cmr_sql_statement = "(?P<sql_statement>" . $cmr_name . ")";
$cmr_master_def = "(?P<master_def>" . $cmr_name . ")";
$cmr_master_log_pos = "(?P<master_log_pos>" . $cmr_name . ")";
$cmr_preparable_stmt = "(?P<preparable_stmt>" . $cmr_name . ")";
$cmr_trigger_time = "(?P<trigger_time>" . $cmr_name . ")";
$cmr_list_cipher = "(?P<list_cipher>" . $cmr_name . ")";
$cmr_master_log_file = "(?P<master_log_file>" . $cmr_name . ")";
$cmr_list_cipher = "(?P<list_cipher>" . $cmr_name . ")";
$cmr_trigger_event = "(?P<trigger_event>" . $cmr_name . ")";

// );





// $pattern_string="
// $pattern = "(";
// $pattern .= "(?P<insert>INSERT )(LOW PRIORITY |DELAYED |HIGH PRIORITY )?(IGNORE )?";
// $pattern .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
// $pattern .= "(?P<values>VALUES )" . $cmr_list_value;
// $pattern .= "(?P<on_duplicate_key_update>ON DUPLICATE KEY UPDATE " . $cmr_list_col_value . ")?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<insert>INSERT )(LOW PRIORITY |DELAYED |HIGH PRIORITY )?(IGNORE )?";
// $pattern .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
// $pattern .= "(?P<set>SET )" . $cmr_set_cols_value;
// $pattern .= "(?P<on_duplicate_key_update>ON DUPLICATE KEY UPDATE " . $cmr_list_col_value . ")?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<insert>INSERT (LOW PRIORITY |DELAYED |HIGH PRIORITY )?(IGNORE )?";
// $pattern .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
// $pattern .= "(?P<select>SELECT )(.*)";
// $pattern .= "(?P<on_duplicate_key_update>ON DUPLICATE KEY UPDATE " . $cmr_list_col_value . ")?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
$pattern .= "(?P<update>UPDATE )(LOW PRIORITY )?(IGNORE )?" . $cmr_tbl_name;
$pattern .= "(?P<set>SET )" . $cmr_set_cols_value;
$pattern .= "((?P<where>WHERE)" . $cmr_where_condition . ")?";
$pattern .= "((?P<order_by>ORDER BY )" . $cmr_list_column . ")?";
$pattern .= "((?P<limit>LIMIT )" . $cmr_row_count . ")?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<update>UPDATE )(?P<low_priority>LOW PRIORITY)? (IGNORE )?" . $cmr_table_references;
// $pattern .= "(?P<set>SET )" . $cmr_set_cols_value;
// $pattern .= "((?P<where>WHERE)" . $cmr_where_condition . "?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<delete>DELETE )(LOW PRIORITY )?(QUICK )?(IGNORE )?";
// $pattern .= "(?P<from>FROM )" . $cmr_tbl_name;
// $pattern .= "(?P<where>WHERE " . $cmr_where_condition . ")?";
// $pattern .= "((?P<order_by>ORDER BY )" . $cmr_list_column . ")?";
// $pattern .= "((?P<limit>LIMIT )" . $cmr_row_count . ")?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<delete>DELETE )(LOW PRIORITY )?(QUICK )?(IGNORE )?";
// $pattern .= $cmr_table_cols_ref;
// $pattern .= "(?P<from>FROM )" . $cmr_table_references;
// $pattern .= "(?P<where>WHERE )" . $cmr_where_condition . "?";
// $pattern .= ";?)";
// $pattern .= "|";
// $pattern .= "(;?";
// $pattern .= "(?P<delete>DELETE )(LOW PRIORITY )?(QUICK )?(IGNORE )?";
// $pattern .= "(?P<from>FROM )" . $cmr_table_cols_ref;
// $pattern .= "(?P<using>USING )" . $cmr_table_references;
// $pattern .= "(?P<where>WHERE )" . $cmr_where_condition . "?";
// $pattern .= ";?)";

$pattern1 = "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<replace>REPLACE )(?P<low_priority>LOW PRIORITY | DELAYED)?";
$pattern1 .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
$pattern1 .= "(?P<values>VALUES )" . $cmr_list_value;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<replace>REPLACE )(?P<low_priority>LOW PRIORITY | DELAYED)?";
$pattern1 .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
$pattern1 .= "(?P<set>SET )" . $cmr_set_cols_value;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<replace>REPLACE )(?P<low_priority>LOW PRIORITY | DELAYED)?";
$pattern1 .= "(?P<into>INTO )?" . $cmr_db_ref .  "" . $cmr_list_column . "?";
$pattern1 .= "SELECT (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<truncate>TRUNCATE )(?P<table>TABLE)? " . $cmr_db_ref .  "" . ")";
$pattern1 .= "(DESCRIBE | DESC) " . $cmr_db_ref .  "" . ") " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " |" . $cmr_wild . ")?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<select>SELECT )";
$pattern1 .= "(ALL | DISTINCT | DISTINCTROW )?";
$pattern1 .= "(HIGH PRIORITY)?";
$pattern1 .= "(STRAIGHT JOIN)?";
$pattern1 .= "(SQL SMALL RESULT)? (SQL BIG RESULT)? (SQL BUFFER RESULT)?";
$pattern1 .= "(SQL CACHE | SQL NO CACHE)? (SQL CALC FOUND ROWS)?";
$pattern1 .= "select" . $cmr_exp . ", (.*)";
$pattern1 .= "(?P<from>FROM )" . $cmr_table_cols_ref;
$pattern1 .= "(?P<where>WHERE )" . $cmr_where_condition . "?";
$pattern1 .= "(GROUP BY " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " |" . $cmr_exp . " |" . $cmr_position . ")";
$pattern1 .= "(ASC | DESC)?, (.*) (WITH ROLLUP)?)?";
$pattern1 .= "(HAVING" . $cmr_where_condition . ")?";
$pattern1 .= "(ORDER BY " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " |" . $cmr_exp . " |" . $cmr_position . ")";
$pattern1 .= "(ASC | DESC)?, )*";
$pattern1 .= "(LIMIT (" . $cmr_offset . ",)? | OFFSET" . $cmr_offset . "))?";
$pattern1 .= "(PROCEDURE" . $cmr_procedure_name . $cmr_list_argument . "))?";
$pattern1 .= "(INTO OUTFILE " . $cmr_file_name . "'" . $cmr_export_options;
$pattern1 .= "| INTO DUMPFILE " . $cmr_file_name . "'";
$pattern1 .= "| INTO " . $cmr_var_name . "," . $cmr_var_name . ")?)?";
$pattern1 .= "(FOR UPDATE | LOCK IN SHARE MODE)?)?";
$pattern1 .= ";?)";



$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<grant>GRANT )(" . $cmr_priv_type . " " . $cmr_list_column . "?," . $cmr_priv_type . " " . $cmr_list_column . "?)? (.*)";
$pattern1 .= "ON (" . $cmr_db_ref .  "" . ") | * | *(.*) | " . $cmr_db_name . ")(.*))";
$pattern1 .= "TO" . $cmr_user . " (IDENTIFIED BY (PASSWORD)? " . $cmr_password . "')?";
$pattern1 .= "(," . $cmr_user . " (IDENTIFIED BY (PASSWORD)? " . $cmr_password . "')?)? (.*)";
$pattern1 .= "(REQUIRE";
$pattern1 .= "NONE |";
$pattern1 .= "((SSL| X509))?";
$pattern1 .= "(CIPHER " . $cmr_cipher . "' (AND)?)?";
$pattern1 .= "(ISSUER " . $cmr_issuer . "' (AND)?)?";
$pattern1 .= "(SUBJECT " . $cmr_subject . "')?)?";
$pattern1 .= "(WITH" . $cmr_with_option . " " . $cmr_with_option . ")? )*";
$pattern1 .= "";
$pattern1 .= $cmr_with_option . " ?";
$pattern1 .= "GRANT OPTION";
$pattern1 .= "| MAX QUERIES PER HOUR" . $cmr_count;
$pattern1 .= "| MAX UPDATES PER HOUR" . $cmr_count;
$pattern1 .= "| MAX CONNECTIONS PER HOUR" . $cmr_count;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";

$pattern1 .= "(?P<revoke>REVOKE )(" . $cmr_priv_type . " " . $cmr_list_column . "?," . $cmr_priv_type . " " . $cmr_list_column . "?)? (.*)";
$pattern1 .= "ON (" . $cmr_db_ref .  "" . ") | * | *(.*) | " . $cmr_db_name . ")(.*))";
$pattern1 .= "FROM)? (.*)";
$pattern1 .= ";?)";

$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<revoke_all_privileges>REVOKE ALL PRIVILEGES )(, GRANT OPTION FROM) )*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<analyze_table>ANALYZE TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<backup_table>BACKUP TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";

$pattern1 .= "(?P<check_table>CHECK TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<checksum_table>CHECKSUM TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<optimize_table>OPTIMIZE TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<repair_table>REPAIR TABLE)" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<restore_table>RESTORE TABLE )" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW ) (FULL)? COLUMNS FROM " . $cmr_db_ref .  "" . ") (FROM " . $cmr_db_name . "))? (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";


$pattern1 .= "(;?";
$pattern1 .= "(?P<show_create_database>SHOW CREATE DATABASE )" . $cmr_db_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_create_table>SHOW CREATE TABLE )" . $cmr_tbl_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_databases>SHOW DATABASES ) (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_engine>SHOW ENGINE )(" . $cmr_engine_name . " (LOGS | STATUS )";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW ) (STORAGE)? ENGINES";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_errors>SHOW ERRORS ) (LIMIT " . $cmr_offset . ",)?)?";
$pattern1 .= ";?)";
$pattern1 .= "|";

$pattern1 .= "(;?";
$pattern1 .= "(?P<show_grants_for>SHOW GRANTS FOR )(" . $cmr_user;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_index_from>SHOW INDEX FROM )" . $cmr_db_ref .  "" . "(FROM " . $cmr_db_name . "))?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_innodb_status>SHOW INNODB STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW )(?P<bdb>BDB)? LOGS";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_privileges>SHOW PRIVILEGES)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW )(?P<full>FULL)? PROCESSLIST";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW ) (GLOBAL | SESSION)? STATUS (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";


$pattern1 .= "(;?";
$pattern1 .= "(?P<show_table_status>SHOW TABLE STATUS ) (FROM " . $cmr_db_name . "))? (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW )(?P<open>OPEN)? TABLES (FROM " . $cmr_db_name . "))? (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show>SHOW )(?P<global>GLOBAL | SESSION)? VARIABLES (LIKE " . $pattern . "')?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_warnings>SHOW WARNINGS )(?P<limit>LIMIT " . $cmr_offset . ",)?)?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_binary_logs>SHOW BINARY LOGS )";
$pattern1 .= ";?)";
$pattern1 .= "|";

$pattern1 .= "(;?";
$pattern1 .= "(?P<show_master_status>SHOW MASTER STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_slave_hosts>SHOW SLAVE HOSTS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_slave_status>SHOW SLAVE STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_binlog_events>SHOW BINLOG EVENTS) [ IN " . $cmr_log_name . "' ] [ FROM pos ] [ LIMIT " . $cmr_offset . ",]" . $cmr_row_count . " ]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_master_logs>SHOW MASTER LOGS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_character_set>SHOW CHARACTER SET)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_collation>SHOW COLLATION)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_columns>SHOW COLUMNS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_function_status>SHOW FUNCTION STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_keys>SHOW KEYS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_open_tables>SHOW OPEN TABLES)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_procedure_status>SHOW PROCEDURE STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_status>SHOW STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_table_status>SHOW TABLE STATUS)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_tables>SHOW TABLES)";
$pattern1 .= ";?)";
$pattern1 .= "|";

$pattern1 .= "(;?";
$pattern1 .= "(?P<show_variables>SHOW VARIABLES)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_create_procedure>SHOW CREATE PROCEDURE | FUNCTION" . $cmr_sp_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<show_procedure>SHOW PROCEDURE | FUNCTION STATUS [LIKE" . $pattern . "]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<help>HELP) '(functions)'";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<alter>ALTER ) (IGNORE )?TABLE " . $cmr_tbl_name ;
$pattern1 .= "(cmr_alter_specification)";
$pattern1 .= "";
$pattern1 .= $cmr_alter_specification . ":";
$pattern1 .= $cmr_table_option . " (.*)";
$pattern1 .= "| ADD (COLUMN)?" . $cmr_column_definition . " (FIRST | AFTER" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " )?";
$pattern1 .= "| ADD (COLUMN)? " . $cmr_column_definition . ",(.*))";
$pattern1 .= "| ADD (INDEX|KEY) " . $cmr_index_name . ")? " . $cmr_index_type . ")? (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= "| ADD (CONSTRAINT " . $cmr_symbol . ")?)?";
$pattern1 .= "PRIMARY KEY " . $cmr_index_type . ")? (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= "| ADD (CONSTRAINT " . $cmr_symbol . ")?)?";
$pattern1 .= "UNIQUE (INDEX|KEY)? " . $cmr_index_name . ")? " . $cmr_index_type . ")? (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= "| ADD (FULLTEXT|SPATIAL)? (INDEX|KEY)? " . $cmr_index_name . ")? (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= "| ADD (CONSTRAINT " . $cmr_symbol . ")?)?";
$pattern1 .= "FOREIGN KEY " . $cmr_index_name . ")? (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= $cmr_reference_definition . ")?";
$pattern1 .= "| ALTER (COLUMN)?" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " (SET" . $cmr_default . $cmr_literal . " | DROPDEFAULT)";
$pattern1 .= "| CHANGE (COLUMN)? old" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . $cmr_column_definition;
$pattern1 .= "(FIRST|AFTER" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ")?";
$pattern1 .= "| MODIFY (COLUMN)?" . $cmr_column_definition . " (FIRST | AFTER" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ")?";
$pattern1 .= "| DROP (COLUMN)?" . $cmr_col_name;
$pattern1 .= "| DROP PRIMARY KEY";
$pattern1 .= "| DROP (INDEX|KEY)" . $cmr_index_name;
$pattern1 .= "| DROP FOREIGN KEY fk" . $cmr_symbol;
$pattern1 .= "| DISABLE KEYS";
$pattern1 .= "| ENABLE KEYS";
$pattern1 .= "| RENAME (TO)? " . $cmr_new_tbl_name;
$pattern1 .= "| ORDER BY)? (.*)";
$pattern1 .= "| CONVERT TO CHARACTER SET" . $cmr_charset_name . " (COLLATE" . $cmr_collation_name . ")?";
$pattern1 .= "| DEFAULT)? CHARACTER SET" . $cmr_charset_name . " (COLLATE" . $cmr_collation_name . ")?";
$pattern1 .= "| DISCARD TABLESPACE";
$pattern1 .= "| IMPORT TABLESPACE";
$pattern1 .= "";
$pattern1 .= "index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ":";
$pattern1 .= $cmr_col_name . " " . $cmr_length . "? (ASC | DESC)?";
$pattern1 .= "";
$pattern1 .= $cmr_index_type . ":";
$pattern1 .= "USING (BTREE | HASH)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create>CREATE) (UNIQUE|FULLTEXT|SPATIAL)? INDEX" . $cmr_index_name;
$pattern1 .= $cmr_index_type . ")?";
$pattern1 .= "ON " . $cmr_db_ref .  "" . ") (index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*))";
$pattern1 .= "";
$pattern1 .= "index" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ":";
$pattern1 .= $cmr_col_name . " " . $cmr_length . "? (ASC | DESC)?";
$pattern1 .= "";
$pattern1 .= $cmr_index_type . ":";
$pattern1 .= "USING (BTREE | HASH)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";


$pattern1 .= "(?P<create>CREATE )[TEMPORARY] TABLE [IF NOT EXISTS]" . $cmr_db_ref .  "" . " [" . $cmr_create_definition . ",(.*))]";
$pattern1 .= " " . $cmr_table_option . "s] " . $cmr_select_statement . "]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create>CREATE )[TEMPORARY] TABLE [IF NOT EXISTS]" . $cmr_db_ref .  "" . " LIKE" . $cmr_old_table_name;
$pattern1 .= " " . $cmr_create_definition . ":";
$pattern1 .= " " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . $cmr_type . " [NOT NULL | NULL] " . $cmr_DEFAULT . $cmr_default_value . "] [AUTO INCREMENT]";
$pattern1 .= " [PRIMARY KEY] " . $cmr_reference_definition . "]";
$pattern1 .= " | PRIMARY KEY " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " | KEY " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " | INDEX " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " | UNIQUE [INDEX] " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " | FULLTEXT [INDEX] " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " | [CONSTRAINT" . $cmr_symbol . "] FOREIGN KEY " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " " . $cmr_reference_definition . "]";
$pattern1 .= " | CHECK " . $cmr_exp . ")";
$pattern1 .= " " . $cmr_type . ":";
$pattern1 .= " TINYINT[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | SMALLINT[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | MEDIUMINT[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | INT[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | INTEGER[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | BIGINT[" . $cmr_length . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | REAL[" . $cmr_length . $cmr_decimals . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | DOUBLE[" . $cmr_length . $cmr_decimals . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | FLOAT[" . $cmr_length . $cmr_decimals . ")] [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | DECIMAL" . $cmr_length . $cmr_decimals . ") [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | NUMERIC" . $cmr_length . $cmr_decimals . ") [UNSIGNED] [ZEROFILL]";
$pattern1 .= " | CHAR" . $cmr_length . ") [BINARY]";
$pattern1 .= " | VARCHAR" . $cmr_length . ") [BINARY]";
$pattern1 .= " | DATE";
$pattern1 .= " | TIME";
$pattern1 .= " | TIMESTAMP";
$pattern1 .= " | DATETIME";
$pattern1 .= " | TINYBLOB";
$pattern1 .= " | BLOB";
$pattern1 .= " | MEDIUMBLOB";
$pattern1 .= " | LONGBLOB";
$pattern1 .= " | TINYTEXT";
$pattern1 .= " | TEXT";
$pattern1 .= " | MEDIUMTEXT";
$pattern1 .= " | LONGTEXT";
$pattern1 .= " | ENUM" . $cmr_exp . "1" . $cmr_exp . "2" . $cmr_exp . "3,(.*))";
$pattern1 .= " | SET" . $cmr_exp . "1" . $cmr_exp . "2" . $cmr_exp . "3,(.*))";
$pattern1 .= " " . $cmr_index_col_name . ":";
$pattern1 .= " " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " [" . $cmr_length . ")]";
$pattern1 .= " " . $cmr_reference_definition . ":";
$pattern1 .= " REFERENCES" . $cmr_db_ref .  "" . " [" . $cmr_index_col_name . ",(.*))]";
$pattern1 .= " [MATCH FULL | MATCH PARTIAL]";
$pattern1 .= " [ON DELETE" . $cmr_reference_option . "]";
$pattern1 .= " [ON UPDATE" . $cmr_reference_option . "]";
$pattern1 .= " " . $cmr_reference_option . ":";
$pattern1 .= " RESTRICT | CASCADE | SET NULL | NO ACTION | SET" . $cmr_DEFAULT;
$pattern1 .= " " . $cmr_table_option . "s:";
$pattern1 .= " TYPE = (BDB | HEAP | ISAM | InnoDB | MERGE | MRG MYISAM | MYISAM )";
$pattern1 .= " | AUTO INCREMENT = #";
$pattern1 .= " | AVG ROW LENGTH = #";
$pattern1 .= " | CHECKSUM = [01]";
$pattern1 .= " | COMMENT = " . $cmr_string;
$pattern1 .= " | MAX ROWS = #";
$pattern1 .= " | MIN ROWS = #";
$pattern1 .= " | PACK KEYS = ([01] |DEFAULT)";
$pattern1 .= " | PASSWORD = " . $cmr_string;
$pattern1 .= " | DELAY KEY WRITE = [01]";
$pattern1 .= " | ROW FORMAT= ( default | dynamic | fixed | compressed )";
$pattern1 .= " | RAID TYPE= (1 | STRIPED | RAID0 ) RAID CHUNKS=# RAID CHUNKSIZE=#";
$pattern1 .= " | UNION = (table_name,[table_name(.*)])";
$pattern1 .= " | INSERT METHOD= (NO | FIRST | LAST )";
$pattern1 .= " | DATA DIRECTORY=" . $cmr_absolute_path_to_directory;
$pattern1 .= " | INDEX DIRECTORY=" . $cmr_absolute_path_to_directory;
$pattern1 .= "A subset of the ALTER TABLE syntax that allows addition of foreign keys:";
$pattern1 .= " ALTER [IGNORE] TABLE" . $cmr_db_ref .  "" . $cmr_alter_specification . " [," . $cmr_alter_specification . "] (.*)";
$pattern1 .= " " . $cmr_alter_specification . ":";
$pattern1 .= " ADD [CONSTRAINT " . $cmr_symbol . "]]";
$pattern1 .= " FOREIGN KEY " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " " . $cmr_reference_definition . "]";
$pattern1 .= "";
$pattern1 .= " " . $cmr_index_col_name . ":";
$pattern1 .= " " . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . " [" . $cmr_length . ")]";
$pattern1 .= "";
$pattern1 .= " " . $cmr_reference_definition . ":";
$pattern1 .= " REFERENCES" . $cmr_db_ref .  "" . " [" . $cmr_index_col_name . ",(.*))]";
$pattern1 .= " [MATCH FULL | MATCH PARTIAL]";
$pattern1 .= " [ON DELETE" . $cmr_reference_option . "]";
$pattern1 .= " [ON UPDATE" . $cmr_reference_option . "]";
$pattern1 .= "";
$pattern1 .= " " . $cmr_reference_option . ":";
$pattern1 .= " RESTRICT | CASCADE | SET NULL | NO ACTION | SET" . $cmr_DEFAULT;
$pattern1 .= "";
$pattern1 .= " " . $cmr_table_option . "s:";
$pattern1 .= " TYPE = (BDB | HEAP | ISAM | InnoDB | MERGE | MRG MYISAM | MYISAM )";
$pattern1 .= " | AUTO INCREMENT = #";
$pattern1 .= " | AVG ROW LENGTH = #";
$pattern1 .= " | CHECKSUM = [01]";
$pattern1 .= " | COMMENT = " . $cmr_string;
$pattern1 .= " | MAX ROWS = #";
$pattern1 .= " | MIN ROWS = #";
$pattern1 .= " | PACK KEYS = ([01] |DEFAULT)";
$pattern1 .= " | PASSWORD = " . $cmr_string;
$pattern1 .= " | DELAY KEY WRITE = [01]";
$pattern1 .= " | ROW FORMAT= ( default | dynamic | fixed | compressed )";
$pattern1 .= " | RAID TYPE= (1 | STRIPED | RAID0 ) RAID CHUNKS=# RAID CHUNKSIZE=#";
$pattern1 .= " | UNION = (table_name,[table_name(.*)])";
$pattern1 .= " | INSERT METHOD= (NO | FIRST | LAST )";
$pattern1 .= " | DATA DIRECTORY=" . $cmr_absolute_path_to_directory;
$pattern1 .= " | INDEX DIRECTORY=" . $cmr_absolute_path_to_directory;
$pattern1 .= " ALTER [IGNORE] TABLE" . $cmr_db_ref .  "" . $cmr_alter_specification . " [," . $cmr_alter_specification . "] (.*)";
$pattern1 .= " " . $cmr_alter_specification . ":";
$pattern1 .= " ADD [CONSTRAINT " . $cmr_symbol . "]]";
$pattern1 .= " FOREIGN KEY " . $cmr_index_name . "] " . $cmr_index_col_name . ",(.*))";
$pattern1 .= " " . $cmr_reference_definition . "]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";


$pattern1 .= "(?P<alter_database>ALTER DATABASE ) (" . $cmr_db_name . "))?";
$pattern1 .= $cmr_alter_specification . " " . $cmr_alter_specification . ")? (.*)";
$pattern1 .= "";
$pattern1 .= $cmr_alter_specification . ":";
$pattern1 .= $cmr_default . ")? CHARACTER SET" . $cmr_charset_name;
$pattern1 .= "| DEFAULT)? COLLATE" . $cmr_collation_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create_database>CREATE DATABASE ) (IF NOT EXISTS)? " . $cmr_db_name . ")";
$pattern1 .= "(" . $cmr_create_specification . " " . $cmr_create_specification . "*)?";
$pattern1 .= "";
$pattern1 .= $cmr_create_specification . ":";
$pattern1 .= $cmr_default . ")? CHARACTER SET" . $cmr_charset_name;
$pattern1 .= "| DEFAULT)? COLLATE" . $cmr_collation_name . " ";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<drop_database>DROP DATABASE ) (IF EXISTS)? " . $cmr_db_name . ")";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<drop_index>DROP INDEX )(" . $cmr_index_name . " ON " . $cmr_db_ref .  "" . ")";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<rename_table>RENAME TABLE )" . $cmr_db_ref .  "" . "TO " . $cmr_new_tbl_name;
$pattern1 .= "(, " . $cmr_tbl_name2 . ") TO " . $cmr_new_tbl_name2 . "? (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<load_data>LOAD DATA ) (LOW PRIORITY | CONCURRENT)? (LOCAL)? INFILE " . $cmr_file_name . "'";
$pattern1 .= "(REPLACE | IGNORE)?";
$pattern1 .= "INTO TABLE " . $cmr_db_ref .  "" . ")";
$pattern1 .= "(FIELDS";
$pattern1 .= "(TERMINATED BY " . $cmr_string . ")?";
$pattern1 .= "((OPTIONALLY)? ENCLOSED BY " . $cmr_char . "')?";
$pattern1 .= "(ESCAPED BY " . $cmr_char . "')?";
$pattern1 .= ")?";
$pattern1 .= "(LINES";
$pattern1 .= "(STARTING BY " . $cmr_string . ")?";
$pattern1 .= "(TERMINATED BY " . $cmr_string . ")?";
$pattern1 .= ")?";
$pattern1 .= "(IGNORE" . $cmr_number . " LINES)?";
$pattern1 .= "(" . $cmr_db_ref .  "(\\." .  $cmr_db_ref .  ")?(\\." .  $cmr_db_ref .  ")?" . ",(.*)))?";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= " (?P<use>USE )" . $cmr_db_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";

$pattern1 .= "(?P<drop>DROP )[TEMPORARY] TABLE [IF EXISTS]";
$pattern1 .= $cmr_tbl_name . " [," . $cmr_db_ref .  "" . "] (.*)";
$pattern1 .= "[RESTRICT | CASCADE]";
$pattern1 .= "(?P<show>SHOW [FULL] COLUMNS FROM" . $cmr_db_ref .  "" . " [FROM" . $cmr_db_name . "] [LIKE " . $pattern . "']";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<rename_user>RENAME USER )(" . $cmr_old_user . " TO" . $cmr_new_user;
$pattern1 .= "[," . $cmr_old_user . " TO" . $cmr_new_user . "] (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set_password>SET PASSWORD ) = PASSWORD('some" . $cmr_password . "')";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set_password_for>SET PASSWORD FOR )(" . $cmr_user . " = PASSWORD('some" . $cmr_password . "') ";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<drop_user>DROP USER )(" . $cmr_user_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create_user>CREATE USER )(" . $cmr_user . " [IDENTIFIED BY [PASSWORD] " . $cmr_password . "']";
$pattern1 .= "[," . $cmr_user . " [IDENTIFIED BY [PASSWORD] " . $cmr_password . "']] (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<cache_index>CACHE INDEX )";
$pattern1 .= $cmr_list_table_index . " [," . $cmr_list_table_index . "] (.*)";
$pattern1 .= "IN" . $cmr_key_cache_name;
$pattern1 .= "";
$pattern1 .= $cmr_list_table_index . ":";
$pattern1 .= $cmr_tbl_name . " [[INDEX] " . $cmr_index_name . "[," . $cmr_index_name . "] (.*))] ";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<flush>FLUSH )(" . $cmr_flush_option . " [" . $cmr_flush_option . "] .";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<kill>KILL ) [CONNECTION | QUERY]" . $cmr_thread_id;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<load_index_into_cache>LOAD INDEX INTO CACHE )";
$pattern1 .= $cmr_list_table_index . " [," . $cmr_list_table_index . "] (.*)";
$pattern1 .= "";
$pattern1 .= $cmr_list_table_index . ":";
$pattern1 .= $cmr_tbl_name;
$pattern1 .= "[[INDEX] " . $cmr_index_name . "[," . $cmr_index_name . "] (.*))]";
$pattern1 .= "[IGNORE LEAVES]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<reset>RESET )(" . $cmr_reset_option . " [," . $cmr_reset_option . "] (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<handler>HANDLER )(" . $cmr_db_ref .  "" . " OPEN [ AS" . $cmr_alias . " ]";
$pattern1 .= ";?)";
$pattern1 .= "|";


$pattern1 .= "(;?";
$pattern1 .= "(?P<handler>HANDLER )(" . $cmr_db_ref .  "" . " READ" . $cmr_index_name . " ( = | >= | <= | < ) " . $cmr_exp . "1" . $cmr_exp . "2,(.*))";
$pattern1 .= "[ WHERE (.*) ] [LIMIT (.*) ]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<handler>HANDLER )(" . $cmr_db_ref .  "" . " READ" . $cmr_index_name . " ( FIRST | NEXT | PREV | LAST )";
$pattern1 .= "[ WHERE (.*) ] [LIMIT (.*) ]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<handler>HANDLER )(" . $cmr_db_ref .  "" . " READ ( FIRST | NEXT )";
$pattern1 .= "[ WHERE (.*) ] [LIMIT (.*) ]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<handler>HANDLER )(" . $cmr_db_ref .  "" . " CLOSE";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create_procedure>CREATE PROCEDURE )(" . $cmr_sp_name . " (" . $cmr_parameter . "[,(.*)]])";
$pattern1 .= $cmr_characteristic . " (.*)]" . $cmr_routine_body;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<create_function>CREATE FUNCTION )(" . $cmr_sp_name . " (" . $cmr_parameter . "[,(.*)]])";
$pattern1 .= "[RETURNS" . $cmr_type . "]";
$pattern1 .= $cmr_characteristic . " (.*)]" . $cmr_routine_body;
$pattern1 .= "";
$pattern1 .= $cmr_parameter . " :";
$pattern1 .= "[ IN | OUT | INOUT ]" . $cmr_param_name . $cmr_type;
$pattern1 .= "";
$pattern1 .= $cmr_type . " :";
$pattern1 .= "Any valid MySQL data" . $cmr_type;
$pattern1 .= "";
$pattern1 .= $cmr_characteristic . ":";

$pattern1 .= "(?P<language_sql>LANGUAGE SQL )";
$pattern1 .= "| [NOT] DETERMINISTIC";
$pattern1 .= "| SQL SECURITY (DEFINER | INVOKER)";
$pattern1 .= "| COMMENT" . $cmr_string;
$pattern1 .= "";
$pattern1 .= $cmr_routine_body . " :";
$pattern1 .= "Commande(s) SQL valide(s)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<alter_procedure>ALTER PROCEDURE | FUNCTION" . $cmr_sp_name . " " . $cmr_characteristic . " (.*)]";
$pattern1 .= "";
$pattern1 .= $cmr_characteristic . ":";
$pattern1 .= "NAME " . $cmr_newname;
$pattern1 .= "| SQL SECURITY (DEFINER | INVOKER)";
$pattern1 .= "| COMMENT" . $cmr_string;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<drop_procedure>DROP PROCEDURE | FUNCTION [IF EXISTS]" . $cmr_sp_name . " ";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<call>CALL )(" . $cmr_sp_name . "(" . $cmr_parameter . "[,(.*)]])";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<declare>DECLARE )(" . $cmr_var_name . "[,(.*)]" . $cmr_type . " " . $cmr_DEFAULT . $cmr_value . "]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<declare>DECLARE )(" . $cmr_condition_name . " CONDITION FOR" . $cmr_condition_value;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<declare>DECLARE )(" . $cmr_handler_type . " HANDLER FOR" . $cmr_condition_value . "[,(.*)]" . $cmr_sp_statement;
$pattern1 .= "";
$pattern1 .= $cmr_handler_type . ":";
$pattern1 .= "CONTINUE";
$pattern1 .= "| EXIT";
$pattern1 .= "| UNDO";
$pattern1 .= "";
$pattern1 .= $cmr_condition_value . ":";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<sqlstate>SQLSTATE ) [VALUE]" . $cmr_sqlstate_value;
$pattern1 .= "|" . $cmr_condition_name;
$pattern1 .= "| SQLWARNING";
$pattern1 .= "| NOT FOUND";
$pattern1 .= "| SQLEXCEPTION";
$pattern1 .= "|" . $cmr_mysql_error_code;
$pattern1 .= $cmr_condition_value . ":";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<sqlstate>SQLSTATE ) [VALUE]" . $cmr_sqlstate_value;
$pattern1 .= "|" . $cmr_mysql_error_code;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<declare>DECLARE )(" . $cmr_cursor_name . " CURSOR FOR" . $cmr_sql_statement;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<open>OPEN )(" . $cmr_cursor_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<fetch>FETCH )(" . $cmr_cursor_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<close>CLOSE )(" . $cmr_cursor_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set>SET ) variable =" . $cmr_expression . " [,(.*)]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<select>SELECT ) column[,(.*)] INTO variable[,(.*)] table_expression";
$pattern1 .= ";?)";
$pattern1 .= "|";

$pattern1 .= "(;?";
$pattern1 .= "(?P<create_trigger>CREATE TRIGGER )(" . $cmr_trigger_name . $cmr_trigger_time . $cmr_trigger_event;
$pattern1 .= "ON" . $cmr_db_ref .  "" . " FOR EACH ROW trigger_stmt";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<drop_trigger>DROP TRIGGER )(" . $cmr_db_ref .  "" . $cmr_trigger_name . " ";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<do>DO )(" . $cmr_expression . ", " . $cmr_expression . ", (.*)]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<prepare>PREPARE )(" . $cmr_stmt_name . " FROM" . $cmr_preparable_stmt;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<execute>EXECUTE )(" . $cmr_stmt_name . " [USING " . $cmr_var_name . " [, " . $cmr_var_name . "] (.*)];";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";


$pattern1 .= "(?P<deallocate_prepare>DEALLOCATE PREPARE )(" . $cmr_stmt_name;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<change_master_to>CHANGE MASTER TO )(" . $cmr_master_def . " [," . $cmr_master_def . "] (.*)";
$pattern1 .= $cmr_master_def . " =";
$pattern1 .= " MASTER HOST = " . $cmr_host_name . "'";
$pattern1 .= "| MASTER USER = " . $cmr_user_name . "'";
$pattern1 .= "| MASTER PASSWORD = " . $cmr_password . "'";
$pattern1 .= "| MASTER PORT =" . $cmr_port_num;
$pattern1 .= "| MASTER CONNECT RETRY =" . $cmr_count;
$pattern1 .= "| MASTER LOG FILE = " . $cmr_master_log_name . "'";
$pattern1 .= "| MASTER LOG POS =" . $cmr_master_log_pos;
$pattern1 .= "| RELAY LOG FILE = " . $cmr_relay_log_name . "'";
$pattern1 .= "| RELAY LOG POS = relay_log_pos";
$pattern1 .= "| MASTER SSL = (0|1)";
$pattern1 .= "| MASTER SSL CA = " . $cmr_ca_file_name . "'";
$pattern1 .= "| MASTER SSL CAPATH = " . $cmr_ca_directory_name . "'";
$pattern1 .= "| MASTER SSL CERT = " . $cmr_cert_file_name . "'";
$pattern1 .= "| MASTER SSL KEY = " . $cmr_key_file_name . "'";
$pattern1 .= "| MASTER SSL CIPHER = " . $cmr_cipher . "_list'";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<load_table>LOAD TABLE )(" . $cmr_db_ref .  "" . " FROM MASTER";
$pattern1 .= ";?)";
$pattern1 .= "|";

$pattern1 .= "(;?";
$pattern1 .= "(?P<select_master_pos_wait>SELECT MASTER POS WAIT )(" . $cmr_master_log_file . "'," . $cmr_master_log_pos . ")";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<reset_slave>RESET SLAVE )";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set_global_sql_slave_skip_counter>SET GLOBAL SQL SLAVE SKIP COUNTER ) = n";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<start_slave>START SLAVE ) " . $cmr_thread_name . " [," . $cmr_thread_name . "] (.*) ]";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<start_slave>START SLAVE ) [SQL THREAD] UNTIL";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<master_log_file>MASTER LOG FILE ) = " . $cmr_log_name . "', MASTER LOG POS =" . $cmr_log_pos;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<relay_log_file>RELAY LOG FILE ) = " . $cmr_log_name . "', RELAY LOG POS =" . $cmr_log_pos;
$pattern1 .= $cmr_thread_name . " = IO THREAD | SQL THREAD";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<stop_slave>STOP SLAVE ) " . $cmr_thread_name . " [," . $cmr_thread_name . "] (.*) ]";
$pattern1 .= $cmr_thread_name . " = IO THREAD | SQL THREAD";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<purge>PURGE ) (MASTER | BINARY) LOGS TO " . $cmr_log_name . "'";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<purge>PURGE ) (MASTER | BINARY) LOGS BEFORE " . $cmr_date . "'";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set_sql_log_bin>SET SQL LOG BIN ) = (0|1)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<savepoint>SAVEPOINT )(" . $cmr_identifier;
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set_autocommit>SET AUTOCOMMIT )=0";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<start_transaction>START TRANSACTION );";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<commit>COMMIT )";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<lock_tables>LOCK TABLES )";
$pattern1 .= $cmr_tbl_name . " [AS" . $cmr_alias . "] (READ [LOCAL] | [LOW PRIORITY] WRITE)";
$pattern1 .= "[," . $cmr_db_ref .  "" . " [AS" . $cmr_alias . "] (READ [LOCAL] | [LOW PRIORITY] WRITE)] (.*)";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<unlock_tables>UNLOCK TABLES )";
$pattern1 .= ";?)";
$pattern1 .= "|";
$pattern1 .= "(;?";
$pattern1 .= "(?P<set>SET ) [GLOBAL | SESSION] TRANSACTION ISOLATION LEVEL";
$pattern1 .= "( READ UNCOMMITTED | READ COMMITTED | REPEATABLE READ | SERIALIZABLE )";
$pattern1 .= ";?)";

 	return $pattern;
}

//================================================= 


// ";

// $pattern_final=$pattern_string;
// foreach ($pattern_var as $key=>$value){
// 	$pattern_final=ereg_replace("[^_\$]".$key, "\" . \$".str_replace(" ","_",$key)." . \"", $pattern_final);
// 	}
// // 	$pattern_final=ereg_replace(" . \$", ". \$cmr_", $pattern_final);
// print($pattern_final);
// exit;
	
	
	
	
//================================================= 

// ============
$pattern = cmr_gen_pattern();
$pattern = "/".$pattern."/ieU";

list($cmr_migration, $cmr_migration_path)=explode("::",$cmr->config["cmr_sincronisation"]);
if(empty($cmr_migration)){
}elseif(trim($cmr_migration)=="migration"){
 if(!empty($cmr_migration_path)) include_once($cmr_migration_path);
}else{
// ============
$count=0;
$sin_explode=explode(",",$cmr->config["cmr_sincronisation"]);
foreach($sin_explode as $path_key=>$path_value){
 include_once($cmr->get_path("index") . trim($path_value));
 
while(!empty($cmr->query[$count])){

 if($syn2!=$syn1){ 
		$matches = array();
		
		$subject = trim($cmr->query[$count]);
// 		$subject = preg_replace("/'((?<!foo)bar [^']*)'/seU", "cmr_var_name('\\1', '\\2')", $subject);
		$subject = preg_replace('/[^\\\]"(.*[^\\\])(")/seU', "cmr_var_name('\\1', '\\2')", $subject);
		$subject = preg_replace("/[^\\\]'(.*[^\\\])(')/seU", "cmr_var_name('\\1', '\\2')", $subject);
		
// 		$subject = ereg_replace($cmr_sepace, " ", $subject);
		$subject = preg_replace("/[\\n\\r\\t\\f]+/eU", " ", $subject);
		$subject = ereg_replace("  ", " ", $subject);
		$subject = preg_replace("/[ ][;]|[;][ ]|[ ][;][ ]|[;][;]/eU", ";", $subject.";;; ; ;;");
		$subject = ereg_replace(" =|= | = ", "=", $subject);
		$subject = ereg_replace(" \\.|\\\. | \\. ", ".", $subject.".. .. . ");
		$subject = ereg_replace(" ,|, | , ", ",", $subject);
		
		
		if (preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE)) {
				$cmr_query=cmr_gen_sql($matches, $syn1, $syn2);
		$cmr_query = preg_replace("/@_(\d{1,200})_@/eU", $GLOBALS["match_\1"], $cmr_query);
		} else {
	 	$cmr_query=$cmr->query[$count];
		}
		
	print("<hr />");
	print_r($subject);
	print("<hr />");
	print_r(htmlentities($pattern));
	print("<hr />");
	print_r($matches);
	print("<hr />");
	exit;
	print_r($GLOBALS["match_quote"]);

		
		
 }else{
	 $cmr_query=$cmr->query[$count];
 }

 // ============ ".action_db." ==============
 if(cmr_detect_sql_source($matches,$sin1,$sin2)==$syn2){
 $syn_temp=$syn2;
 $syn2=$syn1;
 $syn1=$syn_temp;
 }
// $syn2["cmr_application"]
// $syn2["cmr_db_port"]
// $syn2["cmr_db_socket"]

		
		

 $cmr_syn_connection = cmrdb_connect($syn1["cmr_db_socket"].$syn1["cmr_db_host"].$syn1["cmr_db_port"], $syn1["cmr_db_user"], $syn1["cmr_db_pw"]) or db_die(cmrdb_error());
 cmrdb_select_db($syn1["cmr_db_name"], $cmr_syn_connection);

 
	$match_split=implode("[^;]*;|", $cmr_query_type)."[^;]*;";
	$array_query = preg_split($match_split, $cmr_query.";");
	
	
	
	foreach($array_query as $query_key=>$query_value){
	 $cmr_syn_result = cmrdb_query($query_value, $cmr_syn_connection) or db_die(cmrdb_error()); // or db_die(cmrdb_error());
	 
	 $cmr->query[] = $query_value;
	 $cmr->query["affected_rows"][] = cmrdb_affected_rows($cmr_syn_connection);
 	}
 	
 	
	 $count++;
 }
}
	



}
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
?>