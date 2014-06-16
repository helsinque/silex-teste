<?Php

namespace Core\Departments\DataMapper;

use \Doctrine\DBAL\Connection;
use \Core\Departments\Entitys\DepartmentEntity;

class DepartmentDataMapper
{
	private $db;

	function __construct( Connection $db)
	{
		$this->db = $db;
	}


	public function loadById($idDepartamento)
	{
		$stmt = $this->db->prepare("SELECT 
								    D.*
								  FROM 
								    Departamentos D 
								  WHERE
									idDepartamento = :idDepartamento");

		$stmt->bindValue("idDepartamento",$idDepartamento);
		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_CLASS , 'DepartmentEntity');
		if(!$department = $stmt->fetch()){
			throw new \Exception('Departamento não encontrado');
		}
		return $department;
	}

	public function getAll()
	{
		$stmt = $this->db->prepare("SELECT 
								    D.*
								  FROM 
								    Departamentos D");

		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_CLASS , 'DepartmentEntity');
		return $stmt->fetchAll();
	}

}