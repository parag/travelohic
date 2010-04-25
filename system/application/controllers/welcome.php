<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$t = new Account();
		$t->query("SELECT * FROM accounts");
		print_r($t->count());die();
		$this->load->view('fullbackgroundtest');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */