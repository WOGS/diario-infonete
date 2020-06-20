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
        <h1>Panel de control Revista</h1>
        <br>
        <h2>Acciones posibles</h2>
        <div class="w3-container">
            <p>
                <a href="interno.php?page=crearRevista" class="w3-btn w3-red">Crear nueva Revista</a>
            </p>
            <p>
                <a href="interno.php?page=crearRevista" class="w3-btn w3-red">Crear Noticia</a>
            </p>
        </div>
        <br>
        <br>
        <br>
        <!--div class="w3-container w3-display-bottomright">
            <a href="index.php" class="w3-btn w3-blue">Salir</a>
        </div-->
    </div>
    <?php
        if(isset($_SESSION["crearRevista"])){
            ?>
            <br>
            <br>
            <div class="w3-card-4 w3-display-middle " style="width:25%;">
                <div class="w3-container w3-teal w3-round">
                    <h2 class="w3-center">Crear Revista</h2>
                </div>
                <br>
                <form class="w3-container" name="registrar" action=".php?page=guardarUsuario" method="post" enctype="application/x-www-form-urlencoded">
                    <label>Titulo</label>
                        <input class="w3-input w3-round" type="text" name="titulo"><br/>
                    <label>Nro. Revista</label>
                        <input class="w3-input w3-round" type="text" name="nroRevista"><br/>
                    <label>Descripcion</label>
                        <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50">
                        </textarea>
                    <br/>
                    <div class="container">
                        <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="GRABAR">
                    </div>
                </form>
            </div>
    <?php
        }
    ?>
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
