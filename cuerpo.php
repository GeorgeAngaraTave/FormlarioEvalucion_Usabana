<?

//Variables
$para = 'jorgeluis163@gmail.com';
$asunto = 'Email en HTML con la funcion mail() en PHP';
$remitente = "usuario@gmail.com"; //Aquí va la dirección de quien envía el email.
$mensaje = 'M&aacute;s tutoriales en el blog de <a href="http://blog.reaccionestudio.com/" target="_blank">Reacci&oacute;n Estudio</a>';
 
//Cabecera de la funcion mail()
$headers = "From: ".$remitente." \r\n";
$headers .= "Reply-To: ".$remitente."\r\n"; //La dirección por defecto si se responde el email enviado.
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //La codificación del email.
 
//Mandamos el email.
mail($para, $asunto, $mensaje, $headers);
echo "DI";   
