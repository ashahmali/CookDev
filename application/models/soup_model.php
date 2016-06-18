<?php
class Soup_model extends MY_Model
{
    
	// validation for the login form
    public $validation = array(
        array(
            'field' => 'soup_name', 
            'label' => 'Soup Name', 
            'rules' => 'trim'), 
		array(
            'field' => 'price', 
            'label' => 'Price', 
            'rules' => 'required|trim'));
			//TODO check validation for deicmal
	
    public function __construct ()
    {
        parent::__construct();
        $this->_database = $this->db;
		$this->_table = "soups";
    }
	
	public function op_soup($data)
	{
		if(is_int($data) && $data > 0){
			return $this->get_by('id', (int)$data);
		}else if(is_array($data) && count($data)>1){
			return($id = $this->insert($data))?$id:false;
		}else if(is_bool($data) && $data == true){
			return $this->get_all();
		}else{
			return false;
		}
	}
}