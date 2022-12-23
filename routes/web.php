<?php

use App\Http\Controllers\AjaxController;
use App\Http\Livewire\ChatModule;
use App\Http\Livewire\FileUpload;
use App\Http\Livewire\WizardForm;
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
});

Route::get('/wizard-form', WizardForm::class)->name('wizard.form');



Route::get('/file-upload', FileUpload::class)->name('file.upload');
Route::get('/chat-module', ChatModule::class)->name('chat-module');

Route::any('/ajax',[AjaxController::class,'renderBlade'])->name('renderBlade');
Route::get('/ajax-request',[AjaxController::class,'renderAjax']);

