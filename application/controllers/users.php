<?php
class Users extends MY_Controller
{

    public function __construct ()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function logout ()
    {
        $this->ion_auth->logout();
		$this->session->sess_destroy();
        redirect('users/login');
    }
	
	public function index ()
    {
        if ($this->ion_auth->logged_in() == TRUE) {
        	$this->home_view('home');
		}else{
			redirect('users/login');
		}
    }
	
	/**
	 * display user's account
	 */
	 public function my_account($edit=false){
	 	if($edit){
	 		
	 	}else{
	 		if ($address = $this->user_model->add_address('register_address', '', $this->data['user_id'])){
	 			$this->data['address'] = $address;
			}else{
				dump_exit($address);
			}
			
	 		$this->home_view('users/my_account', $this->data);
	 	}
	 }

    /**
     * Login a user and redirect him to questions
     */
    public function login ()
    {
        // redirect if already logged in
        if ($this->ion_auth->logged_in() == TRUE) {
            redirect('users');
        }
        
        // Validate the form
        $this->form_validation->set_rules($this->user_model->validation);
        if ($this->form_validation->run() == true) {
            
            // Try to log in
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password'), $this->input->post('remember_me')) == TRUE) {
                 redirect('users');
            }
            else {
                $this->data['error'] = 'We could not log you in';
            }
        }
        
        // Set subview & Load layout
        $this->home_view('users/login');
    }

    public function register()
    {
    	if ($this->ion_auth->logged_in() == TRUE) {
            // already logged in - redirect to current page
        }
		
		// Validate the form
			$this->form_validation->set_rules($this->user_model->reg_validation);
			if ($this->form_validation->run() == true){
				$additional_data = array('first_name'=>$this->input->post('first_name'), 'last_name'=>$this->input->post('last_name'), 'phone'=>$this->input->post('phone'));
				if ($id = $this->ion_auth->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'), $additional_data)){
					$this->data['message'] = "An activation email has been sent to ". $this->input->post('email');
				}else{
					$this->data['error'] = $this->ion_auth->errors();
				}
			}		

		 // Set subview & Load layout
         $this->home_view('users/register');
         }

		//activate the user
	function activate($id, $code=false)
	{
		$this->form_validation->set_rules($this->user_model->address_validation);
		
		if ($this->form_validation->run() == true) {
			
			$add_data = array(
					'user_id' => $id,
					'address1' => $this->input->post('address1'),
					'address2' => $this->input->post('address2'),
					'address3' => $this->input->post('address3'),
					'postcode' => $this->input->post('postcode'),
					'city' => $this->input->post('city')
					);
					
				if ($code !== false)
				{
					// TODO load the address from here
					$activation = $this->ion_auth->activate($id, $code);
				}
				else if ($this->ion_auth->is_admin())
				{
					$activation = $this->ion_auth->activate($id);
				}
		
				if ($activation)
				{
					//redirect them to the auth page
					$this->session->set_flashdata('message' , $this->ion_auth->messages());
						//todo
						$id = $this->user_model->add_address('register_address', $add_data);
						if($id){
						// user has been completely registered
							//echo "Registered with: ".$id;
						}
						redirect("users", 'refresh');
				}
				else
				{
					//redirect them to the forgot password page
					$this->session->set_flashdata('message', $this->ion_auth->errors());
					//redirect("users/forgot_password", 'refresh');
				}
		}else{
			// user did not provide a valid address.
			$this->home_view('users/add_address', $this->data);
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		$id = $this->config->item('use_mongodb', 'ion_auth') ? (string) $id : (int) $id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|alpha_numeric');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->load->view('user/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{				
					show_error('This form post did not pass our security checks.');
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('users', 'refresh');
		}
	}
		
	
	
	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', 'Old password', 'required');
		$this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('users/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{ 
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
			);
			$this->data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->load->view('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{ 
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('users/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
			);

			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->home_view('users/forgot_password', $this->data);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten)
			{ 
				//if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				// TODO
				redirect("users/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("users/forgot_password", 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{  
			//if the code is valid then display the password reset form

			$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

			if ($this->form_validation->run() == false)
			{
				//display the form

				//set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');

				//$this->data['csrf'] = $this->_get_csrf_nonce();
				
				$this->data['code'] = $code;

				//render
				$this->home_view('users/reset_password', $this->data);
			}
			else
			{
				// do we have a valid request?
				/*
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id')) 
								{
				
									//something fishy might be up
									$this->ion_auth->clear_forgotten_password_code($code);
				
									show_error('This form post did not pass our security checks.');
				
								} */
				
				//if{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new_password'));

					if ($change)
					{ 
						//if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->logout();
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('users/reset_password/' . $code, 'refresh');
					}
				//}
			}
		}
		else
		{ 
			//if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("users/forgot_password", 'refresh');
		}
	}
	


}
