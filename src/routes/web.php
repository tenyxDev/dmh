<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->name('ticket.docs');

Route::get('/tardis', function () {
    return view('tardis');
})->name('tardis');

Route::get('/cssAnimateBorder', function () {
    return view('cssAnimateBorder');
})->name('cssAnimateBorder');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/info', 'Ticket\TicketController@info')->name('ticket.info');
    Route::post('/ticket-complete', 'Ticket\TicketController@complete')->name('ticket.complete');
    Route::post('/ticket-activate', 'Ticket\TicketController@activate')->name('ticket.activate');
    Route::post('/ticket-recycle', 'Ticket\TicketController@recycle')->name('ticket.recycle');
    Route::post('/ticket-deactivate', 'Ticket\TicketController@deactivate')->name('ticket.deactivate');
    Route::post('/ticket-destroy', 'Ticket\TicketController@destroy')->name('ticket.destroy');
    Route::resource('/tickets', 'Ticket\TicketController')->middleware('auth');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
