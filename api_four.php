<?php
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];
    
    
     #sistema - api   
     $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');
     $data_four = json_decode($json,true);

     $information_four = $data_four["Meta Data"]["1. Information"];
     $symbol_four = $data_four["Meta Data"]["2. Symbol"];
     $last_refreshed_four = $data_four["Meta Data"]["3. Last Refreshed"];
     $time_zone_four = $data_four["Meta Data"]["4. Time Zone"];
     $time_series_four = $data_four["Monthly Time Series"];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - Monthly (Series) </title>
  <meta content="API - Monthly (Series)" name="description">
  <meta content="Monthly Series" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS -->
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
  
  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <br>  
            <h5 class="card-title text-center">Series Monthly  - Meta Data</h5>
              <p>Resultados da API - Monthly Time Series, Meta Data</p>

              <!-- Table  -->
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
                    <td><?php echo $information_four;?></td>

                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Symbol</td>
                    <td><?php echo $symbol_four;?></td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Last Refreshed</td>
                    <td><?php echo $last_refreshed_four;?></td>

                  </tr>

                  <tr>
                    <th scope="row">4</th>
                    <td>Time Zone</td>
                    <td><?php echo  $time_zone_four?></td>

                  </tr>
                </tbody>
              </table>
              <!-- End Table-->

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
              <h5 class="card-title text-center">Series  Monthly  - Time Series</h5>
              <p>Resultados da API - Series Monthly,  Monthly Time Series.</p>

              <!-- Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Monthly Time Series</th>
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
                        $cont_four=1; #contator
                        #$time_series_four = array ['Times Series (5min)']
                        #ts = data e hora (2022-04-08 19:55:00)
                        #nome_ind = open, high, low

                        #valor = valor dentro de dados, 127.7900 ...
                        foreach ($time_series_four as $ts_four =>$dados_four){
                    ?>
                    <th scope="row"><?php echo($cont_four++);?></th>
                        <td><?php echo $ts_four ?></td>
                    <?php 
                        foreach ($dados_four as $nome_ind_four => $valor_four){ 
                    ?>
                        <td><?php echo $valor_four;
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