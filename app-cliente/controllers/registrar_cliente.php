<?php
include ('../vars.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Crear objeto JSON con los datos
    $nuevo = [
        "nombre" => $nombre,
        "email" => $email,
        "telefono" => $telefono,
    ];

    
    $url = $api_uri.'/app/Negocio/client.php';
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/json',
            'content' => json_encode($nuevo),
            ]
    ];
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    // Procesar la respuesta del servicio web (puedes realizar acciones adicionales aquí)
    $respuesta = json_decode($result, true);
    echo 'Respuesta del servidor: 200 ok';
    print_r($respuesta);
} else {
    // Redirigir si se intenta acceder directamente a esta página sin enviar el formulario
    header('Location: formulario.html');
}

