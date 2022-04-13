<?php
    include('config.php');
    session_start();#iniciando a sessão 

    if (isset($_POST['ok'])){ #verificação do botao do formulario
        #criar uma nova senha
        $novasenha=substr(md5(time()),0,6); #nova senha
        #$nscriptografada = md5(md5($novasenha)); #nova senha encriptografada
        #$nscriptografada = $novasenha;

        $email_user = $_POST['email_user'];   
        
        //verificação se possui um email igual no bd
        $sql = "SELECT * FROM usuarios WHERE email_user = '$email_user'";
        $result = $conexao->query($sql);
        
        if(mysqli_num_rows($result)<1){ #nao entra no sistema           
            $_SESSION['nao_achou_email']=true;  #email_notification    

        }else{ #acho o email no bd           
            //somente se o email for enviado sera alterado a senha no bd            
            if(1==1){
            #if (mail ($email_user, "Sua nova senha", "Sua nova senha: ".$novasenha)){
                    #função mail, em alguns host nao funcionam, como por exemplo:localhost, para fazer o teste se o email foi enviado para o usuario basta escrever um condição que seja verdadeira, como por exemplo if(1==1)
                    #mail ($destinatario, 'assunto', 'corpo_do_email'SS);                 
                    //QUERY para editar a senha do usuário no bd
                    $query_user = "UPDATE usuarios SET senha_user = '$novasenha' WHERE email_user = '$email_user'";
                    mysqli_query($conexao, $query_user);
    
                    if (mysqli_affected_rows($conexao)) {
                        $_SESSION['achou_email']=true;  #email_notification    
                    }else{
                        echo "<p style='color:#f00'>Erro: Usuário não editado com sucesso. Erro ao alterar no banco de dados!</p>";
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

  <title>Cadastro - Tendências </title>
  <meta content="Esqueceu a senha Tendencias - System" name="description">
  <meta content="recuperar senha" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS  -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!--  Main CSS  -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                    <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Recuperação de Senha do System - Tendências </h5>
                        <p class="text-center">Digite o e-mail cadastrado para recuperação de senha.</p>
                    </div>

                    <?php #verificação caso não é encontrado o e-mail no banco de dados
                        if(isset($_SESSION['nao_achou_email'])):
                    ?>
                        <div class="alert alert-danger" role="alert">
                        <p><bold class="fw-bold" >ERRO:</bold> E-mail não encontrado. Digite um e-mail válido.</p>
                        </div>

                    <?php  
                        endif;
                        unset($_SESSION['nao_achou_email']);
                    

                    #verificação caso ache o e-mail no banco de dados
                        if(isset($_SESSION['achou_email'])):
                    ?>
                        <div class="alert alert-success" role="alert">
                        <p><bold class="fw-bold">E-mail encontrado:</bold> verifique sua nova senha no seu e-mail.</p>
                        </div>

                    <?php  
                        endif;
                        unset($_SESSION['achou_email']);
                    ?>

                    <form action='' method="POST">
                        <div class="text-center ">
                            <input class="form-control" placeholder="Digite seu e-mail" name="email_user" type="text"><br>
                            <input  class='btn btn-primary w-100' name="ok" value="Recuperar" type="submit"><br>
                        </div>
                    </form>                           
                    <div class="text-center " style="margin-top: 10px">
                       <a class='btn btn-outline-primary w-100' href="index.php">Voltar</a>
                    </div>
                 
                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main>


  <!-- Vendor JS -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>


