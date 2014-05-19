<?Php
namespace Bpms\Login\Controller{

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Doctrine\DBAL\Connection;
use Bpms\Login\Model as cv;


	class UserProvider implements UserProviderInterface
	{
		private $db;

		public function __construct($dbs)
		{

			$this->db =  $dbs;
		}

		public function loadUserByUsername($username)
		{
			$stmt = $this->db['core']->prepare('SELECT * FROM funcionarios WHERE usuario = :usuario');
            //$stmt = $this->db['bpms']->prepare($sql);
            $stmt->bindValue("usuario", $username);
            //$stmt->bindValue("senha", '50');
            $stmt->execute();
			if (!$user = $stmt->fetch()) {

				throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
			}
            $arr[0] ='ROLE_ADMIN';
            //return $arr;
			//return new cv\UserModel($user['cod_funcionario'], $user['nome'], $user['usuario']);
            return new User('ed','5FZ2Z8QIkA7UTZ4BYkoC+GsReLf569mSKDsfods6LYQ8t+a8EW9oaircfMpmaLbPBh4FOBiiFyLfuZmTSUwzZg==' , explode(',', 'ROLE_ADMIN'), true, true, true, true);
		}

		public function refreshUser(UserInterface $user)
		{
			if (!$user instanceof User) {
				throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
			}

			return $this->loadUserByUsername($user->getUsername());
		}

		public function supportsClass($class)
		{
			return $class === 'Symfony\Component\Security\Core\User\User';
		}
	}
}