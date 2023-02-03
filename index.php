<?php

// abri a conexão fora no início para atender a session

include('conexao.php');

// iniciar a session
if(!isset($_SESSION)) session_start();
// verificar se a variavel existe
if(!isset($_SESSION['usuario'])) 
    die('Voce  está logado. <a href="home.php">Clique aqui</a> para navegar.');

if(isset($_POST['email'])){
    
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $mysqli->query("INSERT INTO login (email, senha) VALUES ('$email','$senha')");
}

// capturando o id
$id = $_SESSION['usuario'];
// fazendo a consulta do id
$sql_query = $mysqli->query("SELECT * FROM senhas WHERE id = '$id'") or die($mysqli->error);
// vinculando o usuario
$usuario = $sql_query->fetch_assoc();
?>



