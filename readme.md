//analisando o desafio
// dividir em front-end e back-and
-> setoriar/ dividir as tarefas grandes em pequenas tarefas
//escolha da linguagem de programação que atende o desafio (php, html, css, bootstrap, json p/ api)
* Criar uma tela de login 100% funcional;
	- tela 0: login / cadastro
	- tela 1: login e senha
	- tela 2: login e senha - error
	- tela 3: painel admin
	- tela 4: de cadastro de usuário

* Criar um GET para captação de dados na API sugerida; 

* Apresentar estes dados, da forma que lhe for mais conveniente.


//utilização de banco de dados - phpMyAdmin
//entrar na plataforma:
username
senha

//cadastro usuario
id - int (key)
nome_user (varchar)
email_user (varchar)
username (varchar)
senha_user (varchar)

dbname = tendencia_bd

//conexao com o banco de dados é feita atraves do arquivo config.php

07/04 -09:42: cadastro do usuario no bd ja esta funcionando normal

fazer a verificação de usuario/ login [ok]
caso correto, entra no painel [ok]

07/04 - 18:41: funcionando a verificação do login, ja entra no painel adm/ sistema


// caso contrario barra o usuario, e pede pra ele criar um cadastro; 

//criar uma notificação caso o usuario nao digite a senha ou usuario correto


07/04 - 18:57: adicionado a notificação de erro 


08/04 - 08:40: recuperação de senha criada/ esqueceu a senha?
[ok] criação da view recuperar senha;
[ok] fazer a validação de email (se possui ou nao esse email no banco de dados); 
[ok] fazer o update da senha no bd e enviar o email com a nova senha para o usuario;
obs. 1: a função mail (nao funciona localmente/ localhost) so funciona quando esta hospedado, para testar se esta alterando a senha, basta colocar uma condicional verdadeira no codigo, como por exemplo if (1==1)
Isso no arquivo `esqueceusenha.php`, onde está:

| if (mail ($email_user, "Sua nova senha", "Sua nova senha: ".$novasenha)){

colocar:

| if (1==1){

obs. 2: ao colocar em um dominio, exemplo hostgator, pode ser que aja um problema na função header - Location do php. 
Uma solução, que achei foi onde esta a função location, substituir pela função meta do html. Como por exemplo:

| header ("Location: index.php");

Substituir por:

|  <meta http-equiv="refresh" content="0;url=https:url_do_projeto/index.php">


- fazer ajustes na view de recuperação de senha, front-end (notificações e campos do formulário);
08/04- 11:46

To-do List -------------------------------
// passar para parte da API;
//passar todo o codigo para o github;
//fazer a documentação da aplicação;
//Adicional: Upar para o dominio na hostgator para testes;


//funções para se adicionar futuramente: o recap/check: sou humano
//funções para se adicionar futuramente: melhorar a verificação de troca de senha
//usar um criptografia melhor para o armazenamento de senha; (hash, md5)
//o usuário ter a possibilidade de criar uma nova senha, e nao o sistema da uma nova senha;
//verificação de senha, podem existir emails iguais; (ao mudar a senha, ira mudar de todos os usuario que possuem aquele determinado email);
// a pessoa pode esquecer o nome de usuario, nao tem como recuperar: fazer algo mais para frente para tentar lifar com esse tipo de caso;