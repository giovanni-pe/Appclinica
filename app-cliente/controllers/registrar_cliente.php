<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'http://localhost/examendiseno/apiclinicav1/app/Negocio/client.php';  // Ajusta la URL según tu estructura

    $data = [
        'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : null,
        'correo' => isset($_POST['correo']) ? $_POST['correo'] : null,
        'telefono' => isset($_POST['telefono']) ? $_POST['telefono'] : null,
    ];

    // Verificar que todos los campos estén definidos y no estén vacíos
    if (!empty($data['nombre']) && !empty($data['correo']) && !empty($data['telefono'])) {
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);

        // Realizar la solicitud POST para registrar el cliente
        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            // Intentar decodificar la respuesta del servidor
            $result = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Verificar si la respuesta contiene 'mensaje' y si su valor es verdad (true)
                if (isset($result['mensaje']) && $result['mensaje'] === true) {
                    echo "Cliente registrado con éxito. ID del cliente: {$result['cliente_id']}";
                } else {
                    echo "Error al registrar el cliente.";
                }
            } else {
                echo "Error al decodificar la respuesta JSON del servidor.";
            }
        } else {
            echo "Error al realizar la solicitud HTTP.";
        }
    } else {
        echo "Por favor, completa todos los campos del formulario.";
    }
} else {
    echo "Método no permitido.";
}
?>
