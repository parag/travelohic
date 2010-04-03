<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */
 
 class Accounts extends Controller {
 	function Accounts()
	{
		parent::Controller();
	}
	
	function register()
	{
		$a = new Account();
		$e = "";
		$data['e'] = $e;
		$this->load->view('account/register',$data);
	}
	
	function editprofile()
	{
		$this->load->view('account/editprofile');
	}
	
	function updatephoto()
	{
		$this->load->view('account/updatephoto');
	}
	
	function changepassword()
	{
		$this->load->view('account/changepassword');
	}
 }