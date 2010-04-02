<?php
/*
 * @author parag (paragarora.com)
 * © 2010-11 Travelohic
 */
 
 class Campaign extends Datamapper
 {
 	var $has_many = array('tag');
 	var $validation = array(
		array(
			'field' => 'name',
			'label' => 'Campaign Name',
			'rules' => array('required','trim', 'unique'),
		),
		array(
			'field' => 'description',
			'label' => 'Campaign Description',
			'rules' => array('required','xss_clean'),
		)
	);
	
 	function Campaign()
	{
		parent::Datamapper();
	}
 }
?>
