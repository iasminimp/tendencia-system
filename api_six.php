<?php
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];
      
    #sistema - api
    $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=tesco&apikey=XI1QJSWPOJLIN9AZ');
    $data = json_decode($json,true);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - SYMBOL SEARCH  </title>
  <meta content="API - Symbol Search" name="description">
  <meta content="Symbol Search" name="keywords">

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

  <!-- Main CSS -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
  
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <br>  
            <h5 class="card-title text-center">Symbol Search - Best Matches </h5>
              <p>Resultados da API Symbol Search - Best Matches </p>

              <!-- Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Symbol</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Region</th>
                    <th scope="col">Market Open</th>
                    <th scope="col">Market Close</th>
                    <th scope="col">Timezone</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Match Score</th>
                    
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <?php
                        $cont_six=1; #contator
                        #$time_series_tree = array ['Times Series (5min)']
                        #ts = data e hora (2022-04-08 19:55:00)
                        #nome_ind = open, high, low

                        #valor = valor dentro de dados, 127.7900 ...
                        $best_vet_six= $data["bestMatches"];
                        foreach ($best_vet_six as $ts_six =>$dados_six){
                    ?>
                    <th scope="row"><?php echo($cont_six++);?></th>
                       
                    <?php 
                       foreach ($dados_six as $nome_ind => $content ){ 
                    ?>
                        <td><?php echo $content;
                        }
                    ?></td>
                    </tr>
                  <?php
                  }                 
                  ?>

                </tbody>


              </table>
              <!-- End Table  -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section">
      <div class="text-center ">
            <a href="sistema.php" class="btn btn-primary"> Voltar ao Menu</a><br><br>
        </div>
        
        <div class="text-center ">
            <a href="sair.php" class="btn btn-outline-danger"> Sair</a>
        </div>
    </section>

  </main>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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