<?php
class Migration_Create_soup extends CI_Migration
{

    public function up ()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'mediumint',
                'constraint' => 8,
                'unsigned' => TRUE, 
                'auto_increment' => TRUE,),
             'name' => array(
                'type' => 'VARCHAR',
				'constraint' => 250,), 
            'price' => array(
                'type' => 'DECIMAL', 
                'constraint' => '10,2',
				'null' => FALSE),
			'description' => array(
                'type' => 'text', 
				'null' => TRUE),
            )
        );
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('soups');
    }

    public function down ()
    {
        $this->dbforge->drop_table('soups');
    }
}