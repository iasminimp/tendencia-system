<?php 
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];


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
        <h5 class="card-title text-center pb-0 fs-4">Entrou no Painel do System - Tendências </h5>
        <p class="text-center">Seja Bem Vindo <u><?php echo $logado; ?> </u></p>
        <p class="text-center">Selecione a API que deseja consultar:</p>
        <div class="text-center ">
            <a href="api_one.php" class="btn btn-primary"> Intraday</a><br><br>
        </div>
        <div class="text-center ">
            <a href="api_dois.php" class="btn btn-primary"> Daily</a><br><br>
        </div>
        <div class="text-center ">
            <a href="api_tres.php" class="btn btn-primary"> Weekly</a><br><br>
        </div>
        
        <div class="text-center ">
            <a href="api_four.php" class="btn btn-primary"> Monthly</a><br><br>
        </div>

        <div class="text-center ">
            <a href="api_five.php" class="btn btn-primary"> Global Quote </a><br><br>
        </div>

        <div class="text-center ">
            <a href="api_six.php" class="btn btn-primary"> Symbol Search - Best Matches </a><br><br>
        </div>
        
        
        
        <div class="text-center ">
            <a href="sair.php" class="btn btn-outline-danger"> Sair</a>
        </div>

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