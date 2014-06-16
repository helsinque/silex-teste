<?Php
namespace Core\Utils;

interface CrudModelInterface
{

	/**
     *
     * @return array[quotemeta( )]
     */
	public function loadCreateFormInfo();
}