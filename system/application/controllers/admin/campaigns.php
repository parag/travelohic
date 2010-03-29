<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelomate
 */

class Campaigns extends Controller {

	function Campaigns()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('admin/campaigns');
	}
	
	function add()
	{
		$c = new Campaign();
		if($this->input->post('category'))
		{
			$c->name = $this->input->post('name');
			$c->description = $this->input->post('comment');
		}
		echo xss_clean("He has");
		//$this->load->view('admin/campaigns/add');
	}
	
	function edit()
	{
		
	}
	
	function showall()
	{
		
	}
}

/* End of file campaigns.php */
/* Location: ./system/application/controllers/admin/campaigns.php */