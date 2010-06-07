<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */

class Destination extends Controller {
	
	public $facebook;

	function Destination()
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
	
	function index($name)
	{
		//redirect('welcome');
		$a = new Account();
		$is_wish = 0;
		$is_visited = 0;
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
					$userpic = base_url()."/images/profile/".$usr->photo;
					if($usr->fb_uis!="")
					{
						$userpic = "https://graph.facebook.com/".$usr->fb_uis."/picture";
					}
					$preCom = "<img src = '".$userpic."' align='left'><i>".$usr->name." says </i>";
					if($numComments)
					{
						$commentsStr=$commentsStr.",";
					}
					$numComments++;
					$commentsStr = $commentsStr."\"".$preCom.$comment->comment."\"";
					//$data['comments'][] = $comment->comment;
					//$data['comments_uid'][] = $comment->user_id;
				}
				if(!$numComments)
				{
					$commentsStr = $commentsStr."\"Be the first to comment.\"";
					$numComments = 1;
				}
				$commentsStr=$commentsStr."]";
				$data['commentsStr'] = $commentsStr;
				$data['commentsNum'] = $numComments;
				if($a->isLogin())
				{
					$r = mysql_query("SELECT COUNT(*) FROM wishes WHERE campaign_id = ".$c->id." AND user_id = ".$a->id);
					$total = mysql_fetch_array($r);
					$is_wish = $total[0];
					$r1 = mysql_query("SELECT COUNT(*) FROM visiteds WHERE campaign_id = ".$c->id." AND user_id = ".$a->id);
					$total1 = mysql_fetch_array($r1);
					$is_visited = $total1[0];
				}
			}
		}
		$data['a'] = $a;
		$session = $this->facebook->getSession();
		$me = null;
		$data['fb_connect'] = $this->facebook->getLoginUrl();
		
		/*
		 * get related campaigns
		 */
		$campaigns_array = $this->__get_related($c->categoryid);
		$size = $campaigns_array->count();
		$curr=0;
		foreach($campaigns_array->all as $campaign)
		{
			if($curr <= $size/2)
			{
				$cArr1[$curr] = $campaign;
			}
			else
			{
				$cArr2[$curr] = $campaign;
			}
			$curr++;
		}
		if(isset($cArr1))
			$data['carr1'] = $cArr1;
		if(isset($cArr2))
			$data['carr2'] = $cArr2;
		$data['currUrl'] = site_url('destination/index/'.$name);
		$data['cleanUrl'] = $data['currUrl'];
		$data['cleanUrl'] = str_replace("/","%2F",$data['cleanUrl']);
		$data['cleanUrl'] = str_replace(":","%3A",$data['cleanUrl']);
		$data['is_wish'] = $is_wish;
		$data['is_visited'] = $is_visited;
		$_SESSION['url'] = $data['currUrl'];
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
	
	function addWish()
	{
		$w = new Wishe();
		$w->user_id = $this->input->post("user_id");
		$w->campaign_id = $this->input->post("campaign_id");
		$w->save();
		echo "1";
	}
	
	function addVisited()
	{
		$v = new Visited();
		$v->user_id = $this->input->post("user_id");
		$v->campaign_id = $this->input->post("campaign_id");
		$v->save();
		echo "1";
	}
	
	function addToVisit()
	{
		$t = new Tovisit();
		$t->user_id = $this->input->post("user_id");
		$t->campaign_id = $this->input->post("campaign_id");
		$t->save();
		echo "1";
	}
	
	function __get_related($categoryid)
	{
		$c = new Campaign();
		$sql = "SELECT * FROM campaigns WHERE categoryid = ? ORDER BY RAND() LIMIT ?";
		$binds = array($categoryid, 12);
		$c->query($sql, $binds);
		return $c;
	}
	
	function explore()
	{
		if(isset($_SESSION['url']))
		{
			redirect($_SESSION['url']);
		}
		else
		{
			$r = mysql_query("select * from campaigns order by rand() limit 1");
			$row = mysql_fetch_array($r);
			redirect('destination/index/'.$row['nickname']);
		}
	}
}

/* End of file destination.php */
/* Location: ./system/application/controllers/destination.php */
