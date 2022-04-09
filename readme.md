# Desafio Tendência System

## Desafios propostos
* Criar uma tela de login 100% funcional;
* Criar um GET para captação de dados na API sugerida; 
* Apresentar estes dados, da forma que lhe for mais conveniente.


## Abordagem
O desafio foi analisado e divido em duas partes, front-end e back-end e dividido em sub-tarefas;

## Linguagem de Programação
Foram escolhidas as linguagens: html5, css3, javaScript, php, bootstrap, json, phpMyAdmin ;

## Front-end
Criação das telas:
* Tela de Login;
* Tela cadastro/ criar um usuário;
* Tela do Sistema (só possui acesso quem já possui cadastro);
* Tela de Recuperação de senha;

## Back-end
Conexão com o banco de dados phpMyAdmin;
### Estrutura do Banco de Dados 

```powershell
dbname = tendencia_bd
id  (int - key)
nome_user (varchar)
email_user (varchar)
username (varchar)
senha_user (varchar)
```
A Conexao com o banco de dados é feita atraves do arquivo `config.php`



## Fase de Testes
**Obs. 1**: a função mail (nao funciona localmente/ localhost) so funciona quando esta hospedado, para testar se esta alterando a senha, basta colocar uma condicional verdadeira no codigo, como por exemplo if (1==1)
Isso no arquivo `esqueceusenha.php`, onde está:

```powershell
if (mail ($email_user, "Sua nova senha", "Sua nova senha: ".$novasenha)){
```
colocar:
```powershell
if (1==1){
```

**Obs. 2**: ao colocar em um dominio, exemplo hostgator, pode ser que aja um problema na função header - Location do php. 
Uma solução, que achei foi onde esta a função location, substituir pela função meta do html. Como por exemplo:

```powershell
header ("Location: index.php");
```

Substituir por:

```powershell
<meta http-equiv="refresh" content="0;url=https:url_do_projeto/index.php">
```

## Diário da Documentação

Algumas observações sobre o projeto 

* 07/04 -09:42: cadastro do usuario no bd ja esta funcionando normal

[ok] fazer a verificação de usuario/ login <br>
[ok] caso correto, entra no painel <br>

* 07/04 - 18:41: funcionando a verificação do login, ja entra no painel adm/ sistema

[OK]caso contrario barra o usuario, e pede pra ele criar um cadastro; <br>
[OK]criar uma notificação caso o usuario nao digite a senha ou usuario correto; <br>

* 07/04 - 18:57: adicionado a notificação de erro 


* 08/04 - 08:40: recuperação de senha criada/ esqueceu a senha? <br>
[ok] criação da view recuperar senha;<br>
[ok] fazer a validação de email (se possui ou nao esse email no banco de dados); <br>
[ok] fazer o update da senha no bd e enviar o email com a nova senha para o usuario;<br>


- fazer ajustes na view de recuperação de senha, front-end (notificações e campos do formulário);
08/04- 11:46

11:15 - 09/04: fazer pagina de usuário cadastrado com sucesso;


## To-do List -------------------------------
	 [] passar para parte da API; 
	 []passar todo o codigo para o github; 
	 []fazer a documentação da aplicação; 
	 []Adicional: Upar para o dominio na hostgator para testes;


## Funções para se adicionar futuramente
* funções para se adicionar futuramente: o recap/check: sou humano; <br>
* funções para se adicionar futuramente: melhorar a verificação de troca de senha; <br>
* usar um criptografia melhor para o armazenamento de senha; (hash, md5); <br>
* o usuário ter a possibilidade de criar uma nova senha, e nao o sistema da uma nova senha; <br>
* verificação de senha, podem existir emails iguais; (ao mudar a senha, ira mudar de todos os usuario que possuem aquele determinado email); <br>
* a pessoa pode esquecer o nome de usuario, nao tem como recuperar: fazer algo mais para frente para tentar lifar com esse tipo de caso; <br>