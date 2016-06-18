<?php
class Administration extends MY_Controller
{
	
    public function __construct ()
    {
        parent::__construct();
		if ($this->ion_auth->logged_in() == TRUE && $this->ion_auth->is_admin()) {
        	// an admin user has logged in..
		}else{
			redirect('users/login');
		}
    }

    public function index(){
    	$this->home_view('admin/admin');
    }
	
    // fetch all ingredients
    public function getIngrdients()
    {
        echo site_url('assets/images/ingredients');
    
	}
    
    public function addIngrdients()
    {
    	$this->load->model('ingredient_model');
    	// first of all get all ingredients in the DB
    	$this->data['ingredients'] = $this->ingredient_model->op_ingredient(true);
		
		$this->form_validation->set_rules($this->ingredient_model->validation);
		
		if ($this->form_validation->run() == true){
			// form validated
			$ins = array(
		    	'friendly_name' => $this->input->post('friendly_name'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				);
				
			if($id = $this->ingredient_model->op_ingredient($ins)){
				self::do_upload($id);
			}
		}else{
			// failed validation return form errors..
		}
		
		$this->home_view('admin/ingredients');
    }
    
    public function deleteIngredient($id)
    {
    	if(!is_int($id) && $id<=0){
    		$this->data['error'] = "invalid ingredient to delete";
			return;
    	}
		$this->load->model('ingredient_model');
    	if(!$this->ingredient_model->del_ingredient($id)){
    		$this->data['error'] = "Could not delete ingredient";
    	}
        redirect('administration/addIngrdients');
    }
	
	// admin add soup
	public function addSoup(){
		$this->load->model('soup_model');
		// first of all get all soups in the DB
    	$this->data['soups'] = $this->soup_model->op_soup(true);
		
		$this->form_validation->set_rules($this->soup_model->validation);
		
		if ($this->form_validation->run() == true){
			// form validated
			$ins = array(
				'name' => $this->input->post('soup_name'),
				'price' => $this->input->post('price'),
				'description' => $this->input->post('description'),
				);
				
			if($id = $this->soup_model->op_soup($ins)){
				self::do_upload($id, 2);
			}
		}else{
			// failed validation return form errors..
		}
		
		$this->home_view('admin/soup');
	}
    
    private function do_upload($id, $what=1)
	{
		if ($what==1){
			$config['upload_path'] = './assets/images/ingredients/';
			$config['max_size']	= '200';
		}else{
			$config['upload_path'] = './assets/images/soups/';
			$config['max_size']	= '500';
		}
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['file_name'] = $id;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			// error to send to view
			$this->data['upload_error'] = array('error' => $this->upload->display_errors());
			return false;
			
		}
		else
		{
			// data to send to view, contains success message
			$this->data['upload_success'] = array('upload_data' => $this->upload->data());
			return true;
			//$this->load->view('upload_success', $data);
		}
	}
    
}