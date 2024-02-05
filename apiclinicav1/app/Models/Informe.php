<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informe extends Model
{
    protected $fillable = ['cita_id', 'diagnostico', 'receta', 'tratamiento'];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
