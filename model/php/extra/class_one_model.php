class @_db_name_@{

%_foreach_table_%
public $@_table_@='';
%%_foreach_table_%%

function @_db_name_@(){
}

function control($var){
return $var;
}

%_foreach_table_%

function get_@_table_@($var_@_table_@){
$@_table_@=control($var_@_table_@);
return $@_table_@;
}
function set_@_table_@($var_@_table_@){
$var_@_table_@=control($@_table_@);
return $var_@_table_@;
}
%%_foreach_table_%%



@_class_gen_@


}
