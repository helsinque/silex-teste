<?Php
$app['debug'] = true;

$app['db.config'] = array(
        'kernel' => array(
          'driver'   => 'pdo_sqlsrv',
          'path'     => __DIR__.'/app.db',
          'host'      => 'localhost',
          'dbname'    => 'Silex-teste',
          'user'      => 'sa',
          'password'  => 'senha123',
          'charset'   => 'utf8',
        ),
        
    );

