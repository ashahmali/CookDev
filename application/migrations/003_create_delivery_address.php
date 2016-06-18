<?php
class Migration_Create_delivery_address extends CI_Migration
{

    public function up ()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE, 
                'auto_increment' => TRUE),
            'user_id' => array(
               'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE),
            'address1' => array(
                'type' => 'VARCHAR',
				'constraint' => 250), 
            'address2' => array(
                'type' => 'VARCHAR', 
                'constraint' => 250),
            'address3' => array(
                'type' => 'VARCHAR', 
                'constraint' => 250),
             'postcode' => array(
                'type' => 'VARCHAR', 
                'constraint' => 8),
             'city' => array(
                'type' => 'VARCHAR', 
                'constraint' => 250))
        );
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('delivery_address');
    }

    public function down ()
    {
        $this->dbforge->drop_table('delivery_address');
    }
}