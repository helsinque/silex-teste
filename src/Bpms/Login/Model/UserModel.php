<?Php
namespace Bpms\Login\Model{

use Symfony\Component\Security\Core\User\UserInterface;

class UserModel implements UserInterface{

    private $codFuncionario;
    private $nomeFuncionario;
    private $usuario;

    function __construct($codFuncionario, $nomeFuncionario, $usuario){
        $this->codFuncionario  = $codFuncionario;
        $this->nomeFuncionario = $nomeFuncionario;
        $this->usuario         = $usuario;

    }

}


}