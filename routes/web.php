<?php
Route::get('/', 'TestController@welcome');  //welcome <<
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->prefix('admin')->group(function()  //middlleware auth luego admin despues prefijos admin
{
	Route::get('/escuelas', 'AdminController@index');  //listado
	Route::get('/escuelas/create', 'AdminController@create');  //formulario
	Route::post('/escuelas', 'AdminController@store'); //registrar
	Route::get('/escuelas/{id}/edit', 'AdminController@edit'); //formulario de edicion
	Route::post('/escuelas/{id}/edit', 'AdminController@update'); //actualizar
	Route::get('/escuelas/{id}/eliminar', 'AdminController@destroy'); //eliminar  <<<<<<<<<<<<<<<
	//imagenes
	Route::get('/escuelas/{id}/images', 'ImageController@index'); //inicio
	Route::post('/escuelas/{id}/images', 'ImageController@store'); //guardar
	Route::delete('/escuelas/{id}/images', 'ImageController@destroy'); //eliminar 
	//profile
	Route::get('/escuelas/profile/{id}', 'AdminController@profile');
});	
//DOCENTES
Route::middleware(['auth','escuela'])->prefix('escuela')->group(function()  
{
	Route::get('/docentes', 'EscuelaController@index'); //listado
	Route::get('/docentes/create', 'EscuelaController@create'); //leer
	Route::post('/docentes', 'EscuelaController@store'); //registrar
	Route::get('/docentes/{id}/edit', 'EscuelaController@edit'); //formulario de edicion
	Route::post('/docentes/{id}/edit', 'EscuelaController@update');
	Route::get('/docentes/{id}/eliminar', 'EscuelaController@destroy'); 
	//imagenes
	Route::get('/docentes/{id}/images', 'ImageController@indexD'); //inicio
	Route::post('/docentes/{id}/images', 'ImageController@store'); //guardar
	Route::delete('/docentes/{id}/images', 'ImageController@destroy'); //eliminar

	//profile
	Route::get('/docentes/profile/{id}', 'EscuelaController@profile');
	Route::post('/docentes/profile/{id}', 'EscuelaController@guardar');
	Route::get('/docentes/profile/{id}/eliminar', 'EscuelaController@eliminar');  

	Route::get('/docentes/asignaturas', 'EscuelaController@docente_asignatura'); //test asignaturas_docentes
});	
// ALUMNOS
Route::middleware(['auth','escuela'])->prefix('escuela')->group(function()  
{
	Route::get('/alumnos', 'AlumnoController@index'); //listado
	Route::get('/alumnos/create', 'AlumnoController@create'); //leer
	Route::post('/alumnos', 'AlumnoController@store'); //registrar
	Route::get('/alumnos/{id}/edit', 'AlumnoController@edit'); //formulario de edicion
	Route::post('/alumnos/{id}/edit', 'AlumnoController@update'); 
	Route::get('/alumnos/{id}/eliminar', 'AlumnoController@destroy'); 
	//imagenes
	Route::get('/alumnos/{id}/images', 'ImageController@indexA'); //inicio
	Route::post('/alumnos/{id}/images', 'ImageController@store'); //guardar
	Route::delete('/alumnos/{id}/images', 'ImageController@destroy'); //eliminar

	Route::get('/alumnos/{id}/grupo', 'AlumnoController@grupo'); //formulario de edicion
	Route::post('/alumnos/{id}/grupo', 'AlumnoController@updateGrupo'); 
});	
//MATERIAS
Route::middleware(['auth','escuela'])->prefix('escuela')->group(function()  
{
	Route::get('/asignaturas', 'AsignaturaController@index'); //listado
	Route::get('/asignaturas/create', 'AsignaturaController@create'); //leer
	Route::post('/asignaturas', 'AsignaturaController@store'); //registrar
	Route::get('/asignaturas/{id}/edit', 'AsignaturaController@edit'); //formulario de edicion
	Route::post('/asignaturas/{id}/edit', 'AsignaturaController@update'); 
	Route::get('/asignaturas/{id}/eliminar', 'AsignaturaController@destroy'); 	
});	
//GRUPOS
Route::middleware(['auth','escuela'])->prefix('escuela')->group(function()  
{
	Route::get('/grupos', 'GrupoController@index'); //listado
	Route::get('/grupos/create', 'GrupoController@create'); //leer
	Route::post('/grupos', 'GrupoController@store'); //registrar
	Route::get('/grupos/{id}/edit', 'GrupoController@edit'); //formulario de edicion
	Route::post('/grupos/{id}/edit', 'GrupoController@update'); 
	Route::get('/grupos/{id}/eliminar', 'GrupoController@destroy'); 	
});	
