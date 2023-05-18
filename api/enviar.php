<?php
require_once('../conn.php');
$usuario_get = $_GET['usuario'];

error_reporting(0);
ini_set("display_errors", 0 );

$busca_cliente = "SELECT * FROM envios WHERE usuario = '$usuario_get' AND status = '1' ORDER BY id DESC";
$cliente = mysqli_query($conn, $busca_cliente);

while($dados_cliente = mysqli_fetch_array($cliente)){
    $id = $dados_cliente['id'];
    $telefone = $dados_cliente['telefone'];
    $msg = $dados_cliente['msg'];
}



$n= '.n.';

if(  $telefone == True){

    echo "enviando $n $id $n $telefone $n $msg";

}

//

?>

<?php



date_default_timezone_set('America/Sao_Paulo');
$now = time();

$data_hora = date('Y-m-d H:i:s', $now);

$data_hora_limite = date('Y-m-d H:i:s',strtotime('-30 minutes', $now));


$busca_pedido = "SELECT * FROM pedidos WHERE data_hora < '$data_hora_limite' AND status !=  'enviado' AND email_painel = '$usuario_get'";
$resultado_pedido = mysqli_query($conn, $busca_pedido);

while($dados_usuario = mysqli_fetch_array($resultado_pedido)){
    $id_pedido = $dados_usuario['id'];  
    $telefone = $dados_usuario['telefone'];
    $nome= $dados_usuario['nome_cliente'];
  }
  
if($id_pedido == TRUE){

    $msg = "Olá $nome, seu atendimento foi encerrado, por inatividade"; 

$sql = "INSERT INTO envios (telefone, msg , status,usuario) VALUES ('$telefone','$msg' , '1' ,'$usuario_get')";
$query = mysqli_query($conn,$sql);
if($query){

    $sql = "UPDATE cliente SET situacao = '' WHERE telefone='$telefone'";
    $query = mysqli_query($conn, $sql);


    $sql = "DELETE FROM pedidos WHERE id = '$id_pedido'";
    $query = mysqli_query($conn, $sql);

}



}
