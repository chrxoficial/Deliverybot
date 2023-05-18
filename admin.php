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

if($tipo_cliente == '1'){
  echo "<meta http-equiv='refresh' content='0;url=index.php'>"; 

}

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
  <head>

    <title>DELIVERY</title>
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
          <li class="menu-item "><a href="config.php" data-scroll>CONFIGURAÇÕES</a></li>      
          <?php
          if($tipo_cliente == 2){
            ?>
             
          <li class="menu-item active"><a href="admin.php" data-scroll>ADMIN</a></li>      
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

<style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        /* Mobile first queries */
        @media (max-width: 600px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<form method="post" action="">
  <h1>Buscar Usuário</h1>
  <input type="radio" id="opcao_nome" name="opcao_busca" value="nome" checked>
  <label for="opcao_nome">Buscar por nome:</label>
  <input type="text" id="nome_usuario" name="nome_usuario">
  <br>
  <input type="radio" id="opcao_todos" name="opcao_busca" value="todos">
  <label for="opcao_todos">Listar todos:</label>
  <br>
  <input type="submit" value="Buscar">
</form>
<br>
<?php
#print_r($_REQUEST);
#$nome_usuario  [nome_usuario] => victor )

#opcao_busca  [opcao_busca] => todos )
$nome_usuario = $_POST['nome_usuario']; 
$opcao_busca = $_POST['opcao_busca']; 
?>

<?php


$busca_usuarios = "SELECT * FROM login WHERE nome = '$nome_usuario'";
$resultado_busca = mysqli_query($conn, $busca_usuarios);
$total_clientes = mysqli_num_rows($resultado_busca);




while($dados_usuario = mysqli_fetch_array($resultado_busca)){
$id_cliente = $dados_usuario['id'];  
$email_cliente = $dados_usuario['email'];
$senha_cliente= $dados_usuario['senha'];
$nome_cliente= $dados_usuario['nome'];
$tipo_cliente= $dados_usuario['tipo'];
$status_cliente = $dados_usuario['status'];

?>

<!-- Formulário de habilitar e desabilitar -->
<form method="post" action="config2.php">

  <h2>Usuário encontrado:<?php echo "<b>$total_clientes</b>";?></h2>
  <p>Nome: <?php echo $nome_cliente;?></p>
  <p>Email: <?php echo $email_cliente;?> </p>
  <input name="id_usuario" type="hidden" id="id_usuario"  value="<?php echo "$id_cliente";?>">
  <p>Status: Ativo</p>
  <label>
    <input type="radio" name="status" value="ativo" <?php if($status_cliente == 'ativo'){echo  'checked' ;}?>> Ativar
  </label>
  <label>
    <input type="radio" name="status" value="inativo"  <?php if($status_cliente == 'inativo'){echo  'checked' ;}?>> Desativar
  </label>
  <input type="submit" value="Salvar">
</form>
<br>
<?php
}

?>
<?php
if($opcao_busca == 'todos' ){

  $busca_usuarios = "SELECT * FROM login ";
  $resultado_busca = mysqli_query($conn, $busca_usuarios);
  $total_clientes = mysqli_num_rows($resultado_busca);
  
  
  
  
  while($dados_usuario = mysqli_fetch_array($resultado_busca)){
  $id_cliente = $dados_usuario['id'];  
  $email_cliente = $dados_usuario['email'];
  $senha_cliente= $dados_usuario['senha'];
  $nome_cliente= $dados_usuario['nome'];
  $tipo_cliente= $dados_usuario['tipo'];
  $status_cliente = $dados_usuario['status'];


?>

<form method="post" action="config2.php">

  <h2>Usuário encontrado:<?php echo "<b>$total_clientes</b>";?></h2>
  <p>Nome: <?php echo $nome_cliente;?></p>
  <p>Email: <?php echo $email_cliente;?> </p>
  <input name="id_usuario" type="hidden" id="id_usuario"  value="<?php echo "$id_cliente";?>">

  <p>Status: Ativo</p>
  <label>
    <input type="radio" name="status" value="ativo" <?php if($status_cliente == 'ativo'){echo  'checked' ;}?>> Ativar
  </label>
  <label>
    <input type="radio" name="status" value="inativo" <?php if($status_cliente == 'inativo'){echo  'checked' ;}?>> Desativar
  </label>
  <input type="submit" value="Salvar">
</form>
<br>


<?php
  }








}


?>




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
