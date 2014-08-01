<?Php
namespace Core\Departments\Entitys;

class DepartmentEntity 
{
    private $idDepartamento;
    private $nomeDepartamento;
   
     public function convertToArray()
    {
        return get_object_vars($this);
    }
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