<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
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
		$isErr = 0;
		$error = "";
		if($this->input->post('savecampaign'))
		{
			$c->name = $this->input->post('name');
			$c->description = $this->input->post('comment');
			$c->countryid = $this->input->post('country');
			$c->categoryid = $this->input->post('category');
			$c->isInfo = $this->input->post('isinfo');
			
			/*
			 * upload image
			 */
			$config['upload_path'] = './uploads/tmp';
			$uploadPath = './images/bgs/';
			$config['allowed_types'] = 'png';
			$config['max_size']	= '2048';
			$config['max_width']  = '4056';
			$config['max_height']  = '3072';
			$name = strtolower(str_replace(" ","_",$c->name));
			$c->nickname = $name;
			$this->load->library('upload',$config);
			if ( ! $this->upload->do_upload())
			{	
				$error = $error.$this->upload->display_errors('<p>', '</p>');
			}
			else
			{
				$tmpImage = $this->upload->data();
					// setting the configuration parameters for image manipulations
				$config1['image_library'] = 'gd2';
				$config1['source_image'] = $tmpImage['full_path'];
				$config1['create_thumb'] = FALSE;
				$config1['maintain_ratio'] = TRUE;
				$config1['width'] = 1024;
				$config1['height'] = 800;
				$config1['new_image'] = $uploadPath.$name.'.'.$tmpImage['image_type'];
				$this->load->library('image_lib', $config1);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$c->photo = $name.'.'.$tmpImage['image_type'];
				$c->save();
				$isErr = 0;
				foreach ($c->error->all as $e)
				{
				    $error = $error.$e . "<br />";
					$isErr=1;
				}
				if($isErr=="0")
					$error = "Campaign saved successfully";
				
				/*
				 * @paragarora: saving tags now for the campaign page
				 */
				$tagstr = $this->input->post('tags');
				$tags = explode(" ", $tagstr);
				foreach($tags as $tag)
				{
					$t = new Tag();
					$t->name = $tag;
					$t->save($c);
				}
			}
		}
		echo "<font color='red'>".$error."</font>";
		$this->load->view('admin/campaigns/add');
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