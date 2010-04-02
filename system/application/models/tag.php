<?php
/*
 * @author parag (paragarora.com)
 * © 2010-11 Travelohic
 */
 
 class Tag extends Datamapper
 {
 	var $has_many = array("campaign");
 	function Tag()
	{
		parent::Datamapper();
	}
 }
 ?>
