<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Controller1;


Route::get('/products', [Controller1::class, "Index"])->name('products.index');
Route::get('/home', [Controller1::class, "Home"]);


// Route::get('/', [Controller1::class, "Index"]);
//Route::get('/', [Controller1::class, "Index"])->name('products.index');
Route::get('/', [Controller1::class, "Home"]);

//Route::get("/create", [Controller1::class, "Create"]);
Route::get("/create", "App\Http\Controllers\Controller1@Create");
Route::post("/create", [Controller1::class, "Store"]);

Route::get("/item/{id}", [Controller1::class, "Item"]);

Route::get("/update", [Controller1::class, "Update"]);
Route::post("/update", [Controller1::class, "UpdateItems"]);
Route::put("/update", [Controller1::class, "EditItem"]);

Route::get("/delete/{id}", [Controller1::class, "Delete"]);
Route::delete("/delete", [Controller1::class, "DeleteItem"]);


Route::get("/about", [Controller1::class, "Abt"]);