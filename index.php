<?php
$title = "Inicio - Generador de Firmas";
include 'header.php'; 
?>
<div class="container">
    <form action="firma.php" method="POST" enctype="multipart/form-data">
        
        <label for="foto">Foto</label>
        <input type="file" id="foto" name="foto" accept="image/*">

        <label for="nombre">Nombre Completo</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="cargo">Cargo</label>
        <input type="text" id="cargo" name="cargo" required>

        <label for="telefono">Teléfono</label>
        <input type="text" id="telefono" name="telefono">

        <label for="correo">Correo Electrónico</label>
        <input type="email" id="correo" name="correo" required>

        <label for="empresa">Nombre de la Empresa</label>
        <input type="text" id="empresa" name="empresa" required>

        <label for="direccion">Dirección</label>
        <textarea id="direccion" name="direccion"></textarea>

        <label for="linkedin">LinkedIn</label>
        <input type="text" id="linkedin" name="linkedin">

        <label for="X">X</label>
        <input type="text" id="X" name="X">

        <label for="facebook">Facebook</label>
        <input type="text" id="facebook" name="facebook">

        <label for="instagram">Instagram</label>
        <input type="text" id="instagram" name="instagram">
        
        <label for="youtube">Youtube</label>
        <input type="text" id="youtube" name="youtube">


        <button type="submit">Generar Firma</button>
    </form>
</div>
<?php
include 'footer.php'; 
?>