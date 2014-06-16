<?Php

namespace Core\Utils\DataMapper;

abstract class AbstractDataMapper
{
	protected $db;
	protected function updateTableById($table, Array $array, Array $condicao){

		$this->db->update($table, $array, $condicao);
		//$this->db->getSQL();
	}
	protected function insertTableArray($table, Array $array){

		$this->db->insert($table, $array);
		//$this->db->getSQL();
	}
}