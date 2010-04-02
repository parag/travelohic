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
				$data['campaign_id'] = $c->id;
				$data['name'] = $c->name;
				$data['description'] = $c->description;
				$data['photo'] = $c->photo;
				$data['countryid'] = $c->countryid;
				$data['categoryid'] = $c->categoryid;
				$data['isInfo'] = $c->isInfo;
				$data['title'] = $c->name;
			}
		}
		$this->load->view('destination', $data);
	}
	
	function addComment()
	{
		$c = new Comment();
		$c->comment = $this->input->post("comment");
		$c->campaign_id = $this->input->post("campaign_id");
		$c->user_id = $this->input->post('user_id');
		$c->save();
		echo "q";
	}
}

/* End of file destination.php */
/* Location: ./system/application/controllers/destination.php */