<?

namespace Bpms\Teste\Controller;

use Silex\Application;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManager;
use Silex\ControllerProviderInterface;

class TesteControllerMount implements ControllerProviderInterface
{
	private $app;
	private $request;

	function connect(Application $app)
	{
		$this->app = $app;
		$this->request = $request;
		return 'asd';
	}
	function getResponse(){
		return $this->request->query->all();
	}
	function Testa(Application $app, Request $request){
		echo 'asd';
	print_r($request);die;
	//$em = 
	$admins = $this->app['teste']->getRepository('Bpms\Teste\Entity\UserEntity')->setNome('asd');
		//criando a entidade

	$admins2 = $this->app['teste']->getRepository('Bpms\Teste\Entity\UserEntity');

	return $admins2->getNome();
		//$user = new Bpms\Teste\Entity\UserEntity();
	//	$user->setNome('Eduardo');

		//mandando o mapper salvar

		
	}
}