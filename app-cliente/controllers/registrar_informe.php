<?php
include '../vars.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $citaId = isset($_POST['cita_id']) ? $_POST['cita_id'] : null;
    $diagnostico = isset($_POST['diagnostico']) ? $_POST['diagnostico'] : null;
    $receta = isset($_POST['receta']) ? $_POST['receta'] : null;
    $tratamiento = isset($_POST['tratamiento']) ? $_POST['tratamiento'] : null;
    $informe = isset($_POST['informe']) ? $_POST['informe'] : null;

    // Validar que se hayan proporcionado datos
    if ($citaId !== null && $diagnostico !== null && $receta !== null && $tratamiento !== null && $informe !== null) {
        // Crear un array con los datos del informe
        $informeData = [
            'cita_id' => $citaId,
            'diagnostico' => $diagnostico,
            'receta' => $receta,
            'tratamiento' => $tratamiento,
            'informe' => $informe,
        ];

        // Enviar los datos a la API usando cURL
        $url = $api_uri.'/app/Negocio/informe.php';
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => json_encode($informeData),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        // Manejar la respuesta del servidor
        if ($response !== false) {
            $result = json_decode($response, true);

            if (isset($result['mensaje']) && $result['mensaje'] === 'Informe creado con éxito') {
                echo "Informe registrado con éxito para la cita #$citaId.";
            } else {
                echo "Error al registrar el informe en la API.";
            }
        } else {
            echo "Error al realizar la solicitud HTTP a la API.";
        }
    } else {
        echo "Por favor, complete todos los campos del formulario.";
    }
} else {
    echo "Método no permitido.";
}
?>
