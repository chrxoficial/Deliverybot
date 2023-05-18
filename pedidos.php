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
  
  table {
    width: 100%;
  }
  
  th,
  td {
    padding: 10px;
    text-align: left;
  }
  
  th {
    background-color: #eee;
  }
  
  tr:nth-child(odd) {
    background-color: #f2f2f2;
  }
  
  tr:nth-child(even) {
    background-color: #d9d9d9;
  }
  
  input[type="text"] {
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
  
  .recusar-btn {
    background-color: #ff0000;
    color: #fff;
  }
</style>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>DELIVERY</title>
    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/styles.css">
   
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
          <li class="menu-item "><a href="produtos.php" data-scroll>PRODUTOS</a></li>
          <li class="menu-item active"><a href="pedidos.php" data-scroll>PEDIDOS</a></li>
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
    <body>
<?php

$busca_pedidos = "SELECT * FROM pedidos WHERE status = 'aguardando' AND email_painel = '$email_cliente'";
$resultado_pedidos = mysqli_query($conn, $busca_pedidos);
$total_pedidos = mysqli_num_rows($resultado_pedidos);
#echo $total_pedidos;
while($dados_pedidos = mysqli_fetch_array($resultado_pedidos)){
  $id_pedido = $dados_pedidos['id'];
$nome_cliente = $dados_pedidos['nome_cliente'];
$id_cliente= $dados_pedidos['id_cliente'];
$telefone_cliente= $dados_pedidos['telefone'];
$endereco_cliente= $dados_pedidos['endereco'];
$quant_gas_cliente = $dados_pedidos['quant_gas'];
$quant_agua_cliente= $dados_pedidos['quant_agua'];
$forma_pagamento_cliente= $dados_pedidos['forma_pagamento'];
$status_cliente= $dados_pedidos['status'];
$data_hora_cliente= $dados_pedidos['data_hora'];
$email_painel= $dados_pedidos['email_painel'];

?>


        <div align='center'>
        <form id="form1" name="form1" method="post" action="">
  <table width="80%" border="0">
    <tr>
      <td colspan="2"><div align="center"><H1>NOVO PEDIDO</H1></div></td>
    </tr>
    <tr>
      <td><div align="center"><b>PRODUTO</b></div></td>
      <td><div align="center"><b>QUANTIDADE</b></div></td>
    </tr>
    <tr>
      <td><br><div align="center">GÁS</div></td>
      <td><div align="center"><?php echo "$quant_gas_cliente";?></div></td>
    </tr>
    <tr>
      <td><br><div align="center">ÁGUA</div></td>
      <td><div align="center"><?php echo "$quant_agua_cliente";?></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><b>CLIENTE:</b></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><?php echo "<b>$nome_cliente</b>  $telefone_cliente";?> </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><b>ENDEREÇO<b></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><?php echo "$endereco_cliente";?></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><b>FORMA DE PAGAMENTO<b></div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><?php echo "$forma_pagamento_cliente";?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>
        <label>
          <div align="center">
            <input type="hidden" name="id_pedido" id="id_pedido" value=<?php echo  "$id_pedido";?> />
            <input type="submit" name="button" id="button" value="ACEITAR" formaction="aceitar.php" />
          </div>
        </label>
      </td>
      <td>
        <label>
          <div align="center">
        <input type="submit" name="recusar" style="background-color: red;" id="button" value="RECUSAR" formaction="recusar.php" />

      
          </div>
        </label>
      </td>
    </tr>
  </table>
</form>





    </div>

<br>
<br>

    <?php
}
#####################################################################################
?>
    </section>



    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>
  </body>
</html>

<meta http-equiv="refresh" content="10">
