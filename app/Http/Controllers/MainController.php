<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
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
