<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Destination extends Controller {

	function Destination()
	{
		parent::Controller();
		session_start();
	}
	
	function index($name)
	{
		$a = new Account();
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
				
				/*
				 * get comments for the campaign
				 */
				$com = new Comment();
				$com->where('campaign_id', $c->id)->get();
				//$comments = new ArrayObject();
				$commentsStr = "[";
				$numComments=0;
				foreach($com->all as $comment)
				{
					$usr = new Account;
					$usr->where('id', $comment->user_id)->get();
					$preCom = "<img src = '".base_url()."/images/profile/".$usr->photo."' align='left'><i>".$usr->name." says </i>";
					if($flag)
					{
						$commentsStr=$commentsStr.",";
					}
					$numComments++;
					$commentsStr = $commentsStr."\"".$preCom.$comment->comment."\"";
					//$data['comments'][] = $comment->comment;
					//$data['comments_uid'][] = $comment->user_id;
				}
				if(!$numComments)
					$commentsStr = $commentsStr."Be the first to comment.";
				$commentsStr=$commentsStr."]";
				$data['commentsStr'] = $commentsStr;
				$data['commentsNum'] = $numComments;
			}
		}
		$data['a'] = $a;
		$_SESSION['url'] = site_url('destination/index/'.$name);
		$this->load->view('destination', $data);
	}
	
	function addComment()
	{
		$c = new Comment();
		$c->comment = xss_clean($this->input->post("comment"));
		$c->campaign_id = $this->input->post("campaign_id");
		$c->user_id = $this->input->post('user_id');
		$c->save();
		echo "1";
	}
}

/* End of file destination.php */
/* Location: ./system/application/controllers/destination.php */
