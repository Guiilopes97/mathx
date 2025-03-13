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

    public function genereateExercises(Request $request): View
    {
        // form validation
        $request->validate(
            [
                'check_sum' => 'required_without_all:check_subtraction,check_multiplication,check_division',
                'check_subtraction' => 'required_without_all:check_sum,check_multiplication,check_division',
                'check_multiplication' => 'required_without_all:check_sum,check_subtraction,check_division',
                'check_division' => 'required_without_all:check_sum,check_subtraction,check_multiplication',

                'number_one' => 'required|integer|min:0|max:999|lt:number_two',
                'number_two' => 'required|integer|min:0|max:999',
                'number_exercises' => 'required|integer|min:5|max:50',
            ]
        );

        // get selected options
        $operations = [];
        if ($request->check_sum) {
            $operations[] = 'sum';
        }
        if ($request->check_subtraction) {
            $operations[] = 'subtraction';
        }
        if ($request->check_multiplication) {
            $operations[] = 'multiplication';
        }
        if ($request->check_division) {
            $operations[] = 'division';
        }

        // get numbers (min and max)
        $min = $request->number_one;
        $max = $request->number_two;

        // get number of exercises
        $number_exercises = $request->number_exercises;

        // generate exercises
        $exercises = [];
        for ($i = 1; $i <= $number_exercises; $i++) {
            $exercises[] = $this->generateExercises($i, $operations, $min, $max);
        }

        // place exercises in session
        // $request->session()->put('exercises', $exercises);
        // ou
        session(['exercises' => $exercises]);

        return view('operations', ['exercises' => $exercises]);
    }

    public function printExercises()
    {
        // check if there are exercises in session
        if (!session()->has('exercises')) {
            return redirect()->route('home');   
        }

        $exercises = session('exercises');

        echo '<pre>';
        echo '<h1>Exercícios de Matemática ('. env('APP_NAME') .')</h1>';
        echo "<hr>";

        foreach ($exercises as $exercise) {
            echo '<h2><small>[' . str_pad($exercise['exercise_number'], 2, '0', STR_PAD_LEFT) . ']  ' . $exercise['exercise'].'</small></h2>';
        }

        // sollutions
        echo "<hr>";
        echo '<small>Respostas</small><br>';
        foreach ($exercises as $exercise) {
            echo '<small>[' . str_pad($exercise['exercise_number'], 2, '0', STR_PAD_LEFT) . ']  ' . $exercise['solution'].'</small><br>';
        }
    }

    public function exportExercises()
    {
        echo "exportar exercício para um arquivo de texto";
    }

    private function generateExercises($i, $operations, $min, $max, ): array
    {
        $operation = $operations[array_rand($operations)];
        $number1 = rand($min, $max);
        $number2 = rand($min, $max);

        $exercise = '';
        $solution = '';

        switch ($operation) {
            case 'sum':
                $exercise = "$number1 + $number2 =";
                $solution = $number1 + $number2;
                break;
            case 'subtraction':
                $exercise = "$number1 - $number2 =";
                $solution = $number1 - $number2;
                break;
            case 'multiplication':
                $exercise = "$number1 x $number2 =";
                $solution = $number1 * $number2;
                break;
            case 'division':

                // avoid division by zero
                if ($number2 == 0) {
                    $number2 = 1;
                }

                $exercise = "$number1 / $number2 =";
                $solution = $number1 / $number2;
                break;
        }

        // if solution is a float, round it to 2 decimal places
        if (is_float($solution)) {
            $solution = round($solution, 2);
        }

        return [
            'exercise_number' => $i,
            "operation" => $operation,
            'exercise' => $exercise,
            'solution' => "$exercise $solution",
        ];
    }
}
