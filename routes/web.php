<?php

use Illuminate\Support\Facades\Route;

Route::get('/{path?}', function ($path='index') {
    return response()->file(public_path("store/$path.html"));
})->where('path', '.*');