<?Php
namespace Core\Utils;
use Symfony\Component\HttpFoundation\Request;

interface CrudControllerInterface
{
	//public function __construct( Request $request, \Pimple $dbs );
	public function NewForm();
	public function ListTable();
}