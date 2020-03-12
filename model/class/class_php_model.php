<?php
/**
* <b>@_table_@</b> complete class definition.
/********************************************************************
 *        @_database_@.php
 *       -------------------
 * begin    : July 2005 - July 2007
 * copyright   : Camaroes Ver 2.0 (C) 2005-2007 T.E.H
 * www     : http://sourceforge.net/projects/camaroes/
 *
 **********************************************************************/ 
 
 
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

@_database_@.php,v 1.5  @_date_time_@
*/

/*
	This is the SQL query usefull for the create the table to store this object.

	CREATE TABLE `@_table_@` (
    £_foreach_column_£
	`@_column_@` @_column_type_@,
    ££_foreach_column_££
	PRIMARY KEY  (`@_column_id_@`));
*/



/**
* Information about
*
* Is used for keeping
*
* class @_table_@_class
*/

class @_table_@_class
{
    £_foreach_column_£
	/**
	 * @var @_column_type_@
	 */
	var $@_column_@;
    ££_foreach_column_££
	/**
	 * @var string
	 */
	var $sql_@_table_@_query="";
	/**
	 * @var string
	 */
	var $id_@_table_@;
	/**
	 * @var string
	 */
	var $where="1";
	/**
	 * @var string
	 */
	var $from="@_table1_@=";
	/**
	 * @var string
	 */
	var $order="@_column_id_@=";
	/**
	 * @var Int
	 */
	var $limit="1000";
	/**
	 * @var Boolean
	 */
	var $ascending=true;
	
    		
		
	
	function @_table_@(
    £_foreach_column_£
		$@_column_@='',
	££_foreach_column_££)
	)
	
	{
    £_foreach_column_£
		$this->@_column_@ = $@_column_@;
    ££_foreach_column_££
	}
	
	
	/**
	* Gets object from database
	* @param integer $@_column_id_@ 
	* @return object $@_table_@
	*/
	function get_pram($@_column_id_@)
	{
		$database = new dbms_connnection($crm->config,$cmr->language);
		$this->sql_@_table_@_query = "select * from `@_table_@` where `@_column_id_@`='".intval($@_column_id_@)."' LIMIT 1";
		
		$database->run_query($crm->config,$cmr->language,$this->sql_@_table_@_query);
		
    £_foreach_column_£
		$this->@_column_@ = $database->load_val('@_column_@');
    ££_foreach_column_££
		return $this;
	}
	
	
	/**
	* Returns a sorted array of objects that match given conditions
	* @param string $where 
	* @param string $order 
	* @param boolean $ascending 
	* @param int $limit 
	* @return array $@_table_@List
	*/
	
	function list_@_table_@()
	{
		return $@_table_@List;
	}
	
	function import_@_table_@($format="text", $@_column_id_@)
	{
		return $@_table_@import;
	}
	
	function export_@_table_@($format="text", $@_column_id_@)
	{
		return $@_table_@export;
	}
	
	function search_@_table_@()
	{
		return $@_table_@search;
	}
	
	
	/**
	* Saves the object to the database
	* @return integer $@_column_id_@
	*/
	function update_@_table_@()
	{
		$database = new dbms_connnection($crm->config,$cmr->language);
		$this->sql_@_table_@_query = "select id from `@_table_@` where `@_column_id_@`='".$this->@_column_id_@."' LIMIT 1";
		
		$database->run_query($crm->config,$cmr->language,$this->sql_@_table_@_query);
		
		$this->sql_@_table_@_query = "update `@_table_@` set 
    £_foreach_column_£
			`@_column_@`=\''.$database->escape_str($this->@_column_@).'\',
    ££_foreach_column_££";
    		
		$database->run_query($crm->config,$cmr->language,$this->sql_@_table_@_query);
		
		return $this->@_column_id_@;
	}
	
	
	/**
	* Clones the object and saves it to the database
	* @return integer $@_column_id_@
	*/
	function insert_@_table_@()
	{
		$this->@_column_id_@ = '';
		
		$database = new dbms_connnection($crm->config,$cmr->language);
			$this->sql_@_table_@_query = "insert into `@_table_@` (
    £_foreach_column_£
			`@_column_@`, 
    ££_foreach_column_££
			) values (
			
    £_foreach_column_£
			\''.$database->escape_str($this->@_column_@).'\', 
    ££_foreach_column_££
			 )";
		
	
		return $database->run_query($crm->config,$cmr->language,$this->sql_@_table_@_query);;
	}
	
	
	/**
	* Deletes the object from the database
	* @return boolean
	*/
	function delete_@_table_@()
	{
		$database = new dbms_connnection($crm->config,$cmr->language);
		$this->sql_@_table_@_query = "delete from `@_table_@` where `@_column_id_@`='".$this->@_column_id_@."'";
		return $database->run_query($crm->config,$cmr->language,$this->sql_@_table_@_query);
	}
}
?>