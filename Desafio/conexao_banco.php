<?php
    $servername = "localhost";                                                                                                                                      
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password);

    // crate conexao
    if($conn->connect_error){
        die("Falha na conexao: " . $conn->connect_error);
    }else{
         // echo "conexao sucedida<br><br>";
        $conn->select_db("brickup"); //nome do banco
    }

?>
