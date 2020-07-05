<!--
-- Generated : @_date_time_@;
-- Version TSTM: 2.0;
-- Version MySQL: 4.0.24;
-- Version PHP: 4.3.10-16;
-->
<?xml version="1.0" encoding="ISO-8859-1"?>
<database>
<@_database_@>
	<tables>
	%_foreach_table_%
	    <@_table_@>
			%_foreach_column_%
				<@_column_@>
				<rows>
				%_foreach_rown_%
					<@_rown_id_@>
						@_rown_@
					</@_rown_id_@>
				%%_foreach_rown_%%
				</rows>

					<type>
						@_column_type_@
					</type>

					<collation>
						@_column_collation_@
					</collation>

					<attribut>
						@_column_privileges_@
					</attribut>


					<null>
						@_column_null_@
					</null>

					<default>
						@_column_default_@
					</default>

					<extra>
						@_column_extra_@
					</extra>

				</@_column_@>
			%%_foreach_column_%%
				<comment>
					@_table_comment_@
				</comment>

				<index>
					@_table_index_@
				</index>

				<primary>
					@_table_primary_@
				</primary>


				<privileges>
					@_table_privilege_@
				</privileges>

				<type>
					@_table_type_@
				</type>

				<collation>
					@_table_collation_@
				</collation>

				<date_time>
					@_table_date_time_@
				</date_time>
	    </@_table_@>
	%%_foreach_table_%%
</tables>

<views>
</views>

<procedures>
</procedures>

<privileges>
 @_db_privileges_@
</privileges>

<caracter_set>
 @_db_caracter_set_@
</caracter_set>

<collation>
 @_db_collation_@
</collation>

<type>
 @_db_type_@
</type>

<date_time>
 @_db_date_time_@
</date_time>


</@_database_@>

</database>
