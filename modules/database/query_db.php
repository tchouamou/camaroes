<?php
defined("cmr_online") or die("hacking attempt, application is not online, click <a href=\"index.php?cmr_mode=login\" > Here </a>  to login before continue ");
/**
 * query.php
 *         ---------
 * begin    : July 2004 - Febuary 2011
 * copyright   : Camaroes Ver 3.03 (C) 2011 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 */
// * @package cmr
// * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
// * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL,
// * This version may have been modified pursuant
// * to the GNU General Public License, and as distributed it includes or
// * is derivative of works licensed under the GNU General Public License or
// * other free or open source software licenses.
// */


// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
include_once("camaroes_class.php");
include_once("common_begin.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$cmr->config = $cmr->include_conf($cmr->get_path("module") . "modules/database/conf.d/conf_table.ini", $cmr->config, "var");
include_once($cmr->get_path("module") . "modules/database/function/func_table.php");
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($cmr->post_var["cmr_get_data"] == "get_data/get_" . $mod->base_name . ".php"){
include_once($cmr->get_path("index") . "system/loader/loader_get.php");
include_once($cmr->get_path("index") . "system/run_result.php");
}
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// open_finestra($cmr->config, $cmr->language, $mod->name, $mod->rown_position, $mod->col_position, "<img alt=\"=> \" src=\"".$cmr->get_path("image") ."images/pallino_blue.gif\">"." query");
$division = new class_windows($cmr->page, $cmr->module, $cmr->themes);


// $division->load_themes($cmr->themes);

// $division->module["name"]= $mod->name;




$division->module["title"] = $cmr->translate($mod->base_name); //" query";
// $division->module["text"] = "";


















print($division->show_noclose());
// =======================================================================
?>
<div id="query_div">
<table align="left" border="1">
<tr><td valign="top">
<?php
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_admin_type"))
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($database_conn)) $database_conn = NULL;
$database_conn = database_connect($cmr->db_connection, $database_conn, $cmr->db);
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "";
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_noc_type"))
print(cmr_menu_db($database_conn, "", $cmr->post_var["current_database"], $cmr->post_var["current_table"], $cmr->post_var["current_column"]));
?>
</td><td>


<td valign="top" width="100%">
<?php
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/databases.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/tables.php?conf_name=modules/database/conf.d/conf_table.ini&current_table=".$cmr->post_var["current_table"]."", 1);
$lk->add_link("modules/database/columns.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/query_db.php?conf_name=conf.d/conf_query.ini&current_table=".$cmr->post_var["current_table"]."", 1);
print($lk->open_module_tab(4));

// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
$lk = new class_module_link($cmr->config, $cmr->page, $cmr->language);
$lk->add_link("modules/database/login_db.php?current_table=" . $cmr->post_var["current_table"] ,1);
$lk->add_link("modules/database/export_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("export"));
$lk->add_link("modules/database/import_table.php?current_table=" . $cmr->post_var["current_table"] , "", $cmr->translate("import"));
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

print($lk->list_link());
// !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>
<p align="center">
<b>
<?php
if(!empty($cmr->action[$cmr->action["table_name"] . "_title1"]))
print($cmr->action[$cmr->action["table_name"] . "_title1"]);
?>
</b>
</p>
<p class="normal_text">
<?php
if(!empty($cmr->action[$cmr->action["table_name"] . "_title2"]))
print($cmr->action[$cmr->action["table_name"] . "_title2"]);
?>
</p>
<br />
<?php 
// =======================================================================
?>




<form action="index.php" method="post">
<?php print(input_hidden("<input type=\"hidden\" value=\"modules/database/get_data/get_query_db.php\" name=\"cmr_get_data\" />"));?>
<?php print(input_hidden("<input type=\"hidden\" value=\"" . __FILE__ . "\" name=\"middle1\" />"));?>
<table border="1"  align="center">



<?php print(show_hide("sql_query", "begin", 1));?>
<!--=======
<tr><td><-php echo $cmr->translate("Begin period:");-></td><td><input type="text" value="<-php echo date("Y-m-d H:i:s", $lastmonth);->" name="query_begin" id="query_begin" /></td><td><-php echo $cmr->translate(" End Period:");-></td><td><input type="text" value="<-php print(date("y-m-d h:m:s"));->" name="query_end" id="query_end" /></td></tr>
<!--=======-->-->


<!--=======-->
<tr><td><?php print($cmr->translate("column:"));?></td><td>
 	<?php print( cmrprint_select($cmr->get_conf('cmr_new_function'), 'func', '')); ?>
</td><td colspan="2">
<input type="text" value="*"  name="query_column" />
</td></tr>
<!--=======-->


<!--=======-->
<tr><td><?php print($cmr->translate("where:"));?></td><td>
<input type="text" value="*"  name="query_where_column" />
</td>

<td>
 	<?php print( cmrprint_select($cmr->get_conf('cmr_search_operator'), 'where_operator', '')); ?>
</td><td>
<input type="text" value="%%" name="query_where_value" />
</td></tr>
<!--=======-->


<!--=======-->
<tr><td><?php print($cmr->translate("group by:"));?></td>
<td>
<input type="text" value="*"  name="query_group_by_column" />
</td>


<td colspan="2">
<select name="query_group_by_order">
    <option value="ASC" selected><?php print($cmr->translate("asc"));?></option>
    <option value="DESC" selected><?php print($cmr->translate("desc"));?></option>
</select>

</td>
</tr>
<!--=======-->


<!--=======-->
<tr>
<td>
<?php print($cmr->translate("Having"));?>:
</td><td>

<input type="text" value="*"  name="query_having_column" />
</td><td>

	<?php print( cmrprint_select($cmr->get_conf('cmr_search_operator'), 'having_operator', '')); ?>
</td><td>
<input type="text" value="%%" name="query_having_value" />
</td></tr>

<!--=======-->


<!--=======-->


<tr><td><?php print($cmr->translate("order by:"));?></td>
<td>
<input type="text" value="*"  name="query_order_by_column" />
</td>


<td colspan="2">
<select name="query_order_by_order">
    <option value="ASC" selected><?php print($cmr->translate("asc"));?></option>
    <option value="DESC" selected><?php print($cmr->translate("desc"));?></option>
</select>



<tr><td><?php print($cmr->translate("limit:"));?></td>
<td>
<input type="text" value="0"  name="query_limit1" />
</td>


<td colspan="2">
<input type="text" value="<?php print($cmr->get_conf("cmr_max_view"));?>"  name="query_limit2" />
</td>
</tr>


<?php print(show_hide("sql_query", "end", 1));?>
<!--=======-->
</table>
<!--=======-->


<p align="center">
<select name="show" id="show" width="200" onchange="add_to_textarea('sql', 'show')">
<option>?</option>
<?php print($cmr->print_select($cmr->get_conf('cmr_table_prefix') . 'query', 'name', 'column', $cmr->config['db_name'], 'text', $cmr->config['cmr_max_view'], 'id', '35') );
// cmrprint_select();
?>
</select>
<br />

<?php
if(empty($cmr->post_var["current_table"])) $cmr->post_var["current_table"] = "cmr_user";
if(empty($cmr->post_var["current_database"])) $cmr->post_var["current_database"] = $cmr->get_conf("db_name");
if($cmr->user["authorisation"] >= $cmr->get_conf("cmr_soc_type")){
    print("<input type='radio' name='on' value='sql' id='sql_on' /><big>");
    print($cmr->translate('sql_query'));
    print("</big><br />");
    print("<textarea  onclick=\"radio_select('sql_on')\" name=\"sql\" id=\"sql\" cols=\"60\" rows=\"4\">");
//             case "show_index" : $sql_query = "SHOW INDEX FROM " . $db . $tabLE . "; "; 
//             case "analyse" : $sql_query = "SELECT FROM " . $db . $table . " PROCEDURE ANALYSE()";
//             case "repair" : $sql_query = "REPAIR TABLE " . $db . $table . ";";
//             case "check" : $sql_query = "CHECK TABLE " . $db . $table . ";";
//             case "lock" : $sql_query = "LOCK TABLE " . $db . $table . ";";
//             case "unlock" : $sql_query = "UNLOCK TABLE " . $db . $table . ";";
//             case "explain_select" : $sql_query = "EXPLAIN " . $select . ";";
//             case "optmize" : $sql_query = "OPTIMIZE " . $db . $table . ";";
//             case "drop_index" : $sql_query = "ALTER TABLE " . $db . $table . " DROP INDEX " . $index . "";
//             
//             case "show_create_table" : $sql_query = "SHOW CREATE TABLE " . $db . $table . ";";
//             case "create_table" : $sql_query = "CREATE TABLE" . $db . $table . ";";
//             case "create_view" : $sql_query = "CREATE TEMPORARY TABLE " . $db . $table . ";";
//             case "create_index" : $sql_query = "INDEX  " . $name . " ( " . $field . " , " . $field . "  )";
//             case "add_field" : $sql_query = "ALTER TABLE " . $db . $table . " ADD " . $field . " " . $type . ";";
//             case "add_key" : $sql_query = "ALTER TABLE " . $db . $table . " ADD PRIMARY KEY (" . $field . ", " . $field . ")";
//             case "add_unique" : $sql_query = "ALTER TABLE " . $db . $table . " ADD UNIQUE  " . $name . "_ (" . $field . ", " . $field . ");";
//             case "show_index" : $sql_query = "SHOW INDEX FROM " . $db . $tabLE . "; "; 
//             case "show_columns" : $sql_query = "SHOW FULL COLUMNS FROM " . $db . "." . $table . " " . $like . ";";
//             case "drop_table" : $sql_query = "DROP TABLE " . $table . " FROM " . $db . "";
//             case "analyse" : $sql_query = "SELECT FROM " . $db . $table . " PROCEDURE ANALYSE()";



//             case "repair" : $sql_query = "REPAIR TABLE " . $db . $table . ";";
//             case "check" : $sql_query = "CHECK TABLE " . $db . $table . ";";
//             case "lock" : $sql_query = "LOCK TABLE " . $db . $table . ";";
//             case "unlock" : $sql_query = "UNLOCK TABLE " . $db . $table . ";";
//             case "explain_select" : $sql_query = "EXPLAIN " . $select . ";";
//             case "optmize" : $sql_query = "OPTIMIZE " . $db . $table . ";";
//             case "drop_field" : $sql_query = "ALTER TABLE " . $db . $table . " DROP " . $field . ";";
//             case "rename_tables" : $sql_query = "ALTER TABLE " . $db . $table . " RENAME " . $name . ";";
//             case "add_index" : $sql_query = "ALTER TABLE " . $db . $table . " ADD INDEX " . $index . "";
//             case "select_file" : $sql_query = "SELECT " . $from . " FROM " . $db . $table . " INTO OUTFILE " . $file . " FIELD TERMINATE BY " . $separator . ";";
//             case "load_data" : $sql_query = "LAOD DATA LOCAL INFILE " . $file . " " . $option . " into table " . $db . $table . " FIELD TERMINATE BY " . $separator . ";";
//             case "grant" : $sql_query = "GRANT PRIVILEGE " . $privilege . " ON " . $db . $table . " TO " . $user . " " . $with . ";";
//             case "revoke" : $sql_query = "REVOKE PRIVILEGE " . $privilege . " ON " . $db . $table . " FROM " . $user . " " . $with . ";";
//             case "insert" : $sql_query = "INSERT INTO " . $db . $table . " VALUE (" . $data . ", " . $field . "),... ";
//             case "replace" : $sql_query = "REPLACE INTO " . $db . $table . " VALUE (" . $data . ", " . $field . "),... ";
//             case "update" : $sql_query = "UPDATE " . $low_severity . "  " . $db . $table . " SET  " . $field . " " . $new_field . " " . $new_type . " " . $where . ";";
//             case "delete" : $sql_query = "DETELE " . $low_severity . " FROM " . $db . $table . " WHERE " . $field . " " . $new_field . " " . $new_type . ";";
    print("select * from " . $cmr->post_var["current_database"] . "." . $cmr->post_var["current_table"] . " procedure analyse()");
    print("</textarea>");
}

?>
<br />
<input type="reset" onclick="return confirm('<?php print($cmr->translate("confirm that you want to empty this form"));?>')" />
<input class="submit" type="submit" value=<?php print("'" . $cmr->translate('go') . "'");
?> onclick="return confirm('<?php print($cmr->translate("confirm that you want to run this action"));?>')" />
</p>
</form>
<br />

</td></tr>
</table>
</div>

<?php 
print($lk->close_module_tab());
print($division->close());
?>
