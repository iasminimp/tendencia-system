<?php
    session_start();#iniciando a sessão 

    #pagina para verificação do login
    print_r($_REQUEST); //verificação das informações do formulario de login estão chegando corretamente

    #verificação se os dados estao preenchidos corretamente
    if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['senha_user'])){
      echo 'chegou na verificação';
         include_once('config.php');
        $username =$_POST['username'];
        $senha_user = $_POST['senha_user'];

        print_r('Username: '.$username);
        print_r('Senha: '.$senha_user);

        
        
        #verificando se existe esse usuario no banco de dados
        $sql = "SELECT * FROM usuarios WHERE username = '$username' and senha_user ='$senha_user'";
        $result = $conexao->query($sql);
        if(mysqli_num_rows($result)<1){
            
            unset($_SESSION['username']);
            unset($_SESSION['senha_user']);       
            
            header('Location: index.php');

        }else{ #entra no sistema
            $_SESSION['username']=$username;
            $_SESSION['senha_user']=$senha_user;
            
            header('Location: sistema.php');
        }
    }else{ #caso contrario, permanece na pagina de login
        echo 'deu erro aqui';
        header('Location: index.php');
    }


?>