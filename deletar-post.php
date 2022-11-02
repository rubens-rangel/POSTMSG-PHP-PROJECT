<?php
$pdo = new PDO('mysql:host=localhost;dbname=postMsg', "root", "");
$query = $pdo->prepare("DELETE FROM contatos WHERE id = ?");
try {
    if ($query->execute([$_REQUEST['id']])) {
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: delete-sucesso.php");
    }
} catch (Exception $e) {
    header("Location: delete-error.php?err=" . $e);
}