
-- Generato il: @_date_time_@
-- Versione TSTM: 2.0
-- Versione MySQL: 4.0.24
-- Versione PHP: 4.3.10-16
--
-- Database: `@_database_@`

-- --------------------------------------------------------
-- CREATE DATABASE IF EXISTS `@_database_@`;
-- CREATE DATABASE IF NOT EXISTS `@_database_@`;


-- --------------------------------------------------------

-- Privileges:@_db_privileges_@;
-- Caracter set:@_db_caracter_set_@;
-- Collation:@_db_collation_@;
-- Type:@_db_type_@;
-- Date_time:@_date_time_@;
-- --------------------------------------------------------



@_show_create_db_@;


%_foreach_table_%
-- --------------------------------------------------------


@_show_create_table_@;


-- --------------------------------------------------------
-- CREATE TABLE IF NOT EXISTS `@_table_@` (
%_foreach_column_%
--   `@_column_@` @_column_type_@  @_column_null_@  @_column_auto_increment_@  DEFAULT '@_column_default_@',
%%_foreach_column_%%
--   PRIMARY KEY  (`@_table_primary_@`),
--   UNIQUE KEY `@_column_unique_@` (`@_column_unique_@`)
-- ) TYPE=@_table_type_@
--  AUTO_INCREMENT=@_column_increment_val_@ ;
-- --------------------------------------------------------


-- --------------------------------------------------------
%_foreach_rown_%
INSERT INTO `@_table_name_@` VALUES (%_foreach_cols_in_rown_% '@_rown_@', %%_foreach_cols_in_rown_%%);
%%_foreach_rown_%%;
-- --------------------------------------------------------



%%_foreach_table_%%
-- --------------------------------------------------------


-- --------------------------------------------------------

--	Views:;
--	Procedures:;
--	Users:;
-- --------------------------------------------------------
-- ALTER TABLE `@_table_name_@` CHANGE `@_column1_@` `@_column2_@` TEXT NULL DEFAULT NULL ;
-- ALTER TABLE `@_table_name_@` ADD `@_column1_@` VARCHAR(254)  NULL  DEFAULT NULL AFTER `@_column2_@` ;
-- --------------------------------------------------------
-- %___foreach_column_% @_column_@; %%_foreach_column_%%;
-- %___foreach_column_% @_column_type_@; %%_foreach_column_%%;
-- %___foreach_column_% @_column_collation_@; %%_foreach_column_%%;
-- %___foreach_column_% @_column_privileges_@; %%_foreach_column_%%;
-- %___foreach_column_% @_column_null_@;%%_foreach_column_%%;
-- %___foreach_column_% @_column_default_@; %%_foreach_column_%%;
-- %___foreach_column_% @_column_extra_@; %%_foreach_column_%%;
-- --------------------------------------------------------
-- --------------------------------------------------------
-- Comment:@_table_comment_@;
-- Index:@_table_index_@;
-- Primary:@_table_primary_@;
-- Type:@_table_type_@;
-- Collation:@_table_collation_@;
-- Privilege:@_table_privilege_@;
-- Date_time:@_table_date_time_@;
