<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = 'http://localhost/examendiseno/apiclinicav1/app/Negocio/doctor.php';

    $data = [
        'nombreDoctor' => isset($_POST['nombreDoctor']) ? $_POST['nombreDoctor'] : null,
        'especialidadDoctor' => isset($_POST['especialidadDoctor']) ? $_POST['especialidadDoctor'] : null,
        'correoDoctor' => isset($_POST['correoDoctor']) ? $_POST['correoDoctor'] : null,
        'telefonoDoctor' => isset($_POST['telefonoDoctor']) ? $_POST['telefonoDoctor'] : null,
    ];

    // Verificar que todos los campos estén definidos y no estén vacíos
    if (!empty($data['nombreDoctor']) && !empty($data['especialidadDoctor']) && !empty($data['correoDoctor']) && !empty($data['telefonoDoctor'])) {
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);

        // Realizar la solicitud POST para registrar el doctor
        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            // Intentar decodificar la respuesta del servidor
            $result = json_decode($response, true);

            if (json_last_error() === JSON_ERROR_NONE) {
                // Verificar si la respuesta contiene 'mensaje'
                if (isset($result['mensaje']) && $result['mensaje'] === 'Doctor creado con éxito') {
                    echo "Doctor registrado con éxito.";
                } else {
                    echo "Error al registrar al doctor.";
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
