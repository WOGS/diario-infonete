<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
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
                <a href="interno.php?page=crearNoticia" class="w3-btn w3-red">Crear Noticia</a>
            </p>
        </div>
        <br>
        <br>
        <br>
        <div class="w3-container">
            <h2>Lista de Revistas</h2>
            <table class="w3-table w3-bordered">
                <tr>
                    <th>id Revista</th>
                    <th>id Administrador</th>
                    <th>Titulo</th>
                    <th>Numero</th>
                    <th>Descripcion</th>
                    <th>Borrar</th>
                    <th>Modificar</th>
                </tr>
                <?php
                if(isset($_SESSION["revistas"])) {
                    $revistas = $_SESSION["revistas"];
                    $tam = sizeof($revistas);
                    for ($i = 1; $i <= $tam; $i++) {
                        $pos = explode("-", $revistas[$i]);
                        echo "<tr>";
                        echo "<td>$pos[0]</td>";
                        echo "<td>$pos[1]</td>";
                        echo "<td>$pos[2]</td>";
                        echo "<td>$pos[3]</td>";
                        echo "<td>$pos[4]</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='#'/>";
                        echo "</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' href='#'/>";
                        echo "</td>";
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatos"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinDatos"]);

                }
                if(isset($_SESSION["eliminadoOK"])) {
                    echo"<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                    unset($_SESSION["eliminadoOK"]);
                }
                if(isset($_SESSION["userModif"])) {
                    echo"<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Clave modificada correctamente</div>";
                    unset($_SESSION["userModif"]);
                }
                ?>
            </table>
        </div>

        <div class="w3-container">
            <h2>Lista de Noticias</h2>
            <table class="w3-table w3-bordered">
                <tr>
                    <th>cod. Noticia</th>
                    <th>Titulo</th>
                    <th>Subtitulo</th>
                    <th>Estado</th>
                    <th>Origen</th>
                    <th>Borrar</th>
                    <th>Modificar Estado</th>
                </tr>
                <?php
                if(isset($_SESSION["noticias"])) {
                    $noticias = $_SESSION["noticias"];
                    $tam = sizeof($noticias);
                    for ($i = 1; $i <= $tam; $i++) {
                        $pos = explode("-", $noticias[$i]);
                        echo "<tr>";
                        echo "<td>$pos[0]</td>";
                        echo "<td>$pos[1]</td>";
                        echo "<td>$pos[2]</td>";
                        echo "<td>$pos[3]</td>";
                        echo "<td>$pos[4]</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-trash'href='#'/>";
                        echo "</td>";
                        echo "<td>";
                        echo"<a class='w3-padding w3-xlarge w3-text-orange glyphicon glyphicon-search w3-center' 
                        href='interno.php?page=cambiarEstado&Cod_Noticia=1'/>";
                        echo "</td>";
                        echo"</tr>";
                    }
                }
                if(isset($_SESSION["sinDatos"])) {
                    echo"<div class='alert warning'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong> No hay datos para mostrar en la tabla
                            </div>";
                    unset($_SESSION["sinDatos"]);

                }
                if(isset($_SESSION["eliminadoOK"])) {
                    echo"<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Usuario eliminado exitosamente</div>";
                    unset($_SESSION["eliminadoOK"]);
                }
                if(isset($_SESSION["userModif"])) {
                    echo"<div class='alert success'>
                              <span class='closebtn'>&times;</span>  
                              <strong>Success!</strong>Clave modificada correctamente</div>";
                    unset($_SESSION["userModif"]);
                }
                ?>
            </table>
        </div>
    </div>
    <?php
        if(isset($_SESSION["crearRevista"])){
            ?>
            <br>
            <br>
            <div class="w3-card-4 w3-display-middle " style="width:25%;">
                <span class='closebtn'>&times;</span>
                <div class="w3-container w3-teal w3-round">
                    <h2 class="w3-center">Crear Revista</h2>
                </div>
                <br>
                <form class="w3-container" name="registrar" action="interno.php?page=guardarRevista" method="post" enctype="application/x-www-form-urlencoded">
                    <label>Titulo</label>
                        <input class="w3-input w3-round" type="text" name="titulo"><br/>
                    <label>Nro. Revista</label>
                        <input class="w3-input w3-round" type="text" name="nroRevista"><br/>
                    <label>Descripcion</label>
                        <textarea class="w3-input w3-round" type="text" name="descripcion" rows="4" cols="50">
                        </textarea>
                    <br/>
                    <input type="hidden" name="idUsuario" value="<?php echo $pos[0]?>">
                    <div class="container">
                        <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="GRABAR">
                    </div>
                </form>
            </div>
    <?php
            unset($_SESSION["crearRevista"]);
        }
    ?>
    <?php
    if(isset($_SESSION["crearNoticia"])){
        ?>
        <br>
        <br>
        <div class="w3-card-4 w3-display-middle " style="width:25%;">
            <span class='closebtn'>&times;</span>
            <div class="w3-container w3-teal w3-round">
                <h2 class="w3-center">Crear Noticia</h2>
            </div>
            <br>
            <form class="w3-container" name="registrarNoticia" action="interno.php?page=guardarNoticia" method="post" enctype="application/x-www-form-urlencoded">
                <label>Titulo</label>
                <input class="w3-input w3-round" type="text" name="titulo"><br/>
                <label>Subtitulo</label>
                <input class="w3-input w3-round" type="text" name="subtitulo"><br/>
                <label>Informe</label>
                <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50">
                        </textarea>
                <br/>
                <input type="hidden" name="cod_contenidista" value="<?php echo $pos[0]?>">
                <div class="container">
                    <input class="w3-button w3-blue-grey w3-round w3-center" type="submit" name="boton" value="GRABAR">
                </div>
            </form>
        </div>
        <?php
        unset($_SESSION["crearNoticia"]);
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
