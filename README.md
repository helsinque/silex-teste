silex-teste
===========

Teste de integração com Silex


Configurando o VirtualHost

  -httpd.conf

   NameVirtualHost *
   
   <VirtualHost *>
    ServerName lotus
    DocumentRoot e:/servidor/silex-teste/web
  </VirtualHost>


  -HOSTS
  127.0.0.1 lotus
  
  
Configurando o Banco de dados

  -rodar script de SQL
    docs/doctrine/banco+data.sql
    
Fazer login com:
  edu / foo
  
  
  
  
  
  
  
