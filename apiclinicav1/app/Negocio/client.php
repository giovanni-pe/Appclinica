<?php
include ('../config.php');
use App\Models\Cliente;

class ClienteController
{
    public function index()
    {
        $clientes = Cliente::all();
        return json_encode($clientes);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            http_response_code(404);
            return json_encode(['error' => 'Cliente no encontrado']);
        }

        return json_encode($cliente);
    }

    public function store($data)
    {
        // Verificar que se hayan proporcionado datos
        if (empty($data)) {
            return json_encode(['mensaje' => 'Datos de cliente no proporcionados']);
        }

        try {
            // Crear una nueva instancia de Cliente con los datos proporcionados
            $cliente = new Cliente($data);
            
            // Guardar el cliente en la base de datos
            $cliente->save();

            return json_encode(['mensaje' => 'Cliente creado con éxito']);
        } catch (\Exception $e) {
            // Manejar cualquier excepción que pueda ocurrir al guardar el cliente
            return json_encode(['mensaje' => 'Error al crear el cliente: ' . $e->getMessage()]);
        }
    }

    public function update($id, $data)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            http_response_code(404);
            return json_encode(['error' => 'Cliente no encontrado']);
        }

        $cliente->fill($data);
        $cliente->save();

        return json_encode(['mensaje' => 'Cliente actualizado con éxito']);
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            http_response_code(404);
            return json_encode(['error' => 'Cliente no encontrado']);
        }

        $cliente->delete();

        return json_encode(['mensaje' => 'Cliente eliminado con éxito']);
    }
}

// Manejar la solicitud
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $clienteController = new ClienteController();
            echo $clienteController->show($_GET['id']);
        } else {
            $clienteController = new ClienteController();
            echo $clienteController->index();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'));
        $clienteController = new ClienteController();
        echo json_encode($data);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $clienteController = new ClienteController();
        echo $clienteController->update($id, $data);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $clienteController = new ClienteController();
        echo $clienteController->destroy($id);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>
