<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Postos;
class Cidades extends Model
{
    protected $table = 'cidades';
    protected $fillable = ['nome', 'uf', 'cep'];
    use HasFactory;

    public function postos_cidades(){
        return $this->hasMany(Postos::class);
    }
}
