<?php
include('../config.php');
use App\Models\Cita;
use App\Models\Doctor;

class CitaController
{
    public function index()
    {
        $citas = Cita::all();
        return json_encode($citas);
    }

    public function show($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return json_encode(['mensaje' => 'Cita no encontrada']);
        }

        return json_encode($cita);
    }

    public function store($data)
    {
        // Validar que se proporcionen los campos obligatorios
        if (!isset($data['cliente_id']) || !isset($data['doctor_id']) || !isset($data['fecha_hora'])) {
            http_response_code(400);
            return json_encode(['error' => 'Cliente ID, Doctor ID y Fecha/Hora son campos obligatorios']);
        }

        // Verificar disponibilidad del doctor
        $doctor_id = $data['doctor_id'];
        $fecha_hora = $data['fecha_hora'];

        if (!Doctor::isAvailable($doctor_id, $fecha_hora)) {
            http_response_code(400);
            return json_encode(['error' => 'El doctor no está disponible en la fecha y hora especificadas']);
        }

        // Validar fecha y hora futura
        if (strtotime($fecha_hora) <= time()) {
            http_response_code(400);
            return json_encode(['error' => 'La fecha y hora deben ser en el futuro']);
        }

        // Limitar el número de citas por día
        $fecha = date('Y-m-d', strtotime($fecha_hora));

        if (Doctor::exceedsDailyLimit($doctor_id, $fecha)) {
            http_response_code(400);
            return json_encode(['error' => 'El doctor ha alcanzado el límite de citas para este día']);
        }

        // Crear la cita
        $cita = new Cita($data);
        $cita->save();

        return json_encode(['mensaje' => 'Cita creada con éxito']);
    }

    public function update($id, $data)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return json_encode(['mensaje' => 'Cita no encontrada']);
        }

        // Validar que se proporcionen los campos obligatorios
        if (!isset($data['cliente_id']) || !isset($data['doctor_id']) || !isset($data['fecha_hora'])) {
            http_response_code(400);
            return json_encode(['error' => 'Cliente ID, Doctor ID y Fecha/Hora son campos obligatorios']);
        }

        // Verificar disponibilidad del doctor
        $doctor_id = $data['doctor_id'];
        $fecha_hora = $data['fecha_hora'];

        if (!Doctor::isAvailable($doctor_id, $fecha_hora)) {
            http_response_code(400);
            return json_encode(['error' => 'El doctor no está disponible en la fecha y hora especificadas']);
        }

        // Validar fecha y hora futura
        if (strtotime($fecha_hora) <= time()) {
            http_response_code(400);
            return json_encode(['error' => 'La fecha y hora deben ser en el futuro']);
        }

        // Limitar el número de citas por día
        $fecha = date('Y-m-d', strtotime($fecha_hora));

        if (Doctor::exceedsDailyLimit($doctor_id, $fecha)) {
            http_response_code(400);
            return json_encode(['error' => 'El doctor ha alcanzado el límite de citas para este día']);
        }

        // Actualizar la cita
        $cita->fill($data);
        $cita->save();

        return json_encode(['mensaje' => 'Cita actualizada con éxito']);
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);

        if (!$cita) {
            return json_encode(['mensaje' => 'Cita no encontrada']);
        }

        // Puedes agregar reglas de negocio adicionales antes de eliminar la cita, si es necesario.

        $cita->delete();

        return json_encode(['mensaje' => 'Cita eliminada con éxito']);
    }
}


$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $citaController = new CitaController();
            echo $citaController->show($_GET['id']);
        } else {
            $citaController = new CitaController();
            echo $citaController->index();
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $citaController = new CitaController();
        echo $citaController->store($data);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $citaController = new CitaController();
        echo $citaController->update($id, $data);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $citaController = new CitaController();
        echo $citaController->destroy($id);
        break;

    default:
        echo json_encode(['mensaje' => 'Método no permitido']);
        break;
}