<?Php
namespace Core\Departments\Entitys;

class DepartmentEntity 
{
    private $idDepartamento;
    private $nomeDepartamento;
   
    
    public function getIdDepartamento() 
    {
        return $this->idDepartamento;
    }

    public function getNomeDepartamento() 
    {
        return $this->nomeDepartamento;
    }

    public function setNomeDepartamento($nomeDepartamento) 
    {
        $this->nomeDepartamento = $nomeDepartamento;
        return $this;
    }


}