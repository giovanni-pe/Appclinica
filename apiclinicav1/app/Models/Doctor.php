<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['nombre', 'especialidad'];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
