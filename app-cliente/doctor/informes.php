<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Informe</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h1>Ver Informe</h1>

<form id="verInformeForm">
    <label for="informeId">ID del Informe:</label>
    <input type="text" id="informeId" name="informeId" required>
    <br>

    <input type="submit" value="Ver Informe">
</form>

<div id="informeResultado"></div>

<script>
$(document).ready(function() {
    $('#verInformeForm').submit(function(e) {
        e.preventDefault();

        // Obtener el ID del informe ingresado por el usuario
        var informeId = $('#informeId').val();

        // Realizar la solicitud Ajax para obtener y mostrar el informe
        $.ajax({
            url: 'http://localhost/examendiseno/apiclinicav1/app/Negocio/informe.php?id=' + informeId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.mensaje) {
                    var informeHtml = '<p>ID del Informe: ' + data.id + '</p>' +
                                      '<p>Cliente: ' + data.cliente_id + '</p>' +
                                      '<p>Doctor: ' + data.doctor_id + '</p>' +
                                      '<p>Fecha: ' + data.fecha + '</p>' +
                                      '<p>Diagnóstico: ' + data.diagnostico + '</p>' +
                                      '<p>Receta: ' + data.receta + '</p>' +
                                      '<p>Tratamiento: ' + data.tratamiento + '</p>';

                    $('#informeResultado').html(informeHtml);
                } else {
                    $('#informeResultado').html('<p>Informe no encontrado.</p>');
                }
            },
            error: function() {
                $('#informeResultado').html('<p>Error al obtener el informe.</p>');
            }
        });
    });
});
</script>

</body>
</html>
