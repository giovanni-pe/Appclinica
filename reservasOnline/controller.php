<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    $cliente_id = $_POST['cliente_id'];
    $doctor_id = $_POST['doctor_id'];
    $fecha_hora = $_POST['fecha_hora'];

    // Crear objeto JSON con los datos
    $nuevo = [
        "cliente_id" => $cliente_id,
        "doctor_id" => $doctor_id,
        "fecha_hora" => $fecha_hora,
    ];

    
    $url = 'http://localhost/examenDisenoAppclinicacapasv1/apiclinicav1/app/Negocio/cita.php';
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
}

