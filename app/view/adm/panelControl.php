<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
<<<<<<< HEAD
    <div class="w3-container w3-center">
    <h1 class="">Panel de control Administrador</h1>
        <h2 class="w3-margin-left w3-margin-bottom" style="margin-top: 2%">Acciones posibles</h2>

            <div class="w3-container w3-margin-top">
                <a href="interno.php?page=registrar" class="w3-button bg-primary w3-hover-black w3-margin-right" style="text-decoration: none">Alta Usuario</a>
                <a href="interno.php?page=admRevista" class="w3-button bg-primary w3-hover-black w3-margin-right"style="text-decoration: none">Administrar Revista</a>
                <a href="interno.php?page=bajaUsuario" class="w3-button bg-primary w3-hover-black "style="text-decoration: none">Listar usuarios</a>
                <a href="interno.php?page=bajaUsuario" class="w3-button bg-primary w3-hover-black "style="text-decoration: none">Baja usuario</a>

=======
    <div class="w3-display-topmiddle">
        <div class="w3-container w3-blue-grey w3-round">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Panel de control Administrador</h1>
        <br>
        <h2>Acciones posibles</h2>
        <div class="w3-container">
            <p>
                <a href="interno.php?page=registrar" class="w3-btn w3-red">Alta Usuario</a>
            </p>
            <p>
                <a href="interno.php?page=admRevista" class="w3-btn w3-red">Administrar Contenido</a>
            </p>
>>>>>>> develop
        </div>
    </div>
        <br>

        <br>
        <br>
        <!--div class="w3-container w3-display-bottomright">
            <a href="index.php" class="w3-btn w3-blue">Salir</a>
        </div-->
    </div>
    <script>
        var close = document.getElementsByClassName("closebtn");
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function(){
                var div = this.parentElement;
                div.style.opacity = "0";
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
        }
    </script>
    </body>
    </html>
    <?php
}else{
    header("Location: index.php");
    exit();
}
?>
