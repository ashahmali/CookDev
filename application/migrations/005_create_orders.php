<?php
class Migration_Create_orders extends CI_Migration
{

    public function up ()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE, 
                'auto_increment' => TRUE,),
            'item_id' => array(
            	'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE,
                ),
            'user_id' => array(
            	'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE,
                ),
            )
        );
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('orders');
		
		 $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE, 
                'auto_increment' => TRUE,),
            'user_id' => array(
                'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE,
				),
            'soup_id' => array(
            	'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE,
                ),
            'spice_level' => array(
            	'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => FALSE,
                ),
            )
        );
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('order_details');
    }

    public function down ()
    {
        $this->dbforge->drop_table('orders');
    }
}