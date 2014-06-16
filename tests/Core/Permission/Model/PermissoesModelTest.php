<?Php

namespace Core\Permission\Model;

use \Core\Permission\DataMapper\PermissoesMapper;
use \Core\Permission\Entity\PermissoesEntity;

class PermissoesModelTest extends \PHPUnit_Framework_TestCase
{
	/**
     * @var \Silex\Application $app
     */ 
    protected $app;

    function setUp()
    {
        parent::setUp();
        $this->app = createApplication();
    }

    public function assertPreConditions()
    {
        $this->assertTrue(
                class_exists($class = '\Core\Permission\Model\PermissoesModel'),
                'Class not found: '.$class
        );

        $this->assertInstanceOf('\Silex\Application', $this->app);
    }

    public function testInstantiationWithDoctrineShouldWork()
    {
        $instance = new PermissoesModel($this->app['dbs']['silex-teste']);
        $this->assertInstanceOf('\Core\Permission\Model\PermissoesModel', $instance);
    }
  

} 

