<?php
if(isset($_SESSION["usuarioOK"])) {
    $usuario = $_SESSION["usuarioOK"];
    $pos = explode("-", $usuario);
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
            <textarea class="w3-input w3-round" type="text" name="informe" rows="4" cols="50"></textarea>
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