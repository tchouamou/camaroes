 INSERT [LOW_PRIORITY | DELAYED | HIGH_PRIORITY] [IGNORE]
 [INTO] tbl_name [(col_name,...)]
 VALUES ({expr | DEFAULT},...),(...),...
 [ ON DUPLICATE KEY UPDATE col_name=expr, ... ]
 
 Or:
 
 INSERT [LOW_PRIORITY | DELAYED | HIGH_PRIORITY] [IGNORE]
 [INTO] tbl_name
 SET col_name={expr | DEFAULT}, ...
 [ ON DUPLICATE KEY UPDATE col_name=expr, ... ]
 
 Or:
 
 INSERT [LOW_PRIORITY | HIGH_PRIORITY] [IGNORE]
 [INTO] tbl_name [(col_name,...)]
 SELECT ...
 [ ON DUPLICATE KEY UPDATE col_name=expr, ... ]
 
 
 
 UPDATE [LOW_PRIORITY] [IGNORE] tbl_name
 SET col_name1=expr1 [, col_name2=expr2 ...]
 [WHERE where_condition]
 [ORDER BY ...]
 [LIMIT row_count]
 
 Or:
 
 UPDATE [LOW_PRIORITY] [IGNORE] table_references
 SET col_name1=expr1 [, col_name2=expr2 ...]
 [WHERE where_condition]
 
 
 
 REPLACE [LOW_PRIORITY | DELAYED]
 [INTO] tbl_name [(col_name,...)]
 VALUES ({expr | DEFAULT},...),(...),...
 
 Or:
 
 REPLACE [LOW_PRIORITY | DELAYED]
 [INTO] tbl_name
 SET col_name={expr | DEFAULT}, ...
 
 Or:
 
 REPLACE [LOW_PRIORITY | DELAYED]
 [INTO] tbl_name [(col_name,...)]
 SELECT ...
 
 
 
 DELETE [LOW_PRIORITY] [QUICK] [IGNORE] FROM tbl_name
 [WHERE where_condition]
 [ORDER BY ...]
 [LIMIT row_count]
 
 
 DELETE [LOW_PRIORITY] [QUICK] [IGNORE]
 tbl_name[.*] [, tbl_name[.*]] ...
 FROM table_references
 [WHERE where_condition]
 
 Or:
 
 DELETE [LOW_PRIORITY] [QUICK] [IGNORE]
 FROM tbl_name[.*] [, tbl_name[.*]] ...
 USING table_references
 [WHERE where_condition]
 
 
 TRUNCATE [TABLE] tbl_name
 
{DESCRIBE | DESC} tbl_name [col_name | wild]
 
 SELECT
 [ALL | DISTINCT | DISTINCTROW ]
 [HIGH_PRIORITY]
 [STRAIGHT_JOIN]
 [SQL_SMALL_RESULT] [SQL_BIG_RESULT] [SQL_BUFFER_RESULT]
 [SQL_CACHE | SQL_NO_CACHE] [SQL_CALC_FOUND_ROWS]
 select_expr, ...
 [FROM table_references
 [WHERE where_condition]
 [GROUP BY {col_name | expr | position}
 [ASC | DESC], ... [WITH ROLLUP]]
 [HAVING where_condition]
 [ORDER BY {col_name | expr | position}
 [ASC | DESC], ...]
 [LIMIT {[offset,] row_count | row_count OFFSET offset}]
 [PROCEDURE procedure_name(argument_list)]
 [INTO OUTFILE 'file_name' export_options
 | INTO DUMPFILE 'file_name'
 | INTO @var_name [, @var_name]]
 [FOR UPDATE | LOCK IN SHARE MODE]]
 
 
  GRANT priv_type [(column_list)] [, priv_type [(column_list)]] ...
 ON {tbl_name | * | *.* | db_name.*}
 TO user [IDENTIFIED BY [PASSWORD] 'password']
 [, user [IDENTIFIED BY [PASSWORD] 'password']] ...
 [REQUIRE
 NONE |
 [{SSL| X509}]
 [CIPHER 'cipher' [AND]]
 [ISSUER 'issuer' [AND]]
 [SUBJECT 'subject']]
 [WITH with_option [with_option] ...]
 
 with_option =
 GRANT OPTION
 | MAX_QUERIES_PER_HOUR count
 | MAX_UPDATES_PER_HOUR count
 | MAX_CONNECTIONS_PER_HOUR count
 
 
 REVOKE priv_type [(column_list)] [, priv_type [(column_list)]] ...
 ON {tbl_name | * | *.* | db_name.*}
 FROM user [, user] ...
 
 REVOKE ALL PRIVILEGES, GRANT OPTION FROM user [, user] ... 
 
 
 
 ANALYZE TABLE tbl_name
 BACKUP TABLE tbl_name
 CHECK TABLE tbl_name
 CHECKSUM TABLE tbl_name
 OPTIMIZE TABLE tbl_name
 REPAIR TABLE tbl_name
 RESTORE TABLE tbl_name
 
 
 SHOW [FULL] COLUMNS FROM tbl_name [FROM db_name] [LIKE 'pattern']
 SHOW CREATE DATABASE db_name
 SHOW CREATE TABLE tbl_name
 SHOW DATABASES [LIKE 'pattern']
 SHOW ENGINE engine_name {LOGS | STATUS }
 SHOW [STORAGE] ENGINES
 SHOW ERRORS [LIMIT [offset,] row_count]
 SHOW GRANTS FOR user
 SHOW INDEX FROM tbl_name [FROM db_name]
 SHOW INNODB STATUS
 SHOW [BDB] LOGS
 SHOW PRIVILEGES
 SHOW [FULL] PROCESSLIST
 SHOW [GLOBAL | SESSION] STATUS [LIKE 'pattern']
 SHOW TABLE STATUS [FROM db_name] [LIKE 'pattern']
 SHOW [OPEN] TABLES [FROM db_name] [LIKE 'pattern']
 SHOW [GLOBAL | SESSION] VARIABLES [LIKE 'pattern']
 SHOW WARNINGS [LIMIT [offset,] row_count]
 
 
 SHOW BINARY LOGS
 SHOW BINLOG EVENTS
 SHOW MASTER STATUS
 SHOW SLAVE HOSTS
 SHOW SLAVE STATUS
 
 HELP 'functions'

 
 ALTER [IGNORE] TABLE tbl_name
 alter_specification [, alter_specification] ...
 
 alter_specification:
 table_option ...
 | ADD [COLUMN] column_definition [FIRST | AFTER col_name ]
 | ADD [COLUMN] (column_definition,...)
 | ADD {INDEX|KEY} [index_name] [index_type] (index_col_name,...)
 | ADD [CONSTRAINT [symbol]]
 PRIMARY KEY [index_type] (index_col_name,...)
 | ADD [CONSTRAINT [symbol]]
 UNIQUE [INDEX|KEY] [index_name] [index_type] (index_col_name,...)
 | ADD [FULLTEXT|SPATIAL] [INDEX|KEY] [index_name] (index_col_name,...)
 | ADD [CONSTRAINT [symbol]]
 FOREIGN KEY [index_name] (index_col_name,...)
 [reference_definition]
 | ALTER [COLUMN] col_name {SET DEFAULT literal | DROP DEFAULT}
 | CHANGE [COLUMN] old_col_name column_definition
 [FIRST|AFTER col_name]
 | MODIFY [COLUMN] column_definition [FIRST | AFTER col_name]
 | DROP [COLUMN] col_name
 | DROP PRIMARY KEY
 | DROP {INDEX|KEY} index_name
 | DROP FOREIGN KEY fk_symbol
 | DISABLE KEYS
 | ENABLE KEYS
 | RENAME [TO] new_tbl_name
 | ORDER BY col_name [, col_name] ...
 | CONVERT TO CHARACTER SET charset_name [COLLATE collation_name]
 | [DEFAULT] CHARACTER SET charset_name [COLLATE collation_name]
 | DISCARD TABLESPACE
 | IMPORT TABLESPACE
 
 index_col_name:
 col_name [(length)] [ASC | DESC]
 
 index_type:
 USING {BTREE | HASH}
 
 
 
 CREATE [UNIQUE|FULLTEXT|SPATIAL] INDEX index_name
 [index_type]
 ON tbl_name (index_col_name,...)
 
 index_col_name:
 col_name [(length)] [ASC | DESC]
 
 index_type:
 USING {BTREE | HASH}
 
 
 
 ALTER DATABASE [db_name]
 alter_specification [alter_specification] ...
 
 alter_specification:
 [DEFAULT] CHARACTER SET charset_name
 | [DEFAULT] COLLATE collation_name
 
 
 
 CREATE DATABASE [IF NOT EXISTS] db_name
 [create_specification [create_specification] ...]
 
 create_specification:
 [DEFAULT] CHARACTER SET charset_name
 | [DEFAULT] COLLATE collation_name  
 
 
 
 DROP DATABASE [IF EXISTS] db_name
 DROP INDEX index_name ON tbl_name
 
 
 RENAME TABLE tbl_name TO new_tbl_name
 [, tbl_name2 TO new_tbl_name2] ...
 
 
 
 LOAD DATA [LOW_PRIORITY | CONCURRENT] [LOCAL] INFILE 'file_name'
 [REPLACE | IGNORE]
 INTO TABLE tbl_name
 [FIELDS
 [TERMINATED BY 'string']
 [[OPTIONALLY] ENCLOSED BY 'char']
 [ESCAPED BY 'char']
 ]
 [LINES
 [STARTING BY 'string']
 [TERMINATED BY 'string']
 ]
 [IGNORE number LINES]
 [(col_name,...)]
 
 USE db_name
 
 
 
 
 
 
