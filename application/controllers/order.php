<?php
class Order extends MY_Controller
{
	
    public function __construct ()
    {
        parent::__construct();
        $this->load->model('ingredient_model');
		if (!$this->input->is_ajax_request()) {
		  //show_404();
		}
		if ($this->ion_auth->logged_in() == TRUE && $this->ion_auth->is_admin()) {
        	// an admin user has logged in..
		}else{
			//redirect('users/login');
		}
		if(!$this->session->userdata('total_cost') || $this->session->userdata('total_cost')<0)
			$this->session->set_userdata('total_cost', number_format(0,2));
				
		if(!$this->session->userdata('items'))
		 	$this->session->set_userdata('items', array());
    }

    public function index(){
    	//$this->session->sess_destroy();
    	echo json_encode($this->session->all_userdata());
		
    	// echo "<pre>";
    	// print_r($this->session->all_userdata());
		// echo "</pre>";
		// return;
    	
    }
	
    // fetch all ingredients
    public function getIngrdients($id)
    {
    	$id=(int)$id;
    	if(!is_int($id)||!$id||$id<=0){
    		echo "invalid item";	
    	}
		if($item = $this->ingredient_model->op_ingredient($id)){
			if($this->session->userdata('total_cost')){
				$total_cost = $this->session->userdata('total_cost');
				//$item['total_cost'] = $total_cost + $item->price;
				$items = $this->session->userdata('items');
				$items[] = $item;
				$this->session->set_userdata('total_cost', number_format(($total_cost + $item->price),2));
				$this->session->set_userdata('items', $items);
			}else{
				$this->session->set_userdata('total_cost', number_format($item->price,2));
				$this->session->set_userdata('items', array($item));
			}
			echo json_encode(array('item'=>$item,'total_cost'=>$this->session->userdata('total_cost')));
		}else{
			echo "no item found";
		}
    
	}
    
    public function addIngrdients()
    {
    	// first of all get all ingredients in the DB
    	$this->data['ingredients'] = $this->ingredient_model->op_ingredient(true);
		
		$this->form_validation->set_rules($this->ingredient_model->validation);
		
		if ($this->form_validation->run() == true){
			// form validated
			$ins = array(
		    	'friendly_name' => $this->input->post('friendly_name'),
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				);
				
			if($id = $this->ingredient_model->op_ingredient($ins)){
				self::do_upload($id);
			}
		}else{
			// faile dvalidation return form errors..
		}
		
		$this->home_view('admin/ingredients');
    }
    
    public function removeIngrdient($id)
    {
    	$items = $this->session->userdata('items');
		$total_cost = $this->session->userdata('total_cost');
    	if($id == "soup"){
    		$soupToRemove = $this->session->userdata('soup');
			$total_cost = $total_cost - $soupToRemove->price;
			$this->session->unset_userdata('soup');
			$this->session->unset_userdata('items');
			$this->session->set_userdata('total_cost', number_format(0,2));
			echo number_format(0,2);
    		// mmeans user has asked to remove soup and have consented to loosing 
    		// all other ingredients
    		
			return;
    	}
    	$id = (int)$id;
		
		
		if(!$items || count($items)<1)
		 return;
		
		foreach ($items as $k => $item) {	
			if($id == $item->id){
				$duplicate = true;
				$total_cost = $total_cost - $item->price;
				if($total_cost<0)
					$total_cost = 0;
				unset($items[$k]);
				break;
			}
		}
		$this->session->set_userdata('total_cost', number_format($total_cost,2));
		$this->session->set_userdata('items', $items);
		echo number_format($total_cost,2);
       // $this->session->unset_userdata('items');
	   // $this->session->unset_userdata('total_cost'); 
    }

	public function loadSoup($id){
		$id=(int)$id;
    	if(!is_int($id)||!$id||$id<=0){
    		echo "invalid item";	
    	}
		$this->load->model('soup_model');
		if($soup = $this->soup_model->op_soup($id)){
			$totalCost = 0.00;
			if($this->session->userdata('soup')){
				// means they have selecetd a soup before
				// get the soup price
				// subtract it from the total
				$totalCost = $this->session->userdata('total_cost') - $this->session->userdata('soup')->price;
				if(is_null($totalCost)||$totalCost<0)
					$totalCost=number_format(0,2);
				
			}
			// overwrite the soup session
			$this->session->set_userdata('soup', $soup);
			// add to the total price.
			$totalCost = number_format($totalCost+$soup->price,2);
			$this->session->set_userdata('total_cost', $totalCost);
			echo json_encode($soup);
		}
		
	}

}