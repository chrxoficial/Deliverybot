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

#gas e agua

$gas_cliente= $dados_usuario['prod_gas'];
$agua_cliente= $dados_usuario['prod_agua'];

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
    </style>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <title>DELIVERY</title>
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
          <li class="menu-item active"><a href="produtos.php" data-scroll>PRODUTOS</a></li>
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
    <body>
        <div align='center'>
    <form id="form1" name="form1" method="post" action="pordutos_up.php">
      <table>
        <tr>
          <th>Produtos</th>
          <th>Valores</th>
        </tr>
        <tr>
          <td>Botijão Gás</td>
          <td><br>
          <input type="number" name="gas" value='<?php echo "$gas_cliente";?>' id="gas" step="0.01" min="0.00" max="9999.99" lang="pt-BR" style="text-align: right; direction: rtl;" />

          </td>
        </tr>
        <tr>
          <td>Galão de Água</td>
          <td><br>
          <input type="number" value='<?php echo "$agua_cliente";?>' name="agua" id="agua" step="0.01" min="0.00" max="9999.99" lang="pt-BR" style="text-align: right; direction: rtl;" />

          </td>
        </tr>
        <tr>
          <td colspan="2">
            <input type="submit" name="button" id="button" value="Salvar" />
          </td>
        </tr>
      </table>
    </form>
  </body>
    </div>
    </section>

  

    <script src="js/fastclick.js"></script>
    <script src="js/scroll.js"></script>
    <script src="js/fixed-responsive-nav.js"></script>
  </body>
</html>
