<?php

use App\Http\Controllers\Api\ContactMailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {

    Route::group([], function () {
        Route::post('sent-contact-mail', [ContactMailController::class, 'sentContactMail']);
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('get-contact-mails', [ContactMailController::class, 'getContactMails']);
        Route::get('get-contact-mail/{id}', [ContactMailController::class, 'getContactMail']);
        Route::delete('delete-contact-mail/{id}', [ContactMailController::class, 'deleteContactMail']);
    });


});
