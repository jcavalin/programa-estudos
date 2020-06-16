# Programa de Estudos

#### Instruções para execução
Para iniciar execute o seguinte comando na raiz do projeto:

```
docker-compose up --build
```

Aguarde todos os serviços iniciarem  e acesse [http://localhost](http://localhost).

<sub>Obs: É preciso aguardar também as migrations executarem por completo.</sub>

### Live demo

O projeto também está disponível em [https://programaestudos.tk](https://programaestudos.tk).

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
![Execução completa das migrations](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/assets/migrations.png "Execução completa das migrations")

#### MER
![MER](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/assets/mer.png "MER")

#### Funcionalidades

1 - Lista de programas de estudos

![Lista de programas de estudos](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/assets/1-lista-programa-estudos.png "Lista de programas de estudos")


2 - Incluir programa de estudos

![Incluir programa de estudos](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/assets/2-incluir-programa-estudos.png "Incluir programa de estudos")


3 - Visualizar programa de estudos

![Visualizar programa de estudos](https://raw.githubusercontent.com/jcavalin/programa-estudos/master/assets/3-visualizar-programa-estudos.png "Visualizar programa de estudos")
