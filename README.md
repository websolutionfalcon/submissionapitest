## Simple Laravel API with Job Queue, Database, and Event Handling

This project created to demonstrate proficiency with Laravel's job queues, database operations, migrations, and event handling.

### First initialization

There must be installed docker and docker-compose for run this project

- https://docs.docker.com/engine/install/
- https://docs.docker.com/compose/install/

1. clone sources into your local machine `git clone ssh://....`
2. run `cd example-app`
3. run `cp .env.example .env`
4. run `make init` 

### Run project

1. run `make start`
2. after running this command you can use Postman to test endpoint (http://localhost:7020/api/submit)

To call the http://localhost:7020/api/submit endpoint send the POST request with params:
name: string,
email: string,
message: string
