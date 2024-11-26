<?php
$title = "Inicio - Generador de Firmas";
include 'header.php'; // Incluir el encabezado
?>
<div class="container">
    <form action="firma.php" method="POST">
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

        <label for="direccion">Dirección (opcional)</label>
        <textarea id="direccion" name="direccion"></textarea>

        <button type="submit">Generar Firma</button>
    </form>
</div>
<?php
include 'footer.php'; // Incluir el pie de página
?>