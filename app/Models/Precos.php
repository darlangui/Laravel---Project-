<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Precos extends Model
{
    protected $table='precos';
    protected $fillable=['tipo', 'coleta', 'precov', 'postos_id'];

    public function postos()
    {
        return $this->belongsTo(Postos::class);
    }
    use HasFactory;
}
