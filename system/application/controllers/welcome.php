<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Welcome extends Controller {
	
	public $facebook;

	function Welcome()
	{
		parent::Controller();	
		
		//include Facebook library
		require_once APPPATH.'libraries/facebook.php';

		$this->facebook = new Facebook(array(
		  'appId'  => FBAPPID,
		  'secret' => FBAPPSECRET,
		  'cookie' => true,
		));
		
		session_start();
	}
	
	function index()
	{
		$t = new Account();
		$t->query("SELECT * FROM accounts");
		
		$data['title'] = "travelohic, for all your travel addictions.";
		$data['description'] = "travelohic is a social utility to explore cool places and get best deals in the market to visit them whenever they are available";
		$data['a'] = new Account();
		$data['fb_connect'] = $this->facebook->getLoginUrl();
		$this->load->view('welcome_message', $data);
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */