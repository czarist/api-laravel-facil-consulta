<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medicos';

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'medico_id');
    }
}
