<?php
/*
 * @author parag (paragarora.com)
 * © 2009-10 Travelohic
 */
 
 class Account extends Datamapper {
 	var $validation = array(
		array(
			'field' => 'email',
			'label' => 'Email Address',
			'rules' => array('required','trim','valid_email', 'unique'),
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => array('required','trim','unique','min_length'=>6,'encrypt'),
		),
		array(
			'field' => 'verify_password',
			'label' => 'Verify Password',
			'rules' => array('encrypt', 'matches'=>'password'),
		),
		array(
			'field' => 'name',
			'label' => 'Full Name',
			'rules' => array('required', 'min_length'=>3, 'max_length'=>30),
		),
		array(
			'field' => 'mobile',
			'label' => 'Mobile',
			'rules' => array('required', 'numeric', 'min_length'=>3, 'max_length'=>15, 'unique'),
		)
	);
	
	function Account() 
	{
		parent::Datamapper();
	}
	
	function loginif()   
	{
        // Create a temporary Account object
        $u = new Account();

        // Get this Accounts stored record via their email
        $u->where('email', $this->email)->get();
        // Give this Account their stored salt
        $this->salt = $u->salt;

        // Validate and get this Account by their property values,
        // this will see the 'encrypt' validation run, encrypting the password with the salt
        $this->validate()->get();
        // If the Accountname and encrypted password matched a record in the database,
        // this Account object would be fully populated, complete with their ID.

        // If there was no matching record, this Account would be completely cleared so their id would be empty.
        if (empty($this->id))
        {
            return FALSE;
        }
        else
        {
        	$this->login();
            // Login succeeded
            return TRUE;
        }
    }
	
	function login()
	{
		$_SESSION['email'] = $this->email;
		$_SESSION['key'] = $this->salt;
		$_SESSION['logged_in'] = 1;
		// set the domain also with cookie
		setcookie("email", $this->email, time()+60*60*24*30);
		setcookie("key", $this->salt, time()+60*60*24*30);
	}
	
	function logout()
	{
		$_SESSION['email'] = "";
		$_SESSION['key'] = "";
		session_destroy();
	}
	
	function isLogin()
	{
		//CodeIgniter sessions not working
		if(isset($_SESSION['email']))
		{
			$email = $_SESSION['email'];
    		// Get this Accounts stored record via their email
    		$this->where('email', $email)->get();
			$salt = $_SESSION['key'];
			if($salt == $this->salt)
			{
				return true;
			}
			else return false;
		}
		return false;
	}
	
	// Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    function _encrypt($field) 
	{
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = sha1($this->salt . $this->{$field});
			
        }
    }
	
 }
