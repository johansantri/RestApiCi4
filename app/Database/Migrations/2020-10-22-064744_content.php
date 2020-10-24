<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Content extends Migration
{
	public function up()
	{
		$this->forge->add_field(array(
			'blog_id' => array(
					'type' => 'INT',
					'constraint' => 5,
					'unsigned' => TRUE,
					'auto_increment' => TRUE
			),
			'blog_title' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
			),
			'blog_description' => array(
					'type' => 'TEXT',
					'null' => TRUE,
			),
	));
	$this->forge->add_key('blog_id', TRUE);
	$this->forge->create_table('content');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		 $this->forge->drop_table('content');
	}
}
