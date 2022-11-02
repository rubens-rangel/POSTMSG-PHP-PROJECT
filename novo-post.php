<?php include "header.php" ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 main-container">
                <h1 class="text-center">Cadastrar Post:</h1>
                <form id="form" class="d-flex justify-content-center">
                    <div>
                        <label for="nome">Nome:</label><br>
                        <input type="text" id="nome" name="nome"><br>
                        <label for="telefone">Telefone:</label><br>
                        <input onkeypress="mask(this, mphone);" onblur="mask(this, mphone)" type="text" id="telefone" name="telefone"><br>
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email"><br>
                        <label for="mensagem">Mensagem:</label><br>
                        <textarea class="w-100 " id="mensagem" name="mensagem"></textarea><br>
                        <button class="btn btn-success btn-cadastro" type="submit">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const validateEmail = (email) => {
        return String(email)
                .toLowerCase()
                .match(
                 /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                 );
        }

    $("#form").on('submit', function (event) {
        event.preventDefault();
        let err = false;
        if(!validateEmail($("#email").val())){
            alert("email invalido!");
            return;
        }
        
        if($("#mensagem").val().lenght < 10){
            alert("mensagem muito pequena!");
            return;
        }
        var $form = $(this);
        var $inputs = $form.find("input, select, button, textarea");
        var serializedData = $form.serialize();

        request = $.ajax({
                url: "salvar-post.php",
                type: "post",
                data: serializedData
            });

            request.done(function (response, textStatus, jqXHR) {
                if (response == 'S') {
                    alert("Sucesso")
                    window.location.href = 'index.php'
                } else {
                    alert(response)
                }
            });
    })

    function mask(o, f) {
    setTimeout(function () {
        var v = mphone(o.value);
        if (v != o.value) {
            o.value = v;
        }
    }, 1);
}

function mphone(v) {
    var r = v.replace(/\D/g,"");
    r = r.replace(/^0/,"");
    if (r.length > 10) {
        // 11+ digits. Format as 5+4.
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/,"($1) $2 $3");
    }
    else if (r.length > 5) {
        // 6..10 digits. Format as 4+4
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/,"($1) $2 $3");
    }
    else if (r.length > 2) {
        // 3..5 digits. Add (0XX..)
        r = r.replace(/^(\d\d)(\d{0,5})/,"($1) $2");
    }
    else {
        // 0..2 digits. Just add (0XX
        r = r.replace(/^(\d*)/, "(0XX$1");
    }
    return r;
}



    </script>
<?php include "footer.php" ?>