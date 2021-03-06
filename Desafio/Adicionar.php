<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brick UP</title>
   <link rel="stylesheet" href="CSS/style_Adicionar.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
 </head>

 <body>

  <input type="checkbox" id="check">

  <header>
    <label for="check">
      <i class="fas fa-bars" id="sidebar_btn"></i>
    </label>
    <div class="left_area">
      <h3><span>BrickUP</span></h3>
    </div>
    <div class="rigth_area">
      <a href="g" class="logout_btn">Logout</a>
    </div>
  </header>

  <div class="mobile_nav">
    <div class="nav_bar">
      <img src="Imagens/1.jpg" class="mobile_profile_image" alt="">
      <h4>Henrique</h4>
      <label for="check">
        <i class="fas fa-bars nav_btn" id="nav_btn"></i>
      </label>
    </div>
    <div class="mobile_nav_items">
      <a class ="op1" href="Adicionar.php"><i class="far fa-calendar-plus"></i><span>Adicionar Tarefas</span></a>
      <a class ="op2" href="Principal.php"><i class="far fa-calendar-alt"></i><span>Todas</span></a>
      <a class ="op3" href="Pendentes.php"><i class="far fa-calendar"></i><span>Pendentes</span></a>
      <a class ="op4" href="Finalizadas.php"><i class="far fa-calendar-check"></i><span>Finalizadas</span></a>
    </div>
  </div>

  <div class="sidebar">
    <div class="profile_info">
      <img src="Imagens/1.jpg" class="profile_image" alt="">
      <h4>Henrique</h4>
    </div>
    <a class ="op1" href="Adicionar.php"><i class="far fa-calendar-plus"></i><span>Adicionar Tarefas</span></a>
    <a class ="op2" href="Principal.php"><i class="far fa-calendar-alt"></i><span>Todas</span></a>
    <a class ="op3" href="Pendentes.php"><i class="far fa-calendar"></i><span>Pendentes</span></a>
    <a class ="op4" href="Finalizadas.php"><i class="far fa-calendar-check"></i><span>Finalizadas</span></a>
  </div>

  <div class="content">

    <form id="register-form" action="exclude.php" method="POST" name="register-form" enctype="multipart/form-data">
      <?php
        include('conexao_banco.php');
        if($_GET['idTarefas'] != '' && $_GET['mode'] == 'update'){
          $id = $_GET['idTarefas'];
          $sql = "SELECT * FROM tarefas WHERE ID=$id";

          $result = $conn->query($sql);

          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              $id                     = $row["idTarefas"];
              $titulo                 = $row["Titulo"];
              $descricao              = $row["Descrição"];
              $data                   = $row["DataEntrega"];
              $hora                   = $row["HoraEntrega"];
              $prioridade             = $row["Prioridade"];
              $stat                   = $row["Stat"];
            }
          }

          echo "  <div id='main-container'>
            <h1>Adicionar Tarefa</h1>
            <div class='full-box'>
              <label for='titulo'>Título:</label>
              <input type='text' name='titulo' id='titulo' value='$titulo' >
            </div>
            <div class='full-box'>
              <label for='descricao'>Descrição:</label>
              <input type='text' name='descricao' id='descricao' value='$descricao' >
            </div>
            <div class='half-box spacing'>
              <label for='date'>Data:</label>
              <input type='date' name='data' id='data' value= '$data' >
            </div>
            <div class='half-box spacing'>
              <label for='timestamp'>Hora:</label>
              <input type='timestamp' name='hora' id='hora' value= '$hora' >
            </div>
            <div class='half-box'>
              <label for='prioridade'>Prioridade:</label>
              <select name='prioridade' id='prioridade'>
                $prioridade
              </select>
            </div>
            <div class='full-box'>
              <input id='btn-submit' type='button' onclick='fnSubmit();' value='update'>
            </div>
            <p class='error-validation template'></p>
              <input type='hidden' id='ID' name='ID' value ='$id'>
              <input type='hidden' id='mode' name='mode' value ='update'>";
        }else{
          echo "
            <div id='main-container'>
              <h1>Adicionar Tarefa</h1>
              <div class='full-box'>
                <label for='titulo'>Título:</label>
                <input type='text' name='titulo' id='titulo' value='' >
              </div>
              <div class='full-box'>
                <label for='descricao'>Descrição:</label>
                <input type='text' name='descricao' id='descricao' value='' >
              </div>
              <div class='half-box spacing'>
                <label for='date'>Data:</label>
                <input type='date' name='date' id='date' value= '' >
              </div>
              <div class='half-box spacing'>
                <label for='timestamp'>Hora:</label>
                <input type='timestamp' name='hora' id='hora' value= '' >
              </div>
              <div class='half-box'>
                <label for='prioridade'>Prioridade:</label>
                <select name='prioridade' id='prioridade'>
                </select>
              </div>
              <input type='hidden' id='ID' name='ID' value=''>
              <input type='hidden' id='mode' name='mode' value='insert'>
              <div class='full-box'>
                <input id='btn-submit' type='button' onclick='fnSubmit();' value='insert'>  
              </div>
              <p class='error-validation template'></p>";
          }
          $conn->close();
      ?> 
      </form>

  </div>

 </body>

 <script>
    dropdown();
    function dropdown() {
      var vetor = ["1","2","3","4","5","6","7","8","9","10"];
      for(var i=0;i<10;i++){
        var x = document.getElementById('prioridade');
        var option = document.createElement('option');
        option.text = vetor[i];
        option.value = vetor[i];
        x.add(option, x[i]);
      }
    }

    function fnSubmit(){
      document.getElementById('register-form').submit();
    }

  </script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
</script>

 </body>
</html>
      