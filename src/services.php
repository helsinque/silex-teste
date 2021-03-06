<?Php
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'dbs.options' => $app['db.config']
));

$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'login' => array(
            'pattern' => '^/login$',
         ),
        'secured' => array(
            'pattern' => '^.*$',
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'logout' => array('logout_path' => '/logout'),
            'users' => $app->share(function () use ($app) {
                return new Core\Login\Controller\UserProvider($app);
            }),
      
        ),
    ),
));


$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path'           => array(dirname(__DIR__) . '/src'),
));

$app->register(new Silex\Provider\MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__ . '/app.log',
));

$app->register(new Silex\Provider\SessionServiceProvider());

$app['crud.permission'] = $app->share(function ($app) {
    return new Core\Permission\Service\PermissoesService($app);
});
