<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{
    use HasFactory, SoftDeletes;

    protected $table      = 'cidades';

    protected $fillable = [
        'name',
        'estado',
    ];

    public function medicos()
    {
        return $this->hasMany(Medico::class, 'cidade_id');
    }
}
