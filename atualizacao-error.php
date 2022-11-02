<?php include "header.php" ?>

<div class="container main-container">
    <h1 class="error text-center">Erro ao atualizar!</h1>
    <p class="text-center">favor inserir:<br>
        <?php
        if (stripos($_REQUEST["err"], "N") !== false) {
            echo "Nome do contato;<br>";
        }
        if (stripos($_REQUEST["err"], "T") !== false) {
            echo "Telefone do contato;<br>";
        }
        ?>
    </p>

    <a href="index.php" class="btn btn-success btn-cadastro">Voltar a listagem</a>
</div>

<?php include "footer.php" ?>
