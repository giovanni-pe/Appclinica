<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctores'; 
    public $timestamps=false;
    protected $fillable = ['nombre', 'especialidad'];

    public function citas()
    {
        return $this->hasMany(Cita::class,'doctor_id');
    }
    
    public function informes()
    {
        return $this->hasMany(Informe::class);
    }
    public static function isAvailable($doctor_id, $fecha_hora) {
        $citasProgramadas = self::find($doctor_id)->citas()->where('fecha_hora', $fecha_hora)->count(); 
        return $citasProgramadas == 0;
    }
    
    public static function exceedsDailyLimit($doctor_id, $fecha) {
        $doctor = self::find($doctor_id);
        
        if (!$doctor) {
            return false;
        }
        $limiteDiario = $doctor->limite_diario_citas;

        // Verificar si el número de citas para el doctor en la fecha especificada excede el límite
        $citasParaFecha = $doctor->citas()->where('fecha_hora', $fecha)->count();

        return $citasParaFecha >= $limiteDiario;
    }
}
