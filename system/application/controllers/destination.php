<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Destination extends Controller {

	function Destination()
	{
		parent::Controller();	
	}
	
	function index($name)
	{
		if($name!="")
		{
			$c = new Campaign();
			$c->where('nickname',$name)->get();
			if($c->id > 0)
			{
				$data['name'] = $c->name;
				$data['description'] = $c->description;
				$data['photo'] = $c->photo;
				$data['countryid'] = $c->countryid;
				$data['categoryid'] = $c->categoryid;
				$data['isInfo'] = $c->isInfo;
				print_r($data);
				echo "test";
			}
		}
		//$this->load->view('fullbackgroundtest');
	}
}

/* End of file destination.php */
/* Location: ./system/application/controllers/destination.php */