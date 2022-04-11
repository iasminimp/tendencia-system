<!DOCTYPE html>
 <html>
 <head>
      <title>TEST </title>
 </head>


 <body>
        <h5> TEST</h5>
      <?php
       /* $hg = file_get_contents("https://api.hgbrasil.com/weather?woeid=452041");
        echo $hg;
        echo "<br><br>";*/
        // replace the "demo" apikey below with your own key from https://www.alphavantage.co/support/#XI1QJSWPOJLIN9AZ
        //$json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

       // $json = file_get_contents('https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');

     //$data = json_decode($json,true);

     $json = file_get_contents('https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol=IBM&apikey=XI1QJSWPOJLIN9AZ');
     $data = json_decode($json,true);
    var_dump($data);


    $json = file_get_contents('https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords=tesco&apikey=demo');

$data = json_decode($json,true);

print_r($data);

       echo "* Global Quote <br>";

        $symbol = $data["Global Quote"]["01. symbol"];
        $open = $data["Global Quote"]["02. open"];
        $high = $data["Global Quote"]["03. high"];
        $low = $data["Global Quote"]["04. low"];
        $price = $data["Global Quote"]["05. price"];
        $last_trading = $data["Global Quote"]["07. latest trading day"];
        $prev_close = $data["Global Quote"]["08. previous close"];
        $change = $data["Global Quote"]["09. change"];
        $change_per = $data["Global Quote"]["10. change percent"];
        echo $symbol."<br>";
        echo $open."<br>";
        echo $high."<br>";
        echo $low."<br>";
        echo $price."<br>";
        echo $last_trading."<br>";
        echo $prev_close."<br>";
        echo $change."<br>";
        echo $change_per."<br>";
        /*echo $symbol;
        echo $symbol;*/

        echo "Symbol: ".$symbol."<br>";
        //var_dump($data["Meta Data"]["3. Last Refreshed"]); 
        $last_refreshed = $data["Meta Data"]["3. Last Refreshed"];
        echo "Last Refreshed: ".$last_refreshed."<br>";

        $time_zone = $data["Meta Data"]["4. Time Zone"];
        echo "Time Zone: ".$time_zone."<br>";
        
        //var_dump($data["Time Series (5min)"]); //pegando as informações desse vetor
        $time_series = $data["Weekly Adjusted Time Series"];
        #var_dump($time_series);
        //echo "Time Series: ". $time_series."<br>";
          foreach ($time_series as $ts =>$dados){
               //ts-guarda o nome
               //dados - open, high, low, etc
               echo "<h3> ". $ts . "</h3>";
               foreach ($dados as $nome_ind => $valor ){
                    echo $nome_ind ." : ". $valor."<br>";
               }
          }

       /*foreach($data->  $data["Meta Data"] as $data["Meta Data"]["1. Information"]){
            echo "Informação: ".$data->$data["Meta Data"]["1. Information"]."<br>";
        }*/

        //var_dump($data["Time Series (5min)"]['2022-04-08 19:55:00']); //primeiro elemento do vetor TIME-SERIES

        //var_dump($data);
        exit;



      ?>
 </body>
 </html>