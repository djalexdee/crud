# crud
Para Rodar o projeto:
Extrair os arquivos pa pasta do servidor(Apache) ex: pasta = htdocs ou www
Alterar as cobfigurações dos arquivos

application/config.php
$config['base_url'] = 'colocar a url do projeto'; 

application/database.php

colocar as configurações do banco de dados

'hostname' => 'host do servidor',
'port' => 1433,
'username' => 'usuario do banco de dados',
'password' => 'senha do banco de dados',
'database' => 'nome do banco de dados',

no phpmyadmin importar o arquivo
crud.sql