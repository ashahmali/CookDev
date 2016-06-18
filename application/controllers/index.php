<?php
class Index extends MY_Controller {

    public function __construct(){
        parent::__construct();
    }
    
    public function index ()
    {
    	$this->load->model('ingredient_model');
		$this->load->model('soup_model');
		// first of all get all ingredients in the DB
    	$this->data['ingredients'] = $this->ingredient_model->op_ingredient(true);
		$this->data['soups'] = $this->soup_model->op_soup(true);
        $this->home_view('home');
    }

}