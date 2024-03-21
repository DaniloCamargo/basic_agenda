# API de Agenda Telefônica
Esta é uma API simples para gerenciar uma agenda telefônica.

### Rotas
### Listar Contatos
# Retorna uma lista de todos os contatos na agenda.

### URL: /api/listar
Método: GET
### Resposta de Sucesso:
Código: 200 OK
Conteúdo: Array de objetos JSON, cada objeto representa um contato.

```
[
  {
    "id": 1,
    "nome": "João",
    "email": "joao@example.com",
    "data_nascimento": "1990-01-01",
    "cpf": "123.456.789-00",
    "telefones": ["(11) 99999-9999", "(11) 88888-8888"]
  },
  {
    "id": 2,
    "nome": "Maria",
    "email": "maria@example.com",
    "data_nascimento": "1985-05-10",
    "cpf": "987.654.321-00",
    "telefones": ["(11) 77777-7777"]
  }
]
```

Adicionar Contato
Adiciona um novo contato à agenda.

### URL: /api/criar
Método: POST
Payload de Requisição:
```
{
    "nome": "Fulano",
    "email": "fulano@example.com",
    "data_nascimento": "1980-12-25",
    "cpf": "111.222.333-44",
    "telefones": ["(11) 66666-6666", "(11) 55555-5555"]
}
```
### Resposta de Sucesso:
Código: 201 Created
Conteúdo: Objeto JSON representando o novo contato criado.
```
{
    "id": 3,
    "nome": "Fulano",
    "email": "fulano@example.com",
    "data_nascimento": "1980-12-25",
    "cpf": "111.222.333-44",
    "telefones": ["(11) 66666-6666", "(11) 55555-5555"]
}
```
Editar Contato
Edita um contato existente na agenda.

### URL: /api/editar/:id
Método: PUT
Payload de Requisição:
```
{
    "nome": "Fulano da Silva",
    "email": "fulano.silva@example.com",
    "data_nascimento": "1975-08-15",
    "cpf": "111.222.333-44",
    "telefones": ["(11) 66666-6666", "(11) 77777-7777"]
}
```
### Resposta de Sucesso:
Código: 200 OK
Conteúdo: Objeto JSON representando o contato editado.
```
{
    "id": 3,
    "nome": "Fulano da Silva",
    "email": "fulano.silva@example.com",
    "data_nascimento": "1975-08-15",
    "cpf": "111.222.333-44",
    "telefones": ["(11) 66666-6666", "(11) 77777-7777"]
}
```
Excluir Contato
Exclui um contato da agenda.

### URL: /api/excluir/:id
Método: DELETE
### Resposta de Sucesso:
Código: 204 No Content