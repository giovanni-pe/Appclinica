<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = ['cliente_id', 'doctor_id', 'fecha_hora', 'estado'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function informe()
    {
        return $this->hasOne(Informe::class);
    }
}
