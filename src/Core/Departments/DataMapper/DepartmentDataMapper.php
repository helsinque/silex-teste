<?Php

namespace Core\Departments\DataMapper;

use Symfony\Component\HttpFoundation\Request;

use \Doctrine\DBAL\Connection;
use \Core\Departments\Entitys\DepartmentEntity;

class DepartmentDataMapper
{
	private $db;

	function __construct( Connection $db)
	{
		$this->db = $db;
	}

	function insert(UserEntity $entity)
	{
		$array = $entity->convertToArray();
		unset($array['nomeDepartamento']);
		//		var_dump($array);

		$this->insertTableArray('Departamentos',$array);
		/*
		$stmt = $this->db->prepare("SELECT 
								   M.nomeMenu,
								   M.nomeModulo,
								   M.defaultPath
							  FROM Permissoes P 
						INNER JOIN Menu M
								ON M.idMenu = P.idMenu
							 WHERE P.idPermissaoTipo = '1'
							   AND P.idPermissaoTipo = :idDepartamento
							   AND M.idMenuPai = :idMenuPai");
		$stmt->bindValue("idDepartamento",$idDepartamento);
		$stmt->bindValue("idMenuPai",$menuItem);
		$stmt->execute();
		$childrens = $stmt->fetchAll();
		return $childrens;
		*/
	}
	function update(UserEntity $entity, $id)
	{
		$array = $entity->convertToArray();
		unset($array['idDepartamento']);
		
		if ($array['idDepartamento'] == '') {
			unset($array['idDepartamento']);
		}
		$this->updateTableById('Departamentos', $array , array('idDepartamento' => $id));

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
		//print_r($stmt->fetchAll());die;
		return $stmt->fetchAll();
	}

	public function getAllWithFilters(Request $request)
	{
		$querys = array();
		$values = array();

		if($request->get('departamento')){
			$querys[] = " AND D.nomeDepartamento LIKE :nomeDepartamento ";
			$values[] = array('alias'=>'nomeDepartamento','value' => "%".$request->get('departamento')."%");
		}
		if($request->get('codigo')){
			$querys[] = " AND D.idDepartamento = :codigo ";
			$values[] = array('alias'=>'IdDepartamento','value' => "%".$request->get('IdDepartamento')."%");
		}
		$sql = "SELECT 
				    D.*
				  FROM 
				    Departamentos D
				  WHERE 1=1";
		foreach($querys as $value){
			$sql .= $value;
		}

		$stmt = $this->db->prepare($sql);

		foreach($values as $paramsToBind){
			$stmt->bindValue($paramsToBind['alias'],$paramsToBind['value']);
		}

		$stmt->execute();
		$stmt->setFetchMode(\PDO::FETCH_CLASS , 'DepartmentEntity');
		//print_r($stmt->fetchAll());die;
		return $stmt->fetchAll();
	}

}