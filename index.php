<?php
   session_start();

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
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Tendência System </h5>
                    <p class="text-center small">Entre com seu usuário e senha</p>
                  </div>

                  <?php
                        if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                      <p><bold>ERRO:</bold> Usuário ou senha inválidos.</p>
                    </div>

                    <?php  
                        endif;
                        unset($_SESSION['nao_autenticado']);
                    ?>



                  <form class="row g-3" action="testLogin.php" method="POST" >

                   <!-- <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="username" required>
                         <div class="invalid-feedback">Entre com seu Nome do usuário válido.</div>
                      </div>
                    </div> -->
                    <div class="col-12 " action="cadastro.php" method="POST">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="username" class="form-control" id="username" required>
                      <!-- <div class="invalid-feedback">Entre com seu Senha válido!</div>-->
                    </div><br>

                    <div class="col-12">
                      <label for="senha_user" class="form-label">Senha</label>
                      <input type="password" name="senha_user" class="form-control" id="senha_user" required>
                      <p class="small mb-0 text-end">Esqueceu sua senha? <a href="esqueceusenha.php">Recuperar Senha</a></p>
                      <!-- <div class="invalid-feedback">Entre com seu Senha válido!</div>-->
                    </div>
                    <!--<div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                      </div>
                    </div>-->
                    <div class="col-12">
                      <input class="btn btn-primary w-100" type="submit" name="submit" id="submit" value="Entrar">
                      <!-- <button class="btn btn-primary w-100" type="submit">Entrar</button>-->
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Não possui uma conta? <a href="cadastro.php">Criar uma Conta</a></p>
                    </div>
                  </form>

                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
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