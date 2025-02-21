<?php
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(): Factory|View {
    $name = 'joman';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function(): Factory|View {
    $name = request()->input('name');
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));
});

Route::post('/create', function () {
    $task_name = request()->input('name');
    DB::table('tasks')->insert(['name' => $task_name]);
    return redirect()->back();
});

Route::delete('/delete/{id}', function ($id): RedirectResponse {
    DB::table('tasks')->where('id', $id)->delete();
    return redirect()->back();
});
