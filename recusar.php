<?php
session_start();
require_once('conn.php');

if($_SESSION['email'] == TRUE){

$email_cliente = $_SESSION['email'];
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

?>


<script type="text/javascript">
	window.location="login.php";
	</script>


<?php

}

?>

<?php

$id_pedido = $_POST['id_pedido'];

##########################################################

$busca_pedido = "SELECT * FROM pedidos WHERE id = '$id_pedido'";
$resultado_pedido = mysqli_query($conn, $busca_pedido);

while($dados_usuario = mysqli_fetch_array($resultado_pedido)){
  $telefone = $dados_usuario['telefone'];
  $nome= $dados_usuario['nome_cliente'];
}

$sql = "UPDATE cliente SET situacao = '' WHERE telefone='$telefone'";
$query = mysqli_query($conn, $sql);
if($query){

#################################################################################

$sql = "DELETE FROM pedidos WHERE id = '$id_pedido'";
$query = mysqli_query($conn, $sql);
if($query){




?>
<script type="text/javascript">
	window.location="pedidos.php";
	</script>

<?php
}}
?>