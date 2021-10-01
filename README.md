## Sistema de gerenciamento de enquetes

[iAsk](https://iask-enquete.herokuapp.com) é uma plataforma online para gerenciamento de enquetes, que visa extrair dados específicos de um determinado grupo de pessoas, em forma de perguntas e respostas diretas.

## Acesso rápido e credenciais

Projecto hospedado na heroku
- [Acessa aqui](https://iask-enquete.herokuapp.com) para ser redirecionado a página do sistema

O projecto já tem 2 usuários (Evaristo Paulo e John Doe), caso não queira criar novos.

- Evaristo Paulo (E-mail: admin@gmail.com, senha: evaristo)
- John Doe (E-mail: user@gmail.com, Senha: usuario)

## O que são enquetes

Conjunto de depoimentos ou de pesquisas com o intuito de esclarecer uma questão, geralmente organizado por uma autoridade, por um jornal, por uma empresa privada ou por uma organização pública.


## Entidades

Este projecto foi desenvolvido por mim, como teste de admissão para uma vaga PHP

## Desafios e metas a serem atingidas

-   Uma enquete consiste em uma única pergunta, com no mínimo duas e no máximo 10 alternativas;
-   Possuindo uma conta, o usuário deve poder efetuar login e visualizar, criar, editar e excluir suas
enquetes;
-   Após criar uma enquete, deverá ser possível copiar um link para compartilhamento da enquete;
-   Estando logado, o usuário pode visualizar os resultados da enquete que criou, bem como o número de
respostas;

-   Não será necessário estar logado para responder uma enquete;
-   Apenas 1 alternativa pode ser selecionada como resposta da enquete;
-   Após responder uma enquete, caso o usuário atualizar a página, poderá votar novamente e um novo
voto será computado;
-   Após responder a enquete, os resultados deverão ser mostrados ao usuário

## Tecnologias utilizadas

Este projecto foi desenvolvido utilizando o framework Laravel, pelas vantagens/produtividade durante o processo de desenvolvimento.

- PHP/Laravel
- HTML e Javascript
- Postgres (Banco de dados)

## Links

Este projecto foi hospedado utilizando um serviço de hospedagem grátis, heroku. Acessa o link do projecto e me dá o seu feedback. [iAsk](https://iask-enquete.herokuapp.com).


## Nota importante

Caso use o projecto localmente, não esquece de rodar o comando: php artisan migrate:fresh --seed para criar as tabelas da base de dados e gerar os usuários de teste, com as credencias acima referenciadas.