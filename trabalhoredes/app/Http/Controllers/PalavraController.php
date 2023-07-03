<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PalavraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Abre p arquivo badwords.txt, que esta um nivel acima da raiz
        $palavras = file('../badwords.txt');
        // Cria um array vazio
        $lista = [];
        // Para cada palavra no arquivo
        foreach ($palavras as $palavra) {
            // Adiciona a palavra no array
            array_push($lista, $palavra);
        }
        // Retorna o array
        return $lista;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $palavra)
    {
        //
    }
}
