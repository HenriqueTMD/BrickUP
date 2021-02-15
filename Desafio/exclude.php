<?php

    include('conexao_banco.php');

    print_r($_POST);

    if($_GET['mode']== 'exclude'){
        $id = $_GET['ID'];

        $sql = "DELETE FROM tarefas WHERE ID=$id";
        $conn->query($sql);
    }else if($_POST['mode']=='insert'){
        $descricao          = $_POST['Descricao'];
        $titulo             = $_POST['Titulo'];
        $data               = $_POST['DataEntrega'];
        $prioridade         = $_POST['Prioridade'];
        $hora               = $_POST['HoraEntrega'];
        $stat               = $_POST['Stat'];

        $sql = "INSERT INTO tarefas (Titulo, Descrição, DataEntrega, HoraEntrega, Prioridade, Stat) values ('$titulo', '$descricao', '$data', '$hora', $prioridade, 0)";
    }
       
        $conn->query($sql);
    
    $conn->close();
    header("location: Adicionar.php");
    exit();
?>