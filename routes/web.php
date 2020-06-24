<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Front')->group(function () {
    Route::get('/', 'FormController@index')->name('form.index');
    Route::get('/konfirmasi/{kode}', 'FormController@konfirmasi')->name('form.konfirmasi');
    Route::get('/detail/{kode}', 'FormController@show')->name('form.show');
    Route::post('/submit', 'FormController@store')->name('form.submit');
});

Auth::routes(['register' => false]);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
    ], function() {
        Route::get('/', 'AdminController@index')->name('admin');
        Route::delete('/registrant/{id}', 'Admincontroller@destroy')->name('registrant.destroy');
        Route::get('/export-excel', 'ExportExcelController@exportExcel')->name('export-excel');

});

Route::get('/logout', 'LogoutController@logout')->name('logout');