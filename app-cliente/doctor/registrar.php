<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Doctor</title>
</head>
<body>

<h1>Registro de Doctor</h1>

<!-- Formulario de Registro de Doctor -->
<form action="http://localhost/examendiseno/apiclinicav1/app/Negocio/doctor.php" method="POST">
    <label for="nombreDoctor">Nombre del Doctor:</label>
    <input type="text" id="nombreDoctor" name="nombreDoctor" required>
    <br>

    <label for="especialidadDoctor">Especialidad del Doctor:</label>
    <input type="text" id="especialidadDoctor" name="especialidadDoctor" required>
    <br>

    <label for="correoDoctor">Correo del Doctor:</label>
    <input type="email" id="correoDoctor" name="correoDoctor" required>
    <br>

    <label for="telefonoDoctor">Teléfono del Doctor:</label>
    <input type="tel" id="telefonoDoctor" name="telefonoDoctor" required>
    <br>

    <input type="submit" value="Registrar Doctor">
</form>

</body>
</html>
