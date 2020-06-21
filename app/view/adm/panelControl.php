<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    ?>
    <html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <body>
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
