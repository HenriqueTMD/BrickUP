<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Brick UP</title>
   <link rel="stylesheet" href="CSS/style_Principal.css">
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
    <table class="list">
      <ul class="list">

      <?php

      include('conexao_banco.php');

      $sql = "SELECT * FROM tarefas";

      $result = $conn->query($sql);

      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
              $id                 = $row["idTarefas"];
              $titulo             = $row["Titulo"];
              $descricao          = $row['Descrição'];
              $data               = $row["DataEntrega"];
              $hora               = $row["HoraEntrega"];
              $prioridade         = $row["Prioridade"];
              $status             = $row["Stat"];
              $arquivo            = $row["Arquivo"];

              echo " 
                <li>
                  <a href='#' class = 'a$status'>
                    <h2>$titulo</h2>
                    <p class = 'desc'>$descricao</p>
                    <p class = 'date'>$data</p>
                    <p class = 'hour'>$hora</p>
                    <p class = 'prio'>$prioridade</p>
                  </a>
                </li>
              ";

          }
      }
      $conn->close();
      ?>
      
    </ul>

  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.nav_btn').click(function(){
        $('.mobile_nav_items').toggleClass('active');
      });
    });
  </script>

 </body>
</html>
      