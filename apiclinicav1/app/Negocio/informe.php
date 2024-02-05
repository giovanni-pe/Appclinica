<?php
include('../config.php');
use App\Models\Informe;

class InformeController
{
    public function index()
    {
        $informes = Informe::all();
        return json_encode($informes);
    }

    public function show($id)
    {
        $informe = Informe::find($id);

        if (!$informe) {
            http_response_code(404);
            return json_encode(['error' => 'Informe no encontrado']);
        }

        return json_encode($informe);
    }

    public function store($data)
    {
        $informe = new Informe($data);
        $informe->save();

        return json_encode(['mensaje' => 'Informe creado con éxito']);
    }

    public function update($id, $data)
    {
        $informe = Informe::find($id);

        if (!$informe) {
            http_response_code(404);
            return json_encode(['error' => 'Informe no encontrado']);
        }

        $informe->fill($data);
        $informe->save();

        return json_encode(['mensaje' => 'Informe actualizado con éxito']);
    }

    public function destroy($id)
    {
        $informe = Informe::find($id);

        if (!$informe) {
            http_response_code(404);
            return json_encode(['error' => 'Informe no encontrado']);
        }

        $informe->delete();

        return json_encode(['mensaje' => 'Informe eliminado con éxito']);
    }
}

// Manejar la solicitud
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $informeController = new InformeController();
            echo $informeController->show($_GET['id']);
        } else {
            $informeController = new InformeController();
            echo $informeController->index();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $informeController = new InformeController();
        echo $informeController->store($data);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $informeController = new InformeController();
        echo $informeController->update($id, $data);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $informeController = new InformeController();
        echo $informeController->destroy($id);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>
