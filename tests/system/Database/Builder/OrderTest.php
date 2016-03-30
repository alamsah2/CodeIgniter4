<?php namespace Builder;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Database\MockConnection;

class OrderTest extends \CIUnitTestCase
{
	protected $db;

	//--------------------------------------------------------------------

	public function setUp()
	{
		$this->db = new MockConnection([]);
	}

	//--------------------------------------------------------------------

	public function testOrderAscending()
	{
		$builder = new BaseBuilder('user', $this->db);

		$builder->orderBy('name', 'asc');

		$expectedSQL   = "SELECT * FROM \"user\" ORDER BY \"name\" ASC";

		$this->assertEquals($expectedSQL, str_replace("\n", ' ', $builder->getCompiledSelect()));
	}

	//--------------------------------------------------------------------

	public function testOrderDescending()
	{
		$builder = new BaseBuilder('user', $this->db);

		$builder->orderBy('name', 'desc');

		$expectedSQL   = "SELECT * FROM \"user\" ORDER BY \"name\" DESC";

		$this->assertEquals($expectedSQL, str_replace("\n", ' ', $builder->getCompiledSelect()));
	}

	//--------------------------------------------------------------------

}
