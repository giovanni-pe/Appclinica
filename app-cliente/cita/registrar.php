<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva de Cita</title>
</head>
<body>

    <h1>Formulario de Reserva de Cita</h1>

    <form action="../controllers/registrar_cita.php" method="post">
        <label for="cliente_id">ID del Paciente:</label>
        <input type="number" name="cliente_id" required>

        <br>

        <label for="doctor_id">ID del Doctor:</label>
        <input type="number" name="doctor_id" required>

        <br>

        <label for="fecha_hora">Fecha y Hora:</label>
        <input type="datetime-local" name="fecha_hora" required>

        <br>

        <button type="submit">Reservar Cita</button>
    </form>

</body>
</html>
