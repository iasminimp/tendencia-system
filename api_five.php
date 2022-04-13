<?php
    session_start();

    if((!isset($_SESSION['username'])==true) and (!isset($_SESSION['user_senha'])==true)){
        unset($_SESSION['username']);
        unset($_SESSION['senha_user']);       
            
        header('Location: index.php');
    }

    $logado= $_SESSION['username'];
    
    #sistema - api   
    $json = file_get_contents('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');
    $data_quo = json_decode($json,true);

    $symbol_quo = $data_quo["Global Quote"]["01. symbol"];
    $open_quo = $data_quo["Global Quote"]["02. open"];
    $high_quo = $data_quo["Global Quote"]["03. high"];
    $low_quo = $data_quo["Global Quote"]["04. low"];
    $price_quo = $data_quo["Global Quote"]["05. price"];
    $volume_quo = $data_quo["Global Quote"]["06. volume"];
    $last_trading_quo = $data_quo["Global Quote"]["07. latest trading day"];
    $prev_close_quo = $data_quo["Global Quote"]["08. previous close"];
    $change_quo = $data_quo["Global Quote"]["09. change"];
    $change_quo_per = $data_quo["Global Quote"]["10. change percent"];

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - Global Quote  </title>
  <meta content="API - Global Quote" name="description">
  <meta content="global quote" name="keywords">

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
            <h5 class="card-title text-center">Global Quote </h5>
              <p>Resultados da API - Global Quote</p>

              <!-- Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Global Quote</th>
                    <th scope="col">Conteúdo</th>
                  </tr>
                </thead>

               
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Symbol</td>
                    <td><?php echo $symbol_quo;?></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Open</td>
                    <td><?php echo $open_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>High</td>
                    <td><?php echo $high_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Low</td>
                    <td><?php echo $low_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Price</td>
                    <td><?php echo $price_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Volume</td>
                    <td><?php echo  $volume_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Latest Trading Day</td>
                    <td><?php echo  $last_trading_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Previous close</td>
                    <td><?php echo  $prev_close_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Change</td>
                    <td><?php echo $change_quo;?></td>

                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Change Percent</td>
                    <td><?php echo $change_quo_per;?></td>

                  </tr>
                </tbody>
              </table>
              <!-- End Table -->

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