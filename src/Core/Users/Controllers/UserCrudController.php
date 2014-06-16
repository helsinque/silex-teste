<?Php
namespace Core\Users\Controllers;

use Core\Utils\CrudControllerInterface;
use Core\Users\Models\UsersCrudModel;

class UserCrudController implements CrudControllerInterface
{
	private $app;

	function __construct($app)
	{
	  $this->app = $app;
	}



	public function NewForm()
	{
		
		$userModel = new UsersCrudModel($this->app['request'], $this->app['dbs']);	
		return $this->app['twig']->render('Core/Users/Views/createForm.html.twig', $userModel->loadCreateFormInfo() );
	}

	public function saveAction()
	{
		
		$userModel = new UsersCrudModel($this->app['request'], $this->app['dbs']);	
		return $this->app->json( $userModel->saveAction() );
	}

	public function ListTable()
	{
		if (!$user instanceof UserModel) {
			throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
		}

		return $this->loadUserByUsername($user->getUsername());
	}

	
}
