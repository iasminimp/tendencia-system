<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>API - Test</title>
    </head>
    <body>
        <?php
        $url = "https://swapi.dev/api/people/?page=2"; #url da api
        $ch = curl_init($url); #iniciando o curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);#converte para um vetor e nao um texto unico, os resultados
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);#verificar a ssl -> texto unico, como resultado;
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");  #tipo de requisição, metodo get (visualizar/ listar);
        $resultado = json_decode(curl_exec($ch)); #atribuindo a decodificação do json para um variavel chamada resultado

        var_dump($resultado);

        foreach ($resultado->results as $ator) { #procurando em results pela variavel ator
            //var_dump($ator);
            echo "Nome: " . $ator->name . "<br>"; #pega o nome do autor
            echo "Altura: " . $ator->height . "<br>"; #pega a altura do autor
            
            foreach ($ator->films as $filme) { #mais de um filme, procura (no array ator) e imprime os filmes que aquele autor participou
                echo "Filme: " . $filme . "<br>";
            }        
            echo "<hr>";
        }
        ?>
    </body>
</html>
