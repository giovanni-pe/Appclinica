<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'http://localhost/examendiseno/apiclinicav1/app/Negocio/cita.php';

    $data = [
        'cliente_id' => isset($_POST['cliente_id']) ? $_POST['cliente_id'] : null,
        'doctor_id' => isset($_POST['doctor_id']) ? $_POST['doctor_id'] : null,
        'fecha_hora' => isset($_POST['fecha_hora']) ? $_POST['fecha_hora'] : null,
    ];

    // Verificar que todos los campos estén definidos y no estén vacíos
    if (!empty($data['cliente_id']) && !empty($data['doctor_id']) && !empty($data['fecha_hora'])) {
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);

        // Realizar la solicitud POST para registrar la cita
        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            // Intentar decodificar la respuesta del servidor
            $result = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Verificar si la respuesta contiene 'id' y 'estado'
                if (isset($result[0]['id']) && isset($result[0]['estado']) && $result[0]['estado'] === 'pendiente') {
                    echo "Cita registrada con éxito. ID de la cita: {$result[0]['id']}";
                } else {
                    echo "Error al registrar la cita o estado no es 'pendiente'.";
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
