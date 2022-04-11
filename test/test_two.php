<!DOCTYPE html>
 <html>
 <head>
      <title>TEST </title>
 </head>


 <body>
        <h5> Search Endpoint</h5>
      <?php
       /* $hg = file_get_contents("https://api.hgbrasil.com/weather?woeid=452041");
        echo $hg;
        echo "<br><br>";*/
        // replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#XI1QJSWPOJLIN9AZ
        //$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

       // $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

     //$data = json_decode($json,true);
     /*$json = file_get_contents('https://www.alphavantage.co/query?function=INCOME_STATEMENT&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

     $data = json_decode($json,true);*/

     $json = file_get_contents('https://www.alphavantage.co/query?function=BALANCE_SHEET&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

     $data = json_decode($json,true);
     
     
     var_dump($data);

      /* echo " Search Endpoint <br>";

        $best_vet= $data["bestMatches"];
          foreach ($best_vet as $ts =>$dados){
               echo "<h3> ". $ts . "</h3>";
               foreach ($dados as $nome_ind => $content ){
                    echo $nome_ind ." : ". $content."<br>";
               }
          }*/

        exit;



      ?>
 </body>
 </html>