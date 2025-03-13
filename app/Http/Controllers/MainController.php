<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        echo "Apresentar a página inicial";
    }

    public function genereateExercises(Request $request)
    {
        echo "gerar exercício";
    }

    public function printExercises()
    {
        echo "imprimir exercícios no navegador";
    }

    public function exportExercises()
    {
        echo "exportar exercício para um arquivo de texto";
    }
}
