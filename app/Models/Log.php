<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    // Indica quais colunas podem ser preenchidas via API
    protected $fillable = [
        'acao',
        'detalhe',
        'usuarioId'
    ];
}
