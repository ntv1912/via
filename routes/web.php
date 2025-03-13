<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('contact')->group(function () {
    Route::get('/', function () {
        return view('contact');
    })->name('contact-form');
    Route::post('/', function (Request $request) {
        $namer = $request->input('name');
        $email= $request->input('email');
        return redirect('contact')->withInput()
        ->with('success','Thành công')
        ->with('name',$namer)
        ->with('email',$email);
    })->name('contact-submit');

});
