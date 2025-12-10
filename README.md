# CRUD de Tarefas com Autenticação via Token (Laravel)

Um projeto de API REST para gerenciamento de tarefas, incluindo autenticação baseada em tokens.
Criado com foco em boas práticas, organização em camadas, validações, e separação clara de responsabilidades.

## Tecnologias utilizadas
- PHP 8+
- Laravel 12
- MySQL
- Laravel Sanctum (autenticação)
- Composer

## Como utilizar
### Pré Requisitos
- PHP instalado (8.1+)
- Composer
- MySQL
- Extensões necessárias do Laravel

### Passo a passo
#### 1. Clone o repositório:
```
git clone https://github.com/seu-user/crud-tarefas.git
```
#### 1. Clone o repositório:
```
git clone https://github.com/seu-user/crud-tarefas.git
```
#### 2. Instale as dependências:
```
composer install
```
#### 3. Copie o arquivo de ambiente:
```
cp .env.example .env
```
#### 4. Configure seu banco no .env.

#### 5. Gere a key do Laravel:
```
php artisan key:generate
```
#### 6. Rode as migrations:
```
php artisan migrate
```
#### 7. Inicie o servidor:
```
php artisan serve
```

## Endpoints e Funcionalidades
### Autenticação
### Cadastrar usuário: POST /api/register
#### Exemplo:
```
{
  "name": "Gabriel",
  "email": "gabriel@example.com",
  "password": "12345678"
  "password_confirmation": "12345678"
}
```

### Login: POST /api/login
#### Retorno:
```
{
  "token": "seu_token_aqui"
}
```
Use este token no header de todas as requisições autenticadas:
```
Authorization: Bearer SEU_TOKEN
```
### LogOut: POST /api/login
### CRUD

| Método | Rota | Descrição |
|--------|------|------------|
| GET | /api/tarefas | Lista todas |
| POST | /api/tarefas | Cria tarefa |
| PUT | /api/tarefas/{id} | Editar tarefa |
| GET | /api/tarefas/{id} | Exibir tarefa específica |
| DELETE | /api/tarefas/{id} | Excluir tarefa |

## Arquitetura
### O projeto segue uma separação clara de camadas:
- Controllers → recebem requisições e direcionam o fluxo
- Requests → validam dados de entrada
- Services → contêm regras de negócio
- Repositories (quando necessário) → acesso a dados
- Models → representam entidades do domínio

### Motivações:

- facilita testes
- melhora a manutenção
- desacopla regras de negócio do framework
- deixa o código mais extensível

## Próximas melhorias

- [ ] Implementar Resources para padronizar as respostas da API
- [ ] Criar tratamento global de erros com Handler.php
- [ ] Adicionar testes automatizados (Feature e Unit)
- [ ] Criar documentação automatizada com Swagger
- [ ] Dockerizar o ambiente


