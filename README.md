## Primeiramente clone o repositório
###### git clone ...

## Acesse a pasta do projeto clonado e instale as dependencias do composer
###### composer install

## Agora instale as dependencias do npm
###### npm install

## Crie um banco de dados vazio para a aplicação

## Crie um arquivo .env com o mesmo conteúdo de .env.example
###### Dentro do arquivo altere os valores de banco de dados para suas credenciais e nome de banco existente dentro do seu ambiente

## Dentro da Pasta do projeto executar os seguintes comandos.
###### php artisan migrate
###### php artisan migrate:refresh --seed
###### composer require laravel/passport
###### php artisan passport:install
#### Serão geradas as chaves de cliente.

## Lista de todas as instituições
#### GET /instituicoes/

## Lista de todos os cursos
#### GET /cursos/

## Lista de todos os alunos
#### GET /alunos/

## Para criar um usuário pela API
#### Realizar um POST em /api/auth/signup
#### JSON de exemplo
###### {
######     "name": "Kevin",
######     "email": "kevin.martiniano@hotmail.com",
######     "user_type_id": 1,
######     "password": "123456",
######     "password_confirmation": "123456"
###### }

#### O user_type_id indica o tipo de usuário
#### 1 = Administrador
#### 2 = Comum

## Realizar um login ela API
#### POST /api/auth/login
###### {
######     "email": "kevin.martiniano@hotmail.com",
######     "password": "123456",
######     "remember_me": true
###### }
#### Esta requisição irá te retornar um token, que será necessário utilizar para realizar as requisições na API.


## Para deslogar da API
#### GET /api/auth/logout
#### Header Authorization "Bearer {token_retornado}"

## Retornar todas as instituições
#### GET /api/v1/instituicoes/
#### Header Authorization "Bearer {token_retornado}"

## Retornar instituição por id
#### GET /api/v1/instituicoes/{id}
#### Header Authorization "Bearer {token_retornado}"

## Cursos relacionados com a instituição específica
#### GET /api/v1/instituicoes/{id}/cursos/

## Criar uma instituição
#### POST /api/v1/instituicoes/
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Instituição de Teste",
######     "cnpj": "000.0000.00-11",
######     "status": "1"
###### }

## Editar uma instituição
#### PUT /api/v1/instituicoes/
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Instituição de Teste Editada",
######     "cnpj": "000.0000.00-11",
######     "status": "1"
###### }

## Inativar uma instituição
#### DELETE /api/v1/instituicoes/{id_instituicao}
### Header Authorization "Bearer {token_retornado}"

## Retornar todos as cursos
#### GET /api/v1/cursos/
#### Header Authorization "Bearer {token_retornado}"

## Retornar curso por id
#### GET /api/v1/cursos/{id}
#### Header Authorization "Bearer {token_retornado}"

## Criar um curso
#### POST /api/v1/cursos/
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Curso de Teste",
######     "duracao": "1000",
######     "status": "1",
######     "id_instituicao": "11"
###### }

## Editar um curso
#### PUT /api/v1/cursos/{id}
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Curso de Teste editado",
######     "duracao": "1000",
######     "status": "1",
######     "id_instituicao": "11"
###### }

## Inativar um curso
#### DELETE /api/v1/cursos/{id}
#### Header Authorization "Bearer {token_retornado}"

## Retornar todas as alunos
#### GET /api/v1/alunos/
#### Header Authorization "Bearer {token_retornado}"

## Retornar aluno por id
#### GET /api/v1/alunos/{id}
#### Header Authorization "Bearer {token_retornado}"

## Criar um aluno
#### POST /api/v1/alunos/
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Fulano Teste",
######     "cpf": "000.000.000-00",
######     "data_de_nascimento": "1995-02-18",
######     "email": "email@example.com",
######     "celular": "(11) 99999-9999",
######     "endereco": "Rua de teste",
######     "numero": "48",
######     "bairro": "Jd. Teste",
######     "cidade": "Teste",
######     "uf": "SP",
######     "status": 1,
######     "id_curso": 1
###### }

## Editar um aluno
#### PUT /api/v1/alunos/
#### Header Authorization "Bearer {token_retornado}"
###### {
######     "nome": "Fulano Teste Editado",
######     "cpf": "000.000.000-00",
######     "data_de_nascimento": "1995-02-18",
######     "email": "email@example.com",
######     "celular": "(11) 99999-9999",
######     "endereco": "Rua de teste",
######     "numero": "48",
######     "bairro": "Jd. Teste",
######     "cidade": "Teste",
######     "uf": "SP",
######     "status": 1,
######     "id_curso": 1
###### }

## Inativar um aluno
#### DELETE /api/v1/alunos/
#### Header Authorization "Bearer {token_retornado}"
