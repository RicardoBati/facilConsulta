
# Fácil Consulta

API em Laravel


## Instalação

Clonar o projeto e executar laravel sail
```bash
sail up
```
Para executar as migrations, seeders e factorys
```bash
sail artisan migrate:fresh --seed
```
Para ter acesso a um usuário autenticado
```bash
sail artisan tinker
```
Dentro do artisan tinker executar
```bash
User::factory()->create()
```
Irá retornar um usuario autenticado, guardar o email (senha por padrão é 'password') para usar no passo a seguir
    
## Documentação da API

#### Para adquirir o token de autenticação deverá ser feita uma requisição para

```http
  POST /login
```
Passando no body um json 
```
{
    "email": "major72@example.net",
    "password": "password"
{
```

#### Para consultar usuários cadastrados

```http
  get /user
```
| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `Authorization: Bearer`      | `null` | Token informado |

#### Para listar as cidades cadastradas, deve ser feito uma requisição para

```http
  GET /cidades
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `null` | `null` | Endpoint público|

#### Listar médicos / Para listar todos os médicos cadastrados, deve ser feito uma requisição para

```http
  GET /medicos
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `null`      | `null` | Endpoint público |

#### Listar médicos de uma cidade / Para listar apenas os médicos de uma cidade específica, deverá ser feito uma requisição para 

```http
  GET /cidades/{id_cidade}/medicos
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id_cidade`      | `int` | Id cidades retornado na consulta /cidades |


#### Cadastrar médico / Para cadastrar um medico, deverá ser feito uma requisição para

```http
  POST /medicos
```
Passando no body um json

```
{
    "nome": "Dra. Nicole Clara",
    "especialidade": "Cirurgião",
    "cidade_id": 5
}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `nome`      | `string` | Nome do médico |
| `especialidade`      | `string` | Especialidade do médico |
| `cidade_id`      | `int` | Id da cidade do médico de acordo com o endpont /cidades |
| `Authorization: Bearer`      | `null` | Token informado |


#### Vincular paciente e médico / Para vincular um paciente e um médico, deverá ser feito uma requisição

```http
  POST /medicos/{id_medico}/pacientes
```

Passando no body um json

```
{
    "medico_id": 1,
    "paciente_id": 11
}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `medico_id`      | `int` | Id do médico cadastrado |
| `paciente_id`      | `int` | Id do paciente cadastrado |
| `Authorization: Bearer`      | `null` | Token informado |

#### Listar pacientes de um médico / Para listar os pacientes de um médico, deverá ser feito uma requisição para

```http
  GET medicos/{id_medico}/pacientes
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `medico_id`      | `int` | Id do médico cadastrado |
| `Authorization: Bearer`      | `null` | Token informado |

#### Atualizar paciente / Para atualizar um paciente, deverá ser feito uma requisição informando o dados que serão atualizados para

```http
  POST /pacientes/{id_paciente}
```

Passando no body um json

```
{
    "nome": "Karina Costa Garcia",
    "cpf": "15836485987"
    "celular": "(11) 98484-6362"
}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id_paciente`      | `int` | id do paciente |
| `nome`      | `string` | nome do paciente |
| `cpf`      | `string` | cpf do paciente |
| `celular`      | `string` | celular do paciente |
| `Authorization: Bearer`      | `null` | Token informado |

#### Cadastrar paciente / Para cadastrar um paciente, deverá ser feito uma requisição com os dados que deseja atualizar para

```http
  POST /pacientes
```

Passando no body um json

```
{
    "nome": "Karina Costa Garcia",
    "cpf": "15836485987"
    "celular": "(11) 98484-6362"
}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `nome`      | `string` | nome do paciente |
| `cpf`      | `string` | cpf do paciente |
| `celular`      | `string` | celular do paciente |
| `Authorization: Bearer`      | `null` | Token informado |
