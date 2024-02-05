<?php
include('../config.php');
use App\Models\Doctor;

class DoctorController
{
    public function index()
    {
        $doctores = Doctor::all();
        return json_encode($doctores);
    }

    public function show($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            http_response_code(404);
            return json_encode(['error' => 'Doctor no encontrado']);
        }

        return json_encode($doctor);
    }

    public function store($data)
    {
        // Validar que se proporcionen los campos obligatorios
        if (!isset($data['nombre']) || !isset($data['especialidad'])) {
            http_response_code(400);
            return json_encode(['error' => 'Nombre y especialidad son campos obligatorios']);
        }

        // Verificar si el doctor ya existe por nombre y especialidad 
        $existingDoctor = Doctor::where('nombre', $data['nombre'])
                               ->where('especialidad', $data['especialidad'])
                               ->first();

        if ($existingDoctor) {
            http_response_code(400);
            return json_encode(['error' => 'Ya existe un doctor con el mismo nombre y especialidad']);
        }

        $doctor = new Doctor($data);
        $doctor->save();

        return json_encode(['mensaje' => 'Doctor creado con éxito']);
    }

    public function update($id, $data)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            http_response_code(404);
            return json_encode(['error' => 'Doctor no encontrado']);
        }

        // Validar que se proporcionen los campos obligatorios
        if (!isset($data['nombre']) || !isset($data['especialidad'])) {
            http_response_code(400);
            return json_encode(['error' => 'Nombre y especialidad son campos obligatorios']);
        }

        // Verificar si se está intentando cambiar el nombre o especialidad a uno ya existente
        $existingDoctor = Doctor::where('nombre', $data['nombre'])
                               ->where('especialidad', $data['especialidad'])
                               ->where('id', '!=', $id)
                               ->first();

        if ($existingDoctor) {
            http_response_code(400);
            return json_encode(['error' => 'Ya existe un doctor con el mismo nombre y especialidad']);
        }

        $doctor->fill($data);
        $doctor->save();

        return json_encode(['mensaje' => 'Doctor actualizado con éxito']);
    }

    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            http_response_code(404);
            return json_encode(['error' => 'Doctor no encontrado']);
        }

        // Puedes agregar reglas de negocio adicionales antes de eliminar al doctor, si es necesario

        $doctor->delete();

        return json_encode(['mensaje' => 'Doctor eliminado con éxito']);
    }
}


// Manejar la solicitud
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $doctorController = new DoctorController();
            echo $doctorController->show($_GET['id']);
        } else {
            $doctorController = new DoctorController();
            echo $doctorController->index();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $doctorController = new DoctorController();
        echo $doctorController->store($data);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $doctorController = new DoctorController();
        echo $doctorController->update($id, $data);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $doctorController = new DoctorController();
        echo $doctorController->destroy($id);
        break;

    default:
        http_response_code(405);
        echo json_encode(['error' => 'Método no permitido']);
        break;
}
?>
