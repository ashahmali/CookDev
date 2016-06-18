<?php

/**
 * check out controller
 */
class Checkout extends MY_Controller {
	
	private $soup;
	private $ingredients;
	private $total_amount = 0;
	
	
	public function __construct ()
    {
    	parent::__construct();
		$this->load->model('ingredient_model');
		$this->load->model('soup_model');
		if(!$this->session->userdata('soup') && !$this->session->userdata('items')){
			echo "lolz";
		}else{
			$this->soup = $this->session->userdata('soup');
			$this->ingredients = $this->session->userdata('items');
		}
	}
	
	public function index()
	{
		$this->data['soup'] = $this->soup_model->op_soup(intval($this->soup->id));
		$this->total_amount += floatval($this->data['soup']->price);
		
		foreach ($this->ingredients as $item) {
			$ing = $this->ingredient_model->op_ingredient(intval($item->id));
			$this->data['ingredients'][] = $ing;
			$this->total_amount += floatval($ing->price);
		}
		//echo $this->total_amount;
		$this->home_view('checkout');
	}
}

