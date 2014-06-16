<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Silex\Provider\TranslationServiceProvider;
use Silex\Application;

$app = new Application();

require_once dirname(__DIR__).'/src/config.php';
require_once dirname(__DIR__).'/src/services.php';

if ($app['debug'] == false) {
    $app->error(function (\Exception $e, $code) {
        switch ($code) {
            case 404:
                $message = 'The requested page could not be found.';
                break;
            case 403:
                $message = 'You dont have permission to access this method';
                break;
            default:
                $message = 'We are sorry, but something went terribly wrong.';
        }

        return new Response($message);
    });
}

$app->get( '/', function () use ($app) {
    return new Response($app['twig']->render('bpms/Index/views/index.html.twig', array()));
})->bind('index');


$app->get('/login', function(Request $request) use ($app) {
    return $app['twig']->render('Core/Login/Views/login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
    ));
});

$app->get('/logout', function () use ($app){
  $app['session']->clear();
  return $app->redirect($app['url_generator']->generate('index'));
})->bind('logout');

$app->get('/users/crud/new', function () use ($app){
  $class = new Core\Users\Controllers\UserCrudController($app);
  return $class->NewForm();
})->bind('users.new');

$app->post('/users/crud/save', function () use ($app){
  $class = new Core\Users\Controllers\UserCrudController($app);
  return $class->saveAction();
})->bind('users.save');



/*


$app->get('/{module}/{controller}/{action}', function ($module, $controller, $action ) use ( $app ){
    $className = 'Bpms\\'.$module.'\\Controller\\'.$controller.'Controller';
     $newController = new $className($app);
   }catch (Excetption $e){
     echo 'Erro ao chamar o controller';
   }
  //  $controller = new
  return 'asé';
});
$app->get( '/users', function () use ($app) {
    if ($app['crud.permission']->hasCreatePermissionForModule('index'))
       return new Response($app['twig']->render('index.html.twig', array()));
       //return $app['twig']->render('index.html.twig');
    else
        return 'Voce não tem permissão para acessar esta funcionalidade';
})->bind('users');

$app->get( '/departments', function () use ($app) {
    if ($app['crud.permission']->hasCreatePermissionForModule('index'))
       return new Response($app['twig']->render('index.html.twig', array()));
       //return $app['twig']->render('index.html.twig');
    else
        return 'Voce não tem permissão para acessar esta funcionalidade';
})->bind('departments');


$app->get( '/{module}/crud/new', function ($module) use ($app) {

    if ($app['crud.permission']->hasCreatePermissionForModule($module))
       return new Response($app['twig']->render('index.html.twig', array()));
       //return $app['twig']->render('index.html.twig');
    else
        return 'Voce não tem permissão para acessar esta funcionalidade';
})->value ( 'module', 'modulo' )->bind('homepage');

$app->get( '/{module}/crud/edit/{id}', function ($module, $id) use ($app){
    return 'GET Controller='.$controller.' e Method= EDIT id='.$id;
});

$app->get( '/{module}/crud/list', function ($module) use ($app){
    return 'GET Controller='.$controller.' e Method= LIST ';
});



$app->post( '/{module}/crud/create', function ( $module ) use ($app){
  //verifica a permissão
    return 'POST = Controller='.$controller.' e Method= Create';
});

$app->post( '/{module}/crud/update', function ( $module, $controller ) use ($app){
  //verifica a permissão
    return 'POST = Controller='.$controller.' e Method= Update';
});

$app->post( '/{module}/crud/delete/{id}', function ( $module, $controller, $id ) use ($app){
  //verifica a permissão
    return 'POST = Controller='.$controller.' e Method= Delete';
});

$app->get( '{module}/{controller}/{method}', function ( $module, $controller, $method ) use ($app) {
  //verifica a permissão
    return ' Another Functions Controller='.$controller.' e Method='.$method;
});

$app->get( '/', function (Application $app, Request $bar) {
    $class = new Bpms\Teste\Controller\TesteController($app, $bar);
    $resp = $class->getResponse();
         //  return $resp;
           return $app->json( $resp );
});

//Funciona com o TESTECONSTROLLER
$app->get( '/load/{id}', function (Application $app, Request $bar, $id) {
    $class = new Bpms\Teste\Controller\TesteController($app, $bar);
    $resp = $class->carregaUsuario($id);
    return $app->json( $resp );
});



*/






//$app->mount('/', new Bpms\Teste\Controller\TesteControllerMount());
$app->run();
return $app;
