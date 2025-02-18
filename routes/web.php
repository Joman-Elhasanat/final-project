<?php

use Carbon\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', action: function(): Factory|View {
    $name = 'joman';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    //return view('about', ['name' => $name]);
   //return view('about',->with('name' => $name);
    return view(view: 'about', data: compact('name', 'departments'));
});

Route::post(uri: '/about', action: function(): Factory|View {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view(view: 'about', data: compact('name', 'departments'));
});
