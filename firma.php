<?php
$title = "Firma Generada - Generador de Firmas";
include 'header.php'; 

// Capturar los datos del formulario
$nombre = $_POST['nombre'];
$cargo = $_POST['cargo'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$empresa = $_POST['empresa'];
$direccion = $_POST['direccion'];
$linkedin = $_POST['linkedin'];
$X = $_POST['X'];
$facebook = $_POST['facebook'];
$youtube = $_POST['youtube'];
$instagram = $_POST['instagram'];

// Procesar la imagen cargada
$foto_temp = null; 

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
   
    $tipo_archivo = mime_content_type($_FILES['foto']['tmp_name']);
    $formatos_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml', 'image/webp'];
    
    if (in_array($tipo_archivo, $formatos_permitidos)) {
        // Leer el archivo temporal y codificarlo en base64
        $contenido_binario = file_get_contents($_FILES['foto']['tmp_name']);
        $foto_temp = 'data:' . $tipo_archivo . ';base64,' . base64_encode($contenido_binario);
    } else {
        echo "Formato de archivo no permitido.";
    }
}

// Generar la firma en formato HTML
$firma_html = "<table class='table-firm'>
    <tr>
      
        <td class='img-content'>
            " . ($foto_temp ? "<img src='$foto_temp' alt='Foto de $nombre' class='img-photo'>" : "") . "
        </td>

        <td class='info-content'>
            <p class='name'>$nombre</p>
            <p class='job'>$cargo</p>
            <p class='company'>$empresa</p>
            <p><a href='mailto:$correo' class='email'>$correo</a></p>
            " . ($telefono ? "<p class='phone'>Tel: $telefono</p>" : "") . "
            " . ($direccion ? "<p class='address'>Dirección: $direccion</p>" : "") . "
        </td>

        <td class='social-content'>

            <div class='logo-emp'>
                
                <img src='img/windup-logo.png' alt='logo' class='logo-image'>

            </div>

            <div class='social-icons'>
                " . ($linkedin ? "<a href='$linkedin' target='_blank' class='social-icon'><img src='img/linkedin.png' alt='LinkedIn'></a>" : "") . "
                " . ($X ? "<a href='$X' target='_blank' class='social-icon'><img src='img/red-x.png' alt='X'></a>" : "") . "
                " . ($facebook ? "<a href='$facebook' target='_blank' class='social-icon'><img src='img/facebook.png' alt='Facebook'></a>" : "") . "
                " . ($youtube ? "<a href='$youtube' target='_blank' class='social-icon'><img src='img/youtube.png' alt='YouTube'></a>" : "") . "
                " . ($instagram ? "<a href='$instagram' target='_blank' class='social-icon'><img src='img/instagram.png' alt='Instagram'></a>" : "") . "
            </div>
        </td>
    </tr>
</table>"; 

?>

<div class="container">
    <h2>Firma Generada</h2>
    <div class="firma">
        <?php echo $firma_html; ?>
    </div>
</div>

<?php
include 'footer.php'; 
?>
