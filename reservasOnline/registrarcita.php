<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva de Cita</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   </head>

<body>

    <div class="container">
        <h1>Formulario de Reserva de Cita</h1>

        <form action="controller.php" method="post">
            <label for="cliente_id">ID del Paciente:</label>
            <input type="number" name="cliente_id" required>

            <label for="doctor_id">ID del Doctor:</label>
            <input type="number" name="doctor_id" required>

            <label for="fecha_hora">Fecha y Hora:</label>
            <input type="datetime-local" name="fecha_hora" required>

            <button type="submit">Reservar Cita</button>
        </form>
    </div>
    <div class="video-link-container">
        <!-- Icono de video llamada de Font Awesome -->
        <a class="video-link" href="../videollamadas/receiver/receiver.html"><i class="fas fa-video"></i> Reservar via video llamada</a>
    </div>

</body>

</html>