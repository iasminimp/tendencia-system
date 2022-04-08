<?php
    include('config.php');
    if (isset($_POST['ok'])){ #verificação do botao do formulario
        #criar uma nova senha
        $novasenha=substr(md5(time()),0,6); #nova senha
        $nscriptografada = md5(md5($novasenha)); #nova senha encriptografada
        #$nscriptografada = $novasenha;

        $email_user = $_POST['email_user'];   
        
        //verificação se possui um email igual no bd
        $sql = "SELECT * FROM usuarios WHERE email_user = '$email_user'";
        $result = $conexao->query($sql);
        
        if(mysqli_num_rows($result)<1){ #nao entra no sistema           
            echo '<br> nao achou o email';

        }else{ #acho o email no bd
            echo '<br> achou o email';
            //somente se o email for enviado sera alterado a senha no bd            
            if(1==1){
            #if (mail ($email_user, "Sua nova senha", "Sua nova senha: ".$novasenha)){
                //função mail, em alguns host nao funcionam, como por exemplo:localhost, para fazer o teste se o email foi enviado para o usuario basta escrever um condição que seja verdadeira, como por exemplo if(1==1)
                #mail ($destinatario, 'assunto', 'corpo_do_email'SS);                 
                    //QUERY para editar a senha do usuário no bd
                    $query_user = "UPDATE usuarios SET senha_user = '$nscriptografada' WHERE email_user = '$email_user'";
                    mysqli_query($conexao, $query_user);
    
                    if (mysqli_affected_rows($conexao)) {
                        //$_SESSION['msg']="<p style='color:green'>Usuário editado com sucesso!</p>";
                        //header("Location: index.php");
                        echo "<p style='color:green'>Senha alterada com sucesso!<br> Verifique no seu e-mail a sua nova senha :)</p>";
                       // header ("Location: index.php");
                    }else{
                        echo "<p style='color:#f00'>Erro: Usuário não editado com sucesso!</p>";
                    }
            
            }
        }



    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Tendencias </title>
  <meta content="Pagina de login do Tendencias - System" name="description">
  <meta content="login" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Recuperação de Senha do System - Tendências </h5>
        <p class="text-center">Digite o e-mail cadastrado para recuperação de senha.</p>
        
        <!--<div class=" text-center" action=" " method="POST">
                      <label for="email" class="form-label">E-mail</label>
                      <input type="text" name="email" class="form-control" id="email" required>
                       <div class="invalid-feedback">Entre com seu Senha válido!</div>
        </div><br>-->

        <form action='' method="POST">
        <!--<input placeholder="Seu e-mail" name="email_user" type="text">
         <input name="ok" value="ok" type="submit">-->

            <div class="text-center ">
                <input class="form-control" placeholder="Digite seu e-mail" name="email_user" type="text">
                <input  class='btn btn-outline-primary' name="ok" value="Recuperar" type="submit">
                <!-- <a class='btn btn-outline-primary' href="index.php">Voltar</a>-->
            </div>



        </form>        
        
        <div class="text-center ">
            <a class='btn btn-outline-primary' href="index.php">Voltar</a>
        </div>

    </div>


  <!--  

    <form action='' method="POST">
        <input placeholder="Seu e-mail" name="email_user" type="text">
        <input name="ok" value="ok" type="submit">



    </form>-->

  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>


