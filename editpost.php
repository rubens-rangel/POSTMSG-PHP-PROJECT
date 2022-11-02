<?php include "header.php" ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 main-container">
                <h1 class="text-center">Editar Post:</h1>
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=postMsg', "root", "");
                $query = $pdo->query("SELECT * FROM postMsg.contatos WHERE id =".$_REQUEST['id']);
                while ($row = $query->fetch()):
                    ?>
                    <form action="atualizar-contato.php" class="d-flex justify-content-center">
                        <div>
                            <input id="id" name="id" type="hidden" value="<?php echo $_REQUEST['id'] ?>">
                            <label for="nome">Nome:</label><br>
                            <input type="text" id="nome" name="nome" value="<?php echo $row['nome'] ?>"><br>
                            <label for="telefone">Telefone:</label><br>
                            <input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone'] ?>"><br>
                            <label for="email">Email:</label><br>
                            <input type="text" id="email" name="email" value="<?php echo $row['email'] ?>"><br>
                            <label for="mensagem">Mensagem:</label><br>
                            <input type="text" id="mensagem" name="mensagem" value="<?php echo $row['mensagem'] ?>"><br>
                            <button class="btn btn-success btn-cadastro" type="submit">Atualizar</button>
                        </div>
                    </form>
                <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
<?php include "footer.php" ?>