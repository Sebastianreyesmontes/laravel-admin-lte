<?php

use App\Http\Controllers\PrehomeController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Prehome\DatesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/noticias', function () { return view('Prehome/noticias'); })->name('news');

Route::get('/', PrehomeController::class);
Route::get('/noticias', function () {
    return view('Prehome.noticias');
})->name('news');
Route::view('/acerca-de-aerocali', 'Prehome.acercade')->name('acerca-de-aerocali');
Route::get('/reseña-historica', function () {
    return view('Prehome.reseñah');
})->name('reseña-historica');
Route::get('/boletines', function () {
    return view('Prehome.boletines');
})->name('newsletters');
Route::get('/p', function () {
    return view('Prehome.plantilla-prehome');
})->name('plantilla-prehome');
Route::get('/noticia', function () {
    return view('Prehome.noticia');
})->name('new');
// Route::get('/graficos', function () {
//     return view('Prehome.examples');
// })->name('examples');
// Route::get('/graficos', DatesController::class)->name('examples');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::get('/eventos', function () { return view('events'); })->name('events');
    Route::get('/vereventos', [EventController::class, 'listEvents'])->name('events.list');
    Route::resource('events', EventController::class);
    // Route::get('/eventos', [EventController::class, 'index'])->name('eventos.index');
    // Route::get('/example', function () { return view('events-create'); })->name('example');
    Route::get('/profile', function () { return view('profile'); })->name('profile');
    Route::get('crud-users/ver', 'App\Http\Controllers\UserController@index')/*->middleware('can:crud-users.view')*/->name('crud-users.view');
    Route::match (['get', 'post'], 'crud-users/anadir/{id?}', 'App\Http\Controllers\UserController@edit')->name('crud-users.edit');
    // Route::match(['get', 'post'], 'App\Http\Controllers\UserController@index');
    Route::get('crud-users/eliminar/{id?}', 'App\Http\Controllers\UserController@delete')->name('crud-users.delete');

    Route::get('/archivos/crear-editar', function () { return view('editfiles'); })->name('editfiles');
    Route::match(['get','post'] , '/archivos/crear', function () { return view('uploadfiles'); })->name('uploadfiles');
    Route::match( ['get','post'] , '/archivos', function () { return view('allfiles'); })->name('all.files')->name('all.files');
    Route::post( '/archivos/store', [FileController::class, 'store'])->name('file.store');
    Route::get('archivos/eliminar/{id?}', 'App\Http\Controllers\FileController@delete')->name('files.delete');
    Route::get('/file-manager', 'App\Http\Controllers\FileManagerController@fileManagerPage')->name('file.manager.page');

    Route::get('/permiso', function () { return view('permission'); })->name('permission');
    Route::get('/estadisticas', function () { return view('statistics'); })->name('statistics');
    // Route::get('/proyectos', function () { return view('projects'); })->name('projects');
    Route::get('/proyectos', 'App\Http\Controllers\ProjectController@index')->name('projects');
    Route::match (['get', 'post'], 'proyectos/crear/{id?}', 'App\Http\Controllers\ProjectController@edit')->name('project.edit');
    Route::get('proyectos/eliminar/{id?}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');
    Route::match (['get', 'post'], 'proyectos/ver/{id?}', 'App\Http\Controllers\ProjectController@view')->name('project.view');
    Route::match (['get', 'post'], 'proyectos/crear-etapa/{id?}', 'App\Http\Controllers\ProjectController@createProcess')->name('projects.createProcess');
    Route::get('/proyectos/{project}/administrar-archivos', 'ProjectFileManagerController@index')->name('project.filemanager');

    Route::post('/proyectos/{id}/agregar-miembros', 'ProjectController@addMembers')->name('projects.addMembers');


    // Route::get('/proyectos/crear', function () { return view('projects-create'); })->name('projects.create');
    // Route::post('/proyectos', 'ProjectController@store')->name('projects.store');

    Route::get('/comunidad', function () { return view('community'); })->name('community');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');

// Route::get('events', function () {
//     // return view('welcome');
//     return 'eventos';
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
