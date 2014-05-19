<?Php


namespace Bpms\Teste\Tests\Entity;

use \Bpms\Teste\Entity\UsuariosEntity;

class UsuariosTest extends \PHPUnit_Framework_TestCase
{
	 public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($class = 'Bpms\Teste\Entity\UsuariosEntity'),
                'Class not found: '.$class
        );
    }

     public function testInstantiationWithoutArgumentsShouldWork()
    {
        $instance = new UsuariosEntity();
        $this->assertInstanceOf('\Bpms\Teste\Entity\UsuariosEntity', $instance);
    }

    /**
     * @depends testInstantiationWithoutArgumentsShouldWork
     */
    public function testSetTitleWithValidDataShouldWork()
    {
        $instance = new UsuariosEntity();
        $nome = 'Nome do cara';
        $return = $instance->setNome($nome);
        $this->assertEquals($instance, $return, 'Returned value should be the same instance for fluent interface');
        $this->assertAttributeEquals($nome, 'nome', $instance, 'Attribute was not correctly set');
    }


}