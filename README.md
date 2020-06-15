# Programa de Estudos

#### Instruções para execução
Para iniciar execute o seguinte comando na raiz do projeto:

```
docker-compose up --build
```

Aguarde todos os serviços iniciarem  e acesse [http://localhost](http://localhost).

<sub><sup>Obs: É preciso aguardar também as migrations executarem por completo.</sup></sub>

#### Serviços

```
1. Vue + Node
    - Frontend
    - http://localhost
2. Slim + PHP
    - Backend
    - http://localhost:8080
3. MySql
    - Banco de dados
    - Porta 3306
4. Adminer
    - Cliente de banco de dados
    - http://localhost:8081
    - Server: db
    - Username: mysql
    - Password: mypass
    - Database: programa_estudos
5. Flyway
    - Migrations
```

#### Execução completa das migrations
![Execução completa das migrations](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/migrations.png "Execução completa das migrations")

#### MER
![MER](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/mer.png "MER")

