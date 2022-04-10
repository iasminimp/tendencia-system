<?php
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];
    
    
    #sistema - api
    
    $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');
    $data_tree = json_decode($json,true);
        
    //var_dump($data_tree);

    $information_tree = $data_tree["Meta Data"]["1. Information"];
    $symbol_tree = $data_tree["Meta Data"]["2. Symbol"];
    $last_refreshed_tree = $data_tree["Meta Data"]["3. Last Refreshed"];
    $time_zone_tree = $data_tree["Meta Data"]["4. Time Zone"];

    $time_series_tree = $data_tree["Weekly Time Series"];

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - Weekly (Series) </title>
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
  
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <br>  
            <h5 class="card-title text-center">Series Weekly - Meta Data</h5>
              <p>Resultados da API - Weekly Time Series, Meta Data</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meta Data</th>
                    <th scope="col">Conteúdo</th>
                    

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Information</td>
                    <td><?php echo $information_tree;?></td>

                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Symbol</td>
                    <td><?php echo $symbol_tree;?></td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Last Refreshed</td>
                    <td><?php echo $last_refreshed_tree;?></td>

                  </tr>

                  <tr>
                    <th scope="row">4</th>
                    <td>Time Zone</td>
                    <td><?php echo  $time_zone_tree?></td>

                  </tr>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Series  Weekly  - Time Series</h5>
              <p>Resultados da API - Series Weekly,  Weekly Time Series.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Weekly Time Series</th>
                    <th scope="col">Open</th>
                    <th scope="col">High</th>
                    <th scope="col">Low</th>
                    <th scope="col">Close</th>
                    <th scope="col">Volume</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                        $cont_tree=1; #contator
                        #$time_series_tree = array ['Times Series (5min)']
                        #ts = data e hora (2022-04-08 19:55:00)
                        #nome_ind = open, high, low

                        #valor = valor dentro de dados, 127.7900 ...
                        foreach ($time_series_tree as $ts_tree =>$dados_tree){
                    ?>
                    <th scope="row"><?php echo($cont_tree++);?></th>
                        <td><?php echo $ts_tree ?></td>
                    <?php 
                        foreach ($dados_tree as $nome_ind_tree => $valor_tree){ 
                    ?>
                        <td><?php echo $valor_tree;
                        }
                    ?></td>
                    </tr>
                  <?php
                  }                 
                  ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>

      <div class="text-center ">
            <a href="sistema.php" class="btn btn-primary"> Voltar ao Menu</a><br><br>
        </div>
        
        <div class="text-center ">
            <a href="sair.php" class="btn btn-outline-danger"> Sair</a>
        </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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