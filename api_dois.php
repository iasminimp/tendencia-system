<?php
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];
  
    #sistema - api
   
    $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');
    $data_two = json_decode($json,true);

    $information_two = $data_two["Meta Data"]["1. Information"];
    $symbol_two = $data_two["Meta Data"]["2. Symbol"];       
    $last_refreshed_two = $data_two["Meta Data"]["3. Last Refreshed"];

    $out_size_two = $data_two["Meta Data"]["4. Output Size"];
    $time_zone_two = $data_two["Meta Data"]["5. Time Zone"];
    

    $time_series_two = $data_two["Time Series (Daily)"];

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - Daily (Series) </title>
  <meta content="API - Daily Series" name="description">
  <meta content="daily" name="keywords">

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
            <h5 class="card-title text-center">Series Daily - Meta Data</h5>
              <p>Resultados da API - Series Daily, Meta Data</p>

              <!-- Table-->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Meta Data</th>
                    <th scope="col">Conte??do</th>
                    

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Information</td>
                    <td><?php echo $information_two;?></td>

                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Symbol</td>
                    <td><?php echo $symbol_two;?></td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Last Refreshed</td>
                    <td><?php echo $last_refreshed_two;?></td>

                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Output Size</td>
                    <td><?php echo $out_size_two;?></td>

                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Time Zone</td>
                    <td><?php echo  $time_zone_two?></td>

                  </tr>
                </tbody>
              </table>
              <!-- End Table  -->

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
              <h5 class="card-title text-center">Series Daily - Time Series</h5>
              <p>Resultados da API - Series Daily, Time Series (Daily).</p>

              <!-- Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Time Series (Daily)</th>
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
                        $cont_two=1; #contator
                        #$time_series_two = array ['Times Series (5min)']
                        #ts = data e hora (2022-04-08 19:55:00)
                        #nome_ind = open, high, low

                        #valor = valor dentro de dados, 127.7900 ...
                        foreach ($time_series_two as $ts_two =>$dados_two){
                    ?>
                    <th scope="row"><?php echo($cont_two++);?></th>
                        <td><?php echo $ts_two ?></td>
                    <?php 
                        foreach ($dados_two as $nome_ind_two => $valor_two){ 
                    ?>
                        <td><?php echo $valor_two;
                        }
                    ?></td>
                    </tr>
                  <?php
                  }                 
                  ?>

                </tbody>
              </table>
              <!-- End Table -->

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

  </main>



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS  -->
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