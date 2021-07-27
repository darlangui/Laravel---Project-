<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cidades;

class Postos extends Model
{
    protected $table='postos';
    protected $fillable=['cnpj', 'razao', 'nome', 'bandeira', 'endereco', 'bairro', 'cidades_id'];

    public function cidades()
    {
        return $this->belongsTo(Cidades::class);
    }
    public function precos_postos(){
        return $this->hasMany(Precos::class);
    }
    use HasFactory;
}
