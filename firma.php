<?php
$title = "Firma Generada - Generador de Firmas";
include 'header.php'; 

// Capturar los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
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
//-------------------------------------------
// Procesar la imagen cargada
// $foto_temp = null; 
// $upload_dir = "uploads/";

// if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
//     $tipo_archivo = mime_content_type($_FILES['foto']['tmp_name']);
//     $formatos_permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

//     if (in_array($tipo_archivo, $formatos_permitidos)) {
//         $manager = new ImageManager();
//         $image = $manager->read($_FILES['foto']['tmp_name']);

//         // Definir el tamaño del lienzo cuadrado
//         $canvas_size = 300; // Puedes cambiar este valor
//         $image->resize(300, 300, function ($constraint) {
//             $constraint->aspectRatio(); // Mantener la proporción
//             $constraint->upsize(); // No agrandar imágenes pequeñas
//         });

//         // Crear un lienzo cuadrado y centrar la imagen
//         $canvas = $manager->create($canvas_size, $canvas_size, 'ffffff'); // Fondo blanco
//         $canvas->place($image, 'center'); // Centrar la imagen en el lienzo

//         // Guardar la imagen procesada en el servidor
//         $nombre_archivo = uniqid() . '.jpg';
//         $ruta_imagen = $upload_dir . $nombre_archivo;
//         $canvas->save($ruta_imagen);

//         // Convertir la imagen en base64 para mostrarla en la firma
//         $foto_temp = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($ruta_imagen));
//     } else {
//         echo "<p style='color: red;'>Formato de archivo no permitido.</p>";
//     }
// }
//-------------------------------------------

// Generar la firma en formato HTML
$firma_html = "<table class='table-firm'>
    <tr>
        <td class='info-content'>
            <p class='nombre'>$nombre</p>
            <p class='apellidos'>$apellidos</p>
            <p class='cargo'>$cargo</p>

            <div class='logos-superpuestos'>
            
            </div>
        </td>
      
       <td class='img-content'>
            " . ($foto_temp ? "<img src='$foto_temp' alt='Foto de $nombre' class='img-photo'>" : "<p>No se adjuntó foto</p>") . "
        </td>
        
        <td class='social-content'>
            <div id='grupo_content'>
                <p><a href='mailto:$correo' class='email'>$correo</a></p>
                " . ($telefono ? "<p class='phone'>$telefono</p>" : "") . "
                " . ($direccion ? "<p class='address'>$direccion</p>" : "") . "  
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
        <!-- <button id="copiarFirma" onclick="copiarFirma()">Copiar Firma</button> -->
    </div>
</div>

<?php
include 'footer.php'; 
?>

