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

// generar - firma - formato HTML
$firma_html = "
<table style='font-family: Arial, sans-serif; font-size: 14px; line-height: 1.6;'>
    <tr>
        <td style='font-weight: bold; color: #007bff;'>$nombre</td>
    </tr>
    <tr>
        <td style='font-style: italic; color: #555;'>$cargo</td>
    </tr>
    <tr>
        <td>$empresa</td>
    </tr>
    <tr>
        <td>
            <a href='mailto:$correo' style='color: #007bff; text-decoration: none;'>$correo</a>
        </td>
    </tr>";

if ($telefono) {
    $firma_html .= "<tr><td>Tel: $telefono</td></tr>";
}
if ($direccion) {
    $firma_html .= "<tr><td>Dirección: $direccion</td></tr>";
}


$firma_html .= "<tr><td style='padding-top: 10px;'>";


if ($linkedin) {
    $firma_html .= "<a href='$linkedin' target='_blank' style='text-decoration: none; margin-right: 10px;'> 
                        <img src='img/linkedin.png' alt='LinkedIn' style='width: 24px; height: 24px;'> 
                    </a>";
}


if ($X) {
    $firma_html .= "<a href='$X' target='_blank' style='text-decoration: none; margin-right: 10px;'> 
                        <img src='img/red-x.png' alt='Twitter' style='width: 24px; height: 24px;'> 
                    </a>";
}


if ($facebook) {
    $firma_html .= "<a href='$facebook' target='_blank' style='text-decoration: none;'> 
                        <img src='img/facebook.png' alt='Facebook' style='width: 24px; height: 24px;'> 
                    </a>";
}


if ($youtube) {
    $firma_html .= "<a href='$youtube' target='_blank' style='text-decoration: none;'> 
                        <img src='img/youtube.png' alt='Youtube' style='width: 24px; height: 24px;'> 
                    </a>";
}

if ($instagram) {
    $firma_html .= "<a href='$instagram' target='_blank' style='text-decoration: none;'> 
                        <img src='img/instagram.png' alt='Instagram' style='width: 24px; height: 24px;'> 
                    </a>";
}


$firma_html .= "</td></tr></table>";
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
