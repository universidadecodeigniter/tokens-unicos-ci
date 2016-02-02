# Exemplo de geração de tokens únicos com gravação em banco de dados

Esse exemplo mostra, de forma simples, como criar uma rotina de criação de tokens únicos gravando-os no banco de dados, fazendo uso do framework CodeIgniter na versão 3.0.4.

Os arquivos a serem estudados são:

- application/controllers/Tokens.php
- application/models/Tokens_model.php
- application/views/home.php
- application/views/tokens.php

Tanto o controller quanto o model estão comentados, de modo a facilitar o entendimento.

Basicamente o que é feito no exemplo é um link que ao ser clicado gera um novo token, armazenando o mesmo no banco de dados, e em seguida exibe na tela, junto com 10 outros tokens já gerados.

## Banco de Dados

Crie o banco de dados para o exemplo e execute a instrução SQL abaixo para poder criar a tabela `tokens`.

```sql
CREATE TABLE `tokens` (
  `token` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```
Não se esqueça de atualizar os dados do arquivo `config/database.php` com as informações da sua conexão com o banco de dados.

## Curta a fanpage e fique por dentro de novidades

https://www.facebook.com/universidadecodeigniter/
