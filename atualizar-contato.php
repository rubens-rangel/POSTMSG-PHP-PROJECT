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
if (empty($_REQUEST['email'])) {
    $sts = "error";
    $err .= "T";
}
if (empty($_REQUEST['mensagem'])) {
    $sts = "error";
    $err .= "T";
}
if (empty($_REQUEST['id'])) {
    $sts = "error";
    $err .= "I";
}
if($sts != "error"){
    $pdo = new PDO('mysql:host=localhost;dbname=postMsg', "root", "");
    $query = $pdo->prepare("UPDATE contatos SET nome=?, telefone=?, email=?, mensagem=? WHERE id=?");
    try{
        if($query->execute([$_REQUEST['nome'], $_REQUEST['telefone'], $_REQUEST['email'], $_REQUEST['mensagem'], $_REQUEST['id']])){
            header("Location: atualizacao-sucesso.php");
        }
    }catch (Exception $e){
        header("Location: devolucao-error.php?err=".$e);
    }
}else{
    header("Location:  devolucao-error.php?err=".$err);
}