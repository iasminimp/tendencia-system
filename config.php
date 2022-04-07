<?php

    $dbHost = 'Localhost';
    $dbUsername= 'root';
    $dbPassWord='';
    $dbName='tendencia_bd';

    $conexao = new mysqli( $dbHost, $dbUsername,$dbPassWord,$dbName);

    #verificação de conexão
    if($conexao->connect_errno){
        echo "Erro";
    }else{
        echo "Conexão efetuada com sucesso";
    }


?>