<?Php
namespace Core\Departments\Controllers;

use Core\Utils\CrudControllerInterface;
use Core\Departments\Models\DepartmentsCrudModel;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class DepartmentsCrudController implements CrudControllerInterface
{
	private $app;

	function __construct($app)
	{
	  $this->app = $app;
	}

	public function NewForm()
	{
		
		$DepartmentsModel = new DepartmentsCrudModel($this->app['request'], $this->app['dbs']);	
		return $this->app['twig']->render('Core/Departments/Views/AddDepartments.twig', $DepartmentsModel->loadCreateFormInfo() );
	}

	public function ListTable()
	{
		//app.security.token.user.nomeUsuario
		$DepartmentsModel = new DepartmentsCrudModel($this->app['request'], $this->app['dbs']);	
		return $this->app['twig']->render('Core/Departments/Views/listForm.twig', array());
	
	}

	public function createList()
	{
		$DepartmentsModel = new DepartmentsCrudModel($this->app['request'], $this->app['dbs']);	
		return $this->app['twig']->render('Core/Departments/Views/createList.twig', $DepartmentsModel->loadListInfo() );
	
	}

	public function saveAction(){
		$DepartmentsModel = new DepartmentsCrudModel($this->app['request'], $this->app['dbs']);
		return $this->app['twig']->render('Core/Departments/Views/AddDepartments.twig', $DepartmentsModel->saveAction() );
	}

	
}
