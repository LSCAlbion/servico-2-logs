<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validação básica (garante que o Serviço 1 mandou os dados mínimos)
        $dadosValidados = $request->validate([
            'acao' => 'required|string|max:255',
            'detalhe' => 'nullable|string',
            'usuarioId' => 'nullable|integer'
        ]);

        // 2. Salva no banco usando o nosso Model Eloquent
        $log = Log::create($dadosValidados);

        // 3. Retorna uma resposta de sucesso padrão JSON
        return response()->json([
            'sucesso' => true,
            'mensagem' => 'Log registrado com sucesso!',
            'dados' => $log
        ], 201); // 201 é o código HTTP para "Criado"
    }
}