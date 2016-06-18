<?php

use Netcarver\Textile;

class MY_Controller extends CI_Controller
{

    public $data = array();
    public $parser;
    
    function __construct ()
    {
        parent::__construct();
        
        // Check authentication
        $no_redirect = array(
            'users/login',
			'users/register',
			'users/add_address',
			'users/forgot_password',
			);
		$segment_no_redirect = array();	
			
        if ($this->ion_auth->logged_in() == false && 
        	!in_array(uri_string(), $no_redirect) && 
        	($this->uri->segment(2) !== "activate") &&
        	($this->uri->segment(2) !== "reset_password") && 
        	uri_string() !== "" &&
			($this->uri->segment(1) !== "order")) {
            redirect('users/login');
        }else{
        	if(isset($this->ion_auth->user()->row()->id))
        		$this->data['user_id'] = $this->ion_auth->user()->row()->id;
        }
        
        //$this->parser = new Textile\Parser();
        
        //$this->load->library('zf_cache', array('lifetime' => 900));
        //$this->zf_cache = $this->zf_cache->get_instance();
		
		
        
        //$this->output->enable_profiler(ENVIRONMENT == 'development');
    }

    /**
     * Set subview and load layout
     * @param string $subview
     */
    public function load_view ($subview)
    {
        $this->data['subview'] = $subview;
        $this->load->view('layouts/layout', $this->data);
    }
	
	public function home_view ($subview)
    {
        $this->data['subview'] = $subview;
        $this->load->view('homepage', $this->data);
    }
}