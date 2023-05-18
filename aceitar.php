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

$busca_pedido = "SELECT * FROM pedidos WHERE id = '$id_pedido'";
$resultado_pedido = mysqli_query($conn, $busca_pedido);

while($dados_usuario = mysqli_fetch_array($resultado_pedido)){
  $telefone = $dados_usuario['telefone'];
  $nome= $dados_usuario['nome_cliente'];
}
#####################################################################################

$sql = "UPDATE pedidos SET status = 'enviado' WHERE '$id_pedido'";
$query = mysqli_query($conn, $sql);
if($query){
$msg = "Olá $nome, seu pedido foi aprovado e já estamos preparando a entrega 🚚💨"; 
$sql = "INSERT INTO envios (telefone, msg , status,usuario) VALUES ('$telefone','$msg' , '1' ,'$email_cliente')";
$query = mysqli_query($conn,$sql);
if($query){
  $sql = "UPDATE cliente SET situacao = '' WHERE telefone='$telefone'";
  $query = mysqli_query($conn, $sql);
?>
<script type="text/javascript">
	window.location="pedidos.php";
	</script>



<?php


}

}