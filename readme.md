<p align="center">Projeto Investimento</p>

## Pre requisitos

Ferramentas usada para fazer o projeto:

- PHP 7.2
- Composer version 1.8.4
- MySql 5.7
- Apache 2.4.35
-Git 2.14.1

## Como executar o projeto

Para executar o projeto siga os comandos abaixo:

- **Clone o projeto.**
- **Entrar nas pasta "Docker".**
- **Execute o comando "docker-compose up -d --build".**
- **Execute o comando "docker ps". Esse comando vai te mostrar a lista de container executando.**
- **Execute o comando "docker exec -it NOMECONTAINER bash". NOMECONTAINER é pego no comando anterior na coluna "NAMES".**
- **Apos entrar no container do apache execute o comando "composer install" para instalar as dependencias do projeto.**
- **Preencha os seus dados de conexão.**

        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=proj-invest
        DB_USERNAME=root
        DB_PASSWORD=root

- **Rode o comando para criar o banco e os dados nele "php artisan migration --seed".**
- **Acesse o projeto pela URL http://127.0.0.1:8101.**
- **Caso apareça um erro de chave execute o comando "php artisan key:generate" dentro do container.**

- **User criado é o joao@joao.com com senha 123456.**


## Licença

O framework Laravel e esse projeto usam a linceça [MIT license](https://opensource.org/licenses/MIT).
