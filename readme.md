Projeto Investimento 

Pre requisitos
Ferramentas usada para fazer o projeto:

PHP 7.2
Composer version 1.8.4
MySql 5.7
Apache 2.4.35 -Git 2.14.1
Como executar o projeto
Para executar o projeto siga os comandos abaixo:

Clone o projeto.

Entre na pasta do projeto clonado e digite o comando "composer install"

Depois de instaladas todas as dependencias crie um banco no MySql. Eu crie como "proj-invest"

Renovei o arquivo ".env.exmeplo" para ".env" e preencha os seus dados de conexão.

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=proj-invest
  DB_USERNAME=root
  DB_PASSWORD=
Rode o comando para criar o banco e os dados dele "php artisan migration --seed".

Agora rode o projeto usando "php artisan serve". Acesse o projeto pela URL http://127.0.0.1:8000.

Caso apareça um erro de chave execute o comando "php artisan key:generate".

Licença
O framework Laravel e esse projeto usam a linceça MIT license.
