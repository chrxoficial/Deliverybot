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

$prod_gas = $dados_usuario['prod_gas'];
$prod_agua= $dados_usuario['prod_agua'];


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


<?php
$adm = 0;

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
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
          <li class="menu-item active"><a href="index.php" data-scroll>VENDAS</a></li>
          <li class="menu-item"><a href="produtos.php" data-scroll>PRODUTOS</a></li>
          <li class="menu-item"><a href="pedidos.php" data-scroll>PEDIDOS</a></li>
          <li class="menu-item"><a href="config.php" data-scroll>CONFIGURAÇÕES</a></li>
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
      
      h1 {
        margin-bottom: 10px;
      }
      
      table {
        width: 100%;
        margin-top: 10px;
        border-collapse: collapse;
      }
      
      th,
      td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      
      th {
        background-color: #eee;
      }
      
      td:first-child {
        font-weight: bold;
      }
    </style>
  </head>
  <body>


<?php
  #$email_cliente= $_SESSION['email'];
  $busca_pedidos = "SELECT * FROM pedidos WHERE status = 'enviado' AND email_painel = '$email_cliente'";
  $resultado_pedidos = mysqli_query($conn, $busca_pedidos);
  $total_pedidos = mysqli_num_rows($resultado_pedidos);

  while($dados_pedidos = mysqli_fetch_array($resultado_pedidos)){
$nome_pedidos = $dados_pedidos['nome_cliente'];
$telefone_pedidos = $dados_pedidos['telefone'];
$endereco_pedidos = $dados_pedidos['endereco'];
$quant_gas_pedidos = $dados_pedidos['quant_gas'];
$quant_agua_pedidos = $dados_pedidos['quant_agua'];
$forma_pagamento_pedidos = $dados_pedidos['forma_pagamento'];
$status_pedidos = $dados_pedidos['status'];
$data_hora_pedidos = $dados_pedidos['data_hora'];
$email_painel_pedidos = $dados_pedidos['email_painel'];
?>


    <form>
      <h1>Detalhes da venda</h1>

     
      <table>
      <tr>
          <td>Cliente.</td>
          <td><?php echo "$nome_pedidos";?></td>
        </tr>
        <tr>
          <td>Telefone</td>
          <td><?php echo "$telefone_pedidos";?></td>
        </tr>
        <tr>
          
        <tr>
          <td>Água Quant.</td>
          <td><?php echo "$quant_agua_pedidos";?></td>
        </tr>
        <tr>
          <td>Gás Quant.</td>
          <td><?php echo "$quant_gas_pedidos";?></td>
        </tr>
        <tr>
          <td>Data:</td>
          <td> <?php echo $data_brasil =date('d/m/Y', strtotime($data_hora_pedidos)) ; ?></td>
        </tr>
        <tr>
          <td>Hora:</td>
          <td><?php echo $data_brasil =date('H:i:s', strtotime($data_hora_pedidos));?> </td>
        </tr>
        <tr>
          <td>Forma de pagamento</td>
          <td><?php echo $forma_pagamento_pedidos;?> </td>
        </tr>
        <tr>
          <td>Valor:</td>
          <td>R$ <?php
          $total_gas = $prod_gas * $quant_gas_pedidos;
          $total_agua = $prod_agua * $quant_agua_pedidos;


          $total_gasto = $total_gas + $total_agua;
          echo $total_gasto ;

          
          ?></td>
        </tr>
      </table>
    </form>
<br>
<br>
    <?php

    }
?>
  </body>
</html>
    </section>

  

    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>
  </body>
</html>
