<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */
 
 class Accounts extends Controller {
 	function Accounts()
	{
		parent::Controller();
	}
	
	function register()
	{
		$a = new Account();
		$e = "";
		if($this->input->post('issend'))
		{
			$a->name = $this->input->post('name');
			$a->email = $this->input->post('email');
			$a->password = $this->input->post('password');
			$a->verify_password = $this->input->post('verify_password');
			$a->url = $this->input->post('url');
			$a->mobile = $this->input->post('mobile');
			$a->country_id = $this->input->post('country_id');
			$a->save();
			foreach ($a->error->all as $err) 
			{
                $e = $e.$err."<br />";
            }
            if ($e == "") 
			{
				$e="Succesfully registered. Please check back your email to complete verification.";
				/*
				 * upload image
				 */
				$config['upload_path'] = './uploads/tmp';
				$uploadPath = './images/profile';
				$config['allowed_types'] = 'png';
				$config['max_size']	= '2048';
				$config['max_width']  = '4056';
				$config['max_height']  = '3072';
				$this->load->library('upload',$config);
				if ( ! $this->upload->do_upload())
				{	
					$e = $e.$this->upload->display_errors('<p>', '</p>');
				}
				else
				{
					$tmpImage = $this->upload->data();
						// setting the configuration parameters for image manipulations
					$config1['image_library'] = 'gd2';
					$config1['source_image'] = $tmpImage['full_path'];
					$config1['create_thumb'] = FALSE;
					$config1['maintain_ratio'] = TRUE;
					$config1['width'] = 60;
					$config1['height'] = 60;
					$config1['new_image'] = $uploadPath.md5($a->id).'.'.$tmpImage['image_type'];
					$this->load->library('image_lib', $config1);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$isErr = 0;
					$a->photo = $config1['new_image'];
					$a->save();
					foreach ($a->error->all as $err)
					{
					    $e = $e."<p>".$err . "</p>";
						$isErr=1;
					}
					if($isErr=="0")
						$e = $e."<p>Photo saved successfully</p>";
				}
            }
		}
		$data['e'] = $e;
		$this->load->view('account/register',$data);
	}
	
	function editprofile()
	{
		$this->load->view('account/editprofile');
	}
	
	function updatephoto()
	{
		$this->load->view('account/updatephoto');
	}
	
	function changepassword()
	{
		$this->load->view('account/changepassword');
	}
 }