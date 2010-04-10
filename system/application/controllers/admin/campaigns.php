<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Campaigns extends Controller {
	
	var $pswd = "Ani123";
	var $salt = "xyczgry";

	function Campaigns()
	{
		parent::Controller();	
		session_start();
	}
	
	function index()
	{
		$this->load->view('admin/campaigns/home');
	}
	
	function add()
	{
		if(!$this->checkLogin())
		{
			redirect('admin/campaigns/login');
		} 
		$c = new Campaign();
		$isErr = 0;
		$error = "";
		echo "POST: ";
		print_r($this->input->post());
		
		echo "<font color='red'>".$error."</font>";
		$this->load->view('admin/campaigns/add');
	}
	
	function edit()
	{
		
	}
	
	function showall()
	{
		if(!$this->checkLogin())
		{
			redirect('admin/campaigns/login');
		} 
		$cs = new Campaign();
		$cs->get();
		foreach($cs->all as $c)
		{
			echo $c->name;
		}
	}
	
	function login()
	{
		if($this->input->post('issend'))
		{
			$_SESSION['passad'] = md5($this->input->post('password').$this->salt);
			
			if($this->checkLogin())
				redirect('admin/campaigns');
		}
		$this->load->view('admin/login');
	}
	
	function checkLogin()
	{
		if(isset($_SESSION['passad']))
		{
			if($_SESSION['passad']==md5($this->pswd.$this->salt))
				return true;
		}
		return false;
	}
}

/* End of file campaigns.php */
/* Location: ./system/application/controllers/admin/campaigns.php */
