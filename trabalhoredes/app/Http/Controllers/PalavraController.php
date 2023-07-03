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
        $palavras = file('./../../badwords.txt');
        // Cria um array vazio
        $lista = [];
        // Para cada palavra no arquivo
        foreach ($palavras as $palavra) {
            // Tira os \n e \r
            $palavra = str_replace("\n", "", $palavra);
            $palavra = str_replace("\r", "", $palavra);
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
        // Pega a palavra
        $palavra = $request->input('palavra');
        // Abre o arquivo badwords.txt, que esta um nivel acima da raiz
        $arquivo = fopen('./../../badwords.txt', 'a');
        // Escreve a palavra no arquivo
        fwrite($arquivo, $palavra . "\n");
        // Fecha o arquivo
        fclose($arquivo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $palavra)
    {
        // Pega todas as palavras do arquivo
        $palavras = file('./../../badwords.txt');
        // Cria um array vazio
        $lista = [];
        // Para cada palavra no arquivo
        foreach ($palavras as $p) {
            // Tira os \n e \r
            $p = str_replace("\n", "", $p);
            $p = str_replace("\r", "", $p);
            // Se a palavra for diferente da palavra que veio como parametro
            if ($p != $palavra) {
                // Adiciona a palavra no array
                array_push($lista, $p);
            }
        }

        // Salva o array no arquivo
        file_put_contents('./../../badwords.txt', implode("\n", $lista));
    }
}
