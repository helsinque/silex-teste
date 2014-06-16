<?Php

namespace Core\Permission\Service;

use \Core\Permission\DataMapper\PermissoesMapper;
use \Core\Permission\Entity\PermissoesEntity;

class PermissoesServiceTest extends \PHPUnit_Framework_TestCase
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
                class_exists($class = '\Core\Permission\Service\PermissoesService'),
                'Class not found: '.$class
        );

        $this->assertInstanceOf('\Silex\Application', $this->app);
    }

    public function testInstantiationWithSilexShouldWork()
    {
        $instance = new PermissoesService($this->app);
        $this->assertInstanceOf('\Core\Permission\Service\PermissoesService', $instance);
    }
  

} 

