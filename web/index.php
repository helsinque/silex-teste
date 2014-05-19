<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;

$app = new Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => array(
        'teste' => array(
          'driver'   => 'pdo_sqlsrv',
          'path'     => __DIR__.'/app.db',
          'host'      => 'localhost',
          'dbname'    => 'teste',
          'user'      => 'sa',
          'password'  => 'senha123',
          'charset'   => 'utf8',
        ),
        'core' => array(
          'driver'   => 'pdo_sqlsrv',
          'path'     => __DIR__.'/app.db',
          'host'      => 'localhost',
          'dbname'    => 'COB_core',
          'user'      => 'sa',
          'password'  => 'senha123',
          'charset'   => 'utf8',
        ),
        'drive' => array(
          'driver'   => 'pdo_sqlsrv',
          'path'     => __DIR__.'/app.db',
          'host'      => 'localhost',
          'dbname'    => 'COB_cobway',
          'user'      => 'sa',
          'password'  => 'senha123',
          'charset'   => 'utf8',
        ),
        'bpms' => array(
          'driver'   => 'pdo_sqlsrv',
          'path'     => __DIR__.'/app.db',
          'host'      => 'localhost',
          'dbname'    => 'COB_bpms',
          'user'      => 'sa',
          'password'  => 'senha123',
          'charset'   => 'utf8',
        ),
    ),
));
/*
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
    'admin' => array(
        'pattern' => '^/',
        'http' => true,
        'users' => $app->share(function () use ($app) {
            return new Bpms\Login\Controller\UserProvider($app['dbs']);
        }),
        ),
    )
));
*/
//Alterar este método horrivÊ&nbsp;!
/*
$request = new Request;

$app->get('/{module}/{controller}/{action}', function ($module, $controller, $action ) use ( $app , $request ){
  $className = 'Bpms\\'.$module.'\\Controller\\'.$controller.'Controller';

  try{
     $newController = new $className($app,$request);
   }catch (Excetption $e){
     echo 'Erro ao chamar o controller';
   }
  //  $controller = new
  return 'asé';
});

$app->get( '/Sequencia/Os/Consulta/{idOs}',  function ($idOs) use ( $app , $request ){

       $newController = new Bpms\Sequencia\Controller\OsController( $app['dbs'] );

       $return = $newController->consultaOs($idOs);
       return $app->json( $return );

} );
*/
$app['debug'] = true;
//Funciona com o TESTECONSTROLLER
$app->get( '/', function (Application $app, Request $bar) {
    $class = new Bpms\Teste\Controller\TesteController($app, $bar);
    $resp = $class->getResponse();
         //  return $resp;
           return $app->json( $resp );
});







//$app->mount('/', new Bpms\Teste\Controller\TesteControllerMount());
$app->run();
