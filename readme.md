# Desafio Tendência System

## Desafios propostos
* Criar uma tela de login 100% funcional;
* Criar um GET para captação de dados na API sugerida; 
* Apresentar estes dados, da forma que lhe for mais conveniente.


## Abordagem
O desafio foi analisado e dividido em duas partes, front-end e back-end e dividido em sub-tarefas;

## Linguagem de Programação
Foram escolhidas as tecnologias: html5, css3, javaScript, php, bootstrap, json, phpMyAdmin ;

## Front-end
Criação das telas:
* Tela de Login;
* Tela cadastro/ criar um usuário;
* Tela do Sistema (só possui acesso quem já possui cadastro);
* Tela de Recuperação de senha;

## Back-end
Conexão com o banco de dados foi feita em localhost, utilizando o phpMyAdmin;
### Estrutura do Banco de Dados 

Estrutura do banco de dados, `phpMyAdmin` <br>

```mysql
dbname = tendencia_bd
id  (int - key)
nome_user (varchar)
email_user (varchar)
username (varchar)
senha_user (varchar)
```

Estrutura da conexão com o banco de dados, arquivo: `cadastro.php` <br>

```mysql
$dbHost = 'Localhost';
$dbUsername= 'root';
$dbPassWord='';
$dbName='tendencia_bd';

$conexao = new mysqli( $dbHost, $dbUsername,$dbPassWord,$dbName);
```

A Conexão com o banco de dados é feita através do arquivo `config.php`

## API

Link da API: https://www.alphavantage.co <br>
Documentação da API: https://www.alphavantage.co/documentation/ <br>
Chave de API gratuita, utilizada : `XI1QJSWPOJLIN9AZ` <br>


A API dada como desafio possui várias subdivisões sobre ações, e agrupadas por 5 categorias: <br>
1 - APIs de dados de ações de séries temporais principais; <br>
2 -  Dados fundamentais; <br>
3 -  Moedas físicas e digitais/criptográficas (por exemplo, Bitcoin); <br>
4 - Indicadores econômicos; <br>
5 - Indicadores Técnicos; <br>

Para demonstração da API escolhi um symbol, IBM, e cinco tipos de buscas diferentes (intraday, daily, weekly, monthly, global quote) e uma demonstração de Matches de Symbol (symbolSearch). <br>

Selecionado o tipo de informação que deseja visualizar, o usuário pode procurar dentro das tabelas alguma informação especifica de alguma data/ hora especifica sobre determinada ação. <br>  


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
Outras soluções possiveis para teste, da função `mail` estão disponiveis na documentação do `PHP`: `https://www.php.net/manual/pt_BR/function.mail.php`


**Obs. 2**: ao colocar em um dominio, exemplo hostgator, pode ser que aja um problema na função header - Location do php. 
Uma solução, que achei foi onde esta a função location, substituir pela função meta do html. Como por exemplo:

```powershell
header ("Location: index.php");
```

Substituir por:

```powershell
<meta http-equiv="refresh" content="0;url=https:url_do_projeto/index.php">
```

## Teste - Dominio

Criei um subdominio dentro do site de hospedagens hostgator para testes, segue o link:<br>

Site: https://tendencia.iasminmarques.com.br/index.php



## Funções para se adicionar futuramente
* O recap/check: sou humano; <br>
* Melhorar a verificação de troca de senha e armazenamento da senha no banco de dados; <br>
* Usar um criptografia melhor para o armazenamento de senha; (hash, md5*); <br>
* O usuário ter a possibilidade de criar uma nova senha, e nao o sistema da uma nova senha; <br>
* Verificação de senha, podem existir emails iguais; (ao mudar a senha, ira mudar de todos os usuario que possuem aquele determinado email); <br>
* A pessoa pode esquecer o nome de usuario, nao tem como recuperar: adicionar função para lidar com esse tipo de caso; <br>
* Exibir informações de acordo com o symbol, intervalo que o usuário desejar (sobre API).