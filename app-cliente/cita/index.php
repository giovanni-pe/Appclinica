<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Citas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

<h1>Listar Citas</h1>

<div id="citas-lista"></div>

<script>
$(document).ready(function() {
    // Realizar la solicitud Ajax para obtener la lista de citas
    $.ajax({
        url: 'http://localhost/examendiseno/apiclinicav1/app/Negocio/cita.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            if (data.length > 0) {
                var tableHtml = '<table border="1">' +
                                    '<tr>' +
                                        '<th>ID Cita</th>' +
                                        '<th>Cliente</th>' +
                                        '<th>Doctor</th>' +
                                        '<th>Fecha</th>' +
                                        '<th>Estado</th>' +
                                    '</tr>';

                $.each(data, function(index, cita) {
                    tableHtml += '<tr>' +
                                    '<td>' + cita.id + '</td>' +
                                    '<td>' + cita.cliente_id + '</td>' +
                                    '<td>' + cita.doctor_id + '</td>' +
                                    '<td>' + cita.fecha_hora + '</td>' +
                                    '<td>' + cita.estado + '</td>' +
                                 '</tr>';
                });

                tableHtml += '</table>';
                $('#citas-lista').html(tableHtml);
            } else {
                $('#citas-lista').html('<p>No hay citas disponibles.</p>');
            }
        },
        error: function() {
            $('#citas-lista').html('<p>Error al obtener la lista de citas.</p>');
        }
    });
});
</script>

</body>
</html>
