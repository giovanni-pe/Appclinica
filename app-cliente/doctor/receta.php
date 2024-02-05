<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Receta</title>
</head>
<body>

<h1>Registro de Receta</h1>

<!-- Formulario de Registro de Receta -->
<form action="http://localhost/examendiseno/apiclinicav1/app/Negocio/receta.php" method="POST">
    <label for="idCita">ID de la Cita:</label>
    <input type="number" id="idCita" name="idCita" required>
    <br>

    <label for="medicamentos">Medicamentos:</label>
    <textarea id="medicamentos" name="medicamentos" rows="4" required></textarea>
    <br>

    <label for="indicaciones">Indicaciones:</label>
    <textarea id="indicaciones" name="indicaciones" rows="4" required></textarea>
    <br>

    <input type="submit" value="Registrar Receta">
</form>

</body>
</html>
