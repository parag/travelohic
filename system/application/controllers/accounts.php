<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */
 
 class Accounts extends Controller {
 	function Accounts()
	{
		parent::Controller();
		session_start();
	}
	
	function register()
	{
		$a = new Account();
		$e = "";
		if($this->input->post('issend'))
		{
			$a->name = xss_clean($this->input->post('name'));
			$a->email = $this->input->post('email');
			$a->password = $this->input->post('password');
			$a->verify_password = $this->input->post('verify_password');
			$a->url = $this->input->post('url');
			$a->mobile = $this->input->post('mobile');
			$a->country_id = $this->input->post('country_id');
			$a->photo = "default.jpeg";
			$a->save();
			foreach ($a->error->all as $err) 
			{
                $e = $e."<p>".$err."</p>";
            }
            if ($e == "") 
			{
				$e="Succesfully registered. Please check back your email to complete verification.";
				$this->_register_confirm_ask($a->email, $a->salt);
				/*
				 * upload image
				 */
				$config['upload_path'] = './uploads/tmp';
				$uploadPath = './images/profile/';
				$config['allowed_types'] = 'png|jpg|jpeg|gif';
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
					echo $config1['new_image']; 
					$this->load->library('image_lib', $config1);
					$this->image_lib->resize();
					$this->image_lib->clear();
					$isErr = 0;
					$a->photo =md5($a->id).$tmpImage['image_type'];
					$a->save();
					foreach ($a->error->all as $err)
					{
					    $e = $e."<p>".$err."</p>";
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
		$a = new Account();
		if(!$a->isLogin())
		{
			die();
		}
		$e="";
		if($this->input->post('issend'))
		{
			$a->name = $this->input->post('name');
			$a->url = $this->input->post('url');
			$a->mobile = $this->input->post('mobile');
			$a->save();
			foreach($a->error->all as $err)
			{
				$e = $e."<p>".$err."</p>";
			}
		}
		$data['e'] = $e;
		$data['a'] = $a;
		$this->load->view('account/editprofile',$data);
	}
	
	function updatephoto()
	{
		$a = new Account();
		if(!$a->isLogin())
		{
			die();
		}
		$e="";
		if($this->input->post('issend'))
		{
			$config['upload_path'] = './uploads/tmp';
			$uploadPath = './images/profile/';
			$config['allowed_types'] = 'png|jpg|jpeg|gif';
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
				$config1['width'] = '60';
				$config1['height'] = '60';
				$config1['new_image'] = $uploadPath.md5($a->id).'.'.$tmpImage['image_type'];
				$this->load->library('image_lib', $config1);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$isErr = 0;
				$a->photo =md5($a->id).".".$tmpImage['image_type'];
				$a->save();
				foreach ($a->error->all as $err)
				{
				    $e = $e."<p>".$err."</p>";
					$isErr=1;
				}
				if($isErr=="0")
				{
					$e = $e."<p>Photo saved successfully</p>";
					if(isset($_SESSION['url']))
					{
						redirect($_SESSION['url']);
					}
				}
			}
        }
		$data['e'] = $e;
		$data['a'] = $a;
		$this->load->view('account/updatephoto',$data);
	}
	
	function changepassword()
	{
		$a = new Account();
		if(!$a->isLogin())
		{
			die();
		}
		$e="";
		if($this->input->post('issend'))
		{
			$a->password = $this->input->post('password');
			$a->verify_password = $this->input->post('verify_password');
			/*
			 * if_verified should be set 1 in all the cases
			 */
			$a->save();
			foreach($a->error->all as $err)
			{
				$e = $e."<p>".$err."</p>";
			}
		}
		$data['e'] = $e;
		$data['a'] = $a;
		$this->load->view('account/changepassword', $data);
	}
	
	function login()
	{
		$a = new Account();
		$e = "";
		if($this->input->post('issend'))
		{
			$a->email = $this->input->post('email');
			$a->password  =$this->input->post('password');
			if($a->loginif())
			{
				if(isset($_SESSION['url']))
				{
					redirect($_SESSION['url']);
				}
				$e = "Thank you for Logging in";
			}
			else
			{
				$e = "Error. You may not have completed all the registration steps. Try change password too.";
				foreach($a->error->all as $err)
				{
					$e = $e."<p>".$err."</p>";
				}
			}
		}
		$data['a'] = $a;
		$data['e'] = $e;
		$this->load->view('account/login',$data);
	}
	
	function logout()
	{
		$a = new Account();
		$a->logout();
		if(isset($_SESSION['url']))
		{
			redirect($_SESSION['url']);
		}
		else
		{
			echo "Successfully logout";
		}
	}
	
	function signup()
	{
		$a = new Account();
		$e = "";
		if($this->input->post('issend'))
		{
			$a->name = $this->input->post('name');
			$a->email = $this->input->post('email');
			$a->password = $this->input->post('password');
			$a->mobile = $this->input->post('mobile');
			$a->save();
			//$a->login();
			foreach ($a->error->all as $err) 
			{
                $e = $e."<p>".$err."</p>";
				
			}
			if($e=="")
			{
				$this->_register_confirm_ask($a->email, $a->salt);
				if(isset($_SESSION['url']))
				{
					redirect($_SESSION['url']);
				}
				$e = "Please check your email to complete registration process";
			}
		}
		$data['e'] = $e;
		$this->load->view('account/signup',$data);
	}
	
	function forgot_password()
	{
		$a = new Account();
		$e = "";
		if($this->input->post('issend'))
		{
			$email = $this->input->post('email');
			$a->where('email',$email)->get();
			if($a->exists())
			{
				$url = site_url('accounts/password_request/'.$a->email.'/'.$a->salt);
				$subject = "Change Password Request";
				$message = "Hello ".$a->name."\n";
				$message = $message."Click the link below to change your password\n\n";
				$message = $message.$url."\n\n";
				$message = $message."Thanks\nTeam Travelohic\n";
				$this->_user_email($a->email, $subject, $message);
				$e = "Please check your email to complete process of changin your password";
			}
			else
			{
				$e = "This email id does not exist";
			}
		}
		$data['e'] = $e;
		$this->load->view('account/forgot_password',$data);
	}
	
	function verify_account($email, $salt)
	{
		$a = new Account();
		$a->where('email',$email)->get();
		if($a->salt==$salt)
		{
			$a->is_verified = "1";
			$a->save();
			$a->login();
		}
		redirect(base_url());
	}
	
	function password_request($email, $salt)
	{
		$a = new Account();
		$a->where('email',$email)->get();
		if($a->salt==$salt)
		{
			$a->is_verified = "1";
			$a->save();
			$a->login();
		}
		redirect('accounts/changepassword');
	}
	
	function _register_confirm_ask($email, $salt)
	{
		$subject = "Your last step for registration";
		$message = "Hello,\n
					Please click on the link below to do email verification \n\n";
		$message = $message.site_url('accounts/verify_account/'.$email.'/'.$salt);
		$message = $message."\n\n";
		$message = $message."We take immense pride in having you our esteemed account holder\n";
		$message = $message."Your next step will be to comment and share to keep growing the community\n\n";
		$message = $message."Thanks\nTravelohic Team";
		$this->_user_email($email, $subject, $message);
	}
	
	function _user_email($to, $subject, $message)
	{
		$this->load->library('email');

		$this->email->from('no-reply@travelohic.com', 'Travelohic');
		$this->email->to($to);
		
		$this->email->subject($subject);
		$this->email->message($message);
		
		$this->email->send();
	}
	
	function fb_register($name, $email, $fb_uis, $fb_dob)
	{
		$a = new Account();
		$a->where('fb_uis',$fb_uis)->get();
		if($a->exists())
		{
			$a->login();
		}
		else
		{
			$a->name = $name;
			$a->email = $email;
			$a->fb_uis = $fb_uis;
			$a->fb_dob = $fb_dob;
			$a->password = md5(uniqid(rand(), true));
			$a->salt = md5(uniqid(rand(), true));
			$a->save();
			$a->login();
		}
		
		if(isset($_SESSION['url']))
		{
			redirect($_SESSION['url']);
		}
		else
		{
			redirect(base_url());
		}
	}
 }
