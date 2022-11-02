<?php include "header.php" ?>

    <div class="container main-container" style="padding: 50px 0">
        <div class="row">
            <div class="col-md-12"><h1 class="text-center">Meus Posts</h1></div>
            <?php
            $pdo = new PDO('mysql:host=localhost;dbname=postMsg', "root", "");
            $query = $pdo->query("SELECT * FROM postMsg.contatos");
            $cont = 0;
            while ($row = $query->fetch()):
                $cont++;
                ?>
                <div class="col-md-4 img-thumbnail">
                    <div class="col">Nome: <?php echo $row['nome']?></div>
                    <div class="col">Telefone: <?php echo $row['telefone']?></div>
                    <div class="col">Email: <?php echo $row['email']?></div>
                    <div class="col">Mensagem: <?php echo $row['mensagem']?></div>
                    <a href="deletar-post.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt float-right p-1"></i></a>
                    <a href="editpost.php?id=<?php echo $row['id'] ?>"><i class="fas fa-pencil-alt float-right p-1"></i></a>
                </div>
            <?php
            endwhile;
            if ($cont == 0){
                echo "<div class=\"col-md-12\"><h1 class='text-center'>Ainda não foram cadastrados contatos</h1></div>";
            }
            ?>
        </div>
    </div>
<?php include "footer.php" ?>