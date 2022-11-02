<?php
$sts = "";
$err = "";

if (empty($_REQUEST['nome'])) {
    $sts = "error";
    $err .= "N";
}
if (empty($_REQUEST['telefone'])) {
    $sts = "error";
    $err .= "T";
}
if($sts != "error"){
	$nome = filter_var($_REQUEST['nome'],FILTER_SANITIZE_STRING);
	$telefone = filter_var($_REQUEST['telefone'],FILTER_SANITIZE_STRING);
    $email = filter_var($_REQUEST['email'],FILTER_SANITIZE_STRING);
	$mensagem = filter_var($_REQUEST['mensagem'],FILTER_SANITIZE_STRING);
    $pdo = new PDO('mysql:host=localhost;dbname=postMsg', "root", "");
    $query = $pdo->prepare("INSERT INTO contatos (nome, telefone, email, mensagem) VALUES (?,?,?,?)");
    try{
        if($query->execute([$nome, $telefone, $email, $mensagem])){
            echo("S");
        }
    }catch (Exception $e){
        echo("Algo deu Errado");
    }
}else{
    echo("Algo deu Errado");
}