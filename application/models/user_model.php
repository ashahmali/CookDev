<?php
class User_model extends MY_Model
{
    
    protected $has_many = array(
        'questions', 
        'answers');
	// validation for the login form
    public $validation = array(
        array(
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'required|valid_email|trim'), 
        array(
            'field' => 'password', 
            'label' => 'Password', 
            'rules' => 'required|trim'));
	// validation constraint for registration form		
	public $reg_validation = array(
		array(
            'field' => 'username', 
            'label' => 'Username', 
            'rules' => 'required|trim'), 
        array(
            'field' => 'email', 
            'label' => 'Email', 
            'rules' => 'required|valid_email|trim'), 
        array(
            'field' => 'password', 
            'label' => 'Password 1', 
            'rules' => 'required|trim|min_length[8]'),     
		array(
            'field' => 'password2', 
            'label' => 'Password 2', 
            'rules' => 'required|trim|matches[password]'),
        array(
            'field' => 'first_name', 
            'label' => 'First Name', 
            'rules' => 'required|trim'),
        array(
            'field' => 'last_name', 
            'label' => 'Last Name', 
            'rules' => 'required|trim'),
       array(
            'field' => 'company', 
            'label' => 'Company', 
            'rules' => 'trim'), 
       array(
            'field' => 'phone', 
            'label' => 'Phone Number', 
            'rules' => 'required|trim'),   
			
			);
		
		// validation constraint for registration form		
	public $address_validation = array(
        array(
            'field' => 'address1', 
            'label' => 'Address 1', 
            'rules' => 'required|trim'), 
        array(
            'field' => 'address2', 
            'label' => 'Address 2', 
            'rules' => 'trim'),
        array(
            'field' => 'address3', 
            'label' => 'Address 3', 
            'rules' => 'trim'),
        array(
            'field' => 'postcode', 
            'label' => 'Postcode', 
            'rules' => 'required|trim'),
		array(
            'field' => 'city', 
            'label' => 'City', 
            'rules' => 'required|trim'),   
            );

    public function __construct ()
    {
        parent::__construct();
        $this->_database = $this->db;
    }
	
	public function add_address($table, $data=array(), $id=0)
	{
		$this->_table = $table;
		if($id > 0){
			return $this->get_by('user_id', (int)$id);
		}else{
			return($id = $this->insert($data))?$id:false;
		}
	}
}