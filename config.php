<?php
session_start();
require_once('conn.php');
error_reporting(0);
ini_set("display_errors", 0 );

if($_SESSION['email'] == True){

  $email_cliente= $_SESSION['email'];
  $busca_email = "SELECT * FROM login WHERE email = '$email_cliente'";
  $resultado_busca = mysqli_query($conn, $busca_email);
  $total_clientes = mysqli_num_rows($resultado_busca);

  while($dados_usuario = mysqli_fetch_array($resultado_busca)){
$email_cliente = $dados_usuario['email'];
$senha_cliente= $dados_usuario['senha'];
$nome_cliente= $dados_usuario['nome'];
$tipo_cliente= $dados_usuario['tipo'];

####formas de pagamento

$dinheiro_cliente= $dados_usuario['dinheiro'];
$pix_cliente= $dados_usuario['pix'];
$cartao_cliente= $dados_usuario['cartao'];
$caderneta_cliente = $dados_usuario['caderneta'];

  }




}else{
  #echo "<meta http-equiv='refresh' content='0;url=login.php'>";   

?>


<script type="text/javascript">
	window.location="login.php";
	</script>


<?php  

}
?>



<!DOCTYPE html>
<html lang="pt">
<title>DELIVERY</title>
  <head>
    <meta charset="utf-8">
  

    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
    <script src="js/responsive-nav.js"></script>
  </head>
  <body>

    <header>
      <a href="index.php" class="logo" data-scroll>DELIVERY</a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item "><a href="index.php" data-scroll>VENDAS</a></li>
          <li class="menu-item"><a href="produtos.php" data-scroll>PRODUTOS</a></li>
          <li class="menu-item"><a href="pedidos.php" data-scroll>PEDIDOS</a></li>
          <li class="menu-item active"><a href="config.php" data-scroll>CONFIGURAÇÕES</a></li>      
          <?php
          if($tipo_cliente == 2){
            ?>
             
          <li class="menu-item"><a href="admin.php" data-scroll>ADMIN</a></li>      
          <?php
          }
          ?>  
          <li class="menu-item"><a href="sair.php" data-scroll>SAIR</a></li>
    
        </ul>
      </nav>
    </header>

    <section id="home">
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      margin: 0 auto;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="password"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
      margin-top: 5px;
    }
    input[type="submit"] {
      padding: 10px;
      background-color: #4CAF50;
      border: none;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
  </style>
</head>
<body>
  <?php
$ok=$_GET['senha'];

if($ok ==True){
  echo "Senha atualizada com sucesso";
}
  ?>
<form method="post" action="senha_up.php" onsubmit="return verificaSenhas()">
  <h1>Adicionar nova senha</h1>
  <label for="senha">Nova senha:</label>
  <input type="password" id="senha" name="senha" required>
  <label for="confirmar_senha">Confirmar senha:</label>
  <input type="password" id="confirmar_senha" name="confirmar_senha" required>
  <input type="submit" value="Adicionar senha">
</form>
<br>
  <form method="post" action="formas_pagamento.php">
  <h2>Formas de pagamento</h2>
  <?php if($_GET['valor'] == True){echo "<b>Valores atualizados</b>";}?>
  <p>Selecione as opções de pagamento disponíveis:</p>
  <input type="checkbox" id="dinheiro" name="dinheiro" <?php if($dinheiro_cliente == 1){echo 'checked';}?> >
  <label for="dinheiro">Dinheiro</label><br>
  <input type="checkbox" id="pix" name="pix" <?php if($pix_cliente == 1){echo 'checked';}?>>
  <label for="pix">PIX</label><br>
  <input type="checkbox" id="cartao" name="cartao" <?php if($cartao_cliente == 1){echo 'checked';}?>>
  <label for="cartao">Cartão</label><br>
  <input type="checkbox" id="caderneta" name="caderneta" <?php if($caderneta_cliente == 1){echo 'checked';}?>>
  <label for="caderneta">Caderneta</label><br>
  <br>
  <input type="submit" value="Salvar">
</form>
  </body>
</html>
<script>
  function verificaSenhas() {
    var senha = document.getElementById("senha").value;
    var confirmar_senha = document.getElementById("confirmar_senha").value;

    if (senha != confirmar_senha) {
      alert("As senhas não são iguais!");
      return false;
    }

    return true;
  }
</script>

  

    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>
  </body>
</html>
