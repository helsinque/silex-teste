<?Php
use Doctrine\ORM\EntityRepository;

namespace Bpms\Teste\Entity;
/** @Entity(repositoryClass="Bpms\Teste\Entity")
 *  @Table(name="users")
 */
class UserEntity extends EntityRepository
{
	private $nome;

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}
}