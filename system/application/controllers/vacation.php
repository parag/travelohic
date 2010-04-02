<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Vacation extends Controller {

	function Vacation()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('fullbackgroundtest');
	}
}

/* End of file vacation.php */
/* Location: ./system/application/controllers/vacation.php */