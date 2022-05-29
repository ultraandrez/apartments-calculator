<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('apartments');
    $apatsPrograms = \App\Models\Apartment::all();

    foreach ($apatsPrograms as $apatsProgram) {
        echo 'Name: ' . $apatsProgram['name'] . '<br>';
        echo 'Price: ' . $apatsProgram['price'] . '<br>';
        echo '<b>Programs:</b><br>';
        if ($apatsProgram->mortgages) {
            foreach ($apatsProgram->mortgages as $program) {
                echo $program;
            }
        }

        echo '---------------------------<br>';
    }
});
