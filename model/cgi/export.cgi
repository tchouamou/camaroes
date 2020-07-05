
-- Generated : @_date_time_@;
-- Version TSTM: 2.0;
-- Version MySQL: 4.0.24;
-- Version PHP: 4.3.10-16;


			Database:@_database_@;



			 Privileges:@_db_privileges_@;
			 Caracter set:@_db_caracter_set_@;
			 Collation:@_db_collation_@;
			 Type:@_db_type_@;
			 Date_time:@_date_time_@;




%_foreach_table_%

	Table:@_table_@;



	 Comment:@_table_comment_@;
	 Index:@_table_index_@;
	 Primary:@_table_primary_@;
	 Type:@_table_type_@;
	 Collation:@_table_collation_@;
	 Privilege:@_table_privilege_@;
	 Date_time:@_table_date_time_@;




%_foreach_column_%	@_column_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_type_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_collation_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_privileges_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_null_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_default_@;	%%_foreach_column_%%;
%_foreach_column_%	@_column_extra_@;	%%_foreach_column_%%;

%_foreach_rown_%
 %_foreach_cols_in_rown_%	@_rown_@;	%%_foreach_cols_in_rown_%%;
%%_foreach_rown_%%



%%_foreach_table_%%




	Views:




	Procedures:





	Users:
