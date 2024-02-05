<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Cliente</title>
</head>
<body>

<h1>Registro de Cliente</h1>

<!-- Formulario de Registro de Cliente -->
<form action="http://localhost/examendiseno/app-cliente/controllers/registrar_cliente.php" method="POST">
    <label for="nombreCliente">Nombre del Cliente:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>

    <label for="correoCliente">Correo del Cliente:</label>
    <input type="email" id="correo" name="correo" required>
    <br>

    <label for="telefonoCliente">Teléfono del Cliente:</label>
    <input type="tel" id="telefono" name="telefono" required>
    <br>

    <input type="submit" value="Registrar Cliente">
</form>

</body>
</html>
