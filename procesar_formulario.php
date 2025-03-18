<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombre = htmlspecialchars($_POST["name"]);
    $apellido = htmlspecialchars($_POST["surname"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST["message"]);

    // Dirección a la que se enviará el correo
    $destinatario = "galytm@gmail.com";
    $asunto = "Nuevo mensaje desde el formulario de contacto";

    // Cuerpo del mensaje
    $cuerpoMensaje = "Has recibido un nuevo mensaje de contacto:\n\n";
    $cuerpoMensaje .= "Nombre: $nombre $apellido\n";
    $cuerpoMensaje .= "Email: $email\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje\n";

    // Encabezados
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo
    if (mail($destinatario, $asunto, $cuerpoMensaje, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
