<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/{id}', function ($id) {
    $users = [
		[
			"id" => 1,
            "name" => "John Doe",
            "gender"=> "nam",
        ],
        [
			"id" => 2,
            "name" => "Nguyễn Văn BB",
            "gender"=> "nữ",
        ],
        [
			"id" => 3,
            "name" => "Trần Văn A",
            "gender"=> "nam",
        ],
    ];
    $user= collect($users)->map(function ($user) {
        return (object) $user;
    })->firstWhere('id', $id);
    if(!$user){
        abort(404);
    }
    return view('user',compact('user'));
});
