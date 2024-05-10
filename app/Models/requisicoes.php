<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisicoes extends Model
{
    use HasFactory;
    protected $fillable=([
        'hospede',
        'quarto',
        'funcionario',
        'duracao',
        'estadia',
        'apagar',
        'data_hospedagem'
    ]);
}
